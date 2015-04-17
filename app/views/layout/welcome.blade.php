<!DOCTYPE html>

<html lang="en">

<head>
    @include('base.head')
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
@include('base.nav')
@yield('content')
@include('js.welcome')
@include('base.footer')
</body>
</html>
