<div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Create Group</div>
        <div class="card-body">
          <div class="alert errmsg" style="display: none;"></div>
          <form>
            <div class="form-group">
              <div class="form-label-group">
                <input type="groupName" id="groupName" class="form-control groupName" placeholder="Group Name" required="required" autocomplete>
                <label for="groupName">Group Name</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <!-- <label for="inputUserType">User Type</label> -->
                <select class="form-control groupCategory"  placeholder="User Type">
                	<option>Group Categoroy</option>
                  <option>Super Admin</option>
                  <option>Admin</option>
                  <option>Tenant</option>
                  <option>Maintenance</option>
                	<option>Admin</option>
                	<option>Vendor</option>
                </select>
                
              </div>
            </div>
             <div class = "form-group">
            <!-- <label for = "name"></label> -->
            <textarea class = "form-control groupDetails" rows = "3" placeholder = "Group Details"></textarea>
         </div>

            <input type="button" name="creategroup" class="creategroup btn btn-primary btn-block" value="Create group">
            <!-- <a class="btn btn-primary btn-block" href="login.html">Register</a> -->
          </form>
          <div class="text-center">
            <!-- <a class="d-block small mt-3" href="login.html">Login Page</a> -->
            <!-- <a class="d-block small" href="forgot-password.html">Forgot Password?</a> -->
          </div>
        </div>
      </div>
    </div>
     <script src="<?php echo(URL); ?>libs/public/js/creategroup.js"></script>