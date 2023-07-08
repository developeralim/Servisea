
    <header class="header-nav nav-innerpage-style stricky main-menu border-0">
    <!-- Ace Responsive Menu -->
    <nav class="posr">
      <div class="container posr menu_bdrt1">
        <div class="row align-items-center justify-content-between">
          <div class="col-auto">
            <div class="d-flex align-items-center justify-content-between">
              <div class="logos mr20">
                <a class="header-logo logo2" href="{{route('index')}}"><img style="width: 100px;" src="{{asset('backend/THEME/images/icon/logo.png')}}" alt="Header Logo"></a>
              </div>
              <a class="login-info mr15" data-bs-toggle="modal" href="#exampleModalToggle" role="button"><span class="flaticon-loupe vam"></span></a>
              <!-- Responsive Menu Structure-->
              <ul id="respMenu" class="ace-responsive-menu" data-menu-style="horizontal">
                <li class="visible_list"> <a class="list-item" href="{{route('index')}}"><span class="title">Home</span></a></li>
                <li> <a class="list-item" href="page-contact.html">Contact</a></li>
                @if (Session::get('user') !== null )
                <li class="visible_list"> <a class="list-item" href="{{route('viewAllGig')}}"><span class="title">Services</span></a></li>
                <li class="visible_list"> <a class="list-item" href="{{route('chat.index',[session('user')->USERNAME])}}" ><span class="title">Message</span></a></li>
                @if (Session::get('freelancer') == null && Session::get('employee') == null)
                <li class="visible_list"> <a class="list-item" href="{{route('OrderList')}}"><span class="title">Orders</span></a></li>
                <li class="visible_list"> <a class="list-item"><span class="title">Project Owner</span></a>
                    <ul>
                        <li> <a href="#"><span class="title">Requests</span></a>
                            <ul>
                                <li><a href="{{route('viewReqJobList')}}">View Request List</a></li>
                                <li><a href="{{route('viewRequestJobPage')}}">Post a Request</a></li>
                            </ul>
                        </li>
                        <li><a><span class="title">Billing and Payments</span></a></li>
                    </ul>
                </li>
                @elseif(Session::get('freelancer') != null)
                <li class="visible_list"> <a class="list-item"><span class="title">Freelancer</span></a>
                    <ul>
                        <li><a><span class="title">Analytics</span></a>
                            <ul>
                                <li><a href="">Overview</a></li>
                            </ul>
                        </li>
                        <li><a><span class="title">Gig</span></a>
                            <ul>
                                <li><a href="">View Created Gig</a></li>
                                <li><a href="{{route('viewOverviewPage')}}">Post a Gig</a></li>
                            </ul>
                        </li>
                        <li><a><span class="title">Jobs</span></a>
                            <ul>
                                <li><a href="">View Applied Jobs</a></li>
                                <li><a href="">Apply Job</a></li>
                            </ul>
                        </li>
                        <li><a><span class="title">Orders</span></a>
                            <ul>
                                <li><a href="{{route('OrderList')}}">Orders</a></li>
                            </ul>
                        </li>
                        <li><a><span class="title">Billing and Payments</span></a>
                            <ul>
                                <li><a href="">View Earnings</a></li>
                                <li><a href="">View Disputes</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                @elseif(Session::get('employee') != null)
                <li class="visible_list"> <a class="list-item"><span class="title">Employee</span></a>
                    <ul>
                        <li><a><span class="title">Disputes</span></a>
                            <ul>
                                <li><a href="">View Disputes</a></li>
                            </ul>
                        </li>
                        <li><a><span class="title">Refund</span></a>
                            <ul>
                                <li><a href="">View Disputes</a></li>
                            </ul>
                        </li>
                        <li><a><span class="title">Users</span></a>
                            <ul>
                                <li><a href="">Freelancers</a></li>
                                <li><a href="">Project Owners</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                @endif
                <li> <a class="list-item" href="{{route('clearSession')}}">Log Out</a></li>
                @endif
              </ul>
            </div>
          </div>
          <div class="col-auto">
            <div class="d-flex align-items-center">
                @if (Session::get('user') == null)
                    <a class="login-info mr15-lg mr30" href="{{route('login_user')}}">Sign in</a>
                    <a class="ud-btn btn-white2 add-joining at-home10" href="{{route('RegisterUser.page')}}">Join</a>
                @else
                    @if (Session::get('freelancer') == null )
                        <a class="login-info mx15-lg mx30" href="{{route('switchToSeller')}}"><span class="d-none d-xl-inline-block">Become a</span> Seller</a>
                    @else
                        <a class="login-info mx15-lg mx30" href="{{route('switchToBuyer')}}"><span class="d-none d-xl-inline-block">Switch to</span> Buyer</a>
                    @endif
                    <a class="ud-btn btn-white2 add-joining at-home10" href="{{route('viewProfileUser')}}">Welcome {{Session('user.USERNAME')}}</a>
                @endif
            </div>
          </div>
        </div>
      </div>
    </nav>
  </header>

    <!-- Search Modal -->
    <div class="search-modal">
    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalToggleLabel"></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fal fa-xmark"></i></button>
          </div>
          <div class="modal-body">
            <div class="popup-search-field search_area">
              <input type="text" class="form-control border-0" placeholder="What service are you looking for today?">
              <label><span class="far fa-magnifying-glass"></span></label>
              <button class="ud-btn btn-thm" type="submit">Search</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="hiddenbar-body-ovelay"></div>

  <!-- Mobile Nav  -->
  <div id="page" class="mobilie_header_nav stylehome1">
    <div class="mobile-menu">
      <div class="header bdrb1">
        <div class="menu_and_widgets">
          <div class="mobile_menu_bar d-flex justify-content-between align-items-center">
            <a class="mobile_logo" href="#"><img src="images/header-logo-dark.svg" alt=""></a>
            <div class="right-side text-end">
              <a class="" href="page-login.html">join</a>
              <a class="menubar ml30" href="#menu"><img src="images/mobile-dark-nav-icon.svg" alt=""></a>
            </div>
          </div>
        </div>
        <div class="posr"><div class="mobile_menu_close_btn"><span class="far fa-times"></span></div></div>
      </div>
    </div>
    <!-- /.mobile-menu -->
    <nav id="menu" class="">
      <ul>
        <li><span>Home</span>
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
        <li><span>Browse Jobs</span>
          <ul>
            <li><span>Services</span>
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
            <li><span>Projects</span>
              <ul>
                <li><a href="page-project-v1.html">Project v1</a></li>
                <li><a href="page-project-single.html">Project Single</a></li>
              </ul>
            </li>
            <li><span>Job View</span>
              <ul>
                <li><a href="page-job-list-v1.html">Job list v1</a></li>
                <li><a href="page-job-list-v2.html">Job list v2</a></li>
                <li><a href="page-job-list-v3.html">Job list V3</a></li>
                <li><a href="page-job-list-single.html">Job Single</a></li>
              </ul>
            </li>
          </ul>
        </li>
        <li><span>Users</span>
          <ul>
            <li><span>Dashboard</span>
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
            <li><span>Employee</span>
              <ul>
                <li><a href="page-employee-v1.html">Employee V1</a></li>
                <li><a href="page-employee-v2.html">Employee V2</a></li>
                <li><a href="page-employee-single.html">Employee Single</a></li>
              </ul>
            </li>
            <li><span>Freelancer</span>
              <ul>
                <li><a href="page-freelancer-v1.html">Freelancer V1</a></li>
                <li><a href="page-freelancer-v2.html">Freelancer V2</a></li>
                <li><a href="page-freelancer-v3.html">Freelancer V3</a></li>
                <li><a href="page-freelancer-single.html">Freelancer Single</a></li>
              </ul>
            </li>
            <li><a href="page-become-seller.html">Become Seller</a></li>
          </ul>
        </li>
        <li><span>Pages</span>
          <ul>
            <li><span>About</span>
              <ul>
                <li><a href="page-about.html">About v1</a></li>
                <li><a href="page-about-v2.html">About v2</a></li>
              </ul>
            </li>
            <li><span>Shop</span>
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
        <li><span>Blog</span>
          <ul>
            <li><a href="page-blog-v1.html">List V1</a></li>
            <li><a href="page-blog-v2.html">List V2</a></li>
            <li><a href="page-blog-v3.html">List V3</a></li>
            <li><a href="page-blog-single.html">Single</a></li>
          </ul>
        </li>
        <!-- Only for Mobile View -->
      </ul>
    </nav>
  </div>



