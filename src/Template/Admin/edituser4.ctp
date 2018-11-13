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
                <li><a href="<?php echo HTTPADMIN;?>/edituser/<?php echo $asConnection['id'];?>">Personal Info </a><span>«</span></li>
                <li><a href="<?php echo HTTPADMIN;?>/edituser2/<?php echo $asConnection['id'];?>">Address and Location </a><span>«</span></li>
				<li><a href="<?php echo HTTPADMIN;?>/edituser3/<?php echo $asConnection['id'];?>">Website and Social Links </a><span>«</span></li>
				<li>Professional Details <span>«</span></li>
				<li><a href="<?php echo HTTPADMIN;?>/edituser5/<?php echo $asConnection['id'];?>">Specialities </a><span>«</span></li>
            </ul>
        </div>
    </div>
    <!-- //breadcrumbs -->

    <div class="inner_content_w3_agile_info two_in">
        <h2 class="w3_inner_tittle">Professional Details</h2>

        <!--/forms-->
       

<div class="forms-main_agileits">
<!--/set-2-->
<div class="wthree_general graph-form agile_info_shadow ">
  
  <div class="grid-1 ">
    <div class="form-body">
    <?php if($asConnection['entry_type']=='individual'){$id_val="myform";}else{$id_val="myform2";}?>
    
      <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" id="<?php echo $id_val;?>">
        <?php if($asConnection['entry_type']=='individual'){ ?>
        <h3 class="w3_inner_tittle two"> Academics </h3>
      <div class="grid-1 graph-form agile_info_shadow">
      <div class="form-group user_display_form_vals">
          <label for="smallinput" class="col-sm-2 control-label label-input-sm">School most recently graduated</label>
          <div class="col-sm-8">
            <input class="form-control1 input-sm" id="school_passed" placeholder="School most recently graduated" name="data[as_connections_meta][school]" type="text" value="<?php echo $asConnection['as_connections_meta']['school'];?>" required="required">
          </div>
        </div>
        <div class="form-group user_display_form_vals">
          <label for="smallinput" class="col-sm-2 control-label label-input-sm">Year Graduated</label>
          <div class="col-sm-8">
            <input class="form-control1 input-sm" id="school_year" placeholder="Year Graduated" type="number" name="data[as_connections_meta][school_year]" value="<?php echo $asConnection['as_connections_meta']['school_year'];?>" required="required">
          </div>
        </div>
        <div class="form-group user_display_form_vals">
          <label for="selector1" class="col-sm-2 control-label">Years in practice</label>
          <div class="col-sm-8">
            <select name="data[as_connections_meta][practice]" id="practice_time" class="form-control1 multi_change" required="required">
             <option value="">Years in practice</option>
             <?php for($i=1;$i<=50;$i++){?>
	        <option value="<?php echo $i;?>" <?php if($asConnection['as_connections_meta']['practice']==$i){echo 'selected';}?>><?php echo $i;?> Years</option>
             <?php }?>
	         </select>
          </div>
        </div>
        
      </div>
      <?php } ?>
      <h3 class="w3_inner_tittle two"> Malpractice Insurance </h3>
      <div class="grid-1 graph-form agile_info_shadow">
       <div class="form-group user_display_form_vals">
         <label class="col-sm-2 control-label">Malpractice Insurance</label> 
           <div class="col-sm-8">
            <select name="data[as_connections_meta][malpractice_insurance]" id="malpractice_insurance" class="form-control1 multi_change" required="required">
            <option value="">Do you have Malpractice Insurance ?</option>
            <option  value="Yes" <?php if($asConnection['as_connections_meta']['malpractice_insurance']=='Yes'){ echo 'selected';}?>>Yes</option>
            <option  value="No" <?php if($asConnection['as_connections_meta']['malpractice_insurance']=='No'){ echo 'selected';}?>>No</option>
            </select>
            </div> 
       </div>
       
        <div class="form-group user_display_form_vals" id="malpractice_carrer">
          <label class="col-sm-2 control-label">Malpractice Carrier</label> 
          <div class="col-sm-8">
           <input type="text" class="form-control1" name="data[as_connections_meta][malpractice_carrer]" value="<?php echo $asConnection['as_connections_meta']['malpractice_carrer']?>" required="required" >
           </div>
        </div>
                                           
       </div>
      
      <h3 class="w3_inner_tittle two"> Credential Type </h3>
      
      <?php if($asConnection['entry_type']=='individual'){?>
      
      <div class="grid-1 graph-form agile_info_shadow">
      
      <div class="form-group user_display_form_vals">
      <label class="col-sm-2 control-label">Provider Type</label> 
      <div class="col-sm-8">
       <select class="multiselect-value form-control1 multi_change" name="data[as_connections_meta][therapist_type]" id="therapist_type" required="required">
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
                                        
      <div class="form-group user_display_form_vals">
      <label class="col-sm-2 control-label">Are you licensed?</label> 
      <div class="col-sm-8">
       <select class="form-control1" name="data[as_connections_meta][licence_status] multi_change"  id="licensed" required="required">
       <option value=""> Are you licensed ? </option>  
       <option <?php if($asConnection['as_connections_meta']['licence_status']==1){echo "selected";}?> value="yes">Yes</option>
       <option <?php if($asConnection['as_connections_meta']['licence_status']==0 && $asConnection['as_connections_meta']['licence_status']!=""){echo 'selected';}?> value="no">No</option>
       </select>
       </div>
      </div> 
                                          
     <div class="form-group" id="licensed_yes">
      <label class="col-sm-2 control-label">License or Certification No.</label> 
      <div class="col-sm-8">
      <input type="text" class=" form-control1" name="data[as_connections_meta][licence]" value="<?php echo $asConnection['as_connections_meta']['licence'];?>" required="required">
      </div>
     </div>                                      
      <div class="form-group user_display_form_vals" id="licensed_no">
      <label class="col-sm-2 control-label">Are you pre-licensed?</label> 
      <div class="col-sm-8">
      <select class="form-control1 multi_change" name="data[as_connections_meta][pre_licenced]" id="pre-licensed" required="required">
      <option value=""> Are you pre-licensed? </option>
      <option <?php if($asConnection['as_connections_meta']['pre_licenced']=='yes'){echo 'selected';}?> value="yes">Yes</option>
      <option <?php if($asConnection['as_connections_meta']['pre_licenced']=='no'){echo 'selected';}?> value="no">No</option>
      </select>
      </div>
      </div> 
                                          
      <div id="show_yes">
                                          
      <div class="form-group user_display_form_vals">
      <label class="col-sm-2 control-label">Pre-License/registered NO</label> 
      <div class="col-sm-8">
      <input type="text" class="form-control1" name="data[as_connections_meta][prelic_no]" value="<?php echo $asConnection['as_connections_meta']['prelic_no']?>" id="prelic_no">
      </div>
      </div> 
                                            
      <div class="form-group user_display_form_vals">
      <label class="col-sm-2 control-label">Supervisor's Name </label> 
      <div class="col-sm-8">
      <input type="text" class="form-control1" name="data[as_connections_meta][supervisor_name]" id="supervisor_name" value="<?php echo $asConnection['as_connections_meta']['supervisor_name']?>" required="required">
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
      <div class="form-group user_display_form_vals">
      <label class="col-sm-2 control-label">Diploma/Certificate Type or License Membership Number</label> 
      <div class="col-sm-8">
      <input type="text" class="form-control1" name="data[as_connections_meta][mem_no]" value="<?php echo $asConnection['as_connections_meta']['mem_no']?>" id="mem_no">
      </div>
      </div>
      </div>
        
      </div>
      
      <?php }?>
      
       <?php if($asConnection['entry_type']=='organization'){?>
      
      <div class="grid-1 graph-form agile_info_shadow"> 
      <div class="form-group user_display_form_vals">
      <label class="col-sm-2 control-label">Are you a </label> 
      <div class="col-sm-8">
      <select class="form-control1 multi_change" name="data[as_connections_meta][treatment_type]" id="treatment_type" required="required">
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
                                    	     
     <div class="form-group user_display_form_vals">
       <label class="col-sm-2 control-label">Do you have licensed professionals working at your organization ?</label> 
       <div class="col-sm-8">
       <select class="form-control1 multi_change" name="data[as_connections_meta][prof_org]" required="required" id="prof_org">
       <option value="">Select One</option>
       <option <?php if(isset($asConnection['as_connections_meta']['prof_org']) && $asConnection['as_connections_meta']['prof_org']=="Yes"){echo "selected";}?> value="Yes">Yes</option>
       <option <?php if(isset($asConnection['as_connections_meta']['prof_org']) && $asConnection['as_connections_meta']['prof_org']=="No"){echo "selected";}?> value="No">No</option>
       </select> 
     </div>
     </div>
                                            
      <div class="form-group user_display_form_vals">
      <label class="col-sm-2 control-label">Are you an accredited institute ?</label> 
      <div class="col-sm-8">
      <select class="form-control1 multi_change" name="data[as_connections_meta][accredatation]" id="acc" required="required">
      <option value=""> Accredatation </option>
      <option <?php if(isset($asConnection['as_connections_meta']['accredatation']) && $asConnection['as_connections_meta']['accredatation']=="Yes"){echo "selected";}?> value="Yes">Yes</option>
       <option <?php if(isset($asConnection['as_connections_meta']['accredatation']) && $asConnection['as_connections_meta']['accredatation']=="No"){echo "selected";}?> value="No">No</option>
       </select> 
       </div>
     </div>
                                            
      <div class="form-group user_display_form_vals" id="name">
       <label class="col-sm-2 control-label">Name of Accreditation</label> 
       <div class="col-sm-8">
       <input type="text" class="form-control1 required" value="<?php echo $asConnection['as_connections_meta']['accredatation_name'];?>" name="data[as_connections_meta][accredatation_name]" required="required" id="accredatation_name" >
       </div>
      </div>
      
      <div class="form-group">
         <!--<input type="hidden" value="<?php //echo count($asConnection['as_connections_addresses']);?>" name="data[totalAds]" />
         <input type="hidden" value="<?php //echo count($asConnection['as_connections_emails']);?>" name="data[totalEmails]" />-->
         <!--<input type="hidden" value="<?php //echo count($asConnection['connection_credentials']);?>" name="data[totalCredentials]" />-->
         <input type="hidden" value="<?php echo $asConnection['as_connections_meta']['id'];?>" name="data[as_connections_meta][metaId]" />
         <input type="hidden" value="<?php echo $asConnection['entry_type'];?>" name="data[as_connections_meta][entry_type]" />
                                <label for="focusedinput" class="col-sm-2 control-label">&nbsp;</label>
                                <div class="col-sm-8">
                                <a href="<?php echo HTTPADMIN;?>/edituser5/<?php echo $asConnection['id'];?>" class="btn btn-primary submit-btn" style="margin-left: 10px;">Next</a>&nbsp;
                                 <button type="submit" class="btn btn-primary submit-btn">Save & Next</button>
                                </div>
         </div>                                      
      </div>
      
      <?php }?>
       
       <?php if($asConnection['entry_type']=='individual'){?> 
       <h3 class="w3_inner_tittle two">Alternate Credential</h3>
         <div class="grid-1 graph-form agile_info_shadow">
         
         <?php $i=1;if(!empty($asConnection['connection_credentials'])){
		foreach($asConnection['connection_credentials'] as $credentials){?>
         <div class="form-group credential">
         <label class="col-sm-2 control-label">Licensing Authority  or Accrediting Institution, Membership, Organization</label> 
         <div class="col-sm-8">
         <input type="text" class="valid form-control1" name="data[credentialing][cred_val<?php echo $i;?>]" value="<?php echo $credentials['credentialing'];?>" > 
         <?php if($i !=1){?>
         <input onclick="remove_li(this);" type="button" class="btn btn-grey valid" value="Remove" aria-invalid="false">
         <?php }?>  
         <input type="hidden" name="data[credentialing][cred_id<?php echo $i;?>]" value="<?php echo $credentials['id'];?>">
         </div>
         </div>
         
         
         <?php $i++;}}else{?>
         <div class="form-group">
         <label class="col-sm-2 control-label">Licensing Authority  or Accrediting Institution, Membership, Organization</label> 
         <div class="col-sm-8">
         <input type="text" class="valid form-control1" name="data[credentialing][cred_val1]" value="">
         </div>
         </div>
         <?php }?>
         <div class="add_more_btn" id="add-credent">
          <a href="javascript:void(0);" class="append-btn"> Add Other Credentials <i class="fa fa-plus" aria-hidden="true"></i> </a>
         </div>
        <div class="form-group">
         <!--<input type="hidden" value="<?php //echo count($asConnection['as_connections_addresses']);?>" name="data[totalAds]" />
         <input type="hidden" value="<?php //echo count($asConnection['as_connections_emails']);?>" name="data[totalEmails]" />-->
         <input type="hidden" id="connection_credentials" value="<?php echo count($asConnection['connection_credentials']);?>" name="data[totalCredentials]" />
         <input type="hidden" value="<?php echo $asConnection['as_connections_meta']['id'];?>" name="data[as_connections_meta][metaId]" />
         <input type="hidden" value="<?php echo $asConnection['entry_type'];?>" name="data[as_connections_meta][entry_type]" />
                                <label for="focusedinput" class="col-sm-2 control-label">&nbsp;</label>
                                <div class="col-sm-8">
                                <a href="<?php echo HTTPADMIN;?>/edituser5/<?php echo $asConnection['id'];?>" class="btn btn-primary submit-btn" style="margin-left: 10px;">Next</a>&nbsp;
                                 <button type="submit" class="btn btn-primary submit-btn">Save & Next</button>
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
	$('.multi_change').change(function(event) {
    var attrbute = $(this).attr('aria-describedby');
      if ($(this).val()!='') {     
        $('#'+attrbute).hide();       
      } else {      
        $('#'+attrbute).show();        
      }
  });
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
	
	
  }
	
	
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
 
			$(".append-btn").click(function(){
			 var  i = $('.credential').length;
       i = i+1;
			 $("#totalCredentials, #connection_credentials").val(i);
			  $str = '<div class="credential">'
			        
				        +    '<div class="form-group user_display_form_vals">'
				        +      '<label class="col-sm-2 control-label">Licensing Authority  or Accrediting Institution, Membership, Organization</label>'
				        +      '<div class="col-sm-8"><input type="text" class="requiredv form-control1" name="data[credentialing][cred_val'+i.toString()+']" placeholder="" required="required">'                 
						+      '<input onClick = "remove_li(this);" type="button" class="btn btn-grey" value="Remove">'
				        +    '</div></div>';
			  $("#add-credent").before($str);
			});
	  

});
</script>

