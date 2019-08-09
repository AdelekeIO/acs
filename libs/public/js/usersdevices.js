$(function() {
	// body...
// alert("USer Section");
// var reqData={
// 	getDevicesReq:1
// }

var reqData={
  geUserstDevicesReq:1
}
var point="http://127.0.0.1:3000/depen/reqHandler.php";
 // console.log(reqData);
            var promise = costomGet(point, reqData);
            promise.done(function (res) {
                // console.log(res);
                var json = JSON.parse(res);
                // console.log(json);
                // alert("Responded");
                if (json.status === true) {
                    showSuccessMessage(json.message);
                    // window.location.reload();
                    loadDataTable(json.data);
                } else if (json.status === false) {
                    showErrMessage(json.message);
                }
            }).fail(function (err) {
  });
      
});
function  loadDataTable(dara) {
	// body...
	$.each(dara, function (key, val) {
		// console.log(val);
				var id = val.id;
                var device_name = val.device_name;
                var categories = val.categories;
                var device_url = val.device_url;
                var device_details = val.device_details;
                var dateAdded = val.dateAdded;
			

			var loaded_data = `
					<tr>
                      <td>${device_name}</td>
                      <td>${device_url}</td>
                      <td>${categories}</td>
                      <td>${device_details}</td>
                      <td>${dateAdded}</td>
                      <td>
                      <a href="http://127.0.0.1:3000/devicedetails/${id}">
                      <input type="button" name="" id="id_${id}" data-toggle="modal" data-target="#mediumModal" value="Details" class="assignBtn mb-1 btn btn-success">
                      </a>
                    </td>
                      <!--<td>
                      <input type="button" name="" id="id_${id}" value="edit" class="editBtn btn btn-success">
                      </td>
                      <td>
                      <input type="button" name="" id="id_${id}" value="delete" class="deleteBtn btn btn-danger">
                      </td>-->
                      >
                    </tr>
                    `;
                    
                $('.viewDevicesBody').append(loaded_data);                

})

}



$(document).on('click','.assignBtn', function(e) {
    // body...
    var id = $(this).attr("id");
    console.log(id);
    // alert("Assigning");
    
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