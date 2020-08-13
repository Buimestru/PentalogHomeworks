<?php

namespace App\Http\Controllers;

use App\Author;
use App\Borrowing;
use App\Http\Requests\StoreBookPost;
use App\Publisher;
use App\Book;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('author')
                     ->with('publisher')
                     ->get();

        return view('books\index', ['books' => $books]);
    }

    public function create()
    {
        $authors = Author::get();
        $publishers = Publisher::get();

        return view('books\create', ['authors' => $authors, 'publishers' => $publishers]);
    }

    public function store(StoreBookPost $request)
    {
        $title = $request->input('title');
        $author_name = $request->input('author');
        $publisher_name = $request->input('publisher');
        $publish_year = $request->input('publish_year');

        $author_id = Author::where('name', $author_name)->first()->id;
        $publisher_id = Publisher::where('name', $publisher_name)->first()->id;

        Book::create(['title' => $title,
            'author_id' => $author_id,
            'publisher_id' => $publisher_id,
            'publish_year' => $publish_year
        ]);

        return redirect('/');
    }

    public function edit($id)
    {
        $book = Book::whereId($id)->first();
        $authors = Author::get();
        $publishers = Publisher::get();

        return view('books\edit', ['book' => $book, 'authors' => $authors, 'publishers' => $publishers]);
    }

    public function update(StoreBookPost $request, $id)
    {
        $author_name = $request->input('author');
        $publisher_name = $request->input('publisher');
        $publish_year = $request->input('publish_year');
        $title = $request->input('title');

        $author_id = Author::where('name', $author_name)->first()->id;
        $publisher_id = Publisher::where('name', $publisher_name)->first()->id;

        Book::whereId($id)->update([
            'title' => $title,
            'author_id' => $author_id,
            'publisher_id' => $publisher_id,
            'publish_year' => $publish_year
        ]);

        return redirect('/');
    }

    public function delete($id)
    {
        Book::whereId($id)->delete();

        return redirect('/');
    }
}
