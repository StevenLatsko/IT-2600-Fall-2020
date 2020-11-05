<?php

	if(!empty($_POST)){

		$username = $_POST["username"];
		$password = $_POST["password"];

		$pass = "shaita";
		$user = "phpmyadmin";
		$host = "127.0.0.1";

		$dsn = "mysql:host=localhost;dbname=ap";
		$pdo = new PDO($dsn, $user, $pass);


		$query = "SELECT * FROM passwords WHERE username = '$username'";

		$statement = $pdo->query($query);

	    $row = $statement->fetchAll(PDO::FETCH_NUM);

	    if($row){

		    $password_hash = $row[0][1];

			if(password_verify($password, $password_hash)){
				echo "Successful login";
			}else{
				echo "Unsuccessful login";
			}

		}else{
			echo "Invalid user!!!";
		}

	}

?>
