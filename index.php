<html>
	<head>
		<title>Univesp - Weather</title>
	</head>
<body>
	<h4>Temperatura: <span id="temperature">0 °C</span></h4>
	<h4>Umidade: <span id="humidity">0 </span></h4>
	<button id="ledButton" onclick="toggle()">DESLIGAR</button>

	<script>
		// usar IP do servidor
		var socket = new WebSocket('ws://192.168.0.96:81');
		
		socket.onmessage = function(event) { 
			console.log(event.data);
			const data = event.data.split(":");
			
			const msg		= data[0] || "";
			const sensor	= data[1] || "";
			
			if(sensor == "led"){ 
				var button = document.getElementById("ledButton");
				button.innerHTML = msg == "1" ? "LIGAR" : "DESLIGAR";
			}
			else if(sensor == "dht"){ 
				var parts = msg.split(",");
				var temperature = parts[0];
				var himidity = parts[1];
				
				document.getElementById("temperature").innerHTML = temperature + " °C";
				document.getElementById("humidity").innerHTML = himidity + " %";
			}
		};
		
		function toggle() { 
			var button = document.getElementById("ledButton");
			var status = button.innerHTML === "DESLIGAR" ? "1" : "0";
			socket.send(status + ":led:esp:localhost");
		}
	</script>

</body>
</html>
