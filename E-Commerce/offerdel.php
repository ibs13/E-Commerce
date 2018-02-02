<?php

	if(!isset($_GET['id']) || $_GET['id']==NULL){
		header("showoffer.php");
	}
	else{
		 $id = $_GET['id'];
	}

	include "config/config.php";
	
	$database = new DatabaseConnection();
	
						
	$sql = "DELETE FROM tbl_offer WHERE offerId=?";
						

		$stmt = $pdo->prepare($sql);
		$stmt->execute(array($id));
			
		header("location:showoffer.php");

?>