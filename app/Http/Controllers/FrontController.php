<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function Anasayfa(){
        return view('front.anasayfa');
    }
    public function Blog(){
        return view('front.blog');
    }
    public function Iletisim()
    {

    }
    public function Hakkimizda(){
        return view('front.hakkimizda');
    }

}
