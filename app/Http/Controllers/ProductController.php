<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    //

    public function index(){

        $products=Product::all();

        return view('admin.products.index',compact('products'));
    }

    public function create(){

        $product=new Product();

    	return view('admin.products.create',compact('product'));
    	// return response()->json([
    	// ],500);

    }

    public function store(Request $request){

    	// dd($request->all());

    	// Validate the form

    	$request->validate([

    		'name' => 'required',
    		'price' => 'required',
    		'description' => 'required',
    		'image' => 'image|required'


    	]);

    	// upload the image

    	if ($request->hasFile('image')) {
    		# code...

    		$image=$request->image;

    		$image->move('uploads',$image->getClientOriginalName());


    	}


        //  $store = $request->all();
        // $store['image']= $request->image->getClientOriginalName();
        // // Save the data into database

        // Product::create($store);

        
    	// Save the data into database

    	Product::create([

    		'name'=> $request->name,
    		'price'=> $request->price,
    		'description'=>$request->description,
    		'image'=> $request->image->getClientOriginalName()
    	]);

    	// Session message

    	$request->session()->flash('msg','Your product has been added');

    	// Redirect the page

    	return redirect('admin/products/create');
    }

    public function edit($id){

        $product=Product::find($id);

        return view('admin.products.edit',compact('product'));

    }


    public function update(Request $request, $id){

        // return $id;

        //Find the product

        $product=Product::find($id);


        //Validate the form

        $request->validate([

            'name'=>'required',
            'price'=>'required',
            'description'=>'required'

        ]);


        //Check there is an any image

        if($request->hasFile('image')){

            //Check if the old image exist inside the folder

            if(file_exists(public_path('uploads/').$product->image)){

                unlink(public_path('uploads/').$product->image);

            }

            //Uploading the new image

            $image=$request->image;

            $image->move('uploads',$image->getClientOriginalName());

            $product->image=$request->image->getClientOriginalName();
        }




        //Updating the prduct

        $product->update([

            'name'=>$request->name,
            'price'=>$request->price,
            'description'=>$request->description,
            'image'=>$product->image

        ]);



        //Storing a message in session

        $request->session()->flash('msg','Product has been updated');

        //Redirect

        return redirect('admin/products');


    }

    public function show($id){

        // return $id;

        $product=Product::find($id);

        return view('admin.products.details',compact('product'));
    }


    public function destroy($id){

        //Delete product

        Product::destroy($id);

        //store a message

        session()->flash('msg','Product has been deleted');

        //redirect back

        return redirect('admin/products');

    }
}
