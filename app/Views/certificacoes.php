<?= $this->extend('layout/main') ?>

<?= $this->section('conteudo') ?>
    <h1><?= esc($conteudo['Titulo']) ?></h1>

    <?php foreach ($certificacoes as $certificado): ?>
        <div class="item">
            <h2 class="item-titulo"><?= esc($certificado['titulo']) ?></h2>
            <p class="item-info"><?= esc($certificado['ano']) ?></p>
            <p><?= esc($certificado['descricao']) ?></p>
        </div>
    <?php endforeach ?>
<?= $this->endSection() ?>
