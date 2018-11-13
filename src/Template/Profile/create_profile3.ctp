<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gutter">
         <div class="profile_bg">
             
              <div class="container"> 
              
              		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gutter">
              	     
              
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 user_dash" id="click2">
                               <div class="c_user-edit">
                                       <ul>
                                                <li class="active">
                                                    <a href="https://directory.aspenstrong.org/create_profile_step1.html"><i class="fa fa-align-justify"></i>Personal Info</a>
                                                </li>
                                                <li>
                                                    <a href="https://directory.aspenstrong.org/create_profile_step2.html"><i class="fa fa-user"></i> Address and Location</a>
                                                </li>
                                                <li>
                                                    <a href="https://directory.aspenstrong.org/create_profile_step3.html"><i class="fa fa-wechat"></i>Website and Social Links</a>
                                                </li>
                                                <li>
                                                    <a href="https://directory.aspenstrong.org/create_profile_step4.html"><i class="fa fa-question-circle"></i>Professional Details</a>
                                                </li>
                                                <li>
                                                    <a href="https://directory.aspenstrong.org/create_profile_step5.html"><i class="fa fa-bookmark"></i>Specialities </a>
                                                </li>
                                       </ul>			       
                                </div>
                               
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                              		<form id="myform">
                                <!--LOGO OR PROFILE PICTURE-->
                                    <div class="login_head">
                                    	<i class="fa fa-cogs" aria-hidden="true"></i>
                                    	<h2> Logo or Profile Picture</h2>
                                	</div> 
                                   
                                    <div class="db-field-upload-container">
                                                <span class="db-upload-placeholder">
                                                <input id="file" class="file" type="file" multiple="" data-min-file-count="1">
                                                Drag an image here or browse for the image to upload.(The picture will be cropped in square size.)</span>
                                                <div class="clearfix"></div>
                                                <input type="hidden" name="listing_featured_img" value="">
                                         </div>   
                                 
                                 
                               <!-- WEBSITE -->
                                      <div class="login_head">
                                    	<i class="fa fa-globe" aria-hidden="true"></i>
                                    	<h2> Website </h2>
                                	</div> 
                                   
                                   <div> 
                                           
                                            <div class="user_credential">
                                            <label class="required" aria-required="true">Website Link</label>
                                            <input type="text" name="" value="" required="required" aria-required="true">
                                            <a href="#" class="user_close"> <i class="fa fa-times" aria-hidden="true"></i> </a>
                                        </div>
                                        
                                           <div class="user_credential">
                                            <label class="required" aria-required="true">Website Link</label>
                                            <input type="text" name="" value="" required="required" aria-required="true">
                                            <a href="#" class="user_add"> <i class="fa fa-plus" aria-hidden="true"></i> </a>
                                        </div>  
                                            
                                 </div>  
                                 
                                 
                                 <!-- SOCIAL MEDIA LINKS  --> 
                                      <div class="login_head">
                                    	<i class="fa fa-link" aria-hidden="true"></i>
                                    	<h2> Social Media Links </h2>
                                	</div>
                                   
                                      <div class="phone_details"> 
                                    	 
                                            <ul class="cs-form-element half-input">
                                            
                                            <li>
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
                                        
                                            <div class="user_display_form">
                                                <label class="optional">Social Network</label> 
                                                   <select class="" name="">
                                                       <option value="Facebook">Facebook</option> 
                                                       <option value="Google+">Google+</option> 
                                                       <option value="LinkedIn">LinkedIn</option>
                                                        <option value="Instagram">Instagram</option> 
                                                        <option value="SoundCloud">SoundCloud</option>
                                                         <option value="Twitter">Twitter</option> 
                                                         <option value="vimeo">vimeo</option> 
                                                    </select> 
                                            </div>
                                            
                                           <div class="user_display_form">
                                                <label class="optional">Public Url</label> 
                                                 <input type="text" class="required valid" value="" required="required">
                                                 <a href="#" class="user_close"> <i class="fa fa-times" aria-hidden="true"></i> </a>
                                           </div>
                                          
                                   </div>
                                   
                                   
                                       <!--PERSONAL STATEMENT-->  
                                       <div class="login_head">
                                    	<i class="fa fa-file-text" aria-hidden="true"></i>
                                    	<h2> Business Statement </h2>
                                	</div>
                                    
                                    <div class="phone_details">
                                    
                                            <div class="user_display_form">
                                                <label class="optional">Business Statement (limited to 100 words)</label> 
                                                   <textarea class="required" name="" placeholder="limited to 100 words"></textarea>
                                            </div> 
                                    
                                           <div class="user_display_form">
                                                <label class="optional">Are you bilingual?</label>
                                                  <select data-placeholder="Language" class="chosen-select" id="bilingual">
                                                    <option value="">Bilingual</option>	
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>           
                                                </select>
                                           </div>
                                   
                                          	<div class="user_display_form" id="select_lang">
                                                <label class="optional">Business Statement in other language</label> 
                                                  
                                              <select data-placeholder="Language" class="chosen-select" id="per_lang">
                                                <option value="">Language</option>	
                                                <!--<option value="eng">English</option>
                                                <option value="spa">Spanish</option>
                                                <option value="fre">French</option>-->
                                                
                                                <option value="eng">English</option> 
                                                <option value="man">Mandarin </option>
                                                <option value="ara">Arabic</option> 
                                                <option value="spa">Spanish </option>
                                                <option value="hin">Hindi</option> 
                                                <option value="ita">Italian</option> 
                                                <option value="rus">Russian</option> 
                                                <option value="por">Portuguese </option>
                                                <option value="ben">Bengali</option> 
                                                <option value="fre">French</option> 
                                                <option value="urd">Urdu </option>
                                                <option value="jap">Japanese</option> 
                                                <option value="ger">German </option>
                                                <option value="ame">American </option>
                                                <option value="sign">Sign</option>
                                            </select>
                                        </div>
                                    	  
                                            <div class="user_display_form" id="per_English">
                                                <label class="optional">Business Statement (In English)</label> 
                                                    <textarea class="required" name="" placeholder="limited to 100 words,please write in english"></textarea>
                                            </div>
                                            <div class="user_display_form" id="per_Mandarin">
                                                <label class="optional">Business Statement (In Mandarin)</label> 
                                                    <textarea class="required" name="" placeholder="limited to 100 words,please write in mandarin"></textarea>
                                            </div>
                                            <div class="user_display_form" id="per_Arabic">
                                                <label class="optional">Business Statement (In Arabic)</label> 
                                                    <textarea class="required" name="" placeholder="limited to 100 words,please write in arabic"></textarea>
                                            </div>
                                            <div class="user_display_form" id="per_Spanish">
                                                <label class="optional">Business Statement (In Spanish)</label> 
                                                    <textarea class="required" name="" placeholder="limited to 100 words,please write in spanish"></textarea>
                                            </div>
                                            <div class="user_display_form" id="per_Hindi">
                                                <label class="optional">Business Statement (In Hindi)</label> 
                                                    <textarea class="required" name="" placeholder="limited to 100 words,please write in hindi"></textarea>
                                            </div>
                                            <div class="user_display_form" id="per_Italian">
                                                <label class="optional">Business Statement (In Italian)</label> 
                                                    <textarea class="required" name="" placeholder="limited to 100 words,please write in itallian"></textarea>
                                            </div>
                                            <div class="user_display_form" id="per_Russian">
                                                <label class="optional">Business Statement (In Russian)</label> 
                                                    <textarea class="required" name="" placeholder="limited to 100 words,please write in russian"></textarea>
                                            </div>
                                            <div class="user_display_form" id="per_Portuguese">
                                                <label class="optional">Business Statement (In Portuguese)</label> 
                                                    <textarea class="required" name="" placeholder="limited to 100 words,please write in portuguese"></textarea>
                                            </div>
                                            <div class="user_display_form" id="per_Bengali">
                                                <label class="optional">Business Statement (In Bengali)</label> 
                                                    <textarea class="required" name="" placeholder="limited to 100 words,please write in bengali"></textarea>
                                            </div>
                                            <div class="user_display_form" id="per_French">
                                                <label class="optional">Business Statement (In French)</label> 
                                                    <textarea class="required" name="" placeholder="limited to 100 words,please write in french"></textarea>
                                            </div>
                                            <div class="user_display_form" id="per_Urdu">
                                                <label class="optional">Business Statement (In Urdu)</label> 
                                                    <textarea class="required" name="" placeholder="limited to 100 words,please write in urdu"></textarea>
                                            </div>
                                            <div class="user_display_form" id="per_Japanese">
                                                <label class="optional">Business Statement (In Japanese)</label> 
                                                    <textarea class="required" name="" placeholder="limited to 100 words,please write in japanese"></textarea>
                                            </div>
                                            <div class="user_display_form" id="per_German">
                                                <label class="optional">Business Statement (In German)</label> 
                                                    <textarea class="required" name="" placeholder="limited to 100 words,please write in greman"></textarea>
                                            </div>
                                            <div class="user_display_form" id="per_American">
                                                <label class="optional">Business Statement (In American)</label> 
                                                    <textarea class="required" name="" placeholder="limited to 100 words,please write in american"></textarea>
                                            </div>
                                            <div class="user_display_form" id="per_Sign">
                                                <label class="optional">Business Statement (In Sign)</label> 
                                                    <textarea class="required" name="" placeholder="limited to 100 words,please write in sign"></textarea>
                                            </div>
                                            
                                            
                                           
                                   </div> 
                                   
                                   
                                   <div class="green_save">
                                       <ul>
                                           <li>
                                             <button type="submit" value="Submit" class="save_btn">Save</button>
                                             <!--<a href="#" class="save_btn">Save</a>-->
                                           </li>
                                           <li>
                                            <button type="submit" value="Next" class="next_btn">Next</button>
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
  
  <script type="text/javascript">
 
