$(function() {
	$(".creategroup").click(function (e) {
		// body...
		// alert("click btnRegister");
		$('.errmsg').html('').css('display', 'none');
	
		e.preventDefault();
		    var deviceName = (allProcesses('deviceName'));
        if (deviceName === "" || deviceName === undefined) {
            showErrorMessage('device name');
            $(".deviceName").focus();
            return;
        }
           var deviceURL = (allProcesses('deviceURL'));
        if (deviceURL === "" || deviceURL === undefined) {
            showErrorMessage('device URL');
            $(".deviceURL").focus();
            return;
        } else if(isUrlValid(deviceURL)==false){
            $(".errmsg").addClass("alert-danger").removeClass("alert-success").html("Kindly Enter a valid Url (https://example.com)").css("display","block");
            $(".deviceURL").focus();
            return;
        }

           var deviceOnURL = (allProcesses('deviceOnURL'));
        if (deviceOnURL === "" || deviceOnURL === undefined) {
            showErrorMessage('device On URL');
            $(".deviceOnURL").focus();
            return;
        } else if(isUrlValid(deviceURL)==false){
            $(".errmsg").addClass("alert-danger").removeClass("alert-success").html("Kindly Enter a valid Url (https://example.com)");
            $(".deviceURL").focus();
            return;
        }

           var deviceOffURL = (allProcesses('deviceOffURL'));
        if (deviceOffURL === "" || deviceURL === undefined) {
            showErrorMessage('device Off URL');
            $(".deviceOffURL").focus();
            return;
        } else if(isUrlValid(deviceURL) ==false){
            $(".errmsg").addClass("alert-danger").removeClass("alert-success").html("Kindly Enter a valid Url (https://example.com)");
            $(".deviceURL").focus();
            return;
        }

        var deviceCategory = (allProcesses('deviceCategory'));
        if (deviceCategory === "" || deviceCategory === undefined) {
            showErrorMessage('device category');
            $(".deviceCategory").focus();
            return;
        }
         if(deviceCategory.trim()==="Device Categoroy"){
        	 $('.errmsg').html('Kindly select a valid user type.').css('display', 'block').removeClass("alert-success").addClass("alert-danger");
        	 $(".deviceCategory").focus();
        	 return;	
        }
              

            var deviceDetails = (allProcesses('deviceDetails'));
        if (deviceDetails === "" || deviceDetails === undefined) {
            showErrorMessage('device details');
            $(".deviceDetails").focus();
            return;
        }
function isUrlValid(url) {
    return /^(https?|s?ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i.test(url);
}
  		var createDeviceDet = {
        	tid: trackID,
        	deviceName: deviceName,
        	deviceCategory: deviceCategory,
        	deviceDetails: deviceDetails,
            deviceURL: deviceURL,
            deviceOnURL: deviceOnURL,
            deviceOffURL: deviceOffURL,
        	editDevice:1
        };
        console.log(createDeviceDet);
        // return;
            
           var point="http://127.0.0.1:3000/depen/reqHandler.php";
            var promise = costomPost(point, createDeviceDet);
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
              editDeviceDetails:1
          }
           var point="http://127.0.0.1:3000/depen/reqHandler.php";
                      var promise = costomPost(point, reqData);
                      promise.done(function (res) {
                          console.log(res);

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
        var device_name = dara.device_name;
        var device_url = dara.device_url;
        var device_details = dara.device_details;
        var categories = dara.categories;
        var power_on_url = dara.power_on_url;
        var power_off_url = dara.power_off_url;
        // console.log(role);dateAdded
      $('.deviceName').val(device_name);
      $('.deviceURL').val(device_url);
      $('.deviceDetails').val(device_details);
      $('.deviceCategory').val(categories);
      $('.deviceOnURL').val(power_on_url);
      $('.deviceOffURL').val(power_off_url);
        
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