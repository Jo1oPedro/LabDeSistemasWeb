<?php

namespace App\Controllers;

use App\Models\Post;
use App\Helpers\ImageHelper;

class PostController extends Controller
{

    private $imageHelper;

    public function __construct()
    {
        $this->imageHelper = new ImageHelper();
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
            $file = $_FILES['file'];
            $postData = filter_input_array(INPUT_POST, $filterForm);
            if(!in_array(false, $postData)) {
                $allowedTypes = [
                    "image/jpg",
                    "image/jpeg",
                    "image/png",
                ];
                if(!in_array($file['type'], $allowedTypes)) {
                    $_SESSION["errors"] = ["file" => "Tipo de arquivo invalido"];
                    return redirect('');
                    exit();
                }
                //$postData["file"] = time() . mb_strstr($file['name'], '.');
                $this->imageHelper->resize($_FILES["file"], $postData, 500,500);
                Post::create($postData);
                return redirect('');
                exit();
            }
            $_SESSION["errors"] = ["error" => "Erro ao criar um novo post"];
        }

    }

}