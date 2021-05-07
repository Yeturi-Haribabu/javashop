<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\OrderItems;
use App\Product;

 

class Order extends Model
{
    //

    protected $guarded= [];

    public function user(){

    	// return $this->belongsTo('App\User');

    	return $this->belongsTo(User::class);
    }

    public function orderItems(){

    	return $this->hasMany(OrderItems::class);
    }

    public function products(){

    	return $this->belongsToMany(Product::class,'order_items');

    }

    
}
