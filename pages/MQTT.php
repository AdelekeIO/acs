
<!-- <div>
	
	<button onclick="client.connect(options);">1. Connect</button>
<button onclick="client.subscribe('testtopic/#', {qos: 2}); alert('Subscribed');">2. Subscribe</button>
<button onclick="publish('Hello Foo !','testtopic/bar',2);">3. Publish</button>
<button onclick="client.disconnect();">(4. Disconnect)</button>
<div id="messages"></div>


</div> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.1/mqttws31.min.js" type="text/javascript"></script>


 <script type="text/javascript">

var mqtt;
var reconnectTimeout = 2000;
//var host="broker.mqttdashboard.com";test.mosquitto.org
var host="iot.eclipse.org";
// var host="mqtt.groov.com";
//192.168.1.206
var port = 80;


function onFailure(message) {
	// body...
	console.log("Connection attempt to host "+host+" failed.");
	setTimeout(MQTTconnect, reconnectTimeout);
}

function onMessageArrived(msg) {
	// body...
	// console.log(msg);
	out_msg="Message recieved "+msg.payloadString+"<br>";
	out_msg=out_msg+"Message recieved Topic "+msg.destinationName+"<br>";
	console.log(out_msg);
}

function onConnect() {
	// body...

	console.log("connected");
	mqtt.subscribe("sensor1");
	message = new Paho.MQTT.Message("Hello World");
	message.destinationName = "sensor1";
	mqtt.send(message);
	mqtt.send(message);
}

function MQTTconnect() {
	// body...
	console.log("connecting to "+ host +" "+port);
	mqtt = new Paho.MQTT.Client(host,port,"clientjs");
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
</script>

<div>
	<script type="text/javascript">
		MQTTconnect();
	</script>
</div>