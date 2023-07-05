
@extends('user.user_master')

@section('user_page')
<head>
<title>Sign Up Form by Colorlib</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

@stop

@section('user_style')
<style>
body {
    margin: 0;
    padding-top: 40px;
    color: #2e323c;
    background: #f5f6fa;
    position: relative;
    height: 100%;
}
.account-settings .user-profile {
    margin: 0 0 1rem 0;
    padding-bottom: 1rem;
    text-align: center;
}
.account-settings .user-profile .user-avatar {
    margin: 0 0 1rem 0;
}
.account-settings .user-profile .user-avatar img {
    width: 90px;
    height: 90px;
    -webkit-border-radius: 100px;
    -moz-border-radius: 100px;
    border-radius: 100px;
}
.account-settings .user-profile h5.user-name {
    margin: 0 0 0.5rem 0;
}
.account-settings .user-profile h6.user-email {
    margin: 0;
    font-size: 0.8rem;
    font-weight: 400;
    color: #9fa8b9;
}
.account-settings .about {
    margin: 2rem 0 0 0;
    text-align: center;
}
.account-settings .about h5 {
    margin: 0 0 15px 0;
    color: #007ae1;
}
.account-settings .about p {
    font-size: 0.825rem;
}
.form-control {
    border: 1px solid #cfd1d8;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
    font-size: .825rem;
    background: #ffffff;
    color: #2e323c;
}

.card {
    background: #ffffff;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    border: 0;
    margin-bottom: 1rem;
}
</style>

@stop
@section('user-main-content')

<div class="container">
<div class="row gutters">
<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
<div class="card h-100">
	<div class="card-body">
		<div class="account-settings">
			<div class="user-profile">
				<div class="user-avatar">
					<img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Maxwell Admin">
                    <input type="file" value="{{Session('user.USER_IMG')}}" placeholder="" id="customFile" name="USER_IMG">
                </div>
				<h5 class="user-name">{{Session('user.USER_FNAME')}} {{Session('user.LNAME')}}</h5>
				<h6 class="user-email">{{Session('user.USER_EMAIL')}}</h6>
			</div>
		</div>
	</div>
</div>
</div>

