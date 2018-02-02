<?php

if(!isset($_GET['id']) || $_GET['id']==NULL){
		header("previewproduct.php");
	}
	else{
		 $id = $_GET['id']."<br />";
	}

	include "config/config.php";
	
	$database = new DatabaseConnection();
	
	//define variables and set empty value
						
	$amount=$price=$discount= "";
						

	if($_SERVER['REQUEST_METHOD']=='POST'){
		
		$amount = test_input($_POST['amount']);
		$price = test_input($_POST['price']);
		$discount = test_input($_POST['discount']);
		
		
		$sql = "UPDATE tbl_product SET amount=?,price=?,discount=? WHERE productId=?";
						

			$stmt = $pdo->prepare($sql);
			$stmt->execute(array($amount,$price,$discount,$id));
			
			header("location:previewproduct.php");
		
		}
						

		function test_input($data){
						

			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
						
			return $data;
						

		}

?>


