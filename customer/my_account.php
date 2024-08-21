 <?php


include("header1.php");


?>
  
   
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
                  
                   <?php
                   
                   if (isset($_GET['my_orders'])){
                       include("my_orders.php");
                   }

                   if (isset($_GET['wishlist'])){
                       include("wishlist.php");
                   }


                   
                   ?>

                   <div class="wishlist"></div>
                   
               </div><!--box end-->
               
           </div><!--col-md-9 end-->
           
       </div><!-- container end -->
   </div><!--content end-->
   
  
   <?php 
        
    include("include/footer.php");
    
    ?>
    
