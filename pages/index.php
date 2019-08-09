
<!-- <img src="" alt="" sizes="" srcset=""> -->
<div class="container">
<div style="margin-left: auto; margin-right: auto; text-align: center; width: 20%;" class="row">
<div><img style="max-width: 100%;height: auto;display: block;border-radius: 8px;
" class="thumbnail rounded-circle img-responsive" src="<?php echo URL; ?>\libs\public\imgs\favicon.png" alt="logo" srcset=""></div>

  
  
</div>
      <div class="card card-login mx-auto mt-1">
        <div class="card-header">Login</div>
        <div class="card-body">
          <div class="alert errmsg" style="display: none;"></div>
          <form>
            <div class="form-group">
              <div class="form-label-group">
                <input type="email" id="inputEmail" class="form-control inputEmail" placeholder="Email address" required="required" autofocus="autofocus">
                <label for="inputEmail">Email address</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control inputPassword" placeholder="Password" required="required">
                <label for="inputPassword">Password</label>
              </div>
            </div>
            <div class="form-group">
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="remember-me">
                  Remember Password
                </label>
              </div>
            </div>
            <input type="button" name="btnLogin" class="btn btn-primary btn-block btnLogin" value="Login">
            <!-- <a class="btn btn-primary btn-block btnLogin" href="<?php echo URL; ?>dashboard/">Login</a> -->
          </form>
          <!-- <div class="text-center">
            <a class="d-block small mt-3" href="register.html">Register an Account</a>
            <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
          </div> -->
        </div>
      </div>
    </div>
