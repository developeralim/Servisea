<!DOCTYPE html>
<html lang="en">

@extends('user.user_master')

@section('user_page')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Become a Seller</title>
@stop

@section('user_style')
<!-- update User Profile -->
@stop

@section('user-main-content')

<form method="POST" action="{{ route('switchToSeller')}}" class="register-form" id="register-form">
        @csrf
        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <h6 class="mb-2 text-primary">User Details</h6>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                    <label for="username">Username</label>
                    @if(Session('user.USERNAME') != null )
                    <input type="text" class="form-control" value="{{Session('user.USERNAME')}}" name="USERNAME" placeholder="Enter Username">
                    @else
                    <input type="text" class="form-control" value="" name="USERNAME" placeholder="Enter Username">
                    @endif
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                    <label for="Email">Email</label>
                    @if(Session('user.USER_EMAIL') != null )
                    <input type="Email" class="form-control" value="{{Session('user.USER_EMAIL')}}" name="USER_EMAIL" placeholder="Enter email ID">
                    @else
                    <input type="Email" class="form-control" value="" name="USER_EMAIL" placeholder="Enter email ID">
                    @endif
                </div>
            </div>
        </div>
        <br>
        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <di  v class="text-right">
                    <button type="submit" id="submit" name="submit" class="btn btn-primary">Continue</button>
                </di>
            </div>
        </div>
</form>


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

