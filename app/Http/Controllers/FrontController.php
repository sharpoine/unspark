<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostView;
use Carbon\Carbon;
use Illuminate\Http\Request;


class FrontController extends Controller
{
    public function Anasayfa()
    {
        return view('front.anasayfa');
    }
    public function Blog()
    {

        date_default_timezone_set("Europe/Istanbul");
        $posts = Post::select("*")->paginate(9);
        return view('front.blog', ['posts' => $posts]);
    }
    public function BlogDetay($baslik)
    {
        $post = PostView::where('slug', $baslik)->paginate(9);
        return view('front.blogdetay', ['post' => $post]);
    }
    public function Iletisim()
    {
    }
    public function Hakkimizda()
    {
        return view('front.hakkimizda');
    }
}
