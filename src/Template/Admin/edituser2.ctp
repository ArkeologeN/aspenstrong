<?php 
function cmp($a, $b)
{
    if ($a["id"] == $b["id"]) {
        return 0;
    }
    return ($a["id"] < $b["id"]) ? -1 : 1;
}

?>
<!-- /inner_content-->
<div class="inner_content">
    <!-- /inner_content_w3_agile_info-->
    <?php $state_list = array('AL'=>"Alabama",  

'AK'=>"Alaska",  

'AZ'=>"Arizona",  

'AR'=>"Arkansas",  

'CA'=>"California",  

'CO'=>"Colorado",  

'CT'=>"Connecticut",  

'DE'=>"Delaware",  

'DC'=>"District Of Columbia",  

'FL'=>"Florida",  

'GA'=>"Georgia",  

'HI'=>"Hawaii",  

'ID'=>"Idaho",  

'IL'=>"Illinois",  

'IN'=>"Indiana",  

'IA'=>"Iowa",  

'KS'=>"Kansas",  

'KY'=>"Kentucky",  

'LA'=>"Louisiana",  

'ME'=>"Maine",  

'MD'=>"Maryland",  

'MA'=>"Massachusetts",  

'MI'=>"Michigan",  

'MN'=>"Minnesota",  

'MS'=>"Mississippi",  

'MO'=>"Missouri",  

'MT'=>"Montana",

'NE'=>"Nebraska",

'NV'=>"Nevada",

'NH'=>"New Hampshire",

'NJ'=>"New Jersey",

'NM'=>"New Mexico",

'NY'=>"New York",

'NC'=>"North Carolina",

'ND'=>"North Dakota",

'OH'=>"Ohio",  

'OK'=>"Oklahoma",  

'OR'=>"Oregon",  

'PA'=>"Pennsylvania",  

'RI'=>"Rhode Island",  

'SC'=>"South Carolina",  

'SD'=>"South Dakota",

'TN'=>"Tennessee",  

'TX'=>"Texas",  

'UT'=>"Utah",  

'VT'=>"Vermont",  

'VA'=>"Virginia",  

'WA'=>"Washington",  

'WV'=>"West Virginia",  

'WI'=>"Wisconsin",  

'WY'=>"Wyoming");?>
    <!-- breadcrumbs -->
    <div class="w3l_agileits_breadcrumbs">
        <div class="w3l_agileits_breadcrumbs_inner">
            <ul>
                <li><a href="<?php echo HTTPADMIN;?>/dashboard">Home</a><span>«</span></li>
                <li><a href="<?php echo HTTPADMIN;?>/edituser/<?php echo $asConnection['id'];?>">Personal Info </a><span>«</span></li>
                <li>Address and Location </a><span>«</span></li>
				<li><a href="<?php echo HTTPADMIN;?>/edituser3/<?php echo $asConnection['id'];?>">Website and Social Links </a><span>«</span></li>
				<li><a href="<?php echo HTTPADMIN;?>/edituser4/<?php echo $asConnection['id'];?>">Professional Details </a><span>«</span></li>
				<li><a href="<?php echo HTTPADMIN;?>/edituser5/<?php echo $asConnection['id'];?>">Specialities </a><span>«</span></li>
            </ul>
        </div>
    </div>
    <!-- //breadcrumbs -->
<?= $this->Flash->render(); ?>
    <div class="inner_content_w3_agile_info two_in">
        <h2 class="w3_inner_tittle">Address and Location</h2>

        <!--/forms-->
       

