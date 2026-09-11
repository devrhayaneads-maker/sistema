<?php

namespace App\Controllers;

use App\Controllers\BaseController;
// Faz o include do ConteudoModel no arquivo ConteudoController
use App\Models\ConteudoModel;

class ConteudoController extends BaseController
{
    public function quemSou(): string
{
    $conteudoModel = new ConteudoModel();

    $dados['conteudo'] = $conteudoModel->find(1);

    return view('quem_sou', $dados);
}

public function produtos(): string
{
    $conteudoModel = new ConteudoModel();

    $dados['conteudo'] = $conteudoModel->find(2);

    return view('produtos', $dados);
}

public function contato(): string
{
    $conteudoModel = new ConteudoModel();

    $dados['conteudo'] = $conteudoModel->find(3);

    return view('contato', $dados);
}
}
