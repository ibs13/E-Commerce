<?php

	session_start();
	
	include "previewfunction.php";
	
	$pro = new Preview;

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
			
				<img id="poster" src="image/poster.jpg" alt="poster" width="1120px" height="250px" />
				
				<div class="row">
				
					<?php
						
						if($_SERVER['REQUEST_METHOD']=='GET'){
							$query = $_GET['search']; 
							
							$num = strlen($query);
							 
							$query = strtolower(htmlspecialchars($query)); 
							$i=0;
						foreach($pro->readAll() as $key => $value){
							
							$product = strtolower(substr($value['product'],0,$num));
							
							if($query==$product){
								$i++;
					?>

					<div class="col-md-3 u_pre">
					
						<form action="cartmanager.php?id=<?php echo $value['productId']; ?>" target="_blank" method="post">
						
							 <div class="thumbnail pre">
								<h3><?php echo $value['product'];?></h3>
								<img src="<?php echo $value['picture'];?>" alt="Image is not available" style="width:250px;height:150px">
								<p><?php echo $value['amount'];?></p>
								<?php
								if($value['discount']!=0){
									
									$newPrice = $value['price'] - (($value['price']*$value['discount'])/100);
										
								?>
								
								<h5><a id="n_dis"><?php echo "Now Tk.".$newPrice."/=";?></a>
								<a id="dis"><?php echo "Before Tk.".$value['price']."/=";?></a></h5>
								
								<?php }else{ ?>
								
								<h5 id="n_dis"><?php echo "Tk.".$value['price']."/=";?></h5>
								
								<?php } ?>
							
							</div>
							<div class="thumbnail prev">
								
								<table>
								
								<tr>
									<td><label for="quantity">Quantity : </label></td>
									<td><input type="number" value=1 name="quantity" id="quantity" min="1" max="50"/></td>
								</tr>
								
								</table>
								<input type="submit" value="Add To Shopping Bag" />
							
							</div>
						
						</form>
						
					</div>
					
					<?php if($i%3!=0){?>
					
					<div class="col-md-1"></div>
					
						<?php } } } 
						
						if($i==0){ ?>
							<p style="color:red;text-align:center">No Product Found</p>
						<?php } } ?>
						
					
				</div>
			
			</div>
				
		</div>
	
	</section>
	
</body>

</html>