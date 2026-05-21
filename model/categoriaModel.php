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
        $sql = "SELECT * FROM CATEGORIAS";
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
