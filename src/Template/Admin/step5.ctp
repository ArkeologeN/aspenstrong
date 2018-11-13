<?php //print_r($asConnection);?>
<!-- /inner_content-->
<div class="inner_content">
    <!-- /inner_content_w3_agile_info-->
    <!-- breadcrumbs -->
    <div class="w3l_agileits_breadcrumbs">
        <div class="w3l_agileits_breadcrumbs_inner">
            <ul>
                <li><a href="<?php echo HTTPADMIN;?>/dashboard">Home</a><span>«</span></li>
                <li><a href="<?php echo HTTPADMIN;?>/edituser/<?php echo $asConnection['id'];?>">Step1 </a><span>«</span></li>
                <li><a href="<?php echo HTTPADMIN;?>/edituser2/<?php echo $asConnection['id'];?>">Step2 </a><span>«</span></li>
				<li><a href="<?php echo HTTPADMIN;?>/edituser3/<?php echo $asConnection['id'];?>">Step3 </a><span>«</span></li>
				<li><a href="<?php echo HTTPADMIN;?>/edituser4/<?php echo $asConnection['id'];?>">Step4 </a><span>«</span></li>
				<li>Step5 <span>«</span></li>
            </ul>
        </div>
    </div>
    <!-- //breadcrumbs -->
    <?= $this->Flash->render(); ?>
    <div class="inner_content_w3_agile_info two_in">
        <h2 class="w3_inner_tittle">Step5</h2>

        <!--/forms-->
       

