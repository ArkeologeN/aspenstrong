<?php //print_r($asConnection); die();?>
<!-- /inner_content-->
<div class="inner_content">
    <!-- /inner_content_w3_agile_info-->
    <!-- breadcrumbs -->
    <div class="w3l_agileits_breadcrumbs">
        <div class="w3l_agileits_breadcrumbs_inner">
            <ul>
                <li><a href="<?php echo HTTPADMIN;?>/dashboard">Home</a><span>«</span></li>
                <li><a href="<?php echo HTTPADMIN;?>/edituser/<?php echo $asConnection['id'];?>">Personal Info </a><span>«</span></li>
                <li><a href="<?php echo HTTPADMIN;?>/edituser2/<?php echo $asConnection['id'];?>">Address and Location </a><span>«</span></li>
				<li>Website and Social Links <span>«</span></li>
				<li><a href="<?php echo HTTPADMIN;?>/edituser4/<?php echo $asConnection['id'];?>">Professional Details </a><span>«</span></li>
				<li><a href="<?php echo HTTPADMIN;?>/edituser5/<?php echo $asConnection['id'];?>">Specialities </a><span>«</span></li>
            </ul>
        </div>
    </div>
    <!-- //breadcrumbs -->
<?= $this->Flash->render(); ?>
    <div class="inner_content_w3_agile_info two_in">
        <h2 class="w3_inner_tittle">Website and Social Links</h2>

        <!--/forms-->
       

