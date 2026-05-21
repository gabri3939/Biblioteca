<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Categorias</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>

<?php include __DIR__ . '/header.php'; ?>

<div class="container-lista">

    <h2>Lista de Categorias</h2>

    <a href="index.php?action=categoriaForm" class="btn-novo">+ Nova Categoria</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome da Categoria</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($lista)): ?>
                <?php foreach ($lista as $c): ?>
                <tr>
                    <td class="celula-id">#<?= htmlspecialchars($c['ID_CATEGORIA']) ?></td>
                    <td><?= htmlspecialchars($c['NOME_CATEGORIA']) ?></td>
                    <td class="acoes-celula">
                        <a href="index.php?action=editarCategoria&id=<?= htmlspecialchars($c['ID_CATEGORIA']) ?>" class="btn-editar">Editar</a>
                        <a href="index.php?action=excluirCategoria&id=<?= htmlspecialchars($c['ID_CATEGORIA']) ?>" class="btn-excluir">Excluir</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3" class="sem-dados">Nenhuma categoria cadastrada.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</div>

</body>
</html>
