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

<form method="POST" action="{{ route('viewPackagePage')}}" class="register-form" id="register-form">
        @csrf
        <section class="vh-100" style="background-color: #2779e2;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-9">

        <h1 class="text-white mb-4">Apply for a job</h1>

        <div class="card" style="border-radius: 15px;">
          <div class="card-body">

            <div class="row align-items-center pt-4 pb-3">
              <div class="col-md-3 ps-5">

                <h6 class="mb-0">Gig title</h6>

              </div>
              <div class="col-md-9 pe-5">

                <input type="text" name="Title" class="form-control form-control-lg" placeholder="Gig Title" />

              </div>
            </div>

            <hr class="mx-n3">

            <div class="row align-items-center pt-4 pb-3">
              <div class="col-md-3 ps-5">

                <h6 class="mb-0">Gig Description</h6>

              </div>
              <div class="col-md-9 pe-5">
                <textarea type="text" name="Description" class="form-control form-control-lg"  placeholder="Gig Description" ></textarea>
              </div>
            </div>

            <hr class="mx-n3">

            <div class="row align-items-center pt-4 pb-3">
              <div class="col-md-3 ps-5">

                <h6 class="mb-0">Gig Requirements</h6>

              </div>
              <div class="col-md-9 pe-5">
                <textarea type="text" name="Requirements" class="form-control form-control-lg"  placeholder="Input the requirements needed to start this service" ></textarea>
              </div>
            </div>


            <hr class="mx-n3">

            <div class="row align-items-center py-3">
              <div class="col-md-3 ps-5">

                <h6 class="mb-0">Category</h6>

              </div>
              <div class="col-md-9 pe-5">

                <select class="form-control" id="CATEGORY_ID" name='CATEGORY_ID' aria-label="Default select example">
                    <option readonly="readonly" selected>Select Category</option>
                    @foreach (Session('categoryList') as $category)
                    <option readonly="readonly" value="{{$category->CATEGORY_ID}}" >{{$category->CATEGORY_NAME}}</option>
                    @endforeach
                </select>

              </div>
            </div>

            <hr class="mx-n3">

            <div class="px-5 py-4">
              <button type="submit" class="btn btn-primary btn-lg">Send application</button>
            </div>

          </div>
        </div>

      </div>
    </div>
  </div>
</section>
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

