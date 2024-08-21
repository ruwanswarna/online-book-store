<?php
	session_start();
    require 'config.php';
  

if(isset($_GET['clear'])){
		$stmt = $con->prepare("DELETE FROM cart");
		$stmt->execute();
		$_SESSION['showAlert'] = 'block';
		$_SESSION['message'] = 'All item removed from the cart!';
		header('location:pay.php');
	}
    
?>