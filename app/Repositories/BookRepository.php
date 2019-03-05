<?php
namespace App\Repositories;
use App\Book;
class BookRepository
{
    public function paginate($pageSize)
    {
        return Book::orderBy('id', 'desc')->paginate($pageSize);
    }
    public function save($request)
    {
        $book = new Book();
        $book->title = $request->input('title');
        $book->pages = $request->input('pages');
        $book->isbn = $request->input('isbn');
        $book->short_description = $request->input('short_description');
        $book->author_id = $request->input('author_id');
        $book->save();
    }
    public function update($request, Book $book)
    {
        $book->title = $request->input('title');
        $book->pages = $request->input('pages');
        $book->isbn = $request->input('isbn');
        $book->short_description = $request->input('short_description');
        $book->save();
    }
    public function delete(Book $books)
    {
        $books->delete();
    }
}
