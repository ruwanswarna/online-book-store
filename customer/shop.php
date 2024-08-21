<?php

    $active='Shop';
    include("header1.php");

?>

<div id="content">
    <!--content start-->
    <div class="container">
        <!-- container start -->
        <div class="col-md-12">
            <!--col-md-12 start-->

            <ul class="breadcrumb">
                <!--breadcrumb start-->
                <li>
                    <a href="home.php">Home</a>
                </li>
                <li>
                    shop
                </li>
            </ul>
            <!--breadcrumb end-->

        </div>
        <!--col-md-12 end-->

        <div class="col-md-3">
            <!--col-md-3 start-->

            <?php 
        
                    include("sidebar.php");
    
                ?>

        </div>
        <!--col-md-3 end-->

        <div class="col-md-9">
            <!--col-md-9 start-->



            <div class='box'>
                <!--box start-->
                <h1>shop</h1>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod cumque rem vero id, voluptates, ipsa, commodi possimus, nostrum ad repellat explicabo. Animi sed saepe quis doloremque placeat, fuga dolore soluta!
                </p>
            </div>
            <!--box end-->


            <div id="result" class="row">
                <!--row start-->
                
                <div id="content" class="container" style="width: 90%;"><!-- container start -->
					<div id="message"></div>
					<div class="row">
						<?php
							include 'config.php';
							$stmt = $con->prepare("SELECT * FROM products");
							$stmt->execute();
							$result = $stmt->get_result();
							while($row = $result->fetch_assoc()){
						?>
						<div class="col-md-4 col-sm-6 single center-responsive">
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
            </div>
            <!--row end-->

            


            <center>
                <ul class="pagination">
                    <!--pagination start-->

                    <?php
                    
                        getPaginator(); 
                    
                    ?>

                </ul>
                <!--pagination end-->
             </center>

        </div>
        <!--col-md-9 end-->

        <div id="wait" style="position:absolute;top:40%;left:45%;padding: 200px 100px 100px 100px;"></div>

    </div><!-- container end -->
</div>
<!--content end-->


<?php 
        
    include("footer.php");
    
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

 
<script>
    $(document).ready(function(){

        //search filters | by letter start//

        $(function() {

            $.fn.extend({

                filterTable: function() {

                    return this.each(function() {

                        $(this).on('keyup', function() {

                            var $this = $(this),
                                search = $this.val().toLowerCase(),
                                target = $this.attr('data-filters'),
                                handel = $(target),
                                rows = handel.find('li a');

                            if (search == '') {

                                rows.show();

                            } else {

                                rows.each(function() {

                                    var $this = $(this);

                                    $this.text().toLowerCase().indexOf(search) === -1 ? $this.hide() : $this.show();

                                });

                            }

                        });

                    });

                }

            });

            $('[data-action="filter"][id="table-filter"]').filterTable()

        });

        //search filters | by letter start//

        //Hide and show start//

        $('.nav-toggle').click(function() {

            $('.panel-collapse,collapse-data').slideToggle(700, function() {

                if ($(this).css('display') == 'none') {

                    $(".hide-show").html('Show');

                } else {

                    $(".hide-show").html('Hide');

                }

            });

        });

        //Hide and show start//

    });

</script>

<script>
    $(document).ready(function(){

        //getProducts function start//

        function getProducts(){

            //products categories start//

          
            var sPath = "";
            var aInputs = $('li').find('.get_p_cat');
            var aKeys = Array();
            var aValues = Array();

            iKey = 0;
 
            $.each(aInputs, function(key, oInput)  {

                if (oInput.checked) {

                    aKeys[iKey] = oInput.value

                };

                iKey++;

            });

            if (aKeys.length > 0) {

                var sPath = '';

                for (var i = 0; i < aKeys.length; i++) {

                    sPath = sPath + 'p_cat[]=' + aKeys[i]+'&';

                }

            }
            //products categories end//


            //categories start//
            
            var aInputs = Array();
            var aInputs = $('li').find('.get_cat');
            var aKeys = Array();
            var aValues = Array();

            iKey = 0;

            $.each(aInputs, function(key, oInput) {

                if (oInput.checked) {

                    aKeys[iKey] = oInput.value

                };

                iKey++;

            });

            if (aKeys.length > 0) {

                var sPath = '';

                for (var i = 0; i < aKeys.length; i++) {

                    sPath = sPath + 'cat[]=' + aKeys[i]+'&';

                }

            }

            //categories end//

            //loading start//

            $('#wait').html('<img src="loading/805.gif"');

            //loading end//

            $.ajax({

                url:"load.php",
                method:"POST",

                data: sPath+'sAction=getProducts',

                success:function(data){

                    $('#products').html('');
                    $('#products').html(data);
                    $('#wait').empty();

                }
            });


            $.ajax({

                url: "load.php",
                method: "POST",

                data: sPath+'sAction=getPaginator',

                success:function(data){

                    $('.pagination').html('');
                    $('.pagination').html(data);


                }
            });

        }

        //getProducts function end//

        $('.get_p_cat').click(function(){

            getProducts();

        });


        $('.get_cat').click(function(){

            getProducts();

        });

    });

</script>

<script>

    $(document).ready(function(){
        
        $(".product_check").click(function(){
            $("#loader").show();
            
            var action = 'data';
            var products =get_filter_text("products");
            var categories =get_filter_text("categories");
            
            $.ajax({
               
                url:'action1.php',
                method:'POST',
                data:{action:action,products:products,categories:categories},
                success:function(response){
                    $("#result").html(response);
                    $("#loader").hide();
                    
                    
                }
                
            });
            
        });
        
        function get_filter_text(text_id){
            
            var filterData = [];
            
            $('#'+text_id+':checked').each(function(){
               
                filterData.push($(this).val());
                
            });
            
            return filterData;
        }
        
    });

</script>





</body>

</html>