<div class="forms-main_agileits">
<!--/set-2-->
<div class="wthree_general graph-form agile_info_shadow ">
  <h3 class="w3_inner_tittle two">Addresses </h3>
  <div class="grid-1 ">
   <div class="form-body">
      <form class="form-horizontal" action="" method="post" id="myform">
      <div class="grid-1 graph-form agile_info_shadow">
      <?php $i=1;usort($asConnection['as_connections_addresses'],"cmp");
      if(!empty($asConnection['as_connections_addresses']))
      {
      foreach($asConnection['as_connections_addresses'] as $address){ 
	  if($address['type']=='Mailing'){$options=array('Mailing');}else{
								         if($address['type']=='Site'){$options=array('Site');}else{
								         $options=array('Site','Mailing','Office','Other');}}
		 
	   ?>
      
      <div class="grid-1 graph-form agile_info_shadow parents-all">
      
      <h3 class="w3_inner_tittle two"><?php echo $address['type'];?> Address </h3>
      <?php if($i>2){?>
        <a href="javascript:void(0);" onClick = "remove_li1(this);" style="float:right;vertical-align:top;" class="remove_address" title="Remove field"><img height="30" width="30" src="<?php echo HTTP ;?>img/remove.png"/></a>
        <?php }?>
        <div class="form-group user_display_form_vals">
          <label for="selector1" class="col-sm-2 control-label">Address Type</label>
          <div class="col-sm-8">
            <select name="data[as_connections_addresses][type<?php echo $i;?>]" id="address_type<?php echo $i;?>" class="form-control1" required="required" >
              <?php foreach($options as $option){?>
              <option <?php if($option==$address['type']){echo "selected";}?>><?php echo $option;?></option>
              <?php }?>
            </select>
          </div>
        </div>
        
        <div class="form-group user_display_form_vals">
          <label for="txtarea1" class="col-sm-2 control-label">Address</label>
          <div class="col-sm-8"><textarea cols="83" rows="4" class="form-control1 input-sm valid" required="required" name="data[as_connections_addresses][address<?php echo $i;?>]" id="address<?php echo $i;?>"><?php echo $address['address'];?></textarea></div>
        </div>
        <!--<div class="form-group">
          <label for="selector1" class="col-sm-2 control-label">Country</label>
          <div class="col-sm-8">
            <select name="data[as_connections_addresses][country<?php //echo $i;?>]" id="selector1" class="form-control1">
              <option selected="selected">U.S.A</option>
             </select>
          </div>
        </div>-->
        <div class="form-group user_display_form_vals">
          <label for="focusedinput" class="col-sm-2 control-label">City</label>
          <div class="col-sm-8">
            <input name="data[as_connections_addresses][city<?php echo $i;?>]" required="required" class="form-control1" id="city<?php echo $i;?>" placeholder="City" type="text" value="<?php echo $address['city'];?>" onblur="getLatlong('<?php echo $i;?>');">
          </div>
        </div>
        
        <div class="form-group user_display_form_vals">
          <label for="selector1" class="col-sm-2 control-label">State</label>
          <div class="col-sm-8">
            <select name="data[as_connections_addresses][state<?php echo $i;?>]" id="state<?php echo $i;?>" class="form-control1" onchange="getLatlong(<?php echo $i;?>)" required="required" >
            <?php foreach($state_list as $state){?>
              <option value="<?php echo $state;?>" <?php if($state==$address['state']){ echo "selected";}?> ><?php echo $state;?></option>
            <?php }?>
	        </select>
          </div>
          
        </div>
        <div class="form-group user_display_form_vals">
          <label for="focusedinput" class="col-sm-2 control-label">Zipcode</label>
          <div class="col-sm-4">
            <input class="form-control1" id="zipcode<?php echo $i;?>" placeholder="Zipcode" type="text" name="data[as_connections_addresses][zipcode<?php echo $i;?>]" value="<?php echo $address['zipcode'];?>" required="required" >
          </div>
        </div>
        <div class="form-group">
          <label for="focusedinput" class="col-sm-2 control-label">Map Latitude</label>
          <div class="col-sm-4">
            <input class="form-control1" id="lat<?php echo $i;?>" placeholder="Latitude" type="text" name="data[as_connections_addresses][lat<?php echo $i;?>]" value="<?php echo $address['latitude'];?>" id="lat<?php echo $i;?>">
          </div>
          <div class="col-sm-4">
            <input class="form-control1" id="long<?php echo $i;?>" placeholder="Longitude" type="text" name="data[as_connections_addresses][long<?php echo $i;?>]" value="<?php echo $address['longitude'];?>" id="long<?php echo $i;?>">
            <input type="hidden" value="<?php echo $address['preferred'];?>" name="data[as_connections_addresses][preferred<?php echo $i;?>]">
          </div>
        </div>
        
        </div>
        
        <input type="hidden" value="<?php echo $address['id'];?>" name="data[as_connections_addresses][address_id<?php echo $i;?>]" />
        <?php $i++;} }else{
          ?>
          <div class="grid-1 graph-form agile_info_shadow parents-all">
      
      <h3 class="w3_inner_tittle two">Mailing Address </h3>
              <div class="form-group user_display_form_vals">
          <label for="selector1" class="col-sm-2 control-label">Address Type</label>
          <div class="col-sm-8">
            <select name="data[as_connections_addresses][type1]" id="address_type1" class="form-control1" required="required" aria-required="true">
                          <option value="Site">Site</option>
                          </select>
          </div>
        </div>
        
        <div class="form-group user_display_form_vals">
          <label for="txtarea1" class="col-sm-2 control-label">Address</label>
          <div class="col-sm-8"><textarea cols="83" rows="4" class="form-control1 input-sm valid" required="required" name="data[as_connections_addresses][address1]" id="address1" aria-required="true"></textarea></div>
        </div>
        <!--<div class="form-group">
          <label for="selector1" class="col-sm-2 control-label">Country</label>
          <div class="col-sm-8">
            <select name="data[as_connections_addresses][country]" id="selector1" class="form-control1">
              <option selected="selected">U.S.A</option>
             </select>
          </div>
        </div>-->
        <div class="form-group user_display_form_vals">
          <label for="focusedinput" class="col-sm-2 control-label">City</label>
          <div class="col-sm-8">
            <input name="data[as_connections_addresses][city1]" required="required" class="form-control1" id="city1" placeholder="City" type="text" value="" onblur="getLatlong('1');" aria-required="true">
          </div>
        </div>
        
        <div class="form-group user_display_form_vals">
          <label for="selector1" class="col-sm-2 control-label">State</label>
          <div class="col-sm-8">
            <select name="data[as_connections_addresses][state1]" id="state1" class="form-control1" onchange="getLatlong(1)" required="required" aria-required="true">
                        <?php foreach($state_list as $state){?>
              <option value="<?php echo $state;?>"><?php echo $state;?></option>
            <?php }?>  
                      </select>
          </div>
          
        </div>
        <div class="form-group user_display_form_vals">
          <label for="focusedinput" class="col-sm-2 control-label">Zipcode</label>
          <div class="col-sm-4">
            <input class="form-control1" id="zipcode1" placeholder="Zipcode" type="text" name="data[as_connections_addresses][zipcode1]" value="" required="required" aria-required="true">
          </div>
        </div>
        <div class="form-group">
          <label for="focusedinput" class="col-sm-2 control-label">Map Latitude</label>
          <div class="col-sm-4">
            <input class="form-control1" id="lat1" placeholder="Latitude" type="text" name="data[as_connections_addresses][lat1]" value="">
          </div>
          <div class="col-sm-4">
            <input class="form-control1" id="long1" placeholder="Longitude" type="text" name="data[as_connections_addresses][long1]" value="">
            <input type="hidden" value="1" name="data[as_connections_addresses][preferred1]">
          </div>
        </div>
        </div>
        <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12 filters_padding_left" style="float:right;">
              <input type="checkbox" id="copy_address_edit" class="regular-checkbox">
                <label for="copy_address_edit"></label>
                <label class="label_text"> Same as mailing address</label>
  </div>
        <div class="grid-1 graph-form agile_info_shadow parents-all">
  <h3 class="w3_inner_tittle two">Site Address </h3>
  <div class="form-group user_display_form_vals">
    <label for="selector1" class="col-sm-2 control-label">Address Type</label>
    <div class="col-sm-8">
      <select name="data[as_connections_addresses][type2]" id="address_type2" class="form-control1" required="required" aria-required="true">
        <option value="Mailing">Mailing</option>
      </select>
    </div>
  </div>

  <div class="form-group user_display_form_vals">
    <label for="txtarea1" class="col-sm-2 control-label">Address</label>
    <div class="col-sm-8">
      <textarea cols="83" rows="4" class="form-control1 input-sm valid" required name="data[as_connections_addresses][address2]" id="address2" aria-required="true" aria-invalid="false"></textarea>
    </div>
  </div>
  
  <div class="form-group user_display_form_vals">
    <label for="focusedinput" class="col-sm-2 control-label">City</label>
    <div class="col-sm-8">
      <input name="data[as_connections_addresses][city2]" required class="form-control1" id="city2" placeholder="City" type="text" value="" onBlur="getLatlong('2');" aria-required="true">
    </div>
  </div>
  <div class="form-group user_display_form_vals">
    <label for="selector1" class="col-sm-2 control-label">State</label>
    <div class="col-sm-8">
      <select name="data[as_connections_addresses][state2]" id="state2" class="form-control1" onChange="getLatlong(2)" required="required" aria-required="true">
        <?php foreach($state_list as $state){?>
              <option value="<?php echo $state;?>"><?php echo $state;?></option>
            <?php }?>  
      </select>
    </div>
  </div>
  <div class="form-group user_display_form_vals">
    <label for="focusedinput" class="col-sm-2 control-label">Zipcode</label>
    <div class="col-sm-4">
      <input class="form-control1" id="zipcode2" placeholder="Zipcode" type="text" name="data[as_connections_addresses][zipcode2]" value="" required aria-required="true">
    </div>
  </div>
  <div class="form-group">
    <label for="focusedinput" class="col-sm-2 control-label">Map Latitude</label>
    <div class="col-sm-4">
      <input class="form-control1" id="lat2" placeholder="Latitude" type="text" name="data[as_connections_addresses][lat2]" value="">
    </div>
    <div class="col-sm-4">
      <input class="form-control1" id="long2" placeholder="Longitude" type="text" name="data[as_connections_addresses][long2]" value="">
      <input type="hidden" value="0" name="data[as_connections_addresses][preferred2]">
    </div>
  </div>
</div>

          <?php
        }?>
         
        <div class="form-group" id="add-mraddrs">
        <div class="col-sm-8">&nbsp;</div>
        <div class="col-sm-4"><button class="append-btn btn btn-danger btn-flat btn-pri" type="button"><i class="fa fa-plus" aria-hidden="true"></i>Add More</button></div>
        </div>
        </div>
        
        <h3 class="w3_inner_tittle two">Phone </h3>
        <div class="grid-1 graph-form agile_info_shadow newphoneadd">
        <?php $j=1;usort($asConnection['as_connections_phones'],"cmp");
        if(!empty($asConnection['as_connections_phones']))
        {
        foreach($asConnection['as_connections_phones'] as $phone){?>
        <div class="removeDiv">
        <?php if($j>1){?>
        <a href="javascript:void(0);" class="remove_button" title="Remove field"><img height="30" width="30" src="<?php echo HTTP ;?>img/remove.png"/></a>
        <?php }?>
        <div class="form-group">
          <label for="radio" class="col-sm-2 control-label">Visibility</label>
          <div class="col-sm-8">
            <div class="radio-inline"><label><input id="show_form<?php echo $j;?>" type="radio" value="<?php echo $phone['preferred'];?>" name="data[as_connections_phones][preferred<?php echo $j;?>]" <?php if($phone['preferred']==1 || count($asConnection['as_connections_phones'])==1){echo "checked";}?> onclick="myfunction(this.id)" class="tooglee"> Preferred</label></div>
            
        </div>
        </div>
        <div class="form-group user_display_form_vals">
          <label for="selector1" class="col-sm-2 control-label">Phone Type</label>
          <div class="col-sm-8">
            <select name="data[as_connections_phones][type<?php echo $j;?>]" id="phone_type<?php echo $j;?>" required="required" class="form-control1">
            <option value="">Select Phone</option>
            <option value="Office Phone" <?php if($phone['type']=='Office Phone'){echo "selected";}?>>Office Phone</option>
            <option value="Cell Phone" <?php if($phone['type']=='Cell Phone'){echo "selected";}?>>Cell Phone</option>
            <option value="Site Fax" <?php if($phone['type']=='Site Fax'){echo "selected";}?>>Site Fax</option>
            <option value="Crisis Line" <?php if($phone['type']=='Crisis Line'){echo "selected";}?>>Crisis Line</option>
            </select>
          </div>
        </div>
        
        <div class="form-group user_display_form_vals">
          <label for="smallinput" class="col-sm-2 control-label label-input-sm">Phone Number</label>
          <div class="col-sm-8">
            <input class="form-control1 input-sm" id="number<?php echo $j;?>" name="data[as_connections_phones][number<?php echo $j;?>]" placeholder="Phone Number" type="text" value="<?php echo $phone['number'];?>" required="required" >
          </div>
        </div>
        <input type="hidden" value="<?php echo $phone['id'];?>" name="data[as_connections_phones][phone_id<?php echo $j;?>]" />
        </div>
        </br></br>
        <?php $j++;} }else
        {
          ?>
            <div class="removeDiv">
                <div class="form-group">
          <label for="radio" class="col-sm-2 control-label">Visibility</label>
          <div class="col-sm-8">
            <div class="radio-inline"><label><input id="show_form1" type="radio" value="1" name="data[as_connections_phones][preferred1]"  onclick="myfunction(this.id)" class="tooglee"> Preferred</label></div>
            
        </div>
        </div>
        <div class="form-group user_display_form_vals">
          <label for="selector1" class="col-sm-2 control-label">Phone Type</label>
          <div class="col-sm-8">
            <select name="data[as_connections_phones][type1]" id="phone_type1" required="required" class="form-control1 valid" aria-required="true" aria-invalid="false">
            <option value="">Select Phone</option>
            <option value="Office Phone">Office Phone</option>
            <option value="Cell Phone" >Cell Phone</option>
            <option value="Site Fax">Site Fax</option>
            <option value="Crisis Line">Crisis Line</option>
            </select>
          </div>
        </div>
        
        <div class="form-group user_display_form_vals">
          <label for="smallinput" class="col-sm-2 control-label label-input-sm">Phone Number</label>
          <div class="col-sm-8">
            <input class="form-control1 input-sm valid" id="number1" name="data[as_connections_phones][number1]" placeholder="Phone Number" type="text" value="" required="required" aria-required="true" aria-invalid="false">
          </div>
        </div>
        </div></br></br>
          <?php
        }?>
        <div class="form-group">
        <div class="col-sm-8">&nbsp;</div>
        <div class="col-sm-4"><button class="newPhone btn btn-danger btn-flat btn-pri" type="button"><i class="fa fa-plus" aria-hidden="true"></i>Add More</button></div>
        </div>
        
        </div>
        
        <h3 class="w3_inner_tittle two">Email Address </h3>
        <div class="grid-1 graph-form agile_info_shadow newemailadd">
        <?php $k=1;
        if(!empty($asConnection['as_connections_emails']))
        {
        foreach($asConnection['as_connections_emails'] as $email){?>
        <!--<div class="form-group">
          <label for="selector1" class="col-sm-2 control-label">Email Type</label>
          <div class="col-sm-8">
            <select name="data[as_connections_emails][type<?php //echo $k;?>]" id="selector1" class="form-control1">
              <option value="">Select Email</option>
              <option value="Personal" <?php //if($email['type']=='Personal'){echo "selected";}?>>Personal Email</option>
              <option value="Work" <?php //if($email['type']=='Work'){echo "selected";}?>>Work Email</option>
            </select>
          </div>
        </div>-->
        <!--<div class="form-group">
          <label for="radio" class="col-sm-2 control-label">Visibility</label>
          <div class="col-sm-8">
            <div class="radio-inline"><label><input name="data[as_connections_emails][visibility<?php //echo $k;?>]" value="<?php //echo $email['visibility'];?>" type="radio" <?php //if($email['visibility']=='public'){echo "checked";}?>> Public</label></div>
            <div class="radio-inline"><label><input name="data[as_connections_emails][visibility<?php //echo $k;?>]" value="<?php //echo $email['visibility'];?>" type="radio" <?php //if($email['visibility']=='private'){echo "checked";}?>> Private</label></div>
          </div>
        </div>-->
        <div class="form-group user_display_form_vals">
          <label for="smallinput" class="col-sm-2 control-label label-input-sm">Email Address</label>
          <div class="col-sm-8">
            <input class="form-control1 input-sm" id="email_address<?php echo $k;?>" placeholder="Email" name="data[as_connections_emails][address<?php echo $k;?>]" type="text" value="<?php echo $email['address'];?>" required="required" >
          </div>
        </div>
        <input type="hidden" value="<?php echo $email['id'];?>" name="data[as_connections_emails][email_id<?php echo $k;?>]" />
        <?php $k++;} }else
        {
          ?>
          <div class="form-group user_display_form_vals">
          <label for="smallinput" class="col-sm-2 control-label label-input-sm">Email Address</label>
          <div class="col-sm-8">
            <input class="form-control1 input-sm" id="email_address1" placeholder="Email" name="data[as_connections_emails][address1]" type="text" value="" required="required" >
          </div>
        </div>
          <?php
        }?>
        <!--<div class="form-group">
        <div class="col-sm-8">&nbsp;</div>
        <div class="col-sm-4"><button class="newEmail btn btn-danger btn-flat btn-pri" type="button"><i class="fa fa-plus" aria-hidden="true"></i>Add More</button></div>
        </div>-->
        
        </div>
         <div class="form-group">
         <input type="hidden" value="<?php echo (count($asConnection['as_connections_addresses'])>0?count($asConnection['as_connections_addresses']):2);?>" id="totalAds" name="data[totalAds]" />
         <input type="hidden" value="1" name="data[totalEmails]" />
         <input type="hidden" value="<?php echo count($asConnection['as_connections_phones']);?>" id="totalPhones" name="data[totalPhones]" />
         <input type="hidden" value="<?php echo count($asConnection['id']);?>" name="data[id]" />
                                <label for="focusedinput" class="col-sm-2 control-label">&nbsp;</label>
                                <div class="col-sm-8">
                                <a href="<?php echo HTTPADMIN;?>/edituser3/<?php echo $asConnection['id'];?>" class="btn btn-primary submit-btn" style="margin-left: 10px;">Next</a>&nbsp;
                                 <button type="submit" class="btn btn-primary submit-btn">Save & Next</button>
                                 
                                </div>
                            </div>
      </form>
    
  </div>
