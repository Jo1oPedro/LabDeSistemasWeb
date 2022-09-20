<?php

use App\Controllers\CategoriasController;
use App\Controllers\UsuariosController;
use App\Controllers\ViewController;
use App\Controllers\ProdutosController;
use App\Controllers\LoginController;
use App\Controllers\RegisterController;
use App\Core\Router;

//-----------Rotas do Front-------------//

$router->get('', 'HomeController@index');
$router->get('login', 'LoginController@index');
$router->post('', 'HomeController@index');

//Registro de usuario
$router->get('register', 'RegisterController@registerForm');
$router->post('register', "RegisterController@registerAction");

//Login
$router->post('login', 'LoginController@logIn');