<?php
require_once __DIR__ . '/../model/autorModel.php';

class autorController {

    public function salvar() {
        $nome          = $_POST['nomeAutor']     ?? null;
        $nacionalidade = $_POST['nacionalidade'] ?? null;

        if (!$nome || !$nacionalidade) {
            echo "Preencha todos os campos!";
            return;
        }

        $model = new autorModel();

        if ($model->inserir($nome, $nacionalidade)) {
            header("Location: index.php?action=listarAutores");
            exit;
        } else {
            echo "Erro ao cadastrar autor.";
        }
    }

    public function listar() {
        $model = new autorModel();
        $lista = $model->listar();
        include __DIR__ . '/../view/autoresLista.php';
    }
}
?>
