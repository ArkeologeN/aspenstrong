<link rel="stylesheet" type="text/css" href="https://directory.aspenstrong.org/webroot/css/front/circle.css" />
<?php
     $profile_completion=10;
	 foreach($results as $profile){
		 //print_r($profile);die;
	  //step1
	  if(isset($profile) && !empty($profile)){
	  $step1=NULL;
	  $step2=NULL;
	  $step3=NULL;
	  $step4=NULL;
	  $step5=NULL;
	  if($profile['entry_type'] == 'organization'){
		 //if($profile['locations'] != ""){
			 $profile_completion+=10;
			 $step1+=2;
			 //}
	  }
	  if($profile['entry_type'] == 'individual'){
		 if($profile['organization'] != ""){
			 $profile_completion+=5;
			 $step1+=1;
			 }
		 if($profile['title'] != ""){
			 $profile_completion+=5;
			 $step1+=1;
			 }
	  }
	  
	  //step2
	  
	     
		 if(!empty($profile['as_connections_addresses'])){
			 $profile_completion+=10;
			 
			 }
		 if(!empty($profile['as_connections_emails'])){
			 $profile_completion+=5;
			 $step2+=1;
			 }
		 if(!empty($profile['as_connections_phones'])){
			 $profile_completion+=5;
			 $step2+=1; 
			  }
		
		//step3
		   if($profile['logo'] != ""){
		  $profile_completion+=13.4;
		  $step3+=1;
		   }
		    if(!empty($profile['as_connections_links'])){
		  $profile_completion+=3.3;
		  $step3+=1;
		   }elseif($profile['logo'] != "")
		   {
		   	$profile_completion+=3.3;
		  	$step3+=1;
		   }
		    if(!empty($profile['as_connections_socials'])){
		  		$profile_completion+=3.3;
		  		$step3+=1;
		   }elseif($profile['logo'] != "")
		   {
		   		$profile_completion+=3.3;
		  		$step3+=1;
		   }
		  
		  //step4
		  
		  
		   if($profile['entry_type'] == 'organization'){
			   
		   if(isset($profile['as_connections_meta']['malpractice_insurance']) && $profile['as_connections_meta']['malpractice_insurance'] != ""){
		    $profile_completion+=20;
			$step4+=10;
			}
			
		   /*if($profile['as_connections_meta']['malpractice_insurance'] != ""){
		    $profile_completion+=4;
			$step4+=4;
		   }
		   
		   if($profile['as_connections_meta']['treatment_type'] != ""){
		    $profile_completion+=2;
			$step4+=2;
		   }
		   
		   if($profile['as_connections_meta']['prof_org'] != ""){
		    $profile_completion+=2;
			$step4+=2;
		   }
		   
		   if($profile['as_connections_meta']['accredatation'] != ""){
		    $profile_completion+=1;
			$step4+=1;
		   }
		   
		   if($profile['as_connections_meta']['accredatation_name'] != ""){
		    $profile_completion+=1;
			$step4+=1;
		   }*/
		   
		   }
		   
		   if($profile['entry_type'] == 'individual'){
		   
		   if($profile['as_connections_meta']['malpractice_insurance'] != ""){
		    $profile_completion+=10;
			$step4+=4;
		   }
		   
		   
		   if($profile['as_connections_meta']['licence_status']==0 && $profile['as_connections_meta']['pre_licenced']=='yes'){
			   
		    if($profile['as_connections_meta']['supervisor_name'] != ""){
		    $profile_completion+=1;
			$step4+=1;
		   }
		    if($profile['as_connections_meta']['supervisor_licence'] != ""){
		    $profile_completion+=1;
			$step4+=1;
		   }
		   
		   
		   if($profile['as_connections_meta']['supervisor_phone'] != ""){
		    $profile_completion+=2;
			$step4+=1;
		   }
		   if($profile['as_connections_meta']['supervisor_email'] != ""){
		    $profile_completion+=2;
			$step4+=1;
		   }
		   if($profile['as_connections_meta']['prelic_no'] != ""){
		    $profile_completion+=2;
			$step4+=1;
		   }
		   if($profile['as_connections_meta']['pre_licenced'] != ""){ 
		    $profile_completion+=2;
			$step4+=1;
		   }
		   
		 }else{
			 
			if($profile['as_connections_meta']['licence_status']==0 && $profile['as_connections_meta']['pre_licenced']=='no'){
			if($profile['as_connections_meta']['mem_no'] != ""){
		    $profile_completion+=10;
			$step4+=6;
		    }	 
			}else{
			if($profile['as_connections_meta']['licence_status']==1){
			if($profile['as_connections_meta']['licence'] != ""){
		    $profile_completion+=10;
			$step4+=6;
		    }
			}
			 }
		   
						 
			 }
		   
	    }
	 
	       //step5 
		   if(isset($profile['as_connections_meta']['video_conference']) && $profile['as_connections_meta']['video_conference'] != ""){
		  $profile_completion+=10;
		  
		   }
		   
		  if($profile['as_connections_meta']['diagnosis'] != ""){
		  $profile_completion+=1.7;
		  $step5+=1;
		   }
		   if($profile['as_connections_meta']['treatment'] != ""){
		  $profile_completion+=1.7;
		  $step5+=1;
		   }
		   if($profile['as_connections_meta']['modality'] != ""){
		  $profile_completion+=1.6;
		  $step5+=1;
		   }
		   if($profile['as_connections_meta']['session_cost'] != ""){
		  $profile_completion+=1.7;
		  $step5+=1;
		   }
		   if($profile['as_connections_meta']['payment_method'] != ""){
		  $profile_completion+=1.7;
		  $step5+=1;
		   }
		   if($profile['as_connections_meta']['insurance_provider'] != ""){
		  $profile_completion+=1.6;
		  $step5+=1;
		   }else{
		   $profile_completion+=1.6;
		  $step5+=1;
		  }
		   
	  }
	  //echo $profile_completion;
	  //echo $step1.'|'.$step2.'|'.$step3.'|'.$step4.'|'.$step5;die;
	  
	  if($step1!=2){$class="red";}else{$class="";}
	  if($step2!=2){$class2="red";}else{$class2="";}
	  if($step3!=3){$class3="red";}else{$class3="";}
	  if($step4!=10){$class4="red";}else{$class4="";}
	  if($step5!=6){$class5="red";}else{$class5="";}
	  
	  
	  }

 ?>

