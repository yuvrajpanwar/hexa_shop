@extends('customer_layout.customer_app')
@push('css')
    <style>
        .img-container {
            width: 100%;
            height: 100%;
            border: 1px solid #ccc;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .product-image {
            max-width: 70%;
            max-height: 100%;
            object-fit: contain;
        }
    </style>
@endpush

@section('content')
    <section id="aa-catg-head-banner" style="height:90px">

        <div class="aa-catg-head-banner-area">
            <div class="container">
                <div class="aa-catg-head-banner-content" style="padding: 0%; margin-top:20px">
                    <ol class="breadcrumb">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li class="active">{{ $category->name }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section id="aa-product-category">
        <div class="container">
            <div class="row">
                <div class="row">
                    <div class="aa-product-catg-content">

                        <div class="aa-product-catg-head">
                            <div class="aa-product-catg-head-left">
                                <form action="" class="aa-sort-form">
                                    <label for="">Sort by</label>
                                    <select name="">
                                        <option value="1" selected="Default">Default</option>
                                        <option value="2">Name</option>
                                        <option value="3">Price</option>
                                        <option value="4">Date</option>
                                    </select>
                                </form>
                                <form action="" class="aa-show-form">
                                    <label for="">Show</label>
                                    <select name="">
                                        <option value="1" selected="12">12</option>
                                        <option value="2">24</option>
                                        <option value="3">36</option>
                                    </select>
                                </form>
                            </div>
                            <div class="aa-product-catg-head-right">
                                <a id="grid-catg" href="#"><span class="fa fa-th"></span></a>
                                <a id="list-catg" href="#"><span class="fa fa-list"></span></a>
                            </div>
                        </div>

                        <div class="aa-product-catg-body">

                            <!-- products list -->
                            <ul class="aa-product-catg" id="data-container">
                                @include('customer.data')
                            </ul>
                            <!-- products list -->

                            <!-- quick view modal -->
                            <div class="modal fade" id="quick-view-modal" tabindex="-1" role="dialog"
                                aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-hidden="true">×</button>
                                            <div class="row">
                                                <!-- Modal view slider -->
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="aa-product-view-slider">
                                                        <div class="simpleLens-gallery-container" id="demo-1">
                                                            <div class="simpleLens-container">
                                                                <div class="simpleLens-big-image-container">
                                                                    <a class="simpleLens-lens-image"
                                                                        data-lens-image="img/view-slider/large/polo-shirt-1.png">
                                                                        <img src="{{ asset('customer/img/view-slider/medium/polo-shirt-1.png') }}"
                                                                            class="simpleLens-big-image">
                                                                    </a>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal view content -->
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="aa-product-view-content">
                                                        <h3>T-Shirt</h3>
                                                        <div class="aa-price-block">
                                                            <span class="aa-product-view-price">$34.99</span>
                                                            <p class="aa-product-avilability">Avilability: <span>In
                                                                    stock</span></p>
                                                        </div>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                            Officiis animi, veritatis quae repudiandae quod nulla porro
                                                            quidem, itaque quis quaerat!</p>
                                                        <h4>Size</h4>
                                                        <div class="aa-prod-view-size">
                                                            <a href="#">S</a>
                                                            <a href="#">M</a>
                                                            <a href="#">L</a>
                                                            <a href="#">XL</a>
                                                        </div>
                                                        <div class="aa-prod-quantity">
                                                            <form action="">
                                                                <select name="" id="">
                                                                    <option value="0" selected="1">1</option>
                                                                    <option value="1">2</option>
                                                                    <option value="2">3</option>
                                                                    <option value="3">4</option>
                                                                    <option value="4">5</option>
                                                                    <option value="5">6</option>
                                                                </select>
                                                            </form>
                                                            <p class="aa-prod-category">
                                                                Category: <a href="#">Polo T-Shirt</a>
                                                            </p>
                                                        </div>
                                                        <div class="aa-prod-view-bottom">
                                                            <a href="#" class="aa-add-to-cart-btn"><span
                                                                    class="fa fa-shopping-cart"></span>Add To Cart</a>
                                                            <a href="#" class="aa-add-to-cart-btn">View Details</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div>
                            <!-- / quick view modal -->

                        </div>

                        <div class="aa-product-catg-pagination ajax-loader" style="display: none">
                            <nav>
                                <img src="{{ asset('customer/img/loding.gif') }}" style="height:50px;width:50px"></li>

                            </nav>
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
        function loadMoreData(page) {
            $.ajax({
                    url: '?page=' + page,
                    type: 'get',
                    beforeSend: function() {
                        $('.ajax-loader').show();
                    }
                })
                .done(function(data) {
                    if (data.html == '') {
                        $('.ajax-loader').html('No more data');
                        $('.ajax-loader').show();
                        return;
                    }
                    $('#data-container').append(data.html);
                    $('.ajax-loader').hide();

                })
                // .fail(function(jqXHT, ajaxOptions, thrownError) {
                //     $('.ajax-loader').html('No more data');
                //     alert('server not responding ');
                // })
                
        }

        var page = 1;
        $(window).scroll(function() {

            console.log( $(window).scrollTop() + $('#aa-footer').height() + $('#aa-subscribe').height() + 600 );
            console.log( $(document).height());
            if (( ($(window).scrollTop() + $('#aa-footer').height() + $('#aa-subscribe').height() + 600) >= $(document).height()) && ($('.ajax-loader').html()!='No more data')) 
            {
                page++;
                loadMoreData(page);
            }
        });

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
                },
                error: function(error) {
                    console.error('Error submitting form:', error);
                    alert('Some error occurred !');
                }
            });
        }
    </script>
@endpush
