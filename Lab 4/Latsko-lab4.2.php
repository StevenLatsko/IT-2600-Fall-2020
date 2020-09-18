<?php
	function primes($numb){
		$c=0;

		if($numb>=1){
			$c++;
			echo $c.". 1<br>";	
			if($numb>=2){
				$c++;
				echo $c.". 2<br>";	
			}
		}

		for($x=3; $x<=$numb; $x+=2){
			$isPrime = true;
			for($y=3; $y<=sqrt($numb); $y+=2){
				if($x!=$y){
					$remainder = $x%$y;

					if ($remainder == 0){
						$isPrime = false;
						break;
					}
				}
			}

			if($isPrime){
				$c++;
				echo $c.". ".$x."<br>";
			}
		}
	}

?>

<html>
	<head>
		<title>Lab 4.2</title>
	</head>

	<body>
		<h2>Steve Latsko - IT 2600 - Lab 4.2</h2>

		<form method="post">
			<label>Enter number</label>
			<input type="number" name="numb">
			<br>
			<input type="submit" value="SUBMIT">
		</form>

		<?php
			if (!empty($_POST)){
				$numb = $_POST["numb"];

				primes($numb);
			}
		?>
		
	</body>
</html>
