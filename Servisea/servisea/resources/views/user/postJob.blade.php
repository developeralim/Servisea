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
<h2>Servisea</h2>
<ul class="breadcrumb">
  <li>Share brief Description </li><li> Timeline and Budget</li>
</ul>

<form>
@csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="project" class="form-label">Project Title</label>
    <input type="text" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="project" class="form-label">Project Description</label>
    <input type="text" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="project" class="form-label">Attach file</label>
    <input type="text" class="form-control" id="exampleInputPassword1">
  </div>
  div class="mb-3">
    <label for="project" class="form-label">a</label>
    <input type="text" class="form-control" id="exampleInputPassword1">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@stop

@section('user_script')
    <!-- JS -->
    <script src="{{asset('backend/USER_ASSET/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('backend/USER_ASSET/js/main.js')}}"></script>
@stop