</div>



            <!--//set-2-->

        </div>
        <!--//forms-inner-->
    </div>
    <!--//forms-->
    
    
<!--<div class="field_wrapper">
    <div>
        <input type="text" name="field_name[]" value=""/>
        <a href="javascript:void(0);" class="add_button" title="Add field"><img height="30" width="30" src="<?php echo HTTP ;?>img/Add-icon.png"/></a>
    </div>
</div>-->


</div>
<!-- //inner_content_w3_agile_info-->
</div>
<!-- //inner_content-->

          
        
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAn8MyXKfr-KMBInEgmJfESScGLhk2kY-E"></script> 
<script type="text/javascript">
  jQuery(document).ready(function($) {
    var oldvaladd1=$('#adtype2').val();
    var oldvaladd2=$('#address2').val();
    var oldvaladd3=$('#city2').val();
    var oldvala_select=$('#state2').val();
    var oldvaladd5=$('#zipcode2').val();
    var oldvaladd6=$('#lat2').val();
    var oldvaladd7=$('#long2').val();
     $('#copy_address_edit').change(function() {
      if($(this).is(":checked")) { 
    var val_state=$('#state1').val(); 
    $('#address2').val($('#address1').val());
    $('#city2').val($('#city1').val());
    $('#zipcode2').val($('#zipcode1').val());
    $('#lat2').val($('#lat1').val());
    $('#long2').val($('#long1').val());
    $('#state2 option')
      .removeAttr('selected')
      .filter("[value='"+ val_state + "']")
      .attr('selected', true)
      .prop('selected', true);
    
      }else{  

      $('#address2').val(oldvaladd2);
      $('#city2').val(oldvaladd3);
      $('#zipcode2').val(oldvaladd5);
      $('#lat2').val(oldvaladd6);
      $('#long2').val(oldvaladd7);    
      $('#state2 option')
        .removeAttr('selected')
        .filter("[value='"+ oldvala_select + "']")
        .attr('selected', true)
        .prop('selected', true);  
    }     
    
    });
  });
