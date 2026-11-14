<?= $this->extend('layout/main') ?>

<?= $this->section('conteudo') ?>
    <h1><?= esc($conteudo['Titulo']) ?></h1>

    <?php foreach ($publicacoes as $publicacao): ?>
        <div class="item">
            <h2 class="item-titulo"><?= esc($publicacao['titulo']) ?></h2>
            <p class="item-info"><?= esc($publicacao['ano']) ?></p>
            <p><?= esc($publicacao['descricao']) ?></p>
        </div>
    <?php endforeach ?>
<?= $this->endSection() ?>
