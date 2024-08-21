<?php

$db = mysqli_connect("localhost","root","","project");


///function getRealIpUser start///

function getRealIpUser(){
    
    switch(true){
            
            case(!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
            case(!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
            case(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
            
            default : return $_SERVER['REMOTE_ADDR'];
    }
    
}

///function getRealIpUser end///

/// getPro functions start ///

function getPro(){
    
    global $db; 
 
    $get_products = "select * from products order by 1 DESC LIMIT 0,8";
    
    $run_products = mysqli_query($db,$get_products);
    
    while($row_products=mysqli_fetch_array($run_products)){
        
        $pro_id = $row_products['id'];
        
        $pro_title = $row_products['title'];
        
        $pro_price = $row_products['sellingPrice'];
        
        $pro_img1 = $row_products['imqage'];
        
        echo "
        
        <div class='col-md-4 col-sm-6 single'>
        
            <div class='product'>
            
                <a href='details.php?pro_id=$pro_id'>
                
                    <img class='img-responsive' src='images/books/$pro_img1'>
                
                </a>
            
                <div class='text'>
                
                    <h3>
                    
                        <a href='details.php?pro_id=$pro_id'>
                
                        $pro_title
                
                        </a>
                    
                    </h3>
                    
                    <p class='price'>
                    
                        Rs: $pro_price
                    
                    </p>
                    
                    <p class='button'>
                    
                        <a class='btn btn-default' href='details.php?pro_id=$pro_id'>
                
                            View Details
                
                        </a>
                        
                        <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>
                
                            <i class='fa fa-shopping-cart'></i>
                
                        </a>
                    </p>
                
                </div>
             
            </div>
        
        </div>
        
        ";
        
    }
    
}

/// getPro functions end ///

/// getPcats functions start ///

function getPcats(){
    
    global $db; 
 
    $get_p_cats = "select * from product_categories";
    
  $run_p_cats = mysqli_query($db,$get_p_cats);
    
    while($row_p_cats=mysqli_fetch_array($run_p_cats)){
        
        $p_cat_id = $row_p_cats['p_cat_id'];
        
        $p_cat_title = $row_p_cats['p_cat_title'];
        
        echo "
        
            <li>
            
           <a href='shop1.php?p_cat=$p_cat_id'> $p_cat_title </a>                
            
            </li>
        
        ";
        
}
    
}

/// getpcats functions end ///

/// getCats functions start ///

function getCats(){
    
   global $db; 
 
    $get_cats = "select * from categories";
    
    $run_cats = mysqli_query($db,$get_cats);
    
    while($row_cats=mysqli_fetch_array($run_cats)){
        
        $cat_id = $row_cats['id'];
        
        $cat_title = $row_cats['Category'];
        
       echo "
        
            <li>
            
            <a href='shop1.php?cat=$cat_id'> $cat_title </a>                
            
            </li>
        
        ";
        
   }
}

/// getProducts functions start ///

/// getProducts functions end ///

    function getProducts(){
        
        global $db;
        
        $aWhere = array();
        
        /// product category start ///
        
        if(isset($_REQUEST['p_cat'])&&is_array($_REQUEST['p_cat'])){
            
            foreach($_REQUEST['p_cat'] as $sKey=>$sVal){
                
                if((int)$sVal!=0){
                    
                    $aWhere[] = 'p_cat_id='.(int)$sVal;
                    
                }
                
            }
            
        }
        
        /// product category end ///
        
        ///  category start ///
        
        if(isset($_REQUEST['cat'])&&is_array($_REQUEST['cat'])){
            
            foreach($_REQUEST['cat'] as $sKey=>$sVal){
                
                if((int)$sVal!=0){
                    
                    $aWhere[] = 'id='.(int)$sVal;
                    
                }
                
            }
            
        }
        
        ///  category end ///
        
        $per_page=6;
        
        if(isset($_GET['page'])){
              
            $page = $_GET['page'];
            
        }else{  
            
            $page=1; 
            
        }
        
        $start_from = ($page-1) * $per_page;
        $sLimit = " order by 1 DESC LIMIT $start_from,$per_page";
        $sWhere = (count($aWhere)>0?' WHERE '.implode(' or ',$aWhere):'').$sLimit;
        $get_products = "select * from products ".$sWhere;
        $run_products = mysqli_query($db,$get_products);
        while($row_products=mysqli_fetch_array($run_products)){
			
            $proc_id = $row_products['id'];
            $proc_title = $row_products['title'];
            $proc_price = $row_products['sellingPrice'];
            $proc_img1 = $row_products['image'];
            echo "
				<div id='content' class='container' style='width: 90%;'><!-- container start -->
					<div id='message'></div>
					<div class='row'>
						<div class='col-md-4 col-sm-6 single center-responsive'>
								<img src='images/books/$proc_img1' class='img-responsive'  style='width:180px; height:180px;'>
								<h4 class='text-center text-info'>$proc_title</h4>
								<h5 class='text-center text-danger'>Rs.$proc_price</h5>
								<form action='' class='form-submit'>
									
									<div class='btn-group d-flex'>			
										<button class='btn btn-info btn-block addItemBtn'  style='width:100%;'><i class='fa fa-cart-plus'></i>&nbsp;&nbsp;Add to cart</button>
										&nbsp;&nbsp;
										<a href='details.php?id= $proc_id' class='btn btn-info' style='width:100%;'>View Details</a>
									</div>	
								</form>
							</div>	
					</div>
					</div>
				</div>
				
            ";
            
        }
    } 

/// getCats functions end ///

///getPaginator() function start///

    function getPaginator(){
        
        global $db;
        
        $per_page=6;
        $aWhere = array();
        $aPath = '';
        
         if(isset($_REQUEST['p_cat'])&&is_array($_REQUEST['p_cat'])){
            
            foreach($_REQUEST['p_cat'] as $sKey=>$sVal){
                
                if((int)$sVal!=0){
                    
                    $aWhere[] = 'p_cat_id='.(int)$sVal;
                    $aPath.= 'p_cat[]='.(int)$sVal.'&';
                    
                }
                
            }
            
        }
        
        /// product category end ///
        
        ///  category start ///
        
        if(isset($_REQUEST['cat'])&&is_array($_REQUEST['cat'])){
            
            foreach($_REQUEST['cat'] as $sKey=>$sVal){
                
                if((int)$sVal!=0){
                    
                    $aWhere[] = 'id='.(int)$sVal;
                      $aPath.= 'cat[]='.(int)$sVal.'&';
                }
                
            }
            
        }
        
        ///  category end ///
        
        $sWhere = (count($aWhere)>0?' WHERE '.implode(' or ',$aWhere):'');
        $query = "select * from products ".$sWhere;
        $result = mysqli_query($db,$query);
        $total_records = mysqli_num_rows($result);
        $total_pages = ceil($total_records / $per_page);
        
        echo "<li> <a href='shop.php?page=1";
        
        if(!empty($aPath)){
            
                
            echo "&".$aPath;
            
        }
            
            echo "'>".'First Page'."</a></li>";
        
        for($i=1; $i<=$total_pages; $i++){
            
          echo "<li> <a href='shop.php?page=".$i.(!empty($aPath)?'&'.$aPath:'')."'>".$i."</a></li>"; 
            
        };
        
        echo "<li> <a href='shop.php?page=$total_pages";
        
        if(!empty($aPath)){
            
             echo "&".$aPath;    
            
        }
        
         echo "'>".'Last Page'."</a> </li>";
        
   
        
        
    }

     ///getPaginator() function end///

?>




















