<?php
require_once __DIR__ . "/../models/QuartoModel.php";


class QuartoController{
    
    public static $labels = ['nome', 'numero', 'qtd_cama_casal', 'qtd_cama_solteiro', 'preco', 'disponivel'];

    public static function criar($connect, $data){
        $validar = validadorController::issetData($data, self::$labels);
        
        if( !empty($validar) ){
            $dados = implode(", ", $validar);
            return jsonResponse(['message'=>"Erro, Falta o campo: ".$dados], 400);
        }

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
    public static function buscarDisponiveis($connect, $data){
        validadorController::dataHora($data, [])


        $result = QuartoModel::buscarDisponiveis($connect, $data);
        if($result){
            return jsonResponse(['Quartos'=>$result]);    
        }else{
            return jsonResponse(['message'=>'asdsfaf'],400);
 
        }  
    }

}
?>