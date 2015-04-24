<!DOCTYPE html>

<html lang="en">

<head>
    @include('base.head')
    @include('head.rate')
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom" style="background-color: orange;">
<div id="main" class="container col-lg-8 col-lg-offset-2 col-sm-12">
@yield('content')
@include('js.rate')
 <div class="col-lg-2 col-lg-offset-5">
        <br><br><hr>
      </div>

  </div>
</body>

</html>
