<!DOCTYPE html>
<?php
	
	$faces = array('2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K', 'A');
	$suits = array('H', 'D', 'C', 'S');
	$cards = array();

	$state = 1;

	foreach($faces as $face) { 
		foreach($suits as $suit) { 
		  $cards[] = $face.$suit;
		} 
	}

	shuffle($cards);

	$game = $_POST["game"];
	if($game == "5card")
		$no_cards = 5;
	else if($game == "blackjack")
		$no_cards = 2;
	else if($game == "overunder")
		$no_cards = 1;

	$no_hands = $_POST["hands"];

	$hands = array();
	for ($i=0; $i<$no_hands; $i++){
		$hand = array();
		for ($j=0; $j<$no_cards; $j++){
			if(empty($cards))
				$state = 0;
			$hand[] = array_pop($cards);
		}
		$hands[] = $hand;
	}
?>


<html lang="en">
<head>
   	<meta charset="utf-8"/>
   	<title>IT 2320 - Lab 5</title>
</head>
<body>
	<center>
		<h2>Poker Hand</h2>
	 
	
	<?php
		echo "<h3>Type of game: ".$game."</h3>";
		echo "<h3>Number of hands: ".$no_hands."</h3>";
		
		if($state == 0){
			echo "<h3 style='color: red;'>Not enough cards for ".$game." with ".$no_hands." hands !!!</h2>";
		}else{
			for ($i=0; $i<count($hands); $i++){
				?>
				<h3>Hand <?php echo $i+1 ?><h3>&nbsp;&nbsp;&nbsp;
				<?php 
				for ($j=0; $j<count($hands[$i]); $j++) {
					$image = "images/".$hands[$i][$j].".png"; 
					?>
					<img src="<?php echo $image; ?>" width="100">&nbsp;&nbsp;&nbsp;
					<?php 
				}
			}
		}
	?>

	</center>
</body>
