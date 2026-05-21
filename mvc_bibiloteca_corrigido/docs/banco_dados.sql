CREATE DATABASE dboBiblioteca;
USE dboBiblioteca;

CREATE TABLE usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nome_usuario VARCHAR(150),
    email VARCHAR(150),
    telefone VARCHAR(20),
    senha VARCHAR(20),
    cpf CHAR(14)
);


CREATE TABLE autores (
    id_autor INT AUTO_INCREMENT PRIMARY KEY,
    nome_autor VARCHAR(150),
    nacionalidade VARCHAR(100)
);


CREATE TABLE categorias (
    id_categoria INT AUTO_INCREMENT PRIMARY KEY,
    nome_categoria VARCHAR(100)
);

CREATE TABLE livros (
    id_livro INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(200),
    ano_publicacao INT,
    foto VARCHAR(255),
    endpasta varchar(250),
    id_autor INT,
    id_categoria INT,

    FOREIGN KEY (id_autor) REFERENCES autores(id_autor),
    FOREIGN KEY (id_categoria) REFERENCES categorias(id_categoria)
);


CREATE TABLE emprestimos (
    id_emprestimo INT AUTO_INCREMENT PRIMARY KEY,
    id_livro INT,
    id_usuario INT,
    data_emprestimo DATE,
    data_devolucao DATE,
    data_devolucao_prevista DATE,
    status_retorno tinyint DEFAULT(1),

    FOREIGN KEY (id_livro) REFERENCES livros(id_livro),
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario)
);

SELECT * FROM usuarios;

SELECT * FROM autores;

SELECT * FROM categorias;

SELECT * FROM livros;

SELECT * FROM emprestimos;

#drop database dbobiblioteca;