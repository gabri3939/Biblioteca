<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Livros</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>

<?php include __DIR__ . '/header.php'; ?>

<div class="container-lista">

    <h2>Lista de Livros</h2>

    <a href="index.php?action=livroForm" class="btn-novo">+ Novo Livro</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Imagem Capa</th>
                <th>Título</th>
                <th>Ano</th>
                <th>Autor</th>
                <th>Categoria</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($lista)): ?>
                <?php foreach ($lista as $l): ?>
                <tr>
                    <!-- Exibe o ID do livro -->
                    <td class="celula-id">#<?= htmlspecialchars($l['ID_LIVRO']) ?></td>
                    
                    <!-- Exibe a imagem da capa do livro -->
                    <td class="celula-imagem">
                        <?php if (!empty($l['ENDPASTA'])): ?>
                            <!-- Se houver caminho da imagem, exibe a imagem -->
                            <img src="<?= htmlspecialchars($l['ENDPASTA']) ?>" alt="Capa" style="width: 50px; height: auto;">
                        <?php else: ?>
                            <!-- Se não houver imagem, exibe mensagem padrão -->
                            <span>Sem imagem</span>
                        <?php endif; ?>
                    </td>
                    
                    <!-- Exibe o título do livro -->
                    <td><?= htmlspecialchars($l['TITULO']) ?></td>
                    
                    <!-- Exibe o ano de publicação ou um travessão se vazio -->
                    <td><?= htmlspecialchars($l['ANO_PUBLICACAO'] ?? '-') ?></td>
                    
                    <!-- Exibe o nome do autor ou um travessão se vazio -->
                    <td><?= htmlspecialchars($l['NOME_AUTOR'] ?? '-') ?></td>
                    
                    <!-- Exibe o nome da categoria ou um travessão se vazio -->
                    <td><?= htmlspecialchars($l['NOME_CATEGORIA'] ?? '-') ?></td>
                    
                    <!-- Exibe os botões de ações (editar e excluir) -->
                    <td class="acoes-celula">
                        <a href="index.php?action=editarLivro&id=<?= htmlspecialchars($l['ID_LIVRO']) ?>" class="btn-editar">Editar</a>
                        <a href="index.php?action=excluirLivro&id=<?= htmlspecialchars($l['ID_LIVRO']) ?>" class="btn-excluir">Excluir</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <!-- Exibe mensagem quando não há livros cadastrados -->
                <tr>
                    <td colspan="7" class="sem-dados">Nenhum livro cadastrado.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</div>

</body>
</html>
