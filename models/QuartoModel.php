<?php
    class QuartoModel {
        public static function listarTodos($connect){
            $MYsql = "SELECT * FROM quartos"; 
            $result = $connect->query($MYsql);
            return $result->fetch_all(MYSQLI_ASSOC);           

        }
        public static function buscarPorId($connect, $id){
            $MYsql = "SELECT * FROM quartos WHERE id = ?";
            $stmt = $connect->prepare($MYsql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            return $stmt->get_result()->fetch_assoc(); 
        }
        public static function criar($connect, $data){
            $MYsql = "INSERT INTO quartos(nome, numero, camaSolteiro, camaCasal, disponivel, preco)VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $connect->prepare($MYsql);
            $stmt->bind_param("siiibd", 
            $data["nome"],
            $data["numero"],
            $data["camaCasal"],
            $data["camaSolteiro"],
            $data["disponivel"],
            $data["preco"]);
            if ($stmt->execute()){
            return $connect->insert_id;
            }
            return false;
        }
        public static function atualizar($connect, $id, $data){
            $MYsql = "UPDATE quartos SET nome = ?, numero = ?, camaSolteiro = ?,  camaCasal = ?, disponivel = ?, preco = ? WHERE id = ?";
            $stmt = $connect->prepare($MYsql);
            $stmt->bind_param("siiibdi", 
            $data["nome"],
            $data["numero"],
            $data["camaCasal"],
            $data["camaSolteiro"],
            $data["disponivel"],
            $data["preco"],
            $id
        );
            return $stmt->execute();

        }
        public static function deletar($connect, $id){
            $MYsql = "DELETE FROM quartos WHERE id = ?";
            $stmt = $connect->prepare($MYsql);
            $stmt->bind_param("i", $id);
            return $stmt->execute(); 
        }
        public static function buscarDisponiveis($connect, $data){
            $MYsql =
            "SELECT * FROM quartos q WHERE q.disponivel = 1
            AND ((q.camaCasal * 2) + q.camaSolteiro) >= ? AND q.id NOT IN (
                SELECT r.id_quarto_fk FROM reservas r
                WHERE (r.dataFim >= ? AND r.dataInicio <= ?)
            )";
            $stmt = $connect->prepare($MYsql);
            $stmt->bind_param("iss",
                $data["qtd"],
                $data["dataInicio"],
                $data["dataFim"]
            );
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        }
        public static function bloquearPorId($connect, $id){
            $sql = "SELECT id FROM quartos WHERE id = ? FOR UPDATE";
            $stmt = $connect->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result && $result->num_rows > 0;
            $stmt->close();
            return $row;
        }

    }?>