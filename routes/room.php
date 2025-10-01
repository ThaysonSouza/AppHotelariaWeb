<?php
require_once __DIR__ . "/../controllers/QuartoController.php";

if ( $_SERVER['REQUEST_METHOD'] === "GET" ){
    $id = $segments[2] ?? null;
    if (isset($id)){
        if (is_numeric($id)){
            quartoController::buscarPorId($conn, $id);
        }else{
            $inicio = isset($_GET['inicio']) ? $_GET['inicio'] : null;
            $fim = isset($_GET['fim']) ? $_GET['fim'] : null;
            $qtd = isset($_GET['qtd']) ? $_GET['qtd'] : null;
            RoomController::get_available($conn, ["data_inicio"=>$inicio, "data_fim"=>$fim, "qtd"=>$qtd]);
        }
    }else{
        RoomController::getAll($conn);
    }
}
elseif ($_SERVER['REQUEST_METHOD'] === "DELETE"){
    $id = $seguimentos[2] ?? null;
    
    if(isset($id)){
        QuartoController::delete($connect, $id);
    }else{
        jsonResponse(['messagem' =>'É necessario passar o ID'], 400);
    }   
}
elseif ($_SERVER['REQUEST_METHOD'] === "POST"){
    $data = json_decode(file_get_contents('php://input'), true);
    QuartoController::criar($connect, $data);
}
elseif($_SERVER['REQUEST_METHOD'] === "PUT"){
    $data = json_decode(file_get_contents('php://input'), true);
    $id = $data['id'];
    QuartoController::atualizar($connect, $id, $data);    
    
}
elseif ($_SERVER['REQUEST_METHOD'] === "GET"){
    

}

else{
    jsonResponse([
        'status'=>'erro',
        'menssagem'=>'Metodo nao permitido'
    ], 405);
}


?>