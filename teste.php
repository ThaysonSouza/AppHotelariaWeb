<?php
    require_once __DIR__ . "/controllers/authController.php";
    require_once __DIR__ . "/controllers/PasswordController.php";

    $data = [
        "email"=>"thayson.silva@gmail.com",
        "senha"=>'987654321'
    ];
    
    //authController::login($connect, $data);

    //$tokeninvalido = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJwcmltZXNpdGUiLCJpYXQiOjE3NTY5MjMyODgsImV4cCI6MTc1NjkyNjg4OCwic3ViIjp7ImlkIjo2LCJub21lIjoiVGhheXNvbiBTb3V6YSIsImVtYWlsIjoidGhheXNvbi5zaWx2YUBnbWFpbC5jb20iLCJjYXJnbyI6IlQuSSJ9fQ.VKmBEadNCk1QlSyw9M_PEWOdTcS3i7sxJws39WKAg7Y";
    

    $tokenvalido = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJwcmltZXNpdGUiLCJpYXQiOjE3NTY5MzAxMjUsImV4cCI6MTc1NjkzMzcyNSwic3ViIjp7ImlkIjo2LCJub21lIjoiVGhheXNvbiBTb3V6YSIsImVtYWlsIjoidGhheXNvbi5zaWx2YUBnbWFpbC5jb20iLCJjYXJnbyI6IlQuSSJ9fQ.gqYm5eKlwZE30oofDzDueW2arAwJv8MpjZX3cuS3bmE";
    
    echo var_dump(validateToken($tokenvalido));
    //echo PasswordController::generateHash($data['senha']);

    //$hash = '$2y$10$kPfp3f5Ao8Bx6nRWb2JNruQX3sq7xiwp77FWk068HMgAfpEVNPBju';

    //echo "<br>";

    //echo PasswordController::validateHash($data ['senha'], $hash);
?>    