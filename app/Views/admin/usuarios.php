<?php
/**
 * Variáveis enviadas pelo Admin\Usuarios::index()
 * @var \CodeIgniter\Shield\Entities\User[] $usuarios
 * @var array $erros
 */
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários</title>
</head>
<body>
    <h1>Usuários</h1>

    <p><a href="<?= site_url('admin') ?>">&larr; Voltar ao painel</a></p>

    <?php if ($mensagem = session()->getFlashdata('mensagem')): ?>
        <p><?= esc($mensagem) ?></p>
    <?php endif; ?>

    <?php if ($erro = session()->getFlashdata('error')): ?>
        <p><strong><?= esc($erro) ?></strong></p>
    <?php endif; ?>

    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>Id</th>
                <th>Usuário</th>
                <th>E-mail</th>
                <th>Grupos</th>
                <th>Cadastrado em</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($usuarios as $item): ?>
                <tr>
                    <td><?= esc($item->id) ?></td>
                    <td><?= esc($item->username) ?></td>
                    <td><?= esc($item->getEmail()) ?></td>
                    <td><?= esc(implode(', ', $item->getGroups())) ?></td>
                    <td><?= esc($item->created_at?->toLocalizedString('dd/MM/yyyy HH:mm')) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Cadastrar novo usuário</h2>
    <p>O novo usuário entra no grupo padrão (<em>user</em>).</p>

    <?php if (! empty($erros)): ?>
        <div>
            <p>Verifique os campos:</p>
            <ul>
                <?php foreach ($erros as $erroCampo): ?>
                    <li><?= esc($erroCampo) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="post" action="<?= site_url('usuarios') ?>">
        <?= csrf_field() ?>

        <div>
            <label for="username">Usuário</label>
            <input type="text" id="username" name="username" value="<?= esc(old('username') ?? '') ?>" required>
        </div>

        <div>
            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" value="<?= esc(old('email') ?? '') ?>" required>
        </div>

        <div>
            <label for="password">Senha</label>
            <input type="password" id="password" name="password" autocomplete="new-password" required>
        </div>

        <div>
            <label for="password_confirm">Confirmar senha</label>
            <input type="password" id="password_confirm" name="password_confirm" autocomplete="new-password" required>
        </div>

        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>
