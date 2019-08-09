$(function() {
	// body...
  // alert(trackID);;
    var reqData={
      tid: trackID,
    	singleUserDetails:1
    }
     var point="http://127.0.0.1:3000/depen/reqHandler.php";
                var promise = costomGet(point, reqData);
                promise.done(function (res) {
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
	// alert("loading");
	console.log(dara);
  var dara=dara[0];
  var id = dara.id;
  var firstname = dara.first_name;
  var lastname = dara.last_name;
  var email = dara.user_email;
  var role = dara.user_type;
  // console.log(role);
// 
	$('.full-name').append(`${firstname} ${lastname}`); 
	$('.email').append(email); 
	$('.usertype').append(role); 
}

$(function() {
  // body...
    var reqData={
      tid: trackID,
      getAssociatedGroups:1
    }
     var point="http://127.0.0.1:3000/depen/reqHandler.php";
                var promise = costomGet(point, reqData);
                promise.done(function (res) {
                    var json = JSON.parse(res);
                    if (json.status === true) {
                        showSuccessMessage(json.message);
                        // window.location.reload();
                        // loadDataTable(json.data);
                    } else if (json.status === false) {
                        showErrMessage(json.message);
                    }
                }).fail(function (err) {
    });
});
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