<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    //
    protected $fillable = ['name','address','phone'];

    public function Books()
    {
        return $this->hasMany('App\Book');
    } 
}
