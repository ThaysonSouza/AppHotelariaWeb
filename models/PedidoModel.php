<?php
require_once "QuartoModel.php";
require_once "ReservaModel.php";
class PedidoModel {
    public static function listarTodos($connect){
        $MYsql = "SELECT * FROM pedidos"; 
        $result = $connect->query($MYsql);
        return $result->fetch_all(MYSQLI_ASSOC);           

    }
    public static function buscarPorId($connect, $id){
        $MYsql = "SELECT * FROM pedidos WHERE id = ?";
        $stmt = $connect->prepare($MYsql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc(); 
    }
    public static function criar($connect, $data){
        $MYsql = "INSERT INTO pedidos(id_usuario_fk, id_cliente_fk, pagamento)VALUES (?, ?, ?)";
        $stmt = $connect->prepare($MYsql);
        $stmt->bind_param("iis", 
        $data["id_usuario_fk"],
        $data["id_cliente_fk"],
        $data["pagamento"]
    );
    $resultado = $stmt->execute();
    if($resultado){
        return $connect-> insert_id;
    }
    return false;
    }

    public static function criarOrdem($connect, $data){
        $id_cliente = $data['id_cliente_fk'];
        $pagamento = $data['pagamento'];
        $id_usuario = isset($data['id_usuario_fk']) ? $data['id_usuario_fk'] : null;
        $reservasResumo = [];

        $connect->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);
        try {
            $pedidoId = self::criar($connect, [
                "id_usuario_fk" => $id_usuario,
                "id_cliente_fk" => $id_cliente,
                "pagamento" => $pagamento
            ]);
            if(!$pedidoId){
                throw new RuntimeException("Erro ao criar o pedido.");
            }

            foreach($data['quartos'] as $quarto){
                $idQuarto = $quarto["id"];
                $inicio = $quarto["dataInicio"];
                $fim = $quarto["dataFim"];

                // Bloqueia o quarto na transação
                if(!QuartoModel::bloquearPorId($connect, $idQuarto)){
                    $reservasResumo[] = [
                        "id_quarto_fk" => $idQuarto,
                        "status" => "indisponivel",
                        "mensagem" => "Quarto inexistente ou indisponível"
                    ];
                    continue;
                }

                // Verifica conflito para o intervalo solicitado
                $sqlConf = "SELECT 1 FROM reservas r WHERE r.id_quarto_fk = ? AND (r.dataFim >= ? AND r.dataInicio <= ?) LIMIT 1";
                $stmt = $connect->prepare($sqlConf);
                $stmt->bind_param("iss", $idQuarto, $inicio, $fim);
                $stmt->execute();
                $temConflito = $stmt->get_result()->num_rows > 0;
                $stmt->close();

                if($temConflito){
                    $reservasResumo[] = [
                        "id_quarto_fk" => $idQuarto,
                        "status" => "conflito",
                        "mensagem" => "Datas em conflito para este quarto"
                    ];
                    continue;
                }

                $okReserva = ReservaModel::criar($connect, [
                    "id_adicional_fk" => null,
                    "id_quarto_fk" => $idQuarto,
                    "id_pedido_fk" => $pedidoId,
                    "dataInicio" => $inicio,
                    "dataFim" => $fim
                ]);

                $reservasResumo[] = [
                    "id_quarto_fk" => $idQuarto,
                    "status" => $okReserva ? "reservado" : "erro",
                    "mensagem" => $okReserva ? "Reserva criada" : "Falha ao reservar"
                ];
            }

            $connect->commit();
            return [
                "pedido" => $pedidoId,
                "reservas" => $reservasResumo
            ];
        } catch (\Throwable $th) {
            $connect->rollback();
            throw $th;
        }
    }

    public static function atualizar($connect, $id, $data){
        $MYsql = "UPDATE pedidos SET id_usuario_fk = ?, id_cliente_fk = ?, pagamento = ? WHERE id = ?";
        $stmt = $connect->prepare($MYsql);
        $stmt->bind_param("iisi", 
        $data["id_usuario_fk"],
        $data["id_cliente_fk"],
        $data["pagamento"],
        $id
    );
        return $stmt->execute();

    }
    public static function deletar($connect, $id){
        $MYsql = "DELETE FROM pedidos WHERE id = ?";
        $stmt = $connect->prepare($MYsql);
        $stmt->bind_param("i", $id);
        return $stmt->execute(); 
    }

}    
?>