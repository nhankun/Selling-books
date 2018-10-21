<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_activation extends Model
{
    //
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
}
