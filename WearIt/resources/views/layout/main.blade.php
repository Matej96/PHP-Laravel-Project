<!doctype html>
<html lang="sk">

    <head>
        @include('layout.partials.head')
        @yield('custom')
    </head>

    <body>
        @include('layout.partials.header')

        <main >
            @yield('content')
        </main>

        @include('layout.partials.footer')

        <!-- Bootstrap core JavaScript -->
        @include('layout.partials.scripts')
        @yield('customJs')
    </body>
</html>
