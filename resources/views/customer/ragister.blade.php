@extends('customer_layout.customer_app')
@push('css')
    <style>
        .error {
            margin-top: 0px !important;
            color: red;
        }

        input {
            margin-bottom: 0px !important;
        }

        .mb20 {
            margin-bottom: 20px;
        }
    </style>
@endpush

@section('content')
    <section id="aa-myaccount">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-myaccount-area">
                        <div class="row justify-content-center">

                            <div class="col-md-12">
                                <div class="aa-myaccount-register">
                                    <h4>Register</h4>


















                                    <form action="{{ route('customer_register') }}" class="aa-login-form" method="POST"
                                        name="customer_register" id="customer_register">
                                        @csrf
                                        <div class="row mb20">

                                            <div class="col-md-6">
                                                <label for="">Name<span>*</span></label>
                                                <input type="text" placeholder="Name" name="name">

                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong class="error">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">Email<span>*</span></label>
                                                <input type="text" placeholder="Email" name="email">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong class="error">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="row mb20">

                                            <div class="col-md-6">
                                                <label for="address">Address<span>*</span></label>
                                                {{-- <input type="text" placeholder="Address"> --}}
                                                <textarea name="address" id="" rows="2" style="width: 100%" name="address"></textarea>
                                                @error('address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong class="error">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">Phone number<span>*</span></label>
                                                <input type="text" placeholder="Phone number" name="phone">
                                                @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong class="error">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb20">
                                            <div class="col-md-6">
                                                <label for="">Password<span>*</span></label>
                                                <input type="password" placeholder="Password" name="password" id="password">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong class="error">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">Conform password<span>*</span></label>
                                                <input type="text" placeholder="conform password"
                                                    name="password_confirmation">
                                                @error('password-conformation')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong class="error">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <button type="submit" class="aa-browse-btn">Register</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>
    <script>
        $(document).ready(function() {
            $("#customer_register").validate({
                rules: {
                    name: {
                        required: true,
                        maxlength: 255
                    },
                    email: {
                        required: true,
                        email: true,
                        maxlength: 255,

                    },
                    password: {
                        required: true,
                        minlength: 5
                    },
                    password_confirmation: {
                        required: true,
                        minlength: 5,
                        equalTo: "#password"
                    },
                    phone: {
                        required: true
                    },
                    address: {
                        required: true
                    }
                },

                submitHandler: function(form) {
                    form.submit();
                }
            });
        });
    </script>
@endpush
