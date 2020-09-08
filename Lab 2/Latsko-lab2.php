<?php

	$error = "<span class='redtext'>Number should not be less than 3.</span>";

	function fibonacci($number){
		$fib_array = array(0,1);

		for($x = 0; $x < $number; $x++){
			$a = $fib_array[count($fib_array)-1];
			$b = $fib_array[count($fib_array)-2];
			array_push($fib_array, $a+$b);
		}

		return $fib_array;
	}

?>

<html>
	<head>
		<style>
	      .redtext { color:red; }
	   </style>
		<title>Lab 2</title>
	</head>

	<body>
		<h2>Steve Latsko - IT 2600 - Lab 2</h2>


		<p>Enter number of fibonacci numbers.</p>


		<form method="post">
			<label>Number</label>
			<input type="number" name="number">
			<br>
			<input type="submit" value="SUBMIT">
		</form>


		

		<?php
			if (!empty($_POST)){
				$inp_number = $_POST["number"];

				if ($inp_number>=3){
					echo "Fibonacci sequence: ";

					$fib_array = fibonacci($inp_number-2);

					for($x = 0; $x < count($fib_array); $x++){
						if($x==0){
							echo $fib_array[$x];
						}else{
							echo ",".$fib_array[$x];	
						}
					}

					echo "<br>";
					echo "Ratio :".$fib_array[count($fib_array)-1]/$fib_array[count($fib_array)-2];

				}else{
					echo $error;

				}
			}
		?>
		

	</body>
</html>
