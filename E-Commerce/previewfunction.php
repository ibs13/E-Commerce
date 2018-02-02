<?php

	include "config/config.php";
	
	class Preview{
		
		function __construct(){
			$database = new DatabaseConnection();
		}
		public function readAll(){
			global $pdo;
			
			$sql = $pdo->prepare("SELECT * FROM tbl_product");
			$sql->execute();
			return $sql->fetchAll();
		
		}
		
		public function readCart(){
			global $pdo;
			
			$user = $_SESSION['username'];
			
			$sql = $pdo->prepare("SELECT * FROM tbl_cart WHERE cartUsername=?");
			$sql->execute(array($user));
			return $sql->fetchAll();
		
		}
		
		public function readCartpro(){
			global $pdo;
			
			$user = $_SESSION['username'];
			
			$sql = $pdo->prepare("SELECT * FROM tbl_cart WHERE cartUsername=?");
			$sql->execute(array($user));
			return $sql->fetchAll();
		
		}
		
		public function readBalance($amount){
			global $pdo;
			
			$sql = $pdo->prepare("SELECT * FROM tbl_balance WHERE balanceAmount=?");
			$sql->execute(array($amount));
			return $sql->fetchAll();
		
		}
		
		public function readBalancests($status){
			global $pdo;
			
			$sql = $pdo->prepare("SELECT * FROM tbl_balance WHERE balanceStatus=?");
			$sql->execute(array($status));
			return $sql->fetchAll();
		
		}
		
		public function readOff(){
			global $pdo;
			
			$sql = $pdo->prepare("SELECT * FROM tbl_offer");
			$sql->execute(array());
			return $sql->fetchAll();
		
		}
		
		public function readuser(){
			global $pdo;
			
			$sql = $pdo->prepare("SELECT * FROM tbl_user");
			$sql->execute(array());
			return $sql->fetchAll();
		
		}
		
		public function readOffer(){
			global $pdo;
			
			$sql = $pdo->prepare("SELECT * FROM tbl_offer");
			$sql->execute(array());
			return $sql->fetchAll();
		
		}
		
		public function readCon(){
			global $pdo;
			
			$sql = $pdo->prepare("SELECT * FROM tbl_contract");
			$sql->execute(array());
			return $sql->fetchAll();
		
		}
		
		public function readOrd(){
			global $pdo;
			
			$sql = $pdo->prepare("SELECT * FROM tbl_order");
			$sql->execute(array());
			return $sql->fetchAll();
		
		}
		
	}

?>