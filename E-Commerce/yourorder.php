<?php

	session_start();
	
	require_once('previewfunction.php');

	$pro = new Preview;

?>


<?php

	if(isset($_GET['id']) && isset($_GET['order'])){
		$id = $_GET['id'];
		$last_id = $_GET['order'];
	}

?>

<?php 

	if(isset($_SESSION['username'])){ 
	
		
		$database = new DatabaseConnection();
		
		$user = $_SESSION['username'];
		
		$product = "";
		
		foreach($pro->readCart() as $key => $val){
			foreach($pro->readAll() as $key => $value){
				if($value['productId']==$val['productId']){
					$product.=$value['product']."/".$val['quantity']." ; ";
				}
			}
		}
		
		echo $product;
		echo $id;
		
		$sql = $pdo->prepare("UPDATE tbl_order SET orderProduct=? WHERE orderId=?");
		$sql->execute(array($product,$last_id));
		
		$sql = $pdo->prepare("UPDATE tbl_order SET orderPrice=? WHERE orderId=?");
		$sql->execute(array($id,$last_id));
		
		$sql = $pdo->prepare("DELETE FROM tbl_cart WHERE cartUsername=?");
		$sql->execute(array($user));

		$sql = $pdo->prepare("SELECT balance,userOrder FROM tbl_user WHERE username=?");
		$sql->execute(array($user));
		$result = $sql->fetch();
		
		$blc = $result['balance'];
		
		$blc -= $id; 
		
		$sql = $pdo->prepare("UPDATE tbl_user SET balance=? WHERE username=?");
		$sql->execute(array($blc,$user));
		
		
		$sql = $pdo->prepare("SELECT count(*) FROM tbl_order WHERE orderUsername=?");
		$sql->execute(array($user));
		$result = $sql->fetch();
		
		$sql = $pdo->prepare("UPDATE tbl_user SET userOrder=? WHERE username=?");
		$sql->execute(array($result['count(*)']+1,$user));
		
		$sql = $pdo->prepare("SELECT count(*) FROM tbl_cart WHERE cartUsername=?");
		$sql->execute(array($user));
		$res = $sql->fetch();

?>



<?php } 

	header('Location:index.php');
?>

