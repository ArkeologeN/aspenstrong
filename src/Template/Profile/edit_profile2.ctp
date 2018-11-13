<?php $state_list = array('AL'=>"Alabama",  

'AK'=>"Alaska",  

'AZ'=>"Arizona",  

'AR'=>"Arkansas",  

'CA'=>"California",  

'CO'=>"Colorado",  

'CT'=>"Connecticut",  

'DE'=>"Delaware",  

'DC'=>"District Of Columbia",  

'FL'=>"Florida",  

'GA'=>"Georgia",  

'HI'=>"Hawaii",  

'ID'=>"Idaho",  

'IL'=>"Illinois",  

'IN'=>"Indiana",  

'IA'=>"Iowa",  

'KS'=>"Kansas",  

'KY'=>"Kentucky",  

'LA'=>"Louisiana",  

'ME'=>"Maine",  

'MD'=>"Maryland",  

'MA'=>"Massachusetts",  

'MI'=>"Michigan",  

'MN'=>"Minnesota",  

'MS'=>"Mississippi",  

'MO'=>"Missouri",  

'MT'=>"Montana",

'NE'=>"Nebraska",

'NV'=>"Nevada",

'NH'=>"New Hampshire",

'NJ'=>"New Jersey",

'NM'=>"New Mexico",

'NY'=>"New York",

'NC'=>"North Carolina",

'ND'=>"North Dakota",

'OH'=>"Ohio",  

'OK'=>"Oklahoma",  

'OR'=>"Oregon",  

'PA'=>"Pennsylvania",  

'RI'=>"Rhode Island",  

'SC'=>"South Carolina",  

'SD'=>"South Dakota",

'TN'=>"Tennessee",  

'TX'=>"Texas",  

'UT'=>"Utah",  

'VT'=>"Vermont",  

'VA'=>"Virginia",  

'WA'=>"Washington",  

'WV'=>"West Virginia",  

'WI'=>"Wisconsin",  

'WY'=>"Wyoming");?>
<?php 
function cmp($a, $b)
{
    if ($a["id"] == $b["id"]) {
        return 0;
    }
    return ($a["id"] < $b["id"]) ? -1 : 1;
}

