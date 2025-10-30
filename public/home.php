<?php
    require_once '../config/database.php';
    require_once '../controllers/AuthController.php';
    $title = "Home";
   //require_once 'utils/cabecalho.php';

   $data = [
    "email"=>"thayson.silva@gmail.com",
    "senha"=>"987654321"
   ];

   AuthController::login($connect, $data);
    
?>
<h1>Home</h1>

<?php
require_once 'utils/rodape.php';
?>
