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

Route::get('/' , 'FrontController@index');
Route::get('/index' , 'FrontController@index');
Route::get('/contact_us' , 'FrontController@contact_us');
Route::get('/news' , 'FrontController@news');
Route::get('/news_info/{news_id}' , 'FrontController@news_info');//{newsid} 會成為FrontController內 news_info此函式的引數
// Route::get('/template.html' , 'FrontController@template');
Route::post('/store_contact_us', 'FrontController@store_contact_us');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


