<?php

	if(!empty($_POST)){
		$pass = "shaita";
		$user = "phpmyadmin";
		$host = "127.0.0.1";

		$dsn = "mysql:host=localhost;dbname=ap";
		$pdo = new PDO($dsn, $user, $pass);



		$invoice_id = $_POST["invoice_id"];


		$query = "DELETE FROM invoice_line_items WHERE invoice_id = :invoice_id";
		$statement = $pdo->prepare($query);
		$statement->bindValue(':invoice_id', $invoice_id); 
		$statement->execute(); 


		$query = "DELETE FROM invoices WHERE invoice_id = :invoice_id";
		$statement = $pdo->prepare($query);
		$statement->bindValue(':invoice_id', $invoice_id); 

		if($statement->execute()){
			echo "Deleted successfully";
		}else{
			echo "Failed to delete";
		}
		$statement->closeCursor();

	}
?>