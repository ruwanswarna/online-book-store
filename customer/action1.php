	<?php

		include("db.php");
		
		if(isset($_POST['action'])){
			
			$sql = "select * from products where idCategory !=''";
			
				if(isset($_POST['products'])){
					
					$products = implode("','", $_POST['products']);
					$sql .= "AND p_cat_id IN('".$products."')";
					
				}
				
			if(isset($_POST['categories'])){
					
					$categories = implode("','", $_POST['categories']);
					$sql .= "AND idCategory IN('".$categories."')";
					
				}
			$result = $con->query($sql);
			$output = '';
			
			
			if($result->num_rows>0){
				while($row=$result->fetch_assoc()){
					$output .='
						
						<div id="message"></div>
						<div class="col-md-4 col-sm-6 single center-responsive">
							
							<div class="product">
								
								<a href="details.php">
										
									<img class="img-responsive" src=" images/books/'.$row['image']. ' " > 
								</a>
									
								<div class="text">
									
									<h3> ' .$row['title']. ' </h3>
										
									<p class="price">Rs: ' .$row['sellingPrice']. ' </p>
									<form action="" class="form-submit">
										<input type="hidden" class="porderid" value="'.$row['order_id'].'">
										<input type="hidden" class="pid" value="'.$row['id'].'">
										<input type="hidden" class="pname" value="'.$row['title'].'">
										<input type="hidden" class="pprice" value="'.$row['sellingPrice'].'">
										<input type="hidden" class="pimage" value="'.$row['image'].'">
										<input type="hidden" class="pcode" value="'.$row['code'].'">
										<input type="hidden" class="pweight" value="'.$row['weight'].'">
										<div class="btn-group d-flex">			
											<button class="btn btn-info btn-block addItemBtn"  style="width:104%;"><i class="fa fa-cart-plus"></i>&nbsp;&nbsp;Add to cart</button>
											&nbsp;&nbsp;
											<a href="details.php?id='.$row['id'].'" class="btn btn-info" style="width:105%;">View Details</a>
										</div>	
									</form>
								</div>
								
							</div>
							
					
					</div>';
					
				}
				
			}else{
				
				$output = "<h3> NO PRODUCT FOUND</h3>";
				
			}
			echo $output;
			
		}
	?>
	
	

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
