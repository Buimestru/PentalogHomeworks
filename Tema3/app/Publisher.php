<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Publisher extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'foundation_year', 'status', 'origin_country', 'created_at'];
    protected $dates = ['deleted_at'];

    function books()
    {
        return $this->hasMany('App\Book', 'publisher_id');
    }
}
