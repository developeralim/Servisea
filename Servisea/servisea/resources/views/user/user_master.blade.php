<!DOCTYPE html>
<html lang="en">

<head>

    @yield('user_page')

    <link rel="apple-touch-icon" href="{{asset('backend/USER_ASSET/assets/img/apple-icon.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('backend/USER_ASSET/assets/img/favicon.ico')}}">

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

    <link rel="stylesheet" href="{{asset('backend/USER_ASSET/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/USER_ASSET/assets/css/templatemo.css')}}">
    <link rel="stylesheet" href="{{asset('backend/USER_ASSET/assets/css/custom.css')}}">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="{{asset('backend/USER_ASSET/assets/css/fontawesome.min.css')}}">

    @yield('user_style')

</head>

<body>
    @include('user.body.header')
    <!-- Modal -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
    @yield('user-main-content')

    @include('user.body.footer')
    <!-- Start Script -->
    <script src="{{asset('backend/USER_ASSET/assets/js/jquery-1.11.0.min.js')}}"></script>
    <script src="{{asset('backend/USER_ASSET/assets/js/jquery-migrate-1.2.1.min.js')}}"></script>
    <script src="{{asset('backend/USER_ASSET/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('backend/USER_ASSET/assets/js/templatemo.js')}}"></script>
    <script src="{{asset('backend/USER_ASSET/assets/js/custom.js')}}"></script>

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



    <!-- End Script -->

    @yield('user_script')

</body>

</html>
