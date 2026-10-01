<aside class="perfil">
    <?php if (is_file(FCPATH . $perfil['foto'])): ?>
        <img src="<?= base_url($perfil['foto']) ?>" alt="Foto de <?= esc($perfil['nome']) ?>" class="perfil-foto">
    <?php else: ?>
        <div class="perfil-foto perfil-sem-foto">RF</div>
    <?php endif ?>

    <h3 class="perfil-nome"><?= esc($perfil['nome']) ?></h3>
    <p class="perfil-descricao"><?= nl2br(esc($perfil['descricao'])) ?></p>

    <ul class="perfil-links">
        <?php foreach ($perfil['links'] as $link): ?>
            <li>
                <a href="<?= esc($link['url']) ?>" target="_blank">
                    <i class="<?= esc($link['icone']) ?>"></i><?= esc($link['texto']) ?>
                </a>
            </li>
        <?php endforeach ?>
    </ul>

    <p class="perfil-frase">“<?= esc($perfil['frase']) ?>”</p>
</aside>
