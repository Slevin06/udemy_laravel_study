<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;


class BookController extends Controller
{
    // auth
    public function __construct()
    {
        $this->middleware('auth');
    }

    // top
    public function index()
    {
        $bookAttributes = Book::all();
//        return view('books', ['books' => $books]);
        return view('books', compact('bookAttributes'));
    }

    // 書籍データ投稿
    public function create(Request $request)
    {
        // imageの値を取得
        $imgPath = $request->book_image->store('public/images');

        // 画像ファイル名を取得
        $img_name = basename($imgPath);

        $createData = [
            'title' => $request->name,
            'img_name' => $img_name,
        ];

        $book = new Book;
        $book->fill($createData)->save();

        return redirect('/')->with('create success', '登録完了しました');
    }

    // 削除
    public function delete(Request $request)
    {
        $book = new Book;
        $book->find($request->id)->delete();
        return redirect('/')->with('delete success', '削除完了しました');
    }
}
