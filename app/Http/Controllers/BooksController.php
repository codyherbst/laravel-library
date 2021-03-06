<?php

namespace App\Http\Controllers;

use App\Books;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index() {

        $books = Books::latest()->get();

        return view('books.index', ['books' => $books]);

    }

    public function show($id) {

        $book = Books::find($id);

        return view('books.show', ['book' => $book]);

    }
    
    public function create() {
        
        return view('books.create');

    }

    public function store() {
        $book = new Books();

        $book->title = request('title');
        $book->description = request('description');
        
        $book->save();

        return redirect('/books');
    }

    public function edit($id) {

        $book = Books::find($id);

        return view('books.edit', ['book' => $book]);
    }
}
