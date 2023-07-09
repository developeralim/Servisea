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

<div class="wrapper ovh">
  <div class="body_content">

  <div class="dashboard_content_wrapper">
    <div class="dashboard dashboard_wrapper pr30 pr0-xl">
      <div class="dashboard__main pl0-md">
        <div class="dashboard__content hover-bgc-color">
          <div class="row pb40">
            <div class="col-lg-9">
              <div class="dashboard_title_area">
                <h2>Manage Gigs</h2>
                <p class="text">Lorem ipsum dolor sit amet, consectetur.</p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xl-12">
              <div class="ps-widget bgc-white bdrs4 p30 mb30 overflow-hidden position-relative">
                <div class="navtab-style1">
                  <nav>
                    <div class="nav nav-tabs mb30" id="nav-tab2" role="tablist">
                      <button class="nav-link active fw500 ps-0" id="nav-item1-tab" data-bs-toggle="tab" data-bs-target="#nav-item1" type="button" role="tab" aria-controls="nav-item1" aria-selected="true">Active Services</button>
                      <button class="nav-link fw500" id="nav-item2-tab" data-bs-toggle="tab" data-bs-target="#nav-item2" type="button" role="tab" aria-controls="nav-item2" aria-selected="false">Pending Services</button>
                      <button class="nav-link fw500" id="nav-item3-tab" data-bs-toggle="tab" data-bs-target="#nav-item3" type="button" role="tab" aria-controls="nav-item3" aria-selected="false">Ongoing Services</button>
                 </div>
                  </nav>
                  <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-item1" role="tabpanel" aria-labelledby="nav-item1-tab">
                      <div class="packages_table table-responsive">
                        <table class="table-style3 table at-savesearch">
                          <thead class="t-head">
                            <tr>
                              <th scope="col">Title</th>
                              <th scope="col">Category</th>
                              <th scope="col">Type/Cost</th>
                              <th scope="col">Actions</th>
                            </tr>
                          </thead>
                          <tbody class="t-body">
                          @if(isset($gigs))
                            @foreach ($gigs as $gig)
                            <tr>
                              <th class="dashboard-img-service" scope="row">
                                <div class="listing-style1 list-style d-block d-xl-flex align-items-start border-0 mb-0">
                                  <div class="list-thumb flex-shrink-0 bdrs4 mb10-lg">
                                    <img class="w-100" src="images/listings/g-1.jpg" alt="">
                                  </div>
                                  <div class="list-content flex-grow-1 py-0 pl15 pl0-lg">
                                    <h6 class="list-title mb-0"><a href="{{route('viewGig',Crypt::encryptString($gig->GIG_ID))}}">{{$gig->GIG_NAME}}</a></h6>
                                    <ul class="list-style-type-bullet ps-3 dashboard-style mb-0">
                                      <li>{{$gig->GIG_DESCRIPTION}}</li>
                                    </ul>
                                  </div>
                                </div>
                              </th>
                              <td class="align-top"><span class="fz15 fw400">{{$gig->CATEGORY_NAME}}</span></td>
                              <td class="align-top"><span class="fz14 fw400">{{$gig->PRICE}}</span></td>
                              <td class="align-top">
                                <div class="d-flex">
                                  <a href="" class="icon me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="flaticon-pencil"></span></a>
                                  <a href="" class="icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><span class="flaticon-delete"></span></a>
                                </div>
                              </td>
                            </tr>
                            @endforeach
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

                    <div class="tab-pane fade" id="nav-item2" role="tabpanel" aria-labelledby="nav-item2-tab">
                      <div class="packages_table table-responsive">
                        <table class="table-style3 table at-savesearch">
                          <thead class="t-head">
                            <tr>
                              <th scope="col">Title</th>
                              <th scope="col">Category</th>
                              <th scope="col">Type/Cost</th>
                              <th scope="col">Actions</th>
                            </tr>
                          </thead>
                          <tbody class="t-body">
                            <tr>
                              <th class="dashboard-img-service" scope="row">
                                <div class="listing-style1 list-style d-block d-xl-flex align-items-start border-0 mb-0">
                                  <div class="list-thumb flex-shrink-0 bdrs4 mb10-lg">
                                    <img class="w-100" src="images/listings/g-1.jpg" alt="">
                                  </div>
                                  <div class="list-content flex-grow-1 py-0 pl15 pl0-lg">
                                    <h6 class="list-title mb-0"><a href="page-services-single.html">I will design modern websites in figma or adobe xd</a></h6>
                                    <ul class="list-style-type-bullet ps-3 dashboard-style mb-0">
                                      <li>Delievred with in a day</li>
                                      <li>Delievry Time Descreased</li>
                                      <li>Upload apps to Stores</li>
                                    </ul>
                                  </div>
                                </div>
                              </th>
                              <td class="align-top"><span class="fz15 fw400">Web & App Design</span></td>
                              <td class="align-top"><span class="fz14 fw400">$500.00/Fixed</span></td>
                              <td class="align-top">
                                <div class="d-flex">
                                  <a href="" class="icon me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="flaticon-pencil"></span></a>
                                  <a href="" class="icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><span class="flaticon-delete"></span></a>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <th class="dashboard-img-service" scope="row">
                                <div class="listing-style1 list-style d-block d-xl-flex align-items-start border-0 mb-0">
                                  <div class="list-thumb flex-shrink-0 bdrs4 mb10-lg">
                                    <img class="w-100" src="images/listings/g-2.jpg" alt="">
                                  </div>
                                  <div class="list-content flex-grow-1 py-0 pl15 pl0-lg">
                                    <h6 class="list-title mb-0"><a href="page-services-single.html">I will design modern websites in figma or adobe xd</a></h6>
                                    <ul class="list-style-type-bullet ps-3 dashboard-style mb-0">
                                      <li>Delievred with in a day</li>
                                      <li>Delievry Time Descreased</li>
                                      <li>Upload apps to Stores</li>
                                    </ul>
                                  </div>
                                </div>
                              </th>
                              <td class="align-top"><span class="fz15 fw400">Web & App Design</span></td>
                              <td class="align-top"><span class="fz14 fw400">$500.00/Fixed</span></td>
                              <td class="align-top">
                                <div class="d-flex">
                                  <a href="" class="icon me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="flaticon-pencil"></span></a>
                                  <a href="" class="icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><span class="flaticon-delete"></span></a>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <th class="dashboard-img-service" scope="row">
                                <div class="listing-style1 list-style d-block d-xl-flex align-items-start border-0 mb-0">
                                  <div class="list-thumb flex-shrink-0 bdrs4 mb10-lg">
                                    <img class="w-100" src="images/listings/g-3.jpg" alt="">
                                  </div>
                                  <div class="list-content flex-grow-1 py-0 pl15 pl0-lg">
                                    <h6 class="list-title mb-0"><a href="page-services-single.html">I will design modern websites in figma or adobe xd</a></h6>
                                    <ul class="list-style-type-bullet ps-3 dashboard-style mb-0">
                                      <li>Delievred with in a day</li>
                                      <li>Delievry Time Descreased</li>
                                      <li>Upload apps to Stores</li>
                                    </ul>
                                  </div>
                                </div>
                              </th>
                              <td class="align-top"><span class="fz15 fw400">Web & App Design</span></td>
                              <td class="align-top"><span class="fz14 fw400">$500.00/Fixed</span></td>
                              <td class="align-top">
                                <div class="d-flex">
                                  <a href="" class="icon me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="flaticon-pencil"></span></a>
                                  <a href="" class="icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><span class="flaticon-delete"></span></a>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <th class="dashboard-img-service" scope="row">
                                <div class="listing-style1 list-style d-block d-xl-flex align-items-start border-0 mb-0">
                                  <div class="list-thumb flex-shrink-0 bdrs4 mb10-lg">
                                    <img class="w-100" src="images/listings/g-4.jpg" alt="">
                                  </div>
                                  <div class="list-content flex-grow-1 py-0 pl15 pl0-lg">
                                    <h6 class="list-title mb-0"><a href="page-services-single.html">I will design modern websites in figma or adobe xd</a></h6>
                                    <ul class="list-style-type-bullet ps-3 dashboard-style mb-0">
                                      <li>Delievred with in a day</li>
                                      <li>Delievry Time Descreased</li>
                                      <li>Upload apps to Stores</li>
                                    </ul>
                                  </div>
                                </div>
                              </th>
                              <td class="align-top"><span class="fz15 fw400">Web & App Design</span></td>
                              <td class="align-top"><span class="fz14 fw400">$500.00/Fixed</span></td>
                              <td class="align-top">
                                <div class="d-flex">
                                  <a href="" class="icon me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="flaticon-pencil"></span></a>
                                  <a href="" class="icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><span class="flaticon-delete"></span></a>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <th class="dashboard-img-service" scope="row">
                                <div class="listing-style1 list-style d-block d-xl-flex align-items-start border-0 mb-0">
                                  <div class="list-thumb flex-shrink-0 bdrs4 mb10-lg">
                                    <img class="w-100" src="images/listings/g-5.jpg" alt="">
                                  </div>
                                  <div class="list-content flex-grow-1 py-0 pl15 pl0-lg">
                                    <h6 class="list-title mb-0"><a href="page-services-single.html">I will design modern websites in figma or adobe xd</a></h6>
                                    <ul class="list-style-type-bullet ps-3 dashboard-style mb-0">
                                      <li>Delievred with in a day</li>
                                      <li>Delievry Time Descreased</li>
                                      <li>Upload apps to Stores</li>
                                    </ul>
                                  </div>
                                </div>
                              </th>
                              <td class="align-top"><span class="fz15 fw400">Web & App Design</span></td>
                              <td class="align-top"><span class="fz14 fw400">$500.00/Fixed</span></td>
                              <td class="align-top">
                                <div class="d-flex">
                                  <a href="" class="icon me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="flaticon-pencil"></span></a>
                                  <a href="" class="icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><span class="flaticon-delete"></span></a>
                                </div>
                              </td>
                            </tr>
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

                    <div class="tab-pane fade" id="nav-item3" role="tabpanel" aria-labelledby="nav-item3-tab">
                      <div class="packages_table table-responsive">
                        <table class="table-style3 table at-savesearch">
                          <thead class="t-head">
                            <tr>
                              <th scope="col">Title</th>
                              <th scope="col">Category</th>
                              <th scope="col">Type/Cost</th>
                              <th scope="col">Actions</th>
                            </tr>
                          </thead>
                          <tbody class="t-body">
                            <tr>
                              <th class="dashboard-img-service" scope="row">
                                <div class="listing-style1 list-style d-block d-xl-flex align-items-start border-0 mb-0">
                                  <div class="list-thumb flex-shrink-0 bdrs4 mb10-lg">
                                    <img class="w-100" src="images/listings/g-1.jpg" alt="">
                                  </div>
                                  <div class="list-content flex-grow-1 py-0 pl15 pl0-lg">
                                    <h6 class="list-title mb-0"><a href="page-services-single.html">I will design modern websites in figma or adobe xd</a></h6>
                                    <ul class="list-style-type-bullet ps-3 dashboard-style mb-0">
                                      <li>Delievred with in a day</li>
                                      <li>Delievry Time Descreased</li>
                                      <li>Upload apps to Stores</li>
                                    </ul>
                                  </div>
                                </div>
                              </th>
                              <td class="align-top"><span class="fz15 fw400">Web & App Design</span></td>
                              <td class="align-top"><span class="fz14 fw400">$500.00/Fixed</span></td>
                              <td class="align-top">
                                <div class="d-flex">
                                  <a href="" class="icon me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="flaticon-pencil"></span></a>
                                  <a href="" class="icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><span class="flaticon-delete"></span></a>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <th class="dashboard-img-service" scope="row">
                                <div class="listing-style1 list-style d-block d-xl-flex align-items-start border-0 mb-0">
                                  <div class="list-thumb flex-shrink-0 bdrs4 mb10-lg">
                                    <img class="w-100" src="images/listings/g-2.jpg" alt="">
                                  </div>
                                  <div class="list-content flex-grow-1 py-0 pl15 pl0-lg">
                                    <h6 class="list-title mb-0"><a href="page-services-single.html">I will design modern websites in figma or adobe xd</a></h6>
                                    <ul class="list-style-type-bullet ps-3 dashboard-style mb-0">
                                      <li>Delievred with in a day</li>
                                      <li>Delievry Time Descreased</li>
                                      <li>Upload apps to Stores</li>
                                    </ul>
                                  </div>
                                </div>
                              </th>
                              <td class="align-top"><span class="fz15 fw400">Web & App Design</span></td>
                              <td class="align-top"><span class="fz14 fw400">$500.00/Fixed</span></td>
                              <td class="align-top">
                                <div class="d-flex">
                                  <a href="" class="icon me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="flaticon-pencil"></span></a>
                                  <a href="" class="icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><span class="flaticon-delete"></span></a>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <th class="dashboard-img-service" scope="row">
                                <div class="listing-style1 list-style d-block d-xl-flex align-items-start border-0 mb-0">
                                  <div class="list-thumb flex-shrink-0 bdrs4 mb10-lg">
                                    <img class="w-100" src="images/listings/g-3.jpg" alt="">
                                  </div>
                                  <div class="list-content flex-grow-1 py-0 pl15 pl0-lg">
                                    <h6 class="list-title mb-0"><a href="page-services-single.html">I will design modern websites in figma or adobe xd</a></h6>
                                    <ul class="list-style-type-bullet ps-3 dashboard-style mb-0">
                                      <li>Delievred with in a day</li>
                                      <li>Delievry Time Descreased</li>
                                      <li>Upload apps to Stores</li>
                                    </ul>
                                  </div>
                                </div>
                              </th>
                              <td class="align-top"><span class="fz15 fw400">Web & App Design</span></td>
                              <td class="align-top"><span class="fz14 fw400">$500.00/Fixed</span></td>
                              <td class="align-top">
                                <div class="d-flex">
                                  <a href="" class="icon me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="flaticon-pencil"></span></a>
                                  <a href="" class="icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><span class="flaticon-delete"></span></a>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <th class="dashboard-img-service" scope="row">
                                <div class="listing-style1 list-style d-block d-xl-flex align-items-start border-0 mb-0">
                                  <div class="list-thumb flex-shrink-0 bdrs4 mb10-lg">
                                    <img class="w-100" src="images/listings/g-4.jpg" alt="">
                                  </div>
                                  <div class="list-content flex-grow-1 py-0 pl15 pl0-lg">
                                    <h6 class="list-title mb-0"><a href="page-services-single.html">I will design modern websites in figma or adobe xd</a></h6>
                                    <ul class="list-style-type-bullet ps-3 dashboard-style mb-0">
                                      <li>Delievred with in a day</li>
                                      <li>Delievry Time Descreased</li>
                                      <li>Upload apps to Stores</li>
                                    </ul>
                                  </div>
                                </div>
                              </th>
                              <td class="align-top"><span class="fz15 fw400">Web & App Design</span></td>
                              <td class="align-top"><span class="fz14 fw400">$500.00/Fixed</span></td>
                              <td class="align-top">
                                <div class="d-flex">
                                  <a href="" class="icon me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="flaticon-pencil"></span></a>
                                  <a href="" class="icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><span class="flaticon-delete"></span></a>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <th class="dashboard-img-service" scope="row">
                                <div class="listing-style1 list-style d-block d-xl-flex align-items-start border-0 mb-0">
                                  <div class="list-thumb flex-shrink-0 bdrs4 mb10-lg">
                                    <img class="w-100" src="images/listings/g-5.jpg" alt="">
                                  </div>
                                  <div class="list-content flex-grow-1 py-0 pl15 pl0-lg">
                                    <h6 class="list-title mb-0"><a href="page-services-single.html">I will design modern websites in figma or adobe xd</a></h6>
                                    <ul class="list-style-type-bullet ps-3 dashboard-style mb-0">
                                      <li>Delievred with in a day</li>
                                      <li>Delievry Time Descreased</li>
                                      <li>Upload apps to Stores</li>
                                    </ul>
                                  </div>
                                </div>
                              </th>
                              <td class="align-top"><span class="fz15 fw400">Web & App Design</span></td>
                              <td class="align-top"><span class="fz14 fw400">$500.00/Fixed</span></td>
                              <td class="align-top">
                                <div class="d-flex">
                                  <a href="" class="icon me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="flaticon-pencil"></span></a>
                                  <a href="" class="icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><span class="flaticon-delete"></span></a>
                                </div>
                              </td>
                            </tr>
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
    </div>
  </div>
















    @if(isset($gigs))
    <!-- Listings All Lists -->
    <section class="pt30 pb90">
      <div class="container">
        <div class="row align-items-center mb20">
          <div class="col-6 col-sm-6 col-lg-9 pe-0">
            <div class="text-center text-sm-start">
              <div class="dropdown-lists">
                <ul class="p-0 mb-0 text-center text-sm-start">

                  <li class="list-inline-item position-relative d-none d-xl-inline-block">
                    <button class="open-btn mb10 dropdown-toggle" type="button" data-bs-toggle="dropdown">Delivery Time <i class="fa fa-angle-down ms-2"></i></button>
                    <div class="dropdown-menu">
                      <div class="widget-wrapper pb25 mb0">
                        <div class="radio-element">
                          <div class="form-check d-flex align-items-center mb10">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">Express 24H</label>
                          </div>
                          <div class="form-check d-flex align-items-center mb10">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked="checked">
                            <label class="form-check-label" for="flexRadioDefault2">Up to 3 days</label>
                          </div>
                          <div class="form-check d-flex align-items-center mb10">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3">
                            <label class="form-check-label" for="flexRadioDefault3">Up to 7 days</label>
                          </div>
                          <div class="form-check d-flex align-items-center">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault4">
                            <label class="form-check-label" for="flexRadioDefault4">Anytime</label>
                          </div>
                        </div>
                      </div>
                      <button class="done-btn ud-btn btn-thm drop_btn">Apply<i class="fal fa-arrow-right-long"></i></button>
                    </div>
                  </li>
                  <li class="list-inline-item position-relative d-none d-xl-inline-block">
                    <button class="open-btn mb10 dropdown-toggle" type="button" data-bs-toggle="dropdown">Budget <i class="fa fa-angle-down ms-2"></i></button>
                    <div class="dropdown-menu dd3">
                      <div class="widget-wrapper pb25 mb0 pr20">
                        <!-- Range Slider Desktop Version -->
                        <div class="range-slider-style1">
                          <div class="range-wrapper">
                            <div class="slider-range mb20"></div>
                            <div class="text-center">
                              <input type="text" class="amount" placeholder="$20"><span class="fa-sharp fa-solid fa-minus mx-1 dark-color"></span>
                              <input type="text" class="amount2" placeholder="$70987">
                            </div>
                          </div>
                        </div>
                      </div>
                      <button class="done-btn ud-btn btn-thm drop_btn3">Apply<i class="fal fa-arrow-right-long"></i></button>
                    </div>
                  </li>
                  <li class="list-inline-item position-relative d-none d-xl-inline-block">
                    <button class="open-btn mb10 dropdown-toggle" type="button" data-bs-toggle="dropdown">Level <i class="fa fa-angle-down ms-2"></i></button>
                    <div class="dropdown-menu">
                      <div class="widget-wrapper pb25 mb0">
                        <div class="checkbox-style1">
                          <label class="custom_checkbox">Top Rated Seller
                            <input type="checkbox">
                            <span class="checkmark"></span>
                          </label>
                          <label class="custom_checkbox">Level Two
                            <input type="checkbox" checked="checked">
                            <span class="checkmark"></span>
                          </label>
                          <label class="custom_checkbox">Level One
                            <input type="checkbox">
                            <span class="checkmark"></span>
                          </label>
                          <label class="custom_checkbox">New Seller
                            <input type="checkbox">
                            <span class="checkmark"></span>
                          </label>
                        </div>
                      </div>
                      <button class="done-btn ud-btn btn-thm dropdown-toggle">Apply<i class="fal fa-arrow-right-long"></i></button>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-6 col-sm-6 col-lg-3 px-0">
            <div class="page_control_shorting mb10 d-flex align-items-center justify-content-center justify-content-sm-end">
              <div class="pcs_dropdown dark-color pr10 pr0-xs"><span>Sort by</span>
                <select class="selectpicker show-tick">
                  <option>Best Seller</option>
                  <option>Recommended</option>
                  <option>New Arrivals</option>
                </select>
              </div>
            </div>
          </div>
        </div>

        <div class="row">


        @foreach ($gigs as $gig)
          <div class="col-sm-6 col-xl-3">
          <div class="listing-style1">
           <div class="list-thumb">
           @if(isset($gigMedia))
                @foreach ($gigMedia as $gigmed)
                    @if($gigmed->GIG_ID == $gig->GIG_ID)
                    <img class="w-100" src={{asset('backend/storage/storage/gig/'.$gigmed->media_path)}}  alt="{{$gigmed->media_path}}">
                    <a a href="" class="listing-fav fz12"><span class="far fa-heart"></span></a>
                    @else
                    <img class="w-100" src="{{asset('backend/THEME/images/gallery/gig_img.png')}}" alt="">
                     <a a href="" class="listing-fav fz12"><span class="far fa-heart"></span></a>
                    @endif
                @endforeach
            @endif

            </div>
              <div class="list-content">
                <p class="list-text body-color fz14 mb-1">{{$gig->GIG_NAME}}</p>
                <h5 class="list-title"><a href="{{route('viewGig',Crypt::encryptString($gig->GIG_ID))}}">{{$gig->GIG_DESCRIPTION}}</a></h5>
                <div class="review-meta d-flex align-items-center">
                  <i class="fas fa-star fz10 review-color me-2"></i>
                  @if(isset($reviews))
                    @foreach ($reviews as $review)
                        @if($review->GIG_ID == $gig->GIG_ID)
                        <p class="mb-0 body-color fz14"><span class="dark-color me-2">{{$review->RATING}}</span>{{$review->COUNT}} reviews</p>
                        @else
                        <p class="mb-0 body-color fz14"><span class="dark-color me-2"></span>No reviews yet</p>
                        @endif
                    @endforeach
                  @endif
                </div>
                <hr class="my-2">
                <div class="list-meta d-flex justify-content-between align-items-center mt15">
                  <a href="{{route('viewFreelancer',Crypt::encryptString($gig->FREELANCER_ID))}}">
                    <span class="position-relative mr10">
                      <img class="rounded-circle" style="width: 60px;" src="{{asset('backend/THEME/images/freelancer_icon.jpg')}}" alt="Freelancer Photo">
                      <span class="online-badge"></span>
                    </span>
                    <span class="fz14">{{$gig->USERNAME}}</span>
                  </a>
                  <div class="budget">
                    <p class="mb-0 body-color">Starting at<span class="fz17 fw500 dark-color ms-1">$ {{$gig->PRICE}}</span></p>
                  </div>
                </div>
              </div>

            </div>
          </div>
          @endforeach

        </div>

        <div class="row">
          <div class="mbp_pagination mt30 text-center">
            <ul class="page_navigation">
              <li class="page-item">
                <a class="page-link" href="#"> <span class="fas fa-angle-left"></span></a>
              </li>
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item " aria-current="page">
                <a class="page-link" href="#">2</span></a>
              </li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">4</a></li>
              <li class="page-item d-inline-block d-sm-none"><a class="page-link" href="#">...</a></li>
              <li class="page-item"><a class="page-link" href="#">5</a></li>
              <li class="page-item d-none d-sm-inline-block"><a class="page-link" href="#">...</a></li>
              <li class="page-item d-none d-sm-inline-block"><a class="page-link" href="#">20</a></li>
              <li class="page-item">
                <a class="page-link" href="#"><span class="fas fa-angle-right"></span></a>
              </li>
            </ul>
            <p class="mt10 mb-0 pagination_page_count text-center">1 – 20 of 300+ property available</p>
          </div>
        </div>

        @else
        <div class="row">
            <h5 style="text-align: center;">No gigs to show</h5>
        </div>


          @endif


      </div>
    </section>
  </div>
</div>

@stop

@section('user_script')


<script src="{{asset('backend/THEME/js/pricing-slider.js')}}"></script>
<script src="{{asset('backend/THEME/js/isotop.js')}}"></script>
<!-- <script type="text/javascript">
  window.onbeforeunload = confirmExit;
  function confirmExit()
  {
    return "your changes will be lost.  Are you sure you want to exit this page?";
  }
</script> -->
@stop

