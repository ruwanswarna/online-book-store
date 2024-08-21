<?php
  

	include("db.php");
    include("header.php");
	$checkout_id = $_SESSION['checkout_id'];
	
	
	$grand_total = 0;
	$grand_total_weight = 0;
	global $del_cost;
	$tol_amount = 0;
	$allItems = '';
	$items = array();
	
	
	$sql = "SELECT CONCAT(title, '(',qty,')') AS ItemQty, total_price, total_weight FROM cart";
	$stmt = $con->prepare($sql);
	$stmt->execute();
	$result = $stmt->get_result();
	while($row = $result->fetch_assoc()){
		$grand_total +=$row['total_price'];
		$grand_total_weight +=$row['total_weight'];
		$items[] = $row['ItemQty'];
	}
	
	$allItems = implode(",",$items);

?>
<?phP


	if(isset($_POST['payhere'])){
		$merchant_id         = $_POST['merchant_id'];
		$order_id             = $_POST['order_id'];
		$payhere_amount     = $_POST['payhere_amount'];
		$payhere_currency    = $_POST['payhere_currency'];
		$status_code         = $_POST['status_code'];
		$md5sig                = $_POST['md5sig'];
		
		$merchant_secret = '12345'; // Replace with your Merchant Secret (Can be found on your PayHere account's Settings page)

		$local_md5sig = strtoupper (md5 ( $merchant_id . $order_id . $payhere_amount . $payhere_currency . $status_code . strtoupper(md5($merchant_secret)) ) );

		if (($local_md5sig === $md5sig) AND ($status_code == 2) ){
			
			
			
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
					<li>Payhere Page</li>
				</ul>
			</div>
			<!-- //page -->
		</div>
	</div>

	<div class="container">
		<!--Customer details table start-->
		<div class="row">
			<div class = "col-sm-2"></div>
			<div class="col-lg-6 col-12">
				<div class="box">
					<form method="post" action="https://sandbox.payhere.lk/pay/checkout">   
						<input type="hidden" name="merchant_id" value="1214495">    <!-- Replace your Merchant ID -->
						<input type="hidden" name="return_url" value="http://sample.com/return">
						<input type="hidden" name="cancel_url" value="http://sample.com/cancel">
						<input type="hidden" name="notify_url" value="http://sample.com/notify">  
						<input type="hidden" name="order_id" value="ItemNo12345">
						<input type="hidden" name="items" value="<?=$allItems; ?>"><br>
						<input type="hidden" name="currency" value="LKR">
						<input type="hidden" name="tweight" value="<?=$grand_total_weight; ?>">
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
						<input type="hidden" name="dcost" value="<?=$del_cost; ?>">
						<?php
							$tol_amount = $grand_total+$del_cost ;
						?>
						<input type="hidden" name="amount" value="<?=$tol_amount; ?>">  
						<br><br>Customer Details<br><br>
						<input type="text" class="form-control" name="first_name" placeholder="Enter your first name" required><br>
						<input type="text" class="form-control" name="last_name" placeholder="Enter your last name" required><br>
						<input type="email"class="form-control" name="email" placeholder="Enter your email" required ><br>
						<input type="text" class="form-control" name="phone" placeholder="Enter your phone number" required><br>
						<input type="text" class="form-control" name="address" placeholder="Enter your address" required><br>
						<input type="text" class="form-control" name="city" placeholder="Enter your city" required><br>
						<input type="hidden" name="country" value="Sri Lanka"><br><br> 
						<a href="act.php?clear=all"></a><input type="submit" class="btn btn-info" name="payhere" value="Payhere">	
					</form> 
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
	
 
</body>

</html>

