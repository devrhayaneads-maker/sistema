<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ConteudoModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Painel extends BaseController
{
    protected $helpers = ['url', 'form'];

    // Seções do site que aparecem no menu do painel: endereço => título na tabela Conteudo
    private array $secoes = [
        'projetos'      => 'Projetos',
        'certificacoes' => 'Certificações',
        'publicacoes'   => 'Publicações',
        'blog'          => 'Blog',
    ];

    public function index()
    {
        return view('admin/painel', [
            'ativo'  => 'admin',
            'titulo' => 'Painel administrativo',
        ]);
    }

    // Abre o formulário de edição da seção clicada no menu (ex.: admin/projetos)
    public function secao(string $secao)
    {
        if (! isset($this->secoes[$secao])) {
            throw PageNotFoundException::forPageNotFound('Seção não encontrada.');
        }

        $titulo   = $this->secoes[$secao];
        $model    = new ConteudoModel();
        $conteudo = $model->where('Titulo', $titulo)->first();

        // Se a seção ainda não existe no banco, cria vazia para poder editar
        if ($conteudo === null) {
            $id       = $model->insert(['Titulo' => $titulo, 'Texto' => '']);
            $conteudo = $model->find($id);
        }

        return view('conteudo/editar', [
            'conteudo' => $conteudo,
            'erros'    => [],
            'ativo'    => $secao,
            'titulo'   => 'Editar conteúdo',
        ]);
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->to('login');
    }
}
