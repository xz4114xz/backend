<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function testAction(){
        return view('welcome');
    }

    public function index(){
        return view('front/index');
    }

    public function contact_us(){
        return view('front/contact_us');
    }

    public function news(){
        return view('front/news');
    }

    public function news_info(){
        return view('front/news_info');
    }

    public function template(){
        return view('front/template');
    }

}
