<?= $this->extend('layout/main') ?>

<?= $this->section('conteudo') ?>
    <h1><?= esc($conteudo['Titulo']) ?></h1>

    <?php foreach ($posts as $post): ?>
        <div class="item">
            <h2 class="item-titulo"><?= esc($post['titulo']) ?></h2>
            <p class="item-info"><i class="fa-regular fa-calendar"></i> <?= esc($post['data']) ?></p>
            <p><?= esc($post['resumo']) ?></p>
        </div>
    <?php endforeach ?>
<?= $this->endSection() ?>
