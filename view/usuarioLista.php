<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Usuários</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>

<?php include __DIR__ . '/header.php'; ?>

<div class="container-lista">

    <h2>Lista de Usuários</h2>

    <a href="index.php?action=usuarioForm" class="btn-novo">+ Novo Usuário</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>CPF</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($lista)): ?>
                <?php foreach ($lista as $u): ?>
                <tr>
                    <td class="celula-id">#<?= htmlspecialchars($u['ID_USUARIO']) ?></td>
                    <td><?= htmlspecialchars($u['NOME_USUARIO']) ?></td>
                    <td><?= htmlspecialchars($u['EMAIL']) ?></td>
                    <td><?= htmlspecialchars($u['CPF']) ?></td>
                    <td class="acoes-celula">
                        <a href="index.php?action=editarUsuario&id=<?= htmlspecialchars($u['ID_USUARIO']) ?>" class="btn-editar">Editar</a>
                        <a href="index.php?action=excluirUsuario&id=<?= htmlspecialchars($u['ID_USUARIO']) ?>" class="btn-excluir">Excluir</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="sem-dados">Nenhum usuário cadastrado.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</div>

</body>
</html>
