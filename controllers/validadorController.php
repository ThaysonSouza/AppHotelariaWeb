<?php
class ValidatorController{

    public static function validate_data($data, $labels){
        $pendets = [];
        foreach ($labels as $lbl){
            if (!isset($data[$lbl]) && empty($data[$lbl]) ){
                $pendets[] = $lbl;
            }
        }
        return $pendets;
    }
}
?>
