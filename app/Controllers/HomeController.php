<?php

namespace App\Controllers;
use App\Core\App;
use App\Models\User;
use Exception;

class HomeController extends Controller{

    public function __construct()
    {
        parent::__construct();
        if(!isset($_SESSION['logado'])) {
            return redirect('login');
            exit();
        }
    }

    public function index() 
    {
        /*
        $user->save();*/

        return view('admin/home_page');
    }

}