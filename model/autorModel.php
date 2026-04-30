<?php
require_once __DIR__ . '/../config/conexao.php';

class autorModel {

    public function inserir($nome, $nacionalidade){

        $sql = "INSERT INTO AUTORES (NOME_AUTOR, NACIONALIDADE) VALUES (:nome, :nacionalidade)";

        $conn = Conexao::getConn();
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':nacionalidade', $nacionalidade);

        return $stmt->execute();
    }

    public function listar(){
        $sql = "SELECT * FROM AUTORES";
        $conn = Conexao::getConn();
        $stmt = $conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Alias para manter compatibilidade com controllerLivro
    public function listarTodos(){
        return $this->listar();
    }
}
?>