function myfunction(id){
		var valIDs='#'+id;
		$( ".tooglee" ).each(function() {
		$( this ).attr('checked', false);
        });
		$(valIDs).prop("checked", true);
		
		
        //});
		}
 function remove_li1($selfVar,j) {
	  	$($selfVar).parents('.parents-all').remove();	
	  	//var totalAds=parseInt($("#totalAds").val())-1;
		
		//$("#totalAds").val(totalAds);  
		//alert(j);	
		//j=j-1;
	  	return true;
	  }	
$(function(){
	
	$('#myform').validate({ // initialize the plugin

        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.insertAfter($(element).parents('.user_display_form_vals'));
        }
});
	
		  
		
		
			$(".append-btn").click(function(){
			var j=$('.parents-all').length;    
      j = j+1;
			$("#totalAds").val(j);
			
			  $str = '<span class="parents-all"><h3 class="w3_inner_tittle two">Another  Address </h3><div class="grid-1 graph-form agile_info_shadow">'   
		        +  '<div class="form-group user_display_form_vals">'
	            +    '<label class="col-sm-2 control-label label-input-sm">Address Type</label>'
	            +    '<div class="col-sm-8"><select class="required multiselect-ui form-control1" name="data[as_connections_addresses][type'+j+']" id="type'+j+'" required="required">'
	            +      	'<option value="">Select Address Type</option>'
	            +          '<?php $options=array('Site','Mailing','Office','Other');foreach($options as $st){?>'
	            +     	'<option value='+"<?php echo $st; ?>"+'>'+"<?php echo $st; ?>"+'</option>'
	            +        ' <?php } ?>'
	            +      '</select></div>'
	            +    '</div>'
		        +  '<div class="form-group user_display_form_vals">'
	            +    '<label class="col-sm-2 control-label label-input-sm">Address</label>'
	            +      '<div class="col-sm-8"><textarea  cols="83" rows="4" class="required address form-control1 input-sm valid" required="required" placeholder="Address" name="data[as_connections_addresses][address'+j+']" id="address'+j+'"></textarea>'
	            +    '</div></div>'
				+	'<div class="form-group user_display_form_vals">'
	            +    '<label class="col-sm-2 control-label label-input-sm">City</label>'
	            +      '<div class="col-sm-8"><input type="text" class="required form-control1" required="required" placeholder="City" name="data[as_connections_addresses][city'+j+']" id="city'+j+'" onblur="getLatlong('+j+');">'
	            +    '</div></div>'
		        +  '<div class="form-group user_display_form_vals">'
	            +    '<label class="col-sm-2 control-label label-input-sm">State</label>'
	            +      '<div class="col-sm-8"><select class="required state multiselect-ui form-control1" required="required" name="data[as_connections_addresses][state'+j+']" id="state'+j+'" onchange="getLatlong('+j+');">'
	            +      	'<option value="">Select State</option>'
	            +          '<?php foreach($state_list as $st){?>'
	            +     	'<option value="'+"<?php echo $st;?>"+'">'+"<?php echo $st;?>"+'</option>'
	            +        ' <?php } ?>'
	            +      '</select></div>'
	            +    '</div>'
		        +  '<div class="form-group user_display_form_vals">'
	            +    '<label class="col-sm-2 control-label label-input-sm" for="pass">Zipcode</label>'
	            +      '<div class="col-sm-4"><input type="text" class="required zip form-control1" placeholder="Zipcode" required="required" maxlength="6" name="data[as_connections_addresses][zipcode'+j+']">'	                +    '</div></div>'
				+   '<div class="form-group">'
                +        '<label class="col-sm-2 control-label label-input-sm" for="pass">&nbsp;</label>'
				+   '<div class="col-sm-8"><a href="http://www.latlong.net/convert-address-to-lat-long.html" target="_blank"> Get your Latitude and Longitude here.</a>'	                +    '</div></div>'
		        +  '<div class="form-group user_display_form_vals">'
	            +    '<label class="col-sm-2 control-label label-input-sm" for="pass">Map Latitude</label>'
	            +      '<div class="col-sm-4"><input type="text" class="lat required form-control1" required="required" name="data[as_connections_addresses][lat'+j+']" placeholder="Latitude" id="lat'+j+'">'
	            +    '</div><div class="col-sm-4"><input type="text" class="long required form-control1" placeholder="Longitude" name="data[as_connections_addresses][long'+j+']" id="long'+j+'"><input type="hidden" value="0" name="data[as_connections_addresses][preferred'+j+']"></div>'
				
            	+ '<div class="form-group">'
				+	 '<label class="col-sm-2 control-label label-input-sm">&nbsp;</label>'
				//+      '<button onClick = "remove_li1(this);" class="btn btn-grey close-btn-append" type="button"><?php //echo __("Remove Address")?><i class="fa fa-close"></i></button>'
	            +      '<a href="javascript:void(0);" onClick = "remove_li1(this);" title="Remove field"><img height="30" width="30" src="<?php echo HTTP ;?>img/remove.png"/></a>'
							+ '</div><input type="hidden" value="" name="data[as_connections_addresses][address_id'+j+']" /></div></span>';
			  $("#add-mraddrs").before($str); 
			  
			});});  
						 
