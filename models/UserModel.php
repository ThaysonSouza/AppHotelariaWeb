<?php
    class UsuarioModel{
        public static function validandoUsuario($connect, $email, $senha){
            $MYsql = "SELECT usuarios.id, usuarios.nome, usuarios.email, usuarios.senha, roles.nome AS cargo 
            FROM usuarios JOIN roles ON usuarios.id_role_fk = roles.id
            WHERE usuarios.email = ?";
            $stmt = $connect->prepare($MYsql);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if($usuario = $result->fetch_assoc()){
                if($usuario['senha'] === $senha){
                    unset($usuario['senha']);
                    return $usuario;
                }

            }
            return false;
        }

}
?>