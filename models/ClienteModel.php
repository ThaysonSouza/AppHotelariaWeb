<?php
class ClienteModel {
    public static function listarTodos($connect){
        $MYsql = "SELECT nome, cpf, telefone, email FROM clientes"; 
        $result = $connect->query($MYsql);
        return $result->fetch_all(MYSQLI_ASSOC);   

    }
    public static function buscarPorId($connect,$id){
        $MYsql = "SELECT nome, cpf, telefone, email FROM clientes WHERE id = ?";
        $stmt = $connect->prepare($MYsql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
    public static function criar($connect, $data){
        $MYsql = "INSERT INTO clientes(nome, email, cpf, telefone, senha)VALUES (?, ?, ?, ?, ?)";
        $stmt = $connect->prepare($MYsql);
        $stmt->bind_param("sssss", 
        $data["nome"],
        $data["email"],
        $data["cpf"],
        $data["telefone"],
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
    public static function validandoCliente($connect, $email, $senha) {
        $MYsql = "SELECT clientes.id, clientes.nome, clientes.email, clientes.senha, roles.nome AS cargo
        FROM clientes JOIN roles ON clientes.id_roles_fk = roles.id
        WHERE clientes.email = ?";
        $stmt = $connect->prepare($MYsql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
 
        if($cliente = $result->fetch_assoc()) {
        
            if(PasswordController::validateHash($senha, $cliente['senha'])) {
                unset($cliente['senha']);
                return $cliente;  
            }

        return false;
        }
    }
}?>