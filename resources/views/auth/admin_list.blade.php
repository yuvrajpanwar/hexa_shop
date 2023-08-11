@extends('admin_layout/admin_app')




@push('css')
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endpush

@section('content')   

      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-12">
            <h1 class="page-title"> Admins </h1>
          </div> 
        </div> 
      </div> 

      <div class="container-fluid mb-4">
        <div class="row">
          <div class="col-12 d-flex justify-content-end">
            <a href="{{route('add_admin')}}"><button class="btn btn-primary">Add New Admin</button></a>
          </div>
        </div>
      </div>
      
      <div class="container-fluid mb-4">
        <table id="example" class="table table-striped" style="width:100%">

          <thead>
              <tr>
                  <th style="color: blue"><b>Name</b></th>
                  <th style="color: blue"><b>Email</b></th>
                  <th style="color: blue"><b>User Type</b></th>
                  <th style="color: blue"><b>Actions</b></th>
              </tr>
          </thead>   

          <tbody>
            @foreach ($users as $user)
                <tr>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->admin_type}}</td>
                  <td><button class="btn btn-danger mr-1" data-toggle="modal" data-target="#verticalModal">Delete</button><button class="btn btn-success">Edit</button></td>
                </tr>
            @endforeach
          </tbody>

          <tfoot>
            <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>User Type</th>
                  <th>Actions</th>
            </tr>
          </tfoot>

        </table>
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

      
      <!-- Modal delete pop up -->
      <div class="modal fade" id="verticalModal" tabindex="-1" role="dialog" aria-labelledby="verticalModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="verticalModalTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"> Are you sure you want to delete this user ?</div>
                <div class="modal-footer">
                    <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">No</button>
                    <button type="button" class="btn mb-2 btn-danger">Yes</button>
                </div>
            </div>
        </div>
      </div>
      <!-- end model -->
  
@endsection

@push('js')

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
        new DataTable('#example');
        });
    </script>

@endpush