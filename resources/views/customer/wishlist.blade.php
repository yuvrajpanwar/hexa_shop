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
                            @if (count($wishlist_products) == 0)
                                <h1 style="color: #ff6666 ;font-size:xxx-large">Your wishlist is empty !</h1>
                                <h4 class="mb20">Please add products in your wishlist .</h4>
                                <div style="margin-top:100px;">
                                    <a class="continue_shopping"  href="{{route('home')}}" style="font-size:25px">Continue Shopping &rarr;<a>
                                </div>
                            @else
                                <form action="">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Image</th>
                                                    <th>Product</th>
                                                    <th>Price</th>
                                                    <th>Stock Status</th>
                                                    <th>Add to Cart</th>
                                                    <th>Remove</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($wishlist_products as $item)
                                                    <tr id="{{ $item->id }}">
                                                        
                                                        <td><a
                                                                href="{{ route('product', ['product_id' => $item->product_id]) }}"><img
                                                                    src="{{ asset('storage/product_images/' . $item->product->images[0]->name) }}"
                                                                    alt="img"></a></td>
                                                        <td><a class="aa-cart-title"
                                                                href="{{ route('product', ['product_id' => $item->product_id]) }}">{{ $item->product->name }}</a>
                                                        </td>
                                                        <td>{{ $item->product->price }}</td>
                                                        <td>{{ $item->product->status }}</td>
                                                        <td id="add_to_cart_{{$item->product_id}}">
                                                            @if (!$item->quantity)
                                                                <a href="javascript:void(0)"
                                                                    onclick="add_to_cart({{ $item->product_id }})"
                                                                    class="aa-add-to-cart-btn">Add To Cart</a>
                                                            @else
                                                                <a href="{{route('cart')}}"
                                                                    class="aa-add-to-cart-btn">Go To Cart</a>
                                                            @endif
                                                        </td>
                                                        <td><a class="remove" href="javascript:void(0)"
                                                            onclick="remove_wishlist_product({{ $item->id }})">
                                                            <fa class="fa fa-close"></fa>
                                                        </a></td>
                                                    </tr>
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
    <form id="cart_form" method="POST">
        <input type="hidden" value="" id="product_id" name="product_id">
        @csrf
    </form>
@endsection

@push('js')
    <script>
        function remove_wishlist_product(item_id) {
            $.ajax({
                type: 'POST',
                url: `{{ route('remove_wishlist_product') }}`,
                data: {
                    item_id: item_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    $('#' + item_id).hide();
                    if (data.total_wishlist_products == 0) {
                        $('.cart-view-table').html(` <h1 style="color: #ff6666 ;font-size:xxx-large">Your wishlist is empty !</h1>
                                        <h4 class="mb20">Please add products in your wishlist .</h4>
                                        <div style="margin-top:100px;">
                                            <a class="continue_shopping"  href="{{route('home')}}" style="font-size:25px">Continue Shopping &rarr;<a>
                                        </div>`);
                    }
                    $('#total_wishlist_products').html(data.total_wishlist_products);
                    alert(data.message);
                },
                error: function(error) {
                    console.log('Error:', error);
                    alert('Some error occurred! Please try again later.')
                }
            });
        }

        function add_to_cart(product_id) {
            $('#product_id').val(product_id);
            var formData = $('#cart_form').serialize();
            $.ajax({
                type: 'POST',
                url: `{{ route('add_to_cart') }}`,
                data: formData,
                success: function(response) {
                    console.log(response);
                    alert(response.message);
                    $('.aa-cart-notify').html(response.total_cart_products);
                    $('#add_to_cart_'+product_id).html(`<a href="{{route('cart')}}" class="aa-add-to-cart-btn">Go To Cart</a>`);
                },
                error: function(error) {
                    console.error('Error submitting form:', error);
                }
            });
        }
    </script>
@endpush
