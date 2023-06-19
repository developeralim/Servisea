@extends('user.user_master')

@section('user_page')
<title>Zay Shop eCommerce HTML CSS Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
@stop

@section('user-main-content')

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="POST" action="{{ route('registerUser') }}" class="register-form" id="register-form">
                            @csrf
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="social-signing">
                                <button type="button" class="icon-button social-signing-button facebook-signing-button">
                                    <span class="XQskgrQ provider-icon" aria-hidden="true" style="width: 18px; height: 18px;">
                                    <svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M20 10.0022C20.0004 8.09104 19.4532 6.2198 18.4231 4.61003C17.393 3.00026 15.9232 1.71938 14.1877 0.919062C12.4522 0.118741 10.5237 -0.167503 8.63053 0.0942223C6.73739 0.355948 4.9589 1.15468 3.50564 2.39585C2.05237 3.63701 0.985206 5.26863 0.430495 7.0975C-0.124217 8.92636 -0.143239 10.8759 0.37568 12.7152C0.894599 14.5546 1.92973 16.2067 3.35849 17.476C4.78726 18.7453 6.54983 19.5786 8.4375 19.8772V12.8922H5.89875V10.0022H8.4375V7.79843C8.38284 7.28399 8.44199 6.76382 8.61078 6.2748C8.77957 5.78577 9.05386 5.33986 9.4142 4.96866C9.77455 4.59746 10.2121 4.31007 10.6959 4.12684C11.1797 3.94362 11.6979 3.86905 12.2137 3.90843C12.9638 3.91828 13.7121 3.98346 14.4525 4.10343V6.56718H13.1925C12.9779 6.53911 12.7597 6.55967 12.554 6.62733C12.3484 6.69498 12.1607 6.80801 12.0046 6.95804C11.8486 7.10807 11.7283 7.29127 11.6526 7.49408C11.577 7.69689 11.5479 7.91411 11.5675 8.12968V10.0047H14.3412L13.8975 12.8947H11.5625V19.8834C13.9153 19.5112 16.058 18.3114 17.6048 16.4999C19.1516 14.6884 20.001 12.3842 20 10.0022Z"></path></svg></span><p>Continue with Facebook</p></button>

                                        <button type="button" class="icon-button social-signing-button google-signing-button">
                                            <span class="XQskgrQ provider-icon" aria-hidden="true" style="width: 18px; height: 18px;"><svg width="18" height="19" viewBox="0 0 18 19" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9 7.84363V11.307H13.8438C13.6365 12.428 12.9994 13.373 12.0489 14.0064V16.2534H14.9562C16.6601 14.6951 17.641 12.4029 17.641 9.67839C17.641 9.04502 17.5854 8.43176 17.4792 7.84865H9V7.84363Z" fill="#3E82F1"></path><path d="M9.00001 14.861C6.65394 14.861 4.67192 13.2876 3.96406 11.1714H0.955627V13.4937C2.43709 16.4142 5.48091 18.4198 9.00001 18.4198C11.432 18.4198 13.4697 17.6206 14.9562 16.2533L12.0489 14.0064C11.245 14.5443 10.2135 14.861 9.00001 14.861Z" fill="#32A753"></path><path d="M3.96404 5.45605H0.955617C0.348876 6.66246 0 8.02972 0 9.47238C0 10.915 0.348876 12.2823 0.955617 13.4887L3.96404 11.1714C3.78202 10.6335 3.6809 10.0605 3.6809 9.47238C3.6809 8.88426 3.78202 8.31122 3.96404 7.77336V5.45605Z" fill="#F9BB00"></path><path d="M0.955627 5.45597L3.96406 7.77327C4.67192 5.65703 6.65394 4.08368 9.00001 4.08368C10.3197 4.08368 11.5079 4.53608 12.4382 5.42078L15.0219 2.85214C13.4646 1.40948 11.427 0.52478 9.00001 0.52478C5.48091 0.52478 2.43709 2.53043 0.955627 5.45597Z" fill="#E74133"></path></svg></span><p>Continue with Google</p>
                                            </button>

                                            <button type="button" class="icon-button social-signing-button apple-signing-button">
                                                <span class="XQskgrQ provider-icon" aria-hidden="true" style="width: 18px; height: 18px;"><svg width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12.6442 9.51027C12.6362 8.03572 13.3031 6.92277 14.6531 6.10313C13.8978 5.02232 12.7567 4.42768 11.25 4.31116C9.82366 4.19866 8.26473 5.14286 7.6942 5.14286C7.09152 5.14286 5.70938 4.35134 4.62455 4.35134C2.38259 4.3875 0 6.13929 0 9.70313C0 10.7558 0.192857 11.8433 0.578571 12.9656C1.09286 14.4402 2.94911 18.0563 4.88571 17.996C5.89821 17.9719 6.61339 17.2768 7.93125 17.2768C9.20893 17.2768 9.87187 17.996 11.0009 17.996C12.9536 17.9679 14.633 14.6813 15.1232 13.2027C12.5036 11.9692 12.6442 9.58661 12.6442 9.51027ZM10.3701 2.91295C11.467 1.61116 11.3665 0.425893 11.3344 0C10.3661 0.05625 9.24509 0.658929 8.60625 1.40223C7.90313 2.19777 7.48929 3.18214 7.57768 4.29107C8.62634 4.37143 9.58259 3.83304 10.3701 2.91295Z" fill="black"></path></svg></span><p>Continue with Apple</p></button><div class="form-separator"><span>or</span></div></div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" class="form-control" name="USER_EMAIL" aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Username</label>
                                <input type="username" class="form-control" name="USERNAME">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control" name="USER_PASSWORD">
                            </div>
                            <div class="mb-3 form-check">
                                <span>By joining, you agree to Servisea’s <a href="">Terms of Service</a> ,as well as to receive occasional emails from us.</span>
                            </div>
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button class="btn btn-primary" type="submit">JOIN</button>
                            </div>
                        </form>
      </div>
    </div>
  </div>
</div>


<!-- Start Banner Hero -->

