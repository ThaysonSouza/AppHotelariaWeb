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

    public static function criarOrdem($connect, $data) {
    $cliente_id = $data['cliente_id'];
    $pagamento = $data['pagamento'];
    $usuario_id = isset($data['usuario_id']) ? $data['usuario_id'] : null;
    $reservas = [];
    $reservou = false;
    
    $connect->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);
    try {
        $order_id = self::criar($connect, [
            "usuario_id" => $usuario_id,
            "cliente_id" => $cliente_id,
            "pagamento" => $pagamento
        ]);
        
        if (!$order_id) {
            throw new RuntimeException("Erro ao criar o pedido.");
        }
        
        // Percorre os quartos para reservar
        foreach ($data['quartos'] as $quarto) {
            $id = $quarto["id"];
            $inicio = $quarto["inicio"];
            $fim = $quarto["fim"];
            
            // Garante que o quarto existe e bloqueia
            if (!QuartoModel::bloquearPorId ($connect, $id)) {
                $reservas[] = "Quarto {$id} indisponível!";
                continue;
            }
            // Verifica conflito de datas
            if (ReservaModel::temConflito($connect, $idQuarto, $inicio, $fim)) {
                $reservas[] = "Conflito de datas para o quarto {$id}";
                continue;
            }
            // Cria a reserva
            $reservaResult = ReservaModel::criar($connect, [
                "pedido_id" => $order_id,
                "quarto_id" => $id,
                "adicional_id" => null,
                "inicio" => $inicio,
                "fim" => $fim,
            ]);
            if ($reservaResult) {
                $reservou = true;
                $reservas[] = [
                    "reserva_id" => $connect->insert_id,
                    "quarto_id" => $id
                ];
            }
        }
        if ($reservou) {
            $connect->commit();
            return [
                "pedido_id" => $order_id,
                "reservas" => $reservas,
                "mensagem" => "Reservas criadas com sucesso!"
            ];
        } else {
            throw new RuntimeException("Pedido não realizado, nenhum quarto reservado.");
        }
    } catch (\Throwable $th) {
        try {
            $connect->rollback();
        } catch (\Throwable $th2) {}
        throw $th;
        }
    }
}    
?>