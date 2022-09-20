<?php

use App\Controllers\CategoriasController;
use App\Controllers\UsuariosController;
use App\Controllers\ViewController;
use App\Controllers\ProdutosController;
use App\Controllers\LoginController;
use App\Controllers\HomeController;
use App\Core\Router;

//-----------Rotas do Front-------------//

$router->get('', 'HomeController@index');
$router->get('login', 'LoginController@index');
//$router->get('admin', 'LoginController@index');

//$router->get('', 'ViewController@home');
