@extends('layouts.profile-sidebar')

@section('contentNav')

          <div class="profile_wrap">
            <h5 class="uppercase underline">General Settings</h5>
            <form action="#" method="get">
                <!--First Name-->
              <div class="form-group">
                <label class="control-label">First Name</label>
                <input type="text" class="form-control" value="{{ Auth::user()->first_name }}" name="first_name">
              </div>
               <!--Last Name-->
              <div class="form-group">
                <label class="control-label">Last Name</label>
                <input type="text" class="form-control" value="{{ Auth::user()->last_name }}" name="last_name">
              </div>
               <!--Username-->
              <div class="form-group">
                <label class="control-label">Username</label>
                <input type="text" class="form-control" value="{{ Auth::user()->username }}" name="username">
              </div>
               <!--Email-->
              <div class="form-group">
                <label class="control-label">Email Address</label>
                <input type="text" class="form-control" value="{{ Auth::user()->email }}" name="email">
              </div>
               <!--Phone Number-->
              <div class="form-group">
                <label class="control-label">Phone Number</label>
                <input type="text" class="form-control" value="{{ Auth::user()->mobile_num }}" name="mobile_num">
              </div>

               <!--Update Address-->
              <div class="gray-bg field-title">
                    <h6>Update Address</h6>
              </div>
               <!--City-->
               <div id="myCity">{{ Auth::user()->city}}</div>

              <div class="form-group">
                <label class="control-label">City</label>
                <select name="city" id="city" class="form-control" >
                    <option value="{{ Auth::user()->city}}" selected></option>
                </select>
              </div>
              
               <!--Barangay-->
              <div class="form-group">
                <label class="control-label">Barangay</label>
                <select name="city" id="city" class="form-control" >
                    <option value="{{ Auth::user()->barangay}}" selected></option>
                </select>
              </div>
               <!--Specific address-->
               <div class="form-group">
                <label class="control-label">Specific Address</label>
                <input type="text" class="form-control" name="purok" placeholder="Example: Purok 17 Hagkol" value="{{ Auth::user()->purok}}">
              </div>
              <div class="form-group">
                <button type="submit" class="btn">Save Changes <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
              </div>
            </form>
          </div>

@endsection
