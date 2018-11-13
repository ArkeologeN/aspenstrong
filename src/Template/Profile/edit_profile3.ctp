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
                                <?php if($asConnection['logo']!=""){ $logoval= HTTP.'img/logodirectry/'.$asConnection['logo'];$fileVal=HTTP.'img/logodirectry/'.$asConnection['logo'];?>
                                   <img src="<?php echo HTTP;?>img/logodirectry/<?php echo $asConnection['logo'];?>" width="100%"  height="auto" alt="image" class="img-circle">
                                <?php }else{ $logoval= HTTP.'img/logodirectry/images.png';$fileVal="";?>
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
                                                    <li> <a href="javascript:void(0);" data-toggle="modal" data-target="#myModal2">Support</a> </li>
                                                    <li> <a href="javascript:void(0);" data-toggle="modal" data-target="#myModal3">Report An Issue</a> </li>
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
                                                <li class="active">
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
                              		<form id="myform" method="post" action="" enctype="multipart/form-data">
                                <!--LOGO OR PROFILE PICTURE-->
                                    <div class="login_head">
                                    	<i class="fa fa-cogs" aria-hidden="true"></i>
                                    	<h2> Logo or Profile Picture</h2>
                                	</div> 
                                   
                                    <!--<div class="db-field-upload-container">
                                                <span class="db-upload-placeholder">
                                                <input id="file" class="file" type="file" data-min-file-count="1" name="logo">
                                                Drag an image here or browse for the image to upload.(The picture will be cropped in square size.)</span>
                                                <div class="clearfix"></div>
                                                <input type="hidden" name="listing_featured_img" value="">
                                    </div>  --> 
                                   
                                   <div class="db-field-upload-container user_display_form_vals">
                                   <span class="db-upload-placeholder">
                                   
                                   <input id="file" class="file required" type="file" data-min-file-count="1" accept="image/*" name="logo" required="required" value="<?php echo $fileVal;?>" >                                 <input type="hidden" name="data[file_name]" id="file2" value="" />
                                    Drag an image here or browse for the image to upload.<br><font style="font-size:12px;">Image size must be 500x500px and less than 600KB</font></span>
		                           <img id="result" src="<?php echo $logoval;?>">
                                    <div class="clearfix"></div>     
                                   </div>
                                 
                               <!-- WEBSITE -->
                                      <div class="login_head">
                                    	<i class="fa fa-globe" aria-hidden="true"></i>
                                    	<h2> Website </h2>
                                	</div>   
                                   
                                   <div> 
                                           <?php $j=1;if(! empty($asConnection['as_connections_links'])){
		                                         usort($asConnection['as_connections_links'],"cmp");
		                                         foreach($asConnection['as_connections_links'] as $links){?>
                                            <div class="links-all credential">
                                            <div class="user_credential user_display_form_vals">
                                            <label class="required">Website Link</label>
                                            <input type="text" class="input_url" name="data[as_connections_links][url<?php echo $j;?>]" value="<?php echo $links['url'];?>"  placeholder="example.com">                                     
                                            <?php if($j !=1){?>
                                            <a href="javascript:void(0);" onClick="remove_li4(this);" class="user_close"> <i class="fa fa-times" aria-hidden="true"></i> </a>
                                            <?php }?>
                                            </div>
                                          <input type="hidden" value="<?php echo $links['id'];?>" name="data[as_connections_links][link_id<?php echo $j;?>]" />
                                          </div>
                                           <?php $j++;}}else{?>
                                           <div class="links-all credential">
                                            <div class="user_credential user_display_form_vals">
                                            <label class="required">Website Link</label>
                                            <input type="text" class="input_url" name="data[as_connections_links][url<?php echo $j;?>]" value=""  placeholder="http://www.example.com">                                     
                                            </div>
                                          </div>
                                           <?php }?>
                                        
                                      <!--<div class="add_more_btn" id="pre-othr-link">
                                        <a href="javascript:void(0);" id="ad-othrlnk-btn"> Add Website <i class="fa fa-plus" aria-hidden="true"></i> </a>
                                      </div>-->
                                                                                   
                                 </div>  
                                 
                                 
                                 <!-- SOCIAL MEDIA LINKS  --> 
                                      <div class="login_head">
                                    	<i class="fa fa-link" aria-hidden="true"></i>
                                    	<h2> Social Media Links </h2>
                                	</div>
                                   <?php $i=1; if(! empty($asConnection['as_connections_socials'])){ 
								         usort($asConnection['as_connections_socials'],"cmp");
										 $socialVals=array('Facebook','Google+','LinkedIn','Instagram','SoundCloud','Twitter','vimeo');
		                                 foreach($asConnection['as_connections_socials'] as $keyV=>$socials){?>
                                      <div class="social-all credential">   
                                      <div class="phone_details"> 
                                    	 
                                           <!-- <ul class="cs-form-element half-input">
                                            
                                            <li>
                                                <label>Visibility</label>
                                                <ul class="radio-box">
                                                    <li>
                                                        <input id="show_form" type="radio" name="data[as_connections_socials][visibility<?php //echo $i;?>]" <?php //if($socials['visibility']=='public'){echo 'checked';}?> value="public">
                                                        <label for="show_form">Public</label>
                                                    </li>
                                                    <li>
                                                        <input name="data[as_connections_socials][visibility<?php //echo $i;?>]" id="hide_form" type="radio" <?php //if($socials['visibility']=='private'){echo 'checked';}?> value="private">
                                                        <label for="hide_form">Private</label>
                                                    </li>
                                                </ul>
                    
                                            </li>
                    
                                        </ul>-->
                                        
                                            <div class="user_display_form">
                                               
                                                <label class="optional">Social Network</label> 
                                                   <select class="multiselect-ui select-boxes socials_media_fb" name="data[as_connections_socials][type<?php echo $i;?>]">
                                                    <option value="">Select</option>
                                                  <?php foreach($socialVals as $scv) { ?>
                                                   <option value="<?php echo $scv ?>" <?php if(isset($socials['type']) && $socials['type'] == $scv){echo 'selected';}?>><?php echo $scv;?></option>
                                                  <?php } ?>
	   		                                       </select> 
                                            </div>
                                            
                                           <div class="user_display_form user_display_form_vals">
                                                <label class="optional">Public Url</label> 
                                                 
                                                  <?php if($i !=1){?>
                                                 <input type="text" class="valid input_url" name="data[as_connections_socials][url<?php echo $i;?>]" value="<?php echo $socials['url'];?>" onblur="checkURL(this)" placeholder="http://www.example.com">
                                                
                                                 <a href="javascript:void(0);" class="user_close" onClick="remove_li3(this);"> <i class="fa fa-times" aria-hidden="true"></i> </a>
                                                 <?php }else{?>
                                                 <input type="text" class="valid input_url" name="data[as_connections_socials][url<?php echo $i;?>]" value="<?php echo $socials['url'];?>" onblur="checkURL(this)" placeholder="http://www.example.com">
                                                 <?php }?>
                                           </div>
                                          
                                   </div>
                                  <input type="hidden" value="<?php echo $socials['id'];?>" name="data[as_connections_socials][social_id<?php echo $i;?>]" /> 
                                  </div>
                                   <?php $i++;}}else{?>
                                   <div class="social-all credential">   
                                      <div class="phone_details"> 
                                    	 
                                            <!--<ul class="cs-form-element half-input">
                                            
                                            <li>
                                                <label>Visibility</label>
                                                <ul class="radio-box">
                                                    <li>
                                                        <input id="show_form" type="radio" name="data[as_connections_socials][visibility<?php //echo $i;?>]" value="public" checked="checked">
                                                        <label for="show1_form1">Public</label>
                                                    </li>
                                                    <li>
                                                        <input name="data[as_connections_socials][visibility<?php //echo $i;?>]" id="hide_form" type="radio" value="private">
                                                        <label for="hide_form">Private</label>
                                                    </li>
                                                </ul>
                    
                                            </li>
                    
                                        </ul>-->
                                        
                                            <div class="user_display_form">
                                                <label class="optional">Social Network</label> 
                                                   <select class="multiselect-ui select-boxes socials_media_fb" name="data[as_connections_socials][type<?php echo $i;?>]">
                                                    <option value="">Select</option>
                                                   <option value="Facebook">Facebook</option>
	   		                                       <option value="Google+">Google+</option>
	   		                                       <option value="LinkedIn">LinkedIn</option>
	   		                                       <option value="Instagram">Instagram</option>
	   		                                       <option value="SoundCloud">SoundCloud</option>
	   		                                       <option value="Twitter">Twitter</option>
	   		                                       <option value="vimeo">vimeo</option>
                                                    </select> 
                                            </div>
                                            
                                           <div class="user_display_form user_display_form_vals">
                                                <label class="optional">Public Url</label> 
                                                 <input type="text" class="input_url" name="data[as_connections_socials][url<?php echo $i;?>]" value="" aria-required="true"  onblur="checkURL(this)" placeholder="http://www.example.com">
												
                                                 
                                           </div>
                                          
                                   </div>
                                 </div>
                                   <?php }?>
                                   <div class="add_more_btn" id="pre-social">
                                        <a href="javascript:void(0);" id="ad-social-btn"> Add More Social Links <i class="fa fa-plus" aria-hidden="true"></i> </a>
                                      </div> 
                                    <!--ABOUT YOUR ORGANIZATION-->  
                                       <div class="login_head">
                                    	<i class="fa fa-file-text" aria-hidden="true"></i>
                                    	<?php if($asConnection['entry_type']=='organization'){?>
                                        <h2> About Your Organization </h2>
                                        <?php }else{ ?>
                                        <h2> Personal Statement </h2>
                                        <?php }?>
                                	</div>
                                   
                                   <div class="phone_details">
                                   
                                          	                                  	  
                                            <div class="user_display_form user_display_form_vals">
                                                <label class="optional">About your Organization (limited to 100 words)</label> 
                                                   <textarea class="required" name="data[as_connections_meta][personal_statement]" placeholder="limited to 100 words"><?php echo $asConnection['as_connections_meta']['personal_statement'];?></textarea>
                                            </div>
                                                                  
                                             <div class="user_display_form">
                                                <label class="optional">Are you bilingual?</label>
                                                  <select data-placeholder="Language" class="chosen-select" id="bilingual" name="data[as_connections_meta][bilingual]">
                                                    <option <?php if($asConnection['as_connections_meta']['bilingual']=='yes'){echo "selected";}?> value="yes">Yes</option>
                                                    <option value="no" <?php if($asConnection['as_connections_meta']['bilingual']=='no' || !isset($asConnection['as_connections_meta']['bilingual'])){echo "selected";}?>>No</option>           
                                                </select>
                                           </div>
                                   
                                          	<div class="user_display_form user_display_form_vals" id="select_lang">
                                                <label class="optional">Business Statement in other language</label> 
                                               <?php if(isset($asConnection['as_connections_meta']['other_lang']) && $asConnection['as_connections_meta']['other_lang']!=''){
												     $otherSelectedlang=explode('|',$asConnection['as_connections_meta']['other_lang']);
												   }else{
													 $otherSelectedlang=array();  
													   }?>  
                                               <?php //$languages=array("Mandarin","Arabic","Spanish","Hindi","Italian","Russian","Portuguese","Bengali","French","Urdu","Japanese","German","American","Sign");asort($languages);
											  // print_r($languages);
											   ?> 
                                              <select data-placeholder="Language" multiple="multiple" class="chosen-select multiselect-value" id="per_lang" name="data[as_connections_meta][other_lang][]" required="required">
                                                <option value="">Language</option>	
                                                <?php foreach($languages as $language){ ?>
                                                <option <?php if(in_array($language['name'],$otherSelectedlang)){ echo 'selected';}?> value="<?php echo $language['name'];?>"><?php echo $language['name'];?></option>
                                                <?php }?>
                                               </select>
                                        </div>
                                    	   
                                           <?php if(isset($asConnection['as_connections_meta']['other_statement']) && $asConnection['as_connections_meta']['other_statement']!=''){
												     $other_statement=explode('|',$asConnection['as_connections_meta']['other_statement']);
												   }else{
													 $other_statement=array();  
													   }
													   
												 if(!empty($other_statement)){?>
                                                <div id="additional_fr">
												<?php $z=0;foreach($other_statement as $os){	 
													 ?>  
                                            <div class="user_display_form user_display_form_vals credential" id="per_<?php echo $otherSelectedlang[$z];?>">
                                                <label class="optional">Business Statement (In <?php echo $otherSelectedlang[$z];?>)</label> 
                                                    <textarea class="required" name="data[as_connections_meta][other_statement][<?php echo $otherSelectedlang[$z];?>]" placeholder="limited to 100 words,please write in <?php echo $otherSelectedlang[$z];?>"><?php echo $os;?></textarea>
                                             
                                            <a href="javascript:void(0);" onClick="remove_lang(this);" class="user_close"> <i class="fa fa-times" aria-hidden="true"></i> </a>
                                            
                                            </div>
                                            <?php $z++;}?></div><?php }?>
                                            
                                            <div id="otherLanOption">
                                            </div>
                                       
                                   </div>
                                   
                                   <?php 
								   if(count($asConnection['as_connections_socials'])==0){
									$totalSocials=1;   
									}else{
									$totalSocials=count($asConnection['as_connections_socials']);
									}
									
									if(count($asConnection['as_connections_links'])==0){
									$totalLinks=1;   
									}else{
									$totalLinks=count($asConnection['as_connections_links']);
									}
								   ?>
                                   <input type="hidden" value="<?php echo $asConnection['as_connections_meta']['id'];?>" name="data[as_connections_meta][metaId]" />
                                   <input type="hidden" value="<?php echo $totalSocials;?>" name="data[totalSocials]" id="totalSocials" />
                                   <input type="hidden" value="<?php echo $totalLinks;?>" name="data[totalLinks]" id="totalLinks" />
                                   <input type="hidden" value="<?php echo $fileVal;?>" name="logovals" id="logovals" />
                                   <div class="green_save">
                                       <ul>
                                           <li>
                                             <button type="submit" value="Submit" class="save_btn">Save</button>
                                             <!--<a href="#" class="save_btn">Save</a>-->
                                           </li>
                                           <li>
                                            <a href="<?php echo HOME_WEB;?>profile/editProfile4/<?php echo base64_encode($asConnection['id']);?>" class="next_btn">Skip</a>
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
<script type="text/javascript" src="<?php echo HTTP;?>js/front/fSelect_steps.js"></script>   
<script type="text/javascript">

function remove_li3($selfVar) {
	    
	  	$($selfVar).parents('.credential').remove();
		//var totalSocials=parseInt($("#totalSocials").val())-1;
		//alert(totalSocials);
	    //$("#totalSocials").val(totalSocials); 
	  //alert($selfVar);
	  //	k--;
	  	return true;
	  }
	  function remove_li4($selfVar) {
		
	  	$($selfVar).parents('.credential').remove();
		var totalLinks=parseInt($("#totalLinks").val())-1;
		//alert(totalLinks);
	    $("#totalLinks").val(totalLinks); 
	  	return true;
	  }
	  
	  function remove_lang($selfVar) {
		
	  	$($selfVar).parents('.credential').remove();
		var closestdiv=$($selfVar).closest('div').attr('id');
		var IDS=closestdiv.split('_')
		var mainID=IDS[1];
		//alert(mainID);
		//$('#per_lang').selectmenu("refresh", true);
		
		$("#per_lang option[value="+mainID+"]").removeAttr("selected");
		/*var newdataVal=$(".fs-option").data("data-value");
		if(mainID==newdataVal){
			
			}*/
		
		$('#select_lang .fs-option').each(function(i){
        var statsValue = $(this).attr('data-value'); 
		//alert(statsValue);
		if(mainID==statsValue){
		$(this).removeClass("selected");
		
		var selectedVals=$("#select_lang .fs-label").text();
		var res = selectedVals.replace(mainID, "");	
		res = res.replace(',', " ");	
		$("#select_lang .fs-label").text(res);
		 }
        });
	  	return true;
	  }
	  $(function(){
      $(document).on('click', '.save_btn', function(event) {
        event.preventDefault();
        var valid_url = false;
        var $this = $(this);
        $.each($('.input_url'), function() {
          var $this_in = $(this);
          if(!isUrlValid($this_in.val()) && $this_in.val()!='')
          {
            valid_url = true; 
            $this_in.closest('.user_display_form_vals').find('.error_url').remove();
            var id_error = $(this).attr('aria-describedby');
            $this_in.closest('.user_display_form_vals').append('<span id="'+id_error+'io" class="error error_url">Please enter valid url.</span>')
          }else {
            $this_in.closest('.user_display_form_vals').find('.error_url').remove();
          }
        });
        if(valid_url==true)
        {
          return false;
        }
        $this.closest('form').submit();
        
      });
      $(document).on('change', '.input_url', function(event) {
        event.preventDefault();
        if($(this).val()!='' && !isUrlValid($(this).val()))
        { 
          $(this).closest('.user_display_form_vals').find('.error_url').remove();
          var id_error = $(this).attr('aria-describedby');
          $(this).closest('.user_display_form_vals').append('<span id="'+id_error+'io" class="error error_url">Please enter valid url.</span>')
        }else {
          $(this).closest('.user_display_form_vals').find('.error_url').remove();
        }
      });
      function isUrlValid(url) {
        url = url.replace("http://", "");
        url = url.replace("https://", ""); 
        if (url.indexOf("https://")==-1 || url.indexOf("http://") == -1)
        {
          url = 'http://'+url;
        }
        
        return /^(http|https|ftp):\/\/[a-z0-9]+([\-\.]{1}[a-z0-9/.]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/i.test(url);
    }
		var social = ['Facebook','Google+','LinkedIn','Instagram','SoundCloud','Twitter','Vimeo'];	
		var social_array=JSON.stringify(social);	  
		  
		$(".message.success").append('<a href="<?php echo HOME_WEB;?>profile/editProfile4/<?php echo base64_encode($asConnection['id']);?>" class="next_btn_top">Next</a>');
		//if('<?php //echo count($asConnection['as_connections_socials']);?>' || '<?php //echo count($asConnection['as_connections_socials']);?>'==0){	
		var k='<?php echo $i;?>';
		//}else{
		//var k=1;	
		//	}
		//if('<?php //echo count($asConnection['as_connections_links']);?>' || '<?php //echo count($asConnection['as_connections_links']);?>'==0){
		var l='<?php echo $j-1;?>';
		//}else{
		//var l=1;	
		//}
		
			
			
			$("#ad-social-btn").click(function(){
				
			var optionsnew="";	
			
			$( ".select-boxes" ).each(function() {
			//var optionsnew="";
			var itemtoRemove=$( this ).val();
			/*$.each(social, function (index, value) {
			if(itemtoRemove==value){
			social.splice($.inArray(itemtoRemove, social),1);
			}
			});*/
		    optionsnew="";
			$.each(social, function (index, value) {
			optionsnew+='<option value='+value+'>'+value+'</option>'
			});	
			
			});	
				
				
			k++;
			$("#totalSocials").val(k);
			  $str = '<div class="social-all credential">'	
		  +    '<div class="user_display_form user_display_form_vals">'			  			
          +    '<label class="required"><?php echo __("Social Network")?></label>'
          +      '<select class="required select-boxes socials_media_fb" name="data[as_connections_socials][type'+k.toString()+']">'
          +       '<option value="">Select</option>'
          +     	optionsnew
		  +      '</select>'
          +    '</div>'
          + 	'<div class="user_display_form user_display_form_vals">'
		      +'<label class="required"><?php echo __("Public URL")?></label>'
		      +          '<input type="text" class="required input_url" name="data[as_connections_socials][url'+k.toString()+']" onblur="checkURL(this)">'
			  +          '<input type="hidden" name="data[AsConnectionsSocial][count_social_media]" value="'+k+'">'
		      +  '</div>'
		      +	 '<div class="user_display_form">'
		      +	 '<label class="required">&nbsp;</label>'
		      +           '<button onClick = "remove_li3(this);" class="btn btn-grey close-btn-append" type="button"><?php echo __("Remove Link")?><i class="fa fa-close"></i></button>'
		      +  '</div></div>';
			  $("#pre-social").before($str);
			});
      $(document).on('change', '.socials_media_fb', function(event) {
        event.preventDefault();
        $('.new_error_url').remove();
        var value_check = false;
        var $this = $(this);
        $.each($this.closest('.social-all.credential').siblings('.social-all.credential').find('.socials_media_fb'), function(index, obj) {
           if($(this).val()== $this.val())
           {
             value_check = true;
           }
        });
        if(value_check == true)
        {
          $this.find('option[value=""]').prop('selected', true);
          $this.closest('.user_display_form_vals').append('<span style="margin-top: 37px;" id="nvsdjbgfsid" class="error error_url new_error_url">Social media already selected.</span>')
          return false;
        }
      });
			$("#ad-othrlnk-btn").click(function(){
			l++;
			$("#totalLinks").val(l); 
			  $str = '<div class="links-all credential"><div class="user_display_form user_display_form_vals">'
		      +'  <label class="required"><?php echo __("Website Link")?></label>'
		      +       '<input type="text" class="required input_url" name="data[as_connections_links][url'+l.toString()+']">'
			  +       '<input type="hidden" value="'+l+'" name="data[as_connections_links][url_link]">'
		      +	    '</div>'
		      +	 '<div class="user_display_form">'
		      +	 '<label class="required">&nbsp;</label>'
		      +           '<button onClick = "remove_li4(this);" class="btn btn-grey close-btn-append" type="button"><?php echo __("Remove Websites")?><i class="fa fa-close"></i></button>'
			    +'</div></div>';
			  $("#pre-othr-link").before($str);
			});
			

	  }); 


 
$(document).ready(function(){
	$('.multiselect-ui').fSelect();
	$('#select_lang').hide();
	
	
	$('#clipBtn').click(function(event){
		     event.preventDefault();
	});
	var bilingual='<?php echo count($otherSelectedlang);?>';
	
	if(bilingual !=0 && $('#bilingual').val()=='yes'){
	$('#select_lang').show();
	$('.multiselect-value').fSelect();
	$('#additional_fr').show();
		}else{
	$('#select_lang').hide();
	$('#additional_fr').hide();		
			}
	
	$( "#bilingual" ).change(function() {
      if($('#bilingual').val()=='yes'){
	  $('#select_lang').show();
	  $('.multiselect-value').fSelect();
	  $('#additional_fr').show();
	  }else{
	  $('#select_lang').hide();
	  $('#additional_fr').hide();
	  }
});

	
	
	
	
	var allIds=[];
	$( "#per_lang" ).change(function() {
	$("div.lang_opt").remove();
	 
	
	$('#per_lang :selected').each(function(i, sel){ 
    //otherLanOption
	var str_val=$(sel).val();
	var id_val="#per_"+str_val;
	
	//var findexisting=$( "#additional_fr" ).find( id_val );
	//alert(findexisting);
	//$.each(findexisting, function(index, value) {
    //findexisting.push(index + ': ' + value);
    //});
    //alert(JSON.stringify(findexisting));
	$str='<div class="user_display_form lang_opt user_display_form_vals credential" id="per_'+str_val+'">'
          +'<label class="optional">Business Statement (In '+str_val+')</label>' 
          +'<textarea class="required" name="data[as_connections_meta][other_statement]['+str_val+']" placeholder="limited to 100 words,please write in '+str_val+'"></textarea>'
		  +'<a href="javascript:void(0);" onClick="remove_lang(this);" class="user_close"> <i class="fa fa-times" aria-hidden="true"></i> </a>'
          +'</div>';
	if($( id_val ).length){
	}else{
	$("#otherLanOption").before($str);
	}
	
	
    });
	/*allIds = $.unique(allIds);
	jQuery.each(allIds,function(i,sel){
	if($(sel).length) {
    alert(sel);
    
    }
	});*/
	
		 });
	 
	    
	 /*if ($("#per_lang option:selected").length > 0){
    alert('all is selected');
      }
    else{
    additional_fr
    }*/

$("#myform").validate({
	rules: {
		
		logo :
            {
			required:function(element) {
                 if($("#logovals").val()!='') 
                 return false;
                 else return true;
			}
             },
		"data[as_connections_meta][other_lang][]":
		{
			required:function(element) {
                 if($("#bilingual").val()!='yes') 
                 return false;
                 else return true;
			}
			
			},
	},
	ignore: ':hidden:not(".file")',
	ignore: ':hidden:not("#per_lang")',
	
		 messages: {
                                  
                              logo :
							  {
                                required:"Please upload profile image.",
                               },
							   "data[as_connections_meta][other_lang][]":
							   {
                                required:"Please select at least one language.",
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

/*function checkURL (abc) {
  var string = abc.value;
  if (!~string.indexOf("http") && string != "") {
    string = "http://" + string;
  }
  abc.value = string;
  return abc
}
 */ 
</script>
<link rel="stylesheet" type="text/css" href="<?php echo HTTP;?>js/imageCrop/iEdit.css">
<script type="text/javascript" src="<?php echo HTTP;?>js/imageCrop/iEdit.js"></script>
<script type="text/javascript" src="<?php echo HTTP;?>js/imageCrop/script.js"></script>




		<style type="text/css">
			#result{
				display: block;
				position: relative;
				width: 224px;
				height: 224px;
				margin: 15px auto;
			}
      .error_url{
        margin-top: 50px;
        position: absolute;
      }
		</style>