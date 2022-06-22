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
        <!--Sidebar separate file-->

        <div class="col-md-3 col-sm-3">
            <div class="profile_nav">
            <ul>
                <li><a href="{{ route('profile.show', Auth::id()) }}">Profile Settings</a></li>
                @if (Auth::user()->hasRole('seller'))
                <li><a href="my-vehicles.html">My Vehicles</a></li>
                <li><a href="post-vehicle.html">Post a Vehicles</a></li>
                @endif
                <li class="active"><a href="">Update Password</a></li>
                <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign Out</a></li>
                    <form id="logout-form" method="POST" action="{{ route('logout') }}">
                        @csrf
                    </form>
            </ul>
            </div>
        </div>

        <div class="col-md-6 col-sm-8">
          <div class="profile_wrap">
            <h5 class="uppercase underline">General Settings</h5>

            <form action="{{ route('profile.update', $profile->id) }}" method="GET">
               @csrf
              <div class="form-group">
                <label class="control-label">Current Password</label>
                <input type="password" name="current-password" class="form-control" required>
              </div>
              <div class="form-group">
                <label class="control-label">New Password</label>
                <input type="password" name="password" class="form-control">

              </div>
              <div class="form-group">
                <label class="control-label">Confirm Password</label>
                <input type="password" name="password-confirmation" class="form-control" required>

              <div class="form-group">
                <button type="submit" class="btn">Update Password<span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/Profile-setting-->
@endsection
