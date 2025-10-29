<?php
require_once __DIR__ . "/../controllers/QuartoController.php";

if ( $_SERVER['REQUEST_METHOD'] === "GET" ){
    $id = $segments[2] ?? null;

    if (isset($id)){
        if (is_numeric($id)){
            quartoController::buscarPorId($connect, $id);

        }elseif($id === "disponivel"){ // cliente os disponiveis -> (API/ROOMS/DISPONIVEIS?)
            $data = [
                "dataInicio" => isset($_GET['dataInicio']) ? $_GET['dataInicio'] : null,
                "dataFim" => isset($_GET['dataFim']) ? $_GET['dataFim'] : null,
                "qtd" => isset($_GET['qtd']) ? $_GET['qtd'] : null];
            quartoController::buscarDisponiveis($connect, $data);
        }else{
            jsonResponse(['mensagem' =>'Rota nao identificada'], 400);
        }
    }else{
            quartoController::listarTodos($connect);
    }
}

elseif ($_SERVER['REQUEST_METHOD'] === "DELETE"){
    $id = $segments[2] ?? null;
    
    if(isset($id)){
        QuartoController::delete($connect, $id);
    }else{
        jsonResponse(['mensagem' =>'É necessario passar o ID'], 400);
    }   
}

elseif ($_SERVER['REQUEST_METHOD'] === "POST"){
    $data = $_POST;
    $data['imagens'] = $_FILES['imagens'] ?? null;
    QuartoController::criar($connect, $data);
}

elseif($_SERVER['REQUEST_METHOD'] === "PUT"){
    $data = json_decode(file_get_contents('php://input'), true);
    $id = $data['id'];
    QuartoController::atualizar($connect, $id, $data);     
}

else{
    jsonResponse([ 'status'=>'erro', 'mensagem'=>'Metodo nao permitido'], 405);
}


?>