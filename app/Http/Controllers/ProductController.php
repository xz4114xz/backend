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
        $product_list = DB::table('product')->orderBy("id", "desc")->get();
        return view('Product/product', compact('product_list'));
    }

    public function create()
    {
        // dd("crate");
        return view('Product/create');

    }

    public function store(Request $request)
    {
        // dd("store");
        $requestData = $request->all();
        // dd($requestData);
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = $this->fileUpload($file, 'product');
            $requestData['file'] = $path;
        }
        // dd($requestData);
        
        Product::create($requestData);
        // dd('123');
        return redirect('/admin/Product');
    }


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
