<?php
require_once __DIR__ . "/../models/ReservaModel.php";

class ReservaController{
    public static function criar($connect, $data){
        ValidatorController::validate_data($data, ["id_pedido_fk", "id_quarto_fk", "id_adicional_fk", "dataInicio","dataFim"])
        
        $data["dataInicio"] = Validator::dataHora($data["dataInicio"], 14)
        $data["dataFim"] = ValidatorController::dataHora($data["dataFim"], 12)
        
        $result = ReservaModel::criar($connect, $data);
        if($result){
            return jsonResponse(['message'=>"Reserva criada com sucesso"]);
        }else{
            return jsonResponse(['message'=>"Erro ao criar"], 400);

        }
    }
    public static function searchByRequest($connect, $pedido_id) {
        $result = ReservaModel::searchByRequest($connect, $pedido_id);
        return jsonResponse($result);
    }  

    public static function listarTodos($connect){
        $listaReservas = ReservaModel::listarTodos($connect);
        return jsonResponse($listaReservas);

    }

    public static function buscarPorId($connect, $id){
        $buscaId = ReservaModel::buscarPorId($connect, $id);
        return jsonResponse($buscaId);
    }

    public static function delete($connect, $id){
        $result = ReservaModel::deletar($connect, $id);
        if($result){
            return jsonResponse(['message'=>"Reserva deletada com sucesso"]);
        }else{
            return jsonResponse(['message'=>"Erro ao deletar"], 400);

        }
    }

    public static function atualizar($connect, $id, $data){
        $result = ReservaModel::atualizar($connect, $id, $data);
        if($result){
            return jsonResponse(['message'=>"Reserva atualizada com sucesso"]);
        }else{
            return jsonResponse(['message'=>"Erro ao atualizar"], 400);

        }

    }

    public static function listarPorPedido($connect, $id_pedido){
        $reservasPedido = ReservaModel::listarPorPedido($connect, $id_pedido);
        return jsonResponse($reservasPedido);
    }

}
?>