<?php
  

	include("db.php");
    include("header.php");
   
    $checkout_id = $_SESSION['checkout_id'];
	$output = '';
	$sql = "SELECT * FROM orders WHERE  checkout_id = '$checkout_id'";
	
	$result = mysqli_query($con,$sql);
	
	if($result)
	{
		while ($row = mysqli_fetch_array($result)){
			$output .= '<h5>Full Name:-'.$row['name'].'</h5>
			<br>
			<h5>Address:-'.$row['address'].'</h5>
			<br>
			<h5>Phone Number:- '.$row['phone'].'';
		}
	}
   
	
?>


    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <br>
                <h1 class="text-primary text-center"><strong>Thank you!For shopping with us.</strong></h1>
                <h3 class="text-center">Your payment has been successfully.</h3>
                <br>
                <div class="col-sm-2"></div>
                <div class="col-sm-6" style=" width: 800px;height: 250px;box-shadow: 5px 5px 10px;">
				    <h3 class="text-center text-primary"><strong>Delivery Address</strong></h3>
                    <center>
					   <?php echo $output; ?>
				    </center>
			    </div>
              
            </div>
        </div>
    </div>
    <br>
    <br>
    
    	<?php 
        
    include("footer.php");
    
    ?>
   
	
	
 

  <script src="js/jquery-2.2.3.min.js"></script>
  <script src="js/bootstrap-337.min.js"></script>

	<script type="text/javascript">
	$(document).ready(function(){
		
		$(".itemQty").on('change', function(){
			var $el = $(this).closest('tr');
			
			var pid = $el.find(".pid").val();
			var pprice = $el.find(".pprice").val();
			var pweight = $el.find(".pweight").val();
			var qty = $el.find(".itemQty").val();
			location.reload(true);
			
			$.ajax({
				url: 'action.php',
				method: 'post',
				cache: false,
				data: {qty:qty,pid:pid,pprice:pprice,pweight:pweight},
				success: function(response){
					console.log(response);
				}
				
			});
			
		});
		
		load_cart_item_number();
		
		function load_cart_item_number(){
			$.ajax({
				url: 'action.php',
				method: 'get',
				data: {cartItem:"cart_item"},
				success:function(response){
					$("#cart-item").html(response);
				}
			});
		}
		
	});
	</script>
        
  

</body>

</html>
