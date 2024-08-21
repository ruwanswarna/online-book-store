<?php
 
   include("header.php");
   
	if(isset($_GET['id'])){
		$id = $_GET['id'];
	   
		$sql = "SELECT * FROM products WHERE id = '$id'";
		$result = mysqli_query($con,$sql);
		$row = mysqli_fetch_array($result);
	   
		$p_cat_id = $row['p_cat_id'];
	    $idCategory = $row['idCategory'];
		$pname = $row['title'];
		$pprice = $row['sellingPrice'];
		$pdesc = $row['description'];
		$pimage = $row['image'];
		$pimage1 = $row['image1'];
		$pimage2 = $row['image2'];
		$ppublisher = $row['publisher'];
		$ppub_year = $row['published_year'];
		$paname = $row['author_name'];
		$pweight = $row['weight'];
		$pnumber = $row['ISBN_num'];
		$ppages = $row['pages'];
		   
		$q1 = "SELECT * FROM product_categories WHERE p_cat_id= '$p_cat_id'";
		$res1 = mysqli_query($con,$q1);
		$row1 = mysqli_fetch_array($res1);
		   
		$p_cat_title = $row1['p_cat_title'];
		   
		$q2 = "SELECT * FROM categories WHERE id= ' $idCategory'";
		$res2 = mysqli_query($con,$q2);
		$row2 = mysqli_fetch_array($res2);
		   
		$Category = $row2['Category'];


		//****************add to wishlist button status set*********************
		$setStatus =" Add to Wishlist";
		$getQuery = "SELECT * FROM wishlist";
		$getResult=mysqli_query($con,$getQuery);

			while ($set=mysqli_fetch_assoc($getResult)) {

				if ($set['bid'] == $id ) {
				$setStatus = " Book is in Wishlist";
				}

			}




		//*********************************************
		
	}
	else {
		echo 'No product found!';
	}
  

  	


