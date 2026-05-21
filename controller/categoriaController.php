<?php
require_once __DIR__ . '/../model/categoriaModel.php';

class categoriaController {

    public function salvar() {
        $nome = $_POST['nomeCategoria'] ?? null;

        if (!$nome) {
            echo "Preencha todos os campos!";
            return;
        }

        $model = new categoriaModel();

        if ($model->inserir($nome)) {
            header("Location: index.php?action=listarCategorias");
            exit;
        } else {
            echo "Erro ao cadastrar categoria.";
        }
    }

    public function listar() {
        $model = new categoriaModel();
        $lista = $model->listar();
        include __DIR__ . '/../view/categoriasLista.php';
    }
}
?>
