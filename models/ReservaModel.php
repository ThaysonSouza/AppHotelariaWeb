<?php
    class ReservaModel {
        public static function listarTodos($connect){
            $MYsql = "SELECT * FROM reservas"; 
            $result = $connect->query($MYsql);
            return $result->fetch_all(MYSQLI_ASSOC);           

        }
        public static function buscarPorId($connect, $id){
            $MYsql = "SELECT * FROM reservas WHERE id = ?";
            $stmt = $connect->prepare($MYsql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            return $stmt->get_result()->fetch_assoc(); 
        }
        public static function criar($connect, $data){
            $MYsql = "INSERT INTO reservas(id_adicional_fk, id_quarto_fk, id_pedido_fk, dataInicio, dataFim)VALUES (?, ?, ?, ?, ?)";
            $stmt = $connect->prepare($MYsql);
            $stmt->bind_param("iisss",
            $data["id_adicional_fk"],
            $data["id_quarto_fk"],
            $data["id_pedido_fk"],
            $data["dataInicio"],
            $data["dataFim"]);
            return $stmt->execute();
        }
        public static function atualizar($connect, $id, $data){
            $MYsql = "UPDATE reservas SET id_adicional_fk = ?, id_quarto_fk = ?, id_pedido_fk = ?, dataInicio = ?, dataFim = ? WHERE id = ?";
            $stmt = $connect->prepare($MYsql);
            $stmt->bind_param("iiissi", 
            $data["id_adicional_fk"],
            $data["id_quarto_fk"],
            $data["id_pedido_fk"],
            $data["dataInicio"],
            $data["dataFim"],
            $id
        );
            return $stmt->execute();

        }
        public static function deletar($connect, $id){
            $MYsql = "DELETE FROM reservas WHERE id = ?";
            $stmt = $connect->prepare($MYsql);
            $stmt->bind_param("i", $id);
            return $stmt->execute(); 
        }
        public static function listarPorPedido($connect, $id_pedido){
            $MYsql = "SELECT * FROM reservas WHERE id_pedido_fk = ?";
            $stmt = $connect->prepare($MYsql);
            $stmt->bind_param("i", $id_pedido);
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        }
        public static function temConflito($connect, $idQuarto, $inicio, $fim) {
            $sql = "SELECT *
            FROM reservas 
            WHERE id_quarto_fk = ? 
            AND dataInicio < ? AND dataInicio > ?";
            
            $stmt = $connect->prepare($sql);
            $stmt->bind_param("iss", $idQuarto, $inicio, $fim);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->num_rows > 0;
        }
        public static function temQuartoDisponivel($connect, $idQuarto, $inicio, $fim){
            sql = "SELECT COUNT(*) AS conflitos
                    FROM reservas 
                    WHERE id_quarto_fk = ?
                    AND (
                        (dataInicio <= ? AND dataFim > ?) OR
                        (dataInicio < ? AND dataFim >= ?) OR
                        (dataInicio >= AND dataFim <= ?)
                    )";

            $stmt = $connect->prepare($sql);
            $stmt->bind_param("issssss", 
                $idQuarto, 
                $fim,$inicio,
                $inicio,$fim, 
                $inicio,$fim
            );
            
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            return $row['conflitos'] == 0;
        }
        public static function obterPedidoDisponivel($connect, $idQuarto, $inicio, $fim){
            $sql = "SELECT id
            FROM reservas 
            WHERE id_quartos_fk = ? AND
                ( dataInicio < ? AND dataFim > ?) LIMIT 1";
            $stmt = $connect->prepare($sql);
            $stmt->bind_param (iss,
                $idQuarto,
                $fim
                $inicio);
            $stmt->execute();
            $result = $stmt->get_result();
            $temReserva = $result->num_rows > 0;
            $stmt->close();
            return $temReserva;
        }

        public static function criarOrdem($conn, $data){
            $cliente_id = $data['id_cliente_fk'];
            $pagamento = $data['pagamento'];
            $usuario_id = $data['id_usuario_fk'];

            $reservas = [];
            $reservou = false;

            $connect->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);

            try {
                $order_id = self::create($connect, [
                    "id_usuario_fk" => $usuario_id,
                    "id_cliente_fk" => $cliente_id,
                    "pagamento" => $pagamento
                ]);
                if(!$order_id){
                    throw new RuntimeException("Erro ao criar o pedido.");
                }

                foreach($data['quartos'] as $quarto){
                    $id = $quarto["id"];
                    $dataInicio = $quarto["dataInicio"];
                    $dataFim = $quarto["dataFim"];

                    // garantir que existe e bloquear
                    if ( !quartoModel::bloquearPorId($connect, $id) ){
                        $reservas[] = "Quarto {$id} indisponivel!";
                        continue;
                    }
                    if (!ReservaModel::isQuartoDisponivel($connect, $id, $dataInicio, $dataFim)){
                        $reservas[] = "Quarto {$id} já esta reservado!";
                        continue;
                    }

                    $reserverResult = ReservaModel::criar($connect,[
                        "id_pedido_fk" => $order_id,
                        "id_quarto_fk" => $id,
                        "id_adicional_fk" => null,
                        "dataInicio" => $dataInicio,
                        "dataFim" => $dataFim,
                    ]);
                    $reservou = true;
                    $reservas[] = [
                        "reserva_id" => $connect->insert_id,
                        "id_quarto_fk" => $id
                    ];
                }
                if ($reservou == true){
                    $conn->commit();
                    return [
                        "id_pedido_fk" => $order_id,
                        "reservas" => $reservas,
                        "messagem" => "Reservas criadas com sucesso!!"
                    ];
                }else{
                    throw new RuntimeException("Pedido nao realizado, nenhum quarto reservado!");
                }

            } catch (\Throwable $th) {
                try {
                    $connect->rollback();
                } catch (\Throwable $th2) {}
                throw $th;
            }
    }   

    }?>