?>
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
													<li><a href="<?php echo HOME_WEB;?>users/delete_account">Delete Account</a></li>
                                                    <li><a href="<?php echo HOME_WEB;?>users/deactivate_account/<?php echo $asConnection['id'];?>">Deactivate Account</a></li>
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
                                                <li class="active">
                                                    <a href="<?php echo HOME_WEB;?>profile/editProfile2/<?php echo base64_encode($asConnection['id']);?>"><i class="fa fa-user"></i> Address and Location</a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo HOME_WEB;?>profile/editProfile3/<?php echo base64_encode($asConnection['id']);?>"><i class="fa fa-wechat"></i>Website and Social Links</a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo HOME_WEB;?>profile/editProfile4/<?php echo base64_encode($asConnection['id']);?>"><i class="fa fa-question-circle"></i>Professional Details</a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo HOME_WEB;?>profile/editProfile5/<?php echo base64_encode($asConnection['id']);?>"><i class="fa fa-bookmark"></i>Specialities </a>
                                                </li>
                                       </ul>		       
                                </div> 
                               
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <?= $this->Flash->render(); ?>
                              	<form id="myform" method="post" action="">
                                  <div>
                                <!--mailing address-->
                                
                                <?php $i=1;if(!empty($asConnection['as_connections_addresses'])){
									usort($asConnection['as_connections_addresses'],"cmp");
									
									foreach($asConnection['as_connections_addresses'] as $address){  ?>
                                
                                    <span class="parents-all"><div class="login_head">
                                    	<i class="fa fa-map-marker" aria-hidden="true"></i>
                                    	<h2> <?php echo $address['type'];?> Address </h2>
                                        <?php if($address['type']=='Mailing' && $address['preferred']==1){?> 
                                        <h5>This address will not be displayed anywhere on your public profile</h5>
										<?php }?>
                                	</div>
                                    <?php if($address['type']=='Site' && $address['preferred']==1){?> 
                                   <!--<div class="checkbox_click" id="clone_mailAddress"> 
                                     	<input type="checkbox" class="" name="copy_address" id="copy_address" />
                                        <label> same as above address </label>  
                                    </div>-->
                                    <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12 filters_padding_left" style="float:right;">
                                                <input type="checkbox" id="copy_address_edit" class="regular-checkbox">
                                                  <label for="copy_address_edit"></label>
                                                  <label class="label_text"> Same as mailing address</label>
                            	      </div>
                                    <?php }?>
                                   <div> 
                                   <?php if($address['type']=='Mailing'){$options=array('Mailing');}else{
								         if($address['type']=='Site'){$options=array('Site');}else{
								         $options=array('Site','Mailing','Office','Other');}}
								   ?> 
                                          <div class="user_display_form">
                                                <label class="optional">Address Type</label> 
                                                 <?php if($i=='1'){
													 $valAdd='Mailing';
												 }elseif($i=='2'){
													 
													  $valAdd='Site';
												 }

												 if($address['type']=='Mailing'){
													 $vaClone='Mailing';
												 }elseif($address['type']=='Site'){
													 $vaClone='Site';
												 }elseif($address['type']=='Office'){
													 $vaClone='Office';
												 }elseif($address['type']=='Other'){
													 $vaClone='Other';
												 }else{
													 $vaClone='Other';
												 }
												 ?>
												   <input type="text" class="required valid" value="<?php echo $vaClone;?>" name="data[as_connections_addresses][type<?php echo $i;?>]"  required="required" id="adtype<?php echo $i;?>" readonly="true"> 
                                                  <?php if($i >=3){?>
                                                 <a href="javascript:void(0);" class="user_close" onClick="remove_li1(this,'<?php echo $i;?>');"> <i class="fa fa-times" aria-hidden="true"></i> </a>
                                                 <?php }?>
                                             </div>
                                               
                                           <!--<div class="user_display_form user_display_form_vals">
                                                <label class="optional">Business Name</label> 
                                                    <input type="text" class="required valid" value="<?php //echo $address['company'];?>" required="required" name="data[as_connections_addresses][company<?php //echo $i;?>]" id="company<?php //echo $i;?>"></div>-->
                                           <div class="user_display_form user_display_form_vals">
                                                <label class="required">Address </label> 
                                                 <textarea class="required" placeholder="Address here" name="data[as_connections_addresses][address<?php echo $i;?>]" id="address<?php echo $i;?>" onchange="getLatlong(<?php echo $i;?>)"  ><?php echo $address['address'];?></textarea></div>
                                           
                                           <div class="user_display_form user_display_form_vals">
                                                <label class="optional">City</label> 
                                                    <input type="text" class="required valid" name="data[as_connections_addresses][city<?php echo $i;?>]" id="city<?php echo $i;?>" required="required" value="<?php echo $address['city'];?>" onblur="getLatlong(<?php echo $i;?>);"></div>
                                           <div class="user_display_form user_display_form_vals">
                                                <label class="optional">State</label> 
                                                <select name="data[as_connections_addresses][state<?php echo $i;?>]" class="required state valid " id="state<?php echo $i;?>" onchange="getLatlong(<?php echo $i;?>)" class="state2">
                                                <?php foreach($state_list as $state){?>
                                                <option value="<?php echo $state;?>" <?php if($state==$address['state']){ echo "selected";}?> ><?php echo $state;?></option>
                                                <?php }?>
	                                            </select>
                                                    
                                               </div> 
                                           <div class="user_display_form user_display_form_vals">
                                                <label class="optional">Zip Code</label> 
                                                    <input type="text" class="required valid" required="required" name="data[as_connections_addresses][zipcode<?php echo $i;?>]" id="zipcode<?php echo $i;?>" value="<?php echo $address['zipcode'];?>"></div> 
                                           
                                           <div class="step_text">
                                               <!--<a href="http://www.latlong.net/convert-address-to-lat-long.html" target="_blank"> Get your Latitude and Longitude here.</a> --> <label class="optional">Latitude and Logitude will be taken automatically based on the information provided above.</label> 
                                           </div>
                                           <div class="user_display_form user_display_form_vals">
                                                <label class="optional">Map Latitude </label> 
                                                    <input type="text" class="required valid" name="data[as_connections_addresses][lat<?php echo $i;?>]" id="lat<?php echo $i;?>" value="<?php echo $address['latitude'];?>"></div>
                                           <div class="user_display_form user_display_form_vals">
                                                <label class="optional">Map Longitude </label> 
                                                    <input type="text" class="required valid" name="data[as_connections_addresses][long<?php echo $i;?>]" id="long<?php echo $i;?>" value="<?php echo $address['longitude'];?>">
                                                    <input type="hidden" value="<?php echo $address['preferred'];?>" name="data[as_connections_addresses][preferred<?php echo $i;?>]">
                                                    </div>                           
    
                                 </div> 
 <input type="hidden" value="<?php echo $address['id'];?>" name="data[as_connections_addresses][address_id<?php echo $i;?>]" /> 
                                </span>                               
                                <?php $i++;}}else{$i=200;$k=$i+1;  ?> 
                             
                                <div class="login_head">
                                    	<i class="fa fa-map-marker" aria-hidden="true"></i>
                                    	<h2> Mailing Address </h2>
                                    	<h5>This address will not be displayed anywhere on your public profile</h5>                                    	
                                	</div> 
                                   
                                   <div>  
                                          <div class="user_display_form user_display_form_vals">
                                                <label class="optional">Address Type</label> 
                                                   <!-- <select class="required valid" name="data[as_connections_addresses][type1]"> 
                                                     <option selected="selected" value="Mailing">Mailing</option> 
                                                    </select>-->
													 <input type="text" class="required valid" value="Mailing" name="data[as_connections_addresses][type1]"  required="required" id="adtype<?php echo $i;?>" readonly="true"> 
                                             </div>
                                               
                                           <!--<div class="user_display_form user_display_form_vals">
                                                <label class="optional">Business Name</label> 
                                                    <input type="text" class="required valid"  name="data[as_connections_addresses][company1]" id="company0" value="" required="required"></div>-->
                                           <div class="user_display_form user_display_form_vals">
                                                <label class="required">Address </label> 
                                                 <textarea class="required" name="data[as_connections_addresses][address1]" id="address<?php echo $i;?>" placeholder="Address here" onblur="getLatlong(<?php echo $i;?>);"></textarea></div>
                                           
                                           <div class="user_display_form user_display_form_vals">
                                                <label class="optional">City</label> 
                                                    <input type="text" class="required valid" value="" name="data[as_connections_addresses][city1]" id="city<?php echo $i;?>" required="required" onblur="getLatlong(<?php echo $i;?>);"></div>
                                           <div class="user_display_form user_display_form_vals">
                                                <label class="optional">State</label> 
                                                    <select name="data[as_connections_addresses][state1]" id="state<?php echo $i;?>" class="required state valid" onblur="getLatlong(<?php echo $i;?>);" class="state2">
                                                <?php foreach($state_list as $state){?>
                                                <option value="<?php echo $state;?>" ><?php echo $state;?></option>
                                                <?php }?>
	                                            </select>   
                                                        
                                                  
                                               </div> 
                                           <div class="user_display_form user_display_form_vals">
                                                <label class="optional">Zip Code</label> 
                                                    <input type="text" class="required valid" value="" id="zipcode<?php echo $i;?>" name="data[as_connections_addresses][zipcode1]" required="required"></div> 
                                           <div class="step_text">
                                              <!--<a href="http://www.latlong.net/convert-address-to-lat-long.html" target="_blank"> Get your Latitude and Longitude here.</a> --> <label class="optional">Latitude and Logitude will be taken automatically based on the information provided above.</label> 
                                           </div>
                                            <div class="user_display_form user_display_form_vals">
                                                <label class="optional">Map Latitude </label> 
                                                    <input type="text" class="required valid" name="data[as_connections_addresses][lat1]" id="lat<?php echo $i;?>" value=""></div>
                                           <div class="user_display_form user_display_form_vals">
                                                <label class="optional">Map Longitude </label> 
                                                    <input type="text" class="required valid" name="data[as_connections_addresses][long1]" id="long<?php echo $i;?>" value=""></div>                                                    <input type="hidden" value="1" name="data[as_connections_addresses][preferred1]">
    
                                 </div> 
                                 
                                 <div class="login_head">
                                    	<i class="fa fa-map-marker" aria-hidden="true"></i>
                                    	<h2> Site Address </h2>
                                	</div>
                                    
                                     <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12 filters_padding_left" style="float:right;">
                                                <input type="checkbox" id="copy_address" class="regular-checkbox">
                                                  <label for="copy_address"></label>
                                                  <label class="label_text"> Same as mailing address </label>
                            	      </div>
                                 
                                 <div>  
                                          <div class="user_display_form user_display_form_vals">
                                                <label class="optional">Address Typess</label> 
                                                   <!-- <select class="required valid" name="data[as_connections_addresses][type2]"> 
                                                     <option selected="selected" value="Site">Site</option> 
                                                    </select>-->
											 <input type="text" class="required valid" value="Site" name="data[as_connections_addresses][type2]" required="required" id="adtype<?php echo $k;?>"  readonly="true">		
                                             </div>
                                               
                                           <!--<div class="user_display_form user_display_form_vals">
                                                <label class="optional">Business Name</label> 
                                                    <input type="text" class="required valid"  name="data[as_connections_addresses][company2]" id="company1" value="" required="required"></div>-->
                                           <div class="user_display_form user_display_form_vals">
                                                <label class="required">Address </label> 
                                                 <textarea class="required" name="data[as_connections_addresses][address2]" id="address<?php echo $k;?>" placeholder="Address here"  required="required" onblur="getLatlong(<?php echo $k;?>);"></textarea></div>
                                           
                                           <div class="user_display_form user_display_form_vals">
                                                <label class="optional">City</label> 
                                                    <input type="text" class="required valid" value="" name="data[as_connections_addresses][city2]" id="city<?php echo $k;?>" required="required" onblur="getLatlong(<?php echo $k;?>);"></div>
                                           <div class="user_display_form user_display_form_vals">
                                                <label class="optional">State</label> 
                                                    <select name="data[as_connections_addresses][state2]" class="required state valid" id="state<?php echo $k;?>" onchange="getLatlong(<?php echo $k;?>)" class="state2">
                                                <?php foreach($state_list as $state){?>
                                                <option value="<?php echo $state;?>" ><?php echo $state;?></option>
                                                <?php }?>
	                                            </select>   
                                                        
                                                  
                                               </div> 
                                           <div class="user_display_form user_display_form_vals">
                                                <label class="optional">Zip Code</label> 
                                                    <input type="text" class="required valid" value="" name="data[as_connections_addresses][zipcode2]" id="zipcode<?php echo $k;?>" required="required"></div> 
                                            <div class="step_text">
                                              <!--<a href="http://www.latlong.net/convert-address-to-lat-long.html" target="_blank"> Get your Latitude and Longitude here.</a> --> <label class="optional">Latitude and Logitude will be taken automatically based on the information provided above.</label> 
                                           </div>
                                            <div class="user_display_form user_display_form_vals">
                                                <label class="optional">Map Latitude </label> 
                                                    <input type="text" class="required valid" name="data[as_connections_addresses][lat2]" id="lat<?php echo $k;?>" value=""></div>
                                           <div class="user_display_form user_display_form_vals">
                                                <label class="optional">Map Longitude </label> 
                                                    <input type="text" class="required valid" name="data[as_connections_addresses][long2]" id="long<?php echo $k;?>" value=""></div>                                                    <input type="hidden" value="1" name="data[as_connections_addresses][preferred2]">        
    
                                 </div>
                                
                                
                                
                                
                                 
                                <?php }$i++;?>
                                <div class="add_more_btn" id="add-mraddrs">
                                <a href="javascript:void(0);" class="append-btn"> Add Another Address <i class="fa fa-plus" aria-hidden="true"></i> </a>
                                </div>                            
                                 <!-- phone  --> 
                                      <div class="login_head">
                                    	<i class="fa fa-phone" aria-hidden="true"></i>
                                    	<h2> Phone </h2>
                                	</div>
                                    <?php $j=1;if(!empty($asConnection['as_connections_phones'])){usort($asConnection['as_connections_phones'],"cmp");foreach($asConnection['as_connections_phones'] as $phone){?>
                                   </br></br> <div class="phone_details credential"> 
                                    	 
                                        <!--<ul class="cs-form-element half-input">

                                            
                                            <li>
                                                <label>Visibility</label>
                                                <ul class="radio-box">
                                                    <li>
                                                        <input id="show_form" value="public" name="data[as_connections_phones][visibility<?php //echo $j;?>]" <?php //if($phone['visibility']=='public'){echo "checked";}?> type="radio">
                                                        <label for="show_form">Public</label>
                                                    </li>
                                                    <li>
                                                        <input id="hide_form" value="private" name="data[as_connections_phones][visibility<?php //echo $j;?>]" <?php //if($phone['visibility']=='private'){echo "checked";}?> type="radio">
                                                        <label for="hide_form">Private</label>
                                                    </li>
                                                </ul>
                     
                                            </li>
                    
                                        </ul>--> 
                                        
                                        <ul class="cs-form-element half-input">
                                            
                                            <li>
                                                 <ul class="radio-box">
                                                    <li>
                                                        <input id="show_form<?php echo $j;?>" value="1" name="data[as_connections_phones][preferred<?php echo $j;?>]" <?php if($phone['preferred']=='1' || count($asConnection['as_connections_phones'])==1){echo "checked";}?> type="radio" onclick="myfunction(this.id)" class="tooglee" >
                                                        <label for="show_form<?php echo $j;?>">Preferred</label>
                                                    </li>
                                                    
                                                </ul>
                     
                                            </li>
                    
                                        </ul>   
                    
                                            <div class="user_display_form user_display_form_vals">
                                                <label class="required">Phone Type</label> 
                                                <select class="required" name="data[as_connections_phones][type<?php echo $j;?>]" required="required">
                                                <option value="">Select Phone</option>
                                                <option value="Office Phone" <?php if($phone['type']=='Office Phone'){echo "selected";}?>>Office Phone</option>
                                                <option value="Cell Phone" <?php if($phone['type']=='Cell Phone'){echo "selected";}?>>Cell Phone</option>
                                                <option value="Site Fax" <?php if($phone['type']=='Site Fax'){echo "selected";}?>>Site Fax</option>
                                                <option value="Crisis Line" <?php if($phone['type']=='Crisis Line'){echo "selected";}?>>Crisis Line</option>
                                                <!--<option value="Mailing Phone" <?php //if($phone['type']=='Mailing Phone'){echo "selected";}?>>Mailing Phone</option>-->
                                                <!--<option value="Site Phone" <?php //if($phone['type']=='Site Phone'){echo "selected";}?>>Site Phone</option>-->
                                                
                                                </select>
                                            </div>
                                           
                                           <div class="user_display_form user_display_form_vals">
                                                <label class="optional">Phone Number</label> 
                                                    <input type="number" class="required valid" name="data[as_connections_phones][number<?php echo $j;?>]" value="<?php echo $phone['number'];?>" required="required">
                                                     <?php if($j != 1){?>
                                                 <a href="javascript:void(0);" class="user_close" onClick="remove_li2(this);"> <i class="fa fa-times" aria-hidden="true"></i> </a>
                                                 <?php }?>
                                                    </div>
                                           
                                    
                                  </div>
<input type="hidden" value="<?php echo $phone['id'];?>" name="data[as_connections_phones][phone_id<?php echo $j;?>]" />                                   
                                   <?php $j++;}}else{?>
                                   </br></br><div class="phone_details"> 
                                    	 
                                         <ul class="cs-form-element half-input">
                                            
                                            <li>
                                                 <ul class="radio-box">
                                                    <li>
                                                        <input id="show_form<?php echo $j;?>" value="1" name="data[as_connections_phones][preferred<?php echo $j;?>]" type="radio" onclick="myfunction(this.id)" class="tooglee" checked="checked" >
                                                        <label for="show_form<?php echo $j;?>">Preferred</label>
                                                    </li>
                                                    
                                                </ul>
                     
                                            </li>
                    
                                        </ul>  
                    
                                            <div class="user_display_form user_display_form_vals">
                                                <label class="required">Phone Type</label> 
                                                <select class="required" name="data[as_connections_phones][type<?php echo $j;?>]" required="required">
                                                <option value="">Select Phone</option>
                                                <option value="Office Phone">Office Phone</option>
                                                <option value="Cell Phone">Cell Phone</option>
                                                <option value="Site Fax">Site Fax</option>
                                                <option value="Crisis Line">Crisis Line</option>
                                                </select>
                                            </div>
                                           
                                           <div class="user_display_form user_display_form_vals">
                                                <label class="optional">Phone Number</label> 
                                                    <input type="number" class="required valid" name="data[as_connections_phones][number<?php echo $j;?>]" value="" required="required"></div>
                                    
                                        
                                   </div>
                                   <?php }?>
                                   <div class="add_more_btn" id="pre-li">
                                        <a href="javascript:void(0);" id="ad-phn-btn"> Add Phone Number <i class="fa fa-plus" aria-hidden="true"></i> </a>
                                      </div> 
                                    <!--Email Address -->  
                                       <div class="login_head">
                                    	<i class="fa fa-envelope-o" aria-hidden="true"></i>
                                    	<h2> Email Address </h2>
