<?= $this->extend('layout/main') ?>

<?= $this->section('conteudo') ?>
    <h1><?= esc($conteudo['Titulo']) ?></h1>

    <?php foreach ($projetos as $projeto): ?>
        <div class="item">
            <h2 class="item-titulo"><?= esc($projeto['titulo']) ?></h2>
            <p class="item-info"><?= esc($projeto['ano']) ?></p>
            <p><?= esc($projeto['descricao']) ?></p>
        </div>
    <?php endforeach ?>
<?= $this->endSection() ?>
