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
        // Seleciona todos os autores com aliases para manter compatibilidade com as views
        $sql = "SELECT id_autor AS ID_AUTOR, nome_autor AS NOME_AUTOR, nacionalidade AS NACIONALIDADE FROM AUTORES";
        // Obtém a conexão com o banco de dados
        $conn = Conexao::getConn();
        // Executa a query
        $stmt = $conn->query($sql);
        // Retorna todos os resultados em um array associativo
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Alias para manter compatibilidade com controllerLivro
    public function listarTodos(){
        return $this->listar();
    }
}
?>
