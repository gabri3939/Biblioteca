<?php
require_once __DIR__ . '/../config/conexao.php';

class livroModel {

    // Método para inserir livro com imagem de capa
    public function inserir($titulo, $ano_publicacao, $id_autor, $id_categoria, $foto = null, $endpasta = null) {
        // SQL com campos opcionais de foto e endpasta
        // Usa nomes de colunas em minúsculas (como no banco)
        $sql = "INSERT INTO LIVROS (titulo, ano_publicacao, id_autor, id_categoria, foto, endpasta)
                VALUES (:titulo, :ano_publicacao, :id_autor, :id_categoria, :foto, :endpasta)";

        // Obtém a conexão com o banco de dados
        $conn = Conexao::getConn();
        // Prepara a query
        $stmt = $conn->prepare($sql);

        // Vincula os parâmetros aos valores
        $stmt->bindParam(':titulo',          $titulo);
        $stmt->bindParam(':ano_publicacao',  $ano_publicacao);
        $stmt->bindParam(':id_autor',        $id_autor);
        $stmt->bindParam(':id_categoria',    $id_categoria);
        $stmt->bindParam(':foto',            $foto);
        $stmt->bindParam(':endpasta',        $endpasta);

        // Executa a instrução e retorna o resultado
        return $stmt->execute();
    }

    // Método para listar todos os livros com suas informações
    public function listar() {
        // SQL para listar livros com dados de autores, categorias e imagem
        // Usa nomes de colunas em minúsculas (como no banco) e aliases para MAIÚSCULAS
        $sql = "SELECT L.id_livro AS ID_LIVRO, 
                       L.titulo AS TITULO, 
                       L.ano_publicacao AS ANO_PUBLICACAO, 
                       L.endpasta AS ENDPASTA,
                       A.nome_autor AS NOME_AUTOR, 
                       C.nome_categoria AS NOME_CATEGORIA
                FROM LIVROS L
                LEFT JOIN AUTORES    A ON L.id_autor     = A.id_autor
                LEFT JOIN CATEGORIAS C ON L.id_categoria = C.id_categoria
                ORDER BY L.id_livro ASC";

        // Obtém a conexão com o banco de dados
        $conn = Conexao::getConn();
        // Executa a query
        $stmt = $conn->query($sql);
        // Retorna todos os resultados como array associativo
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
