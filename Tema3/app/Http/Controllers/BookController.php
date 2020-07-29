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
    public function index() {
        $books = Book::with('author')
                     ->with('publisher')
                     ->get();
        //dd($books);
        return view('index', ['books' => $books]);
    }

    public function create() {
        return view('create');
    }

    public function store() {
        if (! empty($_POST['title']) and
            ! empty($_POST['author']) and
            ! empty($_POST['publisher']) and
            ! empty($_POST['publish_year'])
        ) {
            $title = $_POST['title'];
            $author_name = $_POST['author'];
            $publisher_name = $_POST['publisher'];
            $publish_year = $_POST['publish_year'];

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

    public function edit() {
        $id = intval($_GET['id']);

        $book = Book::whereId($id)->first();

        return view('edit', ['book' => $book]);
    }

    public function update() {
        if (! empty($_POST['title']) and
            ! empty($_POST['author']) and
            ! empty($_POST['publisher']) and
            ! empty($_POST['publish_year'])
        ) {
            $id = $_POST['id'];
            $title = $_POST['title'];
            $author_name = $_POST['author'];
            $publisher_name = $_POST['publisher'];
            $publish_year = $_POST['publish_year'];

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

    public function delete() {
        $id = intval($_GET['id']);

        Book::whereId($id)->delete();

        return redirect('/');
    }
}
