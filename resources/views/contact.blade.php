@extends('layouts.main')

@section('content')
<!--Page Header-->
<section class="page-header contactus_page">
    <div class="container">
      <div class="page-header_wrap">
        <div class="page-heading">
          <h1>Contact Us</h1>
        </div>
        <ul class="coustom-breadcrumb">
          <li><a href="{{ url('/') }}">Home</a></li>
          <li>Contact Us</li>
        </ul>
      </div>
    </div>
    <!-- Dark Overlay-->
    <div class="dark-overlay"></div>
  </section>
  <!-- /Page Header-->

  <!--Contact-us-->
  <section class="contact_us section-padding">
    <div class="container">
      <div  class="row">
        <div class="col-md-6">
          <h3>Get in touch using the form below</h3>
          <div class="contact_form gray-bg">
            <form action="{{ route('send.email') }}" method="POST">
                @csrf
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                        {{ session()->get('message') }}
                     @endif
              <div class="form-group">
                <label class="control-label">Full Name <span>*</span></label>
                <input type="text" class="form-control @error('fullname') is-invalid @enderror" name="fullname" id="fullname">
                    @error('fullname')
                        <span class="text-danger"> {{ $message }} </span>
                    @enderror
              </div>
              <div class="form-group">
                <label class="control-label">Email Address <span>*</span></label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email">
                    @error('email')
                        <span class="text-danger"> {{ $message }} </span>
                    @enderror
              </div>
              <div class="form-group">
                <label class="control-label">Phone Number <span>*</span></label>
                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone">
                    @error('phone')
                        <span class="text-danger"> {{ $message }} </span>
                    @enderror
              </div>

              <div class="form-group">
                <label class="control-label">Subject <span>*</span></label>
                <input type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" >
                    @error('message')
                        <span class="text-danger"> {{ $message }} </span>
                    @enderror
              </div>

              <div class="form-group">
                <label class="control-label">Message <span>*</span></label>
                <textarea class="form-control @error('content') is-invalid @enderror" name="content" rows="4"></textarea>
                    @error('content')
                        <span class="text-danger"> {{ $message }} </span>
                    @enderror
              </div>
              <div class="form-group">
                <button class="btn" type="submit">Send Message <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-6">
          <h3>Contact Info</h3>
          <div class="contact_detail">
            <ul>
              <li>
                <div class="icon_wrap"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                <div class="contact_info_m">Valencia City, Bukidnon</div>
              </li>
              <li>
                <div class="icon_wrap"><i class="fa fa-phone" aria-hidden="true"></i></div>
                <div class="contact_info_m"><a href="tel:61-1234-567-90">+63-9531548869</a></div>
              </li>
              <li>
                <div class="icon_wrap"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
                <div class="contact_info_m"><a href="mailto:contact@exampleurl.com">carmartbuk.business@gmail.com</a></div>
              </li>
            </ul>
            <div class="map_wrap">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d252916.12839586975!2d124.92277733990902!3d7.914436428218801!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x32ff197dcc3e6a41%3A0xfd73c3a172dc74bc!2sValencia%20City%2C%20Bukidnon!5e0!3m2!1sen!2sph!4v1657988333665!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
  <!-- /Contact-us-->
@endsection
