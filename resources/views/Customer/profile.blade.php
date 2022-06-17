@extends('layouts.main')

@section('content')
<!--Profile-setting-->
<section class="user_profile inner_pages">
    <div class="container">
      <div class="user_profile_info gray-bg padding_4x4_40">
        <div class="upload_user_logo"> <img src="assets/images/222x172.jpg" alt="image">
          <div class="upload_newlogo">
            <input name="upload" type="file">
          </div>
        </div>
        <div class="dealer_info">
          <h5>Autospot Used Cars Center </h5>
          <p>P.1225 N Broadway Ave <br>
            Oklahoma City, OK  1234-5678-090</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3 col-sm-3">
          <div class="profile_nav">
            <ul>
              <li class="active"><a href="profile-settings.html">Profile Settings</a></li>
              <li><a href="my-vehicles.html">My Vehicles</a></li>
              <li><a href="post-vehicle.html">Post a Vehicles</a></li>
              <li><a href="#">Sign Out</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-6 col-sm-8">
          <div class="profile_wrap">
            <h5 class="uppercase underline">General Settings</h5>
            <form action="#" method="get">
              <div class="form-group">
                <label class="control-label">Full Name</label>
                <p>{{ $profile->first_name }} {{ $profile->last_name }}</p>
              </div>
              <div class="form-group">
                <label class="control-label">Username</label>
                <p>{{ $profile->username}}</p>
              </div>
              <div class="form-group">
                <label class="control-label">Email Address</label>
                <p>{{ $profile->email }}</p>
              </div>
              <div class="form-group">
                <label class="control-label">Phone Number</label>
                <p>+63-{{ $profile->mobile_num }}</p>
              </div>
              <div class="form-group">
                <label class="control-label">Your Address</label>
                <textarea class="form-control white_bg" rows="4"></textarea>
              </div>
              <div class="form-group">
                <label class="control-label">Country</label>
                <input class="form-control white_bg" id="country" type="text">
              </div>
              <div class="form-group">
                <label class="control-label">City</label>
                <input class="form-control white_bg" id="city" type="text">
              </div>
              <div class="gray-bg field-title">
                <h6>Update password</h6>
              </div>
              <div class="form-group">
                <label class="control-label">Password</label>
                <input class="form-control white_bg" id="password" type="password">
              </div>
              <div class="form-group">
                <label class="control-label">Confirm Password</label>
                <input class="form-control white_bg" id="c-password" type="password">
              </div>
              <div class="form-group">
                <button type="submit" class="btn">Save Changes <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/Profile-setting-->
@endsection
