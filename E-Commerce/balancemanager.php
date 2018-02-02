<?php
	
	session_start();
	if(!isset($_SESSION['adminUser']))
	{	
		//if a user logged out then this page will redirect to his adminlogin page
		header("Location:adminlogin.php");
	}
	
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
				
				<div class="row blc">
				
					<h1>BALANCE MANAGER</h1>
				
					<div class="col-md-4"></div>
					
					<div class="col-md-4 sub-blc">
					
						<form action="blmanager.php" method="post">
						
							<label for="scratchAmount">Set Scratch Card's amount : </label>
							
							<select type="number" name="scratchAmount" id="scratchAmount">
								<option value="100"> 100/= </option>
								<option value="500"> 500/= </option>
								<option value="1000"> 1000/= </option>
							</select>
							
							<label for="scratchQuantity">Number of Scratch Card You Want to generate?</label>
							
							<input type="number" name="scratchQuantity" id="scratchQuantity" min="2" max="20" />
							
							<input type="submit" value="Generate" />
							
						</form>
						
					</div>
				
				</div>
			
			</div>
				
		</div>
	
	</section>
	
</body>

</html>