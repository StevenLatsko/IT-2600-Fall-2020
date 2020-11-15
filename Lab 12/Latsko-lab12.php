
<?php

	$dir = "uploads/";
	$img = $_FILES["upload_file"]["name"];

	if($img){

		if (move_uploaded_file($_FILES["upload_file"]["tmp_name"], $dir.basename($img))){
			echo "<img max-width='50%' src='".$dir.$img."'><br><br>";

			echo "<a>You uploaded the file </a>
					<i>".$img."</i><br><br>";

			$dir_files =  scandir($dir);

			unset($dir_files[0]);
			unset($dir_files[1]);

			foreach ($dir_files as $file) {
				echo $file."<br>";
			}
		}else{
			echo "Error uploading file";
		}

	}else{
		echo "No file selected!!";
	}

	


?>
