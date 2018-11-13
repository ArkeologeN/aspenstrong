<!-- /inner_content--> 
<?php //print_r($result);?>
<div class="inner_content">
    <!-- /inner_content_w3_agile_info-->

    <!-- breadcrumbs -->
    <div class="w3l_agileits_breadcrumbs">
        <div class="w3l_agileits_breadcrumbs_inner">
            <ul>
                <li><a href="<?php echo HTTPADMIN;?>/dashboard">Home</a><span>«</span></li>
                <li>Personal Info <span>«</span></li>
                <li><a href="<?php echo HTTPADMIN;?>/edituser2/<?php echo $entry_id;?>">Address and Location </a><span>«</span></li>
				<li><a href="<?php echo HTTPADMIN;?>/edituser3/<?php echo $entry_id;?>">Website and Social Links </a><span>«</span></li>
				<li><a href="<?php echo HTTPADMIN;?>/edituser4/<?php echo $entry_id;?>">Professional Details </a><span>«</span></li>
				<li><a href="<?php echo HTTPADMIN;?>/edituser5/<?php echo $entry_id;?>">Specialities </a><span>«</span></li>
            </ul>
        </div>
    </div>
    <!-- //breadcrumbs -->

    <div class="inner_content_w3_agile_info two_in">
        <h2 class="w3_inner_tittle">Personal Info</h2>

        <!--/forms-->
        <div class="forms-main_agileits">
            <!--/set-2-->

            <div class="wthree_general graph-form agile_info_shadow ">
                <h3 class="w3_inner_tittle two">Personal Info </h3>

                <div class="grid-1 ">
                    <div class="form-body">
                    <?= $this->Flash->render(); ?>
                        <form class="form-horizontal" action="" method="post" id="myform">
						<?php //if(!empty($results)){
						      //foreach($results as $result){
						?>
						<div class="form-group">
                                <label for="radio" class="col-sm-2 control-label">I am an</label>
                                <div class="col-sm-8">
                                    <div class="radio-inline">
                                        <label><input name="data[entry_type]"  class="entry_type" value="individual" type="radio" <?php if($result['entry_type']=='individual'){echo "checked";}?>> Individual</label>
                                    </div>
                                    <div class="radio-inline">
                                        <label>
                                            <input name="data[entry_type]" class="entry_type" value="organization" type="radio" <?php if($result['entry_type']=='organization'){echo "checked";}?>> Organization</label>
                                    </div>
                                    
                                </div>
                            </div>
							
							<?php  //if($result['entry_type']=='individual'){ ?>
						    <div class="individual">
                             <div class="form-group user_display_form_vals">
                                <label for="focusedinput" class="col-sm-2 control-label">First Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control1 required" id="first_name1" name="data[first_name1]" value="<?php echo $result['first_name'];?>" placeholder="First Name" >
                                </div>
                            </div>
                           <div class="form-group user_display_form_vals">
                                <label for="focusedinput" class="col-sm-2 control-label">Last Name</label>
                                <div class="col-sm-8 ">
                                    <input type="text" class="form-control1 required" id="last_name1" name="data[last_name1]" value="<?php echo $result['last_name'];?>" placeholder="Last Name" >
                                </div>
                            </div>
                           <div class="form-group user_display_form_vals">
                                <label for="focusedinput" class="col-sm-2 control-label">Business Name</label>
                                <div class="col-sm-8 ">
                                    <input type="text" class="form-control1 required" id="organization1" name="data[organization1]" value="<?php echo $result['organization'];?>" placeholder="Organization" >
                                </div>
                            </div>
							
                           
                            
                           <div class="form-group">
                                                <label class="label_text1"><input type="checkbox" id="checkbox-1" class="regular-checkbox" value="1" <?php if(isset($result['use_credentials']) && $result['use_credentials']==1){ echo 'checked';}?> name="data[use_credentials]"></label>  
                                                <label class="label_text1">Use my name and credentials please. If you do check this your business name will be displayed </label>
                          </div>
                        
							 
						  <div class="form-group user_display_form_vals">
		                       <label for="focusedinput" class="col-sm-2 control-label">Add Credentials</label>
		                       <div class="col-sm-8">
							   <div class="col-sm-8">
		                       <!--<input type="text" name="" class="form-control required cred" value="<?php //echo $title;?>">-->
                               <div id="field"><input autocomplete="off" class="input form-control2" id="field1" name="data[credentials]" type="text" placeholder="Add Credentials" data-items="8" value="<?php if(isset($result['title']) && $result['title'] != ""){ echo str_replace(',',', ',$result['title']);}?>" required="required" /><!--<button id="b1" class="btn2 add-more" type="button">+</button>--></div>
							   </div>
							   
		                       </div>
		                  </div>
                          
                          
                          
					  
					  
					   </div> 
					   
					 
					   
					   
					    <?php //} if($result['entry_type']=='organization'){ ?>
					  <div class="organization">
					  <div class="form-group user_display_form_vals">
                                <label for="focusedinput" class="col-sm-2 control-label">Organization</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control1 required" name="data[organization2]" id="organization2" value="<?php echo $result['organization'];?>" placeholder="First Name" required="required">
                                </div>
                            </div>
                           <div class="form-group user_display_form_vals">
                                <label for="focusedinput" class="col-sm-2 control-label">Contact First Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control1 required" name="data[first_name2]" id="first_name2" value="<?php echo $result['first_name'];?>" placeholder="Contact Last Name" required="required">
                                </div>
                            </div>
                            <div class="form-group user_display_form_vals">
                                <label for="focusedinput" class="col-sm-2 control-label">Contact Last Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control1 required" name="data[last_name2]" id="last_name2" value="<?php echo $result['last_name'];?>" placeholder="Contact Last Name" required="required">
                                </div>
                            </div>
							
							<?php  /*if($result['locations']){
							$locations=unserialize($result['locations']);
							}else{
							$locations=array('location1','location2','location3','location4','location5');
							}*/
						
						    //$j=1;
						    //for($i=0;$i<=4;$i++){
						
						   ?>
						   <!--<div class="form-group">
                                <label for="focusedinput" class="col-sm-2 control-label"><?php //echo __("Location".$j) ?></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control1" name="data[location][]"  id="focusedinput" value="<?php //if(isset($locations[$i]) && $locations[$i] != ""){ echo $locations[$i];} ?>" placeholder="<?php //echo __("Location".$j) ?>">
                                </div>
                            </div>-->
						   <?php //$j++; }?> 
						   </div>
						 <?php //}?>  
						<?php  //} //}?>	
                        <div class="form-group">
                                <label for="focusedinput" class="col-sm-2 control-label">&nbsp;</label>
                                <div class="col-sm-8">
                                <a href="<?php echo HTTPADMIN;?>/edituser2/<?php echo $result['id'];?>" class="btn btn-primary submit-btn" style="margin-left: 10px;">Next</a>&nbsp;
                                 <button type="submit" class="btn btn-primary submit-btn">Save & Next</button>
                                 
                                </div>
                            </div>
                        
                        </form>
                    </div>

                </div>
            </div>

            <!--//set-2-->

        </div>
        <!--//forms-inner-->
    </div>
    <!--//forms-->

