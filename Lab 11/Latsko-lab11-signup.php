<?php

	if(!empty($_POST)){

		$username = $_POST["username"];
		$password = $_POST["password"];

		$pass = "shaita";
		$user = "phpmyadmin";
		$host = "127.0.0.1";

		$dsn = "mysql:host=localhost;dbname=ap";
		$pdo = new PDO($dsn, $user, $pass);



		$password_hash = password_hash($password, PASSWORD_DEFAULT);

	    $query = "SELECT * FROM passwords";
	    $statement = $pdo->prepare($query);
	    if(!$statement->execute()){

			$query = "
			CREATE TABLE passwords
			(
				username	VARCHAR(60)	PRIMARY KEY,
				password	VARCHAR(255)
			)";

			$statement = $pdo->prepare($query)->execute();
		}


		$query = "INSERT INTO passwords VALUES (:username, :password)";
		$statement = $pdo->prepare($query);
		$statement->bindValue(':username', $username);
		$statement->bindValue(':password', $password_hash);

		if($statement->execute()){
			echo "User added successfully";
		}else{
			echo "Unsuccessful";
		}

	}

?>
