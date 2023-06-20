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
      <div class="col-sm-8 col-lg-10">
        <div class="breadcumb-style1 mb10-xs">
          <div class="breadcumb-list">
            <a href="">Home</a>
            <a href="">Services</a>
            <a href="">Design & Creative</a>
          </div>
        </div>
      </div>
      <div class="col-sm-4 col-lg-2">
        <div class="d-flex align-items-center justify-content-sm-end">
          <div class="share-save-widget d-flex align-items-center">
            <span class="icon flaticon-share dark-color fz12 mr10"></span>
            <div class="h6 mb-0">Share</div>
          </div>
          <div class="share-save-widget d-flex align-items-center ml15">
            <span class="icon flaticon-like dark-color fz12 mr10"></span>
            <div class="h6 mb-0">Save</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Breadcumb Sections -->
<section class="breadcumb-section pt-0">
  <div class="cta-job-v1 freelancer-single-style mx-auto maxw1700 pt120 pt60-sm pb120 pb60-sm bdrs16 position-relative overflow-hidden d-flex align-items-center mx20-lg px30-lg">
    <img class="left-top-img wow zoomIn" src="images/vector-img/left-top.png" alt="">
    <img class="right-bottom-img wow zoomIn" src="images/vector-img/right-bottom.png" alt="">
    <div class="container">
      <div class="row wow fadeInUp">
        <div class="col-xl-8 mx-auto">
          <div class="position-relative">
            <div class="list-meta d-lg-flex align-items-end justify-content-between">
              <div class="wrapper d-sm-flex align-items-center mb20-md">
                <a class="position-relative freelancer-single-style" href="">
                  <img class="wa" src="images/team/job-single.png" alt="">
                </a>
                <div class="ml20 ml0-xs mt15-sm">
                  <h4 class="title">UX/UI Designer</h4>
                  <h6 class="mb-3 text-thm">Medium</h6>
                  <h6 class="list-inline-item mb-0">$125k-$135k Hourly</h6>
                  <h6 class="list-inline-item mb-0 bdrl-eunry pl15">1-5 Days</h6>
                  <h6 class="list-inline-item mb-0 bdrl-eunry pl15">Expensive</h6>
                  <h6 class="list-inline-item mb-0 bdrl-eunry pl15">Remote</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Service Details -->
<section class="pt10 pb90 pb30-md">
  <div class="container">
    <div class="row wow fadeInUp">
      <div class="col-lg-8 mx-auto">
        <div class="row">
          <div class="col-sm-6 col-xl-3">
            <div class="iconbox-style1 contact-style d-flex align-items-start mb30">
              <div class="icon flex-shrink-0"><span class="flaticon-calendar"></span></div>
              <div class="details">
                <h5 class="title">Date Posted</h5>
                <p class="mb-0 text">Posted 1 days ago</p>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-xl-3">
            <div class="iconbox-style1 contact-style d-flex align-items-start mb30">
              <div class="icon flex-shrink-0"><span class="flaticon-place"></span></div>
              <div class="details">
                <h5 class="title">Location</h5>
                <p class="mb-0 text">London</p>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-xl-3">
            <div class="iconbox-style1 contact-style d-flex align-items-start mb30">
              <div class="icon flex-shrink-0"><span class="flaticon-fifteen"></span></div>
              <div class="details">
                <h5 class="title">Hours</h5>
                <p class="mb-0 text">50h / week</p>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-xl-3">
            <div class="iconbox-style1 contact-style d-flex align-items-start mb30">
              <div class="icon flex-shrink-0"><span class="flaticon-pay-day"></span></div>
              <div class="details">
                <h5 class="title">Salary</h5>
                <p class="mb-0 text">$35 - $45K</p>
              </div>
            </div>
          </div>
        </div>
        <div class="service-about">
          <h4 class="mb-4">Description</h4>
          <p class="text mb30">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. </p>
          <p class="text mb60">Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>

          @if (Session::get('user.USER_ROLE') == 2 )
          <div class="d-grid mb60">
          @if (isset($order))
          <a class="ud-btn btn-thm2">Already Applied</a>
          @else
          <a href="{{route('applyJob',$job[0]->JR_ID)}}" class="ud-btn btn-thm2">Apply For Job</a>
          @endif
          </div>
          @else
          <div class="d-grid mb60">
          <a href="{{route('pauseJob',$job[0]->JR_ID)}}" class="ud-btn btn-thm2">Pause Job</i></a>
          <br>
          <a href="{{route('deleteJob',$job[0]->JR_ID)}}" class="ud-btn btn-thm2">Delete Job</i></a>
          <br>
          <a href="{{route('viewListApplicants',$job[0]->JR_ID)}}" class="ud-btn btn-thm2">View Applicants</i></a>
          </div>
          @endif

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

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

