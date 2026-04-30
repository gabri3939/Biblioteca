<?php

class Conexao //definição da classe Conexao 
{
    //metedo estático para criar a conexão com o banco de dados
    public static function getConn()
    {
        $host = "localhost"; //endereço do servidor de banco de dados
        $dbname = "dboBiblioteca"; //nome do banco de dados
        $user = "root"; //nome de usuário do banco de dados
        $pass = ""; //senha do banco de dados

        try { //tenta estabelecer a conexão com o banco de dados usando PDO
            //criação de objeto PDO para conexão com o banco de dados
            $conexao = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass); //conexão com o banco de dados usando PDO
            $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //configura o modo de erro do PDO para lançar exceções

            return $conexao; //retorna a conexão estabelecida


        } catch (PDOException $e) { //captura a exceção do PDO caso ocorra um erro na conexão
            //caso ocorra um erro na conexão, captura a exceção e exibe uma mensagem de erro
            die("Erro na conexão: " . $e->getMessage()); //exibe a mensagem de erro e encerra a execução do script
        }
    }
}
