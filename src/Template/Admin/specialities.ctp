<!--<link rel="stylesheet" type="text/css" href="<?php //echo HTTP;?>css/admin/table-style.css" />
<link rel="stylesheet" type="text/css" href="<?php //echo HTTP;?>css/admin/basictable.css" />-->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<!-- banner -->

		<!-- /inner_content-->
				<div class="inner_content">
				    <!-- /inner_content_w3_agile_info-->

					<!-- breadcrumbs -->
						<div class="w3l_agileits_breadcrumbs">
							<div class="w3l_agileits_breadcrumbs_inner">
								<ul>
									<!--<li><a href="dashboard">Home</a><span>«</span></li>
									
									<li>All <?php //echo $module;?></li>-->
                                    <li><a href='<?php echo HTTPADMIN;?>/add_specialities<?php echo $name;?>/'>Add new speciality<?php echo $name;?></a></li>
								</ul>
							</div>
						</div>
					<!-- //breadcrumbs -->

					<div class="inner_content_w3_agile_info two_in">
                    
                    	<?= $this->Flash->render(); ?>
					 
									<!-- tables -->
                             
									<div class="agile-tables">
                                    
										<div class="w3l-table-info agile_info_shadow">
                                        
										 <!--<h3 class="w3_inner_tittle two">Basic Implementation</h3>-->
											<table id="example" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>S No.</th>
            <th><?php echo $heading;?> Name(In English)</th>
            <th><?php echo $heading;?> Name(In Spanish)</th>
            <th>Action</th>
            
        </tr>
        
    </thead>
   
    <tbody>
	<?php $i=1;foreach($results as $result){
		  
		 /*$method1='/edit_'.$name.'/';
		 $method2='/delete_'.$name.'/';*/
		 
		 $method1='/edit_specialities'.$name.'/';
		 $method2='/delete_'.$name.'/';
		  
		   $action='<a class="btn btn-success btn-xs" href="'.HTTPADMIN.$method1.$result['id'].'" >Edit <i class="fa fa-view"></i>
                    </a>';
          
		  // $delete="<a class='btn btn-danger btn-xs' href=".HTTPADMIN.$method2.$result['id']." onclick=
      //\"return confirm('Are you sure, you want to delete?')\">Delete</a>";
		
		?>
        <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $result['name'];?></td>
            <td><?php echo $result['name_spanish'];?></td>
            <!--<td><?php //echo $action.' '.$delete;?></td>-->
            <td><?php echo $action;?></td>
            
        </tr>
    <?php $i++;}?>   
    </tbody>
</table>
									
								</div>
								
									 
									  
								
									
						</div>
							<!-- //tables -->
					
				    </div>
					<!-- //inner_content_w3_agile_info-->
				</div>
		<!-- //inner_content-->
		
<!-- tables -->

 
<script>
$(document).ready( function () {
	var HTTPADMIN='<?php echo HTTPADMIN;?>';
	
 
  
    var table = $('#example').DataTable({
        orderCellsTop: true
    });

  
	
});
</script>