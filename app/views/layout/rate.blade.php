<!DOCTYPE html>

<html lang="en">

<head>
    @include('base.head')
    @include('head.rate')
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
<div id="main" class="container">
@yield('content')
@include('js.rate')
</div>
</body>

</html>
