<?php //print_r($asConnection);die;?>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gutter">
         <div class="profile_bg">
             
              <div class="container"> 
              
              		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gutter">
              	     
              
                         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 user_dash">
                             
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gutter"> 
                               <div class="admin-user">
                                                
                                <div class="user_image">
                                  <a href="<?php echo HOME_WEB;?>profile/editProfile3/NDA0">
                                   <?php if($asConnection['logo']!=""){?>
                                   <img src="<?php echo HTTP;?>img/logodirectry/<?php echo $asConnection['logo'];?>" width="100%"  height="auto" alt="image" class="img-circle">
                                <?php }else{?>
                                <img src="<?php echo HTTP;?>img/logodirectry/images.png" width="100%"  height="auto" alt="image" class="img-circle">
                                <?php }?>
                              </a>
                                </div>
                                                
                                <?php if($asConnection['entry_type']=='individual'){?>                
                                <h4> <?php echo $asConnection['first_name'].' '.$asConnection['last_name'];?> </h4>
                                <?php }?>
                                <?php if($asConnection['entry_type']=='organization'){?>                
                                <h4> <?php echo $asConnection['contact_first_name'].' '.$asConnection['contact_last_name'];?> </h4>
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
													<li><a href="<?php echo HOME_WEB;?>users/delete_account" target="_blank">Delete Account</a></li>
                                                    <li><a href="<?php echo HOME_WEB;?>users/deactivate_account/<?php echo $asConnection['id'];?>" target="_blank">Deactivate Account</a></li>
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
                                                <li>
                                                    <a href="<?php echo HOME_WEB;?>profile/editProfile"><i class="fa fa-align-justify"></i>Personal Info</a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo HOME_WEB;?>profile/editProfile2/<?php echo base64_encode($asConnection['id']);?>"><i class="fa fa-user"></i> Address and Location</a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo HOME_WEB;?>profile/editProfile3/<?php echo base64_encode($asConnection['id']);?>"><i class="fa fa-wechat"></i>Website and Social Links</a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo HOME_WEB;?>profile/editProfile4/<?php echo base64_encode($asConnection['id']);?>"><i class="fa fa-question-circle"></i>Professional Details</a>
                                                </li>
                                                <li class="active">
                                                    <a href="<?php echo HOME_WEB;?>profile/editProfile5/<?php echo base64_encode($asConnection['id']);?>"><i class="fa fa-bookmark"></i>Specialities </a>
                                                </li>
                                       </ul>			       
                                </div> 
                                
                                 <?php if($asConnection['entry_type']=='individual'){?>
                               
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                              		<?= $this->Flash->render(); ?> 
                                    <form id="myform" method="post" action="">
                                <div>
                                 <!-- SPECIALTIES --> 
                                      <div class="login_head">
                                    	<i class="fa fa-th-large" aria-hidden="true"></i>
                                    	<h2> Speciality </h2>
                                	</div>
                                   
                                      <div class="phone_details"> 
                                    	 
                                            <?php $allIssues=json_decode($asConnection['as_connections_meta']['issue']);
		  if(is_array($allIssues)){
		  $vals=$allIssues;  
			  }else{
		  $vals=explode('|',$asConnection['as_connections_meta']['issue']);  
				  }
		  ?>
                                            <div class="user_display_form user_display_form_vals">
                                                <label class="optional">Issues</label>
                                                  <select class="multiselect-value required multi_change" name="data[as_connections_meta][issue][]" multiple="multiple" required="required">
                                                  <option value=""></option>
                                                 <?php foreach($issues as $issue){ ?>
             <option value="<?php echo $issue['id'];?>" <?php if(in_array($issue['id'],$vals)){echo 'selected';}?>><?php echo $issue['name'];?></option>
            <?php }?>
	                  		                  </select> 
                                                   
                                            </div>
                                            
                                           
            <?php $allDig=json_decode($asConnection['as_connections_meta']['diagnosis']);
		  if(is_array($allDig)){
		  $valsDig=$allDig;  
			  }else{
		  $valsDig=explode('|',$asConnection['as_connections_meta']['diagnosis']);  
				  }
		  ?>                         
                                            <div class="user_display_form user_display_form_vals">
                                                <label class="required">Areas of specialties<span>(Please choose three areas of speciality.)</span> </label>
                                                 
                                                   <select class="multiselect-value required multi_change" name="data[as_connections_meta][diagnosis][]" multiple="multiple" required="required">
	                  									<option value=""></option>
														<?php foreach($mentalhealths as $mentalhealth){ ?>
             <option value="<?php echo $mentalhealth['id'];?>" <?php if(in_array($mentalhealth['id'],$valsDig)){echo 'selected';}?>><?php echo $mentalhealth['name'];?></option>
             <?php }?>

	                  		                  </select> 
                                            </div>
                                            
                                            <div class="user_display_form user_display_form_vals">
                                                <label class="required">Treatment Orientation</label> 
                                                  <select class="multiselect-value required multi_change" name="data[as_connections_meta][treatment][]" multiple="multiple" required="required">
	                  									 <option value=""></option>
														 <?php $allTreat=json_decode($asConnection['as_connections_meta']['treatment']);
		  if(is_array($allTreat)){
		  $valsTreat=$allTreat;  
			  }else{
		  $valsTreat=explode('|',$asConnection['as_connections_meta']['treatment']);  
				  }?>
            <?php foreach($treatments as $treatment){ ?>
             <option value="<?php echo $treatment['id'];?>" <?php if(in_array($treatment['id'],$valsTreat)){echo 'selected';}?>><?php echo $treatment['name'];?></option>
          <?php }?>

	                  		                  </select> 

	                  		                   
                                            </div>
                                            
                                            <div class="user_display_form user_display_form_vals">
                                                <label class="required">Modality</label> 
                                                   <select class="multiselect-value required multi_change" name="data[as_connections_meta][modality][]" multiple="multiple" required="required">
                                                        <option value=""></option>
														<?php $allMod=json_decode($asConnection['as_connections_meta']['modality']);
		  if(is_array($allMod)){
		  $valsMod=$allMod;  
			  }else{
		  $allMod=explode('|',$asConnection['as_connections_meta']['modalities']);  
				  }?>
            <?php foreach($modalities as $modality){ ?>
             <option value="<?php echo $modality['id'];?>" <?php if(in_array($modality['id'],$allMod)){echo 'selected';}?>><?php echo $modality['name'];?></option>
          <?php }?>
	                  		                  </select>
                                                    
                                            </div>
                                            
                                            <div class="user_display_form user_display_form_vals">
                                                <label class="required">Age</label> 
                                                   <select class="multiselect-value required multi_change" name="data[as_connections_meta][age][]" multiple="multiple" required="required">
                                                       <?php $allages=json_decode($asConnection['as_connections_meta']['age_group']);
		  if(is_array($allages)){
		  $valsAges=$allages;  
			  }else{
		  $valsAges=explode('|',$asConnection['as_connections_meta']['age_group']);  
				  }?>
            <?php foreach($ages as $age){ ?>
             <option value="<?php echo $age['id'];?>" <?php if(in_array($age['id'],$valsAges)){echo 'selected';}?>><?php echo $age['name'];?></option>
          <?php }?>
	                  		                      </select>
                                            </div>
                                            
                                            <div class="user_display_form user_display_form_vals">
                                            <?php //echo $asConnection['as_connections_meta']['video_conference'].'kkkkkkkkkk';?>
                                                <label class="required">Video Conference</label> 
                                                   <select class="required" name="data[as_connections_meta][video_conference]" required="required">
                                                       <option value="">Select</option>
                                                       <option value="Yes" <?php if($asConnection['as_connections_meta']['video_conference']=='Yes'){echo 'selected';}?>>Yes</option>
	                                                   <option value="No" <?php if($asConnection['as_connections_meta']['video_conference']=='No'){echo 'selected';}?>>No</option>
	                                              </select> 
                                            </div>
                                            
                                   </div>
                                 
                                 
                               <!-- FINANCES -->
                                      <div class="login_head">
                                    	<i class="fa fa-line-chart" aria-hidden="true"></i>
                                    	<h2> Finance </h2>
                                	</div> 
                                   
                                   <div>  
                                    
                                        	<div class="user_display_form user_display_form_vals">
                                                <label class="required">Average Session  Cost</label> 
                                                    <input type="text" class="required valid" name="data[as_connections_meta][session_cost]" value="<?php echo $asConnection['as_connections_meta']['session_cost'];?>" required="required" placeholder="Session Cost">
                                            </div>
                                            
                                           
                                            <div class="user_display_form user_display_form_vals">
                                                <label class="required">Do you accept sliding scale payments?</label> 
                                                   <select class="required"  name="data[as_connections_meta][scale_payment]" required="required" >
                                                     <option value="" >Please Select</option>
                                                     <option value="Yes" <?php if($asConnection['as_connections_meta']['scale_payment']=='Yes'){echo 'selected';}?>>Yes</option>
	   		                                         <option value="No" <?php if($asConnection['as_connections_meta']['scale_payment']=='No'){echo 'selected';}?>>No</option>
                                                   </select>     
                                            </div>
                                            
                                            <div class="user_display_form user_display_form_vals">
                                                <label class="required">Payment Method</label> 
                                                   <select class="multiselect-value required multi_change" name="data[as_connections_meta][payment_method][]" multiple="multiple" required="required">
                                                       <option value=""></option>
													   <?php $allPM=json_decode($asConnection['as_connections_meta']['payment_method']);
		  if(is_array($allPM)){
		  $valsPM=$allPM;  
			  }else{
		  $valsPM=explode('|',$asConnection['as_connections_meta']['payment_method']);  
				  }?>
            <?php foreach($payments as $payment){ ?>
             <option value="<?php echo $payment['id'];?>" <?php if(in_array($payment['id'],$valsPM)){echo 'selected';}?>><?php echo $payment['name'];?></option>
          <?php }?>
	                  		                      </select>
                                            </div>
                                            
                                           
                                            <!--<div class="user_display_form user_note">
                                                <label class="optional">Do you accept mental health fund?</label> 
                                                <input class="" name="data[as_connections_meta][mental_health_fund]" type="checkbox" value="1" <?php //if($asConnection['health_fund_status']!="" && $asConnection['health_fund_status']!=""){ echo "checked";}?> style="width:5%;">
                                                 
                                            </div>-->
                                          
                                            
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 steps_check">
                                                <label class="label_text">Do you accept mental health fund? </label>
                                                <input class="regular-checkbox" id="checkbox-1" name="data[as_connections_meta][mental_health_fund]" type="checkbox" value="1" <?php if($asConnection['health_fund_status']!="" && $asConnection['health_fund_status']!=""){ echo "checked";}?> style="width:5%;">
                                                <label for="checkbox-1"></label> 
                                            <div class="note_text">
                                               <p> ( By clicking yes, I agree that I am registered as a qualified <a href="https://aspencommunityfoundation.org/aspen-community-foundation/apply/apply-grant-individuals-families/" target="_blank">MHF provider</a>. If you would like to register please click <a href="https://aspencommunityfoundation.org/aspen-community-foundation/apply/apply-grant-individuals-families/" target="_blank">HERE</a>. Please only update this field when you are registered. )</p> 
                                           </div>
                            			  </div>
                                          
                                           <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 steps_check">
                                                <label class="label_text">Do you accept Triad Assistance Program (EAP)?</label>
                                                <input class="regular-checkbox" id="checkbox-traid" name="data[as_connections_meta][program_status]" type="checkbox" value="1" <?php if($asConnection['program_status']!="" && $asConnection['program_status']!=""){ echo "checked";}?> style="width:5%;">
                                                <label for="checkbox-traid"></label> 
                                                <div class="note_text">
                                               <p> (By clicking yes, I agree that I am registered as a qualified TRIAD provider.
                                                If you would like to be registered please contact TRIAD at 970-242-9536. 
                                                Please only update this field when you are registered.)</p> 
                                           </div>
                                                
                            			  </div>
                                         
                                 </div>  
                                 
                                <!-- INSURANCE-->
                                      <div class="login_head">
                                    	<i class="fa fa-file-text-o" aria-hidden="true"></i>
                                    	<h2> Insurance </h2>
                                	</div> 
                                   
                                   <div> 
                                            <div class="user_display_form user_display_form_vals">
                                                <label class="optional">Do you accept insurance?</label> 
                                                   <select class="required" name="data[as_connections_meta][insurance]" id="insurance" required="required">
                                                        <option value="">Please Select</option>
                                                        <option value="Yes" <?php if($asConnection['as_connections_meta']['insurance']=='Yes'){echo 'selected';}?>>Yes</option>
	   		  <option value="No" <?php if($asConnection['as_connections_meta']['insurance']=='No'){echo 'selected';}?>>No</option>
                                                   </select>     
                                            </div>
                                            
                                            <div class="user_display_form user_display_form_vals" id="insuranceProvider">
                                                <label class="optional">Insurance Providers</label> 
                                                  <select class="multiselect-value multi_change" name="data[as_connections_meta][insurance_provider][]" multiple="multiple">
                                                   <option value=""></option>
                                                      <?php $allIP=json_decode($asConnection['as_connections_meta']['insurance_provider']);
		  if(is_array($allIP)){
		  $valsIP=$allIP;  
			  }else{
		  $valsIP=explode('|',$asConnection['as_connections_meta']['insurance_provider']);  
				  }?>
            <?php foreach($insuranceproviders as $insuranceprovider){ ?>
             <option value="<?php echo $insuranceprovider['id'];?>" <?php if(in_array($insuranceprovider['id'],$valsIP)){echo 'selected';}?>><?php echo $insuranceprovider['name'];?></option>
          <?php }?>
	                  		                  </select>
	                  		                  
                                            </div>
                                          
                                            <div class="user_display_form">
                                                <label class="optional">Other Insurance Providers</label> 
                                                    <input type="text" class="valid"   name="data[as_connections_meta][other_insurance]" value="<?php echo $asConnection['as_connections_meta']['other_insurance'];?>">
                                            </div>
                                          
                                            <div class="user_display_form user_display_form_vals">
                                                <label class="required">Do you accept out of network?</label> 
                                                   <select class="required" name="data[as_connections_meta][out_of_network]">
                                                        <option value="">Select</option>
                                                        <option value="Yes" <?php if($asConnection['as_connections_meta']['out_of_network']=="Yes"){echo "Selected";}?>>Yes</option>
                                                        <option value="No" <?php if($asConnection['as_connections_meta']['out_of_network']=="No"){echo "Selected";}?>>No</option>
                                                   </select>      
                                            </div>
                                            
                                            <!--<div class="checkbox_click_step3"> 
                                            <input type="checkbox" class="" name="data[as_connections_meta][declaration]" value="1" <?php //if($asConnection['as_connections_meta']['declaration']==1){ echo 'checked';}?>>
                                            <label> I can provide a superbill with CPT and ICD codes for reimbursement from insurance companies?</label>  
                                        </div>-->
                                        
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 filters_padding_left">
                                                <input type="checkbox" id="copy_address" class="regular-checkbox" name="data[as_connections_meta][declaration]" value="1" <?php if($asConnection['as_connections_meta']['declaration']==1){ echo 'checked';}?>>
                                                  <label for="copy_address"></label>
                                                  <label class="label_text"> I can provide a superbill with CPT and ICD codes for reimbursement from insurance companies? </label>
                            	      </div>
                                      <?php if(isset($asConnection['as_connections_meta']['video_conference']) && $asConnection['as_connections_meta']['video_conference']!=""){}else{?>
                                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 user_display_form_vals" style="border-top:1px solid #ccc;padding-top:30px;">
                                      <p>Aspen Strong is working closely with government bodies and stakeholders to address the mental heath needs of the Roaring Fork Valley including areas to Parachute. Thus, we ask the following of your participation in the Aspen Strong Directory:</p>
                                                <input type="checkbox" id="i_accepts" class="regular-checkbox required termpopup" name="termsconditions" value="" required="required"  >
                                                  <label for="i_accepts"></label>
                                                  <label class="label_text"><a onclick="window.open('https://aspenstrong.org/terms-of-service', 'newwindow', 'width=500,height=250');  return false;">I accept all Terms and Conditions.</a></label> 
                            	      </div>
                                      <?php }?>
                                      
                                  
                                 </div>    
                                  
                                 </div> 
                                 
                                <div class="green_save">
                                       <ul>
                                           <li>
                                           <input type="hidden" value="<?php echo $asConnection['as_connections_meta']['id'];?>" name="data[as_connections_meta][metaId]" />
                                             <button type="submit" value="Submit" class="save_btn">Submit</button>
                                             <!--<a href="#" class="save_btn">Save</a>-->
                                           </li>
                                           <!--<li>
                                            <button type="submit" value="Next" class="next_btn">Next</button>
                                          </li>-->
                                       </ul>			       
                                </div> 
                                
                                </form>
                      
                                </div>
                                
                                <?php }?>
                                
                                 <?php if($asConnection['entry_type']=='organization'){?>
                                
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                   <?= $this->Flash->render(); ?>
                              		<form id="myform" method="post" action="">
                                <div>
                                 <!-- SPECIALTIES --> 
                                      <div class="login_head">
                                    	<i class="fa fa-th-large" aria-hidden="true"></i>
                                    	<h2> Speciality </h2>
                                	</div>
                                   
                                      <div class="phone_details"> 
          <?php $allIssues=json_decode($asConnection['as_connections_meta']['issue']);
		  if(is_array($allIssues)){
		  $vals=$allIssues;  
			  }else{
		  $vals=explode('|',$asConnection['as_connections_meta']['issue']);  
				  }
		  ?>
                                            <div class="user_display_form user_display_form_vals">
                                                <label class="optional required">Issues</label>
                                                  <select class="multiselect-value required multi_change" name="data[as_connections_meta][issue][]" multiple="multiple" required="required">
                                                 <option value=""></option>
												 <?php foreach($issues as $issue){ ?>
             <option value="<?php echo $issue['id'];?>" <?php if(in_array($issue['id'],$vals)){echo 'selected';}?>><?php echo $issue['name'];?></option>
            <?php }?>
	                  		                  </select> 
                                                   
                                            </div>
                                            
                                          
                                            
                                            
         
                                               <div class="user_display_form user_display_form_vals">
                                                <?php $allDig=json_decode($asConnection['as_connections_meta']['diagnosis']);
		  if(is_array($allDig)){
		  $valsDig=$allDig;  
			  }else{
		  $valsDig=explode('|',$asConnection['as_connections_meta']['diagnosis']);  
				  }
		  ?>
                                                <label class="optional">Areas of specialties<span>(Please choose three areas of speciality.)</span> </label> 
                                                
                                                   <select class="multiselect-value required multi_change" name="data[as_connections_meta][diagnosis][]" multiple="multiple" required="required">
	                  									<option value=""></option>
														<?php foreach($mentalhealths as $mentalhealth){ ?>
             <option value="<?php echo $mentalhealth['id'];?>" <?php if(in_array($mentalhealth['id'],$valsDig)){echo 'selected';}?>><?php echo $mentalhealth['name'];?></option>
             <?php }?>

	                  		                  </select> 
                                            </div>
                                            
                                            <div class="user_display_form user_display_form_vals">
                                                <label class="required">Treatment Orientation</label> 
                                                   <select class="multiselect-value required multi_change" name="data[as_connections_meta][treatment][]" multiple="multiple" required="required">
	                  									 <option value=""></option>
														 <?php $allTreat=json_decode($asConnection['as_connections_meta']['treatment']);
		  if(is_array($allTreat)){
		  $valsTreat=$allTreat;  
			  }else{
		  $valsTreat=explode('|',$asConnection['as_connections_meta']['treatment']);  
				  }?>
            <?php foreach($treatments as $treatment){ ?>
             <option value="<?php echo $treatment['id'];?>" <?php if(in_array($treatment['id'],$valsTreat)){echo 'selected';}?>><?php echo $treatment['name'];?></option>
          <?php }?>

	                  		                  </select> 
                                            </div>
                                            
                                            <div class="user_display_form user_display_form_vals">
                                                <label class="required">Modality</label> 
                                                   <select class="multiselect-value required multi_change" name="data[as_connections_meta][modality][]" multiple="multiple" required="required">
                                                        <?php $allMod=json_decode($asConnection['as_connections_meta']['modality']);
		  if(is_array($allMod)){
		  $valsMod=$allMod;  
			  }else{
		  $allMod=explode('|',$asConnection['as_connections_meta']['modalities']);  
				  }?>
              <option value=""></option>
            <?php foreach($modalities as $modality){ ?>
             <option value="<?php echo $modality['id'];?>" <?php if(in_array($modality['id'],$allMod)){echo 'selected';}?>><?php echo $modality['name'];?></option>
          <?php }?>
	                  		                  </select>


                                            </div>
                                            
                                            <div class="user_display_form user_display_form_vals">
                                            <?php //echo $asConnection['as_connections_meta']['age_group'];?>
                                                <label class="optional">Age</label> 
                                                   <select class="multiselect-value required multi_change" name="data[as_connections_meta][age][]" multiple="multiple" required="required">
                                                       <?php $allages=json_decode($asConnection['as_connections_meta']['age_group']);
		  if(is_array($allages)){
		  $valsAges=$allages;  
			  }else{
		  $valsAges=explode('|',$asConnection['as_connections_meta']['age_group']);  
				  }?>
            <?php foreach($ages as $age){ ?>
             <option value="<?php echo $age['id'];?>" <?php if(in_array($age['id'],$valsAges)){echo 'selected';}?>><?php echo $age['name'];?></option>
          <?php }?>
	                  		                      </select>
                                            </div>
                                            
                                            <div class="user_display_form user_display_form_vals">
                                            <?php //echo $asConnection['as_connections_meta']['video_conference'].'kkkkkkkkkk';?>
                                                <label class="required">Video Conference</label> 
                                                   <select class="required" name="data[as_connections_meta][video_conference]" required="required">
                                                         <option value="">Select</option>
                                                         <option value="Yes" <?php if($asConnection['as_connections_meta']['video_conference']=='Yes'){echo 'selected';}?>>Yes</option>
	         <option value="No" <?php if($asConnection['as_connections_meta']['video_conference']=='No'){echo 'selected';}?>>No</option>
	                                              </select> 
                                            </div>
                                            
                                            
                                          
                                           <!--<div class="user_display_form">
                                                <label class="optional">Other Languages</label> 
                                                    <input type="text" class="required valid" value="" required="required" placeholder="Other Language">
                                            </div>-->
                                          
                                   </div>
                                 
                                 
                               <!-- FINANCES -->
                                      <div class="login_head">
                                    	<i class="fa fa-line-chart" aria-hidden="true"></i>
                                    	<h2> Finance </h2>
                                	</div> 
                                   
                                   <div>  
                                            <ul class="cs-form-element half-input">
                                            
                                            <li>
                                                <label>Our facility also provides </label>
                                                <ul class="radio-box">
                                                    <li>
                                                       <input id="show_form" type="radio" value="free" <?php if($asConnection['as_connections_meta']['service_type']=='free'){echo 'checked';}?> name="data[as_connections_meta][service_type]">
                                                        <label for="show_form">Free</label>
                                                    </li>
                                                    <li>
                                                        <input id="hide_form" type="radio" value="discount" name="data[as_connections_meta][service_type]" <?php if($asConnection['as_connections_meta']['service_type']=='discount'){echo 'checked';}?> >
                                                        <label for="hide_form">Discounted services</label>
                                                    </li>
                                                </ul>
                     
                                            </li>
                    
                                        </ul> 
                                        
                                        	<div class="user_display_form user_display_form_vals">
                                                <label class="required">Average Session  Cost</label> 
                                                    <input type="text" class="required valid" name="data[as_connections_meta][session_cost]" value="<?php echo $asConnection['as_connections_meta']['session_cost'];?>" required="required" placeholder="Session Cost">
                                            </div>
                                            
                                           
                                            <div class="user_display_form user_display_form_vals">
                                                <label class="required">Do you accept sliding scale payments?</label> 
                                                   <select class="required"  name="data[as_connections_meta][scale_payment]" required="required">
                                                     <option value="" >Please Select</option>
                                                     <option value="Yes" <?php if($asConnection['as_connections_meta']['scale_payment']=='Yes'){echo 'selected';}?>>Yes</option>
	   		                                         <option value="No" <?php if($asConnection['as_connections_meta']['scale_payment']=='No'){echo 'selected';}?>>No</option>
                                                   </select>     
                                            </div>
                                            
                                            <div class="user_display_form user_display_form_vals">
                                                <label class="required">Payment Method</label> 
                                                   <select class="multiselect-value required multi_change" name="data[as_connections_meta][payment_method][]" multiple="multiple" required="required">
                                                       <option value=""></option>
													   <?php $allPM=json_decode($asConnection['as_connections_meta']['payment_method']);
		  if(is_array($allPM)){
		  $valsPM=$allPM;  
			  }else{
		  $valsPM=explode('|',$asConnection['as_connections_meta']['payment_method']);  
				  }?>
            <?php foreach($payments as $payment){ ?>
             <option value="<?php echo $payment['id'];?>" <?php if(in_array($payment['id'],$valsPM)){echo 'selected';}?>><?php echo $payment['name'];?></option>
          <?php }?>
	                  		                      </select>
                                            </div>
                                            
                                           
                                           <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 steps_check">
                                                <label class="label_text">Do you accept mental health fund? </label>
                                                <input class="regular-checkbox" id="checkbox-1" name="data[as_connections_meta][mental_health_fund]" type="checkbox" value="1" <?php if($asConnection['health_fund_status']!="" && $asConnection['health_fund_status']!=""){ echo "checked";}?> style="width:5%;">
                                                <label for="checkbox-1"></label> 
                                                <div class="note_text">
                                               <p>( By clicking yes, I agree that I am registered as a qualified <a href="https://aspencommunityfoundation.org/aspen-community-foundation/apply/apply-grant-individuals-families/" target="_blank">MHF provider</a>. If you would like to register please click <a href="https://aspencommunityfoundation.org/aspen-community-foundation/apply/apply-grant-individuals-families/" target="_blank">HERE</a>. Please only update this field when you are registered. )</p> 
                                           </div>
                            			  </div>
                                          
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 steps_check">
                                                <label class="label_text">Do you accept Triad Assistance Program (EAP)?</label>
                                                <input class="regular-checkbox" id="checkbox-traid" name="data[as_connections_meta][program_status]" type="checkbox" value="1" <?php if($asConnection['program_status']!="" && $asConnection['program_status']!=""){ echo "checked";}?> style="width:5%;">
                                                <label for="checkbox-traid"></label> 
                                                <div class="note_text">
                                               <p> (By clicking yes, I agree that I am registered as a qualified TRIAD provider.
                                                If you would like to be registered please contact TRIAD at 970-242-9536. 
                                                Please only update this field when you are registered.)</p> 
                                           </div>
                            			  </div>
                                            
                                 </div>  
                                 
                                <!-- INSURANCE-->
                                      <div class="login_head">
                                    	<i class="fa fa-file-text-o" aria-hidden="true"></i>
                                    	<h2> Insurance </h2>
                                	</div> 
                                   
                                   <div> 
                                            <div class="user_display_form user_display_form_vals">
                                                <label class="optional">Do you accept insurance?</label> 
                                                   <select class="required" name="data[as_connections_meta][insurance]" id="insurance" required="required">
                                                        <option value="">Please Select</option>
                                                        <option value="Yes" <?php if($asConnection['as_connections_meta']['insurance']=='Yes'){echo 'selected';}?>>Yes</option>
	   		  <option value="No" <?php if($asConnection['as_connections_meta']['insurance']=='No'){echo 'selected';}?>>No</option>
                                                   </select>     
                                            </div>
                                            
                                            <div class="user_display_form user_display_form_vals" id="insuranceProvider">
                                                <label class="optional">Insurance Providers</label> 
                                                  <select class="multiselect-value multi_change" name="data[as_connections_meta][insurance_provider][]" multiple="multiple">
                                                   <option value=""></option>
                                                      <?php $allIP=json_decode($asConnection['as_connections_meta']['insurance_provider']);
		  if(is_array($allIP)){
		  $valsIP=$allIP;  
			  }else{
		  $valsIP=explode('|',$asConnection['as_connections_meta']['insurance_provider']);  
				  }?>
            <?php foreach($insuranceproviders as $insuranceprovider){ ?>
             <option value="<?php echo $insuranceprovider['id'];?>" <?php if(in_array($insuranceprovider['id'],$valsIP)){echo 'selected';}?>><?php echo $insuranceprovider['name'];?></option>
          <?php }?>
	                  		                  </select>
	                  		                  
                                            </div>
                                          
                                            <div class="user_display_form">
                                                <label class="optional">Other Insurance Providers</label> 
                                                    <input type="text" class="valid" name="data[as_connections_meta][other_insurance]" value="<?php echo $asConnection['as_connections_meta']['other_insurance'];?>">
                                            </div>
                                          
                                            <div class="user_display_form user_display_form_vals">
                                                <label class="required">Do you accept out of network?</label> 
                                                   <select class="required" name="data[as_connections_meta][out_of_network]">
                                                        <option value="">Select</option>
                                                        <option value="Yes" <?php if($asConnection['as_connections_meta']['out_of_network']=="Yes"){echo "Selected";}?>>Yes</option>
                                                        <option value="No" <?php if($asConnection['as_connections_meta']['out_of_network']=="No"){echo "Selected";}?>>No</option>
                                                   </select>     
                                            </div>
                                            
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 filters_padding_left">
                                                <input type="checkbox" id="copy_address" class="regular-checkbox" name="data[as_connections_meta][declaration]" value="1" <?php if($asConnection['as_connections_meta']['declaration']==1){ echo 'checked';}?>>
                                                  <label for="copy_address"></label>
                                                  <label class="label_text"> I can provide a superbill with CPT and ICD codes for reimbursement from insurance companies? </label>
                            	      </div>
                                        
                                 <?php if(isset($asConnection['as_connections_meta']['video_conference']) && $asConnection['as_connections_meta']['video_conference']!=""){}else{?>
                                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 user_display_form_vals"  style="border-top:1px solid #ccc;padding-top:30px;">
                                      <p>Aspen Strong is working closely with government bodies and stakeholders to address the mental heath needs of the Roaring Fork Valley including areas to Parachute. Thus, we ask the following of your participation in the Aspen Strong Directory:</p>
                                                <!--<input type="checkbox" id="i_accepts" class="regular-checkbox required" name="termsconditions" value="" required="required">
                                                  <label for="i_accepts"></label>
                                                  <label class="label_text"><a href="http://frogiez.tk/directory/home/termsconditions" target="_blank">I accept all Terms and Conditions.</a></label> -->
												  
												  <input type="checkbox" id="i_accepts" class="regular-checkbox required termpopup" name="termsconditions" value="" required="required"  >
                                                  <label for="i_accepts"></label>
                                                  <label class="label_text"><a onclick="window.open('https://aspenstrong.org/terms-of-service', 'newwindow', 'width=500,height=250');  return false;">I accept all Terms and Conditions.</a></label> 
                            	      </div>
                                 <?php }?>
                                  
                                 </div>    
                                 
                                 </div> 
                                 
                                <div class="green_save">
                                       <ul>
                                           <li>
                                           <input type="hidden" value="<?php echo $asConnection['as_connections_meta']['id'];?>" name="data[as_connections_meta][metaId]" />
                                             <button type="submit" value="Submit" class="save_btn">Submit</button>
                                             <!--<a href="#" class="save_btn">Save</a>-->
                                           </li>
                                           <!--<li>
                                            <button type="submit" value="Next" class="next_btn">Next</button>
                                          </li>-->
                                       </ul>			       
                                </div> 
                                
                                </form>
                      
                                </div>
                                
                                <?php }?>
                          </div>
                            
                         </div>
                   
                 
              </div>
            
        </div>
  </div>
  
  <!-- Modal for terms and conditions-->
<div class="modal fade" id="myModalNew" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    	aria-hidden="true"  >
  	  <div class="modal-dialog modal-lg">
        <div class="modal-content">
               <div class="small-dialog-header">
					<h3 style="text-align:center">Terms and Conditions</h3>
                    
				</div>
                
              <!-- <div class="modal-header">    
                  <ul class="nav nav-tabs modal-title">
                              <li class="active"><a href="#Reportissue" data-toggle="tab"> Report an Issue  </h2></a></li>
                  </ul>   
          </div> -->
          
               <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                      <div class="tab-content">
                                                       
                            <!--Help Forms-->
                            
                            <div class="tab-pane active" id="Reportissue">
                              
                        <div class="tab-content" id="" style="display: inline-block;">
							<form method="post" id="termsForm" class="terms_box" >
						
												
                           <p class="form-row form-row-wide">
							<div class="checkboxes margin-top-10 user_display_form_vals1">
										<input type="checkbox" required="required" id="check1" name="check1" class="com_check">
										<label for="check1" class="">I have read the terms and conditions</label>
										<div id="check1-error" class="error" style="display:none;">This field is required.</div>
							</div>
                            </p> 
							<p class="form-row form-row-wide">
							<div class="checkboxes margin-top-10 user_display_form_vals">
										<input id="check2" type="checkbox" required="required" name="check2" class="com_check">
										<label for="check2" class="">I agree to participate in reviewing monthly 'Aspen Strong Directory Updates' and a yearly survey request.</label>
										<div id="check2-error" class="error" style="display:none;">This field is required.</div>
							</div>
                            </p> 
                            <p class="form-row form-row-wide">
							<div class="checkboxes margin-top-10 user_display_form_vals">
										<input id="check3" type="checkbox" required="required" name="check3" class="com_check">
										<label for="check3" class="">I agree to update my directory profile at least yearly.</label>
										<div id="check3-error" class="error" style="display:none;">This field is required.</div>
							</div>
                            </p> 
                           <p class="form-row form-row-wide">
							<div class="checkboxes margin-top-10 user_display_form_vals">
										<input id="check4" type="checkbox" required="required" name="check4" class="com_check">
										<label for="check4" class="">I agree to represent myself and operate according to my professional ethics and Colorado regulations (DORA) within my specific title or license. If I am not a registered professional with DORA, I agree to operate ethically within the scope of my practice and the certification(s) I have earned and promote. </label>
										<div id="check4-error" class="error" style="display:none;">This field is required.</div>
							</div>
                            </p> 
							<div class="form-row">
									<input type="button" class="click_term button border margin-top-5" name="send" value="Submit">
							  </div>
								
							</form>
						</div>
                            </div>
                            
                           <!--Help Forms--> 
                            
                      </div>
                        
                    </div>
                   
                </div>
            </div> 
           </div>
    </div>
</div>
<!-- close Modal for terms and conditions-->
<link href="<?php echo HTTP;?>css/front/fSelect_steps.css" rel="stylesheet">

<script src="<?php echo HTTP;?>js/front/fSelect_steps.js"></script>   
  <script type="text/javascript">
 
$(document).ready(function(){
	
/*Insurance*/

$('#insuranceProvider').hide();
 if($('#insurance').val()=='Yes'){
 $('#insuranceProvider').show();	 
 }
 if($('#insurance').val()=='No'){
 $('#insuranceProvider').hide();	 
 }		 
 
 $('#insurance').change(function() {
 if($('#insurance').val()=='Yes'){
 $('#insuranceProvider').show();	 
 }else{
 $('#insuranceProvider').hide();	 
 }		 
});

	
/*Insurance*/
	
$('.multiselect-value').fSelect();
$('.multi_change').change(function(event) {
  var attrbute = $(this).attr('aria-describedby');
    if ($(this).val()!='') {
      $.each($('span.error'),function(index, el) {
        if(attrbute==$(this).attr('id'))
        {
          $(this).hide();
        }
      });
    } else {
      $.each($('span.error'),function(index, el) {
        if(attrbute==$(this).attr('id'))
        {
          $(this).show();
        }
      });
    }
});
$("#myform").validate({
	rules: {
		"data[as_connections_meta][issue][]" :
            {
             required:true,
             minlength : 3
             },
		"data[as_connections_meta][treatment][]" :
             {
              required:true,
             },                                
         "data[as_connections_meta][modality][]" :
              {
               required:true,
               
               },
		 "data[as_connections_meta][diagnosis][]" :
              {
               required:true,
               minlength : 3,
			         maxlength : 3
               },
		 "data[as_connections_meta][age][]" :
              {
               required:true,
               
               },
		 termsconditions :
            {
             required:true,
             },
		 "data[as_connections_meta][insurance_provider][]" :
              {
              required:function(element) {
                 if($("#insurance").val()!='Yes') 
                 return false;
                 else return true;
			  }
               },
			  
			 
			 /*required:function(element) {
                 if($("#bilingual").val()!='yes') 
                 return false;
                 else return true;*/
			 
},
         ignore: ':hidden:not(".multiselect-value,.regular-checkbox")',
		 
		 messages: {
                                  
                              termsconditions :
							  {
                                required:"Please accept terms and conditions.",
                               },
                               "data[as_connections_meta][issue][]":
                               {
                                minlength:"Select at least three ",
                               },
							   "data[as_connections_meta][diagnosis][]" :
                                {
                                 minlength:"Select at least three ",
								                 maxlength: "Select maximum three"
                                }, 
                               
                          },
		errorElement: 'span',
        errorPlacement: function (error, element) {
			if (element.is('select')) {
			$(element).parent('div').addClass('error-select');
			}
            error.insertAfter($(element).parents('.user_display_form_vals'));
        },
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
$('.termpopup').click(function(){
	$('#myModalNew').on('hidden.bs.modal', function(e) {
		  $("#myModalNew .modal-body").find('input:radio, input:checkbox').prop('checked', false);
		})
          if($(this).is(':checked')) {
				$("#myModalNew").modal({

				  backdrop: 'static',

				keyboard: false

				});
           } else {
             $('#myModalNew').modal('hide');
           }
        });


	$('.click_term').click(function(){	

	if ($("#check1:checked").length == 1) {
		$("#check1-error").css("display", "none");
	}else{
		$("#check1-error").css("display", "block");
		
	}
	if ($("#check2:checked").length == 1) {
		$("#check2-error").css("display", "none");
		
	}else{
		$("#check2-error").css("display", "block");
	}
	if ($("#check3:checked").length == 1) {
		$("#check3-error").css("display", "none");
		
	}else{
		$("#check3-error").css("display", "block");
	}
	if ($("#check4:checked").length == 1) {
		$("#check4-error").css("display", "none");
		
	}else{
		$("#check4-error").css("display", "block");
	}
	 if ($("#check1:checked,#check2:checked,#check3:checked,#check4:checked").length == 4) {
		 $('#myModalNew').modal('hide');
		 
	 } 
	 });

$('.com_check').click(function(){
	      var curId=this.id;
          if($("#"+curId).is(':checked')) {
			$("#"+curId+"-error").css("display", "none");	
           } else {
             $("#"+curId+"-error").css("display", "block");	
           }
        });
</script>
