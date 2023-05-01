<!DOCTYPE html>
<html lang="en">

<head>

    @yield('user_page')

    <link rel="apple-touch-icon" href="{{asset('backend/USER_ASSET/assets/img/apple-icon.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('backend/USER_ASSET/assets/img/favicon.ico')}}">

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
    <!-- End Script -->

    @yield('user_script')

</body>

</html>
