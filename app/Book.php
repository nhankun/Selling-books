<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    public function Order_detail()
    {
        return $this->belongsTo('App\Order_detail');
    }
    public function Author()
    {
        return $this->belongsTo('App\Author');
    }
    public function Category()
    {
        return $this->belongsTo('App\Category');
    }
    public function Images()
    {
        return $this->hasMany('App\Image');
    } 
}
