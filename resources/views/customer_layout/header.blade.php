@php
    use App\Models\Category;
    use App\Models\Cart;
    use App\Models\Wishlist;

    $categories = Category::where('Status', 'Enabled')->get();
    if (session()->has('FRONT_USER_ID')) {
        $user_id = session()->get('FRONT_USER_ID');
    } else {
        $user_id = get_user_temp_id();
    }
    $total_cart_products = Cart::where('user_id', $user_id)->count();
        
    $total_wishlist_products = Wishlist::where('user_id', $user_id)->count();
@endphp

<!-- wpf loader Two -->
<div id="wpf-loader-two">
    <div class="wpf-loader-two-inner">
        <span>Loading</span>
    </div>
</div>
<!-- / wpf loader Two -->

<!-- SCROLL TOP BUTTON -->
<a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
<!-- END SCROLL TOP BUTTON -->

<!-- Start header section -->
<header id="aa-header">

    <!-- start header bottom  -->
    <div class="aa-header-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-header-bottom-area">

                        <div class="aa-logo">
                            <!-- Text based logo -->
                            <a href="{{ route('home') }}">
                                <span class="fa fa-shopping-cart"></span>
                                <p>daily<strong>Shop</strong> <span>Shopping Partner</span></p>
                            </a>
                            <!-- img based logo -->
                            <!-- <a href="index.html"><img src="{{ asset('customer/img/logo.jpg') }}" alt="logo img"></a> -->
                        </div>

                        <div class="aa-cartbox" style="margin-top:12px">
                            <a class="aa-cart-link" href="{{ route('cart') }}">
                                <span class="fa fa-shopping-basket"></span>
                                <span class="aa-cart-title">CART</span>
                                <span class="aa-cart-notify">{{ $total_cart_products }}</span>
                            </a>
                        </div>

                        <div class="aa-search-box">
                            <form action="" style="margin-bottom:0px">
                                <input type="text" placeholder="Search here ex. 'man' ">
                                <button type="submit"><span class="fa fa-search"></span></button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / header bottom  -->
</header>
<!-- / header section -->

<!-- menu -->
<section id="menu" style="position: sticky; top:0px; z-index:1000;">
    <div class="container">
        <div class="menu-area">
            <!-- Navbar -->
            <div class="navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse">
                    <!-- Left nav -->
                    <ul class="nav navbar-nav">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        @foreach ($categories as $category)
                            <li><a
                                    href="{{ route('category', ['category' => $category->id]) }}">{{ $category->name }}</a>
                            </li>
                        @endforeach
                        <li><a href="contact.html">Contact</a></li>
                        @if (!auth()->guard('customer')->check())
                            <li style="float: right;"><a style="" href="" data-toggle="modal"
                                    data-target="#login-modal" id="login_button">Login</a></li>
                        @else
                            <li style="float: right;"><a href="#" class="has-submenu" id="sm-1704442527860038-19"
                                    aria-haspopup="true" aria-controls="sm-1704442527860038-20" aria-expanded="false">
                                    Account
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu sm-nowrap" id="sm-1704442527860038-20" role="group"
                                    aria-hidden="true" aria-labelledby="sm-1704442527860038-19" aria-expanded="false"
                                    style="width: auto; display: none; top: auto; left: 0px; margin-left: 0px; margin-top: 0px; min-width: 10em; max-width: 20em;">
                                    <li><a href="{{route('profile')}}">My Profile</a></li>
                                    <li><a href="{{route('my_orders')}}">My Orders</a></li>
                                    <li style="margin-top:5px"><a href="#"
                                            onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">Log
                                            Out</a></li>
                                    <form id="logout-form" action="{{ route('customer_logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </ul>
                            </li>
                        @endif

                        <li style="float: right;"><a style="" href="{{ route('wishlist') }}">Wishlist (<span id="total_wishlist_products">{{$total_wishlist_products}}</span>)</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>
    </div>
</section>
<!-- / menu -->
