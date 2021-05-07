<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller
{
    //

    public function index(){

    	 $orders=Order::all();

    	return view('admin.orders.index',compact('orders'));
    }

    public function confirm($id){

    	// return $id;

    	//Find the order

    	$order=Order::find($id);

    	//Update the order

            $order->update(['status'=>1]);

    	//sessin message

    	session()->flash('msg','Order has been confirmed');

    	//Redirect the page

    	return Redirect('admin/orders');
    }

    public function pending($id){

    	// return $id;

    	//Find the order

    	$order=Order::find($id);

    	//Update order status

    	$order->update(['status'=>0]);

    	//Session message

    	session()->flash('msg','Order has been pending');

    	//Redirect the page

    	return redirect('admin/orders');

    }


    public function show($id){

    	// return $id;

    	$order=Order::find($id);

    	return view('admin.orders.details',compact('order'));
    }
}
