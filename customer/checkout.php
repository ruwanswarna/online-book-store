<?php
   session_start();
   include("header1.php");

   
   if(isset($_POST['checkout'])){
            $name = $_POST['fullname'];
			$address = $_POST['address'];
			$district = $_POST['district'];
			$postcode = $_POST['postcode'];
			$phone = $_POST['phone'];
			$email = $_POST['email'];
			$customer_email = $_SESSION['customer_email'];
			
			$sql = "INSERT INTO rorders(id,name,phone,address,district,postcode,email,checkout_id,customer_email) VALUES(?,?,?,?,?,?,?,?,?)";
           
			
			if($stmt = mysqli_prepare($con,$sql)){
				mysqli_stmt_bind_param($stmt,'issssssss',$param_id,$param_name,$param_phone,$param_address,$param_district,$param_postcode,$param_email,$param_checkout_id,$param_customer_email);
				$param_id = '';
                $param_name = $name;
				$param_address = $address;
				$param_district = $district;
				$param_postcode = $postcode;
				$param_phone = $phone;
				$param_email = $email;
                $param_customer_email = $customer_email;
			    $param_checkout_id = uniqid();
				$_SESSION['checkout_id'] = $param_checkout_id;
				
				if(mysqli_stmt_execute($stmt))
				{
					echo "<script> window.location.href = 'order_review.php';</script>";
				}else{
					echo "Error Occured";
				}
				
			}
		}

