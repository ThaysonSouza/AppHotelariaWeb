<?php
require_once __DIR__ . "/../controllers/AdicionalController.php";

if ($_SERVER['REQUEST_METHOD'] === "GET"){
    $id = $seguimentos[2] ?? null;   
    if(isset($id)){
        AdicionalController::buscarPorId($connect, $id);
    }else{
        AdicionalController::listarTodos($connect);
    }
}
elseif ($_SERVER['REQUEST_METHOD'] === "DELETE"){
    $id = $seguimentos[2] ?? null;
    $user = validateTokenAPI("Gerente");
    if(isset($id)){
        AdicionalController::delete($connect, $id);
    }else{
        jsonResponse(['messagem' =>'É necessario passar o ID'], 400);
    }   
}
elseif ($_SERVER['REQUEST_METHOD'] === "POST"){
    $user = validateTokenAPI("Gerente");
    $data = json_decode(file_get_contents('php://input'), true);
    AdicionalController::criar($connect, $data);
}
elseif($_SERVER['REQUEST_METHOD'] === "PUT"){
    $user = validateTokenAPI("Gerente");
    $data = json_decode(file_get_contents('php://input'), true);
    $id = $data['id'];
    AdicionalController::atualizar($connect, $id, $data);    
    
}

else{
    jsonResponse(['status'=>'erro','menssagem'=>'Metodo nao permitido'], 405);
}


?>
