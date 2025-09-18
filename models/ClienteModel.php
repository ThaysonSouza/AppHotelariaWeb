<?php
class ClienteModel {
    public static function listarTodos($connect){
        $MYsql = "SELECT nome, cpf, telefone, email, id_roles_fk FROM clientes"; 
        $result = $connect->query($MYsql);
        return $result->fetch_all(MYSQLI_ASSOC);   

    }
    public static function buscarPorId($connect,$id){
        $MYsql = "SELECT nome, cpf, telefone, email, id_roles_fk FROM clientes WHERE id = ?";
        $stmt = $connect->prepare($MYsql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
    public static function criar($connect, $data){
<<<<<<< HEAD
        $MYsql = "INSERT INTO clientes(nome, email, cpf, telefone, senha)VALUES ( ?, ?, ?, ?, ?)";
        $stmt = $connect->prepare($MYsql);
        $stmt->bind_param("sssss", 
=======
        $MYsql = "INSERT INTO clientes(id_roles_fk, nome, email, cpf, telefone, senha)VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $connect->prepare($MYsql);
        $stmt->bind_param("isssss", 
        $data["id_roles_fk"],
        $data["nome"],
        $data["email"],
        $data["cpf"],
        $data["telefone"],
        $data["senha"]);
        return $stmt->execute();
    }
    public static function atualizar($connect, $id, $data){
        $MYsql = "UPDATE clientes SET id_roles_fk = ?, nome = ?, email = ?, cpf = ?, telefone = ?, senha = ? WHERE id = ?";
            $stmt = $connect->prepare($MYsql);
            $stmt->bind_param("isssssi", 
            $data["id_roles_fk"],
>>>>>>> 5c07991c36180b6d54042ae66ebb93e9e89972a3
            $data["nome"],
            $data["email"],
            $data["cpf"],
            $data["telefone"],
<<<<<<< HEAD
            $data["senha"]);
        return $stmt->execute();
    }
    public static function atualizar($connect, $id, $data){
        $MYsql = "UPDATE clientes SET nome = ?, email = ?, cpf = ?, telefone = ?, senha = ? WHERE id = ?";
            $stmt = $connect->prepare($MYsql);
            $stmt->bind_param("sssssi", 
            $data["nome"],
            $data["email"],
            $data["cpf"],
            $data["telefone"],
=======
>>>>>>> 5c07991c36180b6d54042ae66ebb93e9e89972a3
            $data["senha"],
            $id);
            return $stmt->execute();

    }
    public static function deletar($connect, $id){
         $MYsql = "DELETE FROM clientes WHERE id = ?";
            $stmt = $connect->prepare($MYsql);
            $stmt->bind_param("i", $id);
            return $stmt->execute(); 
        
    }

}?>