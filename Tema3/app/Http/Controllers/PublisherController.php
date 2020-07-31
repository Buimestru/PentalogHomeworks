<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Publisher;

class PublisherController extends Controller
{
    public function index()
    {
        $publishers = Publisher::get();

        return view('publishers', ['publishers' => $publishers]);
    }

    public function create()
    {
        return view('addPublisher');
    }

    public function store(Request $request)
    {
        if (! empty($request->input('name'))) {
            $name = $request->input('name');
            $status = $request->input('status');
            $foundation_year = $request->input('foundation_year');
            $origin_country = $request->input('origin_country');

            Publisher::create(['name' => $name,
                'status' => $status,
                'foundation_year' => $foundation_year,
                'origin_country' => $origin_country,
                'created_at' => NOW()
            ]);

            return redirect('/publishers');
        } else {
            return redirect('/addPublisher');
        }
    }

    public function show($id)
    {
        $publisher = Publisher::with('books')->whereId($id)->first();

        return view('publisher', ['publisher' => $publisher]);
    }

    public function edit($id)
    {
        $publisher = Publisher::with('books')->whereId($id)->first();

        return view('editPublisher', ['publisher' => $publisher]);
    }

    public function update(Request $request, $id)
    {
        if (! empty($request->input('name'))) {
            $name = $request->input('name');
            $status = $request->input('status');
            $foundation_year = $request->input('foundation_year');
            $origin_country = $request->input('origin_country');

            Publisher::whereId($id)->update(['name' => $name,
                'status' => $status,
                'foundation_year' => $foundation_year,
                'origin_country' => $origin_country,
                'updated_at' => NOW()
            ]);

            return redirect('/publishers');
        } else {
            return redirect('/editPublisher/' . $id);
        }
    }

    public function delete($id)
    {
        Publisher::whereId($id)->delete();
        Book::where('publisher_id', $id)->delete();

        return redirect('/publishers');
    }
}
