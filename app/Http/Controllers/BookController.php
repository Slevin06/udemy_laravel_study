<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class BookController extends Controller
{
    // top
    public function index()
    {
        $books = Book::all();
        return view('books', ['books' => $books]);
    }

    // 書籍データ投稿
    public function create(Request $request)
    {
        $createData = [
            'title' => $request->name,
        ];

        $book = new Book;
        $book->fill($createData)->save();

        return redirect('/');
    }

    // 削除
    public function delete(Request $request)
    {
        $book = new Book;
        $book->find($request->id)->delete();
        return redirect('/')->with('success', '削除完了しました');
    }
}
