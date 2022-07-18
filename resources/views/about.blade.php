@extends('layouts.main')

@section('content')
<!--Page Header-->
<section class="page-header aboutus_page">
    <div class="container">
      <div class="page-header_wrap">
        <div class="page-heading">
          <h1>About Us</h1>
        </div>
        <ul class="coustom-breadcrumb">
          <li><a href="{{ route('index')}}">Home</a></li>
          <li>About Us</li>
        </ul>
      </div>
    </div>
    <!-- Dark Overlay-->
    <div class="dark-overlay"></div>
  </section>
  <!-- /Page Header-->

  <!--About-us-->
  <section class="about_us section-padding">
    <div class="container">
      <div class="section-header text-center">
        <h2>Welcome <span>to Car Mart</span></h2>
        <p>A one stop marketplace for car enthusiast in the province of Bukidnon.
            Where you can sell used and brand new cars, display all you want, and browse all you can. Contact different sellers
        from different places, deal according to your convenience.</p>
      </div>
      <div class="row">
        <div class="col-md-6 col-sm-6">
          <div class="about_content row">
            <div class="col-md-5 col-sm-4 col-xs-4">
              <div class="about_img"> <img src="assets/images/220x220.jpg" alt="image"> </div>
            </div>
            <div class="col-md-7 col-sm-8 col-xs-8">
              <h3>Who <span>Are We</span></h3>
              <p class="text-justify">CarMart Bukidnon, is a free listing site for Cars within the vacinity of Bukidnon, Philippines.
                The startup company is based on Valencia City, Bukidnon. Run and managed by two web developers.
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-sm-6">
          <div class="about_content row">
            <div class="col-md-5 col-sm-4 col-xs-4">
              <div class="about_img"> <img src="assets/images/220x220.jpg" alt="image"> </div>
            </div>
            <div class="col-md-7 col-sm-8 col-xs-8">
              <h3>Our <span>Mission</span></h3>
              <p class="text-justify">To provide a free car listing and an online marketplace for cars in the province of Bukidnon.</p>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-6 col-sm-6">
          <div class="about_content row">
            <div class="col-md-5 col-sm-4 col-xs-4">
              <div class="about_img"> <img src="assets/images/220x220.jpg" alt="image"> </div>
            </div>
            <div class="col-md-7 col-sm-8 col-xs-8">
              <h3>What <span>we do</span></h3>
              <p class="text-justify">We offer free car listing and browsing for the car enthusiasts of Bukidnon, Philippines.
                Giving them chance to look for cars nearby places and to have outlines in choosing their cars.
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-sm-6">
          <div class="about_content row">
            <div class="col-md-5 col-sm-4 col-xs-4">
              <div class="about_img"> <img src="assets/images/220x220.jpg" alt="image"> </div>
            </div>
            <div class="col-md-7 col-sm-8 col-xs-8">
              <h3>Our <span>Vision</span></h3>
              <p class="text-justify">Uplift the quality of car marketing through the embracement of technological development.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /About-us-->

  <!-- Why-Choose-Us-->
  <section class="why_choose_us section-padding gray-bg">
    <div class="container">
      <div class="section-header text-center">
        <h2>Why <span>Use CarMart-Bukidnon?</span></h2>
        <p>CarMart-Bukidnon caters free car listing to all car sellers and car dealers inside the province of Bukidnon.
            Customers can browse cars, search for cars, find cars nearby place and can chat with the seller. CarMart-Bukidnon
            does not only cater buy and sell, it does also let customers and sellers discuss on the forum section of the website.
        </p>
      </div>
      <div class="row">
        <div class="col-md-6 col-sm-6">
          <div class="listing_box">
            <h5><i class="fa fa-user-circle" aria-hidden="true"></i> User friendly site</h5>
            <p>It manages to handle clean and simple visuals that helps user to navigate and use the website easily.</p>
          </div>
          <div class="listing_box">
            <h5><i class="fa fa-globe" aria-hidden="true"></i> Wide Range Of Vehicles</h5>
            <p>You can choose from different types of vehicles, different models, year manufactured, brands from different places inside the
                province of Bukidnon.
            </p>
          </div>
          <div class="listing_box">
            <h5><i class="fa fa-car" aria-hidden="true"></i> Faster Buy & Sell</h5>
            <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete.</p>
          </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <img src="{{ asset('assets/images/CarMartLogo.png')}}" style="width:100%;" alt="">
        </div>
      </div>
    </div>
  </section>
  <!-- /Why-Choose-Us-->


  <!-- Meet-the-Team-->
  <section class="meet_team section-padding">
    <div class="container">
      <div class="section-header text-center">
        <h2>Meet <span>the Team</span></h2>
      </div>
      <div class="row">
        <div class="col-md-6 col-sm-6">
          <div class="team_member">
            <div class="team_img"> <img src="assets/images/Julius.jpg" alt="image">
              <div class="team_more_info">
                <div class="info_wrap">
                  <p><span>Phone:</span> <a href="tel:+61-12134-567-89">+63-905123456</a></p>
                  <p><span>Email:</span> <a href="mailto:contact@example.com">juliuskennbalendres@gmail.com</a></p>
                  <ul>
                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="team_info">
              <H6>Julius Kenn O. Balendres</H6>
              <P>Developer</P>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-sm-6">
          <div class="team_member">
            <div class="team_img"> <img src="assets/images/Ryan.jpg" alt="image">
              <div class="team_more_info">
                <div class="info_wrap">
                  <p><span>Phone:</span> <a href="tel:+61-12134-567-89">+63-9531548869</a></p>
                  <p><span>Email:</span> <a href="mailto:contact@example.com">sioc.ryanjay@gmail.com</a></p>
                  <ul>
                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="team_info">
              <H6>Ryan Jay A. Sioc</H6>
              <P>Developer</P>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Meet-the-Team-->
@endsection
