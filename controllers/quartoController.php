<?php
require_once __DIR__ . "/../models/QuartoModel.php";

class QuartoController{
    public static function criar($connect, $data){
        $result = QuartoModel::criar($connect, $data);
        if($result){
            return jsonResponse(['message'=>"Quarto criado com sucesso"]);
        }else{
            return jsonResponse(['message'=>"Erro ao criar"], 400);

        }

    }

    public static function listarTodos($connect){
        $listaQuartos = QuartoModel::listarTodos($connect);
        return jsonResponse($listaQuartos);

    }

    public static function buscarPorId($connect, $id){
        $buscaId = QuartoModel::buscarPorId($connect, $id);
        return jsonResponse($buscaId);
    }

    public static function delete($connect, $id){
        $result = QuartoModel::deletar($connect, $id);
        if($result){
            return jsonResponse(['message'=>"Quarto deletado com sucesso"]);
        }else{
            return jsonResponse(['message'=>"Erro ao deletar"], 400);

        }
    }

    public static function atualizar($connect, $id, $data){
        $result = QuartoModel::atualizar($connect, $id, $data);
        if($result){
            return jsonResponse(['message'=>"Quarto atualizado com sucesso"]);
        }else{
            return jsonResponse(['message'=>"Erro ao atualizar"], 400);

        }

    }

}
?>