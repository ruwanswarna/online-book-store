<?php
session_start();

include("db.php");
include("functions/functions.php");
?>

<?php

if(isset($_GET['pro_id'])){
    
    $product_id = $_GET['pro_id'];
    
    $get_product = "select * from products where id='id'";
    
    $run_product = mysqli_query($con,$get_product);
    
    $row_product = mysqli_fetch_array($run_product);
    
    $p_cat_id = $row_product['p_cat_id'];
    
    $pro_title = $row_product['pro_title'];
    
    $pro_price = $row_product['pro_price'];
    
    $pro_desc = $row_product['pro_desc'];
    
    $pro_img1 = $row_product['pro_img1'];
    
    $pro_img2 = $row_product['pro_img2'];
    
    $pro_img3 = $row_product['pro_img3'];
    
    $get_p_cat = "select * from product_categories where p_cat_id= '$p_cat_id'";
    
    $run_p_cat = mysqli_query($con,$get_p_cat);
    
    $row_p_cat = mysqli_fetch_array($run_p_cat);
    
    $p_cat_title = $row_p_cat['p_cat_title'];
}


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
							<a href="reviews.php">Reviews</a>
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
							<a href="cart.php" class="btn navbar-btn btn-info right">
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
	
	
	
	<!-- Start-front-image-area -->
	<div id="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">       
					<img class="img-responsive" src="images/img2.jpg" alt="" style="width:1500px; height:300px;">
				</div>
			</div>
        </div>
    </div>
    <!--end-front-image-area -->
        
