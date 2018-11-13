<?php //if(isset($results)){print_r($results);}?>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gutter">
  <div class="profile_bg">
    <div class="container">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gutter">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 user_dash">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gutter">
            <div class="admin-user">
              <div class="user_image"> <img src="<?php echo HTTP;?>img/logodirectry/images.png" width="100%"  height="auto" alt="image" class="img-circle"> </div>
              <h4> Name </h4>
            </div>
            
            <!--new side menu-->
            <div class="column grid_3 section_left_side">
              <nav>
                <ul class="section_left_nav">
                  <li class="expandable1 mar_bottom">
                    <div class="section_left_nav_section_heading" style="cursor: pointer;"> Home <span><i class="fa fa-angle-down" aria-hidden="true"></i></span></div>
                    <ul class="section_left_nav_sub_section" id="show_me">
                      <li> <a href="<?php echo HOME_WEB;?>users/logout" target="_blank">Logout</a></li>
                      <li> <a href="<?php echo HOME_WEB;?>users/update_password">Update Password</a></li>
                      <li> <a href="<?php echo HOME_WEB;?>users/update_email">Update Email</a></li>
                      <!-- <li> <a href="javascript:void(0);" target="_blank">Edit Profile</a></li>-->
                    </ul>
                  </li>
                  
                  <!--<li class="mar_bottom"><a href="<?php echo HOME_WEB;?>profile/editProfile" target="_blank" class="section_left_nav_section_heading">Edit Profile</a></li>-->
                  
                  <li class="mar_bottom"><a href="#" class="section_left_nav_section_heading" target="_blank">Community</a></li>
                  <li class="expandable2 mar_bottom">
                    <div class="section_left_nav_section_heading" style="cursor: pointer;"> Help <span><i class="fa fa-angle-down" aria-hidden="true"></i></span></div>
                    <ul class="section_left_nav_sub_section" id="show_help">
                      <li> <a href="#">Licensing & Qualifications</a></li>
                      <li> <a href="#">Support</a> </li>
                    </ul>
                  </li>
                  <li class="expandable3 mar_bottom">
                    <div class="section_left_nav_section_heading" style="cursor: pointer;"> Settings <span><i class="fa fa-angle-down" aria-hidden="true"></i></span></div>
                    <ul class="section_left_nav_sub_section" id="show_setting">
                      <li><a href="javascript:void(0);" target="_blank">Delete Account</a></li>
                      <li><a href="javascript:void(0);" target="_blank">Deactivate Account</a></li>
                    </ul>
                  </li>
                </ul>
              </nav>
            </div>
            <!--end new side menu--> 
          </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 user_dash" id="click2">
          <form id="myform" method="post" action="">
            <div class="user_signup">
              <div class="login_head"> <i class="fa fa-file-text-o"></i>
                <h2>Name and Organization</h2>
              </div>
              <ul class="cs-form-element half-input">
                <li>
                  <label>I am an</label>
                  <ul class="radio-box">
                    <li>
                      <input name="data[entry_type]" id="show_profile" type="radio" value="individual" checked="checked">
                      <label for="show_profile" id="indiv" class="on_indiv1">Individual</label>
                    </li>
                    <li>
                      <input name="data[entry_type]" id="hide_profile" type="radio" value="organization">
                      <label for="hide_profile" id="organ" class="on_organ2">Organization</label>
                    </li>
                  </ul>
                </li>
                <li class="paddng_left">
                  <label>Visibility</label>
                  <ul class="radio-box">
                    <li class="tooltip_private">
                      <input name="data[visibility]" id="show_form" type="radio" value="public" checked="checked">
                      <label for="show_form">Public</label>
                      <span class="tooltiptext">Public my profile will be visibility on the Aspen Strong provider directory</span> </li>
                    <li class="tooltip_private">
                      <input name="data[visibility]" id="hide_form" type="radio" value="private">
                      <label for="hide_form">Private</label>
                      <span class="tooltiptext">Private my profile will only be visible to Aspen Strong - 
                      I will receive monthly emails from Aspen Strong to communicate information regarding mental health in the Roaring Fork valley.</span> </li>
                    <!--<li class="tooltip_private">Hover over me
                                  	<span class="tooltiptext">Tooltip text</span>
                                </li>-->
                  </ul>
                </li>
              </ul>
            </div>
            
            <!--for individual-->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="indiv1">
              <div class="user_display_form user_display_form_vals">
                <label class="required">First Name</label>
                <input type="text" name="data[first_name]" class="required valid" value="" required="required">
              </div>
              <div class="user_display_form user_display_form_vals">
                <label class="required">Last Name</label>
                <input type="text" name="data[last_name]" class="required valid" value="" required="required">
              </div>
              <div class="user_display_form user_display_form_vals">
                <label class="optional">Business Name</label>
                <input type="text" name="data[organization1]" class="required valid" value="" required="required">
              </div>
              </br>
              <div class="checkbox_click_step3">
                <input type="checkbox" class="" name="data[use_credentials]" value="1">
                <label> Use my name and Credential please. If you do not check this your business name will be displayed on your profile.</label>
              </div>
              <div>
                <div class="login_head"> <i class="fa fa-file-text-o"></i>
                  <h2>CREDENTIALS </h2>
                  <h5>Example MA, LPC, PHD</h5>
                </div>
                <div class="user_credential user_display_form_vals" id="field1">
                  <label class="required">Add credential</label>
                  <input type="text" name="data[title]" value="" required="required">
                  <!--<a href="javascript:void(0);" class="user_add add-more"> <i class="fa fa-plus" aria-hidden="true"></i> </a>--> 
                </div>
                <!--<div class="user_credential">
                                            <label class="required">Add credential</label>
                                            <input type="text" name="data[title][]" value="" required="required">
                                            <a href="javascript:void(0);" class="user_add add-more"> <i class="fa fa-plus" aria-hidden="true"></i> </a>
                                        </div> --> 
                
              </div>
              <div class="green_save">
                <ul>
                  <li>
                    <button type="submit" value="Submit" class="save_btn">Save</button>
                    <!--<a href="#" class="save_btn">Save</a>--> 
                  </li>
                </ul>
              </div>
            </div>
            
            <!--for organization-->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="organ2">
              <div class="user_display_form user_display_form_vals">
                <label class="">Organization</label>
                <input type="text" name="data[organization2]" class="" value="" required="required">
              </div>
              <div class="user_display_form user_display_form_vals">
                <label class="">Contact First Name</label>
                <input type="text"  name="data[contact_first_name]" value="" required="required">
              </div>
              <div class="user_display_form user_display_form_vals">
                <label class="">Contact Last Name</label>
                <input type="text" name="data[contact_last_name]" value="" required="required">
              </div>
              <!--<div class="user_display_form">
                                           <label class="">Location 1</label> 
                                                <input type="text" name="data[locations][]"  class="" value="" placeholder="location1">
                                       </div>
                                       <div class="user_display_form">
                                           <label class="">Location 2</label> 
                                                <input type="text" name="data[locations][]" value="" placeholder="location2">
                                       </div>
                                       <div class="user_display_form">
                                           <label class="">Location 3</label> 
                                                <input type="text" name="data[locations][]" value="" placeholder="location3">
                                       </div>
                                       <div class="user_display_form">
                                           <label class="">Location 4</label> 
                                                <input type="text" name="data[locations][]" value="" placeholder="location4">
                                       </div>
                                       <div class="user_display_form">
                                           <label class="">Location 5</label> 
                                                <input type="text" name="data[locations][]" value="" placeholder="location5">
                                       </div>-->
              
              <div class="green_save">
                <ul>
                  <li>
                    <button type="submit" value="Submit" class="save_btn">Save</button>
                    <!--<a href="#" class="save_btn">Save</a>--> 
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
<script type="text/javascript">
 function myfunction(id){

//var fieldNum = id.charAt(this.id.length-1);
 var fieldID = "#field" + id;
 $(id).remove();
 $(fieldID).remove();
	}
