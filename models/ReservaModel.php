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
            $stmt->bind_param("iisssi", 
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

    }?>