$(document).ready(function(){
	$('#select_lang').hide();
	$( "#bilingual" ).change(function() {
      if($('#bilingual').val()=='yes'){
	  $('#select_lang').show();
	  }else{
	  $('#select_lang').hide();
	  }
});

	$('#per_English').hide();
	$('#per_Mandarin').hide();
	$('#per_Arabic').hide();
	$('#per_Spanish').hide();
	$('#per_Hindi').hide();
	$('#per_Italian').hide();
	$('#per_Russian').hide();
	$('#per_Portuguese').hide();
	$('#per_Bengali').hide();
	$('#per_French').hide();
	$('#per_Urdu').hide();
	$('#per_Japanese').hide();
	$('#per_German').hide();
	$('#per_American').hide();
	$('#per_Sign').hide();
	
	$( "#per_lang" ).change(function() {
      if($('#per_lang').val()=='eng'){
	  $('#per_English').show();
	  }else{
	  $('#per_English').hide();
	  }
	  
	  if($('#per_lang').val()=='man'){
	  $('#per_Mandarin').show();
	  }else{
	  $('#per_Mandarin').hide();
	  }
	  
	  if($('#per_lang').val()=='ara'){
	  $('#per_Arabic').show();
	  }else{
	  $('#per_Arabic').hide();
	  }
	  
	  if($('#per_lang').val()=='spa'){
	  $('#per_Spanish').show();
	  }else{
	  $('#per_Spanish').hide();
	  }
	  
	  if($('#per_lang').val()=='hin'){
	  $('#per_Hindi').show();
	  }else{
	  $('#per_Hindi').hide();
	  }
	  
	  if($('#per_lang').val()=='ita'){
	  $('#per_Italian').show();
	  }else{
	  $('#per_Italian').hide();
	  }
	  
	  if($('#per_lang').val()=='rus'){
	  $('#per_Russian').show();
	  }else{
	  $('#per_Russian').hide();
	  }
	  
	  if($('#per_lang').val()=='por'){
	  $('#per_Portuguese').show();
	  }else{
	  $('#per_Portuguese').hide();
	  }
	  
	  if($('#per_lang').val()=='ben'){
	  $('#per_Bengali').show();
	  }else{
	  $('#per_Bengali').hide();
	  }
	  
	  if($('#per_lang').val()=='fre'){
	  $('#per_French').show();
	  }else{
	  $('#per_French').hide();
	  }
	  
	  if($('#per_lang').val()=='urd'){
	  $('#per_Urdu').show();
	  }else{
	  $('#per_Urdu').hide();
	  }
	  
	  if($('#per_lang').val()=='jap'){
	  $('#per_Japanese').show();
	  }else{
	  $('#per_Japanese').hide();
	  }
	  
	  if($('#per_lang').val()=='ger'){
	  $('#per_German').show();
	  }else{
	  $('#per_German').hide();
	  }
	  
	  if($('#per_lang').val()=='ame'){
	  $('#per_American').show();
	  }else{
	  $('#per_American').hide();
	  }
	  
	  if($('#per_lang').val()=='sign'){
	  $('#per_Sign').show();
	  }else{
	  $('#per_Sign').hide();
	  }
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
