<?php
	session_start();
	include("db.php");
	include("functions/functions.php");
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>bookshop</title>
	<link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
	<link rel="stylesheet" href="styles/bootstrap-337.min.css">
	<link rel="stylesheet" href="style.css">

	<style>	
		.product{
			border: 1px; solid #eaeaec;
			margin: -1px 3px 3px -1px;
			padding: 10px;
			text-align: center;
			background-color: #efefef;
		}
	</style>	
</head>

<body>

	<div id="top"><!-- Top Begin -->
		<div class="container"><!-- container Begin -->
            <div class="col-md-6 offer"><!-- col-md-6 offer Begin -->
               <a href="#"><h4>Welcome</h4></a>
            </div><!-- col-md-6 offer Finish -->
           
			<div class="col-md-6"><!-- col-md-6 Begin -->
                <ul class="menu"><!-- cmenu Begin -->
					<li>
                      <a href="#" data-toggle="modal" data-target="#myModal1">
							<span class="fa fa-truck" aria-hidden="true"></span> Track Order
						</a>
					</li>
					<li>
                       <a href="customer_register.php">Register</a>
					</li>
                     <li>
                        
                         <?php
                   
                            if(!isset($_SESSION['customer_email'])){
                                
                                 
                                    echo "<a href='login.php'>Guest </a>";
                        
                                }else{
                       
                                    echo " <a href='customer/my_account.php'>" . $_SESSION['customer_email']."</a> ";
                                   
                                    }
                   
                            ?>
                            

                   </li>
                   <li>
                       <a href="login.php">
                       
                       
                       <?php
                           
                           if(!isset($_SESSION['customer_email'])){
                       
                                echo "<a href='login.php'>Login</a>";
                       
                           }else{
                       
                                echo "<a href='logout.php'>Log Out</a>";
                                }
                   
                       ?>
                       
                       </a>
                   </li>
                   
				</ul><!-- menu Finish -->
            </div><!-- col-md-6 Finish -->
           
       </div><!-- container Finish -->
       
	</div><!-- Top Finish -->
   
	<div id="navbar" class="navbar navbar-default"><!-- navbar navbar-default Begin -->
		<div class="container"><!-- container Begin -->
			<div class="navbar-header"><!-- navbar-header Begin -->
               
				<a href="home.php" class="navbar-brand home"><!-- navbar-brand home Begin -->
                   
					<img src="logo/Logopit_1584471823061.png"     alt="bookshop" class="hidden-xs">
					<img src="logo/Logopit_1584471992896.png" alt="bookshop Logo Mobile" class="visible-xs">
                   
				</a><!-- navbar-brand home Finish -->
               
				<button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                   <span class="sr-only">Toggle Navigation</span>
                   <i class="fa fa-align-justify"></i>
                </button>
			   
				
               
				<button class="navbar-toggle" data-toggle="collapse" data-target="#search">
                   <span class="sr-only">Toggle Search</span>
                   <i class="fa fa-search"></i>
                </button>
            </div><!-- navbar-header Finish -->
			
			<div class="collapse navbar-collapse " id="navigation">
				<div class="padding-nav"><!-- padding-nav Begin -->
                   
					<ul class="nav navbar-nav left"><!-- nav navbar-nav left Begin -->
                       
						<li class="active">
							<a href="home.php">Home</a>
						</li>
						<li>
							<a href="shop.php">Shop</a>
						</li>
						<li>
							<a href="my_account.php">My Account</a>
						</li>
						<li>
							<a href="reviews.php">Reviews</a>
						</li>
						<li>
							<a href="history.php">History</a>
						</li>
						<li>
                           <a href="contact.php">Contact Us</a>
						</li>
                       
					</ul><!-- nav navbar-nav left Finish -->
                </div>  
				<!-- padding-nav Finish -->
				
				<ul class="nav navbar-nav right">
					<li class="active">
						<div style="float: right; cursor: pointer;">
							<a href="rcart.php" class="btn navbar-btn btn-info right">
								<i class="fa fa-shopping-cart my-cart-icon"></i> <span id="cart-item" class="badge badge-danger"> </span>
							</a><!-- btn navbar-btn btn-primary Finish -->
						</div>
					</li>
				</ul>
				
				<div class="navbar-collapse collapse right"><!-- navbar-collapse collapse right Begin -->
					<button class="btn btn-info navbar-btn" type="button" data-toggle="collapse" data-target="#search"><!-- btn btn-primary navbar-btn Begin -->
						<span class="sr-only">Toggle Search</span>
						<i class="fa fa-search"></i>
					</button><!-- btn btn-primary navbar-btn Finish -->
				</div><!-- navbar-collapse collapse right Finish -->
				<div class="collapse clearfix" id="search"><!-- collapse clearfix Begin -->
					<form method="get" action="results.php" class="navbar-form"><!-- navbar-form Begin -->
						<div class="input-group"><!-- input-group Begin -->
							<input type="text" class="form-control" placeholder="How can we help you today?" name="user_query" required>
							<span class="input-group-btn"><!-- input-group-btn Begin -->
								<button type="submit" name="search" value="Search" class="btn btn-info"><!-- btn btn-primary Begin -->
									<i class="fa fa-search"></i>
								</button><!-- btn btn-primary Finish -->
							</span><!-- input-group-btn Finish -->
						</div><!-- input-group Finish -->
					</form><!-- navbar-form Finish -->
				</div><!-- collapse clearfix Finish -->
			</div>
		</div>
	</div>
	
	
	
	<div class="container" id="slider"><!-- container Begin -->
       <div class="col-md-12"><!-- col-md-12 Begin -->
			<div class="carousel slide" id="myCarousel" data-ride="carousel"><!-- carousel slide Begin -->
               
				<ol class="carousel-indicators"><!-- carousel-indicators Begin -->
                   
                   <li class="active" data-target="#myCarousel" data-slide-to="0"></li>
                   <li data-target="#myCarousel" data-slide-to="1"></li>
                   <li data-target="#myCarousel" data-slide-to="2"></li>
                   <li data-target="#myCarousel" data-slide-to="3"></li>
                   
				</ol><!-- carousel-indicators Finish -->
               
				<div class="carousel-inner"><!-- carousel-inner Begin -->
					
					<?php
					
					$get_slides = "select * from slider LIMIT 0,1";
					
					$run_slides = mysqli_query($con,$get_slides);
					
					while($row_slides=mysqli_fetch_array($run_slides)){
						
						$slide_name = $row_slides['slide_name'];
						$slide_image = $row_slides['slide_image'];
						
						echo "
						
						<div class='item active'>
						
						<img src='images/slide/$slide_image' style='width:1500px; height:500px;'>
						
						</div>
						
						";
					}
					
					$get_slides = "select * from slider LIMIT 1,3";
					
					$run_slides = mysqli_query($con,$get_slides);
					
					while($row_slides=mysqli_fetch_array($run_slides)){
						
						$slide_name = $row_slides['slide_name'];
						$slide_image = $row_slides['slide_image'];
						
						echo "
						
						<div class='item'>
						
						<img src='images/slide/$slide_image' style='width:1500px; height:500px;' >
						
						</div>
						
						";
					}
					
					?>
                </div><!-- carousel-inner Finish -->
               
				<a href="#myCarousel" class="carousel-control left" data-slide="prev"><!-- left carousel-control Begin -->
							
					<span class="glyphicon glyphicon-chevron-left"></span>
					<span class="sr-only">Next</span>
					   
				</a><!-- left carousel-control Finish -->
				   
				<a href="#myCarousel" class="right carousel-control" data-slide="next"><!-- right carousel-control Begin -->
					   
					<span class="glyphicon glyphicon-chevron-right"></span>
					<span class="sr-only">Next</span>
					   
				</a><!-- right carousel-control Finish -->
               
			</div><!-- carousel slide Finish -->
           
		</div><!-- col-md-12 Finish -->
       
	</div><!-- container Finish -->
	<br>
	
	<div id="include"><!-- include start -->
		<div class="container"><!-- container startend-->           
            <div class="same-height-row"><!-- same-height-row end -->
				<div class="col-sm-4"><!-- col-sm-4 start -->
					<div class="box same-height"><!-- box same-height start -->
                        <div class="icon"><!-- icon start -->
                            <i class="fa fa-heart"></i>
                        </div><!-- icon end -->
                        
                        <h3><a href="#">sdfghjkl</a></h3>
                        <p>sdfghjk rtyuiop cvbn rtyuiop cvgbhnjkl </p>
                    </div><!-- box same-height end -->
                </div><!-- col-sm-4 end -->
                
                <div class="col-sm-4"><!-- col-sm-4 start -->
					<div class="box same-height"><!-- box same-height start -->
                        <div class="icon"><!-- icon start -->
                            <i class="fa fa-tag"></i>
                        </div><!-- icon end -->
                        
                        <h3><a href="#">sdfghjkl ghjk</a></h3>
                        <p>sdfghjk rtyuiop cvbn rtyuiop cvgbhnjkl </p>
                    </div><!-- box same-height end -->
                </div><!-- col-sm-4 end -->
                
                <div class="col-sm-4"><!-- col-sm-4 start -->
					<div class="box same-height"><!-- box same-height start -->
                        <div class="icon"><!-- icon start -->
                            <i class="fa fa-thumbs-up"></i>
                        </div><!-- icon end -->
                        
                        <h3><a href="#">sdfghjkl</a></h3>
						<p>sdfghjk rtyuiop cvbn rtyuiop cvgbhnjkl </p>
                    </div><!-- box same-height end -->
                </div><!-- col-sm-4 end -->
            </div><!-- same-height-row end -->
        </div> <!-- container end -->
    </div><!-- include end -->
	
	 
	<div id="latest"><!-- latest start -->
		<div class="box"><!-- box start -->
			<div class="container"><!-- container start -->
				<div class="col-md-12"><!-- col-md-12 start -->
                    <h2>
                       Our Latest Books
					</h2>
                </div><!-- col-md-12 end -->
            </div><!-- container end -->
        </div><!-- box end -->
    </div><!-- latest end -->
	
	
	<div id="content" class="container" style="width: 90%;"><!-- container start -->
		<div id="message"></div>
        <div class="row">
			<div class = "col-sm-1"></div>
			<?php
				include 'config.php';
				$stmt = $con->prepare("SELECT * FROM products ORDER BY 1 ASC LIMIT 0,5 ");
				$stmt->execute();
				$result = $stmt->get_result();
				while($row = $result->fetch_assoc()){
			?>
			
			<div class='col-md-4 col-sm-6 p-2 single'>
				<div class="product">
					<img src="images/books/<?= $row['image'] ?>" class="img-responsive"  style="width:180px; height:180px;" >
					<h4 class="text-center text-info"><?= $row['title'] ?></h4>
					<h5 class="text-center text-danger">Rs.<?= number_format($row['sellingPrice'],2) ?></h5>
					<form action="" class="form-submit">
                        <input type="hidden" class="porderid" value="<?= $row['order_id'] ?>">
						<input type="hidden" class="pid" value="<?= $row['id'] ?>">
						<input type="hidden" class="pname" value="<?= $row['title'] ?>">
						<input type="hidden" class="pprice" value="<?= $row['sellingPrice'] ?>">
						<input type="hidden" class="pimage" value="<?= $row['image'] ?>">
						<input type="hidden" class="pcode" value="<?= $row['code'] ?>">
						<input type="hidden" class="pweight" value="<?= $row['weight'] ?>">
						<div class="btn-group d-flex">			
							<button class="btn btn-info btn-block addItemBtn"  style="width:100%;"><i class="fa fa-cart-plus"></i>&nbsp;&nbsp;Add to cart</button>
							&nbsp;&nbsp;
							<a href="details.php?id=<?= $row['id']; ?>" class="btn btn-info" style="width:100%;">View Details</a>
						</div>	
					</form>
				</div>	
			</div>
		
			<?php 
				}
			?>
			
		</div>
	</div>
	<br>
	<br>
	<?php 
        
    include("footer.php");
    
    ?>
	
	
   
	<script src="js/jquery-1.16.0.popper.min.js"></script>
	<script src="js/jquery-2.2.3.min.js"></script>
	<script src="js/bootstrap-337.min.js"></script>
	
	<script type="text/javascript">
	$(document).ready(function(){
		$(".addItemBtn").click(function(e){
			e.preventDefault();
			var $form = $(this).closest(".form-submit");
            var porderid = $form.find(".porderid").val();
			var pid = $form.find(".pid").val();
			var pname = $form.find(".pname").val();
			var pprice = $form.find(".pprice").val();
			var pimage = $form.find(".pimage").val();
			var pcode = $form.find(".pcode").val();
			var pweight = $form.find(".pweight").val();
			
			$.ajax({
				url: 'action.php',
				method: 'post',
				data: {porderid:porderid,pid:pid,pname:pname,pprice:pprice,pimage:pimage,pcode:pcode,pweight:pweight},
				success:function(response){
					$("#message").html(response);
					window.scrollTo(0,0);
					load_cart_item_number();
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
