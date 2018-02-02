<?php
	
	session_start();
	if(!isset($_SESSION['adminUser']))
	{	
		//if a user logged out then this page will redirect to his adminlogin page
		header("Location:adminlogin.php");
	}
	
	require_once("previewfunction.php");
	
	require_once("config/config.php");
	
	$database = new DatabaseConnection();
	
	$pre = new Preview;
	
	$zero = 0;
	$zer = 0;
	$one  = 1;
	
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
	
		<div class="row navigation">
			
			<div class="col-sm-1"></div>
			
			<div class="col-sm-10 poster">
				
				<img id="poster" src="image/poster.jpg" alt="poster" width="1122px" height="250px" />
				
				<h1 style="color:red;text-align:center;margin-bottom:25px">Printed Scratch Card</h1>
				
				<div class="blcprint">
				
					<a href="adminpanel.php" style="margin-left:500px"><button>AdminPanel</button></a>
				
				</div>
				
				<div class="row bp">
					
						<?php
					
							foreach($pre->readBalancests($zero) as $key => $value){
								$zer++;
					
						?>
					
							<div class="col-sm-6">
							
								<?php if($value['balanceStatus']==0){ ?>
									<p style="color:Green;font-weight:bold">Scratch Cards Amount : <?php echo $value['balanceAmount']; ?>  :: Scratch Cards Number : <?php echo $value['balanceNumber']; ?></p>
									
								<?php } ?>
							
							</div>
							
						<?php } ?>
						
						<?php
						
							$sql = "UPDATE tbl_balance SET balanceStatus=? WHERE balanceStatus=?";	

							$stmt = $pdo->prepare($sql);
							$stmt->execute(array($one,$zero));
						
						?>
				
				</div>
				
				<h4 style="text-align:center;color:purple">Total <?php echo $zer; ?> Scratch Cards are Printed</h4>
				
			</div>
				
		</div>
	
	</section>
	
</body>

</html>






