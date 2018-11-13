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
                                                <li class="active">
                                                    <a href="<?php echo HOME_WEB;?>profile/editProfile4/<?php echo base64_encode($asConnection['id']);?>"><i class="fa fa-question-circle"></i>Professional Details</a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo HOME_WEB;?>profile/editProfile5/<?php echo base64_encode($asConnection['id']);?>"><i class="fa fa-bookmark"></i>Specialities </a>
                                                </li>
                                       </ul>				       
                                </div> 
                               
                             <!--for organization-->
                             <?php if($asConnection['entry_type']=='organization'){$i=1;?>
                              
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <?= $this->Flash->render(); ?>
                              	<form id="myform2" method="post" action="">
                                 <!-- MALPRACTICE INSURANCE --> 
                                      <div class="login_head">
                                    	<i class="fa fa-heart"></i>
                                    	<h2> Malpractice Insurance </h2>
                                	</div>
                                   
                                      <div class="phone_details"> 
                                    	 
                                            <div class="user_display_form user_display_form_vals">
                                                <label class="optional">Malpractice Insurance</label> 
                                                   <select name="data[as_connections_meta][malpractice_insurance]" class="multi_change" required="required" id="malpractice_insurance">
                                                       <option value="">Do you have Malpractice Insurance ?</option>
                                                       <option  value="Yes" <?php if($asConnection['as_connections_meta']['malpractice_insurance']=='Yes'){ echo 'selected';}?>>Yes</option>
                                                       <option  value="No" <?php if($asConnection['as_connections_meta']['malpractice_insurance']=='No'){ echo 'selected';}?>>No</option>
                                                    </select> 
                                                 
                                            </div>
                                            
                                           <div class="user_display_form user_display_form_vals" id="malpractice_carrer">
                                                <label class="optional">Malpractice Carrier</label> 
                                                    <input type="text" class="required valid" name="data[as_connections_meta][malpractice_carrer]" value="<?php echo $asConnection['as_connections_meta']['malpractice_carrer']?>" required="required">
                                           </div>
                                           
                                           
                                          
                                         
                                   </div>
                                 
                                 
                               <!-- CREDENTIAL TYPE -->
                                      <div class="login_head">
                                    	<i class="fa fa-leaf"></i>
                                    	<h2> Credential Type </h2>
                                	</div> 
                                   
                                 
                                      <div class="phone_details">
                                      
                                          <div class="user_display_form user_display_form_vals">
                                                <label class="optional">Are you a </label> 
                                                
                                                   <select class="required multi_change" name="data[as_connections_meta][treatment_type]" required="required">
                                                         <option value="">Select One</option>
                                                         <?php 
                                                            foreach($org_type as $org_typ){
                                                              ?>
                                                                <option <?php if(isset($asConnection['as_connections_meta']['treatment_type']) && $asConnection['as_connections_meta']['treatment_type']==$org_typ['name']){echo "selected";}?> value="treatment center"><?php echo $org_typ['name']; ?></option>
                                                              <?php
                                                            }
                                                         ?>
                                                         <!-- <option <?php if(isset($asConnection['as_connections_meta']['treatment_type']) && $asConnection['as_connections_meta']['treatment_type']=="treatment center"){echo "selected";}?> value="treatment center"> treatment center </option>
                                                         <option <?php if(isset($asConnection['as_connections_meta']['treatment_type']) && $asConnection['as_connections_meta']['treatment_type']=="financial resource"){echo "selected";}?> value="financial resource"> financial resource</option>
                                                         <option <?php if(isset($asConnection['as_connections_meta']['treatment_type']) && $asConnection['as_connections_meta']['treatment_type']=="resource center"){echo "selected";}?> value="resource center"> resource center</option>
                                                         <option <?php if(isset($asConnection['as_connections_meta']['treatment_type']) && $asConnection['as_connections_meta']['treatment_type']=="educational center"){echo "selected";}?> value="educational center"> educational center</option>
                                                         <option <?php if(isset($asConnection['as_connections_meta']['treatment_type']) && $asConnection['as_connections_meta']['treatment_type']=="other"){echo "selected";}?> value="other"> other </option> -->
                                                        
                                                    </select> 
                                            </div> 
                                    	    
                                           
                                            <div class="user_display_form user_display_form_vals">
                                                <label class="optional">Do you have licensed professionals working at your organization ?</label> 
                                                   <select class="required multi_change" name="data[as_connections_meta][prof_org]" required="required">
                                                        <option value="">Select One</option>
                                                        <option <?php if(isset($asConnection['as_connections_meta']['prof_org']) && $asConnection['as_connections_meta']['prof_org']=="Yes"){echo "selected";}?> value="Yes">Yes</option>
                                                        <option <?php if(isset($asConnection['as_connections_meta']['prof_org']) && $asConnection['as_connections_meta']['prof_org']=="No"){echo "selected";}?> value="No">No</option>
                                                    </select> 
                                                 
                                            </div>
                                            
                                            <div class="user_display_form user_display_form_vals">
                                                <label class="optional">Are you an accredited institute ?</label> 
                                                   <select class="required multi_change" name="data[as_connections_meta][accredatation]" id="acc" required="">
                                                        <option value=""> Accredatation </option>
                                                        <option <?php if(isset($asConnection['as_connections_meta']['accredatation']) && $asConnection['as_connections_meta']['accredatation']=="Yes"){echo "selected";}?> value="Yes">Yes</option>
                                                        <option <?php if(isset($asConnection['as_connections_meta']['accredatation']) && $asConnection['as_connections_meta']['accredatation']=="No"){echo "selected";}?> value="No">No</option>
                                                    </select> 
                                                 
                                            </div>
                                            
                                            <div class="user_display_form user_display_form_vals" id="name">
                                                <label class="required">Name of Accreditation</label> 
                                                    <input type="text" class="valid required" value="<?php echo $asConnection['as_connections_meta']['accredatation_name'];?>" name="data[as_connections_meta][accredatation_name]" required="required" >
                                            </div>
                                          
                                   </div>      
                                           
                                          
                                  <div class="green_save">
                                       <ul>
                                           <li>
                                             <input type="hidden" value="<?php echo $asConnection['entry_type'];?>" name="data[as_connections_meta][entry_type]" />
                                             <input type="hidden" value="<?php echo $asConnection['as_connections_meta']['id'];?>" name="data[as_connections_meta][metaId]" />
                                             <button type="submit" value="Submit" class="save_btn">Save</button>
                                             <!--<a href="#" class="save_btn">Save</a>-->
                                           </li>
                                           <li>
                                            <a href="<?php echo HOME_WEB;?>profile/editProfile5/<?php echo base64_encode($asConnection['id']);?>" class="next_btn">Skip</a>
                                            <!-- <a href="#" class="next_btn">Next</a>-->
                                          </li>
                                       </ul>			       
                                </div> 
                                
                                </form> 
                              </div>
                              
                             <?php }?>
                              
                              <!--for indiviual-->
                              <?php if($asConnection['entry_type']=='individual'){?>
                              
                             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                             <?= $this->Flash->render(); ?>
                              	<form id="myform" method="post" action="">
                                   <!-- ACADEMICS --> 
                                      <div class="login_head">
                                    	<i class="fa fa-university" aria-hidden="true"></i>
                                    	<h2> Academics </h2>
                                	</div>
                                   
                                      <div class="phone_details"> 
                                    	 
                                           <div class="user_display_form user_display_form_vals">
                                                <label class="optional">School most recently graduated</label> 
                                                    <input type="text" class="required valid" name="data[as_connections_meta][school]" value="<?php echo $asConnection['as_connections_meta']['school'];?>" required="required">
                                           </div>
                                           
                                           <div class="user_display_form user_display_form_vals">
                                                <label class="optional">Year Graduated</label> 
                                                    <input type="text" class="required valid" name="data[as_connections_meta][school_year]" value="<?php echo $asConnection['as_connections_meta']['school_year'];?>" required="required">
                                           </div>
                                           
                                           <div class="user_display_form">
                                                <label class="optional">Years in practice</label> 
                                                   <select class="multiselect-value  multi_change" name="data[as_connections_meta][practice]">
	                  	                        <?php $i=1;for($i=1;$i<=50;$i++){?>
	        <option value="<?php echo $i;?>" <?php if($asConnection['as_connections_meta']['practice']==$i){echo 'selected';}?>><?php echo $i;?> Years</option>
                                               <?php }?>
	                  		                  </select>
                                            
                                            </div>
                                         
                                   </div>
                                
                                 <!-- MALPRACTICE INSURANCE --> 
                                      <div class="login_head">
                                    	<i class="fa fa-heart"></i>
                                    	<h2> Malpractice Insurance </h2>
                                	</div>
                                   
                                      <div class="phone_details"> 
                                    	 
                                            <div class="user_display_form user_display_form_vals">
                                                <label class="optional">Malpractice Insurance</label> 
                                                   <select class="required multi_change" name="data[as_connections_meta][malpractice_insurance]" required="required" id="malpractice_insurance" >
                                                       <option value="">Do you have Malpractice Insurance ?</option>
                                                        <option value="Yes" <?php if($asConnection['as_connections_meta']['malpractice_insurance']=='Yes'){ echo 'selected';}?>>Yes</option>
	         <option value="No" <?php if($asConnection['as_connections_meta']['malpractice_insurance']=='No'){ echo 'selected';}?>>No</option>
                                                    </select> 
                                                   
                                            </div>
                                            
                                           <div class="user_display_form user_display_form_vals" id="malpractice_carrer">
                                                <label class="optional">Malpractice Carrier</label> 
                                                    <input type="text" class="required valid" name="data[as_connections_meta][malpractice_carrer]" value="<?php echo $asConnection['as_connections_meta']['malpractice_carrer']?>" required="required">
                                           </div>
                                          
                                           <!--<div class="user_display_form">
                                              <label class="optional">Proof of Malpractice </label> 
                                                 <div class="upload-container">
                                                        <span class="upload-placeholder">
                                                            <input id="file" class="file" type="file" multiple="" data-min-file-count="1">
                                                            Drag an image here or browse for the image to upload.
                                                        </span>
                                                        <div class="clearfix"></div>
                                                        <input type="hidden" name="listing_featured_img" value="">
                                                       
                                                 </div>  
                                                  
                                           </div>--> 
                                           
                                           <!--<div class="note_text">
                                               <p> Note:- You can proceed and submit your form without uploading this document and upload it later, 
                                                but your profile will not be verified until it is uploaded. </p> 
                                           </div>-->
                                         
                                   </div>
                                 
                                 
                               <!-- CREDENTIAL TYPE -->
                                      <div class="login_head">
                                    	<i class="fa fa-leaf"></i>
                                    	<h2> Credential Type </h2>
                                	</div> 
                                   
                                      <div class="phone_details"> 
                                    	
                                        <div class="user_display_form user_display_form_vals">
                                                <label class="required">Provider Type</label> 
                                                   <select class=" required multi_change" name="data[as_connections_meta][therapist_type]">
                                                   <option value="">Select One</option>
                                                        <?php foreach($therapists as $therapist){ //print_r($therapist);?>
              <!--<option value="<?php //echo $therapist['id'];?>" <?php //if($therapist['id']==$asConnection['as_connections_meta']['therapist_type']){echo 'selected';}?>><?php //echo $therapist['name'];?> </option>-->
               <?php /*if($therapist['id']==15){?>
                              <optgroup label="<?php echo $therapist['name'];?>">
                             <?php }*/ if($therapist['id']!=15){?>
                             <option value="<?php echo $therapist['id'];?>" <?php if($therapist['id']==$asConnection['as_connections_meta']['therapist_type']){echo 'selected';}?>><?php echo $therapist['name'];?></option>
                             <?php }if($therapist['id']==24){?>
                              </optgroup>
                             <?php }?>
              
              <?php }?>

                                                   </select> 
                                                       
                                            </div>
                                        
                                        <div class="user_display_form user_display_form_vals">
                                        <?php //print_r($asConnection['as_connections_meta']['licence_status']);?>
                                                <label class="optional">Are you licensed?</label> 
                                                   <select class="required multi_change" name="data[as_connections_meta][licence_status]"  id="licensed" required="required">
                                                       <option value=""> Are you licensed ? </option>                                                      <option <?php if($asConnection['as_connections_meta']['licence_status']==1){echo "selected";}?> value="yes">Yes</option>
                                                       <option <?php if($asConnection['as_connections_meta']['licence_status']==0 && $asConnection['as_connections_meta']['licence_status']!=""){echo 'selected';}?> value="no">No</option>
                                                    </select>
                                          </div> 
                                          
                                          <div class="user_display_form user_display_form_vals" id="licensed_yes">
                                                <label class="optional">License or Certification No.</label> 
                                                    <input type="text" class="required valid" name="data[as_connections_meta][licence]" value="<?php echo $asConnection['as_connections_meta']['licence'];?>" required="required">
                                            </div> 
                                            
                                            <div class="user_display_form user_display_form_vals" id="licensed_no">
                                                <label class="optional">Are you pre-licensed?</label> 
                                                   <select class="required multi_change" name="data[as_connections_meta][pre_licenced]" id="pre-licensed" required="required">
                                                       <option value=""> Are you pre-licensed? </option>
                                                       <option <?php if($asConnection['as_connections_meta']['pre_licenced']=='yes'){echo 'selected';}?> value="yes">Yes</option>
                                                       <option <?php if($asConnection['as_connections_meta']['pre_licenced']=='no'){echo 'selected';}?> value="no">No</option>
                                                    </select>
                                          </div> 
                                          
                                          <div id="show_yes">
                                          
                                           <div class="user_display_form user_display_form_vals">
                                                <label class="optional">Pre-License/registered NO</label> 
                                                    <input type="text" class="valid required" name="data[as_connections_meta][prelic_no]" value="<?php echo $asConnection['as_connections_meta']['prelic_no']?>" required="required">
                                            </div> 
                                            
                                            <div class="user_display_form user_display_form_vals">
                                                <label class="optional">Supervisor's Name </label> 
                                                    <input type="text" class="required valid" name="data[as_connections_meta][supervisor_name]" value="<?php echo $asConnection['as_connections_meta']['supervisor_name']?>" required="required">
                                           </div>
                                          
                                           <div class="user_display_form">
                                                <label class="optional">Supervisor's Licence</label> 
                                                    <input type="text" class="valid" name="data[as_connections_meta][supervisor_licence]" value="<?php echo $asConnection['as_connections_meta']['supervisor_licence']?>" >
                                           </div>
                                           
                                           <div class="user_display_form">
                                                <label class="optional">Supervisor's Phone number</label> 
                                                    <input type="text" class="valid" name="data[as_connections_meta][supervisor_phone]" value="<?php echo $asConnection['as_connections_meta']['supervisor_phone']?>">
                                           </div>
                                           
                                           <div class="user_display_form">
                                                <label class="optional">Supervisor's Email</label> 
                                                    <input type="text" class=" valid" value="<?php echo $asConnection['as_connections_meta']['supervisor_email']?>" name="data[as_connections_meta][supervisor_email]">
                                           </div>
                                           
                                         </div>
                                         
                                         <div id="show_no">
                                         		 <div class="user_display_form user_display_form_vals">
                                                <label class="optional">Diploma/Certificate Type or License Membership Number</label> 
                                                    <input type="text" class="required valid" name="data[as_connections_meta][mem_no]" value="<?php echo $asConnection['as_connections_meta']['mem_no']?>" ame="data[as_connections_meta][mem_no]" required="required">
                                                </div>
                                          </div>
                                         
                                   </div>
                                  
                                   <!-- Alternate Credential -->
                                      <div class="login_head">
                                    	<i class="fa fa-leaf"></i>
                                    	<h2> Additional Credential </h2>
                                        <p>Note:- Please add additional certifications or licenses here.</p>  
                                	</div> 
                                   
                                      <div class="phone_details"> 
                                    	   <?php $i=1;if(!empty($asConnection['connection_credentials'])){
											     foreach($asConnection['connection_credentials'] as $credentials){
											   
											   ?>
                                            <div class="user_display_form credential user_display_form_vals">
                                                <label class="optional">Licensing Authority  or Accrediting Institution, Membership, Organization</label> 
                                                    <input type="text" class="valid" required="" name="data[credentialing][cred_val<?php echo $i;?>]" value="<?php echo $credentials['credentialing'];?>" > 
                                                    <input type="hidden" name="data[credentialing][cred_id<?php echo $i;?>]" value="<?php echo $credentials['id'];?>">
                                                    <?php if($i !=1){?>
                                                 <a href="javascript:void(0);" class="user_close" onClick="remove_li(this);"> <i class="fa fa-times" aria-hidden="true"></i> </a>
                                                 <?php }?>
                                           </div>
                                           <?php $i++;}}else{?>
                                           <div class="user_display_form user_display_form_vals">
                                                <label class="optional">Licensing Authority  or Accrediting Institution, Membership, Organization</label> 
                                                    <input type="text" class="valid" required="" name="data[credentialing][cred_val<?php echo $i;?>]" value="">
                                           </div>
                                           <?php }?>
                                           <div class="add_more_btn" id="add-credent">
                                        <a href="javascript:void(0);" class="append-btn"> Add Other Credentials <i class="fa fa-plus" aria-hidden="true"></i> </a>
                                      </div>
                                         
                                   </div> 
                                   
                                    <!-- Other Credential -->
                                      <!--<div class="login_head">
                                    	<i class="fa fa-leaf"></i>
                                    	<h2> Other Credential </h2>
                                	</div> 
                                   
                                      <div class="phone_details"> 
                                    	 
                                            <div class="user_display_form">
                                                <label class="optional">Specific credentialing</label> 
                                                    <input type="text" class="required valid" value="" required="required">
                                           </div>
                                           
                                           <div class="user_display_form">
                                                <label class="optional">Diploma/Certificate Type</label> 
                                                    <input type="text" class="required valid" value="" required="required">
                                           </div> 
                                           
                                            <div class="add_more_btn">
                                        <a href="#"> Add Other Credentials <i class="fa fa-plus" aria-hidden="true"></i> </a>
                                      </div>
                                         
                                   </div>  -->    
                                     
                                      <!--btn save and next-->    
                                  <div class="green_save">
                                  <?php if( count($asConnection['connection_credentials'])==0){
									   $totalCredentials=1;
									  }else{
									   $totalCredentials= count($asConnection['connection_credentials']);
										  }?>
                                   <input type="hidden" value="<?php echo $totalCredentials;?>" name="data[totalCredentials]" id="totalCredentials" />
                                   <input type="hidden" value="<?php echo $asConnection['as_connections_meta']['id'];?>" name="data[as_connections_meta][metaId]" />
                                   <input type="hidden" value="<?php echo $asConnection['entry_type'];?>" name="data[as_connections_meta][entry_type]" />
                                       <ul>
                                           <li>
                                             <button type="submit" value="Submit" class="save_btn">Save</button>
                                             <!--<a href="#" class="save_btn">Save</a>-->
                                           </li>
                                           <li>
                                            <a href="<?php echo HOME_WEB;?>profile/editProfile5/<?php echo base64_encode($asConnection['id']);?>" class="next_btn">Skip</a>
                                            <!-- <a href="#" class="next_btn">Next</a>-->
                                          </li>
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
<script type="text/javascript">
$(document).ready(function(){
$(".message.success").append('<a href="<?php echo HOME_WEB;?>profile/editProfile5/<?php echo base64_encode($asConnection['id']);?>" class="next_btn_top">Next</a>');
});
</script>
<link href="<?php echo HTTP;?>css/front/fSelect_steps.css" rel="stylesheet" />

<script src="<?php echo HTTP;?>js/front/fSelect_steps.js"></script> 
<script type="text/javascript">

	if($("#myform2").length){
	 $("#myform2").validate({
	rules: {
		
		"data[as_connections_meta][malpractice_carrer]" :
            {
             required:true,
             },
		"data[as_connections_meta][malpractice_insurance]" :
            {
             required:true,
             },
			 		
			  
	},
	
	errorElement: 'span',
        errorPlacement: function (error, element) {
			
            error.insertAfter($(element).parents('.user_display_form_vals'));
        }
	});
	$(document).ready(function(){
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
	//$('.multiselect-ui').fSelect();
 $('#malpractice_carrer').hide();
 if($('#malpractice_insurance').val()=='Yes'){
 $('#malpractice_carrer').show();	 
 }else{
 $('#malpractice_carrer').hide();	 
 }		 
 
 $('#malpractice_insurance').change(function() {
 if($('#malpractice_insurance').val()=='Yes'){
 $('#malpractice_carrer').show();	 
 }else{
 $('#malpractice_carrer').hide();	 
 }		 
});

 $('#name').hide();
 if($('#acc').val()=='Yes'){
 $('#name').show();	 
 }else{
 $('#name').hide();	 
 }		 
 
 $('#acc').change(function() {
 if($('#acc').val()=='Yes'){
 $('#name').show();	 
 }else{
 $('#name').hide();	 
 }		 
});

$('.multiselect-value').fSelect();
	


		<!--side-menu js-->
			$(".expandable1").click(function(){
			if($("#show_me").css('display')=='block'){
			$("#show_me").hide();
			}else{
		    $("#show_me").show();
				}
			$("#show_me").css('min-height','150px');
			
			});
			
			$(".expandable2").click(function(){
			//$("#show_help").show();
			if($("#show_help").css('display')=='block'){
			$("#show_help").hide();
			}else{
		    $("#show_help").show();
				}
			$("#show_help").css('min-height','95px');
			});
			
			$(".expandable3").click(function(){
			//$("#show_setting").show();
			if($("#show_setting").css('display')=='block'){
			$("#show_setting").hide();
			}else{
		    $("#show_setting").show();
				}
			$("#show_setting").css('min-height','75px');
			});
			
});
	
	}
	
	
 if($("#myform").length){
 $("#myform").validate({
	rules: {
		"data[as_connections_meta][therapist_type]" :
            {
             required:true,
             },
		"data[as_connections_meta][licence_status]" :
            {
             required:true,
             },
		"data[as_connections_meta][pre_licenced]" :
            {
             required:true,
             },
		"data[as_connections_meta][supervisor_name]" :
            {
             required:true,
             },
		"data[as_connections_meta][mem_no]" :
            {
             required:true,
             },
		"data[as_connections_meta][malpractice_carrer]" :
            {
             required:true,
             },
		"data[as_connections_meta][malpractice_insurance]" :
            {
             required:true,
             },
		
			 		
			  
	},
	ignore: ':hidden:not(".multiselect-value")',
	errorElement: 'span',
        errorPlacement: function (error, element) {
			if (element.is('select')) {
			$(element).parent('div').addClass('error-select');
			}
            error.insertAfter($(element).parents('.user_display_form_vals'));
        }
	});
	
 $(document).ready(function(){
	//$('.multiselect-ui').fSelect();
 $('#malpractice_carrer').hide();
 if($('#malpractice_insurance').val()=='Yes'){
 $('#malpractice_carrer').show();	 
 }
 if($('#malpractice_insurance').val()=='No'){
 $('#malpractice_carrer').hide();	 
 }		 
 
 $('#malpractice_insurance').change(function() {
 if($('#malpractice_insurance').val()=='Yes'){
 $('#malpractice_carrer').show();	 
 }
 if($('#malpractice_insurance').val()=='No'){
 $('#malpractice_carrer').hide();	 
 }		 
});

$('.multiselect-value').fSelect();
	
var i='<?php echo $i;?>';	 
			$(".append-btn").click(function(){
			 i++;
			 $("#totalCredentials").val(i);
			  $str = '<div class="credential">'
			        
				        +    '<div class="user_display_form user_display_form_vals">'
				        +      '<label class="required">Licensing Authority  or Accrediting Institution, Membership, Organization</label>'
				        +      '<input type="text" class="required" required="" name="data[credentialing][cred_val'+i.toString()+']" placeholder="" required="required">'                 
						+	'</div>'
						+    '<div class="user_display_form">'
				        +      '<label class="required">&nbsp;</label>'
				        +        '<input onClick = "remove_li(this);" type="button" class="btn btn-grey" value="Remove">'
				        +      '</div>';
			  $("#add-credent").before($str);
			});
	  
	
	
	
//$('.multiselect-value').fSelect();

	
	$('#licensed_yes').hide();
	$('#licensed_no').hide();
	$('#show_yes').hide();
	$('#show_no').hide();
	if($( "#licensed" ).val()=='yes'){
	$('#licensed_yes').show();	
	
		}
	if($( "#licensed" ).val()=='no'){
	$('#licensed_no').show();
	$
		}
    
	$( "#licensed" ).change(function() {
	  $('#show_yes').hide();
	  $('#show_no').hide();
      if($('#licensed').val()=='yes'){
	  $('#licensed_yes').show();
	  }else{
	  $('#licensed_yes').hide();
	  }
	  if($('#licensed').val()=='no'){
	  $('#licensed_no').show();
	  if($( "#pre-licensed" ).val()=='yes'){
	$('#show_yes').show();	
		}
	if($( "#pre-licensed" ).val()=='no'){
	$('#show_no').show();	
		}
	  
	  
	  
	  }else{
	  $('#licensed_no').hide();
	  }
	  
	});
	
	
	if($( "#pre-licensed" ).val()=='yes' && $('#licensed').val()=='no'){
	$('#show_yes').show();	
		}
	if($( "#pre-licensed" ).val()=='no' && $('#licensed').val()=='no'){
	$('#show_no').show();	
		}
	
	$( "#pre-licensed" ).change(function() {
      if($('#pre-licensed').val()=='yes'){
	  $('#show_yes').show();
	  }else{
	  $('#show_yes').hide();
	  }
	  if($('#pre-licensed').val()=='no'){
	  $('#show_no').show();
	  }else{
	  $('#show_no').hide();
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
 
function remove_li($selfVar) {
	  	$($selfVar).parents('.credential').remove();
		
		//var totalCredentials=parseInt($("#totalCredentials").val())-1;
		//$("#totalCredentials").val(totalCredentials); 
	  //	i--;
	  	return true;
	  }	
	
	}

 

</script>
