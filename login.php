<?php

    $active='Account';
    include("header.php");
	
	if(isset($_SESSION['customer_email'])){
		header("location:customer/my_account.php");

	}

?>
   
   <div id="content"><!--content start-->
       <div class="container"><!-- container start -->
           <div class="col-md-12"><!--col-md-12 start-->
               
               <ul class="breadcrumb"><!--breadcrumb start-->
                   <li>
                       <a href="home.php">Home</a>
                   </li>
                   <li>
                        Register
                   </li>
               </ul><!--breadcrumb end-->
               
           </div><!--col-md-12 end-->
           
           
           
           <div class="col-md-12"><!--col-md-9 start-->
           
           
           
			   <?php
			   
			   if(!isset($_SESSION['customer_email'])){
				   
					include("customer/customer_login.php");  
				   
			   }else{
				   
				   include("payment_options.php");
			   }
			   
			   ?>
           
           </div><!--col-md-9 end-->
           
          </div><!-- container end -->
   </div><!--content end--> 
   
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


<?php

   if(isset($_POST['register'])){
    
     
     $c_name = $_POST['c_name'];
     
     $c_email = $_POST['c_email'];
     
     $c_pass = $_POST['c_pass'];
     
     $c_city = $_POST['c_city'];
     
     $c_contact = $_POST['c_contact'];
     
     $c_address = $_POST['c_address'];
     
     $c_image = $_FILES['c_image']['name'];
     
     $c_image_tmp = $_FILES['c_image']['tmp_name'];
    
     $c_ip = getRealIpUser();
     
     move_uploaded_file($c_image_tmp,"customer/images/$c_image");
     
     $insert_customer = "insert into login (customer_name,customer_email,customer_pass,customer_city,customer_contact,customer_address,customer_image,customer_ip) values ('$c_name','$c_email','$c_pass','$c_city','$c_contact','$c_address','$c_image','$c_ip')";
     
     $run_customer = mysqli_query($con,$insert_customer);
     
     $sel_cart = "select * from cart where ip_add='$c_ip'";
     
     $run_cart = mysqli_query($con,$sel_cart);
     
     $check_cart = mysqli_num_rows($run_cart);
     
     if($check_cart>0){
         
         ///if register have item in a cart///
         
         $_SESSION['customer_email']=$c_email;
         
        
         
         echo "<script>alert('You have been Registered Sucessfully')</script>";
         
         echo "<script>window.open('login.php','_self')</script>";
         
         
     }else{
         
         ///if register without item in a cart///
          
         $_SESSION['customer_email']=$c_email;
        
         
         echo "<script>alert('You have been Registered Sucessfully')</script>";
         
         echo "<script>window.open('customer/home.php','_self')</script>";
     }
 }

?>