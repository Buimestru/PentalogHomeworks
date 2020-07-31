<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Author;
use App\Publisher;

class Book extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'author_id', 'publisher_id', 'publish_year', 'created_at', 'updated_at'];
    public $timestamps = false;
    protected $dates = ['deleted_at'];

    function author()
    {
        return $this->belongsTo('App\Author', 'author_id');
    }

    function publisher()
    {
        return $this->belongsTo('App\Publisher', 'publisher_id');
    }
}
