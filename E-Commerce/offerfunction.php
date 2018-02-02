<?php

	include "config/config.php";
	
	$database = new DatabaseConnection();

	if($_SERVER['REQUEST_METHOD']=='POST'){
		
		$offcat = $_POST['offercat'];
		$offord = $_POST['order'];
		$offtyp = $_POST['ordertype'];
		$offoff = $_POST['off'];
		$offnam = $_POST['offername'];
		
		$query = $pdo->prepare("INSERT INTO tbl_offer(offerCat,offerOrder,offerType,offerOff,offerName) VALUES(?,?,?,?,?)");
					
		$query->execute(array($offcat,$offord,$offtyp,$offoff,$offnam));
		$offerData = $query->fetch();
		
		header("Location:showoffer.php");
		
	}

?>