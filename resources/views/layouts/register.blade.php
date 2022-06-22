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
                    <input type="text" class="form-control" name="first_name" placeholder="First Name" :value="old('first_name')" required>
                  </div>

                  <!-- LastName -->
                  <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control" name="last_name" placeholder="Last Name" :value="old('last_name')" required >
                  </div>

                  <!-- Email -->
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Email Address" :value="old('email')" required>
                  </div>

                  <!-- Username -->
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Username" :value="old('username')" required>
                  </div>

                  <!-- Mobile Number -->
                  <div class="form-group">
                        <label for="mobile_num">Phone number</label>
                        <input type="tel" class="form-control" name="mobile_num" placeholder="Ex. 09051151125" :value="old('mobile_num')">
                  </div>

                  <!--city-->
                  <div class="form-group">
                    <label for="city">City</label>
                    <select name="city" id="city" class="form-control">
                        <option value="">Please select a city</option>
                    </select>


                  <!--Baranggay-->

                    <label for="barangay">Barangay</label>
                    <select name="barangay" id="barangay" class="form-control">

                    </select>
                  </div>

                  <!-- Purok -->
                  <div class="form-group mt-2 d-inline-block">
                    <label for="purok">Specific Address</label>
                    <input type="text" class="form-control" name="purok" placeholder="Example: Purok 17 Hagkol" :value="old('purok')">
                  </div>

                  <!-- Password -->
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password" required autocomplete="password" :value="old('password')">
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
