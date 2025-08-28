<?php
    require_once __DIR__ . '/../models/UserModel.php';
    require_once 'PasswordController.php';

    class AuthController{
        public static function login($connect, $data){
            $data['email'] = trim($data['email']);
            $data['senha'] = trim($data['senha']);

            //Erro quando o campo estiver vazio
            if (empty($data['email']) || empty($data['senha'])){
                return jsonResponse(
                    ["status"=>"Erro Critico!!!!",
                    "menssagem"=>"Preencha todos os campos"], 401             
                );
            }

            //informaçoes corretas
            $user = UsuarioModel::validandoUsuario($connect,$data['email'], $data['senha']);
            if ($user){
                return jsonResponse(
                    ["id"=>$user['id'],
                    "nome"=>$user['nome'],
                    "email"=>$user['email'],
                    "cargo"=>$user['cargo']]);
            }
            //erro no login
            else{
                return jsonResponse(
                    ["status"=>"Erro Critico!!!!",
                    "menssagem"=>"Credenciais invalidas"], 401);
            }
        }
    }
?>