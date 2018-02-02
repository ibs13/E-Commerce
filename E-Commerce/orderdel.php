<?php

	if(!isset($_GET['id']) || $_GET['id']==NULL){
		header("ordermanager.php");
	}
	else{
		 $id = $_GET['id'];
	}

	include "config/config.php";
	
	$database = new DatabaseConnection();
	
						
	$sql = "DELETE FROM tbl_order WHERE orderId=?";
						

		$stmt = $pdo->prepare($sql);
		$stmt->execute(array($id));
			
		header("location:ordermanager.php");

?>