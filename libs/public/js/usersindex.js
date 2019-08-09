$(function() {
    // alert("Admin Index");
    var reqData={
        getUsersDashBoardDetails:1
    }
     var point="http://cssmdu.com/depen/reqHandler.php";
                var promise = costomGet(point, reqData);
                promise.done(function (res) {
                    // console.log(res);
                    // return;
                    var json = JSON.parse(res);
                    if (json.status === true) {
                        // showSuccessMessage(json.message);
                        // window.location.reload();
                        loadDataTable(json.data);
                    } else if (json.status === false) {
                        showErrMessage(json.message);
                    }
                }).fail(function (err) {
    });
    
    $(document).on('click','.deleteBtn', function() {
        // body.
       var res = confirm("Are you sure you want to delete this device?");
       // alert(res);
       if (res) {
                var id = $(this).attr("id");
                console.log(id);
                var reqData={
              deleteUserReq:1,
              dID:id
            }
            var point="http://cssmdu.com/depen/reqHandler.php";
             // console.log(reqData);
                        var promise = costomPost(point, reqData);
                        promise.done(function (res) {
                            // console.log (res);
    
                            var json = JSON.parse(res);
                            if (json.status === true) {
                                showSuccessMessage(json.message);
                                window.location.reload();
                                alert(json.message);
                                // loadDataTable(json.data);
                            } else if (json.status === false) {
                                showErrMessage(json.message);
                            }
                        }).fail(function (err) {
              });
      }
    })
    
    
    });
    function  loadDataTable(dara) {
        // body...
        // alert("loading");11 
        // console.log(dara);
        var groupCount = `You are in ${dara[1][0]} Groups!`;
        var devicesCount = `${dara[0][0]} Devices assigned to you!`;
        $(".groupCount").text(groupCount);
        $(".devicesCount").text(devicesCount);
    
    }
    

    function costomPost(endpoint, fd) {
        return $.ajax({
            url: endpoint,
            data: fd,
            type: 'post'
        });
     }
        function costomGet(endpoint, fd) {
        return $.ajax({
            url: endpoint,
            data: fd,
            type: 'get'
        });
    }

    // ########################################################################
    var reqData={
        geUserstDevicesReq:1
      }
      var point="http://cssmdu.com/depen/reqHandler.php";
       // console.log(reqData);
                  var promise = costomGet(point, reqData);
                  promise.done(function (res) {
                    //   console.log(res);
                    //   return;
                      var json = JSON.parse(res);
                      // console.log(json);
                      // alert("Responded");
                      if (json.status === true) {
                        //   showSuccessMessage(json.message);
                          // window.location.reload();
                          loadDataTable1(json.data);
                      } else if (json.status === false) {
                          showErrMessage(json.message);
                      }
                  }).fail(function (err) {
        });
            
   
      function  loadDataTable1(dara) {
          // body...
          $.each(dara, function (key, val) {
              console.log(val);
              var id = val.id;
                      var device_name = val.device_name;
                      var categories = val.categories;
                      var device_url = val.device_url;
                      var device_details = val.device_details;
                      var dateAdded = val.dateAdded;
                  var loaded_data = `
                                        <div class="card col-sm-3">
                        <img class="card-img-top" height="165px" src="${getImg(device_name)}" alt="Bologna">
                        <div class="card-body">
                            <h4 class="card-title">${device_name}</h4>
                            <h6 class="card-subtitle mb-2 text-muted">${device_name} Device</h6>
                            <p class="card-text">${device_details}</p>
                            <button type="submit" class="btn btn-success">ON</button>
                            <button type="submit" class="btn btn-danger">OFF</button>
                            <!-- <a href="#" class="card-link">Read More</a>
                            <a href="#" class="card-link">Book a Trip</a> -->
                        </div>
                        </div>
                        </div>
                    `;
                          
                      $('.acsindecconnect').append(loaded_data);                
      
      })
      
      }
      function getImg(device_name){
          if(device_name==="gate"){
                return "https://www.precisiongaragedoorsandgates.com/sites/www.precisiongaragedoorsandgates.com/images/CSL24UL.png";
          }else{
              return "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRHgj9T9tn0ARy4vU_OsaffpdC_pTAESDpX7GGxxxi1-Xe1PY8j";
          }
          
      }