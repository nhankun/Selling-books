<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    public function User()
    {
        return $this->belongsTo('App\User');
    }

    public function Order_details()
    {
        return $this->hasMany('App\Order_detail');
    } 
}
