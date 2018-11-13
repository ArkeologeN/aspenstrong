<!-- /inner_content-->
<?php //print_r($result);?>
<div class="inner_content">
    <!-- /inner_content_w3_agile_info-->

    <!-- breadcrumbs -->
    <div class="w3l_agileits_breadcrumbs">
        <div class="w3l_agileits_breadcrumbs_inner">
            <ul>
                <li><a href="<?php echo HTTPADMIN;?>/dashboard">Home</a><span>«</span></li>
                <li>Step1 <span>«</span></li>
                <li><a href="<?php echo HTTPADMIN;?>/edituser2/<?php echo $entry_id;?>">Step2 </a><span>«</span></li>
				<li><a href="<?php echo HTTPADMIN;?>/edituser3/<?php echo $entry_id;?>">Step3 </a><span>«</span></li>
				<li><a href="<?php echo HTTPADMIN;?>/edituser4/<?php echo $entry_id;?>">Step4 </a><span>«</span></li>
				<li><a href="<?php echo HTTPADMIN;?>/edituser5/<?php echo $entry_id;?>">Step5 </a><span>«</span></li>
            </ul>
        </div>
    </div>
    <!-- //breadcrumbs -->

    <div class="inner_content_w3_agile_info two_in">
        <h2 class="w3_inner_tittle">Step1</h2>

        <!--/forms-->
        <div class="forms-main_agileits">
            <!--/set-2-->

            <div class="wthree_general graph-form agile_info_shadow ">
                <h3 class="w3_inner_tittle two">Personal Details </h3>

                <div class="grid-1 ">
                    <div class="form-body">
                    <?= $this->Flash->render(); ?>
                        <form class="form-horizontal" action="" method="post">
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
                             <div class="form-group">
                                <label for="focusedinput" class="col-sm-2 control-label">First Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control1" id="focusedinput" name="data[first_name]" value="<?php echo $result['first_name'];?>" placeholder="First Name">
                                </div>
                            </div>
                           <div class="form-group">
                                <label for="focusedinput" class="col-sm-2 control-label">Last Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control1" id="focusedinput" name="data[last_name]" value="<?php echo $result['last_name'];?>" placeholder="Last Name">
                                </div>
                            </div>
                           <div class="form-group">
                                <label for="focusedinput" class="col-sm-2 control-label">Organization</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control1" id="focusedinput" name="data[organization]" value="<?php echo $result['organization'];?>" placeholder="Organization">
                                </div>
                            </div>
							
                           <!--<div class="form-group">
                                <label for="radio" class="col-sm-2 control-label">Visibility</label>
                                <div class="col-sm-8">
                                    <div class="radio-inline">
                                        <label><input type="radio" name="data[visibility]" value="<?php //echo $result['preferred'];?>" <?php //if($result['preferred']=='public'){echo "checked";}?>> Public</label>
                                    </div>
                                    
                                </div>
                            </div>-->
                            
                           <div class="form-group">
                                                <label class="label_text1"><input type="checkbox" id="checkbox-1" class="regular-checkbox" value="1" <?php if(isset($result['use_credentials']) && $result['use_credentials']==1){ echo 'checked';}?> name="data[use_credentials]" ></label>  
                                                <label class="label_text1">Use my name and Credential please. If you do not check this you business name will be displayed on your profile.</label>
                          </div>
                          <?php if($result['title'] !=""){
						   $titles=explode('|',$result['title']);
						   $count_titles=count($titles);
						   }else{$titles="";$count_titles=1;}
						   $count_titles=count($titles);
						  if(!empty($titles)){
						  $i=1;
						  foreach($titles as $title){
						  if($count_titles==1){
						  ?>
							 
						  <div class="form-group">
		                       <label for="focusedinput" class="col-sm-2 control-label">Add Credentials</label>
		                       <div class="col-sm-8">
							   <div class="col-sm-8">
		                       <!--<input type="text" name="" class="form-control required cred" value="<?php //echo $title;?>">-->
                               <div id="field"><input autocomplete="off" class="input form-control2" id="field1" name="data[credentials][]" type="text" placeholder="Add Credentials" data-items="8" value="<?php echo str_replace(',',' , ',$title);?>" /><!--<button id="b1" class="btn2 add-more" type="button">+</button>--></div>
							   </div>
							   <!--<div class="col-sm-4">
		                       <button onClick = "remove_li2(this);" type="button" class="btn btn-success"><i class="fa fa-close"></i></button>
							   </div>-->
		                       </div>
		                  </div>
                          <?php }else{
							  if($count_titles !=$i){				  
							  ?>
                         <div class="form-group">
		                       <label for="focusedinput" class="col-sm-2 control-label">&nbsp;</label>
		                       <div class="col-sm-8">
							   <div class="col-sm-8">
		                      <!-- <input type="text" name="" class="form-control required cred" value="<?php //echo $title;?>">-->
                               <div id="field"><input autocomplete="off" class="input form-control2" id="field<?php echo $i;?>" name="data[credentials][]" type="text" placeholder="Add Credentials" data-items="8" value="<?php echo str_replace(',',' , ',$title);?>" /> <!--<button id="remove<?php //echo $i;?>" class="btn2 btn-danger remove-me" >-</button>--></div><div id="field"></div>
							   </div>
							   <!--<div class="col-sm-4">
		                       <button onClick = "remove_li2(this);" type="button" class="btn btn-success"><i class="fa fa-close"></i></button>
							   </div>-->
		                       </div>
		                  </div>
                          
                          <?php }else{?>
                          
                           <div class="form-group">
		                       <label for="focusedinput" class="col-sm-2 control-label">&nbsp;</label>
		                       <div class="col-sm-8">
		                       <!--<input type="text" name="" class="form-control required cred" value="<?php //echo $title;?>">-->
                               <div id="field"><input autocomplete="off" class="input form-control2" id="field<?php echo $i;?>" name="data[credentials][]" type="text" placeholder="Add Credentials" data-items="8" value="<?php echo str_replace(',',' , ',$title);?>" /><!--<button id="b1" class="btn2 add-more" type="button">+</button>--></div>
							   </div>
                            </div>
                          <?php }}?>
						  <?php $i++;}}?>
					  
					  <!--<div class="form-group" id="add-credt">
	                          <label for="focusedinput" class="col-sm-2 control-label">Add Credentials</label>
	                         <div class="col-sm-8">
							 <div class="col-sm-8">
	                         <input type="text" name="data[credential0]" class="form-control required cred">
							 </div>
							 <div class="col-sm-4">
	                         <button type="button" class="btn btn-primary" id="append-crdt"><i class="fa fa-plus"></i></button>
							 </div>
	                         </div>
		               </div>-->
					   </div> 
					   
					 
					   
					   
					    <?php //} if($result['entry_type']=='organization'){ ?>
					  <div class="organization">
					  <div class="form-group">
                                <label for="focusedinput" class="col-sm-2 control-label">Organization</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control1" name="data[organization]" id="focusedinput" value="<?php echo $result['organization'];?>" placeholder="First Name">
                                </div>
                            </div>
                           <div class="form-group">
                                <label for="focusedinput" class="col-sm-2 control-label">Contact First Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control1" name="data[first_name]" id="focusedinput" value="<?php echo $result['first_name'];?>" placeholder="Contact Last Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="focusedinput" class="col-sm-2 control-label">Contact Last Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control1" name="data[last_name]" id="focusedinput" value="<?php echo $result['last_name'];?>" placeholder="Contact Last Name">
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
                                 <button type="submit" class="btn btn-primary submit-btn">Approve</button>
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
	var totalcount='<?php echo $count_titles;?>';
	
    var next = '<?php echo $count_titles;?>';
	
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