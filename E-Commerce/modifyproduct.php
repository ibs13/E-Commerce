<?php
	
	session_start();
	if(!isset($_SESSION['adminUser']))
	{	
		//if a user logged out then this page will redirect to his adminlogin page
		header("Location:adminlogin.php");
	}
	
	
	if(!isset($_GET['id']) || $_GET['id']==NULL){
		header("previewproduct.php");
	}
	else{
		 $id = $_GET['id'];
	}
	
	include "previewfunction.php";
	
	$pro = new Preview;
	
	
?>


<!DOCTYPE HTML>

<html lang="en-US">

<head>

	<meta charset="UTF-8">
	<title>MachMangso-Modify Product</title>
	
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
			
				
					<div class="mgs">
					
						<!--?php
						
							//define variables and set empty value
							
							$category=$product=$amount=$price=$discount= "";
							
							if($_SERVER['REQUEST_METHOD']=='POST'){
								
								$amount = test_input($_POST['amount']);
								$price = test_input($_POST['price']);
								$discount = test_input($_POST['discount']);
								
								$permited = array('jpg','jpeg','png','gif');
								
								/*$file_name = "";
								
								$file_name = $_FILES['picture']['name'];
								$file_size = $_FILES['picture']['size'];
								$file_temp = $_FILES['picture']['tmp_name'];
								
								$div = explode('.',$file_name);
								$file_ext = strtolower(end($div));
								$unique_image = substr(md5(time()),0,10).'.'.$file_ext;
								$uploaded_image = "upload/".$unique_image;*/
								
								if(empty($_POST['amount']) or empty($_POST['price']) or empty($_POST['price'])){
									echo  "<p style='color:red'>* All field must be filled up...</p>";
								}
								/*elseif( empty($file_name)){
									$uploaded_image = "upload/"."preview.png";
									
									move_uploaded_file($file_temp,$uploaded_image);
									
									$var = $pre->upToDate($id,$category,$product,$amount,$price,$discount,$uploaded_image);
										
								}
								elseif($file_size>1024*1024){
									echo  "<p style='color:red'>* Image size must be less than 1 MB...</p>";
								}
								elseif(in_array($file_ext,$permited) === false){
									echo  "<p style='color:red'>* You can upload only:-".implode(', ',$permited)."...</p>";
								}*/
								else{
									
									//move_uploaded_file($file_temp,$uploaded_image);
									
									$var = $pre->upToDate($category,$product,$amount,$price,$discount);
									
									
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
						?-->
						
					</div>
				
				
				<div class="signin">
				
					<h2 style="width:325px">MODIFY PRODUCT</h2>
					
					<form class="form1" action="update.php?id=<?php echo $id; ?>" method="post">
					
						<?php
							
							$sql = $pdo->prepare("SELECT * FROM tbl_product WHERE productId=?");
							$sql->execute(array($id));
							$result = $sql->fetch();
						 
						?>
							
						<label for="category">Category Name: </label>
						<h3 style="color:#1ABC9C"><?php echo $result['category']; ?></h3>
						<label for="product">Product Name : </label>
						<h3 style="color:#1ABC9C"><?php echo $result['product']; ?></h3>
						<label for="amount">Amount : </label>
						<input type="text" value="<?php echo $result['amount']; ?>" name="amount" id="amount" />
						<label for="price">Price : </label>
						<input type="text" value=<?php echo $result['price']; ?> name="price" id="price" />
						<label for="category">Discounts: </label>
						<select name="discount" id="category">
						
							<option value="<?php echo $result['discount']; ?>"><?php echo $result['discount']; ?></option>
							<option value="0">No discount</option>
							<option value="5">5% discount</option>
							<option value="10">10% discount</option>
							<option value="15">15% discount</option>
							<option value="20">20% discount</option>
							<option value="25">25% discount</option>
						
						</select>
						
						<input type="submit" value="Update" id="signUp"  />
							
					</form>
				
				</div>
				
			</div>
				
		</div>
	
	</section>
	
</body>

</html>