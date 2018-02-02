<?php

	session_start();
	
	require_once("function.php");

	$user = new LoginRegistration();

?>


<!DOCTYPE HTML>

<html lang="en-US">

<head>

	<meta charset="UTF-8">
	<title>MachMangso</title>
	
	<link rel="shortcut icon" href="image/favicon.ico" type="image/x-icon" />
	
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
	<script src="js/ajax.js"></script>
	<script src="js/bootstrap.js"></script>
	
</head>

<body>
	
	<?php include "include/header.php";?>
	
	<section>
	
		<div class="row navigation">
			
			<?php include "include/usermenu.php";?>
			
			<div class="col-sm-10 poster">
			
				<img id="poster" src="image/poster.jpg" alt="poster" width="1132px" height="250px" />
				
				<div class="row blc">
				
					<h1>Recharge Account</h1>
				
					<div class="col-md-4"></div>
					
					<div class="col-md-4 sub-blc">
					
						<form action="rec_function.php" method="post">
							
							<label style="margin-left:80px;margin-bottom:15px" for="cardnum">Your Scratch Card Number</label>
							
							<input style="margin-left:90px" type="text" name="cardnum" id="cardnum" />
							
							<input style="margin-left:130px" type="submit" value="Submit" />
							
						</form>
						
						<?php
						
							$sql = $pdo->prepare("SELECT flag FROM tbl_user WHERE username=?");
							$sql->execute(array($user));
							$res = $sql->fetch();
							
							$flag = $res['flag'];
							
							if($flag==-1){
								$flg = 0;
								$sql = $pdo->prepare("UPDATE tbl_user SET flag=? WHERE username=?");
								$sql->execute(array($flg,$user));
								
								$var="Your account is successfully recharged";
							}elseif($flag==1 || $flag==2){
								$var="Invalid scratchcard number...Try again";
							}elseif($flag==3){
								$sts = 0;
								$user = $_SESSION['username'];
								
								$sql = $pdo->prepare("UPDATE tbl_user SET userStatus=? WHERE username=?");
								$sql->execute(array($sts,$user));
								
								header("Location:signup.php");
							}else{
								$var = " ";
							}
						
						?>
						
						<p style="color:#c0392b;margin-left:65px;margin-top:25px"><?php echo $var; ?></p>
						
					</div>
				
				</div>
			
			</div>
				
		</div>
	
	</section>
	
</body>

</html>