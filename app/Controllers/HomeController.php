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
}