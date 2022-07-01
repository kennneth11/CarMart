<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>Car Mart</title>
<!--Bootstrap -->

<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" type="text/css">
<!--Custome Style -->
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css">
<!--OWL Carousel slider-->
<link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('assets/css/owl.transitions.css') }}" type="text/css">
<!--slick-slider -->
<link href="{{ asset('assets/css/slick.css') }}" rel="stylesheet">
<!--bootstrap-slider -->
<link href="{{ asset('assets/css/bootstrap-slider.min.css') }}" rel="stylesheet">
<!--FontAwesome Font Style -->
<link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet">

<!-- Custom Colors -->
<link rel="stylesheet" href="{{ asset('assets/colors/red.css') }}">
<!--<link rel="stylesheet" href="assets/colors/orange.css">-->
<!--<link rel="stylesheet" href="assets/colors/blue.css">-->
<!--<link rel="stylesheet" href="assets/colors/pink.css">-->
<!--<link rel="stylesheet" href="assets/colors/green.css">-->
<!--<link rel="stylesheet" href="assets/colors/purple.css">-->

<!-- Fav and touch icons -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('assets/images/favicon-icon/apple-touch-icon-144-precomposed.png') }}">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('assets/images/favicon-icon/apple-touch-icon-114-precomposed.png') }}">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('assets/images/favicon-icon/apple-touch-icon-72-precomposed.png') }}">
<link rel="apple-touch-icon-precomposed" href="{{ asset('assets/images/favicon-icon/apple-touch-icon-57-precomposed.png') }}">
<link rel="shortcut icon" href="{{ asset('assets/images/favicon-icon/favicon.png') }}">
<!-- Google-Font-->
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>

<!--Header-->
<header>
    <div class="default-header">
      <div class="container">
        <div class="row">
          <div class="col-sm-3 col-md-2">
            <div class="logo"> <a href="{{ route('index') }}"><img src="{{ asset('assets/images/CarMartSmallV2.png') }}" alt="image"/></a> </div>
          </div>
          <div class="col-sm-9 col-md-10">
            <div class="header_info">
              <div class="header_widgets">
                <div class="circle_icon"> <i class="fa fa-envelope" aria-hidden="true"></i> </div>
                <p class="uppercase_text">For Support Mail us : </p>
                <a href="mailto:info@example.com">business.carmart@gmail.com</a> </div>
              <div class="header_widgets">
                <div class="circle_icon"> <i class="fa fa-phone" aria-hidden="true"></i> </div>
                <p class="uppercase_text">Service Helpline Call Us: </p>
                <a href="tel:61-1234-5678-09">+63-9531548869</a> </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Navigation -->
    <nav id="navigation_bar" class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button id="menu_slide" data-target="#navigation" aria-expanded="false" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <div class="header_wrap">
         @if (Route::has('login'))
          @auth
          <div class="user_login">
            <ul>
              <li class="dropdown"> <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle" aria-hidden="true"></i> {{ Auth::user()->first_name }} {{ Auth::user()->last_name }} <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                <ul class="dropdown-menu">


                <li><a href="{{ route('profile.show', Auth::id()) }}">Profile Settings</a></li>

                  @if (Auth::user()->hasRole('seller'))
                  <li><a href="{{ route('My-Cars') }}">My Vehicles</a></li>
                  <li><a href="{{ route('Post-Car') }}">Post a Vehicle</a></li>
                  @endif
                  <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign Out</a></li>
                      <form id="logout-form" method="POST" action="{{ route('logout') }}">
                      @csrf
                  </form>
                </ul>
              </li>
            </ul>
          </div>
          @else
              <div class="login_btn user_login"> <a href="#loginform" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal">Login / Register</a> </div>
          @endauth
          @endif
          <div class="header_search">
            <div id="search_toggle"><i class="fa fa-search" aria-hidden="true"></i></div>
            <form action="#" method="get" id="header-search-form">
              <input type="text" placeholder="Search..." class="form-control">
              <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
            </form>
          </div>
        </div>
        <div class="collapse navbar-collapse" id="navigation">
          <ul class="nav navbar-nav">
            <li><a href="{{ route('index') }}">Home</a>

            </li>
            <li><a href="{{ route('about') }}">About Us</a></li>
            <li class="dropdown"><a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Inventory</a>
              <ul class="dropdown-menu">
                <li><a href="listing-grid.html">Grid Style</a></li>
                <li><a href="listing-classic.html">Classic Style</a></li>
                <li><a href="listing-detail.html">Detail Page Style 1</a></li>
                <li><a href="listing-detail-2.html">Detail Page Style 2</a></li>
              </ul>
            </li>
            <li class="dropdown"><a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dealers</a>
              <ul class="dropdown-menu">
                <li><a href="dealers-list.html">List View</a></li>
                <li><a href="dealers-profile.html">Detail Page</a></li>
              </ul>
            </li>
            <li><a href="{{ url('/contact')}}">Contact Us</a>
            <li class="dropdown"><a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">News</a>
              <ul class="dropdown-menu">
                <li><a href="blog-left-sidebar.html">Blog Left Sidebar</a></li>
                <li><a href="blog-right-sidebar.html">Blog Right Sidebar</a></li>
                <li><a href="blog-detail.html">Blog Detail</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Navigation end -->

  </header>
  <!-- /Header -->

    <!--Insert Banner on the index.blade.php  -->

