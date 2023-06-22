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
@if(isset($orders))
    @foreach($orders as $order)
<div class="body_content">
    <!-- Blog Section -->
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
    <section class="pt40 pb0">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="main-title">
              <h2 class="title">Order Details</h2>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Shop Cart Area -->
    <section class="shop-checkout pt-0">
      <div class="container">
        <div class="row wow fadeInUp" data-wow-delay="300ms">
        <div class="col-lg-8">
        <div class="checkout_form">

            <h4 class="title mb30 ">Deliverable</h4>
              <div class="checkout_coupon">
                <form class="form2" id="coupon_form"  enctype="multipart/form-data" action="{{route('closeOrder',$order->ORDER_ID)}}" name="order_form" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                      <div class="mb25">
                        @if (Session::get('freelancer') != null )
                        <div class="d-grid mt15">
                        <h5 class="title mb30 ">Please upload the deliverable here</h5>
                        <input class="form-control" multiple name="order_deliverables[]" value="" type="file">
                        <div class="d-grid gap-5 d-md-block mt15">
                            <a href="#" type="submit" class="ud-btn btn-warning">Cancel Order</a>
                            <a class="ud-btn btn-light-thm">
                            <button type="submit">Close Order</button>
                            Close Order</a>
                        </div>
                        </div>
                        @else
                        <h3 class="title mb30 ">Please Find Attached your file here</h3>
                        @if ($order->ORDER_DELIVERABLES != null )
                        <input class="form-control" type="file">
                        <div class="d-grid gap-5 d-md-block mt15">
                        <a href="#" class="ud-btn btn-warning">Request for Modification</a>
                        <a href="#" class="ud-btn btn-light-thm">Confirm Order</a>
                       </div>
                       @else
                       <h6 class="mb15">Expected Delivery: {{$order->ORDER_DUE}}</h6>
                        @endif
                       @endif
                      </div>
                    </div>
                  </div>
                </form>
              </div>
                @if($order->ORDER_STATUS == 'COMPLETED')
              <div class="bsp_reveiw_wrt">
                  <h6 class="fz17">Add a Review</h6>
                  <p class="text">Your email address will not be published. Required fields are marked *</p>
                  <h6>Your rating of this product</h6>
                  <div class="d-flex">
                    <i class="fas fa-star review-color"></i>
                    <i class="far fa-star review-color ms-2"></i>
                    <i class="far fa-star review-color ms-2"></i>
                    <i class="far fa-star review-color ms-2"></i>
                    <i class="far fa-star review-color ms-2"></i>
                  </div>
                  <form class="comments_form mt30 mb30-md">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="mb-4">
                          <label class="fw500 fz16 ff-heading dark-color mb-2">Comment</label>
                          <textarea class="pt15" rows="6" placeholder="There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text."></textarea>
                        </div>
                      </div>

                      <div class="col-md-12">

                        <a href="" class="ud-btn btn-thm">Send<i class="fal fa-arrow-right-long"></i></a>
                      </div>

                    </div>
                  </form>
                </div>
                @endif
            </div>
        </div>
        <div class="col-lg-4">
          <div class="shop-sidebar ms-lg-auto">
            <div class="order_sidebar_widget default-box-shadow1">
              <h4 class="title">Order Details</h4>
              <p class="text">Order Number:  <span class="float-end">{{$order->ORDER_ID}}</span></p>
              <p class="text">Ordered from:  <span class="float-end">{{$order->USERNAME}}</span></p>
              <p class="text">Total price:   <span class="float-end">${{$order->ORDER_AMOUNT}}</span></p>
              <p class="text">Delivery Date: <span class="float-end">{{$order->ORDER_DUE}}</span></p>

              <div class="d-grid mt40">
              @if (Session::get('freelancer') != null )
              <a class="ud-btn btn-warning" href="page-shop-checkout.html">Open Dispute<i class="fal fa-arrow-right-long"></i></a>
                <br>
              <a class="ud-btn btn-light-thm" href="page-shop-checkout.html">Contact Project Owner<i class="fal fa-arrow-right-long"></i></a>
              @else
                <a class="ud-btn btn-warning" href="page-shop-checkout.html">Open Dispute<i class="fal fa-arrow-right-long"></i></a>
                <br>
                <a class="ud-btn btn-light-thm" href="page-shop-checkout.html">Contact Seller<i class="fal fa-arrow-right-long"></i></a>
              @endif
            </div>
            </div>
          </div>
        </div>
        </div>
      </div>
    </section>



  </div>
  @endforeach
 @endif

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

@stop

