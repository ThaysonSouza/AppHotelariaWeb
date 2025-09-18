<?php
require_once "config/database.php";
require_once 'helpers/response.php';



if($error){
    echo "erro de conexao";
    exit;
}
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$method = $_SERVER['REQUEST_METHOD'];

$pasta = basename(dirname(__FILE__));
$uri = str_replace("/$pasta","",$uri);
$seguimentos = explode("/", trim($uri, "/"));

$rota = $seguimentos[0] ?? null;
$subRota = $seguimentos[1] ?? null;

//(condiçao? true : false 

if($rota != "api"){
    require __DIR__ . "/public/index.html";
    // require "teste.php";
    exit;
}

elseif($rota === "api"){
    if (in_array ($subRota, ["login","room"])){
        require "routes/${subRota}.php";
    }else{
        return jsonResponse(['mensage'=>'rota nao encontrada'], 404);
    }
    exit;
}
else{
    echo "404 pagina nao encontrada";
    exit;
}


?>