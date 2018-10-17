<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    //
    public function Books()
    {
        return $this->hasMany('App\Book');
    } 
}
