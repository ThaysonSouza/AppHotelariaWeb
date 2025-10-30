<?php
    require_once "PasswordController.php";
    require_once "validadorController.php";
    
    require_once __DIR__ . "/../models/UsuarioModel.php";
    require_once __DIR__ . "/../models/ClienteModel.php";

    require_once __DIR__ . "/../helpers/token_jwt.php";

    class AuthController{
        public static function login($connect, $data){
            ValidatorController::validate_data($data, ["email", "senha"]);

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
            $user = UsuarioModel::validandoUsuario($connect, $data['email'], $data['senha']);
            if ($user){
                $token = createToken($user);
                return jsonResponse(["token" => $token]);
            }
            //erro no login
            else{
                return jsonResponse(
                    ["status"=>"Erro Critico!!!!",
                    "menssagem"=>"Credenciais invalidas"], 401);
            }
        }

        public static function loginCliente($connect, $data){
            ValidatorController::validate_data($data, ["email", "senha"]);

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
            $user = ClienteModel::validandoCliente($connect, $data['email'], $data['senha']);
            if ($user){
                $token = createToken($user);

                return jsonResponse(["token" => $token]);
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