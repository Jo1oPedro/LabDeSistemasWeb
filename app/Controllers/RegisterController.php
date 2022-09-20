<?php

namespace App\Controllers;
use App\Models\User;
use Illuminate\Database\QueryException;

class RegisterController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function registerForm()
    {
        return view('guests/register_page');
    }

    public function registerAction()
    {
        $filterForm = [
            "name" => FILTER_SANITIZE_STRIPPED,
            "email" => FILTER_VALIDATE_EMAIL,
            "password" => FILTER_SANITIZE_STRIPPED,
            "birthdate" => FILTER_SANITIZE_STRIPPED,
            "gender" => FILTER_SANITIZE_STRIPPED,
        ];
        $userData = filter_input_array(INPUT_POST, $filterForm);
        if(in_array(false, $userData)) {
            $errors = array_keys($userData, false, false);
            $_SESSION["error"] = [];
            foreach($errors as $error) {
                $_SESSION["error"][$error] = "Erro ao cadastrar o usuario";
            }
            return view('guests/register_page');
        }
        try {
            $userData["password"] = password_hash($userData["password"], PASSWORD_BCRYPT);
            $user = User::create($userData);
        } catch(QueryException $PDOException) {
            $_SESSION["error"] = ["email" => "Email já foi cadastrado"];
            return view('guests/register_page');
        }
        unset($_SESSION["error"]);
        $_SESSION["logado"] = $user->getAttributes();
        var_dump($_SESSION);
        return redirect("");
    }

}