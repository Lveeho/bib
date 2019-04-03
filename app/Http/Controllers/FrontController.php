<?php

namespace App\Http\Controllers;


use App\Book;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //
    public function index(){
        $books = Book::all();
        return view('search', compact('books'));
    }
}
