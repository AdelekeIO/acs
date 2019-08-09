$(function() {
	// body...
  // alert(trackID);;
    var reqData={
      tid: trackID,
    	singleDeviceDetails:1
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
  // console.log(role);
$('.product-title').text(device_name);
$('.product-description').text(device_details);
$('.vote').text(device_url);
  
}

$(".controler").click(
	function () {
		// body...
		// alert("ON");
		if(this.checked) {
        //Do stuff
    }
    	MQTTconnect();
	}
	);

var mqtt;
var reconnectTimeout = 2000;
//var host="broker.mqttdashboard.com";test.mosquitto.org
var host="iot.eclipse.org"; 
// var host="broker.hivemq.com";
// var host="198.41.30.241";
// var host="mqtt.groov.com";
//192.168.1.206
var port = 80;


function onFailure(message) {
	// body...
	console.log("Connection attempt to host "+host+" failed.");
	$(".status").text();
	$(".status").text("Connection attempt to host "+host+" failed.");
	console.log("Connection attempt to host "+host+" failed.");
	setTimeout(MQTTconnect, reconnectTimeout);
}

function onMessageArrived(msg) {
	// body...
	// console.log(msg);
	out_msg="Message recieved "+msg.payloadString+"<br>";
	out_msg=out_msg+"Message recieved Topic "+msg.destinationName+"<br>";
	$(".status").text();
	$(".status").text(out_msg);
	console.log(out_msg);
}

function onConnect() {
	// body...

	console.log("connected");
	$(".status").text("connected");
	mqtt.subscribe("sensor1");
	message = new Paho.MQTT.Message("Hello World");
	message.destinationName = "sensor1";
	mqtt.send(message);
	mqtt.send(message);
}

function MQTTconnect() {
	// body...
	console.log("connecting to "+ host +" "+port);
	$(".status").text("connecting to "+ host +" "+port);
	mqtt = new Paho.MQTT.Client(host,port,"clientjs1");
	//document.write("connecting to "+host);
	var options ={
		timeout: 3,
		onSuccess: onConnect,
		onFailure: onFailure,
	};
	
	mqtt.onMessageArrived=onMessageArrived;
	// console.log(mqtt.onMessageArrived);
	mqtt.connect(options);
}
// MQTTconnect();


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