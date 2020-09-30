<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\attraction;

class FrontController extends Controller
{

    public function testAction(){
        return view('welcome');
    }

    public function index(){
        $news_list = DB::Table('news')->orderBy("id","desc")->take(3)->get();
        // dd($news_list);
        return view('front/index',compact('news_list'));
    }

    public function contact_us(){
        return view('front/contact_us');
    }

    public function news(){
        // $news_list = DB::Table('news')->orderBy("id","desc")->get();
        $news_list = DB::table('news')->orderBy("id","desc")->paginate(6);
        return view('front/news',compact('news_list'));
    }

    public function news_info($news_id){
        $news = DB::Table('news')->where("id","=",$news_id)->first();
        return view('front/news_info',compact('news'));
    }

    public function template(){
        return view('front/template');
    }
    public function store_contact_us(Request $request){
        // dd($request->all());

        //透過db輸入
        // DB::table("attractions")->insert(
        //     ['email'=>$request->email,
        //     'location'=>$request->location,
        //     'file'=>$request->file,
        //     'Attractions_name'=>$request->Attractions_name,
        //     'info'=>$request->info
        //     ]);


        //透過orm
            $new_attraction = new attraction;
            $new_attraction->email = $request->email;
            $new_attraction->location = $request->location;
            $new_attraction->file = $request->file;
            $new_attraction->Attractions_name = $request->Attractions_name;
            $new_attraction->info = $request->info;


            $new_attraction->save();
        //透過 orm mass assigment
            // attraction::create($request->all());

        return "success";

    }

}
