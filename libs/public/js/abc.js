$(function () {
	$('.errmsg').html('').css('display', 'none');
	// body...
	// alert();
	$(".btnLogin").click(function(e) {
		e.preventDefault();
		// body...
		var email = $(".inputEmail").val();
		var password = $(".inputPassword").val();
		console.log(email);
		var point = "index/run";
        var email = (allProcesses('inputEmail'));
        if (email === "" || email === undefined) {
            showErrorMessage('email');
            $(".inputEmail").focus();
            return;
        }
        var password = (allProcesses('inputPassword'));
        if (password === "" || password === undefined) {
            showErrorMessage('password');
            $(".inputPassword").focus();
            return;
        }
        var loginDat = {
            user_email: email,
            user_password: password,
            postLogin:1
        };
        // alert();
        console.log(loginDat);

        if ((loginDat.user_email !== "" && loginDat.user_email !== undefined) && (loginDat.user_password !== "" && loginDat.user_password !== undefined)) {
            // url()
            var point="http://127.0.0.1:3000/depen/reqHandler.php";
            var promise = costomPost(point, loginDat);
            promise.done(function (res) {
                console.log(res);
                // return;
                var json = JSON.parse(res);
                if (json.status === true) {
                    showSuccessMessage(json.message);
                    window.location.reload();
                } else if (json.status === false) {
                    showErrMessage(json.message);
                }
            }).fail(function (err) {
               console.log(err);
            });
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