<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\Shield\Validation\ValidationRules;

class Usuarios extends BaseController
{
    protected $helpers = ['url', 'form'];

    // Lista os usuários e mostra o formulário de cadastro.
    // A rota "admin/usuarios" exige login e o grupo admin.
    public function index(): string
    {
        $users = auth()->getProvider();

        return view('admin/usuarios', [
            'usuarios' => $users->withIdentities()->withGroups()->findAll(),
            'erros'    => session('erros') ?? [],
        ]);
    }

    // Cadastra um novo usuário.
    // A rota POST "usuarios" exige login e a permissão users.create.
    public function store()
    {
        // Checagem também no controller, antes de chamar o model
        // ou gravar qualquer dado
        $user = auth()->user();

        if ($user === null || ! $user->can('users.create')) {
            return redirect()->back()->with('error', 'Acesso não autorizado.');
        }

        // Validar os dados: mesmas regras do cadastro público do Shield
        // (usuário e e-mail únicos, senha forte e confirmação da senha)
        $regras = (new ValidationRules())->getRegistrationRules();

        if (! $this->validateData($this->request->getPost(), $regras, [], config('Auth')->DBGroup)) {
            return redirect()
                ->to(site_url('admin/usuarios'))
                ->withInput()
                ->with('erros', $this->validator->getErrors());
        }

        // Executar o cadastro
        $users = auth()->getProvider();
        $novo  = $users->createNewUser($this->request->getPost(['username', 'email', 'password']));

        $users->save($novo);

        // Busca o usuário gravado (com Id) para colocar no grupo padrão
        // ("user", definido em app/Config/AuthGroups.php) e ativar a conta.
        // O grupo admin NÃO é dado aqui: é atribuído por um processo controlado.
        $novo = $users->findById($users->getInsertID());
        $users->addToDefaultGroup($novo);
        $novo->activate();

        return redirect()
            ->to(site_url('admin/usuarios'))
            ->with('mensagem', 'Usuário cadastrado com sucesso.');
    }
}
