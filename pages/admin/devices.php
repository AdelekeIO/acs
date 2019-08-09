          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Data Table Example</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Device name</th>
                      <th>Device URL</th>
                      <th>Device Category</th>
                      <th>Device details</th>
                      <th>Date created</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Device name</th>
                      <th>Device URL</th>
                      <th>Device Category</th>
                      <th>Device details</th>
                      <th>Date created</th>
                      <th>Actions</th>
                    </tr>
                  </tfoot>
                  <tbody class="viewDevicesBody">
                    <tr style="display: none;">
                      <td>Tiger Nixon</td>
                      <td>System Architect</td>
                      <td>Edinburgh</td>
                      <td>61</td>
                    </tr>
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
           <!--  <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediumModalLabel">Assign Device to Group and user</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form>
                                  <div class="form-group">
                                    <select class="form-control">
                                      <option>Select</option>
                                      <option>Group</option>
                                      <option>Users</option>
                                    </select>
                                  </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-primary">Confirm</button>
                            </div>
                        </div>
                    </div>
                </div> -->

             <script src="<?php echo(URL); ?>libs/public/js/devices.js"></script> 