<?php foreach($results as $result){ //print_r($result);?>

<?php if($result['logo'] != ""){
$logoUrl=$result['logo'];
}else{
$logoUrl='logo.gif';
}
if($result['entry_type']=='organization'){
$name=	$result['organization']; 
}else{
$name=	$result['first_name'].' '.$result['middle_name'].' '.$result['last_name'];	 
}											
?>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gutter">
<?php 
	if(!empty($countEdit) && $countEdit>0){?>
	<p style="text-align: center; padding: 1%;color: red;"> Your edits has been saved and submitted to admin for approval.</p>
<?php }
	
  elseif($result['status'] == "unapproved" && ( empty($result->as_connections_meta) || (empty($result->as_connections_meta->malpractice_insurance) || empty($result->as_connections_meta->personal_statement)) || (empty($result->as_connections_meta->issue) || empty($result->as_connections_meta->age_group)) || (empty($result->as_connections_emails) || empty($result->as_connections_phones) || empty($result->as_connections_addresses)))) 
  {
    echo '<p style="text-align: center; padding: 1%;color: red;">Please complete your profile to get it approved by admin and to be visible on listing.</p>';
  }
  elseif($result['status'] == "unapproved" && $result['close_status'] == "activated"){?>
<p style="text-align: center; padding: 1%;color: red;">Your Profile needs admin approval.</p>
<?php }elseif(empty($result) && empty($result->connection_credentials) && empty($result->as_connections_emails) && empty($result->as_connections_phones) && empty($result->as_connections_meta) && empty($result->as_connections_addresses))
  {
  	echo '<p style="text-align: center; padding: 1%;color: red;">Please complete One step for admin Approvel.</p>';
  }
  if ($result['close_status'] == "deactivated" || $result['close_status'] == "deleted") 
  {
    echo '<p style="text-align: center; padding: 1%;color: red;">Your account is Deactivated.</p>';
  }
  ?>
         <div class="profile_bg">
             
              <div class="container"> 
              
              		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gutter">
              	     
              
                         <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 user_dash">
                             
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gutter"> 
                               <div class="admin-user">
                                                
                                <div class="user_image">
                                   <img src="<?php echo HTTP;?>img/logodirectry/<?php echo $logoUrl;?>" width="100%"  height="auto" alt="image" class="img-circle">
                                </div>
                                                
                                <h4> <?php echo $name;?> </h4>
                                                
                            </div> 
                            
                            <!--new side menu-->
                            <div class="column grid_3 section_left_side">
		                              <nav>
                                         <ul class="section_left_nav">
                                            <li class="expandable1 mar_bottom">
                                               <div class="section_left_nav_section_heading" style="cursor: pointer;">
                                               	Home
                                               <span><i class="fa fa-angle-down" aria-hidden="true"></i></span></div>
                                                <ul class="section_left_nav_sub_section" id="show_me">
                                                    <li> <a href="<?php echo HOME_WEB;?>users/logout">Logout</a></li>
                                                    <li> <a href="<?php echo HOME_WEB;?>users/update_password">Update Password</a></li>
                                                    <li> <a href="<?php echo HOME_WEB;?>users/update_email">Update Email</a></li>
                                                    <li> <a href="<?php echo HOME_WEB;?>profile/editProfile">Edit Profile</a></li>
                                                </ul>
                                            </li> 
                                            
                                            <li class="mar_bottom"><a href="<?php echo HOME_WEB;?>profile/editProfile" class="section_left_nav_section_heading">Edit Profile</a></li>
                                            
                                            <li class="mar_bottom"><a href="#" class="section_left_nav_section_heading">Community</a></li>
                                            
                                            <li class="expandable2 mar_bottom">
                                            <div class="section_left_nav_section_heading" style="cursor: pointer;">
                                            Help
                                            <span><i class="fa fa-angle-down" aria-hidden="true"></i></span></div>
                                                <ul class="section_left_nav_sub_section" id="show_help">
                                                    <li> <a href="#">Licensing & Qualifications</a></li>
                                                    <li> <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal2">Support</a> </li>
                                                    <li> <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal3">Report An Issue</a> </li>
                                                </ul>
                                            </li> 
                                    
                                            <li class="expandable3 mar_bottom">
                                            <div class="section_left_nav_section_heading" style="cursor: pointer;">
                                            Settings
                                            <span><i class="fa fa-angle-down" aria-hidden="true"></i></span></div>
                                            <ul class="section_left_nav_sub_section" id="show_setting">
													<li><a href="<?php echo HOME_WEB;?>users/delete_account">Delete Account</a></li>
                                                    <li><a href="<?php echo HOME_WEB;?>users/deactivate_account/<?php echo $result['id'];?>">Deactivate Account</a></li> 
                                            </ul> 
                                            </li>        
                                          </ul>
                                       
                                       </nav>		
	                                </div>
                                   <!--end new side menu-->
                          
                        	</div>
                        
                          </div>
                        
                         <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 user_dash" id="click1">
                         
                             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
                                   <div class="user-content">
            
                                    <div class="user-section-title">
                                       <h2>Welcome</h2>           
                                    </div> 
                                    
                                     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gutter"> 
                                     		<h2> Profile Completion </h2>
                                      	
                                        <div>
                                         <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 profile_completion">
                                         <!--</br> 
                                         <div class="c100 p<?php ///echo $profile_completion;?> green">
                                         <span><?php //echo $profile_completion;?>%</span>
                                                    <div class="slice">
                                                    <div class="bar"></div>
                                                    <div class="fill"></div>
                                                    </div>
					                                </div>-->
                                             <a href="#">
											<div class="skills-grid text-center">
                                                    <p>&nbsp;</p>
                                                    <div class="circle" id="circles-1"></div>
                                                    <!--<p>Profile Traffic</p>-->
                                             </div>
										</a>
                                         </div>
                                         <!--<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 profile_completion"> 
                                        			<div class="progress_bar progress_active">
                                                          <div class="c-track"></div>
                                                          <div class="c-left"></div>
                                                          <div class="c-right"></div>
                                                          <div class="c-cover"></div>
                                                          <div class="c-text">
                                                            <i>70</i><i class="small">%</i>
                                                          </div>
                                                        </div>
                                         </div>--> 
                                                    
                                         <div class="col-lg-4 col-md-4 col-sm-7 col-xs-12  profile_completion"> 
                                                   <ul>
                                                        <li class="<?php echo $class;?>"><a href="<?php echo HOME_WEB;?>profile/editProfile">Personal Info</a></li>
                                                        <li class="<?php echo $class2;?>"><a href="<?php echo HOME_WEB;?>profile/editProfile2/<?php echo base64_encode($result['id']);?>" >Address and Location</a></li>
                                                        <li class="<?php echo $class3;?>"><a href="<?php echo HOME_WEB;?>profile/editProfile3/<?php echo base64_encode($result['id']);?>" >Website and Social Links</a></li>
                                                        <li class="<?php echo $class4;?>"><a href="<?php echo HOME_WEB;?>profile/editProfile4/<?php echo base64_encode($result['id']);?>" >Professional details</a></li>
                                                        <li class="<?php echo $class5;?>"><a href="<?php echo HOME_WEB;?>profile/editProfile5/<?php echo base64_encode($result['id']);?>" >Specilities</a></li>
                                                   </ul>
                                        </div>  
                                        
                                         <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 btn-green-new"> 
                                       		<a href="https://aspenstrong.org/communitycalendar/community/add" target="_blank"> Submit Calendar Event </a>
                                            <a href="<?php echo HOME_WEB;?>home/profileView/<?php echo $result['id'];?>" target="_blank"> View Profile </a>
                                       </div>
                                       
                                        </div>
                                              
                                        </div>
                                         
                                     </div>
                                                 
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 space30"> 
                                         <div class="col-lg-6 col-md-6 col-sm-4 col-xs-12 traffic">
                                            <h2> Profile Traffic </h2> </div>
                                          
                                          <div class="col-lg-5 col-md-5 col-sm-7 col-xs-12 traffic_time">
                                                  <h4>Time</h4>
                                                  <form method="post" id="time-form">
                                                      <select name="time" id="time">
                                                      <option value="30daysAgo" selected="">This Month</option>
                                                      <option value="365daysAgo">This Year</option>
                                                      </select>
                                                  </form>
                                          </div>
                     
                                     </div>
                                     
                                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">    
                                        
                                            <div class="profile_content">
                                                <span><?php if(isset($views['profileViews'])){ echo $views['profileViews'];}else{ echo 0;} ?></span>
                                                <h3>Profile Views</h3>
                                             </div> 
                                             
                                           
                                            <div class="profile_content view">
                                                <span><?php if(isset($views['websiteVisit'])){echo $views['websiteVisit'];}else{echo '0';} ?></span>
                                                <h3>Website Visits</h3>
                                             </div>
                                       
                                            <div class="profile_content emails">
                                                <span><?php if(isset($views['emailSent'])){echo $views['emailSent'];}else{echo "0";} ?></span>
                                                <h3>Emails </h3>
                                             </div>
                                       
                                            <div class="profile_content share">
                                                <span><?php if(isset($views['profileShare'])){echo $views['profileShare'];}else{echo '0';} ?></span>
                                                <h3>Profile Shares</h3>
                                             </div>
                                         
                                            <div class="profile_content zipcode">
                                                <span><?php if(isset($views['sitesearch_Zip'])){echo $views['sitesearch_Zip'];}else{echo "0";} ?></span>
                                                <h3>Search By Zipcode</h3>
                                             </div>
                                         
                                         
                                         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 profile_graph">
                                         		<img src="<?php echo HTTP;?>webroot/images/front/image/graph_profile.jpg" />
                                            </div> 
                                   
                                    </div>     
                                     
                                </div>            
           
                             </div>
                       
                         </div>
                   
                 
              </div>
            
        </div>
  </div>
  <?php }?>
 <!--end main container-->
 <script type="text/javascript" src="<?php echo HTTP;?>js/admin/circles.js"></script>
