@extends('admin_layout/admin_app')



@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="page-title">Edit Category Details</h1>
            </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div>

    <div class="row">

        <div class="col-md-6">

            <div class="card shadow mb-4">

                @if ($errors->any())
                    <div class="alert alert-danger show" id="alert-danger" name="alert-danger">
                        <a data-toggle="collapse" href="#alert-danger" role="button" aria-expanded="true"
                            aria-controls="alert-danger" class="btn-link close-button"><span class="fe fe-24 fe-x"></span></a>
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

                <div class="card-body">

                    <form method="POST" action="{{ route('update_category',['category'=>$category]) }}" class="category_details" id="category_details"
                        name="category_details">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-8 mb-3">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{$category->name}}" required>
                            </div>
                            <div class="col-md-8 mb-3">
                                <label for="Status">Status</label>
                                <select class="form-control" name="status" id="status" required>
                                    <option value="" selected disabled>--Select Status--</option>
                                    <option value="Disabled" {{($category->status=="Disabled")?'Selected':''}}>Disabled</option>
                                    <option value="Enabled" {{($category->status=="Enabled")?'Selected':''}}>Enabled</option>
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit"> Update </button>
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
            $("#category_details").validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 3
                    },
                },

                messages: {
                    name: {
                        required: "Please enter category name !",
                        minlength: "Please enter a valid name !"
                    },
                }

            });
        });
    </script>
@endpush
