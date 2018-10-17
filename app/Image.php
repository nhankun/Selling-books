<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //
    public function Book()
    {
        return $this->belongsTo('App\Book');
    }
}
