@extends('admin_layout/admin_app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="page-title"> Background images </h1>
            </div>
        </div>
    </div>

    @can('Add Category')
        <div class="container-fluid mb-4">
            <div class="row">
                <div class="col-12 d-flex justify-content-end">
                    @can('Add Category')
                        <a href="{{ route('add_background') }}"><button class="btn btn-primary">Add New Background</button></a>
                    @endcan
                </div>
            </div>
        </div>
    @endcan

    {{-- functions to destroy a category  --}}
    <script>
        function showModel(id) {
            var deleteForm = document.getElementById("deleteForm");
            var deleteButton = document.getElementById("deleteButton");

            formDelete.action = 'destroy_background/' + id;
            deleteButton.onclick = function() {
                formDelete.submit();
            };
        }
    </script>

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
                    <th style="color: blue"><b>Title</b></th>
                    <th style="color: blue"><b>Description</b></th>
                    <th style="color: blue"><b>Image</b></th>
                    <th style="color: blue"><b>Actions</b></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($backgrounds as $background)
                    <tr>
                        <td>{{ $background->title }}</td>
                        <td>{{ $background->description }}</td>
                        <td><img src="{{asset('storage/background_images').'/'.$background->image_name}}" style="height:50px;width:90px"></td>

                        <td>
                            
                                <a href="#" data-toggle="modal" data-target="#verticalModal"
                                    onClick='showModel({!! $background->id !!})' style="color: red"> <span
                                        class="fe fe-24 fe-trash-2 "></span></a> |
                      

       
                                <a href=""><span
                                        class="fe fe-24 fe-edit-3"></span></a>
                      
                        </td>

                    </tr>
                @endforeach
            </tbody>

            <tfoot>
             
                    <tr>
                        <th style="color: blue"><b>Title</b></th>
                        <th style="color: blue"><b>Description</b></th>
                        <th style="color: blue"><b>Image</b></th>
                        <th style="color: blue"><b>Actions</b></th>
                    </tr>
                
            </tfoot>

        </table>

    </div>

    <!-- delete pop up Modal -->
    <div class="modal fade" id="verticalModal" tabindex="-1" role="dialog" aria-labelledby="verticalModalTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="verticalModalTitle">Delete !</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"> Are you sure you want to delete this Background ?</div>
                <div class="modal-footer">
                    <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">No</button>
                    <button type="button" class="btn mb-2 btn-danger" id="deleteButton">Yes</button>
                    <form id="formDelete" class="" action="" method="POST">
                        @method('DELETE')
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end model -->
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
