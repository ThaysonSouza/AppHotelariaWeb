<?php
require_once __DIR__ . "/../controllers/QuartoController.php";

if ($_SERVER['REQUEST_METHOD'] === "GET"){
    // /api/room/available?inicio=YYYY-MM-DD&fim=YYYY-MM-DD&qtdPessoas=2
    $action = $seguimentos[2] ?? null;
    if ($action === 'available'){
        $inicio = $_GET['inicio'] ?? null;
        $fim = $_GET['fim'] ?? null;
        $qtdPessoas = isset($_GET['qtdPessoas']) ? (int)$_GET['qtdPessoas'] : null;
        if(!$inicio || !$fim || !$qtdPessoas){
            jsonResponse(['mensagem' => 'Parâmetros obrigatórios: inicio, fim, qtdPessoas'], 400);
        }
        QuartoController::buscarDisponiveis($connect, $inicio, $fim, $qtdPessoas);
    } else {
        $id = $seguimentos[2] ?? null;   
        if(isset($id)){
            QuartoController::buscarPorId($connect, $id);
        }else{
            QuartoController::listarTodos($connect);
        }
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