<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function list(Request $request){

        $search = $request->get("search");

        $data = Book::Search($search)->orderBy("id" , "desc")->paginate(20);
        $authors = Author::all();
        return view("book.listbook", compact("data", "authors"));
    }

    public function delete(Book $book){
        $book->delete();
        return redirect()->to("listbooks");

    }
}
