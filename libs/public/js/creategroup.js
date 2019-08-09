$(function() {
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
        	groupName: groupName,
        	groupCategory: groupCategory,
        	groupDetails: groupDetails,
        	createGroup:1
        };
        console.log(createGroupDet);
        // return;
            
           var point="http://127.0.0.1:3000/depen/reqHandler.php";
            var promise = costomPost(point, createGroupDet);
            promise.done(function (res) {
                console.log(res);
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

    function costomPost(endpoint, fd) {
    return $.ajax({
        url: endpoint,
        data: fd,
        type: 'post'
    });
}
	});