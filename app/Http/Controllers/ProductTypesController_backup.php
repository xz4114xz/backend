<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use\App\product_type;

class ProductTypesController extends Controller
{

    // public function index($product_type_id){

    //     $product_type = product_type::where('id',$product_type_id)->with('product')->get();
    //     // dd($product_type_id);

    // }
    public function productTypes(){
        $product_types = DB::table('product_type')->orderBy("sort", "asc")->get();
        // dd($product_list);
        return view('Product _type/product_type', compact('product_types'));
    }

    public function create()
    {
        // dd("create product type");
        $product_types = DB::table('product_type')->orderBy("id","asc")->get();
        return view('Product _type/create',compact('product_types'));
    }

    public function store(Request $request)
    {
        dd('store');
        $requestData = $request->all();
        // dd($requestData);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = $this->fileUpload($file, 'productTypes');
            $requestData['file'] = $path;

        }

        product_type::create($requestData);
        return redirect('/admin/ProductType');
    }



}
