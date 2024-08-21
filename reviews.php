<?php
 
   include("header.php");
?>
   
	<div class="container-fluid">
		<div class="row">
			<!-- page -->
			<div class="row">
				<div class="col-md-12">
					<ul class="breadcrumb">
						<li>
							<a href="home.php">Home</a>
						</li>
						<li>Reviews Page</li>
					</ul>
				</div>
			</div>
			<!--// page -->
		</div>
	</div>
	
	<!--reviws-page-->
	<div class="container">
		<div class="row">
			
			<?php 
				include("db.php");
				$ratingDetails = "SELECT ratingNumber FROM item_rating";
				$rateResult = mysqli_query($con,$ratingDetails) or die("database error:".mysqli_error($con));
					$ratingNumber = 0;
					$count = 0;
					$fiveStarRating = 0;
					$fourStarRating = 0;
					$threeStarRating = 0;
					$twoStarRating = 0;
					$oneStarRating = 0;
					while($rate = mysqli_fetch_assoc($rateResult)){
						$ratingNumber+= $rate['ratingNumber'];
						$count+= 1;
						if($rate['ratingNumber']== 5){
							$fiveStarRating+= 1;
						}
						else if($rate['ratingNumber']== 4){
							$fourStarRating+= 1;
						}
						else if($rate['ratingNumber']== 3){
							$threeStarRating+= 1;
						}
						else if($rate['ratingNumber']== 2){
							$twoStarRating+= 1;
						}
						else if($rate['ratingNumber']== 1){
							$oneStarRating+= 1;
						}
					}
					$average = 0;
					if($ratingNumber && $count){
						$average = $ratingNumber/$count;
					}
			?>
			<br>
			<div id="ratingDetails">
				<div class="row">
					<div class="col-sm-4">
						<h4>Rating and Reviews</h4>
						<h2 class="bold padding-bottom-7"><?php printf('%.1f',$average); ?> <small>/ 5</small></h2>
						<?php
							$averageRating = round($average,0);
							for($i = 1; $i<=5; $i++){
								$ratingClass = "btn-default btn-grey";
								if($i<= $averageRating){
									$ratingClass = "btn-warning";
								}
						?>		
						<button type="button" class="btn btn-sm <?php echo $ratingClass; ?>" aria-label="Left-Align">
							<span class="fa fa-star" aria-hidden="true"></span>
						</button>
						<?php
							}
						?>
					</div>
					<div class="col-sm-4">
						<h4>Rating Summary</h4>
						<?php
							$fiveStarRatingPercent = round (($fiveStarRating/5)*100);
							$fiveStarRatingPercent = !empty($fiveStarRatingPercent)?
								$fiveStarRatingPercent.'%':'0%';
							$fourStarRatingPercent = round (($fourStarRating/5)*100);
							$fourStarRatingPercent = !empty($fourStarRatingPercent)?
								$fourStarRatingPercent.'%':'0%';
							$threeStarRatingPercent = round (($threeStarRating/5)*100);
							$threeStarRatingPercent = !empty($threeStarRatingPercent)?
								$threeStarRatingPercent.'%':'0%';
							$twoStarRatingPercent = round (($twoStarRating/5)*100);
							$twoStarRatingPercent = !empty($twoStarRatingPercent)?
								$twoStarRatingPercent.'%':'0%';
							$oneStarRatingPercent = round (($oneStarRating/5)*100);
							$oneStarRatingPercent = !empty($oneStarRatingPercent)?
								$oneStarRatingPercent.'%':'0%';	
						?>
						<div class="pull-left">
							<div class="pull-left" style="width: 35px; line-height: 1;">
								<div style="height: 9px; margin:5px 0;">5 <span class="fa fa-star"></span></div>
							</div>	
							<div class="pull-left" style="width: 180px;">
								<div class="progress" style="height: 9px; margin:8px 0;">
									<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $fiveStarRatingPercent; ?>">
										<span class="sr-only"><?php echo $fiveStarRatingPercent; ?></span>
									</div>
								</div>
							</div>	
							<div class="pull-right" style="margin-left:10px;"><?php echo $fiveStarRating; ?></div>
						</div>
						<br>
						<div class="pull-left">
							<div class="pull-left" style="width: 35px; line-height: 1;">
								<div style="height: 9px; margin:5px 0;">4 <span class="fa fa-star"></span></div>
							</div>	
							<div class="pull-left" style="width: 180px;">
								<div class="progress" style="height: 9px; margin:8px 0;">
									<div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="4" aria-valuemin="0" aria-valuemax="5" style="width:<?php echo $fourStarRatingPercent; ?>">
										<span class="sr-only"><?php echo $fourStarRatingPercent; ?></span>
									</div>
								</div>
							</div>	
							<div class="pull-right" style="margin-left:10px;"><?php echo $fourStarRating; ?></div>
						</div>
						<br>
						<div class="pull-left">
							<div class="pull-left" style="width: 35px; line-height: 1;">
								<div style="height: 9px; margin:5px 0;">3 <span class="fa fa-star"></span></div>
							</div>	
							<div class="pull-left" style="width: 180px;">
								<div class="progress" style="height: 9px; margin:8px 0;">
									<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $threeStarRatingPercent; ?>">
										<span class="sr-only"><?php echo $threeStarRatingPercent; ?></span>
									</div>
								</div>
							</div>	
							<div class="pull-right" style="margin-left:10px;"><?php echo $threeStarRating; ?></div>
						</div>
						<br>
						<div class="pull-left">
							<div class="pull-left" style="width: 35px; line-height: 1;">
								<div style="height: 9px; margin:5px 0;">2 <span class="fa fa-star"></span></div>
							</div>	
							<div class="pull-left" style="width: 180px;">
								<div class="progress" style="height: 9px; margin:8px 0;">
									<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $twoStarRatingPercent; ?>">
										<span class="sr-only"><?php echo $twoStarRatingPercent; ?></span>
									</div>
								</div>
							</div>	
							<div class="pull-right" style="margin-left:10px;"><?php echo $twoStarRating; ?></div>
						</div>
						<br>
						<div class="pull-left">
							<div class="pull-left" style="width: 35px; line-height: 1;">
								<div style="height: 9px; margin:5px 0;">1 <span class="fa fa-star"></span></div>
							</div>	
							<div class="pull-left" style="width: 180px;">
								<div class="progress" style="height: 9px; margin:8px 0;">
									<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $oneStarRatingPercent; ?>">
										<span class="sr-only"><?php echo $oneStarRatingPercent; ?></span>
									</div>
								</div>
							</div>	
							<div class="pull-right" style="margin-left:10px;"><?php echo $oneStarRating; ?></div>
						</div>
					</div>
					<div class="col-sm-3">
						<button type="button" id="rateProduct" class="btn btn-default">Rate this product</button>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-7">
						<h4>Customer Reviews & Ratings</h4>
						<hr/>
						<div class="review-block">
							<?php
								$ratinguery = "SELECT ratingId, itemId, userId, ratingNumber, customer_name, title, comments, created, modified FROM item_rating";
								$ratingResult = mysqli_query($con, $ratinguery) or die("database error:". mysqli_error($con));
								while($rating = mysqli_fetch_assoc($ratingResult)){
									$date=date_create($rating['created']);
									$reviewDate = date_format($date,"M d, Y");
									$userid = 1234567;
									$postid = $rating['ratingId'];
									$type = -1;

										// Checking user status
										$status_query = "SELECT count(*) as cntStatus,type FROM like_unlike WHERE userid=".$userid." and postid=".$postid;
										$status_result = mysqli_query($con,$status_query);
										$status_row = mysqli_fetch_array($status_result);
										$count_status = $status_row['cntStatus'];
										if($count_status > 0){
											$type = $status_row['type'];
										}

										// Count post total likes and unlikes
										$like_query = "SELECT COUNT(*) AS cntLikes FROM like_unlike WHERE type=1 and postid=".$postid;
										$like_result = mysqli_query($con,$like_query);
										$like_row = mysqli_fetch_array($like_result);
										$total_likes = $like_row['cntLikes'];

										$unlike_query = "SELECT COUNT(*) AS cntUnlikes FROM like_unlike WHERE type=0 and postid=".$postid;
										$unlike_result = mysqli_query($con,$unlike_query);
										$unlike_row = mysqli_fetch_array($unlike_result);
										$total_unlikes = $unlike_row['cntUnlikes'];

							?>
							<div class="row">
								<div class="col-sm-3">
									<img src="images/profile.jpeg" class="img-rounded" style="width:50%">
									<div class="review-block-name">By <a href="#"><?php echo $rating['customer_name']; ?></a></div>
									<div class="review-block-date"><?php echo $reviewDate; ?></div>
								</div>
								<div class="col-sm-6">
									<div class="review-block-rate">
										<?php
										for ($i = 1; $i <= 5; $i++) {
											$ratingClass = "btn-default btn-grey";
											if($i <= $rating['ratingNumber']) {
												$ratingClass = "btn-warning";
											}
										?>
										<button type="button" class="btn btn-xs <?php echo $ratingClass; ?>" aria-label="Left Align">
											<span class="fa fa-star" aria-hidden="true"></span>
										</button>
										<?php } ?>
									</div>
									<div class="review-block-title"><?php echo $rating['title']; ?></div>
									<div class="review-block-description"><?php echo $rating['comments']; ?></div>
									<div class="post">
										<div class="post-action">
											<input type="button" value="Like" id="like_<?php echo $postid; ?>" class="like" style="<?php if($type == 1){ echo "color: #ffa449;"; } ?>"/>&nbsp;<span class="fa fa-thumbs-up" aria-hidden="true"></span>&nbsp;(<span id="likes_<?php echo $postid; ?>"><?php echo $total_likes; ?></span>)&nbsp;
											<input type="button" value="Unlike" id="unlike_<?php echo $postid; ?>" class="unlike" style="<?php if($type == 0){ echo "color: #ffa449;"; } ?>" />&nbsp;<span class="fa fa-thumbs-down" aria-hidden="true"></span>&nbsp;(<span id="unlikes_<?php echo $postid; ?>"><?php echo $total_unlikes; ?></span>)
										</div>
									</div>
								</div>
							</div>
							<hr/>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		
			<div id="ratingSection" style="display:none;">
				<div class="row">
					<div class="col-sm-12">
						<form id="ratingForm" method="POST">
							<div class="form-group">
								<h4>Rate this product</h4>
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
							<div class="form-group">
								<label for="name">Name*</label>
								<input type="text" class="form-control" id="name" name="name" required>
							</div>
							<div class="form-group">
								<label for="usr">Title*</label>
								<input type="text" class="form-control" id="title" name="title" required>
							</div>
							<div class="form-group">
								<label for="comment">Comment*</label>
								<textarea class="form-control" rows="5" id="comment" name="comment" required></textarea>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-info" id="saveReview">Save Review</button> 
								<button type="button" class="btn btn-info" id="cancelReview">Cancel</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--//end-review-page-->
	<br>
	
	<?php 
        
		include("footer.php");
    
	?>

	
	
	
 

  <script src="js/jquery-2.2.3.min.js"></script>
  <script src="js/bootstrap-337.min.js"></script>
  
  <!--likes and unlikes-->
  <script>
	$(document).ready(function(){

		// like and unlike click
		$(".like, .unlike").click(function(){
			var id = this.id;   // Getting Button id
			var split_id = id.split("_");

			var text = split_id[0];
			var postid = split_id[1];  // postid

			// Finding click type
			var type = 0;
			if(text == "like"){
				type = 1;
			}else{
				type = 0;
			}

			// AJAX Request
			$.ajax({
				url: 'likeunlike.php',
				type: 'post',
				data: {postid:postid,type:type},
				dataType: 'json',
				success: function(data){
					var likes = data['likes'];
					var unlikes = data['unlikes'];

					$("#likes_"+postid).text(likes);        // setting likes
					$("#unlikes_"+postid).text(unlikes);    // setting unlikes

					if(type == 1){
						$("#like_"+postid).css("color","#ffa449");
						$("#unlike_"+postid).css("color","lightseagreen");
					}

					if(type == 0){
						$("#unlike_"+postid).css("color","#ffa449");
						$("#like_"+postid).css("color","lightseagreen");
					}

				}
			});

		});

	});
	
  </script>
  <!--//likes and unlikes-->
  
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
