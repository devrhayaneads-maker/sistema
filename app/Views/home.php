<?= $this->extend('layout/main') ?>

<?= $this->section('conteudo') ?>
    <h1><?= esc($conteudo['Titulo']) ?></h1>
    <?php foreach ($paragrafos as $i => $paragrafo): ?>
        <p<?= $i === 0 || $i === count($paragrafos) - 1 ? ' class="destaque"' : '' ?>><?= esc($paragrafo) ?></p>
    <?php endforeach ?>
<?= $this->endSection() ?>
