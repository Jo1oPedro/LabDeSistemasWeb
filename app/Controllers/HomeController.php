<?php

namespace App\Controllers;
use App\Core\App;
use App\Models\Banner;
use App\Models\Post;
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
        $posts_mais_recentes = Post::all()->take(3);
        $posts = Post::inRandomOrder()->whereNotIn("id", array_column($posts_mais_recentes->toArray(), "id"))->paginate(1);
        $banner = Banner::inRandomOrder()->first();
        return view('admin/home_page', compact('posts_mais_recentes', "posts", "banner"));
    }

}