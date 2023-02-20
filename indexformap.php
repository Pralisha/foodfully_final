<!DOCTYPE html>
<html>

<head>
	<title>Location details for foodfully</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/googlemap.js"></script>
	<style type="text/css">
		.container {
			height: 450px;
		}

		#map {
			width: 100%;
			height: 100%;
			border: 1px solid blue;
		}

		#data,
		#allData {
			display: none;
		}
	</style>
</head>

<body>
	<div class="container">
		<center>
			<h1>Access Google Maps API in PHP</h1>
		</center>
		<?php
		require 'list.php';
		$food = new foodfully;
		$donors = $food->getdonorBlankLatLng();
		$donors = json_encode($donors, true);
		echo '<div id="data">' . $donors . '</div>';

		$allData = $food->getAlldonor();
		$allData = json_encode($allData, true);
		echo '<div id="allData">' . $allData . '</div>';
		?>
		<div id="map"></div>
	</div>
</body>
<script async defer
	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD2qa7fez3bItj4wIPEUoo07Tx_gX2jctw&callback=loadMap">
	</script>

</html>