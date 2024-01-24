@extends('customer_layout.customer_app')


@section('content')
    <section id="cart-view">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="cart-view-area">
                        <div class="cart-view-table">
                            <form action="">
                                <div class="table-responsive">
                                    <h1 style="color: #ff6666 ;font-size:xxx-large">Payment successful !</h1>
                                    <h2 style="color: #ff6666 ;font-size:2rem">Thank you for your purchase !</h2>
                                    <div style="margin-top:100px;">
                                        <a class="continue_shopping" href="{{ route('my_orders') }}" style="font-size:25px">Track
                                            your orders &rarr;</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
