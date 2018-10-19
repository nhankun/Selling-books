<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = ['name','img'];

    public function Books()
    {
        return $this->hasMany('App\Book');
    } 
}
