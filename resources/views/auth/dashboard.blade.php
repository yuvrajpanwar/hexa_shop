@extends('admin_layout/admin_app')

@section('content')



    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row">

                    @can('View Sales')
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow  text-white border-0">
                                <a href="{{ route('sales') }}">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-3 text-center">
                                                <span class="circle circle-sm bg-primary-light">
                                                    <i class="fe fe-16 fe-activity text-white mb-0"></i>
                                                </span>
                                            </div>
                                            <div class="col pr-0">
                                                <p class="h3 mb-0 ">Sale</p>
                                                <p class="h5 mb-0">$1250</p>

                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endcan


                    @can('View Order')
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-0">
                                <a href="{{ route('orders') }}">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-3 text-center">
                                                <span class="circle circle-sm bg-primary">
                                                    <i class="fe fe-16 fe-shopping-cart text-white mb-0"></i>
                                                </span>
                                            </div>
                                            <div class="col pr-0">
                                                <p class="h3 mb-0 ">Orders</p>
                                                <p class="h5 mb-0">Total: 560</p>

                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endcan

                    @can('View Customer')
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-0">
                                <a href="{{ route('customers') }}">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-3 text-center">
                                                <span class="circle circle-sm bg-primary">
                                                    <i class="fe fe-16 fe-users text-white mb-0"></i>
                                                </span>
                                            </div>
                                            <div class="col">
                                                <p class="h3 mb-0 ">Customers</p>
                                                <p class="h5 mb-0">Total: 25</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endcan

                    @can('View Category')
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-0">
                                <a href="{{ route('categories') }}">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-3 text-center">
                                                <span class="circle circle-sm bg-primary">
                                                    <i class="fe fe-16 fe-box text-white mb-0"></i>
                                                </span>
                                            </div>
                                            <div class="col">
                                                <p class="h3 mb-0">Categories</p>
                                                <p class="h5 mb-0">Total: 58</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endcan

                    @can('View Product')
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-0">
                                <a href="{{ route('product_list') }}">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-3 text-center">
                                                <span class="circle circle-sm bg-primary">
                                                    <i class="fe fe-16 fe-box text-white mb-0"></i>
                                                </span>
                                            </div>
                                            <div class="col">
                                                <p class="h3 mb-0">Products</p>
                                                <p class="h5 mb-0">Total: 58</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endcan


                    {{-- @can('is_super_admin') --}}
                    @can('View Users')
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-0">
                                <a href="{{ route('admin_list') }}">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-3 text-center">
                                                <span class="circle circle-sm bg-primary">
                                                    <i class="fe fe-16 fe-users text-white mb-0"></i>
                                                </span>
                                            </div>
                                            <div class="col">
                                                <p class="h3 mb-0 ">Users</p>
                                                <p class="h5 mb-0">Total: 8 </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endcan


                    {{-- @can('is_super_admin') --}}
                    @can('View Role')
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-0">
                                <a href="{{ route('assign_permissions') }}">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-3 text-center">
                                                <span class="circle circle-sm bg-primary">
                                                    <i
                                                        class="fe fe-16 fe-tool
                                                    text-white mb-0"></i>
                                                </span>
                                            </div>
                                            <div class="col">
                                                <p class="h3 mb-0 ">Permissions</p>
                                                <p class="h5 mb-0">Role & Permissions</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endcan

                    


                </div>
                <!-- end section -->



            </div>
        </div> <!-- .row -->
    </div>
@endsection
