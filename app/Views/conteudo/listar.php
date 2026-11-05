<?php
/**
 * Variáveis enviadas pelo ConteudoController::listar()
 * @var array $conteudos
 * @var \CodeIgniter\Shield\Entities\User $usuario
 * @var bool $ehAdmin
 */
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conteúdos</title>
</head>
<body>
    <p>
        Logado como <strong><?= esc($usuario->username ?? $usuario->getEmail()) ?></strong>
        <?php if ($ehAdmin): ?>
            | <a href="<?= site_url('admin') ?>">Painel administrativo</a>
        <?php endif; ?>
        | <a href="<?= site_url('logout') ?>">Sair</a>
    </p>

    <h1>Conteúdos cadastrados</h1>

    <?php if ($mensagem = session()->getFlashdata('mensagem')): ?>
        <p><?= esc($mensagem) ?></p>
    <?php endif; ?>

    <?php if ($erro = session()->getFlashdata('error')): ?>
        <p><strong><?= esc($erro) ?></strong></p>
    <?php endif; ?>

    <?php if (empty($conteudos)): ?>
        <p>Nenhum conteúdo encontrado.</p>
    <?php else: ?>
        <table border="1" cellpadding="8">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Título</th>
                    <th>Texto</th>
                    <th>Ação</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($conteudos as $item): ?>
                    <tr>
                        <td><?= esc($item['Id']) ?></td>
                        <td><?= esc($item['Titulo']) ?></td>
                        <td><?= nl2br(esc($item['Texto'] ?? '')) ?></td>
                        <td>
                            <a href="<?= site_url('conteudos/editar/' . $item['Id']) ?>">
                                Editar
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>
