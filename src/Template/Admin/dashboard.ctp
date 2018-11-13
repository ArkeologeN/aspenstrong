
<?php 

$z=0;
$result2=array();
$result3=array();
foreach($alluserpro as $result){
$result2[]=$result['owner'];	
}
$resultpp = [];
$resultpp3 = [];
foreach($profile as $profiled){
$resultpp[]=$profiled['owner'];	
}
foreach($alluser_sts as $fddssf){
	if(! in_array($fddssf['ID'],$resultpp)){
		$resultpp3[]=$fddssf['ID'];
	}	
}

foreach($alluser as $user){
//foreach($results as $result){
if(! in_array($user['ID'],$result2)){
$result3[$z]['user_ID']=$user['ID'];
$result3[$z]['user_email']=$user['user_email'];
$result3[$z]['user_status']=$user['user_status'];
$z++;
	}	
	//}	
	} 
$inc_prfl = [];
$cmpt_prfl = [];
$last_30_date = date('Y-m-d',strtotime('-30 days',strtotime(date('Y-m-d'))));
$current_date = date('Y-m-d');
$incomplete_pf= [];

foreach($alluser as $user)
{
 	foreach($user_incProfile as $incProfile)
	{
	 	if($user->ID == $incProfile->owner && ( empty($incProfile->as_connections_meta) || empty($incProfile->as_connections_meta->personal_statement) || empty($incProfile->as_connections_meta->malpractice_insurance) || empty($incProfile->as_connections_meta->issue) || empty($incProfile->as_connections_meta->age_group) || empty($incProfile->as_connections_emails) || empty($incProfile->as_connections_phones) || empty($incProfile->as_connections_addresses)))
    {
	 		$inc_prfl[] = $user->ID;
	 		$user_date = date('Y-m-d', strtotime($user->user_registered));
        	if($user_date>=$last_30_date && $user_date<=$current_date)
        	{
        		$incomplete_pf[] = $user->ID;	
        	}
	 	}
	}

	foreach($user_incaprProfile as $incaprProfile)
	{
	 	if($user->ID == $incaprProfile->owner && !empty($incaprProfile->as_connections_meta) && !empty($incaprProfile->as_connections_meta->malpractice_insurance) && !empty($incaprProfile->as_connections_meta->personal_statement) && !empty($incaprProfile->as_connections_meta->issue) && !empty($incaprProfile->as_connections_meta->age_group) && !empty($incaprProfile->as_connections_addresses) && !empty($incaprProfile->as_connections_emails) && !empty($incaprProfile->as_connections_phones))
	 	{

	 		$cmpt_prfl[] = $user->ID;
	 		

	 	}
	}
} 

$varprofile=$contactTotal;
function invenDescSort2($item1,$item2)
{
    if ($item1['emailSent'] == $item2['emailSent']) return 0;
    return ($item1['emailSent'] < $item2['emailSent']) ? 1 : -1;
}
usort($varprofile,'invenDescSort2');
//print_r($varprofile);die;

$z=0;$x=0;$v=0;$a=0;$b=0;
$count_val=1;

function invenDescSort($item1,$item2)
{
    if ($item1['ID'] == $item2['ID']) return 0;
    return ($item1['ID'] < $item2['ID']) ? 1 : -1;
}
usort($alluser,'invenDescSort');
//print_r($alluser);die;


foreach($alluser as $user2){


$profileMonth=date("m", strtotime($user2['user_registered']));
$lastMonth=date("m")-1;
if($profileMonth==$lastMonth){
$a++;

foreach($alluserpro as $result){

if($user2['ID']==$result['owner']){
$z++;
$user2['name']=$result['first_name'].' '.$result['last_name'];
$user2['entry_id']=$result['id'];
$user2['organization']=$result['organization']; 
if($count_val<=10){
//$latestusers[]=$user2;	
}
$count_val++;
	}
if($user2['ID']==$result['owner'] && $result['status']=='approved'){
$x++;
	}
if($user2['ID']==$result['owner'] && $result['status']=='unapproved'){
$v++;
	}

	}
}else{
	//if($user2['ID']==$result['owner']){

}
}
if(!empty($alluserNew)){
	$count_val1 = 0;
	$user_n=array();
foreach($alluserNew as $result_n){ 
	//if(!empty($result_n['user_email'])){
		if($result_n['user_status']=='1' && !empty($result_n['as_connection'])){
		$user_n['name']=$result_n['as_connection']['first_name'].' '.$result_n['as_connection']['last_name'];
		$user_n['entry_id']=$result_n['as_connection']['id'];
		$user_n['owner']=$result_n['as_connection']['owner'];
		$user_n['user_email']=$result_n['user_email'];
		$user_n['as_connect']=$result_n['as_connection']['id'];
		//$user_n['organization']=$result_n['organization']; 
		if($count_val1<=10){
		$latestusers[]=$user_n;	
		}
		$count_val1++;
	}
	//}
	}
}
	


