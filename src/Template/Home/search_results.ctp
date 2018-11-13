<!--Pagination and Filter-->
<?php
 
     ?>
<!-- demo page styles -->
<link href="<?php echo HTTP;?>css/front/filter/jplist.demo-pages.min.css" rel="stylesheet" type="text/css" />

<!-- jPList core js and css  -->
<link href="<?php echo HTTP;?>css/front/filter/jplist.core.min.css" rel="stylesheet" type="text/css" />
<script src="<?php echo HTTP;?>js/front/filter/jplist.core.min.js"></script>
<script src="<?php echo HTTP;?>js/front/filter/jplist.textbox-filter.min.js"></script>
<!-- jplist pagination bundle -->
<script src="<?php echo HTTP;?>js/front/filter/jplist.pagination-bundle.min.js"></script>
<link href="<?php echo HTTP;?>css/front/filter/jplist.pagination-bundle.min.css" rel="stylesheet" type="text/css" />
<!-- filter dropdown bundle -->
<link href="<?php echo HTTP;?>css/front/filter/jplist.checkbox-dropdown.min.css" rel="stylesheet" type="text/css" />
<script src="<?php echo HTTP;?>js/front/filter/jplist.checkbox-dropdown.min.js"></script>
<script src="<?php echo HTTP;?>js/front/filter/jplist.sort-bundle.min.js"></script>
<script src="<?php echo HTTP;?>js/front/filter/jplist.sort-buttons.min.js"></script>

<!--<script src="<?php //echo HTTP;?>js/front/filter/jplist.history-bundle.min.js"></script>-->
<script src="<?php echo HTTP;?>js/front/filter/jplist.filter-toggle-bundle.min.js"></script>
<!--<link href="<?php //echo HTTP;?>css/front/filter/jplist.filter-toggle-bundle.min.css" rel="stylesheet" type="text/css" />-->

<!-- jPList sort bundle -->

