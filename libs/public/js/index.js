$(function() {
// alert("Admin Index");
var reqData={
	getDashBoardDetails:1
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
        var point="http://127.0.0.1:3000/depen/reqHandler.php";
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
    var usersCount = dara[1][0]+" Added Users!";
    var devicesCount = dara[2][0]+" Added Devices!";
    var adminCOunt = dara[0][0]+" Added Admin";
    var groupsCount = dara[3][0]+" Added Groups!";
    $(".usersCount").text(usersCount);
    $(".devicesCount").text(devicesCount);
    $(".adminCOunt").text(adminCOunt);
    $(".groupsCount").text(groupsCount);

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