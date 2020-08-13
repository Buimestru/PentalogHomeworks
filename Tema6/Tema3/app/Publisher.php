<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Publisher extends Model
{
    protected $fillable = ['name', 'foundation_year', 'status', 'origin_country'];

    function books()
    {
        return $this->hasMany('App\Book', 'publisher_id');
    }
}
