<?php

	$kod = $location["geoplugin_countryCode"];
	$mesto = $location["geoplugin_city"];
	$ip_adresa = $location["geoplugin_request"];
	$latitude = $location["geoplugin_latitude"];
	$longitude = $location["geoplugin_longitude"];

	$query = "SELECT * FROM Navstevy_stranok WHERE ip_adresa='$ip_adresa'";
	$stmnt = $pdo->prepare($query);
	$stmnt->execute();
	$result = $stmnt->fetch();
	
	//echo $result['id'];
	
	if(empty($kod)) {
		$kod = 'Nelokalizované mestá a vidiekČ';
	}
	
	if(empty($mesto)) {
		$mesto = 'Nelokalizované mestá acČ vidiek';
	}
	
	
	if(empty($result['id'])) {
		$query = "INSERT INTO Navstevy_stranok (stat, mesto,  datum, ip_adresa, gps_lat, gps_long) VALUES ('$kod', '$mesto', NOW(), '$ip_adresa', '$latitude', '$longitude')";
		$pdo->query($query);
	}


?>