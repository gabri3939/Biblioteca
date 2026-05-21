<?php
require_once __DIR__ . '/../config/conexao.php';

class categoriaModel {

    public function inserir($nome){

        $sql = "INSERT INTO CATEGORIAS (NOME_CATEGORIA) VALUES (:nome)";

        $conn = Conexao::getConn();
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':nome', $nome);

        return $stmt->execute();
    }

    public function listar(){
        // Seleciona todas as categorias com aliases para manter compatibilidade com as views
        $sql = "SELECT id_categoria AS ID_CATEGORIA, nome_categoria AS NOME_CATEGORIA FROM CATEGORIAS";
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
