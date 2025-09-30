<?php
require_once __DIR__ . "/../models/RequestModel.php";
require_once "DataController.php";

class RequestController {
    
    // Campos obrigatórios para criar uma solicitação
    public static $labels = ['tipo', 'descricao', 'status', 'cliente_id'];

    /**
     * Cria uma nova solicitação
     * @param $conn - Conexão com o banco de dados
     * @param $data - Dados da solicitação (tipo, descrição, status, cliente_id)
     */
    public static function create($conn, $data) {
        // Valida se todos os campos obrigatórios estão presentes
        DataController::issetData(self::$labels, $data);
        
        // Cria a solicitação no banco
        $result = RequestModel::create($conn, $data);
        if ($result) {
            return jsonResponse(['message' => 'Solicitação criada com sucesso']);
        } else {
            return jsonResponse(['message' => 'Erro inesperado'], 400);
        }
    }

    /**
     * Lista todas as solicitações
     * @param $conn - Conexão com o banco de dados
     */
    public static function getAll($conn) {
        $requestList = RequestModel::getAll($conn);
        return jsonResponse($requestList);
    }

    /**
     * Busca uma solicitação por ID
     * @param $conn - Conexão com o banco de dados
     * @param $id - ID da solicitação
     */
    public static function getById($conn, $id) {
        $request = RequestModel::getById($conn, $id);
        return jsonResponse($request);
    }

    /**
     * Deleta uma solicitação
     * @param $conn - Conexão com o banco de dados
     * @param $id - ID da solicitação
     */
    public static function delete($conn, $id) {
        $result = RequestModel::delete($conn, $id);
        if ($result) {
            return jsonResponse(['message' => 'Solicitação deletada com sucesso']);
        } else {
            return jsonResponse(['message' => 'Erro'], 400);
        }
    }

    /**
     * Atualiza uma solicitação
     * @param $conn - Conexão com o banco de dados
     * @param $id - ID da solicitação
     * @param $data - Novos dados da solicitação
     */
    public static function update($conn, $id, $data) {
        $result = RequestModel::update($conn, $id, $data);
        if ($result) {
            return jsonResponse(['message' => 'Solicitação atualizada com sucesso']);
        } else {
            return jsonResponse(['message' => 'Erro'], 400);
        }
    }

    /**
     * Busca solicitações de um cliente específico
     * @param $conn - Conexão com o banco de dados
     * @param $clientId - ID do cliente
     */
    public static function getByClient($conn, $clientId) {
        $requests = RequestModel::getByClient($conn, $clientId);
        return jsonResponse($requests);
    }

    /**
     * Atualiza apenas o status de uma solicitação
     * @param $conn - Conexão com o banco de dados
     * @param $id - ID da solicitação
     * @param $status - Novo status
     */
    public static function updateStatus($conn, $id, $status) {
        $result = RequestModel::updateStatus($conn, $id, $status);
        if ($result) {
            return jsonResponse(['message' => 'Status atualizado com sucesso']);
        } else {
            return jsonResponse(['message' => 'Erro ao atualizar status'], 400);
        }
    }
}

?>
