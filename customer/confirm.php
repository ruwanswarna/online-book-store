<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>bookshop</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css">
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
</head>
<body>
   
   <div id="top"><!-- Top Begin -->
       
       <div class="container"><!-- container Begin -->
           
           <div class="col-md-6 offer"><!-- col-md-6 offer Begin -->
               
               <a href="#" class="btn btn-success btn-sm">Welcome</a>
               <a href="checkout.php">4 Items In Your Cart | Total Price: $300 </a>
               
           </div><!-- col-md-6 offer Finish -->
           
           <div class="col-md-6"><!-- col-md-6 Begin -->
               
               <ul class="menu"><!-- cmenu Begin -->
                   
                   <li>
                       <a href="../customer_register.php">Register</a>
                   </li>
                   <li>
                       <a href="my_account.php">My Account</a>
                   </li>
                   <li>
                       <a href="../cart.php">Go To Cart</a>
                   </li>
                   <li>
                       <a href="../login.php">Login</a>
                   </li>
                   
               </ul><!-- menu Finish -->
               
           </div><!-- col-md-6 Finish -->
           
       </div><!-- container Finish -->
       
   </div><!-- Top Finish -->
   
   <div id="navbar" class="navbar navbar-default"><!-- navbar navbar-default Begin -->
       
       <div class="container"><!-- container Begin -->
           
           <div class="navbar-header"><!-- navbar-header Begin -->
               
               <a href="../home.php" class="navbar-brand home"><!-- navbar-brand home Begin -->
                   
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
           
           <div class="navbar-collapse collapse" id="navigation"><!-- navbar-collapse collapse Begin -->
               
               <div class="padding-nav"><!-- padding-nav Begin -->
                   
                   <ul class="nav navbar-nav left"><!-- nav navbar-nav left Begin -->
                       
                       <li>
                           <a href="../home.php">Home</a>
                       </li>
                       <li >
                           <a href="../shop.php">Shop</a>
                       </li>
                       <li class="active">
                           <a href="my_account.php" >My Account</a>
                       </li>
                       <li>
                           <a href="../cart.php">Shopping Cart</a>
                       </li>
                       <li>
                           <a href="../contact.php">Contact Us</a>
                       </li>
                       
                   </ul><!-- nav navbar-nav left Finish -->
                   
               </div><!-- padding-nav Finish -->
               
               <a href="cart.php" class="btn navbar-btn btn-primary right"><!-- btn navbar-btn btn-primary Begin -->
                   
                   <i class="fa fa-shopping-cart"></i>
                   
                   <span>4 Items In Your Cart</span>
                   
               </a><!-- btn navbar-btn btn-primary Finish -->
               
               <div class="navbar-collapse collapse right"><!-- navbar-collapse collapse right Begin -->
                   
                   <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search"><!-- btn btn-primary navbar-btn Begin -->
                       
                       <span class="sr-only">Toggle Search</span>
                       
                       <i class="fa fa-search"></i>
                       
                   </button><!-- btn btn-primary navbar-btn Finish -->
                   
               </div><!-- navbar-collapse collapse right Finish -->
               
               <div class="collapse clearfix" id="search"><!-- collapse clearfix Begin -->
                   
                   <form method="get" action="results.php" class="navbar-form"><!-- navbar-form Begin -->
                       
                       <div class="input-group"><!-- input-group Begin -->
                           
                           <input type="text" class="form-control" placeholder="Search" name="user_query" required>
                           
                           <span class="input-group-btn"><!-- input-group-btn Begin -->
                           
                           <button type="submit" name="search" value="Search" class="btn btn-primary"><!-- btn btn-primary Begin -->
                               
                               <i class="fa fa-search"></i>
                               
                           </button><!-- btn btn-primary Finish -->
                           
                           </span><!-- input-group-btn Finish -->
                           
                       </div><!-- input-group Finish -->
                       
                   </form><!-- navbar-form Finish -->
                   
               </div><!-- collapse clearfix Finish -->
               
           </div><!-- navbar-collapse collapse Finish -->
           
       </div><!-- container Finish -->
       
   </div><!-- navbar navbar-default Finish -->
   
   <div id="content"><!--content start-->
       <div class="container"><!-- container start -->
           <div class="col-md-12"><!--col-md-12 start-->
               
               <ul class="breadcrumb"><!--breadcrumb start-->
                   <li>
                       <a href="home.php">Home</a>
                   </li>
                   <li>
                       My Account 
                   </li>
               </ul><!--breadcrumb end-->
               
           </div><!--col-md-12 end-->
           
           <div class="col-md-3"><!--col-md-3 start-->
               
               <?php 
        
                    include("include/sidebar.php");
    
                ?>
               
           </div><!--col-md-3 end-->
       
               <div class="col-md-9"><!--col-md-9 start-->
                   
                   <div class="box"><!--box start-->
                       
                       <h1 align="center">Please Confirm Your Payment</h1>
                       
                       <form action="confirm.php" method="post" enctype="multipart/form-data"><!--form start-->
                           
                           
                            <div class="form-group"><!--form-group start-->
                               
                               <label> Invoice No:</label>
                               
                               <input type="text" class="form-control" name="invoice_no" required>
                               
                           </div><!--form-group end-->
                           
                           
                           
                           <div class="form-group"><!--form-group start-->
                               
                               <label> Amount Sent: </label>
                               
                               <input type="text" class="form-control" name="amount_sent" required>
                               
                           </div><!--form-group end-->
                           
                           
                           <div class="form-group"><!--form-group start-->
                               
                               <label> Select Payment Mode: </label>
                               
                                <select name="payment_mode" class="form-control"><!--form-control start-->
                                    
                                    <option> Select Payment Mode </option>
                                    <option> Back Code </option>
                                    <option> Sampath Bank</option>
                                    <option> dfghjkl </option>
                                    <option> sdfghjk </option>
                                    
                                </select><!--form-control END-->
                               
                           </div><!--form-group end-->
                           
                           
                           <div class="form-group"><!--form-group start-->
                               
                               <label> Transaction / Reference ID: </label>
                               
                               <input type="text" class="form-control" name="ref_no" required>
                               
                           </div><!--form-group end-->
                           
                           
                           <div class="form-group"><!--form-group start-->
                               
                               <label> Payment Date: </label>
                               
                               <input type="text" class="form-control" name="date" required>
                               
                           </div><!--form-group end-->
                           
                           <div class="text-center"><!--text-center start-->
                               
                               <button class="btn btn-primary btn-lg"><!--btn btn-primary btn-lg start-->
                                   
                                   <i class="fa fa-user-md"></i> Confirm Payment
                                   
                               </button><!--btn btn-primary btn-lg end-->
                               
                           </div><!--text-center end-->
                       </form><!--form end-->
                       
                   </div><!--box end-->
                   
               </div><!--col-md-9 end-->
                   
           </div><!-- container end -->
   </div><!--content end-->
   
  
   <?php 
        
    include("include/footer.php");
    
    ?>
    
</body>
</html>