<?php
require_once __DIR__ . "/../controllers/authController.php";
 
 
if ($_SERVER['REQUEST_METHOD'] === "POST"){
    $opcao = $segments[2] ?? null;
    $data = json_decode(file_get_contents('php://input'), true);
 
    if($opcao = "cliente"){ //login Cliente
        AuthController::loginCliente($connect, $data);
    }
    elseif($opcao = "funcionario"){ //login Funcionário
        AuthController::login($connect, $data);
    }
}else{
    jsonResponse([
        'status'=>'erro',
        'message'=>'Método não permitido'
    ], 405);
}
?>