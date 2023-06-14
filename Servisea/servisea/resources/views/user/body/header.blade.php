
 <!-- Start Top Nav -->
<nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
        <div class="container text-light">
            <div class="w-100 d-flex justify-content-between">
                <div>
                    <i class="fa fa-envelope mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="mailto:info@company.com">info@company.com</a>
                    <i class="fa fa-phone mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="tel:010-020-0340">010-020-0340</a>
                </div>
                <div>
                    <a class="text-light" href="https://fb.com/templatemo" target="_blank" rel="sponsored"><i class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://twitter.com/" target="_blank"><i class="fab fa-twitter fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.linkedin.com/" target="_blank"><i class="fab fa-linkedin fa-sm fa-fw"></i></a>
                </div>
            </div>
        </div>
</nav>
    <!-- Close Top Nav -->


    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">

            <a class="navbar-brand text-success logo h1 align-self-center" href="index.html">
                Zay
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.html">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.html">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="shop.html">Shop</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.html">Contact</a>
                        </li>
                        <li class="nav-item">
                        @if (Session::get('user') !== null )
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            User
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('viewProfileUser')}}">Profile</a></li>
                            <li><a class="dropdown-item" href="{{route('viewRequestJobPage') }}">Post a request</a></li>
                            <li><a class="dropdown-item" href="#">Billing and Payments</a></li>
                            <li><a class="dropdown-item" href="{{route('viewAllGig')}}">View all Gig</a></li>
                            <li><a class="dropdown-item" href="#">Setting</a></li>
                            <li><a class="dropdown-item" href="#">Orders</a></li>
                            <li><a class="dropdown-item" href="{{route('viewJobList')}}">Requests List</a></li>
                            <li><a class="dropdown-item" href="#">Chat</a></li>
                            <li><a class="dropdown-item" href="#">Dispute</a></li>
                            <li><a class="dropdown-item" href="{{route('clearSession')}}">Log Out</a></li>
                            @if (Session::get('user.USER_ROLE') == 2 )
                            <li><a class="dropdown-item" href="{{route('switchToBuyer')}}">Switch to Buyer</a></li>
                            <li><a class="dropdown-item" href="{{route('viewOverviewPage')}}">Post a gig</a></li>

                            <li><a class="dropdown-item" href="">View Created Gigs</a></li>
                            <li><a class="dropdown-item" href="">Apply Jobs</a></li>
                            <li><a class="dropdown-item" href="">View Freelancer Profile</a></li>
                            <li><a class="dropdown-item" href="">View orders</a></li>
                            <li><a class="dropdown-item" href="">View Earnings</a></li>
                            @else
                            <li><a class="dropdown-item" href="{{route('switchToSeller')}}">Become a Seller</a></li>
                            @endif

                        </ul>
                    </div>
                    @endif
                        </li>
                    </ul>

                </div>
                <div class="navbar align-self-center d-flex">

                    <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                        <div class="input-group">
                            <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                            <div class="input-group-text">
                                <i class="fa fa-fw fa-search"></i>
                            </div>
                        </div>
                    </div>

                    <a class="nav-icon d-none d-lg-inline" href="#" data-bs-toggle="modal" data-bs-target="#templatemo_search">
                        <i class="fa fa-fw fa-search text-dark mr-2"></i>
                    </a>

                    @if (Session::get('user') == null )
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Register
                    </button>
                    <br>
                    <a class="nav-icon position-relative text-decoration-none" href="{{route('login_user')}}">
                        <i class="" >Login</i>
                    </a>
                    @else
                    <a class="nav-icon position-relative text-decoration-none">
                        <i class="" >Welcome {{Session('user.USERNAME')}}</i>
                    </a>
                    @endif
                </div>
            </div>

        </div>
    </nav>

    <!-- Close Header -->
