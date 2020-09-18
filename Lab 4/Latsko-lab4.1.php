<?php

	$error = "<span class='redtext'>Fill all the fields!!</span>";

	function gcd($number1, $number2){
		while (min($number1,$number2) > 0){
			$rem = $number1%$number2;
			$number1 = $number2;
			$number2 = $rem;
		}
		return $number1;
	}

?>

<html>
	<head>
		<style>
	      .redtext { color:red; }
	   </style>
		<title>Lab 4.1</title>
	</head>

	<body>
		<h2>Steve Latsko - IT 2600 - Lab 4.1</h2>

		<p>Enter two number.</p>

		<form method="post">
			<label>First Number</label>
			<input type="number" name="number1">
			<br>
			<label>Second Number</label>
			<input type="number" name="number2">
			<br>
			<input type="submit" value="SUBMIT">
		</form>

		<?php
			if (!empty($_POST)){
				$number1 = $_POST["number1"];
				$number2 = $_POST["number2"];

				if ($number1=="" || $number2==""){
					echo $error;
				}else{
					echo "GCD of ".$number1." and ".$number2." is: ".gcd(max($number1,$number2), min($number1,$number2));
				}
			}
		?>

	</body>
</html>
