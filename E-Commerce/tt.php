<?php

include "previewfunction.php";
	
	$pro = new Preview;
	
	$id = $_GET['id'];

if($_SERVER['REQUEST_METHOD']=='POST'){
	foreach($pro->readAll() as $key => $value){
		if($id==$value['productId']){
			echo $value['category']."<br />";
			echo $value['product']."<br />";
			echo $value['amount']."<br />";
			echo "Tk.".$value['price']."/="."<br />";
			echo $_POST['quantity'];
		}
	}
}

?>

