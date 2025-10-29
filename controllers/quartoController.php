<?php
require_once __DIR__ . "/../models/QuartoModel.php";
require_once "ValidadorController.php";
require_once __DIR__ . "/UploadController.php";
require_once __DIR__ . "/../models/FotoModel";


class QuartoController{

    public static function criar($connect, $data){
        $validar = ValidatorController::validate_data($data,["nome", "numero", "camaCasal", "camaSolteiro", "preco", "disponivel"] );
        
        $result = QuartoModel::criar($connect, $data);
        if ($result){
            if (!empty($data['imagens'])){
                $fotos = UploadController::upload($data['imagens']);
                foreach(($fotos['saves'] ?? []) as $foto){
                    $idFoto = FotoModel::criar($connect, $foto['path']);
                    if ($idFoto){
                        FotoModel::criarRelacaoQuarto($connect, $result, $idFoto);
                    }
                }
            }
            return jsonResponse(['mensagem'=>"Quarto criado com sucesso"], 201);
        }else{
            return jsonResponse(['mensagem'=>"Erro ao criar o quarto"], 400);
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
    public static function buscarDisponiveis($connect, $data){

        ValidatorController::validate_data($data, ["dataInicio", "dataFim", "qtd"]);

        $data["dataInicio"] = ValidatorController::dataHora($data["dataInicio"], 14);
        $data["dataFim"] = ValidatorController::dataHora($data["dataFim"], 12);

        $result = QuartoModel::buscarDisponiveis($connect, $data);
        if($result){
            foreach($result as &$quarto){
                $quarto['imagens'] = FotoModel::buscarPorIdQuarto($connect, $quarto['id']);
            }
            return jsonResponse(['Quartos' => $result]);
        }else{
            return jsonResponse(['message'=> 'não tem quartos disponiveis'], 400);
        }
    }

}
?>