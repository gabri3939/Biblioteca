<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Livro</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>

<?php include __DIR__ . '/header.php'; ?>

<div class="container-lista">
    <h2>Editar Livro</h2>
    <p>Esta página representa o formulário de edição do livro.</p>
    <p>ID selecionado: <strong>#<?= htmlspecialchars($_GET['id'] ?? 'N/A') ?></strong></p>
    <a href="index.php?action=listarLivros" class="btn-novo">Voltar à lista</a>
</div>

</body>
</html>
