<?php

	require "config/config.php";
	
	class ProductAdd{
		function __construct(){
			$database = new DatabaseConnection();
		}
			
		public function productAdd($category,$product,$amount,$price,$discount,$picture){
				global $pdo;
				
				$query = $pdo->prepare("INSERT INTO tbl_product(category,product,amount,price,discount,picture) VALUES(?,?,?,?,?,?)");
					
				$query->execute(array($category,$product,$amount,$price,$discount,$picture));
				$productData = $query->fetch();
					
				$err = "<p style='color:red'>Product is successfully added</p>";
				
				return $err;
					
		}
				
	}

?>