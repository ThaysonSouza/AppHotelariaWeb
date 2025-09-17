<?php
require_once __DIR__ . "/../controllers/quartoController.php";

if ($_SERVER['REQUEST_METHOD'] === "GET"){
    $id = $seguimentos[2] ?? null;   
    if(isset($id)){
        quartoController::buscarPorId($connect, $id);
    }else{
        quartoController::listarTodos($connect);
    }
}
elseif ($_SERVER['REQUEST_METHOD'] === "DELETE"){
    $id = $seguimentos[2] ?? null;
    
    if(isset($id)){
        quartoController::delete($connect, $id);
    }else{
        jsonResponse(['messagem' =>'É necessario passar o ID'], 400);
    }   
}
elseif ($_SERVER['REQUEST_METHOD'] === "POST"){
    $data = json_decode(file_get_contents('php://input'), true);
    quartoController::criar($connect, $data);
}
elseif($_SERVER['REQUEST_METHOD'] === "PUT"){
    $data = json_decode(file_get_contents('php://input'), true);
    $id = $data['id'];
    quartoController::atualizar($connect, $id, $data);    
    
}

else{
    jsonResponse([
        'status'=>'erro',
        'menssagem'=>'Metodo nao permitido'
    ], 405);
}


?>