<?php

namespace App\Http\Controllers;

use App\Book;
use App\Http\Requests\StoreAuthorPost;
use App\Author;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::get();

        return view('authors\index', ['authors' => $authors]);
    }

    public function create()
    {
        return view('authors\create');
    }

    public function store(StoreAuthorPost $request)
    {
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
            'death_country' => $death_country
        ]);

        return redirect('/authors');
    }

    public function show($id)
    {
        $author = Author::with('books')->whereId($id)->first();

        return view('authors\show', ['author' => $author]);
    }

    public function edit($id)
    {
        $author = Author::with('books')->whereId($id)->first();

        return view('authors\edit', ['author' => $author]);
    }

    public function update(StoreAuthorPost $request, $id)
    {
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
            'death_country' => $death_country
        ]);

        return redirect('/authors');
    }

    public function delete($id)
    {
        Author::whereId($id)->delete();

        return redirect('/authors');
    }
}
