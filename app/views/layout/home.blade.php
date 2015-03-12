<!DOCTYPE html>

<html lang="en">

<head>
    @include('base.head')
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
    @include('nav.home')
    @yield('content')
    @include('base.footer')
    @include('js.home')
</body>

</html>
