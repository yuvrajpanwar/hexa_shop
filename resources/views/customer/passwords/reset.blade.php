@extends('customer_layout.customer_app')
@push('css')
    <style>
        .error{
            color: red;
        }
    </style>
    
@endpush

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-12">
                <h2 style="text-align:center;margin:2rem">{{ __('Reset Password') }}</h2>

                <div class="card">

                    <div class="card-body">
                        <form method="POST" action="{{ route('password.customer.update') }}" class="aa-login-form">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">
                            <input id="email" type="hidden" name="email" value="{{ $email ?? old('email') }}"
                                required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror


                            <div class="row mb-3">

                                <div class="col-md-6">
                                    <label style="width: 100%" for="password">{{ __('Password') }}<span>*</span></label>

                                    <input id="password" type="password" name="password" required
                                        autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label style="width: 100%" for="password-confirm">{{ __('Confirm Password') }}<span>*</span></label>

                                    <input id="password-confirm" type="password" name="password_confirmation" required
                                        autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="aa-browse-btn">
                                        {{ __('Reset Password') }}
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
<script>
    $(document).ready(function () {
        $(".aa-login-form").validate({
            rules: {
                password: {
                    required: true,
                    minlength: 5
                },
                'password_confirmation': {
                    equalTo: "#password"
                }
            },
            messages: {
                password: {
                    required: "Please enter a password",
                    minlength: "Password must be at least 5 characters long"
                },
                'password_confirmation': {
                    equalTo: "Passwords do not match"
                }
            },
            errorPlacement: function (error, element) {
                // Custom error placement if needed
                error.insertBefore(element);
            }
        });
    });
</script>
    
@endpush