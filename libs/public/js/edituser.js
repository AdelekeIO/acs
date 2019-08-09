$(function() {
	$(".btnRegister").click(function (e) {
		// body...
		// alert("click btnRegister");
		$('.errmsg').html('').css('display', 'none');
	
		e.preventDefault();
		// body...
		var firstName = $(".firstName").val();
		var lastName = $(".lastName").val();
		var inputEmail = $(".inputEmail").val();
		var password = $(".userType").val();
		var password = $(".inputPassword").val();
		var password = $(".confirmPassword").val();
		// console.log(email);
        var firstName = (allProcesses('firstName'));
        if (firstName === "" || firstName === undefined) {
            showErrorMessage('First Name');
            $(".firstName").focus();
            return;
        }
        var lastName = (allProcesses('lastName'));
        if (lastName === "" || lastName === undefined) {
            showErrorMessage('Last Name');
            $(".lastName").focus();
            return;
        }
        var inputEmail = (allProcesses('inputEmail'));
        if (inputEmail === "" || inputEmail === undefined) {
            showErrorMessage('Email');
            $(".inputEmail").focus();
            return;
        }
        var userType = (allProcesses('userType'));
        if (userType === "" || userType === undefined) {
            showErrorMessage('User type');
            $(".userType").focus();
            return;
        }
         if(userType.trim()==="User type"){
        	 $('.errmsg').html('Kindly select a valid user type.').css('display', 'block').removeClass("alert-success").addClass("alert-danger");
        	 $(".userType").focus();
        	 return;	
        }
        var inputPassword = (allProcesses('inputPassword'));
        if (inputPassword === "" || inputPassword === undefined) {
            showErrorMessage('password');
            $(".inputPassword").focus();
            return;
        }
        var confirmPassword = (allProcesses('confirmPassword'));
        if (confirmPassword === "" || confirmPassword === undefined) {
            showErrorMessage('Confirm Password');
            $(".confirmPassword").focus();
            return;
        }

        if (confirmPassword!==inputPassword) {
        	 // showErrorMessage('Confirm Password');
        	  $('.errmsg').html('Password && Confirm Password not Matched').css('display', 'block').removeClass("alert-success").addClass("alert-danger");
        // $(document).find('input[name=' + name + ']').focus();
            $(".confirmPassword").focus();
            return;
        }
        var loginDat = {
            id: trackID,
        	first_name: firstName,
        	last_name: lastName,
        	user_type: userType,
            user_email: inputEmail,
            user_password: inputPassword,
            editRegister:1
        };

        console.log(loginDat);
        // return;
        if ((loginDat.user_email !== "" && loginDat.user_email !== undefined) && (loginDat.user_password !== "" && loginDat.user_password !== undefined)) {
            
           var point="http://127.0.0.1:3000/depen/reqHandler.php";
            var promise = costomPost(point, loginDat);
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
        }
    });

    $(function(){
        // alert(trackID);
        var reqData={
            tid: trackID,
              getSingleUserDetails:1
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
        var first_name = dara.first_name;
        var last_name = dara.last_name;
        var user_email = dara.user_email;
        var user_type = dara.user_type;
        var user_password = dara.user_password;
        var c_user_password = dara.user_password;
        // console.log(user_type);
      $('.firstName').val(first_name);
      $('.lastName').val(last_name);
      $('.inputEmail').val(user_email);
      $('.userType').val(user_type).change();
      $('.inputPassword').val(user_password);
      $('.confirmPassword').val(c_user_password);
        
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