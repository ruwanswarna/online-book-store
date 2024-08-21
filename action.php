<?php
	session_start();
	include("db.php");
    require 'config.php';
  
	
	if(isset($_POST['porderid'])){
        $porderid = $_POST['porderid'];
		$pid = $_POST['pid'];
		$pname = $_POST['pname'];
		$pprice = $_POST['pprice'];
		$pimage = $_POST['pimage'];
		$pcode	= $_POST['pcode'];
		$pweight = $_POST['pweight'];
        $pqty = 1;
		
		$stmt = $con->prepare("SELECT code FROM cart WHERE code=?");
		$stmt->bind_param("s",$pcode);
		$stmt->execute();
		$res = $stmt->get_result();
		$r = $res->fetch_assoc();
		$code = $r['code'];
       
        if(!$code){
			$query = $con->prepare("INSERT INTO cart(id,title,sellingPrice,image,qty,total_price,code,weight,total_weight) VALUES (?,?,?,?,?,?,?,?,?)");
			$query->bind_param("isssissss",$pid,$pname,$pprice,$pimage,$pqty,$pprice,$pcode,$pweight,$pweight);
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
		$stmt = $con->prepare("SELECT * FROM cart");
		$stmt->execute();
		$stmt->store_result();
		$rows = $stmt->num_rows;
		
		echo $rows;
	}
	
	if(isset($_GET['remove'])){
		$pid = $_GET['remove'];
		
		$stmt = $con->prepare("DELETE FROM cart WHERE id=?");
		$stmt->bind_param("i",$pid);
		$stmt->execute();
		
		$_SESSION['showAlert'] = 'block';
		$_SESSION['message'] = 'Item removed from the cart!';
		header('location:cart.php');
	}
		
	if(isset($_GET['clear'])){
		$stmt = $con->prepare("DELETE FROM cart");
		$stmt->execute();
		$_SESSION['showAlert'] = 'block';
		$_SESSION['message'] = 'All item removed from the cart!';
		header('location:cart.php');
	}
	
	if(isset($_POST['qty'])){
		$qty = $_POST['qty'];
		$pid = $_POST['pid'];
		$pprice = $_POST['pprice'];
		$pweight = $_POST['pweight'];
		
		$tprice = $qty*$pprice;
		$tweight = $qty*$pweight;
		
		$stmt = $con->prepare("UPDATE cart SET qty=?, total_price=? , total_weight=? WHERE id=?");
		$stmt->bind_param("issi",$qty,$tprice,$tweight,$pid);
		$stmt->execute();
		
		
    }
	
	if(isset($_POST['action']) && isset($_POST['action']) == 'order'){
		$products = $_POST['products'];
		$grand_total = $_POST['grand_total'];
		$grand_total_weight = $_POST['grand_total_weight'];
		
		$data = '';
		$stmt = $con->prepare("INSERT INTO orders(products,amount_paid)VALUES(?,?)");
		$stmt->bind_param("ss",$products,$grand_total);
		$stmt->execute();
	}
	
	
	

    
	
	?>