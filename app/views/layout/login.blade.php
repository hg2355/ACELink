<!DOCTYPE html>

<html lang="en">

<head>
    @include('base.head')
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
<div id="main" class="container">
@include('base.nav')
@yield('content')
@include('js.login')
</div>
</body>

</html>
