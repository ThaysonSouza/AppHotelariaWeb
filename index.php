<?php

require_once "config/database.php";
require_once "helpers/response.php";
require_once "helpers/token_jwt.php";

if ($error) {
    echo "erro na conexão";
    exit;
}

$uri = strtolower(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$method = $_SERVER['REQUEST_METHOD'];

$baseFolder = strtolower(basename(dirname(__FILE__)));
$uri = str_replace("/$baseFolder", "", $uri);
$segmentos = explode("/", trim($uri, "/"));

$route = $segmentos[0] ?? null;
$subRoute = $segmentos[1] ?? null;

if ($route != "api") {
    require __DIR__ . "/public/index.html";
    exit;
} elseif ($route === "api") {
    if (in_array($subRoute, ["login", "room", "user", "clientelogin", "cliente", "adicional", "pedido", "reserva", "fotos"])) {
        require "routes/${subRoute}.php";
    } else {
        return jsonResponse(['message' => 'rota não encontrada'], 404);
    }
    exit;
} else {
    echo "404 página não encontrada";
    exit;
}

?>