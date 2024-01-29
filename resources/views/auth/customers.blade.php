@extends('admin_layout/admin_app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="page-title"> Customers </h1>
            </div>
        </div>
    </div>

    <div class="container-fluid mb-4">

        @if (session('success'))
            <div class="alert alert-success show" id="alert-success">
                <a data-toggle="collapse" href="#alert-success" role="button" aria-expanded="true"
                    aria-controls="alert-success" class="btn-link close-button"><span class="fe fe-24 fe-x"></span></a>
                {{ session('success') }}
            </div>
        @endif


        <table id="example" class="table table-striped" style="width:100%">

            <thead>
                <tr>
                    <th style="color: blue"><b>Name</b></th>
                    <th style="color: blue"><b>Email</b></th>
                    <th style="color: blue"><b>Phone</b></th>
                    <th style="color: blue"><b>Address</b></th>
                    <th style="color: blue"><b>Actions</b></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->phone }}</td>
                        <td>{{ $customer->address }}</td>

                        {{-- <td><button class="btn btn-danger mr-1 col-6" data-toggle="modal" data-target="#verticalModal" onClick='showModel({!! $customer->id !!})' >Delete</button><a href="{{ route('edit_admin_details', ['user' => $customer->id]) }}" class="btn btn-success col-4 text-center" style="display: block; margin: 0 auto;">Edit</a> --}}
                        <td>
                            
                              
                            
                           
                                <a href="{{ route('edit_customer', ['customer' => $customer->id]) }}"><span
                                        class="fe fe-24 fe-edit-3"></span></a>
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>

            <tfoot>
                <tr>
                <tr>
                    <th style="color: blue"><b>Name</b></th>
                    <th style="color: blue"><b>Status</b></th>
                    <th style="color: blue"><b>Actions</b></th>
                </tr>
                </tr>
            </tfoot>

        </table>
    </div>

@endsection

@push('js')
    {{-- for data table --}}
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            new DataTable('#example');
        });
    </script>
@endpush
