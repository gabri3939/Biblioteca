<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Empréstimos</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>

<?php include __DIR__ . '/header.php'; ?>

<div class="container-lista">

    <h2>Lista de Empréstimos</h2>

    <a href="index.php?action=emprestimoForm" class="btn-novo">+ Novo Empréstimo</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Livro</th>
                <th>Usuário</th>
                <th>Data Empréstimo</th>
                <th>Devolução Prevista</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($lista)): ?>
                <?php foreach ($lista as $e): ?>
                <tr>
                    <td class="celula-id">#<?= htmlspecialchars($e['ID_EMPRESTIMO']) ?></td>
                    <td><?= htmlspecialchars($e['TITULO']) ?></td>
                    <td><?= htmlspecialchars($e['NOME_USUARIO']) ?></td>
                    <td><?= htmlspecialchars($e['DATA_EMPRESTIMO']) ?></td>
                    <td><?= htmlspecialchars($e['DATA_DEVOLUCAO_PREVISTA']) ?></td>
                    <td><?= $e['STATUS_RETORNO'] ? 'Devolvido' : 'Em aberto' ?></td>
                    <td class="acoes-celula">
                        <?php if (!$e['STATUS_RETORNO']): ?>
                            <a href="index.php?action=devolverEmprestimo&id=<?= $e['ID_EMPRESTIMO'] ?>"
                               onclick="return confirm('Confirmar devolução?')">Devolver</a>
                        <?php endif; ?>
                        <a href="index.php?action=editarEmprestimo&id=<?= htmlspecialchars($e['ID_EMPRESTIMO']) ?>" class="btn-editar">Editar</a>
                        <a href="index.php?action=excluirEmprestimo&id=<?= htmlspecialchars($e['ID_EMPRESTIMO']) ?>" class="btn-excluir">Excluir</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7" class="sem-dados">Nenhum empréstimo registrado.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</div>

</body>
</html>
