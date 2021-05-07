<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Order;

class UsersController extends Controller
{
    //

    public function index(){

    	$users=User::all();

    	return view('admin.users.index',compact('users'));
    }


    public function show($id){

    	// return $id;

    	//Find the user

    	// $user=User::find($id);

    	$orders=Order::where('user_id',$id)->get();

    	// dd($orders);

    	//Return array back to the user details

    	return view('admin.users.details',compact('orders'));

    }
}
