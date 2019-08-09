<div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Register an Account</div>
        <div class="card-body">
          <div class="alert errmsg" style="display: none;"></div>
          <form>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="text" id="firstName" class="form-control firstName" placeholder="First name" required="required" autofocus="autofocus" autocomplete >
                    <label for="firstName">First name</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="text" id="lastName" class="form-control lastName" placeholder="Last name" required="required" autocomplete>
                    <label for="lastName">Last name</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="email" id="inputEmail" class="form-control inputEmail" placeholder="Email address" required="required" autocomplete>
                <label for="inputEmail">Email address</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <!-- <label for="inputUserType">User Type</label> -->
                <select class="form-control userType"  placeholder="User Type">
                	<option>User type</option>
                	<option>Admin</option>
                	<option>User</option>
                </select>
                
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="password" id="inputPassword" class="form-control inputPassword" placeholder="Password" required="required" autocomplete >
                    <label for="inputPassword">Password</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">                    <label for="confirmPassword">Confirm password</label>
                  </div>
                </div>
              </div>
            </div>
            <input type="button" name="btnRegister" class="btnRegister btn btn-primary btn-block" value="Register">
            <!-- <a class="btn btn-primary btn-block" href="login.html">Register</a> -->
          </form>
          <div class="text-center">
            <!-- <a class="d-block small mt-3" href="login.html">Login Page</a> -->
            <!-- <a class="d-block small" href="forgot-password.html">Forgot Password?</a> -->
          </div>
        </div>
      </div>
    </div>
    <script src="<?php echo(URL); ?>libs/public/js/def.js"></script>