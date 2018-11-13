<?php //print_r($asConnection['as_connections_addresses'][1]);die;?>
<script src="<?php echo HTTP; ?>js/front/tooltip.js"></script>
  <!--content section-->
<?php 
function cmp($a, $b)
{
    if ($a["id"] == $b["id"]) {
        return 0;
    }
    return ($a["id"] < $b["id"]) ? -1 : 1;
}

?>
<?php if($asConnection['status'] == "unapproved"){?>
<p style="text-align: center; padding: 1%;color: red;">This Account is not approved or deactivate.</p>
<?php }?>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gutter" style="background:#f8f9fb;padding-top:5%;">
         <div class="profile_bg">
             
            <div class="grey_bg">
            	<div class="bg_overlay">
            		<div class=" container"> 
                    
                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        
                               <?php if($asConnection['logo'] != ""){
										   $logoUrl=$asConnection['logo'];
										}else{
											$logoUrl='logo.gif';
					 						}
									 if($asConnection['entry_type']=='organization'){
									 $name=	$asConnection['organization']; 
										 }else{
											 if(isset($asConnection['use_credentials']) && $asConnection['use_credentials']==1){
											 $name=	$asConnection['first_name'].' '.$asConnection['middle_name'].' '.$asConnection['last_name'].' '.str_replace(',',', ',$asConnection['title']);	 
											 }else{
											 $name=	$asConnection['organization'];	 
											 }
									 	 
											 }
											
											?>
                              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 img_profile"  style=" background:url(<?php echo HTTP;?>img/logodirectry/<?php echo $logoUrl;?>) center center / cover no-repeat;">
                                 </div>
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 text_name">
                                   <h1><?php echo $name;?></h1>
                                  <?php //$final_add="";foreach($asConnection['as_connections_addresses'] as $address){
								   //$final_add=$address['address'];
								   //if($address['preferred']==1 && $address['type']=='Site'){?>
                                   <!--<p> <?php //echo $address['address'].' , '.$address['city'].' , '.$address['zipcode'];?> </p>-->
                                   <?php //}}?>
                                   <?php foreach($asConnection['as_connections_phones'] as $phone){
								   if($phone['preferred']==1 || count($asConnection['as_connections_phones'])==1){?>
                                   <p> <i class="fa fa-phone" aria-hidden="true"></i> <?php echo $phone['number'];?> </p>
                                   <?php }}?>
                                   <?php if(isset($asConnection['as_connections_links']) && !empty($asConnection['as_connections_links'])){foreach($asConnection['as_connections_links'] as $link){
								         if($link['visibility']=='public'){
										 //print_r($link);die;
								   ?>
                                   
								  <?php }
								  }}?>
                                  
                                  <div style="padding: 8px 0; text-align:left;">
                            <?php if($asConnection['health_fund_status'] == 1){ ?>
                        	<img src="<?php echo HTTP;?>images/front/image/mhf.jpg" style="margin:0 10px;" data-toggle="tooltip" data-placement="top" id = "tip_id" title="<?php echo __('Please see resources for more information on the mental health fund')?>"/> 
                            <?php }?>
                            <?php if($asConnection['program_status'] == 1){ ?>
                            <img src="<?php echo HTTP;?>images/front/image/traid.png" style="margin:0 10px;" data-toggle="tooltip" data-placement="top" id = "tip_id" title="<?php echo __('Please see resources for more information on EAP')?>"/>
                            <?php }?>
                         </div>
                                  
                               </div>
                               
                            </div>
                     
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"> 
                    	<div class="profile_display2">
                         <p class="headingP"><b>Site Address</b></p>
                         <?php $final_add="";foreach($asConnection['as_connections_addresses'] as $address){
								   $final_add=$address['address'];
								   if($address['preferred']==1 && $address['type']=='Site'){?>
                                   <p> <?php echo $address['address'].' , '.$address['city'].' , '.$address['zipcode'];?> </p>
                                   <?php }}?>
                         
                         <?php usort($asConnection['as_connections_addresses'],"cmp");$t=1;foreach($asConnection['as_connections_addresses'] as $address){
								   
								   if($address['preferred'] ==0){
									//echo $address['preferred'];echo $t;
								   if($t == 1){ 
								   //echo $address['preferred'];
								   echo '<p class="headingP"><b>Additional Addresses</b></p>';
								   }
								   ?>
                                   <p> <?php echo $address['type'].' - '.$address['address'].' , '.$address['city'].' , '.$address['zipcode'];?> </p>
                                   <?php $t++;}}?>
                         </div>
                         <div class="profile_display">
                            <?php //foreach($asConnection['as_connections_emails'] as $email){
								  //if($email['preferred']==1){?>  
                         	<a href="#profile_contact"> Email Provider</a>
                            <?php if(isset($asConnection['as_connections_links']) && !empty($asConnection['as_connections_links'])){foreach($asConnection['as_connections_links'] as $link){
								   //if($link['visibility']=='public'){
							?>
                            <a rel="Website" href="<?php echo $link['url'];?>" target="_blank">Visit Website </a> 
                            <?php }}?>
                             </div>
                            <?php //}}?>
                        
                    </div>
                 
                 </div> 
                 </div>
            </div> 
             
            <div class="container">
            	<div class="row">
               
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 space35">
                        	<div class="descrptn">
                               <h2> About </h2>
                                 <div class="adress_social_icon">
                                        <ul>  
										   <?php if(isset($asConnection['as_connections_socials']) && !empty($asConnection['as_connections_socials'])){foreach($asConnection['as_connections_socials'] as $social){?>
                                           <li> <a href="<?php echo $social['url'];?>" target="_blank"><i class="fa fa-<?php echo strtolower(str_replace('+','',$social['type']));?>" aria-hidden="true"></i> </a> </li>
                                           <?php }}?>
                                           
                                        </ul>
                                  </div>
                                  
                                  <div class="address_content">   
                               <p><?php echo $asConnection['as_connections_meta']['personal_statement'];?></p>
                                   <?php //if($asConnection['entry_type']=='individual'){?>
                                   <!--<ul>
                                       <?php //if($asConnection['as_connections_meta']['licence_status']==1){?>
                                       <li> <span> Licensed professional</span> : Available </li>
                               		   <?php //}else{ ?>
                                       <li> <span> Licensed professional</span> : Not Available </li>
                                       <?php //}?>
									   <li> <span> Accreditation </span> : Available </li>
                                   </ul>-->
                                   <?php //}?>
                                   
                                   <ul>
								      <?php if($asConnection['as_connections_meta']['bilingual'] == 'yes'){
								   $other_lang = explode('|',$asConnection['as_connections_meta']['other_lang']);  
								   $other_statement = explode('|',$asConnection['as_connections_meta']['other_statement']);  
								   foreach($other_lang as $key => $lang) {
								   ?>
										<li> <span> Business Statement(In <?php echo $lang; ?> )</span> : <?php if(isset($other_statement[$key])){ echo $other_statement[$key]; }?> </li>
								   
								   <?php  } } ?>
								   <?php if($asConnection['entry_type']=='organization'){?>
                                       <li> <span> Licensed professionals</span> : <?php if(isset($asConnection['as_connections_meta']['prof_org']) && $asConnection['as_connections_meta']['prof_org']=="Yes"){echo "Available";}else{echo "Not Available";}?> </li>
									   <li> <span> Accreditation </span> : <?php if(isset($asConnection['as_connections_meta']['accredatation'])){echo $asConnection['as_connections_meta']['accredatation'];}?> </li>
                                       <li><span> Accreditation Name </span> : <?php if(isset($asConnection['as_connections_meta']['accredatation']) && $asConnection['as_connections_meta']['accredatation']=="Yes"){echo $asConnection['as_connections_meta']['accredatation_name'];}?></li>
                                   </ul>
                                   <?php }?>
                              </div>     
                            </div>     
                        </div> 
                        
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 space35">
                                <div class="map_address">
                                <div id="map" style="width: 307; height: 340px;"></div>  
                                    <!--<img src="<?php //echo HTTP;?>images/front/image/dummy_map.png"/>-->
                                </div>
                        </div>
                        
                           
                    
                         
                    </div>
                   
             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 space35">
              	<div class="">
                           <?php if($asConnection['as_connections_meta']['issue'] !=""){if (strpos($asConnection['as_connections_meta']['issue'], '|') !== false) 
						   {$vals=explode('|',$asConnection['as_connections_meta']['issue']);}else{
							$vals=json_decode($asConnection['as_connections_meta']['issue']);   
						   }}else{
							$vals=array();   
							   }
						   //print_r($vals);?>
                           <?php if(!empty($vals)){?>
                           <div class="section_issues">
                                   <h3> Issues </h3>
                                     <ul>
                                     <?php foreach($issues as $issue){
										   if(in_array($issue['id'],$vals)){
										 ?>
                                       <li> <?php echo $issue['name'];?> </li> 
                                      <?php }}?> 
                                          
                                     </ul>
                                
                                  </div>
                           <?php }?>
						                 <?php  if($asConnection['as_connections_meta']['diagnosis'] !=""){
                  if (strpos($asConnection['as_connections_meta']['diagnosis'], '|') !== false) 
                   {  $diagnosis=explode('|',$asConnection['as_connections_meta']['diagnosis']);}else{
                      $diagnosis=json_decode($asConnection['as_connections_meta']['diagnosis']);   
                   }}else{
                  $diagnosis=array();   
                 }
                if(!empty($diagnosis)){?>
                           <div class="section_issues">
                                   <h3> Top 3 specialities </h3>
                                     <ul>
                                     <?php foreach($mentalhealths as $mentalhealth){
                       if(in_array($mentalhealth['id'],$diagnosis)){
                     ?>
                                       <li> <?php echo $mentalhealth['name'];?> </li> 
                                      <?php }}?> 
                                          
                                     </ul>
                                
                                  </div>
                           <?php }?>
                       
                  </div>          
              </div>  
              
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 space35">
            		<div class="">
                   <?php if($asConnection['entry_type']=='individual'){
					     $class='col-lg-4 col-md-4 col-sm-4 col-xs-12';
						 
						 if($asConnection['as_connections_meta']['therapist_type'] != ""){
						 foreach($therapiests as $therapiest){
						 if($therapiest['id']==$asConnection['as_connections_meta']['therapist_type']){
						 $newvals_therapist=$therapiest['name'];	
							}	   
						 }}else{
						 $newvals_therapist="Not Specified";	 
							 }
						 
					   ?>
                   <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                         <div class="layout_profile">
                        	 <h3> Qualifications </h3>
                             <ul>
                               <li> Years in Practice : <?php if($asConnection['as_connections_meta']['practice']!=""){echo $asConnection['as_connections_meta']['practice'];}else{echo 0;}?> Years </li> 
                               <li> School : <?php echo $asConnection['as_connections_meta']['school'];?>  </li>
                               <li> Year Graduated : <?php echo $asConnection['as_connections_meta']['school_year'];?> </li>  
                               <li> Provider type : <?php echo $newvals_therapist;?> </li> 
							    <?php 
                               	if (!empty($asConnection['connection_credentials'])) {
                               		$cc = 1;
                               		foreach ($asConnection['connection_credentials'] as $connection_credentials) {
                               			?>
                               				<li> Additional credential <?php echo $cc; ?> : <?php echo $connection_credentials->credentialing; ?> </li> 
                               			<?php
                               			$cc++;
                               		}
                               	}
                               ?>
                               <?php if($asConnection['as_connections_meta']['licence_status'] == 1){?>
                               <li> License No : <?php echo $asConnection['as_connections_meta']['licence'];?> </li>
                               <?php }?>
                               <?php if($asConnection['as_connections_meta']['pre_licenced'] == "yes" && $asConnection['as_connections_meta']['licence_status'] == 0){?>
                               <li> Pre-License No : <?php echo $asConnection['as_connections_meta']['prelic_no'];?> </li>
                               <?php }?>
                                <?php if($asConnection['as_connections_meta']['pre_licenced'] == "no" && $asConnection['as_connections_meta']['licence_status'] == 0){?>
                               <li> License Membership Number : <?php echo $asConnection['as_connections_meta']['mem_no'];?> </li>
                               <?php }?>
                           </ul>
                        </div>
                    </div>
                   <?php }else{
                   $class='col-lg-6 col-md-6 col-sm-6 col-xs-12';
                   }?> 
                    <div class="<?php echo $class;?>">
                     <?php if (strpos($asConnection['as_connections_meta']['insurance_provider'], '|') !== false) 
						   {$vals_IP=explode('|',$asConnection['as_connections_meta']['insurance_provider']);}else{
							//print_r(json_decode($asConnection['as_connections_meta']['insurance_provider'])) ;die;
							$vals_IP=json_decode($asConnection['as_connections_meta']['insurance_provider']); 
							if($vals_IP==""){
							$newUU=str_replace('[','',$asConnection['as_connections_meta']['insurance_provider']);
							$newUU=str_replace(']','',$newUU);
							$newUU=str_replace('"','',$newUU);		
							$vals_IP=explode(',',$newUU);
								}  
						   }
						   if(! is_array($vals_IP)){$vals_IP=array();}
						   $i=0;
						   $newvals_IP="";
						   if(count($vals_IP)>0){
						   foreach($insuranceProviders as $IP){
						   if(in_array($IP['id'],$vals_IP)){
							if($i==0){
							$newvals_IP.=$IP['name'];	
							$i++;
								}else{
							$newvals_IP.=' , '.$IP['name'];			
									}   
							   }	   
							   }
							
						   }else{
							$newvals_IP="None";   
							   }
						   
						   $newvals_payments="";
						   if($asConnection['as_connections_meta']['payment_method']==""){
							$paymentmethods="None";   
							   }else{
							//print_r($payments);
							if (strpos($asConnection['as_connections_meta']['payment_method'], '|') !== false) 
						   {$vals_payments=explode('|',$asConnection['as_connections_meta']['payment_method']);}else{
							$vals_payments=json_decode($asConnection['as_connections_meta']['payment_method']);   
						   }
						   $l=0;
						   $newvals_payments="";
						   if(count($vals_payments)>0){
						   foreach($payments as $IP){
						   if(in_array($IP['id'],$vals_payments)){
							if($l==0){
							$newvals_payments.=$IP['name'];	
							$l++;
								}else{
							$newvals_payments.=' , '.$IP['name'];			
									}   
							   }	   
							   }
							
						   }else{
							$newvals_payments="None";   
							   }
							
							
							//$paymentmethods=$asConnection['as_connections_meta']['payment_method'];	   
								   }
						   
						   //print_r($vals);?>
                         <div class="layout_profile layout_profile_purple">
                        	 <h3> Finance </h3>
                             <ul>
                                <li> Session Cost : <?php echo $asConnection['as_connections_meta']['session_cost'];?> </li> 
                                <li> Sliding Scale : <?php echo $asConnection['as_connections_meta']['scale_payment'];?> </li> 
                                <li> Accepted Insurance Plans : <?php if(!empty($newvals_IP) && $asConnection['as_connections_meta']['insurance']=='Yes'){ echo $newvals_IP; }else{ echo 'NA';}?>
								<?php //echo $newvals_IP;?> </li>  
                                <li> Accepted Payment Method : <?php echo $newvals_payments;?> </li>
								<?php if($asConnection['as_connections_meta']['service_type']){ ?>
                                  <li>Our Facility also Provides:  <?php echo ucfirst(($asConnection['as_connections_meta']['service_type']=='discount'?'discounted service':$asConnection['as_connections_meta']['service_type'])); ?></li>
                                <?php } ?>
                                <li> Accepted Video Conference : <?php echo $asConnection['as_connections_meta']['video_conference'];?> </li>
                                <li> I can provide a superbill with CPT and ICD codes : <?php if($asConnection['as_connections_meta']['declaration']==1){ echo 'Yes';}else{echo "No";}?> </li>
                                
                            </ul>
                        </div>
                    </div> 
                    
                    <div class="<?php echo $class;?>">
                    <?php if(!empty($asConnection['as_connections_meta']['modality'])){if (strpos($asConnection['as_connections_meta']['modality'], '|') !== false) 
						   {
							$vals_MO=explode('|',$asConnection['as_connections_meta']['modality']);}else{
							$vals_MO=json_decode($asConnection['as_connections_meta']['modality']);   
						   }
					}else{
					$vals_MO=array();	
						}
						if(is_array($vals_MO)){}else{$vals_MO=array($vals_MO);}
						//print_r($vals_MO);die;
						   $newvals_MO="";
						   $j=0;
						   if(count($vals_MO)>0){
						   foreach($modalities as $IP){
						   if(in_array($IP['id'],$vals_MO)){
							if($j==0){
							$newvals_MO.=$IP['name'];
							$j++;	
								}else{
							$newvals_MO.=' , '.$IP['name'];			
									}   
							   }
							   	   
							   }
						   }else{
							$newvals_MO="None";   
							   }
						   
						   
						   
						   
						   
						   if (strpos($asConnection['as_connections_meta']['age_group'], '|') !== false) 
						   {
							$vals_AG=explode('|',$asConnection['as_connections_meta']['age_group']);}else{
							$vals_AG=json_decode($asConnection['as_connections_meta']['age_group']);   
						   }
						   $newvals_AG="";
						   $m=0;
						   //print_r($vals_AG);
						   if(count($vals_AG)>0){
						   foreach($ages as $age){
							if($m==0){
							$newvals_AG.=$age['name'];
							$m++;
							}else{
							$newvals_AG.=' , '.$age['name'];	
								} 
							}  
						   }else{
							$newvals_AG="None";   
							   }
						   
						   
						   //print_r($vals);?>
                        <div class="layout_profile layout_profile_grey">
                        	 <h3> Client Focus </h3>
                             <ul>
                                <li> Modality : <?php echo $newvals_MO;?> </li>
                                <li> Age Group : <?php echo $newvals_AG;?></li>
                            </ul>
                              <div class="treatment_section">
                               <h2> Treatment Orientation </h2>
                            <?php if (strpos($asConnection['as_connections_meta']['treatment'], '|') !== false) 
						   {
							$vals_T=explode('|',$asConnection['as_connections_meta']['treatment']);}else{
							$vals_T=json_decode($asConnection['as_connections_meta']['treatment']);   
						   }
						   
						   //print_r($vals);?>
                               
                               <ul>
                                   <?php if(!empty($vals_T)){foreach($treatments as $treatment){
										   if(in_array($treatment['id'],$vals_T)){
										 ?>
                                       <li> <?php echo $treatment['name'];?> </li> 
                                      <?php }}}else{?>
										 <li> Nothing Selected </li>   
									  <?php }?> 
                               </ul> 
                            </div>                           
                           
                        </div>
                    </div> 
                   </div>
                                      
            </div>
              
              
              
            </div>
          </div>
            
            
            <div class="profile_contact" id="profile_contact"> 
                
               		  <div class="dp-contact container">
                      <?=$this->Flash->render();?>	
                         <h3>Contact Provider</h3>
                           <form name="contact_form" method="post" action="" id="contactform">
                               <!--<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-right">
                               <div class="user_display_form_vals">
                                    <input type="text" placeholder="Your Name" name="name" required="required">
                                </div>
                               </div>
                               <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-left">  
                               <div class="user_display_form_vals">  
                                     <input type="email" placeholder="Your E-mail address" name="email" required="required" class="">
                                </div>
                               </div>-->
                               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center text_vals">  
                               <div class="user_display_form_vals">  
                                    <textarea placeholder="Your message" name="message" required="required" class=""></textarea>
                                </div>
                               </div>
                               <!--<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center text_vals"> 
                               <div class="user_display_form_vals">
                                  
                                   <?php 
								   //$session = $this->request->session();
								   //$code = mt_rand(10000, 99999);
								   //$session->write('captcha', $code);
                                   
								   ?>
                                   <span class="captcha"><?php //echo $code;?></span>
                                    <input placeholder="Your captcha" type="text" name="captcha" style="width:15%; margin-left:10px;" required="required">
                                    </div>
                                   </div>-->
                                   
                                <!--<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center"> 
                                  <input placeholder="Your captcha" type="text" name="captcha">
                                </div> -->   
                               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center text_vals">
                               <input type="hidden" name="provider_name" value="<?php echo $name;?>" /> 
                               <input type="hidden" name="userID" value="<?php echo $asConnection['owner'];?>" /> 
                                
                                     <button type="submit">Submit Inquiry</button>
                               </div>   
                                            
                          </form>
                   </div>  
                 
            </div>         
                                
            
        </div>
  </div> 
         
      <!--end content section--> 
      
  <script src="https://maps.google.com/maps/api/js?key=AIzaSyAn8MyXKfr-KMBInEgmJfESScGLhk2kY-E&callback=initMap" type="text/javascript"></script>
  
      <script type="text/javascript">
	  $('#contactform').validate({ // initialize the plugin
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.insertAfter($(element).parents('.user_display_form_vals'));
        }
});

	  
	  
    function initialize() {
	   var lat='<?php echo $asConnection['as_connections_addresses'][1]['latitude']?>';
	   var lng='<?php echo $asConnection['as_connections_addresses'][1]['longitude']?>';
	   //var add='<?php //echo $asConnection['as_connections_addresses'][0]['address'];?>';
	  
	   //var address='<?php //echo $asConnection['as_connections_addresses'][0]['address'].' '.$asConnection['as_connections_addresses'][0]['state'].' '.$asConnection['as_connections_addresses'][0]['zipcode']; ?>';
	   
	   if(lat=='' && lng==''){
	   lat='41.850033';
	   lng='-87.6500523';
	   }
	   //alert(latlngval);
	   
       var latlng = new google.maps.LatLng(lat,lng);
        var map = new google.maps.Map(document.getElementById('map'), {
          center: latlng,
          zoom: 13
        });
        var marker = new google.maps.Marker({
          map: map,
          position: latlng,
          draggable: false,
          anchorPoint: new google.maps.Point(0, -29)
       });
	    /*var iwContent = '<div id="iw_container">' +
          '<div class="iw_title"><b>Location</b> : '+address+'</div></div>';*/
		var geocoder = geocoder = new google.maps.Geocoder();
            geocoder.geocode({ 'latLng': latlng }, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[1]) {
                        //alert("Location: " + results[1].formatted_address);
						var infowindow = new google.maps.InfoWindow({content:"<div style='text-align:center;'>"+results[1].formatted_address+"</div>"});
						infowindow.open(map,marker); 
                    }
                }
            });
       // var infowindow = new google.maps.InfoWindow({content:'Address'});
		//infowindow.open(map,marker);    
       
    }
    google.maps.event.addDomListener(window, 'load', initialize);
	 $(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip({'placement': 'right' });
	 });
    </script>
    <style type="text/css">
    #contactform span.error{
		margin-left:0px;
		margin-bottom:2%;
		}
	.text_vals{
	margin-bottom:1%;	
		}
	#name-error{
		margin-left:25% !important;
		float:left;
		}
    </style>
