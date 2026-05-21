<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Excluir Categoria</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>

<?php include __DIR__ . '/header.php'; ?>

<div class="container-lista">
    <h2>Excluir Categoria</h2>
    <p>Esta página representa a confirmação de exclusão da categoria.</p>
    <p>ID selecionado: <strong>#<?= htmlspecialchars($_GET['id'] ?? 'N/A') ?></strong></p>
    <a href="index.php?action=listarCategorias" class="btn-novo">Voltar à lista</a>
</div>

</body>
</html>
