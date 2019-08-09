<div class="container-fluid">
      
	     <div class="container">

            <div class="panel with-nav-tabs panel-primary">
                <div class="panel-heading mx-auto" style="padding:5px">
                        <ul class="nav nav-tabs">
                            <li class="active px-2"><a href="#tab1primary" data-toggle="tab">User - Group</a>|</li>
                            <li class="px-2"><a href="#tab2primary" data-toggle="tab">Device - User</a>|</li>
                            <li class="px-2"><a href="#tab3primary" data-toggle="tab">Device - Group</a>|</li>
                        </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                      <!-- bgisgbf tab 1 -->
                        <div class="tab-pane fade in active" id="tab1primary">
                          <div class="Messages alert" style="display: none;"></div>
                          <div class="row">
                            <div style="width: 50%">
                              <div class="col-md-12">
                                 <div class="card mb-3">
                                  <div class="card-header">
                                      <i class="fas fa-anchor"></i>
                                      USERS LIST</div>
                                  <div class="card-body">
                                  <div class="list-group userlist">
                                    
                                    <!-- <button type="button" class="list-group-item list-group-item-action">Dapibus ac facilisis in</button>
                                    <button type="button" class="list-group-item list-group-item-action">Morbi leo risus</button>
                                    <button type="button" class="list-group-item list-group-item-action">Porta ac consectetur ac</button>
                                    <button type="button" class="list-group-item list-group-item-action" disabled>Vestibulum at eros</button> -->
                                  </div>
                              </div>
                            </div>
                            </div>                       
                            </div>
                            <div style="width: 50%">
                              <div class="col-md-12">
                                 <div class="card mb-3">
                                  <div class="card-header">
                                      <i class="fas fa-anchor"></i>
                                      GROUP LIST</div>
                                  <div class="card-body">
                                  <div class="table-responsive">
                                  <div class="list-group grouplist">
                                    
                                    <!-- <button type="button" class="list-group-item list-group-item-action">Dapibus ac facilisis in</button>
                                    <button type="button" class="list-group-item list-group-item-action">Morbi leo risus</button>
                                    <button type="button" class="list-group-item list-group-item-action">Porta ac consectetur ac</button>
                                    <button type="button" class="list-group-item list-group-item-action" disabled>Vestibulum at eros</button> -->
                                  </div>
                              </div>
                            </div>
                            </div>                         
                            </div>
                            </div>
                          </div>
                              

                        </div>

<!-- tab 2 -->
                        <div class="tab-pane fade" id="tab2primary">
                          <div class="Messagesd2u alert" style="display: none;"></div>

                        Device - User
                        <div class="container">
                          <div>
                              <form>
                                <div class="form-group">
                                  <select class="form-control d2udevicelist">
                                    <option>Select a device</option>
                                  </select>
                                </div>
                                 <div class="d2uuserlist2container" style="display: none;">
                                  <div class="form-group">
                                  <select class="form-control d2uuserlist2">
                                    <option>Select a user</option>
                                  </select>
                                  </div>
                                
                                <div class="form-group">
                                <input type="button"  class="btn btn-primary form-control assignd2u" value="Assign" name="">
                                </div>
                                </div>
                              </form>
                              <div>
                                <div class="col-md-12">
                                 <div class="card mb-3">
                                  <div class="card-header">
                                      <i class="fas fa-anchor"></i>
                                      USER LIST</div>
                                  <div class="card-body">
                                  <div class="table-responsive">
                                  <div class="list-group d2uuserlist">
                                    
                                  </div>
                              </div>
                            </div>
                            </div>                         
                            </div>
                              </div>
                          </div>
                        </div>
                        </div>

                        <!-- tab 3 -->
                        <div class="tab-pane fade" id="tab3primary">
                          <div class="Messages3 alert" style="display: none;"></div>

                             <div class="Messagesd2g alert" style="display: none;"></div>

                         Device To Group
                        <div class="container">
                          <div>
                              <form>
                                <div class="form-group">
                                  <select class="form-control d2gdevicelist">
                                    <option>Select a device</option>
                                  </select>
                                </div>
                                 <div class="d2guserlist2container" style="display: none;">
                                  <div class="form-group">
                                  <select class="form-control d2ggrouplist2">
                                    <option>Select a Device</option>
                                  </select>
                                  </div>
                                
                                <div class="form-group">
                                <input type="button"  class="btn btn-primary form-control assignd2g" value="Assign" name="">
                                </div>
                                </div>
                              </form>
                              <div>
                                <div class="col-md-12">
                                 <div class="card mb-3">
                                  <div class="card-header">
                                      <i class="fas fa-anchor"></i>
                                      GROUP LIST</div>
                                  <div class="card-body">
                                  <div class="table-responsive">
                                  <div class="list-group d2ggrouplist">
                                    
                                  </div>
                              </div>
                            </div>
                            </div>                         
                            </div>
                              </div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
</div>

<div class="modal fade " id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediumModalLabel">Assign User to Group</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="errmsger" style="display: none;"></div>
                            <div class="userInfo" style="padding: 5px;margin-left: 5px;"><h3 class="fullname"></h3></div>
                            <div class="modal-body">
                                <form>
                                  <div class="form-group">
                                    <select class="form-control options">
                                      <option>Select Group</option>
                              
                                    </select>
                                  </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-primary confirmAss1" data-dismiss="modal">Confirm</button>
                            </div>
                        </div>
                    </div>
                </div>
                <script src="<?php echo(URL); ?>libs/public/js/assign.js"></script>
                  <!-- <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-anchor"></i>
              Assign Devices</div>
            <div class="card-body">
              <div class="table-responsive">
                <div class="list-group">
  <button type="button" class="list-group-item list-group-item-action active">
    Cras justo odio
  </button>
  <button type="button" class="list-group-item list-group-item-action">Dapibus ac facilisis in</button>
  <button type="button" class="list-group-item list-group-item-action">Morbi leo risus</button>
  <button type="button" class="list-group-item list-group-item-action">Porta ac consectetur ac</button>
  <button type="button" class="list-group-item list-group-item-action" disabled>Vestibulum at eros</button>
</div>
              </div>
            </div>
          </div> -->