<?php
class PasswordController{
    public static function generateHash($senha){
        return password_hash($senha, PASSWORD_BCRYPT);
    }
    
    public static function validateHash($senha, $hash){

        return password_verify($senha, $hash);
    }
}


?>