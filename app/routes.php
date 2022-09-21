<?php

use App\Controllers\CategoriasController;
use App\Controllers\UsuariosController;
use App\Controllers\ViewController;
use App\Controllers\ProdutosController;
use App\Controllers\LoginController;
use App\Controllers\RegisterController;
use App\Core\Router;

//-----------Rotas do Front-------------//

//Pagina inicial
$router->get('', 'HomeController@index');
//$router->post('', 'HomeController@index');

//Registro de usuario
$router->get('register', 'RegisterController@registerForm');
$router->post('register', "RegisterController@registerAction");

//Login
$router->get('login', 'LoginController@index');
$router->post('login', 'LoginController@logIn');

//Logout
$router->post('logout', 'LoginController@logout');

//Criar um novo post
$router->post('post', "PostController@store");