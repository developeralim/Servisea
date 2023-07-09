<!DOCTYPE html>
<html lang="en">

@extends('user.user_master')

@section('user_page')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Servisea/{{Session::get('user.USERNAME')}}/Edit Gig</title>
@stop

@section('user_style')

@stop

@section('user-main-content')


<div class="dashboard_content_wrapper">
    <div class="dashboard dashboard_wrapper pr0-xl">
      <div class="dashboard__main pl0-md" style="margin-top: 0px;padding: 0px;">
        <div class="dashboard__content hover-bgc-color">
        <form method="POST" action="{{ route('postMultiPackagePage')}}" enctype="multipart/form-data" class="package-form" id="package-form" >
            @csrf
          <div class="row pb40">
            <div class="col-lg-9">
              <div class="dashboard_title_area">
                <h2>Add Your Gig</h2>
                <p class="text">Add your Services</p>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="text-lg-end">
                <button type="submit" class="ud-btn btn-dark">Save & Publish<i class="fal fa-arrow-right-long"></i></button>
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
                  <form class="form-style1">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="mb20">
                          <label class="heading-color ff-heading fw500 mb10">Gig Title</label>
                          <input type="text" class="form-control" name="Gig_Title" placeholder="i will">
                            @if ($errors->any())
                                @error('Gig_Title')
                                    <div class="error" style="color:#FF0000">{{ $message }}</div>
                                @enderror
                            @endif
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="mb10">
                          <label class="heading-color ff-headingfw500 mb10">Gig Description</label>
                          <textarea cols="30" rows="6" name="Gig_Description" placeholder="Description"></textarea>
                          @if ($errors->any())
                                @error('Gig_Description')
                                    <div class="error" style="color:#FF0000">{{ $message }}</div>
                                @enderror
                            @endif
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="mb10">
                          <label class="heading-color ff-heading fw500 mb10">Gig Requirements</label>
                          <textarea cols="30" rows="6" name="Gig_Requirements" placeholder="Information needed for requirements of gig"></textarea>
                          @if ($errors->any())
                                @error('Gig_Requirements')
                                    <div class="error" style="color:#FF0000">{{ $message }}</div>
                                @enderror
                            @endif
                        </div>
                      </div>

                      <div class="col-sm-12">
                        <div class="mb20">
                          <div class="form-style1">
                            <label class="heading-color ff-heading fw500 mb10">Category</label>
                            <select class="selectpicker" class="bootselect-multiselect" id="CATEGORY_ID" name='Category' aria-label="Default select example">
                                <option readonly="readonly" value="0" selected>Select Category</option>
                                @foreach (Session('categoryList') as $category)
                                <option  value="{{$category->CATEGORY_ID}}" >{{$category->CATEGORY_NAME}}</option>
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
                  </form>
                </div>
              </div>

              <div class="ps-widget bgc-white bdrs12 p30 mb30 overflow-hidden position-relative">
                <div class="bdrb1 pb15 mb30">
                  <h5 class="list-title">Packages</h5>
                </div>
                <div class="col-xl-8">
                  <div class="table-style2 table-responsive bdr1 mb30">
                    <table class="table table-borderless mb-0">
                      <thead class="t-head">
                        <tr>
                          <th class="col" scope="col"></th>
                          <th class="col" scope="col">
                            <span class="h4 mb15">Basic</span> <br>
                          </th>

                          <th class="col c" scope="col">
                            <span class="h4 mb15">Standard</span> <br>
                          </th>
                          <th class="col c" scope="col">
                            <span class="h4 mb15">Premium</span> <br>
                          </th>

                        </tr>
                      </thead>
                      <tbody class="t-body">
                        <tr class="bgc-thm3">
                          <th scope="row">Source file</th>
                          <td>
                            <label class="custom_checkbox">
                              <input type="checkbox" checked disabled>
                              <span class="checkmark"></span>
                            </label>
                          </td>

                          <td class="c">
                            <label class="custom_checkbox">
                              <input type="checkbox" checked disabled>
                              <span class="checkmark"></span>
                            </label>
                          </td>
                          <td class="c">
                            <label class="custom_checkbox">
                              <input type="checkbox" checked disabled>
                              <span class="checkmark"></span>
                            </label>
                          </td>
                        </tr>

                        <tr>
                          <th scope="row">Package Title</th>
                          <td>
                            <input type="text" class="form-control" name='Basic_Title' placeholder="Title">
                            @if ($errors->any())
                                @error('Basic_Title')
                                    <div class="error" style="color:#FF0000">{{ $message }}</div>
                                @enderror
                            @endif
                          </td>

                          <td class="c">
                            <input type="text" class="form-control" name='Standard_Title' placeholder="Title">
                            @if ($errors->any())
                                @error('Standard_Title')
                                    <div class="error" style="color:#FF0000">{{ $message }}</div>
                                @enderror
                            @endif
                          </td>

                          <td class="c">
                            <input type="text" class="form-control" name='Premium_Title' placeholder="Title">
                            @if ($errors->any())
                                @error('Premium_Title')
                                    <div class="error" style="color:#FF0000">{{ $message }}</div>
                                @enderror
                            @endif
                          </td>
                        </tr>

                        <tr class="bgc-thm3">
                          <th scope="row">Package Description</th>
                          <td>
                            <textarea cols="30" rows="6" class="form-control" name='Basic_Description' placeholder="Description"></textarea>
                            @if ($errors->any())
                                @error('Basic_Description')
                                    <div class="error" style="color:#FF0000">{{ $message }}</div>
                                @enderror
                            @endif
                        </td>
                          <td class="c">
                            <textarea cols="30" rows="6" class="form-control" name='Standard_Description' placeholder="Description"></textarea>
                            @if ($errors->any())
                                @error('Standard_Description')
                                    <div class="error" style="color:#FF0000">{{ $message }}</div>
                                @enderror
                            @endif
                        </td>
                          <td class="c">
                            <textarea cols="30" rows="6" class="form-control" name='Premium_Description' placeholder="Description"></textarea>
                            @if ($errors->any())
                                @error('Premium_Description')
                                    <div class="error" style="color:#FF0000">{{ $message }}</div>
                                @enderror
                            @endif
                        </td>
                        </tr>

                        <tr>
                          <th scope="row">Delivery Days</th>
                          <td>
                            <input type="text" class="form-control" name='Basic_Delivery_Days' placeholder="Delivery Days">
                            @if ($errors->any())
                                @error('Basic_Delivery_Days')
                                    <div class="error" style="color:#FF0000">{{ $message }}</div>
                                @enderror
                            @endif
                        </td>
                          <td class="c">
                            <input type="text" class="form-control" name='Standard_Delivery_Days' placeholder="Delivery Days">
                            @if ($errors->any())
                                @error('Standard_Delivery_Days')
                                    <div class="error" style="color:#FF0000">{{ $message }}</div>
                                @enderror
                            @endif
                        </td>
                          <td class="c">
                            <input type="text" class="form-control" name='Premium_Delivery_Days' placeholder="Delivery Days">
                            @if ($errors->any())
                                @error('Premium_Delivery_Days')
                                    <div class="error" style="color:#FF0000">{{ $message }}</div>
                                @enderror
                            @endif
                        </td>
                        </tr>

                        <tr class="bgc-thm3">
                          <th scope="row">Price $</th>
                          <td>
                            <input type="text" class="form-control" name='Basic_Price' placeholder="Price">
                            @if ($errors->any())
                                @error('Basic_Price')
                                    <div class="error" style="color:#FF0000">{{ $message }}</div>
                                @enderror
                            @endif
                          </td>
                          <td class="c">
                            <input type="text" class="form-control" name='Standard_Price' placeholder="Price">
                            @if ($errors->any())
                                @error('Standard_Price')
                                    <div class="error" style="color:#FF0000">{{ $message }}</div>
                                @enderror
                            @endif
                          </td>
                          <td class="c">
                            <input type="text" class="form-control" name='Premium_Price' placeholder="Price">
                            @if ($errors->any())
                                @error('Premium_Price')
                                    <div class="error" style="color:#FF0000">{{ $message }}</div>
                                @enderror
                            @endif
                          </td>
                        </tr>

                        <tr>
                          <th scope="row">Revision</th>
                          <td>
                           <select class="selectpicker" class="bootselect-multiselect" name='Basic_Revision' aria-label="Default select example">
                                <option  value="2" >2</option>
                                <option  value="10" >10</option>
                                <option  value="UNLIMITED" >Unlimited</option>
                            </select>
                          </td>
                          <td class="c">
                          <select class="selectpicker" class="bootselect-multiselect" name='Standard_Revision' aria-label="Default select example">
                                <option  value="2" >2</option>
                                <option  value="10" >10</option>
                                <option  value="UNLIMITED" >Unlimited</option>
                            </select>
                          </td>
                          <td class="c">
                          <select class="selectpicker" class="bootselect-multiselect" name='Premium_Revision' aria-label="Default select example">
                                <option  value="2" >2</option>
                                <option  value="10" >10</option>
                                <option  value="UNLIMITED" >Unlimited</option>
                            </select>
                          </td>
                        </tr>

                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="col-xl-4">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" onclick="myFunction()" id="myCheck" checked>
                        <label class="form-check-label" for="flexSwitchCheckDefault">Switch to offer multiple packages</label>
                    </div>
                </div>
              </div>
              <div class="ps-widget bgc-white bdrs12 p30 mb30 overflow-hidden position-relative">
                <div class="bdrb1 pb15 mb30">
                  <h5 class="list-title">Gallery (Optional)</h5>
                </div>
                <div class="col-xl-9">
                  <div class="d-flex mb30">
                    <div class="gallery-item bdrs4 overflow-hidden">
                       <input type="file" name="Attachment[]" id="my_file" multiple/>
                    </div>
                  </div>
                  <p class="text">Max file size is 1MB, Minimum dimension: 330x300 And Suitable files are .jpg & .png</p>
                </div>
              </div>
            </div>
           </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@stop

@section('user_script')

<script>
        function myFunction() {
        // Get the checkbox
        var checkBox = document.getElementById("myCheck");
        // If the checkbox is checked, display the output text
        if (checkBox.checked == false){

          document.getElementById("package-form").action = "{{ route('postBasicPackagePage')}}";

          $(".c").hide();

        } else {

          document.getElementById("package-form").action = "{{ route('postMultiPackagePage')}}";
            $(".c").show();
        }
        }
</script>

    <!-- JS -->
    <script src="{{asset('backend/USER_ASSET/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('backend/USER_ASSET/js/main.js')}}"></script>
@stop

