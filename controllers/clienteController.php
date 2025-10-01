<?php
require_once __DIR__ . "/../models/ClienteModel.php";
require_once "PasswordController.php";
require_once __DIR__ . "/../controllers/AuthController.php";

class ClienteController {
     public static function criar($connect, $data) {
        $dados = [
            "email" => $data["email"],
            "senha" => $data["senha"]
        ];

        $data['senha'] = PasswordController::generateHash($data['senha']);
        $result = ClienteModel::criar($connect, $data);
        if ($result) {
            AuthController::loginCliente($connect, $dados);
        } else {
            return jsonResponse(['message' => 'Erro inesperado'], 400);
        }
    }
    

    public static function listarTodos($connect){
        $listaClientes = ClienteModel::listarTodos($connect);
        return jsonResponse($listaClientes);

    }

    public static function buscarPorId($connect, $id){
        $buscaId = ClienteModel::buscarPorId($connect, $id);
        return jsonResponse($buscaId);
    }

    public static function delete($connect, $id){
        $result = ClienteModel::deletar($connect, $id);
        if($result){
            return jsonResponse(['message'=>"Cliente deletado com sucesso"]);
        }else{
            return jsonResponse(['message'=>"Erro ao deletar"], 400);

        }
    }

    public static function atualizar($connect, $id, $data){
        $result = ClienteModel::atualizar($connect, $id, $data);
        if($result){
            return jsonResponse(['message'=>"Cliente atualizado com sucesso"]);
        }else{
            return jsonResponse(['message'=>"Erro ao atualizar"], 400);

        }

    }
    
    public static function loginCliente($connect, $data) {

        $data['email'] = trim($data['email']);
        $data['senha'] = trim($data['senha']);
 
        if (empty($data['email']) || empty($data['senha'])) {
            return jsonResponse([
                "status" => "erro",
                "message" => "Preencha todos os campos!"
            ], 401);
        }
    $cliente = ClienteModel::ClienteValidation($connect, $data['email'], $data['senha']);
        if ($cliente) {
            $token = createToken($cliente);
            return jsonResponse([ "token" => $token ]);
        } else {
            return jsonResponse([
                "status" => "erro",
                "message" => "Credenciais inválidas!"
            ], 401);
        }    
    }    
}
?>