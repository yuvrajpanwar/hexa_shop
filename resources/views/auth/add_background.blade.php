@extends('admin_layout/admin_app')

@push('css')
    <style type="text/css">
        .error {
            color: red;
        }

        #alert-success {
            transition-duration: 0.3s;
            /* Adjust the duration as needed */
            transition-timing-function: ease-in-out;
            /* Adjust the easing function as needed */
        }

        .close-button {
            position: absolute;
            top: 0.5rem;
            right: 0.5rem;
            color: #333;
            text-decoration: none;
        }
    </style>
@endpush

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="page-title">Add New background </h1>
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
                            aria-controls="alert-success" class="btn-link close-button"><span
                                class="fe fe-24 fe-x"></span></a>
                        {{ session('success') }}
                    </div>
                @endif



                <div class="card-header ">

                    <strong class="card-title">Fill New background's Detail</strong>

                </div>

                <div class="card-body">

                    <form method="POST" action="{{ route('store_background') }}" class="background_details"
                        id="background_details" name="background_details" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">

                            <div class="col-md-8 mb-3">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    value="{{ old('name') }}" required>
                            </div>

                            <div class="col-md-8 mb-3">
                                <label for="title">Description</label>
                                <textarea type="text" class="form-control" id="description" name="description" required>{{ old('description') }}</textarea>
                            </div>

                            <div class="col-md-8 mb-3 mt-3">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" name="image" accept="image/*">
                            </div>

                        </div>

                        <button class="btn btn-primary" type="submit">Add Background</button>

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
            $("#background_details").validate({
                rules: {
                    title: {
                        required: true,
                        minlength: 3
                    },
                    description: {
                        required: true,

                    },
                    image: {
                        required: true,

                    },
                },
            });
        });
    </script>
@endpush
