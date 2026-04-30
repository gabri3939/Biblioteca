<?php
require_once __DIR__ . '/../config/conexao.php';

class emprestimoModel {

    public function inserir($id_livro, $id_usuario, $data_emprestimo, $data_devolucao_prevista) {
        $sql = "INSERT INTO EMPRESTIMOS (ID_LIVRO, ID_USUARIO, DATA_EMPRESTIMO, DATA_DEVOLUCAO_PREVISTA, STATUS_RETORNO)
                VALUES (:id_livro, :id_usuario, :data_emprestimo, :data_devolucao_prevista, 0)";

        $conn = Conexao::getConn();
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':id_livro',               $id_livro);
        $stmt->bindParam(':id_usuario',             $id_usuario);
        $stmt->bindParam(':data_emprestimo',        $data_emprestimo);
        $stmt->bindParam(':data_devolucao_prevista',$data_devolucao_prevista);

        return $stmt->execute();
    }

    public function listar() {
        $sql = "SELECT E.ID_EMPRESTIMO, L.TITULO, U.NOME_USUARIO,
                       E.DATA_EMPRESTIMO, E.DATA_DEVOLUCAO_PREVISTA, E.STATUS_RETORNO
                FROM EMPRESTIMOS E
                LEFT JOIN LIVROS   L ON E.ID_LIVRO   = L.ID_LIVRO
                LEFT JOIN USUARIOS U ON E.ID_USUARIO = U.ID_USUARIO
                ORDER BY E.ID_EMPRESTIMO ASC";

        $conn = Conexao::getConn();
        $stmt = $conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function devolver($id_emprestimo) {
        $sql = "UPDATE EMPRESTIMOS SET STATUS_RETORNO = 1 WHERE ID_EMPRESTIMO = :id";
        $conn = Conexao::getConn();
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id_emprestimo);
        return $stmt->execute();
    }
}
?>