<!--Pagination and Filter-->
<script src="<?php echo HTTP; ?>js/front/tooltip.js"></script>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 search-content blog-content">
  <div class="container search_page">
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <div class="side-widget space30">
          <div class="showing_results showing_results1">
            <h5>Filter Results</h5>
            <ul id="id-of-ul">
              <?php 
        
        
        if(isset($cond['therapist_type']) && $cond['therapist_type']!=""){
                     //print_r($cond['therapist_type']); 
                     foreach($therapiests as $therapiest){
                     if($therapiest['id']==$cond['therapist_type']){
                     //$the_name= str_replace('&','',$therapiest['name']);
                     //$the_name= str_replace(' ','_',$the_name);
                     $the_name="therapist_type".$therapiest['id'];
                     ?>
              <li class="credential new_cond">
                <p><?php echo $therapiest['name'];?></p>
                <a href="javascript:void(0);" onClick="remove_li3(this,<?php echo $the_name;?>)"><i class="fa fa-times" aria-hidden="true"></i></a></li>
              <?php }
                     }
                  }?>  <?php
				       if(isset($cond['location']) && $cond['location']!=""){
                     //print_r($cond['therapist_type']); 
                   
                     ?>
              <li class="credential new_cond">
                <p><?php echo $cond['location'];?></p>
                <a href="javascript:void(0);" onClick="remove_li3(this,<?php echo $cond['location'];?>)"><i class="fa fa-times" aria-hidden="true"></i></a></li>
              <?php 
                  
                  }?>
              <?php //$languages=array("Mandarin","Arabic","Spanish","Hindi","Italian","Russian","Portuguese","Bengali","French","Urdu","Japanese","German","American","Sign");?>
              <?php if(isset($cond['lang_session']) && $cond['lang_session']!=""){
                     //asort($languages);
                     foreach($languages as $lang){
                     if($lang['name']==$cond['lang_session']){?>
              <li class="credential new_cond">
                <p><?php echo $lang['name'];?></p>
                <a href="javascript:void(0);" onClick="remove_li3(this,<?php echo $lang;?>)"><i class="fa fa-times" aria-hidden="true"></i></a></li>
              <?php }
                     }
                  
                  }?>
              <div id="email_before"></div>
            </ul>
          </div>
          <a href="javascript:void(0);" onclick="ClearAll();" style="margin-left: 7%;color: #fff;padding: 2%;background: #A0CE4E;" id="clearAllVals">Clear All</a>
          <h5>Filter Listings</h5>
          <div id="filterDiv" class="side-cat2 jplist-panel"> 
            <!--<form method="post" action="">-->
            
            <div class="search_distance_wrapper">
              <p> Distance (in miles) </p>
              <div id="distance_slider"></div>
              <!--<div class="range-slider" data-slider data-options="start: 1; end: 10;"> 
                      <span class="range-slider-handle" role="slider" tabindex="0"></span>
                      <span class="range-slider-active-segment"></span>
                      <input type="hidden">
                    </div>--> 
            </div>
            <form id="searchform" >
              <input type="hidden" name="search_page" value="1" />
              <!--<input class="location" type="text" placeholder="Zip code" name="zip">-->
              
              <input class="search myInput" type="text" placeholder="Zip code" data-path=".location"
                            value=""
                            placeholder="Zip code"
                            data-control-type="textbox"
                            data-control-name="location-filter"
                            data-control-action="filter">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 checkbox_category jplist-group"
                         data-control-type="checkbox-group-filter"
                     data-control-action="filter"
                     data-control-name="entry_type">
                <p> Type </p>
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 filters_padding_left">
                  <input type="checkbox" id="checkbox" class="regular-checkbox ind" data-path=".ind" rel="Individual" name="checkbox"  />
                  <label for="checkbox"></label>
                  <label class="label_text">Individual </label>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 filters_padding_left">
                  <input type="checkbox" id="checkbox-2" class="regular-checkbox org" data-path=".org" rel="Organization" name="checkbox-2" />
                  <label for="checkbox-2"></label>
                  <label class="label_text">Organization </label>
                </div>
              </div>
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 checkbox_category jplist-group" data-control-type="checkbox-group-filter"
                     data-control-action="filter"
                     data-control-name="status">
                <p> Financial Support </p>
                <?php $i=1;foreach($financialSupport as $fs){ ?>
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 filters_padding_left">
                  <input type="checkbox" data-path=".<?php echo $fs['name'];?>" id="status<?php echo $i;?>" class="regular-checkbox" rel="<?php echo $fs['name'];?>" name="status<?php echo $i;?>" >
                  <label for="status<?php echo $i;?>"></label>
                  <label class="label_text">
                    <?php /*echo $fs['name'];*/ if($fs['name']=="MHF"){?>
                    <img src="https://directory.aspenstrong.org/webroot/images/front/image/1_1.png">
                    <?php }else{ ?>
                    <img src="https://directory.aspenstrong.org/webroot/images/front/image/1_2.png">
                    <?php }?>
                  </label>
                </div>
                <?php $i++;}?>
                <!--<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 filters_padding_left">      
                                                <label>
                                                  <input type="checkbox" name="individual" value="Traid"> Traid </label>
                                            </div>  --> 
              </div>
              <div class="jplist-checkbox-dropdown" 
                                data-control-type="checkbox-dropdown"
                                data-control-name="group-checkbox-dropdown0"
                                data-control-action="filter"
                                data-no-selected-text="Languages"
                                data-one-item-text="Languages : 1 selected"
                                data-many-items-text="Languages : {num} selected">
                <ul>
                  <?php foreach($languages as $language){?>
                  <li>
                    <input data-path=".<?php echo $language['name'];?>" id="<?php echo $language['name'];?>" type="checkbox" class="regular-checkbox" rel="<?php echo $language['name'];?>" name="<?php echo $language['name'];?>" <?php if(isset($cond['lang_session']) && $cond['lang_session']==$language['name']){echo "checked";}?>   />
                    <label for="<?php echo $language['name'];?>"></label>
                    <label class="label_text"><?php echo $language['name'];?></label>
                  </li>
                  <?php }?>
                </ul>
              </div>
              
              <!--<select data-placeholder="Language" class="categorie multiselect-ui2" multiple="multiple" id="language" name="language" >
                                                    <option rel="English" value="English">English</option> 
                                                    <option rel="Mandarin" value="Mandarin">Mandarin </option>
                                                    <option rel="Arabic" value="Arabic">Arabic</option> 
                                                    <option rel="Spanish" value="Spanish">Spanish </option>
                                                    <option rel="Hindi" value="Hindi">Hindi</option> 
                                                    <option rel="Italian" value="Italian">Italian</option> 
                                                    <option rel="Russian" value="Russian">Russian</option> 
                                                    <option rel="Portuguese" value="Portuguese">Portuguese </option>
                                                    <option rel="Bengali" value="Bengali">Bengali</option> 
                                                    <option rel="French" value="French">French</option> 
                                                    <option rel="Urdu" value="Urdu">Urdu </option>
                                                    <option rel="Japanese" value="Japanese">Japanese</option> 
                                                    <option rel="German" value="German">German </option>
                                                    <option rel="American" value="American">American </option>
                                                    <option rel="Sign" value="Sign">Sign</option>                                  
                      </select>--> 
              
              <!--<select data-placeholder="Treatment Orientation" name="treatment" id="treatment" class="categorie">
                            <option value="">Treatment Orientation</option>
                                                <?php //foreach($treatments as $treatment){?>
                                                <option rel="<?php //echo $treatment['name'];?>" value="<?php //echo $treatment['id'];?>"><?php //echo $treatment['name'];?></option>
                                                <?php //}?>
                        
                  </select>-->
              
              <div class="jplist-checkbox-dropdown" 
                                data-control-type="checkbox-dropdown"
                                data-control-name="group-checkbox-dropdown1"
                                data-control-action="filter"
                                data-no-selected-text="Treatment Orientation"
                                data-one-item-text="Treatment Orientation : 1 selected"
                                data-many-items-text="Treatment Orientation : {num} selected">
                <ul>
                  <?php foreach($treatments as $treatment){
                             $treatment_name= str_replace('&','',$treatment['name']);
                             $treatment_name= str_replace(' ','_',$treatment_name);
                               ?>
                  <li>
                    <input data-path=".<?php echo 'treatment'.$treatment['id'];?>" id="<?php echo 'treatment'.$treatment['id'];?>" type="checkbox" class="regular-checkbox" rel="<?php echo $treatment['name'];?>" name="<?php echo 'treatment'.$treatment['id'];?>" />
                    <label for="<?php echo 'treatment'.$treatment['id'];?>"></label>
                    <label class="label_text"><?php echo $treatment['name'];?></label>
                  </li>
                  <?php }?>
                </ul>
              </div>
              
              <!--<select id="age" class="categorie" name="age">
                                                <option value="">Age Groups</option>
                                                <?php //foreach($ages as $age){?>
                        <option rel="<?php //echo $age['name'];?>" value="<?php //echo $age['id'];?>"><?php //echo $age['name'];?></option>
                                            <?php //}?>
                  </select>-->
              
              <div class="jplist-checkbox-dropdown" 
                                data-control-type="checkbox-dropdown"
                                data-control-name="group-checkbox-dropdown2"
                                data-control-action="filter"
                                data-no-selected-text="Age Groups"
                                data-one-item-text="Age Groups : 1 selected"
                                data-many-items-text="Age Groups : {num} selected">
                <ul>
                  <?php foreach($ages as $age){
                             $age_name= str_replace('&','',$age['name']);
                             $age_name= str_replace(' ','_',$age_name);
                               ?>
                  <li>
                    <input data-path=".<?php echo 'age'.$age['id'];?>" id="<?php echo 'age'.$age['id'];?>" type="checkbox" class="regular-checkbox" rel="<?php echo $age['name'];?>" name="<?php echo 'age'.$age['id'];?>" />
                    <label for="<?php echo 'age'.$age['id'];?>"></label>
                    <label class="label_text"><?php echo $age['name'];?></label>
                  </li>
                  <?php }?>
                </ul>
              </div>
              
              <!--<select id="insurance" class="categorie" name="insurance">
                                                <option value=""> Insurance providers</option>
                              <?php //foreach($insuranceProviders as $insuranceProvider){?>
                        <option rel="<?php //echo $insuranceProvider['name'];?>" value="<?php //echo $insuranceProvider['id'];?>"><?php //echo $insuranceProvider['name'];?></option>
                                            <?php //}?>
                  </select>-->
              
              <div class="jplist-checkbox-dropdown" 
                                data-control-type="checkbox-dropdown"
                                data-control-name="group-checkbox-dropdown3"
                                data-control-action="filter"
                                data-no-selected-text="Insurance and Financial Supports"
                                data-one-item-text="Insurance and Financial Supports : 1 selected"
                                data-many-items-text="Insurance and Financial Supports : {num} selected">
                <ul>
                  <?php foreach($insuranceProviders as $insuranceProvider){
                             $ins_name= str_replace('&','',$insuranceProvider['name']);
                             $ins_name= str_replace(' ','_',$ins_name);
                               ?>
                  <li>
                    <input data-path=".<?php echo 'insurance'.$insuranceProvider['id'];?>" id="<?php echo 'insurance'.$insuranceProvider['id'];?>" type="checkbox" class="regular-checkbox" rel="<?php echo $insuranceProvider['name'];?>" name="<?php echo 'insurance'.$insuranceProvider['id'];?>" />
                    <label for="<?php echo 'insurance'.$insuranceProvider['id'];?>"></label>

                    <label class="label_text"><?php echo $insuranceProvider['name'];?></label>
                  </li>
                  <?php }?>
                </ul>
              </div>
              
              <!--<select class="categorie" class="jplist-select" data-control-type="filter-select" data-control-name="category-filter" data-control-action="filter" id="provider_type" name="provider_type" multiple="multiple" >
                                    <option data-path="default">Provider Type</option>
                                               <?php //foreach($therapiests as $therapiest){
                             //$the_name= str_replace('/','_',$therapiest['name']);
                             //$the_name= str_replace('&','',$therapiest['name']);
                             //$the_name= str_replace(' ','_',$the_name);
                         ?>
                                               <?php //if($therapiest['id']==15){?>
                                               <optgroup label="<?php //echo $therapiest['name'];?>">
                                               <?php //} if($therapiest['id']!=15){?>
                                               <option data-path=".<?php //echo $the_name;?>"><?php //echo $therapiest['name'];?></option>
                                               <?php //}if($therapiest['id']==24){?>
                                               </optgroup>
                                               <?php //}?>
                                               <?php //}?>
                                               <!-- <option value="">Provider Type</option>
                                                <?php //foreach($therapiests as $therapiest){?>
                                                <option rel="<?php //echo $therapiest['name'];?>" value="<?php //echo $therapiest['id'];?>"><?php //echo $therapiest['name'];?></option>
                                                <?php //}?>
                                     </select>-->
              
              <div class="jplist-checkbox-dropdown"
                                data-control-type="checkbox-dropdown"
                                data-control-name="group-checkbox-dropdown4"
                                data-control-action="filter"
                                data-no-selected-text="Provider Type"
                                data-one-item-text="Provider Type : 1 selected"
                                data-many-items-text="Provider Type : {num} selected">
                <ul>
                  <?php foreach($therapiests as $therapiest){
                             //$the_name= str_replace('&','',$therapiest['name']);
                            // $the_name= str_replace(' ','_',$the_name);
                           $the_name="therapist_type".$therapiest['id'];
                           if($therapiest['id']==15){?>
                  <!--<li>
                                      
                                       <b><label class="label_text222"><?php echo $therapiest['name'];?></label></b>
                                                        
                                    </li> -->
                  <?php }else{?>
                  <li>
                    <input data-path=".<?php echo $the_name;?>" id="<?php echo $the_name;?>" type="checkbox" class="regular-checkbox" rel="<?php echo $therapiest['name'];?>" name="<?php echo $the_name;?>" <?php if(isset($cond['therapist_type']) && $cond['therapist_type']==$therapiest['id']){echo "checked";}?> />
                    <label for="<?php echo $the_name;?>"></label>
                    <label class="label_text"><?php echo $therapiest['name'];?></label>
                  </li>
                  <?php }}?>
                </ul>
              </div>
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 checkbox_category jplist-group"  data-control-type="checkbox-group-filter"
                     data-control-action="filter"
                     data-control-name="modality">
                <p> Modality </p>

                <?php $j=1;foreach($modalities as $modality){ ?>
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 filters_padding_left">
                  <input type="checkbox" id="modality<?php echo $j;?>" data-path=".<?php echo 'modality'.$modality['id'];?>" class="regular-checkbox" rel="<?php echo $modality['name'];?>" name="modality<?php echo $j;?>" >
                  <label for="modality<?php echo $j;?>"></label>
                  <label class="label_text"><?php echo $modality['name'];?></label>
                </div>
                <?php $j++;}?>
              </div>
              <p> I am needing support in the following areas OR, I have been diagnosed with the following:</p>
              <!--<select class="categorie multiselect-ui" multiple="multiple" data-placeholder="Issues" id="issues" name="issues">
                                                <?php //foreach($issues as $issue){?>
                        <option rel="<?php //echo $issue['name'];?>" value="<?php //echo $issue['id'];?>"><?php //echo $issue['name'];?></option>
                                            <?php //}?>
                                     </select>-->
              
              <div class="jplist-checkbox-dropdown"
                                data-control-type="checkbox-dropdown"
                                data-control-name="group-checkbox-dropdown5"
                                data-control-action="filter"
                                data-no-selected-text="Issues"
                                data-one-item-text="Issues : 1 selected"
                                data-many-items-text="Issues : {num} selected">
                <ul>
                  <?php foreach($issues as $issue){
                             $iss_name= str_replace('&','',$issue['name']);
                             $iss_name= str_replace(' ','_',$iss_name);
                               ?>
                  <li>
                    <input data-path=".<?php echo 'Issue'.$issue['id'];?>" id="<?php echo 'Issue'.$issue['id'];?>" type="checkbox" class="regular-checkbox" rel="<?php echo $issue['name'];?>" name="<?php echo 'Issue'.$issue['id'];?>" />
                    <label for="<?php echo 'Issue'.$issue['id'];?>"></label>
                    <label class="label_text"><?php echo $issue['name'];?></label>
                  </li>
                  <?php }?>
                </ul>
              </div>
              </br>
              <input class="search myInput" type="text" placeholder="Search" data-path=".title"
                            value=""
                            placeholder="Search"
                            data-control-type="textbox"
                            data-control-name="title-filter"
                            data-control-action="filter">
            </form>
            <!--<div class="Btn_orange_grey">
                  <!--<a href="#" class="btn-ornge"> Submit </a>
                                    <a href="#" class="btn-grey"> Reset </a>--> 
            <!--<input type="submit" class="btn-ornge" value="Submit" />--> 
            <!--<input type="reset" class="btn-grey2" value="Reset" />  
                </div>--> 
            
            <!--  <button type="submit">Submit</button>
                                    <button type="submit">Reset</button>--> 
            <!--</form>--> 
          </div>
        </div>
      </div>
      <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 dir-search dir-search-list">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top_search_page">
          <div class="showing_results"> 
            <!-- panel -->
            
            <div class="jplist-panel box panel-top">
              <p>Showing results &nbsp;</p>
              <div 
                   class="jplist-label" 
                               data-type="Page {current} of {pages}"
                   data-control-type="pagination-info" 
                   data-control-name="paging" 
                   data-control-action="paging"
                               > </div>
              
              <!-- panel --> 
              
              <!--<div
                        class="jplist-drop-down"
                        data-control-type="sort-drop-down"
                        data-control-name="sort"
                        data-control-action="sort"
                        data-datetime-format="{month}/{day}/{year}"> <!-- {year}, {month}, {day}, {hour}, {min}, {sec} 

                    <ul>
                        <li><span data-path="default">Sort by</span></li>
                        <li><span data-path=".title" data-order="asc" data-type="text">Alphabetical</span></li>
                        <li><span data-path=".date" data-order="desc" data-type="datetime">Most Recent</span></li>
                    </ul>
                </div>-->
              
              <div class="jplist-box"
                      data-control-type="sort-buttons-group"
                      data-control-name="sort-buttons-group-1"
                      data-control-action="sort"
                      data-mode="single">
                <button
                            class="jplist-drop-down"
                            data-datetime-format="{month}/{day}/{year}"
                            data-path=".title"
                            data-type="text"
                            data-order="asc"
                            data-selected="true"> Alphabetical </button>
                
                <!--<button
                            class="jplist-drop-down"
                            data-datetime-format="{month}/{day}/{year}"
                            data-path=".title"
                            data-type="text"
                            data-order="desc">
                                <i class="fa fa-sort-alpha-desc"></i>
                                Sort by Title DESC
                        </button>

                         <button
                            class="jplist-drop-down"
                            data-datetime-format="{month}/{day}/{year}"
                            data-path=".date"
                            data-type="datetime"
                            data-order="asc">
                                <i class="fa fa-sort-amount-asc"></i>
                                Sort by Date ASC
                        </button>-->
                
                <button
                            class="jplist-drop-down"
                            data-datetime-format="{month}/{day}/{year}"
                            data-path=".date"
                            data-type="datetime"
                            data-order="desc"> Most Recent </button>
              </div>
            </div>
            <!--<ul>
                <li class="active"><a href="?sort_id=1"> Most Recent</a></li>
                                <li><a href="?sort_name=1"> Alphabetical</a></li>
                  </ul>--> 
            
          </div>
        </div>
        
        <!--<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 search-filter">
                            <ul>
                                 <li class="active"><a href="#"> Most Recent</a></li>
                                 <li><a href="#"> Most Searched</a></li>
                                 <li><a href="#"> Alphabetical</a></li>
                                 <li><a href="#"> Holistic</a></li>
                                 <li><a href="#"> Medical</a></li>
                                 <li><a href="#"> Therapeutic</a></li>
                                 <li><a href="#"> Treatment Center</a></li>
                             </ul>
                        </div> -->
        
        <div class="row">
          <?php 
          
          if(!empty($results)){
            foreach($results as $result){
          
            //if(isset($cond1) && $cond1 !=""){}
            if($result['title'] != ""){
            if (strpos($result['title'], '|') !== false) {
            
                        $titles=array_filter(explode('|',$result['title']));
            
            $titles=implode(',',$titles);
            //print_r($titles);
                         }else{
             $titles=$result['title'];  
              }}else{
            $titles=""; 
              }
            $entry="";
            
            if($result['entry_type']=='organization'){
            $name=$result['organization'];
            $entry="org";
            }
            if($result['entry_type']=='individual'){
            $name=$result['first_name'].' '.$result['middle_name'].' '.$result['last_name'];
            $entry="ind";
            }
            if($result['program_status']==1){
            $pstatus="Traid"; 
              }else{
            $pstatus="";    
                }
                
            if($result['health_fund_status']==1){
            $hstatus="MHF"; 
              }else{
            $hstatus="";    
                }
            if($result['as_connections_meta']['treatment'] != ""){
            if(strpos($result['as_connections_meta']['treatment'], '|')){
            $value=str_replace('|',',',$result['as_connections_meta']['treatment']);
            }else{
            $value=json_decode($result['as_connections_meta']['treatment']);
            if(!empty($value) && count($value)>1){
            $value=implode(',',$value);
            //echo $value;
            }else{$value=$value[0];}
            }
            }else{
            $value="";  
            }
            
            if($result['as_connections_meta']['age_group'] != ""){
            if(strpos($result['as_connections_meta']['age_group'], '|')){
            $age_group=str_replace('|',',',$result['as_connections_meta']['age_group']);
            }else{
            $age_group=json_decode($result['as_connections_meta']['age_group']);
            if(!empty($age_group) && count($age_group)>1){
            $age_group=implode(',',$age_group);
            //echo $value;
            }else{$age_group=$age_group[0];}
            }
            }else{
            $age_group="";  
            }
            
            if($result['as_connections_meta']['insurance_provider'] != ""){
            if(strpos($result['as_connections_meta']['insurance_provider'], '|')){
            $insurance_provider=str_replace('|',',',$result['as_connections_meta']['insurance_provider']);
            }else{
            $insurance_provider=json_decode($result['as_connections_meta']['insurance_provider']);
            if(!empty($insurance_provider) && count($insurance_provider)>1){
            $insurance_provider=implode(',',$insurance_provider);
            //echo $value;
            }else{$insurance_provider=$insurance_provider[0];}
            }
            }else{
            $insurance_provider=""; 
            }
            
            if($result['as_connections_meta']['modality'] != ""){
            if(strpos($result['as_connections_meta']['modality'], '|')){
            $modality=str_replace('|',',',$result['as_connections_meta']['modality']);
            }else{
            $modality=json_decode($result['as_connections_meta']['modality']);
            if(!empty($modality) && count($modality)>1){
            $modality=implode(',',$modality);
            //echo $value;
            }else{$modality=$modality[0];}
            }
            }else{
            $modality=""; 
            }
            
            if($result['as_connections_meta']['issue'] != ""){
            if(strpos($result['as_connections_meta']['issue'], '|')){
            $issue=str_replace('|',',',$result['as_connections_meta']['issue']);
            }else{
            $issue=json_decode($result['as_connections_meta']['issue']);
            if(!empty($issue) && count($issue)>1){
            $issue=implode(',',$issue);
            //echo $value;
            }else{$issue=$issue[0];}
            }
            }else{
            $issue="";  
            }
            //echo $issue;
            
            if($result['as_connections_meta']['therapist_type'] != ""){
            $provider_type=$result['as_connections_meta']['therapist_type'];
            }else{
            $provider_type="";  
            }
            
            if($result['as_connections_meta']['other_lang'] != ""){
            if(strpos($result['as_connections_meta']['other_lang'], '|')){
            $other_lang=explode('|',$result['as_connections_meta']['other_lang']);
            }else{
            $other_lang=array($result['as_connections_meta']['other_lang']);
            }
            }else{
            $other_lang=array();  
            }
            
            /*if($result['as_connections_meta']['treatment'] != ""){
            $value=implode(',',$result['as_connections_meta']['treatment']);  
            }else{
            $value="";  
            }*/
            
            ?>
          <!--<div class="col-md-12 div_vals" data-name="<?php //echo $name;?>" data-entry="<?php //echo $entry ;?>" data-pstatus="<?php //echo $pstatus; ?>" data-hstatus="<?php //echo $hstatus; ?>" data-lang="<?php //echo $result['as_connections_meta']['lang_session'];?>" data-treatment='<?php //echo $value;?>' data-agegroup='<?php //echo $age_group;?>' data-insuranceprovider='<?php //echo $insurance_provider;?>' data-providertype='<?php //echo $provider_type;?>' data-modality='<?php //echo $modality;?>' data-issue='<?php //echo $issue;?>'>-->
          <?php 
      if($result['close_status'] != 'deleted')
          { ?>
          <div class="col-md-12 div_vals"> <span class="<?php echo $entry;?>"></span>
            <?php  if($pstatus != ""){?>
            <span class="<?php echo $pstatus;?>"></span>
            <?php }?>
            <?php if($hstatus != ""){?>
            <span class="<?php echo $hstatus;?>"></span>
            <?php }?>
            <?php //echo $modality;print_r(explode(',',$modality));
              if($modality != ""){
              if( strpos($modality, ',') !== false ){
                $mod=explode(',',$modality);
              foreach($mod as $modVal){
                ?>
            <span class="<?php echo 'modality'.$modVal;?>"></span>
            <?php }}else{?>
            <span class="<?php echo 'modality'.$modality;?>"></span>
            <?php }}?>
            <?php //echo $modality;print_r(explode(',',$modality));
              if($issue != ""){
                $iss_vals=explode(',',$issue);
              foreach($iss_vals as $issVal){
                ?>
            <span class="<?php echo 'Issue'.$issVal;?>"></span>
            <?php }}?>
            <?php //echo $modality;print_r(explode(',',$modality));
              if($insurance_provider != ""){
              if( strpos($insurance_provider, ',') !== false ){
                $insuprov=explode(',',$insurance_provider);
              foreach($insuprov as $insVal){
                ?>
            <span class="<?php echo 'insurance'.$insVal;?>"></span>
            <?php }}else{?>
            <span class="<?php echo 'insurance'.$insurance_provider;?>"></span>
            <?php }}?>
            <?php //echo $modality;print_r(explode(',',$modality));
              if($age_group != ""){
              if( strpos($age_group, ',') !== false ){
                $ageGrp=explode(',',$age_group);
              foreach($ageGrp as $ageVal){
                ?>
            <span class="<?php echo 'age'.$ageVal;?>"></span>
            <?php }}else{?>
            <span class="<?php echo 'age'.$age_group;?>"></span>
            <?php }}?>
            <?php //echo $modality;print_r(explode(',',$modality));
              if($value != ""){
              if( strpos($value, ',') !== false ){
                $treatmentGRP=explode(',',$value);
              foreach($treatmentGRP as $treatmentVal){
                ?>
            <span class="<?php echo 'treatment'.$treatmentVal;?>"></span>
            <?php }}else{?>
            <span class="<?php echo 'treatment'.$value;?>"></span>
            <?php }}?>
            <?php //echo $modality;print_r(explode(',',$modality));
              if(!empty($other_lang)){
              foreach($other_lang as $lang){
                ?>
            <span class="<?php echo $lang;?>"></span>
            <?php }}?>
            <?php 
                              $cat_id = '';
                              if($result['as_connections_meta']['therapist_type'] != ""){
                        foreach($therapiests as $therapiest){
                        if($result['as_connections_meta']['therapist_type'] !="" && $result['as_connections_meta']['therapist_type']==$therapiest['id']){
                          $cat_id = $therapiest['parent_id'];
                        }
                        }
                        }
                            $border_color_cat = '4f59cc';
                            foreach($Therapist_categories as $Therapist_categorie)
                            {
                              if($Therapist_categorie->id==$cat_id)
                              {
                                  $border_color_cat = (!empty($Therapist_categorie->color)?$Therapist_categorie->color:'4f59cc');
                              }elseif($result['entry_type']=='organization')
                {
                  $border_color_cat = 'ffff00';
                }
                            }
                            ?>
            <div class="listing space30 purple_border" style="border-right-color:#<?php echo $border_color_cat ?>!important;">
              <?php  if($result['logo'] != ""){
                       $logoUrl=$result['logo'];
                    }else{
                      $logoUrl='logo.gif';
                      }?>
              <div class="listing-img" style=" background:url(<?php echo HTTP;?>img/logodirectry/<?php echo $logoUrl;?>) center center / cover no-repeat;">
                <?php if($result['verified_status']==1){?>
                <div class="verify_tag"><i class="fa fa-check" aria-hidden="true"></i> Verified</div>
                <?php }?>
              </div>
              <div class="listing-info">
                <h4 class="li-name"><a class="title" href="<?php echo HOME_WEB;?>home/profileView/<?php echo $result['id'];?>"><?php echo $name.' '.$titles;?></a></h4>
                <span class="date" style="display:none;"><?php echo $result['ts'];?></span>
                <?php if($result['entry_type']=='individual'){
                    if($result['as_connections_meta']['therapist_type'] != ""){
                        foreach($therapiests as $therapiest){
                        if($result['as_connections_meta']['therapist_type'] !="" && $result['as_connections_meta']['therapist_type']==$therapiest['id']){
                           //$the_name= str_replace('/','_',$therapiest['name']);
                          // $the_name= str_replace('&','',$therapiest['name']);
                           //$the_name= str_replace(' ','_',$the_name);
                           $the_name="therapist_type".$therapiest['id'];
                      ?>
                <p class="<?php echo $the_name;?>"> <?php echo $therapiest['name'];?></p>
                <?php }}}}?>
                <hr style="margin: 12px 0; border: 0; border-bottom: 1px solid #ddd;" />
                <ul>
                  <?php if($result['entry_type']=='individual'){?>
                  <li>
                    <?php if($result['as_connections_meta']['practice'] != ""){ echo $result['as_connections_meta']['practice'].' Years of Experience ';}?>
                  </li>
                  <?php }?>
                  <?php if(!empty($result['as_connections_addresses'])){
                    foreach($result['as_connections_addresses'] as $address){
                    //echo "<pre>"; print_r($address); 
                    if($address['preferred']==1 && $address['type']=="Site"){
                    echo '<li>'.$address['city']; if($address['city'] !="" && $address['zipcode']!=""){echo "  , ";} echo '<span class="location">'.$address['zipcode'].'</span></li>';
                    }
                    }
                    
                    }?>
                  <?php $k=0;foreach($result['as_connections_links'] as $link){
                        if($k==0){?>
                  <li> <a rel="<?php echo $link['type'];?>" href="<?php echo $link['url'];?>">Visit Website </a> </li>
                  <?php }$k++;}?>
                  <div class="batch-inner">
                    <?php if($result['health_fund_status'] == 1){ ?>
                    <!--<img src="<?php //echo HTTP;?>images/front/image/mntl.png"/>--> 
                    <img src="<?php echo HTTP;?>images/front/image/1_1.png" data-toggle="tooltip" data-placement="top" id = "tip_id" title="<?php echo __('Please see resources for more information on the mental health fund')?>"/>
                    <?php }?>
                    <?php if($result['program_status'] == 1){ ?>
                    <img src="<?php echo HTTP;?>images/front/image/1_2.png" data-toggle="tooltip" data-placement="top" id = "tip_id" title="<?php echo __('Please see resources for more information on EAP')?>"/> 
                    <!--<img src="<?php //echo HTTP;?>images/front/image/psy.png"/>-->
                    <?php }?>
                  </div>
                </ul>
                <div class="list-ratings2"> <a href="<?php echo HOME_WEB;?>home/profileView/<?php echo $result['id'];?>" target="_blank" class="list-ratings2_green">View More</a> <a href="<?php echo HOME_WEB;?>home/profileView/<?php echo $result['id'];?>#profile_contact" target="_blank" class="list-ratings2_grey">Contact Therapist</a> </div>
              </div>
            </div>
          </div>
          <?php }} }?>
        </div>
        <?php if(!empty($results->toArray())){?>
        <!--<a href="#" id="loadMore" class="load_more_btn" style="display:none;">Load More</a>-->
        <?php }else{?>
        <h4>No Results Found. Your search may be too specific, please broaden your search options.</h4>
        <?php }?>
        
        <!--<div class="jplist-no-results">
                        <p>No Results Found. Your search may be too specific, please broaden your search options.</p>
                        </div>--> 
        
        <!-- items per page dropdown --> 
        
      </div>
      <div class="box jplist-no-results text-shadow align-center">
        <p>No Results Found. Your search may be too specific, please broaden your search options.</p>
      </div>
      <div class="jplist-panel box panel-bottom" style="float:right;margin-right:2%;">
        <div
                        class="jplist-pagination"
                        data-control-type="pagination"
                        data-control-name="paging"
                        data-control-action="paging"
                        data-items-per-page="10"
                        data-jump-to-start="true"
                        data-control-animate-to-top="true"
                        > </div>
      </div>
    </div>
  </div>