<div class="forms-main_agileits">
<!--/set-2-->
<div class="wthree_general graph-form agile_info_shadow ">
  <h3 class="w3_inner_tittle two">Logo </h3>
  <div class="grid-1 ">
    <div class="form-body">
      <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" id="myform">
      <div class="grid-1 graph-form agile_info_shadow">
      <div class="form-group"> 
        <div class="col-lg-12">
        <div class="col-lg-4 user_display_form_vals">
        <label for="exampleInputFile">Logo</label>
        <input id="exampleInputFile" <?php if(empty($asConnection['logo'])){ ?> required="" <?php } ?> type="file" name="logo">
        </div>
        <div class="col-lg-8">
          <?php if(!empty($asConnection['logo'])){ ?>
		<img src="<?php echo HTTP.'img/logodirectry/'.$asConnection['logo'];?>" class="img-responsive thumbnail" alt="upload-image">
    <?php } ?>
		</div>
        </div>
      </div>
      </div>
      <h3 class="w3_inner_tittle two"> Social links </h3>
      <div>
      <div class="grid-1 graph-form agile_info_shadow newSLadd">
      <?php 
      
      if(! empty($asConnection['as_connections_socials'])){ $i=1;
		  foreach($asConnection['as_connections_socials'] as $socials){?>
       <div class="removeDiv">
       <?php if($i>1){?>
       <a href="javascript:void(0);" class="remove_button" title="Remove field"><img height="30" width="30" src="<?php echo HTTP ;?>img/remove.png"/></a> 
       <?php }?>
       <div class="form-group">
          <label for="selector1" class="col-sm-2 control-label">Social Network</label>
          <div class="col-sm-8 social-all credential">
            <select name="data[as_connections_socials][type<?php echo $i;?>]" id="social_type<?php echo $i;?>" class="form-control1 select-boxes socials_media_fb" >
              <option value="">Select</option>
              <option value="Facebook" <?php if($socials['type']=='Facebook'){echo 'selected';}?>>Facebook</option>
	   		  <option value="Google+" <?php if($socials['type']=='Google+'){echo 'selected';}?>>Google+</option>
	   		  <option value="LinkedIn" <?php if($socials['type']=='LinkedIn'){echo 'selected';}?>>LinkedIn</option>
	   		  <option value="Instagram" <?php if($socials['type']=='Instagram'){echo 'selected';}?>>Instagram</option>
	   		  <option value="SoundCloud" <?php if($socials['type']=='SoundCloud'){echo 'selected';}?>>SoundCloud</option>
	   		  <option value="Twitter" <?php if($socials['type']=='Twitter'){echo 'selected';}?>>Twitter</option>
	   		  <option value="vimeo" <?php if($socials['type']=='Vimeo'){echo 'selected';}?>>Vimeo</option>
            </select>
          </div>
        </div>
        <!--<div class="form-group">  
          <label for="radio" class="col-sm-2 control-label">&nbsp;</label>
          <div class="col-sm-8">
            <div class="radio-inline"><label><input name="data[as_connections_socials][preferred<?php //echo $i;?>]" type="radio" <?php //if($socials['preferred']==1){echo 'checked';}?> value="1"> Preferred</label></div>
           </div>
        </div>
        <div class="form-group">
          <label for="radio" class="col-sm-2 control-label">Visibility</label>
          <div class="col-sm-8">
            <div class="radio-inline"><label><input name="data[as_connections_socials][visibility<?php //echo $i;?>]" type="radio" <?php //if($socials['visibility']=='public'){echo 'checked';}?> value="public"> Public</label></div>
            <div class="radio-inline"><label><input name="data[as_connections_socials][visibility<?php //echo $i;?>]" type="radio" <?php //if($socials['visibility']=='private'){echo 'checked';}?> value="private"> Private</label></div>
          </div>
        </div>-->
        <div class="form-group user_display_form_vals">
          <label for="smallinput" class="col-sm-2 control-label label-input-sm">Public URL</label>
          <div class="col-sm-8">
            <input class="form-control1 input-sm input_url" name="data[as_connections_socials][url<?php echo $i;?>]" id="public_url<?php echo $i;?>" placeholder="Ex: http://example.com" type="text" value="<?php echo $socials['url'] ?>" onblur="checkURL(this)">
          </div>
        </div>
        <input type="hidden" value="<?php echo $socials['id'];?>" name="data[as_connections_socials][social_id<?php echo $i;?>]" />
        </div>
        <?php $i++;}}else{$i=1;?>
        <div class="removeDiv">
       <?php if($i>1){?>
       <a href="javascript:void(0);" class="remove_button" title="Remove field"><img height="30" width="30" src="<?php echo HTTP ;?>img/remove.png"/></a> 
       <?php }?>
        <div class="form-group user_display_form_vals">
          <label for="selector1" class="col-sm-2 control-label">Social Network</label>
          <div class="col-sm-8 social-all credential">
            <select name="data[as_connections_socials][type1]" id="social_type<?php echo $i;?>" class="form-control1 select-boxes socials_media_fb" >
            	<option value="">Select</option>
              <option value="Facebook" >Facebook</option>
	   		  <option value="Google+" >Google+</option>
	   		  <option value="LinkedIn" >LinkedIn</option>
	   		  <option value="Instagram" >Instagram</option>
	   		  <option value="SoundCloud" >SoundCloud</option>
	   		  <option value="Twitter" >Twitter</option>
	   		  <option value="vimeo" >vimeo</option>
            </select>
          </div>
        </div>
        
        <div class="form-group user_display_form_vals">
          <label for="smallinput" class="col-sm-2 control-label label-input-sm">Public URL</label>
          <div class="col-sm-8">
            <input class="form-control1 input-sm input_url" name="data[as_connections_socials][url1]" id="public_url<?php echo $i;?>" placeholder="Ex: http://example.com" type="text" value="" onblur="checkURL(this)">
          </div>
        </div>
        </div>
        <?php }?>
    </div>
        <div class="form-group">
        <div class="col-sm-8">&nbsp;</div>
        <div class="col-sm-4"><button class="newSL btn btn-danger btn-flat btn-pri" type="button"><i class="fa fa-plus" aria-hidden="true"></i>Add More</button></div>
        </div>
      </div>
      <h3 class="w3_inner_tittle two"> Website links </h3>
      <div class="grid-1 graph-form agile_info_shadow newlinkadd">
       <?php if(! empty($asConnection['as_connections_links'])){
		   $j=1;
		   foreach($asConnection['as_connections_links'] as $links){?>
        <div class="form-group user_display_form_vals">
          <label for="smallinput" class="col-sm-2 control-label label-input-sm">Link</label>
          <div class="col-sm-8">
            <input name="data[as_connections_links][url<?php echo $j;?>]" class="form-control1 input_url input-sm" id="website_url<?php echo $j;?>" placeholder="Website Link" type="text"  value="<?php echo $links['url'];?>" onblur="checkURL(this)">
          </div>
        </div>
         <input type="hidden" value="<?php echo $links['id'];?>" name="data[as_connections_links][link_id<?php echo $j;?>]" />
        <?php $j++;}}else{ ?>
        <div class="form-group user_display_form_vals">
          <label for="smallinput" class="col-sm-2 control-label label-input-sm">Link</label>
          <div class="col-sm-8">
            <input name="data[new_links][url][]" class="form-control1 input-sm input_url" id="website_url1" placeholder="Website Link"  value="" onblur="checkURL(this)" type="text" >
          </div>
        </div>
        
        <?php }?>
        <!--<div class="form-group">
        <div class="col-sm-8">&nbsp;</div>
        <div class="col-sm-4"><button class="newWL btn btn-danger btn-flat btn-pri" type="button"><i class="fa fa-plus" aria-hidden="true"></i>Add More</button></div>
        </div>-->
        
      </div>
      <h3 class="w3_inner_tittle two"> Personal statement </h3>
      <div class="grid-1 graph-form agile_info_shadow">
       <!--<div class="form-group">
		<label for="checkbox" class="col-sm-2 control-label">&nbsp;</label>
		<div class="col-sm-8">
		<div class="checkbox-inline1"><label><input type="checkbox" name="data[as_connections_meta][other_language]" <?php //if($asConnection['as_connections_meta']['other_language'] !=""){echo 'checked';}?> value="<?php //if($asConnection['as_connections_meta']['other_language'] !="" && $asConnection['as_connections_meta']['other_language'] != 'None'){echo $asConnection['as_connections_meta']['other_language'] ;}else{echo "Spanish";}?>"> Do you conduct sessions in Spanish? </label></div>
		</div>
	   </div>-->
       <!--<div class="form-group">
         <label for="txtarea1" class="col-sm-2 control-label">Personal Statement (limited to 100 words)</label>
         <div class="col-sm-8">
         <textarea name="data[as_connections_meta][personal_statement]" cols="88" rows="4"><?php //echo $asConnection['as_connections_meta']['personal_statement'];?></textarea>
         </div>
        </div>-->
        <div class="form-group user_display_form_vals">
              <label class="col-sm-2 control-label">About your Organization (limited to 100 words)</label> 
              <div class="col-sm-8">
              <textarea class="required form-control1" name="data[as_connections_meta][personal_statement]" placeholder="limited to 100 words"><?php echo $asConnection['as_connections_meta']['personal_statement'];?></textarea>
              </div>
        </div>
        
        <div class="form-group">
             <label class="col-sm-2 control-label">Are you bilingual?</label>
             <div class="col-sm-8">
              <select data-placeholder="Language" class="chosen-select form-control1" id="bilingual" name="data[as_connections_meta][bilingual]">
              <option <?php if($asConnection['as_connections_meta']['bilingual']=='yes'){echo "selected";}?> value="yes">Yes</option>
              <option value="no" <?php if($asConnection['as_connections_meta']['bilingual']=='no' || !isset($asConnection['as_connections_meta']['bilingual'])){echo "selected";}?>>No</option>           
              </select>
              </div>
        </div>
        
        <div class="form-group user_display_form_vals" id="select_lang">
         <label class="col-sm-2 control-label">Business Statement in other language</label> 
          <?php if(isset($asConnection['as_connections_meta']['other_lang']) && $asConnection['as_connections_meta']['other_lang']!=''){
				$otherSelectedlang=explode('|',$asConnection['as_connections_meta']['other_lang']);
				}else{
				$otherSelectedlang=array();  
		  }?>  
          <?php //$languages=array("Mandarin","Arabic","Spanish","Hindi","Italian","Russian","Portuguese","Bengali","French","Urdu","Japanese","German","American","Sign");asort($languages);?>         <div class="col-sm-8">
         <select data-placeholder="Language" multiple="multiple" class="multiselect-value form-control" id="per_lang" name="data[as_connections_meta][other_lang][]" required="required">
            <option value="">Language</option>	
            <?php foreach($languages as $language){?>
            <option <?php if(in_array($language['name'],$otherSelectedlang)){ echo 'selected';}?> value="<?php echo $language['name'];?>"><?php echo $language['name'];?></option>
            <?php }?>
         </select>
         </div>
        </div>
        
        
        <?php if(isset($asConnection['as_connections_meta']['other_statement']) && $asConnection['as_connections_meta']['other_statement']!=''){
				$other_statement=explode('|',$asConnection['as_connections_meta']['other_statement']);
				}else{
				$other_statement=array();  
				}
				if(!empty($other_statement)){?>
                <div id="additional_fr">
				<?php $z=0;foreach($other_statement as $os){?>  
                <div class="form-group credential user_display_form_vals">
                 <label class="col-sm-2 control-label">Business Statement (In <?php echo $otherSelectedlang[$z];?>)</label> 
                 <div class="col-sm-8" id="per_<?php echo $otherSelectedlang[$z];?>">
                  <textarea class="form-control1" required="required" name="data[as_connections_meta][other_statement][<?php echo $otherSelectedlang[$z];?>]" placeholder="limited to 100 words,please write in <?php echo $otherSelectedlang[$z];?>"><?php echo $os;?></textarea>
                                             
                  <a href="javascript:void(0);" onClick="remove_lang(this);" class="user_close"> <i class="fa fa-times" aria-hidden="true"></i> </a>
                  </div>
                </div>
                <?php $z++;}?></div><?php }?>
                <div id="otherLanOption">
                </div>
        
        
        <div class="form-group">
        <input type="hidden" value="<?php echo $asConnection['as_connections_meta']['id'];?>" name="data[as_connections_meta][metaId]" />
         <input type="hidden" value="<?php echo (count($asConnection['as_connections_socials'])>0?count($asConnection['as_connections_socials']):1);?>" name="data[totalSocials]" id="totalSocials" />
         <input type="hidden" value="1" name="data[totalLinks]" />
         <!--<input type="hidden" value="<?php //echo count($asConnection['as_connections_phones']);?>" name="data[totalPhones]" />
         <input type="hidden" value="<?php //echo count($asConnection['id']);?>" name="data[id]" />-->
         <label for="focusedinput" class="col-sm-2 control-label">&nbsp;</label>
         <div class="col-sm-8">
         <a href="<?php echo HTTPADMIN;?>/edituser4/<?php echo $asConnection['id'];?>" class="btn btn-primary submit-btn" style="margin-left: 10px;">Next</a>&nbsp;
         <button type="submit" class="btn btn-primary submit-btn">Save & Next</button>
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
<link href="<?php echo HTTP;?>css/front/fSelect_steps.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo HTTP;?>js/front/fSelect_steps.js"></script>   
<script type="text/javascript" >
function checkURL (abc) {
  /*var string = abc.value;
  if (!~string.indexOf("http") && string != "") {
    string = "http://" + string;
  }
  abc.value = string;
  return abc*/
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

jQuery(document).ready(function($){
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
	
$("#myform").validate({
	rules: {
		
		"data[as_connections_meta][other_lang][]":
		{
			required:function(element) {
                 if($("#bilingual").val()!='yes') 
                 return false;
                 else return true;
			}
			
			},
	},
	ignore: ':hidden:not("#per_lang")',
	
		 messages: {
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

var social = ['Facebook','Google+','LinkedIn','Instagram','SoundCloud','Twitter','Vimeo'];	
	var social_array=JSON.stringify(social);
	//Add More Social Links
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

var maxField = 10; //Input fields increment limitation
    var addButton = $('.newSL'); //Add button selector
    var wrapper = $('.newSLadd'); //Input field wrapper
    /*var fieldHTML = '<div><input type="text" name="field_name[]" value=""/><a href="javascript:void(0);" class="remove_button" title="Remove field"><img height="30" width="30" src="<?php //echo HTTP ;?>img/remove.png"/></a></div>'; //New input field html */
	 //New input field html 
	
	
    var x = 1; //Initial field counter is 1
    $(addButton).click(function(){ //Once add button is clicked
        if(x < maxField){ //Check maximum number of input fields
            x++; //Increment field counter
            var j=$('.newSLadd').find('.removeDiv').length;
  j = j+1;
  $("#totalSocials").val(j);
  var fieldHTML = '<div class="removeDiv"><a href="javascript:void(0);" class="remove_button" title="Remove field"><img height="30" width="30" src="<?php echo HTTP ;?>img/remove.png"/></a><div class="form-group user_display_form_vals"><label for="selector1" class="col-sm-2 control-label">Social Network</label><div class="col-sm-8 social-all credential"><select name="data[as_connections_socials][type'+j+']" id="selector1" class="form-control1 select-boxes socials_media_fb" required="required" ><option value="">Select</option>'+optionsnew+'</select></div></div><div class="form-group user_display_form_vals"><label for="smallinput" class="col-sm-2 control-label label-input-sm">Social Media ID</label><div class="col-sm-8"><input type="text" class="form-control1 input_url input-sm" name="data[as_connections_socials][url'+j+']" id="smallinput" placeholder="Ex: http://example.com" value=""  required="required"></div></div></div>';
            $(wrapper).append(fieldHTML); // Add field html
        }
    });
    $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
	 $(document).on('change', '.socials_media_fb', function(event) {
        event.preventDefault();
        $('.new_error_url').remove();
        var value_check = false;
        var $this = $(this);
        $.each($this.closest('.removeDiv').siblings('.removeDiv').find('.socials_media_fb'), function(index, obj) {
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
	
	$('#select_lang').hide();
	//alert('<?php echo count($otherSelectedlang);?>');
	var bilingual='<?php echo count($otherSelectedlang);?>';
	
	if(bilingual !=0 && $('#bilingual').val()=='yes'){
	$('#select_lang').show();
	$('#per_lang').fSelect();
	$('#additional_fr').show();
		}else{
	$('#select_lang').hide();
	$('#additional_fr').hide();		
			}
			
	$( "#bilingual" ).change(function() {
      if($('#bilingual').val()=='yes'){
	  $('#select_lang').show();
	  $('#per_lang').fSelect();
	  //$('.multiselect-value').fSelect();
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
	
	$str='<div class="form-group lang_opt user_display_form_vals credential">'
          +'<label class="col-sm-2 control-label">Business Statement (In '+str_val+')</label>' 
           +'<div class="col-sm-8" id="per_'+str_val+'"><textarea name="data[as_connections_meta][other_statement]['+str_val+']" placeholder="limited to 100 words,please write in '+str_val+'" required="required"></textarea>'
		  +'<a href="javascript:void(0);" onClick="remove_lang(this);" class="user_close"> <i class="fa fa-times" aria-hidden="true"></i> </a>'
          +'</div></div>';
	if($( id_val ).length){
	}else{
	$("#otherLanOption").before($str);
	}
	
	
    });
	
	
  });
	

	
	
});


	
		</script>