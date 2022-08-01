<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>@yield('title')</title>

    {{-- style CSS --}}
    @stack('before-style')
    @include('includes.style')
    @stack('after-style')
</head>

<body>
    <!-- Page Content -->
    @yield('content')

    {{-- Footer --}}
    @include('includes.footer')

    {{-- Script JS --}}
    @stack('before-script')
    @include('includes.script')
    @stack('after-script')
</body>

</html>