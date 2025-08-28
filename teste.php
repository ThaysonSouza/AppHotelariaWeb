<?php
    require_once __DIR__ . "/controllers/AuthController.php";
    require_once __DIR__ . "/controllers/PasswordController.php";

    $data = [
        "email"=>"thayson.silva@gmail.com",
        "senha"=>'987654321'
    ];
    
    AuthController::login($connect, $data);

   //echo PasswordController::generateHash($data['senha']);

   //$hash = '$2y$10$kPfp3f5Ao8Bx6nRWb2JNruQX3sq7xiwp77FWk068HMgAfpEVNPBju';

   //echo "<br>";

   //echo PasswordController::validateHash($data ['senha'], $hash);
?>    