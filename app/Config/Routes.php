<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// ATENÇÃO À ORDEM: as rotas com {locale} ficam sempre no FIM do arquivo.
// O {locale} aceita qualquer palavra, então uma rota escrita depois dele
// (ex.: "login", "conteudos", "admin") seria tratada como um idioma.

// Rotas padrão do Shield (login, cadastro, logout...).
// Inserida pelo "php spark shield:setup" — não duplique esta chamada.
service('auth')->routes($routes);

// ---------------------------------------------------------------
// Rotas públicas (não exigem login)
// ---------------------------------------------------------------

// Página inicial sem idioma vai para a versão em português
$routes->addRedirect('/', 'pt');

// Endereços antigos
$routes->get('rhayane', 'Home::rhayane');
$routes->get('home', static fn () => redirect()->to('pt'));
$routes->get('quem-sou', static fn () => redirect()->to('pt'));
$routes->get('publicacoes', static fn () => redirect()->to('pt/publicacoes'));
$routes->get('projetos', static fn () => redirect()->to('pt/projetos'));
$routes->get('certificacoes', static fn () => redirect()->to('pt/certificacoes'));
$routes->get('blog', static fn () => redirect()->to('pt/blog'));
$routes->get('cv', static fn () => redirect()->to('pt/cv'));
$routes->get('contato', static fn () => redirect()->to('pt/contato'));

// ---------------------------------------------------------------
// Rotas que exigem autenticação por sessão (usuário logado)
// ---------------------------------------------------------------
$routes->group('', ['filter' => 'session'], static function ($routes) {
    $routes->get('conteudos', 'ConteudoController::listar');
    $routes->get('conteudos/editar/(:num)', 'ConteudoController::editar/$1');
    $routes->post('conteudos/atualizar/(:num)', 'ConteudoController::atualizar/$1');
});

// ---------------------------------------------------------------
// Área administrativa
// ---------------------------------------------------------------

// Exclusivas para administradores: exige login E pertencer ao grupo admin
$routes->get('admin', 'Admin\Painel::index', [
    'filter' => ['session', 'group:admin'],
]);
$routes->get('admin/usuarios', 'Admin\Usuarios::index', [
    'filter' => ['session', 'group:admin'],
]);

// Cadastrar usuário: exige login E a permissão users.create
$routes->post('usuarios', 'Admin\Usuarios::store', [
    'filter' => ['session', 'permission:users.create'],
]);

// ---------------------------------------------------------------
// Rotas públicas do site com idioma (sempre por último)
// {locale} = idioma do site: "pt" (português) ou "en" (inglês)
// ---------------------------------------------------------------
$routes->get('{locale}', 'ConteudoController::index');
$routes->get('{locale}/projetos', 'ConteudoController::projetos');
$routes->get('{locale}/certificacoes', 'ConteudoController::certificacoes');
$routes->get('{locale}/publicacoes', 'ConteudoController::publicacoes');
$routes->get('{locale}/blog', 'ConteudoController::blog');
$routes->get('{locale}/cv', 'ConteudoController::cv');
$routes->get('{locale}/contato', 'ConteudoController::contato');
