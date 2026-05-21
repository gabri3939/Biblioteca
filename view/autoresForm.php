<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Autor</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>

<?php include __DIR__ . '/header.php'; ?>

<div class="container-lista">

    <h2>Cadastrar Autor</h2>

    <form method="POST" action="index.php?action=salvarAutor">

        <label>Nome:</label>
        <input type="text" name="nomeAutor" required>

        <label>Nacionalidade:</label>
        <input type="text" name="nacionalidade" required>

        <button type="submit">Salvar</button>
    </form>

</div>

</body>
</html>
