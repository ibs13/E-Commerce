<?php

	require "config/config.php";
	
	class LoginRegistration{
		function __construct(){
			$database = new DatabaseConnection();
		}
			
		public function registerUser($username,$email,$password){
				global $pdo;
				
				$order   = 0;
				$status  = 1;
				$balance = 50;
				
				$query = $pdo->prepare("SELECT id FROM tbl_user WHERE email = ?");
				$query->execute(array($email));
				$num1  = $query->rowCount();
				$query = $pdo->prepare("SELECT id FROM tbl_user WHERE username = ?");
				$query->execute(array($username));
				$num2  = $query->rowCount();

				if($num1==0 and $num2==0){
					$query = $pdo->prepare("INSERT INTO tbl_user(username,email,password,balance,UserStatus,UserOrder,flag) VALUES(?,?,?,?,?,?,?)");
					
					$query->execute(array($username,$email,$password,$balance,$status,$order,$order));
					
					$userData = $query->fetch();
					
				
					header("Location:signin.php");
					
				}
				else{
					$err = "<p style='color:red'>Email or Username already exist</p>";
				
					return $err;
				}
				
			}
			
			public function loginUser($email,$password){
			
				global $pdo;
				
				$query = $pdo->prepare("SELECT id , username FROM tbl_user WHERE email = ? AND password = ?");
				
				$query->execute(array($email,$password));
				$userData = $query->fetch();
				
				$id = $userData['id'];
				
				$num = $query->rowCount();
				
				$sql = $pdo->prepare("SELECT userStatus FROM tbl_user WHERE id=?");
				$sql->execute(array($id));
				$res = $sql->fetch();
				
				$sts = $res['userStatus']; 
				
				if($num==1 && $sts==1){
					
					session_start();
					
					$_SESSION['login'] = true;
					$_SESSION['uid'] = $userData['id'];
					$_SESSION['username'] = $userData['username'];
					$_SESSION['message'] = "Login Successfully.....";
					
					return true;
				}else if($num==1 && $sts==0){
					
					return -1;
					
				}else{
					return false;
				}
		
			}
			
	}

?>