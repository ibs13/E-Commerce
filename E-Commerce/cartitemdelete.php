<?php

	if(!isset($_GET['id']) || $_GET['id']==NULL){
		header("cart.php");
	}
	else{
		 $id = $_GET['id'];
	}

	include "config/config.php";
	
	$database = new DatabaseConnection();
	
						
	$sql = "DELETE FROM tbl_cart WHERE cartId=?";
						

		$stmt = $pdo->prepare($sql);
		$stmt->execute(array($id));
			
		header("location:cart.php");
		

?>