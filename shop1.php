<?php

    $active='Shop';
	
	include("db.php");
    include("header.php");
	
?>
   
   <div id="content"><!--content start-->
       <div class="container"><!-- container start -->
           <div class="col-md-12"><!--col-md-12 start-->
               
               <ul class="breadcrumb"><!--breadcrumb start-->
                   <li>
                       <a href="home.php">Home</a>
                   </li>
                   <li>
                       shop
                   </li>
               </ul><!--breadcrumb end-->
               
           </div><!--col-md-12 end-->
           
           <div class="col-md-3"><!--col-md-3 start-->
               
               <?php 
        
                    include("sidebar1.php");
    
                ?>
               
           </div><!--col-md-3 end-->
           
           <div class="col-md-9"><!--col-md-9 start-->
              
              <?php 
              
              if(!isset($_GET['p_cat'])){
                  
                  if(!isset($_GET['cat'])){
               
                          echo "

                           <div class='box'><!--box start-->
                               <h1>shop</h1>
                               <p>
                                   Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod cumque rem vero id, voluptates, ipsa, commodi possimus, nostrum ad repellat explicabo. Animi sed saepe quis doloremque placeat, fuga dolore soluta!
                               </p>
                           </div><!--box end-->
                           ";
                        }
                      
                    }
                    
               ?>
			   
			   
				<?php
                
					if(!isset($_GET['p_cat'])){
                  
						if(!isset($_GET['cat'])){  
                        
						$per_page=5;
                       
							if(isset($_GET['page'])){
                           
								$page = $_GET['page'];
							}
                       
							else{
                               
								$page=1;
                            }
                           
                           
                            $start_from = ($page-1) * $per_page;
				?>			
							
							
			   	
				<div id="content" class="container" style="width: 90%;"><!-- container start -->
					<div id="message"></div>
					<div class="row">
						
						<?php
							include 'config.php';
							$stmt = $con->prepare("SELECT * FROM products ORDER BY 1 ASC LIMIT $start_from,$per_page");
							$stmt->execute();
							$result = $stmt->get_result();
							while($row = $result->fetch_assoc()){
						?>
						<div class='col-md-4 col-sm-6 single'>
							<div class="product">
								<img src="images/books/<?= $row['image'] ?>" class="img-responsive"  style="width:210px; height:180px;" >
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
										<button class="btn btn-info btn-block addItemBtn"  style="width:104%;"><i class="fa fa-cart-plus"></i>&nbsp;&nbsp;Add to cart</button>
										&nbsp;&nbsp;
										<a href="details.php?id=<?= $row['id']; ?>" class="btn btn-info" style="width:105%;">View Details</a>
									</div>	
								</form>
							</div>	
						</div>
					
						<?php 
							}
						?>
						
					</div>
				</div>
												
               
			
				
                <center>
                    <ul class="pagination"><!--pagination start-->
                    <?php
                       
                        $query = "select * from products";    
                       
                        $result = mysqli_query($con,$query);
                       
                        $total_records = mysqli_num_rows($result);
                       
                        $total_pages = ceil($total_records / $per_page);
                       
                        echo "
                        
                            <li>
                            
                                <a href='shop1.php?page=1'>".'First Page'."</a>
                            
                            </li>
                        
                        ";
                       
                        for($i=1; $i<=$total_pages; $i++){
                            
                          echo "
                        
                            <li>
                            
                                <a href='shop1.php?page=".$i."'> ".$i." </a>
                            
                            </li>
                        
                        ";  
                        
                        };
                       
                        echo "
                        
                            <li>
                            
                                <a href='shop1.php?page=$total_pages'>".'Last Page'."</a>
                            
                            </li>
                        
                        ";
                       
                            }
                        
                        }
                        
                    ?>
                    </ul><!--pagination end-->
                </center>
                
        
                <div id="content" class="container" style="width: 90%;"><!-- container start -->
					<div id="message"></div>
					<div class="row">
						<?php
							if(isset($_GET['p_cat'])){
					
								$p_cat_id = $_GET['p_cat'];
								
								$get_p_cat = "select * from product_categories where p_cat_id ='$p_cat_id'";
								
								$run_p_cat = mysqli_query($db,$get_p_cat);
								
								$row_p_cat = mysqli_fetch_array($run_p_cat);
								
								$p_cat_title = $row_p_cat['p_cat_title'];
								
								$p_cat_desc = $row_p_cat['p_cat_desc'];
								
								$get_products = "select * from products where p_cat_id ='$p_cat_id'";
								
								$run_products = mysqli_query($db,$get_products);
								
								$count = mysqli_num_rows($run_products);
								
								if($count==0){
									
									echo "
									
									<div class='box'>
									
										<h1>No Product Found In This Product Category</h1>
									
									</div>
									
									";
									
								}else{
									
									echo"
									
									 <div class='box'>
									
										<h1> $p_cat_title </h1>
										<p> $p_cat_desc </p>
									
									</div>
									
									";
									
								}
							}

						?>
								
						<?php
							
							include 'config.php';
							global $p_cat_id;
							$stmt = $con->prepare("SELECT * FROM products WHERE p_cat_id = '$p_cat_id' ORDER BY 1 ASC LIMIT 0,9 ");
							$stmt->execute();
							$result = $stmt->get_result();
							while($row = $result->fetch_assoc()){
						?>
						<div class='col-md-4 col-sm-6 single'>
							<div class="product">
								<img src="images/books/<?= $row['image'] ?>" class="img-responsive"  style="width:210px; height:180px;" >
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
										<button class="btn btn-info btn-block addItemBtn"  style="width:104%;"><i class="fa fa-cart-plus"></i>&nbsp;&nbsp;Add to cart</button>
										&nbsp;&nbsp;
										<a href="details.php?id=<?= $row['id']; ?>" class="btn btn-info" style="width:105%;">View Details</a>
									</div>	
								</form>
							</div>	
						</div>
		
						<?php 
							}
						?>
					</div>
				</div>
				
				
				<div id="content" class="container" style="width: 90%;"><!-- container start -->
					<div id="message"></div>
					<div class="row">
						<?php
							if(isset($_GET['cat'])){
        
								$cat_id = $_GET['cat'];
								
								$get_cat = "select * from categories where id='$cat_id'";
								
								$run_cat = mysqli_query($db,$get_cat);
								
								$row_cat = mysqli_fetch_array($run_cat);
								
								$cat_title = $row_cat['Category'];
								
								$cat_desc = $row_cat['Category_des'];
								
								$get_cat = "select * from products where idCategory ='$cat_id'";
								
								$run_products = mysqli_query($db,$get_cat);
								
								$count = mysqli_num_rows($run_products);
								
								if($count==0){
									
									echo "
									
										<div class='box'>
										
											<h1> No Product Found In This Category </h1>
										
										</div>
									
									";    
									
								}else{
									
									echo "
									
										<div class='box'>
										
											<h1> $cat_title </h1>
											
											<p> $cat_desc </p>
										
										</div>
									
									";
									
								}
							}
						?>		
						
						<?php
							include 'config.php';
							global $cat_id;
							$stmt = $con->prepare("SELECT * FROM products WHERE idCategory ='$cat_id' ORDER BY 1 ASC LIMIT 0,9");
							$stmt->execute();
							$result = $stmt->get_result();
							while($row = $result->fetch_assoc()){
						?>
						<div class='col-md-4 col-sm-6 single'>
							<div class="product">
								<img src="images/books/<?= $row['image'] ?>" class="img-responsive"  style="width:210px; height:180px;" >
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
										<button class="btn btn-info btn-block addItemBtn"  style="width:104%;"><i class="fa fa-cart-plus"></i>&nbsp;&nbsp;Add to cart</button>
										&nbsp;&nbsp;
										<a href="details.php?id=<?= $row['id']; ?>" class="btn btn-info" style="width:105%;">View Details</a>
									</div>	
								</form>
							</div>	
						</div>
					
						<?php 
							}
						?>
						
					</div>
				</div>
											
				
				
                    
                
               
           </div><!--col-md-9 end-->
           
       </div><!-- container end -->
   </div><!--content end-->
   
  
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
