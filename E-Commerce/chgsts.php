<?php

	if(!isset($_GET['id']) || $_GET['id']==NULL){
		header("usercontrol.php");
	}
	else{
		 $id = $_GET['id'];
	}

	include "config/config.php";
	
	$database = new DatabaseConnection();
	
	$sql = $pdo->prepare("SELECT userStatus FROM tbl_user WHERE id=?");
	$sql->execute(array($id));
	$res = $sql->fetch();
	
	$fl = 0;
	
	
	if($res['userStatus']==0){
		$sts = 1;
		
		$sql = "UPDATE tbl_user	SET flag=? WHERE id=?";
						
		$stmt = $pdo->prepare($sql);
		$stmt->execute(array($fl,$id));
	}else{
		$sts = 0;
	}
	
	
						
	$sql = "UPDATE tbl_user	SET userStatus=? WHERE id=?";
						
	$stmt = $pdo->prepare($sql);
	$stmt->execute(array($sts,$id));
	
	
		
	header("location:usercontrol.php");

?>