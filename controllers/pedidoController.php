<?php
require_once  "validadorController.php";
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

    public static function ordemPedido($connect, $data){
        $data["id_usuario_fk"] = isset($data['id_usuario_fk'] ? $data['id_usuario_fk']: null);

        ValidatorController::validate_data($data,["id_cliente_fk", "pagamento", "quartos"]);
        foreach($data['quartos'] as $index => $quarto){
            ValidatorController::validate_data($quarto,["id", "dataInicio", "dataFim"]);
        }

        if (count($data['quartos']) == 0){
            return jsonResponse(['message'=>"nao existe reservas"], 400);

        }

        foreach($data['quartos'] as $index => $horas){
            ValidatorController::dataHora($horas,["dataInicio", "dataFim"]);
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
