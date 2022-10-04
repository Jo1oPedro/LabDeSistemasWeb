<?php

namespace App\Controllers;

use App\Models\Banner;

class BannerController extends Controller
{
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
        Banner::create(["image_path" => "public/img/banners/default_banner3.jpg"]);
    }
}