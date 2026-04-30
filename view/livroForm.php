<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Livro</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>

<?php include __DIR__ . '/header.php'; ?>

<div class="container-lista">

    <h2>Cadastrar Livro</h2>

    <?php
    $autores = $autores ?? [];
    $categorias = $categorias ?? [];
    ?>

    <form method="POST" action="index.php?action=salvarLivro">

        <label>Título:</label>
        <input type="text" name="titulo" required>

        <label>Ano de Publicação:</label>
        <input type="number" name="ano_publicacao" min="1000" max="2099">

        <label>Autor:</label>
        <select name="id_autor" required>
            <option value="">Selecione um autor</option>
            <?php if (!empty($autores)): ?>
                <?php foreach ($autores as $autor): ?>
                    <option value="<?= $autor['ID_AUTOR'] ?>">
                        <?= htmlspecialchars($autor['NOME_AUTOR']) ?>
                    </option>
                <?php endforeach; ?>
            <?php else: ?>
                <option value="">Nenhum autor disponível</option>
            <?php endif; ?>
        </select>

        <label>Categoria:</label>
        <select name="id_categoria" required>
            <option value="">Selecione uma categoria</option>
            <?php if (!empty($categorias)): ?>
                <?php foreach ($categorias as $categoria): ?>
                    <option value="<?= $categoria['ID_CATEGORIA'] ?>">
                        <?= htmlspecialchars($categoria['NOME_CATEGORIA']) ?>
                    </option>
                <?php endforeach; ?>
            <?php else: ?>
                <option value="">Nenhuma categoria disponível</option>
            <?php endif; ?>
        </select>

        <button type="submit">Salvar Livro</button>

    </form>

</div>

</body>
</html>
