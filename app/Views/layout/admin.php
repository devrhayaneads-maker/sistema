<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($titulo ?? 'Painel administrativo') ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/css/estilo.css') ?>">
</head>
<body class="admin">
    <?= view('admin/menu', ['ativo' => $ativo ?? '']) ?>
    <main class="container">
        <?= $this->renderSection('conteudo') ?>
    </main>
</body>
</html>
