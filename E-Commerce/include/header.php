<header class="header">
	
	<div class="row">
		<div class="col-sm-9">
	  
			<div class="row">
				<div class="col-sm-3 logo">
					<a href="index.php"><img src="image/logo.jpg" alt="MachMangso" height="70px" /></a>
				</div>
				<div class="col-sm-6">
		  
					<form action="./search.php" method="GET">
						<input type="text" name="search" placeholder="Search Here..." required >
						<button type="submit" class="button1">Search</button>
					</form>
			  
				</div>
				
				<?php 
				
					if(isset($_SESSION['username'])){ 
						
						$user = $_SESSION['username'];
			
						$sql = $pdo->prepare("SELECT balance,userOrder FROM tbl_user WHERE username=?");
						$sql->execute(array($user));
						$result = $sql->fetch();
						
						$blc = $result['balance'];
						
						$ord = $result['userOrder'];
						
						$sql = $pdo->prepare("SELECT count(*) FROM tbl_cart WHERE cartUsername=?");
						$sql->execute(array($user));
						$res = $sql->fetch();
				
				?>
				
				<div class="col-sm-2 ciko">
					
						<p>Total Balance : <?php echo $blc;  ?></p>
						<p>Items in Cart&nbsp : <?php  echo $res['count(*)']; ?></p>
						<p>Total Order&nbsp &nbsp &nbsp: <?php echo $result['userOrder'];  ?></p>
					
					</div>
			
				<?php } ?>
				
			</div>
	  
		</div>
		
		<div class="col-sm-2">
	
			<div class="col-sm-7">
				<a href="contractus.php"><button type="button" class="button2">Need Help?</button></a>
			</div>
			<div class="col-sm-5 sign">
				
				<a href=''><input id='sub' type='submit' value='SIGN IN' /></a>
				
			
			</div>
			
	</div>
	
</header>