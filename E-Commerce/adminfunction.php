<?php

	require "config/config.php";
	
	class AdminLogin{
		function __construct(){
			$database = new DatabaseConnection();
		}
			
			
			public function loginAdmin($adminUser,$adminPass){
			
				global $pdo;
				
				$query = $pdo->prepare("SELECT adminId , adminUser FROM tbl_admin WHERE adminUser = ? AND adminPass = ?");
				
				$query->execute(array($adminUser,$adminPass));
				$adminData = $query->fetch();
				
				$num = $query->rowCount();
				
				if($num == 1){
					
					session_start();
					
					$_SESSION['login'] = true;
					$_SESSION['aId'] = $adminData['adminId'];
					$_SESSION['adminUser'] = $adminData['adminUser'];
					$_SESSION['message'] = "Login Successfully.....";
					
					return true;
				}else{
					return false;
				}
		
			}
			
	}

?>