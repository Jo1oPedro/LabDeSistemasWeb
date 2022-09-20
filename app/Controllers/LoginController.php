<?php

namespace App\Controllers;

use App\Models\User;

class LoginController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        if(isset($_SESSION['logado'])) {
            return redirect('');
            exit();
        }
    }

    public function index()
    {
        return view('guests/login_page');
    }

    public function logIn()
    {
        //var_dump($_POST["email"]);
        $email = $_POST["email"];
        filter_input(INPUT_POST, $email, FILTER_VALIDATE_EMAIL);
        $password = $_POST["password"];
        filter_input(INPUT_POST,  $password, FILTER_SANITIZE_STRIPPED);
        $user = User::where("email", $email)->first();
        if(password_verify($password, $user->password)) {
            echo "dale";
        } else {
            echo "dele";
        }
    }

    public function logou()
    {

    }

}