$(document).ready(function(){
	
	
	//Add More Phone No
	
    var maxField = 5; //Input fields increment limitation
    var addButton = $('.newPhone'); //Add button selector
    var wrapper = $('.newphoneadd'); //Input field wrapper
	var j='<?php echo $j;?>';
	$("#totalPhones").val(j);
    /*var fieldHTML = '<div><input type="text" name="field_name[]" value=""/><a href="javascript:void(0);" class="remove_button" title="Remove field"><img height="30" width="30" src="<?php //echo HTTP ;?>img/remove.png"/></a></div>'; //New input field html */
	
	var fieldHTML = '<div class="removeDiv"><a href="javascript:void(0);" class="remove_button" title="Remove field"><img height="30" width="30" src="<?php echo HTTP ;?>img/remove.png"/></a><div class="form-group"><label for="radio" class="col-sm-2 control-label">Preferred</label><div class="col-sm-8"><div class="radio-inline"><label><input id="show_form'+j+'" type="radio" name="data[as_connections_phones][preferred'+j+']" onclick="myfunction(this.id)" class="tooglee"> Preferred</label></div></div></div><div class="form-group user_display_form_vals"><label for="selector1" class="col-sm-2 control-label">Phone Type</label><div class="col-sm-8"><select name="data[as_connections_phones][type'+j+']" id="selector1" class="form-control1" required="required"><option value="">Select Phone</option><option value="Office Phone">Office Phone</option> <option value="Cell Phone">Cell Phone</option><option value="Site Fax">Site Fax</option><option value="Crisis Line">Crisis Line</option></select></div></div><div class="form-group user_display_form_vals"><label for="smallinput" class="col-sm-2 control-label label-input-sm">Phone Number</label><div class="col-sm-8"><input class="form-control1 input-sm" id="smallinput" required="required" name="data[as_connections_phones][number'+j+']" placeholder="Phone Number" type="text" value=""></div></div></div>'; //New input field html 
            
	
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
		//alert(x);
    });
	
	
	//Add More Email Address
	
	
	 //var maxField = 5; //Input fields increment limitation
    var addEmailButton = $('.newEmail'); //Add button selector
    var Emailwrapper = $('.newemailadd'); //Input field wrapper
    /*var fieldHTML = '<div><input type="text" name="field_name[]" value=""/><a href="javascript:void(0);" class="remove_button" title="Remove field"><img height="30" width="30" src="<?php echo HTTP ;?>img/remove.png"/></a></div>'; //New input field html */
	
	var fieldEmailHTML = '<div class="removeEmailDiv"><a href="javascript:void(0);" class="remove_button" title="Remove field"><img height="30" width="30" src="<?php echo HTTP ;?>img/remove.png"/></a><div class="form-group"><label for="selector1" class="col-sm-2 control-label">Email Type</label><div class="col-sm-8"><select name="data[new_email][type][]" id="selector1" class="form-control1"><option value="">Select Email</option><option value="Personal">Personal Email</option><option value="Work">Work Email</option></select></div></div><div class="form-group"><label for="radio" class="col-sm-2 control-label">Visibility</label><div class="col-sm-8"><div class="radio-inline"><label><input name="data[new_email][visibility][]" type="radio" value="public"> Public</label></div><div class="radio-inline"><label><input name="data[new_email][visibility][]" type="radio" value="private"> Private</label></div></div></div><div class="form-group"><label for="smallinput" class="col-sm-2 control-label label-input-sm">Email Address</label><div class="col-sm-8"><input class="form-control1 input-sm" id="smallinput" placeholder="Email" name="data[new_email][address][]" type="text" value=""></div></div></div>'; //New input field html 
	
	
    var x = 1; //Initial field counter is 1
    $(addEmailButton).click(function(){ //Once add button is clicked
        if(x < maxField){ //Check maximum number of input fields
            x++; //Increment field counter
            $(Emailwrapper).append(fieldEmailHTML); // Add field html
        }
    });
    $(Emailwrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
	
	
});	

function getLatlong(i){
//alert(i);	
var addressID="#address"+i;
var cityID="#city"+i;
var stateID="#state"+i;

var address = $(addressID).val()+','+$(cityID).val()+','+'United States';
//alert($(addressID).val());
getLatitudeLongitude( address,i)

	}
	
function showResult(result) {
	
    latnew = result.geometry.location.lat();
    longnew = result.geometry.location.lng();
	alert(latnew+'||'+longnew);
	//return latnew+'||'+longnew;
}

function getLatitudeLongitude(address,i) {
    // If adress is not supplied, use default value 'Ferrol, Galicia, Spain'
	var latID='#lat'+i;
    var longID='#long'+i;
    var address =  address.toString()||'Ferrol,Galicia,Spain';
	//alert(address);
    // Initialize the Geocoder
    var geocoder = new google.maps.Geocoder();
    //if (geocoder) {
        geocoder.geocode({
            'address': address
        }, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                //callback(results[0]);
				//alert(results[0].geometry.location.lat());
				//alert(results[0].geometry.location.lng());
				$(latID).val(results[0].geometry.location.lat());
				$(longID).val(results[0].geometry.location.lng());
            }
        });
   // }
}
	  
		</script>