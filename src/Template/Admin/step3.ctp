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
				<li>Step3 <span>«</span></li>
				<li><a href="<?php echo HTTPADMIN;?>/edituser4/<?php echo $asConnection['id'];?>">Step4 </a><span>«</span></li>
				<li><a href="<?php echo HTTPADMIN;?>/edituser5/<?php echo $asConnection['id'];?>">Step5 </a><span>«</span></li>
            </ul>
        </div>
    </div>
    <!-- //breadcrumbs -->
<?= $this->Flash->render(); ?>
    <div class="inner_content_w3_agile_info two_in">
        <h2 class="w3_inner_tittle">Step3</h2>

        <!--/forms-->
       

<div class="forms-main_agileits">
<!--/set-2-->
<div class="wthree_general graph-form agile_info_shadow ">
  <h3 class="w3_inner_tittle two">Logo </h3>
  <div class="grid-1 ">
    <div class="form-body">
      <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
      <div class="grid-1 graph-form agile_info_shadow">
      <div class="form-group"> 
        <div class="col-lg-12">
        <div class="col-lg-4">
        <label for="exampleInputFile">Logo</label>
        <input id="exampleInputFile" type="file" name="logo">
        </div>
        <div class="col-lg-8">
		<img src="<?php echo HTTP.'img/logodirectry/'.$asConnection['logo'];?>" class="img-responsive thumbnail" alt="upload-image">
		</div>
        </div>
      </div>
      </div>
      <h3 class="w3_inner_tittle two"> Social links </h3>
      <div class="grid-1 graph-form agile_info_shadow newSLadd">
      <?php if(! empty($asConnection['as_connections_socials'])){ $i=1;
		  foreach($asConnection['as_connections_socials'] as $socials){?>
       <div class="form-group">
          <label for="selector1" class="col-sm-2 control-label">Social Network</label>
          <div class="col-sm-8">
            <select name="data[as_connections_socials][type<?php echo $i;?>]" id="selector1" class="form-control1 select-boxes" >
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
        <div class="form-group">
          <label for="smallinput" class="col-sm-2 control-label label-input-sm">Social Media ID</label>
          <div class="col-sm-8 user_display_form_vals">
            <input class="form-control1 input-sm input_url" name="data[as_connections_socials][url<?php echo $i;?>]" id="smallinput" placeholder="Social Media ID" type="text" value="<?php echo $socials['url'];?>">
          </div>
        </div>
        <input type="hidden" value="<?php echo $socials['id'];?>" name="data[as_connections_socials][social_id<?php echo $i;?>]" />
        <?php $i++;}}else{$i=1;?>
        <div class="form-group">
          <label for="selector1" class="col-sm-2 control-label">Social Network</label>
          <div class="col-sm-8">
            <select name="data[new_social][type<?php echo $i;?>]" id="selector1" class="form-control1 select-boxes" >
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
        <!--<div class="form-group">
          <label for="radio" class="col-sm-2 control-label">&nbsp;</label>
          <div class="col-sm-8">
            <div class="radio-inline"><label><input name="data[new_social][preferred][]" type="radio"> Preferred</label></div>
           </div>
        </div>
        <div class="form-group">
          <label for="radio" class="col-sm-2 control-label">Visibility</label>
          <div class="col-sm-8">
            <div class="radio-inline"><label><input name="data[new_social][visibility][]" value="public" type="radio"> Public</label></div>
            <div class="radio-inline"><label><input name="data[new_social][visibility][]" value="private" type="radio"> Private</label></div>
          </div>
        </div>-->
        <div class="form-group">
          <label for="smallinput" class="col-sm-2 control-label label-input-sm">Social Media ID</label>
          <div class="col-sm-8 user_display_form_vals">
            <input class="form-control1 input-sm input_url" name="data[new_social][url<?php echo $i;?>]" id="smallinput" placeholder="Social Media ID" type="text" value="">
          </div>
        </div>
        <?php }?>
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
        <div class="form-group">
          <label for="smallinput" class="col-sm-2 control-label label-input-sm">Link</label>
          <div class="col-sm-8 user_display_form_vals">
            <input name="data[as_connections_links][url<?php echo $j;?>]" class="form-control1 input-sm input_url" id="smallinput" placeholder="Website Link" type="text" value="<?php echo $links['url'];?>">
          </div>
        </div>
         <input type="hidden" value="<?php echo $links['id'];?>" name="data[as_connections_links][link_id<?php echo $j;?>]" />
        <?php $j++;}}else{ ?>
        <div class="form-group">
          <label for="smallinput" class="col-sm-2 control-label label-input-sm">Link</label>
          <div class="col-sm-8 user_display_form_vals">
            <input name="data[new_links][url][]" class="form-control1 input-sm input_url" id="smallinput" placeholder="Website Link" type="text" value="">
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
        <div class="form-group">
              <label class="col-sm-2 control-label">About your Organization (limited to 100 words)</label> 
              <div class="col-sm-8">
              <textarea class=" form-control1" name="data[as_connections_meta][personal_statement]" placeholder="limited to 100 words"><?php echo $asConnection['as_connections_meta']['personal_statement'];?></textarea>
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
        
        <div class="form-group" id="select_lang">
         <label class="col-sm-2 control-label">Business Statement in other language</label> 
          <?php if(isset($asConnection['as_connections_meta']['other_lang']) && $asConnection['as_connections_meta']['other_lang']!=''){
				$otherSelectedlang=explode('|',$asConnection['as_connections_meta']['other_lang']);
				}else{
				$otherSelectedlang=array();  
		  }?>  
          <?php $languages=array("Mandarin","Arabic","Spanish","Hindi","Italian","Russian","Portuguese","Bengali","French","Urdu","Japanese","German","American","Sign");asort($languages);?>         <div class="col-sm-8">
         <select data-placeholder="Language" multiple="multiple" class="multiselect-value form-control" id="per_lang" name="data[as_connections_meta][other_lang][]" >
            <option value="">Language</option>	
            <?php foreach($languages as $language){?>
            <option <?php if(in_array($language,$otherSelectedlang)){ echo 'selected';}?> value="<?php echo $language;?>"><?php echo $language;?></option>
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
                <div class="form-group credential" id="per_<?php echo $otherSelectedlang[$z];?>">
                 <label class="col-sm-2 control-label">Business Statement (In <?php echo $otherSelectedlang[$z];?>)</label> 
                 <div class="col-sm-8">
                  <textarea class=" form-control1" name="data[as_connections_meta][other_statement][]" placeholder="limited to 100 words,please write in <?php echo $otherSelectedlang[$z];?>"><?php echo $os;?></textarea>
                                             
                  <a href="javascript:void(0);" onClick="remove_lang(this);" class="user_close"> <i class="fa fa-times" aria-hidden="true"></i> </a>
                  </div>
                </div>
                <?php $z++;}?></div><?php }?>
                <div id="otherLanOption">
                </div>
        
        
        <div class="form-group">
        <input type="hidden" value="<?php echo $asConnection['as_connections_meta']['id'];?>" name="data[as_connections_meta][metaId]" />
         <input type="hidden" value="<?php echo count($asConnection['as_connections_socials']);?>" name="data[totalSocials]" id="totalSocials" />
         <input type="hidden" value="1" name="data[totalLinks]" />
         <!--<input type="hidden" value="<?php //echo count($asConnection['as_connections_phones']);?>" name="data[totalPhones]" />
         <input type="hidden" value="<?php //echo count($asConnection['id']);?>" name="data[id]" />-->
         <label for="focusedinput" class="col-sm-2 control-label">&nbsp;</label>
         <div class="col-sm-8">
         <button type="submit" class="btn btn-primary submit-btn">Approve</button>
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
$(document).ready(function(){

var social = ['Facebook','Google+','LinkedIn','Instagram','SoundCloud','Twitter','Vimeo'];	
	var social_array=JSON.stringify(social);
	//Add More Social Links
	var optionsnew="";	
			
			$( ".select-boxes" ).each(function() {
			//var optionsnew="";
			var itemtoRemove=$( this ).val();
			$.each(social, function (index, value) {
			if(itemtoRemove==value){
			social.splice($.inArray(itemtoRemove, social),1);
			}
			});
		    optionsnew="";
			$.each(social, function (index, value) {
			optionsnew+='<option value='+value+'>'+value+'</option>'
			});	
			
			});	 

var maxField = 10; //Input fields increment limitation
    var addButton = $('.newSL'); //Add button selector
    var wrapper = $('.newSLadd'); //Input field wrapper
    /*var fieldHTML = '<div><input type="text" name="field_name[]" value=""/><a href="javascript:void(0);" class="remove_button" title="Remove field"><img height="30" width="30" src="<?php //echo HTTP ;?>img/remove.png"/></a></div>'; //New input field html */
	var j='<?php echo $i;?>';
	$("#totalSocials").val(j);
	var fieldHTML = '<div class="removeDiv"><a href="javascript:void(0);" class="remove_button" title="Remove field"><img height="30" width="30" src="<?php echo HTTP ;?>img/remove.png"/></a><div class="form-group"><label for="selector1" class="col-sm-2 control-label">Social Network</label><div class="col-sm-8"><select name="data[as_connections_socials][type'+j+']" id="selector1" class="form-control1 select-boxes" >'+optionsnew+'</select></div></div><div class="form-group"><label for="smallinput" class="col-sm-2 control-label label-input-sm">Social Media ID</label><div class="col-sm-8 user_display_form_vals"><input class="form-control1 input-sm input_url" name="data[as_connections_socials][url'+j+']" id="smallinput" placeholder="Social Media ID" type="text" value=""></div></div></div>'; //New input field html 
	
	
    var x = 1; //Initial field counter is 1
    $(addButton).click(function(){ //Once add button is clicked
        if(x < maxField){ //Check maximum number of input fields
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); // Add field html
        }
    });
    $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
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

	
	
	
	
	var allIds=[];
	$( "#per_lang" ).change(function() {
	$("div.lang_opt").remove();
	 
	
	$('#per_lang :selected').each(function(i, sel){ 
    //otherLanOption
	var str_val=$(sel).val();
	var id_val="#per_"+str_val;
	
	$str='<div class="form-group lang_opt user_display_form_vals credential" id="per_'+str_val+'">'
          +'<label class="col-sm-2 control-label">Business Statement (In '+str_val+')</label>' 
          +'<div class="col-sm-8"><textarea class="required" name="data[as_connections_meta][other_statement][]" placeholder="limited to 100 words,please write in '+str_val+'"></textarea>'
		  +'<a href="javascript:void(0);" onClick="remove_lang(this);" class="user_close"> <i class="fa fa-times" aria-hidden="true"></i> </a>'
          +'</div></div>';
	if($( id_val ).length){
	}else{
	$("#otherLanOption").before($str);
	}
	
	
    });
	
	
  });
	

	
	
});

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
	
		</script>