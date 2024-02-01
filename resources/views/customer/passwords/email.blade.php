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
                    <div class="col-sm-12" style="margin: 2rem">
                        <h2 style="text-align:center">Forgot Password</h2>
                    </div>
                    <div class="aa-myaccount-area" style="padding-top:2rem">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="aa-myaccount-register">
                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @else
                                        <p style="font-size: x-large;">Enter your email to reset password.</p>
                                        @error('email-error')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="error">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <form action="{{ route('password.customer.email') }}" class="aa-login-form"
                                            method="POST" name="update_details" id="update_details">
                                            @csrf
                                            <div class="row mb20">
                                                <div class="col-md-6">
                                                    <label for="">Email<span>*</span></label>
                                                    <input type="text" placeholder="Email" name="email"
                                                        value="{{ old('email') }}">

                                                </div>
                                            </div>
                                            <button type="submit" class="aa-browse-btn">Submit</button>
                                        </form>
                                    @endif


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
    <script>
        $(document).ready(function() {
            $("#update_details").validate({
                rules: {
                    email: {
                        required: true,
                        email: true,
                        maxlength: 255,
                    },
                },

                submitHandler: function(form) {
                    form.submit();
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            // Wait for 2 seconds and then collapse the div
            setTimeout(function() {
                $('#success_message').css('height', '0');
            }, 2000);
        });
    </script>
@endpush
