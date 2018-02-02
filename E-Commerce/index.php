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
			
			</div>
				
		</div>
	
	</section>
	
	
	<!--script>
		$(document).ready(function(){
			$("#sub").click(function(){
				$("#poster").hide();
				$(".signin").show();
				$(".signup").hide();
			});
			
			$("#sub2").click(function(){
				$(".signin").hide();
				$(".signup").show();
			});
		});
	</script-->
	
</body>

</html>