<script type="text/javascript">
  var trackID = <?php echo($data);?>;
  // alert(trackID);  
</script>

<div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Edit Devices</div>
        <div class="card-body">
          <div class="alert errmsg" style="display: none;"></div>
          <form>
            <div class="form-group">
              <div class="form-label-group">
                <input type="deviceName" id="deviceName" class="form-control deviceName" placeholder="Device Name" required="required" autocomplete>
                <label for="deviceName">Device Name</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="url" id="deviceURL" class="form-control deviceURL" placeholder="Device URL(https://example.com)" autocomplete pattern="https?://.+" required="required">
                <label for="deviceURL">Device URL (https://example.com)</label>
              </div>
            </div>

          <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="url" name="deviceOnURL" id="deviceOnURL" placeholder="device Power on ur (https://example.com)l" class="deviceOnURL form-control" pattern="https?://.+" required="required">
                    <label for="deviceOnURL">Device on Url (https://example.com)</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="url" name="deviceOffURL" id="deviceOffURL" placeholder="device Power off url(https://example.com)" class="deviceOffURL form-control" pattern="https?://.+" required="required">
                    <label for="deviceOffURL">Device off Url (https://example.com)</label>
                  </div>
                </div>
              </div>
            </div>


            <div class="form-group">
              <div class="form-label-group">
                <!-- <label for="inputUserType">User Type</label> -->
                <select class="form-control deviceCategory"  placeholder="Device Category">
                	<option>Device Categoroy</option>
                  <option>Clubhouse</option>
                  <option>Gate </option>
                  <option>Garage</option>
                  <option>Pool</option>
                </select>
                
              </div>
            </div>
             <div class = "form-group">
            <!-- <label for = "name"></label> -->
            <textarea class = "form-control deviceDetails" rows = "3" placeholder = "Device Details"></textarea>
         </div>

            <input type="button" name="creategroup" class="creategroup btn btn-primary btn-block" value="UPDATE">
            <!-- <a class="btn btn-primary btn-block" href="login.html">Register</a> -->
          </form>
          <div class="text-center">
            <!-- <a class="d-block small mt-3" href="login.html">Login Page</a> -->
            <!-- <a class="d-block small" href="forgot-password.html">Forgot Password?</a> -->
          </div>
        </div>
      </div>
    </div>
     <script src="<?php echo(URL); ?>libs/public/js/edit.js"></script>