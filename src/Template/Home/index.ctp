<?php foreach($therapiests as $therapiest){
	  $allTherapist[$therapiest['id']]=$therapiest['name'];
	}?>
 
 
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gutter banner-bg" style="z-index:200;">
  	<div class="overlay"> 
    		<div class="main-search-inner">

		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2>Connect With a Provider</h2>
                    <form action="<?php echo HOME_WEB;?>home/searchResults" method="post" name="home_search" class="home_search"> 
					<div class="main-search-input">

						<div class="main-search-input-item">
							<!--<input placeholder="Provider Type" id="myText" autocomplete="on" >
                             <input type="hidden" name="therapist_type" id="searchval"/>-->
                             <select data-placeholder="Provider Type" class="multiselect-ui" name="therapist_type" id="therapist_type" >
                             <option value="" disabled selected>Provider Type</option>
                             
                             <?php foreach($allTherapist as $key=>$ther){?>
                             <?php /*if($key==15){?>
                              <optgroup label="<?php echo $ther;?>">
                             <?php }*/ if($key!=15){?>
                             <option value="<?php echo $key;?>"><?php echo $ther;?></option>
                             <?php }if($key==24){?>
                              </optgroup>
                             <?php }?>
                             <?php }?>
                             
                             </select>
                             
						</div>
                        
                        <div class="main-search-input-item location">
							<input type="text" placeholder="City or Zip Code" name="location" value="">
						</div>
                     
                       <div class="main-search-input-item">
                        <?php //$languages=array("Mandarin","Arabic","Spanish","Hindi","Italian","Russian","Portuguese","Bengali","French","Urdu","Japanese","German","American","Sign");
						//asort($languages);
						//print_r($languages);
						?>
							<select data-placeholder="Language" class="multiselect-ui" name="lang_session" id="lang_session" placeholder="Language" >
								<option value="">Language</option>	
								<?php foreach($languages as $language){?>  
                                <option value="<?php echo $language['name'];?>"><?php echo $language['name'];?></option>
                                <?php }?>                             
							</select>
						</div>
                    <input type="hidden" value="1" name="home_search" />
                   <button type="submit" class="button">Search</button>
                   
					</div> 
                    </form>
				</div>
			</div>
		</div>

	</div>
    
     </div>
   </div> 
   
   <div class="map_section col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center gutter" style="z-index:100;">
   		<div class="overlay">
       	 <div class="container">
            <h1> Welcome </h1>
            
            <p> Welcome! The Aspen Strong Provider Directory is an online, searchable database including providers and organizations supporting good mental hygiene practices in the Aspen to Parachute corridor.The directory connects individuals or referrals sources to direct mental health or addiction service providers.  </p> 
       </div>    
       </div> 
   </div>

	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center text_section">
   		<div class="container">
        		<h1> How It Works </h1>
               
               <div class="new_sec_text">
               		<h2> LISTING YOUR PROVIDER PROFILE </h2> 
              		 <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text">
                <img src="<?php echo HTTP;?>images/front/image/step1.png" class="img-responsive center-block">
                <h3>Register as an Aspen Strong Provider</h3>
                <p>Providers include individual professionals or businesses including treatment centers supporting the mental hygiene of employees and                    residents in the Aspen to Parachute corridor. Provider types include clinical, medical, holistic, and financial supports.</p>
               </div>
               
               <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text"> 
                     <img src="<?php echo HTTP;?>images/front/image/step2.png" class="img-responsive center-block">
                     <h3>Set up your Profile</h3>
                     <p> Once you have registered and agreed to Aspen Strong Directory  terms and conditions you will receive an email to begin setting up your                         profile. After your profile has been reviewed and approved by our team we will display it on our directory of services.</p>
               </div>
               
               <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text"> 
                     <img src="<?php echo HTTP;?>images/front/image/step3.png" class="img-responsive center-block">
                     <h3>Promote your Profile</h3>
                     <p> Your profile will be promoted through our directory which is a direct point of contact for all residents and employees that choose to                         take an online mental health screening.  You will receive monthly emails of traffic reports to your profile and will be encouraged to                         keep your profile updated and active. You profile helps the valley to understand and identify the availability and gaps that exist in                         the mental health arena</p>
               </div> 
               </div>
               
               
               <div class="new_sec_text">
               		<h2> CONNECTING TO A PROVIDER FOR YOURSELF OR A REFERRAL </h2> 
              		 <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text">
                <img src="<?php echo HTTP;?>images/front/image/step1.png" class="img-responsive center-block">
                <h3>Connect with a Provider</h3>
                <p>Use the directory home page to identify the type of provider, zip code, or language of your needs or just click search to access the                   searchable database of providers supporting your mental hygiene. </p>
               </div>
               
               <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text"> 
                     <img src="<?php echo HTTP;?>images/front/image/step2.png" class="img-responsive center-block">
                     <h3>Search Your Way</h3>
                     <p> Use the searchable tools to research mental health resources available to you or your referral. We recommend that you choose multiple                          resources and make phone calls to find a good fit. This resource was created to support  community members, businesses, HR                          departments, public health departments, mental health care providers, and other allied and referrals resources. </p>
               </div>
               
               <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text"> 
                     <img src="<?php echo HTTP;?>images/front/image/step3.png" class="img-responsive center-block">
                     <h3>Explore your options</h3>
                     <p> This resource is made available to increase your access to services in the safe environment of your home or doctor office.</p>
               </div> 
               </div>
               
         </div>
   </div>    
   
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 cta">
   		<div class="container no_mar"> 
            <div class="col-md-2 col-sm-6 col-xs-12">
                      <div class="item-countup">
                        <div class="item-black-top-arrow"><i class="fa fa-users"></i></div>
                        <div id="count-1" class="coutter-item count_number item-count-up">72</div>
                        <div class="counter_text">Providers</div>
                      </div>
                 </div>
        	 
             
             <div class="col-md-2 col-sm-6 col-xs-12">
                  <div class="item-countup">
                    <div class="item-black-top-arrow"><i class="fa fa-user" aria-hidden="true"></i></div>
                    <div id="count-2" class="coutter-item count_number item-count-up">54</div>
                    <div class="counter_text">Individuals</div>
                  </div>
            </div>
           
              <div class="col-md-2 col-sm-6 col-xs-12">
                  <div class="item-countup">
                    <div class="item-black-top-arrow"><i class="fa fa-building-o"></i></div>
                    <div id="count-3" class="coutter-item count_number item-count-up">18</div>
                    <div class="counter_text">Organization</div>
                  </div>
            </div>
            
             <div class="col-md-2 col-sm-6 col-xs-12">
                  <div class="item-countup last-countup">
                    <div class="item-black-top-arrow"><i class="fa fa-th-list"></i></div>
                    <div id="count-4" class="coutter-item count_number item-count-up">25</div>
                    <div class="counter_text">Provider types</div>
                  </div>
           </div>
           
           <div class="col-md-2 col-sm-6 col-xs-12">
                  <div class="item-countup">
                    <div class="item-black-top-arrow"><i class="fa fa-map-marker"></i></div>
                    <div id="count-3" class="coutter-item count_number item-count-up">52</div>
                    <div class="counter_text">Zip Code</div>
                  </div>
            </div>
          
        </div>
   </div>     
   
   <div class="home-testimonials col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="container">
                <div class="section-head text-center">
                    <h3>What our community is saying</h3> </div>
                <div class="row">
                    <div class="col-md-4 col-sm-6 mob-space30">
                        <div class="quote text-center"> <img src="<?php echo HTTP;?>images/front/image/1.png" class="center-block" alt="">
                            <p>Aspenstrong.org is my favorite resource for myself and my patients. Thank you for making it possible. </p> 
                            <cite>– PETER V. WILEY MD; Psychiatry, Valley View Hospital</cite> </div>
                    </div>
                    <div class="col-md-4 col-sm-6 mob-space30">
                        <div class="quote text-center"> <img src="<?php echo HTTP;?>images/front/image/3.png" class="center-block" alt="">
                            <p>Timely and effective mental health care is essential for our community and for the health and wellbeing of all of us as                              community members. We are very fortunate to have Aspen Strong on our team. Through their leadership and with their resources,                              every member of our community can have the ability to recognize when they are in need of help and access the care they need. </p>
                            <cite>– DAVID RESSLER; CEO Aspen Valley Hospital</cite> </div>
                    </div>
                    
                    <div class="col-md-4 col-sm-6 mob-space30">
                        <div class="quote text-center"> <img src="<?php echo HTTP;?>images/front/image/2.png" class="center-block" alt="">
                            <p>Aspen Strong is invaluable to those in our community who are suffering. As a physician, I appreciate having so many mental                                health resources in one place.</p> 
                                <cite>– BROOKE ALLEN, MD; Roaring Fork Neurology, P.C.</cite> </div>
                    </div>
                    
                </div>
            </div>
     </div>    
     
<link href="<?php echo HTTP;?>css/front/fSelect.css" rel="stylesheet">

<script src="<?php echo HTTP;?>js/front/fSelect.js"></script>
     
<!--<script type="text/javascript" src="<?php //echo HTTP;?>js/front/chosen.js"></script>-->      
<script type="text/javascript">
$(function () {
	//alert( window.location.search.substring(1));
	var str1 = window.location.pathname;
    var str2 = window.location.search.substring(1);
	//alert(str1);
    //if(str2=='verify=1' && str1.indexOf(str2) != -1){
	if(str2=='verify=1'){
	$('#myModal').modal('show');
	}
		if(str2=='register=1'){
	$('#myModal').modal('show');
	}
	
	//$('.multiselect-ui').fSelect({  placeholder: 'Languages'});
	$('#therapist_type').fSelect({placeholder: 'Provider Type',multiple: 'multiple'});
	$('#lang_session').fSelect({ placeholder: 'Languages',multiple: 'multiple'});
	//$('.multiselect-ui').fSelect();
	/* var config = {
      '.chosen-select2'           : {placeholder_text_single: "Provider Type"},
      /*'.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chosen-select-width'     : {width:"95%"}*/
    /*}
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }*/
	

});
  
	 

</script>