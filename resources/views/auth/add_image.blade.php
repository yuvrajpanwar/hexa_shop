@extends('admin_layout/admin_app')

@push('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="page-title">Add images for {{ $product->name }} </h1>
            </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div>

    <div class="container-fluid mb-4">
        <div class="row">
            <div class="col-12 d-flex justify-content-end">
                <a href="{{ route('images', ['product' => $product->id]) }}"><button class="btn btn-primary">Product Images</button></a>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">

                <div class="row mb-4">

                    <div class="col-md-12">
                        <div class="card shadow mb-4">
                            <div class="card-header">
                                <strong>Upload Images</strong>
                            </div>
                            <div class="card-body">
                                <div id="drag-drop-area"></div>
                            </div> <!-- .card-body -->
                        </div> <!-- .card -->
                    </div><!-- .col -->

                </div> <!-- .row -->

            </div>
        </div> <!-- .row -->
    </div>

@endsection

@push('js')
    <script src="{{ asset('js/uppy.min.js') }}"></script>
    <script>
        var uptarg = document.getElementById('drag-drop-area');
        var url = '{{ route('upload_images',['product'=>$product->id] ) }}';
        var csrfToken = document.querySelector('meta[name="csrf-token"]').content;

        if (uptarg) {
            var uppy = Uppy.Core().use(Uppy.Dashboard, {
                inline: true,
                target: uptarg,
                proudlyDisplayPoweredByUppy: false,
                theme: 'light',
                width: 1200,
                height: 310, 
                plugins: ['Webcam']
            }).use(Uppy.XHRUpload, {
                endpoint: url,
                fieldName: 'file',
                withCredentials: true,
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
            });

            uppy.on('complete', (result) => {
                console.log('Upload complete! We’ve uploaded these files:', result.successful);
            });
        }
    </script>
@endpush
