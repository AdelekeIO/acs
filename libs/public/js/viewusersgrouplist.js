$(function() {
	// body...
    // alert("Viewing users Groups");
var reqData={
	getUSersGroupsReq:1
}
var point="http://127.0.0.1:3000/depen/reqHandler.php";
 // console.log(reqData);
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
      


});
function  loadDataTable(dara) {
	// body...
	$.each(dara, function (key, val) {
		// console.log(val);
				var id = val.id;
                var group_name = val.group_name;
                var group_category = val.group_category;
                var group_details = val.group_details;
                var dateAdded = val.dateAdded;
			

			var loaded_data = `
					<tr>
                      <td>${group_name}</td>
                      <td>${group_category}</td>
                      <td>${group_details}</td>
                      <td>${dateAdded}</td>
                    </tr>
                    `;
                    
                $('.viewGroupBody').append(loaded_data);                

})

}

$(document).on('click','.deleteBtn', function() {
    // body.
   var res = confirm("Are you sure you want to delete this device?");
   // alert(res);
   if (res) {
            var id = $(this).attr("id");
            // alert();
            console.log(id);
            var reqData={
          deleteGroupReq:1,
          dID:id
        }
        var point="http://127.0.0.1:3000/depen/reqHandler.php";
         // console.log(reqData);
                    var promise = costomPost(point, reqData);
                    promise.done(function (res) {
                        console.log(res);

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