$(function() {
$('.errmsger').css('display', 'none');
// alert();

var reqData={
  getUsersInGroup:1
}
 var point="http://127.0.0.1:3000/depen/reqHandler.php";
            var promise = costomGet(point, reqData);
            promise.done(function (res) {
                // console.log(res);
                // return;
                // user2groupBody
                var json = JSON.parse(res);
                if (json.status === true) {
                  loaduUser2groupBody(json.data);
                } else if (json.status === false) {
                    showErrMessage(json.message);
                }
            }).fail(function (err) {
});



function  loaduUser2groupBody(dara) {
  // body...
  // alert("loading");
  // console.log(dara);
  $.each(dara, function (key, val) {
      // console.log(val);date_added
        var id = val.id;
        var full_name = val.member_full_name;
        var group_name = val.group_name;
        var date_added = val.date_added;
        var loaded_data = `
        <tr id="def_${id}">
        <td>${full_name}</td>
        <td>${group_name}</td>
        <td>${date_added}</td>
        <td>
        <input type="button" name="" id="id_${id}" value="Remove" class="deleteBtnU2G btn btn-danger">
        </td>
      </tr>
           `;
        
      $('.user2groupBody').append(loaded_data);           
})

}



// second pane
var reqData={
  device2UserBody:1
}
 var point="http://127.0.0.1:3000/depen/reqHandler.php";
            var promise = costomGet(point, reqData);
            promise.done(function (res) {
                // console.log(res);
                // return;
                // user2groupBody
                var json = JSON.parse(res);
                if (json.status === true) {
                  loaduDevice2UserBody(json.data);
                } else if (json.status === false) {
                    showErrMessage(json.message);
                }
            }).fail(function (err) {
});



function  loaduDevice2UserBody(dara) {
  // body...
  // alert("loading");
  // console.log(dara);
  $.each(dara, function (key, val) {
      // console.log(val);date_added
        var id = val.id;
        var full_name = val.user_fullname;
        var device_name = val.device_name;
        var date_added = val.date_added;
        var loaded_data = `
        <tr id="def_${id}">
        <td>${full_name}</td>
        <td>${device_name}</td>
        <td>${date_added}</td>
        <td>
        <input type="button" name="" id="id_${id}" value="Remove" class="deleteBtnD2U btn btn-danger">
        </td>
      </tr>
           `;
        
      $('.device2UserBody').append(loaded_data);           
})

}

// Third pane
var reqData={
  getd2ggrouplistBody:1
}
 var point="http://127.0.0.1:3000/depen/reqHandler.php";
            var promise = costomGet(point, reqData);
            promise.done(function (res) {
                // console.log(res);
                // return;
                var json = JSON.parse(res);
                if (json.status === true) {
                  loaduDevice2groupBody(json.data);
                } else if (json.status === false) {
                    showErrMessage(json.message);
                }
            }).fail(function (err) {
});



function  loaduDevice2groupBody(dara) {
  // body...
  // alert("loading");
  // console.log(dara);
  $.each(dara, function (key, val) {
      // console.log(val);date_added
        var id = val.id;
        var device_name = val.device_name;
        var group_name = val.group_name;
        var date_added = val.date_added;
        var loaded_data = `
        <tr>
        <td>${device_name}</td>
        <td>${group_name}</td>
        <td>${date_added}</td>
        <td>
        <input type="button" name="" id="id_${id}" value="Remove" class="deleteBtnD2G btn btn-danger">
        </td>
      </tr>
           `;
        
      $('.d2ggrouplistBody').append(loaded_data);           
})

}

// DeleteBTN
$(document).on('click','.deleteBtnD2G', function() {
  // body.deleteBtnD2U
 var res = confirm("Are you sure you want to delete this device?");
 // alert(res);
 if (res) {
          var id = $(this).attr("id");
          console.log(id);
          var reqData={
           deleteD2GReq:1,
            dID:id
      }
      var point="http://127.0.0.1:3000/depen/reqHandler.php";
       // console.log(reqData);
                  var promise = costomPost(point, reqData);
                  promise.done(function (res) {
                      // console.log(res);
                      // return;
                      var json = JSON.parse(res);
                      if (json.status === true) {
                          showSuccessMessage(json.message);
                          // alert(json.message);
                          window.location.reload();
                      } else if (json.status === false) {
                          showErrMessage(json.message);
                      }
                  }).fail(function (err) {
        });
}
});

// DeleteBTN - deleteBtnD2U
$(document).on('click','.deleteBtnD2U', function() {
  // body.deleteBtnD2U
 var res = confirm("Are you sure you want to delete this assignment?");
 // alert(res);
 if (res) {
          var id = $(this).attr("id");
          console.log(id);
          var reqData={
           deleteD2UReq:1,
            dID:id
      }
      var point="http://127.0.0.1:3000/depen/reqHandler.php";
       // console.log(reqData);
                  var promise = costomPost(point, reqData);
                  promise.done(function (res) {
                      // console.log(res);
                      // return;
                      var json = JSON.parse(res);
                      if (json.status === true) {
                          showSuccessMessage(json.message);
                          // alert(json.message);
                          window.location.reload();
                      } else if (json.status === false) {
                          showErrMessage(json.message);
                      }
                  }).fail(function (err) {
        });
}
})

// DeleteBTN - deleteBtnU2G
$(document).on('click','.deleteBtnU2G', function() {
  // body.deleteBtnU2G
 var res = confirm("Are you sure you want to delete this assignment?");
 // alert(res);
 if (res) {
          var id = $(this).attr("id");
          console.log(id);
          var reqData={
           deleteU2GReq:1,
            dID:id
      }
      var point="http://127.0.0.1:3000/depen/reqHandler.php";
       // console.log(reqData);
                  var promise = costomPost(point, reqData);
                  promise.done(function (res) {
                      // console.log(res);
                      // return;
                      var json = JSON.parse(res);
                      if (json.status === true) {
                          showSuccessMessage(json.message);
                          // alert(json.message);
                          window.location.reload();
                      } else if (json.status === false) {
                          showErrMessage(json.message);
                      }
                  }).fail(function (err) {
        });
}
})



// demaction
var reqData={
	getALLGroups:1
}
 var point="http://127.0.0.1:3000/depen/reqHandler.php";
            var promise = costomGet(point, reqData);
            promise.done(function (res) {
                // console.log(res);
                // return;
                var json = JSON.parse(res);
                if (json.status === true) {
                    showSuccessMessage(json.message);
                    // window.location.reload();
                    loadModal(json.data);
                } else if (json.status === false) {
                    showErrMessage(json.message);
                }
            }).fail(function (err) {
});
      

$(document).on('click','.assignBtn', function(e) {
    // body...
    var id = $(this).attr("id");
    console.log(id);
    // console.log($(this));
    alert("Assigning");
    
});

$(document).on('click','.editBtn', function() {
    // body...
    var id = $(this).attr("id");
    console.log(id);
    alert("Editing");
})

$(document).on('click','.deleteBtn', function() {
    // body.
    var id = $(this).attr("id");
    console.log(id);
    alert("Deleting");
})



});

