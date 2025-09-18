<?php
require_once __DIR__ . "/../models/AdicionalModel.php";

class AdicionalController{
    public static function criar($connect, $data){
        $result = AdicionalModel::criar($connect, $data);
        if($result){
            return jsonResponse(['message'=>"Adicional criado com sucesso"]);
        }else{
            return jsonResponse(['message'=>"Erro ao criar"], 400);

        }

    }

    public static function listarTodos($connect){
        $listaAdicionais = AdicionalModel::listarTodos($connect);
        return jsonResponse($listaAdicionais);

    }

    public static function buscarPorId($connect, $id){
        $buscaId = AdicionalModel::buscarPorId($connect, $id);
        return jsonResponse($buscaId);
    }

    public static function delete($connect, $id){
        $result = AdicionalModel::deletar($connect, $id);
        if($result){
            return jsonResponse(['message'=>"Adicional deletado com sucesso"]);
        }else{
            return jsonResponse(['message'=>"Erro ao deletar"], 400);

        }
    }

    public static function atualizar($connect, $id, $data){
        $result = AdicionalModel::atualizar($connect, $id, $data);
        if($result){
            return jsonResponse(['message'=>"Adicional atualizado com sucesso"]);
        }else{
            return jsonResponse(['message'=>"Erro ao atualizar"], 400);

        }

    }

}
?>
