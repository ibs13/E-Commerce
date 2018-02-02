<?php

	session_start();
	
	require_once("confun.php");

	$use = new ContractUser();

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
			
				<div class="mgs">
					
					<?php
					
						//define variables and set empty value
						
						$name=$email=$mgs = "";
						
						if($_SERVER['REQUEST_METHOD']=='POST'){
							
							$name = test_input($_POST['name']);
							$email = test_input($_POST['email']);
							$mgs = test_input($_POST['mgs']);
							
							if(empty($_POST['name']) or empty($_POST['email']) or empty($_POST['mgs'])){
								echo  "<p style='color:red'>* All field must be filled up...</p>";
							}
							else{
								
								if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { 
									  echo "<p style='color:red'>Invalid email format</p>";
								}else{
								
									$contract = $use->cont($name,$email,$mgs);;
									
									if($contract){
										echo $contract;
									}
								
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
				
			
				<h1 style="color:red;text-align:center;margin-top:25px">CONTRACT US</h1>
				
				<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
				
					<div class="row cont">
					
						<div class="col-sm-3"></div>
						<div class="col-sm-5">
						
							<label for="name">Your Name : </label>
							<input type="text" placeholder="Enter your name"  name="name" id="name" />
							
							<label for="email">Your Email : </label>
							<input type="email" placeholder="Enter your email" name="email" id="email" />
							
							<label for="mgs">Your Message : </label>
							<textarea name="mgs" cols="70" rows="7"></textarea>
							
							<input type="submit" value="Submit" />
						
						</div>
					
					</div>
				
				</form>
			
			</div>
				
		</div>
	
	</section>
	
</body>

</html>