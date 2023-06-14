<!DOCTYPE html>
<html lang="en">

@extends('user.user_master')

@section('user_page')
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Servisea/view</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="manifest" href="site.webmanifest">
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
@stop

@section('user_style')

@stop

@section('user-main-content')
    <head>
		<!-- CSS here -->
            <link rel="stylesheet" href="{{asset('backend/JOB_ASSET/assets/css/bootstrap.min.css')}}">
            <link rel="stylesheet" href="{{asset('backend/JOB_ASSET/assets/css/owl.carousel.min.css')}}">
            <link rel="stylesheet" href="{{asset('backend/JOB_ASSET/assets/css/flaticon.css')}}">
            <link rel="stylesheet" href="{{asset('backend/JOB_ASSET/assets/css/slicknav.css')}}">
            <link rel="stylesheet" href="{{asset('backend/JOB_ASSET/assets/css/price_rangs.css')}}">
            <link rel="stylesheet" href="{{asset('backend/JOB_ASSET/assets/css/animate.min.css')}}">
            <link rel="stylesheet" href="{{asset('backend/JOB_ASSET/assets/css/magnific-popup.css')}}">
            <link rel="stylesheet" href="{{asset('backend/JOB_ASSET/assets/css/fontawesome-all.min.css')}}">
            <link rel="stylesheet" href="{{asset('backend/JOB_ASSET/assets/css/themify-icons.css')}}">
            <link rel="stylesheet" href="{{asset('backend/JOB_ASSET/assets/css/slick.css')}}">
            <link rel="stylesheet" href="{{asset('backend/JOB_ASSET/assets/css/nice-select.css')}}">
            <link rel="stylesheet" href="{{asset('backend/JOB_ASSET/assets/css/style.css')}}">
   </head>


    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/logo.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->

    <main>
        <!-- job post company Start -->
        <div class="job-post-company pt-120 pb-120">
            <div class="container">
                <div class="row justify-content-between">
                    <!-- Left Content -->
                    <div class="col-xl-7 col-lg-8">
                        <!-- job single -->
                        <div class="single-job-items mb-50">
                            <div class="job-items">
                                <div class="company-img company-img-details">
                                    <a href="#"><img src="assets/img/icon/job-list1.png" alt=""></a>
                                </div>
                                <div class="job-tittle">
                                    <a href="#">
                                        <h4>Digital Marketer</h4>
                                    </a>
                                    <ul>
                                        <li>Creative Agency</li>
                                        <li><i class="fas fa-map-marker-alt"></i>Athens, Greece</li>
                                        <li>$3500 - $4000</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                          <!-- job single End -->

                        <div class="job-post-details">
                            <div class="post-details1 mb-50">
                                <!-- Small Section Tittle -->
                                <div class="small-section-tittle">
                                    <h4>Job Description</h4>
                                </div>
                                <p>It is a long established fact that a reader will beff distracted by vbthe creadable content of a page when looking at its layout. The pointf of using Lorem Ipsum is that it has ahf mcore or-lgess normal distribution of letters, as opposed to using, Content here content here making it look like readable.</p>
                            </div>
                            <div class="post-details2  mb-50">
                                 <!-- Small Section Tittle -->
                                <div class="small-section-tittle">
                                    <h4>Required Knowledge, Skills, and Abilities</h4>
                                </div>
                               <ul>
                                   <li>System Software Development</li>
                                   <li>Mobile Applicationin iOS/Android/Tizen or other platform</li>
                                   <li>Research and code , libraries, APIs and frameworks</li>
                                   <li>Strong knowledge on software development life cycle</li>
                                   <li>Strong problem solving and debugging skills</li>
                               </ul>
                            </div>
                            <div class="post-details2  mb-50">
                                 <!-- Small Section Tittle -->
                                <div class="small-section-tittle">
                                    <h4>Education + Experience</h4>
                                </div>
                               <ul>
                                   <li>3 or more years of professional design experience</li>
                                   <li>Direct response email experience</li>
                                   <li>Ecommerce website design experience</li>
                                   <li>Familiarity with mobile and web apps preferred</li>
                                   <li>Experience using Invision a plus</li>
                               </ul>
                            </div>
                        </div>

                    </div>
                    <!-- Right Content -->
                    <div class="col-xl-4 col-lg-4">
                        <div class="post-details3  mb-50">
                            <!-- Small Section Tittle -->
                           <div class="small-section-tittle">
                               <h4>Job Overview</h4>
                           </div>
                          <ul>
                              <li>Posted date : <span>12 Aug 2019</span></li>
                              <li>Location : <span>New York</span></li>
                              <li>Vacancy : <span>02</span></li>
                              <li>Job nature : <span>Full time</span></li>
                              <li>Salary :  <span>$7,800 yearly</span></li>
                              <li>Application date : <span>12 Sep 2020</span></li>
                          </ul>
                         <div class="apply-btn2">
                            @if (Session::get('user.USER_ROLE') == 1 )
                            <a href="#" class="btn">Apply Now</a>
                            @endif
                         </div>
                       </div>
                        <div class="post-details4  mb-50">
                            <!-- Small Section Tittle -->
                           <div class="small-section-tittle">
                               <h4>Company Information</h4>
                           </div>
                              <span>Colorlib</span>
                              <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                            <ul>
                                <li>Name: <span>Colorlib </span></li>
                                <li>Web : <span> colorlib.com</span></li>
                                <li>Email: <span>carrier.colorlib@gmail.com</span></li>
                            </ul>
                       </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- job post company End -->

    </main>







