<?php

namespace App\Controllers;
//require "bootstrap/start_application.php";
use App\Core\App;
use App\Models\User;
use Exception;

class HomeController {

    public function __construct()
    {
        session_start();
        if(!isset($_SESSION['usuario'])) {
            return redirect('login');
            //return view('guests/login_page');
            exit();
        }
    }

    public function index() 
    {
        /*$user = new User([
            "name" => "cascata",
            "email" => "a@a",
            "password" => "123456",
            "sexo" => "M",
            "data_nascimento" => "1985-02-06",
        ]);
        $user->save();*/
        return view('admin/home_page');
    }

}