<script type="text/javascript">
 
$(document).ready(function(){
	 $("#organ2").hide();
       $(".on_indiv1").click(function(){
		$("#indiv1").show();
		 $("#organ2").hide();
    });	
	
        $(".on_organ2").click(function(){
		 $("#organ2").show();
		  $("#indiv1").hide();
	});
		
		
       $(".on_click1").click(function(){
		$("#click1").show();
		 $("#click2").hide();
    });	
	
        $(".on_click2").click(function(){
		 $("#click2").show();
		  $("#click1").hide();
	});
	
	<!--side-menu js-->
			$(".expandable1 div").click(function(){
			$("#show_me").toggle();	
			$("#show_help").hide();
			$("#show_setting").hide();
			$("#show_me").css('min-height','150px');
			});
			
			$(".expandable2 div").click(function(){
			$("#show_help").toggle();
			$("#show_me").hide();
			$("#show_setting").hide();		
			$("#show_help").css('min-height','115px');
			});
			
			$(".expandable3 div").click(function(){
			$("#show_setting").toggle();
			$("#show_help").hide();
			$("#show_me").hide();
			$("#show_setting").css('min-height','75px');
			});
			
	
});

var colors = [
										['#F51010', '#A0CE4E']
									];
								var someNumbers = ['<?php echo $profile_completion;?>'];
								
								for (var i = 0; i <= 6; i++) {
									var k=i+1;
									var child = document.getElementById('circles-' + k),
										percentage = someNumbers[i];
										//alert(someNumbers[i]);
									Circles.create({
										id:         child.id,
										percentage: percentage,
										radius:     80,
										width:      10,
										number:   	percentage / 1,
										text:       '%',
										colors:     colors[i]
									});
								}
								

</script>


