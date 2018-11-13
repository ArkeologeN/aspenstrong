<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gutter">
         <div class="profile_bg">
             
              <div class="container"> 
              
              		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gutter">
              	     
              
                         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 user_dash">
                             
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gutter"> 
                               <div class="admin-user">
                                                
                                <div class="user_image">
                                   <img src="<?php echo HTTP;?>images/front/image/25043.png" width="100%"  height="auto" alt="image" class="img-circle">
                                </div>
                                                
                                <h4> NAME </h4>
                                                
                            </div> 
                          
                                 <!--new side menu-->
                          			  <div class="column grid_3 section_left_side">
		                             	 <nav>
                                         <ul class="section_left_nav">
                                            <li class="expandable mar_bottom">
                                               <div class="section_left_nav_section_heading" style="cursor: pointer;">
                                               	Home
                                               <span><i class="fa fa-angle-down" aria-hidden="true"></i></span></div>
                                                <ul class="section_left_nav_sub_section" id="show_me">
                                                    <li> <a href="<?php echo HOME_WEB;?>users/logout" target="_blank">Logout</a></li>
                                                    <li> <a href="#" target="_blank">Update Password</a></li>
                                                    <li><a href="#" target="_blank">Update Email Address</a></li>
                                                    <li> <a href="<?php echo HOME_WEB;?>profile/editProfile" target="_blank">Edit Profile</a></li>
                                                </ul>
                                            </li> 
                                            
                                            <li class="mar_bottom"><a href="<?php echo HOME_WEB;?>profile/editProfile" target="_blank" class="section_left_nav_section_heading">Edit Profile</a></li>
                                            
                                            <li class="mar_bottom"><a href="#" class="section_left_nav_section_heading" target="_blank">Community</a></li>
                                            
                                            <li class="expandable mar_bottom">
                                            <div class="section_left_nav_section_heading" style="cursor: pointer;">
                                            Help
                                            <span><i class="fa fa-angle-down" aria-hidden="true"></i></span></div>
                                                <ul class="section_left_nav_sub_section" id="show_help">
                                                    <li> <a href="#">Licensing & Qualifications</a></li>
                                                    <li> <a href="#">Support</a> </li>
                                                </ul>
                                            </li> 
                                    
                                            <li class="expandable mar_bottom">
                                            <div class="section_left_nav_section_heading" style="cursor: pointer;">
                                            Settings
                                            <span><i class="fa fa-angle-down" aria-hidden="true"></i></span></div>
                                            <ul class="section_left_nav_sub_section" id="show_setting">
													<li><a href="#">Delete Account</a></li>
                                                    <li><a href="#">Deactivate Account</a></li> 
                                            </ul> 
                                            </li>        
                                          </ul>
                                       
                                       </nav>		
	                                </div>
                                   <!--end new side menu--> 
                        	</div>
                        
                          </div>
                        
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 user_dash" id="click2">
                               <div class="user-edit">
                                       <ul>
                                                <li class="active">
                                                    <a href="<?php echo HOME_WEB;?>profile/editProfile"><i class="fa fa-align-justify"></i>Personal Info111</a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo HOME_WEB;?>profile/editProfile2"><i class="fa fa-user"></i> Address and Location</a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo HOME_WEB;?>profile/editProfile3"><i class="fa fa-wechat"></i>Website and Social Links</a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo HOME_WEB;?>profile/editProfile4"><i class="fa fa-question-circle"></i>Professional Details</a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo HOME_WEB;?>profile/editProfile5"><i class="fa fa-bookmark"></i>Specialities </a>
                                                </li>
                                       </ul>			       
                                </div> 
                                
                             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="user_signup">
                                    <div class="login_head">
                                    	<i class="fa fa-file-text-o"></i>
                                    	<h2>Name and Organization</h2>
                                	</div> 
                                  
                                  
                  						  <ul class="cs-form-element half-input">
                        <li>
                            <label>I am an</label>
                            <ul class="radio-box">
                                <li>
                                    <input name="user_profile_public" id="show_profile" type="radio" value="1" checked="checked">
                                    <label for="show_profile" id="indiv" class="on_indiv1">Individual</label>
                                </li>
                                <li>
                                    <input name="user_profile_public" id="hide_profile" type="radio" value="0">
                                    <label for="hide_profile" id="organ" class="on_organ2">Organization</label>
                                </li>
                            </ul>
                        </li>

                        <li class="paddng_left">
                            <label>Visibility</label>
                            <ul class="radio-box">
                                <li>
                                    <input name="user_contact_form" id="show_form" type="radio" value="1" checked="checked">
                                    <label for="show_form">Public</label>
                                </li>
                                <li>
                                    <input name="user_contact_form" id="hide_form" type="radio" value="0">
                                    <label for="hide_form">Private</label>
                                </li>
                            </ul>

                        </li>

                    </ul>  
                                       
                             </div> 
                             
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="indiv1"> 
                                  <form id="myform">
                                       <div class="user_display_form">
                                       		<label class="required">First Name</label>
                                       		<input type="text" class="required valid" value="" required="required">
                                           
                                      </div>
                                      <!--<div class="error_validation">
                                       	 * required 
                                      </div>-->
                                       
                                     
                                       <div class="user_display_form">
                                       		<label class="required">Last Name</label> 
                                       		<input type="text" class="required valid" value="" required="required">
                                       </div>
                                       
                                       <div class="user_display_form">
                                       		<label class="optional">Business Name</label> 
                                       		<input type="text" class="required valid" value="" required="required">
                                       </div>

                                  <div> 
                               		<div class="login_head">
                                    	<i class="fa fa-file-text-o"></i>
                                    	<h2>CREDENTIALS </h2>
                                         <h5>Example MA, LPC, PHD</h5>
                                	</div>
                                    
                                        <div class="user_credential">
                                            <label class="required">Add credential</label>
                                            <input type="text" name="" value="" required="required">
                                            <a href="#" class="user_close"> <i class="fa fa-times" aria-hidden="true"></i> </a>
                                        </div> 
                                        <div class="user_credential">
                                            <label class="required">Add credential</label>
                                            <input type="text" name="" value="" required="required">
                                            <a href="#" class="user_add"> <i class="fa fa-plus" aria-hidden="true"></i> </a>
                                        </div> 
                                    
                               </div> 
                               
                               <div class="green_save">
                                       <ul>
                                           <li>
                                             <button type="submit" value="Submit" class="save_btn">Save</button>
                                             <!--<a href="#" class="save_btn">Save</a>-->
                                           </li>
                                           <li>
                                            <button type="submit" value="Next" class="next_btn">Skip</button>
                                            <!-- <a href="#" class="next_btn">Next</a>-->
                                          </li>
                                       </ul>			       
                                </div>    
                                </form>
                                
                             </div>  
                             
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="organ2"> 
                                 <form id="myform">
                                       <div class="user_display_form">
                                           <label class="">Organization</label> 
                                                    <input type="text" class="" value="">
                                       </div>
                                       <div class="user_display_form">
                                           <label class="">Contact First Name</label> 
                                                <input type="text" class="" value="" required="required">
                                       </div>
                                       <div class="user_display_form">
                                           <label class="">Contact Last Name</label> 
                                                <input type="text" class="" value="" required="required">
                                       </div>
                                       <div class="user_display_form">
                                           <label class="">Location 1</label> 
                                                <input type="text" class="" value="" placeholder="location1">
                                       </div>
                                       <div class="user_display_form">
                                           <label class="">Location 2</label> 
                                                <input type="text" class="" value="" placeholder="location2">
                                       </div>
                                       <div class="user_display_form">
                                           <label class="">Location 3</label> 
                                                <input type="text" class="" value="" placeholder="location3">
                                       </div>
                                       <div class="user_display_form">
                                           <label class="">Location 4</label> 
                                                <input type="text" class="" value="" placeholder="location4">
                                       </div>
                                       <div class="user_display_form">
                                           <label class="">Location 5</label> 
                                                <input type="text" class="" value="" placeholder="location5">
                                       </div>
                                 
                                <div class="green_save">
                                       <ul>
                                           <li>
                                             <button type="submit" value="Submit" class="save_btn">Save</button>
                                             <!--<a href="#" class="save_btn">Save</a>-->
                                           </li>
                                           <li>
                                            <button type="submit" value="Next" class="next_btn">Skip</button>
                                            <!-- <a href="#" class="next_btn">Next</a>-->
                                          </li>
                                       </ul>			       
                                </div>  
                                </form>
                           
                         </div>  
                       
                         </div>
                   
                        </div>
            
        </div> 
              </div>
          </div>    
  </div>
  
  <!--end main container-->
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
		

$("#myform").validate({errorElement: 'span'});

		<!--side-menu js-->
			$(".expandable").click(function(event){
		     event.preventDefault();		
			$("#show_me",this).toggle();
			//$("#show_me",this).hide('');
			$("#show_me",this).css('min-height','150px');
			});
			
			$(".expandable").click(function(){
			$("#show_help",this).toggle();
			//$("#show_me",this).hide('');
			$("#show_help",this).css('min-height','95px');
			});
			
			$(".expandable").click(function(){
			$("#show_setting",this).toggle();
			//$("#show_me",this).hide('');
			$("#show_setting",this).css('min-height','75px');
			});
			
});
 
</script>
