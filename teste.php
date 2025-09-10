<?php
    require_once __DIR__ . "/controllers/quartoController.php";
    require_once __DIR__ . "/controllers/PasswordController.php";

   $data = [
       "email" => "thayson.silva@gmail.com",
      "senha" => 123 
   ];

    //$data = [
    //    "nome" => "Quarto casal",
    //    "numero" => 10,
    //    "camaSolteiro" => 3, 
    //    "camaCasal" => 5,
    //    "disponivel" => 0,
    //    "preco" => 500   
    //];

    QuartoController::listarTodos($connect);

    //QuartoController::criar($connect, $data);

    //QuartoController::buscarPorId($connect, $id = 4);

    //QuartoController::delete($connect, $id = 1);

    //QuartoController::atualizar($connect, $id = 3, $data);

    //authController::login($connect, $data);
    //$tokeninvalido = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJwcmltZXNpdGUiLCJpYXQiOjE3NTY5MjMyODgsImV4cCI6MTc1NjkyNjg4OCwic3ViIjp7ImlkIjo2LCJub21lIjoiVGhheXNvbiBTb3V6YSIsImVtYWlsIjoidGhheXNvbi5zaWx2YUBnbWFpbC5jb20iLCJjYXJnbyI6IlQuSSJ9fQ.VKmBEadNCk1QlSyw9M_PEWOdTcS3i7sxJws39WKAg7Y";
    //$tokenvalido = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJwcmltZXNpdGUiLCJpYXQiOjE3NTY5MzAxMjUsImV4cCI6MTc1NjkzMzcyNSwic3ViIjp7ImlkIjo2LCJub21lIjoiVGhheXNvbiBTb3V6YSIsImVtYWlsIjoidGhheXNvbi5zaWx2YUBnbWFpbC5jb20iLCJjYXJnbyI6IlQuSSJ9fQ.gqYm5eKlwZE30oofDzDueW2arAwJv8MpjZX3cuS3bmE";
    //echo var_dump(validateToken($tokenvalido));
    
    
    // echo PasswordController::generateHash($data['senha']);
    //$hash = '$2y$10$9Ky5vtX9L18PrnC0EN8bSeWsEqFaSCJg4fCpFZXwuS2RwJEZDIG/O';
    //echo "<br>";
    //echo PasswordController::validateHash($data ['senha'], $hash);
?>    