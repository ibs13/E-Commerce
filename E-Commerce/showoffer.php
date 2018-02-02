<?php
	
	session_start();
	if(!isset($_SESSION['adminUser']))
	{	
		//if a user logged out then this page will redirect to his adminlogin page
		header("Location:adminlogin.php");
	}
	
	include "previewfunction.php";
	
	$pro = new Preview;
	
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
				
				<table class="table">
						
					<th style="text-align:center;color:#16a085;font-weight:bold">OFFER NO.</th>
					<th style="text-align:center;color:#16a085;font-weight:bold">OFFER Category</th>
					<th style="text-align:center;color:#16a085;font-weight:bold">ORDER NO.</th>
					<th style="text-align:center;color:#16a085;font-weight:bold">OFFER TYPE</th>
					<th style="text-align:center;color:#16a085;font-weight:bold">OFFER</th>
					<th style="text-align:center;color:#16a085;font-weight:bold">OFFER NAME.</th>
					<th style="text-align:center;color:#16a085;font-weight:bold">DELETE</th>
					

				
					<?php
						$i = 0;
						foreach($pro->readOff() as $key => $value){
							$i++;
					?>
					
					<tr style="text-align:center;color:#1abc9c">
						<td><?php echo $i.".";?></td>
						<td><?php echo $value['offerCat'];?></td>
						<td><?php echo $value['offerOrder'];?></td>
						<td><?php echo $value['offerType'];?></td>
						<td><?php echo $value['offerOff'];?></td>
						<td><?php echo $value['offerName'];?></td>
						<td><a href='offerdel.php?id=<?php echo $value['offerId'];?>'>DELETE</a></td>
					
					</tr>
					
						<?php } ?>
				
				</table>
				
			</div>
				
		</div>
	
	</section>
	
</body>

</html>