?>

<?php 
$j=1;
foreach($varprofile as $var){
if($j<=3){
$varview[]=$var['user'];

}
$j++;
}
//print_r($varview);
foreach($alluser as $user1){
//echo $user1['ID'].'</br>';
foreach($alluserpro as $result){
	if($user1['ID']==$result['owner'] && in_array($user1['ID'],$varview)){
	$new[]=array('name'=>$result['first_name'].' '.$result['last_name'],'logo'=>$result['logo'],'id'=>$result['id']);
		
	}
	}
	

}

//print_r($new);die;	
?>

<link href="<?php echo HTTP;?>css/admin/export.css" rel="stylesheet" type="text/css" media="all" />

<link href="<?php echo HTTP;?>css/admin/circles.css" rel="stylesheet" type="text/css" media="all" />

<link href="<?php echo HTTP;?>css/admin/table-style.css" rel="stylesheet" />

     <!--graph css-->
         <!-- Bootstrap CSS -->
		<link href="<?php echo HTTP;?>css/admin/bootstrap.min.css" rel="stylesheet" media="screen" />

		<!-- Main CSS -->
		<link href="<?php echo HTTP;?>css/admin/main.css" rel="stylesheet" />


		<!-- /inner_content-->
				<div class="inner_content">
                	<!-- /inner_content_w3_agile_info-->
					<div class="inner_content_w3_agile_info">
                    
					<!-- /agile_top_w3_grids-->
					   <div class="agile_top_w3_grids">
					          <ul class="ca-menu">
									<li>
										<a href="<?php echo HTTPADMIN;?>/userslist">
											<i class="fa fa-building-o" aria-hidden="true"></i>
											<div class="ca-content">
												<h4 class="ca-main"><?php echo $total_user;?></h4>
												<h3 class="ca-sub">Total Users</h3>
											</div>
										</a>
									</li>

									<li>
										<a href="<?php echo HTTPADMIN;?>/userslist/?vars=unvarify">
											<i class="fa fa-building-o" aria-hidden="true"></i>
											<div class="ca-content">
												<h4 class="ca-main"><?php echo $alluser_un;?></h4>
												<h3 class="ca-sub">Unverified Users</h3>
											</div>
										</a>
									</li>

									<li>
										<a href="<?php echo HTTPADMIN;?>/userslist/?vars=approved">
										  <i class="fa fa-user" aria-hidden="true"></i>
											<div class="ca-content">
												<h4 class="ca-main one"><?php echo $userapproved;?></h4>
												<h3 class="ca-sub one">Approved Profiles</h3>
											</div>
										</a>
									</li>
									<li>
										<a href="<?php echo HTTPADMIN;?>/userslist/?vars=unapproved">
											<i class="fa fa-clone" aria-hidden="true"></i>
											<div class="ca-content">
												<h4 class="ca-main four"><?php echo count($cmpt_prfl);?></h4>
												<h3 class="ca-sub four">Pending For Approval</h3>
											</div>
										</a>
									</li>
									<li>
										<a href="<?php echo HTTPADMIN;?>/userslist/?vars=stepinccmt">
											<i class="fa fa-clone" aria-hidden="true"></i>
											<div class="ca-content">
												<h4 class="ca-main four"><?php echo count($inc_prfl)-1;?></h4>
												<h3 class="ca-sub four">Incomplete Profile</h3>
											</div>
										</a>
									</li>
									<li>
										<a href="<?php echo HTTPADMIN;?>/userslist?noprofile=1">
											<i class="fa fa-database" aria-hidden="true"></i>
											<div class="ca-content">
											<h4 class="ca-main two"><?php echo count($resultpp3);?></h4>
												<h3 class="ca-sub two"> Verified users with no profile</h3>
											</div>
										</a>
									</li>
									<li>
										<a href="<?php echo HTTPADMIN;?>/userslist/?vars=individual">
											<i class="fa fa-tasks" aria-hidden="true"></i>
											<div class="ca-content">
												<h4 class="ca-main three"><?php echo $userindi;?></h4>
												<h3 class="ca-sub three">Total Individuals</h3>
											</div>
										</a>
									</li>
									<li>
										<a href="<?php echo HTTPADMIN;?>/userslist/?vars=organization">
											<i class="fa fa-clone" aria-hidden="true"></i>
											<div class="ca-content">
												<h4 class="ca-main four"><?php echo $userorg;?></h4>
												<h3 class="ca-sub four">Total Organizations</h3>
											</div>
										</a>
									</li>
                                    
                                    <li>
										<a href="<?php echo HTTPADMIN;?>/edituserslist">
											<i class="fa fa-clone" aria-hidden="true"></i>
											<div class="ca-content">
												<h4 class="ca-main four"><?php echo $useradedited;?></h4>
												<h3 class="ca-sub four">Edits for Approval</h3>
											</div>
										</a>
									</li>
									 <li>
										<a href="<?php echo HTTPADMIN;?>/userslist/?vars=deleted">
											<i class="fa fa-clone" aria-hidden="true"></i>
											<div class="ca-content">
												<h4 class="ca-main four"><?php echo $alluser_del;?></h4>
												<h3 class="ca-sub four">Deleted Users</h3>
											</div>
										</a>
									</li>
									<li>
										<a href="<?php echo HTTPADMIN;?>/userslist/?vars=deactivated">
											<i class="fa fa-clone" aria-hidden="true"></i>
											<div class="ca-content">
												<h4 class="ca-main four"><?php echo $user_dect;?></h4>
												<h3 class="ca-sub four">Deactivated Users</h3>
											</div>
										</a>
									</li>
									<div class="clearfix"></div>
								</ul>
					   </div>
					 <!-- //agile_top_w3_grids-->
                </div>   
                </div>  
						
                        
						  <!-- /w3ls_agile_circle_progress-->
							<div class="w3ls_agile_circle_progress agile_info_shadow">
							
								<div class="cir_agile_info ">
                                    <h3 class="w3_inner_tittle">Monthly Progress</h3>
                                          <div class="skill-grids">
                                                <div class="skills-grid text-center">
                                                    <div class="circle" id="circles-1"></div>
                                                    <p>Total Users</p>
                                                </div>
                                                <div class="skills-grid text-center">
                                                    <div class="circle" id="circles-2"></div>
                                                    <p>Verified</p>
                                                </div>
                                                <div class="skills-grid text-center">
                                                    <div class="circle" id="circles-3"></div>
                                                    
                                                    <p>Unverified</p>
                                                </div>
                                                <div class="skills-grid text-center">
                                                    <div class="circle" id="circles-4"></div>
                                                    <p>Incomplete Profile</p>
                                                </div>
                                                    
                                    
                    
                                             <div class="clearfix"></div>
                                            
                                    </div> 
							</div>
							</div>
						<!-- /w3ls_agile_circle_progress-->
                       
                     
                      <!-- /inner_content-->  
                        <div class="inner_content">
                             <!--/prograc-blocks_agileits-->
                                <div class="w3l-table-info agile_info_shadow dashboard_users">
                                             <h3 class="w3_inner_tittle two">RECENTLY ADDED</h3>
                                                <table id="table">
                                                <thead>
                                                  <tr>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Action</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach($latestusers as $latestuser)
												
												{?>
                                                  <tr>
                                                    <td><span class="bt-content">
													<?php  if(!empty($latestuser['name']) && !empty($latestuser['as_connect']) && $latestuser['as_connect']!=''){;
														echo $latestuser['name'];
														}else{
															echo 'NA';
															}?></span></td>
                                                    <td><span class="bt-content"><?php if(isset($latestuser['user_email'])){echo $latestuser['user_email'];}?></span></td>
                                                    <td><a href="<?php echo HTTPADMIN;?>/<?php if(isset($latestuser['entry_id'])){echo "profile_view/".$latestuser['entry_id'];}else{echo "#";}?>"><span class="bt-content view_btn">view</span> </a></td>
                                                  </tr>
                                                 <?php }?>
                                                 
                                                </tbody>
                                              </table>
                                        
                                    </div>
                             <!--//prograc-blocks_agileits-->
                       
                                    <div class="row gutter dashboard_users">
                                        <div class="col-lg-12">
                                            <div class="panel">
                                                <div class="panel-heading">
                                                    <h4>City and User sessions</h4>
                                                </div>
                                                <div class="panel-body">
                                                    <!--<div id="area-chart3" class="chart-height3"></div>-->
                                                     <div id="chartdiv"></div>
                
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                             <!--end_graph-->  
                         
                              
                              <!--top rated view-->   
                              		<div class="top_view">
										 <h3> MOST CONTACTED PROFILES THIS MONTH </h3>
											<div class="top_view_img">
                                            <?php foreach($new as $new_user){ ?>
                                            	<div class="top_img">
                                                	<div class="profile_view1" style="background: url('<?php echo HTTP;?>img/logodirectry/<?php echo $new_user['logo'];?>') center center / cover no-repeat;"> </div>
                                                    <div> 
                                                      <h2> <?php echo $new_user['name'];?> </h2>
                                                      <a href="<?php echo HTTPADMIN;?>/profile_view/<?php echo $new_user['id']; ?>"> View Profile </a>
                                                     </div>
                                                 </div>
                                            <?php }?>
                                                 
                                            </div>
                              
                        </div>        
                      


