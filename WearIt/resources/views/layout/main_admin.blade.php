<!doctype html>
<html lang="sk">

<head>
    @include('layout.partials.head')
    @yield('custom')
</head>

<body>
@include('layout.partials.header_admin')

<main >
    @yield('content')
</main>

@include('layout.partials.footer_admin')

<!-- Bootstrap core JavaScript -->
@include('layout.partials.scripts')
@yield('customJs')
@stack('scripts')
</body>
</html>
