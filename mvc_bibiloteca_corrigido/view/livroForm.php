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
    // Define arrays vazios como padrão se as variáveis não existirem
    $autores = $autores ?? [];
    $categorias = $categorias ?? [];
    ?>

    <!-- Formulário para cadastro de novo livro com upload de imagem -->
    <form method="POST" action="index.php?action=salvarLivro" enctype="multipart/form-data">

        <!-- Campo de entrada para o título do livro -->
        <label>Título:</label>
        <input type="text" name="titulo" required>

        <!-- Campo de entrada para o ano de publicação do livro -->
        <label>Ano de Publicação:</label>
        <input type="number" name="ano_publicacao" min="1000" max="2099">

        <!-- Campo de entrada para upload da imagem da capa do livro -->
        <label for="imagem">Capa do Livro:</label>
        <input type="file" id="imagem" name="imagem" accept="image/jpeg,image/png" required>

        <!-- Campo de seleção para escolher o autor do livro -->
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

        <!-- Campo de seleção para escolher a categoria do livro -->
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

        <!-- Botão para enviar o formulário e salvar o livro -->
        <button type="submit">Salvar Livro</button>

    </form>

</div>

</body>
</html>
