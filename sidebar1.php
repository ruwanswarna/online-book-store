    <div class="panel panel-default sidebar-menu"><!--panel panel-default sidebar-menu start-->
		<div class="panel-heading"><!--panel-heading start-->
			<h3 class="panel-title">Products Categories</h3>
		</div><!--panel-heading end-->
		
		<div class="panel-collapse collapse-data"><!--panel-collapse collapse-data start-->
		
		
			<div class="panel-body"><!--panel-body 1 start-->
			   
				<div class="input-group"><!--input-group start-->
			   
				   <input type="text" class="form-control" id="p-table-filter" data-filters="#p-categories" data-action="filter" placeholder="Filter Products">
				   
						<a href="" class="input-group-addon"><!--input-group-addon start-->
						
							<i class="fa fa-search"></i>
						
						</a><!--input-group-addon end-->
				   
				</div><!--input-group end-->
			</div><!--panel-body 1 end-->
			<div class="panel-body scroll-menu" id="p-categories"><!--panel-body 2 start-->
		   
			<ul class="nav nav-pills nav-stacked category-menu"><!--nav nav-pills nav-stacked category-menu start-->
				
				<?php
				getPcats();
				?>
				
			</ul><!--nav nav-pills nav-stacked category-menu end-->
			</div><!--panel-body 2 end-->
		
		</div><!--panel-collapse collapse-data end-->
     
	</div><!--panel panel-default sidebar-menu end-->


	<div class="panel panel-default sidebar-menu"><!--panel panel-default sidebar-menu start-->
		<div class="panel-heading"><!--panel-heading start-->
			<h3 class="panel-title"> Categories</h3>
		</div><!--panel-heading end-->
		<div class="panel-collapse collapse-data"><!--panel-collapse collapse-data start-->
		
		
			<div class="panel-body"><!--panel-body 1 start-->
			   
				<div class="input-group"><!--input-group start-->
			   
				   <input type="text" class="form-control" id="p-table-filter" data-filters="#p-categories" data-action="filter" placeholder="Filter Products">
				   
						<a href="" class="input-group-addon"><!--input-group-addon start-->
						
							<i class="fa fa-search"></i>
						
						</a><!--input-group-addon end-->
				   
				</div><!--input-group end-->
			</div><!--panel-body 1 end-->
			<div class="panel-body"><!--panel-body start-->
				<ul class="nav nav-pills nav-stacked category-menu"><!--nav nav-pills nav-stacked category-menu start-->
					
					<?php
					getCats();
					?>
				  
				</ul><!--nav nav-pills nav-stacked category-menu end-->
			</div><!--panel-body end-->
		</div><!--panel-collapse collapse-data end-->
	</div><!--panel panel-default sidebar-menu end-->