<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
<div class="card h-100">
	<div class="card-body">
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
     <form method="POST" action="{{ route('updateUser')}}" class="register-form" id="register-form">
        @csrf
     <div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<h6 class="mb-2 text-primary">User Details</h6>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" class="form-control" value="{{Session('user.USERNAME')}}" name="USERNAME" placeholder="Enter Username">
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="Email">Email</label>
					<input type="Email" class="form-control" value="{{Session('user.USER_EMAIL')}}" name="USER_EMAIL" placeholder="Enter email ID">
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="Password">Password</label>
					<input type="Password" class="form-control" value="{{Session('user.USER_PASSWORD')}}" name="USER_PASSWORD" placeholder="Enter password">
				</div>
			</div>
		</div>
        <br>
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<h6 class="mb-2 text-primary">Personal Details</h6>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="username">First Name</label>
					<input type="text" class="form-control" value="{{Session('user.FNAME')}}" name="USER_FNAME" id="USER_FNAME" placeholder="Enter First Name">
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="eMail">Last Name</label>
					<input type="email" class="form-control" value="{{Session('user.LNAME')}}"  name="USER_LNAME" id="USER_LNAME" placeholder="Enter Last Name">
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="phone">Telephone</label>
					<input type="text" class="form-control" value="{{Session('user.USER_TEL')}}" name="USER_TEL" id="USER_TEL" placeholder="Enter Phone Number">
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="website">Date Of Birth</label>
					<input type="date" class="form-control" value="{{Session('user.USER_DOB')}}" name="USER_DOB" id="USER_DOB" placeholder="Date of Birth">
				</div>
			</div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="website">Gender</label>
                    <select class="form-control" name="USER_GENDER" aria-label="Default select example">
                                    <option selected>Select Gender</option>
                                    <option value="MALE" @selected( Session('user.USER_GENDER') == 'MALE')>Male</option>
                                    <option value="FEMALE" {{ Session('user.USER_GENDER') == 'FEMALE'  ? 'selected' : '' }}>Female</option>
                                    <option value="OTHERS" {{ Session('user.USER_GENDER') == 'OTHERS'  ? 'selected' : '' }}>Others</option>
                    </select>
				</div>
			</div>
		</div>
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<h6 class="mt-3 mb-2 text-primary">Address Details</h6>
			</div>
            @if(isset($addressDetails))
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="Country">Country</label>
                        <input type="text" class="form-control" value="{{$addressDetails->ADDRESS_COUNTRY}}" name="ADDRESS_COUNTRY" id="ADDRESS_COUNTRY" placeholder="Enter District">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="Street">Street</label>
                        <input type="text" class="form-control" value="{{$addressDetails->ADDRESS_STREET}}" name="ADDRESS_STREET" id="ADDRESS_STREET" placeholder="Enter Street">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="City">City</label>
                        <input type="text" class="form-control" value="{{$addressDetails->ADDRESS_CITY}}" name="ADDRESS_CITY" id="ADDRESS_CITY" placeholder="Enter City">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="State">State</label>
                        <input type="text" class="form-control" value="{{$addressDetails->ADDRESS_STATE}}" name="ADDRESS_STATE" id="ADDRESS_STATE" placeholder="Enter State">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="State">District</label>
                        <input type="text" class="form-control" value="{{$addressDetails->ADDRESS_DISTRICT}}" name="ADDRESS_DISTRICT" id="ADDRESS_DISTRICT" placeholder="Enter District">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="Zip">Postal/Zip Code</label>
                        <input type="text" class="form-control" value="{{$addressDetails->ADDRESS_POSTALCODE}}" name="ADDRESS_POSTALCODE" id="ADDRESS_POSTALCODE" placeholder="Enter District">
                    </div>
                </div>

                @else
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="Street">Street</label>
                        <input type="text" class="form-control" name="ADDRESS_STREET" id="ADDRESS_STREET" placeholder="Enter Street">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="City">City</label>
                        <input type="text" class="form-control" name="ADDRESS_CITY" id="ADDRESS_CITY" placeholder="Enter City">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="State">State</label>
                        <input type="text" class="form-control" name="ADDRESS_STATE" id="ADDRESS_STATE" placeholder="Enter State">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="State">District</label>
                        <input type="text" class="form-control" name="ADDRESS_DISTRICT" id="ADDRESS_DISTRICT" placeholder="Enter District">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="Zip">Postal/Zip Code</label>
                        <input type="text" class="form-control" name="ADDRESS_POSTALCODE" id="ADDRESS_POSTALCODE" placeholder="Enter District">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="Country">Country</label>
                        <input type="text" class="form-control" name="ADDRESS_COUNTRY" id="ADDRESS_COUNTRY" placeholder="Enter District">
                    </div>
                </div>
                @endif
		</div>
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<di  v class="text-right">
					<button type="button" id="submit" name="submit" class="btn btn-secondary">Cancel</button>
					<button type="submit" id="submit" name="submit" class="btn btn-primary">Update</button>
				</di>
			</div>
		</div>
        </form>
	</div>

</div>
</div>
</div>
</div>