</div>
</div>

<!--end content section-->
<style type="text/css">
.jplist-pagination button {
    background: #fff;
    border: none;
    color: #027E07 !important;
    border: 1px solid #027E07 ;
}
.jplist-panel .jplist-pagination .jplist-current{
color: #fff !important;
background: #027E07;
  }
.jplist-checkbox-dropdown ul li:hover > .label_text{
color:#fff !important;
text-shadow:none !important;  
  }
/*.jplist-panel .jplist-pagination{
float: right;
margin-right: 3%; 
  }*/
.jplist-panel.box.panel-top {
    width: 100%;
    margin-left: 2%;
}
.jplist-label{
  width: 40%; 
  float:left;
  }
.jplist-box{
  width: 31%; 
  float:right;
  height:auto;
  margin:0px;
  }
.jplist-box button{
    margin: 0px 10px 0px 0px;
    background: none;
    border: none;
    color: #A0CE4E;
    font-weight: 700;
  width:100px;  
  }
.jplist-box button:hover,.jplist-box button:active,.jplist-box button:focus{
color:#000;
background: none; 
  }
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
    height: 200px;
    list-style-type: none;
    margin: 0;
    overflow-x: hidden;
    overflow-y: scroll;
    padding: 0;
    position: relative;
}
.checkbox{
position:relative !important; 
  }
