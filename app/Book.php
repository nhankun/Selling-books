<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    protected $fillable = ['name','desc','category_id','price','quanlity','price_sale','release_com','author_id','publication_date','size','publishing_com','translator','cover_type','number_of_pages'];
    //
    public function order_details()
    {
        return $this->hasMany('App\Order_detail');
    }
    public function author()
    {
        return $this->belongsTo('App\Author')->withDefault([
        'name' => 'Guest Author'
        ]);
    }
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function images()
    {
        return $this->hasMany('App\Image');
    } 
}
