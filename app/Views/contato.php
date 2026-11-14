<?php
/**
 * Variável enviada pelo ConteudoController::contato()
 * @var array $conteudo
 */
?>
<?= $this->extend('layout/main') ?>

<?= $this->section('conteudo') ?>
    <h1><?= esc($conteudo['Titulo']) ?></h1>
    <p><?= esc($conteudo['Texto']) ?></p>
<?= $this->endSection() ?>
