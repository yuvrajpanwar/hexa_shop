@extends('layout.app')

@section('content')

<div class="contact-us">
    <div class="container pt-4">
        <div class="row justify-content-center">
            
            <div class="col-lg-5">
                <div class="row justify-content-center">
                    <div class="section-heading col-lg-10">
                        <h2 class="mb-2"> Log In </h2>

                        @if($errors->any())
                            <div class="alert alert-danger show" id="alert-danger" name="alert-danger">
                                <a data-toggle="collapse" href="#alert-danger" role="button" aria-expanded="true" aria-controls="alert-danger" class="btn-link close-button">X</a>
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        

                        <span>
                            @if(session('success'))
                                {{ session('success') }}               
                            @else
                                Log in to access orders, cart, and other features.
                            @endif
                        </span>


                         
                        @if (Auth::guard('customer')->check())
                        {{ Auth::guard('customer')->user()->name}}
                        @else
                        visitor
                        @endif
                    </div> 

                </div>
                <form id="customer_login" action="" method="post">
                    @csrf
                    <div class="row justify-content-center">

                        <div class="col-lg-10 mb-4">
                            <fieldset>
                                <label for="email">Email:</label>
                                <input name="email" type="email" id="email" placeholder="Your email" required>
                            </fieldset>
                        </div>

                        <div class="col-lg-10 mb-4">
                            <fieldset>
                                <label for="password">Password:</label>
                                <input type="password" name="password" id="password" placeholder="Your Password" required>
                            </fieldset>
                        </div>

                        <div class="col-lg-10 justify-content-center d-flex mb-4">
                            <div>
                                <fieldset>
                                    <input type="submit" class="btn btn-dark" value="Login" style="color: white">
                                </fieldset>
                            </div>        
                        </div>

                        <div class="col-lg-10 mb-1 justify-content-center d-flex">             
                           <span>New to HexaShop ?</span>
                        </div>

                        <div class="col-lg-10 mb-4 justify-content-center d-flex">
                            <a href="{{ route('customer_signup') }}"> Create your account </a>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection