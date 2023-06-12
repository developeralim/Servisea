

<!DOCTYPE html>
<html lang="en">

@extends('user.user_master')

@section('user_page')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Servisea/{{Session::get('user.USERNAME')}}/Edit Gig</title>
@stop

@section('user_style')

@stop

@section('user-main-content')

<!-- Default switch -->
<div class="form-check form-switch">
  <input class="form-check-input" type="checkbox" role="switch" onclick="myFunction()" id="myCheck" checked>
  <label class="form-check-label" for="flexSwitchCheckDefault">Switch to offer only one package</label>
</div>


<form method="POST" action="{{ route('postMultiPackagePage')}}" class="package-form" id="package-form">
@csrf
<div class="table-responsive">
<table id="table" class="table table-bordered">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">Basic</th>
      <th class='c' scope="col">Standard</th>
      <th class='c' scope="col">Premium</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Package Title</th>
      <td >
        <input type="text" class="form-control" name='PT_B' placeholder="Title">
      </td>
      <td class='c'>
        <input type="text" class="form-control" name='PT_S' placeholder="Title">
      </td>
      <td class='c'>
        <input type="text" class="form-control" name='PT_P' placeholder="Title">
      </td>
    </tr>

    <tr>
      <th scope="row">Package Description</th>
      <td>
      <input type="text" class="form-control" name='PD_B' placeholder="Description">
      </td>
      <td class='c'>
      <input type="text" class="form-control" name='PD_S' placeholder="Description">
      </td>
      <td class='c'>
      <input type="text" class="form-control" name='PD_P' placeholder="Description">
      </td>
    </tr>

    <tr>
      <th scope="row">Delivery Days</th>
      <td  >
      <input type="text" class="form-control" name='DD_B' placeholder="Delivery Days">
      </td>
      <td  class='c'>
      <input type="text" class="form-control" name='DD_S' placeholder="Delivery Days">
      </td>
      <td  class='c'>
      <input type="text" class="form-control" name='DD_P' placeholder="Delivery Days">
      </td>
    </tr>

    <tr>
      <th scope="row">Revision</th>
      <td>
      <input type="text" class="form-control" name='R_B'  placeholder="Revision">
      </td>
      <td class='c'>
      <input type="text" class="form-control" name='R_S'  placeholder="Revision">
      </td>
      <td  class='c'>
      <input type="text" class="form-control" name='R_P' placeholder="Revision">
      </td>
    </tr>

    <tr>
      <th scope="row">Price</th>
      <td >
      <input type="text" class="form-control" name='P_B' placeholder="Price">
      </td>
      <td class='c'>
      <input type="text" class="form-control" name='P_S' placeholder="Price">
      </td>
      <td class='c'>
      <input type="text" class="form-control" name='P_P' placeholder="Price">
      </td>
    </tr>

</tbody>
</table>
</div>

<div class="d-grid gap-2 col-6 mx-auto">
  <button class="btn btn-primary" type="Submit">Publish Gig</button>
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

<script>
        function myFunction() {
        // Get the checkbox
        var checkBox = document.getElementById("myCheck");
        // If the checkbox is checked, display the output text
        if (checkBox.checked == false){

          document.getElementById("package-form").action = "{{ route('postBasicPackagePage')}}";

          $(".c").hide();

        } else {

          document.getElementById("package-form").action = "{{ route('postMultiPackagePage')}}";
            $(".c").show();
        }
        }
  </script>

    <!-- JS -->
    <script src="{{asset('backend/USER_ASSET/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('backend/USER_ASSET/js/main.js')}}"></script>
@stop

