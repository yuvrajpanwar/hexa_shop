@extends('admin_layout/admin_app')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="page-title">Edit Customer Details </h1>
            </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div>

    <div class="row">

        <div class="col-md-6">

            <div class="card shadow mb-4">

                @if ($errors->any())
                    <div class="alert alert-danger show" id="alert-danger" name="alert-danger">
                        <a data-toggle="collapse" href="#alert-danger" role="button" aria-expanded="true"
                            aria-controls="alert-danger" class="btn-link close-button">X</a>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success show" id="alert-success">
                        <a data-toggle="collapse" href="#alert-success" role="button" aria-expanded="true"
                            aria-controls="alert-success" class="btn-link close-button">x</a>
                        {{ session('success') }}
                    </div>
                @endif

                <div class="card-header ">
                    <strong class="card-title">Edit Detail</strong>
                </div>

                <div class="card-body">

                    <form method="POST" action="{{ route('update_customer', ['customer' => $customer->id]) }}" class="admin_details"
                        id="admin_details" name="admin_details">
                        @csrf
                        @method('PUT')
                        <div class="form-row">

                            <div class="col-md-8 mb-3">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $customer->name }}" required>
                            </div>

                            <div class="col-md-8 mb-3">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ $customer->email }}" required>
                                <div class="invalid-feedback"> Please use a valid email </div>
                            </div>

                            <div class="col-md-8 mb-3">
                              <label for="phone">Phone</label>
                              <input type="number" class="form-control" id="phone" name="phone"
                                  value="{{ $customer->phone }}" required>
                              <div class="invalid-feedback"> Please use a valid phone </div>
                          </div>
                        </div>

                        <div class="form-row">
                          <div class="col-md-8 mb-3">
                              <label for="address">Address</label>
                              <textarea class="form-control" name="address" id="" rows="2">{{ $customer->address }}</textarea>
                          </div>
                      </div>

                        <div class="form-row">
                            <div class="col-md-8 mb-3">
                                <label for="password">Password</label>
                                <input type="text" class="form-control" id="password" name="password">
                            </div>
                            <div class="col-md-8 mb-3">
                                <label for="password_confirmation">Conform Password</label>
                                <input type="text" class="form-control" id="password_confirmation"
                                    name="password_confirmation">
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Update</button>
                    </form>

                </div>

            </div>

        </div>
    </div>

@endsection


@push('js')
    {{-- form validations  --}}
    <script>
        $(document).ready(function() {
    $("#admin_details").validate({
        rules: {
            name: {
                required: true,
                minlength: 3
            },
            email: {
                required: true,
                email: true
            },
            phone: {
                required: true,
            },
            address: {
                required: true,
            },
            password: {
              minlength: 5
            },
            password_confirmation: {
                equalTo: '#password', // reference the actual password field
            }
        },

        messages: {
            name: {
                required: "Please enter a name!",
                minlength: "Please enter a valid name with at least 3 characters!"
            },
            email: {
                required: "Please enter an email!",
                email: "Email should be in the format: abc@domain.tld!"
            },
            phone: {
                required: "Please enter a phone number!",
            },
            address: {
                required: "Please enter an address!",
            },
            password_confirmation: {
                equalTo: "Password and confirmation must match!",
            }
        }
    });
});

    </script>
@endpush
