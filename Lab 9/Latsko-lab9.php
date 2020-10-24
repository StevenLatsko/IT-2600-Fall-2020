<?php

	if(!empty($_POST)){
		$vendorname = $_POST["vendorname"];
		$date_begin = $_POST["date_begin"];
		$date_end = $_POST["date_end"];
		$sort_by = $_POST["sort_by"];

		$vendorname = "%".$vendorname."%";

		$pass = "shaita";
		$user = "phpmyadmin";
		$host = "127.0.0.1";

		$dsn = "mysql:host=localhost;dbname=ap";
		$pdo = new PDO($dsn, $user, $pass);

		if($date_begin == "" && $date_end == ""){
			$stm = $pdo->query("SELECT vendors.vendor_name, invoices.invoice_number, invoices.invoice_total, invoices.invoice_date, terms.terms_description
								FROM vendors 
								INNER JOIN invoices ON invoices.vendor_id = vendors.vendor_id 
								INNER JOIN terms ON invoices.terms_id = terms.terms_id 
								WHERE vendors.vendor_name LIKE '$vendorname'
								ORDER BY $sort_by");
		}elseif($date_begin == ""){
			$stm = $pdo->query("SELECT vendors.vendor_name, invoices.invoice_number, invoices.invoice_total, invoices.invoice_date, terms.terms_description
								FROM vendors 
								INNER JOIN invoices ON invoices.vendor_id = vendors.vendor_id 
								INNER JOIN terms ON invoices.terms_id = terms.terms_id 
								WHERE vendors.vendor_name LIKE '$vendorname'
								AND invoices.invoice_date <= '$date_end'
								ORDER BY $sort_by");
		}elseif($date_end == ""){
			$stm = $pdo->query("SELECT vendors.vendor_name, invoices.invoice_number, invoices.invoice_total, invoices.invoice_date, terms.terms_description
								FROM vendors 
								INNER JOIN invoices ON invoices.vendor_id = vendors.vendor_id 
								INNER JOIN terms ON invoices.terms_id = terms.terms_id 
								WHERE vendors.vendor_name LIKE '$vendorname'
								AND invoices.invoice_date >= '$date_begin'
								AND invoices.invoice_date <= CURDATE()
								ORDER BY $sort_by");
		}else{
			$stm = $pdo->query("SELECT vendors.vendor_name, invoices.invoice_number, invoices.invoice_total, invoices.invoice_date, terms.terms_description
								FROM vendors 
								INNER JOIN invoices ON invoices.vendor_id = vendors.vendor_id 
								INNER JOIN terms ON invoices.terms_id = terms.terms_id 
								WHERE vendors.vendor_name LIKE '$vendorname'
								AND invoices.invoice_date >= '$date_begin'
								AND invoices.invoice_date <= '$date_end'
								ORDER BY $sort_by");
		}

		$rows = $stm->fetchAll(PDO::FETCH_NUM);

		echo "<table border='1'>
				<tr>
					<th>Vendor Name</th>
					<th>Invoice Number</th>
					<th>Invoice Total</th>
					<th>Invoice Date</th>
					<th>Terms Description</th>

				</tr>
			";

		foreach($rows as $row) {
			echo "<tr>
					<td>$row[0]</td>
					<td>$row[1]</td>
					<td>$row[2]</td>
					<td>$row[3]</td>
					<td>$row[4]</td>
				  </tr>";
		}

		echo "</table>";

	}

?>
