@extends('layouts.profile-sidebar')

@section('contentNav')
<!--Profile-setting-->

        <div class="col-md-6 col-sm-8">
          <div class="profile_wrap">
            <h5 class="uppercase underline">Update Address</h5>

            <form action="" method="POST">
               @csrf
                <div class="form-group">
                    <label class="control-label">Current City</label>
                    <input type="text" readonly class="form-control" value="{{Auth::user()->city}}">
                </div>
                <div class="form-group">
                    <label class="control-label">Current Barangay</label>
                    <input type="text" readonly class="form-control" value="{{Auth::user()->barangay}}">
                </div>
                <div class="form-group">
                    <label class="control-label">Specific Address</label>
                    <input type="text" readonly class="form-control" value="{{Auth::user()->purok}}">
                </div>
                <button type="submit" class="btn">Update Address<span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
              </div>
            </form>
          </div>
        </div>
  <!--/Profile-setting-->
@endsection
