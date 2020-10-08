<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return view('front/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd("crate");

        return view('News/create/create');
        // dd("crate");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd("store");



        $requestData = $request->all();

        if ($request->hasFile('ImageURL')) {
            $file = $request->file('ImageURL');
            $path = $this->fileUpload($file, 'news');
            $requestData['ImageURL'] = $path;
        }

        News::create($requestData);

        return redirect('/admin/news');
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
        // dd("edit");
        $news = DB::table('news')->find($id);
        // dd($news);
        return view('News/update/edit', compact('news'));
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
        $news = News::find($id);
        $requestData = $request->all();
        if ($request->hasFile('ImageURL')) {
            //刪除檔案
            $old_image = $news->ImageURL;
            File::delete(public_path() . $old_image);

            $file = $request->file('ImageURL');
            $path = $this->fileUpload($file, 'news'); //硬碟存入新檔案
            $requestData['ImageURL'] = $path; //存入顯示路徑

        }
        $news->update($requestData);

        return redirect('/admin/news');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = News::find($id);
        $old_image = $item->ImageURL;
        if (file_exists(public_path() . $old_image)) {
            File::delete(public_path() . $old_image);
        }
        $item->delete();

        return redirect('/admin/news');
    }

    public function news()
    {
        $news_list = DB::table('news')->orderBy("id", "desc")->get();
        return view('News/news', compact('news_list'));
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
