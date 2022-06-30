@extends('layouts.profile-sidebar')

@section('contentNav')

          <div class="profile_wrap">
            <h5 class="uppercase underline">General Settings</h5>
            <form action="{{ route('profile.update', $profile->id)}}" method="POST">
                @csrf
                @method('PUT')
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                        {{ session()->get('message') }}
                    @endif
                <!--First Name-->
                <div class="form-group">
                    <label class="control-label">First Name</label>
                    <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{ Auth::user()->first_name }}" name="first_name">
                        @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
               <!--Last Name-->
                <div class="form-group">
                    <label class="control-label">Last Name</label>
                    <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ Auth::user()->last_name }}" name="last_name">
                        @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
               <!--Username-->
                <div class="form-group">
                    <label class="control-label">Username</label>
                    <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ Auth::user()->username }}" name="username">
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
               <!--Email-->
                <div class="form-group">
                    <label class="control-label">Email Address</label>
                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ Auth::user()->email }}" name="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
               <!--Phone Number-->
                <div class="form-group">
                    <label class="control-label">Phone Number</label>
                    <input type="text" name="mobile_num" class="form-control @error('mobile_num') is-invalid @enderror" onkeyup="numberformat(this);" value="{{ Auth::user()->mobile_num }}" name="mobile_num">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

               {{-- <!--Update Address-->
              <div class="gray-bg field-title">
                    <h6>Update Address</h6>
              </div>
               <!--City-->
              <div class="form-group">
                <label class="control-label">City</label>
                <input type="hidden"  name="city"/>
                <select id="city" class="form-control @error('city') is-invalid @enderror">
                    <option value="{{ Auth::user()->city}}" selected>{{ Auth::user()->city}}</option>
                </select>
                    @error('city')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

               <!--Barangay-->

                <label class="control-label">Barangay</label>
                <input type="hidden"  name="barangay"/>
                <select id="barangay" class="form-control @error('barangay') is-invalid @enderror">
                    <option value="{{ Auth::user()->barangay}}" selected>{{ Auth::user()->barangay}}</option>
                </select>
                    @error('barangay')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
              </div>
               <!--Specific address-->
                <div class="form-group">
                    <label class="control-label">Specific Address</label>
                    <input type="text" class="form-control @error('purok') is-invalid @enderror" name="purok" placeholder="Example: Purok 17 Hagkol" value="{{ Auth::user()->purok}}">
                        @error('purok')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div> --}}
              <div class="form-group">
                <button type="submit" class="btn">Save Changes <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
              </div>
            </form>
          </div>

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
  <script type="text/javascript">
    function numberformat(input){
        var num = /[^0-9]/gi;
        input.value = input.value.replace(num,"");
    }
    //function city(val){
      // var select_city = $('#city option:selected').text();
      //console.log(val);
    //}
    //$(function(){


    //});

    $('#city').change(function(){
         var select_city = $('#city :selected').text();
        $('input[name=city]').val(select_city);
    });

    $('#barangay').change(function(){
         var select_barangay = $('#barangay :selected').text();
        $('input[name=barangay]').val(select_barangay);
    });

    //
  </script>
@endsection
