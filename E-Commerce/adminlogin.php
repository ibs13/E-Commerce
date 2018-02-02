<?php
	
	session_start();
	if(isset($_SESSION['adminUser']))
	{	
		//if a user logged in then this page will redirect to his profile page
		header("Location:adminpanel.php");
	}
	
	require_once("adminfunction.php");

	$admin = new AdminLogin();

?>


<!DOCTYPE HTML>

<html lang="en-US">

<head>

	<meta charset="UTF-8">
	<title>MachMangso-Admin Login</title>
	
	<link rel="shortcut icon" href="image/favicon.ico" type="image/x-icon" />
	
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
	<script src="js/ajax.js"></script>
	<script src="js/bootstrap.js"></script>
	
</head>

<body>
	
	<header class="header">
	
		<div class="row">
			<div class="col-sm-5"></div>
		  
				
			<div class="col-sm-3 logo">
				<a href="index.php"><img src="image/logo.jpg" alt="MachMangso" height="70px" /></a>
			</div>
				
			<div class="col-sm-4"></div>
				
			
		</div>
	
	</header>
	
	<section>
	
		<div class="row navigation">
			
			<div class="col-sm-1"></div>
			
			<div class="col-sm-10 class="poster">
				
				<img id="poster" src="image/poster.jpg" alt="poster" width="1122px" height="250px" />
				
				<div class="signin">
				
					<div class="mgs">
					
						<?php
						
							//define variables and set empty value
							
							$adminUser=$adminPass = "";
							
							if($_SERVER['REQUEST_METHOD']=='POST'){
								
								$adminUser = test_input($_POST['adminUser']);
								$adminPass = test_input($_POST['adminPass']);
								
								if(empty($_POST['adminUser']) or empty($_POST['adminPass'])){
									echo  "<p style='color:red'>* All field must be filled up...</p>";
								}
								else{
								
									$login = $admin->loginAdmin($adminUser,$adminPass);
									
									if($login){
										header("location: adminpanel.php");
									}else{
										echo "<p style='color:red'>Invalid login or password. Please try again.</p>";
									}
										
									}
							}
							
							
							function test_input($data){
									$data = trim($data);
									$data = stripslashes($data);
									$data = htmlspecialchars($data);
									
									return $data;
								}
								
						?>
					
					</div> 
						
					<h2>Admin Login</h2>
				
					<form class="form2" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
						
						<label for="adminUser">Admin Username : </label>
						<input type="adminUser" placeholder="Enter your admin username" name="adminUser" id="adminUser" />
						<label for="adminPass">Password : </label>
						<input type="password" placeholder="Enter your password" name="adminPass" id="adminPass" />
						<input type="submit" value="Sign In" />
						
						
					</form>
				
				</div>
			
				
			
			</div>
			
			<div class="col-sm-1"></div>
				
		</div>
	
	</section>
	
</body>

</html>