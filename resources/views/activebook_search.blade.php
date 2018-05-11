<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Title -->
  <title>Unify User Profile | | Unify - Responsive Website Template</title>

  <!-- Required Meta Tags Always Come First -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <!-- Favicon -->
  <link rel="shortcut icon" href="{{asset('favicon.ico')}}">
  <!-- Google Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- CSS Global Compulsory -->
  <link rel="stylesheet" href="{{asset('js/bootstrap/bootstrap.min.css')}}">
  <!-- CSS Global Icons -->
  <link rel="stylesheet" href="{{asset('css/icon-awesome/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/icon-line/css/simple-line-icons.css')}}">
  <link rel="stylesheet" href="{{asset('css/icon-etlinefont/style.css')}}">
  <link rel="stylesheet" href="{{asset('css/icon-line-pro/style.css')}}">
  <link rel="stylesheet" href="{{asset('css/icon-hs/style.css')}}">
  <link rel="stylesheet" href="{{asset('css/animate.css')}}">
  <link rel="stylesheet" href="{{asset('js/malihu-scrollbar/jquery.mCustomScrollbar.min.css')}}">
  <link rel="stylesheet" href="{{asset('js/hs-megamenu/src/hs.megamenu.css')}}">
  <link rel="stylesheet" href="{{asset('js/hamburgers/hamburgers.min.css')}}">

  <!-- CSS Unify -->
  <link rel="stylesheet" href="{{asset('css/unify-core.css')}}">
  <link rel="stylesheet" href="{{asset('css/unify-components.css')}}">
  <link rel="stylesheet" href="{{asset('css/unify-globals.css')}}">

  <!-- CSS Customization -->
  <link rel="stylesheet" href="{{asset('css/custom.css')}}">

  <style>
    table.table_wide {
      width:100%;
    }
    table.table_wide td {
      width:33%;
    }
    div.sport {
      border-radius: 50px; 
      -moz-border-radius: 50px; 
      -webkit-border-radius: 50px; 
      border: 1px solid #DDD;
    }
    div.sport_selected {
      border-radius: 50px; 
      -moz-border-radius: 50px; 
      -webkit-border-radius: 50px; 
      border: 2px solid #ff751a;
    }
    div.sport_hover {
      border-radius: 50px; 
      -moz-border-radius: 50px; 
      -webkit-border-radius: 50px; 
      border: 1px solid #ffa366;
    }
    #map {
      height: 400px;
      width: 100%;
      border: 2px solid #ffa366;
    }
    div.area {
      border-radius: 50px; 
      -moz-border-radius: 50px; 
      -webkit-border-radius: 50px; 
      border: 1px solid #DDD;
    }
    div.postcode {
      line-height: 58px;
      font-size: 15px;
      border-radius: 50px;
      -moz-border-radius: 50px;
      -webkit-border-radius: 50px;
      border: 1px solid #DDD;
    }
  </style>

</head>

