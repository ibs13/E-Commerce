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
	
		<div class="row">
		
			<div class="col-sm-1"></div>
			
			<div class="col-sm-10 poster">
				
				<img id="poster" src="image/poster.jpg" alt="poster" width="1136px" height="250px" />
				
				<div class="blcprint"  style="margin-top:25px">
				
					<a href="adminpanel.php" style="margin-left:500px"><button>AdminPanel</button></a>
				
				</div>
				
				<div class="row">
				
					<?php
					
						foreach($pro->readAll() as $key => $value){
					
					?>

					<div class="col-md-3">
						 <div class="thumbnail pre">
							<h3><?php echo $value['category'];?></h3>
							<img src="<?php echo $value['picture'];?>" alt="Preview is not available" style="width:250px;height:150px">
							<h4><?php echo $value['product'];?></h4>
							<p><?php echo $value['amount'];?></p>
							<h5><?php echo "Tk.".$value['price']."/=";?></h5>
						
						</div>
						<div class="thumbnail prev">
							
							<a href="modifyproduct.php?id=<?php echo $value['productId']; ?>"><button>Modify</button></a>
							<a href="deleteproduct.php?id=<?php echo $value['productId']; ?>" style="margin-left: 66px" href=""><button>Delete</button></a>
						
						</div>
						
					</div>
					
						<?php } ?>
					
				
				</div>
				
						
			
			</div>
			
			<div class="col-sm-1"></div>
				
		</div>
	
	</section>
	
</body>

</html>