<?php
	
	session_start();
	if(!isset($_SESSION['adminUser']))
	{	
		//if a user logged out then this page will redirect to his adminlogin page
		header("Location:adminlogin.php");
	}
	
	require_once("salesfunction.php");

	$sales = new SalesUser();
?>


<!DOCTYPE HTML>

<html lang="en-US">

<head>

	<meta charset="UTF-8">
	<title>MachMangso-Admin Panel</title>
	
	<link rel="shortcut icon" href="image/favicon.ico" type="image/x-icon" />
	
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
	<script src="js/ajax.js"></script>
	<script src="js/bootstrap.js"></script>
	
</head>

<body>
	
	<?php include "include/adminheader.php"?>
	
	<section>
	
		<?php include "include/adminmenu.php"?>
			
			<div class="col-sm-10 class="poster">
				
				<img id="poster" src="image/poster.jpg" alt="poster" width="1122px" height="250px" />
				
				<h1 style="color:purple;text-align:center;margin:25px">SET SALESMAN</h1>
				
				<form class="sales"action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
						
					<label for="name">Username : </label>
					<input type="text" placeholder="Enter Username" name="name" id="name" />
					<label for="pass">Password : </label>
					<input type="password" placeholder="Enter your password" name="password" id="pass" />
					<input type="submit" value="Sign In" />
					
				</form>
				
				<div class="mgs">
					
					<?php
					
						//define variables and set empty value
						
						$name=$password = "";
						
						if($_SERVER['REQUEST_METHOD']=='POST'){
							
							$name = test_input($_POST['name']);
							$password = test_input($_POST['password']);
							
							if(empty($_POST['name']) or empty($_POST['password'])){
								echo  "<p style='color:red'>* All field must be filled up...</p>";
							}
							else{
							
								$var = $sales->salesUser($name,$password);
								
								if($var==1){
									echo "<p style='color:red'>Successfully inserted...</p>";
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
			
			</div>
				
		</div>
	
	</section>
	
</body>

</html>