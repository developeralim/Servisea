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
                <h2>Applicant List</h2>
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
                        <th scope="col">Freelancer</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody class="t-body">
                    @foreach($applicants as $applicant)
                      <tr>
                        <th class="ps-0" scope="row">
                          <div class="freelancer-style1 p-0 mb-0 box-shadow-none">
                            <div class="d-lg-flex align-items-lg-center">
                              <div class="thumb w60 position-relative rounded-circle mb15-md">
                                @if(($applicant->USER_IMG)== null)
                                <img class="rounded-circle mx-auto" style="width: 60px;" src="{{asset('backend/THEME/images/freelancer_icon.jpg')}}" alt="">
                                @else
                                <img class="rounded-circle mx-auto" src="{{$applicant->USER_IMG}}" alt="">
                                @endif
                                <span class="online-badge2"></span>
                              </div>
                              <div class="details ml15 ml0-md mb15-md">
                                <h5><a class="title mb-2" href="">{{$applicant->USERNAME}}</a></h5>
                                <!-- <p class="mb-0 fz14 list-inline-item mb5-sm pe-1"><i class="flaticon-place fz16 vam text-thm2 me-1"></i> London, UK</p> -->
                                <p class="mb-0 fz14 list-inline-item mb5-sm pe-1"><i class="flaticon-30-days fz16 vam text-thm2 me-1 bdrl1 pl15 pl0-xs bdrn-xs"></i>Date Applied: {{ date('d-M-y', strtotime($applicant->JA_DATEAPPLIED)) }}</p>
                                @foreach($reviews as $review)
                                    @if($applicant->FREELANCER_ID == $review->FREELANCER_ID)
                                        <p class="mb-0 fz14 list-inline-item mb5-sm"><i class="fas fa-star vam fz10 review-color me-2 fz16 vam text-thm2 me-1 bdrl1 pl15 pl0-xs bdrn-xs"></i><span class="fz15 fw500">{{$review->quantity}}</span></p>
                                    @endif
                                @endforeach
                             </div>
                            </div>
                          </div>
                        </th>
                        <!-- <td class="vam"><h5 class="mb-0">$100 - $150 <span class="fz14 fw400">Hourly Rate</span></h5></td> -->
                        <td>
                          <div class="d-flex">
                            <a href="" class="icon me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Hire"><span class="flaticon-pencil"></span></a>
                            <!-- <a href="" class="icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><span class="flaticon-delete"></span></a> -->
                          </div>
                        </td>
                      </tr>
                    @endforeach
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

