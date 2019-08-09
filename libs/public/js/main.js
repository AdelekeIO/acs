
$(function() {
	// body...
	showSuccessMessage = function (msg = null) {
    $('.errmsg').removeClass('alert-danger')
            .addClass('alert-success')
            .html(msg).css('display', 'block');

};
function url() {
    // body...
    var point="http://127.0.0.1:3000/depen/reqHandler.php";
    return point;
}
function validateEmail(email) {
    var addr = $(document).find('.' + email ).val();
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(addr);
}
showErrMessage = function (msg = null) {
    $('.errmsg').removeClass('alert-success')
            .addClass('alert-danger')
            .html(msg).css('display', 'block');
}

allProcesses = function (name) {
    getValueByName = function (name) {
    	
        var res = costomValidator($(document).find('.' + name).val().trim());
        console.log(res);
        // return;
        if (res === false) {
            return false;
        } else
            return res;
    };

    costomValidator = function (val) {
        // console.log(val);
        if (val.length === 0 && val === "" && val.trim() === 'User Type' && val === undefined && val === null && val === NaN) {
            return false;
        } else {
            return val;
        }
    };
    return getValueByName(name);
};

showErrorMessage = function (name, msg = null) {
    if (msg !== null) {
        $('.errmsg').html(msg).css('display', 'block');
    } else {
        $('.errmsg').html('This field ' + name + ',is required.').css('display', 'block').removeClass("alert-success").addClass("alert-danger");
        // $(document).find('i' + name + ']').focus();
}
}


});