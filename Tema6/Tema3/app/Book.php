<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title', 'author_id', 'publisher_id', 'publish_year'];

    function author()
    {
        return $this->belongsTo('App\Author', 'author_id');
    }

    function publisher()
    {
        return $this->belongsTo('App\Publisher', 'publisher_id');
    }

    function users()
    {
        return $this->belongsToMany('App\User','borrowings')
            ->withPivot([
                'borrowed_at',
                'borrowed_until',
                'returned_at'
            ]);
    }

    function scopeAvailable($query)
    {
        $unavailableBooks = Borrowing::whereNull('returned_at')->pluck('book_id');
        return $query->whereNotIn('id', $unavailableBooks);
    }
}
