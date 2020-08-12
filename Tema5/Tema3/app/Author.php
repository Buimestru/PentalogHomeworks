<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Author extends Model
{
    protected $fillable = ['name', 'nationality', 'born_date', 'born_country', 'death_date', 'death_country'];

    function books()
    {
        return $this->hasMany('App\Book', 'author_id');
    }
}
