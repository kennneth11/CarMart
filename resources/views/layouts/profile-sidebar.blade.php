@extends('layouts.main')

@section('content')
<!--Profile-setting-->
<section class="user_profile inner_pages">
    <div class="container">
      <div class="user_profile_info gray-bg padding_4x4_40">
            <div class="upload_user_logo"> <img src="{{ asset('userProfiles/'.Auth::user()->avatar) }}" alt="image">
            <div class="upload_newlogo">
                <input name="avatar" type="file">
            </div>
            </div>
        <div class="dealer_info">
          <h5>{{ Auth::user()->first_name }} {{ Auth::user()->last_name}}</h5>
          <p>{{ Auth::user()->purok }}</p>, <p>{{ Auth::user()->city }}</p>{{ Auth::user()->barangay }}
        </div>

      </div>
      <div class="row">
        <!--Sidebar separate file-->

        <div class="col-md-3 col-sm-3">
            <div class="profile_nav">
            <ul>
                <li class="@if(str_contains(URL::current(),'profile/')) active @endif"><a href="{{ route('profile.show', Auth::id()) }}">General Settings</a></li>
                @if (Auth::user()->hasRole('seller'))
                <li class="@if(str_contains(URL::current(), 'My-Cars')) active @endif "><a href="{{ route('My-Cars') }}">My Vehicles</a></li>
                <li class="@if(str_contains(URL::current(), 'Post-Car')) active @endif "><a href="{{ route('Post-Car') }}">Post a Vehicles</a></li>
                @endif
                <li class="@if(str_contains(URL::current(),'changeAddress')) active @endif"><a href="{{ route('changeAddress')}} ">Update Address</a></li>
                <li class="@if(str_contains(URL::current(),'changePassword')) active @endif"><a href="{{ route('changePassword')}} ">Update Password</a></li>
                <li class="@if(str_contains(URL::current(),'index')) active @endif"><a href="{{ route('upload.home') }}">Update Profile Picture</a></li>
                <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign Out</a></li>
                    <form id="logout-form" method="POST" action="{{ route('logout') }}">
                        @csrf
                    </form>
            </ul>
            </div>
        </div>
        <div class="col-md-6 col-sm-8">

          @yield('contentNav')

        </div>

      </div>
    </div>
  </section>
  <!--/Profile-setting-->
@endsection
