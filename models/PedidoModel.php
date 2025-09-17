<?php
    class PedidoModel {
        public static function criar($connect,){
        }
        public static function buscarPorId($connect,){
            $MYsql = "INSERT INTO pedidos(id_usuario_fk, id_cliente_fk, pagamento)VALUES (?, ?, ?)";
            $stmt = $connect->prepare($MYsql);
            $stmt->bind_param("iiii", 
            $data["id_usuario_fk"],
            $data["id_cliente_fk"],
            $data["pagamento"]
            return $stmt->execute();
        }
        public static function listarTodos($connect,){

        }
    }    
    ?>