@extends('customer_layout.customer_app')

@push('css')
    <style>
    </style>
@endpush

@section('content')
    <section id="cart-view">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="cart-view-area">
                        <div class="cart-view-table aa-wishlist-table">
                            @if (count($orders) == 0)
                                <h1 style="color: #ff6666 ;font-size:xxx-large">Your order list is empty !</h1>
                                <h4 class="mb20">Please make your first order .</h4>
                                <div style="margin-top:100px;">
                                    <a class="continue_shopping" href="{{ route('home') }}" style="font-size:25px">Continue
                                        Shopping &rarr;<a>
                                </div>
                            @else
                                <form action="">
                                    <div class="table-responsive">
                                        @if (session('error'))
                                            <div class="alert alert-danger alert-dismissible show" role="alert">
                                                <strong>Error:</strong> {{ session('error') }}
                                                <button type="button" class="close" data-dismiss="alert"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @endif
                                        <table class="table" style="border:2px solid #ff6666;">
                                            <thead>
                                                <tr>
                                                    <th>Order Id</th>
                                                    {{-- <th>Image</th> --}}
                                                    <th>Products</th>
                                                    <th>Price</th>
                                                    <th>Quantity</th>
                                                    <th>Amount</th>
                                                    <th>Total Amount</th>
                                                    <th>Status</th>
                                                    <th>Pay Now</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($orders as $order)
                                                    @php
                                                        $merged = false;
                                                    @endphp
                                                    @foreach ($order->OrderDetail as $item)
                                                        <tr
                                                            @if (!$merged) style="border-top:2px solid #ff6666;" @endif>
                                                            @if (!$merged)
                                                                <td rowspan="{{ count($order->OrderDetail) }}">
                                                                    {{ $order->razorpay_order_id ?? $order->id }}</td>
                                                            @endif
                                                            {{-- <td><a
                                                                    href="{{ route('product', ['product_id' => $item->product_id]) }}"><img
                                                                        src="{{ asset('storage/product_images/' . $item->product->images[0]->name) }}"
                                                                        alt="img"></a></td> --}}
                                                            <td>{{ $item->product->name }}</td>
                                                            <td>{{ $item->product->price }}</td>
                                                            <td>{{ $item->quantity }}</td>
                                                            <td>{{ $item->total }}</td>
                                                            @if (!$merged)
                                                                <td rowspan="{{ count($order->OrderDetail) }}">
                                                                    {{ $order->total_amount }}</td>
                                                                <td rowspan="{{ count($order->OrderDetail) }}">
                                                                    {{ $order->order_status }} </td>
                                                                <td rowspan="{{ count($order->OrderDetail) }}">
                                                                    @if ($order->payment_status == 'paid')
                                                                        Paid
                                                                    @else
                                                                        <button type="button"
                                                                            onclick="payNow({{ $order->id }})"
                                                                            class="aa-cart-view-btn" style="float: none">Pay
                                                                            Now</button>
                                                                </td>
                                                            @endif
                                                    @endif
                                                    </tr>
                                                    @php
                                                        $merged = true;
                                                    @endphp
                                                @endforeach
                            @endforeach
                            </tbody>
                            </table>
                        </div>
                        </form>
                        @endif

                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <form method="POST" action="pay_now" id="pay_now_form">
        @csrf
        <input type="hidden" id="id" value="" name="id">
    </form>
@endsection

@push('js')
    <script>
        function payNow(id) {
            $('#id').val(id);
            $('#pay_now_form').submit();
        }
    </script>
@endpush