<h5>Your email will not be visible anywhere on your public profile; it will be accessed for use of the Contact Form located at the bottom of your public profile.</h5>
                                	</div>
                                  <?php $k=1;if(!empty($asConnection['as_connections_emails'])){foreach($asConnection['as_connections_emails'] as $email){?> 
                                   </br></br>
                                   <div class="phone_details credential"> 
                                    
                                             <!--<ul class="cs-form-element half-input">
                                            
                                            <li>
                                                <label>Visibility</label>
                                                <ul class="radio-box">
                                                    <li>
                                                        <input id="show_form0<?php //echo $k;?>" name="data[as_connections_emails][visibility<?php //echo $k;?>]" value="public" type="radio" <?php //if($email['visibility']=='public'){echo "checked";}?>>
                                                        <label for="show_form0<?php //echo $k;?>">Public</label>
                                                    </li>
                                                    <li>
                                                        <input id="hide_form0<?php //echo $k;?>" name="data[as_connections_emails][visibility<?php //echo $k;?>]" value="private" type="radio" <?php //if($email['visibility']=='private'){echo "checked";}?>>
                                                        <label for="hide_form0<?php //echo $k;?>">Private</label>
                                                    </li>
                                                </ul>
                     
                                            </li>
                    
                                        </ul>-->
                                          
                                            <div class="user_display_form user_display_form_vals">
                                                <label class="optional">Email Address</label> 
                                                <input type="email" class="required valid" name="data[as_connections_emails][address<?php echo $k;?>]" value="<?php echo $email['address'];?>" required="required">
                                            <?php if($k != 1){?>
                                                 <a href="javascript:void(0);" class="user_close" onClick="remove_li3(this);"> <i class="fa fa-times" aria-hidden="true"></i> </a>
                                                 <?php }?>
                                            </div>
                                              
                                         
                                      
                                   </div> 
                                  <input type="hidden" value="<?php echo $email['id'];?>" name="data[as_connections_emails][email_id<?php echo $k;?>]" />
								  <?php $k++;}}else{?>
                                  </br></br><div class="phone_details"> 
                                    
                                             <!--<ul class="cs-form-element half-input">
                                            
                                            <li>
                                                <label>Visibility</label>
                                                <ul class="radio-box">
                                                    <li>
                                                        <input id="show_form1<?php //echo $k;?>" name="data[as_connections_emails][visibility<?php //echo $k;?>]" value="public" type="radio" checked="checked" >
                                                        <label for="show_form1<?php //echo $k;?>">Public</label>
                                                    </li>
                                                    <li>
                                                        <input id="hide_form1<?php //echo $k;?>" name="data[as_connections_emails][visibility<?php //echo $k;?>]" value="private" type="radio" >
                                                        <label for="hide_form1<?php //echo $k;?>">Private</label>
                                                    </li>
                                                </ul>
                     
                                            </li>
                    
                                        </ul>
                                          -->
                                            <div class="user_display_form user_display_form_vals">
                                                <label class="optional">Email Address</label> 
                                                <input type="email" class="required valid" name="data[as_connections_emails][address<?php echo $k;?>]" value="" required="required">
                                            </div>
                                              
                                        
                                      
                                   </div>
                                  <?php }?>
                                 <!-- <div class="add_more_btn" id="pre-email">
                                        <a href="javascript:void(0);" id="ad-email-btn"> Add Email Address <i class="fa fa-plus" aria-hidden="true"></i> </a>
                                      </div>
                                   </div>--> 
                                   
                                  
                                  <div class="green_save">
                                  <?php 
								  
								  if(count($asConnection['as_connections_addresses'])==0 || !isset($asConnection['as_connections_addresses'])){
									$totalAds=2;  
								  }else{
									$totalAds=count($asConnection['as_connections_addresses']);    
								  }
								  
								  if(count($asConnection['as_connections_emails'])==0){
									$totalEmails=1;  
								  }else{
									$totalEmails=count($asConnection['as_connections_emails']);    
								  }
								  
								  if(count($asConnection['as_connections_phones'])==0 || !isset($asConnection['as_connections_phones'])){
									$totalPhones=1;  
								  }else{
									$totalPhones=count($asConnection['as_connections_phones']);    
								  }
								  //echo $totalEmails;
								  //echo $totalPhones;
								  ?>
                                  <input type="hidden" value="<?php echo $totalAds;?>" name="data[totalAds]" id="totalAds" />
                                  <input type="hidden" value="<?php echo $totalEmails;?>" name="data[totalEmails]" id="totalEmails" />
                                  <input type="hidden" value="<?php echo $totalPhones;?>" name="data[totalPhones]" id="totalPhones" />
                                  <input type="hidden" value="<?php echo count($asConnection['id']);?>" name="data[id]" />
                                       <ul>
                                           <li>
                                             <button type="submit" value="Submit" class="save_btn">Save</button>
                                             <!--<a href="#" class="save_btn">Save</a>-->
                                           </li>
                                           <li>
                                            <a href="<?php echo HOME_WEB;?>profile/editProfile3/<?php echo base64_encode($asConnection['id']);?>" class="next_btn">Skip</a>
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
 <link href="<?php echo HTTP;?>css/front/fSelect_steps.css" rel="stylesheet">

