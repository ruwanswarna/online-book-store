<div class="box"><!--box start-->
    
    <div class="box_header"><!--box_haeder start-->

        <center><!--center start-->
            
            <h1> Login </h1>
            
            <p class="lead"> Alraedy have our account..? </p>
            
            <p class="text_muted"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus deserunt, earum dolore molestiae eius alias cupiditate aperiam hic beatae, repellendus veniam reiciendis tempora, eos omnis ex. Dolore laboriosam voluptate expedita. </p>
            
        </center><!--center end-->
        
        <form method="post" action="login.php"><!--form start-->
            
            <div class="form-group"><!--form-group start-->
                
                    <label> Email </label>
                    
                    <input name="c_email" type="text" class="form-control" required>
                 
            </div><!--form-group end-->
            
            <div class="form-group"><!--form-group start-->
                
                    <label> Password </label>
                    
                    <input name="c_pass" type="password" class="form-control" required>
                 
            </div><!--form-group end-->
            
            <div class="text-center"><!--text-center start-->
                
                <button name="login" value="Login" class="btn btn-primary">
                    
                    <i class="fa fa-sign-in"></i> Login
                    
                </button>
                
            </div><!--text-center end-->
            
        </form><!--form end-->
        
        <center><!--center start-->
            
            <a href="customer_register.php">
                
                <h3> Dont have account...? Register here </h3>
                
            </a>
            
        </center><!--center end-->
        
    </div><!--box_header end-->
    
</div><!--box end-->

<?php

if(isset($_POST['login'])){
	
    $customer_email = $_POST['c_email']; 
    
    $customer_pass = $_POST['c_pass'];
    
    $select_customer = "select * from login where customer_email='$customer_email' AND customer_pass='$customer_pass'";
    
    $run_customer = mysqli_query($con,$select_customer);
    
    $get_ip = getRealIpUser();
    
    $check_customer = mysqli_num_rows($run_customer);
    
    $select_cart = "select * from cart where ip_add='$get_ip'";
    
    $run_cart = mysqli_query($con,$select_cart);
    
    $check_cart = mysqli_num_rows($run_cart);
    
    if($check_customer==0){
        
        echo "<script>alert('Your email or password is wrong')</script>";
        
        exit();
        
    }
    
    if($check_customer==1 AND $check_cart==0){
        
        $_SESSION['customer_email']=$customer_email;
		
		echo "<script>alert('Your looged in')</script>"; 
        
        echo "<script>window.open('customer/my_account.php?my_orders','_self')</script>";
        
    }else{
       
        $_SESSION['customer_email']=$customer_email;

        echo "<script>alert('Your logged in')</script>"; 
        
        echo "<script>window.open('login.php','_self')</script>";
        
        }
    
}

?>