// Load the modal with groups
function  loadModal(dara) {
	// body...
	// alert("loading");
	// console.log(dara);
	$.each(dara, function (key, val) {
				var id = val.id;
                var group_name = val.group_name;
                var group_category = val.group_category;
			         var loaded_data = `
					         <option value="id_${id}" >${group_name} - ${group_category}</option>
                    `;
              var load_list=`
              <button type="button"  class="list-group-item list-group-item-action">
                    ${group_name} - ${group_category}
                </button>
              `;
              // console.log($('.grouplist'));d2ggrouplist2
      $('.grouplist').append(load_list);          
      $('.d2ggrouplist2').append(loaded_data);          
      $('.options').append(loaded_data);          
})

}

var reqData={
  getUsersList:1
}
 var point="http://127.0.0.1:3000/depen/reqHandler.php";
            var promise = costomGet(point, reqData);
            promise.done(function (res) {
                // console.log(res);
                // return;
                var json = JSON.parse(res);
                if (json.status === true) {
                    loadUsers(json.data);
                } else if (json.status === false) {
                    showErrMessage(json.message);
                }
            }).fail(function (err) {
});



function  loadUsers(dara) {
  // body...
  // alert("loading");
  // console.log(dara);
  $.each(dara, function (key, val) {
      // console.log(val);
        var id = val.id;
        var full_name = val.first_name +" "+val.first_name;
        var user_type = val.user_type;
        var loaded_data = `
          <button type="button" name="" id="id_${id}" data-toggle="modal" data-target="#mediumModal" value="assign" class="userLister list-group-item list-group-item-action">
            ${full_name} - ${user_type}
          </button>
                    `;
        var loaded_d2u_data = `
          <button type="button" name="" id="id_${id}" value="assign" class="list-group-item list-group-item-action">
            ${full_name} - ${user_type}
          </button>
                    `;
        var loaded_d2u_data_opts = `
          <option id="id_${id}_${full_name} - ${user_type}" value="id_${id}_${full_name} - ${user_type}" class="">
            ${full_name} - ${user_type}
          </option>
                    `;
      $('.userlist').append(loaded_data);          
      $('.d2uuserlist').append(loaded_d2u_data);
      $('.d2uuserlist2').append(loaded_d2u_data_opts);           
})

}

