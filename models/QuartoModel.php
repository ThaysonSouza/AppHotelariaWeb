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
            return $stmt->execute();
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
        public static function buscarDisponiveis($connect, $id){
            $MYsql = "SELECT quartos.id, quartos.nome, quartos.numero,
            quartos.camaCasal, quartos.camaSolteiro, quartos.preco
            FROM quartos WHERE quartos.id NOT IN (
            SELECT reservas.id_quarto_fk FROM reservas
            WHERE reservas.dataInicio < '2025-10-30' AND reservas.dataFim > '2026-11-01')";
        }
    }?>