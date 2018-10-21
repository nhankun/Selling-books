<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function order_details()
    {
        return $this->hasMany('App\Order_detail');
    } 
}
