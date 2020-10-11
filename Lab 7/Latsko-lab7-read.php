<?php
	
	if(isset($_COOKIE["cookies"])){
		echo "Your email: ".$_COOKIE["cookies"]["email"]."<br>";
		echo "Your favourite food: ".$_COOKIE["cookies"]["fav_food"]."<br>";
		echo "Year you were born: ".$_COOKIE["cookies"]["year"]."<br>";
	}else{
		echo "Cookie expired, or not yet set.";
	}

?>

