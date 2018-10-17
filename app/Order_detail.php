<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    //
    public function Order()
    {
        return $this->belongsTo('App\Order');
    }

    public function Books()
    {
        return $this->hasMany('App\Book');
    } 
}
