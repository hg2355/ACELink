@extends('layout.activity')
@section('content')
<?php 
    $format = '%s%s';

    $page = sprintf($format,public_path(),$activity->activity_url);

    include($page);
?>
@stop
