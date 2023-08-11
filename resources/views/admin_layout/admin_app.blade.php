<html lang="en">

    <head>

        <title>@yield('title', 'Admin Panel')</title>

        @include('admin_layout.common_css')

        @stack('css')
        
    </head>

    <body class="vertical  light  ">


        <div class="wrapper">

            @include('admin_layout.navbar')  
            
            <main class="main-content">
                @yield('content')
            </main>

        </div> 

        @include('admin_layout.common_js')

        @stack('js')

    </body>

</html>