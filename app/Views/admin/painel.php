<?php
/**
 * Variável enviada pelo Admin\Painel::index()
 * @var \CodeIgniter\Shield\Entities\User $usuario
 */
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel administrativo</title>
</head>
<body>
    <h1>Painel administrativo</h1>

    <p>
        Olá, <strong><?= esc($usuario->username) ?></strong>
        (<?= esc($usuario->getEmail()) ?>).
        Grupos: <?= esc(implode(', ', $usuario->getGroups())) ?>.
    </p>

    <ul>
        <li><a href="<?= site_url('conteudos') ?>">Gerenciar conteúdos</a></li>

        <?php if ($usuario->can('users.create')): ?>
            <li><a href="<?= site_url('admin/usuarios') ?>">Usuários (listar e cadastrar)</a></li>
        <?php endif; ?>

        <li><a href="<?= site_url('/') ?>">Ver o site</a></li>
        <li><a href="<?= site_url('logout') ?>">Sair</a></li>
    </ul>
</body>
</html>
