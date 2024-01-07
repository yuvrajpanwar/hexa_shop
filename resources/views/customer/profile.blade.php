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

        #success_message {
            display: block;
            transition: height 0.1s ease-in-out;
            overflow: hidden;
            margin-bottom: 10px;
            font-size: 20px;
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
                                    <h4>My Details</h4>
                                    @if (session()->has('message'))
                                        <div class="row" id="success_message">
                                            <div style="color: green;margin-left:14px">
                                                {{ session()->get('message') }}
                                            </div>
                                        </div>
                                    @endif
                                    <form action="{{ route('update_details') }}" class="aa-login-form" method="POST"
                                        name="update_details" id="update_details">
                                        @csrf
                                        <div class="row mb20">

                                            <div class="col-md-6">
                                                <label for="">Name<span>*</span></label>
                                                <input type="text" placeholder="Name" name="name"
                                                    value="{{ $customer->name }}">
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong class="error">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">Email<span>*</span></label>
                                                <input type="text" placeholder="Email" name="email"
                                                    value="{{ $customer->email }}" disabled>
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
                                                <textarea name="address" id="" rows="2" style="width: 100%" name="address">{{ $customer->address }}</textarea>
                                                @error('address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong class="error">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">Phone number<span>*</span></label>
                                                <input type="text" placeholder="Phone number" name="phone"
                                                    value="{{ $customer->phone }}" disabled>
                                                @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong class="error">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb20">
                                            <div class="col-md-6">
                                                <label for="">Password</label>
                                                <input type="password" placeholder="Password" name="password" id="password"
                                                    value="">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong class="error">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">Conform password</label>
                                                <input type="text" placeholder="conform password"
                                                    name="password_confirmation">
                                                @error('password-conformation')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong class="error">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <button type="submit" class="aa-browse-btn">Update Details</button>
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
            $("#update_details").validate({
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
                        minlength: 5
                    },
                    password_confirmation: {
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

<script>
    $(document).ready(function () {
        // Wait for 2 seconds and then collapse the div
        setTimeout(function () {
            $('#success_message').css('height', '0');
        }, 2000);
    });
</script>
@endpush
