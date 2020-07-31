<?php

namespace App\Http\Controllers;

use App\Author;
use App\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function GuzzleHttp\Promise\all;
use App\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('author')
                     ->with('publisher')
                     ->get();

        return view('index', ['books' => $books]);
    }

    public function create()
    {
        return view('create');
    }

    public function store()
    {
        $title = request('title');
        $author_name = request('author');
        $publisher_name = request('publisher');
        $publish_year = request('publish_year');

        if (! is_null($title) and
            ! is_null($author_name) and
            ! is_null($publish_year) and
            ! is_null($publisher_name)
        ) {
            $author_id = Author::firstOrCreate(['name' => $author_name])->id;
            $publisher_id = Publisher::firstOrCreate(['name' => $publisher_name])->id;

            Book::create(['title' => $title,
                        'author_id' => $author_id,
                        'publisher_id' => $publisher_id,
                        'publish_year' => $publish_year,
                        'created_at' => NOW()
            ]);

            return redirect('/');
        }
    }

    public function edit()
    {
        $id = intval(request('id'));

        $book = Book::whereId($id)->first();

        return view('edit', ['book' => $book]);
    }

    public function update()
    {
        $id = intval(request('id'));
        $title = request('title');
        $author_name = request('author');
        $publisher_name = request('publisher');
        $publish_year = request('publish_year');

        if (! is_null($title) and
            ! is_null($author_name) and
            ! is_null($publish_year) and
            ! is_null($publisher_name)
        ) {

            $author_id = Author::firstOrCreate(['name' => $author_name])->id;
            $publisher_id = Publisher::firstOrCreate(['name' => $publisher_name])->id;

            Book::whereId($id)->update([
                    'title' => $title,
                    'author_id' => $author_id,
                    'publisher_id' => $publisher_id,
                    'publish_year' => $publish_year,
                    'updated_at' => NOW()
                ]);

            return redirect('/');
        }
    }

    public function delete()
    {
        $id = intval(\request('id'));

        Book::whereId($id)->delete();

        return redirect('/');
    }
}
