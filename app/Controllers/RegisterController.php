<?php

namespace App\Controllers;
use App\Models\User;
use Illuminate\Database\QueryException;

class RegisterController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        if(isset($_SESSION["errors"])) {
            foreach($_SESSION["errors"] as $key => $erro) {
                unset($_SESSION["errors"][$key]);
            }
        }
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
            $_SESSION["errors"] = [];
            foreach($errors as $error) {
                if($error == "name") {
                    $_SESSION["errors"][$error] = "Campo nome é obrigatório";
                } else if($error == "email") {
                    $_SESSION["errors"][$error] = "Campo email é obrigatório";
                } else if($error == "password") {
                    $_SESSION["errors"][$error] = "Campo senha é obrigatório";
                } else if($error == "birthdate") {
                    $_SESSION["errors"][$error] = "Campo data de aniversário é obrigatório";
                } else if($error == "gender") {
                    $_SESSION["errors"][$error] = "Campo genero é obrigatório";
                }
            }
            return view('guests/register_page');
        }
        try {
            $userData["password"] = password_hash($userData["password"], PASSWORD_BCRYPT);
            $user = User::create($userData);
        } catch(QueryException $exception) {
            $_SESSION["errors"] = ["email" => "Email já foi cadastrado"];
            return view('guests/register_page');
        }
        unset($_SESSION["errors"]);
        $_SESSION["logado"] = $user->getAttributes();
        return redirect("home");
    }

}