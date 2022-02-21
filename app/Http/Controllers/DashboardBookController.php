<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Clockwork\Storage\Storage as ClockworkStorage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

        return view('pages.dashboard.books', [
            'title' => $title,
            'books' => Book::with('publisher')->filter($request->input())->paginate(2)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return response()->json([
            'status' => 200,
            'authors' => Author::all(),
            'publishers' => Publisher::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'slug' => 'required|unique:books',
            'pages' => 'required',
            'publish_year' => 'date_format:Y',
            'cover' => 'image|file|max:512'
        ], $messages  = [
            'date_format' => 'The :attribute field must be in year.'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->errors()
            ], 422);
        }


        if ($request->hasFile('cover')) {

            $cover = $request->file('cover')->store('book-images');
        }

        $book = new Book();
        $book->author_id = $request->author;
        $book->title = $request->title;
        $book->publish_year = $request->publish_year;
        $book->pages = $request->pages;
        $book->publisher_id = $request->publisher;
        $book->slug = $request->slug;
        $book->cover = $cover;

        $book->save();

        return response()->json([
            'status' => 200,
            'message' => 'Book created succesfully ! '
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return response()->json([
            'status' => 200,
            'book' => Book::find($book->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {


        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'slug' => [
                'required',
                Rule::unique('books', 'slug')->ignore($book->id)
            ],
            'pages' => 'required',
            'publish_year' => 'date_format:Y',
        ], $messages  = [
            'date_format' => 'The :attribute field must be in year.'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->errors()
            ], 422);
        }


        if ($request->hasFile('cover')) {
            $path = $book->cover;
            if (Storage::exists($path)) {
                Storage::delete($path);
            }
            $cover = $request->file('cover')->store('book-images');
        } else {
            $cover = $book->cover;
        }

        $book = Book::find($book->id);
        $book->author_id = $request->author;
        $book->title = $request->title;
        $book->publish_year = $request->publish_year;
        $book->pages = $request->pages;
        $book->publisher_id = $request->publisher;
        $book->slug = $request->slug;
        $book->cover = $cover;

        $book->save();

        return response()->json([
            'status' => 200,
            'message' => 'Book Updated succesfully ! '
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {

        if ($book->cover) {
            Storage::delete($book->cover);
        }

        Book::destroy($book->id);

        return response()->json([
            'status' => 200,
            'book' => $book,
            'message' => 'The book is deleted successfully !'
        ]);
    }

    public function createSlug(Request $request)
    {
        $slug = SlugService::createSlug(Book::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
