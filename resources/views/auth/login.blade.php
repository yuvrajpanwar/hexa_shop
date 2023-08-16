<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="favicon.ico">
  <title>Tiny Dashboard - A Bootstrap Dashboard Template</title>
  <!-- Simple bar CSS -->
  <link rel="stylesheet" href="css/simplebar.css">
  <!-- Fonts CSS -->
  <link
    href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
  <!-- Icons CSS -->
  <link rel="stylesheet" href="css/feather.css">
  <!-- Date Range Picker CSS -->
  <link rel="stylesheet" href="css/daterangepicker.css">
  <!-- App CSS -->
  <link rel="stylesheet" href="css/app-light.css" id="lightTheme">
  <link rel="stylesheet" href="css/app-dark.css" id="darkTheme" disabled>

  <style type="text/css">

    .error{
      color: red;
    }
    #alert-success {
      transition-duration: 0.3s; /* Adjust the duration as needed */
      transition-timing-function: ease-in-out; /* Adjust the easing function as needed */ 
    }
    .close-button {
      position: absolute;
      top: 0.5rem;
      right: 0.5rem;
      color: #333;
      text-decoration: none;
    }

  </style>
</head>

<body class="light ">
  <div class="wrapper vh-100">
    <div class="row align-items-center h-100">
      <form class="col-lg-3 col-md-4 col-10 mx-auto text-center" method="POST" action="{{ route('login') }}" name="admin_details" id="admin_details">
        @csrf
        <a class="navbar-brand mx-auto mt-2 flex-fill text-center mb-4" href="./index.html">
          <svg version="1.1" id="logo" class="navbar-brand-img brand-md" xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
            <g>
              <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
              <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
              <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
            </g>
          </svg>
        </a>

        <h1 class="h6 mb-3">Login</h1>

        @foreach ($errors->all() as $error)
            <strong style="color: red">{{ $error }}</strong>
        @endforeach

        <div class="form-group">       

            <label for="email" class="sr-only">Email address</label>
            <input id="email" type="email" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email address"autofocus>   
       
        </div>

        <div class="form-group">

            <label for="password" class="sr-only">Password</label>   
            <input id="password" type="password" name="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
            
        </div>

        <div class="checkbox mb-3">
            <label>
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Stay logged in </label>
        </div>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Let me in</button>
        @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
        <p class="mt-5 mb-3 text-muted">© 2023</p>

      </form>
    </div>
  </div>


  @include('admin_layout/common_js');


    {{-- form validations  --}}
    <script>
          $(document).ready(function() {
            $("#admin_details").validate({
                        rules: {
                            email: {
                                required: true,
                                email: true
                                },
                            password: {
                              required: true,
                              minlength: 8
                              }
                        },
                          
                        messages : {
                            email: {
                                required: "Please enter your email !",
                                email: "email should be in the format: abc@domain.tld !"
                                },
                            password: {
                                required: "Please enter password !",
                                minlength: "Password shold be atleast 8 character long !"
                                }
                        }
                            
            });
          });
    </script>
  
</body>

</html>
</body>

</html>  





