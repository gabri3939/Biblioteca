<?php
require_once __DIR__ . '/../model/livroModel.php';
require_once __DIR__ . '/../model/autorModel.php';
require_once __DIR__ . '/../model/categoriaModel.php';

class controllerLivro {

    public function abrirLivro() {
        $autorModel     = new autorModel();
        $categoriaModel = new categoriaModel();

        $autores    = $autorModel->listarTodos() ?: [];
        $categorias = $categoriaModel->listarTodos() ?: [];

        include __DIR__ . '/../view/livroForm.php';
    }

    public function salvar() {
        $titulo           = $_POST['titulo']          ?? null;
        $ano_publicacao   = $_POST['ano_publicacao']  ?? null;
        $id_autor         = $_POST['id_autor']        ?? null;
        $id_categoria     = $_POST['id_categoria']    ?? null;

        if (!$titulo || !$id_autor || !$id_categoria) {
            echo "Preencha todos os campos obrigatórios!";
            return;
        }

        $model = new livroModel();

        if ($model->inserir($titulo, $ano_publicacao, $id_autor, $id_categoria)) {
            header("Location: index.php?action=listarLivros");
            exit;
        } else {
            echo "Erro ao cadastrar livro.";
        }
    }

    public function listar() {
        $model = new livroModel();
        $lista = $model->listar();
        include __DIR__ . '/../view/livrosLista.php';
    }
}
?>
