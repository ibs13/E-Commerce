<?php
	
	session_start();
	if(!isset($_SESSION['adminUser']))
	{	
		//if a user logged out then this page will redirect to his adminlogin page
		header("Location:adminlogin.php");
	}
	
?>


<?php
	
	require_once("previewfunction.php");
	
	$pre = new Preview;
	
	if($_SERVER['REQUEST_METHOD']=='POST' && !empty($_POST['scratchQuantity'])){
		$SA =  $_POST['scratchAmount'];
		$SQ =  $_POST['scratchQuantity'];
		
		$i = 0;
		
		if($SA==100){
			$digit = 8;
			$amount = 100;	
			}else if($SA==500){
			$digit = 12;
			$amount = 500;	
		}else if($SA==1000){
			$digit = 16;
			$amount = 1000;	
		}
		
		while($i<$SQ){
			$flag = 0;
			$itr = 0;
			$cardNo = '';
			while($itr<$digit){
				$RandomNumber1 = mt_rand(0,9);
				$RandomNumber2 = mt_rand(1,100);
				
				if($itr%2==0){
				$number = (($RandomNumber1*$RandomNumber2)+$RandomNumber1)%10;
				}else{
				$number = (($RandomNumber1*$RandomNumber2)-$RandomNumber1)%10;
				}
				
				$cardNo = $cardNo.strval($number);
				
				$itr++;
			}
			
			foreach($pre->readBalance($amount) as $key => $val){
				if($val['balanceNumber']==$cardNo){
					$flag = 1;
					break;
				}
			}
			
			if($flag==0){
				$database = new DatabaseConnection();
				
				$query = $pdo->prepare("INSERT INTO tbl_balance(balanceAmount,balanceNumber,balanceStatus) VALUES(?,?,?)");
					
				$query->execute(array($amount,$cardNo,$flag));
				$balanceData = $query->fetch();
				
				$i++;
			}else{
				$flag = 0;
			}
			
		}
			
	}else{
		header("Location:balancemanager.php");
	}

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
	
	<header class="header">
	
		<div class="row">
			<div class="col-sm-4">
				<a href="index.php"><img src="image/logo.jpg" alt="MachMangso" height="70px" /></a>
			</div>
		  
				
			<div class="col-sm-4 logo">
				<h1 style="color:red;margin-left:78px">ADMIN PANEL</h1>
			</div>
				
			<div class="col-sm-4"></div>
				
			
		</div>
	
	</header>
	
	<section>
	
		<div class="row navigation">
			
			<div class="col-sm-1"></div>
			
			<div class="col-sm-10 poster">
				
				<img id="poster" src="image/poster.jpg" alt="poster" width="1122px" height="250px" />
				
				<div class="row blc">
				
					<h1>Print Scratch Card</h1>
				
					<div class="col-md-3"></div>
					
					<div class="col-md-6 blcprint">
							
							<p style="margin-bottom:50px;margin-left:140px"><?php echo $SQ ?> Scratch Cards Generated Successfully<p>
							
							<p>Are You Want to Generate More Scratch Cards Please <a href="balancemanager.php">Click Here</a><p>
							
							<p>Are You Want Print Generated Scratch Cards : <a href="blcprint.php"><button>Print</button></a></p>
							
						
						
					</div>
				
				</div>
			
			</div>
				
		</div>
	
	</section>
	
</body>

</html>