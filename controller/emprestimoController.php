<?php
require_once __DIR__ . '/../model/emprestimoModel.php';
require_once __DIR__ . '/../model/livroModel.php';
require_once __DIR__ . '/../model/usuarioModel.php';

class emprestimoController {

    public function abrirEmprestimo() {
        $livroModel   = new livroModel();
        $usuarioModel = new usuarioModel();

        $livros   = $livroModel->listar() ?: [];
        $usuarios = $usuarioModel->listarTodos() ?: [];

        include __DIR__ . '/../view/emprestimoForm.php';
    }

    public function salvar() {
        $id_livro              = $_POST['id_livro']              ?? null;
        $id_usuario            = $_POST['id_usuario']            ?? null;
        $data_emprestimo       = $_POST['data_emprestimo']       ?? null;
        $data_devolucao_prevista = $_POST['data_devolucao_prevista'] ?? null;

        if (!$id_livro || !$id_usuario || !$data_emprestimo || !$data_devolucao_prevista) {
            echo "Preencha todos os campos!";
            return;
        }

        $model = new emprestimoModel();

        if ($model->inserir($id_livro, $id_usuario, $data_emprestimo, $data_devolucao_prevista)) {
            header("Location: index.php?action=listarEmprestimos");
            exit;
        } else {
            echo "Erro ao registrar empréstimo.";
        }
    }

    public function listar() {
        $model = new emprestimoModel();
        $lista = $model->listar();
        include __DIR__ . '/../view/emprestimosLista.php';
    }

    public function devolver() {
        $id_emprestimo = $_GET['id'] ?? null;

        if (!$id_emprestimo) {
            echo "Empréstimo não encontrado.";
            return;
        }

        $model = new emprestimoModel();

        if ($model->devolver($id_emprestimo)) {
            header("Location: index.php?action=listarEmprestimos");
            exit;
        } else {
            echo "Erro ao registrar devolução.";
        }
    }
}
?>
