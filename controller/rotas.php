<?php
require_once __DIR__ . '/usuarioController.php';
require_once __DIR__ . '/autorController.php';
require_once __DIR__ . '/categoriaController.php';
require_once __DIR__ . '/controllerLivro.php';
require_once __DIR__ . '/emprestimoController.php';

$action = $_GET['action'] ?? 'listarUsuarios';

$usuarioController    = new usuarioController();
$autorController      = new autorController();
$categoriaController  = new categoriaController();
$controllerLivro      = new controllerLivro();
$emprestimoController = new emprestimoController();

switch ($action) {

    // ================= USUÁRIOS =================

    case 'usuarioForm':
        include __DIR__ . '/../view/usuarioform.php';
        break;

    case 'salvarUsuario':
        $usuarioController->salvar();
        break;

    case 'listarUsuarios':
        $usuarioController->listar();
        break;

    case 'editarUsuario':
        include __DIR__ . '/../view/editarUsuario.php';
        break;

    case 'excluirUsuario':
        include __DIR__ . '/../view/excluirUsuario.php';
        break;


    // ================= AUTORES =================

    case 'autorForm':
        include __DIR__ . '/../view/autoresForm.php';
        break;

    case 'salvarAutor':
        $autorController->salvar();
        break;

    case 'listarAutores':
        $autorController->listar();
        break;

    case 'editarAutor':
        include __DIR__ . '/../view/editarAutor.php';
        break;

    case 'excluirAutor':
        include __DIR__ . '/../view/excluirAutor.php';
        break;


    // ================= CATEGORIAS =================

    case 'categoriaForm':
        include __DIR__ . '/../view/categoriasForm.php';
        break;

    case 'salvarCategoria':
        $categoriaController->salvar();
        break;

    case 'listarCategorias':
        $categoriaController->listar();
        break;

    case 'editarCategoria':
        include __DIR__ . '/../view/editarCategoria.php';
        break;

    case 'excluirCategoria':
        include __DIR__ . '/../view/excluirCategoria.php';
        break;


    // ================= LIVROS =================

    case 'livroForm':
        $controllerLivro->abrirLivro();
        break;

    case 'salvarLivro':
        $controllerLivro->salvar();
        break;

    case 'listarLivros':
        $controllerLivro->listar();
        break;

    case 'editarLivro':
        include __DIR__ . '/../view/editarLivro.php';
        break;

    case 'excluirLivro':
        include __DIR__ . '/../view/excluirLivro.php';
        break;


    // ================= EMPRÉSTIMOS =================

    case 'emprestimoForm':
        $emprestimoController->abrirEmprestimo();
        break;

    case 'salvarEmprestimo':
        $emprestimoController->salvar();
        break;

    case 'listarEmprestimos':
        $emprestimoController->listar();
        break;

    case 'editarEmprestimo':
        include __DIR__ . '/../view/editarEmprestimo.php';
        break;

    case 'excluirEmprestimo':
        include __DIR__ . '/../view/excluirEmprestimo.php';
        break;

    case 'devolverEmprestimo':
        $emprestimoController->devolver();
        break;


    // ================= GERAL =================

    default:
        $usuarioController->listar();
        break;
}
?>
