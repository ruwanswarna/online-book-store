<?php
    session_start();

	include("db.php");
    include("header1.php");
    $customer_email = $_SESSION['customer_email'];
	
	$output = '';
    $out = ''; 

    $sql = "SELECT * FROM history WHERE customer_email = '$customer_email'";
    $result = mysqli_query($con,$sql);

    $total_orders = mysqli_num_rows($result);

    $sql = "SELECT * FROM history WHERE customer_email = '$customer_email' ORDER BY id DESC LIMIT 0,5";
    $res = mysqli_query($con,$sql);
    
    while ($row = mysqli_fetch_array($res)){
        $output = '';
        $history_id = $row['history_id'];
        $output.= '<tr><td>'.$row['title'].'</td>';
        $output.= '<td>'.$row['quantity'].'</td>';
        $output.= '<td>'.$row['price'].'</td>';
		$output.= '<td>'.$row['weight'].'</td>';
        $output.= '<td>'.$row['total_price'].'</td>'; 
		$output.= '<td>'.$row['total_weight'].'</td></tr>';
        
         $out.= '<div class="alert-secondary p-2 rounded-top">
                    <form method="post">
                        <strong>Order Id:'.$history_id.'</strong>
                        <input type="hidden" name="history_id" value="'.$row['history_id'].'">
                        <button type="submit" name="view" class="btn btn-sm btn-outline-primary pull-right">View</button>
                    </form>
                </div>
                <table class="table table-dark">
             
                        <tr>
                            <td class="w-25">Book Name</td>
                            <td>Quantity</td> 
                            <td>Price</td>
							<td>Weight</td>
                            <td>Sub-Total</td>
							<td>Sub-Weight</td>
                        </tr>
                
                        '.$output.'
                </table>';
       

    }

    if(isset($_POST['view'])){
        
        $_SESSION['history_id'] = $_POST['history_id'];
        
        echo "<script> window.location.href = 'order_details.php'; </script>";
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
					<li>History Page</li>
				</ul>
			</div>
        </div>
    </div> 
    <!-- //page -->

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <span class = "text-primary p-3"><strong>Order History</strong><strong class="pull-right">Total Orders : <?php echo $total_orders; ?></strong></span>
                <br>
                <br>
                <div class="details p-3">
                    <?php 
                        echo $out; 
                    ?>
                    
                    <div id="data"></div>
                    <div id="loading"></div>
                    <div id="order_info" class="text-primary"></div>
                    <form method="post">
                        <button type="button" name="load_more" id="load_more" class="btn btn-sm btn-primary">Load more..</button>
                        <input type="hidden" name="" id="total_orders" value="<?php echo $total_orders; ?>">
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

			