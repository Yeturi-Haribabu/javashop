@extends('front.layouts.master')

@section('style')

    <script src="https://js.stripe.com/v3/"></script>

@endsection

@section('content')

    <!-- Page Content -->

        <h2 class="mt-5"><i class="fa  fa-credit-card-alt"></i> Checkout</h2>
        <hr>


        <div class="row">

            <div class="col-md-7">
                <h4>Billing Details</h4>

                <form>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Email">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" placeholder="1234 Main St">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="city">City</label>
                            <input type="text" class="form-control" id="city" placeholder="City">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="provance">Provance</label>
                            <input type="text" class="form-control" id="provance" placeholder="Provance">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="postal">Postal</label>
                            <input type="text" class="form-control" id="postal" placeholder="Postal">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" placeholder="Phone">
                    </div>
                    <hr>
                    <h5><i class="fa fa-credit-card"></i> Payment Details</h5>

                    <div class="form-group">
                        <label for="name_card">Name on card</label>
                        <input type="text" class="form-control" id="name_card" placeholder="Name on card">
                    </div>

                    <div class="form-group">
                        <label for="card">Credit or debit card</label>

                        <div id="card-element">
                            <!-- A Stripe Element will be inserted here. -->
                        </div>

                        <!-- Used to display form errors. -->
                        <div id="card-errors" role="alert"></div>
                    </div>

                    <button type="submit" class="btn btn-outline-info col-md-12">Complete Order</button>
                </form>

            </div>

            <div class="col-md-5">

                <h4>Your Order</h4>

                <table class="table your-order-table">
                    <tr>
                        <th>Image</th>
                        <th>Details</th>
                        <th>Qty</th>
                    </tr>
                    @foreach(Cart::instance('default')->content() as $item)
                    <tr>
                        <td><img src="{{url('/uploads').'/'.$item->model->image }}" alt="" style="width: 4em"></td>
                        <td>
                            <strong>{{$item->model->name}}</strong><br>
                            {{$item->model->description}} <br>
                            <span class="text-dark">${{$item->total()}}</span>
                        </td>
                        <td>
                            <span class="badge badge-light">{{$item->qty}}</span>
                        </td>
                    </tr>
                    @endforeach
                </table>

                <hr>
                <table class="table your-order-table table-bordered">
                    <tr>
                        <th colspan="2" ">Price Details</th>
                    </tr>
                    <tr>
                        <td>${{Cart::subtotal()}}</td>
                        <td>${{ Cart::total() }}</td>
                    </tr>
                    <tr>
                        <td>Tax</td>
                        <td>${{Cart::tax()}}</td>
                    </tr>
                    <tr>
                        <th>Total</th>
                        <th>${{ Cart::total() }}</th>
                    </tr>

                </table>

            </div>
        </div>



    <div class="mt-5"><hr></div>


@endsection

@section('script')
    <script>

        // Create a Stripe client.
        // Note: this merchant has been set up for demo purposes.
        var stripe = Stripe('pk_test_6pRNASCoBOKtIshFeQd4XMUh');

        // Create an instance of Elements.
        var elements = stripe.elements();

        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)
        var style = {
            base: {
                padding: '10px 12px',
                color: '#32325d',
                fontFamily: '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                },
            },
            invalid: {
                color: '#fa755a',
            }
        };

        // Create an instance of the idealBank Element.
        var idealBank = elements.create('idealBank', {style: style});

        // Add an instance of the idealBank Element into the `ideal-bank-element` <div>.
        idealBank.mount('#ideal-bank-element');

        var errorMessage = document.getElementById('error-message');

        // Handle form submission.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            showLoading();

            var sourceData = {
                type: 'ideal',
                amount: 1099,
                currency: 'eur',
                owner: {
                    name: document.querySelector('input[name="name"]').value,
                },
                // Specify the URL to which the customer should be redirected
                // after paying.
                redirect: {
                    return_url: 'https://shop.example.com/crtA6B28E1',
                },
            };

            // Call `stripe.createSource` with the idealBank Element and additional options.
            stripe.createSource(idealBank, sourceData).then(function(result) {
                if (result.error) {
                    // Inform the customer that there was an error.
                    errorMessage.textContent = result.error.message;
                    errorMessage.classList.add('visible');
                    stopLoading();
                } else {
                    // Redirect the customer to the authorization URL.
                    errorMessage.classList.remove('visible');
                    stripeSourceHandler(result.source);
                }
            });
        });


    </script>

    @endsection
