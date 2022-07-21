{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-button>
                        {{ __('Resend Verification Email') }}
                    </x-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>
    </x-auth-card>
</x-guest-layout> --}}

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
</head>
<body>
<!--Error-404-->
<section class="error_404 section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-sm-5">
            <div class="col-md-6 col-sm-6">
                <img src="{{ asset('assets/images/CarMartLogo.png')}}" alt="">
              </div>
        </div>
        <div class="col-md-6 col-sm-7">
          <div class="not_found_msg">
            <div class="error_icon"></i> </div>
            <div class="error_msg_div">
              <h3>Thanks for signing up!</h3>
              <p>Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.</p>

            @if (session('status') == 'verification-link-sent')
                <h3>Email Verification Sent!</h3>
                <p>A new verification link has been sent to the email address you provided during registration.</p>
            @endif

            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="btn btn-primary">Resend Email Verification<span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="btn">
                    {{ __('Log Out') }}
                </button>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /Error-404-->
</body>
</html>


