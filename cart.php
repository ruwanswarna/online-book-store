<?php
    
	include("db.php");
	include("header.php");
?>

    <!-- page -->

    <div class="container">
        <div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li>
						<a href="home.php">Home</a>
					</li>
					<li>Shopping-Cart Page</li>
				</ul>
			</div>
        </div>
    </div> 
    <!-- //page -->
            
	<div class="container-fluid">
        <div class="row">
			
			<div class="col-md-3"><!--col-md-3 start-->
               
				<?php 
					include("sidebar1.php");
				?>
               
			</div><!--col-md-3 end-->
      
    
			<!--shopping-cart-table-start-->
			<div id="cart" class="col-md-8">
				<div style="display:<?php if(isset($_SESSION['showAlert'])){echo $_SESSION['showAlert'];}else { echo 'none';} unset($_SESSION['showAlert']); ?>" class="alert alert-success alert-dismissible mt-3">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong><?php if(isset($_SESSION['message'])){echo $_SESSION['message'];} unset($_SESSION['showAlert']); ?></strong>
				</div>
				<div class="box">
					<form action="cart.php" method="post" enctype="multipart/form-data">
						<h1>Shopping Cart</h1>
						
						<div class="table-responsive mt-2">
							<table class="table table-bordered table-striped text-center">
								<thead><!--table-header-start-->
									<tr>
										<th width="30%">Product Name</th>
										<th width="20%">Image</th>
										<th width="13%">Unit-Weight</th>
										<th width="10%">Sub-Weight</th>
										<th width="10%">Quantity</th>
										<th width="13%">Unit-Price</th>
										<th width="10%">Sub-Total</th>
										<th width="17%">Remove-Item</th>
									</tr>
								</thead><!--table-header-stop-->
								<tbody><!--table-body-start-->
									<?php
										require 'config.php';
										$stmt = $con->prepare("SELECT * FROM cart");
                                        $stmt->execute();
										$result = $stmt->get_result();
										$grand_total = 0;
										$grand_total_weight = 0;
										global $del_cost;
										$tol_amount = 0;
										while($row = $result->fetch_assoc()){
									?>
									<tr>
                                        <input type="hidden" class="porderid" value="<?= $row['order_id'] ?>">
										<input type="hidden" class="pid" value="<?= $row['id'] ?>">
										<td><?= $row['title'] ?></td>
										<td><img src="images/books/<?= $row['image'] ?>" style="width:60%"></td>
										<td><?= $row['weight'] ?>g</td>
										<input type="hidden" class="pweight" value="<?= $row['weight'] ?>">
										<td><?= $row['total_weight'] ?>g </td>
										<td><input type="number" class="form-control itemQty" value="<?= $row['qty'] ?>" style="width:75px;"></td>
										<td>Rs.<?= number_format($row['sellingPrice'],2); ?></td>
										<input type="hidden" class="pprice" value="<?= $row['sellingPrice'] ?>">
										<td>Rs.<?= number_format($row['total_price'],2); ?></td>
										<td>
											<a href="action.php?remove=<?= $row['id'] ?>" class="text-danger lead" onclick="return confirm('Are you sure want to remove this item?');"><i class="fa fa-trash"></i></a>
										</td>
									</tr>
									<?php 
										$grand_total +=$row['total_price'];
										$grand_total_weight +=$row['total_weight'];
										$tol_amount = $grand_total+$del_cost ;
									?>
									<?php
										}
									?>
									<tr>
										<td colspan="3"><b>Total-weight</b></td>
										<td><?= $grand_total_weight ?>g</td>
										<?php
											if((0<=$grand_total_weight)&&($grand_total_weight<250)){
												$del_cost = 100;
											}else if((250<=$grand_total_weight)&&($grand_total_weight<500)){
												$del_cost = 125;
											}else if((500<=$grand_total_weight)&&($grand_total_weight<1000)){
												$del_cost = 150;
											}else if((1000<=$grand_total_weight)&&($grand_total_weight<1500)){
												$del_cost=175;
											}else if((1500<=$grand_total_weight)&&($grand_total_weight<2000)){
												$del_cost=200;
											}else if((2000<=$grand_total_weight)&&($grand_total_weight<2500)){
												$del_cost = 225;
											}else if((2500<=$grand_total_weight)&&($grand_total_weight<3000)){
												$del_cost = 250;
											}else if((3000<=$grand_total_weight)&&($grand_total_weight<4000)){
												$del_cost = 300;
											}else if((4000<=$grand_total_weight)&&($grand_total_weight<5000)){
												$del_cost = 350;
											}else if((5000<=$grand_total_weight)&&($grand_total_weight<6000)){
												$del_cost = 400;
											}else if((6000<=$grand_total_weight)&&($grand_total_weight<7000)){
												$del_cost = 450;
											}else if((7000<=$grand_total_weight)&&($grand_total_weight<8000)){
												$del_cost = 500;
											}else if((8000<=$grand_total_weight)&&($grand_total_weight<9000)){
												$del_cost = 550;
											}else if((9000<=$grand_total_weight)&&($grand_total_weight<10000)){
												$del_cost = 600;
											}else if((10000<=$grand_total_weight)&&($grand_total_weight<11000)){
												$del_cost = 650;
											}else if((11000<=$grand_total_weight)&&($grand_total_weight<12000)){
												$del_cost = 700;
											}else if((12000<=$grand_total_weight)&&($grand_total_weight<13000)){
												$del_cost = 750;
											}else if((13000<=$grand_total_weight)&&($grand_total_weight<14000)){
												$del_cost = 800;
											}else if((14000<=$grand_total_weight)&&($grand_total_weight<15000)){
												$del_cost = 850;
											}else if((15000<=$grand_total_weight)&&($grand_total_weight<16000)){
												$del_cost = 900;
											}else if((16000<=$grand_total_weight)&&($grand_total_weight<17000)){
												$del_cost = 950;
											}else if((17000<=$grand_total_weight)&&($grand_total_weight<18000)){
												$del_cost = 1000;
											}else if((18000<=$grand_total_weight)&&($grand_total_weight<19000)){
												$del_cost = 1050;
											}else if((19000<=$grand_total_weight)&&($grand_total_weight<20000)){
												$del_cost = 1100;
											}else if((20000<=$grand_total_weight)&&($grand_total_weight<25000)){
												$del_cost = 1250;	
											}else(25000<=$grand_total_weight){
												$del_cost = 1500
											}
										?>
										<td colspan="2"><b>Total</b></td>
										<td>Rs.<?= number_format($grand_total,2); ?></td>
										<td></td>
									</tr>
									<tr>
										<td colspan="6"><b>Delivery Cost</b></td>
										<td>Rs.<?= number_format($del_cost,2); ?></td>
										<td></td>
									</tr>
									<?php
										$tol_amount = $grand_total+$del_cost ;
									?>
									<tr>
										<td colspan="6"><b>Total Amount</b></td>
										<td>Rs.<?= number_format($tol_amount,2); ?></td>
										<td>
											<a href="action.php?clear=all" class="badge-danger badge p-1" onclick="return confirm('Are you sure want to remove your item?')">Remove All</a>
										</td>
									</tr>
								</tbody><!--table-body-stop-->
							</table>
						</div>
						<div class="box-footer">
							<div class="pull-left">
								<a href="wishlist.php" class="btn btn-default">
									<i class="fa fa-chevron-left">Go to Wishlist</i>
								</a>
							</div>
							<div class="pull-right">
								<a href="home.php" class="btn btn-default">
									<i class="fa fa-chevron-left">Continue Shopping</i>
								</a>
							
								<a href="checkout.php" class="btn btn-default <?= ($grand_total>1)?"":"disabled" ?>">Checkout
									<i class="fa fa-chevron-right"></i>
								</a>
							</div>
						</div>
					</form>
				</div>
				<!--shopping-cart-table-stop-->
				<br>
				<div class="box">
					<div class="table-responsive mt-2">
						<table class="table table-bordered table-striped text-center">
							<h4><p>Depending on the weight of the books the following charges are charged for delivering</P></h4>
							<thead>
								<tr>
									<th width="10%">Total Weight(W)</th>
									<th width="10%">Delivery Charges</th>
									<th width="10%">Total Weight(W)</th>
									<th width="10%">Delivery Charges</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>0g <= W < 250g</td>
									<td>Rs.100</td>
									<td>9000g <= W < 10000g</td>
									<td>Rs.600</td>
								</tr>
								<tr>
									<td>250g <= W < 500g</td>
									<td>Rs.125</td>
									<td>10000g <= W < 11000g</td>
									<td>Rs.650</td>
								</tr>
								<tr>
									<td>500g <= W < 1000g</td>
									<td>Rs.150</td>
									<td>11000g <= W < 12000g</td>
									<td>Rs.700</td>
								</tr>
								<tr>
									<td>1000g <= W < 1500g</td>
									<td>Rs.175</td>
									<td>12000g <= W < 13000g</td>
									<td>Rs.750</td>
								</tr>
								<tr>
									<td>1500g <= W < 2000g</td>
									<td>Rs.200</td>
									<td>13000g <= W < 14000g</td>
									<td>Rs.800</td>
								</tr>
								<tr>
									<td>2000g <= W < 2500g</td>
									<td>Rs.225</td>
									<td>14000g <= W < 15000g</td>
									<td>Rs.850</td>
								</tr>
								<tr>
									<td>2500g <= W < 3000g</td>
									<td>Rs.250</td>
									<td>15000g <= W < 16000g</td>
									<td>Rs.900</td>
								</tr>
								<tr>
									<td>3000g <= W < 4000g</td>
									<td>Rs.300</td>
									<td>16000g <= W < 17000g</td>
									<td>Rs.950</td>
								</tr>
								<tr>
									<td>4000g <= W < 5000g</td>
									<td>Rs.350</td>
									<td>17000g <= W < 18000g</td>
									<td>Rs.1000</td>
								</tr>
								<tr>
									<td>5000g <= W < 6000g</td>
									<td>Rs.400</td>
									<td>18000g <= W < 19000g</td>
									<td>Rs.1050</td>
								</tr>
								<tr>
									<td>6000g <= W < 7000g</td>
									<td>Rs.450</td>
									<td>19000g <= W < 20000g</td>
									<td>Rs.1100</td>
								</tr>
								<tr>
									<td>7000g <= W < 8000g</td>
									<td>Rs.500</td>
									<td>20000g <= W < 25000g</td>
									<td>Rs.1250</td>
								</tr>
								<tr>
									<td>8000g <= W < 9000g</td>
									<td>Rs.550</td>
									<td>20000g <= W < 25000g</td>
									<td>Rs.1500</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	



	<?php 
        
    include("footer.php");
    
    ?>
   
	
	
 

  <script src="js/jquery-2.2.3.min.js"></script>
  <script src="js/bootstrap-337.min.js"></script>

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


</body>

</html>
