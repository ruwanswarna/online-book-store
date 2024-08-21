<?php
    session_start();

	include("db.php");
    include("header1.php");
    $customer_email = $_SESSION['customer_email'];
	
	$checkout_id = $_SESSION['checkout_id'];
	$output = '';
	$sql = "SELECT * FROM rorders WHERE customer_email = '$customer_email' AND checkout_id = '$checkout_id'";
	
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

    if(isset($_POST['cod'])){
        $sql = "SELECT * FROM rcart WHERE customer_email = '$customer_email' ";
        $result = mysqli_query($con,$sql);
        
        if(!$result){
            echo "Error occured";
        }else{
            $q = "SELECT * FROM rorders WHERE checkout_id = '$checkout_id'";
            $res = mysqli_query($con,$q);
            
            while ($row = mysqli_fetch_array($res)){
                    $a_id = $row['id'];
             }
        
             $_SESSION['a_id'] = $a_id;
             $i = 0;
            
             while($row = mysqli_fetch_array($result)){
                    $q1 = "INSERT INTO  history(id,history_id,book_id,title,image,price,quantity,total_price,date_of_purchase,status,payment_method,paid,customer_email,weight,total_weight)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                
                    $q2 = "INSERT INTO order_address(id,a_id,history_id)VALUES(?,?,?)";

                    $q3 = "DELETE FROM rcart WHERE customer_email = ?";
                
                    $stmt1 = mysqli_prepare($con,$q1);
                    $stmt2 = mysqli_prepare($con,$q2);
                    $stmt3 = mysqli_prepare($con,$q3);
                
                    mysqli_stmt_bind_param($stmt1,'isisssissssssss',$param_id,$param_historyid,$param_book_id,$param_title,$param_image,$param_price,$param_quantity,$param_total_price,$param_dop,$param_status,$param_payment_method,$param_paid,$param_customer_email,$param_weight,$param_total_weight);
                 
                    mysqli_stmt_bind_param($stmt2,'iis',$param_id,$param_a_id,$param_historyid);
                
                    mysqli_stmt_bind_param($stmt3,'s',$param_customer_email);
                
                    $param_id = '';
                    $param_historyid = rand().$customer_email;
                    $_SESSION['history_id'][$i] = $param_historyid;
                    $param_book_id = $row['id'];
                    $param_title = $row['title'];
                    $param_image = $row['image'];
                    $param_price = $row['sellingPrice'];
                    $param_quantity = $row['qty'];
                    $param_total_price = $row['total_price'];
                    $param_dop = date('Y-m-d h:i:s');
                    $param_status = "order placed";
                    $param_payment_method = "COD";
                    $param_paid = 'no';
                    $param_customer_email = $customer_email;
					$param_weight = $row['weight'];
					$param_total_weight = $row['total_weight'];
                    $param_id = '';
                    $param_a_id = $a_id;
             
                
                   if(mysqli_stmt_execute($stmt1) && mysqli_stmt_execute($stmt2) && mysqli_stmt_execute($stmt3)){
                           unset($_SESSION['checkout_id']);
                            echo "<script> window.location.href = 'order_success.php';</script>";
                    }
                    $i++;
                }
            }
    }
	
	 if(isset($_POST['payhere'])){
        $sql = "SELECT * FROM rcart WHERE customer_email = '$customer_email' ";
        $result = mysqli_query($con,$sql);
        
        if(!$result){
            echo "Error occured";
        }else{
            $q = "SELECT * FROM rorders WHERE checkout_id = '$checkout_id'";
            $res = mysqli_query($con,$q);
            
            while ($row = mysqli_fetch_array($res)){
                    $a_id = $row['id'];
             }
        
             $_SESSION['a_id'] = $a_id;
             $i = 0;
            
             while($row = mysqli_fetch_array($result)){
                    $q1 = "INSERT INTO  history(id,history_id,book_id,title,image,price,quantity,total_price,date_of_purchase,status,payment_method,paid,customer_email,weight,total_weight)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                
					$q2 = "INSERT INTO order_address(id,a_id,history_id)VALUES(?,?,?)";

                   
                
                    $stmt1 = mysqli_prepare($con,$q1);
                    $stmt2 = mysqli_prepare($con,$q2);
                    $stmt3 = mysqli_prepare($con,$q3);
                
                    mysqli_stmt_bind_param($stmt1,'isisssissssssss',$param_id,$param_historyid,$param_book_id,$param_title,$param_image,$param_price,$param_quantity,$param_total_price,$param_dop,$param_status,$param_payment_method,$param_paid,$param_customer_email,$param_weight,$param_total_weight);
                 
                    mysqli_stmt_bind_param($stmt2,'iis',$param_id,$param_a_id,$param_historyid);
                
                   
                
                    $param_id = '';
                    $param_historyid = rand().$customer_email;
                    $_SESSION['history_id'][$i] = $param_historyid;
                    $param_book_id = $row['id'];
                    $param_title = $row['title'];
                    $param_image = $row['image'];
                    $param_price = $row['sellingPrice'];
                    $param_quantity = $row['qty'];
                    $param_total_price = $row['total_price'];
                    $param_dop = date('Y-m-d h:i:s');
                    $param_status = "order placed";
                    $param_payment_method = "Payhere";
                    $param_paid = 'no';
                    $param_customer_email = $customer_email;
					$param_weight = $row['weight'];
					$param_total_weight = $row['total_weight'];
                    $param_id = '';
                    $param_a_id = $a_id;
             
                
                   if(mysqli_stmt_execute($stmt1) && mysqli_stmt_execute($stmt2)){
                           unset($_SESSION['checkout_id']);
                            echo "<script> window.location.href = 'payhere.php';</script>";
                    }
                    $i++;
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
			<div class="col-sm-2"></div>
			<div class="col-sm-6" style=" width: 800px;height: 250px;box-shadow: 5px 5px 10px;">
				<h3 class="text-center text-primary"><strong>Delivery Address</strong></h3>
				<h4 class="text-center">Complete Your Order!</h4>
				<hr>
				<center>
					<?php echo $output; ?>
				</center>
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
                            <button type="submit" class="btn btn-info" name="cod">COD</button>
                        </form>
                    </div>
                    <div class="col-sm-2">
                        <label>Payhere</label>
                        <form method="post">
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
 

 
 
</body>

</html>

			