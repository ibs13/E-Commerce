<?php

	session_start();
	
	require_once("previewfunction.php");

	$pre = new Preview();

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
				
				
				<h1 style="text-align:center;color:green;margin-bottom:20px" >OFFERS</h1>
				
				<div class="row">
					
						<?php
				
							foreach($pre->readOffer() as $key => $value){
									
						?>
						
						<div class="col-sm-4">
						
							<div class="row">
							
								<div class="thumbnail off">
								
									<div style="border-right:1px solid #16a085" class="col-sm-5">
								
										<?php if($value['offerCat']=='REGULAR'){?>
										
										<p style="margin-bottom:0">Order No.</p>
										
										<p style="margin-top:0"><?php echo $value['offerOrder']?></p>
										
										<?php }else{?>
										
										<p><?php echo $value['offerName']?></p>
										
										<?php } ?>
									
									</div>
								
								
								
									<div class="col-sm-7 .hhh">
								
										<?php 
										
											if($value['offerType']=='DISCOUNT'){
										
										?>
										
										<p><?php echo $value['offerOff'].'% ';?> off in total shopping.</p>
										
										<?php }else{?>
										
										<p><?php echo $value['offerOff'].'tk. ';?> off in total shopping.</p>
										
										<?php } ?>
									
									</div>
								
								</div>
							
							</div>
					
					</div>
					
							<?php }  ?>
					
				</div>
				
			</div>
					
	</section>
	
</body>

</html>