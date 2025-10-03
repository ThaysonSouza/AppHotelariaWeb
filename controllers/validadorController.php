<?php
class ValidatorController{

    public static function validate_data($data, $campos){
        $pendente = [];
        foreach ($campos as $lbl){
            if (!isset($data[$lbl]) && empty($data[$lbl]) ){
                $pendente[] = $lbl;
            }
        }
        if (!empty($pendente) ){
            $pendente = implode(", ", $pendente);
            jsonResponse(['menssagem'=>"Erro, Falta o campo: ".$pendente],400);
            exit;
        }
    }
    public static function dataHora($data, $hora) {
        $dataHora = new DateTime($data);
        $dataHora->setTime($hora, 0, 0);
        return $dataHora->format('Y-m-d H:i:s');
    }

}
?>
