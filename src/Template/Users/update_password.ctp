<?php foreach($results as $result){ $entry_type=$result['entry_type'];?>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gutter">
         <div class="profile_bg">
             
              <div class="container"> 
              
              		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gutter">
              	     
              
                         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 user_dash">
                             
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gutter"> 
                               <div class="admin-user">
                                                
                                <div class="user_image">
                                <?php if(isset($result['logo']) && $result['logo']!=""){?>
                                   <img src="<?php echo HTTP;?>img/logodirectry/<?php echo $result['logo'];?>" width="100%"  height="auto" alt="image" class="img-circle">
                                 <?php }else{ ?>
                                    <img src="<?php echo HTTP;?>img/logodirectry/images.png" width="100%"  height="auto" alt="image" class="img-circle">
                                  <?php }?>
                                </div>
                                <?php if($result['entry_type']=='individual'){?>                
                                <h4> <?php echo $result['first_name'].' '.$result['last_name'];?> </h4>
                                <?php }?>
                                <?php if($result['entry_type']=='organization'){?>                
                                <h4> <?php echo $result['contact_first_name'].' '.$result['contact_last_name'];?> </h4>
                                <?php }?>               
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
                                            
                                            <li class="mar_bottom"><a href="#" class="section_left_nav_section_heading">Community</a></li>
                                            
                                            <li class="expandable2 mar_bottom">
                                            <div class="section_left_nav_section_heading" style="cursor: pointer;">
                                            Help
                                            <span><i class="fa fa-angle-down" aria-hidden="true"></i></span></div>
                                                <ul class="section_left_nav_sub_section" id="show_help">
                                                    <li> <a href="javascript:void(0);">Licensing & Qualifications</a></li>
                                                    <li> <a href="javascript:void(0);" data-toggle="modal" data-target="#myModal2">Support</a> </li>
                                                    <li> <a href="javascript:void(0);" data-toggle="modal" data-target="#myModal3">Report An Issue</a> </li>
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
						  
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 user_dash" id="click2">
                               
                                
                             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                              <?= $this->Flash->render(); ?>
                              <form id="myform" method="post" action="">
                                <div class="user_signup">
                                    <div class="login_head">
                                    	<i class="fa fa-file-text-o"></i>
                                    	<h2>Update Password</h2>
                                	</div> 
                                  
                             </div> 
                             
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
                                  
                                       <div class="user_display_form user_display_form_vals">
                                       		<label class="required">Previous Password</label>
                                       		<input type="password" class="required valid" name="old_password" required="required">
                                           
                                      </div>
                                      
                                       <div class="user_display_form user_display_form_vals">
                                       		<label class="required">New Password</label> 
                                       		<input type="password" class="required valid" name="new_password" value="" required="required" id="new_password">
                                       </div>
                                       
                                       <div class="user_display_form user_display_form_vals">
                                       		<label class="optional">Confirm Password</label> 
                                       		<input type="password" class="required valid" name="new_password2" value="" required="required">
                                       </div>
                                       
                                      
                                        
                                        

                                  
                               
                               <div class="green_save">
                                       <ul>
                                           <li>
                                             <button type="submit" value="Submit" class="save_btn">Save</button>
                                           </li>
                                           
                                       </ul>			       
                                </div>    
                                
                                
                             </div>  
                            
                             
                         </form>
                         </div>
                   
                        </div>
            
        </div> 
              </div>
          </div>    
  </div>
  
<?php }?>
  
  <!--end main container-->
<script type="text/javascript">

$(document).ready(function(){

$('#myform').validate({ // initialize the plugin
        rules : {
                new_password2 : {
				   required:true,
                   equalTo : "#new_password"
                },
				
			},
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.insertAfter($(element).parents('.user_display_form_vals'));
        }
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
 
</script>
