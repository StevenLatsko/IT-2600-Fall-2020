<?php

	
	class Vendor{
		public $vendor_name;
		public $vendor_address1;
		public $vendor_address2;
		public $vendor_city;
		public $vendor_state;
		public $vendor_zip_code;
		public $vendor_phone;
		public $vendor_contact_last_name;
		public $vendor_contact_first_name;
		public $default_terms_id;
		public $default_account_number;


		function __construct($vendor_name){
			$this->vendor_name = $vendor_name;
		}

		function save(){

			$pass = "shaita";
			$user = "phpmyadmin";
			$host = "127.0.0.1";

			$dsn = "mysql:host=localhost;dbname=ap";
			$pdo = new PDO($dsn, $user, $pass);


			$query = "INSERT INTO vendors (vendor_name, vendor_address1, vendor_address2, vendor_city, vendor_state, vendor_zip_code, vendor_phone, vendor_contact_last_name, vendor_contact_first_name, default_terms_id, default_account_number) 
				VALUES (:vendor_name, :vendor_address1, :vendor_address2, :vendor_city, :vendor_state, :vendor_zip_code, :vendor_phone, :vendor_contact_last_name, :vendor_contact_first_name, :default_terms_id, :default_account_number)";


			$statement = $pdo->prepare($query);

			$statement->bindValue(':vendor_name', $this->vendor_name);
			$statement->bindValue(':vendor_address1', $this->vendor_address1);
			$statement->bindValue(':vendor_address2', $this->vendor_address2);
			$statement->bindValue(':vendor_city', $this->vendor_city);
			$statement->bindValue(':vendor_state', $this->vendor_state);
			$statement->bindValue(':vendor_zip_code', $this->vendor_zip_code);
			$statement->bindValue(':vendor_phone', $this->vendor_phone);
			$statement->bindValue(':vendor_contact_last_name', $this->vendor_contact_last_name);
			$statement->bindValue(':vendor_contact_first_name', $this->vendor_contact_first_name);
			$statement->bindValue(':default_terms_id', $this->default_terms_id);
			$statement->bindValue(':default_account_number', $this->default_account_number);

			if($statement->execute()){
				echo "Successful";
			}else{
				echo "Failed!!";
			}
			$statement->closeCursor();
			
		}


	}
	
	if(!empty($_POST)){

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

		$vendor = new Vendor($vendor_name);

		$vendor->vendor_address1 = $vendor_address1;
		$vendor->vendor_address2 = $vendor_address2;
		$vendor->vendor_city = $vendor_city;
		$vendor->vendor_state = $vendor_state;
		$vendor->vendor_zip_code = $vendor_zip_code;
		$vendor->vendor_phone = $vendor_phone;
		$vendor->vendor_contact_last_name = $vendor_contact_last_name;
		$vendor->vendor_contact_first_name = $vendor_contact_first_name;
		$vendor->default_terms_id = $default_terms_id;
		$vendor->default_account_number = $default_account_number;

		$vendor->save();

	}

?>
