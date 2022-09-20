<?php

namespace App\Controllers;

class LoginController
{

    public function __construct()
    {

    }

    public function index()
    {
        return view('guests/login_page');
    }

}