<div class="dashboard_content_wrapper">
    <div class="dashboard dashboard_wrapper pr30 pr0-xl">

      <div class="dashboard__main pl0-md">
        <div class="dashboard__content hover-bgc-color">
          <div class="row pb40">
            <div class="col-lg-9">
              <div class="dashboard_title_area">
                <h2>My Profile</h2>
                <p class="text">Lorem ipsum dolor sit amet, consectetur.</p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xl-12">
              <div class="ps-widget bgc-white bdrs4 p30 mb30 overflow-hidden position-relative">
                <div class="bdrb1 pb15 mb25">
                  <h5 class="list-title">Profile Details</h5>
                </div>
                <div class="col-xl-7">
                  <div class="profile-box d-sm-flex align-items-center mb30">
                    <div class="profile-img mb20-sm">
                      <img class="w-100 rounded-circle wa-xs" src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="">
                    </div>
                    <div class="profile-content ml20 ml0-xs">
                      <div class="d-flex align-items-center my-3">
                        <a href="" class="tag-delt text-thm2"><span class="flaticon-delete text-thm2"></span></a>
                        <a href="" class="upload-btn ml10">Upload Images</a>
                      </div>
                      <p class="text mb-0">Max file size is 1MB, Minimum dimension: 330x300 And Suitable files are .jpg & .png</p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-7">
                  <form class="form-style1">
                    <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <h6 class="mb-2 text-primary">User Details</h6>
                    </div>
                      <div class="col-sm-6">
                        <div class="mb20">
                          <label class="heading-color ff-heading fw500 mb10">Username</label>
                          <input type="text" class="form-control" value="{{Session('user.USERNAME')}}" >
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="mb20">
                          <label class="heading-color ff-heading fw500 mb10">Email Address</label>
                          <input type="email" class="form-control" value="{{Session('user.USER_EMAIL')}}" >
                        </div>
                      </div>
                      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <h6 class="mb-2 text-primary">Personal Details</h6>
                     </div>

                      <div class="col-sm-6">
                        <div class="mb20">
                          <label class="heading-color ff-heading fw500 mb10">First Name</label>
                          <input type="text" class="form-control" >
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="mb20">
                          <label class="heading-color ff-heading fw500 mb10">Last Name</label>
                          <input type="text" class="form-control" >
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="mb20">
                          <label class="heading-color ff-heading fw500 mb10">Phone Number</label>
                          <input type="text" class="form-control" value="{{Session('user.USER_TEL')}}" >
                        </div>
                      </div>

                      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="mb20">
                            <label class="heading-color ff-heading fw500 mb10" for="website">Date Of Birth</label>
                            <input type="date" class="form-control" value="{{Session('user.USER_DOB')}}" name="USER_DOB" id="USER_DOB" placeholder="Date of Birth">
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="mb20">
                          <div class="form-style1">
                            <label class="heading-color ff-heading fw500 mb10">Hourly Rate</label>
                            <div class="bootselect-multiselect">
                              <select class="selectpicker">
                                <option>Select</option>
                                <option>$50</option>
                                <option>$60</option>
                                <option>$70</option>
                                <option>$80</option>
                                <option>$90</option>
                                <option>$100</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="mb20">
                          <div class="form-style1">
                            <label class="heading-color ff-heading fw500 mb10">Gender</label>
                            <div class="bootselect-multiselect">
                              <select class="selectpicker">
                                <option>Select</option>
                                <option>Male</option>
                                <option>Female</option>
                                <option>Other</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="mb20">
                          <div class="form-style1">
                            <label class="heading-color ff-heading fw500 mb10">Specialization</label>
                            <div class="bootselect-multiselect">
                              <select class="selectpicker">
                                <option>Select</option>
                                <option>Male</option>
                                <option>Female</option>
                                <option>Other</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="mb20">
                          <div class="form-style1">
                            <label class="heading-color ff-heading fw500 mb10">Type</label>
                            <div class="bootselect-multiselect">
                              <select class="selectpicker">
                                <option>Select</option>
                                <option>Type One</option>
                                <option>Type Two</option>
                                <option>Type Three</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="mb20">
                          <div class="form-style1">
                            <label class="heading-color ff-heading fw500 mb10">Country</label>
                            <div class="bootselect-multiselect">
                              <select class="selectpicker">
                                <option>Turkey</option>
                                <option>United Kingdom</option>
                                <option>United State</option>
                                <option>Ukraine</option>
                                <option>Uruguay</option>
                                <option>UK</option>
                                <option>Uzbekistan</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="mb20">
                          <div class="form-style1">
                            <label class="heading-color ff-heading fw500 mb10">City</label>
                            <div class="bootselect-multiselect">
                              <select class="selectpicker">
                                <option data-tokens="California">California</option>
                                <option data-tokens="Chicago">Chicago</option>
                                <option data-tokens="LosAngeles">Los Angeles</option>
                                <option data-tokens="Manhattan">Manhattan</option>
                                <option data-tokens="NewJersey">New Jersey</option>
                                <option data-tokens="NewYork">New York</option>
                                <option data-tokens="SanDiego">San Diego</option>
                                <option data-tokens="SanFrancisco">San Francisco</option>
                                <option data-tokens="Texas">Texas</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="mb20">
                          <div class="form-style1">
                            <label class="heading-color ff-heading fw500 mb10">Languages</label>
                            <div class="bootselect-multiselect">
                              <select class="selectpicker" multiple>
                                <option>English</option>
                                <option>Spanish</option>
                                <option>Greek</option>
                                <option>Tarkish</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="mb20">
                          <div class="form-style1">
                            <label class="heading-color ff-heading fw500 mb10">Languages Level</label>
                            <div class="bootselect-multiselect">
                              <select class="selectpicker">
                                <option>Select</option>
                                <option>Fluent</option>
                                <option>Mid Level</option>
                                <option>Conversational</option>
                                <option>Other</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="mb10">
                          <label class="heading-color ff-heading fw500 mb10">Introduce Yourself</label>
                          <textarea cols="30" rows="6" placeholder="Description"></textarea>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="text-start">
                          <a class="ud-btn btn-thm" href="page-contact.html">Save<i class="fal fa-arrow-right-long"></i></a>
                        </div>
                      </div>

                    </div>
                  </form>
                </div>
              </div>
              <div class="ps-widget bgc-white bdrs4 p30 mb30 overflow-hidden position-relative">
                <div class="bdrb1 pb15 mb25">
                  <h5 class="list-title">Skills</h5>
                </div>
                <div class="col-lg-7">
                  <div class="row">
                    <form class="form-style1">
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="mb20">
                            <div class="form-style1">
                              <label class="heading-color ff-heading fw500 mb10">Skills 1</label>
                              <div class="bootselect-multiselect">
                                <select class="selectpicker">
                                  <option>Designer</option>
                                  <option>UI/UX</option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="mb20">
                            <div class="form-style1">
                              <label class="heading-color ff-heading fw500 mb10">Point</label>
                              <div class="bootselect-multiselect">
                                <select class="selectpicker">
                                  <option>90</option>
                                  <option>80</option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="mb20">
                            <div class="form-style1">
                              <label class="heading-color ff-heading fw500 mb10">Skills 2</label>
                              <div class="bootselect-multiselect">
                                <select class="selectpicker">
                                  <option>Developer</option>
                                  <option>Programmer</option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="mb20">
                            <div class="form-style1">
                            <label class="heading-color ff-heading fw500 mb10">Point</label>
                              <div class="bootselect-multiselect">
                                <select class="selectpicker">
                                  <option>60</option>
                                  <option>70</option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="mb20">
                            <div class="form-style1">
                              <label class="heading-color ff-heading fw500 mb10">Skills 3</label>
                              <div class="bootselect-multiselect">
                                <select class="selectpicker">
                                  <option>Video Editor</option>
                                  <option>Audio & Music</option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="mb20">
                            <div class="form-style1">
                              <label class="heading-color ff-heading fw500 mb10">Point</label>
                              <div class="bootselect-multiselect">
                                <select class="selectpicker">
                                  <option>75</option>
                                  <option>80</option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="text-start">
                            <a class="ud-btn btn-thm" href="page-contact.html">Save<i class="fal fa-arrow-right-long"></i></a>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="ps-widget bgc-white bdrs4 p30 mb30 overflow-hidden position-relative">
                <div class="bdrb1 pb15 mb30 d-sm-flex justify-content-between">
                  <h5 class="list-title">Education</h5>
                  <a href="" class="add-more-btn text-thm"><i class="icon far fa-plus mr10"></i>Add Aducation</a>
                </div>
                <div class="position-relative">
                  <div class="educational-quality">
                    <div class="m-circle text-thm">M</div>
                    <div class="wrapper mb40 position-relative">
                      <div class="del-edit">
                        <div class="d-flex">
                          <a href="" class="icon me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Edit" aria-label="Edit"><span class="flaticon-pencil"></span></a>
                          <a href="" class="icon" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Delete" aria-label="Delete"><span class="flaticon-delete"></span></a>
                        </div>
                      </div>
                      <span class="tag">2012 - 2014</span>
                      <h5 class="mt15">Bachlors in Fine Arts</h5>
                      <h6 class="text-thm">Modern College</h6>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante ipsum <br class="d-none d-lg-block"> primis in faucibus.</p>
                    </div>
                    <div class="m-circle before-none text-thm">M</div>
                    <div class="wrapper mb30 position-relative">
                      <div class="del-edit">
                        <div class="d-flex">
                          <a href="" class="icon me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Edit" aria-label="Edit"><span class="flaticon-pencil"></span></a>
                          <a href="" class="icon" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Delete" aria-label="Delete"><span class="flaticon-delete"></span></a>
                        </div>
                      </div>
                      <span class="tag">2008 - 2012</span>
                      <h5 class="mt15">Computer Science</h5>
                      <h6 class="text-thm">Harvartd University</h6>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante ipsum <br class="d-none d-lg-block"> primis in faucibus.</p>
                    </div>
                  </div>
                  <div class="text-start">
                    <a class="ud-btn btn-thm" href="">Save<i class="fal fa-arrow-right-long"></i></a>
                  </div>
                </div>
              </div>
              <div class="ps-widget bgc-white bdrs4 p30 mb30 overflow-hidden position-relative">
                <div class="bdrb1 pb15 mb30 d-sm-flex justify-content-between">
                  <h5 class="list-title">Work & Experience</h5>
                  <a href="" class="add-more-btn text-thm"><i class="icon far fa-plus mr10"></i>Add Experience</a>
                </div>
                <div class="position-relative">
                  <div class="educational-quality">
                    <div class="m-circle text-thm">M</div>
                    <div class="wrapper mb40 position-relative">
                      <div class="del-edit">
                        <div class="d-flex">
                          <a href="" class="icon me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Edit" aria-label="Edit"><span class="flaticon-pencil"></span></a>
                          <a href="" class="icon" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Delete" aria-label="Delete"><span class="flaticon-delete"></span></a>
                        </div>
                      </div>
                      <span class="tag">2012 - 2014</span>
                      <h5 class="mt15">UX Designer</h5>
                      <h6 class="text-thm">Dropbox</h6>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante ipsum <br class="d-none d-lg-block"> primis in faucibus.</p>
                    </div>
                    <div class="m-circle before-none text-thm">M</div>
                    <div class="wrapper mb30 position-relative">
                      <div class="del-edit">
                        <div class="d-flex">
                          <a href="" class="icon me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Edit" aria-label="Edit"><span class="flaticon-pencil"></span></a>
                          <a href="" class="icon" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Delete" aria-label="Delete"><span class="flaticon-delete"></span></a>
                        </div>
                      </div>
                      <span class="tag">2008 - 2012</span>
                      <h5 class="mt15">Art Director</h5>
                      <h6 class="text-thm">amazon</h6>
                      <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante ipsum <br class="d-none d-lg-block"> primis in faucibus.</p>
                    </div>
                  </div>
                  <div class="text-start">
                    <a class="ud-btn btn-thm" href="">Save<i class="fal fa-arrow-right-long"></i></a>
                  </div>
                </div>
              </div>
              <div class="ps-widget bgc-white bdrs4 p30 mb30 overflow-hidden position-relative">
                <div class="bdrb1 pb15 mb30 d-sm-flex justify-content-between">
                  <h5 class="list-title">Awards</h5>
                  <a href="" class="add-more-btn text-thm"><i class="icon far fa-plus mr10"></i>Add Awards</a>
                </div>
                <div class="position-relative">
                  <div class="educational-quality ps-0">
                    <div class="wrapper mb40 position-relative">
                      <div class="del-edit">
                        <div class="d-flex">
                          <a href="" class="icon me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Edit" aria-label="Edit"><span class="flaticon-pencil"></span></a>
                          <a href="" class="icon" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Delete" aria-label="Delete"><span class="flaticon-delete"></span></a>
                        </div>
                      </div>
                      <span class="tag">2012 - 2014</span>
                      <h5 class="mt15">UI UX Design</h5>
                      <h6 class="text-thm">Udemy</h6>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante ipsum <br class="d-none d-lg-block"> primis in faucibus.</p>
                    </div>
                    <div class="wrapper mb40 position-relative">
                      <div class="del-edit">
                        <div class="d-flex">
                          <a href="" class="icon me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Edit" aria-label="Edit"><span class="flaticon-pencil"></span></a>
                          <a href="" class="icon" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Delete" aria-label="Delete"><span class="flaticon-delete"></span></a>
                        </div>
                      </div>
                      <span class="tag">2008 - 2012</span>
                      <h5 class="mt15">App Design</h5>
                      <h6 class="text-thm">Google</h6>
                      <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante ipsum <br class="d-none d-lg-block"> primis in faucibus.</p>
                    </div>
                  </div>
                  <div class="text-start">
                    <a class="ud-btn btn-thm" href="">Save<i class="fal fa-arrow-right-long"></i></a>
                  </div>
                </div>
              </div>
              <div class="ps-widget bgc-white bdrs4 p30 mb30 overflow-hidden position-relative">
                <div class="bdrb1 pb15 mb25">
                  <h5 class="list-title">Change password</h5>
                </div>
                <div class="col-lg-7">
                  <div class="row">
                    <form class="form-style1">
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="mb20">
                            <label class="heading-color ff-heading fw500 mb10">Old Password</label>
                            <input type="text" class="form-control" placeholder="********">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="mb20">
                            <label class="heading-color ff-heading fw500 mb10">New Password</label>
                            <input type="text" class="form-control" placeholder="********">
                          </div>
                        </div>
                        <div class="col-sm-12">
                          <div class="mb20">
                            <label class="heading-color ff-heading fw500 mb10">Confirm New Password</label>
                            <input type="text" class="form-control" placeholder="********">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="text-start">
                            <a class="ud-btn btn-thm" href="page-contact.html">Change Password<i class="fal fa-arrow-right-long"></i></a>
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
                      <h5 class="list-title">Change password</h5>
                    </div>
                    <form class="form-style1">
                      <div class="row">
                        <div class="col-sm-12">
                          <h6>Close account</h6>
                          <p class="text">Warning: If you close your account, you will be unsubscribed from all your 5 courses, and will lose access forever.</p>
                        </div>
                        <div class="col-sm-6">
                          <div class="mb20">
                            <label class="heading-color ff-heading fw500 mb10">Enter Password</label>
                            <input type="text" class="form-control" placeholder="********">
                          </div>
                          <div class="text-start">
                            <a class="ud-btn btn-thm" href="page-contact.html">Change Password<i class="fal fa-arrow-right-long"></i></a>
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
  </div>

    @stop
    @section('user_script')
    <!-- JS -->
    <script src="{{asset('backend/USER_ASSET/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('backend/USER_ASSET/js/main.js')}}"></script>
    @stop



