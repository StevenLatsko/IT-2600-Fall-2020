<?php

	if(!empty($_POST)){
		$vendorname = $_POST["vendorname"];
		$date_begin = $_POST["date_begin"];
		$date_end = $_POST["date_end"];

		$vendorname = "%".$vendorname."%";

		$pass = "shaita";
		$user = "phpmyadmin";
		$host = "127.0.0.1";

		$dsn = "mysql:host=localhost;dbname=ap";
		$pdo = new PDO($dsn, $user, $pass);

		if($date_begin == "" && $date_end == ""){
			$stm = $pdo->query("SELECT invoices.invoice_id, invoices.invoice_date, vendors.vendor_name, vendors.vendor_state 
								FROM vendors JOIN invoices ON invoices.vendor_id = vendors.vendor_id 
								WHERE vendors.vendor_name LIKE '$vendorname'");
		}elseif($date_begin == ""){
			$stm = $pdo->query("SELECT invoices.invoice_id, invoices.invoice_date, vendors.vendor_name, vendors.vendor_state 
								FROM vendors JOIN invoices ON invoices.vendor_id = vendors.vendor_id 
								WHERE vendors.vendor_name LIKE '$vendorname'
								AND invoices.invoice_date <= '$date_end'");
		}elseif($date_end == ""){
			$stm = $pdo->query("SELECT invoices.invoice_id, invoices.invoice_date, vendors.vendor_name, vendors.vendor_state 
								FROM vendors JOIN invoices ON invoices.vendor_id = vendors.vendor_id 
								WHERE vendors.vendor_name LIKE '$vendorname'
								AND invoices.invoice_date >= '$date_begin'
								AND invoices.invoice_date <= CURDATE()");
		}else{
			$stm = $pdo->query("SELECT invoices.invoice_id, invoices.invoice_date, vendors.vendor_name, vendors.vendor_state 
								FROM vendors JOIN invoices ON invoices.vendor_id = vendors.vendor_id 
								WHERE vendors.vendor_name LIKE '$vendorname'
								AND invoices.invoice_date >= '$date_begin'
								AND invoices.invoice_date <= '$date_end'");
		}

		$rows = $stm->fetchAll(PDO::FETCH_NUM);

		foreach($rows as $row) {
			printf("$row[0] $row[1] $row[2] $row[3]<br>");
		}

	}

?>
