<?php
require_once __DIR__ . '/../model/usuarioModel.php';

class usuarioController {

    public function salvar() {
        $nome  = $_POST['nomeUsuario'] ?? null;
        $email = $_POST['email']       ?? null;
        $cpf   = $_POST['cpf']         ?? null;

        if (!$nome || !$email || !$cpf) {
            echo "Preencha todos os campos!";
            return;
        }

        $model = new usuarioModel();

        if ($model->inserir($nome, $email, $cpf)) {
            header("Location: index.php?action=listarUsuarios");
            exit;
        } else {
            echo "Erro ao cadastrar usuário.";
        }
    }

    public function listar() {
        $model = new usuarioModel();
        $lista = $model->listarTodos();
        include __DIR__ . '/../view/usuarioLista.php';
    }
}
?>
