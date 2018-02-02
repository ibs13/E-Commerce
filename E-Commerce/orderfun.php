<?php 
		
		function readAll(){
			global $pdo;
			
			$sql = $pdo->prepare("SELECT * FROM tbl_product");
			$sql->execute();
			return $sql->fetchAll();
		
		}
		
		function readCart(){
			global $pdo;
			
			$user = $_SESSION['username'];
			
			$sql = $pdo->prepare("SELECT * FROM tbl_cart WHERE cartUsername=?");
			$sql->execute(array($user));
			return $sql->fetchAll();
		
		}
?>