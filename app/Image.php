<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //
    protected $fillable = ['book_id','path'];

    public function Book()
    {
        return $this->belongsTo('App\Book');
    }
}