@stop

@section('user_script')

<!-- <script type="text/javascript">
  window.onbeforeunload = confirmExit;
  function confirmExit()
  {
    return "your changes will be lost.  Are you sure you want to exit this page?";
  }
</script> -->

	<!-- JS here -->
		<!-- All JS Custom Plugins Link Here here -->
        <script src="{{asset('backend/JOB_ASSET/assets/js/vendor/modernizr-3.5.0.min.js')}}"></script>
		<!-- Jquery, Popper, Bootstrap -->
		<script src="{{asset('backend/JOB_ASSET/assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
        <script src="{{asset('backend/JOB_ASSET/assets/js/popper.min.js')}}"></script>
        <script src="{{asset('backend/JOB_ASSET/assets/js/bootstrap.min.js')}}"></script>
	    <!-- Jquery Mobile Menu -->
        <script src="{{asset('backend/JOB_ASSET/assets/js/jquery.slicknav.min.js')}}"></script>

		<!-- Jquery Slick , Owl-Carousel Plugins -->
        <script src="{{asset('backend/JOB_ASSET/assets/js/owl.carousel.min.js')}}"></script>
        <script src="{{asset('backend/JOB_ASSET/assets/js/slick.min.js')}}"></script>
        <script src="{{asset('backend/JOB_ASSET/assets/js/price_rangs.js')}}"></script>

		<!-- One Page, Animated-HeadLin -->
        <script src="{{asset('backend/JOB_ASSET/assets/js/wow.min.js')}}"></script>
		<script src="{{asset('backend/JOB_ASSET/assets/js/animated.headline.js')}}"></script>
        <script src="{{asset('backend/JOB_ASSET/assets/js/jquery.magnific-popup.js')}}"></script>

		<!-- Scrollup, nice-select, sticky -->
        <script src="{{asset('backend/JOB_ASSET/assets/js/jquery.scrollUp.min.js')}}"></script>
        <script src="{{asset('backend/JOB_ASSET/assets/js/jquery.nice-select.min.js')}}"></script>
		<script src="{{asset('backend/JOB_ASSET/assets/js/jquery.sticky.js')}}"></script>

        <!-- contact js -->
        <script src="{{asset('backend/JOB_ASSET/assets/js/contact.js')}}"></script>
        <script src="{{asset('backend/JOB_ASSET/assets/js/jquery.form.js')}}"></script>
        <script src="{{asset('backend/JOB_ASSET/assets/js/jquery.validate.min.js')}}"></script>
        <script src="{{asset('backend/JOB_ASSET/assets/js/mail-script.js')}}"></script>
        <script src="{{asset('backend/JOB_ASSET/assets/js/jquery.ajaxchimp.min.js')}}"></script>

		<!-- Jquery Plugins, main Jquery -->
        <script src="{{asset('backend/JOB_ASSET/assets/js/plugins.js')}}"></script>
        <script src="{{asset('backend/JOB_ASSET/assets/js/main.js')}}"></script>


    <!-- JS -->
    <script src="{{asset('backend/USER_ASSET/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('backend/USER_ASSET/js/main.js')}}"></script>
@stop