// $(".userLister").click(function () {
  $(document).on('click',".userLister",function(e) {
  var id = $(this).attr("id");
  var name = $(".userInfo").attr("id",id+"_"+$(this).text().trim());

  $(".fullname").text($(this).text());
  // console.log($(".userInfo").attr("id"));
});

$(".confirmAss1").click(function(e) {
  // body...
  console.log($(".options").val());
  // console.log($(".options").text());
  var options = $(".options").val();
  var id = $(".userInfo").attr("id");
  var name = $(".fullname").text().trim();


  // console.log(options);
     
        if (options === "" || options === undefined) {
            showErrorMessage('group category');
            return;
        }
        
        if(options.trim()==="Select Group"){
           $('.errmsger').html('Kindly select a group.').css('display', 'block').removeClass("alert-success").addClass("alert-danger");
           alert("Group is not selected");
           $(".options").focus();
           return;  
        }
 
 // console.log(id+"_"+name.trim());
  var res = confirm('Are you sure?');
  if (res===true) {
    // alert(res);  


var reqData={
  user_id: id,
  user_name: name,
  group_id: options,
  assignUserToGroup:1
}
 var point="http://127.0.0.1:3000/depen/reqHandler.php";
            var promise = costomPost(point, reqData);
            promise.done(function (res) {
                // console.log(res);
                // return;
                var json = JSON.parse(res);
                if (json.status === true) {
                  // Messages
                  $('.Messages').html(json.message).css('display', 'block').removeClass("alert-danger").addClass("alert-success");
           
                    // showSuccessMessage(json.message);
                    // window.location.reload();
                    // loadModal(json.data);
                } else if (json.status === false) {
                  $('.Messages').html(json.message).css('display', 'block').removeClass("alert-success").addClass("alert-danger");
                    
                }
            }).fail(function (err) {
});
  }
  
})

// Device Request
var reqData={
  getDevicesReq:1
}
 var point="http://127.0.0.1:3000/depen/reqHandler.php";
            var promise = costomGet(point, reqData);
            promise.done(function (res) {
                // console.log(res);
                // return;
                var json = JSON.parse(res);
                if (json.status === true) {
                    // showSuccessMessage(json.message);
                    // window.location.reload();
                    loadSelect(json.data);
                } else if (json.status === false) {
                    showErrMessage(json.message);
                }
            }).fail(function (err) {
});

function loadSelect(dara) {
  // body...
  // console.log(dara);
  $.each(dara, function (key, val) {
        var id = val.id;
                var device_name = val.device_name;
                var categories = val.categories;
               var loaded_data = `
                   <option value="id_${id}_${device_name} - ${categories}" >${device_name} - ${categories}</option>
                    `;
              // var load_list=`
              // <button type="button"  class="list-group-item list-group-item-action">
              //       ${group_name} - ${group_category}
              //   </button>
              // `;
              // console.log($('.grouplist'));
      $('.d2udevicelist').append(loaded_data);  
      $('.d2gdevicelist').append(loaded_data);       
})

}