@yield('content')

  <!--Footer -->
  <footer>
    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-md-3 col-sm-6">
            <h6>About Us</h6>
            <ul>
              <li><a href="#">Privacy</a></li>
              <li><a href="#">Hybrid Cars</a></li>
              <li><a href="#">Cookies</a></li>
              <li><a href="#">Trademarks</a></li>
              <li><a href="#">Terms of use</a></li>
            </ul>
          </div>
          <div class="col-md-3 col-sm-6">
            <h6>Useful Links</h6>
            <ul>
              <li><a href="#">Our Partners</a></li>
              <li><a href="#">Careers</a></li>
              <li><a href="#">Sitemap</a></li>
              <li><a href="#">Investors</a></li>
              <li><a href="#">Request a Quote</a></li>
            </ul>
          </div>
          <div class="col-md-3 col-sm-6">
            <h6>Subscribe Newsletter</h6>
            <div class="newsletter-form">
              <form action="#">
                <div class="form-group">
                  <input type="email" class="form-control newsletter-input" required placeholder="Enter Email Address" />
                </div>
                <button type="submit" class="btn btn-block">Subscribe <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
              </form>
              <p class="subscribed-text">*We send great deals and latest auto news to our subscribed users every week.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <div class="container">
        <div class="row">
          <div class="text-center">
            <p class="copy-right">Copyright &copy; 2022 CarMart. All Rights Reserved</p>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- /Footer-->

  <!--Back to top-->
  <div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
  <!--/Back to top-->
  @include('layouts.login')
  @include('layouts.register')

<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/interface.js') }}"></script>
<!--bootstrap-slider-JS-->
<script src="{{ asset('assets/js/bootstrap-slider.min.js') }}"></script>
<!--Slider-JS-->
<script src="{{ asset('assets/js/slick.min.js') }}"></script>
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>


<script src="{{ asset('assets/js/jquery.ph-locations.js') }}"></script>

<script type="text/javascript">
        var my_handlers = {

            fill_cities: function(){

                var province_code = $(this).val();
                $('#city').ph_locations( 'fetch_list', [{"province_code": 1013}]);
            },

            fill_barangays: function(){

                var city_code = $(this).val();
                $('#barangay').ph_locations('fetch_list', [{"city_code": city_code}]);
            }
            };

            $(function(){

            $('#city').on('change', my_handlers.fill_barangays);

            $('#city').ph_locations({'location_type': 'cities'});
            $('#barangay').ph_locations({'location_type': 'barangays'});

            $('#city').ph_locations('fetch_list', [{"province_code": 1013}]);
            });
</script>


</body>
</html>
