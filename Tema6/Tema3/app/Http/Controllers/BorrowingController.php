<?php

namespace App\Http\Controllers;

use App\Book;
use App\Borrowing;
use App\Events\BookBorrowingEvent;
use App\Events\BookReturnEvent;
use App\Http\Requests\StoreBorrowingPost;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BorrowingController extends Controller
{
    public function index()
    {
        $borrowings = Borrowing::with('user', 'book')->orderBy('returned_at')->get();
        //dd($borrowings);

        return view('borrowings\index', ['borrowings' => $borrowings]);
    }

    public function create($user_id)
    {
        $available_books = Book::available()->get();

        $user = User::whereId($user_id)->first();
        $authenticated_user = Auth::user();

        if ($user->email === $authenticated_user->email || Auth::guard('admin')->check()) {

            return view('borrowings\create', ['available_books' => $available_books, 'user_id' => $user_id]);
        }
    }

    public function store(StoreBorrowingPost $request)
    {
        $user_id = $request->input('user_id');
        $book_id = $request->input('book_id');

        Borrowing::create(
            [
                'user_id' => $user_id,
                'book_id' => $book_id,
                'borrowed_at' => date('Y-m-d'),
                'borrowed_until' => date('Y-m-d', strtotime("+30 days")),
                'returned_at' => null
            ]
        );

        event(new BookBorrowingEvent($user_id, $book_id));

        return redirect('/borrowings');
    }

    public function update($id)
    {
        Borrowing::whereId($id)->update(
            [
                'returned_at' => date('Y-m-d')
            ]
        );

        event(new BookReturnEvent($id));

        return redirect('/borrowings');
    }

}
