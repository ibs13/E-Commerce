<?php

	require "config/config.php";
	
	class ContractUser{
		function __construct(){
			$database = new DatabaseConnection();
		}
			
		public function cont($name,$email,$mgs){
				global $pdo;
				
					$query = $pdo->prepare("INSERT INTO tbl_contract(conName,conEmail,conMessage) VALUES(?,?,?)");
					
					$query->execute(array($name,$email,$mgs));
					
					$var = "<p style='color:red'>Your message successfully receieved</p>";
				
					return $var;
				
			}
			
	}

?>