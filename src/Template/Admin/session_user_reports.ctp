<?php

function getDataType($type){
	
	$value="";
	switch($type){
		
		case "TIME":{	
			$value="";
			break;
		}
		case "PERCENT":{	
			$value="%";
			break;
		}
		case "INTEGER":{	
			$value="";
			break;
		}
		default:{
			$value="";
		}
	}
	return $value;
	
}
function getProfileName($name){
	
	$value="";
	switch($name){
		
		case "ga:users":{	
			$value="Users Visitors";
			break;
		}
		case "ga:newUsers":{	
			$value="New Visitors";
			break;
		}
		case "ga:sessionsPerUser":{	
			$value="Session Per User";
			break;
		}
		case "ga:percentNewSessions":{
			$value="Percent new sessions";
			}
		
	}
	return $value;
	
}
?>
<link href="<?php echo HTTP.'js/admin/bootstrap-daterangepicker-master/daterangepicker.css'?>" rel="stylesheet">
<script type="text/javascript" src="<?php echo HTTP.'js/admin/bootstrap-daterangepicker-master/daterangepicker.js'?>"></script>
<script type="text/javascript" src="<?php echo HTTP.'js/admin/bootstrap-daterangepicker-master/moment.min.js'?>"></script>

<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<div class="clearfix"></div>
<div class="inner_content">
    <div class="inner_content_w3_agile_info two_in">
        <h2 class="w3_inner_tittle">Google User Session Report</h2>

        <!--/forms-->
        <div class="forms-main_agileits" style="height: 380px;">
                <div class="wthree_general graph-form agile_info_shadow ">
                
                    <div class="clearfix">
                    	
                    </div>
                    <div class="grid-1 ">
                    <div class="form-body">
                           
                            	<form method="GET" action="">
	                            	<div class="x_title">
	                                    
	                                    <div class="col-md-3 col-sm-3 col-xs-12">
			                                	<input type="text" class="datepicker" name="daterange" value="<?php if(isset($showDateRange)){ echo $showDateRange; }?>" />
	                                		</div>
	                                		<div class="col-md-2 col-sm-2 col-xs-12">
			                                <input type="submit" name="submit" value="Search" class="btn btn-success btn-sm">
		                               	</div>
	                                    <div class="clearfix"></div>
			                        </div>
		                        </form>
		                        <?php //print_r($columns); ?>
		                        <?php if(isset($columns) && !empty($columns)):?>
		                        <div class="row">
		                        	 <?php foreach($columns as $column): ?>
										        <div class="col-xs-6 col-md-3">
										            <div class="panel status panel-success">
										                <div class="panel-heading">
										                    <h1 class="panel-title text-center"><?php echo round($totalrows[$column['name']],5); ?><?php echo getDataType($column['dataType']); ?></h1>
										                </div>
										                <div class="panel-body text-center">                        
										                    <strong><?php echo getProfileName($column['name']); ?></strong>
										                </div>
										            </div>
										        </div>     
									        <?php endforeach; ?>     
									    </div>
									    <?php else: ?>
									    	 <div class="row">
									    	 	<div class="col-xs-12 col-md-12">
									    	 		<h5>No records is saved for this Time Period.</h5>
									    	 	</div>
									    	 </div>
									    
									   <?php endif; ?>
                            </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>


<script type="text/javascript">
$(function() {

});
$('.datepicker').daterangepicker({
    
}, function(start, end, label) {
  console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
});
</script>