<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Author extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'nationality', 'born_date', 'born_country', 'death_date', 'death_country', 'created_at'];
    protected $dates = ['deleted_at'];

    function books()
    {
        return $this->hasMany('App\Book', 'author_id');
    }
}
