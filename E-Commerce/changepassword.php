<?php
	
	include "config/config.php";
	$database = new DatabaseConnection();
	
	session_start();
	
	if(isset($_SESSION['username']))
		$user    = $_SESSION['username'];

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
	
	<?php include 'include/header.php'; ?>
	
	<section>
	
		<div class="row navigation">
			
			<?php include 'include/usermenu.php'; ?>
			
			<div class="col-sm-10 poster">
			
				<img id="poster" src="image/poster.jpg" alt="poster" width="1120px" height="250px" />
				
				<div class="row blc">
				
					<h1>Change Password</h1>
				
					<div class="col-md-4"></div>
					
					<div class="col-md-4 sub-blc">
					
						<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
							
							<label style="margin-left:80px;margin-bottom:15px" for="cardnum">Enter your Password</label>
							
							<input style="margin-left:80px;margin-bottom:15px" type="password" name="oldpass" id="cardnum" required />
							
							<label style="margin-left:80px;margin-bottom:15px" for="cardnum">Enter new Password</label>
							
							<input style="margin-left:80px" type="password" name="newpass" id="cardnum" required />
							
							<input style="margin-left:115px" type="submit" value="Change" />
							
						</form>
						
						<?php 
						
							if($_SERVER['REQUEST_METHOD']=='POST'){
								
								$oldpass = $_POST['oldpass'];
								$newpass = $_POST['newpass'];
						
								
								$query = $pdo->prepare("SELECT password FROM tbl_user WHERE username = ?");
								$query->execute(array($user));
								
								$result = $query->fetch();
								
								if($result['password']==$oldpass){
									$query = $pdo->prepare("UPDATE tbl_user SET password=? WHERE username = ?");
									$query->execute(array($newpass,$user));
									
									echo $var = "<p style='color:#c0392b;margin-left:65px;margin-top:25px'>Password successfully changed<p>";
								}else{
									echo $var = "<p style='color:#c0392b;margin-left:65px;margin-top:25px'>You enter a wrong password<p>";
								}
								
								
							}
						
						?>
						
					</div>
				
				</div>
			
			</div>
				
		</div>
	
	</section>
	
</body>

</html>