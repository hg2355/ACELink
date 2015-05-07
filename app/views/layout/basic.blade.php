<!DOCTYPE html>

<html lang="en">

<head>
@include('base.head')
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
@include('base.nav')
<div id="main" class="container">
@yield('content')
</div>
@include('js.welcome')
@include('base.footer')
</body>
</html>
