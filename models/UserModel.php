<?php
    class UsuarioModel{
        public static function listarTodos($connect){
            $MYsql = "SELECT usuarios.id, usuarios.nome, usuarios.email, usuarios.senha, roles.nome AS cargo 
            FROM usuarios JOIN roles ON usuarios.id_role_fk = roles.id"; 
            $result = $connect->query($MYsql);
            return $result->fetch_all(MYSQLI_ASSOC);           

        }
        public static function buscarPorId($connect, $id){
            $MYsql = "SELECT usuarios.id, usuarios.nome, usuarios.email, usuarios.senha, roles.nome AS cargo 
            FROM usuarios JOIN roles ON usuarios.id_role_fk = roles.id WHERE usuarios.id = ?";
            $stmt = $connect->prepare($MYsql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            return $stmt->get_result()->fetch_assoc(); 
        }
        public static function criar($connect, $data){
            $MYsql = "INSERT INTO usuarios(id_role_fk, nome, email, senha)VALUES (?, ?, ?, ?)";
            $stmt = $connect->prepare($MYsql);
            $stmt->bind_param("isss", 
            $data["id_role_fk"],
            $data["nome"],
            $data["email"],
            $data["senha"]);
            return $stmt->execute();
        }
        public static function atualizar($connect, $id, $data){
            $MYsql = "UPDATE usuarios SET id_role_fk = ?, nome = ?, email = ?, senha = ? WHERE id = ?";
            $stmt = $connect->prepare($MYsql);
            $stmt->bind_param("isssi", 
            $data["id_role_fk"],
            $data["nome"],
            $data["email"],
            $data["senha"],
            $id
        );
            return $stmt->execute();

        }
        public static function deletar($connect, $id){
            $MYsql = "DELETE FROM usuarios WHERE id = ?";
            $stmt = $connect->prepare($MYsql);
            $stmt->bind_param("i", $id);
            return $stmt->execute(); 
        }

        public static function validandoUsuario($connect, $email, $senha){
            $MYsql = "SELECT usuarios.id, usuarios.nome, usuarios.email, usuarios.senha, roles.nome AS cargo 
            FROM usuarios JOIN roles ON usuarios.id_role_fk = roles.id
            WHERE usuarios.email = ?";
            $stmt = $connect->prepare($MYsql);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if($usuario = $result->fetch_assoc()){
                if(PasswordController::validateHash($senha, $usuario['senha'] )){
                    unset($usuario['senha']);
                    return $usuario;
                }

            }
            return false;
        }

    }
    ?>