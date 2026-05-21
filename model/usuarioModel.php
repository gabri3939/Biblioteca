<?php
require_once __DIR__ . '/../config/conexao.php';

class usuarioModel {

    public function inserir($nome, $email, $cpf){

        $sql = "INSERT INTO USUARIOS (NOME_USUARIO, EMAIL, CPF) 
                VALUES (:nome, :email, :cpf)";

        $conn = Conexao::getConn();
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':cpf', $cpf);

        return $stmt->execute();
    }

  
    public function listarTodos(){
        $sql = "SELECT ID_USUARIO, NOME_USUARIO, EMAIL, CPF FROM USUARIOS order by ID_USUARIO asc ";
        $conn = Conexao::getConn(); // Obtém a conexão
        $stmt = $conn->query($sql); // Executa a consulta
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>