<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use\App\product_type;
use\App\product;

class ProductTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $product_types = DB::table('product_type')->orderBy("sort", "asc")->get();
        // dd($product_list);
        return view('Product_type/product_type', compact('product_types'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd("create product type");
        $product_types = DB::table('product_type')->orderBy("id","asc")->get();
        return view('Product_type/create',compact('product_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $product = DB::table('product')->find($id);
        $product_type = DB::table('product_type')->where("id",$id)->first();
        // $product_type = product_type::find($id);
        // dd($products);
        //  dd($product_type);
        return view('Product_type/edit', compact('product_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // dd('update');
        // $news = DB::table('news')->find($id);
        $product_type = product_type::find($id);
        $requestData = $request->all();

        // dd($requestData);
        // dd($product_type);
        $product_type->update($requestData);

        return redirect('/admin/ProductType');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd("delete");
    }
}
