<div class="panel panel-default sidebar-menu"><!--panel panel-default sidebar-menu start-->
    
    <div class="panel-heading"><!--panel-heading start-->
        
         <center><!--center start-->
                
            <img src="logo/Logopit_1584471823061.png" alt="logo">    
                
         </center><!--center end -->
         
         <br/>
         
         <h3 align="center" class="panel-title"><!--panel-title start -->
             
             Name:lakshan
             
         </h3><!--panel-title end -->
        
    </div><!--panel-heading end-->
    
    <div class="panel-body"> <!--panel-body start-->  
    
        <ul class="nav-pills nav-stacked nav"><!--nav-pills nav-stacked nav start-->
            
            <li class="<?php if(isset($_GET['my_orders'])){echo"active";} ?>">
                
                <a href="my_account.php?my_orders">
                    
                    <i class="fa fa-list"></i> My orders 
                    
                </a>
                
            </li>
            
            
            <li class="<?php if(isset($_GET['wishlist'])){echo"active";} ?>">
                
                <a href="my_account.php?wishlist">
                    
                    <i class="fa fa-heart"></i> Wishlist 
                    
                </a>
                
            </li>
               <li class="<?php if(isset($_GET['edit_account'])){echo"active";} ?>">
                
                <a href="my_account.php?edit_account">
                    
                    <i class="fa fa-pencil"></i> Edit Account 
                    
                </a>
                
            </li>
            
            
            <li class="<?php if(isset($_GET['change_pass'])){echo"active";} ?>">
                
                <a href="my_account.php?change_pass">
                    
                    <i class="fa fa-user"></i> Change Password 
                    
                </a>
                
            </li>
            
                  <li class="<?php if(isset($_GET['delete_account'])){echo"active";} ?>">
                
                <a href="my_account.php?delete_account">
                    
                    <i class="fa fa-trash-o"></i> Delete Account 
                    
                </a>
                
            </li>
            
            
            <li>
                
                <a href="logout.php">
                    
                    <i class="fa fa-sign-out"></i> Logout
                    
                </a>
                
            </li>
            
            
            
        </ul><!--nav-pills nav-stacked nav end-->
    
    </div><!--panel-body end-->
    
</div><!--panel panel-default sidebar-menu end-->