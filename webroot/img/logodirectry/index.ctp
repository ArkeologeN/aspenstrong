<?php $login_id=$this->Session->read('Auth.User.ID');?>
<script src="<?= HTTP_ROOT ?>js/front/bootstrap-tooltip.js"></script>
<!--  section start here  -->
		<section class="sec-list">
		<?php if($this->Session->read('search.condition')) $data=$this->Session->read('search.condition');?>
		<?php if($this->Session->read('search.zipcode')) $zipcode=$this->Session->read('search.zipcode');?>
		<?php
		$diagnosis=array();
		$trouble=array();
		$trouble_string=str_replace("%","",@$data['0']['AsConnectionsMeta.issue LIKE']);
		$diagnosis_string=str_replace("%","",@$data['1']['AsConnectionsMeta.diagnosis LIKE']);
		
		if(!empty($diagnosis_string)){
			$diagnosis=explode('|',$diagnosis_string);
		}
		if(!empty($trouble_string))
		{
			$trouble=explode('|',$trouble_string);
		}?>
		
		
			<div class="container">
				<div class="row">					
					<div class="col-sm-3 col-xs-12">
						<div class="othr-head">
							<h4>Refine Your Results</h4>
						</div>
						
						<div class="left_sidebar">
							<form method="post" id="refine" action="<?= HTTP_ROOT?>list/search">
								<input type="hidden" name="data[form]" value="1"/>
								<input type="hidden" name="data[Session]" id="deleteSession" value="">
							<?php if(!empty($trouble_string)){?>
							 <!-- <div class="refine">
								<label>Trouble:</label>
								<ul class="trouble"> -->
									<?php foreach($trouble as $key=>$trouble1) { ?>
									
									<!-- <li style="float:left"><?php echo $trouble1;?><span id="<?php echo $trouble1?>" attr="trouble"  class="iconshow fa fa-close delete"></span>
									</li> -->
								<?php } ?>
								<!-- </ul>
							</div> --> 
							<?php } 
							if(!empty($diagnosis_string)){?>
							 <div class="refine">
								<!-- <label>Diagnosis:</label>
								<ul class="trouble"> -->
									<?php foreach($diagnosis as $key=>$diagnosis1) { ?>
										<!-- <li style="float:left"><?php echo $diagnosis1;?><span id="<?php echo $diagnosis1;?>" attr="diagnosis" class="iconshow fa fa-close delete"></span>
									</li> -->
								<?php } ?>
								<!-- </ul>
							</div> --> 
							<?php } ?>
							<div class="form-group cust_select">
									<label><?php echo __("Zip code:") ?></label>
									<!-- <input type="text" name="data[Asconnection][zip]" id="zip" value="<?php echo str_replace("%","",@$zipcode); ?>"  class="form-control Zipcode"> -->
									<input type="text" name="data[Asconnection][zip]" id="zip" class="form-control Zipcode">
									<p id="err_zip" style="display:none"></p>									
									<div class="caret"></div>
								</div>
								 
								<div class="form-group cust_select" id="miles">
									<label><?php echo __("Miles:") ?></label>
									<select class="form-control Miles" name="data[Asconnection][miles]">
										<!-- <optgroup> -->
											<!-- <option value="" >Distance (in Miles)</option>		
											<option value="10" <?php if(@$data['AsConnection.distance <=']=='10')echo "selected"; ?>>10 Miles</option>		
											<option value="25" <?php if(@$data['AsConnection.distance <=']=='25')echo "selected"; ?>>25 Miles</option>		
											<option value="50" <?php if(@$data['AsConnection.distance <=']=='50')echo "selected";  ?>>50 Miles</option>		
											<option value="100" <?php if(@$data['AsConnection.distance <=']=='100')echo "selected";  ?>>100 Miles</option>		
											<option value="500" <?php if(@$data['AsConnection.distance <=']=='500')echo "selected";  ?>>500 Miles</option>		
											<option value="1000" <?php if(@$data['AsConnection.distance <=']=='1000')echo "selected";  ?>>1000 Miles</option>  -->
											<option value="" ><?php echo __("Distance (in Miles)") ?></option>		
											<option value="10" <?php  if($this->Session->read('searchresult.Miles')==10){ echo "selected"; } ?>>10 Miles</option>		
											<option value="25" <?php  if($this->Session->read('searchresult.Miles')==25){ echo "selected"; } ?>>25 Miles</option>		
											<option value="50" <?php  if($this->Session->read('searchresult.Miles')==50){ echo "selected"; } ?>>50 Miles</option>		
											<option value="100" <?php  if($this->Session->read('searchresult.Miles')==100){ echo "selected"; } ?>>100 Miles</option>		
											<option value="500" <?php  if($this->Session->read('searchresult.Miles')==500){ echo "selected"; } ?>>500 Miles</option>		
											<option value="1000" <?php  if($this->Session->read('searchresult.Miles')==1000){ echo "selected"; } ?>>1000 Miles</option> 
													
										<!-- </optgroup> -->
									</select>
									<div class="caret"></div>
								</div>
								
								<div class="form-group cust_select" id="entry">
									<label><?php echo __("Type:") ?></label>
									<select class="form-control Type"  name="data[Asconnection][entry_type]">
										<optgroup>
										<?php if(!empty($data['AsConnection.entry_type']))$entry =str_replace("%","",@$data['AsConnection.entry_type']); ?>
								 <option value="" ><?php echo __("Both") ?></option> 		
	                  	<option value="individual" <?php if(@$entry=='individual') echo "selected"; ?> ><?php echo __("Individual")?></option>
	                  	<option value="organization" <?php if(@$entry=='organization') echo "selected"; ?> ><?php echo __("Organization")?></option>
										</optgroup>
									</select>
									<div class="caret"></div>
								</div>
								<div class="form-group cust_select" id="service">
									<label><?php echo __("Service Type:") ?></label>
									<select class="form-control Services" name="data[AsConnectionsMeta][services_provided]">
										<optgroup>
								<option value="" ><?php echo __("Both") ?></option>			
	                  	<option value="Yes" <?php if(@$data['AsConnectionsMeta.services_provided']=='Yes') echo "selected";  ?> ><?php echo __("They only use licensed professionals") ?></option>
	                  	<option value="No" <?php if(@$data['AsConnectionsMeta.services_provided']=='No') echo "selected";  ?> ><?php echo __("They don't only use licensed professionals") ?></option>
										</optgroup>
									</select>
									<div class="caret"></div>
								</div>
								<div class="form-group cust_select" id="service1">
									<label><?php echo __("Service Type:") ?></label>
									<select class="form-control " name="data[AsConnectionsMeta][services_provided]">
										<optgroup>
								<option value="" ><?php echo __("Both") ?></option>			
	                  	<option value="mental" <?php if(@$data['AsConnection.program_status']==1) echo "selected"; ?> ><?php echo __("Accepts Mental Health Fund?") ?></option>
	                  	<option value="traid" <?php if(@$data['AsConnection.health_fund_status']==1) echo "selected"; ?> ><?php echo __("Accepts TRIAD EAP?") ?></option>
										</optgroup>
									</select>
									<div class="caret"></div>
								</div>
								<div class="form-group cust_select" id="service2">
									<label><?php echo __("Conduct Session:") ?></label>
									<select class="form-control Session" name="data[AsConnectionsMeta][lang_session]">
										<optgroup>
								<option value="" ><?php echo __("Both") ?></option>						
	                  	<option value="0" <?php if(@$data['AsConnectionsMeta.lang_session']=='0') echo "selected";  ?> ><?php echo __("Session in English") ?></option>
	                  	<option value="1" <?php if(@$data['AsConnectionsMeta.lang_session']=='1') echo "selected";  ?> ><?php echo __("Session in Spanish") ?></option>
										</optgroup>
									</select>
									<div class="caret"></div>
								</div>
								<div class="form-group cust_select">
									<label><?php echo __("Treatment orientation:") ?></label>

									<?php if($this->Session->read('Config.language')=='spa'){?>
									<select class="form-control Treatment"  name="data[Asconnection][treatment]">
										<optgroup>
											<?php if(!empty($data['AsConnectionsMeta.treatment LIKE']))$entry =str_replace("%","",@$data['AsConnectionsMeta.treatment LIKE']);  ?>
										<option value="" ><?php echo __("All") ?></option>
											<?php foreach($treatment as $pro) { ?>
	                  	<option value="<?php echo $pro['Treatment']['name_spanish'] ?>" <?php if(@$entry==$pro['Treatment']['name']) echo "selected" ?>><?php echo $pro['Treatment']['name_spanish'] ?></option>
	                  	<?php } ?>
										</optgroup>
									</select>
									<?php } else { ?>
										<select class="form-control Treatment"  name="data[Asconnection][treatment]">
										<optgroup>
											<?php if(!empty($data['AsConnectionsMeta.treatment LIKE']))$entry =str_replace("%","",@$data['AsConnectionsMeta.treatment LIKE']);  ?>
										<option value="" ><?php echo __("All") ?></option>
											<?php foreach($treatment as $pro) { ?>
	                  	<option value="<?php echo $pro['Treatment']['name'] ?>" <?php if(@$entry==$pro['Treatment']['name']) echo "selected" ?>><?php echo $pro['Treatment']['name'] ?></option>
	                  	<?php } ?>
										</optgroup>
									</select>
									<?php } ?>

									<div class="caret"></div>
									
								</div>
								<div class="form-group cust_select">
									<label><?php echo __("Age Groups:") ?></label>
									<select class="form-control Age"  name="data[Asconnection][age]">
										<optgroup>
											<?php if(!empty($data['AsConnectionsMeta.age_group LIKE']))$entry =str_replace("%","",@$data['AsConnectionsMeta.age_group LIKE']); ?>
										   <option value="" ><?php echo __("All") ?></option>
											<?php foreach($age as $pro) { ?>
	                  	<option value="<?php echo $pro['Age']['id'] ?>" <?php if(@$entry==$pro['Age']['id']) echo "selected" ?>><?php echo $pro['Age']['name'] ?></option>
	                  	<?php } ?>
										</optgroup>
									</select>
									<div class="caret"></div>
								</div>
								<div class="form-group cust_select">
									<label><?php echo __("Insurance providers:")?></label>

									<?php if($this->Session->read('Config.language')=='spa'){?>
									<select class="form-control Insurance"  name="data[Asconnection][insurance]">
										<optgroup>
											<?php if(!empty($data['AsConnectionsMeta.insurance_provider LIKE']))$entry =str_replace("%","",@$data['AsConnectionsMeta.insurance_provider LIKE']); ?>
											<option value="" ><?php echo __("All") ?></option>
											<?php foreach($insurance as $pro) { ?>
	                  	<option value="<?php echo $pro['InsuranceProvider']['name_spanish'] ?>" <?php if(@$entry==$pro['InsuranceProvider']['name']) echo "selected" ?> ><?php echo $pro['InsuranceProvider']['name_spanish']?></option>
	                  	<?php } ?>
										</optgroup>
									</select>

									<?php } else {?>
										
									<select class="form-control Insurance"  name="data[Asconnection][insurance]">
										<optgroup>
											<?php if(!empty($data['AsConnectionsMeta.insurance_provider LIKE']))$entry =str_replace("%","",@$data['AsConnectionsMeta.insurance_provider LIKE']); ?>
											<option value="" ><?php echo __("All") ?></option>
											<?php foreach($insurance as $pro) { ?>
	                  	<option value="<?php echo $pro['InsuranceProvider']['name'] ?>" <?php if(@$entry==$pro['InsuranceProvider']['name']) echo "selected" ?> ><?php echo $pro['InsuranceProvider']['name'] ?></option>
	                  	<?php } ?>
										</optgroup>
									</select>
									<?php } ?>

									<div class="caret"></div>
								</div>
								<div class="form-group cust_select">
									<label><?php echo __("Modality:") ?></label>
									<select class="form-control Modality"  name="data[Asconnection][modality]">
										<optgroup>
											<?php if(!empty($data['AsConnectionsMeta.modality LIKE']))$entry =str_replace("%","",@$data['AsConnectionsMeta.modality LIKE']); ?>
										 
										<option value="" ><?php echo __("All") ?></option>
											<?php foreach($modality as $pro) { ?>
	                  	<option value="<?php echo $pro['Modality']['id'] ?>" <?php if(@$entry==$pro['Modality']['id']) echo "selected" ?>><?php echo $pro['Modality']['name'] ?></option>
	                  	<?php } ?>
										</optgroup>
									</select>
									<div class="caret"></div>
								</div>
								<div class="form-group">
										<?php if(!empty($data[0]['AsConnectionsMeta.issue LIKE'])){$entry =str_replace("%","",@$data[0]['AsConnectionsMeta.issue LIKE']); $arr1=explode('|',$entry); }?>
											<label><?php echo __("I am having trouble with the following:") ?> </label>
											<?php if($this->Session->read('Config.language')=='spa'){?>

											<select class="selectpicker" multiple data-done-button="true" name="data[Asconnection][issue][]" id="trouble_key">
												<optgroup>
												
											     <?php  foreach($issue as $pro) { ?>
	                  	<option value="<?php echo $pro['Issue']['name_spanish'] ?>"<?php if(!empty($arr1)){ if(in_array($pro['Issue']['name'],@$arr1)) echo "selected"; }?> ><?php echo $pro['Issue']['name_spanish'] ?></option>
	                  	<?php } ?>
											  </optgroup>
										  </select>
										  <?php } else { ?>

										  	<select class="selectpicker" multiple data-done-button="true" name="data[Asconnection][issue][]" id="trouble_key">
												<optgroup>
												
											     <?php  foreach($issue as $pro) { ?>
	                  	<option value="<?php echo $pro['Issue']['id'] ?>"<?php if(!empty($arr1)){ if(in_array($pro['Issue']['name'],@$arr1)) echo "selected"; }?> ><?php echo $pro['Issue']['name'] ?></option>
	                  	<?php } ?>
											  </optgroup>
										  </select>
	                  	<?php } ?>
										</div>
										
										<div class="form-group">
											<label><?php echo __("OR, I have been diagnosed with the following:") ?></label>

											<?php if($this->Session->read('Config.language')=='spa'){?>
											<select class="selectpicker" multiple data-done-button="true" name="data[Asconnection][diag][]" id="diagnose_key">
												<?php if(!empty($data[1]['AsConnectionsMeta.diagnosis LIKE'])){$entry =str_replace("%","",@$data[1]['AsConnectionsMeta.diagnosis LIKE']); $arr=explode('|',$entry); }?>
												<optgroup>
											    <?php foreach($mental as $pro) { ?>
	                  	<option value="<?php echo $pro['MentalHealth']['id'] ?>" <?php if(!empty($arr)){if(in_array($pro['MentalHealth']['name'],$arr)) echo "selected"; } ?> ><?php echo $pro['MentalHealth']['name_spanish'] ?></option>
	                  	<?php } ?>
											  </optgroup>
										  </select>
						<?php } else { ?>
							<select class="selectpicker" multiple data-done-button="true" name="data[Asconnection][diag][]" id="diagnose_key">
												<?php if(!empty($data[1]['AsConnectionsMeta.diagnosis LIKE'])){$entry =str_replace("%","",@$data[1]['AsConnectionsMeta.diagnosis LIKE']); $arr=explode('|',$entry); }?>
												<optgroup>
											    <?php foreach($mental as $pro) { ?>
	                  	<option value="<?php echo $pro['MentalHealth']['id'] ?>" <?php if(!empty($arr)){if(in_array($pro['MentalHealth']['name'],$arr)) echo "selected"; } ?> ><?php echo $pro['MentalHealth']['name'] ?></option>
	                  	<?php } ?>
											  </optgroup>
										  </select>
									<?php } ?>
										</div>
										<div class="form-group frm-srch">
											<label><?php echo __("Search") ?></label>
											<!-- <div class="right-addon">
												<input type="text" name="data[Asconnection][search]" value="<?php echo str_replace('%','',@$data[2]['OR'][0]['AsConnection.slug LIKE']); ?>" class="form-control">	
												<i class="fa fa-search"></i>
											</div> -->
											<div class="right-addon">
												<input type="text" name="data[Asconnection][search]" class="form-control">	
												<i class="fa fa-search"></i>
											</div>
										</div>
								<div class="form-group">
									<input type="submit" class="btn btn-ornge" value="<?php echo __('Submit')?>" id="sub_val">
									<a href="<?= HTTP_ROOT ?>list/resetValues" ><input type="button" class="btn btn-grey" value="<?php echo __('Reset')?>"></a>
								</div>
							</form>
						</div>
					</div>
					<div class="col-sm-9 col-xs-12">
						
						<!-- Search refine -->
						
						
						
						<!-- Search refine -->
												
						<div class="othr-head">
							<h4><?php echo __("View Result") ?></h4>
						</div>
						<?php $searchResult = $this->Session->read('searchResult'); $searchResult1 = $this->Session->read('searchResult1');
						  ?>
							<div class="category-lists-type">
								<ul>
									<?php if(!empty($searchResult)){
										 
									 foreach($searchResult as $key=>$search){
									 	switch ($search) {
    										case 1:
        									$search="Toddlers / Preschoolers (0 to 6)";
        									break;
    										case 2:
        									$search="Children (6 to 13)";
        									break;
        									case 3:
        									$search="Adolescents (14 to 19)";
        									break;
        									case 4:
        									$search="Adults";
        									break;
        									$search="Elders (65+)";
        									break;
											}
									 	?>

									<li class="category-lists-ul">
										<p><?= $key ?> - <?= $search ?></p>
										<span id="<?= $key ?>" class="removeSearch"><a href="javascript:;"><i class="fa fa-times" aria-hidden="true"></i></a></span>
									</li>
									<?php } } ?>
									<?php if(!empty($searchResult1['Issue'])){

										if(!empty($issue_name_array)){
										foreach($issue_name_array as $key=>$issue){?>
										<li class="category-lists-ul">
											<p><?php echo __("Issue -") ?> <?= $issue['Issue']['name'] ?></p>
											 <span id="<?= $key ?>" class="removeSearchIssue"><a href="javascript:;"><i class="fa fa-times" aria-hidden="true"></i></a></span>
										</li>
									<?php }  } } ?>
									<?php if(!empty($searchResult1['Diagnosis'])){
										if(!empty($diag_name_array)){
										foreach($diag_name_array as $key=>$diag){?>
										<li class="category-lists-ul">
											<p>Diagnosis - <?= $diag['MentalHealth']['name'] ?></p>
											<span id="<?= $diag['MentalHealth']['name'] ?>" class="removeDiagnose"><a href="javascript:;"><i class="fa fa-times" aria-hidden="true"></i></a></span>
										</li>
									<?php } } }?>
								</ul>
							</div>
						<ul class="srch-list">	
						<?php foreach($list as $li){ ?>						
							<li>
								<div class="main search-result">
								<?php $key=base64_encode(convert_uuencode($li['AsConnection']['id']));?>
									<?php if(!empty($li['AsConnection']['logo'])){ ?>
									<div class="usr-img">
										<a href="<?php echo  HTTP_ROOT.'list/profileView/'.$key ?>" ><img class="img-responsive" src="<?= HTTP_ROOT.'app/img/logo/'.$li['AsConnection']['logo'] ?>"></a>
									</div>
									<?php } else { ?>
									<div class="usr-img">
										<a href="<?php echo  HTTP_ROOT.'list/profileView/'.$key ?>" ><img class="img-responsive" src="<?php echo  HTTP_ROOT.'app/img/logo.gif';?>"></a>
									</div>
									<?php } ?>
									<div class="srchInfo clearfix">
										<div class="row">
											<div class="col-md-8 col-sm-7 clearfix">
												<div class="main usr-info">
													<h3 class="name-city"><?php @$key=base64_encode(convert_uuencode($li['AsConnection']['id'])); if($li['AsConnection']['entry_type']=="individual") echo $li['AsConnection']['first_name'].' '.$li['AsConnection']['last_name'];
													else echo $li['AsConnection']['organization']; ?> <?php $arr=explode('|',$li['AsConnection']['title']); $t=implode(', ',$arr); echo $t; ?> <small>United States</small></h3>
													<h4 class="usr-fetur"><b>Keyskills:- </b>
														<?php //pr($li['speciality']); die;?>

														<?php $i=0;?>
														<?php
															$IssuenameArr = array();
															$IssuespanishArr = array();
														?>
														<?php foreach($li['speciality'] as $speciality){

														$IssuenameArr[$i] = $speciality['Issue']['name'];
														//pr($IssuenameArr[$i]);
														$IssuespanishArr[$i] = $speciality['Issue']['name_spanish'];	$i++;								
															} 
															?>
															<?php //pr($IssuenameArr); die; 
																  //pr($IssuespanishArr); die;
															?>
													<?php if($this->Session->read('Config.language')=='spa'){

															$keyskills_spanishname = implode(',',$IssuespanishArr);
																echo $keyskills_spanishname;
																 ?>
															<?php }else { 
																
															$keyskills_name = implode(',',$IssuenameArr);
																echo $keyskills_name;
															}?>
															
													 </h4>


													<p class="usr-dec"><?php if(@$data['AsConnectionsMeta.lang_session']=='1') echo substr(@$li['AsConnectionsMeta']['lang_statement'], 0, 150); else echo substr(@$li['AsConnectionsMeta']['personal_statement'], 0, 150); ?><span><?php if(@$data['AsConnectionsMeta.lang_session']=='1') echo substr(@$li['AsConnectionsMeta']['lang_statement'], 150, 150); else echo substr(@$li['AsConnectionsMeta']['personal_statement'], 150, 150); ?> </span><a class="red-mor" href="javascript:void(0)">
													<?php echo __("Read More") ?></a></p>
													<p class="usr-email"><b><?php echo __("Work Email:") ?> </b><?php $email=unserialize(@$li['AsConnection']['email']); echo $email['address']; ?></p>
													<p class="social-block">
													     <?php foreach($li['AsConnectionsSocial'] as $social){ if($social['type']=='Facebook') {?>
													     	<a class="icn-fb trns3" target="_blank" href="<?php echo $social['url']; ?>"><i class="fa fa-facebook-square"></i></a>
													     	<?php } ?>
													     	<?php if($social['type']=='Twitter'){ ?>
														<a class="icn-tw trns3" target="_blank" href="<?php echo $social['url']; ?>"><i class="fa fa-twitter-square"></i></a>
														<?php } ?>
														<?php if($social['type']=='LinkedIn'){ ?>
														<a class="icn-tw trns3" target="_blank" href="<?php echo $social['url']; ?>"><i class="fa fa-linkedin-square"></i></a>
														<?php } ?>
														<?php if($social['type']=='Google+'){ ?>
														<a class="icn-tw trns3" target="_blank" href="<?php echo $social['url']; ?>"><i class="fa fa-google-plus-square"></i></a>
														<?php } ?>
												      <?php if($social['type']=='SoundCloud'){ ?>
														<a class="icn-tw trns3" target="_blank" href="<?php echo $social['url']; ?>"><i class="fa fa-soundcloud"></i></a>
														<?php } }?>
														<?php foreach($li['AsConnectionsLink'] as $link){ ?>
                                            <a class="icn-tw trns3" target="_blank" href="<?php echo $link['url']; ?>"><i class="fa fa-home"></i></a>
					<?php } ?>				
													</p>	
												</div>
											</div>											
											<div class="col-md-4 col-sm-5">
												<h2 class="heading-adrs"><?php echo __("Mailing") ?></h2>
												<?php if($li['AsConnection']['status']=='approved'){ ?>
												<div class="verified">
													<?php if($li['AsConnection']['verified_status'] == 1){ ?>
													<span class="ok">
													
														<i class="fa fa-check" data-toggle="tooltip" data-placement="top" id = "tip_id" title="Verified by admin"><?php echo __("Verified") ?></i>
													 </span>
														
												<?php	}else { ?>
												<!--<span class="no">
														<i class="fa fa-close" data-toggle="tooltip" data-placement="top" id = "tip_id" title="not verified by admin">Not Verified</i>
													</span>-->
												<?php 	} ?>
													<div class="bedge-main">
													<?php if($this->Session->read('Config.language')=='spa'){?>
													<?php if($li['AsConnection']['program_status'] == 1){ ?>
														<img class="img-responsive" src="<?= HTTP_ROOT ?>img/front/Untitled-1.png" data-toggle="tooltip" data-placement="top" id = "tip_id" title="<?php echo __('Please see resources for more information on EAP')?>">
													<?php }  ?>
													<?php if($li['AsConnection']['health_fund_status'] == 1){ ?>
														<img class="img-responsive" src="<?= HTTP_ROOT ?>img/front/logo2.png" data-toggle="tooltip" data-placement="top" id = "tip_id" title="<?php echo __('Please see resources for more information on the mental health fund')?>">
													<?php }} else { ?>
													<?php if($li['AsConnection']['program_status'] == 1){ ?>
														<img class="img-responsive" src="<?= HTTP_ROOT ?>img/front/psy.png" data-toggle="tooltip" data-placement="top" id = "tip_id" title="<?php echo __('Please see resources for more information on EAP')?>">
													<?php }  ?>
													<?php if($li['AsConnection']['health_fund_status'] == 1){ ?>
														<img class="img-responsive" src="<?= HTTP_ROOT ?>img/front/mntl.png" data-toggle="tooltip" data-placement="top" id = "tip_id" title="<?php echo __('Please see resources for more information on the mental health fund')?>">
													<?php }} ?>
													</div>
												</div>
												<?php } else {?>
												<div class="verified">
												<?php if($li['AsConnection']['verified_status'] == 1){ ?>
													<span class="ok">
													
														<i class="fa fa-check" data-toggle="tooltip" data-placement="top" id = "tip_id" title="Verified by admin"><?php echo __("Verified") ?></i>
													 </span>
														
												<?php	}else { ?>
												<span class="no">
														<i class="fa fa-close" data-toggle="tooltip" data-placement="top" id = "tip_id" title="not verified by admin"><?php echo __("Not Verified") ?></i>
													</span>
												<?php 	} ?>
													
													<div class="bedge-main">
													<?php if($li['AsConnection']['program_status'] == 1){ ?>
														<img class="img-responsive" src="<?= HTTP_ROOT ?>img/front/psy.png" data-toggle="tooltip" data-placement="top" id = "tip_id" title="<?php echo __('Please see resources for more information on the mental health fund')?>">
													<?php }  ?>
													<?php if($li['AsConnection']['health_fund_status'] == 1){ ?>
														<img class="img-responsive" src="<?= HTTP_ROOT ?>img/front/mntl.png" data-toggle="tooltip" data-placement="top" id = "tip_id" title="<?php echo __('Please see resources for more information on EAP') ?>">
													<?php } ?>
													</div>
												</div>
												<?php } ?>
												<!-- <div class="str-ratng">
													<span><i class="fa fa-star-o"></i> 5.0 <a href="javascript:void(0)">(125 rating)</a></span>
												</div> -->
												
												<address class="usr-adrs">
													<?php if(!empty($li['AsConnection']['addresses'])){ $addr=unserialize(@$li['AsConnection']['addresses']); ?>
													<p>
													<?php echo $addr['AsConnectionsAddress']['address'].' '.$addr['AsConnectionsAddress']['state']; ?><br> 
													<?php echo $addr['AsConnectionsAddress']['country'].' '.$addr['AsConnectionsAddress']['zipcode']; ?>	
													</p>	
													<?php } ?>												
													<p><b><i class="fa fa-mobile"></i><?php echo __("Phone:-") ?>  </b><?php $ph=unserialize(@$li['AsConnection']['phone_numbers']); echo $ph['number']; ?></p>
													<a class="btn btn-ornge" href="<?php echo  HTTP_ROOT.'list/profileView/'.$key ?>"><?php echo __("View More") ?></a>
												</address>
												
											</div>
										</div>										
									</div>
								</div>
							</li>
							<?php } ?>

						</ul>

					</div>
				</div>
				
				<nav class="main cstm-pgntn">
				  <ul class="pagination">
				    
				      <li><?php echo $this->Paginator->prev(''.__('Previous', true), array(), null, array('title'=>'Previous Page','class' => 'no-display'));?></li>
	             <li><?php echo $this->Paginator->numbers(array('separator' => false,'class' => 'number'));?></li>
	           <li><?php echo $this->Paginator->next(__('Next', true).'', array(), null, array('title' => 'Next Page','class' => 'no-display'));?></li>	
				    
				   
				  </ul>
				</nav>
				
			</div>
		</section>
		<!--  section end here  -->
		
		<script>
	  $(document).ready(function(){
	  $('#service').hide();
	  	$('.red-mor').click(function(){
	  		$('.usr-dec span').slideToggle();	  		
	  	});	
	  	$('[data-toggle="tooltip"]').tooltip({'placement': 'right' });  	
 if($( "#entry option:selected" ).val()=='organization'){
	  
	      $('#service').show();
	  }
	   if($( "#entry option:selected" ).val()=='individual'){
	  
	      $('#service1').show();
	  }
	  });	  
	  
	  $(document).on('change','#entry',function(){
	  
	  if($( "#entry option:selected" ).val()=='organization'){
	  
	      $('#service').show();
	  }else {
	      $('#service').hide();
	  }
	  if($( "#entry option:selected" ).val()=='individual'){
	  
	      $('#service1').show();
	  }else {
	      $('#service1').hide();
	  }
	  
	  });
	  $(document).on('click','.removeSearch',function(){
	  		var value = $(this).attr('id');
	  		$(this).parents('.category-lists-ul').remove();
	  		$('#deleteSession').val(value);
	  		$('.'+value).val('');
	  		$('#refine').submit();
	  });
	  $(document).on('click','#sub_val',function(){
		  if($("#miles option:selected").val()!='')
		  {
				if($('#zip').val()=='')
				{
					$('#err_zip').show();
					$('#err_zip').text("Please enter zip code");
					return false;
				}
				else
				{
					$('#err_zip').hide();
					$('#err_zip').text("");
				}
		  }
  
		});
	  	$(document).on('click','.removeSearchIssue',function(){
		  	var issue = $(this).attr('id');
		  	 $('#trouble_key').find("[value='"+ issue +"']").prop('selected', false);
		  	 $('#refine').submit();
		});
		$(document).on('click','.removeDiagnose',function(){
		  	var d = $(this).attr('id');
		  	$('#diagnose_key').find("[value='"+ d +"']").prop('selected', false);
		  	$('#refine').submit();
		});
	
	/*$('.delete').click(function(){
		var key_id=$(this).attr('id');
		var label =$(this).attr('attr');
		if(label=="trouble")
		{
			$('#trouble_key').find("[value='"+ key_id +"']").prop('selected', false);
		}
		else
		{
			$('#diagnose_key').find("[value='"+ key_id +"']").prop('selected', false);
		}
		$('#address').submit();
	});*/

	  

  </script>
 <style>
 #err_zip{
 color:red;
 }
 </style>
