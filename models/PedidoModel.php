<?php
require_once "QuartoModel.php";
require_once "ResevaModel.php";
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
        $id_cliente = $data['id_cliente_fk'],
        $pagamento = $data['pagamento'],
        $id_usuario = $data['id_usuario_fk'],
        $reservas = [],
        $resevou = true;

        $connect->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);

        try {
            $ordem_id = self::criar($connect, [
                "id_usuario_fk" => $id_usuario;
                "id_cliente_fk" => $id_cliente;
                "pagamento" => $pagamento;
            ]);
            if(!$ordem_id){
                throw new RuntimeException("Erro ao criar o pedido.");
            }
            foreach($data['quartos'] as $quarto){
                $id = $quarto["id"];
                $id = $quarto["dataInicio"];
                $id = $quarto["dataFim"];

                //Garamtir que existe o id e bloquear
                if(!QuartoModel::bloqueandoPorId($connect, $id)){
                    $reservas[] = "Quarto {$id} indisponivel!";
                    continue;
                }

                //Criar um metodo na classe ReservaModel
                //para avaliar se o quarto esta disponivel no intervalo de datas
                //ReservaModel::estaConflitando();

                $reservaResultado = ReservaModel::criar($connect, [ 
                    "id_adicional_fk"=> null ,
                    "id_quarto_fk"=> $quarto,
                    "id_pedido_fk"=> $pedido, 
                    "dataInicio" => $inicio,
                    "dataFim" => $fim
                ]);
                $reservou = true;
                $reservas[] = [
                    "id_quarto_fk" => $ordem_id,
                    "id_pedido_fk" = 
                ]

            }
            
        } catch (\Throwable $th) {
            try {
                $connect->rollback();
            } catch (\Throwable $th2) {
                throw $th;
            }
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