</div>
<!-- //inner_content_w3_agile_info-->
</div>
<!-- //inner_content-->

<script type="text/javascript" >




$(document).ready(function(){
	
	$('#myform').validate({ // initialize the plugin
	
	    errorElement: 'span',
        errorPlacement: function (error, element) {
            error.insertAfter($(element).parents('.user_display_form_vals'));
        }
	   });
	
	/*var totalcount='<?php //echo $count_titles;?>';
	
    var next = '<?php //echo $count_titles;?>';
	
    $(".add-more").click(function(e){
        e.preventDefault();
        var addto = "#field" + next;
        var addRemove = "#field" + (next);
        next = next + 1;
        var newIn = '<input autocomplete="off" class="input form-control2" id="field' + next + '" name="data[credentials][]" type="text">';
        var newInput = $(newIn);
        var removeBtn = '<button id="remove' + (next - 1) + '" class="btn2 btn-danger remove-me" >-</button></div><div id="field">';
        var removeButton = $(removeBtn);
        $(addto).after(newInput);
        $(addRemove).after(removeButton);
        $("#field" + next).attr('data-source',$(addto).attr('data-source'));
        $("#count").val(next);  
        
            
    });
    
$('.remove-me').click(function(e){
                e.preventDefault();
                var fieldNum = this.id.charAt(this.id.length-1);
                var fieldID = "#field" + fieldNum;
                $(this).remove();
                $(fieldID).remove();
            });
			*/
    
	<?php  if($result['entry_type']=='individual'){?>
		$('.organization').hide();
	    $('.individual').show();
		<?php } ?>
		<?php  if($result['entry_type']=='organization'){?>
		$('.individual').hide();
	    $('.organization').show();
		<?php } ?>
	
	$('.entry_type').click(function(){
    var abc = $(this).val();
	if(abc == 'individual'){
	$('.organization').hide();
	$('.individual').show();
	}
	if(abc == 'organization'){
	$('.individual').hide();
	$('.organization').show();
	}					
	});
	
});


</script>
