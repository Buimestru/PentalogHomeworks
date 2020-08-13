<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePublisherPost;
use App\Book;
use App\Publisher;

class PublisherController extends Controller
{
    public function index()
    {
        $publishers = Publisher::get();

        return view('publishers\index', ['publishers' => $publishers]);
    }

    public function create()
    {
        return view('publishers\create');
    }

    public function store(StorePublisherPost $request)
    {
        $name = $request->input('name');
        $status = $request->input('status');
        $foundation_year = $request->input('foundation_year');
        $origin_country = $request->input('origin_country');

        Publisher::create(['name' => $name,
            'status' => $status,
            'foundation_year' => $foundation_year,
            'origin_country' => $origin_country
        ]);

        return redirect('/publishers');
    }

    public function show($id)
    {
        $publisher = Publisher::with('books')->whereId($id)->first();

        return view('publishers\show', ['publisher' => $publisher]);
    }

    public function edit($id)
    {
        $publisher = Publisher::with('books')->whereId($id)->first();

        return view('publishers\edit', ['publisher' => $publisher]);
    }

    public function update(StorePublisherPost $request, $id)
    {
        $name = $request->input('name');
        $status = $request->input('status');
        $foundation_year = $request->input('foundation_year');
        $origin_country = $request->input('origin_country');

        Publisher::whereId($id)->update(['name' => $name,
            'status' => $status,
            'foundation_year' => $foundation_year,
            'origin_country' => $origin_country
        ]);

        return redirect('/publishers');
    }

    public function delete($id)
    {
        Publisher::whereId($id)->delete();

        return redirect('/publishers');
    }
}
