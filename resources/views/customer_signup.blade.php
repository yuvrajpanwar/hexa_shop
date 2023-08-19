@extends('layout.app')

@section('content')

@push('css')
    <style>
        label {
        margin-bottom: 0;
        }
        form {
            border: 1px solid black;
            border-radius: 10px;
            padding-right: 2%;
            padding-left: 2%;
        }
        .error{
            color: red;
        }
    </style>
@endpush

<div class="contact-us">
    <div class="container pt-4">
        <div class="row justify-content-center">
            
            <div class="col-lg-5" >

                <div class="row justify-content-center">
                    <div class="section-heading col-lg-10">
                        <h2 class=""> Create your account </h2>
                    </div>
                </div>

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

                @if(session('success'))
                    <div class="alert alert-success show" id="alert-success">
                        <a data-toggle="collapse" href="#alert-success" role="button" aria-expanded="true" aria-controls="alert-success" class="btn-link close-button">x</a>


                        {{ session('success') }}
                    </div>
                @endif

                <form id="customer_details" action="{{ route('store_customer')}}" method="post">
                    @csrf
                    <div class="row justify-content-center">

                        <div class="col-lg-10 mb-4 mt-4">
                            <fieldset>
                                <label for="name">Name:</label>
                                <input name="name" type="text" id="name" placeholder="Enter your name" required>
                            </fieldset>
                        </div>

                        <div class="col-lg-10 mb-4">
                            <fieldset>
                                <label for="email">Email:</label>
                                <input name="email" type="email" id="email" placeholder="Enter Your email" required>
                            </fieldset>
                        </div>

                        <div class="col-lg-10 mb-4">
                            <fieldset>
                                <label for="phone">Phone number:</label>
                                <input name="phone" type="number" id="phone" placeholder="Enter your phone number" required>
                            </fieldset>
                        </div>

                        <div class="col-lg-10 mb-4">
                            <fieldset>
                                <label for="address">Address:</label>
                                <textarea name="address" id="address" style="height:70px" placeholder="Enter your Address"></textarea>
                            </fieldset>
                        </div>

                        <div class="col-lg-10 mb-4">
                            <fieldset>
                                <label for="password">Password:</label>
                                <input type="password" name="password" id="password" placeholder="Enter your Password" required>
                            </fieldset>
                        </div>

                        <div class="col-lg-10 mb-4">
                            <fieldset>
                                <label for="password_confirmation">Conform Password:</label>
                                <input type="password_confirmation" name="password_confirmation" id="password_confirmation" placeholder="Enter password again" required>
                            </fieldset>
                        </div>

                        <div class="col-lg-10 justify-content-center d-flex mb-4">
                            <div>
                                <fieldset>
                                    <input type="submit" class="btn btn-dark" value="Sign up" style="color: white">
                                </fieldset>
                            </div>        
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    {{-- form validations  --}}
    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <script>
        $(document).ready(function() {
        $("#customer_details").validate({
                    rules: {
                        name : {
                            required: true,
                            minlength: 3
                            },
                        email: {
                            required: true,
                            email: true
                            },
                        phone : {
                            required: true,
                            minlength: 10,
                            maxlength: 10,
                            number: true
                            },
                        password: {
                            required: true,
                            minlength: 8
                            },
                        password_confirmation: {
                            required: true,
                            equalTo: "#password"
                        },
                        address: {
                            required: true
                        }
                    },
                        
                    messages : {
                        name: {
                            required: "Please enter your name !",
                            minlength: "Please enter a valid name !"
                        },
                        email: {
                            required: "Please enter your email !",
                            email: "email should be in the format: abc@domain.tld !"
                            },
                        phone : {
                            required: "Please enter your phone number !"   
                            },
                        password: {
                            required: "Please enter password !",
                            minlength: "Password shold have atleast 8 characters !"
                            },
                        password_confirmation: {
                            required: "This field is required !",
                            equalTo: "This should be equal to password !"
                        },
                        address: {
                            required: "Please enter address !"
                        }
                        
                    }
                        
        });
        });
    </script>
@endpush