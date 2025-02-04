<?php
 
 session_start();
	require_once "../phpRegister/connect.php";

	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
	$id = $_SESSION['id'];
	$polaczenie2 = @new mysqli($host, $db_user, $db_password, $db_name);
	$first = mysqli_query($polaczenie2,"SELECT avg(humidity) AS hum, DATE(dht11.date) AS date FROM dht11 WHERE user_id = '$id' AND DATE(dht11.date) = DATE_SUB(CURDATE(), INTERVAL 1 DAY)");
	$first1 = $first->fetch_assoc();
	$second = mysqli_query($polaczenie2,"SELECT avg(humidity) AS hum, DATE(dht11.date) AS date FROM dht11 WHERE user_id = '$id' AND DATE(dht11.date) = DATE_SUB(CURDATE(), INTERVAL 2 DAY)");
	$second1 = $second->fetch_assoc();
	$third = mysqli_query($polaczenie2,"SELECT avg(humidity) AS hum, DATE(dht11.date) AS date FROM dht11 WHERE user_id = '$id' AND DATE(dht11.date) = DATE_SUB(CURDATE(), INTERVAL 3 DAY)");
	$third1 = $third->fetch_assoc();
	$four = mysqli_query($polaczenie2,"SELECT avg(humidity) AS hum, DATE(dht11.date) AS date FROM dht11 WHERE user_id = '$id' AND DATE(dht11.date) = DATE_SUB(CURDATE(), INTERVAL 4 DAY)");
	$four1 = $four->fetch_assoc();
	$five = mysqli_query($polaczenie2,"SELECT avg(humidity) AS hum, DATE(dht11.date) AS date FROM dht11 WHERE user_id = '$id' AND DATE(dht11.date) = DATE_SUB(CURDATE(), INTERVAL 5 DAY)");
	$five1 = $five->fetch_assoc();
	$six = mysqli_query($polaczenie2,"SELECT avg(humidity) AS hum, DATE(dht11.date) AS date FROM dht11 WHERE user_id = '$id' AND DATE(dht11.date) = DATE_SUB(CURDATE(), INTERVAL 6 DAY)");
	$six1 = $six->fetch_assoc();
	$seven = mysqli_query($polaczenie2,"SELECT avg(humidity) AS hum, DATE(dht11.date) AS date FROM dht11 WHERE user_id = '$id' AND DATE(dht11.date) = DATE_SUB(CURDATE(), INTERVAL 7 DAY)");
	$seven1 = $seven->fetch_assoc();
	}
$dataPoints = array( 
	array("y" => $seven1['hum'], "label" => $seven1['date'] ),
	array("y" => $six1['hum'], "label" => $six1['date'] ),
	array("y" => $five1['hum'], "label" => $five1['date'] ),
	array("y" => $four1['hum'], "label" => $four1['date'] ),
	array("y" => $third1['hum'], "label" => $third1['date'] ),
	array("y" => $second1['hum'], "label" => $second1['date'] ),
	array("y" => $first1['hum'], "label" => $first1['date'] )
	/*array("y" => $third1['hum'], "label" => $third1['date'] ),
	array("y" => $third1['hum'], "label" => $third1['date'] ),
	array("y" => $first1['hum'], "label" => $first1['date'] ),
	array("y" => $third1['hum'], "label" => $third1['date'] ),
	array("y" => $first1['hum'], "label" => $first1['date'] ),
	array("y" => $third1['hum'], "label" => $third1['date'] ),
	array("y" => $first1['hum'], "label" => $first1['date'] )*/
);
 
?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "AVG LAST WEEK HUMIDITY"
	},
	axisY: {
		title: "HUMIDITY [%]"
	},
	data: [{
		type: "column",
		yValueFormatString: "##,#0 [%]",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
<meta charset="utf-8" />
	 <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	 
	 <title>M&M</title>
	 
	 <meta name ="description" contenr="Serwis o ciekawych rzeczach itp." />
	 <meta name="keywords" content="Elektronika , Mikroprocesory,Programowanie ,Gliwice ,Politechnika ,AEI" />
	 <link rel="shortcut icon" href="../images/Logo_ikona.ico">
	 
	 <link href="style_plot.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="chartContainer" style="height: 880px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<button id="back_button" style="width: 95%; height:5rem; margin-left:50px" onclick="window.location.href = '../plotPage/plot.php';"class="cancelbtn">Back to plot page!</button>
</body>
</html>