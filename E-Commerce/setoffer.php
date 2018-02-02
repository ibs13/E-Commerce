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
				
				<img id="poster" src="image/poster.jpg" alt="poster" width="1110px" height="250px" />
				
				<h1 style="color:purple;text-align:center;margin-bottom:20px">SET OFFER</h1>
				
				<div class="row check">
				
					<div class="col-sm-4"></div>
					
					<div class="col-sm-4">
					
					<form class="form1" action="offerfunction.php" method="post">
							
						<label for="offercat">OFFER CATEGORY : </label>
						<select name="offercat" id="offercat">
							
							<option value="REGULAR">REGULAR</option>
							<option value="SPECIAL">SPECIAL</option>
							
						</select>
						<label for="order">ORDER NO. : </label>
						<input type="number" placeholder="" name="order" id="order"  min="1" />
						<label for="ordertype">ORDER Type. : </label>
						<select name="ordertype" id="ordertype">
						
							<option value="DISCOUNT">DISCOUNT</option>
							<option value="CASH BONUS">CASH BONUS</option>
							
						</select>
						
						
						<label for="off">OFFER : </label>
						<input type="number" placeholder="" name="off" id="off" min="1" />
						
						<label for="offername">OFFER NAME : </label>
						<select name="offername" id="offername">
						
							<option value="NONE">NONE</option>
							<option value="EID">EID OFFER</option>
							<option value="PUJA">PUJA OFFER</option>
							<option value="RAMADAN">RAMADAN OFFER</option>
							<option value="CHRISTMAS">CHRISTMAS OFFER</option>
							<option value="NOBOBORSHO">NOBOBORSHO OFFER</option>
							
						</select>
						
						<input type="submit" value="SUBMIT" id="signUp"  />
							
					</form>
					
					</div>
			
			</div>
				
		</div>
	
	</section>
	
</body>

</html>