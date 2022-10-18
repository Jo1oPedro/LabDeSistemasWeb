<?php

namespace App\Controllers;
use App\Core\App;
use App\Models\Banner;
use App\Models\Post;
use App\Models\User;
use Exception;
use Illuminate\Database\Capsule\Manager as DB;

class HomeController extends Controller
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
        $posts_mais_recentes = Post::all()->take(-3);
        $posts = Post::inRandomOrder()->whereNotIn("id", array_column($posts_mais_recentes->toArray(), "id"))->get();
        
        //$posts = DB::table('posts')->where('id', array_column(Post::all()->toArray(), "id"))->paginate(1);//Post::all()->paginate(1);
        
        
        /*$numberToPaginate = 2;
        $paginate = Post::paginate($numberToPaginate);
        $posts = Post::skip(isset($_GET['page']) ? $numberToPaginate*($_GET['page']-1) : 0)->take($numberToPaginate)->get();*/
        
        $banner = Banner::inRandomOrder()->first();
        return view('admin/home_page', compact('posts_mais_recentes', "posts", "banner"));
    }

    public function show() 
    {
        $post = Post::find($_GET['post_id']); 
        return view('admin/invidual_home_page', compact('post'));
    }

}