<script src="<?php echo HTTP;?>js/front/fSelect_steps.js"></script> 
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAn8MyXKfr-KMBInEgmJfESScGLhk2kY-E"></script>  
<script type="text/javascript">
	  
      function myfunction(id){
		var valIDs='#'+id;
		$( ".tooglee" ).each(function() {
		$( this ).attr('checked', false);
        });
		$(valIDs).prop("checked", true);
		
		
        //});
		}
	  //var j='<?php //$i;?>';
      function remove_li1($selfVar,j) {
	  	$($selfVar).parents('.parents-all').remove();	
	  	//var totalAds=parseInt($("#totalAds").val())-1;
		
		//$("#totalAds").val(totalAds);  
		//alert(j);	
		//j=j-1;
	  	return true;
	  }
	  function remove_li2($selfVar) {
	  	$($selfVar).parents('.credential').remove();
	  	//var totalPhones=parseInt($("#totalPhones").val())-1;
		//$("#totalPhones").val(totalPhones); 
	  	return true;
	  } 
	  function remove_li3($selfVar) {
	  	$($selfVar).parents('.credential').remove();
	  	var totalEmails=parseInt($("#totalEmails").val())-1;
		$("#totalEmails").val(totalEmails); 
	  	return true;
	  } 
	  $(function(){
		  var c = 100;
		//var j='<?php echo $i+1;?>';
var j=c;	 		
			$(".append-btn").click(function(){
			j++;
			$("#totalAds").val(j); //alert(j);
			
			  $str = '<span class = "parents-all"><ul class="form-list adrsmore">'
			    +  '<div class="login_head">'
                +  '<i class="fa fa-map-marker" aria-hidden="true"></i>'
                +  '<h2> Another  Address </h2>'
                +  '</div><div>'
		        +  '<div class="user_display_form user_display_form_vals">'
	            +    '<label class="required">Address Type</label>'
	            +    '<select class="required multiselect-ui" name="data[as_connections_addresses][type'+j.toString()+']" id="type'+j+'">'
	            +      	'<option value="">Select Address Type</option>'
	            +          '<?php $options=array('Site','Mailing','Office','Other');foreach($options as $st){?>'
	            +     	'<option value='+"<?php echo $st; ?>"+'>'+"<?php echo $st; ?>"+'</option>'
	            +        ' <?php } ?>'
	            +      '</select>'
	            +    '</div>'
		        +  '<div class="user_display_form user_display_form_vals">'
	            +    '<label class="required">Address</label>'
	            +      '<textarea class="required address" name="data[as_connections_addresses][address'+j.toString()+']" id="address'+j+'" onblur="getLatlong('+j+');"></textarea>'
	            +    '</div>'
				+	'<div class="user_display_form user_display_form_vals">'
	            +    '<label class="required">City</label>'
	            +      '<input type="text" class="required" name="data[as_connections_addresses][city'+j.toString()+']" id="city'+j+'" onblur="getLatlong('+j+');">'
	            +    '</div>'
		        +  '<div class="user_display_form user_display_form_vals">'
	            +    '<label class="required">State</label>'
	            +      '<select class="required state multiselect-ui" name="data[as_connections_addresses][state'+j.toString()+']" id="state'+j+'" onchange="getLatlong('+j+');">'
	            +      	'<option value="">Select State</option>'
	            +          '<?php foreach($state_list as $st){?>'
	            +     	'<option value="'+"<?php echo $st;?>"+'">'+"<?php echo $st;?>"+'</option>'
	            +        ' <?php } ?>'
	            +      '</select>'
	            +    '</div>'
		        +  '<div class="user_display_form user_display_form_vals">'
	            +    '<label class="required" for="pass">Zip Code</label>'
	            +      '<input type="text" class="required zip" maxlength="6" name="data[as_connections_addresses][zipcode'+j.toString()+']">'	                  
	            +    '</div>'
				+   '<div class="step_text">'
                +        ' <!--<a href="http://www.latlong.net/convert-address-to-lat-long.html" target="_blank"> Get your Latitude and Longitude here.</a> --> <label class="optional">Latitude and Logitude will be taken automatically based on the information provided above.</label> ' 
                +     '</div>'
		        +  '<div class="user_display_form user_display_form_vals">'
	            +    '<label class="required" for="pass">Map Latitude</label>'
	            +      '<input type="text" class="lat required" name="data[as_connections_addresses][lat'+j.toString()+']" placeholder="Latitude" id="lat'+j+'">'
	            +    '</div>'
				+  '<div class="user_display_form user_display_form_vals">'
	            +    '<label class="required" for="pass">Map Longitude</label>'
	            +      '<input type="text" class="long required" placeholder="Longitude" name="data[as_connections_addresses][long'+j.toString()+']" id="long'+j+'">'
	            +    '</div>'
            	+ '<div class="user_display_form">'
				+	 '<label class="required">&nbsp;</label>'
				+      '<button onClick = "remove_li1(this);" class="btn btn-grey close-btn-append" type="button"><?php echo __("Remove Address")?><i class="fa fa-close"></i></button>'
	            //+ 	'<input onClick = "remove_li1(this);" type="button" class="btn btn-grey close-btn-append" value="Remove address">'
							+ '</div><input type="hidden" value="" name="data[as_connections_addresses][address_id'+j.toString()+']" /></div></span>';
			  $("#add-mraddrs").before($str); 
			  
			});});
        
        $(function(){
			$(".message.success").append('<a href="<?php echo HOME_WEB;?>profile/editProfile3/<?php echo base64_encode($asConnection['id']);?>" class="next_btn_top">Next</a>');
			
			
			var i='<?php echo $j;?>';	
			
			var k='<?php echo $k;?>';	
			
			
			$("#ad-phn-btn").click(function(){
			
			//alert(i);
			
			i++;
			$("#totalPhones").val(i);
			  $str = '</br></br><div class="phone-all credential">'
		  +  '<div class="phone_details"><ul class="cs-form-element half-input"><li>'
          +     '<ul class="radio-box"><li>'
					+		'<input id="show_form'+i.toString()+'" class="tooglee" value="1" onclick="myfunction(this.id)" name="data[as_connections_phones][preferred'+i.toString()+']" type="radio">'
					+		'<label for="show_form'+i.toString()+'">Preferred</label></li>'
		  +      '</ul>'
		  +      '</li>'
		  +      '</ul>'
          +    '</div>'
		  +    '<div class="user_display_form user_display_form_vals">'		  	
          +    '<label class="required"><?php echo __("Phone Type")?></label>'
          +      '<select class="required" name="data[as_connections_phones][type'+i.toString()+']" required="required">'
          +      	'<option value=""><?php echo __("Select Phone")?></option>'
		  +      	'<option value="Office Phone"><?php echo __("Office Phone")?></option>'
		  +      	'<option value="Cell Phone"><?php echo __("Cell Phone")?></option>'
          +      	'<option value="Site Fax"><?php echo __("Site Fax")?></option>'
          +      	'<option value="Crisis Line"><?php echo __("Crisis Line")?></option>'
          +      '</select>'
          +    '</div>'
          +    '<div class="user_display_form user_display_form_vals">'
		      +'<label class="required"><?php echo __("Phone Number")?></label>'
		      +          '<input type="number" class="required phn"  maxlength=12 name="data[as_connections_phones][number'+i.toString()+']">'
			  +          '<input type="hidden" name="data[as_connections_phones][count]" value="'+i+'">'
		      + '</div>'
              +	 '<div class="user_display_form">'
		      +	 '<label class="required">&nbsp;</label>'
		      +          '<button onClick = "remove_li2(this);" class="btn btn-grey close-btn-append" type="button"><?php echo __("Remove Phone")?><i class="fa fa-close"></i></button>'
			    +'</div></div>';
			  $("#pre-li").before($str);
			  $('.phn').mask('000-000-0000');
			  //i++;
			});

			$("#ad-email-btn").click(function(){
			
			$("#totalEmails").val(k);
			  $str = '</br></br><div class="email-all credential">'			  	
          +  '<div class="phone_details"><ul class="cs-form-element half-input"><li>'
          +    '<label class="required"><?php echo __("Visibility")?></label>'
          +     '<ul class="radio-box"><li>'
					+		  '<input id="show_form1'+k.toString()+'" value="public" name="data[as_connections_emails][visibility'+k.toString()+']" checked="checked" type="radio">'
					+		'<label for="show_form1'+k.toString()+'">Public</label></li>'
					+		'<li>'
					+		  '<input id="hide_form1'+k.toString()+'" value="private" name="data[as_connections_emails][visibility'+k.toString()+']" type="radio">'
					+		'<label for="hide_form1'+k.toString()+'">Private</label></li>' 
		  +      '</ul>'
		  +      '</li>'
		  +      '</ul>'
          +    '</div>'
          +    '<div class="user_display_form user_display_form_vals">'
		      +'<label class="required"><?php echo __("Email Address")?></label>'
		      +          '<input type="email" class="required" name="data[as_connections_emails][address'+k.toString()+']">'
			  +          '<input type="hidden" name="data[as_connections_emails][count_email]" value="'+k+'">'
		      +  '</div>'
			  +	 '<div class="user_display_form"><label class="required">&nbsp;</label>'
		      +          '<button onClick = "remove_li3(this);" class="btn btn-grey close-btn-append" type="button"><?php echo __("Remove Email")?><i class="fa fa-close"></i></button>'
			    +'</div></div>';
			  $("#pre-email").before($str);
			  k++;
			});
			
		
		
				
	  }); 
 

