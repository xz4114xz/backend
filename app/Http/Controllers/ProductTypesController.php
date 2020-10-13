<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\App\product_type;
class ProductTypesController extends Controller
{

    public function index($product_type_id){

        $product_type = product_type::where('id',$product_type_id)->with('product')->get();
        dd($product_type_id);

    }

}
