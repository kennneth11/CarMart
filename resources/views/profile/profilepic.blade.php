@extends('layouts.profile-sidebar')

@section('contentNav')
          <div class="profile_wrap">
            <form action="{{route('upload.avatar')}}" method="POST">
                @csrf
            <h5 class="uppercase underline">Update Profile Picture</h5>

               <!--Specific address-->
               <div class="form-group">
                <label class="control-label">Upload new image</label>
                <input type="file" name="avatar" class="form-control @error('fullname') is-invalid @enderror">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
              </div>
              <div class="form-group">
                <button type="submit" class="btn">Save Changes <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
              </div>
            </form>
          </div>

@endsection
