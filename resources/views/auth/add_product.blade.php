@extends('admin_layout/admin_app')

@push('css')

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
            <h1 class="page-title">Add New Product </h1>
          </div> <!-- .col-12 -->
        </div> <!-- .row -->
      </div>

      <div class="row">

        <div class="col-md-6">

            <div class="card shadow mb-4">

              @if($errors->any())
                  <div class="alert alert-danger show" id="alert-danger" name="alert-danger">
                      <a data-toggle="collapse" href="#alert-danger" role="button" aria-expanded="true" aria-controls="alert-danger" class="btn-link close-button">X</a>
                      <ul>
                          @foreach($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif

              @if(session('success'))
                  <div class="alert alert-success show" id="alert-success">
                      <a data-toggle="collapse" href="#alert-success" role="button" aria-expanded="true" aria-controls="alert-success" class="btn-link close-button"><span class="fe fe-24 fe-x"></span></a>


                      {{ session('success') }}
                  </div>
              @endif
              

              
              <div class="card-header " >

                <strong class="card-title">Fill New Products's Detail</strong>
                               
              </div>

              <div class="card-body">

                <form method="POST" action="{{route('store_product')}}" class="admin_details" id="admin_details" name="admin_details" enctype="multipart/form-data">
                  @csrf
                  <div class="form-row">
                                       
                    <div class="col-md-8 mb-3">
                        <label for="title">name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                    </div>

                    <div class="col-md-8 mb-3">
                      <label for="title">Description</label>
                      <textarea type="text" class="form-control" id="description" name="description" required>{{ old('description') }}</textarea>
                    </div>

                    <div class="col-md-8 mb-3">
                      <label for="size">Size</label>
                      <input type="text" class="form-control" id="size" name="size" value="{{ old('size') }}" required>                     
                    </div>
                  
                  </div>

                  <div class="form-row">

                    <div class="col-md-8 mb-3">
                      <label for="price">Price</label>
                      <input type="number" class="form-control" id="price" name="price" value="{{ old('price')}}" required>
                    </div>

                    {{-- <div class="col-md-8 mb-3">
                      <label for="category">Image</label>
                      <input type="file" name="image">
                    </div> --}}

                    <div class="col-md-8 mb-3">
                      <label for="admin_type">Category</label>
                          <select class="form-control" name="category" id="category"  required>
                              <option disabled selected>--- Select Category ---</option>

                              @foreach ($categories as $category)

                                <option value="{{ $category->id}}"  {{ old('category') == $category->name ? 'selected' : '' }}>{{$category->name}}</option>
                                
                                  
                              @endforeach

                              
                          </select>                       
                    </div>

                  </div>

                 
              
                  <div class="form-row">
                    
                    <div class="col-md-8 mb-3">
                        <label for="admin_type">Status</label>
                            <select class="form-control" name="status" id="status"  required>
                                <option disabled selected>---Status of product---</option>
                                <option value="sold"  {{ old('status') == 'sold' ? 'selected' : '' }}>Sold</option>
                                <option value="available"  {{ old('status') == 'available' ? 'selected' : '' }}>Available</option>
                            </select>                       
                    </div>
                    
                  </div>
                  
                 
                  <button class="btn btn-primary" type="submit">Add Product</button>

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
                          name : {
                              required: true,
                              minlength: 3
                              },
                          email: {
                              required: true,
                              email: true
                              },
                          password: {
                            required: true,
                            minlength: 8
                            },
                          password_confirmation: {
                            required: true,
                            equalTo: "#password"
                          },
                          admin_type: {
                            required: true
                          }
                      },
                        
                      messages : {
                          name: {
                              required: "Please enter your name !",
                              minlength: "Please enter a valid name !"
                          },
                          email: {
                              required: "Please enter your email !",
                              email: "email should be in the format: abc@domain.tld !"
                              },
                          password: {
                              required: "Please enter password !",
                              minlength: "Password shold be atleast 8 character long !"
                              },
                          password_confirmation: {
                            required: "This field is required !",
                            equalTo: "This should be equal to password !"
                          },
                          admin_type: {
                            required: "Please select admin type !"
                          }
                          
                      }
                          
          });
        });
  </script> 

@endpush 
