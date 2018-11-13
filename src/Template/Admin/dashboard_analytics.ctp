<?php 

$sumArray = array();

foreach ($totalrows as $k=>$subArray) {
 foreach($subArray as $key=>$array){
  if(isset($array[$key])){
   $array[$key]+=$array[$key]; 
  }
 }
}

//print_r($array);

?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<div class="inner_content">
    <div class="inner_content_w3_agile_info two_in">
        <h2 class="w3_inner_tittle">Dashboard Analytics Report</h2>
        
        <div class="forms-main_agileits">
        
         <div class="wthree_general graph-form agile_info_shadow ">
            
                     <div class="grid-1 ">
                    <div class="form-body">
                           <div class="row">
                           <div class="col-xs-6 col-md-3">
										            <div class="panel status panel-success">
										                <div class="panel-heading" style="text-align:center;">
										                 <strong>Total Website Visit</strong>   
										                </div>
										                <div class="panel-body text-center">   
                                                        <h1 class="panel-title text-center">100</h1></div>
										            </div>
										        </div>
                           <div class="col-xs-6 col-md-3">
										            <div class="panel status panel-success">
										                <div class="panel-heading" style="text-align:center;">
										                 <strong>Total Profile Views</strong>   
										                </div>
										                <div class="panel-body text-center">   
                                                        <h1 class="panel-title text-center">100</h1></div>
										            </div>
										        </div>
                           <div class="col-xs-6 col-md-3">
										            <div class="panel status panel-success">
										                <div class="panel-heading" style="text-align:center;">
										                 <strong>Total Email Contacts</strong>   
										                </div>
										                <div class="panel-body text-center">   
                                                        <h1 class="panel-title text-center">100</h1></div>
										            </div>
										        </div>
                           <div class="col-xs-6 col-md-3">
										            <div class="panel status panel-success">
										                <div class="panel-heading" style="text-align:center;">
										                 <strong>Total Profile Share</strong>   
										                </div>
										                <div class="panel-body text-center">   
                                                        <h1 class="panel-title text-center">100</h1></div>
										            </div>
										        </div>
                           </div> 
                            	<table id="example" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Username</th>
            <th>Website Visit</th>
            <th>Email Sent</th>
            <th>Profile Share</th>
            <th>Search By Zip</th>
            
        </tr>
       
    </thead>
   
    <tbody>
    <?php $i=1;foreach($totalrows as $row){
		if(isset($row['user']) && isset($row['websiteVisit']) && isset($row['emailSent']) && isset($row['profileShare']) && isset($row['sitesearch_Zip'])){ //print_r($row);
		?>
    <tr>
    <td><?php echo $row['user'];?></td>
    <td><?php echo $row['websiteVisit'];?></td>
    <td><?php echo $row['emailSent'];?></td>
    <td><?php echo $row['profileShare'];?></td>
    <td><?php echo $row['sitesearch_Zip'];?></td>
    </tr>
    <?php $i++;}}?>
    </tbody>
    
    </table>
		                       									    	 
									    
									  
                            </div>
                        
                    </div>
                
            
        </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(function() {
/* $(".datepicker").daterangepicker({
        locale: {
            format: 'DD/MMM/YYYY'
        }
    });*/
	
 var table = $('#example').DataTable({
        orderCellsTop: true
    });	
});

/*$('.datepicker').daterangepicker({
    
}, function(start, end, label) {
  console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
});*/
</script>
