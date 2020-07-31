<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use App\Author;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::get();

        return view('authors', ['authors' => $authors]);
    }

    public function create()
    {
        return view('addAuthor');
    }

    public function store(Request $request)
    {
        if (! empty($request->input('name'))) {
            $name = $request->input('name');
            $nationality = $request->input('nationality');
            $born_date = $request->input('born_date');
            $born_country = $request->input('born_country');
            $death_date = $request->input('death_date');
            $death_country = $request->input('death_country');

            Author::create(['name' => $name,
                            'nationality' => $nationality,
                            'born_date' => $born_date,
                            'born_country' => $born_country,
                            'death_date' => $death_date,
                            'death_country' => $death_country,
                            'created_at' => NOW()
                            ]);

            return redirect('/authors');
        } else {
            return redirect('/addAuthor');
        }
    }

    public function show($id)
    {
        $author = Author::with('books')->whereId($id)->first();

        return view('author', ['author' => $author]);
    }

    public function edit($id)
    {
        $author = Author::with('books')->whereId($id)->first();

        return view('editAuthor', ['author' => $author]);
    }

    public function update(Request $request, $id)
    {
        if (! empty($request->input('name'))) {
            $name = $request->input('name');
            $nationality = $request->input('nationality');
            $born_date = $request->input('born_date');
            $born_country = $request->input('born_country');
            $death_date = $request->input('death_date');
            $death_country = $request->input('death_country');


            Author::whereId($id)->update(['name' => $name,
                                          'nationality' => $nationality,
                                          'born_date' => $born_date,
                                          'born_country' => $born_country,
                                          'death_date' => $death_date,
                                          'death_country' => $death_country,
                                          'updated_at' => NOW()
                                        ]);

            return redirect('/authors');
        } else {
            return redirect('/editAuthor/' . $id);
        }
    }

    public function delete($id)
    {
        Author::whereId($id)->delete();
        Book::where('author_id', $id)->delete();

        return redirect('/authors');
    }
}
