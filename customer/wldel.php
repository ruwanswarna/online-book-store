<?php 
  include("db.php");

if(isset($_POST['id'])){

	$wishlist_id = $_POST['id'];


	$query = "DELETE FROM wishlist WHERE wishlist . wlid ='$wishlist_id'  ";

	$result=mysqli_query($con,$query);

	if ($result) {
		echo $wishlist_id ;
	}


}

 ?>