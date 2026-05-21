<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Autor</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>

<?php include __DIR__ . '/header.php'; ?>

<div class="container-lista">
    <h2>Editar Autor</h2>
    <p>Esta página representa o formulário de edição do autor.</p>
    <p>ID selecionado: <strong>#<?= htmlspecialchars($_GET['id'] ?? 'N/A') ?></strong></p>
    <a href="index.php?action=listarAutores" class="btn-novo">Voltar à lista</a>
</div>

</body>
</html>