$(document).ready(function(){
	    var oldvaladd1=$('#adtype2').val();
		var oldvaladd2=$('#address2').val();
		var oldvaladd3=$('#city2').val();
		var oldvala_select=$('#state2').val();
		var oldvaladd5=$('#zipcode2').val();
		var oldvaladd6=$('#lat2').val();
		var oldvaladd7=$('#long2').val();
	   $('.multiselect-ui').fSelect();
		 $('#copy_address_edit').change(function() {
      if($(this).is(":checked")) { 
		var val_state=$('#state1').val(); 
		$('#address2').val($('#address1').val());
		$('#city2').val($('#city1').val());
		$('#zipcode2').val($('#zipcode1').val());
		$('#lat2').val($('#lat1').val());
		$('#long2').val($('#long1').val());
		$('#state2 option')
			.removeAttr('selected')
			.filter("[value='"+ val_state + "']")
			.attr('selected', true)
			.prop('selected', true);
		
			}else{  

			$('#address2').val(oldvaladd2);
			$('#city2').val(oldvaladd3);
			$('#zipcode2').val(oldvaladd5);
			$('#lat2').val(oldvaladd6);
			$('#long2').val(oldvaladd7);		
			$('#state2 option')
				.removeAttr('selected')
				.filter("[value='"+ oldvala_select + "']")
				.attr('selected', true)
				.prop('selected', true);	
		}			
		
		});
		
	
		//var oldval1=$('#adtype1').val();
		var oldval_edit1=$('#address201').val();
		var oldval_edit2=$('#city201').val();
		var oldval_edit3=$('#state201').val();
		var oldval_edit4=$('#zipcode201').val();
		var oldval_edit5=$('#lat201').val();
		var oldval_edit6=$('#long201').val() 
 $('#copy_address').change(function() {
			
      if($(this).is(":checked")) {
			var val_state_add=$('#state200').val();
			$('#address201').val($('#address200').val());
			$('#city201').val($('#city200').val());
			$('#state201 option')
				.removeAttr('selected')
				.filter("[value='"+ val_state_add + "']")
				.attr('selected', true)
				.prop('selected', true);
			$('#zipcode201').val($('#zipcode200').val());
			$('#lat201').val($('#lat200').val());
			$('#long201').val($('#long200').val());
		
			}else{
		
			$('#address201').val(oldval_edit1);
			$('#city201').val(oldval_edit2);
			$('#state201 option')
				.removeAttr('selected')
				.filter("[value='"+ oldval_edit3 + "']")
				.attr('selected', true)
				.prop('selected', true);
			$('#zipcode201').val(oldval_edit4);
			$('#lat201').val(oldval_edit5);
			$('#long201').val(oldval_edit6);		
				
		}
			});

//$("#myform").validate({errorElement: 'span'});
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
function getLatlong(i){
//alert(i);	
var addressID="#address"+i;
var cityID="#city"+i;
var stateID="#state"+i;

var address = $(addressID).val()+','+$(cityID).val()+','+'United States';
//alert($(addressID).val());
getLatitudeLongitude( address,i)

	}
	
function showResult(result) {
	
    latnew = result.geometry.location.lat();
    longnew = result.geometry.location.lng();
	alert(latnew+'||'+longnew);
	//return latnew+'||'+longnew;
}

function getLatitudeLongitude(address,i) {
    // If adress is not supplied, use default value 'Ferrol, Galicia, Spain'
	var latID='#lat'+i;
    var longID='#long'+i;
    var address =  address.toString()||'Ferrol,Galicia,Spain';
	//alert(address);
    // Initialize the Geocoder
    var geocoder = new google.maps.Geocoder();
    //if (geocoder) {
        geocoder.geocode({
            'address': address
        }, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                //callback(results[0]);
				//alert(results[0].geometry.location.lat());
				//alert(results[0].geometry.location.lng());
				$(latID).val(results[0].geometry.location.lat());
				$(longID).val(results[0].geometry.location.lng());
            }
        });
   // }
}
 
</script>
