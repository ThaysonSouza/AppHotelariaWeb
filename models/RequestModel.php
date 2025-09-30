<?php

class RequestModel {
    
    /**
     * Cria uma nova solicitação no banco de dados
     * @param $conn - Conexão com o banco
     * @param $data - Dados da solicitação
     * @return bool - Sucesso da operação
     */
    public static function create($conn, $data) {
        $sql = "INSERT INTO solicitacoes (tipo, descricao, status, cliente_id, data_criacao) VALUES (?, ?, ?, ?, NOW())";
        $stmt = $conn->prepare($sql);
        
        if (!$stmt) {
            return false;
        }
        
        $stmt->bind_param("sssi", 
            $data['tipo'], 
            $data['descricao'], 
            $data['status'], 
            $data['cliente_id']
        );
        
        return $stmt->execute();
    }

    /**
     * Busca todas as solicitações com informações do cliente
     * @param $conn - Conexão com o banco
     * @return array - Lista de solicitações
     */
    public static function getAll($conn) {
        $sql = "SELECT s.*, c.nome as cliente_nome FROM solicitacoes s 
                LEFT JOIN clientes c ON s.cliente_id = c.id 
                ORDER BY s.data_criacao DESC";
        $result = $conn->query($sql);
        
        if (!$result) {
            return [];
        }
        
        $requests = [];
        while ($row = $result->fetch_assoc()) {
            $requests[] = $row;
        }
        
        return $requests;
    }

    /**
     * Busca uma solicitação específica por ID
     * @param $conn - Conexão com o banco
     * @param $id - ID da solicitação
     * @return array|null - Dados da solicitação ou null
     */
    public static function getById($conn, $id) {
        $sql = "SELECT s.*, c.nome as cliente_nome FROM solicitacoes s 
                LEFT JOIN clientes c ON s.cliente_id = c.id 
                WHERE s.id = ?";
        $stmt = $conn->prepare($sql);
        
        if (!$stmt) {
            return null;
        }
        
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        return $result->fetch_assoc();
    }

    /**
     * Deleta uma solicitação
     * @param $conn - Conexão com o banco
     * @param $id - ID da solicitação
     * @return bool - Sucesso da operação
     */
    public static function delete($conn, $id) {
        $sql = "DELETE FROM solicitacoes WHERE id = ?";
        $stmt = $conn->prepare($sql);
        
        if (!$stmt) {
            return false;
        }
        
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    /**
     * Atualiza uma solicitação
     * @param $conn - Conexão com o banco
     * @param $id - ID da solicitação
     * @param $data - Novos dados
     * @return bool - Sucesso da operação
     */
    public static function update($conn, $id, $data) {
        $sql = "UPDATE solicitacoes SET tipo = ?, descricao = ?, status = ?, cliente_id = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        
        if (!$stmt) {
            return false;
        }
        
        $stmt->bind_param("sssii", 
            $data['tipo'], 
            $data['descricao'], 
            $data['status'], 
            $data['cliente_id'],
            $id
        );
        
        return $stmt->execute();
    }

    /**
     * Busca solicitações de um cliente específico
     * @param $conn - Conexão com o banco
     * @param $clientId - ID do cliente
     * @return array - Lista de solicitações do cliente
     */
    public static function getByClient($conn, $clientId) {
        $sql = "SELECT * FROM solicitacoes WHERE cliente_id = ? ORDER BY data_criacao DESC";
        $stmt = $conn->prepare($sql);
        
        if (!$stmt) {
            return [];
        }
        
        $stmt->bind_param("i", $clientId);
        $stmt->execute();
        $result = $stmt->get_result();
        
        $requests = [];
        while ($row = $result->fetch_assoc()) {
            $requests[] = $row;
        }
        
        return $requests;
    }

    /**
     * Atualiza apenas o status de uma solicitação
     * @param $conn - Conexão com o banco
     * @param $id - ID da solicitação
     * @param $status - Novo status
     * @return bool - Sucesso da operação
     */
    public static function updateStatus($conn, $id, $status) {
        $sql = "UPDATE solicitacoes SET status = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        
        if (!$stmt) {
            return false;
        }
        
        $stmt->bind_param("si", $status, $id);
        return $stmt->execute();
    }
}

?>