$(document).ready(function(){

var totalcount=2;
	
   var next = 1;
	//<input type="text" name="" value="" required="required" id="field<?php //echo $i;?>" name="data[credentials][]" value="">
   //<a href="javascript:void(0);" class="user_add add-more"> <i class="fa fa-plus" aria-hidden="true"></i> </a>
   //<a href="javascript:void(0);" id="remove<?php //echo $i;?>" class="user_close remove-me"> <i class="fa fa-times" aria-hidden="true"></i> </a>
    $(".add-more").click(function(e){
	//alert(next);
        e.preventDefault();
	    
        var addto = "#field" + next;
		
        var addRemove = "#field" + (next);
        next = next + 1;
		
        var newIn = '<div class="user_credential user_display_form_vals" id="field' + next + '"><label class="required">Add credential</label><input autocomplete="off" name="data[credentials][]" type="text" required="required"><a href="javascript:void(0);" id="' + (next) + '" class="user_close remove-me" onclick="myfunction(this.id)" ><i class="fa fa-times" aria-hidden="true"></i></a></div>';
        var newInput = $(newIn);
		var removeBtn = '';
        var removeButton = $(removeBtn);
		if($(addto).length == 0) {
		$("#field1").after(newInput);	
		}else{
		$(addto).after(newInput);	
		}
        
        $(addRemove).after(removeButton);
        $("#field" + next).attr('data-source',$(addto).attr('data-source'));
        $("#count").val(next);  
        
            
    });
    
$('.remove-me').click(function(e){
                //e.preventDefault();
				//alert(this.id);
                var fieldNum = this.id.charAt(this.id.length-1);
                var fieldID = "#field" + fieldNum;
                //$(this).remove();
                $(fieldID).remove();
            });



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
		
/*var text = $('#myform').find('input[name="data[entry_type]"]').val();
alert(text);*/
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
