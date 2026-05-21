<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Usuário</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>

<?php include __DIR__ . '/header.php'; ?>

<div class="container-lista">

    <h2>Cadastrar Usuário</h2>

    <form method="POST" action="index.php?action=salvarUsuario">

        <label>Nome:</label>
        <input type="text" name="nomeUsuario" required>

        <label>E-mail:</label>
        <input type="email" name="email" required>

        <label>CPF:</label>
        <input type="text" name="cpf" required>

        <button type="submit">Salvar</button>
    </form>

</div>

</body>
</html>
