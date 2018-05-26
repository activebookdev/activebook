<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ActiveBook</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- CSS Global Compulsory -->
    <link rel="stylesheet" href="{{asset('js/bootstrap/bootstrap.min.css')}}">
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">-->
    <!-- CSS Global Icons -->
    <link rel="stylesheet" href="{{asset('css/icon-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/icon-line/css/simple-line-icons.css')}}">
    <link rel="stylesheet" href="{{asset('css/icon-etlinefont/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/icon-line-pro/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/icon-hs/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('js/malihu-scrollbar/jquery.mCustomScrollbar.min.css')}}">
    <link rel="stylesheet" href="{{asset('js/hs-megamenu/src/hs.megamenu.css')}}">
    <!-- <link rel="stylesheet" href="{{asset('js/hamburgers/hamburgers.min.css')}}"> -->

    <!-- CSS Unify -->
    <link rel="stylesheet" href="{{asset('css/unify-core.css')}}">
    <link rel="stylesheet" href="{{asset('css/unify-components.css')}}">
    <link rel="stylesheet" href="{{asset('css/unify-globals.css')}}">

    <!-- CSS Customization -->
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">

    <style>
        .active_nav {
            background-color:#ff8533;
        }
        .active_nav a {
            color:white;
        }
        .active_name {
            font-size:25px;
        }
        .footer_bar {
            position: fixed; 
            bottom: 0;
            left: 0;
            right: 0;
        }
    </style>

    @yield('style')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md active_nav">
            <div class="container" style="margin-left:5vw !important; width:90vw;">
                <a class="navbar-brand active_name" href="{{ url('/login') }}">
                    <b>Active</b>Book
                </a>
                <div>
                    <a id="search_icon" href="/search" style="margin-left:30px; margin-right:40px;"><i class="fa fa-search fa-2x" style="color:white;"></i></a>
                    <a id="profile_icon" href="/profile"><i class="fa fa-user fa-2x" style="color:white;"></i></a>
                </div>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul id="right_nav" class="navbar-nav ml-auto"></ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')

            <!-- Copyright Footer -->
            <footer class="g-bg-gray-dark-v1 g-color-white-opacity-0_8 g-py-20 footer_bar">
              <div class="container">
                <div class="row">
                  <div class="col-md-8 text-center text-md-left g-mb-10 g-mb-0--md">
                    <div class="d-lg-flex">
                      <small class="d-block g-font-size-default g-mr-10 g-mb-10 g-mb-0--md">2018 © All Rights Reserved.</small>
                      <ul class="u-list-inline">
                        <li class="list-inline-item">
                          <a class="g-color-white-opacity-0_8 g-color-white--hover" href="#!">Privacy Policy</a>
                        </li>
                        <li class="list-inline-item">
                          <span>|</span>
                        </li>
                        <li class="list-inline-item">
                          <a class="g-color-white-opacity-0_8 g-color-white--hover" href="#!">Terms of Use</a>
                        </li>
                        <li class="list-inline-item">
                          <span>|</span>
                        </li>
                        <li class="list-inline-item">
                          <a class="g-color-white-opacity-0_8 g-color-white--hover" href="#!">License</a>
                        </li>
                        <li class="list-inline-item">
                          <span>|</span>
                        </li>
                        <li class="list-inline-item">
                          <a class="g-color-white-opacity-0_8 g-color-white--hover" href="#!">Support</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </footer>
            <!-- End Copyright Footer -->
            <a class="js-go-to u-go-to-v1" href="#!" data-type="fixed" data-position='{
             "bottom": 15,
             "right": 15
           }' data-offset-top="400" data-compensation="#js-header" data-show-effect="zoomIn">
              <i class="hs-icon hs-icon-arrow-top"></i>
            </a>
        </main>
        <div class="u-outer-spaces-helper"></div>
    </div>

    @yield('scripts')
</body>
</html>