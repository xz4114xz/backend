<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Auth;

Route::get('/' , 'FrontController@index');
Route::get('/index' , 'FrontController@index');
Route::get('/contact_us' , 'FrontController@contact_us');
Route::get('/news' , 'FrontController@news');
Route::get('/news_info/{news_id}' , 'FrontController@news_info');//{newsid} 會成為FrontController內 news_info此函式的引數
Route::get('/product_info/{product_id}' , 'FrontController@product_info');
Route::post('/store_contact_us', 'FrontController@store_contact_us');
Route::get('/login' , 'FrontController@login');
Route::get('/register','FrontController@register');

// Auth::routes();
Auth::routes(['register'=>false]);

// Backend Home
Route::get('/admin', 'HomeController@index')->name('home');

// NewsBackend
Route::prefix('admin')->middleware(['auth'])->group(function(){
    Route::get('/news','NewsController@news');
    Route::get('/news/create','NewsController@create');
    Route::post('/news/store','NewsController@store');
    Route::get('/news/edit/{newsid}','NewsController@edit');
    Route::post('/news/edit/update/{newsid}','NewsController@update');
    Route::get('/news/destroy{newsid}','NewsController@destroy');

});

// HeadPhone
Route::prefix('admin')->middleware(['auth'])->group(function(){
    Route::get('/HeadPhone','HeadPhonesController@news');
    Route::get('/HeadPhone/create','HeadPhonesController@create');
    Route::post('/HeadPhone/store','HeadPhonesController@store');
    Route::get('/HeadPhone/edit/{HeadPhoneid}','HeadPhonesController@edit');
    Route::post('/HeadPhone/edit/update/{HeadPhoneid}','HeadPhonesController@update');
    Route::get('/HeadPhone/destroy{HeadPhoneid}','HeadPhonesController@destroy');

});

// Product
Route::prefix('admin')->middleware(['auth'])->group(function(){
    Route::get('/Product','ProductController@product');
    Route::get('/Product/create','ProductController@create');
    Route::post('/Product/store','ProductController@store');
    Route::get('/Product/edit/{productid}','ProductController@edit');
    Route::post('/Product/edit/update/{productid}','ProductController@update');
    Route::get('/Product/destroy{productid}','ProductController@destroy');

    //ProductType
    Route::resource('ProductType','ProductTypesController');
});


// ProductType
// Route::prefix('admin')->middleware(['auth'])->group(function(){
//     Route::get('/ProductType','ProductTypesController@productTypes');
//     Route::get('/ProductType/create','ProductTypesController@create');
//     Route::post('/ProductType/store','ProductTypesController@store');




// });

