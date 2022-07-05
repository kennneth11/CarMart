<!--Register-Form -->
<div class="modal fade" id="signupform" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h3 class="modal-title">Sign Up</h3>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="signup_wrap">
              <div class="col-md-6 col-sm-6">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                <!-- FirstName -->
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" placeholder="First Name" :value="old('first_name')" required>
                            @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                  <!-- LastName -->
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" placeholder="Last Name" :value="old('last_name')" required >
                            @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                  <!-- Email -->
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email Address" :value="old('email')" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                  <!-- Username -->
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="Username" :value="old('username')" required>
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                  <!-- Mobile Number -->
                    <div class="form-group">
                        <label for="mobile_num">Phone number</label>
                        <input type="text" maxlength = "11" class="form-control @error('mobile_num') is-invalid @enderror" name="mobile_num" placeholder="Ex. 09051151125" onkeyup="numberformat(this);" :value="old('mobile_num')">
                            @error('mobile_num')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                  <!--city-->
                  <div class="form-group">
                    <label for="city">City/Municipality</label>
                    <input type="hidden"  name="city"/>
                    <select id="city" class="form-control">
                    </select>
                  <!--Baranggay-->
                    <label for="barangay">Barangay</label>
                    <input type="hidden"  name="barangay"/>
                    <select id="barangay" class="form-control">
                    </select>
                  </div>

                  <!-- Purok -->
                    <div class="form-group mt-2 d-inline-block">
                        <label for="purok">Specific Address</label>
                        <input type="text" class="form-control @error('purok') is-invalid @enderror" name="purok" placeholder="Example: Purok 17 Hagkol" :value="old('purok')">
                            @error('purok')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                  <!-- Password -->
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="password" :value="old('password')">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                  <!--Confirm Password -->
                  <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" :value="__('Confirm Password')" required>
                  </div>

                  <!--Role_ID -->
                  <div class="form-group">
                    <label for="role_id">Select account type</label>
                    <select name="role_id" id="role_id" class="form-control" required>
                        <option value="customer">Customer</option>
                        <option value="seller">Seller</option>
                    </select>
                  </div>

                <!--Submit form -->
                  <div class="form-group">
                    <input type="submit" value="Sign Up" class="btn btn-block">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer text-center">
          <p>Already got an account? <a href="#loginform" data-toggle="modal" data-dismiss="modal">Login Here</a></p>
        </div>
      </div>
    </div>
  </div>
  <!--/Register-Form -->

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
