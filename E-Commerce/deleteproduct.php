<?php

	if(!isset($_GET['id']) || $_GET['id']==NULL){
		header("previewproduct.php");
	}
	else{
		 $id = $_GET['id'];
	}

	include "config/config.php";
	
	$database = new DatabaseConnection();
	
						
	$sql = "DELETE FROM tbl_product WHERE productId=?";
						

		$stmt = $pdo->prepare($sql);
		$stmt->execute(array($id));
			
		header("location:previewproduct.php");
		

?>