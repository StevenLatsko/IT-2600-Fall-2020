<?php

	$error = "<span class='redtext'>Number should be more than 0.</span>";

	function myFunction($number){
		$results = array();
		array_push($results, sqrt($number));
		array_push($results, $number**2);

		$factorial = 1;
		for($x=1; $x<=$number; $x++){
			$factorial = $factorial*$x;
		}
		array_push($results, $factorial);
		return $results;
	}

?>

<html>
	<head>
		<style>
			a{
				font-weight: bolder;
				color: black;
			}

			.redtext{
				color:red;
			}
		</style>
		<title>Lab 3</title>
	</head>

	<body>
		<h2>Steve Latsko - IT 2600 - Lab 3</h2>

		<?php
			if (!empty($_POST)){
				$inp_number = $_POST["number"];

				if ($inp_number>0){

					$results = myFunction($inp_number);

					echo "<a>The value entered was: ".$inp_number."</a><br><br>";
					echo "<a>The square root: ".$results[0]."</a><br><br>";
					echo "<a>The square: ".$results[1]."</a><br><br>";
					echo "<a>The factorial: ".$results[2]."</a><br><br>";

					echo "<a href=''>Click here to return to the input form.</a><br><br>";
					echo "<a>--------------------------------------------------</a>";

				}else{
					?>
						<form method="post">
							<label>Enter a number</label>
							<input type="number" name="number">
							<br>
							<input type="submit" value="SUBMIT">
						</form>
					<?php
					echo $error;
				}
			}else{
				?>
					<form method="post">
						<label>Enter a number</label>
						<input type="number" name="number">
						<br>
						<input type="submit" value="SUBMIT">
					</form>
				<?php
			}
		?>
		
	</body>
</html>
