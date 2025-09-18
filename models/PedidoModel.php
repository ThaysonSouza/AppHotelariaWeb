<?php
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
            $stmt->bind_param("iii", 
            $data["id_usuario_fk"],
            $data["id_cliente_fk"],
            $data["pagamento"]);
            return $stmt->execute();
        }
        public static function atualizar($connect, $id, $data){
            $MYsql = "UPDATE pedidos SET pagamento = ? WHERE id = ?";
            $stmt = $connect->prepare($MYsql);
            $stmt->bind_param("ii",
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