<?php
	
	session_start();
	
	if($_SERVER['REQUEST_METHOD']=='POST'){
		
		$user = $_SESSION['username'];
		
		include 'config/config.php';
		
		$database = new DatabaseConnection();
		
		$cardnum = $_POST['cardnum'];
		$sts = 1;
		$len = strlen($cardnum);
		
		
		if($len>15){
			$amount = 1000;
		}else if($len>11){
			$amount = 500;
		}else if($len>7){
			$amount = 100;
		}
		
		$sql = $pdo->prepare("SELECT count(*) FROM tbl_balance WHERE balanceNumber=? and balanceStatus=?");
		$sql->execute(array($cardnum,$sts));
		$res = $sql->fetch();
		
		
		if($res['count(*)']==1){
			
			$sts++;
			
			$sql = $pdo->prepare("SELECT balance FROM tbl_user WHERE username=?");
			$sql->execute(array($user));
			$res = $sql->fetch();
			
			$amount += $res['balance'];
			
			
			$sql = $pdo->prepare("UPDATE tbl_user SET balance=? WHERE username=?");
			$sql->execute(array($amount,$user));
			
			$sql = $pdo->prepare("UPDATE tbl_balance SET balanceStatus=? WHERE balanceNumber=?");
			$sql->execute(array($sts,$cardnum));
			
			$flag = -1;
			
			$sql = $pdo->prepare("UPDATE tbl_user SET flag=? WHERE username=?");
			$sql->execute(array($flag,$user));
		}else{
			echo $res['count(*)'];
			
			$sql = $pdo->prepare("SELECT flag FROM tbl_user WHERE username=?");
			$sql->execute(array($user));
			$result = $sql->fetch();
			
			$k = $result['flag']+1;
			
			$sql = $pdo->prepare("UPDATE tbl_user SET flag=? WHERE username=?");
			$sql->execute(array($k,$user));
		}
		
		header("Location:recharge.php");
		
	}

?>