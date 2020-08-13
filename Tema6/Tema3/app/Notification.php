<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Notification extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'message', 'receiver_type', 'receiver_email'
    ];

    function scopeUnseen($query)
    {
       return $query->where('seen', 0);
    }

    function scopeSeen($query)
    {
        return $query->where('seen', 1);
    }

    function scopeForUser($query)
    {
        return $query->where('receiver_type', 'user');
    }

    function scopeForAdmin($query)
    {
        return $query->where('receiver_type', 'admin');
    }

}
