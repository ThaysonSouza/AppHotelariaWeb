<?php
require_once __DIR__ . "/../models/QuartoModel.php";
require_once __DIR__ . "/validadorController.php";
require_once __DIR__ . "/UploadController.php";
require_once __DIR__ . "/../models/FotoModel.php";


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
            return jsonResponse(['mensagem'=>"Quarto deletado com sucesso"]);
        }else{
            return jsonResponse(['mensagem'=>"Erro ao deletar"], 400);

        }
    }

    public static function atualizar($connect, $id, $data){
        $result = QuartoModel::atualizar($connect, $id, $data);
        if($result){
            return jsonResponse(['mensagem'=>"Quarto atualizado com sucesso"]);
        }else{
            return jsonResponse(['mensagem'=>"Erro ao atualizar"], 400);

        }
    }
    public static function buscarDisponiveis($connect, $data){

        ValidatorController::validate_data($data, ["dataInicio", "dataFim", "qtd"]);

        $data["dataInicio"] = ValidatorController::dataHora($data["dataInicio"], 14);
        $data["dataFim"] = ValidatorController::dataHora($data["dataFim"], 12);
        // se após normalização o fim não for depois do início, ajusta fim para +1 dia às 12:00
        if (strtotime($data["dataFim"]) <= strtotime($data["dataInicio"])){
            $dt = new DateTime($data["dataFim"]);
            $dt->modify('+1 day');
            $dt->setTime(12, 0, 0);
            $data["dataFim"] = $dt->format('Y-m-d H:i:s');
        }

        $result = QuartoModel::buscarDisponiveis($connect, $data);
        $quartos = is_array($result) ? $result : [];
        foreach($quartos as &$quarto){
            $quarto['imagens'] = FotoModel::buscarPorIdQuarto($connect, $quarto['id']);
        }
        return jsonResponse(['Quartos' => $quartos]);
    }

}
?>