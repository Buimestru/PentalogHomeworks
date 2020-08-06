<?php

namespace App\Http\Controllers;

use App\Borrowing;
use App\Http\Requests\StoreUserPost;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();

        return view('users\index', ['users' => $users]);
    }

    public function create()
    {
        return view('users\create');
    }

    public function store(StoreUserPost $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $address = $request->input('address');

        User::create(
            [
                'name' => $name,
                'email' => $email,
                'address' => $address
            ]
        );

        return redirect('/users');
    }

    public function show($id)
    {
        $user = User::with('borrowedBooks')->whereId($id)->first();
        //dd($user);

        return view('users\show', ['user' => $user]);
    }

    public function edit($id)
    {
        $user = User::with('borrowedBooks')->whereId($id)->first();
        //dd($user);

        return view('users\edit', ['user' => $user]);
    }

    public function update(StoreUserPost $request, $id)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $address = $request->input('address');

        User::whereId($id)->update(
            [   'name' => $name,
                'email' => $email,
                'address' => $address
            ]
        );

        return redirect('/users');
    }

    public function delete($id)
    {
        User::whereId($id)->delete();

        return redirect('/users');
    }
}
