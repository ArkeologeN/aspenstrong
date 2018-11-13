<?php //print_r($asConnection);;?>
<!-- /inner_content-->
<div class="inner_content">
    <!-- /inner_content_w3_agile_info-->
    <!-- breadcrumbs -->
    <?= $this->Flash->render(); ?>
    <div class="w3l_agileits_breadcrumbs">
        <div class="w3l_agileits_breadcrumbs_inner">
            <ul>
                <li><a href="<?php echo HTTPADMIN;?>/dashboard">Home</a><span>«</span></li>
                <li><a href="<?php echo HTTPADMIN;?>/edituser/<?php echo $asConnection['id'];?>">Step1 </a><span>«</span></li>
                <li><a href="<?php echo HTTPADMIN;?>/edituser2/<?php echo $asConnection['id'];?>">Step2 </a><span>«</span></li>
				<li><a href="<?php echo HTTPADMIN;?>/edituser3/<?php echo $asConnection['id'];?>">Step3 </a><span>«</span></li>
				<li>Step4 <span>«</span></li>
				<li><a href="<?php echo HTTPADMIN;?>/edituser5/<?php echo $asConnection['id'];?>">Step5 </a><span>«</span></li>
            </ul>
        </div>
    </div>
    <!-- //breadcrumbs -->

    <div class="inner_content_w3_agile_info two_in">
        <h2 class="w3_inner_tittle">Step4</h2>

        <!--/forms-->
       

