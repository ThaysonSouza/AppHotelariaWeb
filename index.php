<?php

require_once "config/database.php";
require_once "helpers/response.php";

if ($error) {
    echo "erro na conexão";
    exit;
}

$uri = strtolower(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$method = $_SERVER['REQUEST_METHOD'];

$baseFolder = strtolower(basename(dirname(__FILE__)));
$uri = str_replace("/$baseFolder", "", $uri);
$segments = explode("/", trim($uri, "/"));

$route = $segments[0] ?? null;
$subRoute = $segments[1] ?? null;

if ($route != "api") {
    require __DIR__ . "/public/index.html";
    exit;
} elseif ($route === "api") {
    if (in_array($subRoute, ["login", "room", "user", "cliente", "adicional", "pedido", "reserva", "request"])) {
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