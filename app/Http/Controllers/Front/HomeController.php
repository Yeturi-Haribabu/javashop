<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class HomeController extends Controller
{
    //

public function index(){

// $product=Product::all();

$products=Product::inRandomOrder()->take(4)->get();

// dd($product);

return view('front.index',compact('products'));

}

}
