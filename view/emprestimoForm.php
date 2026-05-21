<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Registrar Empréstimo</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>

<?php include __DIR__ . '/header.php'; ?>

<div class="container-lista">


    <h2>Registrar Empréstimo</h2>

    <?php
    $livros = $livros ?? [];
    $usuarios = $usuarios ?? [];
    ?>

    <form method="POST" action="index.php?action=salvarEmprestimo">

        <label>Livro:</label>
        <select name="id_livro" required>
            <option value="">Selecione um livro</option>
            <?php if (!empty($livros)): ?>
                <?php foreach ($livros as $livro): ?>
                    <option value="<?= $livro['ID_LIVRO'] ?>">
                        <?= htmlspecialchars($livro['TITULO']) ?>
                    </option>
                <?php endforeach; ?>
            <?php else: ?>
                <option value="">Nenhum livro disponível</option>
            <?php endif; ?>
        </select>

        <label>Usuário:</label>
        <select name="id_usuario" required>
            <option value="">Selecione um usuário</option>
            <?php if (!empty($usuarios)): ?>
                <?php foreach ($usuarios as $usuario): ?>
                    <option value="<?= $usuario['ID_USUARIO'] ?>">
                        <?= htmlspecialchars($usuario['NOME_USUARIO']) ?>
                    </option>
                <?php endforeach; ?>
            <?php else: ?>
                <option value="">Nenhum usuário disponível</option>
            <?php endif; ?>
        </select>

        <label>Data do Empréstimo:</label>
        <input type="date" name="data_emprestimo" required>

        <label>Data de Devolução Prevista:</label>
        <input type="date" name="data_devolucao_prevista" required>

        <button type="submit">Registrar Empréstimo</button>

    </form>

</div>

</body>
</html>
