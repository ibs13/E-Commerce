<?php

	include "previewfunction.php";
	
	$pro = new Preview;

	session_start();

	if(!isset($_SESSION['username'])){
	
	header("Location:signin.php");
	
	}elseif (isset($_SESSION['username'])){
							
		$userName = $_SESSION['username'];
		
		$id = $_GET['id'];
		
		$i = 0;
		
		if($_POST['quantity']==0){
			$_POST['quantity'] = 1;
		}
		
		foreach($pro->readCart() as $key => $val){
			if($userName==$val['cartUsername'] && $id==$val['productId']){
				if($val['Quantity']+$_POST['quantity']<=50){
					$quan= $_POST['quantity']+$val['Quantity'];
				}
				else{
					$quan = 50;
				}
				$i=1;
				break;
			}
		}
		
		
		
		if($i==0){
			$quan = $_POST['quantity'];
			$query = $pdo->prepare("INSERT INTO tbl_cart(cartUsername,productId,quantity) VALUES(?,?,?)");
			
			$query->execute(array($userName,$id,$quan));
		}
		else{
				
			$query = $pdo->prepare("UPDATE tbl_cart SET quantity=? WHERE productId=?");
			
			$query->execute(array($quan,$id));
		
		}
		
		
		
		
		
		header("Location:cart.php");

	}
	
?>