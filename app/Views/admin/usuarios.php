<?php
/**
 * Variáveis enviadas pelo Admin\Usuarios::index()
 * @var array $usuarios
 * @var array $erros
 */
?>
<?= $this->extend('layout/admin') ?>

<?= $this->section('conteudo') ?>
    <h1>Usuários cadastrados</h1>

    <?php if ($mensagem = session()->getFlashdata('mensagem')): ?>
        <p><?= esc($mensagem) ?></p>
    <?php endif; ?>

    <?php if ($erro = session()->getFlashdata('error')): ?>
        <p><?= esc($erro) ?></p>
    <?php endif; ?>

    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>Id</th>
                <th>Usuário</th>
                <th>E-mail</th>
                <th>Grupos</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?= esc($usuario->id) ?></td>
                    <td><?= esc($usuario->username) ?></td>
                    <td><?= esc($usuario->email) ?></td>
                    <td><?= esc(implode(', ', $usuario->getGroups())) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Cadastrar usuário</h2>
    <p>O novo usuário entra no grupo padrão (user), sem acesso ao painel.</p>

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
<?= $this->endSection() ?>
