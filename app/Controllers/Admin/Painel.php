<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Painel extends BaseController
{
    protected $helpers = ['url'];

    // Painel administrativo.
    // A rota "admin" já exige login (session) e o grupo admin (group:admin).
    public function index(): string
    {
        return view('admin/painel', [
            'usuario' => auth()->user(),
        ]);
    }
}
