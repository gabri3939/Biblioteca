<?php
require_once __DIR__ . '/../config/conexao.php';

class livroModel {

    public function inserir($titulo, $ano_publicacao, $id_autor, $id_categoria) {
        $sql = "INSERT INTO LIVROS (TITULO, ANO_PUBLICACAO, ID_AUTOR, ID_CATEGORIA)
                VALUES (:titulo, :ano_publicacao, :id_autor, :id_categoria)";

        $conn = Conexao::getConn();
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':titulo',          $titulo);
        $stmt->bindParam(':ano_publicacao',  $ano_publicacao);
        $stmt->bindParam(':id_autor',        $id_autor);
        $stmt->bindParam(':id_categoria',    $id_categoria);

        return $stmt->execute();
    }

    public function listar() {
        $sql = "SELECT L.ID_LIVRO, L.TITULO, L.ANO_PUBLICACAO,
                       A.NOME_AUTOR, C.NOME_CATEGORIA
                FROM LIVROS L
                LEFT JOIN AUTORES    A ON L.ID_AUTOR     = A.ID_AUTOR
                LEFT JOIN CATEGORIAS C ON L.ID_CATEGORIA = C.ID_CATEGORIA
                ORDER BY L.ID_LIVRO ASC";

        $conn = Conexao::getConn();
        $stmt = $conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
