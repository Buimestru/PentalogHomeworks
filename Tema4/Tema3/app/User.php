<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['name', 'email', 'address'];

    function borrowedBooks()
    {
        return $this->belongsToMany('App\Book','borrowings')
                    ->withPivot([
                        'borrowed_at',
                        'borrowed_until',
                        'returned_at'
                    ])->with('author', 'publisher');
    }

    function scopeLateReturns($query)
    {
        $borrowings = Borrowing::where('borrowed_until', '<', date('Y-m-d'))
            ->whereNull('returned_at')
            ->pluck('user_id');

        return $query->whereIn('id', $borrowings);
    }
}
