<!DOCTYPE html>
<html lang="hu">
    <head>

        @include('partials._head')

    </head>

    <body id="home">

        @include('partials._nav')

        @include('partials._messages')

        @yield('content')

        @include('partials._footer')

        @include('partials._scripts')

        @yield('scripts')

    </body>
</html>