<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Categoria</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>

<?php include __DIR__ . '/header.php'; ?>

<div class="container-lista">

    <h2>Cadastrar Categoria</h2>

    <form method="POST" action="index.php?action=salvarCategoria">

        <label>Nome da Categoria:</label>
        <input type="text" name="nomeCategoria" required>

        <button type="submit">Salvar</button>
    </form>

</div>

</body>
</html>
