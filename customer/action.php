<?php
	session_start();
     require 'config.php';
  
	
	if(isset($_POST['porderid'])){
        $porderid = $_POST['porderid'];
		$pid = $_POST['pid'];
		$pname = $_POST['pname'];
		$pprice = $_POST['pprice'];
		$pimage = $_POST['pimage'];
		$pcode	= $_POST['pcode'];
		$pweight = $_POST['pweight'];
		$customer_email = $_SESSION['customer_email'];
		$pqty = 1;
		
		$stmt = $con->prepare("SELECT code FROM rcart WHERE code=?");
		$stmt->bind_param("s",$pcode);
		$stmt->execute();
		$res = $stmt->get_result();
		$r = $res->fetch_assoc();
		$code = $r['code'];
       
        if(!$code){
			$query = $con->prepare("INSERT INTO rcart(id,title,sellingPrice,image,qty,total_price,code,weight,total_weight,customer_email) VALUES (?,?,?,?,?,?,?,?,?,?)");
			$query->bind_param("isssisssss",$pid,$pname,$pprice,$pimage,$pqty,$pprice,$pcode,$pweight,$pweight,$customer_email);
			$query->execute();
			
			echo '
				<div class="alert alert-success alert-dismissible mt-2">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Item added to your cart!</strong>
				</div>';
		}
		else{
			echo '
				<div class="alert alert-danger alert-dismissible mt-2">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Item already added to your cart!</strong>
				</div>';
			
		}
    }
    
	if(isset($_GET['cartItem']) && isset($_GET['cartItem']) == 'cart_item'){
		$stmt = $con->prepare("SELECT * FROM rcart");
		$stmt->execute();
		$stmt->store_result();
		$rows = $stmt->num_rows;
		
		echo $rows;
	}
	
	if(isset($_GET['remove'])){
		$pid = $_GET['remove'];
       
		$stmt = $con->prepare("DELETE FROM rcart WHERE id=?");
		$stmt->bind_param("i",$pid);
		$stmt->execute();
		
		$_SESSION['showAlert'] = 'block';
		$_SESSION['message'] = 'Item removed from the cart!';
		header('location:rcart.php');
	}
		
	if(isset($_GET['clear'])){
		$stmt = $con->prepare("DELETE FROM rcart");
		$stmt->execute();
		$_SESSION['showAlert'] = 'block';
		$_SESSION['message'] = 'All item removed from the cart!';
		header('location:rcart.php');
	}
	
	if(isset($_POST['qty'])){
		$qty = $_POST['qty'];
		$pid = $_POST['pid'];
		$pprice = $_POST['pprice'];
		$pweight = $_POST['pweight'];
		
		$tprice = $qty*$pprice;
		$tweight = $qty*$pweight;
		
		$stmt = $con->prepare("UPDATE rcart SET qty=?, total_price=? , total_weight=? WHERE id=?");
		$stmt->bind_param("issi",$qty,$tprice,$tweight,$pid);
		$stmt->execute();
		
		
    }
	
	
   
	
	?>