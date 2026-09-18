<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ConteudoController extends BaseController
{
    public function index()
    {
        // aqui entra o conteúdo da função
        return view('home');
    }

    public function contato()
    {
        return view('contato');
    }
}
