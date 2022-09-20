<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class HomeController {

    public function __construct()
    {
        /*session_start();
        if(!isset($_SESSION['usuario'])) {
            return view('login_page');
        }*/
    }

    public function index() 
    {
        return view('admin/home_page');
    }

}