<?php
	
	// echo "one";
	if(!empty($_POST)){

		// echo "two";

		$vendor_name = $_POST["name"];
		$vendor_address1 = $_POST["address1"];
		$vendor_address2 = $_POST["address2"];
		$vendor_city = $_POST["city"];
		$vendor_state = $_POST["state"];
		$vendor_zip_code = $_POST["zip_code"];
		$vendor_phone = $_POST["phone"];
		$vendor_contact_last_name = $_POST["contact_last_name"];
		$vendor_contact_first_name = $_POST["contact_first_name"];
		$default_terms_id = $_POST["default_terms_id"];
		$default_account_number = $_POST["default_account_number"];


		


		$pass = "shaita";
		$user = "phpmyadmin";
		$host = "127.0.0.1";

		$dsn = "mysql:host=localhost;dbname=ap";
		$pdo = new PDO($dsn, $user, $pass);


		$query = "INSERT INTO vendors (vendor_name, vendor_address1, vendor_address2, vendor_city, vendor_state, vendor_zip_code, vendor_phone, vendor_contact_last_name, vendor_contact_first_name, default_terms_id, default_account_number) 
			VALUES (:vendor_name, :vendor_address1, :vendor_address2, :vendor_city, :vendor_state, :vendor_zip_code, :vendor_phone, :vendor_contact_last_name, :vendor_contact_first_name, :default_terms_id, :default_account_number)";


		$statement = $pdo->prepare($query);

		$statement->bindValue(':vendor_name', $vendor_name);
		$statement->bindValue(':vendor_address1', $vendor_address1);
		$statement->bindValue(':vendor_address2', $vendor_address2);
		$statement->bindValue(':vendor_city', $vendor_city);
		$statement->bindValue(':vendor_state', $vendor_state);
		$statement->bindValue(':vendor_zip_code', $vendor_zip_code);
		$statement->bindValue(':vendor_phone', $vendor_phone);
		$statement->bindValue(':vendor_contact_last_name', $vendor_contact_last_name);
		$statement->bindValue(':vendor_contact_first_name', $vendor_contact_first_name);
		$statement->bindValue(':default_terms_id', $default_terms_id);
		$statement->bindValue(':default_account_number', $default_account_number);

		if($statement->execute()){
			echo "Successful";
		}else{
			echo "Failed!!";
		}
		$statement->closeCursor();
	}

?>
