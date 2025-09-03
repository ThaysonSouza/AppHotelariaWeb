<?php
require_once __DIR__ . '/../controllers/authController.php';
if ($_SERVER['REQUEST_METHOD'] === "POST"){
    $data = json_decode(file_get_contents('php://input'), true);
    authController::login($connect, $data);
}else{
    jsonResponse([
        'status'=>'erro',
        'menssagem'=>'Metodo nao permitido'
    ], 405);
}
?>