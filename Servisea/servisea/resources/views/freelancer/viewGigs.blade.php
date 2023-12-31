<!DOCTYPE html>
<html lang="en">

@extends('user.user_master')

@section('user_page')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Servisea/view all Gigs</title>
@stop

@section('user_style')

@stop

@section('user-main-content')

<div class="wrapper ovh">
  <div class="body_content">
    <section class="categories_list_section overflow-hidden">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="listings_category_nav_list_menu">
                @if(isset($cat))
                <ul class="mb0 d-flex ps-0">
                    <li><a  @if($cat == 0) class="active" @endif href="{{ route('viewAllGig')}}">All Categories</a></li>
                    <li><a  @if($cat == 1) class="active" @endif href="{{route('viewAllGig',[0,Crypt::encryptString(1)])}}">Graphics & Design</a></li>
                    <li><a  @if($cat == 2) class="active" @endif href="{{route('viewAllGig',[0,Crypt::encryptString(2)])}}">Digital Marketing</a></li>
                    <li><a  @if($cat == 3) class="active" @endif href="{{route('viewAllGig',[0,Crypt::encryptString(3)])}}">Writing & Translation</a></li>
                    <li><a  @if($cat == 4) class="active" @endif href="{{route('viewAllGig',[0,Crypt::encryptString(4)])}}">Video & Animation</a></li>
                    <li><a  @if($cat == 6) class="active" @endif href="{{route('viewAllGig',[0,Crypt::encryptString(6)])}}">Music & Audio</a></li>
                    <li><a  @if($cat == 7) class="active" @endif href="{{route('viewAllGig',[0,Crypt::encryptString(7)])}}">Programming & Tech</a></li>
                    <li><a  @if($cat == 5) class="active" @endif href="{{route('viewAllGig',[0,Crypt::encryptString(5)])}}">Business</a></li>
                </ul>
                @endif
            </div>
          </div>
        </div>
      </div>
    </section>

    @if(isset($gigs))
    <!-- Listings All Lists -->
    <section class="pt30 pb90">
      <div class="container">
        <div class="row align-items-center mb20">
          <div class="col-6 col-sm-6 col-lg-9 pe-0">
            <div class="text-center text-sm-start">
              <div class="dropdown-lists">
                <ul class="p-0 mb-0 text-center text-sm-start">

                  <li class="list-inline-item position-relative d-none d-xl-inline-block">
                    <button class="open-btn mb10 dropdown-toggle" type="button" data-bs-toggle="dropdown">Delivery Time <i class="fa fa-angle-down ms-2"></i></button>
                    <div class="dropdown-menu">
                      <div class="widget-wrapper pb25 mb0">
                        <div class="radio-element">
                          <div class="form-check d-flex align-items-center mb10">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">Express 24H</label>
                          </div>
                          <div class="form-check d-flex align-items-center mb10">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked="checked">
                            <label class="form-check-label" for="flexRadioDefault2">Up to 3 days</label>
                          </div>
                          <div class="form-check d-flex align-items-center mb10">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3">
                            <label class="form-check-label" for="flexRadioDefault3">Up to 7 days</label>
                          </div>
                          <div class="form-check d-flex align-items-center">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault4">
                            <label class="form-check-label" for="flexRadioDefault4">Anytime</label>
                          </div>
                        </div>
                      </div>
                      <button class="done-btn ud-btn btn-thm drop_btn">Apply<i class="fal fa-arrow-right-long"></i></button>
                    </div>
                  </li>
                  <li class="list-inline-item position-relative d-none d-xl-inline-block">
                    <button class="open-btn mb10 dropdown-toggle" type="button" data-bs-toggle="dropdown">Budget <i class="fa fa-angle-down ms-2"></i></button>
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
                    <button class="open-btn mb10 dropdown-toggle" type="button" data-bs-toggle="dropdown">Level <i class="fa fa-angle-down ms-2"></i></button>
                    <div class="dropdown-menu">
                      <div class="widget-wrapper pb25 mb0">
                        <div class="checkbox-style1">
                          <label class="custom_checkbox">Top Rated Seller
                            <input type="checkbox">
                            <span class="checkmark"></span>
                          </label>
                          <label class="custom_checkbox">Level Two
                            <input type="checkbox" checked="checked">
                            <span class="checkmark"></span>
                          </label>
                          <label class="custom_checkbox">Level One
                            <input type="checkbox">
                            <span class="checkmark"></span>
                          </label>
                          <label class="custom_checkbox">New Seller
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
          <div class="col-6 col-sm-6 col-lg-3 px-0">
            <div class="page_control_shorting mb10 d-flex align-items-center justify-content-center justify-content-sm-end">
              <div class="pcs_dropdown dark-color pr10 pr0-xs"><span>Sort by</span>
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


        @foreach ($gigs as $gig)
          <div class="col-sm-6 col-xl-3">
          <div class="listing-style1">
           <div class="list-thumb">
           @if(isset($gigMedia))
                @foreach ($gigMedia as $gigmed)
                    @if($gigmed->GIG_ID == $gig->GIG_ID)
                    <img class="w-100" src={{asset('backend/storage/storage/gig/'.$gigmed->media_path)}}  alt="{{$gigmed->media_path}}">
                    <a a href="" class="listing-fav fz12"><span class="far fa-heart"></span></a>
                    @else
                    <img class="w-100" src="{{asset('backend/THEME/images/gallery/gig_img.png')}}" alt="">
                     <a a href="" class="listing-fav fz12"><span class="far fa-heart"></span></a>
                    @endif
                @endforeach
            @endif

            </div>
              <div class="list-content">
                <p class="list-text body-color fz14 mb-1">{{$gig->GIG_NAME}}</p>
                <h5 class="list-title"><a href="{{route('viewGig',Crypt::encryptString($gig->GIG_ID))}}">{{$gig->GIG_DESCRIPTION}}</a></h5>
                <div class="review-meta d-flex align-items-center">
                  <i class="fas fa-star fz10 review-color me-2"></i>
                  @if(isset($reviews))
                    @foreach ($reviews as $review)
                        @if($review->GIG_ID == $gig->GIG_ID)
                        <p class="mb-0 body-color fz14"><span class="dark-color me-2">{{$review->RATING}}</span>{{$review->COUNT}} reviews</p>
                        @else
                        <p class="mb-0 body-color fz14"><span class="dark-color me-2"></span>No reviews yet</p>
                        @endif
                    @endforeach
                  @endif
                </div>
                <hr class="my-2">
                <div class="list-meta d-flex justify-content-between align-items-center mt15">
                  <a href="{{route('viewFreelancer',Crypt::encryptString($gig->FREELANCER_ID))}}">
                    <span class="position-relative mr10">
                      <img class="rounded-circle" style="width: 60px;" src="{{asset('backend/THEME/images/freelancer_icon.jpg')}}" alt="Freelancer Photo">
                      <span class="online-badge"></span>
                    </span>
                    <span class="fz14">{{$gig->USERNAME}}</span>
                  </a>
                  <div class="budget">
                    <p class="mb-0 body-color">Starting at<span class="fz17 fw500 dark-color ms-1">$ {{$gig->PRICE}}</span></p>
                  </div>
                </div>
              </div>

            </div>
          </div>
          @endforeach

        </div>

        <div class="row">
          <div class="mbp_pagination mt30 text-center">
            <ul class="page_navigation">
              <li class="page-item">
                <a class="page-link" href="#"> <span class="fas fa-angle-left"></span></a>
              </li>
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item " aria-current="page">
                <a class="page-link" href="#">2</span></a>
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

        @else
        <div class="row">
            <h5 style="text-align: center;">No gigs to show</h5>
        </div>


          @endif


      </div>
    </section>
  </div>
</div>

@stop

@section('user_script')


<script src="{{asset('backend/THEME/js/pricing-slider.js')}}"></script>
<script src="{{asset('backend/THEME/js/isotop.js')}}"></script>
<!-- <script type="text/javascript">
  window.onbeforeunload = confirmExit;
  function confirmExit()
  {
    return "your changes will be lost.  Are you sure you want to exit this page?";
  }
</script> -->
@stop

