<div id="footer"><!--footer start-->
    <div class="container"><!--container start-->
        <div class="row"><!--row start-->
            <div class="col-sm-6 col-md-3"><!--col-sm-6 col-md-3 start-->
                
                <h4>Pages</h4>
                
                <ul><!--ul start-->
                    <li><a href="cart.php">Shopping Cart</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                    <li><a href="shop.php">Shop</a></li>
                    <li><a href="customer/my_account.php">My Account</a></li>
                </ul><!--ul end-->
                
                <hr>
                
                <h4>user Section</h4>
                
                <ul><!--ul start-->
                    <li><a href="login.php">Login</a></li>
                    <li><a href="customer_register.php">Register</a></li>
                </ul><!--ul end-->
                
                <hr class="hidden-md hidden-lg hidden-sm">
                
            </div><!--col-sm-6 col-md-3 end-->
            
            <div class="con-sm-6 col-md-3"><!--con-sm-6 col-md-3 start-->
                
                <h4>Top Product Categories</h4>
                
                <ul><!--ul start-->
                    
                    <?php
                    
                        $get_p_cats = "select * from product_categories";
                        
                        $run_p_cats = mysqli_query($con,$get_p_cats);
                    
                        while($row_p_cats=mysqli_fetch_array($run_p_cats)){
                            
                            $p_cat_id = $row_p_cats['p_cat_id'];
                            
                            $p_cat_title = $row_p_cats['p_cat_title'];
                            
                            echo " 
                            
                                <li>
                                
                                    <a href='shop.php?p_cat=$p_cat_id'>
                                    
                                        $p_cat_title
                                    
                                    </a>
                                
                                </li>
                                
                            ";
                            
                                
                            
                        }
                    
                    ?>
                    
                </ul><!--ul end-->
                
                    <hr class="hidden-md hidden-lg ">
                
            </div><!--con-sm-6 col-md-3 end-->
            
            <div class="col-sm-6 col-md-3"><!--col-sm-6 col-md-3 start-->
                
                <h4>Find us</h4>
                <p><!--p start-->
                    
                    <strong>bookshop</strong>
                    <br/>ghjk
                    <br/>fghjk
                    <br/>dfghjk
                    <br/>dfghjk@gmail.com
                    <br/>
                </p><!--p end-->
            
                <a href="contact.php">Chech Our Contact Page</a>
               
                <hr class="hidden-md hidden-lg ">

            </div><!--col-sm-6 col-md-3 end-->
            
            <div class="col-sm-6 col-md-3"><!--col-sm-6 col-md-3 start-->
                
                <h4>Let The News</h4>
                
                <p class="text-muted">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit optio quaerat soluta aut, sint, explicabo ratione! Repellat, optio dolor dolorum, impedit nisi laudantium voluptatibus quia vero fugit ea commodi eius.
                </p>
                
                <form action="" method="post">
                    <div class="input-group"><!--input-group start-->
                        
                        <input type="text" class="form-control" name="email">
                        
                        <span class="input-group-btn"><!--input-group-btn start-->
                            
                            <input type="submit" value="Subscribe" class="btn btn-default">
                            
                        </span><!--input-group-btn end-->
                        
                    </div><!--input-group end-->
                </form>
                
                <br>
                
                <h4>Keep In Touch</h4>
                
                <p class="social">
                    <a href="#" class="fa fa-facebook"></a>
                    <a href="#" class="fa fa-twitter"></a>
                    <a href="#" class="fa fa-instagram"></a>
                    <a href="#" class="fa fa-google-plus"></a>
                    <a href="#" class="fa fa-whatsapp"></a>
                </p>
                
            </div><!--col-sm-6 col-md-3 end-->
            
        </div><!--row end-->
    </div><!--container end-->
</div><!--footer end-->