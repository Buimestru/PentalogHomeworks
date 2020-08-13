<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'address'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    function borrowedBooks()
    {
        return $this->belongsToMany('App\Book','borrowings')
                    ->withPivot([
                        'borrowed_at',
                        'borrowed_until',
                        'returned_at'
                    ]);//->with('author', 'publisher');
    }

    function scopeLateReturns($query)
    {
        $borrowings = Borrowing::where('borrowed_until', '<', date('Y-m-d'))
            ->whereNull('returned_at')
            ->pluck('user_id');

        return $query->whereIn('id', $borrowings);
    }
}
