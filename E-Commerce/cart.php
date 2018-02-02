<?php

	session_start();
	
	include "previewfunction.php";
	
	$pro = new Preview;
	
	if(!isset($_SESSION['username'])){
		header("Location:signin.php");
	}
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
			
			<div class="col-sm-1"></div>
			
				
			<div class="col-sm-10 poster">
			
				<img id="poster" src="image/poster.jpg" alt="poster" width="1122px" height="150px" />
				
				<div class="row">
				
					<h1 style="color:red;text-align:center;margin-bottom:20px">YOUR SHOPPING BAG</h1>
					
					
					<?php 
					
						if($res['count(*)']==0){
							echo "<p style='color:purple;text-align:center;margin-top:10px'>Your Shopping Bag is empty...<br /><a style='color:green' href='meat.php'>Add Product</a> Please</p>";
						}else{
					
					?>
					
					<div class="ch">
							<a href="order.php"><button>ORDER NOW</button></a>
					</div>
					
					<?php }?>
				
					<?php
						
						$i = 0;
						//$j = 0;
						
						foreach($pro->readCart() as $key => $val){
							foreach($pro->readAll() as $key => $value){
								if($value['productId']==$val['productId']){
									$i++;
									
					?>

					<div class="col-md-3 u_pre">
					
						<form action="cartmanager.php?id=<?php echo $value['productId']; ?>" target="_blank" method="post">
						
							 <div class="thumbnail pre">
							 
								<h3><?php echo $value['product'];?></h3>
								<img src="<?php echo $value['picture'];?>" alt="Image is not available" style="width:250px;height:150px">
								<p><?php echo $value['amount'];?></p>
								<?php
								
									
									$newPrice = $value['price'] - (($value['price']*$value['discount'])/100);
										
								?>
								
								<h5><a id="n_dis"><?php echo "Tk.".$newPrice."/=";?></a>
								
							
							</div>
							<div class="thumbnail prev" id="crt">
								
								<table>
								
								<tr>
									<td><label>Quantity : </label></td>
									<td><label><?php echo $val['quantity'];?></label></td>
								</tr>
								
								</table>
								
								<a id="crt" href="cartitemdelete.php?id=<?php echo $val['cartId'];?>">DELET</a>
							
							</div>
						
						</form>
						
					</div>
					
					<?php if($i%3!=0){?>
					
					<div class="col-md-1"></div>
					
					<?php } } } } ?>
						
						
						
					
				</div>
			
			</div>
			
			<div class="col-sm-1"></div>
				
		</div>
	
	</section>
	
</body>

</html>