<?php

namespace App\Controllers;

use App\Models\User;

class LoginController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        unset($_SESSION["errors"]);
        if(isset($_SESSION['logado'])) {
            if($_SERVER["REQUEST_URI"] != "/logout") {
                return redirect('home');
                exit();
            }
        }
    }

    public function index()
    {
        return view('guests/login_page');
    }

    public function logIn()
    {
        $email = $_POST["email"];
        filter_input(INPUT_POST, $email, FILTER_VALIDATE_EMAIL);
        $password = $_POST["password"];
        filter_input(INPUT_POST,  $password, FILTER_SANITIZE_STRIPPED);
        $user = User::where("email", $email)->first();
        if(!$user) {
            $_SESSION["errors"] = ["loginInvalido" => "E-mail invalido"];
            return view('guests/login_page');
        }
        if(password_verify($password, $user->password)) {
            $_SESSION["logado"] = $user;
            unset($_SESSION["errors"]);
            return redirect("home");
            exit();
        }
        $_SESSION["errors"] = ["loginInvalido" => "Login invalido"];
        return view('guests/login_page');
    }

    public function logout()
    {
        unset($_SESSION["logado"]);
        return redirect('login');
        exit();
    }

}

