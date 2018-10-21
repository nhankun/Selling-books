<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    //
    public function order()
    {
        return $this->belongsTo('App\Order');
    }

    public function book()
    {
        return $this->belongsTo('App\Book');
    } 
}
