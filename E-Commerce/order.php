<?php

	session_start();
	
	require_once('previewfunction.php');

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
			
				<img id="poster" src="image/poster.jpg" alt="poster" width="1132px" height="250px" />
				
				<div class="row check">
				
					<div class="col-sm-4"></div>
					
					<div class="col-sm-4">
					
					<?php
					
						if($_SERVER['REQUEST_METHOD']=='POST'){
							
							$pro = new Preview;
							
							$user = $_SESSION['username'];
							$sts = 0;
							$place = $_POST['place'];
							$address = $_POST['address'];
							$phn = $_POST['phn'];
							
							$item = $res['count(*)'];
							
							$query = $pdo->prepare("INSERT INTO tbl_order(orderUsername,orderPlace,orderAddress,orderPhn,orderStatus) VALUES(?,?,?,?,?)");
					
							$query->execute(array($user,$place,$address,$phn,$sts));
							
							$last_id = $pdo->lastInsertId();
					
							$orderData = $query->fetch();
							
							$total = 0;
							
							foreach($pro->readCartpro() as $key => $value){
								
								$id = $value['productId'];
								$quan = $value['quantity'];
								
								$sql = $pdo->prepare("SELECT price,discount FROM tbl_product WHERE productId=?");
								$sql->execute(array($id));
								$result = $sql->fetch();
								
								if($result['discount']!=0){
									$t_price = ($result['price']-(int)(($result['price']*$result['discount'])/100));
								}else{
									$t_price = $result['price']*$quan;
								}
								
								$total+=$t_price;
							}
							
							$sql = $pdo->prepare("SELECT * FROM tbl_offer WHERE offerOrder=?");
							$sql->execute(array($ord));
							$result = $sql->fetch();
							
							if($result['offerCat']=='SPECIAL'){
									$bl = $result['offerOff'];
								if($result['offerType']=='DISCOUNT'){
									$ls = ($total*$bl)/100;
									$ls = (int)$ls;
								}else{
									$ls = $bl;
								}
								$vat = ($total*15)/100;
								$vat = (int)$vat;
								$TP  = $total + $vat - $ls;
								$z = 1;
								
							}else if($result['offerOrder']==$ord-1){
									$bl = $result['offerOff'];
								if($result['offerType']=='DISCOUNT'){
									$ls = ($total*$bl)/100;
									$ls = (int)$ls;
								}else{
									$ls = $bl;
								}
								$vat = ($total*15)/100;
								$vat = (int)$vat;
								$TP  = $total + $vat - $ls;
								$z = 1;
							}else{
								$vat = ($total*15)/100;
								$vat = (int)$vat;
								$TP = $total + $vat;
								$z = 0;
							}
							
							
						?>
							
						<h1>CHECK OUT</h1>
						
						<p>Username : <?php echo $user;?></p>
						<p>Place&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp: <?php echo $place;?></p>
						<p>Address&nbsp &nbsp &nbsp: <?php echo $address;?></p>
						<p>Mobile No.&nbsp : <?php echo $phn;?></p>
						<p>Total Item&nbsp &nbsp: <?php echo $item;?></p>
						<p>Price&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp : <?php echo $total.'/=';?></p>
						<p>VAT&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp: <?php echo $vat.'/=';?></p>
						<?php
						
							if($z==1){
						
						?>
						<p>LESS&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp: <?php echo $ls.'/=';?></p>
						
						<?php }?>
						<hr />
						<p>TOTAL&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp: <?php echo $TP.'/=';?></p>
						<?php
						
						if($blc<$TP){
							echo "<p style='text-align:center;margin-left:0'>You don't have sufficient balance <br /> <a href='recharge.php'>recharge</a> please</p>";
						}else{ ?>
							
						<a href="yourorder.php?id=<?php echo $TP; ?>&order=<?php echo $last_id; ?>"><button>CONFIRMED</button></a>
						
						
						<?php } }else{
						
					?>
					
					
					
					<h1>ORDER NOW</h1>
						
						
					<form class="form1" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
							
						<label for="category">Your Place : </label>
						<select name="place" id="place">
						
							<option value="ATUA">ATUA</option>
							<option value="DILALPUR">DILALPUR</option>
							<option value="EDWARD COLLEGE">EDWARD COLLEGE</option>
							<option value="GOBINDA">GOBINDA</option>
							<option value="GOPALPUR">GOPALPUR</option>
							<option value="JHUGIPARA">JHUGIPARA</option>
							<option value="KACHARI PARA">KACHARI PARA</option>
							<option value="KOFILUDDIN PARA">KOFILUDDIN PARA</option>
							<option value="KRISHNOPUR">KRISHNOPUR</option>
							<option value="LIBRARY BAZAR">LIBRARY BAZAR</option>
							<option value="MERIL">MERIL</option>
							<option value="MOJAHID CLUB">MOJAHID CLUB</option>
							<option value="MOKTOB">MOKTOB</option>
							<option value="MONDOLPARA">MONDOLPARA</option>
							<option value="POULANPUR">POULANPUR</option>
							<option value="PUST">PUST</option>
							<option value="RADHANAGAR">RADHANAGAR</option>
							<option value="RAGHABPUR">RAGHABPUR</option>
							<option value="SADHUPARA">SADHUPARA</option>
							<option value="SHALGARIA">SHALGARIA</option>
							<option value="SHIBRAMPUR">SHIBRAMPUR</option>
							<option value="TERMINAL">TERMINAL</option>
							
						</select>
						<label for="address">ADDRESS : </label>
						<input type="text" placeholder="Enter your address" name="address" id="address" required/>
						<label for="phn">Mobile No. : </label>
						<input type="text" placeholder="Enter your mobile no." name="phn" id="phn" required/>
						
						<?php 
						
							$sql = $pdo->prepare("SELECT count(*) FROM tbl_cart WHERE cartUsername=?");
							$sql->execute(array($_SESSION['username']));
							$result = $sql->fetch();
							
							if($result['count(*)']>0){
						
						?>
						
						
						<input type="submit" value="Check Out" id="signUp" />
						
							<?php }else{ ?>
							
						<a href="freshfish.php"><p style="margin-left:150px;color:green;text-decoration:underline">Add Product</p><a>
							
							
							<?php } ?>	
					</form>
					
					<?php } ?>
					
					</div>
				
				</div>
			
			</div>
				
		</div>
	
	</section>
	
</body>

</html>