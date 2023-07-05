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

<div class="dashboard__main pl0-md" style="padding-left: 0px;">
        <div class="dashboard__content hover-bgc-color">
          <div class="row pb40">
            <div class="col-lg-9">
              <div class="dashboard_title_area">
                <h2>Create Your Job Request</h2>
              </div>
            </div>

          </div>
          <div class="row">
            <div class="col-xl-12">
              <div class="ps-widget bgc-white bdrs4 p30 mb30 overflow-hidden position-relative">
                <div class="bdrb1 pb15 mb25">
                  <h5 class="list-title">Basic Information</h5>
                </div>
                <div class="col-xl-8">
                  <form class="form-style1" action="{{route('JobPageA')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                   <!-- @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach -->

                      <div class="col-sm-12">
                        <div class="mb20">
                          <label class="heading-color ff-heading fw500 mb10">Project Title</label>
                          <input type="text" class="form-control" placeholder="i want" id="Project_Title" name="Project_Title">
                            @if ($errors->any())
                                @error('Project_Title')
                                        <div class="error" style="color:#FF0000">{{ $message }}</div>
                                @enderror
                            @endif
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="mb20">
                          <div class="form-style1">
                            <label class="heading-color ff-heading fw500 mb10">Category</label>
                            <div class="bootselect-multiselect">
                              <select class="selectpicker" id="CATEGORY_ID" name='Category'>
                                <option>Select</option>
                                @foreach (Session('categoryList') as $category)
                                <option value="{{$category->CATEGORY_ID}}" >{{$category->CATEGORY_NAME}}</option>
                                @endforeach
                              </select>
                              @if ($errors->any())
                                @error('Category')
                                        <div class="error" style="color:#FF0000">{{ $message }}</div>
                                    @enderror
                               @endif
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="mb20">
                          <label class="heading-color ff-heading fw500 mb10">I'm looking to spend</label>
                          <input class="form-control" value="10" min="10" id="JR_REMUNERATION" name="Remuneration" placeholder="$">
                          @if ($errors->any())
                                @error('Remuneration')
                                        <div class="error" style="color:#FF0000">{{ $message }}</div>
                                @enderror
                           @endif
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="mb20">
                          <div class="form-style1">
                            <label class="heading-color ff-heading fw500 mb10">Project Duration</label>
                            <input type="date" class="form-control" id="JR_DELIVERYDATE"  name="Delivery_Date"></input>
                            @if ($errors->any())
                                @error('Delivery_Date')
                                        <div class="error" style="color:#FF0000">{{ $message }}</div>
                                @enderror
                           @endif
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="mb20">
                          <div class="form-style1" >
                            <label class="heading-color ff-heading fw500 mb10">Upload Attachments</label>
                            <input type="file" style="height: 35px;" class="form-control" id="JR_ATTACHMENT" name="Attachment">
                            @if ($errors->any())
                                @error('Attachment')
                                        <div class="error" style="color:#FF0000">{{ $message }}</div>
                                @enderror
                            @endif
                            <p class="text">Maximum file size: 10 MB</p>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="mb10">
                          <label class="heading-color ff-heading fw500 mb10">Project Detail</label>
                          <textarea cols="30" rows="6"  id="JR_DESCRIPTION"  name="Description" placeholder="Description"></textarea>
                          @if ($errors->any())
                                @error('Description')
                                        <div class="error" style="color:#FF0000">{{ $message }}</div>
                                @enderror
                           @endif
                        </div>
                      </div>

                      <div class="col-lg-3">
                        <div class="text-lg-end">
                            <button type="submit"  class="ud-btn btn-dark" >Save & Publish<i class="fal fa-arrow-right-long"></i></button>
                       </div>
                       </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

<!-- <div class="container">

<h2>Servisea</h2>
<ul class="breadcrumb">
  <li> <b>Share Brief Description </b> > </li><li> Timeline and Budget</li>
</ul>

<form id="categoryFormCrud" action="{{route('JobPageA')}}" method="post">
@csrf
 <div class="container">
    <div class="row">
        <div class="col">
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
                    <option readonly="readonly" selected>Select Category</option>
                    @foreach (Session('categoryList') as $category)
                    <option readonly="readonly" value="{{$category->CATEGORY_ID}}" >{{$category->CATEGORY_NAME}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col">
            <div class="mb-3">
                <label for="project" class="form-label">I'm looking to spend</label>
                <input type="number" class="form-control" value="10" min="10" id="JR_REMUNERATION" name="JR_REMUNERATION">
            </div>
            <div class="mb-3">
                <label for="project" class="form-label">Let's talk timing</label>
                <input type="date" class="form-control" id="JR_DELIVERYDATE"  name="JR_DELIVERYDATE"></input>
            </div>
        </div>
    </div>
  <button type="submit" class="btn btn-primary">Submit</button>
 </div>
</form>

</div> -->

@stop

@section('user_script')
<!-- <script type="text/javascript">
  window.onbeforeunload = confirmExit;
  function confirmExit()
  {
    return "your changes will be lost.  Are you sure you want to exit this page?";
  }
</script> -->
    <!-- JS -->
    <script src="{{asset('backend/USER_ASSET/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('backend/USER_ASSET/js/main.js')}}"></script>
@stop

