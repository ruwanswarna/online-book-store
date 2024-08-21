<?php
  

	include("db.php");
    include("header1.php");
	
	
	
	$grand_total = 0;
	$allItems = '';
	$items = array();
	
	$sql = "SELECT CONCAT(title, '(',qty,')') AS ItemQty, total_price FROM rcart";
	$stmt = $con->prepare($sql);
	$stmt->execute();
	$result = $stmt->get_result();
	while($row = $result->fetch_assoc()){
		$grand_total +=$row['total_price'];
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
						<input type="hidden" name="amount" value="<?=$grand_total; ?>">  
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

