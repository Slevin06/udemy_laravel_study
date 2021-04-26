<?php

use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    $books = Book::all();
//    return view('books', ['books' => $books]);
//});

// トップ
//Route::get('/', 'BookController@index')->middleware('auth');
Route::get('/', 'BookController@index');

// 書籍データ投稿
Route::post('/book', 'BookController@create');

// 削除
Route::post('/book/{id}', 'BookController@delete');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
