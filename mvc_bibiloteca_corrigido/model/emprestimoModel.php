<?php
require_once __DIR__ . '/../config/conexao.php';

class emprestimoModel {

    public function inserir($id_livro, $id_usuario, $data_emprestimo, $data_devolucao_prevista) {
        // SQL que insere um novo empréstimo com os dados do livro, usuário e datas
        // Usa nomes de colunas em minúsculas (como no banco)
        $sql = "INSERT INTO EMPRESTIMOS (id_livro, id_usuario, data_emprestimo, data_devolucao_prevista, status_retorno)
                VALUES (:id_livro, :id_usuario, :data_emprestimo, :data_devolucao_prevista, 0)";

        // Obtém a conexão com o banco de dados
        $conn = Conexao::getConn();
        // Prepara a query
        $stmt = $conn->prepare($sql);

        // Vincula os parâmetros aos valores
        $stmt->bindParam(':id_livro',               $id_livro);
        $stmt->bindParam(':id_usuario',             $id_usuario);
        $stmt->bindParam(':data_emprestimo',        $data_emprestimo);
        $stmt->bindParam(':data_devolucao_prevista',$data_devolucao_prevista);

        // Executa a query e retorna o resultado
        return $stmt->execute();
    }

    public function listar() {
        // SQL que seleciona os empréstimos com JOIN nas tabelas de livros e usuários
        // Usa aliases para retornar nomes de colunas em MAIÚSCULAS (compatível com views)
        $sql = "SELECT E.id_emprestimo AS ID_EMPRESTIMO, 
                       L.titulo AS TITULO, 
                       U.nome_usuario AS NOME_USUARIO,
                       E.data_emprestimo AS DATA_EMPRESTIMO, 
                       E.data_devolucao_prevista AS DATA_DEVOLUCAO_PREVISTA, 
                       E.status_retorno AS STATUS_RETORNO
                FROM EMPRESTIMOS E
                LEFT JOIN LIVROS   L ON E.id_livro   = L.id_livro
                LEFT JOIN USUARIOS U ON E.id_usuario = U.id_usuario
                ORDER BY E.id_emprestimo ASC";

        // Obtém a conexão com o banco de dados
        $conn = Conexao::getConn();
        // Executa a query
        $stmt = $conn->query($sql);
        // Retorna todos os resultados em um array associativo
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function devolver($id_emprestimo) {
        // SQL que marca um empréstimo como devolvido (status = 1)
        // Usa nomes de colunas em minúsculas (como no banco)
        $sql = "UPDATE EMPRESTIMOS SET status_retorno = 1 WHERE id_emprestimo = :id";
        // Obtém a conexão com o banco de dados
        $conn = Conexao::getConn();
        // Prepara a query
        $stmt = $conn->prepare($sql);
        // Vincula o parâmetro ao valor
        $stmt->bindParam(':id', $id_emprestimo);
        // Executa a query e retorna o resultado
        return $stmt->execute();
    }
}
?>
