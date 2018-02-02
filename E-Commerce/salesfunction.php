<?php

	require "config/config.php";
	
	class SalesUser{
		function __construct(){
			$database = new DatabaseConnection();
		}
			
		public function salesUser($name,$password){
				global $pdo;
				
					$query = $pdo->prepare("INSERT INTO tbl_salesman(salesName,salesPassword) VALUES(?,?)");
					
					$query->execute(array($name,$password));
					
					$var = "<p style='color:red'>Successfully inserted...</p>";
				
					return $var;
			}
			
			public function loginsales($name,$password){
			
				global $pdo;
				
				$query = $pdo->prepare("SELECT * FROM tbl_salesman WHERE salesName = ? AND salesPassword = ?");
				
				$query->execute(array($name,$password));
				$userData = $query->fetch();
				
				$id = $userData['id'];
				
				$num = $query->rowCount();
				
				if($num==1){
					
					session_start();
					
					$_SESSION['login'] = true;
					$_SESSION['sid'] = $userData['id'];
					$_SESSION['username'] = $userData['username'];
					$_SESSION['message'] = "Login Successfully.....";
					
					return true;
				}else{
					return false;
				}
		
			}
			
	}

?>