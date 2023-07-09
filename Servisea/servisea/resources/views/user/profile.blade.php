
@extends('user.user_master')

@section('user_page')
<head>
<title>Sign Up Form by Colorlib</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

@stop

@section('user_style')

@stop
@section('user-main-content')

<div class="dashboard_content_wrapper">
    <div class="dashboard dashboard_wrapper pr0-xl">
      <div class="dashboard__main pl0-md" style="margin-top: 0px;padding: 0px;">
        <div class="dashboard__content hover-bgc-color">
          <div class="row pb40">
            <div class="col-lg-9">
              <div class="dashboard_title_area">
                <h2>My Profile</h2>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xl-12">
              <div class="ps-widget bgc-white bdrs4 p30 mb30 overflow-hidden position-relative">
              <form method="POST" enctype="multipart/form-data" action="{{route('updateUser')}}">
                @csrf
                <div class="bdrb1 pb15 mb25">
                  <h5 class="list-title">Profile Details</h5>
                </div>
                <div class="col-xl-7" >
                  <div class="profile-box d-sm-flex align-items-center mb30">
                    <div class="profile-img mb20-sm">
                    @if(Session::get('user.USER_IMG') == null)
                    <img class="w-100 rounded-circle wa-xs" style="width:145px;height:145px;" src="{{asset('backend/THEME/images/icon/freelancer_icon.jpg')}}" alt="profile picture">
                    @else
                    <img class="w-100 rounded-circle wa-xs" style="width:145px;height:145px;" src="{{URL::asset("storage/profile/images/".session("user.USER_IMG")) }}" alt="profile picture">
                    @endif
                </div>
                    <div class="profile-content ml20 ml0-xs">
                      <div class="d-flex align-items-center my-3">
                        <a href="" class="tag-delt text-thm2"><span class="flaticon-delete text-thm2"></span></a>
                        <input type="file" name="upload_profile" class="upload-btn ml10"></input>
                      </div>
                      <p class="text mb-0">Max file size is 1MB, Minimum dimension: 330x300 And Suitable files are .jpg & .png</p>
                      @if ($errors->any())
                            @error('upload_profile')
                                <div class="error" style="color:#FF0000">{{ $message }}</div>
                            @enderror
                       @endif
                    </div>
                  </div>
                </div>
                <div class="col-lg-7" style="width: 100%;">
                  <div class="form-style1">
                    <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <h6 class="mb-2 text-primary">User Details</h6>
                    </div>
                      <div class="col-sm-6">
                        <div class="mb20">
                          <label class="heading-color ff-heading fw500 mb10">Username</label>
                          <input type="text" class="form-control" name="Username" value="{{Session('user.USERNAME')}}" >
                          @if ($errors->any())
                                @error('Username')
                                    <div class="error" style="color:#FF0000">{{ $message }}</div>
                                @enderror
                            @endif
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="mb20">
                          <label class="heading-color ff-heading fw500 mb10">Email Address</label>
                          <input type="email" class="form-control" name="Email" value="{{Session('user.USER_EMAIL')}}" >
                          @if ($errors->any())
                                @error('Email')
                                    <div class="error" style="color:#FF0000">{{ $message }}</div>
                                @enderror
                            @endif
                        </div>
                      </div>
                      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <h6 class="mb-2 text-primary">Personal Details</h6>
                     </div>

                      <div class="col-sm-6">
                        <div class="mb20">
                          <label class="heading-color ff-heading fw500 mb10">First Name</label>
                          <input type="text" name="First_Name" value="{{Session('user.USER_FNAME')}}" class="form-control" >
                          @if ($errors->any())
                                @error('First_Name')
                                    <div class="error" style="color:#FF0000">{{ $message }}</div>
                                @enderror
                            @endif
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="mb20">
                          <label class="heading-color ff-heading fw500 mb10">Last Name</label>
                          <input type="text" name="Last_Name" value="{{Session('user.USER_LNAME')}}" class="form-control" >
                          @if ($errors->any())
                                @error('Last_Name')
                                    <div class="error" style="color:#FF0000">{{ $message }}</div>
                                @enderror
                            @endif
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="mb20">
                          <label class="heading-color ff-heading fw500 mb10">Phone Number</label>
                          <input type="text" name="Phone_Number" class="form-control" value="{{Session('user.USER_TEL')}}" >
                          @if ($errors->any())
                                @error('Phone_Number')
                                    <div class="error" style="color:#FF0000">{{ $message }}</div>
                                @enderror
                            @endif
                        </div>
                      </div>

                      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="mb20">
                            <label class="heading-color ff-heading fw500 mb10" for="website">Date Of Birth</label>
                            <input type="date" name="Date_Of_Birth" class="form-control" value="{{Session('user.USER_DOB')}}" placeholder="Date of Birth">
                            @if ($errors->any())
                                @error('Date_of_Birth')
                                    <div class="error" style="color:#FF0000">{{ $message }}</div>
                                @enderror
                            @endif
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="mb20">
                          <div class="form-style1">
                            <label class="heading-color ff-heading fw500 mb10">Gender</label>
                            <div class="bootselect-multiselect">
                                <select class="selectpicker" name="Gender" aria-label="Default select example">
                                    <option value="0" selected>Select Gender</option>
                                    <option value="MALE" @selected( Session('user.USER_GENDER') == 'MALE')>Male</option>
                                    <option value="FEMALE" {{ Session('user.USER_GENDER') == 'FEMALE'  ? 'selected' : '' }}>Female</option>
                                    <option value="OTHERS" {{ Session('user.USER_GENDER') == 'OTHERS'  ? 'selected' : '' }}>Others</option>
                                </select>
                             </div>
                             @if ($errors->any())
                                @error('Gender')
                                    <div class="error" style="color:#FF0000">{{ $message }}</div>
                                @enderror
                            @endif
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="text-start">
                          <button type="submit" class="ud-btn btn-thm" href="page-contact.html">Save<i class="fal fa-arrow-right-long"></i></button>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
               </form>
              </div>

              <div class="ps-widget bgc-white bdrs4 p30 mb30 overflow-hidden position-relative">
                <div class="bdrb1 pb15 mb25">
                  <h5 class="list-title">Address Details</h5>
                </div>
                <div class="col-lg-7" style="width: 100%;">
                  <div class="row">
                    <form method="post" action="{{route('updateAddress')}}"  class="form-style1">
                        @csrf
                      <div class="row">
                      @if(isset($addressDetails))
                        <div class="col-sm-6">
                          <div class="mb20">
                            <div class="form-style1">
                              <label class="heading-color ff-heading fw500 mb10">Street</label>
                              <input type="text" class="form-control" value="{{$addressDetails->ADDRESS_STREET}}" name="Street"  placeholder="Enter Street">
                            @if ($errors->any())
                                @error('Street')
                                    <div class="error" style="color:#FF0000">{{ $message }}</div>
                                @enderror
                            @endif
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="mb20">
                            <div class="form-style1">
                              <label class="heading-color ff-heading fw500 mb10">Country</label>
                              <input type="text" class="form-control" value="{{$addressDetails->ADDRESS_COUNTRY}}" name="Country" placeholder="Enter Country" >
                            @if ($errors->any())
                                @error('Country')
                                    <div class="error" style="color:#FF0000">{{ $message }}</div>
                                @enderror
                            @endif
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="mb20">
                            <div class="form-style1">
                              <label class="heading-color ff-heading fw500 mb10">City</label>
                              <input type="text" class="form-control" value="{{$addressDetails->ADDRESS_CITY}}" name="City" placeholder="Enter City" >
                            @if ($errors->any())
                                @error('City')
                                    <div class="error" style="color:#FF0000">{{ $message }}</div>
                                @enderror
                            @endif
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="mb20">
                            <div class="form-style1">
                              <label class="heading-color ff-heading fw500 mb10">State</label>
                              <input type="text" class="form-control"  value="{{$addressDetails->ADDRESS_STATE}}" name="State" placeholder="Enter State" >
                            @if ($errors->any())
                                @error('State')
                                    <div class="error" style="color:#FF0000">{{ $message }}</div>
                                @enderror
                            @endif
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="mb20">
                           <div class="form-style1">
                              <label class="heading-color ff-heading fw500 mb10">District</label>
                              <input type="text" class="form-control"  value="{{$addressDetails->ADDRESS_DISTRICT}}" name="District" placeholder="Enter District" >
                            @if ($errors->any())
                                @error('District')
                                    <div class="error" style="color:#FF0000">{{ $message }}</div>
                                @enderror
                            @endif
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="mb20">
                           <div class="form-style1">
                              <label class="heading-color ff-heading fw500 mb10">Postal/Zip Code</label>
                              <input type="text" class="form-control" value="{{$addressDetails->ADDRESS_POSTALCODE}}" name="Postal_Code" placeholder="Enter Postal Code" >
                            @if ($errors->any())
                                @error('Postal Code')
                                    <div class="error" style="color:#FF0000">{{ $message }}</div>
                                @enderror
                            @endif
                            </div>
                          </div>
                        </div>
                        @else
                        <div class="col-sm-6">
                          <div class="mb20">
                            <div class="form-style1">
                              <label class="heading-color ff-heading fw500 mb10">Street</label>
                              <input type="text" class="form-control" name="Street"  placeholder="Enter Street">
                              @if ($errors->any())
                                @error('Street')
                                    <div class="error" style="color:#FF0000">{{ $message }}</div>
                                @enderror
                            @endif
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="mb20">
                            <div class="form-style1">
                              <label class="heading-color ff-heading fw500 mb10">Country</label>
                              <input type="text" class="form-control" name="Country" placeholder="Enter Country" >
                              @if ($errors->any())
                                @error('Country')
                                    <div class="error" style="color:#FF0000">{{ $message }}</div>
                                @enderror
                            @endif
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="mb20">
                            <div class="form-style1">
                              <label class="heading-color ff-heading fw500 mb10">City</label>
                              <input type="text" class="form-control" name="City" placeholder="Enter City" >
                              @if ($errors->any())
                                @error('City')
                                    <div class="error" style="color:#FF0000">{{ $message }}</div>
                                @enderror
                            @endif
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="mb20">
                            <div class="form-style1">
                              <label class="heading-color ff-heading fw500 mb10">State</label>
                              <input type="text" class="form-control" name="State" placeholder="Enter State" >
                              @if ($errors->any())
                                @error('State')
                                    <div class="error" style="color:#FF0000">{{ $message }}</div>
                                @enderror
                            @endif
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="mb20">
                           <div class="form-style1">
                              <label class="heading-color ff-heading fw500 mb10">District</label>
                              <input type="text" class="form-control" name="District" placeholder="Enter District" >
                              @if ($errors->any())
                                @error('District')
                                    <div class="error" style="color:#FF0000">{{ $message }}</div>
                                @enderror
                            @endif
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="mb20">
                           <div class="form-style1">
                              <label class="heading-color ff-heading fw500 mb10">Postal/Zip Code</label>
                              <input type="text" class="form-control"  name="Postal_Code" placeholder="Enter Postal Code" >
                              @if ($errors->any())
                                @error('Postal Code')
                                    <div class="error" style="color:#FF0000">{{ $message }}</div>
                                @enderror
                            @endif
                            </div>
                          </div>
                        </div>
                        @endif
                        <div class="col-md-12">
                          <div class="text-start">
                            <button type="submit" class="ud-btn btn-thm" href="page-contact.html">Save<i class="fal fa-arrow-right-long"></i></button>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>

              </div>

              @if(Session::get('freelancer') != null)

              <div class="ps-widget bgc-white bdrs4 p30 mb30 overflow-hidden position-relative">
                <div class="bdrb1 pb15 mb25">
                  <h5 class="list-title">Freelancer Details</h5>
                </div>
                <div class="col-lg-7">
                  <div class="row">
                    <form class="form-style1" method="post" action="{{route('updateDescription')}}">
                        @csrf
                      <div class="row">
                        <div class="col-md-12">
                            <div class="mb10">
                            <label class="heading-color ff-heading fw500 mb10">Introduce Yourself</label>
                            <textarea cols="30" rows="6" name="Introduction" placeholder="Description">{{Session('freelancer.F_DESCRIPTION')}}</textarea>
                            @if ($errors->any())
                                @error('Introduction')
                                    <div class="error" style="color:#FF0000">{{ $message }}</div>
                                @enderror
                            @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                          <div class="text-start">
                            <button type="submit" class="ud-btn btn-thm">Save<i class="fal fa-arrow-right-long"></i></button>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

            <div class="ps-widget bgc-white bdrs4 p30 mb30 overflow-hidden position-relative">
                <div class="bdrb1 pb15 mb30 d-sm-flex justify-content-between">
                  <h5 class="list-title">Skills</h5>
                    <button style="background: white;border: none;background: none;" type="button" data-toggle="modal" data-target="#skillModal" class="add-more-btn text-thm"><i class="icon far fa-plus mr10"></i>Add Skills</button>
                </div>
                <div class="position-relative">
                  <div class="educational-quality ps-0">
                    <div class="wrapper mb40 position-relative">
                      <div class="del-edit">
                        <div class="d-flex">
                          <a class="icon" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Delete" aria-label="Delete"><span class="flaticon-delete"></span></a>
                        </div>
                      </div>
                      <span class="tag">2012</span>
                     </div>
                  </div>
                </div>
              </div>

              <div class="ps-widget bgc-white bdrs4 p30 mb30 overflow-hidden position-relative">
                <div class="bdrb1 pb15 mb30 d-sm-flex justify-content-between">
                  <h5 class="list-title">Certifications</h5>
                  <button style="background: white;border: none;background: none;" type="button" data-toggle="modal" data-target="#educationModal" class="add-more-btn text-thm"><i class="icon far fa-plus mr10"></i>Add Certifications</button>
                </div>
                <div class="position-relative">
                  <div class="educational-quality">
                    @if(isset($certifications))
                        @foreach($certifications as $certification)
                        <div class="m-circle text-thm">C</div>
                        <div class="wrapper mb30 position-relative">
                        <div class="del-edit">
                            <div class="d-flex">
                            <a href="" class="icon" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Delete" aria-label="Delete"><span class="flaticon-delete"></span></a>
                            </div>
                        </div>
                        <span class="tag">{{$certification->DATE_EARNED}}</span>
                        <h5 class="mt15">{{$certification->CERTIFICATION_NAME}}</h5>
                        <h6 class="text-thm">{{$certification->PROVIDER_NAME}}</h6>
                        </div>
                        @endforeach
                    @else
                    <div class="m-circle text-thm">M</div>
                        <div class="wrapper mb30 position-relative">
                           <h5 class="mt15">No certifications Added Yet</h5>
                        </div>
                    @endif
                  </div>
                  <div class=" mt100 text-start">
                  </div>
                </div>
              </div>
              @endif
              <div class="ps-widget bgc-white bdrs4 p30 mb30 overflow-hidden position-relative">
                <div class="bdrb1 pb15 mb25">
                  <h5 class="list-title">Change password</h5>
                </div>
                <div class="col-lg-7">
                  <div class="row">
                    <form method="post" action="{{route('changePassword')}}" class="form-style1">
                        @csrf
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="mb20">
                            <label class="heading-color ff-heading fw500 mb10">Old Password</label>
                            <input type="password" class="form-control" name="old_Password" placeholder="********">
                            @if ($errors->any())
                                @error('old_Password')
                                    <div class="error" style="color:#FF0000">{{ $message }}</div>
                                @enderror
                            @endif
                        </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="mb20">
                            <label class="heading-color ff-heading fw500 mb10">New Password</label>
                            <input type="password" class="form-control" name="New_Password" placeholder="********">
                            @if ($errors->any())
                                @error('New_Password')
                                    <div class="error" style="color:#FF0000">{{ $message }}</div>
                                @enderror
                            @endif
                        </div>
                        </div>
                        <div class="col-sm-12">
                          <div class="mb20">
                            <label class="heading-color ff-heading fw500 mb10">Confirm New Password</label>
                            <input type="password" class="form-control" name="password_confirmation" placeholder="********">
                            @if ($errors->any())
                                @error('password_confirmation')
                                    <div class="error" style="color:#FF0000">{{ $message }}</div>
                                @enderror
                            @endif
                        </div>
                        </div>
                        <div class="col-md-12">
                            @if(isset($error_pw))
                                <div class="error" style="color:#FF0000">{{ $error_pw }}</div>
                            @endif
                          <div class="text-start">
                            <button type="submit" class="ud-btn btn-thm" href="page-contact.html">Change Password<i class="fal fa-arrow-right-long"></i></button>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

              <div class="ps-widget bgc-white bdrs4 p30 mb30 overflow-hidden position-relative">
                <div class="col-lg-7">
                  <div class="row">
                    <div class="bdrb1 pb15 mb25">
                      <h5 class="list-title">Close Account</h5>
                    </div>
                    <form class="form-style1" method="post" action="{{route('deleteProfile')}}">
                      <div class="row">
                        <div class="col-sm-12">
                          <h6>Close account</h6>
                          <p class="text">Warning: If you close your account, you will be unsubscribed and will lose access forever.</p>
                        </div>
                        <div class="col-sm-6">
                          <div class="mb20">
                            <label class="heading-color ff-heading fw500 mb10">Enter Password</label>
                            <input type="password" class="form-control" name="close_password" placeholder="********">
                          </div>
                          <div class="text-start">
                            <button type="submit" class="ud-btn btn-thm" href="page-contact.html">Close Account<i class="fal fa-arrow-right-long"></i></button>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>

      </div>
    </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-body">
            <div class="alert alart_style_three alert-dismissible fade show mb20" style="color:#FF0000" role="alert">Error:
            @if(isset($error_pw))
                {{$error_pw}}
            @endif
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div>

        <div  class="modal fade" id="skillModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

            <form method="post" action="">
                <div class="modal-header">
                    <h5 class="modal-title">Add Skill</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-style1">
                        <label class="heading-color ff-heading fw500 mb10">Skill</label>
                        <input type="text" class="form-control" name="skill" placeholder="Skill" >
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Add Skill</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </form>
            </div>
        </div>
        </div>


        <div  class="modal fade" id="educationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <form class="form-style1" method="post" action="{{route('updateEducation')}}">
                @csrf
            <div class="modal-header">
                <h5 class="modal-title">Add Education</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                    <div class="form-style1">
                        <label class="heading-color ff-heading fw500 mb10">Certification Name </label>
                        <input type="text" class="form-control" name="Certification_Name" placeholder="Certification Name" >
                    </div>
                    <div class="form-style1">
                        <label class="heading-color ff-heading fw500 mb10">Provider Name </label>
                        <input type="text" class="form-control" name="Provider_Name" placeholder="Provider Name" >
                    </div>
                    <div class="form-style1">
                        <label class="heading-color ff-heading fw500 mb10">Date Earned</label>
                        <input type="date" class="form-control" name="Date_Earned" placeholder="Date earned" >
                    </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Add Certifications</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </form>
            </div>
        </div>
        </div>



  </div>


    @stop
    @section('user_script')
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    @if(isset($error_pw))
        <script>
        $('#exampleModal').modal('show');
        </script>
    @endif

    @stop



