<html>
    <head>

        <title>@yield('title', 'Hexa Shop')</title>

        @include('layout.common_css')
        
    </head>

    <body>

        @include('layout.header')

        @yield('content')

        @include('layout.footer')

        @include('layout.common_js')

        @stack('js')

    </body>
</html>