@extends('layout.home')
@section('content')
@include('pages.home.'.$user_type)
@stop