?>



  <!-- page -->
   <div class="container">
        <div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li>
						<a href="home.php">Home</a>
					</li>
					<li>Checkout Page</li>
				</ul>
			</div>
			<!-- //page -->
		</div>
	</div>
	
	
	<!--start-checkout-page-->
	<div class="container">
		<!--Customer details table start-->
		<div class="row">
			<div class="col-lg-6 col-12">
				<div class="box">
					<div class="header-box">
						<center>
							<h3>Your Details</h3>
						</center>
						<form method="post" id="checkoutform" style="position:relative;">
							<div class="form-group">
								<label>Full name </label>
								<input type="text" class="form-control" name="fullname" placeholder="Enter your full name" required>
								<div class="invalid-feedback">please enter fullname</div>
							</div>
							<div class="form-group">
								<label>Phone Number</label>
								<input type="text" class="form-control" name="phone" placeholder="Enter your phone number" required>
								<div class="invalid-feedback">please enter phone number</div>
							</div>
							<div class="form group">
								<label>Email address</label>
								<input type="email"class="form-control" name="email" placeholder="Enter your email" required >
								<div class="invalid-feedback">please enter email</div>
							</div>
							<div class="form-group">
								<label>Address <span></span></label>
								<input type="text" class="form-control" name="address" placeholder="Enter your address" required>
								<div class="invalid-feedback">please enter address</div>
							</div>
							<div class="form-group">
								<label>District<span></span></label>
								<input type="text" class="form-control" name="district" placeholder="Enter your district" required>
								<div class="invalid-feedback">please enter district</div>
							</div>
							<div class="form-group">
								<label>Postcode / ZIP</label>
								<input type="text" class="form-control" name="postcode" placeholder="Enter your postcode" required>
								<div class="invalid-feedback">please enter post code</div>
							</div>
							<br>
							<div class="form-group">
								<a href="cart.php" class="btn btn-default"><i class="fa fa-chevron-left"></i>Go to Cart</a>
								<button class="btn btn-default" id="checkout" type="submit" name="checkout">Go to Payment<i class="fa fa-chevron-right"></i></button>
							</div>
							<br>
							<br>
							<div class="create__account">
								<label>Do you want to create an account ?</label>
								<a href="account.php" class="btn btn-primary">Yes</a>
								<a href="" class="btn btn-primary">No</a>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!--Delivery details table stop-->
			
			<div class="col-lg-6 px-4 pb-4" id="order">
				<div class="box">
					<h4 class="text-center text-info p-2">Complete Your Order!</h4>
					<table class="table">
						<tr>
							<center>
								<h3>Order Summary</h3>
							</center>
						</tr>
						<tr>
							<th>Product</th>
							<th>Price</th>
							<th>Quantity</th>
							<th>Sub-Total</th>
						</tr>
						<?php
							require 'config.php';
							$stmt = $con->prepare("SELECT * FROM rcart");
							$stmt->execute();
							$result = $stmt->get_result();
							$grand_total = 0;
							$grand_total_weight = 0;
							global $del_cost;
							$tol_amount = 0;
							while($row = $result->fetch_assoc()){
						?>
						<tr>
							<td><?= $row['title'] ?></td>
							<td>Rs.<?= number_format($row['sellingPrice'],2); ?></td>
							<td><?= $row['qty'] ?></td>
							<td>Rs.<?= number_format($row['total_price'],2); ?></td>
						</tr>
						<?php 
							$grand_total +=$row['total_price'];
							$grand_total_weight +=$row['total_weight'];
						?>
						<?php
							}
						?>
						<?php
							if((0<=$grand_total_weight)&&($grand_total_weight<250)){
								$del_cost = 100;
							}else if((250<=$grand_total_weight)&&($grand_total_weight<500)){
								$del_cost = 125;
							}else if((500<=$grand_total_weight)&&($grand_total_weight<1000)){
								$del_cost = 150;
							}else if((1000<=$grand_total_weight)&&($grand_total_weight<1500)){
								$del_cost=175;
							}else if((1500<=$grand_total_weight)&&($grand_total_weight<2000)){
								$del_cost=200;
							}else if((2000<=$grand_total_weight)&&($grand_total_weight<2500)){
								$del_cost = 225;
							}else if((2500<=$grand_total_weight)&&($grand_total_weight<3000)){
								$del_cost = 250;
							}else if((3000<=$grand_total_weight)&&($grand_total_weight<4000)){
								$del_cost = 300;
							}else if((4000<=$grand_total_weight)&&($grand_total_weight<5000)){
								$del_cost = 350;
							}else if((5000<=$grand_total_weight)&&($grand_total_weight<6000)){
								$del_cost = 400;
							}else if((6000<=$grand_total_weight)&&($grand_total_weight<7000)){
								$del_cost = 450;
							}else if((7000<=$grand_total_weight)&&($grand_total_weight<8000)){
								$del_cost = 500;
							}else if((8000<=$grand_total_weight)&&($grand_total_weight<9000)){
								$del_cost = 550;
							}else if((9000<=$grand_total_weight)&&($grand_total_weight<10000)){
								$del_cost = 600;
							}else if((10000<=$grand_total_weight)&&($grand_total_weight<11000)){
								$del_cost = 650;
							}else if((11000<=$grand_total_weight)&&($grand_total_weight<12000)){
								$del_cost = 700;
							}else if((12000<=$grand_total_weight)&&($grand_total_weight<13000)){
								$del_cost = 750;
							}else if((13000<=$grand_total_weight)&&($grand_total_weight<14000)){
								$del_cost = 800;
							}else if((14000<=$grand_total_weight)&&($grand_total_weight<15000)){
								$del_cost = 850;
							}else if((15000<=$grand_total_weight)&&($grand_total_weight<16000)){
								$del_cost = 900;
							}else if((16000<=$grand_total_weight)&&($grand_total_weight<17000)){
								$del_cost = 950;
							}else if((17000<=$grand_total_weight)&&($grand_total_weight<18000)){
								$del_cost = 1000;
							}else if((18000<=$grand_total_weight)&&($grand_total_weight<19000)){
								$del_cost = 1050;
							}else if((19000<=$grand_total_weight)&&($grand_total_weight<20000)){
								$del_cost = 1100;
							}else if((20000<=$grand_total_weight)&&($grand_total_weight<25000)){
								$del_cost = 1250;	
							}else(25000<=$grand_total_weight){
								$del_cost = 1500
							}
						?>	
						<tr>
							<td colspan="3"><b>Total</b></td>
							<td>Rs.<?= number_format($grand_total,2); ?></td>
						</tr>
						<tr>
							<td colspan="3"><b>Delivery Cost</b></td>
							<td>Rs.<?= number_format($del_cost,2); ?></td>
						</tr>
						<?php
							$tol_amount = $grand_total+$del_cost ;
						?>
						</tr>
							<td colspan="3"><b>Total Amount</b></td>
							<td>Rs.<?= number_format($tol_amount,2); ?></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
		<!--end-checkout-page-->	
	<br>
	<br>

	<?php 
        
    include("footer.php");
    
    ?>
   
	
	
	
	<!--//shopping cart-->
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
	<!--//shopping cart-->


  <script src="js/jquery-2.2.3.min.js"></script>
  <script src="js/bootstrap-337.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/validator.min.js"></script>
  <script>
	$(document).ready(function(){
		
		$('#checkout').click(function(){
		
			$('#checkoutform').addClass('was-validated')
		
		});
	
	
		window.setTimeout(function() {
			$(".alert").fadeTo(500,0).slideUp(500,function(){
				$(this).remove();
			});
		},2000);
		
	});
	
 </script>
 
</body>

</html>
