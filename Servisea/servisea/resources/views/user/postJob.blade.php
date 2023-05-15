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
  <li> <b>Share Brief Description </b> > </li><li> Timeline and Budget</li>
</ul>

<form id="categoryFormCrud" action="{{route('JobPageA')}}" method="post">
@csrf
  <div class="mb-3">
    <label for="project" class="form-label">Project Title</label>
    <input type="text" class="form-control" id="JR_TITLE" name="JR_TITLE">
  </div>
  <div class="mb-3">
    <label for="project" class="form-label">Project Description</label>
    <textarea class="form-control" id="JR_DESCRIPTION"  name="JR_DESCRIPTION" rows="3"></textarea>
  </div>
  <div class="mb-3">
    <label for="project" class="form-label">Attach file</label>
    <input type="file" class="form-control" id="JR_ATTACHMENT" name="JR_ATTACHMENT">
  </div>
 <div class="mb-3">
    <label for="project" class="form-label">Category</label>
    <select class="form-control" id="CATEGORY_ID" name='CATEGORY_ID' aria-label="Default select example">
        <option selected>Select Category</option>
        @foreach (Session('categoryList') as $category)
        <option value="{{$category->CATEGORY_ID}}" >{{$category->CATEGORY_NAME}}</option>
        @endforeach
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<a href="{{route('viewRequestJobPageB')}}">lolo</a>

</div>

@stop

@section('user_script')
    <!-- JS -->
    <script src="{{asset('backend/USER_ASSET/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('backend/USER_ASSET/js/main.js')}}"></script>
@stop