$(document).on("change",".d2udevicelist",function(e) {
  // body...
  $(".d2uuserlist2container").css("display","none");
  // console.log($(this).val());
  var selectedDevice = $(this).val();
  if (selectedDevice!=="Select a device" || selectedDevice!==undefined) {
    $(".d2uuserlist2container").css("display","block");
    $(".d2udevicelist").prop("disabled",'disabled');
  }
})

$(document).on("click",".assignd2u",function(e) {
  // body...
  var selectedDevice=$(".d2udevicelist").val();
  var selectedUser=$(".d2uuserlist2").val();
  // console.log(selectedDevice+" -> "+selectedUser);

  if(selectedDevice==="Select a device"){
    $('.Messagesd2u').html("Kindly select a device").css('display', 'block').removeClass("alert-success").addClass("alert-danger");
    $(".d2udevicelist").prop("disabled",false);
    return;
  }
  if (selectedUser=="Select a user") {
    $('.Messagesd2u').html("Kindly select a user").css('display', 'block').removeClass("alert-success").addClass("alert-danger");
    return;
  }

  var reqData={
    selectedDevice: selectedDevice,
    selectedUser: selectedUser,
    assignDeviceToUser:1
}
 var point="http://127.0.0.1:3000/depen/reqHandler.php";
            var promise = costomPost(point, reqData);
            promise.done(function (res) {
               
                // return;
                var json = JSON.parse(res);
                 console.log(json);
                if (json.status === true) {
                   $('.Messagesd2u').html(json.message).css('display', 'block').removeClass("alert-danger").addClass("alert-success");
                    // window.location.reload();
                } else if (json.status === false) {
                    $('.Messagesd2u').html(json.message).css('display', 'block').removeClass("alert-success").addClass("alert-danger");
                }
            }).fail(function (err) {
});

})
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
/**********************************************Assign Device To Group*******************************************/
$(document).on("change",".d2gdevicelist",function(e) {
  // body...
  $(".d2guserlist2container").css("display","none");
  // console.log($(this).val());
  var selectedDevice = $(this).val();
  if (selectedDevice!=="Select a device" || selectedDevice!==undefined) {
    $(".d2guserlist2container").css("display","block");
    $(".d2gdevicelist").prop("disabled",'disabled');
  }
})

$(document).on("click",".assignd2g",function(e) {
  // body...
  var selectedDevice=$(".d2gdevicelist").val();
  var selectedGroup=$(".d2ggrouplist2").val();
  // console.log(selectedDevice+" -> "+selectedGroup);
  // alert();

  if(selectedDevice==="Select a device"){
    $('.Messagesd3u').html("Kindly select a device").css('display', 'block').removeClass("alert-success").addClass("alert-danger");
    $(".d2gdevicelist").prop("disabled",false);
    return;
  }
  if (selectedGroup=="Select a group") {
    $('.Messagesd3u').text("Kindly select a group").css('display', 'block').removeClass("alert-success").addClass("alert-danger");
    return;
  }
var reqData={
    selectedDevice: selectedDevice,
    selectedGroup: selectedGroup,
    assignDeviceToGroup:1
}
 var point="http://127.0.0.1:3000/depen/reqHandler.php";
            var promise = costomPost(point, reqData);
            promise.done(function (res) {
              //  console.log(res);
              //    return;
                var json = JSON.parse(res);
                 // console.log(json);
                 // return;
                if (json.status === true) {
                   $('.Messagesd3u').text(json.message).css('display', 'block').removeClass("alert-danger").addClass("alert-success");
                    // window.location.reload();
                } else if (json.status === false) {
                    $('.Messagesd3u').html(json.message).css('display', 'block').removeClass("alert-success").addClass("alert-danger");
                }
            }).fail(function (err) {
});
});