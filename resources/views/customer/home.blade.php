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
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }
    </style>
@endpush

@section('title')
    Daily Shop | Home
@endsection



@section('content')
    @if (session('status'))
    <div class="alert alert-success alert-dismissible show" role="alert" id="successAlert" style="margin:0">
        {{session('status')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    

    {{-- <section>
        @if ($errors->has('email') || $errors->has('password'))
            <strong>These credentials do not match our records.</strong>
        @endif
        @php
            // use Illuminate\Support\Facades\Auth;

            if (auth()->guard('customer')->check()) {
                $userId = auth()->guard('customer')->id();
                echo $userId;
                // dd(session()->all());
            } else {
                echo 'no user id';
                // dd(session()->all());
            }
        @endphp
    </section> --}}

    {{-- <div class="" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('customer_logout') }}"
            onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('customer_logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div> --}}


    <!-- Start slider -->
    <section id="aa-slider">
        <div class="aa-slider-area">
            <div id="sequence" class="seq">
                <div class="seq-screen">
                    <ul class="seq-canvas">
                        <!-- single slide item -->
                        @foreach ($backgrounds as $background)
                            <li>
                                <div class="seq-model">
                                    <img data-seq
                                        src="{{ asset('storage/background_images') . '/' . $background->image_name }}"
                                        alt="Men slide img" />
                                </div>
                                <div class="seq-title">
                                    <h2 data-seq>{{ $background->title }}</h2>
                                    <p data-seq>{{ $background->description }}</p>
                                </div>
                            </li>
                        @endforeach



                    </ul>
                </div>
                <!-- slider navigation btn -->
                <fieldset class="seq-nav" aria-controls="sequence" aria-label="Slider buttons">
                    <a type="button" class="seq-prev" aria-label="Previous"><span class="fa fa-angle-left"></span></a>
                    <a type="button" class="seq-next" aria-label="Next"><span class="fa fa-angle-right"></span></a>
                </fieldset>
            </div>
        </div>
    </section>
    <!-- / slider -->



    <!-- Products section -->
    <section id="aa-product" style="margin-top:3rem">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="aa-product-area">
                            <div class="aa-product-inner">
                                <!-- start prduct navigation -->
                                <ul class="nav nav-tabs aa-products-tab">

                                    <li class="active"><a href="#men" data-toggle="tab">Recent</a></li>
                                    <li><a href="#women" data-toggle="tab">Popular</a></li>

                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <!-- Start men product category -->
                                    <div class="tab-pane fade in active" id="men">
                                        <ul class="aa-product-catg">

                                            @foreach ($recent_products as $product)
                                                <li>
                                                    <figure>
                                                        <a class="aa-product-img"
                                                            href="{{ route('product', ['product_id' => $product->id]) }}">
                                                            @if (count($product->images) > 0)
                                                                <div class="img-container">
                                                                    <img class="product-image"
                                                                        src="{{ asset('storage/product_images') . '/' . $product->images[0]->name }}">
                                                                </div>
                                                            @else
                                                                <img src="{{ asset('customer/img/man/polo-shirt-4.png') }}"
                                                                    alt="polo shirt img">
                                                            @endif
                                                        </a>
                                                        <a class="aa-add-card-btn" href="javascript:void(0)"
                                                            onclick="add_to_cart({{ $product->id }})"><span
                                                                class="fa fa-shopping-cart"></span>Add To Cart</a>
                                                        <figcaption>
                                                            <h4 class="aa-product-title"><a
                                                                    href="#">{{ $product->name }}</a>
                                                            </h4>
                                                            <span class="aa-product-price"> &#8377;
                                                                {{ $product->price }}</span>
                                                        </figcaption>
                                                    </figure>

                                                    <!-- product badge -->
                                                    @if ($product->status == 'sale')
                                                        <span class="aa-badge aa-sale" href="#">SALE!</span>
                                                    @elseif ($product->status == 'sold')
                                                        <span class="aa-badge aa-sold-out" href="#">Sold Out!</span>
                                                    @endif
                                                </li>
                                            @endforeach


                                        </ul>
                                        <a class="aa-browse-btn" href="#">Browse all Product <span
                                                class="fa fa-long-arrow-right"></span></a>
                                    </div>
                                    <!-- / men product category -->

                                    <!-- start women product category -->
                                    <div class="tab-pane fade" id="women">
                                        <ul class="aa-product-catg">
                                            @foreach ($popular_products as $product)
                                                <li>
                                                    <figure>
                                                        <a class="aa-product-img"
                                                            href="{{ route('product', ['product_id' => $product->id]) }}">
                                                            @if (count($product->images) > 0)
                                                                <div class="img-container">
                                                                    <img class="product-image"
                                                                        src="{{ asset('storage/product_images') . '/' . $product->images[0]->name }}">
                                                                </div>
                                                            @else
                                                                <img src="{{ asset('customer/img/man/polo-shirt-4.png') }}"
                                                                    alt="polo shirt img">
                                                            @endif
                                                        </a>
                                                        <a class="aa-add-card-btn" href="javascript:void(0)"
                                                            onclick="add_to_cart({{ $product->id }})">
                                                            <span class="fa fa-shopping-cart"></span>Add To Cart</a>
                                                        <figcaption>
                                                            <h4 class="aa-product-title"><a
                                                                    href="#">{{ $product->name }}</a>
                                                            </h4>
                                                            <span class="aa-product-price"> &#8377;
                                                                {{ $product->price }}</span>
                                                        </figcaption>
                                                    </figure>

                                                    <!-- product badge -->
                                                    @if ($product->status == 'sale')
                                                        <span class="aa-badge aa-sale" href="#">SALE!</span>
                                                    @elseif ($product->status == 'sold')
                                                        <span class="aa-badge aa-sold-out" href="#">Sold Out!</span>
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                        <a class="aa-browse-btn" href="#">Browse all Product <span
                                                class="fa fa-long-arrow-right"></span></a>
                                    </div>
                                    <!-- / women product category -->



                                </div>
                                <!-- quick view modal -->
                                <div class="modal fade" id="quick-view-modal" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">&times;</button>
                                                <div class="row">
                                                    <!-- Modal view slider -->
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <div class="aa-product-view-slider">
                                                            <div class="simpleLens-gallery-container" id="demo-1">
                                                                <div class="simpleLens-container">
                                                                    <div class="simpleLens-big-image-container">
                                                                        <a class="simpleLens-lens-image"
                                                                            data-lens-image="{{ asset('customer/img/view-slider/large/polo-shirt-1.png') }}">
                                                                            <img src="{{ asset('customer/img/view-slider/medium/polo-shirt-1.png') }}"
                                                                                class="simpleLens-big-image">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="simpleLens-thumbnails-container">
                                                                    <a href="#" class="simpleLens-thumbnail-wrapper"
                                                                        data-lens-image="{{ asset('customer/img/view-slider/large/polo-shirt-1.png') }}"
                                                                        data-big-image="{{ asset('customer/img/view-slider/medium/polo-shirt-1.png') }}">
                                                                        <img
                                                                            src="{{ asset('customer/img/view-slider/thumbnail/polo-shirt-1.png') }}">
                                                                    </a>
                                                                    <a href="#" class="simpleLens-thumbnail-wrapper"
                                                                        data-lens-image="{{ asset('customer/img/view-slider/large/polo-shirt-3.png') }}"
                                                                        data-big-image="{{ asset('customer/img/view-slider/medium/polo-shirt-3.png') }}">
                                                                        <img
                                                                            src="{{ asset('customer/img/view-slider/thumbnail/polo-shirt-3.png') }}">
                                                                    </a>

                                                                    <a href="#" class="simpleLens-thumbnail-wrapper"
                                                                        data-lens-image="{{ asset('customer/img/view-slider/large/polo-shirt-4.png') }}"
                                                                        data-big-image="{{ asset('customer/img/view-slider/medium/polo-shirt-4.png') }}">
                                                                        <img
                                                                            src="{{ asset('customer/img/view-slider/thumbnail/polo-shirt-4.png') }}">
                                                                    </a>
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
                                                                Officiis animi, veritatis
                                                                quae repudiandae quod nulla porro quidem, itaque quis
                                                                quaerat!</p>
                                                            <h4>Size</h4>
                                                            <div class="aa-prod-view-size">
                                                                <a href="#">S</a>
                                                                <a href="#">M</a>
                                                                <a href="#">L</a>
                                                                <a href="#">XL</a>
                                                            </div>
                                                            <div class="aa-prod-quantity">
                                                                <form action="">
                                                                    <select>
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
                                                                        class="fa fa-shopping-cart"></span>Add To
                                                                    Cart</a>
                                                                <a href="#" class="aa-add-to-cart-btn">View
                                                                    Details</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- / quick view modal -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / Products section -->

    <!-- banner section -->
    <section id="aa-banner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="aa-banner-area">
                            <a href="#"><img src="{{ asset('customer/img/fashion-banner.jpg') }}"
                                    alt="fashion banner img"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / banner section  -->

    <!-- Support section -->
    <section id="aa-support">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-support-area">
                        <!-- single support -->
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="aa-support-single">
                                <span class="fa fa-truck"></span>
                                <h4>FREE SHIPPING</h4>
                                <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
                            </div>
                        </div>
                        <!-- single support -->
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="aa-support-single">
                                <span class="fa fa-clock-o"></span>
                                <h4>30 DAYS MONEY BACK</h4>
                                <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
                            </div>
                        </div>
                        <!-- single support -->
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="aa-support-single">
                                <span class="fa fa-phone"></span>
                                <h4>SUPPORT 24/7</h4>
                                <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / Support section -->

    <!-- Testimonial -->
    <section id="aa-testimonial">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-testimonial-area">
                        <ul class="aa-testimonial-slider">
                            <!-- single slide -->
                            <li>
                                <div class="aa-testimonial-single">
                                    <img class="aa-testimonial-img"
                                        src="{{ asset('customer/img/testimonial-img-2.jpg') }}" alt="testimonial img">
                                    <span class="fa fa-quote-left aa-testimonial-quote"></span>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt distinctio omnis
                                        possimus, facere,
                                        quidem qui!consectetur adipisicing elit. Sunt distinctio omnis possimus, facere,
                                        quidem qui.</p>
                                    <div class="aa-testimonial-info">
                                        <p>Allison</p>
                                        <span>Designer</span>
                                        <a href="#">Dribble.com</a>
                                    </div>
                                </div>
                            </li>
                            <!-- single slide -->
                            <li>
                                <div class="aa-testimonial-single">
                                    <img class="aa-testimonial-img"
                                        src="{{ asset('customer/img/testimonial-img-1.jpg') }}" alt="testimonial img">
                                    <span class="fa fa-quote-left aa-testimonial-quote"></span>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt distinctio omnis
                                        possimus, facere,
                                        quidem qui!consectetur adipisicing elit. Sunt distinctio omnis possimus, facere,
                                        quidem qui.</p>
                                    <div class="aa-testimonial-info">
                                        <p>KEVIN MEYER</p>
                                        <span>CEO</span>
                                        <a href="#">Alphabet</a>
                                    </div>
                                </div>
                            </li>
                            <!-- single slide -->
                            <li>
                                <div class="aa-testimonial-single">
                                    <img class="aa-testimonial-img"
                                        src="{{ asset('customer/img/testimonial-img-3.jpg') }}" alt="testimonial img">
                                    <span class="fa fa-quote-left aa-testimonial-quote"></span>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt distinctio omnis
                                        possimus, facere,
                                        quidem qui!consectetur adipisicing elit. Sunt distinctio omnis possimus, facere,
                                        quidem qui.</p>
                                    <div class="aa-testimonial-info">
                                        <p>Luner</p>
                                        <span>COO</span>
                                        <a href="#">Kinatic Solution</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / Testimonial -->

    <form id="cart_form" method="POST">
        <input type="hidden" value="" id="product_id" name="product_id">
        @csrf
    </form>
@endsection

@push('js')
    <script>
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
                }
            });
        }
    </script>
@endpush
