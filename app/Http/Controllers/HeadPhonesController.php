<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HeadPhonesController extends Controller
{
      // dd("crate");

    //   return view('Product/HeadPhone/createHeadPhones');
      // dd("crate");

      public function headphones()
    {
        $HeadPhone_list = DB::table('HeadPhones')->orderBy("id", "desc")->get();
        return view('/Product/HeadPhones', compact('HeadPhone_list'));
    }
}

