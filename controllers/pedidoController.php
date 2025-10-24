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
     public static function createOrder($connect, $data){
        $data["id_usuario_fk"] = isset($data['id_usuario_fk']) ? $data['id_usuario_fk']: null;

        ValidatorController::validate_data($data, ["id_usuario_fk", "pagamento", "quartos"]);

        foreach($data['quartos'] as $quarto){
            ValidatorController::validate_data($quarto, ["id", "inicio", "fim"]);

            $quarto["inicio"] = ValidatorController::dataHora($quarto["inicio"], 14);
            $quarto["fim"] = ValidatorController::dataHora($quarto["fim"], 12);
        }
        
        if ( count($data["quartos"]) == 0){
            return jsonResponse(['message'=> 'Não existe reservas'], 400);
        }

        try{
            $resultado = PedidoModel::criarOrdem($connect, $data);
            return jsonResponse(['message' => $resultado]);
            
        }catch(\Throwable $erro){
            return jsonResponse(['message' => $erro->getMessage()], 500);
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
