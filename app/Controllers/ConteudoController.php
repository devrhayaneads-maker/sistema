<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ConteudoController extends BaseController
{
    // Em app/Controllers/BaseController.php (ou dentro do seu Controller específico)
    protected $helpers = ['url'];

    public function index()
    {
        $data['conteudo'] = [
            'Titulo' => 'Página inicial do site',
            'Texto'  => 'Bem-vindo! Esta página usa o layout principal com o menu do sistema.',
        ];

        return view('home', $data);
    }

    public function contato()
    {
        $data['conteudo'] = [
            'Titulo' => 'Página de contato',
            'Texto'  => 'Entre em contato conosco pelo e-mail contato@meusite.com.',
        ];

        return view('contato', $data);
    }
}
