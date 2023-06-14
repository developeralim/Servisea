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
<form action="#" class="career-form mb-60">
@csrf
                            <div class="row">
                                <div class="col-md-6 col-lg-3 my-3">
                                    <div class="input-group position-relative">
                                        <input type="text" class="form-control" placeholder="Enter Your Keywords" id="keywords">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3 my-3">
                                    <div class="select-container">
                                        <select class="custom-select">
                                            <option selected="">Location</option>
                                            <option value="1">Jaipur</option>
                                            <option value="2">Pune</option>
                                            <option value="3">Bangalore</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3 my-3">
                                    <div class="select-container">
                                        <select class="custom-select">
                                            <option selected="">Select Job Type</option>
                                            <option value="1">Ui designer</option>
                                            <option value="2">JS developer</option>
                                            <option value="3">Web developer</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3 my-3">
                                    <button type="button" class="btn btn-lg btn-block btn-light btn-custom" id="contact-submit">
                                        Search
                                    </button>
                                </div>
                            </div>
                        </form>


<div class="row">
    @foreach ($gigs as $gig)

    <div class="col-sm-3">
    <hr class="mx-n3">
        <form method="POST" action="" class="gig-id" id="{{$gig->GIG_ID}}">
         @csrf
            <div class="card" style="margin: auto;width: 18rem;">
                <img src="..." class="card-img-top" alt="gig media.">
                <div class="card-body">
                    <h5 class="card-title">seller</h5>

                    <a class="card-text" href="" >
                    <h6 class="card-title">{{$gig->GIG_NAME}}</h6>
                    </a>
                    <h6 class="card-title">Reviews From Review Table</h6>
                    <h6 class="card-title">Price From Package Table</h6>
                    <!-- <button type="submit" class="btn btn-primary">Order</button> -->
                </div>
            </div>
      </form>
      <hr class="mx-n3">
   </div>

   @endforeach


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

