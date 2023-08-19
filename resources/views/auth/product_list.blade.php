@extends('admin_layout/admin_app')




@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
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
@endpush

@section('content')   

  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <h1 class="page-title"> Products </h1>
      </div> 
    </div> 
  </div> 

  <div class="container-fluid mb-4">
    <div class="row">
      <div class="col-12 d-flex justify-content-end">
        <a href="{{route('add_product')}}"><button class="btn btn-primary">Add New Product</button></a>
      </div>
    </div>
  </div>

  {{--functions to destroy a product  --}}
  <script>

    function showModel(id)
    {
      var deleteForm = document.getElementById("deleteForm");
      var deleteButton = document.getElementById("deleteButton");
  
      formDelete.action = 'product_list/'+id;
      deleteButton.onclick = function() {
        formDelete.submit();
      };
    }
  </script>
  
  <div class="container-fluid mb-4">

    @if(session('success'))
        <div class="alert alert-success show" id="alert-success">
            <a data-toggle="collapse" href="#alert-success" role="button" aria-expanded="true" aria-controls="alert-success" class="btn-link close-button">x</a>


            {{ session('success') }}
        </div>
    @endif


    <table id="example" class="table table-striped" style="width:100%">

      <thead>
          <tr>
              <th style="color: blue"><b>Title</b></th>
              <th style="color: blue"><b>Description</b></th>
              <th style="color: blue"><b>Size</b></th>
              <th style="color: blue"><b>Price</b></th>
              <th style="color: blue"><b>Category</b></th>
              <th style="color: blue"><b>Image</b></th>
              <th style="color: blue"><b>Status</b></th>
              <th style="color: blue"><b>Actions</b></th>
          </tr>
      </thead>   

      <tbody>
        @foreach ($products as $product)
            <tr>
              <td>{{$product->title}}</td>
              <td>{{$product->description}}
              <td>{{$product->size}}</td>
              <td>{{$product->price}}</td>
              <td>{{$product->category}}</td>
              <td>{{$product->image}}</td>
              <td>{{$product->status}}</td>
              {{-- <td><button class="btn btn-danger mr-1 col-6" data-toggle="modal" data-target="#verticalModal" onClick='showModel({!! $product->id !!})' >Delete</button><a href="{{ route('edit_admin_details', ['user' => $product->id]) }}" class="btn btn-success col-4 text-center" style="display: block; margin: 0 auto;">Edit</a> --}}
                <td><a data-toggle="modal" data-target="#verticalModal" onClick='showModel({!! $product->id !!})' style="color: red"> <span class="fe fe-24 fe-trash-2 "></span></a> | <a href="{{ route('edit_product_details', ['product' => $product->id]) }}"><span class="fe fe-24 fe-edit-3"></span></a></td>              
              </td>
            </tr>
        @endforeach 
      </tbody>

      <tfoot>
        <tr>
          <tr>
            <th style="color: blue"><b>Title</b></th>
            <th style="color: blue"><b>Size</b></th>
            <th style="color: blue"><b>Price</b></th>
            <th style="color: blue"><b>Category</b></th>
            <th style="color: blue"><b>Image</b></th>
            <th style="color: blue"><b>Status</b></th>
            <th style="color: blue"><b>Actions</b></th>
        </tr>
        </tr>
      </tfoot>

    </table>
    
  </div> 
  
  <!-- delete pop up Modal -->
  <div class="modal fade" id="verticalModal" tabindex="-1" role="dialog" aria-labelledby="verticalModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="verticalModalTitle">Delete !</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body"> Are you sure you want to delete this Product ?</div>
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