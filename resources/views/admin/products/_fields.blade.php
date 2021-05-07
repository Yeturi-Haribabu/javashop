 <div class="form-group {{$errors->has('name')? 'has-error' : ''}}">

                                            	{{Form::label('product_name','Product Name')}}

                                                <!-- <label>Product Name:</label> -->
                                               <!--  <input type="text" class="form-control border-input" placeholder="Macbook pro"> -->

                                                {{Form::text('name',$product->name,['class'=>'form-control border-input','placeholder'=>'Macbook pro'])}}

                                                <span class="text-danger">{{$errors->has('name') ? $errors->first('name'): '' }}</span>

                                            </div>

                                            <div class="form-group {{$errors->has('price')? 'has-error' : ''}}">
                                                <!-- <label>Product Price:</label> -->

                                                	{{Form::label('product_price','Product Price')}}
                                                <!-- <input type="text" class="form-control border-input" placeholder="$2500"> -->

                                                {{Form::text('price',$product->price,['class'=>'form-control border-input','placeholder'=>'$2500'])}}

                                                <span class="text-danger">{{$errors->has('price') ? $errors->first('price'): '' }}</span>
                                            </div>

                                            <div class="form-group {{$errors->has('description')? 'has-error' : ''}}">
                                                <!-- <label>Product Description:</label> -->

                                               {{Form::label('description','Description')}}

                {{Form::textarea('description',$product->description,['class'=>'form-control border-input','cols'=>30,'rows'=>10,'placeholder'=>'Product Description'])}}

                 <span class="text-danger">{{$errors->has('description') ? $errors->first('description'): '' }}</span>

                                                <!-- <textarea name="" id="" cols="30" rows="10"
                                                          class="form-control border-input" placeholder="Product Description"></textarea> -->
                                            </div>

                                            <div class="form-group {{$errors->has('description')? 'has-error' : ''}}">
                                               <!--  <label>Product Image:</label>
                                                <input type="file" class="form-control border-input"> -->

                                                {{Form::label('image','File')}}

                                               {{Form::file('image',['class'=>'form-control border-input','id'=>'image'])}}

                                               <div id="thumb-output"></div>


                                                <span class="text-danger">{{$errors->has('image') ? $errors->first('image'): '' }}</span>


                                            </div>