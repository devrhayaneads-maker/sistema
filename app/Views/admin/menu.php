<?php
/**
 * Menu do painel administrativo, usado em todas as telas do painel.
 * $ativo = endereço do link que deve ficar destacado (ex.: 'projetos')
 */
$ativo = $ativo ?? '';

// Links do menu: endereço => texto
$links = [
    'admin'               => 'Painel',
    'admin/projetos'      => 'Projetos',
    'admin/certificacoes' => 'Certificações',
    'admin/publicacoes'   => 'Publicações',
    'admin/blog'          => 'Blog',
    'admin/usuarios'      => 'Usuários',
    'conteudos'           => 'Conteúdos',
];
?>
<nav class="navbar">
    <?php foreach ($links as $link => $texto): ?>
        <?php $nome = $link === 'admin' ? 'admin' : str_replace('admin/', '', $link); ?>
        <a href="<?= site_url($link) ?>" class="nav-link<?= $ativo === $nome ? ' active' : '' ?>"><?= $texto ?></a>
    <?php endforeach ?>
    <form action="<?= site_url('admin/sair') ?>" method="post" class="logout-form">
        <?= csrf_field() ?>
        <button type="submit" class="nav-link logout-button">Sair</button>
    </form>
</nav>
