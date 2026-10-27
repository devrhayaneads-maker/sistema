<?php
// Links do menu: endereço => texto
$menu = [
    ''              => lang('Site.menuInicio'),
    'projetos'      => lang('Site.menuProjetos'),
    'certificacoes' => lang('Site.menuCertificacoes'),
    'blog'          => lang('Site.menuBlog'),
    'cv'            => lang('Site.menuCv'),
];
?>
<header class="topo">
    <div class="topo-interno">
        <nav class="menu">
            <ul class="menu-links">
                <?php foreach ($menu as $link => $texto): ?>
                    <li>
                        <a href="<?= site_url(trim($idioma . '/' . $link, '/')) ?>"<?= $endereco === $link ? ' class="ativo"' : '' ?>><?= $texto ?></a>
                    </li>
                <?php endforeach ?>
            </ul>
        </nav>

        <div class="topo-extras">
            <!-- Troca de idioma: abre a mesma página no outro idioma -->
            <span class="idiomas">
                <a href="<?= site_url(trim('pt/' . $endereco, '/')) ?>"<?= $idioma === 'pt' ? ' class="ativo"' : '' ?>>PT</a>
                <span class="idiomas-barra">|</span>
                <a href="<?= site_url(trim('en/' . $endereco, '/')) ?>"<?= $idioma === 'en' ? ' class="ativo"' : '' ?>>EN</a>
            </span>
            <span class="topo-divisor"></span>
            <button id="botao-tema" class="botao-tema" title="<?= lang('Site.trocarTema') ?>"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" aria-hidden="true">
                    <circle cx="12" cy="12" r="4.5"/>
                    <path d="M12 1.5v2.5M12 20v2.5M1.5 12H4M20 12h2.5M4.6 4.6l1.8 1.8M17.6 17.6l1.8 1.8M4.6 19.4l1.8-1.8M17.6 6.4l1.8-1.8"/>
                </svg></button>
        </div>
    </div>
</header>
