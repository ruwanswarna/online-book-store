<?php
    session_start();

	include("db.php");
    include("header1.php");

    $history_id = $_SESSION['history_id'];

    $sql = "SELECT * FROM history WHERE history_id = '$history_id'";
    $res = mysqli_query($con,$sql);

    while ($row = mysqli_fetch_array($res)){
        
        $history_id = $row['history_id'];
        $title = $row['title'];
        $image = $row['image'];
        $quantity = $row['quantity'];
        $price = $row['price'];
		$weight = $row['weight'];
        $total_price = $row['total_price'];
		$total_weight = $row['total_weight'];
        $dop = $row['date_of_purchase'];
        $status = $row['status'];
        $payment_method = $row['payment_method'];
        
    }

    $q = "SELECT * FROM order_address WHERE history_id = '$history_id'";
    $result = mysqli_query($con,$q);

    while ($row = mysqli_fetch_array($result)) {
        $a_id = $row['a_id'];
        
    }
    
    $query = "SELECT * FROM rorders WHERE id = '$a_id'";
    $result = mysqli_query($con,$query);
    
    while ($row = mysqli_fetch_array($result)){
         
        $name = $row['name'];
        $address = $row['address'];
        $phone = $row['phone'];
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
					<li>Order Details Page</li>
				</ul>
			</div>
        </div>
    </div> 
    <!-- //page -->

    <div class = "container">
        <div class = "row">
            <div class = "col-sm-12">
                <div class = "box">
                    <h5 class = "text-primary">ORDER DETAILS</h5>
                    <br>
                    <div class = "alert-secondary p-2 rounded-top"><strong><?php echo "Order Id : ".$history_id; ?></strong></div>

                    <table class = "table table-dark">
                        <tr>
                            <td>Product</td>
                            <td>Price</td>
							<td>Weight</td>
							<td>Quantity</td>
                            <td>Total</td>
							<td>Total-Weight</td>
                        </tr>
                        <tr>
                            <td><?php echo '<img src="images/books/'.$image.'" height = "100" width = "100"<br>'.$title; ?></td>
                            <td><?php echo $price; ?></td>
							<td><?php echo $weight; ?></td>
                            <td><?php echo $quantity; ?></td>
                            <td><?php echo $total_price; ?></td>
							<td><?php echo $total_weight; ?></td>
						</tr>
                    </table>
                </div>
                <div class = "box">
                    <br>

                    <div class =  "details p-3">
                        <table class = "table w-75 table-info rounded">
                            <tr>
                                <td><b>Deliver Address :</b></td>
                                <td><?php echo $name .'.'. $address; ?></td>
                            </tr>
                            <tr>
                                <td><b>Phone Number :</b></td>
                                <td><?php echo $phone; ?></td>
                            </tr>
                            <tr>
                                <td><b>Date :</b></td>
                                <td><?php echo $dop; ?></td>
                            </tr>
                            <tr>
                                <td><b>Payment Method :</b></td>
                                <td><?php echo $payment_method; ?></td>
                            </tr>
                            <tr>
                                <td><b>Status :</b></td>
                                <td><?php echo $status; ?></td>
                            </tr>
                        </table>
                    </div>
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
 
 <!--Checkout page-->
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
 <!--//Checkout page-->

  <!--History page-->
  <script>
	$(document).ready(function(){
        
        var last_id = 5;  
		$('#load_more').click(function(){

            var total_orders = $('#total_orders').val();
            
            $.ajax({
                 
                url : "getmoredata.php",
                method : "post",
                data : {last_id:last_id},
                dataType : "text",
                success : function(data){
                    
                    $('#load_more').hide();
                    $('#loading').html("Loading..<img src = 'images/load.gif' height = '30' width = '30'>");
                    window.setTimeout(function(){
                        
                         $(data).appendTo('#data').hide().fadeIn(500);
                         $('#loading').html('');
                         $('#load_more').show();
                    },500);
                
                    last_id += 5;
                
                    if(last_id > total_orders){
                        
                        $('#load_more').css("visibility","hidden");
                        $('#order_info').css("display","block");
                        window.setTimeout(function(){
                            $('#order_info').html("That's all of your orders.");
                         },1200);
                        
                    }
                }
            
            });
        });
      
        $(function (){
            $(document).scroll(function (){
                var $nav = $(".navbar-expand-lg");
                $nav.toggleClass('scrolled',$(this).scrollTop() > $nav.height());
            });
        });
      
      });
      
</script>
<!--//History page-->
 
</body>

</html>

			