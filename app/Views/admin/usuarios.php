<?php
/**
 * Variável enviada pelo Admin\Painel::usuarios()
 * @var array $usuarios
 */
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Usuários</title>
<link rel="stylesheet" href="<?= base_url('assets/css/estilo.css') ?>">
</head>
<body class="admin">
<?= view('admin/menu', ['ativo' => 'usuarios']) ?>
<main class="container">
    <h1>Usuários cadastrados</h1>

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
            <?php endforeach ?>
        </tbody>
    </table>
</main>
</body>
</html>
