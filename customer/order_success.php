<?php
    session_start();
	include("db.php");
    include("header1.php");
    $customer_email = $_SESSION['customer_email'];
    $a_id = $_SESSION['a_id'];
		
	

    // if (!isset($_SESSION['history_id'])){
    // echo "<script>window.location.href = 'home.php';</script>";
    //}


     $sql = "SELECT * FROM rorders WHERE customer_email = '$customer_email' AND id = $a_id";
     $res = mysqli_query($con,$sql);

    while ($row = mysqli_fetch_array($res)){
            $name = $row['name'];
            $address = $row['address'];
            $phone = $row['phone'];
    }
    $total_price = 0;
	$tol_amount = 0;
	global $del_cost;
	$total_weight = 0;
	$tol_amount = 0;
	$output = '';
    $out = '';
    
    foreach ($_SESSION['history_id'] as $key => $value ){
        $sql = "SELECT * FROM history WHERE customer_email = '$customer_email' AND history_id ='$value'";
        $result = mysqli_query($con,$sql);
        
         while ($row = mysqli_fetch_array($result)){
            $history_id = $row['history_id'];
             
            $output = '';
            $output.= '<tr><td>'.$row['title'].'</td>';
            $output.= '<td>'.$row['price'].'</td>';
			$output.= '<td>'.$row['weight'].'</td>';
            $output.= '<td>'.$row['quantity'].'</td>';
            $output.= '<td>'.$row['total_price'].'</td>';
			$output.= '<td>'.$row['total_weight'].'</td></tr>';
            $total_price += $row['total_price'];
			$total_weight += $row['total_weight'];
			$dop = $row['date_of_purchase'];
            $status = $row['status'];
            $payment_method = $row['payment_method'];
             
            $out.= '<div class="alert-secondary rounded-top p-2"><strong>Order Id:'.$row['history_id'].'</strong></div>
            <table class="table table-dark">
             
                <tr><td>Book Name</td>
                <td>Price</td> 
				<td>Weight</td> 
                <td>Quantity</td>
                <td>Sub-Total</td>
				<td>Sub-Weight</td></tr>
                
                    '.$output.'
            </table>';
        }
        
    }

    //unset($_SESSION['history_id']);
?>





<div class="container">
    <div class="row">
        <div class="col-sm-12">
               
                <div class="alert-header text-primary"><strong>Thank you!<?php echo $name ?>,for shopping with us.</strong>
                    <h6>Your order has been successfully placed.Your order details are as follows:</h6>
                  <br>
                 </div>    
            
                <table class="table table-striped">
                    <tr>
                        <td>Delivery Address</td>
                        <td><?php echo $name.','.$address; ?></td>
                    </tr>
                    <tr>
                        <td>Phone Number</td>
                        <td><?php echo $phone; ?></td>
                    </tr>
                    <tr>
                        <td>Date of Purchases</td>
                        <td><?php echo $dop; ?></td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td><?php echo $status; ?></td>
                    </tr>
                    <tr>
                        <td>Payment Method</td>
                        <td><?php echo $payment_method; ?></td>
                    </tr>
					<?php
							if((0<=$total_weight)&&($total_weight<250)){
								$del_cost = 100;
							}else if((250<=$total_weight)&&($total_weight<500)){
								$del_cost = 125;
							}else if((500<=$total_weight)&&($total_weight<1000)){
								$del_cost = 150;
							}else if((1000<=$total_weight)&&($total_weight<1500)){
								$del_cost=175;
							}else if((1500<=$total_weight)&&($total_weight<2000)){
								$del_cost=200;
							}else if((2000<=$total_weight)&&($total_weight<2500)){
								$del_cost = 225;
							}else if((2500<=$total_weight)&&($total_weight<3000)){
								$del_cost = 250;
							}else if((3000<=$total_weight)&&($total_weight<4000)){
								$del_cost = 300;
							}else if((4000<=$total_weight)&&($total_weight<5000)){
								$del_cost = 350;
							}else if((5000<=$total_weight)&&($total_weight<6000)){
								$del_cost = 400;
							}else if((6000<=$total_weight)&&($total_weight<7000)){
								$del_cost = 450;
							}else if((7000<=$total_weight)&&($total_weight<8000)){
								$del_cost = 500;
							}else if((8000<=$total_weight)&&($total_weight<9000)){
								$del_cost = 550;
							}else if((9000<=$total_weight)&&($total_weight<10000)){
								$del_cost = 600;
							}else if((10000<=$total_weight)&&($total_weight<11000)){
								$del_cost = 650;
							}else if((11000<=$total_weight)&&($total_weight<12000)){
								$del_cost = 700;
							}else if((12000<=$total_weight)&&($total_weight<13000)){
								$del_cost = 750;
							}else if((13000<=$total_weight)&&($total_weight<14000)){
								$del_cost = 800;
							}else if((14000<=$total_weight)&&($total_weight<15000)){
								$del_cost = 850;
							}else if((15000<=$total_weight)&&($total_weight<16000)){
								$del_cost = 900;
							}else if((16000<=$total_weight)&&($total_weight<17000)){
								$del_cost = 950;
							}else if((17000<=$total_weight)&&($total_weight<18000)){
								$del_cost = 1000;
							}else if((18000<=$total_weight)&&($total_weight<19000)){
								$del_cost = 1050;
							}else if((19000<=$total_weight)&&($total_weight<20000)){
								$del_cost = 1100;
							}else if((20000<=$total_weight)&&($total_weight<25000)){
								$del_cost = 1250;	
							}else(25000<=$total_weight){
								$del_cost = 1500
							}
						?>	
                    <tr>
                        <td>Delivery Cost</td>
						<td>Rs.<?= number_format($del_cost,2); ?></td>
                    </tr>
                   
                </table>
                <br>
                <?php echo $out; ?>
                <br>
                <?php $tol_amount = $total_price+ $del_cost; ?>
				<h5><strong>Total Amount:Rs.<?php echo $tol_amount; ?></strong> </h5>
                <span class="badge badge-info">Keep this order id saved for the future reference of your order.</span>
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
 

 
 
</body>

</html>

			