@extends('layouts.profile-sidebar')

@section('contentNav')
<!--Update Address-setting-->

        <div class="col-md-6 col-sm-8">
          <div class="profile_wrap">
            <h5 class="uppercase underline">Current Address</h5>

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

            </div>

            <h5 class="uppercase underline">-----Update Address-----</h5>
            <form action="{{route('updateAddress')}}" method="POST">
               @csrf

              <!--city-->
              <div class="form-group">
                <label for="city">City/Municipality</label>
                <input type="hidden"  name="city" value="{{Auth::user()->city}}"/>
                <select id="city" class="form-control">
                    <option value="{{Auth::user()->city}}" selected>{{Auth::user()->city}}</option>
                </select>
              <!--Baranggay-->
                <label for="barangay">Barangay</label>
                <input type="hidden"  name="barangay" value="{{Auth::user()->barangay}}"/>
                <select id="barangay" class="form-control">
                    <option value="{{Auth::user()->barangay}}" selected>{{Auth::user()->barangay}}</option>
                </select>
              </div>

              <!-- Purok -->
              <div class="form-group mt-2 d-inline-block">
                <label for="purok">Specific Address</label>
                <input type="text" class="form-control" name="purok" placeholder="Example: Purok 17 Hagkol" value="{{Auth::user()->purok}}">
              </div>
              <button type="submit" class="btn">Update Address<span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
            </form>
          </div>
        </div>
  <!--/Update Address-setting-->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script type="text/javascript">
        $('#city').change(function(){
            var select_city = $('#city :selected').text();
            $('input[name=city]').val(select_city);
        });

        $('#barangay').change(function(){
            var select_barangay = $('#barangay :selected').text();
            $('input[name=barangay]').val(select_barangay);
        });

    </script>

@endsection
