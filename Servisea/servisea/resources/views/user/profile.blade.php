
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
                        <input type="text" class="form-control" value="{{$addressDetails[0]['ADDRESS_COUNTRY']}}" name="ADDRESS_COUNTRY" id="ADDRESS_COUNTRY" placeholder="Enter District">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="Street">Street</label>
                        <input type="text" class="form-control" value="{{$addressDetails[0]['ADDRESS_STREET']}}" name="ADDRESS_STREET" id="ADDRESS_STREET" placeholder="Enter Street">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="City">City</label>
                        <input type="text" class="form-control" value="{{$addressDetails[0]['ADDRESS_CITY']}}" name="ADDRESS_CITY" id="ADDRESS_CITY" placeholder="Enter City">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="State">State</label>
                        <input type="text" class="form-control" value="{{$addressDetails[0]['ADDRESS_STATE']}}" name="ADDRESS_STATE" id="ADDRESS_STATE" placeholder="Enter State">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="State">District</label>
                        <input type="text" class="form-control" value="{{$addressDetails[0]['ADDRESS_DISTRICT']}}" name="ADDRESS_DISTRICT" id="ADDRESS_DISTRICT" placeholder="Enter District">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="Zip">Postal/Zip Code</label>
                        <input type="text" class="form-control" value="{{$addressDetails[0]['ADDRESS_POSTALCODE']}}" name="ADDRESS_POSTALCODE" id="ADDRESS_POSTALCODE" placeholder="Enter District">
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

    @stop
    @section('user_script')
    <!-- JS -->
    <script src="{{asset('backend/USER_ASSET/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('backend/USER_ASSET/js/main.js')}}"></script>
    @stop



