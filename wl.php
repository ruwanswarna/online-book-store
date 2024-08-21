<?php 
include("db.php");
$setStatus = '';

if(isset($_POST['id'])){
	$bkid = $_POST['id'];
	$uid = $_POST['cid'];
	
$getQuery = "SELECT * FROM wishlist";
$getResult=mysqli_query($con,$getQuery);

while ($set=mysqli_fetch_assoc($getResult)) {

	if ($set['bid'] == $bkid ) {
		$setStatus = "have";
	}

	}


if( $setStatus !== "have"){
	$query="INSERT INTO wishlist(umail,bid)
		VALUES('$uid','$bkid')";

$result=mysqli_query($con,$query);
if ($result){
	echo " Added to Wishlist";
}
}else{
	echo " Book is in wishlist";
}

}
 ?>