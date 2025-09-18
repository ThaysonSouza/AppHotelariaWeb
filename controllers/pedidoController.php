<?php
require_once __DIR__ . "/../models/PedidoModel.php";

class PedidoController{
    public static function criar($connect, $data){
        $result = PedidoModel::criar($connect, $data);
        if($result){
            return jsonResponse(['message'=>"Pedido criado com sucesso"]);
        }else{
            return jsonResponse(['message'=>"Erro ao criar"], 400);

        }

    }

    public static function listarTodos($connect){
        $listaPedidos = PedidoModel::listarTodos($connect);
        return jsonResponse($listaPedidos);

    }

    public static function buscarPorId($connect, $id){
        $buscaId = PedidoModel::buscarPorId($connect, $id);
        return jsonResponse($buscaId);
    }

    public static function delete($connect, $id){
        $result = PedidoModel::deletar($connect, $id);
        if($result){
            return jsonResponse(['message'=>"Pedido deletado com sucesso"]);
        }else{
            return jsonResponse(['message'=>"Erro ao deletar"], 400);

        }
    }

    public static function atualizar($connect, $id, $data){
        $result = PedidoModel::atualizar($connect, $id, $data);
        if($result){
            return jsonResponse(['message'=>"Pedido atualizado com sucesso"]);
        }else{
            return jsonResponse(['message'=>"Erro ao atualizar"], 400);

        }

    }

}
?>
