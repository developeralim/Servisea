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

<div class="dashboard_content_wrapper">
    <div class="dashboard dashboard_wrapper pr30 pr0-xl">

      <div class="dashboard__main pl0-md" style="margin-top: 0px;padding-left:0px;">
        <div class="dashboard__content hover-bgc-color" >
          <div class="row pb40">
            <div class="col-lg-12">
              <div class="dashboard_title_area">
                <h2>Order List</h2>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-xl-12">
              <div class="ps-widget bgc-white bdrs4 p30 mb30 overflow-hidden position-relative">
                <div class="packages_table table-responsive">
                  <table class="table-style3 table at-savesearch">
                    <thead class="t-head">
                      <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Type</th>
                        <th scope="col">Detail</th>
                        <th scope="col">Price</th>
                        <th scope="col">Delivery Due</th>
                        <th scope="col">Order Details</th>
                      </tr>
                    </thead>
                    <tbody class="t-body">
                    @if(isset($orders))
                    @foreach($orders as $order)
                      <tr>
                        <th scope="row">{{ date('d-M-y', strtotime($order->ORDER_DATE))}}</th>
                        <td class="vam"><span class="pending-style style4">{{$order->ORDER_STATUS}}</span></td>
                        <td class="vam"><a href="{{route('viewGig',$order->GIG_ID)}}">{{$order->GIG_NAME}}</a></td>
                        <td class="vam">$ {{$order->ORDER_AMOUNT}}</td>
                        <td class="vam">{{ date('d-M-y', strtotime($order->ORDER_DUE))}}</td>
                        <td class="vam"><span class="pending-style style4"><a onmouseover="this.style.color='orange';" onmouseout="this.style.color='';" style="color:aliceblue;" href="{{route('orderDetails',Crypt::encryptString($order->ORDER_ID))}}">View</a></span></td>
                      </tr>
                    @endforeach
                    @else
                      <tr>
                        <h5>No Orders</h5>
                      </tr>
                    @endif

                    </tbody>
                  </table>
                  <div class="mbp_pagination text-center mt30">
                    <ul class="page_navigation">
                      <li class="page-item">
                        <a class="page-link" href="#"> <span class="fas fa-angle-left"></span></a>
                      </li>
                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                      <li class="page-item active" aria-current="page">
                        <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                      </li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item"><a class="page-link" href="#">4</a></li>
                      <li class="page-item"><a class="page-link" href="#">5</a></li>
                      <li class="page-item"><a class="page-link" href="#">...</a></li>
                      <li class="page-item"><a class="page-link" href="#">20</a></li>
                      <li class="page-item">
                        <a class="page-link" href="#"><span class="fas fa-angle-right"></span></a>
                      </li>
                    </ul>
                    <p class="mt10 mb-0 pagination_page_count text-center">1 – 20 of 300+ property available</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
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
    <!-- JS -->
    <script src="{{asset('backend/USER_ASSET/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('backend/USER_ASSET/js/main.js')}}"></script>
@stop

