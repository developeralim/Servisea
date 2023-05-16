<!DOCTYPE html>
<html lang="en">

@extends('user.user_master')

@section('user_page')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

@stop
@section('user_style')

</head>
@stop

@section('user-main-content')
<div class="container">

<h2>Servisea</h2>
<ul class="breadcrumb">
  <li>Share Brief Description > </li><li><b>Timeline and Budget</b></li>
</ul>

<form id="jobFormCrud" action="{{route('viewRequestJobPageB')}}" method="POST">
@csrf

  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>
<a href="{{route('viewRequestJobPage')}}">lolo</a>

@stop

@section('user_script')
    <!-- JS -->
    <script src="{{asset('backend/USER_ASSET/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('backend/USER_ASSET/js/main.js')}}"></script>
@stop

