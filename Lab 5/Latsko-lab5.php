<?php
	function red_text($txt_array){
		$no_words = count($txt_array);
		$red = 0;
		$new_txt = "";
		for($x=0; $x<$no_words; $x++){
			if ($txt_array[$x]=="REDSTART"){
				$red = 1;
				continue;
			}

			if ($txt_array[$x]=="REDEND"){
				$red = 0;
				continue;
			}

			if ($red==1){
				$word_txt = "<span class='redtext'>".$txt_array[$x]."</span>";
			}else{
				$word_txt = $txt_array[$x];
			}

			$new_txt = $new_txt." ".$word_txt;
		}

		return $new_txt;
	}

?>

<html>
	<head>
		<style>
	      .redtext {
	      	color: red;
	      	font-weight: bold;
	      }

	   </style>
		<title>Lab 5</title>
	</head>

	<body>
		<h2>Steve Latsko - IT 2600 - Lab 5</h2>

		<?php
			if (!empty($_POST)){
				$txt = $_POST["txt"];

				// primes($numb);
				// echo $txt."<br>";
				echo "Number of characters: ".strlen($txt)."<br>";
				$txt_array = explode(" ", $txt);
				// print_r($txt_array);
				$no_words = count($txt_array);
				echo "Number of words: ".$no_words."<br>";
				$rand_no = rand(1, $no_words);
				// echo $rand_no."<br>";
				// echo $txt_array[$rand_no-1]."<br>";
				echo "Randon word: ".$txt_array[$rand_no-1]."<br>";
				echo "All caps: ".strtoupper($txt)."<br>";
				echo "Substring of 10 characters: ".substr($txt, 9, 10)."<br>";

				echo "Replace 'and': ".str_ireplace("and", "&", $txt)."<br>";

				$red_txt = red_text($txt_array);
				echo "Red text: ".$red_txt."<br>";

				echo "<br><br><a href=''>Click here to return to the input form.</a>";

			}else{
				?>
				<form method="post">
					<label>Enter text</label>
					<br>
					<textarea maxlength="250" name="txt"></textarea>
					<br>
					<input type="submit" value="SUBMIT">
				</form>
				<?php
			}
		?>
		
	</body>
</html>
