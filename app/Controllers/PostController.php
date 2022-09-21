<?php

namespace App\Controllers;

use App\Models\Post;

class PostController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        if(!isset($_SESSION['logado'])) {
            return redirect('login');
            exit();
        }
    }

    public function store()
    {
        if($_SESSION["logado"]["id"] == $_POST["user_id"]) {
            $filterForm = [
                "body" => FILTER_SANITIZE_STRIPPED,
                "user_id" => FILTER_SANITIZE_NUMBER_INT,
            ];
            $postData = filter_input_array(INPUT_POST, $filterForm);
            if(!in_array(false, $postData)) {
                Post::create($postData);
                return redirect('');
                exit();
            }
            $_SESSION["errors"] = ["error" => "Erro ao criar um novo post"];
        }

    }

}