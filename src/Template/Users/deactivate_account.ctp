<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gutter">
         <div class="profile_bg">
             
              <div class="container"> 
              
              		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gutter">
              	     
              
                         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 user_dash">
                             
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gutter"> 
                               <div class="admin-user">
                                                
                                <div class="user_image">
                                   <?php $results=$results->toArray(); if($results[0]['logo']!=""){?>
                                   <img src="<?php echo HTTP;?>img/logodirectry/<?php echo $results[0]['logo'];?>" width="100%"  height="auto" alt="image" class="img-circle">
                                <?php }else{?>
                                <img src="<?php echo HTTP;?>img/logodirectry/images.png" width="100%"  height="auto" alt="image" class="img-circle">
                                <?php }?>
                                </div>
                                                
                                 <h4> <?php echo $results[0]['first_name'].' '.$results[0]['last_name'];?> </h4>
                                                
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
                                                    <li> <a href="<?php echo HOME_WEB;?>users/dashboard">Dashboard</a></li>
                                                </ul>
                                            </li> 
                                            
                                            <li class="mar_bottom"><a href="<?php echo HOME_WEB;?>profile/editProfile" class="section_left_nav_section_heading">Edit Profile</a></li>
                                            
                                            <li class="mar_bottom"><a href="javascript:void(0);" class="section_left_nav_section_heading">Community</a></li>
                                            
                                            <li class="expandable2 mar_bottom">
                                            <div class="section_left_nav_section_heading" style="cursor: pointer;">
                                            Help
                                            <span><i class="fa fa-angle-down" aria-hidden="true"></i></span></div>
                                                <ul class="section_left_nav_sub_section" id="show_help">
                                                    <li> <a href="javascript:void(0);">Licensing & Qualifications</a></li>
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
                                                    <li><a href="<?php echo HOME_WEB;?>users/deactivate_account/<?php echo $results[0]['id'];?>">Deactivate Account</a></li>
                                            </ul> 
                                            </li>        
                                          </ul>
                                       </nav>		
	                                </div>
                                   <!--end new side menu-->
                        	</div>
                        
                          </div>
                        
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 user_dash" id="click2">
                                
                                
                             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="user_signup">
                                    <div class="login_head">
                                    	<i class="fa fa-power-off" aria-hidden="true"></i>
                                    	<h2>Deactivate Account</h2>
                                	</div> 
                             </div> 
                             
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="indiv1"> 
                             <?php if($results[0]['status']=="unapproved"){?> <div style="color:red;float:right;">Account Deactivated</div> <?php }?>
                                  <form id="myform" method="post" action="">
                                       <div class="user_display_form">
                                       		<p>  BY DEACTIVATING YOUR ACCOUNT YOU WILL NOT LONGER BE VISIBLE AND SEARCHABLE ON THE ASPEN STRONG PROVIDER DIRECTORY. YOU WILL STILL RECEIVE MESSAGING AND UPDATES FROM ASPEN STRONG TO SUPPORT YOUR PRACTICE. ASPEN STRONG MAY USE YOUR  INFORMATION TO PROVIDE TO PUBLIC HEALTH DEPARTMENTS OR OTHER SIMILAR ENTITIES TO SUPPORT THE COMMUNITIES NEEDS OR REQUEST CONSULTATION FROM. </p>
                                      </div>
                                      
                                     <!-- <div class="user_display_form">
                                                <label class="optional">Why leave us ?</label> 
                                                   <input type="text" class="required valid" value="" required="required" aria-required="true">     
                                            </div>-->
                                    
                                       <div class="user_display_form">
                                                <label class="optional">Are you sure ?</label> 
                                                   <select class="" name="account_status">
                                                        <option value="yes" <?php if($results[0]['status']=="unapproved"){ echo "selected";}?>>Yes</option>
                                                        <option value="no" <?php if($results[0]['status']=="approved"){ echo "selected";}?>>No</option>
                                                   </select>     
                                            </div>
                                       
                                          <div class="update_btn">
                                             <button type="submit" value="Submit">Save Changes</button>
                                             <!--<a href="#" class="save_btn">Save</a>-->
                                          </div>   
                                          
                                </form>
                                
                             </div>  
                             
                                
                       
                         </div>
                   
                        </div>
            
        </div> 
              </div>
          </div>    
  </div> 
  <script type="text/javascript">
  
  <!--side-menu js-->
   
$(document).ready(function(){
           
			
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
  
  </script>