<?php
require_once __DIR__ . "/../models/UserModel.php";

class UserController{
    public static function criar($connect, $data){
        $result = UsuarioModel::criar($connect, $data);
        if($result){
            return jsonResponse(['message'=>"Usuário criado com sucesso"]);
        }else{
            return jsonResponse(['message'=>"Erro ao criar"], 400);

        }

    }

    public static function listarTodos($connect){
        $listaUsuarios = UsuarioModel::listarTodos($connect);
        return jsonResponse($listaUsuarios);

    }

    public static function buscarPorId($connect, $id){
        $buscaId = UsuarioModel::buscarPorId($connect, $id);
        return jsonResponse($buscaId);
    }

    public static function delete($connect, $id){
        $result = UsuarioModel::deletar($connect, $id);
        if($result){
            return jsonResponse(['message'=>"Usuário deletado com sucesso"]);
        }else{
            return jsonResponse(['message'=>"Erro ao deletar"], 400);

        }
    }

    public static function atualizar($connect, $id, $data){
        $result = UsuarioModel::atualizar($connect, $id, $data);
        if($result){
            return jsonResponse(['message'=>"Usuário atualizado com sucesso"]);
        }else{
            return jsonResponse(['message'=>"Erro ao atualizar"], 400);

        }

    }

}
?>