<div class="body_content">
    <!-- Home Banner Style V1 -->
    <section class="hero-home10 bdrs24 p-0 overflow-hidden">
      <div class="container-fluid p-0">
        <div class="row">
          <div class="col-lg-12">
            <div class="main-banner-wrapper home10-hero-content">
              <div class="navi_pagi_bottom_center dots_nav_light banner-style-one slider-1-grid owl-theme owl-carousel">
                <div class="slide slide-one" style="background-image: url(images/home/home-3.jpg);">
                  <div class="container">
                    <div class="row">
                      <div class="col-xl-7 mx-auto text-center">
                        <h3 class="banner-title">With talented freelancers <br class="d-none d-lg-block">ando more work.</h3>
                        <p class="banner-text text-white ff-heading mb30">Millions of people use freeio.com to turn their ideas into reality.</p>
                        <div class="d-sm-flex justify-content-center banner-btn">
                          <a href="page-project-v1.html" class="ud-btn btn-white me-0 me-sm-3">Find Work</a>
                          <a href="page-freelancer-v1.html" class="ud-btn btn-dark">Find Talent</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="slide slide-one" style="background-image: url(images/home/home-2.jpg);">
                  <div class="container">
                    <div class="row">
                      <div class="col-xl-7 mx-auto text-center">
                        <h3 class="banner-title">Freelance Services For <br class="d-none d-lg-block">Your Business</h3>
                        <p class="banner-text text-white ff-heading mb30">Millions of people use freeio.com to turn their ideas into reality.</p>
                        <div class="d-sm-flex justify-content-center banner-btn">
                          <a href="page-project-v1.html" class="ud-btn btn-white me-0 me-sm-3">Find Work</a>
                          <a href="page-freelancer-v1.html" class="ud-btn btn-dark">Find Talent</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="slide slide-one" style="background-image: url(images/home/home-1.jpg);">
                  <div class="container">
                    <div class="row">
                      <div class="col-xl-7 mx-auto text-center">
                        <h3 class="banner-title">With talented freelancers <br class="d-none d-lg-block">ando more work.</h3>
                        <p class="banner-text text-white ff-heading mb30">Millions of people use freeio.com to turn their ideas into reality.</p>
                        <div class="d-sm-flex justify-content-center banner-btn">
                          <a href="page-project-v1.html" class="ud-btn btn-white me-0 me-sm-3">Find Work</a>
                          <a href="page-freelancer-v1.html" class="ud-btn btn-dark">Find Talent</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.carousel-btn-block banner-carousel-btn -->
            </div>
            <!-- /.main-banner-wrapper -->
          </div>
        </div>
      </div>
    </section>

    <!-- Trending Services -->
    <section class="pb-0 pb30-md">
      <div class="container">
        <div class="row align-items-center wow fadeInUp">
          <div class="col-lg-9">
            <div class="main-title">
              <h2 class="title">Trending Services</h2>
              <p class="paragraph">Most viewed and all-time top-selling services</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="navi_pagi_top_right slider-4-grid owl-carousel owl-theme">
              <div class="item">
                <div class="listing-style1 bdrs16">
                  <div class="list-thumb">
                    <img class="w-100" src="images/listings/g-1.jpg" alt="">
                    <a href="" class="listing-fav fz12"><span class="far fa-heart"></span></a>
                  </div>
                  <div class="list-content">
                    <p class="list-text body-color fz14 mb-1">Web & App Design</p>
                    <h5 class="list-title"><a href="page-services-single.html">I will design modern websites in figma or adobe xd</a></h5>
                    <div class="review-meta d-flex align-items-center">
                      <i class="fas fa-star fz10 review-color me-2"></i>
                      <p class="mb-0 body-color fz14"><span class="dark-color me-2">4.82</span>94 reviews</p>
                    </div>
                    <hr class="my-2">
                    <div class="list-meta d-flex justify-content-between align-items-center mt15">
                      <a class="d-flex" href="">
                        <span class="position-relative mr10">
                          <img class="rounded-circle wa" src="images/team/fl-s-1.png" alt="Freelancer Photo">
                          <span class="online-badges"></span>
                        </span>
                        <span class="fz14">Wanda Runo</span>
                      </a>
                      <div class="budget">
                        <p class="mb-0 body-color">Starting at<span class="fz17 fw500 dark-color ms-1">$983</span></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="listing-style1 default-box-shadow1 bdrs16">
                  <div class="list-thumb">
                    <img class="w-100" src="images/listings/g-2.jpg" alt="">
                    <a href="" class="listing-fav fz12"><span class="far fa-heart"></span></a>
                  </div>
                  <div class="list-content">
                    <p class="list-text body-color fz14 mb-1">Art & Illustration</p>
                    <h5 class="list-title"><a href="page-services-single.html">I will create modern flat design illustration</a></h5>
                    <div class="review-meta d-flex align-items-center">
                      <i class="fas fa-star fz10 review-color me-2"></i>
                      <p class="mb-0 body-color fz14"><span class="dark-color me-2">4.82</span>94 reviews</p>
                    </div>
                    <hr class="my-2">
                    <div class="list-meta d-flex justify-content-between align-items-center mt15">
                      <a class="d-flex" href="">
                        <span class="position-relative mr10">
                          <img class="rounded-circle wa" src="images/team/fl-s-2.png" alt="Freelancer Photo">
                          <span class="online-badges"></span>
                        </span>
                        <span class="fz14">Ali Tufan</span>
                      </a>
                      <div class="budget">
                        <p class="mb-0 body-color">Starting at<span class="fz17 fw500 dark-color ms-1">$983</span></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="listing-style1 bdrs16">
                  <div class="list-thumb">
                    <img class="w-100" src="images/listings/g-3.jpg" alt="">
                    <a href="" class="listing-fav fz12"><span class="far fa-heart"></span></a>
                  </div>
                  <div class="list-content">
                    <p class="list-text body-color fz14 mb-1">Design & Creative</p>
                    <h5 class="list-title line-clamp2"><a href="page-services-single.html">I will build a fully responsive design in HTML,CSS, bootstrap, and javascript</a></h5>
                    <div class="review-meta d-flex align-items-center">
                      <i class="fas fa-star fz10 review-color me-2"></i>
                      <p class="mb-0 body-color fz14"><span class="dark-color me-2">4.82</span>94 reviews</p>
                    </div>
                    <hr class="my-2">
                    <div class="list-meta d-flex justify-content-between align-items-center mt15">
                      <a class="d-flex" href="">
                        <span class="position-relative mr10">
                          <img class="rounded-circle" src="images/team/fl-s-3.png" alt="Freelancer Photo">
                          <span class="online-badges"></span>
                        </span>
                        <span class="fz14">Wanda Runo</span>
                      </a>
                      <div class="budget">
                        <p class="mb-0 body-color">Starting at<span class="fz17 fw500 dark-color ms-1">$983</span></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="listing-style1 bdrs16">
                  <div class="list-thumb">
                    <img class="w-100" src="images/listings/g-4.jpg" alt="">
                    <a href="" class="listing-fav fz12"><span class="far fa-heart"></span></a>
                  </div>
                  <div class="list-content">
                    <p class="list-text body-color fz14 mb-1">Web & App Design</p>
                    <h5 class="list-title line-clamp2"><a href="page-services-single.html">I will do mobile app development for ios and android</a></h5>
                    <div class="review-meta d-flex align-items-center">
                      <i class="fas fa-star fz10 review-color me-2"></i>
                      <p class="mb-0 body-color fz14"><span class="dark-color me-2">4.82</span>94 reviews</p>
                    </div>
                    <hr class="my-2">
                    <div class="list-meta d-flex justify-content-between align-items-center mt15">
                      <a class="d-flex" href="">
                        <span class="position-relative mr10">
                          <img class="rounded-circle" src="images/team/fl-s-4.png" alt="Freelancer Photo">
                          <span class="online-badges"></span>
                        </span>
                        <span class="fz14">Wanda Runo</span>
                      </a>
                      <div class="budget">
                        <p class="mb-0 body-color">Starting at<span class="fz17 fw500 dark-color ms-1">$983</span></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="listing-style1 bdrs16">
                  <div class="list-thumb">
                    <img class="w-100" src="images/listings/g-5.jpg" alt="">
                    <a href="" class="listing-fav fz12"><span class="far fa-heart"></span></a>
                  </div>
                  <div class="list-content">
                    <p class="list-text body-color fz14 mb-1">Web & App Design</p>
                    <h5 class="list-title"><a href="page-services-single.html">I will design modern websites in figma or adobe xd</a></h5>
                    <div class="review-meta d-flex align-items-center">
                      <i class="fas fa-star fz10 review-color me-2"></i>
                      <p class="mb-0 body-color fz14"><span class="dark-color me-2">4.82</span>94 reviews</p>
                    </div>
                    <hr class="my-2">
                    <div class="list-meta d-flex justify-content-between align-items-center mt15">
                      <a class="d-flex" href="">
                        <span class="position-relative mr10">
                          <img class="rounded-circle" src="images/team/fl-s-1.png" alt="Freelancer Photo">
                          <span class="online-badges"></span>
                        </span>
                        <span class="fz14">Wanda Runo</span>
                      </a>
                      <div class="budget">
                        <p class="mb-0 body-color">Starting at<span class="fz17 fw500 dark-color ms-1">$983</span></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="listing-style1 bdrs16">
                  <div class="list-thumb">
                    <img class="w-100" src="images/listings/g-6.jpg" alt="">
                    <a href="" class="listing-fav fz12"><span class="far fa-heart"></span></a>
                  </div>
                  <div class="list-content">
                    <p class="list-text body-color fz14 mb-1">Web & App Design</p>
                    <h5 class="list-title"><a href="page-services-single.html">I will design modern websites in figma or adobe xd</a></h5>
                    <div class="review-meta d-flex align-items-center">
                      <i class="fas fa-star fz10 review-color me-2"></i>
                      <p class="mb-0 body-color fz14"><span class="dark-color me-2">4.82</span>94 reviews</p>
                    </div>
                    <hr class="my-2">
                    <div class="list-meta d-flex justify-content-between align-items-center mt15">
                      <a class="d-flex" href="">
                        <span class="position-relative mr10">
                          <img class="rounded-circle" src="images/team/fl-s-2.png" alt="Freelancer Photo">
                          <span class="online-badges"></span>
                        </span>
                        <span class="fz14">Wanda Runo</span>
                      </a>
                      <div class="budget">
                        <p class="mb-0 body-color">Starting at<span class="fz17 fw500 dark-color ms-1">$983</span></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="listing-style1 bdrs16">
                  <div class="list-thumb">
                    <img class="w-100" src="images/listings/g-7.jpg" alt="">
                    <a href="" class="listing-fav fz12"><span class="far fa-heart"></span></a>
                  </div>
                  <div class="list-content">
                    <p class="list-text body-color fz14 mb-1">Design & Creative</p>
                    <h5 class="list-title line-clamp2"><a href="page-services-single.html">I will build a fully responsive design in HTML,CSS, bootstrap, and javascript</a></h5>
                    <div class="review-meta d-flex align-items-center">
                      <i class="fas fa-star fz10 review-color me-2"></i>
                      <p class="mb-0 body-color fz14"><span class="dark-color me-2">4.82</span>94 reviews</p>
                    </div>
                    <hr class="my-2">
                    <div class="list-meta d-flex justify-content-between align-items-center mt15">
                      <a class="d-flex" href="">
                        <span class="position-relative mr10">
                          <img class="rounded-circle" src="images/team/fl-s-3.png" alt="Freelancer Photo">
                          <span class="online-badges"></span>
                        </span>
                        <span class="fz14">Wanda Runo</span>
                      </a>
                      <div class="budget">
                        <p class="mb-0 body-color">Starting at<span class="fz17 fw500 dark-color ms-1">$983</span></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="listing-style1 bdrs16">
                  <div class="list-thumb">
                    <img class="w-100" src="images/listings/g-1.jpg" alt="">
                    <a href="" class="listing-fav fz12"><span class="far fa-heart"></span></a>
                  </div>
                  <div class="list-content">
                    <p class="list-text body-color fz14 mb-1">Web & App Design</p>
                    <h5 class="list-title"><a href="page-services-single.html">I will design modern websites in figma or adobe xd</a></h5>
                    <div class="review-meta d-flex align-items-center">
                      <i class="fas fa-star fz10 review-color me-2"></i>
                      <p class="mb-0 body-color fz14"><span class="dark-color me-2">4.82</span>94 reviews</p>
                    </div>
                    <hr class="my-2">
                    <div class="list-meta d-flex justify-content-between align-items-center mt15">
                      <a class="d-flex" href="">
                        <span class="position-relative mr10">
                          <img class="rounded-circle wa" src="images/team/fl-s-1.png" alt="Freelancer Photo">
                          <span class="online-badges"></span>
                        </span>
                        <span class="fz14">Wanda Runo</span>
                      </a>
                      <div class="budget">
                        <p class="mb-0 body-color">Starting at<span class="fz17 fw500 dark-color ms-1">$983</span></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="listing-style1 bdrs16">
                  <div class="list-thumb">
                    <img class="w-100" src="images/listings/g-2.jpg" alt="">
                    <a href="" class="listing-fav fz12"><span class="far fa-heart"></span></a>
                  </div>
                  <div class="list-content">
                    <p class="list-text body-color fz14 mb-1">Art & Illustration</p>
                    <h5 class="list-title"><a href="page-services-single.html">I will create modern flat design illustration</a></h5>
                    <div class="review-meta d-flex align-items-center">
                      <i class="fas fa-star fz10 review-color me-2"></i>
                      <p class="mb-0 body-color fz14"><span class="dark-color me-2">4.82</span>94 reviews</p>
                    </div>
                    <hr class="my-2">
                    <div class="list-meta d-flex justify-content-between align-items-center mt15">
                      <a class="d-flex" href="">
                        <span class="position-relative mr10">
                          <img class="rounded-circle wa" src="images/team/fl-s-2.png" alt="Freelancer Photo">
                          <span class="online-badges"></span>
                        </span>
                        <span class="fz14">Ali Tufan</span>
                      </a>
                      <div class="budget">
                        <p class="mb-0 body-color">Starting at<span class="fz17 fw500 dark-color ms-1">$983</span></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="text-center mt20">
              <a class="ud-btn2" href="page-service-single.html">All Services<i class="fal fa-arrow-right-long"></i></a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Talent by category -->
    <section class="pb40-md">
      <div class="container">
        <div class="row align-items-center wow fadeInUp" data-wow-delay="300ms">
          <div class="col-lg-9">
            <div class="main-title2">
              <h2 class="title">Browse talent by category</h2>
              <p class="paragraph">Get some Inspirations from 1800+ skills</p>
            </div>
          </div>
        </div>
        <div class="row wow fadeInUp">
          <div class="col-lg-12">
            <div class="category-slider-home10 navi_pagi_top_right slider-7-grid owl-carousel owl-theme wow fadeInUp">
              <div class="item">
                <div class="iconbox-style1 bdr1 bdrs16">
                  <div class="icon"><span class="flaticon-developer"></span></div>
                  <div class="details mt20">
                    <p class="text mb5">1.853 skills</p>
                    <h5 class="title">Development & IT</h5>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="iconbox-style1 bdr1 bdrs16">
                  <div class="icon"><span class="flaticon-web-design-1"></span></div>
                  <div class="details mt20">
                    <p class="text mb5">1.853 skills</p>
                    <h5 class="title">Design & Creative</h5>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="iconbox-style1 bdr1 bdrs16">
                  <div class="icon"><span class="flaticon-digital-marketing"></span></div>
                  <div class="details mt20">
                    <p class="text mb5">1.853 skills</p>
                    <h5 class="title">Digital Marketing</h5>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="iconbox-style1 bdr1 bdrs16">
                  <div class="icon"><span class="flaticon-translator"></span></div>
                  <div class="details mt20">
                    <p class="text mb5">1.853 skills</p>
                    <h5 class="title">Writing & Translation</h5>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="iconbox-style1 bdr1 bdrs16">
                  <div class="icon"><span class="flaticon-microphone"></span></div>
                  <div class="details mt20">
                    <p class="text mb5">1.853 skills</p>
                    <h5 class="title">Music & Audio</h5>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="iconbox-style1 bdr1 bdrs16">
                  <div class="icon"><span class="flaticon-video-file"></span></div>
                  <div class="details mt20">
                    <p class="text mb5">1.853 skills</p>
                    <h5 class="title">Video & Animation</h5>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="iconbox-style1 bdr1 bdrs16">
                  <div class="icon"><span class="flaticon-ruler"></span></div>
                  <div class="details mt20">
                    <p class="text mb5">1.853 skills</p>
                    <h5 class="title">Engineering & Architecture</h5>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="iconbox-style1 bdr1 bdrs16">
                  <div class="icon"><span class="flaticon-goal"></span></div>
                  <div class="details mt20">
                    <p class="text mb5">1.853 skills</p>
                    <h5 class="title">Finance & Accounting</h5>
                  </div>
                </div>
              </div>
            </div>
            <div class="text-center mt10">
              <a class="ud-btn2" href="page-service-single.html">All Categories<i class="fal fa-arrow-right-long"></i></a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Latest Jobs -->
    <section class="hover-bgc-color pb90 pb30-md bdrs24">
      <div class="container">
        <div class="row align-items-center wow fadeInUp">
          <div class="col-lg-9">
            <div class="main-title">
              <h2 class="title">Our Latest Jobs</h2>
              <p class="paragraph">Know your worth and find the job that qualify your life</p>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="text-start text-lg-end mb-4 mb-lg-2">
              <a class="ud-btn2" href="page-job-list-v1.html">Browse All<i class="fal fa-arrow-right-long"></i></a>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6 col-xl-4">
            <div class="job-list-style1 default-box-shadow1 bdrs16 bdr1">
              <div class="d-xl-flex align-items-start">
                <div class="icon d-flex align-items-center mb20">
                  <img class="wa" src="images/team/client-2.png" alt="">
                  <span class="fav-icon flaticon-star"></span>
                </div>
                <div class="details ml20 ml0-xl">
                  <h5>Website Designer Required For Directory Theme</h5>
                  <h6 class="mb-3 text-thm">Mailchimp</h6>
                </div>
              </div>
              <p class="list-inline-item mb-0">$125k-$135k Hourly</p>
              <p class="list-inline-item mb-0 bdrl1 pl10">1-5 Days</p>
              <p class="list-inline-item mb-0 bdrl1 pl10">Expensive</p>
              <p class="list-inline-item mb-0 bdrl1 pl10">Remote</p>
            </div>
          </div>
          <div class="col-sm-6 col-xl-4">
            <div class="job-list-style1 default-box-shadow1 bdrs16 bdr1">
              <div class="d-xl-flex align-items-start">
                <div class="icon d-flex align-items-center mb20">
                  <img class="wa" src="images/team/client-1.png" alt="">
                  <span class="fav-icon flaticon-star"></span>
                </div>
                <div class="details ml20 ml0-xl">
                  <h5>Website Designer Required For Directory Theme</h5>
                  <h6 class="mb-3 text-thm">Mailchimp</h6>
                </div>
              </div>
              <p class="list-inline-item mb-0">$125k-$135k Hourly</p>
              <p class="list-inline-item mb-0 bdrl1 pl10">1-5 Days</p>
              <p class="list-inline-item mb-0 bdrl1 pl10">Expensive</p>
              <p class="list-inline-item mb-0 bdrl1 pl10">Remote</p>
            </div>
          </div>
          <div class="col-sm-6 col-xl-4">
            <div class="job-list-style1 default-box-shadow1 bdrs16 bdr1">
              <div class="d-xl-flex align-items-start">
                <div class="icon d-flex align-items-center mb20">
                  <img class="wa" src="images/team/client-6.png" alt="">
                  <span class="fav-icon flaticon-star"></span>
                </div>
                <div class="details ml20 ml0-xl">
                  <h5>Website Designer Required For Directory Theme</h5>
                  <h6 class="mb-3 text-thm">Mailchimp</h6>
                </div>
              </div>
              <p class="list-inline-item mb-0">$125k-$135k Hourly</p>
              <p class="list-inline-item mb-0 bdrl1 pl10">1-5 Days</p>
              <p class="list-inline-item mb-0 bdrl1 pl10">Expensive</p>
              <p class="list-inline-item mb-0 bdrl1 pl10">Remote</p>
            </div>
          </div>
          <div class="col-sm-6 col-xl-4">
            <div class="job-list-style1 default-box-shadow1 bdrs16 bdr1">
              <div class="d-xl-flex align-items-start">
                <div class="icon d-flex align-items-center mb20">
                  <img class="wa" src="images/team/client-3.png" alt="">
                  <span class="fav-icon flaticon-star"></span>
                </div>
                <div class="details ml20 ml0-xl">
                  <h5>Website Designer Required For Directory Theme</h5>
                  <h6 class="mb-3 text-thm">Mailchimp</h6>
                </div>
              </div>
              <p class="list-inline-item mb-0">$125k-$135k Hourly</p>
              <p class="list-inline-item mb-0 bdrl1 pl10">1-5 Days</p>
              <p class="list-inline-item mb-0 bdrl1 pl10">Expensive</p>
              <p class="list-inline-item mb-0 bdrl1 pl10">Remote</p>
            </div>
          </div>
          <div class="col-sm-6 col-xl-4">
            <div class="job-list-style1 default-box-shadow1 bdrs16 bdr1">
              <div class="d-xl-flex align-items-start">
                <div class="icon d-flex align-items-center mb20">
                  <img class="wa" src="images/team/client-4.png" alt="">
                  <span class="fav-icon flaticon-star"></span>
                </div>
                <div class="details ml20 ml0-xl">
                  <h5>Website Designer Required For Directory Theme</h5>
                  <h6 class="mb-3 text-thm">Mailchimp</h6>
                </div>
              </div>
              <p class="list-inline-item mb-0">$125k-$135k Hourly</p>
              <p class="list-inline-item mb-0 bdrl1 pl10">1-5 Days</p>
              <p class="list-inline-item mb-0 bdrl1 pl10">Expensive</p>
              <p class="list-inline-item mb-0 bdrl1 pl10">Remote</p>
            </div>
          </div>
          <div class="col-sm-6 col-xl-4">
            <div class="job-list-style1 default-box-shadow1 bdrs16 bdr1">
              <div class="d-xl-flex align-items-start">
                <div class="icon d-flex align-items-center mb20">
                  <img class="wa" src="images/team/client-5.png" alt="">
                  <span class="fav-icon flaticon-star"></span>
                </div>
                <div class="details ml20 ml0-xl">
                  <h5>Website Designer Required For Directory Theme</h5>
                  <h6 class="mb-3 text-thm">Mailchimp</h6>
                </div>
              </div>
              <p class="list-inline-item mb-0">$125k-$135k Hourly</p>
              <p class="list-inline-item mb-0 bdrl1 pl10">1-5 Days</p>
              <p class="list-inline-item mb-0 bdrl1 pl10">Expensive</p>
              <p class="list-inline-item mb-0 bdrl1 pl10">Remote</p>
            </div>
          </div>
          <div class="col-sm-6 col-xl-4">
            <div class="job-list-style1 default-box-shadow1 bdrs16 bdr1">
              <div class="d-xl-flex align-items-start">
                <div class="icon d-flex align-items-center mb20">
                  <img class="wa" src="images/team/client-8.png" alt="">
                  <span class="fav-icon flaticon-star"></span>
                </div>
                <div class="details ml20 ml0-xl">
                  <h5>Website Designer Required For Directory Theme</h5>
                  <h6 class="mb-3 text-thm">Mailchimp</h6>
                </div>
              </div>
              <p class="list-inline-item mb-0">$125k-$135k Hourly</p>
              <p class="list-inline-item mb-0 bdrl1 pl10">1-5 Days</p>
              <p class="list-inline-item mb-0 bdrl1 pl10">Expensive</p>
              <p class="list-inline-item mb-0 bdrl1 pl10">Remote</p>
            </div>
          </div>
          <div class="col-sm-6 col-xl-4">
            <div class="job-list-style1 default-box-shadow1 bdrs16 bdr1">
              <div class="d-xl-flex align-items-start">
                <div class="icon d-flex align-items-center mb20">
                  <img class="wa" src="images/team/client-7.png" alt="">
                  <span class="fav-icon flaticon-star"></span>
                </div>
                <div class="details ml20 ml0-xl">
                  <h5>Website Designer Required For Directory Theme</h5>
                  <h6 class="mb-3 text-thm">Mailchimp</h6>
                </div>
              </div>
              <p class="list-inline-item mb-0">$125k-$135k Hourly</p>
              <p class="list-inline-item mb-0 bdrl1 pl10">1-5 Days</p>
              <p class="list-inline-item mb-0 bdrl1 pl10">Expensive</p>
              <p class="list-inline-item mb-0 bdrl1 pl10">Remote</p>
            </div>
          </div>
          <div class="col-sm-6 col-xl-4">
            <div class="job-list-style1 default-box-shadow1 bdrs16 bdr1">
              <div class="d-xl-flex align-items-start">
                <div class="icon d-flex align-items-center mb20">
                  <img class="wa" src="images/team/client-2.png" alt="">
                  <span class="fav-icon flaticon-star"></span>
                </div>
                <div class="details ml20 ml0-xl">
                  <h5>Website Designer Required For Directory Theme</h5>
                  <h6 class="mb-3 text-thm">Mailchimp</h6>
                </div>
              </div>
              <p class="list-inline-item mb-0">$125k-$135k Hourly</p>
              <p class="list-inline-item mb-0 bdrl1 pl10">1-5 Days</p>
              <p class="list-inline-item mb-0 bdrl1 pl10">Expensive</p>
              <p class="list-inline-item mb-0 bdrl1 pl10">Remote</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Highest Rated Freelancers -->
    <section class="">
      <div class="container">
        <div class="row align-items-center wow fadeInUp">
          <div class="col-lg-9">
            <div class="main-title">
              <h2 class="title">Highest Rated Freelancers</h2>
              <p class="paragraph">Lorem ipsum dolor sit amet, consectetur.</p>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="text-start text-lg-end mb-4 mb-lg-2">
              <a class="ud-btn2" href="page-freelancer-v1.html">All Freelancers<i class="fal fa-arrow-right-long"></i></a>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="team-slider-home10 navi_pagi_bottom_center slider-4-grid owl-carousel owl-theme">
              <div class="item">
                <div class="freelancer-style1 text-center bdr1 hover-box-shadow mb60">
                  <div class="thumb w90 mb25 mx-auto position-relative rounded-circle">
                    <img class="rounded-circle mx-auto" src="images/team/fl-1.png" alt="">
                    <span class="online"></span>
                  </div>
                  <div class="details">
                    <h5 class="title mb-1">Robert Fox</h5>
                    <p class="mb-0">Nursing Assistant</p>
                    <div class="review"><p><i class="fas fa-star fz10 review-color pr10"></i><span class="dark-color">4.9</span> (595 reviews)</p></div>
                    <div class="skill-tags d-flex align-items-center justify-content-center mb5">
                      <span class="tag">Figma</span>
                      <span class="tag mx10">Sketch</span>
                      <span class="tag">HTML5</span>
                    </div>
                    <hr class="opacity-100 mt20 mb15">
                    <div class="fl-meta d-flex align-items-center justify-content-between">
                      <a class="meta fw500 text-start">Location<br><span class="fz14 fw400">London</span></a>
                      <a class="meta fw500 text-start">Rate<br><span class="fz14 fw400">$90 / hr</span></a>
                      <a class="meta fw500 text-start">Job Success<br><span class="fz14 fw400">%98</span></a>
                    </div>
                    <div class="d-grid mt15">
                      <a href="page-freelancer-single.html" class="ud-btn btn-white2">View Profile<i class="fal fa-arrow-right-long"></i></a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="freelancer-style1 text-center bdr1 hover-box-shadow mb60">
                  <div class="thumb w90 mb25 mx-auto position-relative rounded-circle">
                    <img class="rounded-circle mx-auto" src="images/team/fl-2.png" alt="">
                    <span class="online"></span>
                  </div>
                  <div class="details">
                    <h5 class="title mb-1">Kristin Watson</h5>
                    <p class="mb-0">Dog Trainer</p>
                    <div class="review"><p><i class="fas fa-star fz10 review-color pr10"></i><span class="dark-color">4.9</span> (595 reviews)</p></div>
                    <div class="skill-tags d-flex align-items-center justify-content-center mb5">
                      <span class="tag">Figma</span>
                      <span class="tag mx10">Sketch</span>
                      <span class="tag">HTML5</span>
                    </div>
                    <hr class="opacity-100 mt20 mb15">
                    <div class="fl-meta d-flex align-items-center justify-content-between">
                      <a class="meta fw500 text-start">Location<br><span class="fz14 fw400">London</span></a>
                      <a class="meta fw500 text-start">Rate<br><span class="fz14 fw400">$90 / hr</span></a>
                      <a class="meta fw500 text-start">Job Success<br><span class="fz14 fw400">%98</span></a>
                    </div>
                    <div class="d-grid mt15">
                      <a href="page-freelancer-single.html" class="ud-btn btn-white2">View Profile<i class="fal fa-arrow-right-long"></i></a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="freelancer-style1 text-center bdr1 hover-box-shadow mb60">
                  <div class="thumb w90 mb25 mx-auto position-relative rounded-circle">
                    <img class="rounded-circle mx-auto" src="images/team/fl-3.png" alt="">
                    <span class="online"></span>
                  </div>
                  <div class="details">
                    <h5 class="title mb-1">Darrell Steward</h5>
                    <p class="mb-0">Medical Assistant</p>
                    <div class="review"><p><i class="fas fa-star fz10 review-color pr10"></i><span class="dark-color">4.9</span> (595 reviews)</p></div>
                    <div class="skill-tags d-flex align-items-center justify-content-center mb5">
                      <span class="tag">Figma</span>
                      <span class="tag mx10">Sketch</span>
                      <span class="tag">HTML5</span>
                    </div>
                    <hr class="opacity-100 mt20 mb15">
                    <div class="fl-meta d-flex align-items-center justify-content-between">
                      <a class="meta fw500 text-start">Location<br><span class="fz14 fw400">London</span></a>
                      <a class="meta fw500 text-start">Rate<br><span class="fz14 fw400">$90 / hr</span></a>
                      <a class="meta fw500 text-start">Job Success<br><span class="fz14 fw400">%98</span></a>
                    </div>
                    <div class="d-grid mt15">
                      <a href="page-freelancer-single.html" class="ud-btn btn-white2">View Profile<i class="fal fa-arrow-right-long"></i></a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="freelancer-style1 text-center bdr1 hover-box-shadow mb60">
                  <div class="thumb w90 mb25 mx-auto position-relative rounded-circle">
                    <img class="rounded-circle mx-auto" src="images/team/fl-4.png" alt="">
                    <span class="online"></span>
                  </div>
                  <div class="details">
                    <h5 class="title mb-1">Theresa Webb</h5>
                    <p class="mb-0">Marketing Coordinator</p>
                    <div class="review"><p><i class="fas fa-star fz10 review-color pr10"></i><span class="dark-color">4.9</span> (595 reviews)</p></div>
                    <div class="skill-tags d-flex align-items-center justify-content-center mb5">
                      <span class="tag">Figma</span>
                      <span class="tag mx10">Sketch</span>
                      <span class="tag">HTML5</span>
                    </div>
                    <hr class="opacity-100 mt20 mb15">
                    <div class="fl-meta d-flex align-items-center justify-content-between">
                      <a class="meta fw500 text-start">Location<br><span class="fz14 fw400">London</span></a>
                      <a class="meta fw500 text-start">Rate<br><span class="fz14 fw400">$90 / hr</span></a>
                      <a class="meta fw500 text-start">Job Success<br><span class="fz14 fw400">%98</span></a>
                    </div>
                    <div class="d-grid mt15">
                      <a href="page-freelancer-single.html" class="ud-btn btn-white2">View Profile<i class="fal fa-arrow-right-long"></i></a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="freelancer-style1 text-center bdr1 hover-box-shadow mb60">
                  <div class="thumb w90 mb25 mx-auto position-relative rounded-circle">
                    <img class="rounded-circle mx-auto" src="images/team/fl-1.png" alt="">
                    <span class="online"></span>
                  </div>
                  <div class="details">
                    <h5 class="title mb-1">Robert Fox</h5>
                    <p class="mb-0">Nursing Assistant</p>
                    <div class="review"><p><i class="fas fa-star fz10 review-color pr10"></i><span class="dark-color">4.9</span> (595 reviews)</p></div>
                    <div class="skill-tags d-flex align-items-center justify-content-center mb5">
                      <span class="tag">Figma</span>
                      <span class="tag mx10">Sketch</span>
                      <span class="tag">HTML5</span>
                    </div>
                    <hr class="opacity-100 mt20 mb15">
                    <div class="fl-meta d-flex align-items-center justify-content-between">
                      <a class="meta fw500 text-start">Location<br><span class="fz14 fw400">London</span></a>
                      <a class="meta fw500 text-start">Rate<br><span class="fz14 fw400">$90 / hr</span></a>
                      <a class="meta fw500 text-start">Job Success<br><span class="fz14 fw400">%98</span></a>
                    </div>
                    <div class="d-grid mt15">
                      <a href="page-freelancer-single.html" class="ud-btn btn-white2">View Profile<i class="fal fa-arrow-right-long"></i></a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="freelancer-style1 text-center bdr1 hover-box-shadow mb60">
                  <div class="thumb w90 mb25 mx-auto position-relative rounded-circle">
                    <img class="rounded-circle mx-auto" src="images/team/fl-2.png" alt="">
                    <span class="online"></span>
                  </div>
                  <div class="details">
                    <h5 class="title mb-1">Kristin Watson</h5>
                    <p class="mb-0">Dog Trainer</p>
                    <div class="review"><p><i class="fas fa-star fz10 review-color pr10"></i><span class="dark-color">4.9</span> (595 reviews)</p></div>
                    <div class="skill-tags d-flex align-items-center justify-content-center mb5">
                      <span class="tag">Figma</span>
                      <span class="tag mx10">Sketch</span>
                      <span class="tag">HTML5</span>
                    </div>
                    <hr class="opacity-100 mt20 mb15">
                    <div class="fl-meta d-flex align-items-center justify-content-between">
                      <a class="meta fw500 text-start">Location<br><span class="fz14 fw400">London</span></a>
                      <a class="meta fw500 text-start">Rate<br><span class="fz14 fw400">$90 / hr</span></a>
                      <a class="meta fw500 text-start">Job Success<br><span class="fz14 fw400">%98</span></a>
                    </div>
                    <div class="d-grid mt15">
                      <a href="page-freelancer-single.html" class="ud-btn btn-white2">View Profile<i class="fal fa-arrow-right-long"></i></a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="freelancer-style1 text-center bdr1 hover-box-shadow mb60">
                  <div class="thumb w90 mb25 mx-auto position-relative rounded-circle">
                    <img class="rounded-circle mx-auto" src="images/team/fl-3.png" alt="">
                    <span class="online"></span>
                  </div>
                  <div class="details">
                    <h5 class="title mb-1">Darrell Steward</h5>
                    <p class="mb-0">Medical Assistant</p>
                    <div class="review"><p><i class="fas fa-star fz10 review-color pr10"></i><span class="dark-color">4.9</span> (595 reviews)</p></div>
                    <div class="skill-tags d-flex align-items-center justify-content-center mb5">
                      <span class="tag">Figma</span>
                      <span class="tag mx10">Sketch</span>
                      <span class="tag">HTML5</span>
                    </div>
                    <hr class="opacity-100 mt20 mb15">
                    <div class="fl-meta d-flex align-items-center justify-content-between">
                      <a class="meta fw500 text-start">Location<br><span class="fz14 fw400">London</span></a>
                      <a class="meta fw500 text-start">Rate<br><span class="fz14 fw400">$90 / hr</span></a>
                      <a class="meta fw500 text-start">Job Success<br><span class="fz14 fw400">%98</span></a>
                    </div>
                    <div class="d-grid mt15">
                      <a href="page-freelancer-single.html" class="ud-btn btn-white2">View Profile<i class="fal fa-arrow-right-long"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- CTA Banner -->
    <section class="cta-banner-about2 at-home10-2 mx-auto position-relative pt60-lg pb60-lg">
      <div class="container">
        <div class="row align-items-center wow fadeInDown" data-wow-delay="400ms">
          <div class="col-lg-7 col-xl-5 offset-xl-1 wow fadeInRight mb60-xs mb100-md">
            <div class="mb30">
              <div class="main-title">
                <h2 class="title">A whole world of freelance <br class="d-none d-xl-block"> talent at your fingertips</h2>
              </div>
            </div>
            <div class="why-chose-list">
              <div class="list-one d-flex align-items-start mb30">
                <span class="list-icon flex-shrink-0 flaticon-badge"></span>
                <div class="list-content flex-grow-1 ml20">
                  <h4 class="mb-1">Proof of quality</h4>
                  <p class="text mb-0 fz15">Check any pro’s work samples, client reviews, and identity <br class="d-none d-lg-block"> verification.</p>
                </div>
              </div>
              <div class="list-one d-flex align-items-start mb30">
                <span class="list-icon flex-shrink-0 flaticon-money"></span>
                <div class="list-content flex-grow-1 ml20">
                  <h4 class="mb-1">No cost until you hire</h4>
                  <p class="text mb-0 fz15">Interview potential fits for your job, negotiate rates, and only pay <br class="d-none d-lg-block"> for work you approve.</p>
                </div>
              </div>
              <div class="list-one d-flex align-items-start mb30">
                <span class="list-icon flex-shrink-0 flaticon-security"></span>
                <div class="list-content flex-grow-1 ml20">
                  <h4 class="mb-1">Safe and secure</h4>
                  <p class="text mb-0 fz15">Focus on your work knowing we help protect your data and privacy. We’re here with 24/7 support if you need it.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-5 col-xl-4 wow fadeInLeft">
            <div class="listbox-style1 px30 py-5 bdrs16 bgc-dark position-relative">
              <div class="list-style1">
                <ul class="mb-0">
                  <li class="text-white fw500"><i class="far fa-check dark-color bgc-white"></i>The best for every budget</li>
                  <li class="text-white fw500"><i class="far fa-check dark-color bgc-white"></i>Quality work done quickly</li>
                  <li class="text-white fw500"><i class="far fa-check dark-color bgc-white"></i>Protected payments, every time</li>
                  <li class="text-white fw500 mb-0"><i class="far fa-check dark-color bgc-white"></i>24/7 support</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <img class="home10-cta-img bdrs24" src="images/about/about-10.jpg" alt="">
    </section>

    <!-- Our Testimonials -->
    <section class="our-testimonial">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mx-auto wow fadeInUp" data-wow-delay="300ms">
            <div class="main-title text-center">
              <h2>Testimonials</h2>
              <p class="paragraph">Interdum et malesuada fames ac ante ipsum</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-8 m-auto wow fadeInUp" data-wow-delay="500ms">
            <div class="testimonial-style2">
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade" id="pills-1st" role="tabpanel" aria-labelledby="pills-1st-tab">
                  <div class="testi-content text-md-center">
                    <span class="icon fas fa-quote-left"></span>
                    <h4 class="testi-text">"Our family was traveling via bullet train between cities in Japan with our luggage - the location for this hotel made that so easy. Agoda price was fantastic. "</h4>
                    <h6 class="name">Ali Tufan</h6>
                    <p class="design">Product Manager, Apple Inc</p>
                  </div>
                </div>
                <div class="tab-pane fade show active" id="pills-2nd" role="tabpanel" aria-labelledby="pills-2nd-tab">
                  <div class="testi-content text-md-center">
                    <span class="icon fas fa-quote-left"></span>
                    <h4 class="testi-text">"Our family was traveling via bullet train between cities in Japan with our luggage - the location for this hotel made that so easy. Agoda price was fantastic. "</h4>
                    <h6 class="name">Ali Tufan</h6>
                    <p class="design">Product Manager, Apple Inc</p>
                  </div>
                </div>
                <div class="tab-pane fade" id="pills-3rd" role="tabpanel" aria-labelledby="pills-3rd-tab">
                  <div class="testi-content text-md-center">
                    <span class="icon fas fa-quote-left"></span>
                    <h4 class="testi-text">"Our family was traveling via bullet train between cities in Japan with our luggage - the location for this hotel made that so easy. Agoda price was fantastic. "</h4>
                    <h6 class="name">Ali Tufan</h6>
                    <p class="design">Product Manager, Apple Inc</p>
                  </div>
                </div>
                <div class="tab-pane fade" id="pills-4th" role="tabpanel" aria-labelledby="pills-4th-tab">
                  <div class="testi-content text-md-center">
                    <span class="icon fas fa-quote-left"></span>
                    <h4 class="testi-text">"Our family was traveling via bullet train between cities in Japan with our luggage - the location for this hotel made that so easy. Agoda price was fantastic. "</h4>
                    <h6 class="name">Ali Tufan</h6>
                    <p class="design">Product Manager, Apple Inc</p>
                  </div>
                </div>
                <div class="tab-pane fade" id="pills-5th" role="tabpanel" aria-labelledby="pills-5th-tab">
                  <div class="testi-content text-md-center">
                    <span class="icon fas fa-quote-left"></span>
                    <h4 class="testi-text">"Our family was traveling via bullet train between cities in Japan with our luggage - the location for this hotel made that so easy. Agoda price was fantastic. "</h4>
                    <h6 class="name">Ali Tufan</h6>
                    <p class="design">Product Manager, Apple Inc</p>
                  </div>
                </div>
              </div>
              <div class="tab-list position-relative">
                <ul class="nav nav-pills justify-content-md-center" id="pills-tab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link ps-0" id="pills-1st-tab" data-bs-toggle="pill" data-bs-target="#pills-1st" type="button" role="tab" aria-controls="pills-1st" aria-selected="true"><img src="images/testimonials/testi-1.png" alt=""></button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-2nd-tab" data-bs-toggle="pill" data-bs-target="#pills-2nd" type="button" role="tab" aria-controls="pills-2nd" aria-selected="false"><img src="images/testimonials/testi-2.png" alt=""></button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-3rd-tab" data-bs-toggle="pill" data-bs-target="#pills-3rd" type="button" role="tab" aria-controls="pills-3rd" aria-selected="false"><img src="images/testimonials/testi-3.png" alt=""></button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-4th-tab" data-bs-toggle="pill" data-bs-target="#pills-4th" type="button" role="tab" aria-controls="pills-4th" aria-selected="false"><img src="images/testimonials/testi-4.png" alt=""></button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link pe-0" id="pills-5th-tab" data-bs-toggle="pill" data-bs-target="#pills-5th" type="button" role="tab" aria-controls="pills-5th" aria-selected="false"><img src="images/testimonials/testi-5.png" alt=""></button>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- CTA Banner -->
    <section class="cta-banner-about2 at-home10 mx-auto position-relative pt60-lg pb30-lg">
      <img class="cta-about2-img at-home10 bdrs24 d-none d-xl-block" src="images/about/about-9.jpg" alt="">
      <div class="container">
        <div class="row">
          <div class="col-xl-5 offset-xl-6 wow fadeInUp" data-wow-delay="200ms">
            <div class="main-title">
              <h2 class="title text-capitalize">Need something done?</h2>
              <p class="text">Most viewed and all-time top-selling services</p>
            </div>
          </div>
        </div>
        <div class="row wow fadeInDown" data-wow-delay="400ms">
          <div class="col-xl-9 offset-xl-3">
            <div class="row">
              <div class="col-sm-6 col-lg-4">
                <div class="iconbox-style9 default-box-shadow1 bgc-white p40 bdrs12 position-relative mb30">
                  <span class="icon fz40 flaticon-cv"></span>
                  <h4 class="iconbox-title mt20">Post a job</h4>
                  <p class="text mb-0">It’s free and easy to post a job.<br class="d-none d-md-block"> Simply fill in a title, description.</p>
                </div>
              </div>
              <div class="col-sm-6 col-lg-4">
                <div class="iconbox-style9 default-box-shadow1 bgc-white p40 bdrs12 position-relative mb30">
                  <span class="icon fz40 flaticon-web-design"></span>
                  <h4 class="iconbox-title mt20">Choose freelancers</h4>
                  <p class="text mb-0">It’s free and easy to post a job.<br class="d-none d-md-block"> Simply fill in a title, description.</p>
                </div>
              </div>
              <div class="col-sm-6 col-lg-4">
                <div class="iconbox-style9 default-box-shadow1 bgc-white p40 bdrs12 position-relative mb30">
                  <span class="icon fz40 flaticon-secure"></span>
                  <h4 class="iconbox-title mt20">Pay safely</h4>
                  <p class="text mb-0">It’s free and easy to post a job.<br class="d-none d-md-block"> Simply fill in a title, description.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Pricing Table -->
    <section class="our-pricing pb90 pb30-md">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 m-auto wow fadeInUp">
            <div class="main-title text-center mb30">
              <h2 class="title">Membership Plans</h2>
              <p class="paragraph mt10">Give your visitor a smooth online experience with a solid UX design</p>
            </div>
          </div>
        </div>
        <div class="row wow fadeInUp" data-wow-delay="200ms">
          <div class="col-lg-12">
            <div class="pricing_packages_top d-flex align-items-center justify-content-center mb60">
              <div class="toggle-btn">
                <span class="pricing_save1 dark-color ff-heading">Billed Monthly</span>
                <label class="switch">
                  <input type="checkbox" id="checbox" onclick="check()"/>
                  <span class="pricing_table_switch_slide round"></span>
                </label>
                <span class="pricing_save2 dark-color ff-heading">Billed Yearly</span>
                <span class="pricing_save3">Save 20%</span>
              </div>
            </div>
          </div>
        </div>
        <div class="row wow fadeInUp" data-wow-delay="300ms">
          <div class="col-sm-6 col-xl-3">
            <div class="pricing_packages text-center bdrs16 overflow-hidden">
              <div class="heading mb10">
                <h1 class="text2">$29 <small>/ monthly</small></h1>
                <h1 class="text1">$39 <small>/ monthly</small></h1>
                <h4 class="package_title mt-2">Basic Plan</h4>
              </div>
              <div class="details">
                <p class="text mb30">One time fee for one listing or task highlighted in search results.</p>
                <div class="pricing-list mb40">
                  <ul class="px-0">
                    <li>1 Listing</li>
                    <li>30 Days Visibility</li>
                    <li>Highlighted in Search Results</li>
                    <li>4 Revisions</li>
                    <li>9 days Delivery Time</li>
                    <li>Products Support</li>
                  </ul>
                </div>
                <div class="d-grid">
                  <a href="" class="ud-btn btn-dark-border">Buy Now<i class="fal fa-arrow-right-long"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-xl-3">
            <div class="pricing_packages active text-center bdrs16 overflow-hidden">
              <div class="heading mb10">
                <h1 class="text2">$49 <small>/ monthly</small></h1>
                <h1 class="text1">$59 <small>/ monthly</small></h1>
                <h4 class="package_title mt-2">Standard Plan</h4>
              </div>
              <div class="details">
                <p class="text mb30">One time fee for one listing or task highlighted in search results.</p>
                <div class="pricing-list mb40">
                  <ul class="px-0">
                    <li>1 Listing</li>
                    <li>30 Days Visibility</li>
                    <li>Highlighted in Search Results</li>
                    <li>4 Revisions</li>
                    <li>9 days Delivery Time</li>
                    <li>Products Support</li>
                  </ul>
                </div>
                <div class="d-grid">
                  <a href="" class="ud-btn btn-dark-border">Buy Now<i class="fal fa-arrow-right-long"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-xl-3">
            <div class="pricing_packages text-center bdrs16 overflow-hidden">
              <div class="heading mb10">
                <h1 class="text2">$89 <small>/ monthly</small></h1>
                <h1 class="text1">$99 <small>/ monthly</small></h1>
                <h4 class="package_title mt-2">Extended Plan</h4>
              </div>
              <div class="details">
                <p class="text mb30">One time fee for one listing or task highlighted in search results.</p>
                <div class="pricing-list mb40">
                  <ul class="px-0">
                    <li>1 Listing</li>
                    <li>30 Days Visibility</li>
                    <li>Highlighted in Search Results</li>
                    <li>4 Revisions</li>
                    <li>9 days Delivery Time</li>
                    <li>Products Support</li>
                  </ul>
                </div>
                <div class="d-grid">
                  <a href="" class="ud-btn btn-dark-border">Buy Now<i class="fal fa-arrow-right-long"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-xl-3">
            <div class="pricing_packages text-center bdrs16 overflow-hidden">
              <div class="heading mb10">
                <h1 class="text2">$129 <small>/ monthly</small></h1>
                <h1 class="text1">$139 <small>/ monthly</small></h1>
                <h4 class="package_title mt-2">Enterprise Plan</h4>
              </div>
              <div class="details">
                <p class="text mb30">One time fee for one listing or task highlighted in search results.</p>
                <div class="pricing-list mb40">
                  <ul class="px-0">
                    <li>1 Listing</li>
                    <li>30 Days Visibility</li>
                    <li>Highlighted in Search Results</li>
                    <li>4 Revisions</li>
                    <li>9 days Delivery Time</li>
                    <li>Products Support</li>
                  </ul>
                </div>
                <div class="d-grid">
                  <a href="" class="ud-btn btn-dark-border">Buy Now<i class="fal fa-arrow-right-long"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Our CTA -->
    <section class="our-cta cta-home3-last pt90 pb90 pt60-md pb60-md mt150 mt0-lg bdrs24">
      <div class="container">
        <div class="row justify-content-between">
          <div class="col-md-6 col-lg-7 col-xl-5 wow fadeInLeft">
            <div class="cta-style3">
              <h2 class="cta-title mb-3">Find the talent needed to get your business growing.</h2>
              <p class="cta-text mb-4">Advertise your jobs to millions of monthly users and search 15.8 million CVs</p>
              <a href="page-contact.html" class="ud-btn btn-dark">Get Started <i class="fal fa-arrow-right-long"></i></a>
            </div>
          </div>
          <div class="col-md-6 col-lg-5 col-xl-5 position-relative wow zoomIn">
            <div class="cta-img">
              <img class="w-100" src="images/about/about-5.png" alt="">
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Our Partners -->
    <section class="our-partners">
      <div class="container">
        <div class="row wow fadeInUp">
          <div class="col-lg-12">
            <div class="main-title text-center">
              <h6>Trusted by the world’s best</h6>
            </div>
          </div>
        </div>
        <div class="row wow fadeInUp">
          <div class="col-6 col-md-4 col-xl-2">
            <div class="partner_item text-center mb30-lg"><img class="wa m-auto" src="images/partners/1.png" alt="1.png"></div>
          </div>
          <div class="col-6 col-md-4 col-xl-2">
            <div class="partner_item text-center mb30-lg"><img class="wa m-auto" src="images/partners/2.png" alt="2.png"></div>
          </div>
          <div class="col-6 col-md-4 col-xl-2">
            <div class="partner_item text-center mb30-lg"><img class="wa m-auto" src="images/partners/3.png" alt="3.png"></div>
          </div>
          <div class="col-6 col-md-4 col-xl-2">
            <div class="partner_item text-center mb30-lg"><img class="wa m-auto" src="images/partners/4.png" alt="4.png"></div>
          </div>
          <div class="col-6 col-md-4 col-xl-2">
            <div class="partner_item text-center mb30-lg"><img class="wa m-auto" src="images/partners/5.png" alt="5.png"></div>
          </div>
          <div class="col-6 col-md-4 col-xl-2">
            <div class="partner_item text-center mb30-lg"><img class="wa m-auto" src="images/partners/6.png" alt="6.png"></div>
          </div>
        </div>
      </div>
    </section>

    <!-- Our Footer -->
    <section class="footer-style1 at-home10 pt25 pb-0">
      <div class="container">
        <div class="row bb-white-light pb10 mb60">
          <div class="col-md-7">
            <div class="d-block text-center text-md-start justify-content-center justify-content-md-start d-md-flex align-items-center mb-3 mb-md-0">
              <a class="fz17 fw500 text-white mr15-md mr30" href="">Terms of Service</a>
              <a class="fz17 fw500 text-white mr15-md mr30" href="">Privacy Policy</a>
              <a class="fz17 fw500 text-white" href="">Site Map</a>
            </div>
          </div>
          <div class="col-md-5">
            <div class="social-widget text-center text-md-end">
              <div class="social-style1">
                <a class="text-white me-2 fw500 fz17" href="">Follow us</a>
                <a href=""><i class="fab fa-facebook-f list-inline-item"></i></a>
                <a href=""><i class="fab fa-twitter list-inline-item"></i></a>
                <a href=""><i class="fab fa-instagram list-inline-item"></i></a>
                <a href=""><i class="fab fa-linkedin-in list-inline-item"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6 col-lg-3">
            <div class="link-style1 mb-4 mb-sm-5">
              <h5 class="text-white mb15">About</h5>
              <div class="link-list">
                <a href="">Careers</a>
                <a href="">Press & News</a>
                <a href="">Partnerships</a>
                <a href="">Privacy Policy</a>
                <a href="">Terms of Service</a>
                <a href="">Investor Relations</a>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="link-style1 mb-4 mb-sm-5">
              <h5 class="text-white mb15">Categories</h5>
              <ul class="ps-0">
                <li><a href="">Graphics & Design</a></li>
                <li><a href="">Digital Marketing</a></li>
                <li><a href="">Writing & Translation</a></li>
                <li><a href="">Video & Animation</a></li>
                <li><a href="">Music & Audio</a></li>
                <li><a href="">Programming & Tech</a></li>
                <li><a href="">Data</a></li>
                <li><a href="">Business</a></li>
                <li><a href="">Lifestyle</a></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="link-style1 mb-4 mb-sm-5">
              <h5 class="text-white mb15">Support</h5>
              <ul class="ps-0">
                <li><a href="">Help & Support</a></li>
                <li><a href="">Trust & Safety</a></li>
                <li><a href="">Selling on Freeio</a></li>
                <li><a href="">Buying on Freeio</a></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="footer-widget">
              <div class="footer-widget mb-4 mb-sm-5">
                <div class="mailchimp-widget">
                  <h5 class="title text-white mb20">Subscribe</h5>
                  <div class="mailchimp-style1">
                    <input type="email" class="form-control" placeholder="Your email address">
                    <button type="submit">Send</button>
                  </div>
                </div>
              </div>
              <div class="app-widget mb-4 mb-sm-5">
                <h5 class="title text-white mb20">Apps</h5>
                <div class="row mb-4 mb-lg-5">
                  <div class="col-lg-12">
                    <a class="app-list d-flex align-items-center mb10" href="">
                      <i class="fab fa-apple fz17 mr15"></i>
                      <h6 class="app-title fz15 fw400 mb-0">iOS App</h6>
                    </a>
                    <a class="app-list d-flex align-items-center" href="">
                      <i class="fab fa-google-play fz15 mr15"></i>
                      <h6 class="app-title fz15 fw400 mb-0">Android App</h6>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container white-bdrt1 py-4">
        <div class="row align-items-center">
          <div class="col-md-6">
            <div class="text-center text-lg-start">
              <p class="copyright-text mb-2 mb-md-0 text-white-light ff-heading">© Freeio. 2023 CreativeLayers. All rights reserved.</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="footer_bottom_right_btns text-center text-lg-end">
              <ul class="p-0 m-0">
                <li class="list-inline-item">
                  <select class="selectpicker show-tick">
                    <option>US$ USD</option>
                    <option>Euro</option>
                    <option>Pound</option>
                  </select>
                </li>
                <li class="list-inline-item">
                  <select class="selectpicker show-tick">
                    <option>English</option>
                    <option>French</option>
                    <option>Italian</option>
                    <option>Spanish</option>
                    <option>Turkey</option>
                  </select>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <a class="scrollToHome" href="#"><i class="fas fa-angle-up"></i></a>
  </div>
<!-- End Featured Product -->
 @stop
