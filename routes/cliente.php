<?php
require_once __DIR__ . "/../controllers/ClienteController.php";

if ($_SERVER['REQUEST_METHOD'] === "GET"){
    $id = $seguimentos[2] ?? null;   
    validateTokenAPI("Gerente");
    if(isset($id)){
        ClienteController::buscarPorId($connect, $id);
    }
    else{
     
        ClienteController::listarTodos($connect);
    }
}

elseif ($_SERVER['REQUEST_METHOD'] === "DELETE"){
    $id = $seguimentos[2] ?? null;
    
    if(isset($id)){
        ClienteController::delete($connect, $id);
    }
    else{
        jsonResponse(['messagem' =>'É necessario passar o ID'], 400);
    }   
}

elseif ($_SERVER['REQUEST_METHOD'] === "POST"){
    $data = json_decode(file_get_contents('php://input'), true);
    ClienteController::criar($connect, $data);
}

elseif($_SERVER['REQUEST_METHOD'] === "PUT"){
    validateTokenAPI("Gerente");
    $data = json_decode(file_get_contents('php://input'), true);
    $id = $data['id'];
    ClienteController::atualizar($connect, $id, $data);    
    
}

else{
    jsonResponse([
        'status'=>'erro',
        'menssagem'=>'Metodo nao permitido'
    ], 405);
}


?>