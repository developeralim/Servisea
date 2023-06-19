
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
                        <button class="btn btn-secondary dropdown-toggle show" type="dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            User
                        </button>
                        <ul class="dropdown-menu show">
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


    <header class="header-nav nav-innerpage-style stricky main-menu border-0">
    <!-- Ace Responsive Menu -->
    <nav class="posr">
      <div class="container posr menu_bdrt1">
        <div class="row align-items-center justify-content-between">
          <div class="col-auto">
            <div class="d-flex align-items-center justify-content-between">
              <div class="logos mr20">
                <a class="header-logo logo2" href="index.html"><img src="images/header-logo-dark.svg" alt="Header Logo"></a>
              </div>
              <a class="login-info mr15" data-bs-toggle="modal" href="#exampleModalToggle" role="button"><span class="flaticon-loupe vam"></span></a>
              <!-- Responsive Menu Structure-->
              <ul id="respMenu" class="ace-responsive-menu" data-menu-style="horizontal">
                <li class="visible_list"> <a class="list-item" href="#"><span class="title">Home</span></a>
                  <!-- Level Two-->
                  <ul>
                    <li><a href="index.html">Home V1</a></li>
                    <li><a href="index2.html">Home V2</a></li>
                    <li><a href="index3.html">Home V3</a></li>
                    <li><a href="index4.html">Home V4</a></li>
                    <li><a href="index5.html">Home V5</a></li>
                    <li><a href="index6.html">Home V6</a></li>
                    <li><a href="index7.html">Home V7</a></li>
                    <li><a href="index8.html">Home V8</a></li>
                    <li><a href="index9.html">Home V9</a></li>
                    <li><a href="index10.html">Home V10</a></li>
                  </ul>
                </li>
                <li class="visible_list"> <a class="list-item" href="#"><span class="title">Browse Jobs</span></a>
                  <ul >
                    <li> <a href="#"><span class="title">Services</span></a>
                      <ul>
                        <li><a href="page-service-v1.html">Service v1</a></li>
                        <li><a href="page-service-v2.html">Service v2</a></li>
                        <li><a href="page-service-v3.html">Service v3</a></li>
                        <li><a href="page-service-v4.html">Service v4</a></li>
                        <li><a href="page-service-v5.html">Service v5</a></li>
                        <li><a href="page-service-v6.html">Service v6</a></li>
                        <li><a href="page-service-v7.html">Service v7</a></li>
                        <li><a href="page-service-all.html">Service All</a></li>
                        <li><a href="page-service-single.html">Service Single</a></li>
                      </ul>
                    </li>
                    <li> <a href="#"><span class="title">Projects</span></a>
                      <ul>
                        <li><a href="page-project-v1.html">Project v1</a></li>
                        <li><a href="page-project-single.html">Project Single</a></li>
                      </ul>
                    </li>
                    <li> <a href="#"><span class="title">Job View</span></a>
                      <ul>
                        <li><a href="page-job-list-v1.html">Job list v1</a></li>
                        <li><a href="page-job-list-v2.html">Job list v2</a></li>
                        <li><a href="page-job-list-v3.html">Job list V3</a></li>
                        <li><a href="page-job-list-single.html">Job Single</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li class="visible_list"> <a class="list-item" href="#"><span class="title">Users</span></a>
                  <ul>
                  <li><a href="{{route('viewProfileUser')}}">Profile</a></li>

                    <li> <a href="#"><span class="title">Dashboard</span></a>
                      <ul>
                        <li><a href="page-dashboard.html">Dashboard</a></li>
                        <li><a href="page-dashboard-proposal.html">Proposal</a></li>
                        <li><a href="page-dashboard-save.html">Saved</a></li>
                        <li><a href="page-dashboard-message.html">Message</a></li>
                        <li><a href="page-dashboard-reviews.html">Reviews</a></li>
                        <li><a href="page-dashboard-invoice.html">Invoice</a></li>
                        <li><a href="page-dashboard-payouts.html">Payouts</a></li>
                        <li><a href="page-dashboard-statement.html">Statement</a></li>
                        <li><a href="page-dashboard-manage-service.html">Manage Service</a></li>
                        <li><a href="page-dashboard-add-service.html">Add Services</a></li>
                        <li><a href="page-dashboard-manage-jobs.html">Manage Jobs</a></li>
                        <li><a href="page-dashboard-manage-project.html">Manage Project</a></li>
                        <li><a href="page-dashboard-create-project.html">Create Project</a></li>
                        <li><a href="page-dashboard-profile.html">My Profile</a></li>
                      </ul>
                    </li>
                    <li> <a href="#"><span class="title">Employee</span></a>
                      <ul>
                        <li><a href="page-employee-v1.html">Employee V1</a></li>
                        <li><a href="page-employee-v2.html">Employee V2</a></li>
                        <li><a href="page-employee-single.html">Employee Single</a></li>
                      </ul>
                    </li>
                    <li> <a href="#"><span class="title">Freelancer</span></a>
                      <ul>
                        <li><a href="page-freelancer-v1.html">Freelancer V1</a></li>
                        <li><a href="page-freelancer-v2.html">Freelancer V2</a></li>
                        <li><a href="page-freelancer-v3.html">Freelancer V3</a></li>
                        <li><a href="page-freelancer-single.html">Freelancer Single</a></li>
                      </ul>
                    </li>
                    <li> <a href="page-become-seller.html"><span class="title">Become Seller</span></a></li>
                  </ul>
                </li>
                <li class="visible_list"> <a class="list-item" href="#"><span class="title">Pages</span></a>
                  <ul>
                    <li> <a href="#"><span class="title">About</span></a>
                      <ul>
                        <li><a href="page-about.html">About v1</a></li>
                        <li><a href="page-about-v2.html">About v2</a></li>
                      </ul>
                    </li>
                    <li> <a href="#"><span class="title">Blog</span></a>
                      <ul>
                        <li><a href="page-blog-v1.html">List V1</a></li>
                        <li><a href="page-blog-v2.html">List V2</a></li>
                        <li><a href="page-blog-v3.html">List V3</a></li>
                        <li><a href="page-blog-single.html">Single</a></li>
                      </ul>
                    </li>
                    <li> <a href="#"><span class="title">Shop</span></a>
                      <ul>
                        <li><a href="page-shop.html">List</a></li>
                        <li><a href="page-shop-single.html">Single</a></li>
                        <li><a href="page-shop-cart.html">Cart</a></li>
                        <li><a href="page-shop-checkout.html">Checkout</a></li>
                        <li><a href="page-shop-order.html">Order</a></li>
                      </ul>
                    </li>
                    <li><a href="page-contact.html">Contact</a></li>
                    <li><a href="page-error.html">404</a></li>
                    <li><a href="page-faq.html">Faq</a></li>
                    <li><a href="page-help.html">Help</a></li>
                    <li><a href="page-invoice.html">Invoices</a></li>
                    <li><a href="page-login.html">Login</a></li>
                    <li><a href="page-pricing.html">Pricing</a></li>
                    <li><a href="page-register.html">Register</a></li>
                    <li><a href="page-terms.html">Terms</a></li>
                    <li><a href="page-ui-element.html">UI Elements</a></li>
                  </ul>
                </li>
                <li> <a class="list-item" href="page-contact.html">Contact</a></li>
              </ul>
            </div>
          </div>
          <div class="col-auto">
            <div class="d-flex align-items-center">
              <a class="login-info mx15-lg mx30" href="page-become-seller.html"><span class="d-none d-xl-inline-block">Become a</span> Seller</a>
                @if (Session::get('user') == null )
                    <a class="login-info mr15-lg mr30" href="{{route('login_user')}}">Sign in</a>
                    <a class="ud-btn btn-white2 add-joining at-home10" href="page-register.html">Join</a>
                @else
                    <a class="ud-btn btn-white2 add-joining at-home10" href="page-register.html">Welcome {{Session('user.USERNAME')}}</a>
                @endif
            </div>
          </div>
        </div>
      </div>
    </nav>
  </header>