<body>
  <main>
    <!-- Header -->
    <header id="js-header" class="u-header u-header--static">
      <div class="u-header__section u-header__section--light g-bg-white g-transition-0_3 g-py-10">
        <nav class="js-mega-menu navbar navbar-expand-lg hs-menu-initialized hs-menu-horizontal">
          <div class="container">
            <!-- Responsive Toggle Button -->
            <button class="navbar-toggler navbar-toggler-right btn g-line-height-1 g-brd-none g-pa-0 g-pos-abs g-top-3 g-right-0" type="button" aria-label="Toggle navigation" aria-expanded="false" aria-controls="navBar" data-toggle="collapse" data-target="#navBar">
              <span class="hamburger hamburger--slider">
            <span class="hamburger-box">
              <span class="hamburger-inner"></span>
              </span>
              </span>
            </button>
            <!-- End Responsive Toggle Button -->

            <!-- Logo -->
            <a href="../../index.html" class="navbar-brand">
              <img src="../../assets/img/logo/logo-1.png" alt="Image Description">
            </a>
            <!-- End Logo -->

            <!-- Navigation -->
            <div class="collapse navbar-collapse align-items-center flex-sm-row g-pt-10 g-pt-5--lg g-mr-40--lg" id="navBar">
              <ul class="navbar-nav text-uppercase g-pos-rel g-font-weight-600 ml-auto">
                <!-- Intro -->
                <li class="nav-item  g-mx-10--lg g-mx-15--xl">
                  <a href="../../index.html" class="nav-link g-py-7 g-px-0">Intro</a>
                </li>
                <!-- End Intro -->

                <!-- Home -->
                <li class="hs-has-mega-menu nav-item  g-mx-10--lg g-mx-15--xl" data-animation-in="fadeIn" data-animation-out="fadeOut" data-max-width="60%" data-position="left">
                  <a id="mega-menu-home" class="nav-link g-py-7 g-px-0" href="#!" aria-haspopup="true" aria-expanded="false">Home<i class="hs-icon hs-icon-arrow-bottom g-font-size-11 g-ml-7"></i></a>

                  <!-- Mega Menu -->
                  <div class="w-100 hs-mega-menu u-shadow-v11 font-weight-normal g-brd-top g-brd-primary g-brd-top-2 g-bg-white g-mt-18 g-mt-8--lg--scrolling" aria-labelledby="mega-menu-home">
                    <div class="row align-items-stretch no-gutters">
                      <!-- Home (col) -->
                      <div class="col-lg-6">
                        <ul class="list-unstyled">
                          <li class="dropdown-item ">
                            <a href="../../unify-main/home/home-default.html" class="nav-link">Home Default</a>
                          </li>
                          <li class="dropdown-item ">
                            <a href="../../unify-main/home/home-page-1.html" class="nav-link">Home 1</a>
                          </li>
                          <li class="dropdown-item ">
                            <a href="../../unify-main/home/home-page-2.html" class="nav-link">Home 2</a>
                          </li>
                          <li class="dropdown-item ">
                            <a href="../../unify-main/home/home-page-3.html" class="nav-link">Home 3</a>
                          </li>
                          <li class="dropdown-item ">
                            <a href="../../unify-main/home/home-page-4.html" class="nav-link">Home 4</a>
                          </li>
                          <li class="dropdown-item ">
                            <a href="../../unify-main/home/home-page-5.html" class="nav-link">Home 5</a>
                          </li>
                          <li class="dropdown-item ">
                            <a href="../../unify-main/home/home-page-6.html" class="nav-link">Home 6</a>
                          </li>
                          <li class="dropdown-item ">
                            <a href="../../unify-main/home/home-page-7.html" class="nav-link">Home 7</a>
                          </li>
                        </ul>
                      </div>
                      <!-- End Home (col) -->

                      <!-- Home (col) -->
                      <div class="col-lg-6 g-brd-left--lg g-brd-gray-light-v5">
                        <ul class="list-unstyled">
                          <li class="dropdown-item ">
                            <a href="../../unify-main/home/home-page-8.html" class="nav-link">Home 8</a>
                          </li>
                          <li class="dropdown-item ">
                            <a href="../../unify-main/home/home-page-9.html" class="nav-link">Home 9</a>
                          </li>
                          <li class="dropdown-item ">
                            <a href="../../unify-main/home/home-page-10.html" class="nav-link">Home 10</a>
                          </li>
                          <li class="dropdown-item ">
                            <a href="../../unify-main/home/home-page-11.html" class="nav-link">Home 11</a>
                          </li>
                          <li class="dropdown-item ">
                            <a href="../../unify-main/home/home-page-12.html" class="nav-link">Home 12</a>
                          </li>
                          <li class="dropdown-item ">
                            <a href="../../unify-main/home/home-page-13.html" class="nav-link">Home 13</a>
                          </li>
                          <li class="dropdown-item ">
                            <a href="../../unify-main/home/home-page-14.html" class="nav-link">Home 14</a>
                          </li>
                          <li class="dropdown-item ">
                            <a href="../../unify-main/home/home-page-15.html" class="nav-link">Home 15</a>
                          </li>
                        </ul>
                      </div>
                      <!-- End Home (col) -->
                    </div>
                  </div>
                  <!-- End Mega Menu -->
                </li>
                <!-- End Home -->

                <!-- Pages -->
                <li class="hs-has-sub-menu nav-item active g-mx-10--lg g-mx-15--xl" data-animation-in="fadeIn" data-animation-out="fadeOut">
                  <a id="nav-link-pages" class="nav-link g-py-7 g-px-0" href="#!" aria-haspopup="true" aria-expanded="false" aria-controls="nav-submenu-pages">Pages</a>

                  <ul class="hs-sub-menu list-unstyled u-shadow-v11 g-brd-top g-brd-primary g-brd-top-2 g-min-width-220 g-mt-18 g-mt-8--lg--scrolling" id="nav-submenu-pages" aria-labelledby="nav-link-pages">
                    <!-- Pages - About -->
                    <li class="dropdown-item hs-has-sub-menu ">
                      <a id="nav-link--pages--about" class="nav-link" href="#!" aria-haspopup="true" aria-expanded="false" aria-controls="nav-submenu--pages--about">About</a>

                      <!-- Submenu (level 2) -->
                      <ul class="hs-sub-menu list-unstyled u-shadow-v11 g-brd-top g-brd-primary g-brd-top-2 g-min-width-220 g-mt-minus-2" id="nav-submenu--pages--about" aria-labelledby="nav-link--pages--about">
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-about-1.html">About 1</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-about-2.html">About 2</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-about-3.html">About 3</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-about-4.html">About 4</a>
                        </li>

                        <li class="dropdown-divider"></li>

                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-about-me-1.html">About me 1</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-about-me-2.html">About me 2</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-about-me-3.html">About me 3</a>
                        </li>
                      </ul>
                      <!-- End Submenu (level 2) -->
                    </li>
                    <!-- End Pages - About -->

                    <!-- Pages - Portfolios -->
                    <li class="dropdown-item hs-has-sub-menu ">
                      <a id="nav-link--pages--portfolio" class="nav-link" href="#!" aria-haspopup="true" aria-expanded="false" aria-controls="nav-submenu--pages--portfolio">Portfolios</a>

                      <!-- Submenu (level 2) -->
                      <ul class="hs-sub-menu list-unstyled u-shadow-v11 u-dropdown-col-2 g-brd-top g-brd-primary g-brd-top-2 g-min-width-220 g-mt-minus-2" id="nav-submenu--pages--portfolio" aria-labelledby="nav-link--pages--portfolio">
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-portfolio-case-study-1.html">Case Studies 1</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-portfolio-case-study-2.html">Case Studies 2</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-portfolio-single-item-1.html">Single item 1</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-portfolio-single-item-2.html">Single item 2</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-portfolio-single-item-3.html">Single item 3</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-portfolio-single-item-4.html">Single item 4</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-portfolio-single-item-5.html">Single item 5</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-portfolio-single-item-6.html">Single item 6</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-portfolio-single-item-7.html">Single item 7</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-portfolio-single-item-8.html">Single item 8</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-portfolio-single-item-9.html">Single item 9</a>
                        </li>
                      </ul>
                      <!-- End Submenu (level 2) -->
                    </li>
                    <!-- End Pages - Portfolios -->

                    <!-- Pages - Login &amp; Signup -->
                    <li class="dropdown-item hs-has-sub-menu ">
                      <a id="nav-link--pages--login-signup" class="nav-link" href="#!" aria-haspopup="true" aria-expanded="false" aria-controls="nav-submenu--pages--login-signup">Login &amp; Signup</a>

                      <!-- Submenu (level 2) -->
                      <ul class="hs-sub-menu list-unstyled u-shadow-v11 u-dropdown-col-2 g-brd-top g-brd-primary g-brd-top-2 g-min-width-220 g-mt-minus-2" id="nav-submenu--pages--login-signup" aria-labelledby="nav-link--pages--login-signup">
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-login-and-signup-1.html">Login &amp; Signup</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-signup-1.html">Signup 1</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-signup-2.html">Signup 2</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-signup-3.html">Signup 3</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-signup-4.html">Signup 4</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-signup-5.html">Signup 5</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-signup-6.html">Signup 6</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-signup-7.html">Signup 7</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-signup-8.html">Signup 8</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-signup-9.html">Signup 9</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-signup-10.html">Signup 10</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-signup-11.html">Signup 11</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-signup-12.html">Signup 12</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-login-1.html">login 1</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-login-2.html">Login 2</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-login-3.html">Login 3</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-login-4.html">Login 4</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-login-5.html">Login 5</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-login-6.html">Login 6</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-login-7.html">Login 7</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-login-8.html">Login 8</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-login-9.html">Login 9</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-login-10.html">Login 10</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-login-11.html">Login 11</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-login-12.html">Login 12</a>
                        </li>
                      </ul>
                      <!-- End Submenu (level 2) -->
                    </li>
                    <!-- End Pages - Login &amp; Signup -->

                    <!-- Pages - Services -->
                    <li class="dropdown-item hs-has-sub-menu ">
                      <a id="nav-link--pages--services" class="nav-link" href="#!" aria-haspopup="true" aria-expanded="false" aria-controls="nav-submenu--pages--services">Services</a>

                      <!-- Submenu (level 2) -->
                      <ul class="hs-sub-menu list-unstyled u-shadow-v11 g-brd-top g-brd-primary g-brd-top-2 g-min-width-220 g-mt-minus-2" id="nav-submenu--pages--services" aria-labelledby="nav-link--pages--services">
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-services-1.html">Services 1</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-services-2.html">Services 2</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-services-3.html">Services 3</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-services-4.html">Services 4</a>
                        </li>
                      </ul>
                      <!-- End Submenu (level 2) -->
                    </li>
                    <!-- End Pages - Services -->

                    <!-- Pages - Search results -->
                    <li class="dropdown-item hs-has-sub-menu ">
                      <a id="nav-link--pages--search-result" class="nav-link" href="#!" aria-haspopup="true" aria-expanded="false" aria-controls="nav-submenu--pages--search-result">Search results</a>

                      <!-- Submenu (level 2) -->
                      <ul class="hs-sub-menu list-unstyled u-shadow-v11 g-brd-top g-brd-primary g-brd-top-2 g-min-width-220 g-mt-minus-2" id="nav-submenu--pages--search-result" aria-labelledby="nav-link--pages--search-result">
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-search-results-grid-veiw-1.html">Grid View</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-search-results-grid-veiw-left-sidebar-1.html">Grid View <span class="g-opacity-0_5">(with Sidebar)</span></a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-search-results-list-veiw-1.html">List View 1</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-search-results-list-veiw-2.html">List View 2</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-search-results-list-veiw-left-sidebar-1.html">List View <span class="g-opacity-0_5">(with Sidebar)</span></a>
                        </li>
                      </ul>
                      <!-- End Submenu (level 2) -->
                    </li>
                    <!-- End Pages - Search results -->

                    <!-- Pages - Profiles -->
                    <li class="dropdown-item hs-has-sub-menu active">
                      <a id="nav-link--pages--profile" class="nav-link" href="#!" aria-haspopup="true" aria-expanded="false" aria-controls="nav-submenu--pages--profile">Profiles</a>

                      <!-- Submenu (level 2) -->
                      <ul class="hs-sub-menu list-unstyled u-shadow-v11 u-dropdown-col-2 g-brd-top g-brd-primary g-brd-top-2 g-min-width-220 g-mt-minus-2" id="nav-submenu--pages--profile" aria-labelledby="nav-link--pages--profile">
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-profile-main-1.html">Main</a>
                        </li>
                        <li class="dropdown-item active">
                          <a class="nav-link" href="../../unify-main/pages/page-profile-profile-1.html">User</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-profile-projects-1.html">Projects</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-profile-comments-1.html">Comments</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-profile-history-1.html">History</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-profile-reviews-1.html">Reviews</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-profile-settings-1.html">Settings</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-profile-users-1.html">Contacts 1</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-profile-users-1-full-width.html">Contacts 1 <span class="g-opacity-0_5">(full width)</span></a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-profile-users-2.html">Contacts 2</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-profile-users-2-full-width.html">Contacts 2 <span class="g-opacity-0_5">(full width)</span></a>
                        </li>
                      </ul>
                      <!-- End Submenu (level 2) -->
                    </li>
                    <!-- End Pages - Profiles -->

                    <!-- Pages - Сontacts -->
                    <li class="dropdown-item hs-has-sub-menu ">
                      <a id="nav-link--pages--contacts" class="nav-link" href="#!" aria-haspopup="true" aria-expanded="false" aria-controls="nav-submenu--pages--contacts">Сontacts</a>

                      <!-- Submenu (level 2) -->
                      <ul class="hs-sub-menu list-unstyled u-shadow-v11 u-dropdown-col-2 g-brd-top g-brd-primary g-brd-top-2 g-min-width-220 g-mt-minus-2" id="nav-submenu--pages--contacts" aria-labelledby="nav-link--pages--contacts">
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-contacts-1.html">Сontacts 1</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-contacts-2.html">Сontacts 2</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-contacts-3.html">Сontacts 3</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-contacts-4.html">Сontacts 4</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-contacts-5.html">Сontacts 5</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-contacts-6.html">Сontacts 6</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-contacts-7.html">Сontacts 7</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-contacts-8.html">Сontacts 8</a>
                        </li>
                      </ul>
                      <!-- End Submenu (level 2) -->
                    </li>
                    <!-- End Pages - Сontacts -->

                    <!-- Pages - Jobs -->
                    <li class="dropdown-item hs-has-sub-menu ">
                      <a id="nav-link--pages--jobs" class="nav-link" href="#!" aria-haspopup="true" aria-expanded="false" aria-controls="nav-submenu--pages--jobs">Jobs</a>

                      <!-- Submenu (level 2) -->
                      <ul class="hs-sub-menu list-unstyled u-shadow-v11 g-brd-top g-brd-primary g-brd-top-2 g-min-width-220 g-mt-minus-2" id="nav-submenu--pages--jobs" aria-labelledby="nav-link--pages--jobs">
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-jobs-1.html">Jobs</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-jobs-description-right-sidebar-1.html">Jobs Description</a>
                        </li>
                      </ul>
                      <!-- End Submenu (level 2) -->
                    </li>
                    <!-- End Pages - Jobs -->

                    <!-- Pages - Pricing -->
                    <li class="dropdown-item ">
                      <a class="nav-link" href="../../unify-main/pages/page-pricing-1.html">Pricing</a>
                    </li>
                    <!-- End Pages - Pricing -->

                    <!-- Pages - FAQ -->
                    <li class="dropdown-item hs-has-sub-menu ">
                      <a id="nav-link--pages--faq" class="nav-link" href="#!" aria-haspopup="true" aria-expanded="false" aria-controls="nav-submenu--pages--faq">FAQ</a>

                      <!-- Submenu (level 2) -->
                      <ul class="hs-sub-menu list-unstyled u-shadow-v11 g-brd-top g-brd-primary g-brd-top-2 g-min-width-220 g-mt-minus-2" id="nav-submenu--pages--faq" aria-labelledby="nav-link--pages--faq">
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-faq-1.html">FAQ 1</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-faq-2.html">FAQ 2</a>
                        </li>
                      </ul>
                      <!-- End Submenu (level 2) -->
                    </li>
                    <!-- End Pages - FAQ -->

                    <!-- Pages - Others -->
                    <li class="dropdown-item hs-has-sub-menu ">
                      <a id="nav-link--pages--others" class="nav-link" href="#!" aria-haspopup="true" aria-expanded="false" aria-controls="nav-submenu--pages--others">Others</a>

                      <ul class="hs-sub-menu list-unstyled u-shadow-v11 g-brd-top g-brd-primary g-brd-top-2 g-min-width-220 g-mt-minus-2" id="nav-submenu--pages--others" aria-labelledby="nav-link--pages--others">
                        <!-- Clients -->
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-clients-1.html">Clients</a>
                        </li>
                        <!-- End Clients -->

                        <!-- Terms -->
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-terms-1.html">Terms</a>
                        </li>
                        <!-- End Terms -->

                        <!-- Сookies -->
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-cookies-1.html">Сookies</a>
                        </li>
                        <!-- End Сookies -->

                        <!-- Invoice -->
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/pages/page-invoice-1.html">Invoice</a>
                        </li>
                        <!-- End Invoice -->

                        <!-- 404 -->
                        <li class="dropdown-item hs-has-sub-menu ">
                          <a id="nav-link--pages--404" class="nav-link" href="#!" aria-haspopup="true" aria-expanded="false" aria-controls="nav-submenu--pages--404">404</a>

                          <ul class="hs-sub-menu list-unstyled u-shadow-v11 g-brd-top g-brd-primary g-brd-top-2 g-min-width-220 g-mt-minus-2 " id="nav-submenu--pages--404" aria-labelledby="nav-link--pages--404">
                            <li class="dropdown-item ">
                              <a class="nav-link" href="../../specialty-pages/404/404-1.html">404 1</a>
                            </li>
                            <li class="dropdown-item ">
                              <a class="nav-link" href="../../specialty-pages/404/404-2.html">404 2</a>
                            </li>
                          </ul>
                        </li>
                        <!-- End 404 -->

                        <!-- Coming Soon -->
                        <li class="dropdown-item hs-has-sub-menu ">
                          <a id="nav-link--pages--coming-soon" class="nav-link" href="#!" aria-haspopup="true" aria-expanded="false" aria-controls="nav-submenu--pages--coming-soon">Coming Soon</a>

                          <ul class="hs-sub-menu list-unstyled u-shadow-v11 g-brd-top g-brd-primary g-brd-top-2 g-min-width-220 g-mt-minus-2 " id="nav-submenu--pages--coming-soon" aria-labelledby="nav-link--pages--coming-soon">
                            <li class="dropdown-item ">
                              <a class="nav-link" href="../../specialty-pages/coming-soon/page-coming-soon-1.html">Coming Soon</a>
                            </li>
                          </ul>
                        </li>
                        <!-- End Coming Soon -->
                      </ul>
                    </li>
                    <!-- End Pages - Others -->
                  </ul>
                </li>
                <!-- End Pages -->

                <!-- Blog -->
                <li class="nav-item hs-has-sub-menu  g-mx-10--lg g-mx-15--xl" data-animation-in="fadeIn" data-animation-out="fadeOut">
                  <a id="nav-link--blog" class="nav-link g-py-7 g-px-0" href="#!" aria-haspopup="true" aria-expanded="false" aria-controls="nav-submenu--blog">Blog</a>

                  <ul class="hs-sub-menu list-unstyled u-shadow-v11 g-brd-top g-brd-primary g-brd-top-2 g-min-width-220 g-mt-18 g-mt-8--lg--scrolling" id="nav-submenu--blog" aria-labelledby="nav-link--blog">
                    <!-- Blog - Minimal -->
                    <li class="dropdown-item hs-has-sub-menu ">
                      <a id="nav-link--pages--blog--minimal" class="nav-link" href="#!" aria-haspopup="true" aria-expanded="false" aria-controls="nav-submenu--pages--blog--minimal">Minimal</a>

                      <!-- Submenu (level 2) -->
                      <ul class="hs-sub-menu list-unstyled u-shadow-v11 g-brd-top g-brd-primary g-brd-top-2 g-min-width-220 g-mt-minus-2" id="nav-submenu--pages--blog--minimal" aria-labelledby="nav-link--pages--blog--minimal">
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/blog/blog-minimal-1.html">Minimal 1</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/blog/blog-minimal-1-left-sidebar.html">Minimal 1 <span class="g-opacity-0_5">(left sidebar)</span></a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/blog/blog-minimal-1-right-sidebar.html">Minimal 1 <span class="g-opacity-0_5">(right sidebar)</span></a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/blog/blog-minimal-2.html">Minimal 2</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/blog/blog-minimal-2-left-sidebar.html">Minimal 2 <span class="g-opacity-0_5">(left sidebar)</span></a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/blog/blog-minimal-2-right-sidebar.html">Minimal 2 <span class="g-opacity-0_5">(right sidebar)</span></a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/blog/blog-minimal-3.html">Minimal 3</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/blog/blog-minimal-3-left-sidebar.html">Minimal 3 <span class="g-opacity-0_5">(left sidebar)</span></a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/blog/blog-minimal-3-right-sidebar.html">Minimal 3 <span class="g-opacity-0_5">(right sidebar)</span></a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/blog/blog-minimal-4.html">Minimal 4</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/blog/blog-minimal-4-left-sidebar.html">Minimal 4 <span class="g-opacity-0_5">(left sidebar)</span></a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/blog/blog-minimal-4-right-sidebar.html">Minimal 4 <span class="g-opacity-0_5">(right sidebar)</span></a>
                        </li>
                      </ul>
                      <!-- End Submenu (level 2) -->
                    </li>
                    <!-- End Blog - Minimal -->

                    <!-- Blog - Grid Background -->
                    <li class="dropdown-item hs-has-sub-menu ">
                      <a id="nav-link--pages--blog--grid-bg" class="nav-link" href="#!" aria-haspopup="true" aria-expanded="false" aria-controls="nav-submenu--pages--blog--grid-bg">Grid Background</a>

                      <!-- Submenu (level 2) -->
                      <ul class="hs-sub-menu list-unstyled u-shadow-v11 g-brd-top g-brd-primary g-brd-top-2 g-min-width-220 g-mt-minus-2" id="nav-submenu--pages--blog--grid-bg" aria-labelledby="nav-link--pages--blog--grid-bg">
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/blog/blog-grid-background-overlay-2.html">Column 2</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/blog/blog-grid-background-overlay-left-sidebar.html">Column 2 <span class="g-opacity-0_5">(left sidebar)</span></a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/blog/blog-grid-background-overlay-right-sidebar.html">Column 2 <span class="g-opacity-0_5">(right sidebar)</span></a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/blog/blog-grid-background-overlay-3.html">Column 3</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/blog/blog-grid-background-overlay-3-fullwidth.html">Column 3 <span class="g-opacity-0_5">(full width)</span></a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/blog/blog-grid-background-overlay-4.html">Column 4</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/blog/blog-grid-background-overlay-4-fullwidth.html">Column 4 <span class="g-opacity-0_5">(full width)</span></a>
                        </li>
                      </ul>
                      <!-- End Submenu (level 2) -->
                    </li>
                    <!-- End Blog - Grid Background -->

                    <!-- Blog - Grid Classic -->
                    <li class="dropdown-item hs-has-sub-menu ">
                      <a id="nav-link--pages--blog--grid-classic" class="nav-link" href="#!" aria-haspopup="true" aria-expanded="false" aria-controls="nav-submenu--pages--blog--grid-classic">Grid Classic</a>

                      <!-- Submenu (level 2) -->
                      <ul class="hs-sub-menu list-unstyled u-shadow-v11 g-brd-top g-brd-primary g-brd-top-2 g-min-width-220 g-mt-minus-2" id="nav-submenu--pages--blog--grid-classic" aria-labelledby="nav-link--pages--blog--grid-classic">
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/blog/blog-grid-classic-2.html">Column 2</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/blog/blog-grid-classic-left-sidebar.html">Column 2 <span class="g-opacity-0_5">(left sidebar)</span></a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/blog/blog-grid-classic-right-sidebar.html">Column 2 <span class="g-opacity-0_5">(right sidebar)</span></a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/blog/blog-grid-classic-3.html">Column 3</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/blog/blog-grid-classic-3-fullwidth.html">Column 3 <span class="g-opacity-0_5">(full width)</span></a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/blog/blog-grid-classic-4.html">Column 4</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/blog/blog-grid-classic-4-fullwidth.html">Column 4 <span class="g-opacity-0_5">(full width)</span></a>
                        </li>
                      </ul>
                      <!-- End Submenu (level 2) -->
                    </li>
                    <!-- End Blog - Grid Classic -->

                    <!-- Blog - Grid Modern -->
                    <li class="dropdown-item hs-has-sub-menu ">
                      <a id="nav-link--pages--blog--grid-modern" class="nav-link" href="#!" aria-haspopup="true" aria-expanded="false" aria-controls="nav-submenu--pages--blog--grid-modern">Grid Modern</a>

                      <!-- Submenu (level 2) -->
                      <ul class="hs-sub-menu list-unstyled u-shadow-v11 g-brd-top g-brd-primary g-brd-top-2 g-min-width-220 g-mt-minus-2" id="nav-submenu--pages--blog--grid-modern" aria-labelledby="nav-link--pages--blog--grid-modern">
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/blog/blog-grid-modern-1.html">Modern 1</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/blog/blog-grid-modern-2.html">Modern 2</a>
                        </li>
                      </ul>
                      <!-- End Submenu (level 2) -->
                    </li>
                    <!-- End Blog - Grid Modern -->

                    <!-- Blog - Grid Overlap -->
                    <li class="dropdown-item hs-has-sub-menu ">
                      <a id="nav-link--pages--blog--grid-overlap" class="nav-link" href="#!" aria-haspopup="true" aria-expanded="false" aria-controls="nav-submenu--pages--blog--grid-overlap">Grid Overlap</a>

                      <!-- Submenu (level 2) -->
                      <ul class="hs-sub-menu list-unstyled u-shadow-v11 g-brd-top g-brd-primary g-brd-top-2 g-min-width-220 g-mt-minus-2" id="nav-submenu--pages--blog--grid-overlap" aria-labelledby="nav-link--pages--blog--grid-overlap">
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/blog/blog-grid-overlap-2.html">Column 2</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/blog/blog-grid-overlap-left-sidebar.html">Column 2 <span class="g-opacity-0_5">(left sidebar)</span></a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/blog/blog-grid-overlap-right-sidebar.html">Column 2 <span class="g-opacity-0_5">(right sidebar)</span></a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/blog/blog-grid-overlap-3.html">Column 3</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/blog/blog-grid-overlap-3-fullwidth.html">Column 3 <span class="g-opacity-0_5">(full width)</span></a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/blog/blog-grid-overlap-4-fullwidth.html">Column 4 <span class="g-opacity-0_5">(full width)</span></a>
                        </li>
                      </ul>
                      <!-- End Submenu (level 2) -->
                    </li>
                    <!-- End Blog - Grid Overlap -->

                    <!-- Blog - Masonry -->
                    <li class="dropdown-item hs-has-sub-menu ">
                      <a id="nav-link--pages--blog--masonry" class="nav-link" href="#!" aria-haspopup="true" aria-expanded="false" aria-controls="nav-submenu--pages--blog--masonry">Masonry</a>

                      <!-- Submenu (level 2) -->
                      <ul class="hs-sub-menu list-unstyled u-shadow-v11 g-brd-top g-brd-primary g-brd-top-2 g-min-width-220 g-mt-minus-2" id="nav-submenu--pages--blog--masonry" aria-labelledby="nav-link--pages--blog--masonry">
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/blog/blog-masonry-col-2.html">Column 2</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/blog/blog-masonry-col-3.html">Column 3</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/blog/blog-masonry-col-3-fullwidth.html">Column 3 <span class="g-opacity-0_5">(full width)</span></a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/blog/blog-masonry-col-4.html">Column 4</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/blog/blog-masonry-col-4-fullwidth.html">Column 4 <span class="g-opacity-0_5">(full width)</span></a>
                        </li>
                      </ul>
                      <!-- End Submenu (level 2) -->
                    </li>
                    <!-- End Blog - Masonry -->

                    <!-- Blog - Single items -->
                    <li class="dropdown-item hs-has-sub-menu ">
                      <a id="nav-link--pages--blog--single-item" class="nav-link" href="#!" aria-haspopup="true" aria-expanded="false" aria-controls="nav-submenu--pages--blog--single-item">Single items</a>

                      <!-- Submenu (level 2) -->
                      <ul class="hs-sub-menu list-unstyled u-shadow-v11 g-brd-top g-brd-primary g-brd-top-2 g-min-width-220 g-mt-minus-2" id="nav-submenu--pages--blog--single-item" aria-labelledby="nav-link--pages--blog--single-item">
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/blog/blog-single-item-1.html">Single item 1</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/blog/blog-single-item-2.html">Single item 2</a>
                        </li>
                      </ul>
                      <!-- End Submenu (level 2) -->
                    </li>
                    <!-- End Blog - Single items -->
                  </ul>
                </li>
                <!-- End Blog -->

                <!-- Features -->
                <li class="nav-item hs-has-sub-menu  g-mx-10--lg g-mx-15--xl" data-animation-in="fadeIn" data-animation-out="fadeOut">
                  <a id="nav-link--features" class="nav-link g-py-7 g-px-0" href="#!" aria-haspopup="true" aria-expanded="false" aria-controls="nav-submenu--features">Features</a>

                  <ul class="hs-sub-menu list-unstyled u-shadow-v11 g-brd-top g-brd-primary g-brd-top-2 g-min-width-220 g-mt-18 g-mt-8--lg--scrolling" id="nav-submenu--features" aria-labelledby="nav-link--features">
                    <!-- Features - Headers -->
                    <li class="dropdown-item ">
                      <a class="nav-link" href="../../unify-main/shortcodes/headers/index.html">Headers</a>
                    </li>
                    <!-- End Features - Headers -->

                    <!-- Features - Promo blocks -->
                    <li class="dropdown-item ">
                      <a class="nav-link" href="../../unify-main/shortcodes/promo/index.html">Promo Blocks</a>
                    </li>
                    <!-- End Features - Promo blocks -->

                    <!-- Features - Sliders -->
                    <li class="dropdown-item hs-has-sub-menu ">
                      <a id="nav-link--features--sliders" class="nav-link" href="#!" aria-haspopup="true" aria-expanded="false" aria-controls="nav-submenu--features--sliders">Sliders</a>

                      <ul class="hs-sub-menu list-unstyled u-shadow-v11 g-brd-top g-brd-primary g-brd-top-2 g-min-width-220 g-mt-minus-2" id="nav-submenu--features--sliders" aria-labelledby="nav-link--features--sliders">
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../revolution-slider/index.html">Revolution sliders</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../master-slider/index.html">Master sliders</a>
                        </li>
                      </ul>
                    </li>
                    <!-- End Features - Sliders -->

                    <!-- Features - Pop-ups -->
                    <li class="dropdown-item hs-has-sub-menu ">
                      <a id="nav-link--features--pop-ups" class="nav-link" href="#!" aria-haspopup="true" aria-expanded="false" aria-controls="nav-submenu--features--pop-ups">Pop-ups</a>

                      <ul class="hs-sub-menu list-unstyled u-shadow-v11 g-brd-top g-brd-primary g-brd-top-2 g-min-width-220 g-mt-minus-2" id="nav-submenu--features--pop-ups" aria-labelledby="nav-link--features--pop-ups">
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/shortcodes/shortcode-base-lightbox.html">Lightbox</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/shortcodes/shortcode-base-modals.html">Modals</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/shortcodes/shortcode-blocks-gallery.html">Gallery</a>
                        </li>
                      </ul>
                    </li>
                    <!-- End Features - Pop-ups -->

                    <!-- Features - Maps -->
                    <li class="dropdown-item hs-has-sub-menu ">
                      <a id="nav-link--features--maps" class="nav-link" href="#!" aria-haspopup="true" aria-expanded="false" aria-controls="nav-submenu--features--maps">Maps</a>

                      <ul class="hs-sub-menu list-unstyled u-shadow-v11 g-brd-top g-brd-primary g-brd-top-2 g-min-width-220 g-mt-minus-2" id="nav-submenu--features--maps" aria-labelledby="nav-link--features--maps">
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/shortcodes/shortcode-base-google-maps.html">Google Maps</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/shortcodes/shortcode-base-maps-with-pins.html">Maps With Pins</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/shortcodes/shortcode-base-vector-maps.html">Vector Maps</a>
                        </li>
                      </ul>
                    </li>
                    <!-- End Features - Maps -->

                    <!-- Features - Footers -->
                    <li class="dropdown-item hs-has-sub-menu ">
                      <a id="nav-link--features--footers" class="nav-link" href="#!" aria-haspopup="true" aria-expanded="false" aria-controls="nav-submenu--features--footers">Footers</a>

                      <ul class="hs-sub-menu list-unstyled u-shadow-v11 g-brd-top g-brd-primary g-brd-top-2 g-min-width-220 g-mt-minus-2" id="nav-submenu--features--footers" aria-labelledby="nav-link--features--footers">
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/shortcodes/footers/shortcode-blocks-footer-classic.html">Classic Footers</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/shortcodes/footers/shortcode-blocks-footer-contact-forms.html">Contact Forms</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/shortcodes/footers/shortcode-blocks-footer-maps.html">Footers Maps</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../unify-main/shortcodes/footers/shortcode-blocks-footer-modern.html">Modern Footers</a>
                        </li>
                      </ul>
                    </li>
                    <!-- End Features - Footers -->
                  </ul>
                </li>
                <!-- End Features -->

                <!-- Shortcodes -->
                <li class="nav-item  g-mx-10--lg g-mx-15--xl">
                  <a href="../../unify-main/shortcodes/index.html" class="nav-link g-py-7 g-px-0">Shortcodes</a>
                </li>
                <!-- End Shortcodes -->

                <!-- Demos -->
                <li class="nav-item hs-has-sub-menu  g-mx-10--lg g-mx-15--xl" data-animation-in="fadeIn" data-animation-out="fadeOut">
                  <a id="nav-link-demos" class="nav-link g-py-7 g-px-0" href="#!" aria-haspopup="true" aria-expanded="false" aria-controls="nav-submenu-demos">Demos</a>

                  <ul class="hs-sub-menu list-unstyled u-shadow-v11 g-brd-top g-brd-primary g-brd-top-2 g-min-width-220 g-mt-18 g-mt-8--lg--scrolling" id="nav-submenu-demos" aria-labelledby="nav-link-demos">
                    <!-- Demos - One Pages -->
                    <li class="dropdown-item hs-has-sub-menu ">
                      <a id="nav-link--demos--one-page" class="nav-link" href="#!" aria-haspopup="true" aria-expanded="false" aria-controls="nav-submenu--demos--one-page">One Pages</a>

                      <ul class="hs-sub-menu list-unstyled u-shadow-v11 u-dropdown-col-2 g-brd-top g-brd-primary g-brd-top-2 g-min-width-220 g-mt-minus-2 hs-reversed" id="nav-submenu--demos--one-page" aria-labelledby="nav-link--demos--one-page">
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../one-pages/accounting/index.html" target="_blank">Accounting</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../one-pages/agency/index.html" target="_blank">Agency</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../one-pages/app/index.html" target="_blank">App</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../one-pages/architecture/index.html" target="_blank">Architecture</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../one-pages/business/index.html" target="_blank">Business</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../one-pages/charity/index.html" target="_blank">Charity</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../one-pages/consulting/index.html" target="_blank">Сonsulting</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../one-pages/construction/index.html" target="_blank">Construction</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../one-pages/courses/index.html" target="_blank">Courses</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../one-pages/corporate/index.html" target="_blank">Corporate</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../one-pages/event/index.html" target="_blank">Event</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../one-pages/gym/index.html" target="_blank">GYM</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../one-pages/lawyer/index.html" target="_blank">Lawyer</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../one-pages/music/index.html" target="_blank">Music</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../one-pages/photography/index.html" target="_blank">Photography</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../one-pages/real-estate/index.html" target="_blank">Real Estate</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../one-pages/restaurant/index.html" target="_blank">Restaurant</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../one-pages/shipping/index.html" target="_blank">Shipping</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../one-pages/spa/index.html" target="_blank">Spa</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../one-pages/travel/index.html" target="_blank">Travel</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../one-pages/wedding/index.html" target="_blank">Wedding</a>
                        </li>
                      </ul>
                    </li>
                    <!-- End Demos - One Pages -->

                    <!-- Demos - E-Commerce -->
                    <li class="dropdown-item ">
                      <a class="nav-link" href="../../e-commerce/home-page-1.html" target="_blank">E-Commerce <span class="g-opacity-0_5">(44 Pages)</span></a>
                    </li>
                    <!-- End Demos - E-Commerce -->

                    <!-- Demos - Multi Pages -->
                    <li class="dropdown-item hs-has-sub-menu ">
                      <a id="nav-link--demos--blog-magazine" class="nav-link" href="#!" aria-haspopup="true" aria-expanded="false" aria-controls="nav-submenu--demos--blog-magazine">Multi Pages</a>

                      <ul class="hs-sub-menu list-unstyled u-shadow-v11 g-brd-top g-brd-primary g-brd-top-2 g-min-width-220 g-mt-minus-2 hs-reversed" id="nav-submenu--demos--blog-magazine" aria-labelledby="nav-link--demos--blog-magazine">
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../multipage/education/home-page-1.html" target="_blank">University <span class="u-label g-rounded-3 g-font-size-10 g-bg-lightred g-py-3 g-pos-rel g-top-minus-1 g-ml-5">New</span></a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../multipage/real-estate/home-page-1.html" target="_blank">Real Estate <span class="u-label g-rounded-3 g-font-size-10 g-bg-lightred g-py-3 g-pos-rel g-top-minus-1 g-ml-5">New</span></a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../multipage/marketing/home-page-1.html" target="_blank">Marketing <span class="u-label g-rounded-3 g-font-size-10 g-bg-lightred g-py-3 g-pos-rel g-top-minus-1 g-ml-5">New</span></a>
                        </li>
                      </ul>
                    </li>
                    <!-- End Demos - Multi Pages -->

                    <!-- Demos - Blogs &amp; Magazines -->
                    <li class="dropdown-item hs-has-sub-menu ">
                      <a id="nav-link--demos--blog-magazine" class="nav-link" href="#!" aria-haspopup="true" aria-expanded="false" aria-controls="nav-submenu--demos--blog-magazine">Blogs &amp; Magazines</a>

                      <ul class="hs-sub-menu list-unstyled u-shadow-v11 g-brd-top g-brd-primary g-brd-top-2 g-min-width-220 g-mt-minus-2 hs-reversed" id="nav-submenu--demos--blog-magazine" aria-labelledby="nav-link--demos--blog-magazine">
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../blog-magazine/classic/bm-classic-home-page-1.html" target="_blank">Home 1</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../blog-magazine/classic/bm-classic-home-page-2.html" target="_blank">Home 2</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../blog-magazine/classic/bm-classic-home-page-3.html" target="_blank">Home 3</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../blog-magazine/classic/bm-classic-home-page-4.html" target="_blank">Home 4</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../blog-magazine/classic/bm-classic-home-page-5.html" target="_blank">Home 5</a>
                        </li>
                        <li class="dropdown-item ">
                          <a class="nav-link" href="../../blog-magazine/classic/bm-classic-single-1.html" target="_blank">Single</a>
                        </li>
                      </ul>
                    </li>
                    <!-- End Demos - Blogs &amp; Magazines -->
                  </ul>
                </li>
                <!-- End Demos -->
              </ul>
            </div>
            <!-- End Navigation -->

            <div class="d-inline-block g-hidden-xs-down g-pos-rel g-valign-middle g-pl-30 g-pl-0--lg">
              <a class="btn u-btn-outline-primary g-font-size-13 text-uppercase g-py-10 g-px-15" href="https://wrapbootstrap.com/theme/unify-responsive-website-template-WB0412697?ref=htmlstream" target="_blank">Purchase now</a>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- End Header -->

    <!-- Breadcrumb -->
    <section class="g-my-30">
      <div class="container">
        <ul class="u-list-inline">
          <li class="list-inline-item g-mr-7">
            <a class="u-link-v5 g-color-main g-color-primary--hover" href="#!">Home</a>
            <i class="fa fa-angle-right g-ml-7"></i>
          </li>
          <li class="list-inline-item g-mr-7">
            <a class="u-link-v5 g-color-main g-color-primary--hover" href="#!">Pages</a>
            <i class="fa fa-angle-right g-ml-7"></i>
          </li>
          <li class="list-inline-item g-color-primary">
            <span>User Profile</span>
          </li>
        </ul>
      </div>
    </section>
    <!-- End Breadcrumb -->

    <div hidden>
      <svg style="display: none;" xmlns="http://www.w3.org/2000/svg">
        <symbol id="gym" viewBox="0 0 58 58"><title>gym</title><path style="fill:#BDC3C7;" d="M9,33H0.778C0.348,33,0,32.652,0,32.222v-6.445C0,25.348,0.348,25,0.778,25H9V33z"/><rect x="17" y="25" style="fill:#BDC3C7;" width="24" height="8"/><g> <circle style="fill:#ECF0F1;" cx="23" cy="26" r="1"/> <circle style="fill:#ECF0F1;" cx="27" cy="26" r="1"/> <circle style="fill:#ECF0F1;" cx="25" cy="28" r="1"/> <circle style="fill:#ECF0F1;" cx="29" cy="28" r="1"/> <circle style="fill:#ECF0F1;" cx="31" cy="26" r="1"/> <circle style="fill:#ECF0F1;" cx="35" cy="26" r="1"/> <circle style="fill:#ECF0F1;" cx="23" cy="30" r="1"/> <circle style="fill:#ECF0F1;" cx="27" cy="30" r="1"/> <circle style="fill:#ECF0F1;" cx="31" cy="30" r="1"/> <circle style="fill:#ECF0F1;" cx="35" cy="30" r="1"/> <circle style="fill:#ECF0F1;" cx="33" cy="28" r="1"/> <circle style="fill:#ECF0F1;" cx="25" cy="32" r="1"/> <circle style="fill:#ECF0F1;" cx="29" cy="32" r="1"/> <circle style="fill:#ECF0F1;" cx="33" cy="32" r="1"/> </g><g> <path style="fill:#ECF0F1;" d="M3,32c-0.552,0-1,0.447-1,1v2c0,0.553,0.448,1,1,1s1-0.447,1-1v-2C4,32.447,3.552,32,3,32z"/> <path style="fill:#ECF0F1;" d="M6,32c-0.552,0-1,0.447-1,1v2c0,0.553,0.448,1,1,1s1-0.447,1-1v-2C7,32.447,6.552,32,6,32z"/> <path style="fill:#ECF0F1;" d="M3,22c-0.552,0-1,0.447-1,1v2c0,0.553,0.448,1,1,1s1-0.447,1-1v-2C4,22.447,3.552,22,3,22z"/> <path style="fill:#ECF0F1;" d="M6,22c-0.552,0-1,0.447-1,1v2c0,0.553,0.448,1,1,1s1-0.447,1-1v-2C7,22.447,6.552,22,6,22z"/> <rect x="2" y="27" style="fill:#ECF0F1;" width="2" height="4"/> <rect x="5" y="27" style="fill:#ECF0F1;" width="2" height="4"/> </g><rect x="9" y="17" style="fill:#546A79;" width="4" height="24"/><rect x="13" y="14" style="fill:#38454F;" width="4" height="30"/><path style="fill:#BDC3C7;" d="M49,25h8.222C57.652,25,58,25.348,58,25.778v6.445C58,32.652,57.652,33,57.222,33H49V25z"/><g> <path style="fill:#ECF0F1;" d="M55,22c-0.552,0-1,0.447-1,1v2c0,0.553,0.448,1,1,1s1-0.447,1-1v-2C56,22.447,55.552,22,55,22z"/> <path style="fill:#ECF0F1;" d="M52,22c-0.552,0-1,0.447-1,1v2c0,0.553,0.448,1,1,1s1-0.447,1-1v-2C53,22.447,52.552,22,52,22z"/> <path style="fill:#ECF0F1;" d="M55,32c-0.552,0-1,0.447-1,1v2c0,0.553,0.448,1,1,1s1-0.447,1-1v-2C56,32.447,55.552,32,55,32z"/> <path style="fill:#ECF0F1;" d="M52,32c-0.552,0-1,0.447-1,1v2c0,0.553,0.448,1,1,1s1-0.447,1-1v-2C53,32.447,52.552,32,52,32z"/> <rect x="54" y="27" style="fill:#ECF0F1;" width="2" height="4"/> <rect x="51" y="27" style="fill:#ECF0F1;" width="2" height="4"/> </g><rect x="45" y="17" style="fill:#546A79;" width="4" height="24"/><rect x="41" y="14" style="fill:#38454F;" width="4" height="30"/></symbol>
        <symbol id="game-1" viewBox="0 0 55.546 55.546"><title>game-1</title><path style="fill:#FAC176;" d="M54.697,11.631L43.956,0.889c-1.131-1.131-2.965-1.131-4.096,0L11.487,29.262 c-1.487,1.487-0.815,4.316,2.016,4.591c1.102,0.107,1.576,1.456,0.793,2.239L0.606,49.783c-0.807,0.807-0.807,2.116,0,2.924 l2.193,2.193c0.807,0.807,2.116,0.807,2.924,0l13.125-13.125c1.004-1.004,2.64-0.459,2.992,0.918 c0.592,2.312,3.111,2.782,4.485,1.408l8.98-8.98c-1.971-1.686-3.118-4.308-2.733-7.183c0.47-3.506,3.316-6.351,6.822-6.822 c2.874-0.386,5.497,0.761,7.183,2.733l8.122-8.122C55.828,14.595,55.828,12.761,54.697,11.631z"/><rect x="6.691" y="43.196" transform="matrix(-0.7071 0.7071 -0.7071 -0.7071 47.9385 73.7711)" style="fill:#38454F;" width="4" height="7.236"/><circle style="fill:#C2615F;" cx="40.497" cy="29.041" r="8"/></symbol>
        <symbol id="ball-2" viewBox="0 0 57.197 57.197"><title>ball-2</title><g> <rect x="36.907" y="17.533" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -2.391 32.3936)" style="fill:#BDC3C7;" width="2" height="3.1"/> <rect x="36.907" y="10.299" transform="matrix(0.7071 0.7071 -0.7071 0.7071 19.4805 -23.3337)" style="fill:#BDC3C7;" width="2" height="3.099"/> <rect x="53.259" y="19.715" transform="matrix(-0.7071 -0.7071 0.7071 -0.7071 77.5516 73.5526)" style="fill:#BDC3C7;" width="1.5" height="2"/> <rect x="50.65" y="17.246" transform="matrix(0.7071 -0.7071 0.7071 0.7071 2.1487 41.898)" style="fill:#BDC3C7;" width="2" height="2.218"/> <polygon style="fill:#BDC3C7;" points="48.76,14.051 48.407,13.698 46.992,15.112 47.346,15.465 46.992,15.819 48.407,17.233 48.76,16.88 49.114,17.233 50.528,15.819 50.174,15.465 50.528,15.112 49.114,13.698 48.76,14.051 48.76,14.051 "/> <rect x="44.143" y="17.533" transform="matrix(-0.7071 -0.7071 0.7071 -0.7071 63.5699 64.4975)" style="fill:#BDC3C7;" width="2" height="3.099"/> <polygon style="fill:#BDC3C7;" points="41.878,20.933 41.525,21.287 41.171,20.933 39.757,22.347 40.111,22.701 39.757,23.054 41.171,24.468 41.525,24.115 41.878,24.468 43.292,23.054 42.939,22.701 43.292,22.347 "/> <rect x="43.592" y="25.318" transform="matrix(-0.7071 -0.7071 0.7071 -0.7071 58.4521 76.8483)" style="fill:#BDC3C7;" width="3.099" height="2"/> <rect x="47.48" y="28.406" transform="matrix(-0.7071 -0.7071 0.7071 -0.7071 61.5403 84.3023)" style="fill:#BDC3C7;" width="1.5" height="2"/> <rect x="36.908" y="24.769" transform="matrix(-0.7071 -0.7071 0.7071 -0.7071 46.1023 71.7329)" style="fill:#BDC3C7;" width="2" height="3.099"/> <polygon style="fill:#BDC3C7;" points="36.057,30.29 35.703,29.936 36.057,29.583 34.643,28.168 34.289,28.522 33.936,28.168 32.522,29.583 32.875,29.936 32.522,30.29 33.936,31.704 34.289,31.35 34.643,31.704 "/> <rect x="36.18" y="31.717" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -12.3218 35.9043)" style="fill:#BDC3C7;" width="2" height="2.217"/> <rect x="38.789" y="34.185" transform="matrix(-0.7074 -0.7068 0.7068 -0.7074 42.6414 88.0222)" style="fill:#BDC3C7;" width="1.501" height="2"/> <rect x="27.412" y="35.065" transform="matrix(-0.7071 -0.7071 0.7071 -0.7071 23.1767 81.229)" style="fill:#BDC3C7;" width="2" height="1.5"/> <rect x="30.085" y="31.841" transform="matrix(-0.7071 -0.7071 0.7071 -0.7071 29.632 78.5547)" style="fill:#BDC3C7;" width="2" height="2.599"/> <rect x="29.122" y="25.318" transform="matrix(0.7073 0.7069 -0.7069 0.7073 27.5844 -13.979)" style="fill:#BDC3C7;" width="3.1" height="2"/> <polygon style="fill:#BDC3C7;" points="28.822,23.054 28.468,22.701 28.822,22.347 27.407,20.933 27.054,21.287 26.7,20.933 25.286,22.347 25.64,22.701 25.286,23.054 26.7,24.468 27.054,24.115 27.407,24.468 "/> <rect x="22.85" y="24.606" transform="matrix(-0.7071 -0.7071 0.7071 -0.7071 22.3967 61.087)" style="fill:#BDC3C7;" width="2" height="2.599"/> <rect x="20.176" y="27.829" transform="matrix(-0.7071 -0.7071 0.7071 -0.7071 15.9413 63.7613)" style="fill:#BDC3C7;" width="2" height="1.5"/> <rect x="21.055" y="16.451" transform="matrix(0.7071 0.7071 -0.7071 0.7071 18.7264 -10.3071)" style="fill:#BDC3C7;" width="1.5" height="2"/> <rect x="23.164" y="18.702" transform="matrix(-0.7071 0.7071 -0.7071 -0.7071 55.2594 16.7323)" style="fill:#BDC3C7;" width="2" height="2.218"/> <rect x="29.672" y="17.533" transform="matrix(0.7071 0.7071 -0.7071 0.7071 22.4772 -16.0989)" style="fill:#BDC3C7;" width="2" height="3.1"/> <polygon style="fill:#BDC3C7;" points="33.936,17.233 34.289,16.88 34.643,17.233 36.057,15.819 35.703,15.465 36.057,15.112 34.643,13.698 34.289,14.051 33.936,13.698 32.522,15.112 32.875,15.465 32.522,15.819 "/> <rect x="29.123" y="10.848" transform="matrix(0.7071 0.7071 -0.7071 0.7071 17.3616 -18.2182)" style="fill:#BDC3C7;" width="3.099" height="2"/> <rect x="26.834" y="7.761" transform="matrix(0.7069 0.7073 -0.7073 0.7069 14.2797 -16.9422)" style="fill:#BDC3C7;" width="1.5" height="2"/> <rect x="35.526" y="1.981" transform="matrix(0.7069 0.7073 -0.7073 0.7069 12.739 -24.7832)" style="fill:#BDC3C7;" width="1.5" height="2"/> <rect x="37.635" y="4.231" transform="matrix(-0.7071 0.7071 -0.7071 -0.7071 69.7301 -18.203)" style="fill:#BDC3C7;" width="2" height="2.218"/> <rect x="46.403" y="1.602" transform="matrix(0.7071 0.7071 -0.7071 0.7071 15.547 -32.8298)" style="fill:#BDC3C7;" width="2" height="1.5"/> <rect x="43.729" y="3.727" transform="matrix(0.7071 0.7071 -0.7071 0.7071 16.6547 -30.1559)" style="fill:#BDC3C7;" width="2" height="2.599"/> <polygon style="fill:#BDC3C7;" points="41.878,6.462 41.525,6.816 41.171,6.462 39.757,7.876 40.111,8.23 40.111,8.23 39.757,8.584 41.171,9.998 41.525,9.644 41.878,9.998 43.292,8.584 42.939,8.23 43.292,7.876 "/> <rect x="43.592" y="10.848" transform="matrix(-0.7071 -0.7071 0.7071 -0.7071 68.6844 52.1453)" style="fill:#BDC3C7;" width="3.099" height="2"/> <rect x="50.964" y="10.962" transform="matrix(0.7071 0.7071 -0.7071 0.7071 23.8898 -33.153)" style="fill:#BDC3C7;" width="2" height="2.599"/> <rect x="53.638" y="8.837" transform="matrix(0.7071 0.7071 -0.7071 0.7071 22.7822 -35.8269)" style="fill:#BDC3C7;" width="2" height="1.5"/> </g><circle style="fill:#A4E869;" cx="8.822" cy="11.374" r="8"/><path style="fill:#88C057;" d="M11.822,11.874c0,2.129,1.028,4.013,2.611,5.199c1.474-1.451,2.389-3.467,2.389-5.699 c0-1.929-0.683-3.699-1.821-5.08C13.1,7.427,11.822,9.499,11.822,11.874z"/><path style="fill:#88C057;" d="M2.643,6.293c-1.137,1.382-1.821,3.151-1.821,5.08c0,2.232,0.916,4.248,2.389,5.699 c1.582-1.186,2.611-3.07,2.611-5.199C5.822,9.499,4.544,7.427,2.643,6.293z"/><path style="fill:#556080;" d="M56.316,8.718c-0.666-1.852-1.684-3.471-3.025-4.813c-1.343-1.342-2.962-2.36-4.813-3.025 c-3.793-1.364-8.405-1.132-12.894,0.64c-3.272,1.292-6.396,3.367-9.03,6.002c-2.636,2.636-4.712,5.758-6.004,9.031 c-1.778,4.509-2.006,9.088-0.64,12.894c0.025,0.068,0.058,0.13,0.083,0.198c-1.133,3.027-5.475,7.375-7.85,9.751l-0.707,0.707 l5.656,5.657l0.707-0.707c2.035-2.034,6.704-6.696,9.753-7.85c0.067,0.025,0.129,0.058,0.196,0.082 c1.63,0.585,3.408,0.883,5.285,0.883c2.489,0,5.049-0.512,7.608-1.522c3.272-1.292,6.396-3.368,9.03-6.003 c2.636-2.636,4.712-5.759,6.004-9.031C57.454,17.103,57.682,12.524,56.316,8.718z M17.093,42.933l-2.83-2.831 c2.649-2.674,5.359-5.576,6.846-8.165c0.52,0.844,1.126,1.624,1.826,2.324c0.702,0.702,1.484,1.311,2.333,1.831 C22.434,37.73,19.246,40.793,17.093,42.933z M53.816,20.878c-1.192,3.02-3.114,5.907-5.558,8.351 c-2.443,2.443-5.331,4.365-8.351,5.557c-4.012,1.585-8.102,1.809-11.424,0.636l-0.532-0.217c-0.688-0.281-1.331-0.618-1.926-1.005 c-0.063-0.042-0.122-0.088-0.185-0.131c-0.231-0.157-0.459-0.318-0.675-0.492c-0.284-0.23-0.559-0.471-0.818-0.73 c-0.26-0.26-0.502-0.536-0.733-0.821c-0.164-0.205-0.317-0.422-0.467-0.64c-0.052-0.074-0.107-0.145-0.156-0.221 c-0.187-0.289-0.364-0.588-0.526-0.899c-0.002-0.004-0.005-0.008-0.007-0.013c-0.169-0.324-0.326-0.661-0.468-1.009l-0.216-0.528 c-1.181-3.338-0.958-7.393,0.634-11.429c1.192-3.02,3.114-5.908,5.558-8.351c2.442-2.443,5.33-4.364,8.351-5.556 c2.325-0.917,4.638-1.383,6.875-1.383c1.646,0,3.195,0.257,4.608,0.765c1.571,0.565,2.942,1.425,4.075,2.557 c1.131,1.131,1.991,2.502,2.557,4.075C55.635,12.743,55.416,16.821,53.816,20.878z"/><path style="fill:#38454F;" d="M1.584,55.762l-0.151-0.151c-1.911-1.911-1.911-5.009,0-6.92l9.429-9.429c0.8-0.8,2.098-0.8,2.898,0 l4.173,4.173c0.8,0.8,0.8,2.098,0,2.898l-9.429,9.429C6.593,57.673,3.495,57.673,1.584,55.762z"/></symbol>
        <symbol id="sports-1" viewBox="0 0 53.88 53.88"><title>sports-1</title><path style="fill:#E64C3C;" d="M44.421,1.984C42.603,0.636,40.354,0,38.092,0l-7.394,0l-8.688,0c-0.388,0-0.772,0.045-1.147,0.143 c-1.903,0.501-7.41,2.516-7.41,9.054L15.943,37c0,0,3.226,2.06,9,3l0.006-5.51c0-3.207,2.913-5.557,6.129-5.489 c3.231,0.068,5.865,2.993,5.865,6.224l0,4.774c5.987-0.925,9-3,9-3l2-27.803C47.943,5.575,46.252,3.341,44.421,1.984z"/><g> <path style="fill:#38454F;" d="M36.943,40v13c5.311-0.893,8-3,8-3V37.569C43.61,38.252,40.944,39.382,36.943,40z"/> <path style="fill:#38454F;" d="M16.943,50c0,0,3.197,1.986,8,3V40c-3.902-0.635-6.634-1.78-8-2.457V50z"/> </g><path style="fill:#ED7161;" d="M42.943,16c-0.552,0-1-0.447-1-1c0-4.963-4.038-9-9-9c-0.552,0-1-0.447-1-1s0.448-1,1-1 c6.065,0,11,4.935,11,11C43.943,15.553,43.495,16,42.943,16z"/><path style="fill:#C03A2B;" d="M5.943,16.701v7.653c0,0.767,0.281,1.507,0.791,2.081L15.943,37l-2.151-24.009 C11.494,12.844,5.739,12.766,5.943,16.701z"/><path style="fill:#E6E7E8;" d="M24.949,34.49c0-3.162,2.832-5.49,5.994-5.49h0c3.162,0,6,2.443,6,5.605V53l0,0 c-4.982,1.15-7.305,1.198-12,0L24.949,34.49z"/><g> <path style="fill:#556080;" d="M32.357,37l2.293-2.293c0.391-0.391,0.391-1.023,0-1.414s-1.023-0.391-1.414,0l-2.293,2.293 l-2.293-2.293c-0.391-0.391-1.023-0.391-1.414,0s-0.391,1.023,0,1.414L29.529,37l-2.293,2.293c-0.391,0.391-0.391,1.023,0,1.414 C27.431,40.902,27.687,41,27.943,41s0.512-0.098,0.707-0.293l2.293-2.293l2.293,2.293C33.431,40.902,33.687,41,33.943,41 s0.512-0.098,0.707-0.293c0.391-0.391,0.391-1.023,0-1.414L32.357,37z"/> <path style="fill:#556080;" d="M34.65,43.293c-0.391-0.391-1.023-0.391-1.414,0l-2.293,2.293l-2.293-2.293 c-0.391-0.391-1.023-0.391-1.414,0s-0.391,1.023,0,1.414L29.529,47l-2.293,2.293c-0.391,0.391-0.391,1.023,0,1.414 C27.431,50.902,27.687,51,27.943,51s0.512-0.098,0.707-0.293l2.293-2.293l2.293,2.293C33.431,50.902,33.687,51,33.943,51 s0.512-0.098,0.707-0.293c0.391-0.391,0.391-1.023,0-1.414L32.357,47l2.293-2.293C35.04,44.316,35.04,43.684,34.65,43.293z"/> </g></symbol>
        <symbol id="sports-5" viewBox="0 0 58 58"><title>sports-5</title><rect x="23" y="1.5" style="fill:#A5A5A4;" width="12" height="11"/><g> <rect x="27" y="40.5" style="fill:#ECF0F1;" width="4" height="13"/> <path style="fill:#ECF0F1;" d="M41.008,38.986l-7.146-12.541l11.146-5.646L34,1.5l-6.082,9.992L23,1.5L12.992,20.798l11.146,5.646 l-7.146,12.541L10,34.262V53.5h13v-11v-5.092c0-1.606,1.302-2.908,2.908-2.908h6.183c1.606,0,2.908,1.302,2.908,2.908V42.5v11h13 V34.262L41.008,38.986z"/> </g><g> <polygon style="fill:#38454F;" points="33,36.5 18.408,36.5 16.992,38.986 13.313,36.5 10,36.5 10,40.5 33,40.5 "/> <polygon style="fill:#38454F;" points="44.687,36.5 41.008,38.986 39.592,36.5 33,36.5 33,40.5 48,40.5 48,36.5 "/> </g><path style="fill:#FFFFFF;" d="M32.829,1.5L19.216,23.864c-0.014,0.023-0.015,0.05-0.027,0.073l1.776,0.9L34.854,2.02 c0.099-0.163,0.129-0.342,0.128-0.52H32.829z"/><g> <path style="fill:#FFFFFF;" d="M35,1.5h-0.017c0,0.178-0.029,0.357-0.128,0.52l-1.805,2.966L43.271,23.5L46,21.656L35,1.5z"/> </g><path style="fill:#ECF0F1;" d="M56.364,15.182l-0.661-1.126l0.025-0.014l-4.535-8.166c-1.5-2.701-4.347-4.376-7.436-4.376H34 l10.393,18.22c0.004-0.003,0.006-0.007,0.01-0.01c0.016-0.012,0.025-0.031,0.042-0.042l3-2c0.46-0.307,1.081-0.183,1.387,0.277 c0.307,0.46,0.183,1.08-0.277,1.387l-1.566,1.044l2.459,1.229c0.494,0.247,0.694,0.848,0.447,1.342 c-0.176,0.351-0.528,0.553-0.896,0.553c-0.15,0-0.303-0.034-0.446-0.105l-4-2c-0.002-0.001-0.003-0.003-0.006-0.004 c-0.102-0.052-0.192-0.126-0.273-0.213c-0.001-0.002-0.003-0.003-0.004-0.005l-10.408,5.272l7.146,12.541l11.761-7.946 C57.964,27.53,59.537,20.589,56.364,15.182z"/><path style="fill:#FFFFFF;" d="M44.547,21.39c0.002,0.001,0.003,0.003,0.006,0.004l4,2c0.144,0.071,0.296,0.105,0.446,0.105 c0.367,0,0.72-0.202,0.896-0.553c0.247-0.494,0.047-1.095-0.447-1.342l-2.459-1.229l1.566-1.044c0.46-0.307,0.584-0.927,0.277-1.387 c-0.306-0.46-0.927-0.584-1.387-0.277l-3,2c-0.017,0.011-0.026,0.03-0.042,0.042c-0.004,0.003-0.006,0.007-0.01,0.01l0.615,1.078 l-0.738,0.374c0.001,0.001,0.003,0.003,0.004,0.005C44.355,21.264,44.445,21.338,44.547,21.39z"/><polygon style="fill:#FFFFFF;" points="43.737,37.142 36.724,24.995 33.862,26.445 41.008,38.986 "/><polygon style="fill:#FFFFFF;" points="23,1.5 13.57,19.684 12.992,20.798 13.72,21.166 15,24.5 24.967,5.375 "/><path style="fill:#ECF0F1;" d="M13.72,21.166c-0.053,0.057-0.097,0.12-0.165,0.166l-3,2c-0.171,0.113-0.363,0.168-0.554,0.168 c-0.323,0-0.641-0.156-0.833-0.445c-0.307-0.46-0.183-1.08,0.277-1.387l3-2c0.354-0.234,0.798-0.213,1.125,0.016L23,1.5h-8.758 c-3.09,0-5.936,1.675-7.436,4.376l-4.535,8.166l0.025,0.014l-0.661,1.126C-1.537,20.589,0.036,27.53,5.231,31.04l11.761,7.946 l7.146-12.541L13.72,21.166z"/><path style="fill:#FFFFFF;" d="M12.445,19.668l-3,2c-0.46,0.307-0.584,0.927-0.277,1.387c0.192,0.289,0.51,0.445,0.833,0.445 c0.19,0,0.383-0.055,0.554-0.168l3-2c0.068-0.045,0.112-0.108,0.165-0.166l-0.727-0.368l0.578-1.114 C13.243,19.455,12.799,19.434,12.445,19.668z"/><polygon style="fill:#FFFFFF;" points="14.252,37.142 21.265,24.995 24.127,26.445 16.981,38.986 "/><rect x="10" y="50.5" style="fill:#D6E3E5;" width="38" height="3"/><path style="fill:#546A79;" d="M32.092,34.5h-6.183C24.302,34.5,23,35.802,23,37.408V42.5v14h4v-16h4v16h4v-14v-5.092 C35,35.802,33.698,34.5,32.092,34.5z"/><path style="fill:#38454F;" d="M25.908,34.5c-0.546,0-1.051,0.16-1.487,0.421L27,40.5h4l2.579-5.579 c-0.436-0.262-0.941-0.421-1.487-0.421H25.908z"/></symbol>
        <symbol id="sports-6" viewBox="0 0 57 57"><title>sports-6</title><path style="fill:#FDD7AD;" d="M28.674,0c-0.191,0-0.347,0.138-0.381,0.326c-0.213,1.178-1.955,5.746-15,18.582 c0,0-4.385,3.72-3.545,12.584c0.292,3.08,0.419,6.169,0.175,9.253C9.502,46.078,7.36,52.829,7.293,54.908 c-0.037,1.163,0.915,1.715,2.072,1.959c2.559,0.541,5.16-0.616,6.713-2.72c1.76-2.385,4.073-6.7,6.075-14.33 c1.326-5.056,5.793-8.748,11.018-8.912c0.093-0.003,0.186-0.005,0.28-0.007c1.828-0.04,3.632-0.748,4.811-2.146 c1.24-1.469,1.99-3.719,0.031-6.844c-3.917-6.25-2.833-10.583,1-13c3.087-1.946,8.361-6.502,10.288-8.238 C49.844,0.432,49.672,0,49.317,0H28.674z"/><path style="fill:#ED7161;" d="M9.924,40.746C9.502,46.078,7.36,52.829,7.293,54.908c-0.037,1.162,0.915,1.715,2.071,1.959 c2.559,0.541,5.16-0.616,6.713-2.72c1.76-2.385,4.073-6.7,6.075-14.33c1.326-5.056,5.793-8.748,11.018-8.912 c0.093-0.003,0.186-0.005,0.28-0.008c1.828-0.04,3.632-0.748,4.811-2.146c1.24-1.469,1.99-3.719,0.031-6.844 c-0.77-1.229-1.34-2.38-1.741-3.461c-9.163,2.272-20.154,9.908-26.654,14.916C10.071,35.822,10.118,38.286,9.924,40.746z"/><path style="fill:#CB465F;" d="M38.262,28.752c0.643-0.762,1.153-1.734,1.223-2.93c0.01-0.171-0.155-0.308-0.323-0.274l-1.521,0.309 c-0.052,0.01-0.097,0.037-0.132,0.077c-0.686,0.77-1.806,0.947-3.088,0.975l-0.376,0.011c-7.864,0.246-14.773,6.097-16.801,13.828 c-2.203,8.398-4.664,13.131-6.448,15.699c-0.115,0.166,0.303,0.516,0.498,0.463c1.209-0.329,2.938-0.167,4.785-2.761 c1.714-2.406,4.057-6.671,6.054-14.254c1.355-5.145,5.911-8.86,11.23-8.994c0.029-0.001,0.059-0.001,0.089-0.002 C35.278,30.857,37.082,30.149,38.262,28.752z"/><path style="fill:#FB7B76;" d="M17.828,14.306l6.679,9.257c1.792-1.004,3.61-1.934,5.418-2.745l-7.97-11.045 C20.801,11.11,19.438,12.615,17.828,14.306z"/><path style="fill:#FF5364;" d="M25.085,6c-0.236,0.292-0.494,0.61-0.767,0.945c-0.667,0.847-1.447,1.791-2.355,2.838l1.534,2.126 h12.999c0.284-0.583,0.656-1.118,1.107-1.605c0.039-0.042,0.079-0.082,0.119-0.123c0.182-0.187,0.375-0.367,0.579-0.539 c0.061-0.051,0.119-0.103,0.182-0.153c0.256-0.203,0.522-0.399,0.81-0.58c0.28-0.177,0.58-0.377,0.892-0.594 c0.008-0.005,0.016-0.011,0.024-0.016c0.314-0.219,0.641-0.455,0.978-0.705l0.02-0.006C41.87,7.098,42.569,6.559,43.274,6H25.085z"/></symbol>
        <symbol id="beach" viewBox="0 0 50 50"><title>beach</title><ellipse transform="matrix(0.8118 0.5839 -0.5839 0.8118 19.69 -13.635)" style="fill:#E6E6E6;" cx="31" cy="23.732" rx="9" ry="28.5"/><g> <path style="fill:#8697CB;" d="M23.887,18.213C15.802,6.307,6.553-1.126,2.614,1.37c-4.199,2.66-0.773,15.595,7.651,28.891 c1.28,2.021,2.603,3.932,3.939,5.713c1.728-5.067,5.011-11.272,9.489-17.497C23.757,18.387,23.822,18.301,23.887,18.213z"/> <path style="fill:#8697CB;" d="M42.179,45c0,0-2.446-5.125-7.7-3.981c-0.325-1.628-0.824-3.417-1.5-5.332 c-3.674,4.168-7.341,7.44-10.529,9.467c4.48,3.993,8.433,5.782,10.672,4.364c1.237-0.784,1.807-2.464,1.787-4.778 C38.64,43.005,42.179,45,42.179,45z"/> </g><path style="fill:#556080;" d="M32.318,46.626C36.804,41.969,42.179,45,42.179,45s-3.766-7.907-12-1.899L32.318,46.626z"/><path style="fill:#F0C419;" d="M5.826,6.438l-3.843,6.377c1.198,4.087,3.293,8.895,6.14,13.882l4.662-9.278l10.38-0.253 c-3.294-4.704-6.746-8.652-9.93-11.48L5.826,6.438z"/></symbol>
        <symbol id="transport" viewBox="0 0 59.654 59.654"><title>transport</title><ellipse style="fill:#546A79;stroke:#38454F;stroke-width:2;stroke-miterlimit:10;" cx="11.943" cy="35.904" rx="10.943" ry="10.974"/><path style="fill:#77909E;" d="M5.549,35.916c-0.052,0-0.105-0.004-0.159-0.013c-0.545-0.087-0.917-0.601-0.829-1.146 c0.424-2.646,2.231-4.889,4.714-5.853c0.515-0.202,1.094,0.055,1.294,0.57c0.2,0.515-0.056,1.094-0.57,1.294 c-1.796,0.697-3.156,2.387-3.463,4.305C6.457,35.566,6.032,35.916,5.549,35.916z"/><ellipse style="fill:#546A79;stroke:#38454F;stroke-width:2;stroke-miterlimit:10;" cx="47.711" cy="35.904" rx="10.943" ry="10.974"/><path style="fill:none;stroke:#38454F;stroke-width:2;stroke-linecap:round;stroke-miterlimit:10;" d="M43.315,22.353 c4.629-2.026,8.805-0.92,12.003,1.446"/><line style="fill:none;stroke:#38454F;stroke-width:2;stroke-linecap:round;stroke-miterlimit:10;" x1="20.75" y1="13.745" x2="22.75" y2="13.745"/><path style="fill:#C03A2B;" d="M48.405,36.002c0.043-0.188,0.05-0.385-0.025-0.578l-6.08-15.68h0.45c0.552,0,1-0.448,1-1 s-0.448-1-1-1h-1.226l-0.099-0.255c-0.018-0.046-0.053-0.078-0.077-0.12c-0.017-0.033-0.038-0.062-0.059-0.093 c-0.062-0.085-0.131-0.156-0.214-0.217c-0.025-0.019-0.036-0.048-0.064-0.065c-0.019-0.012-0.041-0.012-0.061-0.022 c-0.062-0.032-0.126-0.051-0.193-0.07c-0.06-0.017-0.117-0.035-0.178-0.04c-0.061-0.006-0.121,0.003-0.183,0.009 c-0.07,0.007-0.137,0.014-0.203,0.036c-0.02,0.006-0.041,0.003-0.061,0.011c-0.038,0.015-0.064,0.044-0.099,0.063 c-0.062,0.033-0.121,0.066-0.176,0.112c-0.053,0.044-0.094,0.095-0.136,0.148c-0.026,0.033-0.061,0.054-0.083,0.09l-0.249,0.412 H22.779c-0.001,0-0.001,0-0.002,0H22.75c-0.059,0-0.109,0.024-0.165,0.033c-0.066,0.011-0.132,0.009-0.196,0.034l-8.031,3.113 c-0.515,0.2-0.771,0.779-0.571,1.294c0.154,0.396,0.532,0.639,0.933,0.639c0.121,0,0.243-0.022,0.361-0.068l3.89-1.508l9.753,15.163 c0.006,0.009,0.015,0.016,0.021,0.025c0.013,0.019,0.03,0.034,0.044,0.052c0.001,0.002,0.004,0.003,0.005,0.005 c-0.016,0.072-0.044,0.14-0.044,0.217c0,0.552,0.448,1,1,1h18c0.552,0,1-0.448,1-1C48.75,36.446,48.613,36.186,48.405,36.002z M20.874,20.545l2.064-0.8h15.24l-8.639,14.271L20.874,20.545z M30.83,35.745l9.466-15.637l6.064,15.637H30.83z"/><path style="fill:#77909E;" d="M55.174,35.916c-0.483,0-0.908-0.35-0.986-0.842c-0.308-1.918-1.666-3.608-3.463-4.305 c-0.515-0.2-0.77-0.779-0.57-1.294c0.199-0.516,0.778-0.771,1.294-0.57c2.484,0.963,4.29,3.207,4.714,5.853 c0.087,0.545-0.284,1.058-0.829,1.146C55.279,35.913,55.226,35.916,55.174,35.916z"/><path style="fill:#BDC3C7;" d="M20.794,11.776c-3.937,0-7.024,4.364-7.071,9.956l-2.981,13.964 c-0.115,0.541,0.229,1.072,0.769,1.187c0.071,0.015,0.141,0.022,0.21,0.022c0.462,0,0.876-0.321,0.977-0.791l2.999-14.046 c0.008-0.036-0.003-0.07,0.001-0.106c0.004-0.036,0.021-0.066,0.021-0.103c0-4.381,2.324-8.082,5.075-8.082c0.552,0,1-0.448,1-1 S21.347,11.776,20.794,11.776z"/><line style="fill:none;stroke:#BDC3C7;stroke-width:2;stroke-linecap:round;stroke-miterlimit:10;" x1="40.75" y1="16.745" x2="40.75" y2="18.745"/><line style="fill:none;stroke:#CB8252;stroke-width:2;stroke-linecap:round;stroke-miterlimit:10;" x1="37.75" y1="15.745" x2="43.75" y2="15.745"/></symbol>
        <symbol id="ball" viewBox="0 0 54 54"><title>ball</title><ellipse style="fill:#88C057;" cx="27" cy="40" rx="27" ry="11.5"/><ellipse style="fill:#659C35;" cx="19" cy="40.833" rx="18" ry="7.667"/><ellipse style="fill:#38454F;" cx="21.071" cy="39.222" rx="6.071" ry="4.722"/><polygon style="fill:#E64C3C;" points="19,3.5 37,8.5 19,14.5 "/><circle style="fill:#FFFFFF;" cx="40" cy="42.5" r="3"/><line style="fill:none;stroke:#ECF0F1;stroke-width:2;stroke-linecap:round;stroke-miterlimit:10;" x1="19" y1="38.5" x2="19" y2="3.5"/></symbol>
      </svg>
    </div>

    <section class="g-mb-100">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <table class="table_wide">
              <tr>
                <th></th>
                <th></th>
                <th></th>
              </tr>
              <tr>
                <td>
                  <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6 sport">
                      <div class="row">
                        <div class="col-lg-4">
                          <svg class="icon" style="height:50px;width:50px;margin-top:5px;">
                            <use xlink:href="#gym" />
                          </svg>
                        </div>
                        <div class="col-lg-8" style="font-size:18px;line-height:60px;">
                          Gym
                        </div>
                      </div>
                    </div>
                  </div>
                  <br>
                </td>
                <td>
                  <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6 sport">
                      <div class="row">
                        <div class="col-lg-4">
                          <svg class="icon" style="height:50px;width:50px;margin-top:5px;">
                            <use xlink:href="#game-1" />
                          </svg>
                        </div>
                        <div class="col-lg-8" style="font-size:18px;line-height:60px;">
                          Cricket
                        </div>
                      </div>
                    </div>
                  </div>
                  <br>
                </td>
                <td>
                  <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6 sport">
                      <div class="row">
                        <div class="col-lg-4">
                          <svg class="icon" style="height:50px;width:50px;margin-top:5px;">
                            <use xlink:href="#ball-2" />
                          </svg>
                        </div>
                        <div class="col-lg-8" style="font-size:18px;line-height:60px;">
                          Tennis
                        </div>
                      </div>
                    </div>
                  </div>
                  <br>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6 sport">
                      <div class="row">
                        <div class="col-lg-4">
                          <svg class="icon" style="height:50px;width:50px;margin-top:5px;">
                            <use xlink:href="#sports-1" />
                          </svg>
                        </div>
                        <div class="col-lg-8" style="font-size:18px;line-height:60px;">
                          Boxing
                        </div>
                      </div>
                    </div>
                  </div>
                  <br>
                </td>
                <td>
                  <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6 sport">
                      <div class="row">
                        <div class="col-lg-4">
                          <svg class="icon" style="height:50px;width:50px;margin-top:5px;">
                            <use xlink:href="#sports-5" />
                          </svg>
                        </div>
                        <div class="col-lg-8" style="font-size:18px;line-height:60px;">
                          Karate
                        </div>
                      </div>
                    </div>
                  </div>
                  <br>
                </td>
                <td>
                  <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6 sport">
                      <div class="row">
                        <div class="col-lg-4">
                          <svg class="icon" style="height:50px;width:50px;margin-top:5px;">
                            <use xlink:href="#sports-6" />
                          </svg>
                        </div>
                        <div class="col-lg-8" style="font-size:18px;line-height:60px;">
                          Dancing
                        </div>
                      </div>
                    </div>
                  </div>
                  <br>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6 sport">
                      <div class="row">
                        <div class="col-lg-4">
                          <svg class="icon" style="height:50px;width:50px;margin-top:5px;">
                            <use xlink:href="#beach" />
                          </svg>
                        </div>
                        <div class="col-lg-8" style="font-size:18px;line-height:60px;">
                          Surfing
                        </div>
                      </div>
                    </div>
                  </div>
                  <br>
                </td>
                <td>
                  <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6 sport">
                      <div class="row">
                        <div class="col-lg-4">
                          <svg class="icon" style="height:50px;width:50px;margin-top:5px;">
                            <use xlink:href="#transport" />
                          </svg>
                        </div>
                        <div class="col-lg-8" style="font-size:18px;line-height:60px;">
                          Cycling
                        </div>
                      </div>
                    </div>
                  </div>
                  <br>
                </td>
                <td>
                  <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6 sport">
                      <div class="row">
                        <div class="col-lg-4">
                          <svg class="icon" style="height:50px;width:50px;margin-top:5px;">
                            <use xlink:href="#ball"/>
                          </svg>
                        </div>
                        <div class="col-lg-8" style="font-size:18px;line-height:60px;">
                          Golf
                        </div>
                      </div>
                    </div>
                  </div>
                  <br>
                </td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td></td>
              </tr>
            </table>
          </div>
        </div>
        <br>
        <br>
        <div class="row">
          <div class="col-lg-1"></div>
          <div class="col-lg-10">
            <div id="map"></div>
          </div>
          <div class="col-lg-1"></div>
        </div>
        <br>
        <br>
        <div style="text-align:center;">
          <h3 style="color:#ff751a;">Locations</h3>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <table class="table_wide">
              <tr>
                <th></th>
                <th></th>
                <th></th>
              </tr>
              <tr>
                <td>
                  <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6 area">
                      <div class="row">
                        <div class="col-lg-4 postcode">
                          2228
                        </div>
                        <div class="col-lg-8" style="font-size:18px;line-height:60px;">
                          Miranda
                        </div>
                      </div>
                    </div>
                  </div>
                  <br>
                </td>
                <td>
                  <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6 area">
                      <div class="row">
                        <div class="col-lg-4 postcode">
                          2230
                        </div>
                        <div class="col-lg-8" style="font-size:18px;line-height:60px;">
                          Cronulla
                        </div>
                      </div>
                    </div>
                  </div>
                  <br>
                </td>
                <td>
                  <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6 area">
                      <div class="row">
                        <div class="col-lg-4 postcode">
                          2229
                        </div>
                        <div class="col-lg-8" style="font-size:18px;line-height:60px;">
                          Caringbah
                        </div>
                      </div>
                    </div>
                  </div>
                  <br>
                </td>
              </tr>
              <tr>
                <td>
                  <br>
                </td>
                <td>
                  <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6 area">
                      <div class="row">
                        <div class="col-lg-4 postcode">
                          2227
                        </div>
                        <div class="col-lg-8" style="font-size:18px;line-height:60px;">
                          Gymea
                        </div>
                      </div>
                    </div>
                  </div>
                  <br>
                </td>
                <td>
                  <br>
                </td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td></td>
              </tr>
            </table>
          </div>
        </div>

      </div>
    </section>

    <!-- Footer -->
    <div id="contacts-section" class="g-bg-black-opacity-0_9 g-color-white-opacity-0_8 g-py-60">
      <div class="container">
        <div class="row">
          <!-- Footer Content -->
          <div class="col-lg-3 col-md-6 g-mb-40 g-mb-0--lg">
            <div class="u-heading-v2-3--bottom g-brd-white-opacity-0_8 g-mb-20">
              <h2 class="u-heading-v2__title h6 text-uppercase mb-0">About Us</h2>
            </div>

            <p>About Unify dolor sit amet, consectetur adipiscing elit. Maecenas eget nisl id libero tincidunt sodales.</p>
          </div>
          <!-- End Footer Content -->

          <!-- Footer Content -->
          <div class="col-lg-3 col-md-6 g-mb-40 g-mb-0--lg">
            <div class="u-heading-v2-3--bottom g-brd-white-opacity-0_8 g-mb-20">
              <h2 class="u-heading-v2__title h6 text-uppercase mb-0">Latest Posts</h2>
            </div>

            <article>
              <h3 class="h6 g-mb-2">
            <a class="g-color-white-opacity-0_8 g-color-white--hover" href="#!">Incredible template</a>
          </h3>
              <div class="small g-color-white-opacity-0_6">May 8, 2017</div>
            </article>

            <hr class="g-brd-white-opacity-0_1 g-my-10">

            <article>
              <h3 class="h6 g-mb-2">
            <a class="g-color-white-opacity-0_8 g-color-white--hover" href="#!">New features</a>
          </h3>
              <div class="small g-color-white-opacity-0_6">June 23, 2017</div>
            </article>

            <hr class="g-brd-white-opacity-0_1 g-my-10">

            <article>
              <h3 class="h6 g-mb-2">
            <a class="g-color-white-opacity-0_8 g-color-white--hover" href="#!">New terms and conditions</a>
          </h3>
              <div class="small g-color-white-opacity-0_6">September 15, 2017</div>
            </article>
          </div>
          <!-- End Footer Content -->

          <!-- Footer Content -->
          <div class="col-lg-3 col-md-6 g-mb-40 g-mb-0--lg">
            <div class="u-heading-v2-3--bottom g-brd-white-opacity-0_8 g-mb-20">
              <h2 class="u-heading-v2__title h6 text-uppercase mb-0">Useful Links</h2>
            </div>

            <nav class="text-uppercase1">
              <ul class="list-unstyled g-mt-minus-10 mb-0">
                <li class="g-pos-rel g-brd-bottom g-brd-white-opacity-0_1 g-py-10">
                  <h4 class="h6 g-pr-20 mb-0">
                <a class="g-color-white-opacity-0_8 g-color-white--hover" href="#!">About Us</a>
                <i class="fa fa-angle-right g-absolute-centered--y g-right-0"></i>
              </h4>
                </li>
                <li class="g-pos-rel g-brd-bottom g-brd-white-opacity-0_1 g-py-10">
                  <h4 class="h6 g-pr-20 mb-0">
                <a class="g-color-white-opacity-0_8 g-color-white--hover" href="#!">Portfolio</a>
                <i class="fa fa-angle-right g-absolute-centered--y g-right-0"></i>
              </h4>
                </li>
                <li class="g-pos-rel g-brd-bottom g-brd-white-opacity-0_1 g-py-10">
                  <h4 class="h6 g-pr-20 mb-0">
                <a class="g-color-white-opacity-0_8 g-color-white--hover" href="#!">Our Services</a>
                <i class="fa fa-angle-right g-absolute-centered--y g-right-0"></i>
              </h4>
                </li>
                <li class="g-pos-rel g-brd-bottom g-brd-white-opacity-0_1 g-py-10">
                  <h4 class="h6 g-pr-20 mb-0">
                <a class="g-color-white-opacity-0_8 g-color-white--hover" href="#!">Latest Jobs</a>
                <i class="fa fa-angle-right g-absolute-centered--y g-right-0"></i>
              </h4>
                </li>
                <li class="g-pos-rel g-py-10">
                  <h4 class="h6 g-pr-20 mb-0">
                <a class="g-color-white-opacity-0_8 g-color-white--hover" href="#!">Contact Us</a>
                <i class="fa fa-angle-right g-absolute-centered--y g-right-0"></i>
              </h4>
                </li>
              </ul>
            </nav>
          </div>
          <!-- End Footer Content -->

          <!-- Footer Content -->
          <div class="col-lg-3 col-md-6">
            <div class="u-heading-v2-3--bottom g-brd-white-opacity-0_8 g-mb-20">
              <h2 class="u-heading-v2__title h6 text-uppercase mb-0">Our Contacts</h2>
            </div>

            <address class="g-bg-no-repeat g-font-size-12 mb-0" style="background-image: url(../../assets/img/maps/map2.png);">
          <!-- Location -->
          <div class="d-flex g-mb-20">
            <div class="g-mr-10">
              <span class="u-icon-v3 u-icon-size--xs g-bg-white-opacity-0_1 g-color-white-opacity-0_6">
                <i class="fa fa-map-marker"></i>
              </span>
            </div>
            <p class="mb-0">795 Folsom Ave, Suite 600, <br> San Francisco, CA 94107 795</p>
          </div>
          <!-- End Location -->

          <!-- Phone -->
          <div class="d-flex g-mb-20">
            <div class="g-mr-10">
              <span class="u-icon-v3 u-icon-size--xs g-bg-white-opacity-0_1 g-color-white-opacity-0_6">
                <i class="fa fa-phone"></i>
              </span>
            </div>
            <p class="mb-0">(+123) 456 7890 <br> (+123) 456 7891</p>
          </div>
          <!-- End Phone -->

          <!-- Email and Website -->
          <div class="d-flex g-mb-20">
            <div class="g-mr-10">
              <span class="u-icon-v3 u-icon-size--xs g-bg-white-opacity-0_1 g-color-white-opacity-0_6">
                <i class="fa fa-globe"></i>
              </span>
            </div>
            <p class="mb-0">
              <a class="g-color-white-opacity-0_8 g-color-white--hover" href="mailto:info@htmlstream.com">info@htmlstream.com</a>
              <br>
              <a class="g-color-white-opacity-0_8 g-color-white--hover" href="#!">www.htmlstream.com</a>
            </p>
          </div>
          <!-- End Email and Website -->
        </address>
          </div>
          <!-- End Footer Content -->
        </div>
      </div>
    </div>
    <!-- End Footer -->

    <!-- Copyright Footer -->
    <footer class="g-bg-gray-dark-v1 g-color-white-opacity-0_8 g-py-20">
      <div class="container">
        <div class="row">
          <div class="col-md-8 text-center text-md-left g-mb-10 g-mb-0--md">
            <div class="d-lg-flex">
              <small class="d-block g-font-size-default g-mr-10 g-mb-10 g-mb-0--md">2017 © All Rights Reserved.</small>
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

          <div class="col-md-4 align-self-center">
            <ul class="list-inline text-center text-md-right mb-0">
              <li class="list-inline-item g-mx-10" data-toggle="tooltip" data-placement="top" title="Facebook">
                <a href="#!" class="g-color-white-opacity-0_5 g-color-white--hover">
                  <i class="fa fa-facebook"></i>
                </a>
              </li>
              <li class="list-inline-item g-mx-10" data-toggle="tooltip" data-placement="top" title="Skype">
                <a href="#!" class="g-color-white-opacity-0_5 g-color-white--hover">
                  <i class="fa fa-skype"></i>
                </a>
              </li>
              <li class="list-inline-item g-mx-10" data-toggle="tooltip" data-placement="top" title="Linkedin">
                <a href="#!" class="g-color-white-opacity-0_5 g-color-white--hover">
                  <i class="fa fa-linkedin"></i>
                </a>
              </li>
              <li class="list-inline-item g-mx-10" data-toggle="tooltip" data-placement="top" title="Pinterest">
                <a href="#!" class="g-color-white-opacity-0_5 g-color-white--hover">
                  <i class="fa fa-pinterest"></i>
                </a>
              </li>
              <li class="list-inline-item g-mx-10" data-toggle="tooltip" data-placement="top" title="Twitter">
                <a href="#!" class="g-color-white-opacity-0_5 g-color-white--hover">
                  <i class="fa fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item g-mx-10" data-toggle="tooltip" data-placement="top" title="Dribbble">
                <a href="#!" class="g-color-white-opacity-0_5 g-color-white--hover">
                  <i class="fa fa-dribbble"></i>
                </a>
              </li>
            </ul>
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


  <!-- JS Global Compulsory -->
  <script src="{{asset('js/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('js/jquery-migrate/jquery-migrate.min.js')}}"></script>
  <script src="{{asset('js/popper.min.js')}}"></script>
  <script src="{{asset('js/bootstrap/bootstrap.min.js')}}"></script>

  <!-- JS Implementing Plugins -->
  <script src="{{asset('js/appear.js')}}"></script>
  <script src="{{asset('js/hs-megamenu/src/hs.megamenu.js')}}"></script>
  <script src="{{asset('js/circles/circles.min.js')}}"></script>
  <script src="{{asset('js/malihu-scrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>

  <!-- JS Unify -->
  <script src="{{asset('js/hs.core.js')}}"></script>
  <script src="{{asset('js/helpers/hs.hamburgers.js')}}"></script>
  <script src="{{asset('js/components/hs.header.js')}}"></script>
  <script src="{{asset('js/components/hs.tabs.js')}}"></script>
  <script src="{{asset('js/components/hs.progress-bar.js')}}"></script>
  <script src="{{asset('js/components/hs.scrollbar.js')}}"></script>
  <script src="{{asset('js/components/hs.chart-pie.js')}}"></script>
  <script src="{{asset('js/components/hs.go-to.js')}}"></script>

  <!-- JS Customization -->
  <script src="{{asset('js/custom.js')}}"></script>
  <!-- <script src="jquery-3.3.1.min.js"></script> -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.js"></script>

  <!-- Google -->
  <script>
    function initMap() {
      var uluru = {lat: -25.363, lng: 131.044};
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 4,
        center: uluru //TODO: CENTRE THE MAP ON THE USER'S ADDRESS, LOADED FROM THE CONTROLLER
      });
      var marker = new google.maps.Marker({
        position: uluru,
        map: map
      });
    }
  </script>
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCr_el2AKIwhxoi2ndytf9lPL0G-iF2WGE&callback=initMap"></script>

  <!-- JS Plugins Init. -->
  <script>
    $(document).on('ready', function () {
        // initialization of go to
        $.HSCore.components.HSGoTo.init('.js-go-to');

        // initialization of tabs
        $.HSCore.components.HSTabs.init('[role="tablist"]');

        // initialization of chart pies
        var items = $.HSCore.components.HSChartPie.init('.js-pie');

        // initialization of HSScrollBar component
        $.HSCore.components.HSScrollBar.init( $('.js-scrollbar') );
        

        //------------- SPORT SELECTION -----------

        $("div.sport").hover(function (e) {
            e.preventDefault();
            if ($(this).hasClass('sport')) {
              $(this).removeClass('sport');
              $(this).addClass('sport_hover');
            }
        }, 
        function (e) {
            e.preventDefault();
            if ($(this).hasClass('sport_hover')) {
              $(this).removeClass('sport_hover');
              $(this).addClass('sport');
            }
        });

        $(document).on('click', 'div.sport_hover, div.sport', function(e) {
          e.preventDefault();
          //make the div show highlighted
          if ($(this).hasClass('sport_hover')) {
            $(this).removeClass('sport_hover');
          } else {
            $(this).removeClass('sport');
          }
          $(this).addClass('sport_selected');
          //update_selection();
        });

        $(document).on('click', 'div.sport_selected', function(e) {
          e.preventDefault();
          //make the div show highlighted
          $(this).removeClass('sport_selected');
          $(this).addClass('sport');
          //update_selection();
        });

        /*
        var update_selection = function() {
          //when a user clicks or unclicks a sport, update the location list and the map
        }
        */

        //------------- END SPORT SELECTION -----------
        
      });

      $(window).on('load', function () {
        // initialization of header
        $.HSCore.components.HSHeader.init($('#js-header'));
        $.HSCore.helpers.HSHamburgers.init('.hamburger');

        // initialization of HSMegaMenu component
        $('.js-mega-menu').HSMegaMenu({
          event: 'hover',
          pageContainer: $('.container'),
          breakpoint: 991
        });

        // initialization of horizontal progress bars
        setTimeout(function () { // important in this case
          var horizontalProgressBars = $.HSCore.components.HSProgressBar.init('.js-hr-progress-bar', {
            direction: 'horizontal',
            indicatorSelector: '.js-hr-progress-bar-indicator'
          });
        }, 1);
      });

      $(window).on('resize', function () {
        setTimeout(function () {
          $.HSCore.components.HSTabs.init('[role="tablist"]');
        }, 200);
      });
  </script>

</body>

</html>
