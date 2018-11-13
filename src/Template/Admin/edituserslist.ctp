<?php //print_r($users);
foreach($results as $user){
foreach($result_entry as $result){
if($user['id']==$result['entry_id']){
$result['name']=$user['first_name'].' '.$user['last_name'];
$result['entry_type']=$user['entry_type'];
	}	
	}	
	}
?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.3/css/select.dataTables.min.css"></style>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/select/1.2.3/js/dataTables.select.min.js"></script>

<!-- banner -->

		<!-- /inner_content-->
				<div class="inner_content">
				    <!-- /inner_content_w3_agile_info-->

					<!-- breadcrumbs -->
						<div class="w3l_agileits_breadcrumbs">
							<div class="w3l_agileits_breadcrumbs_inner">
								<ul>
									<li><a href="dashboard">Home</a><span>«</span></li>
									
									<li>Edits For Approval</li>
								</ul>
							</div>
						</div>
					<!-- //breadcrumbs -->

					<div class="inner_content_w3_agile_info two_in">
                    	
					  <h2 class="w3_inner_tittle">Edits For Approval</h2>
									<!-- tables -->
                             
									<div class="agile-tables">
										<div class="w3l-table-info agile_info_shadow">
                                                                 
										 <!--<h3 class="w3_inner_tittle two">Basic Implementation</h3>--><?php //print_r($result_entry);die;?>
											<table id="example" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>S No.</th>
            <th>Name</th>
            <th>Step</th>
            <th>Type</th>
            <th>Action</th>
        </tr>
        
    </thead>
   
    <tbody>
	<?php $i=1;foreach($result_entry as $result){ ?>
        <tr>
           
            <td><?php echo $i;?></td>
            <td><?php echo $result['name'];?></td>
            <td><?php echo $result['entry_type'];?></td>
            <td><?php echo $result['step'];?></td>
            <td><a href="https://directory.aspenstrong.org/admin/<?php echo $result['step'];?>/<?php echo $result['entry_id'];?>">Approve the changes</a></td>
           
            
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


<script type="text/javascript">

$(document).ready( function () {
	
$('#example').DataTable({ orderCellsTop: true   });


});
</script>

		

