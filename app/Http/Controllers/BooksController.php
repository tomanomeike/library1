<?php

namespace App\Http\Controllers;

use App\Book;
use App\Repositories\BookRepository;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    private $bookRepository;
    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }
    public function index()
    {
        $books = $this->bookRepository->paginate(10);
        return view('books.index', [
            'books' => $books
        ]);
    }


    public function create()
    {
        return view('books.create');
    }


    public function store(Request $request)
    {
        $book = new Book();
        $book->title = $request->input('title');
        $book->pages = $request->input('pages');
        $book->isbn = $request->input('isbn');
        $book->short_description = $request->input('short_description');
        $book->author_id = $request->input('author_id');
        $book->save();
        return redirect('/books');
    }

    public function show(Book $book)
    {
        //
    }


    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $book->title = $request->input('title');
        $book->pages = $request->input('pages');
        $book->isbn = $request->input('isbn');
        $book->short_description = $request->input('short_description');
        $book->save();
        return redirect('/books');
    }

    public function destroy(Book $book)
    {
        $this->bookRepository->delete($book);
        return redirect('/books');
    }
}
