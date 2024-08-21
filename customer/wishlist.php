<?php 

$query = "SELECT * FROM wishlist";
$result=mysqli_query($con,$query);


while ($set=mysqli_fetch_assoc($result)) {
	$bkid = $set['bid'];

	 $getQuery = "SELECT * FROM products WHERE id ='$bkid' ";
	$getResult=mysqli_query($con,$getQuery);

	while ($getSet=mysqli_fetch_assoc($getResult)) {

		$title = $getSet['title'];

		$view ='<div class="wishlist" id="a'.$set["wlid"].'" style="display: flex;align-items: baseline;text-transform: capitalize; justify-content: space-between;padding-bottom:5px;boder-bottom:1px solid #eee">
 	<div class="title" style="font-size: 18px;font-weight: 600; flex: 0 0 60%;align-self:flex-end">'.$getSet["title"].'</div>
 	<div class="price" > RS '.$getSet["sellingPrice"].'</div>
 	<div >
 	<button class="details btn btn-primary">View details</button>
 	<button id="'.$set["wlid"].'" class="delete btn btn-primary"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
 	</div>
 </div>';
echo $view;
	}

}


 ?>
 <script src="js/jquery-1.16.0.popper.min.js"></script>
	<script src="js/jquery-2.2.3.min.js"></script>

<script>
		var wishlist_id;
		//var uid = document.getElementById('u_id').value;
    	$('.delete').click(function(){
        wishlist_id = $(this).attr('id');


        //alert(wishlist_id);
    	$.ajax({
				url: 'wldel.php',
				method: 'POST',
				data: {id: wishlist_id},
				success:function(response){
					var elementid = "a"+response;
					//alert(elementid);
					$('#' + elementid).css("display", "none");
				}
			});

})
    	

</script>
 


 