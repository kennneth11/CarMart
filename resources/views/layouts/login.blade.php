
<!--Login-Form -->
<div class="modal fade" id="loginform">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h3 class="modal-title">Login</h3>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="login_wrap">
              <div class="col-md-6 col-sm-6">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                  <div class="form-group">
                    <input type="text" name="email" class="form-control" placeholder="Username or Email address*" :value="old('email')" required autofocus>
                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password*" :value="old('password')" required >
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group checkbox">
                    <input type="checkbox" id="remember">
                    <label for="remember">Remember Me</label>
                  </div>
                  <div class="form-group">
                    <input type="submit" value="Login" class="btn btn-block">
                  </div>
                </form>
              </div>
              <div class="col-md-6 col-sm-6">
                <img src="{{ asset('assets/images/CarMartLogo.png')}}" style="width:100%;" alt="">
              </div>
              <div class="mid_divider"></div>
            </div>
          </div>
        </div>
        <div class="modal-footer text-center">
          <p>Don't have an account? <a href="#signupform" data-toggle="modal" data-dismiss="modal">Signup Here</a></p>
          <p><a href="#forgotpassword" data-toggle="modal" data-dismiss="modal">Forgot Password ?</a></p>
        </div>
      </div>
    </div>
  </div>
  <!--/Login-Form -->
