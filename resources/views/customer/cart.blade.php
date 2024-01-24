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
                                    @if (count($cart_products) == 0)
                                        <h1 style="color: #ff6666 ;font-size:xxx-large">Your cart is empty !</h1>
                                        <h4 class="mb20">Please add products in your cart .</h4>
                                        <div style="margin-top:100px;">
                                            <a class="continue_shopping" href="{{ route('home') }}"
                                                style="font-size:25px">Continue Shopping &rarr;</a>
                                        </div>
                                    @else
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Image</th>
                                                    <th>Product</th>
                                                    <th>Price</th>
                                                    <th>Total</th>
                                                    <th>Quantity</th>
                                                    <th>Remove</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($cart_products as $item)
                                                    <tr id="{{ $item->id }}">

                                                        <td><a
                                                                href="{{ route('product', ['product_id' => $item->product_id]) }}"><img
                                                                    src="{{ asset('storage/product_images/' . $item->product->images[0]->name) }}"
                                                                    alt="img"></a></td>
                                                        <td><a class="aa-cart-title"
                                                                href="{{ route('product', ['product_id' => $item->product_id]) }}">{{ $item->product->name }}</a>
                                                        </td>
                                                        <td id="price_{{ $item->id }}">{{ $item->product->price }}</td>
                                                        <td id="total_price_{{ $item->id }}">
                                                            {{ $item->product->price * $item->quantity }}</td>
                                                        <td><input class="aa-cart-quantity" type="number"
                                                                value="{{ $item->quantity }}"
                                                                id="quantity_{{ $item->id }}"
                                                                onchange="update_quantity({{ $item->id }})"
                                                                min="1" max="10"></td>
                                                        <td><a class="remove" href="javascript:void(0)"
                                                                onclick="remove_cart_product({{ $item->user_id }},{{ $item->product_id }},{{ $item->id }})">
                                                                <fa class="fa fa-close"></fa>
                                                            </a></td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                </div>
                            </form>
                            <!-- Cart Total view -->
                            <div class="cart-view-total">
                                <h4>Cart Totals</h4>
                                <table class="aa-totals-table">
                                    <tbody>
                                        <tr>
                                            <th>Total Amount</th>
                                            <td id="grand_total">{{ $grand_total }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="{{ route('checkout') }}" class="aa-cart-view-btn">Proced to Checkout</a>
                            </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
    <script>
        function remove_cart_product(user_id, product_id, item_id) {
            $.ajax({
                type: 'POST',
                url: `{{ route('remove_cart_product') }}`,
                data: {
                    user_id: user_id,
                    product_id: product_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    $('#' + item_id).hide();
                    $('.aa-cart-notify').html(data.total_cart_products);
                    $('#grand_total').html(data.grand_total);
                    if (data.total_cart_products == 0) {
                        $('.cart-view-table').html(` <h1 style="color: #ff6666 ;font-size:xxx-large">Your cart is empty !</h1>
                                        <h4 class="mb20">Please add products in your cart .</h4>
                                        <div style="margin-top:100px;">
                                            <a class="continue_shopping"  href="{{ route('home') }}" style="font-size:25px">Continue Shopping &rarr;<a>
                                        </div>`);
                    }
                    alert(data.message);
                },
                error: function(error) {
                    console.log('Error:', error);
                    alert('Some error occurred! Please try again later.')
                }
            });
        }

        function update_quantity(item_id) {
            quantity = $('#quantity_' + item_id).val();
            price = parseInt($('#price_' + item_id).html());
            $.ajax({
                type: 'POST',
                url: `{{ route('update_quantity') }}`,
                data: {
                    item_id: item_id,
                    quantity: quantity,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    $('#total_price_' + item_id).html(price * quantity);
                    $('#grand_total').html(data.grand_total);
                    alert(data.message);
                },
                error: function(error) {
                    console.log('Error:', error);
                    alert('Some error occurred! Please try again later.')
                }
            });
        }
    </script>
@endpush
