<?php

$aCat = array();
$aPcat = array();

//p_cat start//

if(isset($_REQUEST['p_cat'])&&is_array($_REQUEST['p_cat'])){
    
    foreach($_REQUEST['p_cat'] as $sKey=>$sVal){
        
        if((int)$sVal!=0){
            
            $aPcat[(int)$sVal] =(int)$sVal;
            
        }
        
    }
    
}

//p_cat end//

//cat start//

if(isset($_REQUEST['cat'])&&is_array($_REQUEST['cat'])){
    
    foreach($_REQUEST['cat'] as $sKey=>$sVal){
        
        if((int)$sVal!=0){
            
            $aCat[(int)$sVal] =(int)$sVal;
            
        }
        
    }
    
}

//cat end//

?>   

<div class="panel panel-default sidebar-menu"><!--panel panel-default sidebar-menu start-->
    <div class="panel-heading"><!--panel-heading start-->
        <h3 class="panel-title">Product Categories
    
            <div class="pull-right"><!--pull-right start-->
            
                <a href="JavaScript:Void(0);" style="color:black">
                    
                    <span class="nav-toggle hide-show"><!--nav-toggle hide-show start-->
                        
                        Hide
                        
                    </span><!--nav-toggle hide-show finish-->
                </a>
            
            </div><!--pull-right finish-->
        </h3>
    </div><!--panel-heading end-->
     
    <div class="panel-collapse collapse-data"><!--panel-collapse collapse-data start-->
    
    
    <div class="panel-body"><!--panel-body 1 start-->
       
        <div class="input-group"><!--input-group start-->
       
           <input type="text" class="form-control" id="table-filter" data-filters="#p-cat" data-action="filter" placeholder="Filter Product Categories">
           
                <a href="" class="input-group-addon"><!--input-group-addon start-->
                
                    <i class="fa fa-search"></i>
                
                </a><!--input-group-addon end-->
           
        </div><!--input-group end-->
        
        
    </div><!--panel-body 1 end-->
    
        <div class="panel-body scroll-menu" ><!--panel-body 2 start-->
       
			<ul class="nav nav-pills nav-stacked category-menu" id="categories"><!--nav nav-pills nav-stacked category-menu start-->
				
				<?php
				
				$sql = "select distinct p_cat_title,p_cat_id from product_categories order by p_cat_id ";
				
				$result = $con->query($sql);
				
				while($row=$result->fetch_assoc()){
					
				?>
					
					<li style="background:#ddd" class="checkbox checkbox-primary">
					
						 <a>
							
						   <label>
							
							 
								<input type="checkbox" value="<?= $row['p_cat_id']; ?>" id="products" class="form-check-input product_check" ><span><?= $row['p_cat_title']; ?></span>
						
							</label>
						</a>
					
					</li>
					
				<?php } ?>
					
				
			</ul><!--nav nav-pills nav-stacked category-menu end-->
			
        </div><!--panel-body 2 end-->
    
    </div><!--panel-collapse collapse-data end-->
     
</div><!--panel panel-default sidebar-menu end-->






<div class="panel panel-default sidebar-menu"><!--panel panel-default sidebar-menu start-->
    <div class="panel-heading"><!--panel-heading start-->
        <h3 class="panel-title">Categories
        
        <div class="pull-right"><!--pull-right start-->
            
                <a href="JavaScript:Void(0);" style="color:black">
                    
                    <span class="nav-toggle hide-show"><!--nav-toggle hide-show start-->
                        
                        Hide
                        
                    </span><!--nav-toggle hide-show finish-->
                </a>
            
            </div><!--pull-right finish-->
        
        </h3>
        
    </div><!--panel-heading end-->
    
    <div class="panel-collapse collapse-data"><!--panel-collapse collapse-data start-->
    
    
    <div class="panel-body"><!--panel-body 1 start-->
       
        <div class="input-group"><!--input-group start-->
       
           <input type="text" class="form-control" id="table-filter" data-filters="#categories" data-action="filter" placeholder="Filter Categories">
           
                <a href="" class="input-group-addon"><!--input-group-addon start-->
                
                    <i class="fa fa-search"></i>
                
                </a><!--input-group-addon end-->
           
        </div><!--input-group end-->
        
        
    </div><!--panel-body 1 end-->
    
        <div class="panel-body scroll-menu" ><!--panel-body 2 start-->
       
        <ul class="nav nav-pills nav-stacked category-menu" id="categories"><!--nav nav-pills nav-stacked category-menu start-->
			
            <?php
            
            $sql = "select distinct Category,id from categories order by id ";
            
            $result = $con->query($sql);
            
            while($row=$result->fetch_assoc()){
                
                ?>
                
                <li style="background:#ddd" class="checkbox checkbox-primary">
                
                     <a> 
                        
                       <label>
                        
                         
                            <input type="checkbox" value="<?= $row['id']; ?>" id="categories" class="form-check-input product_check" ><span><?= $row['Category']; ?></span>
                    
                        </label>

                    </a>
                
                </li>
                
                <?php } ?>
                
            
        </ul><!--nav nav-pills nav-stacked category-menu end-->
        
        </div><!--panel-body 2 end-->
    
    </div><!--panel-collapse collapse-data end-->
     
</div><!--panel panel-default sidebar-menu end-->






 