<div class="forms-main_agileits">
<!--/set-2-->
<div class="wthree_general graph-form agile_info_shadow ">
  <h3 class="w3_inner_tittle two"> Academics </h3>
  <div class="grid-1 ">
    <div class="form-body">
      <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
      <div class="grid-1 graph-form agile_info_shadow">
      <div class="form-group">
          <label for="smallinput" class="col-sm-2 control-label label-input-sm">School most recently graduated</label>
          <div class="col-sm-8">
            <input class="form-control1 input-sm" id="smallinput" placeholder="School most recently graduated" name="data[as_connections_meta][school]" type="text" value="<?php echo $asConnection['as_connections_meta']['school'];?>">
          </div>
        </div>
        <div class="form-group">
          <label for="smallinput" class="col-sm-2 control-label label-input-sm">Year Graduated</label>
          <div class="col-sm-8">
            <input class="form-control1 input-sm" id="smallinput" placeholder="Year Graduated" type="text" name="data[as_connections_meta][school_year]" value="<?php echo $asConnection['as_connections_meta']['school_year'];?>">
          </div>
        </div>
        <div class="form-group">
          <label for="selector1" class="col-sm-2 control-label">Years in practice</label>
          <div class="col-sm-8">
            <select name="data[as_connections_meta][practice]" id="selector1" class="form-control1" >
             <option value="">Years in practice</option>
             <?php for($i=1;$i<=50;$i++){?>
	        <option value="<?php echo $i;?>" <?php if($asConnection['as_connections_meta']['practice']==$i){echo 'selected';}?>><?php echo $i;?> Years</option>
             <?php }?>
	         </select>
          </div>
        </div>
        
      </div>
      
      <h3 class="w3_inner_tittle two"> Malpractice Insurance </h3>
      <div class="grid-1 graph-form agile_info_shadow">
       <div class="form-group">
         <label class="col-sm-2 control-label">Malpractice Insurance</label> 
           <div class="col-sm-8">
            <select name="data[as_connections_meta][malpractice_insurance]" id="malpractice_insurance" class="form-control1">
            <option value="">Do you have Malpractice Insurance ?</option>
            <option  value="Yes" <?php if($asConnection['as_connections_meta']['malpractice_insurance']=='Yes'){ echo 'selected';}?>>Yes</option>
            <option  value="No" <?php if($asConnection['as_connections_meta']['malpractice_insurance']=='No'){ echo 'selected';}?>>No</option>
            </select>
            </div> 
       </div>
       
        <div class="form-group" id="malpractice_carrer">
          <label class="col-sm-2 control-label">Malpractice Carrier</label> 
          <div class="col-sm-8">
           <input type="text" class="form-control1" name="data[as_connections_meta][malpractice_carrer]" value="<?php echo $asConnection['as_connections_meta']['malpractice_carrer']?>" >
           </div>
        </div>
                                           
       </div>
      
      <h3 class="w3_inner_tittle two"> Credential Type </h3>
      
      <?php if($asConnection['entry_type']=='individual'){?>
      
      <div class="grid-1 graph-form agile_info_shadow">
      
      <div class="form-group">
      <label class="col-sm-2 control-label">Provider Type</label> 
      <div class="col-sm-8">
       <select class="multiselect-value form-control1" name="data[as_connections_meta][therapist_type]">
       <option value="">Select One</option>
        <?php foreach($therapists as $therapist){ //print_r($therapist);?>
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
      </div>
                                        
      <div class="form-group">
      <label class="col-sm-2 control-label">Are you licensed?</label> 
      <div class="col-sm-8">
       <select class="form-control1" name="data[as_connections_meta][licence_status]"  id="licensed">
       <option value=""> Are you licensed ? </option>  
       <option <?php if($asConnection['as_connections_meta']['licence_status']==1){echo "selected";}?> value="yes">Yes</option>
       <option <?php if($asConnection['as_connections_meta']['licence_status']==0 && $asConnection['as_connections_meta']['licence_status']!=""){echo 'selected';}?> value="no">No</option>
       </select>
       </div>
      </div> 
                                          
     <div class="form-group" id="licensed_yes">
      <label class="col-sm-2 control-label">License or Certification No.</label> 
      <div class="col-sm-8">
      <input type="text" class=" form-control1" name="data[as_connections_meta][licence]" value="<?php echo $asConnection['as_connections_meta']['licence'];?>" >
      </div>
     </div>                                      
      <div class="form-group" id="licensed_no">
      <label class="col-sm-2 control-label">Are you pre-licensed?</label> 
      <div class="col-sm-8">
      <select class="form-control1" name="data[as_connections_meta][pre_licenced]" id="pre-licensed" >
      <option value=""> Are you pre-licensed? </option>
      <option <?php if($asConnection['as_connections_meta']['pre_licenced']=='yes'){echo 'selected';}?> value="yes">Yes</option>
      <option <?php if($asConnection['as_connections_meta']['pre_licenced']=='no'){echo 'selected';}?> value="no">No</option>
      </select>
      </div>
      </div> 
                                          
      <div id="show_yes">
                                          
      <div class="form-group">
      <label class="col-sm-2 control-label">Pre-License/registered NO</label> 
      <div class="col-sm-8">
      <input type="text" class="form-control1" name="data[as_connections_meta][prelic_no]" value="<?php echo $asConnection['as_connections_meta']['prelic_no']?>">
      </div>
      </div> 
                                            
      <div class="form-group">
      <label class="col-sm-2 control-label">Supervisor's Name </label> 
      <div class="col-sm-8">
      <input type="text" class=" form-control1" name="data[as_connections_meta][supervisor_name]" value="<?php echo $asConnection['as_connections_meta']['supervisor_name']?>" >
      </div>
      </div>
                                          
      <div class="form-group">
      <label class="col-sm-2 control-label">Supervisor's Licence</label> 
      <div class="col-sm-8">
      <input type="text" class="form-control1" name="data[as_connections_meta][supervisor_licence]" value="<?php echo $asConnection['as_connections_meta']['supervisor_licence']?>" >
      </div>
      </div>
                                           
      <div class="form-group">
      <label class="col-sm-2 control-label">Supervisor's Phone number</label> 
      <div class="col-sm-8">
      <input type="text" class="form-control1" name="data[as_connections_meta][supervisor_phone]" value="<?php echo $asConnection['as_connections_meta']['supervisor_phone']?>">
      </div>
      </div>
                                           
      <div class="form-group">
      <label class="col-sm-2 control-label">Supervisor's Email</label> 
      <div class="col-sm-8">
      <input type="text" class="form-control1" value="<?php echo $asConnection['as_connections_meta']['supervisor_email']?>" name="data[as_connections_meta][supervisor_email]">
      </div>
      </div>
                                           
      </div>
                                         
      <div id="show_no">
      <div class="form-group">
      <label class="col-sm-2 control-label">Diploma/Certificate Type or License Membership Number</label> 
      <div class="col-sm-8">
      <input type="text" class=" form-control1" name="data[as_connections_meta][mem_no]" value="<?php echo $asConnection['as_connections_meta']['mem_no']?>" ame="data[as_connections_meta][mem_no]">
      </div>
      </div>
      </div>
        
      </div>
      
      <?php }?>
      
       <?php if($asConnection['entry_type']=='organization'){?>
      
      <div class="grid-1 graph-form agile_info_shadow"> 
      <div class="form-group">
      <label class="col-sm-2 control-label">Are you a </label> 
      <div class="col-sm-8">
      <select class="form-control1" name="data[as_connections_meta][treatment_type]">
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
       </div> 
                                    	     
     <div class="form-group">
       <label class="col-sm-2 control-label">Do you have licensed professionals working at your organization ?</label> 
       <div class="col-sm-8">
       <select class="form-control1" name="data[as_connections_meta][prof_org]">
       <option value="">Select One</option>
       <option <?php if(isset($asConnection['as_connections_meta']['prof_org']) && $asConnection['as_connections_meta']['prof_org']=="Yes"){echo "selected";}?> value="Yes">Yes</option>
       <option <?php if(isset($asConnection['as_connections_meta']['prof_org']) && $asConnection['as_connections_meta']['prof_org']=="No"){echo "selected";}?> value="No">No</option>
       </select> 
     </div>
     </div>
                                            
      <div class="form-group">
      <label class="col-sm-2 control-label">Are you an accredited institute ?</label> 
      <div class="col-sm-8">
      <select class="form-control1" name="data[as_connections_meta][accredatation]" id="acc">
      <option value=""> Accredatation </option>
      <option <?php if(isset($asConnection['as_connections_meta']['accredatation']) && $asConnection['as_connections_meta']['accredatation']=="Yes"){echo "selected";}?> value="Yes">Yes</option>
       <option <?php if(isset($asConnection['as_connections_meta']['accredatation']) && $asConnection['as_connections_meta']['accredatation']=="No"){echo "selected";}?> value="No">No</option>
       </select> 
       </div>
     </div>
                                            
      <div class="form-group" id="name">
       <label class="col-sm-2 control-label">Name of Accreditation</label> 
       <div class="col-sm-8">
       <input type="text" class="form-control1 " value="<?php echo $asConnection['as_connections_meta']['accredatation_name'];?>" name="data[as_connections_meta][accredatation_name]" >
       </div>
      </div>
      
      <div class="form-group">
         <!--<input type="hidden" value="<?php //echo count($asConnection['as_connections_addresses']);?>" name="data[totalAds]" />
         <input type="hidden" value="<?php //echo count($asConnection['as_connections_emails']);?>" name="data[totalEmails]" />-->
         <!--<input type="hidden" value="<?php //echo count($asConnection['connection_credentials']);?>" name="data[totalCredentials]" />-->
         <input type="hidden" value="<?php echo $asConnection['as_connections_meta']['id'];?>" name="data[as_connections_meta][metaId]" />
                                <label for="focusedinput" class="col-sm-2 control-label">&nbsp;</label>
                                <div class="col-sm-8">
                                 <button type="submit" class="btn btn-primary submit-btn">Approve</button>
                                </div>
         </div>                                      
      </div>
      
      <?php }?>
       
       <?php if($asConnection['entry_type']=='individual'){?> 
       <h3 class="w3_inner_tittle two">Alternate Credential</h3>
         <div class="grid-1 graph-form agile_info_shadow">
         
         <?php $i=1;if(!empty($asConnection['connection_credentials'])){
		foreach($asConnection['connection_credentials'] as $credentials){?>
         <div class="form-group">
         <label class="col-sm-2 control-label">Licensing Authority  or Accrediting Institution, Membership, Organization</label> 
         <div class="col-sm-8">
         <input type="text" class="valid form-control1" name="data[credentialing][cred_val<?php echo $i;?>]" value="<?php echo $credentials['credentialing'];?>" > 
         <input type="hidden" name="data[credentialing][cred_id<?php echo $i;?>]" value="<?php echo $credentials['id'];?>">
         </div>
         </div>
         <div class="add_more_btn" id="add-credent">
         <?php if($i !=1){?>
         <a href="javascript:void(0);" class="user_close" onClick="remove_li(this);"> <i class="fa fa-times" aria-hidden="true"></i> </a>
         <?php }?>
         </div>
         <?php $i++;}}else{?>
         <div class="form-group">
         <label class="col-sm-2 control-label">Licensing Authority  or Accrediting Institution, Membership, Organization</label> 
         <div class="col-sm-8">
         <input type="text" class="valid form-control1" name="data[credentialing][cred_val<?php echo $i;?>]" value="">
         </div>
         </div>
         <?php }?>
         <div class="add_more_btn" id="add-credent">
          <a href="javascript:void(0);" class="append-btn"> Add Other Credentials <i class="fa fa-plus" aria-hidden="true"></i> </a>
         </div>
        <div class="form-group">
         <!--<input type="hidden" value="<?php //echo count($asConnection['as_connections_addresses']);?>" name="data[totalAds]" />
         <input type="hidden" value="<?php //echo count($asConnection['as_connections_emails']);?>" name="data[totalEmails]" />-->
         <input type="hidden" value="<?php echo count($asConnection['connection_credentials']);?>" name="data[totalCredentials]" />
         <input type="hidden" value="<?php echo $asConnection['as_connections_meta']['id'];?>" name="data[as_connections_meta][metaId]" />
         <input type="hidden" value="<?php echo $asConnection['entry_type'];?>" name="data[as_connections_meta][entry_type]" />
                                <label for="focusedinput" class="col-sm-2 control-label">&nbsp;</label>
                                <div class="col-sm-8">
                                 <button type="submit" class="btn btn-primary submit-btn">Approve</button>
                                </div>
         </div>
         
        
        </div> 
        
       <?php }?>
        
      
     
    </form>
     </div>
    </div>
  </div>
</div>



            <!--//set-2-->

        </div>
        <!--//forms-inner-->
    </div>
    <!--//forms-->


<!-- //inner_content-->
<script type="text/javascript">
function remove_li($selfVar) {
	  	$($selfVar).parents('.credential').remove();
		
		//var totalCredentials=parseInt($("#totalCredentials").val())-1;
		//$("#totalCredentials").val(totalCredentials); 
	  //	i--;
	  	return true;
	  }	
	

$(document).ready(function(){
	//$('.multiselect-ui').fSelect();
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

	$('#licensed_yes').hide();
	$('#licensed_no').hide();
	$('#show_yes').hide();
	$('#show_no').hide();
	if($( "#licensed" ).val()=='yes'){
	$('#licensed_yes').show();	
	
		}
	if($( "#licensed" ).val()=='no'){
	$('#licensed_no').show();
	
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


var i='<?php echo $i;?>';	 
			$(".append-btn").click(function(){
			 i++;
			 $("#totalCredentials").val(i);
			  $str = '<div class="credential">'
			        
				        +    '<div class="form-group">'
				        +      '<label class="col-sm-2 control-label">Licensing Authority  or Accrediting Institution, Membership, Organization</label>'
				        +      '<div class="col-sm-8"><input type="text" class="requiredv form-control1" name="data[credentialing][cred_val'+i.toString()+']" placeholder="">'                 
						+      '<input onClick = "remove_li(this);" type="button" class="btn btn-grey" value="Remove">'
				        +    '</div></div>';
			  $("#add-credent").before($str);
			});
	  

});
</script>

