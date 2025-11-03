<?php 
require_once __DIR__ . "/jwt/jwt_include.php";
use Firebase\JWT\JWT;
use Firebase\JWT\key;

function createToken($user){
    $payload = [
        "iss" => "primesite",
        "iat" => time(),
        "exp" => time() + (60 * (60 * 1)),
        "sub" => $user

    ];
    return JWT::encode($payload, SECRET_KEY, "HS256");
}

function validateToken($token){
    
    try{
        $key = new Key(SECRET_KEY, "HS256");
        $decode = JWT::decode($token, $key);
        $result = json_decode( json_encode($decode->sub) , true);
        return $result;
    }
    catch(Exception $error){
        return false; 
    }
}

function validateTokenAPI($typeRole){
    $headers = getallheaders();
    if(!isset($headers["Authorization"]) ){
        jsonResponse(["mensagem" => "Está faltando o token"],401);
        exit;
    }
    $token = str_replace("Bearer ", "", $headers["Authorization"]);
    $user = validateToken($token); 
    if(!$user){
        jsonResponse(["mensagem" => "O token está inválido"],401);
        exit;
    }
    //aqui vai ser a logica de validar cargo
    if ($user['cargo'] != $typeRole){
        jsonResponse(['mensagem' => "Usuário não autorizado"], 401);
        exit;
    }
    return $user;
}
?>