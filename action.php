<?php 
	require 'list.php';
	$edu = new foodfully;
	$edu->setId($_REQUEST['id']);
	$edu->setLat($_REQUEST['lat']);
	$edu->setLng($_REQUEST['lng']);
	$status = $edu->updatedonorWithLatLng();
	if($status == true) {
		echo "Updated...";
	} else {
		echo "Failed...";
	}
 ?>