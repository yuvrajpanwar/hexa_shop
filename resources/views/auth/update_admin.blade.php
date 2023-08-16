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
            <h1 class="page-title">Edit Admin Details </h1>
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
                      <a data-toggle="collapse" href="#alert-success" role="button" aria-expanded="true" aria-controls="alert-success" class="btn-link close-button">x</a>


                      {{ session('success') }}
                  </div>
              @endif
              

              
              <div class="card-header " >

                <strong class="card-title">Edit Detail</strong>
                               
              </div>

              <div class="card-body">

                <form method="POST" action="{{route('update_admin', ['id' => $user->id])}}" class="admin_details" id="admin_details" name="admin_details" >
                  @csrf
                  @method('PUT')
                  <div class="form-row">
                                       
                    <div class="col-md-8 mb-3">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                    </div>

                    <div class="col-md-8 mb-3">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                      <div class="invalid-feedback"> Please use a valid email </div>
                    </div>
                    
                  </div>

                  <div class="form-row">

                    <div class="col-md-8 mb-3">
                      <label for="password">Password</label>
                      <input type="text" class="form-control" id="password" name="password"  required ">
                      
                    </div>

                    <div class="col-md-8 mb-3">
                        <label for="password_confirmation">Conform Password</label>
                        <input type="text" class="form-control" id="password_confirmation" name="password_confirmation" required>
                       
                    </div>

                  </div>
              
                  <div class="form-row">
                    <div class="col-md-8 mb-3">
                        <label for="admin_type">Select Admin Type</label>
                            <select class="form-control" name="admin_type" id="admin_type"  required>
                                <option disabled selected>---Select admin type---</option>
                                <option value="admin"  {{ $user->admin_type == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="super_admin"  {{ $user->admin_type == 'super_admin' ? 'selected' : '' }}>Super admin</option>
                            </select>                       
                    </div>
                    
                  </div>
                  
                 
                  <button class="btn btn-primary" type="submit">Update</button>
                </form>

              </div>

            </div>

          </div> 

      </div>

      <div class="modal fade modal-notif modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="defaultModalLabel">Notifications</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="list-group list-group-flush my-n3">
                <div class="list-group-item bg-transparent">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <span class="fe fe-box fe-24"></span>
                    </div>
                    <div class="col">
                      <small><strong>Package has uploaded successfull</strong></small>
                      <div class="my-0 text-muted small">Package is zipped and uploaded</div>
                      <small class="badge badge-pill badge-light text-muted">1m ago</small>
                    </div>
                  </div>
                </div>
                <div class="list-group-item bg-transparent">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <span class="fe fe-download fe-24"></span>
                    </div>
                    <div class="col">
                      <small><strong>Widgets are updated successfull</strong></small>
                      <div class="my-0 text-muted small">Just create new layout Index, form, table</div>
                      <small class="badge badge-pill badge-light text-muted">2m ago</small>
                    </div>
                  </div>
                </div>
                <div class="list-group-item bg-transparent">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <span class="fe fe-inbox fe-24"></span>
                    </div>
                    <div class="col">
                      <small><strong>Notifications have been sent</strong></small>
                      <div class="my-0 text-muted small">Fusce dapibus, tellus ac cursus commodo</div>
                      <small class="badge badge-pill badge-light text-muted">30m ago</small>
                    </div>
                  </div> <!-- / .row -->
                </div>
                <div class="list-group-item bg-transparent">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <span class="fe fe-link fe-24"></span>
                    </div>
                    <div class="col">
                      <small><strong>Link was attached to menu</strong></small>
                      <div class="my-0 text-muted small">New layout has been attached to the menu</div>
                      <small class="badge badge-pill badge-light text-muted">1h ago</small>
                    </div>
                  </div>
                </div> <!-- / .row -->
              </div> <!-- / .list-group -->
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Clear All</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade modal-shortcut modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="defaultModalLabel">Shortcuts</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body px-5">
              <div class="row align-items-center">
                <div class="col-6 text-center">
                  <div class="squircle bg-success justify-content-center">
                    <i class="fe fe-cpu fe-32 align-self-center text-white"></i>
                  </div>
                  <p>Control area</p>
                </div>
                <div class="col-6 text-center">
                  <div class="squircle bg-primary justify-content-center">
                    <i class="fe fe-activity fe-32 align-self-center text-white"></i>
                  </div>
                  <p>Activity</p>
                </div>
              </div>
              <div class="row align-items-center">
                <div class="col-6 text-center">
                  <div class="squircle bg-primary justify-content-center">
                    <i class="fe fe-droplet fe-32 align-self-center text-white"></i>
                  </div>
                  <p>Droplet</p>
                </div>
                <div class="col-6 text-center">
                  <div class="squircle bg-primary justify-content-center">
                    <i class="fe fe-upload-cloud fe-32 align-self-center text-white"></i>
                  </div>
                  <p>Upload</p>
                </div>
              </div>
              <div class="row align-items-center">
                <div class="col-6 text-center">
                  <div class="squircle bg-primary justify-content-center">
                    <i class="fe fe-users fe-32 align-self-center text-white"></i>
                  </div>
                  <p>Users</p>
                </div>
                <div class="col-6 text-center">
                  <div class="squircle bg-primary justify-content-center">
                    <i class="fe fe-settings fe-32 align-self-center text-white"></i>
                  </div>
                  <p>Settings</p>
                </div>
              </div>
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
