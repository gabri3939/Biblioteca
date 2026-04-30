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
                    <td class="celula-id">#<?= htmlspecialchars($l['ID_LIVRO']) ?></td>
                    <td><?= htmlspecialchars($l['TITULO']) ?></td>
                    <td><?= htmlspecialchars($l['ANO_PUBLICACAO'] ?? '-') ?></td>
                    <td><?= htmlspecialchars($l['NOME_AUTOR'] ?? '-') ?></td>
                    <td><?= htmlspecialchars($l['NOME_CATEGORIA'] ?? '-') ?></td>
                    <td class="acoes-celula">
                        <a href="index.php?action=editarLivro&id=<?= htmlspecialchars($l['ID_LIVRO']) ?>" class="btn-editar">Editar</a>
                        <a href="index.php?action=excluirLivro&id=<?= htmlspecialchars($l['ID_LIVRO']) ?>" class="btn-excluir">Excluir</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="sem-dados">Nenhum livro cadastrado.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</div>

</body>
</html>
