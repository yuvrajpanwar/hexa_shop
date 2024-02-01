<html lang="en">

<head>

    @stack('meta')

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Hexa shop')</title>

    <link href="{{ asset('customer/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('customer/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('customer/css/jquery.smartmenus.bootstrap.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('customer/css/jquery.simpleLens.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('customer/css/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('customer/css/nouislider.css') }}">
    <link id="switcher" href="{{ asset('customer/css/theme-color/default-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('customer/css/sequence-theme.modern-slide-in.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('customer/css/style.css') }}" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>

    @stack('css')
    <style>
        .justify-content-center {
            display: flex;
            justify-content: center;
        }

        .mb20 {
            margin-bottom: 20px
        }

        .continue_shopping:hover {
            color: #ff6666;
        }

        .text-align-left {
            text-align: left !important;
        }
    </style>

</head>

<body style="min-height:100%; display: flex;  flex-direction: column;">

    @include('customer_layout.header')

    @yield('content')

    @include('customer_layout.footer')


    <!-- Login Modal -->
    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                @if ($errors->has('email') || $errors->has('password'))
                    <div style="margin-top: 10px;color: red;text-align: center;font-size: 22px;">Invalid credentials !
                    </div>
                @endif
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4>Login or Register</h4>
                    <form class="aa-login-form" action="{{ route('customer_login') }}" method="POST">
                        @csrf
                        <label for="">Email address<span>*</span></label>
                        <input type="text" placeholder="Email" name="email" id="email">
                        <label for="">Password<span>*</span></label>
                        <input type="password" placeholder="Password" name="password" id="password">
                        <button class="aa-browse-btn" type="submit" style="float: none">Login</button>

                        <label for="remember" class="remember"><input type="checkbox" id="remember"> Remember
                            me</label>


                        <p class="aa-lost-password"  style="margin-top: 3rem"><a href="{{route('password.customer.request')}}">Forgot password ?</a></p>
                        <p></p>
                        <div class="aa-register-now">
                            Don't have an account?<a href="{{ route('customer_register') }}">Register now!</a>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <script src="{{ asset('customer/js/bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('customer/js/jquery.smartmenus.js') }}"></script>
    <script type="text/javascript" src="{{ asset('customer/js/jquery.smartmenus.bootstrap.js') }}"></script>
    <script src="{{ asset('customer/js/sequence.js') }}"></script>
    <script src="{{ asset('customer/js/sequence-theme.modern-slide-in.js') }}"></script>
    <script type="text/javascript" src="{{ asset('customer/js/jquery.simpleGallery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('customer/js/jquery.simpleLens.js') }}"></script>
    <script type="text/javascript" src="{{ asset('customer/js/slick.js') }}"></script>
    <script type="text/javascript" src="{{ asset('customer/js/nouislider.js') }}"></script>
    <script src="{{ asset('customer/js/custom.js') }}"></script>

    <script>
        $(document).ready(function() {
            @if (($errors->has('email') && $errors->email != 'The email has already been taken.' ) || $errors->has('password'))
                $('#login_button').click();
            @endif
        });
    </script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>

    @stack('js')



</body>

</html>
