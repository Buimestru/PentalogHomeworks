<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Borrowing extends Model
{
    protected $fillable = ['user_id', 'book_id', 'borrowed_at', 'borrowed_until', 'returned_at'];

    function user()
    {
        return $this->belongsTo('App\User');
    }

    function book()
    {
        return $this->belongsTo('App\Book')->with('author');
    }
}
