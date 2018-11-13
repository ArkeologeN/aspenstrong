<?php foreach($results as $result){ $entry_type=$result['entry_type'];?>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gutter">
         <div class="profile_bg">
             
              <div class="container"> 
              
              		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gutter">
              	     
              
                         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 user_dash">
                             
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gutter"> 
                               <div class="admin-user">
                                                
                                <div class="user_image">
                                  <a href="<?php echo HOME_WEB;?>profile/editProfile3/NDA0">
                                <?php if(isset($result['logo']) && $result['logo']!=""){?>
                                   <img src="<?php echo HTTP;?>img/logodirectry/<?php echo $result['logo'];?>" width="100%"  height="auto" alt="image" class="img-circle">
                                 <?php }else{ ?>
                                    <img src="<?php echo HTTP;?>img/logodirectry/images.png" width="100%"  height="auto" alt="image" class="img-circle">
                                  <?php }?></a>
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
                               <div class="user-edit">
                                       <ul>
                                                <li class="active">
                                                    <a href="<?php echo HOME_WEB;?>profile/editProfile"><i class="fa fa-align-justify"></i>Personal Info</a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo HOME_WEB;?>profile/editProfile2/<?php echo base64_encode($result['id']);?>"><i class="fa fa-user"></i> Address and Location</a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo HOME_WEB;?>profile/editProfile3/<?php echo base64_encode($result['id']);?>"><i class="fa fa-wechat"></i>Website and Social Links</a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo HOME_WEB;?>profile/editProfile4/<?php echo base64_encode($result['id']);?>"><i class="fa fa-question-circle"></i>Professional Details</a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo HOME_WEB;?>profile/editProfile5/<?php echo base64_encode($result['id']);?>"><i class="fa fa-bookmark"></i>Specialities </a>
                                                </li>
                                       </ul>			       
                                </div> 
                                
                             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                              <?= $this->Flash->render(); ?>
                              <form id="myform" method="post" action="">
                                <div class="user_signup">
                                    <div class="login_head">
                                    	<i class="fa fa-file-text-o"></i>
                                    	<h2>Name and Organization</h2>
                                	</div> 
                                  
                                  
                  						  <ul class="cs-form-element half-input user_display_form_vals">
                        <li>
                            <label>I am an</label>
                            <ul class="radio-box">
                                <li>
                                    <input id="show_profile" type="radio" value="individual" name="data[entry_type]" <?php if($result['entry_type']=='individual'){ echo 'checked="checked"';}?>>
                                    <label for="show_profile" id="indiv" class="on_indiv1">Individual</label>
                                </li>
                                <li>
                                    <input id="hide_profile" type="radio" value="organization" name="data[entry_type]" <?php if($result['entry_type']=='organization'){ echo 'checked="checked"';}?>>
                                    <label for="hide_profile" id="organ" class="on_organ2">Organization</label>
                                </li>
                            </ul>
                        </li>

                        <li class="paddng_left">
                            <label>Visibility</label>
                            <ul class="radio-box">
                                <li>
                                    <input id="show_form" type="radio" name="data[visibility]" value="<?php echo $result['visibility'];?>" <?php if($result['visibility']=='public'){echo "checked";}?>>
                                    <label for="show_form">Public</label>
                                </li>
                                <li>
                                    <input id="hide_form" type="radio" name="data[visibility]" value="<?php echo $result['visibility'];?>" <?php if($result['visibility']=='private'){echo "checked";}?>>
                                    <label for="hide_form">Private</label>
                                </li>
                            </ul>

                        </li>

                    </ul>  
                                       
                             </div> 
                             <?php //if($result['entry_type']=='individual'){?>
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="indiv1"> 
                                  
                                       <div class="user_display_form user_display_form_vals">
                                       		<label class="required">First Name</label>
                                       		<input type="text" class="required valid" name="data[first_name1]" value="<?php echo $result['first_name'];?>" required="required">
                                           
                                      </div>
                                      <!--<div class="error_validation">
                                       	 * required 
                                      </div>-->
                                       
                                     
                                       <div class="user_display_form user_display_form_vals">
                                       		<label class="required">Last Name</label> 
                                       		<input type="text" class="required valid" name="data[last_name1]" value="<?php echo $result['last_name'];?>" required="required">
                                       </div>
                                       
                                       <div class="user_display_form user_display_form_vals">
                                       		<label class="optional">Business Name</label> 
                                       		<input type="text" class="required valid" name="data[organization1]" value="<?php echo $result['organization'];?>" required="required">
                                       </div>
                                       
                                       <!--<div class="checkbox_click_step3"> 
                                            <input type="checkbox" class="" name="indiviual">
                                            <label> Use my name and Credential please</label>  
                                        </div>-->
                                        
                                        <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12 filters_padding_left">
                                                <input type="checkbox" id="checkbox-1" class="regular-checkbox" value="1" <?php if(isset($result['use_credentials']) && $result['use_credentials']==1){ echo 'checked';}?> name="data[use_credentials]" ><label for="checkbox-1"></label>  
                                                <label class="label_text1">Use my name and Credential please. If you do not check this your business name will be displayed on your profile.</label>
                            			  </div>

                                  <div> 
                                  
                               		<div class="login_head">
                                    	<i class="fa fa-file-text-o"></i>
                                    	<h2>CREDENTIALS </h2>
                                         <h5>Example MA, LPC, PHD</h5>
                                	</div>
                                    <?php if($result['title'] !=""){
										  //echo $result['title'];
						                  $titles=str_replace('|',' , ',$result['title']);
										  //print_r($titles);
						                  $count_titles=count($titles);
						                  }else{
											$titles="";  
											  }
						                 
						            ?>
                                        
                                     
							          <div class="user_credential user_display_form_vals">
                                            <label class="required">Add credential</label>
                                            <input type="text" required="required" name="data[credentials]" value="<?php echo $titles;?>">
                                            <!--<a href="#" class="user_close"> <i class="fa fa-times" aria-hidden="true"></i> </a>-->
                                            <!--<a href="javascript:void(0);" class="user_add add-more"> <i class="fa fa-plus" aria-hidden="true"></i> </a>-->
                                        </div>   
							 
                                       <!-- <div class="user_credential">
                                            <label class="required">Add credential</label>
                                            <input type="text" name="" value="" required="required">
                                            <a href="#" class="user_add"> <i class="fa fa-plus" aria-hidden="true"></i> </a>
                                        </div> -->
                                    
                               </div> 
                               
                               <div class="green_save">
                                       <ul>
                                           <li>
                                           <input type="hidden" value="<?php echo $result['id']; ?>" name="data[id]" />
                                             <button type="submit" value="Submit" class="save_btn">Save</button>
                                             <!--<a href="#" class="save_btn">Save</a>-->
                                           </li>
                                           <li>
                                            <a href="<?php echo HOME_WEB;?>profile/editProfile2/<?php echo base64_encode($result['id']);?>" class="next_btn">Skip</a>
                                            <!-- <a href="#" class="next_btn">Next</a>-->
                                          </li>
                                       </ul>			       
                                </div>    
                                
                                
                             </div>  
                             <?php //}?>
                             <?php //if($result['entry_type']=='organization'){?>
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="organ2"> 
                                
                                       <div class="user_display_form user_display_form_vals">
                                           <label class="">Organization</label> 
                                           <input type="text" class="" name="data[organization2]" value="<?php echo $result['organization'];?>" required="required">
                                       </div>
                                       <div class="user_display_form user_display_form_vals">
                                           <label class="">Contact First Name</label> 
                                           <input type="text" class="" name="data[first_name2]" value="<?php echo $result['first_name'];?>" required="required">
                                       </div>
                                       <div class="user_display_form user_display_form_vals">
                                           <label class="">Contact Last Name</label> 
                                                <input type="text" class="" name="data[last_name2]" value="<?php echo $result['last_name'];?>" required="required">
                                       </div>
                                       <?php  if(!empty($result['locations'])){
							                  $locations=explode('|',$result['locations']);
											  //echo "hello";
							                  }else{
							                  $locations=array('location1','location2','location3','location4','location5');
											  //echo "Bye";
							                  }
						                      //print_r($locations);
						                      //$j=1;
						                      //foreach($locations as $location){
						
						              ?>
                                      <!-- <div class="user_display_form">
                                           <label class=""><?php //echo $location;?></label> 
                                                <input type="text" class="" name="data[location][]"  value="<?php //if(isset($location) && $location != ""){ echo $location;} ?>" placeholder="<?php //echo $location;?>">
                                       </div>-->
                                       <?php //}?> 
                                                                        
                                <div class="green_save">
                                       <ul>
                                           <li>
                                           <input type="hidden" value="<?php echo $result['id']; ?>" name="data[id]" />
                                             <button type="submit" value="Submit" class="save_btn">Save</button>
                                             <!--<a href="#" class="save_btn">Save</a>-->
                                           </li>
                                           <li>
                                            <a href="<?php echo HOME_WEB;?>profile/editProfile2/<?php echo base64_encode($result['id']);?>"  class="next_btn">Skip</a>
                                            <!-- <a href="#" class="next_btn">Next</a>-->
                                          </li>
                                       </ul>			       
                                </div>  
                               
                           
                         </div>  
                             <?php //}?>
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
 function myfunction(id){

//var fieldNum = id.charAt(this.id.length-1);
 var fieldID = "#field" + id;
 $(id).remove();
 $(fieldID).remove();
	}
$(document).ready(function(){
	
	$(".message.success").append('<a href="<?php echo HOME_WEB;?>profile/editProfile2/<?php echo base64_encode($result['id']);?>" class="next_btn_top">Next</a>');
	
	
	//var totalcount='<?php //echo $count_titles;?>';
	//var next = '<?php //echo $count_titles;?>';
	
	
	
	
	//<input type="text" name="" value="" required="required" id="field<?php //echo $i;?>" name="data[credentials][]" value="">
   //<a href="javascript:void(0);" class="user_add add-more"> <i class="fa fa-plus" aria-hidden="true"></i> </a>
   //<a href="javascript:void(0);" id="remove<?php //echo $i;?>" class="user_close remove-me"> <i class="fa fa-times" aria-hidden="true"></i> </a>
   
	
	
	
	 //$("#organ2").hide();
	  var entry_type='<?php echo $entry_type;?>';
	  if(entry_type=='individual'){
		$("#indiv1").show();
		 $("#organ2").hide();  
		  }
	  if(entry_type=='organization'){
		  $("#organ2").show();
		  $("#indiv1").hide();
		  }
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
		

//$("#myform").validate({
//errorElement: 'span'
//errorPlacement: function (error, element) {
//    //if (element.attr("type") == "checkbox") {
//        error.insertAfter($(element).parents('div').prev($('.user_display_form')));
//    //} else {
//        // something else if it's not a checkbox
//    //}
//}
//});
$('#myform').validate({ // initialize the plugin
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
