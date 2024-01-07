<nav class="topnav navbar navbar-light">





    <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
        <i class="fe fe-menu navbar-toggler-icon"></i>
    </button>




    <ul class="nav">

        <li class="nav-item d-flex align-items-center text-center">

            @foreach (Auth::user()->roles as $role)
                {{ $role->name }} {{ Auth::user()->name }}
            @endforeach

        </li>


        <li class="nav-item">
            <a class="nav-link text-muted my-2" href="#" id="modeSwitcher" data-mode="light">
                <i class="fe fe-sun fe-16"></i>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink"
                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="circle circle-sm bg-primary">
                    <i class="fe fe-16 fe-user text-white mb-0"></i>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="#">Profile</a>
                <a class="dropdown-item" href="#">Settings</a>
                <a class="dropdown-item" href="#">Activities</a>
                <a class="dropdown-item" href=""
                    onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>
<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
    <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
        <i class="fe fe-x"><span class="sr-only"></span></i>
    </a>
    <nav class="vertnav navbar navbar-light">
        <!-- nav bar -->
        <div class="w-100 mb-4 d-flex">
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./dashboard">
                <svg version="1.1" id="logo" class="navbar-brand-img brand-sm" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120"
                    xml:space="preserve">
                    <g>
                        <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                        <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                        <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
                    </g>
                </svg>
            </a>
        </div>
        <ul class="navbar-nav flex-fill w-100 mb-2">

            <li class="nav-item ">
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <i class="fe fe-home fe-16"></i>
                    <span class="ml-3 item-text h5">Dashboard</span>
                </a>
            </li>

            <li>
                <hr>
            </li>

            @can('View Sales')
                <li class="nav-item ">
                    <a href="{{ route('sales') }}" class="nav-link">
                        <i class="fe fe-activity fe-16"></i>
                        <span class="ml-3 item-text h5">Sales</span>
                    </a>
                </li>
            @endcan

            @can('View Order')
                <li class="nav-item ">
                    <a href="{{ route('orders') }}" class="nav-link">
                        <i class="fe fe-shopping-cart fe-16"></i>
                        <span class="ml-3 item-text h5">Orders</span>
                    </a>
                </li>
            @endcan

            @can('View Customer')
                <li class="nav-item ">
                    <a href="{{ route('customers') }}" class="nav-link">
                        <i class="fe fe-users fe-16"></i>
                        <span class="ml-3 item-text h5">Customers</span>
                    </a>
                </li>
            @endcan

            @can('View Category')
                <li class="nav-item ">
                    <a href="{{ route('categories') }}" class="nav-link">
                        <i class="fe fe-folder fe-16"></i>
                        <span class="ml-3 item-text h5">Categories</span>
                    </a>
                </li>
            @endcan

            @can('View Product')
                <li class="nav-item ">
                    <a href="{{ route('product_list') }}" class="nav-link">
                        <i class="fe fe-box fe-16"></i>
                        <span class="ml-3 item-text h5">Products</span>
                    </a>
                </li>
            @endcan

            <li class="nav-item ">
                <a href="{{ route('backgrounds') }}" class="nav-link">
                    <i class="fe fe-layout fe-16"></i>
                    <span class="ml-3 item-text h5">Backgrounds</span>
                </a>
            </li>

            {{-- @can('is_super_admin') --}}
            @can('View Users')
                <li class="nav-item ">
                    <a href="{{ route('admin_list') }}" class="nav-link">
                        <i class="fe fe-users fe-16"></i>
                        <span class="ml-3 item-text h5">Users</span>
                    </a>
                </li>
            @endcan

            {{-- @can('is_super_admin') --}}
            @can('View Role')
                <li class="nav-item dropdown">
                    <a href="#roleandpermission" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle nav-link">
                        <i class="fe fe-tool fe-16"></i>
                        <span class="ml-3 item-text h5">Role & Permission</span>
                    </a>
                    <ul class="collapse list-unstyled pl-4 w-100" id="roleandpermission">
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="{{ route('roles') }}"><span
                                    class="ml-1 item-text h5">&bull;Roles</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="{{ route('permissions') }}"><span
                                    class="ml-1 item-text h5">&bull;Permissions
                                </span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="{{ route('assign_permissions') }}"><span
                                    class="ml-1 item-text h5">&bull;Assign Permission
                                </span></a>
                        </li>
                    </ul>
                </li>
            @endcan

            {{-- dropdown refrence --}}
            @can('View Report')
                <li class="nav-item dropdown">
                    <a href="#layouts" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                        <i class="fe fe-layout fe-16"></i>
                        <span class="ml-3 item-text h5">Reports</span>
                    </a>
                    <ul class="collapse list-unstyled pl-4 w-100" id="layouts">
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="./index.html"><span class="ml-1 item-text">Daily
                                    Report</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="./index-horizontal.html"><span class="ml-1 item-text">Monthly
                                    Report</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="./index-boxed.html"><span class="ml-1 item-text">Yearly
                                    Report</span></a>
                        </li>
                    </ul>
                </li>
            @endcan


        </ul>

    </nav>
</aside>
