<?php
    class AdicionalModel {
        public static function listarTodos($connect){
            $MYsql = "SELECT * FROM adicionais"; 
            $result = $connect->query($MYsql);
            return $result->fetch_all(MYSQLI_ASSOC);           

        }
        public static function buscarPorId($connect, $id){
            $MYsql = "SELECT * FROM adicionais WHERE id = ?";
            $stmt = $connect->prepare($MYsql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            return $stmt->get_result()->fetch_assoc(); 
        }
        public static function criar($connect, $data){
<<<<<<< HEAD
            $MYsql = "INSERT INTO adicionais(nome, preco)VALUES (?, ?)";
            $stmt = $connect->prepare($MYsql);
            $stmt->bind_param("sd", 
            $data["nome"],
            $data["preco"]);
            return $stmt->execute();
        }
        public static function atualizar($connect, $id, $data){
            $MYsql = "UPDATE adicionais SET nome = ?, preco = ? WHERE id = ?";
            $stmt = $connect->prepare($MYsql);
            $stmt->bind_param("sdi", 
            $data["nome"],
            $data["preco"],
=======
            $MYsql = "INSERT INTO adicionais(nome, descricao, preco, disponivel)VALUES (?, ?, ?, ?)";
            $stmt = $connect->prepare($MYsql);
            $stmt->bind_param("ssdi", 
            $data["nome"],
            $data["descricao"],
            $data["preco"],
            $data["disponivel"]);
            return $stmt->execute();
        }
        public static function atualizar($connect, $id, $data){
            $MYsql = "UPDATE adicionais SET nome = ?, descricao = ?, preco = ?, disponivel = ? WHERE id = ?";
            $stmt = $connect->prepare($MYsql);
            $stmt->bind_param("ssdii", 
            $data["nome"],
            $data["descricao"],
            $data["preco"],
            $data["disponivel"],
>>>>>>> 5c07991c36180b6d54042ae66ebb93e9e89972a3
            $id
        );
            return $stmt->execute();

        }
        public static function deletar($connect, $id){
            $MYsql = "DELETE FROM adicionais WHERE id = ?";
            $stmt = $connect->prepare($MYsql);
            $stmt->bind_param("i", $id);
            return $stmt->execute(); 
        }

    }?>