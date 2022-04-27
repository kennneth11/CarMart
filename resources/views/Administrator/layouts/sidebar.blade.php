<!DOCTYPE html>
<html >

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>{{config('app.name')}}</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/font/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('administrator/css/Sidebar-Menu.css') }}">
    <link rel="stylesheet" href="{{ asset('/dashboard.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
</head>

<body style="height: auto;">


    <div id="wrapper" class="wrapper">
        <div id="sidebar-wrapper">
            <div id="brand"><a class="d-flex align-items-center" href="#" style="height: 56px;"><img src="{{ asset('images/prio-logo-black.png') }}">
                    <div class="d-flex align-items-center">
                        <p class="d-flex ">ID Registration System</p>
                    </div>
                </a></div>
            <!-- <div class="container " id="profile-details" >
                <div class="d-flex justify-content-center "><img src="{{ asset('images/profile.png') }}"></div>
                <div class="text-center">
                    <p>{{ Auth::user()->name }}</p>
                    <p>{{ Auth::user()->email }}</p>
                    <p>administrator</p>
                </div>
            </div> -->
            <nav class="navbar navbar-dark navbar-expand side-container" style="padding: 0; margin:0;">
                <div >
                    <ul class="navbar-nav mr-auto flex-column mr-auto" style="width: 100%;">
                        <li class="nav-item" style="width: 100%;"><a class="nav-link d-flex align-items-center" href="" style="width: 100%;padding: 12px;">
                        <div class="link-icons-container" style="width: 25%;"><i class="fa fa-home link-icons"></i></div>Dashboard</a>
                        </li>
                        <li class="nav-item" style="width: 100%;"><a class="nav-link d-flex align-items-center" href="" style="width: 100%;padding: 12px;">
                            <div class="link-icons-container" style="width: 25%;"><i class="fa fa-users link-icons"></i></div>Car Managment</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <nav class="navbar navbar-light navbar-expand-md d-lg-flex" style="color: rgb(33, 37, 41);height: 56px;">
            <div class="container-fluid">
                <a class="btn btn-link icon-container" role="button" id="menu-toggle" href="#menu-toggle" style="background: rgb(255,255,255);">
                    <i class="fa fa-bars" style="color: none;font-size: 26px;"></i>
                </a>
                <div class="d-flex justify-content-end align-items-center " id="navcol-1">
                    <div class="btn-group nav-down">
                    <button class=" dropdown-toggle nav-drop" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        My Account
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><form class="dropdown-item" method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form></li>
                    </ul>
                    </div>
                </div>
            </div>
        </nav>

        @yield('content')

    </div>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('administrator/js/Sidebar-Menu.js') }}"></script>
</body>
</html>