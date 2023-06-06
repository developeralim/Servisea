

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
  <input class="form-check-input" type="checkbox" role="switch" onclick="myFunction()" id="myCheck">
  <label class="form-check-label" for="flexSwitchCheckDefault">Default switch checkbox input</label>
</div>


<form method="POST" action="{{ route('viewPackagePage')}}" class="package-form" id="package-form">
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
        <input type="text" class="form-control" value="H" name='PT_B' placeholder="Enter Username">
      </td>
      <td name='PT_S' class='c'>
        <input type="text" class="form-control" value="H" name='PT_B' placeholder="Enter Username">
      </td>
      <td name='PT_P' class='c'>
        <input type="text" class="form-control" value="H" name='PT_B' placeholder="Enter Username">
      </td>
    </tr>

    <tr>
      <th scope="row">Package Description</th>
      <td name='PS_B' >
      <input type="text" class="form-control" value="H" name='PT_B' placeholder="Enter Username">
      </td>
      <td name='PS_S'class='c'>
      <input type="text" class="form-control" value="H" name='PT_B' placeholder="Enter Username">
      </td>
      <td name='PS_P' class='c'>
      <input type="text" class="form-control" value="H" name='PT_B' placeholder="Enter Username">
      </td>
    </tr>

    <tr>
      <th scope="row">Delivery Days</th>
      <td name='DD_B' >
      <input type="text" class="form-control" value="H" name='PT_B' placeholder="Enter Username">
      </td>
      <td name='DD_S' class='c'>
      <input type="text" class="form-control" value="H" name='PT_B' placeholder="Enter Username">
      </td>
      <td name='DD_P' class='c'>
      <input type="text" class="form-control" value="H" name='PT_B' placeholder="Enter Username">
      </td>
    </tr>

    <tr>
      <th scope="row">Revision</th>
      <td name='R_B' >
      <input type="text" class="form-control" value="H" name='PT_B' placeholder="Enter Username">
      </td>
      <td name='R_S' class='c'>
      <input type="text" class="form-control" value="H" name='PT_B' placeholder="Enter Username">
      </td>
      <td name='R_P' class='c'>
      <input type="text" class="form-control" value="H" name='PT_B' placeholder="Enter Username">
      </td>
    </tr>

    <tr>
      <th scope="row">Price</th>
      <td name='P_B' >
      <input type="text" class="form-control" value="H" name='PT_B' placeholder="Enter Username">
      </td>
      <td name='P_S' class='c'>
      <input type="text" class="form-control" value="H" name='PT_B' placeholder="Enter Username">
      </td>
      <td name='P_P' class='c'>
      <input type="text" class="form-control" value="H" name='PT_B' placeholder="Enter Username">
      </td>
    </tr>

</tbody>
</table>
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
        if (checkBox.checked == true){
            $(".c").hide();
        } else {

            $(".c").show();
        }
        }
  </script>

    <!-- JS -->
    <script src="{{asset('backend/USER_ASSET/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('backend/USER_ASSET/js/main.js')}}"></script>
@stop

