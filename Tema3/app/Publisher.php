<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    protected $fillable = ['name'];
    public $timestamps = false;

    function books() {
        $this->hasMany('Book', 'id');
    }
}
