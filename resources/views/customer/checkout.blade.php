@extends('customer_layout.customer_app')

@push('css')
    <style>
        .mandetory {
            color: red;
        }
    </style>
@endpush

@section('content')



    <section id="checkout">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="checkout-area">

                        @if (count($cart_products) == 0)
                            <section id="cart-view">
                                <div class="cart-view-area">
                                    <div class="cart-view-table">
                                        <div class="table-responsive">
                                            <h1 style="color: #ff6666 ;font-size:xxx-large">Your cart is
                                                empty !</h1>
                                            <h4 class="mb20">Please add products in your cart to checkout.</h4>
                                            <div style="margin-top:100px;">
                                                <a class="continue_shopping" href="{{ route('home') }}"
                                                    style="font-size:25px">Continue
                                                    Shopping &rarr;</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        @else
                            <form action="{{ route('place_order') }}" method="POST">
                                @csrf
                                <div class="row">
                                    @if (session('error'))
                                        <div class="alert alert-danger alert-dismissible show" role="alert">
                                            <strong>Error:</strong> {{ session('error') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif
                                    <div class="col-md-8">
                                        <div class="checkout-left">
                                            <div class="panel-group" id="accordion">

                                                @if (!auth()->guard('customer')->check())
                                                    <button type="button" class="aa-browse-btn  mb20" data-toggle="modal"
                                                        data-target="#login-modal">Login</button>
                                                    <div class="mb20"><strong>Or fill shipping details :</strong></div>
                                                @endif


                                                <!-- Shipping Address -->
                                                <div class="panel panel-default aa-checkout-billaddress">
                                                    @if ($errors->has('name_in_order'))
                                                        <div class="alert alert-danger alert-dismissible show"
                                                            role="alert">
                                                            <strong>Error:</strong> {{ $errors->first('name_in_order') }}
                                                            <button type="button" class="close" data-dismiss="alert"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                    @endif

                                                    @if ($errors->has('email_in_order'))
                                                        <div class="alert alert-danger alert-dismissible show"
                                                            role="alert">
                                                            <strong>Error:</strong> {{ $errors->first('email_in_order') }}
                                                            <button type="button" class="close" data-dismiss="alert"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                    @endif

                                                    @if ($errors->has('phone_in_order'))
                                                        <div class="alert alert-danger alert-dismissible show"
                                                            role="alert">
                                                            <strong>Error:</strong> {{ $errors->first('phone_in_order') }}
                                                            <button type="button" class="close" data-dismiss="alert"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                    @endif

                                                    @if ($errors->has('address_in_order'))
                                                        <div class="alert alert-danger alert-dismissible show"
                                                            role="alert">
                                                            <strong>Error:</strong> {{ $errors->first('address_in_order') }}
                                                            <button type="button" class="close" data-dismiss="alert"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                    @endif

                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a>
                                                                Shippping details
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="" class="">
                                                        <div class="panel-body">

                                                            <div class="row mb20">
                                                                <div class="col-md-6">
                                                                    <div class="aa-checkout-single-bill">
                                                                        <label for="name">Name<span
                                                                                class="mandetory">*</span></label>
                                                                        <input name="name_in_order" type="text"
                                                                            placeholder="Name"
                                                                            value="{{ auth()->guard('customer')->check()? auth()->guard('customer')->user()->name: old('name_in_order') }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="aa-checkout-single-bill">
                                                                        <label for="email">Email<span
                                                                                class="mandetory">*</span></label>
                                                                        <input name="email_in_order" type="email"
                                                                            placeholder="Email Address"
                                                                            value="{{ auth()->guard('customer')->check()? auth()->guard('customer')->user()->email: old('email_in_order') }}">
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="row mb20">

                                                                <div class="col-md-6">
                                                                    <div class="aa-checkout-single-bill">
                                                                        <label for="phone">Phone<span
                                                                                class="mandetory">*</span></label>
                                                                        <input name="phone_in_order" type="tel"
                                                                            placeholder="Phone"
                                                                            value="{{ auth()->guard('customer')->check()? auth()->guard('customer')->user()->phone: old('phone_in_order') }}">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="aa-checkout-single-bill">
                                                                        <label for="address">Address<span
                                                                                class="mandetory">*</span></label>
                                                                        <textarea name="address_in_order" rows="1" style="height: 45px;">{{ auth()->guard('customer')->check()? auth()->guard('customer')->user()->address: old('address_in_order') }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="row mb20">
                                                                <div class="col-md-12">
                                                                    <div class="aa-checkout-single-bill">
                                                                        <label for="special_notes">Special Notes (
                                                                            Instruction
                                                                            for delivery )</label>
                                                                        <textarea name="special_notes" cols="8" rows="3">{{ old('name_in_order') }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="checkout-right">
                                            <h4>Order Summary</h4>
                                            <div class="aa-order-summary-area">
                                                <table class="table table-responsive">
                                                    <thead>
                                                        <tr>
                                                            <th>Product</th>
                                                            <th>Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $total_amount = 0;
                                                        @endphp
                                                        @foreach ($cart_products as $item)
                                                            <tr>
                                                                <td class="text-align-left">{{ $item->product->name }}
                                                                    <strong> x
                                                                        {{ $item->quantity }}</strong>
                                                                </td>
                                                                <td>{{ $item->product->price * $item->quantity }}</td>
                                                            </tr>
                                                            @php
                                                                $total_amount = $total_amount + ($item->product->price* $item->quantity);
                                                            @endphp
                                                        @endforeach

                                                        <tr style="border: none">
                                                            <td colspan="2"></td>
                                                        </tr>
                                                    </tbody>

                                                    <tfoot>
                                                        <tr>
                                                            <th>Total Amount</th>
                                                            <th>{{ $total_amount }}</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                            <h4>Payment Method</h4>
                                            <div class="aa-payment-method">
                                                <label for="cashdelivery"><input type="radio" id="cashdelivery"
                                                        name="payment_method" value="cod"> Cash On Delivery </label>
                                                <label for="paypal"><input type="radio" id="pay_now"
                                                        name="payment_method" checked="" value="gateway"> Pay Now
                                                </label>
                                                <input type="submit" value="Place Order" class="aa-browse-btn">

                                               

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
@endpush
