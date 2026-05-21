<?php
require_once __DIR__ . '/../config/conexao.php';

class usuarioModel {

    public function inserir($nome, $email, $cpf){
        // SQL que insere um novo usuário no banco
        // Usa nomes de colunas em minúsculas (como no banco)
        $sql = "INSERT INTO USUARIOS (nome_usuario, email, cpf) 
                VALUES (:nome, :email, :cpf)";

        // Obtém a conexão com o banco de dados
        $conn = Conexao::getConn();
        // Prepara a query
        $stmt = $conn->prepare($sql);

        // Vincula os parâmetros aos valores
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':cpf', $cpf);

        // Executa a query e retorna o resultado
        return $stmt->execute();
    }

    public function listarTodos(){
        // SQL que seleciona todos os usuários com aliases para MAIÚSCULAS
        $sql = "SELECT id_usuario AS ID_USUARIO, 
                       nome_usuario AS NOME_USUARIO, 
                       email AS EMAIL, 
                       cpf AS CPF 
                FROM USUARIOS 
                ORDER BY id_usuario ASC";
        // Obtém a conexão com o banco de dados
        $conn = Conexao::getConn();
        // Executa a consulta
        $stmt = $conn->query($sql);
        // Retorna todos os resultados como array associativo
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>