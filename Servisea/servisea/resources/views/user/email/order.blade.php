<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="bidding, fiverr, freelance marketplace, freelancers, freelancing, gigs, hiring, job board, job portal, job posting, jobs marketplace, peopleperhour, proposals, sell services, upwork">
<meta name="description" content="Freeio - Freelance Marketplace HTML Template">
<meta name="CreativeLayers" content="ATFN">
<!-- css file -->
<link rel="stylesheet" href="{{asset('backend/THEME/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/THEME/css/ace-responsive-menu.css')}}">
    <link rel="stylesheet" href="{{asset('backend/THEME/css/menu.css')}}">
    <link rel="stylesheet" href="{{asset('backend/THEME/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('backend/THEME/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('backend/THEME/css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/THEME/css/ud-custom-spacing.css')}}">
    <link rel="stylesheet" href="{{asset('backend/THEME/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('backend/THEME/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('backend/THEME/css/slider.css')}}">
    <link rel="stylesheet" href="{{asset('backend/THEME/css/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/THEME/css/style.css')}}">

    <link rel="stylesheet" href="{{asset('backend/THEME/css/responsive.css')}}">

    <link href="{{asset('backend/THEME/images/favicon.ico')}}" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
    <link href="{{asset('backend/THEME/images/favicon.ico')}}" sizes="128x128" rel="shortcut icon" />
    <!-- Apple Touch Icon -->
    <link href="{{asset('backend/THEME/images/apple-touch-icon-60x60.png')}}" sizes="60x60" rel="apple-touch-icon">
    <link href="{{asset('backend/THEME/images/apple-touch-icon-72x72.png')}}" sizes="72x72" rel="apple-touch-icon">
    <link href="{{asset('backend/THEME/images/apple-touch-icon-114x114.png')}}" sizes="114x114" rel="apple-touch-icon">
    <link href="{{asset('backend/THEME/images/apple-touch-icon-180x180.png')}}" sizes="180x180" rel="apple-touch-icon">

    <!-- <link rel="stylesheet" href="{{asset('backend/USER_ASSET/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/USER_ASSET/assets/css/templatemo.css')}}">
    -->
    <link rel="stylesheet" href="{{asset('backend/USER_ASSET/assets/css/custom.css')}}">


<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
<div class="wrapper ovh">

  <div class="body_content">

    <!-- Shop Order Area -->
    <section>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <div class="order_complete_message text-center">
              <div class="icon bgc-thm4"><span class="fa fa-check text-thm"></span></div>
              <h2 class="title">Your Payment Is Completed !</h2>
              <p class="text">Thank you. Your order has been received.</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xl-8 offset-xl-2">
            <div class="shop_order_box mt60">
              <div class="order_list_raw">
                <ul class="d-md-flex align-items-center justify-content-md-between p-0 mb-0">
                  <li class="mb20-sm">
                    <p class="text mb5">Order Number</p>
                    <h6 class="mb-0">{{$order_ID}}</h6>
                  </li>
                  <li class="mb20-sm">
                    <p class="text mb5">Date</p>
                    <h6 class="mb-0">{{date('d-m-Y', strtotime($order_date))}}</h6>
                  </li>
                  <li class="mb20-sm">
                    <p class="text mb5">Total</p>
                    <h6 class="mb-0">${{$order_amount}}</h6>
                  </li>
                  <li>
                    <p class="text mb5">Payment ID</p>
                    <h6 class="mb-0">{{$payment_ID}}</h6>
                  </li>
                  <li>
                    <p class="text mb5">Payment Method</p>
                    <h6 class="mb-0">{{$payment_type}}</h6>
                  </li>
                </ul>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>


  </div>
</div>


<script src="{{asset('backend/THEME/js/jquery-3.6.4.min.js')}}"></script>
    <script src="{{asset('backend/THEME/js/jquery-migrate-3.0.0.min.js')}}"></script>
    <script src="{{asset('backend/THEME/js/popper.min.js')}}"></script>
    <script src="{{asset('backend/THEME/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('backend/THEME/js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('backend/THEME/js/jquery.mmenu.all.js')}}"></script>
    <script src="{{asset('backend/THEME/js/ace-responsive-menu.js')}}"></script>
    <script src="{{asset('backend/THEME/js/jquery-scrolltofixed-min.js')}}"></script>
    <script src="{{asset('backend/THEME/js/wow.min.js')}}"></script>
    <script src="{{asset('backend/THEME/js/owl.js')}}"></script>
    <script src="{{asset('backend/THEME/js/scrollbalance.js')}}"></script>
    <script src="{{asset('backend/THEME/js/pricing-table.js')}}"></script>


    <!-- Custom script for all pages -->
    <script src="{{asset('backend/THEME/js/script.js')}}"></script>
    <!-- JS -->

</body>
</html>
