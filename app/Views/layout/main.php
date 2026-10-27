<!DOCTYPE html>
<html lang="<?= $idioma === 'en' ? 'en' : 'pt-BR' ?>">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= esc($conteudo['Titulo'] ?? 'Meu Site') ?></title>
        <!-- Ícones (Font Awesome) -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <!-- O base_url() aponta diretamente para a pasta /public/ -->
        <link rel="stylesheet" href="<?= base_url('assets/css/estilo.css') ?>?v=<?= filemtime(FCPATH . 'assets/css/estilo.css') ?>">
        <script>
            // Aplica o tema salvo antes da página aparecer (evita "piscar")
            try {
                if (localStorage.getItem('tema') === 'escuro') {
                    document.documentElement.setAttribute('data-tema', 'escuro');
                }
            } catch (e) {}
        </script>
    </head>
<body>

    <?= $this->include('layout/menu') ?>

    <div class="principal">
        <?= $this->include('layout/perfil') ?>

        <main class="pagina">
            <!-- Aqui é injetado o conteúdo de cada página -->
            <?= $this->renderSection('conteudo') ?>
        </main>
    </div>

    <footer class="rodape">
        <div class="rodape-interno">
            <ul class="rodape-seguir">
                <li><strong><?= lang('Site.seguir') ?>:</strong></li>
                <li><a href="https://github.com/seu-usuario" target="_blank"><i class="fa-brands fa-github"></i> GitHub</a></li>
            </ul>
            <p class="rodape-copyright">
                &copy; <?= date('Y') ?> Rhayane Freitas, <?= lang('Site.feitoCom') ?>
            </p>
        </div>
    </footer>

    <script>
        // Botão do sol: troca entre tema claro e escuro
        document.getElementById('botao-tema').addEventListener('click', function () {
            const html = document.documentElement;
            const escuro = html.getAttribute('data-tema') === 'escuro';

            if (escuro) {
                html.removeAttribute('data-tema');
            } else {
                html.setAttribute('data-tema', 'escuro');
            }

            try { localStorage.setItem('tema', escuro ? 'claro' : 'escuro'); } catch (e) {}
        });
    </script>

</body>
</html>