.checkbox input {
    height: 10px;
    position: relative !important;
    width: 10% !important;
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
  padding: 3px 0 3px 30px;
  width:100% !important;
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
.multiselect-container.dropdown-menu {
    width: 302px;
}
.multiselect-selected-text {
    float: left;
    text-align: left;
    width: 100%;
}
b.caret {
    margin-top: 2%;
}
.active > a {
    background-color: rgba(0, 0, 0, 0) !important;
    background-image: none !important;
}
/*div.div_vals {
    display:none;
    }
#loadMore {
    padding: 10px;
    text-align: center;
    background-color: #33739E;
    color: #fff;
    border-width: 0 1px 1px 0;
    border-style: solid;
    border-color: #fff;
    box-shadow: 0 1px 1px #ccc;
    transition: all 600ms ease-in-out;
    -webkit-transition: all 600ms ease-in-out;
    -moz-transition: all 600ms ease-in-out;
    -o-transition: all 600ms ease-in-out;
}
#loadMore:hover {
    background-color: #fff;
    color: #33739E;
}*/
</style>
<!--<script type="text/javascript" src="<?php //echo HTTP;?>js/admin/multiselect.js"></script>--> 
<script src="https://maps.google.com/maps/api/js?key=AIzaSyAn8MyXKfr-KMBInEgmJfESScGLhk2kY-E&sensor=false&libraries=geometry" type="text/javascript"></script> 
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/js/foundation.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/js/plugins/foundation.slider.js" type="text/javascript"></script>-->
<link href="<?php echo HTTP;?>css/front/fSelect.css" rel="stylesheet">
<script src="<?php echo HTTP;?>js/front/fSelect.js"></script> 
<script type="text/javascript" src="<?php echo HTTP;?>js/front/chosen.js"></script> 
<script type="text/javascript">
function remove_li3($selfVar,str) {
     //str=str.toString();
     
      var strID='#'+str.id;
    //alert(strID);
      $($selfVar).parents('.credential').remove();
    //$(strID).trigger('change');
    $(strID).click();
    $(strID).prop('checked', false);
    
      
    } 

function ClearAll(){
$('#id-of-ul > li').remove();
$('#searchform').clearForm();
$('#searchform').click();
$('#clearAllVals').hide();
  }

$.fn.clearForm = function() {
  return this.each(function() {
    var type = this.type, tag = this.tagName.toLowerCase();
    if (tag == 'form')
      return $(':input',this).clearForm();
    if (type == 'text' || type == 'password' || tag == 'textarea')
      this.value = '';
    else if (type == 'checkbox' || type == 'radio'){
    if($(this).is(":checked")) {this.click();}
      this.checked = false;
    }
    else if (tag == 'select')
      this.selectedIndex = -1;
  });
};
//usage




    
//$('#filterDiv').on("change keyup", function() {
$("#filterDiv").change(function () {
  var allformVals=$('#searchform').serialize();
 
  allformVals=allformVals.split('&');
  
  $('#id-of-ul > li').remove();  
 //alert(allformVals);
  
  $(allformVals).each(function( i,k ) {
   $str="";
  if(i!=0){
  //alert(k);
  if(typeof(k) != "undefined" && k!=1){
  var finalVal=k.split('=');
  //alert(finalVal);
    
  if(typeof(finalVal[1]) != "undefined" && finalVal[1]!=""){
    
    var relValue=$('#'+finalVal[0]).attr('rel');  
    //var showVals=relValue;    
    
    
    //$str='<li><p>'+finalVal[1]+'</p><a href="#"><i class="fa fa-times" aria-hidden="true"></i></a></li>';
    $("#email_before").before('<li class="credential new_cond"><p>'+relValue+'</p><a href="javascript:void(0);" onClick = "remove_li3(this,'+finalVal[0]+');"><i class="fa fa-times" aria-hidden="true"></i></a></li>');
    
    }
    
  }
  }
  });

  if($( "#id-of-ul li" ).length){
    $('#clearAllVals').show();  
      }else{
    $('#clearAllVals').hide();    
        }
  
});
  
  $( function() {


/*function distance(lat1,lon1,lat2,lon2){
//function distance(){
  var R = 50; // km
  lat1=23.4455;
  lon1=75.4170;
  lat2=23.1793;
  lon2=75.7849;
  latLngCircleCenter=[lat1,lon1];
  latLngPoint=[lat2,lon2];
  var a = new google.maps.LatLng(23.4455,75.4170);
  var b = new google.maps.LatLng(23.1793,75.7849);
  var distance = google.maps.geometry.spherical.computeDistanceBetween(a,b);
  alert(distance/1000);
}*/

//Get Current Location

//$("#find_btn").click(function () { //user clicks button
    /*if ("geolocation" in navigator){ //check geolocation available
        //try to get user current location using getCurrentPosition() method
        navigator.geolocation.getCurrentPosition(function(position){
                //$("#result").html("Found your location <br />Lat : "+position.coords.latitude+" </br>Lang :"+ position.coords.longitude);
        alert(position.coords.latitude+' '+position.coords.longitude);
            });
    }else{
        console.log("Browser doesn't support geolocation!");
    }*/
//});

//Get Current Location



  $('#clearAllVals').hide();
  if($( "#id-of-ul li" ).length){
    $('#clearAllVals').show();  
      }
  
  $('#checkbox').change(function() {
        if($(this).is(":checked")) {
      //alert('kkk');
            $('#checkbox-2').attr('checked', false);
        }
  });
  
  $('#checkbox-2').change(function() {
    
    
    
        if($(this).is(":checked")) {
      //alert('kkk');
            $('#checkbox').attr('checked', false);
        }
  });


   
  $('[data-toggle="tooltip"]').tooltip({'placement': 'right' });
  
  $( "#distance_slider" ).slider();
  
   $('.multiselect-ui').fSelect();
   //$('.multiselect-ui2').fSelect({placeholder:'Language'});
   $('.multiselect-ui2').fSelect({placeholder:'Language'});
   $('#treatment').fSelect({placeholder:'Treatment Orientation'});
   $('#insurance').fSelect({placeholder:'Insurance providers'});
   $('#age').fSelect({placeholder:'Age Groups'});
   $('#provider_type').fSelect({placeholder:'Provider Type'});
  

    $('.search_page').jplist({        
        itemsBox: '.dir-search-list' 
        ,itemPath: '.div_vals' 
        ,panelPath: '.jplist-panel' 
                
      });

   
  } );
  




  </script> 