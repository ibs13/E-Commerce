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
					
					<th style="text-align:center;color:#16a085;font-weight:bold">USER NO</th>
					<th style="text-align:center;color:#16a085;font-weight:bold">USERNAME</th>
					<th style="text-align:center;color:#16a085;font-weight:bold">EMAIL ADDRESS</th>
					<th style="text-align:center;color:#16a085;font-weight:bold">BALANCE</th>
					<th style="text-align:center;color:#16a085;font-weight:bold">TOTAL ORDER</th>
					<th style="text-align:center;color:#16a085;font-weight:bold">USER STATUS</th>
					<th style="text-align:center;color:#16a085;font-weight:bold">CHANGE</th>
					

				
					<?php
						$i = 0;
						foreach($pro->readuser() as $key => $value){
							$i++;
					?>
					<tr style="text-align:center;color:#1abc9c">
						<td><?php echo $i.".";?></td>
						<td><?php echo $value['username'];?></td>
						<td><?php echo $value['email'];?></td>
						<td><?php echo $value['balance']."/=";?></td>
						<td><?php echo $value['userOrder'];?></td>
						
						<?php
						
							if($value['userStatus']==0){
						
						?>
						
						<td>DISABLE</td>
						
							<?php }else{?>
							
						<td>ENABLE</td>
						
							<?php }?>
						<td><a href='chgsts.php?id=<?php echo $value['id'];?>'>CHANGE STATUS</a></td>
					
					</tr>
					
						<?php } ?>
				
				</table>
				
			</div>
				
		</div>
	
	</section>
	
</body>

</html>