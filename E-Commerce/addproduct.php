<?php
	
	session_start();
	if(!isset($_SESSION['adminUser']))
	{	
		//if a user logged out then this page will redirect to his adminlogin page
		header("Location:adminlogin.php");
	}
	
	require_once("panelfunction.php");

	$add = new ProductAdd();
	
?>


<!DOCTYPE HTML>

<html lang="en-US">

<head>

	<meta charset="UTF-8">
	<title>MachMangso-Add Product</title>
	
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
				
				<div class="signin">
				
					<div class="mgs">
					
						<?php
						
							//define variables and set empty value
							
							$category=$product=$amount=$price=$discount= "";
							
							if($_SERVER['REQUEST_METHOD']=='POST'){
								
								$category = test_input($_POST['category']);
								$product = test_input($_POST['product']);
								$amount = test_input($_POST['amount']);
								$price = test_input($_POST['price']);
								$discount = test_input($_POST['discount']);
								
								$permited = array('jpg','jpeg','png','gif');
								
								$file_name = "";
								
								$file_name = $_FILES['image']['name'];
								$file_size = $_FILES['image']['size'];
								$file_temp = $_FILES['image']['tmp_name'];
								
								$div = explode('.',$file_name);
								$file_ext = strtolower(end($div));
								$unique_image = substr(md5(time()),0,10).'.'.$file_ext;
								$uploaded_image = "upload/".$unique_image;
								
								if(empty($_POST['category']) or empty($_POST['product']) or empty($_POST['amount']) or empty($_POST['price']) or empty($_POST['price'])){
									echo  "<p style='color:red'>* All field must be filled up...</p>";
								}
								elseif( empty($file_name)){
									$uploaded_image = "upload/"."preview.png";
									
									move_uploaded_file($file_temp,$uploaded_image);
									
									$var = $add->productAdd($category,$product,$amount,$price,$discount,$uploaded_image);
										
									if($var){
										echo $var;
									}
								}
								elseif($file_size>1024*1024){
									echo  "<p style='color:red'>* Image size must be less than 1 MB...</p>";
								}
								elseif(in_array($file_ext,$permited) === false){
									echo  "<p style='color:red'>* You can upload only:-".implode(', ',$permited)."...</p>";
								}
								else{
									
									move_uploaded_file($file_temp,$uploaded_image);
									
									$var = $add->productAdd($category,$product,$amount,$price,$discount,$uploaded_image);
										
									if($var){
										echo $var;
									}
								}
									
							}
							
							
								function test_input($data){
									$data = trim($data);
									$data = stripslashes($data);
									$data = htmlspecialchars($data);
									
									return $data;
								}
						?>
						
					</div>
				
				
					<h2 style="width:270px">ADD PRODUCT</h2>
					
					<form class="form1" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
							
						<label for="category">Category Name: </label>
						<select name="category" id="category">
						
							<option value="FROZEN FISH">FROZEN FISH</option>
							<option value="DRIED FISH">DRIED FISH</option>
							<option value="FRESH FISH">FRESH FISH</option>
							<option value="MEAT">MEAT</option>
							<option value="MEAT ALTERNATIVE">MEAT ALTERNATIVE</option>
						
						</select>
						<label for="product">Product Name : </label>
						<input type="text" placeholder="Enter product name" name="product" id="product" />
						<label for="amount">Amount : </label>
						<input type="text" placeholder="Enter product amount" name="amount" id="amount" />
						<label for="price">Price : </label>
						<input type="text" placeholder="Enter product price" name="price" id="price" />
						<label for="category">Discounts: </label>
						<select name="discount" id="category">
						
							<option value="0">No discount</option>
							<option value="5">5% discount</option>
							<option value="10">10% discount</option>
							<option value="15">15% discount</option>
							<option value="20">20% discount</option>
							<option value="25">25% discount</option>
						
						</select>
						
						<label for="picture">Picture : </label>
						<input type="file" name="image" id="picture" />
						
						<input type="submit" value="SAVE" id="signUp"  />
							
					</form>
				
				</div>
				
			</div>
				
		</div>
	
	</section>
	
</body>

</html>