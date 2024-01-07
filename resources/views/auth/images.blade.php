@extends('admin_layout/admin_app')

@push('css')
    <style>
        .img-container {
            overflow: hidden;
            border: 1px solid black;
            margin: 10px 10px;
        }

        .img-container img {
            width: 100%;
            height: auto;
            display: block;
            margin: 10px auto;
            object-fit: cover;
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="page-title">{{ $product->name }} Images</h1>
            </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div>

    <div class="container-fluid mb-4">
        <div class="row">
            <div class="col-12 d-flex justify-content-end">
                <a href="{{ route('add_image', ['product' => $product->id]) }}"><button class="btn btn-primary">Add New
                        Images</button></a>
            </div>
        </div>
    </div>

    {{-- functions to destroy a product  --}}
    <script>
        function showModel(id) {
            var deleteForm = document.getElementById("deleteForm");
            var deleteButton = document.getElementById("deleteButton");

            formDelete.action = id;
            deleteButton.onclick = function() {
                formDelete.submit();
            };
        }
    </script>

    <div class="container-fluid">
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
                    aria-controls="alert-success" class="btn-link close-button float-right">X</a>
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger show" id="alert-success">
                <a data-toggle="collapse" href="#alert-success" role="button" aria-expanded="true"
                    aria-controls="alert-success" class="btn-link close-button float-right">X</a>
                {{ session('error') }}
            </div>
        @endif
        <div class="row">

            @foreach ($images as $image)
                <div class="col-lg-2 col-md-4 col-sm-4 col-xs-6 img-container ">
                    <img src="{{ asset('storage/product_images') . '/' . $image->name }}" alt="Image 1">
                    <div class="row justify-content-center">
                        <td>
                            <a href="#" data-toggle="modal" data-target="#verticalModal"
                                onClick='showModel({!! $image->id !!})' style="color: red"> <span
                                    class="fe fe-24 fe-trash-2 "></span></a> |

                            @if ($image->is_enabled == 'yes')
                                <a href="#" class="change-status" data-image-id="{{ $image->id }}">

                                    <span class="fe fe-24 fe-eye" title="Hide"></span>

                                </a>
                            @else
                                <a href="#" class="change-status" data-image-id="{{ $image->id }}"><span
                                        class="fe fe-24 fe-eye-off" title="Show"></span></a>
                            @endif

                        </td>
                    </div>
                </div>
            @endforeach

            @if (count($images)==0)

            <div class="container">
                <p class="h5 text-center mt-4">No images available</p>
            </div>
                
            @endif

        </div>
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
                <div class="modal-body"> Are you sure you want to delete this Image ?</div>
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
    <script>
        $(document).ready(function() {
            $('.change-status').on('click', function() {
                var imageId = $(this).data('image-id');

                $.ajax({
                    url: "{{ route('change_image_status') }}",
                    type: "POST",
                    data: {
                        image_id: imageId,
                        _token: '{{ csrf_token() }}'
                    },
                    success: (response)=> {
                        // Update the icon based on the response
                        console.log(response.is_enabled);
                        if (response.is_enabled === 'yes') {
                            $(this).html('<span class="fe fe-24 fe-eye" title="Hide"></span>');
                        } else {
                            $(this).html('<span class="fe fe-24 fe-eye-off" title="Show"></span>');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }

                });
            });
        });
    </script>
@endpush
