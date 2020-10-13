<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Product;
class ProductController extends Controller
{
    public function product()
    {
        $product_list = DB::table('product')->orderBy("sort", "asc")->get();
        // dd($product_list);
        return view('Product/product', compact('product_list'));
    }

    public function create()
    {
        return view('Product/create');
    }

    public function store(Request $request)
    {
        $requestData = $request->all();
        dd($requestData);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = $this->fileUpload($file, 'product');
            $requestData['file'] = $path;
        }

        Product::create($requestData);
        return redirect('/admin/Product');
    }

    public function edit($id)
    {
        // dd("edit");
        $products = DB::table('product')->find($id);
        $product_types = DB::table('product_type')->orderBy("id","asc")->get();
        // dd($products);
        // dd($products->info);
        return view('Product/edit', compact('products','product_types'));
    }

    public function update(Request $request, $id)
    {
        // dd('update');
        // $news = DB::table('news')->find($id);
        $product = Product::find($id);
        $requestData = $request->all();
        if ($request->hasFile('file')) {
            //刪除檔案
            $old_image = $product->file;
            File::delete(public_path() . $old_image);

            $file = $request->file('file');
            $path = $this->fileUpload($file, 'product'); //硬碟存入新檔案
            $requestData['file'] = $path; //存入顯示路徑

        }
        // dd($requestData);
        // dd($product);
        $product->update($requestData);

        return redirect('/admin/Product');
    }

    /////////////////////////////////////////
    private function fileUpload($file, $dir)
    {
        //防呆：資料夾不存在時將會自動建立資料夾，避免錯誤
        if (!is_dir('upload/')) {
            mkdir('upload/');
        }
        //防呆：資料夾不存在時將會自動建立資料夾，避免錯誤
        if (!is_dir('upload/' . $dir)) {
            mkdir('upload/' . $dir);
        }
        //取得檔案的副檔名
        $extension = $file->getClientOriginalExtension();
        //檔案名稱會被重新命名
        $filename = strval(time() . md5(rand(100, 200))) . '.' . $extension;
        //移動到指定路徑
        move_uploaded_file($file, public_path() . '/upload/' . $dir . '/' . $filename);
        //回傳 資料庫儲存用的路徑格式
        return '/upload/' . $dir . '/' . $filename;
    }
}
