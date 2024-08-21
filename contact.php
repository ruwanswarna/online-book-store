<?php
 
   include("header.php");

?>
    
	<div class="container-fluid">
		<div class="row">
			<!-- page -->
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li>
						<a href="home.php">Home</a>
					</li>
					<li>Contact Page</li>
				</ul>
			</div>
			<!-- //page -->
		
			<div class="col-md-3"><!--col-md-3 start-->
				   
				<?php 
					include("sidebar1.php");
				?>
				   
			</div><!--col-md-3 end-->
			

			<!-- contact page -->
			<div class="col-md-9">
				<div class="box">
					<div class="box-header">
						<center>
							<h2>Contact Us</h2>
						</center>
					</div>
					<form id="contact-form" method="post" role="form">
						<div class="messages"></div>
						<div class="controls">
							<div class="form-group">
								<label>Name</label>
								<input type="text" class="form-control" name="name" placeholder="Enter your Name" required="required" data-error="Name is required.">
								<div class="help-block with-errors"></div>
							</div>
							<div class="form-group">
								<label>Email</label>
								<input type="text" class="form-control" name="email" placeholder="Enter your Email" required="required" data-error="Valid email is required.">
								<div class="help-block with-errors"></div>
							</div>
							<div class="form-group">
								<label>Subject</label>
								<input type="text" class="form-control" name="subject" placeholder="Enter your Subject" required="required" data-error="Subject is required.">
								<div class="help-block with-errors"></div>
							</div>
							<div class="form-group">
								<label>Message</label>
								<textarea name="message" class="form-control" placeholder="Write the message" required="required" data-error="Please, leave us a message."></textarea>
								<div class="help-block with-errors"></div>
							</div>
							<div class="text-center">
								<button type="submit" name="submit"class="btn btn-success btn-send">Send</button>
							</div>
						</div>
					</form>
					
					<?php 
						
						if(isset($_POST['submit'])){
							/// Admin receives message eith this ///
							
							$sender_name = $_POST['name'];
							$sender_email = $_POST['email'];
							$sender_subject = $_POST['subject'];
							$sender_message = $_POST['message'];
							$receiver_email = "onlinebookstore@gmail.com";
							
							mail($receiver_email,$sender_name,$sender_email,$sender_subject,$sender_message);
							
							/// Auto reply to sender with this ///
							
							$email = $_POST['email'];
							$subject = "Welcome to my website";
							$msg = "Thanks for sending us message.We will reply your message.";
							$from = "onlinebookstore@gmail.com";
							
							mail($email,$subject,$msg,$from);
							echo"<h2 align='center'>Your message has sent successfully.</h2>";
						}
					?>
				</div>
			
				<div class="row">
					<div class="col-md-9">
						<div class="contact-right wthree">
							<div class="col-xs-7 contact-text w3-agileits">
								<h3>GET IN TOUCH  :</h3>
								<p>
									<i class="fa fa-map-marker"></i>&nbsp;&nbsp;<b>Address : </b> 
								</p>
								<p>
									<i class="fa fa-phone"></i>&nbsp;&nbsp;<b>Telephone-Number : 011-4552333</b>
								</p>
								<p>
									<i class="fa fa-fax"></i>&nbsp;&nbsp;<b>Fax : </b>
								</p>
								<p>
									<i class="fa fa-envelope-o"></i>&nbsp;&nbsp;<b>Email : onlinebookstore@gmail.com</b>
									<a href=""> </a>
								</p>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
				<!--end contact page -->
			</div>
		</div>
	</div>
	<br>
	<?php 
        
    include("footer.php");
    
    ?>
   
	

  <script src="js/jquery-2.2.3.min.js"></script>
  <script src="js/bootstrap-337.min.js"></script>
  
 
  
  
  <!--Shopping cart-->
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
	<!--//Shopping cart-->


</body>

</html>


