<?php

require_once __DIR__ . "/../controllers/RequestController.php";

// Rota GET - Buscar solicitações
if ($_SERVER['REQUEST_METHOD'] === "GET") {
    $id = $segments[2] ?? null;
    $action = $segments[2] ?? null;
    
    // Buscar solicitações de um cliente específico
    if ($action === 'client') {
        $clientId = $segments[3] ?? null;
        if (isset($clientId)) {
            RequestController::getByClient($connect, $clientId);
        } else {
            jsonResponse(['message' => 'ID do cliente necessário'], 400);
        }
    } 
    // Buscar uma solicitação específica por ID
    elseif (isset($id)) {
        RequestController::getById($connect, $id);
    } 
    // Listar todas as solicitações
    else {
        RequestController::getAll($connect);
    }

// Rota DELETE - Deletar solicitação
} elseif ($_SERVER['REQUEST_METHOD'] === "DELETE") {
    $data = json_decode(file_get_contents('php://input'), true);
    $id = $data['id'] ?? $segments[2] ?? null;

    if (isset($id)) {
        RequestController::delete($connect, $id);
    } else {
        jsonResponse(['message' => 'ID necessário!'], 400);
    }

// Rota POST - Criar nova solicitação
} elseif ($_SERVER['REQUEST_METHOD'] === "POST") {
    $data = json_decode(file_get_contents('php://input'), true);
    
    // Verifica se os campos obrigatórios estão presentes
    if (isset($data['tipo']) && isset($data['descricao'])) {
        RequestController::create($connect, $data);
    } else {
        jsonResponse(['message' => 'Atributos de requisição inválidos ou incompletos.'], 400);
    }

// Rota PUT - Atualizar solicitação
} elseif ($_SERVER['REQUEST_METHOD'] === "PUT") {
    $data = json_decode(file_get_contents('php://input'), true);
    $id = $data['id'] ?? $segments[2] ?? null;
    $action = $segments[2] ?? null;
    
    // Atualizar apenas o status
    if ($action === 'status' && isset($id)) {
        $status = $data['status'] ?? null;
        if ($status) {
            RequestController::updateStatus($connect, $id, $status);
        } else {
            jsonResponse(['message' => 'Status necessário'], 400);
        }
    } 
    // Atualizar solicitação completa
    elseif (isset($id, $data)) {
        RequestController::update($connect, $id, $data);
    } else {
        jsonResponse(['message' => 'Atributos inválidos!'], 400);
    }

// Método não permitido
} else {
    jsonResponse([
        'status' => 'erro',
        'message' => 'Método não permitido'
    ], 405);
}

?>
