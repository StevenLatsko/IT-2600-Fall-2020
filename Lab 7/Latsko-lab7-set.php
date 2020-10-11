<?php
	
	$email = $_POST["email"];
	$fav_food = $_POST["fav_food"];
	$year = $_POST["year"];

	$mins = 15;
	$life = $mins*60;
	setcookie("cookies[email]", $email, time()+$life);
	setcookie("cookies[fav_food]", $fav_food, time()+$life);
	setcookie("cookies[year]", $year, time()+$life);

	echo "Cookies set for ".$mins." minutes."

?>

