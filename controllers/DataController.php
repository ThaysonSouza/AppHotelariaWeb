<?php

class DataController {
    
    public static function issetData($labels, $data) {
        $missingFields = [];
        
        foreach ($labels as $label) {
            if (!isset($data[$label]) || empty($data[$label])) {
                $missingFields[] = $label;
            }
        }
        
        if (!empty($missingFields)) {
            return jsonResponse([
                'message' => 'Campos obrigatórios não fornecidos: ' . implode(', ', $missingFields)
            ], 400);
        }
        
        return true;
    }
    
    public static function validateEmail($email) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return jsonResponse(['message' => 'Email inválido'], 400);
        }
        return true;
    }
    
    public static function validateDate($date) {
        $d = DateTime::createFromFormat('Y-m-d', $date);
        if (!$d || $d->format('Y-m-d') !== $date) {
            return jsonResponse(['message' => 'Data inválida. Use o formato YYYY-MM-DD'], 400);
        }
        return true;
    }
    
    public static function validateRequired($data, $requiredFields) {
        $missingFields = [];
        
        foreach ($requiredFields as $field) {
            if (!isset($data[$field]) || empty($data[$field])) {
                $missingFields[] = $field;
            }
        }
        
        if (!empty($missingFields)) {
            return jsonResponse([
                'message' => 'Campos obrigatórios: ' . implode(', ', $missingFields)
            ], 400);
        }
        
        return true;
    }
}

?>
