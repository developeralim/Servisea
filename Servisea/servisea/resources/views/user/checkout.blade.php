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
              <h2 class="title">Shop Checkout</h2>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Shop Checkout Area -->
    <section class="shop-checkout pt-0">
      <div class="container">
        <div class="row wow fadeInUp" data-wow-delay="300ms">
          <div class="col-md-7 col-lg-8">
            <div class="checkout_form">
            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
              <h4 class="title mb30">Billing details</h4>
              <div class="checkout_coupon">
                <form class="form2" id="coupon_form" name="contact_form" action="{{route('checkout')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                      <div class="mb25">
                        <h6 class="mb15">First Name</h6>
                        <input class="form-control" type="text" name="First_Name"  placeholder="Ali">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="mb25">
                        <h6 class="mb15">Last Name</h6>
                        <input class="form-control" type="text" name="Last_Name" placeholder="Tufan">
                      </div>
                    </div>

                    <div class="col-lg-12">
                      <div class="mb25">
                        <h6 class="mb15">Country</h6>
                        <input class="form-control" type="text" name="Country" placeholder="Mauritius">
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="mb25">
                        <h6 class="mb15">Phone</h6>
                        <input class="form-control" type="text" name="Phone" placeholder="Ali">
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="mb25">
                        <h6 class="mb15">Email Address</h6>
                        <input class="form-control" type="email" name="Email" placeholder="Ali">
                      </div>
                    </div>

                  </div>

              </div>
            </div>
          </div>
          <div class="col-md-5 col-lg-4">
            <div class="shop-sidebar ms-md-auto">
              <div class="order_sidebar_widget mb30 default-box-shadow1">
                <h4 class="title">Your Order</h4>
                <ul class="p-0 mb-0">
                  <li class="bdrb1 mb20"><h6>Product <span class="float-end">Subtotal</span></h6></li>
                  <li class="mb20"><p class="body-color">Hoodie x2 <span class="float-end">$59.00</span></p></li>
                  <li class="mb20"><p class="body-color">Seo Books x 1 <span class="float-end">$67.00</span></p></li>
                  <li class=" bdrb1 mb15"><h6>Subtotal <span class="float-end">$178.00</span></h6></li>
                  <li class=" bdrb1 mb15"><h6>Shipping <span class="float-end">$178.00</span></h6></li>
                  <li><h6>Total <span class="float-end">$9,218.00</span></h6></li>
                </ul>
              </div>
              <div class="payment_widget default-box-shadow1">
                <h4 class="title">Payment</h4>
                <div class="radio-element">
                  <div class="form-check d-flex align-items-center mb15">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked="checked">
                    <label class="form-check-label" for="flexRadioDefault1">Direct bank transfer</label>
                  </div>
                  <div class="pw-details">
                    <p class="fz13 mb30">Make your payment directly into our bank account. Please use your Order ID as the payment reference.Your order will not be shipped until the funds have cleared in our account.</p>
                  </div>
                  <div class="form-check d-flex align-items-center mb15">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                    <label class="form-check-label" for="flexRadioDefault2">Check payments</label>
                  </div>
                  <div class="form-check d-flex align-items-center mb15">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3">
                    <label class="form-check-label" for="flexRadioDefault3">Cash on delivery</label>
                  </div>
                  <div class="form-check d-flex align-items-center">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault4">
                    <label class="form-check-label" for="flexRadioDefault4">PayPal</label>
                  </div>
                </div>
              </div>
              <div class="d-grid default-box-shadow2">
                <button  class="ud-btn btn-thm" type="submit">Place Order<i class="fal fa-arrow-right-long"></i></button>
              </div>
              </form>
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

@stop

