$(function() {
	// body...
	// alert(0);

	 // $.each(Experience, function (key, val) {

	 // }

var reqData={
	getUsersReq:1
}
 var point="http://127.0.0.1:3000/depen/reqHandler.php";
            var promise = costomGet(point, reqData);
            promise.done(function (res) {
                // console.log(res);
                var json = JSON.parse(res);
                if (json.status === true) {
                    showSuccessMessage(json.message);
                    // window.location.reload();
                    loadDataTable(json.data);
                } else if (json.status === false) {
                    showErrMessage(json.message);
                }
            }).fail(function (err) {
});
      







$(document).on('click','.assignBtn', function(e) {
    // body...
    var id = $(this).attr("id");
    console.log(id);
    
});

// $(document).on('click','.editBtn', function() {
//     // body...
//     var id = $(this).attr("id");
//     // console.log(id);
//     // alert("Editing");
// })

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
        var point="http://127.0.0.1:3000/depen/reqHandler.php";
         // console.log(reqData);
                    var promise = costomPost(point, reqData);
                    promise.done(function (res) {
                        // console.log(res);

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
	// alert("loading");
	// console.log(dara);
	$.each(dara, function (key, val) {
		// console.log(val);
				var id = val.id;
                var firstname = val.first_name;
                var lastname = val.last_name;
                var email = val.user_email;
                var role = val.user_type;
			

			var loaded_data = `
					<tr>
                      <td>${firstname}</td>
                      <td>${lastname}</td>
                      <td>${email}</td>
                      <td>${role}</td>
                      <td>
                      <a href="http://127.0.0.1:3000/user/${id}">
                      <input type="button" name="" id="id_${id}" data-toggle="modal" data-target="#mediumModal" value="Details" class="assignBtn mb-1 btn btn-success">
                      </a>
                      </td>
                    <td>
                        <a href="http://127.0.0.1:3000/edituser/${id}">
                      <input type="button" name="" id="id_${id}" value="edit" class="editBtn btn btn-primary">
                      </a>
                      </td> 
                      <td>
                      <input type="button" name="" id="id_${id}" value="delete" class="deleteBtn btn btn-danger">
                      </td>
                    </tr>
                    `;
                    
                $('.viewBody').append(loaded_data);                

})

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