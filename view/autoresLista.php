<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Autores</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>

<?php include __DIR__ . '/header.php'; ?>

<div class="container-lista">

    <h2>Lista de Autores</h2>

    <a href="index.php?action=autorForm" class="btn-novo">+ Novo Autor</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Nacionalidade</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($lista)): ?>
                <?php foreach ($lista as $a): ?>
                <tr>
                    <td class="celula-id">#<?= htmlspecialchars($a['ID_AUTOR']) ?></td>
                    <td><?= htmlspecialchars($a['NOME_AUTOR']) ?></td>
                    <td><?= htmlspecialchars($a['NACIONALIDADE']) ?></td>
                    <td class="acoes-celula">
                        <a href="index.php?action=editarAutor&id=<?= htmlspecialchars($a['ID_AUTOR']) ?>" class="btn-editar">Editar</a>
                        <a href="index.php?action=excluirAutor&id=<?= htmlspecialchars($a['ID_AUTOR']) ?>" class="btn-excluir">Excluir</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" class="sem-dados">Nenhum autor cadastrado.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</div>

</body>
</html>
