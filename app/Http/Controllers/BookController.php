<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Publisher;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $title = 'All Books ';
        $inputAuthor = $request->input('author');
        $inputPublisher = $request->input('publisher');


        if ($inputAuthor) {
            $author = Author::firstWhere('slug', $inputAuthor);
            if ($author->count()) {
                $title .= "By $author->firstname";
            }
        } else if ($inputPublisher) {
            $publisher = Publisher::firstWhere('slug', $inputPublisher);
            if ($publisher->count()) {
                $title .= "By $publisher->name";
            }
        }

        return view('pages.user.books', [
            'title' => $title,
            'books' => Book::latest()->filter($request->input())->paginate(1)
        ]);
    }

    public function show(Book $book)
    {
        return view('pages.user.book', [
            'title' => "Book: $book->title",
            'book' => $book
        ]);
    }
}