<!--graph js-->
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script type="text/javascript" src="<?php echo HTTP;?>js/admin/jquery.js"></script>


<!--end graph js-->

<!-- /amcharts -->
				<script type="text/javascript" src="<?php echo HTTP;?>js/admin/amcharts.js"></script>
		       <script type="text/javascript" src="<?php echo HTTP;?>js/admin/serial.js"></script>
				<script type="text/javascript" src="<?php echo HTTP;?>js/admin/export.js"></script>	
				<script type="text/javascript" src="<?php echo HTTP;?>js/admin/light.js"></script>
               
                 <script type="text/javascript">
				 $( document ).ready(function() {
    //alert('<?php //echo $resultsTotal ;?>');

var chart = AmCharts.makeChart("chartdiv", {
    "theme": "light",
    "type": "serial",
    "startDuration": 2,
    "dataProvider": <?php echo $resultsTotal ;?>,
    "valueAxes": [{
        "position": "left",
        "axisAlpha":0,
        "gridAlpha":0
    }],
    "graphs": [{
        "balloonText": "[[category]]: <b>[[value]]</b>",
        "colorField": "color",
        "fillAlphas": 0.85,
        "lineAlpha": 0.1,
        "type": "column",
        "topRadius":1,
        "valueField": "visits"
    }],
    "depth3D": 40,
	"angle": 30,
    "chartCursor": {
        "categoryBalloonEnabled": false,
        "cursorAlpha": 0,
        "zoomable": false
    },
    "categoryField": "country",
    "categoryAxis": {
        "gridPosition": "start",
        "axisAlpha":0,
        "gridAlpha":0,
		"autoWrap": true,
		"autoRotateCount": 2, 
		"autoRotateAngle": 45, 
		   },
    "export": {
    	"enabled": true
     }

}, 0);
});
</script>

                
                <!--<script type="text/javascript">
			
			$(function() {
			  $("#datepicker").datepicker();
			});
		</script>-->


	<!-- //amcharts -->
         <!-- <script type="text/javascript" src="<?php //echo HTTP;?>js/admin/chart1.js"></script>-->
          <!--<script type="text/javascript" src="<?php //echo HTTP;?>js/admin/Chart.min.js"></script>-->
		  <!-- /circle-->
	 <script type="text/javascript" src="<?php echo HTTP;?>js/admin/circles.js"></script>
					         <script>
								var colors = [
										['#ffffff', '#fd9426'], ['#ffffff', '#fd9426'],['#ffffff', '#fd9426'], ['#ffffff', '#fd9426']
									];
								var someNumbers = ['<?php echo count($alluser_in_30day);?>','<?php  echo count($alluser_in_30day_varify); ?>','<?php echo count($alluser_in_30day_unvarify);;?>','<?php echo count($incomplete_pf);?>'];
								
								for (var i = 0; i <= 6; i++) {
									var k=i+1;
									var child = document.getElementById('circles-' + k),
										percentage = someNumbers[i];
										//alert(someNumbers[i]);
									Circles.create({
										id:         'circles-' + k,
										percentage: percentage,
										radius:     80,
										width:      10,
										number:   	percentage / 1,
										text:       '%',
										colors:     colors[i]
									});
								}
								
								/*$.each( someNumbers, function( key, value ) {
                                            alert(parseInt(value) );
											var child = document.getElementById('circles-' + i),
										percentage = parseInt(value);
										//alert(someNumbers[i]);
									Circles.create({
										id:         child.id,
										percentage: parseInt(value),
										radius:     80,
										width:      10,
										number:   	parseInt(value) / 1,
										text:       '%',
										colors:     colors[i - 1]
									});
											
                                 });*/
						
				</script> 


		
