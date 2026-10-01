<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// Página inicial sem idioma vai para a versão em português
$routes->addRedirect('/', 'pt');

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

// {locale} = idioma do site: "pt" (português) ou "en" (inglês)
$routes->get('{locale}', 'ConteudoController::index');
$routes->get('{locale}/projetos', 'ConteudoController::projetos');
$routes->get('{locale}/certificacoes', 'ConteudoController::certificacoes');
$routes->get('{locale}/publicacoes', 'ConteudoController::publicacoes');
$routes->get('{locale}/blog', 'ConteudoController::blog');
$routes->get('{locale}/cv', 'ConteudoController::cv');
$routes->get('{locale}/contato', 'ConteudoController::contato');