<div class="forms-main_agileits">
<!--/set-2-->
<div class="wthree_general graph-form agile_info_shadow ">
  <h3 class="w3_inner_tittle two"> Academics </h3>
  <div class="grid-1 ">
    <div class="form-body">
      <form class="form-horizontal" action="" method="post">
      <div class="grid-1 graph-form agile_info_shadow">
      <div class="form-group">
          <label for="selector1" class="col-sm-2 control-label">Issues</label>
          <div class="col-sm-8">
          <?php $allIssues=json_decode($asConnection['as_connections_meta']['issue']);
		  if(is_array($allIssues)){
		  $vals=$allIssues;  
			  }else{
		  $vals=explode('|',$asConnection['as_connections_meta']['issue']);  
				  }
		  ?>
            <select id="dates-field2" class="multiselect-ui form-control multi_change" name="data[as_connections_meta][issue][]" multiple="multiple">
            <?php foreach($issues as $issue){ ?>
             <option value="<?php echo $issue['id'];?>" <?php if(in_array($issue['id'],$vals)){echo 'selected';}?>><?php echo $issue['name'];?></option>
            <?php }?>
	        </select>
          </div>
        </div>
        
      <div class="form-group">
          <label for="selector1" class="col-sm-2 control-label">Areas of specialties</label>
          <div class="col-sm-8">
            <select id="dates-field2" name="data[as_connections_meta][diagnosis][]" class="multiselect-ui form-control multi_change" multiple="multiple">
            <?php $allDig=json_decode($asConnection['as_connections_meta']['diagnosis']);
		  if(is_array($allDig)){
		  $valsDig=$allDig;  
			  }else{
		  $valsDig=explode('|',$asConnection['as_connections_meta']['diagnosis']);  
				  }
		  ?>
          <?php foreach($mentalhealths as $mentalhealth){ ?>
             <option value="<?php echo $mentalhealth['id'];?>" <?php if(in_array($mentalhealth['id'],$valsDig)){echo 'selected';}?>><?php echo $mentalhealth['name'];?></option>
          <?php }?>
	        </select>
          </div>
        </div>
        
      <div class="form-group">
          <label for="selector1" class="col-sm-2 control-label">Treatment Orientation</label>
          <div class="col-sm-8">
            <select id="dates-field2" name="data[as_connections_meta][treatment][]" class="multiselect-ui form-control multi_change" multiple="multiple">
            <?php $allTreat=json_decode($asConnection['as_connections_meta']['treatment']);
		  if(is_array($allTreat)){
		  $valsTreat=$allTreat;  
			  }else{
		  $valsTreat=explode('|',$asConnection['as_connections_meta']['treatment']);  
				  }?>
            <?php foreach($treatments as $treatment){ ?>
             <option value="<?php echo $treatment['id'];?>" <?php if(in_array($treatment['id'],$valsTreat)){echo 'selected';}?>><?php echo $treatment['name'];?></option>
          <?php }?>
	        </select>
          </div>
        </div>
      
      <div class="form-group">
          <label for="selector1" class="col-sm-2 control-label">Modality</label>
          <div class="col-sm-8">
            <select id="dates-field2" name="data[as_connections_meta][modality][]" class="multiselect-ui form-control multi_change" multiple="multiple">
              <?php $allMod=json_decode($asConnection['as_connections_meta']['modality']);
		  if(is_array($allMod)){
		  $valsMod=$allMod;  
			  }else{
		  $allMod=explode('|',$asConnection['as_connections_meta']['modalities']);  
				  }?>
            <?php foreach($modalities as $modality){ ?>
             <option value="<?php echo $modality['id'];?>" <?php if(in_array($modality['id'],$allMod)){echo 'selected';}?>><?php echo $modality['name'];?></option>
          <?php }?>
	        </select>
          </div>
        </div>
        
      <div class="form-group">
          <label for="selector1" class="col-sm-2 control-label">Age</label>
          <div class="col-sm-8">
            <select id="dates-field2" name="data[as_connections_meta][age][]" class="multiselect-ui form-control multi_change" multiple="multiple">
            
             <?php $allages=json_decode($asConnection['as_connections_meta']['age_group']);
		  if(is_array($allages)){
		  $valsAges=$allages;  
			  }else{
		  $valsAges=explode('|',$asConnection['as_connections_meta']['age_group']);  
				  }?>
            <?php foreach($ages as $age){ ?>
             <option value="<?php echo $age['id'];?>" <?php if(in_array($age['id'],$valsAges)){echo 'selected';}?>><?php echo $age['name'];?></option>
          <?php }?>
	        </select>
          </div>
        </div>
        
      <div class="form-group">
          <label for="selector1" class="col-sm-2 control-label">Video Conference</label>
          <div class="col-sm-8">
            <select name="data[as_connections_meta][video_conference]" id="selector1" class="form-control1" >
             <option value="Yes" <?php if($asConnection['as_connections_meta']['video_conference']=='Yes'){echo 'selected';}?>>Yes</option>
	         <option value="No" <?php if($asConnection['as_connections_meta']['video_conference']=='No'){echo 'selected';}?>>No</option>
	        </select>
          </div>
        </div>
        
      </div>
      <h3 class="w3_inner_tittle two"> Finances </h3>
      <div class="grid-1 graph-form agile_info_shadow">
       <?php if($asConnection['entry_type']=='organization'){?> 
       <div class="form-group">
          <label class="col-sm-2 control-label label-input-sm">Our facility also provides </label>
          <div class="col-sm-2">
          <input id="show_form" type="radio" value="free" <?php if($asConnection['as_connections_meta']['service_type']=='free'){echo 'checked';}?> name="data[as_connections_meta][service_type]">
           <label for="show_form">Free</label>
           </div>
           <div class="col-sm-2"> 
           <input id="hide_form" type="radio" value="discount" name="data[as_connections_meta][service_type]" <?php if($asConnection['as_connections_meta']['service_type']=='discount'){echo 'checked';}?> >
           <label for="hide_form">Discounted services</label>
           </div>
        </div>
      <?php }?>
      
      <div class="form-group">
          <label for="smallinput" class="col-sm-2 control-label label-input-sm">Average Session Cost</label>
          <div class="col-sm-8">
            <input class="form-control1 input-sm" id="smallinput" name="data[as_connections_meta][session_cost]" placeholder="Average Session Cost" type="text" value="<?php echo $asConnection['as_connections_meta']['session_cost'];?>">
          </div>
        </div>
        
      <div class="form-group">
          <label for="selector1" class="col-sm-2 control-label">Do you accept sliding scale payments?</label>
          <div class="col-sm-8">
            <select id="dates-field2" class="form-control" name="data[as_connections_meta][scale_payment]" >
              <option value="Yes" <?php if($asConnection['as_connections_meta']['scale_payment']=='Yes'){echo 'selected';}?>>Yes</option>
	   		  <option value="No" <?php if($asConnection['as_connections_meta']['scale_payment']=='No'){echo 'selected';}?>>No</option>
	   		</select>
          </div>
        </div>
        
      <div class="form-group">
          <label for="selector1" class="col-sm-2 control-label">Payment Method</label>
          <div class="col-sm-8">
            <select id="dates-field2" class="multiselect-ui form-control multi_change" multiple="multiple" name="data[as_connections_meta][payment_method][]">
              <?php $allPM=json_decode($asConnection['as_connections_meta']['payment_method']);
		  if(is_array($allPM)){
		  $valsPM=$allPM;  
			  }else{
		  $valsPM=explode('|',$asConnection['as_connections_meta']['payment_method']);  
				  }?>
            <?php foreach($payments as $payment){ ?>
             <option value="<?php echo $payment['id'];?>" <?php if(in_array($payment['id'],$valsPM)){echo 'selected';}?>><?php echo $payment['name'];?></option>
          <?php }?>
	   		</select>
          </div>
        </div>
        
        <div class="form-group">
          <label for="smallinput" class="col-sm-2 control-label label-input-sm">Mental Health Fund</label>
          <div class="col-sm-8">
            <input type="checkbox" name="data[as_connections_meta][mental_health_fund]" value="1" <?php if($asConnection['as_connections_meta']['mental_health_fund'] == 1){ echo "checked";}?>>
          </div>
        </div>
        
        <div class="form-group">
          <label for="smallinput" class="col-sm-2 control-label label-input-sm">TRIAD</label>
          <div class="col-sm-8">
            <input type="checkbox" name="data[as_connections_meta][triad]" value="1" <?php if($asConnection['as_connections_meta']['triad'] == 1){ echo "checked";}?>>
          </div>
        </div>
       </div>
       
      <h3 class="w3_inner_tittle two"> Insurance </h3>
      <div class="grid-1 graph-form agile_info_shadow">
        <div class="form-group">
          <label for="selector1" class="col-sm-2 control-label">Do you accept insurance?</label>
          <div class="col-sm-8">
            <select name="data[as_connections_meta][insurance]" id="insurance" class="form-control1" >
              <option value="Yes" <?php if($asConnection['as_connections_meta']['insurance']=='Yes'){echo 'selected';}?>>Yes</option>
	   		  <option value="No" <?php if($asConnection['as_connections_meta']['insurance']=='No'){echo 'selected';}?>>No</option>
	   		</select>
          </div>
        </div>
        <div class="form-group" id="insuranceProvider">
          <label for="selector1" class="col-sm-2 control-label">Insurance Providers</label>
          <div class="col-sm-8">
            <select id="dates-field2" name="data[as_connections_meta][insurance_provider][]" class="multiselect-ui form-control multi_change" multiple="multiple">
              <?php $allIP=json_decode($asConnection['as_connections_meta']['insurance_provider']);
		  if(is_array($allIP)){
		  $valsIP=$allIP;  
			  }else{
		  $valsIP=explode('|',$asConnection['as_connections_meta']['insurance_provider']);  
				  }?>
            <?php foreach($insuranceproviders as $insuranceprovider){ ?>
             <option value="<?php echo $insuranceprovider['id'];?>" <?php if(in_array($insuranceprovider['id'],$valsIP)){echo 'selected';}?>><?php echo $insuranceprovider['name'];?></option>
          <?php }?>
	   		</select>
          </div>
        </div>
        <div class="form-group">
          <label for="smallinput" class="col-sm-2 control-label label-input-sm">Other Insurance Providers</label>
          <div class="col-sm-8">
            <input class="form-control1 input-sm" id="smallinput" name="data[as_connections_meta][other_insurance]" placeholder="Malpractice Carrier" type="text" value="<?php echo $asConnection['as_connections_meta']['other_insurance'];?>">
          </div>
        </div>
        
        <div class="form-group">
        <label class="col-sm-2 control-label">Do you accept out of network?</label> 
        <div class="col-sm-8">
        <select class="form-control1" name="data[as_connections_meta][out_of_network]">
        <option value="">Select</option>
        <option value="Yes" <?php if($asConnection['as_connections_meta']['out_of_network']=="Yes"){echo "Selected";}?>>Yes</option>
        <option value="No" <?php if($asConnection['as_connections_meta']['out_of_network']=="No"){echo "Selected";}?>>No</option>
        </select> 
        </div>     
        </div>
        
        <div class="form-group">
		<label for="checkbox" class="col-sm-2 control-label">&nbsp;</label>
		<div class="col-sm-8">
		<div class="checkbox-inline1"><label><input type="checkbox" name="data[as_connections_meta][declaration]" value="1" <?php if($asConnection['as_connections_meta']['declaration']==1){ echo 'checked';}?>> I can provide a superbill for services </label></div>
		</div>
	    </div>
        <div class="form-group">
        <input type="hidden" value="<?php echo $asConnection['as_connections_meta']['id'];?>" name="data[as_connections_meta][metaId]" />
        <label for="focusedinput" class="col-sm-2 control-label">&nbsp;</label>
        <div class="col-sm-8">
        <button type="submit" class="btn btn-primary submit-btn">Approve</button>
        </div>
        </div>
        
        
        
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
<style type="text/css">
span.multiselect-native-select {
	position: relative
}
span.multiselect-native-select select {
	border: 0!important;
	clip: rect(0 0 0 0)!important;
	height: 1px!important;
	margin: -1px -1px -1px -3px!important;
	overflow: hidden!important;
	padding: 0!important;
	position: absolute!important;
	width: 1px!important;
	left: 50%;
	top: 30px
}
.multiselect-container {
	position: absolute;
	list-style-type: none;
	margin: 0;
	padding: 0
}
.multiselect-container .input-group {
	margin: 5px
}
.multiselect-container>li {
	padding: 0
}
.multiselect-container>li>a.multiselect-all label {
	font-weight: 700
}
.multiselect-container>li.multiselect-group label {
	margin: 0;
	padding: 3px 20px 3px 20px;
	height: 100%;
	font-weight: 700
}
.multiselect-container>li.multiselect-group-clickable label {
	cursor: pointer
}
.multiselect-container>li>a {
	padding: 0
}
.multiselect-container>li>a>label {
	margin: 0;
	height: 100%;
	cursor: pointer;
	font-weight: 400;
	padding: 3px 0 3px 30px
}
.multiselect-container>li>a>label.radio, .multiselect-container>li>a>label.checkbox {
	margin: 0
}
.multiselect-container>li>a>label>input[type=checkbox] {
	margin-bottom: 5px
}
.btn-group>.btn-group:nth-child(2)>.multiselect.btn {
	border-top-left-radius: 4px;
	border-bottom-left-radius: 4px
}
.form-inline .multiselect-container label.checkbox, .form-inline .multiselect-container label.radio {
	padding: 3px 20px 3px 40px
}
.form-inline .multiselect-container li a label.checkbox input[type=checkbox], .form-inline .multiselect-container li a label.radio input[type=radio] {
	margin-left: -20px;
	margin-right: 0
}
</style>

<script type="text/javascript">
$(function() {
  $('.multi_change').change(function(event) {
  var attrbute = $(this).attr('aria-describedby');
    if ($(this).val()!='') {     
      $('#'+attrbute).hide();       
    } else {      
      $('#'+attrbute).show();        
    }
});
    $('.multiselect-ui').multiselect({
        includeSelectAllOption: true
    });
	$('#insuranceProvider').hide();
 if($('#insurance').val()=='Yes'){
 $('#insuranceProvider').show();	 
 }
 if($('#insurance').val()=='No'){
 $('#insuranceProvider').hide();	 
 }		 
 
 $('#insurance').change(function() {
 if($('#insurance').val()=='Yes'){
 $('#insuranceProvider').show();	 
 }else{
 $('#insuranceProvider').hide();	 
 }		 
});
});
</script>