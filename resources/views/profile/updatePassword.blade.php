@extends('layouts.profile-sidebar')

@section('contentNav')
<!--Update Password-setting-->

        <div class="col-md-6 col-sm-8">
          <div class="profile_wrap">
            <h5 class="uppercase underline">Update Password</h5>

            <form action="{{route('updatePassword')}}" method="POST">
               @csrf
                <div class="form-group">
                    <label class="control-label">Current Password</label>
                    <input type="password" name="current_password" class="form-control @error('current_password') is-invalid @enderror" :value="old('current_password') required>
                        @error('current_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <div class="form-group">
                    <label class="control-label">New Password</label>
                    <input type="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror" :value="old('new_password')>
                        @error('new_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <div class="form-group">
                    <label class="control-label">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" :value="old('password_confirmation') required>
                        @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                <div class="form-group">
                <button type="submit" class="btn">Update Password<span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
              </div>
            </form>
          </div>
        </div>
  <!--/Update Password-setting-->
@endsection
