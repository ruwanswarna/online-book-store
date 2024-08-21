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
	


    if(isset($_POST['cod'])){
           
       
            $sql = "SELECT * FROM orders WHERE checkout_id = '$checkout_id'";
            $result = mysqli_query($con,$sql);
            
            while($row = mysqli_fetch_array($result)){
                    $q1 = "INSERT INTO pay(id,date_of_purchase,status,payment_method,paid)VALUES(?,?,?,?,?)";
                
                   
                    $stmt1 = mysqli_prepare($con,$q1);
                  
                    mysqli_stmt_bind_param($stmt1,'issss',$param_id,$param_dop,$param_status,$param_payment_method,$param_paid);
                 
                    $param_id = '';
                    $param_dop = date('Y-m-d h:i:s');
                    $param_status = "order placed";
                    $param_payment_method = "COD";
                    $param_paid = 'no';
                    $param_checkout_id = $checkout_id;
                    
                    if(mysqli_stmt_execute($stmt1)){
                      
                            echo "<script> window.location.href = 'pay.php';</script>";
                    }
            }
        
    }
	
	if(isset($_POST['payhere'])){
           
       
            $sql = "SELECT * FROM orders WHERE checkout_id = '$checkout_id'";
            $result = mysqli_query($con,$sql);
            
            while($row = mysqli_fetch_array($result)){
                    $q1 = "INSERT INTO pay(id,date_of_purchase,status,payment_method,paid)VALUES(?,?,?,?,?)";
                
                   
                    $stmt1 = mysqli_prepare($con,$q1);
                  
                    mysqli_stmt_bind_param($stmt1,'issss',$param_id,$param_dop,$param_status,$param_payment_method,$param_paid);
                 
                    $param_id = '';
                    $param_dop = date('Y-m-d h:i:s');
                    $param_status = "order placed";
                    $param_payment_method = "Payhere";
                    $param_paid = 'no';
                    $param_checkout_id = $checkout_id;
                    
                    if(mysqli_stmt_execute($stmt1)){
                      
                            echo "<script> window.location.href = 'payhere.php';</script>";
                    }
            }
        
    }

	
?>

	<div class="container">
		<div class="row">
			<!-- page -->
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li>
						<a href="home.php">Home</a>
					</li>
					<li>Payment Page</li>
				</ul>
			</div>
			<!-- //page -->
		</div>
	</div>


	<div class="container">
		<div class="row">
			<div class="col-sm-12" id="order">
				<div class="col-sm-2"></div>
				<div class="col-sm-4" style=" width: 750px;height: 200px;box-shadow: 5px 5px 10px;">
					<h3 class="lead text-center"><b>Your Order Placed Successfully!</b></h3>
					<h6 class="lead text-center"><b>Product(s): </b><?=$allItems; ?></h6>
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
					<h6 class="lead text-center"><b>Delivery Charge : Rs.</b><?=$del_cost; ?></h6>
					<?php
						$tol_amount = $grand_total+$del_cost ;
					?>
                    <h5 class="lead text-center">Total Amount : Rs.<?=number_format($tol_amount,2) ?></h5>
                </div>
                <form action="" method="post" id="placeOrder">
				     <input type="hidden" name="products" value="<?=$allItems; ?>">
				     <input type="hidden" name="tol_amount" value="<?=$tol_amount; ?>">
                </form>
            </div>
		</div>
		<br>
		<div class="row">
            <div class="col-sm-2"></div>
			<div class="col-sm-8" style="weight:1000px; height:200px; box-shadow: 5px 5px 10px;">
				<h3 class="text-center text-primary">Payment Method</h3>
				<hr>
				<div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-4">
                        <label>Cash On Delivery</label>
                        <form method="post">
                            <input type="hidden" name="products" value="<?=$allItems; ?>">
					        <input type="hidden" name="tol_amount" value="<?=$tol_amount; ?>">
                           <button type="submit" class="btn btn-info" name="cod"><a href="act.php?clear=all">COD</a></button>
                        </form>
                    </div>
                    <div class="col-sm-2">
                        <label>Payhere</label>
						<form method="post">
							<input type="hidden" name="products" value="<?=$allItems; ?>">
							<input type="hidden" name="grand_total" value="<?=$tol_amount; ?>">
							<button type="submit" class="btn btn-info" name="payhere">Payhere</button>
						</form>
					</div>
				</div>
			</div>
            <div class="col-sm-2"></div>
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
	
 </script>
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
 
 <script type="text/javascript">
	$(document).ready(function(){
		$("#placeOrder").submit(function(e){
			e.preventDefault();
			$.ajax({
				url: 'action.php',
				method: 'post',
				data: $('form').serialize()+"&action=order",
				success: function(response){
					$("#order").html(response);
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

			