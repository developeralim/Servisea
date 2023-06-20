<!DOCTYPE html>
<html lang="en">

@extends('user.user_master')

@section('user_page')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>
</head>
@stop
@section('user_style')


@stop

@section('user-main-content')
<div class="container">
<div class="body_content">
    <section class="categories_list_section overflow-hidden">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="listings_category_nav_list_menu">
              <ul class="mb0 d-flex ps-0">
                <li><a href="#">All Categories</a></li>
                <li><a href="#">Graphics & Design</a></li>
                <li><a class="active" href="#">Digital Marketing</a></li>
                <li><a href="#">Writing & Translation</a></li>
                <li><a href="#">Video & Animation</a></li>
                <li><a href="#">Music & Audio</a></li>
                <li><a href="#">Programming & Tech</a></li>
                <li><a href="#">Business</a></li>
                <li><a href="#">Lifestyle</a></li>
                <li><a href="#">Trending</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Breadcumb Sections -->
    <section class="breadcumb-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="breadcumb-style1">
              <div class="breadcumb-list">
                <a href="">Home</a>
                <a href="">Services</a>
                <a href="">Design & Creative</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Listings All Lists -->
    <section class="pt40 pb90">
      <div class="container">
        <div class="row align-items-center mb20">
          <div class="col-sm-6 col-lg-9">
            <div class="text-center text-sm-start">
              <div class="dropdown-lists">
                <ul class="p-0 mb-0 text-center text-sm-start">
                  <li class="d-block d-xl-none mb-2">
                    <!-- Advance Features modal trigger -->
                    <button type="button" class="open-btn filter-btn-left"> <img class="me-2" src="images/icon/all-filter-icon.svg" alt=""> All Filter</button>
                  </li>
                  <li class="list-inline-item position-relative d-none d-xl-inline-block">
                    <button class="open-btn mb10 dropdown-toggle" type="button" data-bs-toggle="dropdown">Category <i class="fa fa-angle-down ms-2"></i></button>
                    <div class="dropdown-menu dd4 pb20">
                      <div class="widget-wrapper pr20">
                        <div class="checkbox-style1">
                          <label class="custom_checkbox">Designer
                            <input type="checkbox">
                            <span class="checkmark"></span>
                          </label>
                          <label class="custom_checkbox">Web Developers
                            <input type="checkbox" checked="checked">
                            <span class="checkmark"></span>
                          </label>
                          <label class="custom_checkbox">Illustrators
                            <input type="checkbox">
                            <span class="checkmark"></span>
                          </label>
                          <label class="custom_checkbox">Node.js
                            <input type="checkbox">
                            <span class="checkmark"></span>
                          </label>
                          <label class="custom_checkbox">Project Managers
                            <input type="checkbox">
                            <span class="checkmark"></span>
                          </label>
                        </div>
                      </div>
                      <button class="done-btn ud-btn btn-thm drop_btn4">Apply<i class="fal fa-arrow-right-long"></i></button>
                    </div>
                  </li>
                  <li class="list-inline-item position-relative d-none d-xl-inline-block">
                    <button class="open-btn mb10 dropdown-toggle" type="button" data-bs-toggle="dropdown">Salary <i class="fa fa-angle-down ms-2"></i></button>
                    <div class="dropdown-menu dd3">
                      <div class="widget-wrapper pb25 mb0 pr20">
                        <!-- Range Slider Desktop Version -->
                        <div class="range-slider-style1">
                          <div class="range-wrapper">
                            <div class="slider-range mb20"></div>
                            <div class="text-center">
                              <input type="text" class="amount" placeholder="$20"><span class="fa-sharp fa-solid fa-minus mx-1 dark-color"></span>
                              <input type="text" class="amount2" placeholder="$70987">
                            </div>
                          </div>
                        </div>
                      </div>
                      <button class="done-btn ud-btn btn-thm drop_btn3">Apply<i class="fal fa-arrow-right-long"></i></button>
                    </div>
                  </li>
                  <li class="list-inline-item position-relative d-none d-xl-inline-block">
                    <button class="open-btn mb10 dropdown-toggle" type="button" data-bs-toggle="dropdown">Job Type <i class="fa fa-angle-down ms-2"></i></button>
                    <div class="dropdown-menu dd4 pb20">
                      <div class="widget-wrapper pr20">
                        <div class="switch-style1">
                          <div class="form-check form-switch mb20">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault1">
                            <label class="form-check-label" for="flexSwitchCheckDefault1">Freelance</label>
                          </div>
                        </div>
                        <div class="switch-style1">
                          <div class="form-check form-switch mb20">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault2" checked="checked">
                            <label class="form-check-label" for="flexSwitchCheckDefault2">Full Time</label>
                          </div>
                        </div>
                        <div class="switch-style1">
                          <div class="form-check form-switch mb20">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault3">
                            <label class="form-check-label" for="flexSwitchCheckDefault3">Part Time</label>
                          </div>
                        </div>
                        <div class="switch-style1">
                          <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault4">
                            <label class="form-check-label" for="flexSwitchCheckDefault4">Internship</label>
                          </div>
                        </div>
                      </div>
                      <button class="done-btn ud-btn btn-thm drop_btn4">Apply<i class="fal fa-arrow-right-long"></i></button>
                    </div>
                  </li>
                  <li class="list-inline-item position-relative d-none d-xl-inline-block">
                    <button class="open-btn mb10 dropdown-toggle" type="button" data-bs-toggle="dropdown">Level <i class="fa fa-angle-down ms-2"></i></button>
                    <div class="dropdown-menu">
                      <div class="widget-wrapper pb25 mb0">
                        <div class="checkbox-style1">
                          <label class="custom_checkbox">All
                            <input type="checkbox">
                            <span class="checkmark"></span>
                          </label>
                          <label class="custom_checkbox">Internship
                            <input type="checkbox" checked="checked">
                            <span class="checkmark"></span>
                          </label>
                          <label class="custom_checkbox">Entery Level
                            <input type="checkbox">
                            <span class="checkmark"></span>
                          </label>
                          <label class="custom_checkbox">Mid-Senior
                            <input type="checkbox">
                            <span class="checkmark"></span>
                          </label>
                        </div>
                      </div>
                      <button class="done-btn ud-btn btn-thm dropdown-toggle">Apply<i class="fal fa-arrow-right-long"></i></button>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="page_control_shorting mb10 d-flex align-items-center justify-content-center justify-content-sm-end">
              <div class="pcs_dropdown dark-color pr10"><span>Sort by</span>
                <select class="selectpicker show-tick">
                  <option>Best Seller</option>
                  <option>Recommended</option>
                  <option>New Arrivals</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
        @if(isset($jobList))
        @foreach($jobList as $job)
          <div class="col-sm-6 col-lg-4 col-xl-3">
            <div class="job-list-style1 bdr1">
              <div class="icon d-flex align-items-center mb20">
                <img class="wa" src="{{$job->JR_ATTACHMENT}}" alt="">
                @foreach($category as $cat)
                @if($job->CATEGORY_ID == $cat->CATEGORY_ID)
                <h6 class="mb-0 text-thm ml20">{{$cat->CATEGORY_NAME}}</h6>
                @endif
                @endforeach
                <span class="fav-icon flaticon-star"></span>
              </div>
              <div class="details">
                <h5 class="mb20"><a href="{{route('viewJob',$job->JR_ID)}}">{{$job->JR_TITLE}}</a></h5>
                <p class="list-inline-item mb-3">${{$job->JR_REMUNERATION}}</p>
                <p class="list-inline-item mb-3 bdrl1 pl15">Delivery Date: {{$job->JR_DELIVERYDATE}}</p>
              </div>
            </div>
          </div>
         @endforeach
        @else

        @endif
        </div>
        <div class="row">
          <div class="mbp_pagination mt30 text-center">
            <ul class="page_navigation">
              <li class="page-item">
                <a class="page-link" href="#"> <span class="fas fa-angle-left"></span></a>
              </li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item active" aria-current="page">
                <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
              </li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">4</a></li>
              <li class="page-item d-inline-block d-sm-none"><a class="page-link" href="#">...</a></li>
              <li class="page-item"><a class="page-link" href="#">5</a></li>
              <li class="page-item d-none d-sm-inline-block"><a class="page-link" href="#">...</a></li>
              <li class="page-item d-none d-sm-inline-block"><a class="page-link" href="#">20</a></li>
              <li class="page-item">
                <a class="page-link" href="#"><span class="fas fa-angle-right"></span></a>
              </li>
            </ul>
            <p class="mt10 mb-0 pagination_page_count text-center">1 – 20 of 300+ property available</p>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>

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

