$(function() {
    // alert("Editing group");
	$(".creategroup").click(function (e) {
		// body...
		// alert("click btnRegister");
		$('.errmsg').html('').css('display', 'none');
	
		e.preventDefault();
		    var groupName = (allProcesses('groupName'));
        if (groupName === "" || groupName === undefined) {
            showErrorMessage('group name');
            $(".groupName").focus();
            return;
        }
        var groupCategory = (allProcesses('groupCategory'));
        if (groupCategory === "" || groupCategory === undefined) {
            showErrorMessage('group category');
            $(".groupCategory").focus();
            return;
        }
         if(groupCategory.trim()==="Group Categoroy"){
        	 $('.errmsg').html('Kindly select a valid user type.').css('display', 'block').removeClass("alert-success").addClass("alert-danger");
        	 $(".groupCategory").focus();
        	 return;	
        }
              

            var groupDetails = (allProcesses('groupDetails'));
        if (groupDetails === "" || groupDetails === undefined) {
            showErrorMessage('group details');
            $(".groupDetails").focus();
            return;
        }

  		var createGroupDet = {
            id: trackID,
        	groupName: groupName,
        	groupCategory: groupCategory,
        	groupDetails: groupDetails,
        	editGroupDetails:1
        };
        // console.log(createGroupDet);
        // return;
            
           var point="http://127.0.0.1:3000/depen/reqHandler.php";
            var promise = costomPost(point, createGroupDet);
            promise.done(function (res) {
                // console.log(res);
                // return;
                var json = JSON.parse(res);
                if (json.status === true) {
                    showSuccessMessage(json.message);
                    // window.location.reload();
                } else if (json.status === false) {
                    showErrMessage(json.message);
                }
            }).fail(function (err) {
//                console.log(err);
            });
        
    });

    
    $(function(){
        // alert(trackID);
        var reqData={
            tid: trackID,
              getSingleGroupDetails:1
          }
           var point="http://127.0.0.1:3000/depen/reqHandler.php";
                      var promise = costomPost(point, reqData);
                      promise.done(function (res) {
                        //   console.log(res);
                        // return;
                          var json = JSON.parse(res);
                          if (json.status === true) {
                            //   showSuccessMessage(json.message);
                              // window.location.reload();
                              loadDataTable(json.data);
                          } else if (json.status === false) {
                              showErrMessage(json.message);
                          }
                      }).fail(function (err) {
          });
     
      function  loadDataTable(dara) {
          // body...
          // alert("loading");
          // console.log(dara);
        var dara=dara[0];
        var id = dara.id;
        var group_name = dara.group_name;
        var group_category = dara.group_category;
        var group_details = dara.group_details;
        // console.log(user_type);
      $('.groupName').val(group_name);
      $('.groupCategory').val(group_category);
      $('.groupDetails').val(group_details).change();
        
      }
    });

    function costomPost(endpoint, fd) {
    return $.ajax({
        url: endpoint,
        data: fd,
        type: 'post'
    });
}
	});