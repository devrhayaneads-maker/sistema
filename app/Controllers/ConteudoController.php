<?php

namespace App\Controllers;

use App\Models\ConteudoModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class ConteudoController extends BaseController
{
    // Em app/Controllers/BaseController.php (ou dentro do seu Controller específico)
    protected $helpers = ['url', 'form'];

    // Dados da lateral (foto, nome e links), que aparece em todas as páginas
    private function perfil(): array
    {
        return [
            'nome'      => 'Rhayane Freitas',
            'descricao' => lang('Site.descricao'),
            'frase'     => lang('Site.frase'),
            'foto'      => 'assets/img/foto.jpg',
            'links'     => [
                ['icone' => 'fa-solid fa-envelope',  'texto' => 'E-mail',    'url' => 'mailto:seu-email@exemplo.com'],
                ['icone' => 'fa-brands fa-github',   'texto' => 'GitHub',    'url' => 'https://github.com/seu-usuario'],
                ['icone' => 'fa-brands fa-linkedin', 'texto' => 'LinkedIn',  'url' => 'https://www.linkedin.com/in/seu-usuario'],
                ['icone' => 'fa-brands fa-instagram','texto' => 'Instagram', 'url' => 'https://www.instagram.com/seu-usuario'],
                ['icone' => 'fa-brands fa-youtube',  'texto' => 'YouTube',   'url' => 'https://www.youtube.com/@seu-usuario'],
            ],
        ];
    }

    // Monta a página já com os dados da lateral e do idioma.
    // $endereco é o final do link (ex.: "blog"), usado no botão US | BR
    private function pagina(string $view, string $endereco, array $data)
    {
        $data['perfil']   = $this->perfil();
        $data['idioma']   = $this->request->getLocale();
        $data['endereco'] = $endereco;

        return view($view, $data);
    }

    public function index()
    {
        $data['conteudo']   = ['Titulo' => lang('Site.inicioTitulo')];
        $data['paragrafos'] = lang('Site.inicioParagrafos');

        return $this->pagina('home', '', $data);
    }

    public function projetos()
    {
        $data['conteudo'] = ['Titulo' => lang('Site.projetosTitulo')];
        $data['projetos'] = lang('Site.projetos');

        return $this->pagina('projetos', 'projetos', $data);
    }

    public function certificacoes()
    {
        $data['conteudo']      = ['Titulo' => lang('Site.certificacoesTitulo')];
        $data['certificacoes'] = lang('Site.certificacoes');

        return $this->pagina('certificacoes', 'certificacoes', $data);
    }

    public function publicacoes()
    {
        $data['conteudo']    = ['Titulo' => lang('Site.publicacoesTitulo')];
        $data['publicacoes'] = lang('Site.publicacoes');

        return $this->pagina('publicacoes', 'publicacoes', $data);
    }

    public function blog()
    {
        $data['conteudo'] = ['Titulo' => lang('Site.blogTitulo')];
        $data['posts']    = lang('Site.posts');

        return $this->pagina('blog', 'blog', $data);
    }

    public function cv()
    {
        $data['conteudo'] = ['Titulo' => lang('Site.cvTitulo')];

        return $this->pagina('cv', 'cv', $data);
    }

    public function contato()
    {
        $data['conteudo'] = [
            'Titulo' => lang('Site.contatoTitulo'),
            'Texto'  => lang('Site.contatoTexto'),
        ];

        return $this->pagina('contato', 'contato', $data);
    }

    /** Exibe todos os títulos e textos que podem ser administrados. */
    public function listar(): string
    {
        $model = new ConteudoModel();

        return view('conteudo/listar', [
            'conteudos' => $model->findAll(),
        ]);
    }

    /** Mostra o formulário do conteúdo escolhido. */
    public function editar(int $id): string
    {
        $model = new ConteudoModel();
        $conteudo = $model->find($id);

        if ($conteudo === null) {
            throw PageNotFoundException::forPageNotFound(
                'O conteúdo solicitado não foi encontrado.'
            );
        }

        return view('conteudo/editar', [
            'conteudo' => $conteudo,
            'erros'    => [],
        ]);
    }

    /** Valida e grava no banco as alterações feitas no formulário. */
    public function atualizar(int $id)
    {
        $model = new ConteudoModel();
        $conteudo = $model->find($id);

        if ($conteudo === null) {
            throw PageNotFoundException::forPageNotFound(
                'O conteúdo solicitado não foi encontrado.'
            );
        }

        $dadosPost = [
            'Titulo' => $this->request->getPost('Titulo'),
            'Texto'  => $this->request->getPost('Texto'),
        ];

        $regras = [
            'Titulo' => 'required|max_length[255]',
            'Texto'  => 'required',
        ];

        if (! $this->validate($regras)) {
            $conteudo['Titulo'] = $dadosPost['Titulo'] ?? '';
            $conteudo['Texto'] = $dadosPost['Texto'] ?? '';

            return view('conteudo/editar', [
                'conteudo' => $conteudo,
                'erros'    => $this->validator->getErrors(),
            ]);
        }

        $model->update($id, $dadosPost);

        return redirect()
            ->to(site_url('conteudos'))
            ->with('mensagem', 'Conteúdo atualizado com sucesso.');
    }
}
