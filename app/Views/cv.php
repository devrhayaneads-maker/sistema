<?= $this->extend('layout/main') ?>

<?= $this->section('conteudo') ?>
    <h1><?= esc($conteudo['Titulo']) ?></h1>

    <h2><?= lang('Site.cvFormacao') ?></h2>
    <ul>
        <?php foreach (lang('Site.cvFormacaoItens') as $item): ?>
            <li><?= esc($item) ?></li>
        <?php endforeach ?>
    </ul>

    <h2><?= lang('Site.cvExperiencia') ?></h2>
    <ul>
        <?php foreach (lang('Site.cvExperienciaItens') as $item): ?>
            <li><?= esc($item) ?></li>
        <?php endforeach ?>
    </ul>

    <h2><?= lang('Site.cvHabilidades') ?></h2>
    <ul>
        <?php foreach (lang('Site.cvHabilidadesItens') as $item): ?>
            <li><?= esc($item) ?></li>
        <?php endforeach ?>
    </ul>

    <h2><?= lang('Site.cvIdiomas') ?></h2>
    <ul>
        <?php foreach (lang('Site.cvIdiomasItens') as $item): ?>
            <li><?= esc($item) ?></li>
        <?php endforeach ?>
    </ul>
<?= $this->endSection() ?>
