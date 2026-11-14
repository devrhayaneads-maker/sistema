<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// Página inicial sem idioma vai para a versão em português
$routes->addRedirect('/', 'pt');

// Registra as rotas do Shield (login, logout, register, etc.) antes da rota genérica de idioma
auth()->routes($routes);

// Endereços antigos (precisam vir antes das rotas com {locale})
$routes->get('rhayane', 'Home::rhayane');
$routes->get('home', static fn () => redirect()->to('pt'));
$routes->get('quem-sou', static fn () => redirect()->to('pt'));
$routes->get('publicacoes', static fn () => redirect()->to('pt/publicacoes'));
$routes->get('projetos', static fn () => redirect()->to('pt/projetos'));
$routes->get('certificacoes', static fn () => redirect()->to('pt/certificacoes'));
$routes->get('blog', static fn () => redirect()->to('pt/blog'));
$routes->get('cv', static fn () => redirect()->to('pt/cv'));
$routes->get('contato', static fn () => redirect()->to('pt/contato'));

// Listagem, formulário de edição e atualização
// (precisam vir antes das rotas com {locale}, senão "conteudos" vira um idioma)
$routes->get('conteudos', 'ConteudoController::listar', ['filter' => 'session']);
$routes->get('conteudos/editar/(:num)', 'ConteudoController::editar/$1', ['filter' => 'session']);
$routes->post('conteudos/atualizar/(:num)', 'ConteudoController::atualizar/$1', ['filter' => 'session']);

// Painel: exige login e grupo admin
$routes->get('admin', 'Admin\Painel::index', [
    'filter' => ['session', 'group:admin'],
]);

// Seções do site e usuários dentro do painel: exigem login e grupo admin
$routes->get('admin/usuarios', 'Admin\Painel::usuarios', [
    'filter' => ['session', 'group:admin'],
]);
$routes->get('admin/(projetos|certificacoes|publicacoes|blog)', 'Admin\Painel::secao/$1', [
    'filter' => ['session', 'group:admin'],
]);

// Logout: aceita apenas usuários autenticados
$routes->post('admin/sair', 'Admin\Painel::logout', [
    'filter' => 'session',
]);

// {locale} = idioma do site: "pt" (português) ou "en" (inglês)
$routes->get('{locale}', 'ConteudoController::index');
$routes->get('{locale}/projetos', 'ConteudoController::projetos');
$routes->get('{locale}/certificacoes', 'ConteudoController::certificacoes');
$routes->get('{locale}/publicacoes', 'ConteudoController::publicacoes');
$routes->get('{locale}/blog', 'ConteudoController::blog');
$routes->get('{locale}/cv', 'ConteudoController::cv');
$routes->get('{locale}/contato', 'ConteudoController::contato');
