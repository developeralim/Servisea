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
              <h4 class="title mb30">Billing details</h4>
              <div class="checkout_coupon">
                <form class="form2" id="coupon_form" name="contact_form" action="{{route('checkout')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                      <div class="mb25">
                        <h6 class="mb15">First Name</h6>
                        <input class="form-control" type="text" name="First_Name"  placeholder="Ali">
                        @if ($errors->any())
                            @error('First_Name')
                                    <div class="error" style="color:#FF0000">{{ $message }}</div>
                            @enderror
                        @endif
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="mb25">
                        <h6 class="mb15">Last Name</h6>
                        <input class="form-control" type="text" name="Last_Name" placeholder="Tufan">
                        @if ($errors->any())
                            @error('Last_Name')
                                    <div class="error" style="color:#FF0000">{{ $message }}</div>
                            @enderror
                        @endif
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="mb25">
                        <h6 class="mb15">Country</h6>
                        <input class="form-control" type="text" name="Country" placeholder="Mauritius">
                        @if ($errors->any())
                            @error('Country')
                                    <div class="error" style="color:#FF0000">{{ $message }}</div>
                            @enderror
                        @endif
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="mb25">
                        <h6 class="mb15">Phone</h6>
                        <input class="form-control" type="text" name="Phone" placeholder="+23059266692">
                        @if ($errors->any())
                            @error('Phone')
                                    <div class="error" style="color:#FF0000">{{ $message }}</div>
                            @enderror
                        @endif
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="mb25">
                        <h6 class="mb15">Email Address</h6>
                        <input class="form-control" type="email" name="Email" placeholder="Ali@gmail.com">
                        @if ($errors->any())
                            @error('Email')
                                    <div class="error" style="color:#FF0000">{{ $message }}</div>
                            @enderror
                        @endif
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
                  @if(isset($det))
                    @if(count($det) != 0)
                        <li class="mb20"><p class="body-color">Service <span class="float-end">$ {{ ($det["ORDER_AMOUNT"]) }}</span></p></li>
                        <li class=" bdrb1 mb15"><h6>Subtotal <span class="float-end">${{ ($det["ORDER_AMOUNT"]) }}</span></h6></li>
                        <li><h6>Total <span class="float-end">${{ ($det["ORDER_AMOUNT"]) }}</span></h6></li>
                    @endif
                  @endif

                </ul>
              </div>
              <div class="payment_widget default-box-shadow1">
                <h4 class="title">Payment</h4>
                <div class="radio-element">
                  <div class="form-check d-flex align-items-center mb15">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked="checked">
                    <label class="form-check-label" for="flexRadioDefault1">Visa/Mastercard</label>
                  </div>
                  <!-- <div class="pw-details">
                    <p class="fz13 mb30">Make your payment directly into our bank account. Please use your Order ID as the payment reference.Your order will not be shipped until the funds have cleared in our account.</p>
                  </div> -->
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

