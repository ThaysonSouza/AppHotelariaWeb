<?php
require_once __DIR__ . "/../models/ClienteModel.php";
require_once "PasswordController.php";
require_once "DataController.php";

class ClienteController {
    
    public static $labels = ['nome', 'email', 'telefone', 'senha'];

    public static function criar($connect, $data){
        DataController::issetData(self::$labels, $data);
        DataController::validateEmail($data['email']);
        
        $data['senha'] = PasswordController::generateHash($data['senha']);
        $result = ClienteModel::criar($connect, $data);

        if($result){
            return jsonResponse(['message'=>"Cliente criado com sucesso"]);
        }else{
            return jsonResponse(['message'=>"Erro ao criar"], 400);
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

}
?>