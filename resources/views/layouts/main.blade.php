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
<!--Custom Style -->
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('css/seller.css') }}" type="text/css">
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


	<!-- Start Forum Link -->

	<!-- Feather icons (https://github.com/feathericons/feather) -->
  <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

  <!-- Vue (https://github.com/vuejs/vue) -->
  @if (config('app.debug'))
      <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
  @else
      <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14"></script>
  @endif

  <!-- Axios (https://github.com/axios/axios) -->
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

  <!-- Pickr (https://github.com/Simonwep/pickr) -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/themes/classic.min.css">
  <script src="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/pickr.min.js"></script>

  <!-- Sortable (https://github.com/SortableJS/Sortable) -->
  <script src="//cdn.jsdelivr.net/npm/sortablejs@1.10.1/Sortable.min.js"></script>
  <!-- Vue.Draggable (https://github.com/SortableJS/Vue.Draggable) -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/Vue.Draggable/2.23.2/vuedraggable.umd.min.js"></script>

  <!-- end Forum Links -->


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
              <a href="mailto:info@example.com">carmartbuk.business@gmail.com</a>
            </div>
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
            <form action="{{route('searchCar')}}" method="GET" id="header-search-form">
              <input type="text" placeholder="Search Car" class="form-control" name="search">
              <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
            </form>
          </div>
        </div>
        <div class="collapse navbar-collapse" id="navigation">
          <ul class="nav navbar-nav">
            <li><a href="{{ route('index') }}">Home</a>

            </li>
            <li><a href="{{ route('about') }}">About Us</a></li>

            <li><a href="{{ route('sellers') }}">Seller</a></li>

            <li><a href="{{ url('contact') }}">Contact Us</a></li>
            <li><a href="{{ route('forums.index') }}">Forums</a></li>


            <!-- <li class="dropdown"><a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Forum</a>

              <ul class="dropdown-menu">
									<li ><a style="text-decoration:none;" class="submenu-link @if(str_contains(URL::current(), 'forum')) active @endif" href="{{ url(config('forum.web.router.prefix')) }}">{{ trans('forum::general.index') }}</a></li>
									<li ><a style="text-decoration:none;" class="submenu-link @if(str_contains(URL::current(), 'recent')) active @endif" href="{{ route('forum.recent') }}">{{ trans('forum::threads.recent') }}</a></li>
									@auth
										<li ><a style="text-decoration:none;" class="submenu-link @if(str_contains(URL::current(), 'unread')) active @endif" href="{{ route('forum.unread') }}">{{ trans('forum::threads.unread_updated') }}</a></li>
									@endauth
									@can ('moveCategories')
										<li ><a style="text-decoration:none;" class="submenu-link @if(str_contains(URL::current(), 'manage')) active @endif" href="{{ route('forum.category.manage') }}">{{ trans('forum::general.manage') }}</a></li>
									@endcan
						  </ul>
            </li> -->


          </ul>
        </div>
      </div>
    </nav>
    <!-- Navigation end -->

  </header>
  <!-- /Header -->

    <!--Insert Banner on the index.blade.php  -->

  @if(str_contains(URL::current(), 'forum'))
    @yield('contentDashboard')
  @else
    @yield('content')
  @endif


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

  <!--Sweet Alert Inclusion-->
  @include('sweetalert::alert')
  <!--/Sweet Alert Inclusion-->

  <!--Login Modal-->
  @include('layouts.login')
  <!--/Login Modal-->

  <!--Register Modal-->
  @include('layouts.register')
  <!--/Register Modal-->

<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/interface.js') }}"></script>
<!--bootstrap-slider-JS-->
<script src="{{ asset('assets/js/bootstrap-slider.min.js') }}"></script>
<!--Slider-JS-->
<script src="{{ asset('js/posting-car.js') }}"></script>

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
<script type="text/javascript">
    var my_handlers = {
            fill_cities: function(){
                var province_code = $(this).val();
                $('#cities').ph_locations( 'fetch_list', [{"province_code": 1013}]);
            },

            fill_barangays: function(){
            var city_code = $(this).val();
            $('#barangay').ph_locations('fetch_list', [{"city_code": city_code}]);
            }
        };

        $(function(){
            $('#cities').on('change', my_handlers.fill_barangays);
            $('#cities').ph_locations({'location_type': 'cities'});
            $('#cities').ph_locations('fetch_list', [{"province_code": 1013}]);
        });
</script>
<<<<<<< HEAD
=======

<script>
    new Vue({
        el: '.v-navbar',
        name: 'Navbar',
        data: {
            isCollapsed: true,
            isUserDropdownCollapsed: true
        },
        methods: {
            onWindowClick (event) {
                const ignore = ['navbar-toggler', 'navbar-toggler-icon', 'dropdown-toggle'];
                if (ignore.some(className => event.target.classList.contains(className))) return;
                if (! this.isCollapsed) this.isCollapsed = true;
                if (! this.isUserDropdownCollapsed) this.isUserDropdownCollapsed = true;
            }
        },
        created: function () {
            window.addEventListener('click', this.onWindowClick);
        }
    });

    const mask = document.querySelector('.mask');

    function findModal (key)
    {
        const modal = document.querySelector(`[data-modal=${key}]`);

        if (! modal) throw `Attempted to open modal '${key}' but no such modal found.`;

        return modal;
    }

    function openModal (modal)
    {
        modal.style.display = 'block';
        mask.style.display = 'block';
        setTimeout(function()
        {
            modal.classList.add('show');
            mask.classList.add('show');
        }, 200);
    }

    document.querySelectorAll('[data-open-modal]').forEach(item =>
    {
        item.addEventListener('click', event =>
        {
            event.preventDefault();

            openModal(findModal(event.currentTarget.dataset.openModal));
        });
    });

    document.querySelectorAll('[data-modal]').forEach(modal =>
    {
        modal.addEventListener('click', event =>
        {
            if (! event.target.hasAttribute('data-close-modal')) return;

            modal.classList.remove('show');
            mask.classList.remove('show');
            setTimeout(function()
            {
                modal.style.display = 'none';
                mask.style.display = 'none';
            }, 200);
        });
    });

    document.querySelectorAll('[data-dismiss]').forEach(item =>
    {
        item.addEventListener('click', event => event.currentTarget.parentElement.style.display = 'none');
    });

    document.addEventListener('DOMContentLoaded', event =>
    {
        const hash = window.location.hash.substr(1);
        if (hash.startsWith('modal='))
        {
            openModal(findModal(hash.replace('modal=','')));
        }

        feather.replace();

        const input = document.querySelector('input[name=color]');

        if (! input) return;

        const pickr = Pickr.create({
            el: '.pickr',
            theme: 'classic',
            default: input.value || null,

            swatches: [
                '{{ config('forum.web.default_category_color') }}',
                '#f44336',
                '#e91e63',
                '#9c27b0',
                '#673ab7',
                '#3f51b5',
                '#2196f3',
                '#03a9f4',
                '#00bcd4',
                '#009688',
                '#4caf50',
                '#8bc34a',
                '#cddc39',
                '#ffeb3b',
                '#ffc107'
            ],

            components: {
                preview: true,
                hue: true,
                interaction: {
                    input: true,
                    save: true
                }
            },

            strings: {
                save: 'Apply'
            }
        });

        pickr
            .on('save', instance => pickr.hide())
            .on('clear', instance =>
            {
                input.value = '';
                input.dispatchEvent(new Event('change'));
            })
            .on('cancel', instance =>
            {
                const selectedColor = instance
                    .getSelectedColor()
                    .toHEXA()
                    .toString();

                input.value = selectedColor;
                input.dispatchEvent(new Event('change'));
            })
            .on('change', (color, instance) =>
            {
                const selectedColor = color
                    .toHEXA()
                    .toString();

                input.value = selectedColor;
                input.dispatchEvent(new Event('change'));
            });
    });
    </script>


>>>>>>> 2b4f39e0647696f9b2c6284002f7cdff14862cc3
</body>
</html>
