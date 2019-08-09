$(function() {
	// body...
//   alert(trackID);;
    var reqData={
      tid: trackID,
    	singleGroupDetails:1
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
  var group_name = dara.group_name;
  var group_category = dara.group_category;
  var group_details = dara.group_details;
  // console.log(role);
// 
	$('.group_name').append(group_name); 
	$('.group_category').append(group_category); 
	$('.usertype').append(group_details); 
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