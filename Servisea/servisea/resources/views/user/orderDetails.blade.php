<!DOCTYPE html>
<html lang="en">

@extends('user.user_master')

@section('user_page')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
@stop
@section('user_style')
<style>
.rating-header {
    margin-top: -10px;
    margin-bottom: 10px;
}
</style>


@stop

@section('user-main-content')
<div class="body_content">
@if(isset($orders))
    @foreach($orders as $order)
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
        <div class="checkout_coupon">
            <div class="form2">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb25">
                            <div class="d-grid mt15">
                                <div class="service-about">
                                    <h3 class="mb30">Deliverables</h3>
                                    @if ($order->ORDER_DELIVERABLES != null )
                                        @if (isset($orderAttachment))
                                            <div class="educational-quality">
                                            @foreach($orderAttachment as $attachment)
                                                <div class="m-circle text-thm">D</div>
                                                <div class="wrapper mb40">
                                                    <span class="tag">{{date('d-m-Y', strtotime($attachment->created_at))}}</span>
                                                    <h5 class="mt15">{{$attachment->MEDIA_PATH}}</h5>
                                                    <a href="{{route('dlFile',Crypt::encryptString($attachment->MEDIA_PATH))}}" class="btn btn-info btn-lg">
                                                        <span class="glyphicon glyphicon-save-file">Download</span>
                                                    </a>
                                                    <br>
                                                </div>
                                            @endforeach
                                            </div>
                                        @endif
                                    @endif
                                    <br>
                                    <br>
                                    @if (isset($modifications))
                                        @if (!$modifications->isEmpty())
                                        <h3 class="mb30">Modifications Requested</h3>
                                            @foreach($modifications as $modification)
                                                <div class="educational-quality">
                                                    <div class="m-circle text-thm">M</div>
                                                    <div class="wrapper mb40">
                                                        <span class="tag">{{date('d-m-Y', strtotime($modification->updated_at))}}</span>
                                                        <h5 class="mt15">{{$modification->MODIF_REQUIREMENTS}}</h5>
                                                    </div>
                                                    <br>
                                                </div>
                                            @endforeach
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="opacity-100 mb10">
              <div class="checkout_coupon">
                <form class="form2" id="coupon_form"  enctype="multipart/form-data" action="{{route('closeOrder',Crypt::encryptString($order->ORDER_ID))}}" name="order_form" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                      <div class="mb25">
                        @if (Session::get('freelancer') != null )
                        <div class="d-grid mt15">
                            @if ($order->ORDER_DELIVERABLES != null )
                            <h5 class="title mb30 ">Please upload the deliverable here:</h5>
                            <input class="form-control" multiple name="order_deliverables[]" type="file" value="{{$order->ORDER_DELIVERABLES}}">
                            @else
                            <input class="form-control" multiple name="order_deliverables[]" type="file">
                            @endif
                            <br>
                        <div class="d-grid gap-2 d-md-block">
                           <input class="ud-btn btn-warning" type="submit" value="Submit Order">
                           <input class="ud-btn btn-light-thm" type="submit" value="Cancel Order(Request to support employee)">
                        </div>
                        </div>
                        @else
                            @if ($order->ORDER_DELIVERABLES != null )
                                    @if($order->ORDER_STATUS != 'COMPLETED')
                                    <div class="d-grid gap-5 d-md-block mt15">
                                    <!-- Button trigger modal -->
                                        @if(isset($modifications))
                                          @if(!$modifications->isEmpty())
                                                @if($order->REVISION == 'Unlimited' || $order->REVISION == 'UNLIMITED' )
                                                <button type="button" class="ud-btn btn-warning no-border" data-toggle="modal" data-target="#exampleModal">Request For Modification</button>
                                                @elseif((count($modifications)+1)<((int)$order->REVISION))
                                                <button type="button" class="ud-btn btn-warning no-border" data-toggle="modal" data-target="#exampleModal">Request For Modification</button>
                                                @endif
                                            @else
                                            <button type="button" class="ud-btn btn-warning no-border" data-toggle="modal" data-target="#exampleModal">Request For Modification</button>
                                            @endif
                                        @endif
                                    <a href="{{route('confirmOrder',Crypt::encryptString($order->ORDER_ID))}}"><button type="button" href="#" class="ud-btn btn-light-thm no-border">Confirm Order</button></a>
                                    </div>
                                    @endif
                            @else
                                <h6 class="mb15">Expected Delivery: {{$order->ORDER_DUE}}</h6>
                            @endif
                        @endif
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            @if($order->ORDER_STATUS == 'COMPLETED' && Session::get('freelancer') == null)
              <form class="bsp_reveiw_wrt" name="review-form" id="review-form" action="{{route('rateGig',Crypt::encryptString($order->ORDER_ID))}}" method="post">
              @csrf
              @if(isset($review))
              <h6 class="fz17">Review:</h6>
              @else
              <h6 class="fz17">Add a Review</h6>
              @endif
                  <h6>Rating</h6>
                  <div class="form-group" id="rating-ability-wrapper">
                    <label class="control-label" for="rating">
                    <!-- <span class="field-label-header">How would you rate your ability to use the computer and access internet?*</span><br> -->
                    <span class="field-label-info"></span>
                @if(isset($review))
                    @if(!$review->isEmpty())
                        <input type="hidden" id="selected_rating" name="selected_rating" value="{{$review[0]->RATING}}" required="required">
                        </label>
                        @for ($i = 0; $i < $review[0]->RATING; $i++)
                        <button disabled class="btnrating btn-warning btn btn-default btn-lg" data-attr="{{$i}}" id="rating-star-{{$i}}">
                            <i class="fa fa-star" aria-hidden="true"></i>
                        </button>
                        @endfor
                    @else
                    <input type="hidden" id="selected_rating" name="selected_rating" value="" required="required">
                    </label>
                    <h2 class="bold rating-header" style="">
                    <span class="selected-rating">0</span><small> / 5</small>
                    </h2>
                    <button type="button" class="btnrating btn btn-default btn-lg" data-attr="1" id="rating-star-1">
                        <i class="fa fa-star" aria-hidden="true"></i>
                    </button>
                    <button type="button" class="btnrating btn btn-default btn-lg" data-attr="2" id="rating-star-2">
                        <i class="fa fa-star" aria-hidden="true"></i>
                    </button>
                    <button type="button" class="btnrating btn btn-default btn-lg" data-attr="3" id="rating-star-3">
                        <i class="fa fa-star" aria-hidden="true"></i>
                    </button>
                    <button type="button" class="btnrating btn btn-default btn-lg" data-attr="4" id="rating-star-4">
                        <i class="fa fa-star" aria-hidden="true"></i>
                    </button>
                    <button type="button" class="btnrating btn btn-default btn-lg" data-attr="5" id="rating-star-5">
                        <i class="fa fa-star" aria-hidden="true"></i>
                    </button>
                    @endif
                @endif
                </div>
                  <div class="comments_form mt30 mb30-md">
                  @if(isset($review))
                    <div class="row">
                      <div class="col-md-12">
                        <div class="mb-4">
                          <label class="fw500 fz16 ff-heading dark-color mb-2">Comment</label>
                            @if(!$review->isEmpty())
                            <p class="pt15" name="reviewDescription" rows="6" placeholder="Enter your comment review here!">{{$review[0]->DESCRIPTION}}</p>
                            @else
                            <textarea class="pt15" name="reviewDescription" rows="6"  placeholder="Enter your comment review here!"></textarea>
                            @endif
                        </div>
                      </div>
                      @if($review->isEmpty())
                      <div class="col-md-12">
                        <button class="ud-btn btn-thm" type="submit">Send</button>
                      </div>
                      @endif
                    </div>
                  @endif
                  </div>
                </form>
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
              @if(isset($dispute))
                @if($dispute->isEmpty())
                    <button type="button" class="ud-btn btn-warning no-border" data-toggle="modal" data-target="#disputeModal">Open Dispute</button>
                        <br>
                @else
                    <button type="button" class="ud-btn btn-warning no-border" data-toggle="modal" data-target="#disputeModal">View Dispute</button>
                        <br>
                @endif
              @endif
                <a class="ud-btn btn-light-thm" href="page-shop-checkout.html">Contact Project Owner<i class="fal fa-arrow-right-long"></i></a>
            @else
              @if(isset($dispute))
                @if($dispute->isEmpty())
                <button type="button" class="ud-btn btn-warning no-border" data-toggle="modal" data-target="#disputeModal">Open Dispute</button>
                <a type="button" href="{{route('viewDispute',Crypt::encryptString($order->ORDER_ID))}}" class="ud-btn btn-warning no-border">View Dispute</a>
                <br>
                @else
                <a type="button" href="{{route('viewDispute',Crypt::encryptString($order->ORDER_ID))}}" class="ud-btn btn-warning no-border">View Dispute</a>
                <br>
                @endif
               @endif
                <a class="ud-btn btn-light-thm" href="page-shop-checkout.html">Contact Seller<i class="fal fa-arrow-right-long"></i></a>
            @endif
            </div>
            </div>
          </div>
        </div>
        </div>
      </div>
    </section>
  @endforeach
 @endif

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Request For Modification</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('createModif',Crypt::encryptString($order->ORDER_ID))}}" method="POST">
            @csrf
        <div class="col-md-12">
            <div class="mb10">
                <label class="heading-color ff-heading fw500 mb10">New Modification</label>
                <textarea cols="30" rows="6" name="modifications" placeholder="Description"></textarea>
            </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="disputeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Dispute</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('createDispute',Crypt::encryptString($order->ORDER_ID))}}" method="POST">
            @csrf
      <div class="modal-body">
        <div class="col-sm-12">
            <div class="mb20">
                <label class="heading-color ff-heading fw500 mb10">Dispute Title</label>
                <input type="text" name="Dispute_Title" class="form-control" placeholder="i will">
            </div>
            </div>
        <div class="col-md-12">
            <div class="mb10">
                <label class="heading-color ff-heading fw500 mb10">Dispute Detail</label>
                <textarea cols="30" rows="6" name="Dispute_Description" placeholder="Description"></textarea>
            </div>
            </div>
            <div class="col-sm-12">
            <div class="mb20">
                <div class="form-style1">
                <label class="heading-color ff-heading fw500 mb10">Issue</label>
                <div class="bootselect-multiselect">
                    <select name="Department" class="selectpicker">
                    @if(isset($departments))
                        @foreach($departments as $department)
                        <option value="{{$department->DEPARTMENT_ID}}">{{$department->DEPARTMENT_NAME}}</option>
                        @endforeach
                    @endif
                    </select>
                </div>
                </div>
            </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
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
<script>
  	jQuery(document).ready(function($){

        $(".btnrating").on('click',(function(e) {

        var previous_value = $("#selected_rating").val();

        var selected_value = $(this).attr("data-attr");
        $("#selected_rating").val(selected_value);

        $(".selected-rating").empty();
        $(".selected-rating").html(selected_value);

        for (i = 1; i <= selected_value; ++i) {
        $("#rating-star-"+i).toggleClass('btn-warning');
        $("#rating-star-"+i).toggleClass('btn-default');
        }

        for (ix = 1; ix <= previous_value; ++ix) {
        $("#rating-star-"+ix).toggleClass('btn-warning');
        $("#rating-star-"+ix).toggleClass('btn-default');
        }

        }));


    });

    $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})

</script>
    <!-- JS -->
    <!-- rating.js file -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

@stop