?>


    
	<div class="container">
		<div class="row">
			<!-- page -->
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li>
						<a href="home.php">Home</a>
					</li>
					<li>Details Page</li>
				</ul>
			</div>
			<!-- //page -->
		</div>
	</div>
	
	<div class="container-fluid">
		<div class="row">
			
			<div class="col-md-3"><!--col-md-3 start-->
               
				<?php 
					include("sidebar.php");
				?>
               
			</div><!--col-md-3 end-->
		
			<!--start-Details-Page-Area-->
			<div class="col-md-9">
				<div id="productMain" class="row">
					<div id="message"></div>
					<div class="col-sm-5">
						<div id="mainImage">
							<div class="carousel slide" id="myCarousel" data-ride="carousel"><!-- carousel slide Begin -->
								<ol class="carousel-indicators">
									<li class="active" data-target="#myCarousel" data-slide-to="0"></li>
									<li data-target="#myCarousel" data-slide-to="1"></li>
									<li data-target="#myCarousel" data-slide-to="2"></li>
								</ol>
					   
								<div class="carousel-inner">
									<div class="item active">
										<center>
											<img class="img-responsive" src="images/books/<?= $pimage; ?>" alt="">
										</center>
									</div>
						   
									<div class="item">
										<center>
											<img class="img-responsive" src="images/books/<?= $pimage1; ?>" alt="">
										</center>
									</div>
						   
									<div class="item">
										<center>
											<img class="img-responsive" src="images/books/<?= $pimage2; ?>" alt="">
										</center>
									</div>
								</div>
					   
								<a href="#myCarousel" class="carousel-control left" data-slide="prev"><!-- left carousel-control Begin -->
								
									<span class="glyphicon glyphicon-chevron-left  fa fa-chevron-left"></span>
									<span class="sr-only">Next</span>
						   
								</a><!-- left carousel-control Finish -->
					   
								<a href="#myCarousel" class="right carousel-control" data-slide="next"><!-- right carousel-control Begin -->
						   
									<span class="glyphicon glyphicon-chevron-left fa fa-chevron-right"></span>
									<span class="sr-only">Next</span>
						   
								</a><!-- right carousel-control Finish -->
					   
							</div><!-- carousel slide Finish -->
						</div>
						<br>
						<br>
						<div class="row" id="thumbs">
							<div class="col-xs-4">
								<a data-target="#myCarousel" data-slide-to="0" href="#" class="thumb">
									<img  src="images/books/<?= $pimage; ?>" alt="" class="img-responsive">
								</a>
							</div>
							<div class="col-xs-4">
								<a data-target="#myCarousel" data-slide-to="1" href="#" class="thumb">
									<img  src="images/books/<?= $pimage1; ?>" alt="" class="img-responsive" >
								</a>
							</div>
							<div class="col-xs-4">
								<a data-target="#myCarousel" data-slide-to="2" href="#" class="thumb">
									<img src="images/books/<?= $pimage2; ?>" alt="" class="img-responsive">
								</a>
							</div>
						</div>
						<br>
						<br>
						<p class="social">Share :
							<a href="#"><button class="btn btn-info i fa fa-facebook"></button></a>
							<a href="#"><button class="btn btn-info i fa fa-twitter"></button></a>
							<a href="#"><button class="btn btn-info i fa fa-instagram"></button></a>
							<a href="#"><button class="btn btn-info i fa fa-google-plus"></button></a>
							<a href="#"><button class="btn btn-info i fa fa-whatsapp"></button></a>
						</p>
					</div>
				
					<div class="col-sm-7">
						<div class="box">
							<center>
								<h2 class="text-center"><?= $pname; ?></h2>
							</center>
							
							
							<table class="table table-bordered" width="500px">
								<tr>
									<th>Category </th>
									<td><?= $p_cat_title; ?></td>
								</tr>
								<tr>
									<th>Language </th>
									<td><?= $Category; ?></td>
									
								</tr>
								<tr>
									<th>Publisher </th>
									<td><?= $ppublisher; ?></td>
								<tr>
									<th>ISBN Number </th>
									<td><?= $pnumber; ?></td>
								</tr>
								<tr>
									<th>Author-Name </th>
									<td><?= $paname; ?></td>
								</tr>
								<tr>
									<th>Published Year </th>
									<td><?= $ppub_year; ?></td>
								</tr>
								<tr>
									<th>Pages </th>
									<td><?= $ppages; ?></td>
								</tr>
								<tr>
									<th>Price </th>
									<td><?= $pprice; ?></td>
								</tr>
								<tr>
									<th>Book-Weight </th>
									<td><?= $pweight; ?></td>
								</tr>
								
								<tr>
									<th>Description </th>
									<td><?= $pdesc; ?></td>
								</tr>
								<tr>
									<th>Reviews</th>
									<td>
										<div class="col-sm-6">
											<form id="ratingForm" method="POST">
												<div class="form-group">
													<button type="button" class="btn btn-warning btn-sm rateButton" aria-label="Left Align">
														<span class="fa fa-star" aria-hidden="true"></span>
													</button>
													<button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
														<span class="fa fa-star" aria-hidden="true"></span>
													</button>
													<button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
														<span class="fa fa-star" aria-hidden="true"></span>
													</button>
													<button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
														<span class="fa fa-star" aria-hidden="true"></span>
													</button>
													<button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
														<span class="fa fa-star" aria-hidden="true"></span>
													</button>
													<input type="hidden" class="form-control" id="rating" name="rating" value="1">
													<input type="hidden" class="form-control" id="itemId" name="itemId" value="12345678">
												</div>
											</form>
										</div>
									</td>
								</tr>
							</table>
							<form action="" class="form-submit">
								<input type="hidden" class="porderid" value="<?= $row['order_id'] ?>">
								<input type="hidden" class="pid" value="<?= $row['id'] ?>">
								<input type="hidden" class="pname" value="<?= $row['title'] ?>">
								<input type="hidden" class="pprice" value="<?= $row['sellingPrice'] ?>">
								<input type="hidden" class="pimage" value="<?= $row['image'] ?>">
								<input type="hidden" class="pcode" value="<?= $row['code'] ?>">
								<input type="hidden" class="pweight" value="<?= $row['weight'] ?>">
								<input type="hidden" id="wl" value=" <?= $id; ?>">
								<input type="hidden" id="uwl" value=" <?= $_SESSION['customer_email']; ?>">
								<div class="btn-group d-flex">				
									<button class="btn btn-default btn-block addItemBtn"  style="width:45%;"><i class="fa fa-cart-plus"></i>&nbsp;&nbsp;Add to cart</button>
									&nbsp;&nbsp;
									<a  id="test" onclick="wlt()" class="btn btn-info" style="width:50%;"><i class="fa fa-heart-o"></i><span class="spanwl"><?= $setStatus; ?></span></a> 
								</div>	
								<p id="msg"></p>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>
	<br>
	<?php 
        
    include("footer.php");
    
    ?>




    <script>

    	var bid = document.getElementById('wl').value;
    	var uid = document.getElementById('uwl').value;

    	

    	

    function wlt(){
    	
        
    	$.ajax({
				url: 'wl.php',
				method: 'POST',
				data: {id: bid, cid:uid},
				success:function(response){
					//$(.spanwl).html(response)
					var status = response;
				$("#test").html( '<i class="fa fa-heart" aria-hidden="true"></i>' + status);
				}
			});


    }
</script>
   
	
	
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
 
 
  
  <!--reviws and ratings-->
  <script>
	$(function(){
		//rating form hide/show
		$("#rateProduct").click(function(){
			$("#ratingDetails").hide();
			$("#ratingSection").show();
		});
		$("#cancelReview").click(function(){
			$("#ratingSection").hide();
			$("#ratingDetails").show();
		});
		
		//implement start rating select/deselect
		$(".rateButton").click(function(){
			if($(this).hasClass('btn-grey')){
				$(this).removeClass('btn-grey btn-default').addClass('btn-warning star-selected');
				$(this).prevAll('.rateButton').removeClass('btn-grey btn-default').addClass('btn-warning star-selected');
				$(this).nextAll('.rateButton').removeClass('btn-warning star-selected').addClass('btn-grey btn-default');
			}else{
				$(this).nextAll('.rateButton').removeClass('btn-warning star-selected').addClass('btn-grey btn-default');
			}
			$("#rating").val($('.star-selected').length);
		});
		
		//save review using Ajax
		$('#ratingForm').on('submit', function(event){
		event.preventDefault();
		var formData = $(this).serialize();
		
			$.ajax({
				type : 'POST',
				url : 'saveRating.php',
				data : formData,
				success:function(response){
					$("#ratingForm")[0].reset();
					window.setTimeout(function(){window.location.reload()},3000)
				}
			});
		});
	});

  </script>
  <!--//reviws and ratings-->
  
  <!--//shopping cart-->
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
	<!--//shopping cart-->
	
	

</body>

</html>

	
	