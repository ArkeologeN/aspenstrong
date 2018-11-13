<?php //echo $_REQUEST['deletedusers'];die;?>

<?php 
$i=0;
$result2=array();
$result3=array();
foreach($results as $result){
$result2[]=$result['owner'];	
}

foreach($users as $user){
//foreach($results as $result){
if(! in_array($user['ID'],$result2)){
$result3[$i]['user_ID']=$user['ID'];
$result3[$i]['user_email']=$user['user_email'];
$result3[$i]['user_status']=$user['user_status'];
$i++;
	}	
	//}	
	}
  $new_I = 0;
  foreach($users as $user){
    $result_unv[$new_I]['user_ID']=$user['ID'];
    $result_unv[$new_I]['user_email']=$user['user_email'];
    $result_unv[$new_I]['user_status']=$user['user_status'];
    $new_I++;
  }

//print_r($result3);die;

foreach($users as $user){
  foreach($results as $result){
    if($user['ID']==$result['owner']){
      $result['user_ID']=$user['ID'];
      $result['user_email']=$user['user_email'];
      $result['user_status']=$user['user_status'];
    } 
  } 
}
$incomplete_1_stp = [];
$complete_pp_apprvl = [];

foreach($users as $user){
  foreach($results as $result_inmplete){
  	
    if($user->ID == $result_inmplete->owner && ( empty($result_inmplete->as_connections_meta) || empty($result_inmplete->as_connections_meta->personal_statement) || empty($result_inmplete->as_connections_meta->malpractice_insurance) || empty($result_inmplete->as_connections_meta->issue) || empty($result_inmplete->as_connections_meta->age_group) || empty($result_inmplete->as_connections_emails) || empty($result_inmplete->as_connections_phones) || empty($result_inmplete->as_connections_addresses)))
    {
      $result_inmplete['user_ID']=$user->ID;
      $result_inmplete['user_email']=$user->user_email;
      $result_inmplete['user_status']=$user->user_status;
      $incomplete_1_stp[] = $result_inmplete;
    } 
  } 
  foreach($results as $result_stpcmplete){  	
    if($user->ID == $result_stpcmplete->owner && !empty($result_stpcmplete->as_connections_meta) && !empty($result_stpcmplete->as_connections_meta->malpractice_insurance) && !empty($result_stpcmplete->as_connections_meta->issue) && !empty($result_stpcmplete->as_connections_meta->personal_statement) && !empty($result_stpcmplete->as_connections_meta->age_group) && !empty($result_stpcmplete->as_connections_addresses)  && !empty($result_stpcmplete->as_connections_emails)  && !empty($result_stpcmplete->as_connections_phones)){
      $result_stpcmplete['user_ID']=$user->ID;
      $result_stpcmplete['user_email']=$user->user_email;
      $result_stpcmplete['user_status']=$user->user_status;
      $complete_pp_apprvl[] = $result_stpcmplete;
    } 
  } 
}

?>
<!--<link rel="stylesheet" type="text/css" href="<?php //echo HTTP;?>css/admin/table-style.css" />
<link rel="stylesheet" type="text/css" href="<?php //echo HTTP;?>css/admin/basictable.css" />-->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.3/css/select.dataTables.min.css"></style>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/select/1.2.3/js/dataTables.select.min.js"></script>

<!-- banner -->

		<!-- /inner_content-->
				<div class="inner_content">
				    <!-- /inner_content_w3_agile_info-->

					<!-- breadcrumbs -->
						<div class="w3l_agileits_breadcrumbs">
							<div class="w3l_agileits_breadcrumbs_inner">
								<ul>
									<li><a href="<?php echo HTTPADMIN;?>/dashboard">Home</a><span>«</span></li>
									<?php if(isset($_REQUEST['vars'])) {?>
                  <?php if($_REQUEST['vars']=='unvarify') {?>
									<li>Unverified Users</li>
                  <?php }elseif($_REQUEST['vars']=='approved') { ?>
                  <li>Approved Profiles</li>
                  <?php }elseif($_REQUEST['vars']=='unapproved') { ?>
                  <li>Pending For Approval</li>
                  <?php }elseif($_REQUEST['vars']=='stepinccmt') { ?>
                  <li>Incomplete Profile</li>
                  <?php }elseif($_REQUEST['vars']=='individual') { ?>
                  <li>Total Individuals</li>
                  <?php }elseif($_REQUEST['vars']=='organization') { ?>
                  <li>Total Organizations</li>
                  <?php }elseif($_REQUEST['vars']=='deleted') { ?>
                  <li>Deleted Users</li>
                  <?php }elseif($_REQUEST['vars']=='deactivated') { ?>
                  <li>Deactivated Users</li>
                  <?php } }elseif(isset($_REQUEST['noprofile'])){?>
                  <li>Verified users with no profile</li>
                  <?php }else{ ?>
									<li>All Users</li>
                  <?php }?>
								</ul>
							</div>
						</div>
					<!-- //breadcrumbs -->

					<div class="inner_content_w3_agile_info two_in">
                    <?php if( isset($_REQUEST['deletedusers']) && $_REQUEST['deletedusers']==1){?>
					  <h2 class="w3_inner_tittle">Deleted Users</h2>
                     <?php }else{?>
                      <h2 class="w3_inner_tittle"><?php if(isset($_REQUEST['vars'])) {?>
                  <?php if($_REQUEST['vars']=='unvarify') {?>
                  Unverified Users
                  <?php }elseif($_REQUEST['vars']=='approved') { ?>
                  Approved Profiles
                  <?php }elseif($_REQUEST['vars']=='unapproved') { ?>
                  Pending For Approval
                  <?php }elseif($_REQUEST['vars']=='stepinccmt') { ?>
                  Incomplete Profile
                  <?php }elseif($_REQUEST['vars']=='individual') { ?>
                  Total Individuals
                  <?php }elseif($_REQUEST['vars']=='organization') { ?>
                  Total Organizations
                  <?php }elseif($_REQUEST['vars']=='deleted') { ?>
                  Deleted Users
                  <?php }elseif($_REQUEST['vars']=='deactivated') { ?>
                  Deactivated Users
                  <?php } }elseif(isset($_REQUEST['noprofile'])){?>
                  Verified users with no profile
                  <?php }else{ ?>
                  All Users
                  <?php }?></h2>
                     <?php }?>
									<!-- tables -->
                             <?= $this->Flash->render() ?>
									<div class="agile-tables">
										<div class="w3l-table-info agile_info_shadow">
                                        <div class="col-md-4 clearnext"><a class="btn btn-success btn-xs send" data-toggle="modal" id="btntoall" data-target="#myModal" >Send Emails To Selected</a></div>
                                        <div class="col-md-4 clearnext">
                            <?php if( ! isset($_REQUEST['deletedusers'])){?>
                                        <form action="" method="post" id="status_form">
                            
							<select class="form-control" id="status" name="status">
                                <option value="" <?php if($chng_status=="") echo "selected";?>>Display All</option>
                                <option value="approved" <?php if($chng_status=="approved" || (isset($_REQUEST['vars']) && $_REQUEST['vars']=='approved')){ echo "selected";}?>>Users Profile  Approved</option>
                                <option value="unapproved" <?php if($chng_status=="unapproved" || (isset($_REQUEST['vars']) && $_REQUEST['vars']=='unapproved')) echo "selected";?>>Users Profile Not Approved</option>
                                <option value="triad" <?php if($chng_status=="triad" || (isset($_REQUEST['vars']) && $_REQUEST['vars']=='triad')) echo "selected";?>>All Triad Users</option>
                                <option value="mhf" <?php if($chng_status=="mhf" || (isset($_REQUEST['vars']) && $_REQUEST['vars']=='mhf')) echo "selected";?>>All MHF Users</option>
                                <option value="individual" <?php if($chng_status=="individual" || (isset($_REQUEST['vars']) && $_REQUEST['vars']=='individual')) echo "selected";?>>All Individuals</option>
                                <option value="organization" <?php if($chng_status=="organization" || (isset($_REQUEST['vars']) && $_REQUEST['vars']=='organization')) echo "selected";?>>All Organizations</option>
                                <!--<option value="verified" <?php //if($chng_status=="verified") echo "selected";?>>All Verified Users</option>
                                <option value="unverified" <?php //if($chng_status=="unverified") echo "selected";?>>All Unverified Users</option>-->
                                <!--<option value="unverifiedemail" <?php //if($chng_status=="unverifiedemail") echo "selected";?>>All Created Users have not verified email</option>-->                                
                                </select>
                                </form>	
                                <?php }?>
                                </div>
                                <?php if( ! isset($_REQUEST['deletedusers'])){?>
                                <div class="col-md-4 clearnext"><ul class="nav navbar-right panel_toolbox">
                                        <li><a href="<?php echo HTTPADMIN;?>/userlistcsv">Export CSV</a></li>
                                        <li><a target="_blank" href="<?php echo HTTPADMIN;?>/view_pdf">Export PDF</a></li>
                                        <li><a target="_blank" href="<?php echo HTTPADMIN;?>/view_excel">Export Excel</a></li>
                                    </ul></div>
                                <?php }?>
                                
										 <!--<h3 class="w3_inner_tittle two">Basic Implementation</h3>-->
											<table id="example" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th><input name="select_all" value="1" type="checkbox"></th>
            <th>S No.</th>
            <th>Business Name</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
            <th>Details</th>
            
        </tr>
        <tr>
            <th></th>
            <th></th>
            <th>Business Name</th>
            <th>Name</th>
            <th>Email</th>
            <th></th>
            <th></th>
            
        </tr>
    </thead>
   
    <tbody>
	<?php 
  if(isset($_REQUEST['noprofile']) && $_REQUEST['noprofile']==1 && !isset($_POST['status'])){
    $myvar=$result3;
  }elseif(isset($_REQUEST['vars']) && $_REQUEST['vars'] == 'unvarify')
  {
    $myvar=$result_unv;
  }
  elseif(isset($_REQUEST['vars']) && $_REQUEST['vars'] == 'unapproved')
  {
    $myvar=$complete_pp_apprvl;
  }
  elseif(isset($_REQUEST['vars']) && $_REQUEST['vars'] == 'stepinccmt')
  {
    $myvar=$incomplete_1_stp;
  }else{


    if(!isset($_REQUEST['vars']) && (!isset($_POST['status']) || $_POST['status'] == "")){
     $myvar=array_merge($results,$result3);
    }else{
       
     $myvar=$results;	
    }
  }

	$i=1;foreach($myvar as $result){

		  if(isset($result['id']) && $result['id'] != ""){
      
		  $id=$result['id'];
		   $action='<a class="btn btn-success btn-xs" href="'.HTTPADMIN.'/edituser/'.$id.'" title="Edit Profile" target="_blank"><i class="fa fa-edit "></i>
                    </a>';
           $view='<a class="btn btn-success btn-xs" href="'.HTTPADMIN.'/profile_view/'.$id.'" title="View Profile" target="_blank"><i class="fa fa-eye"></i>
                  </a>';
           /*$email='<button type="button" class="btn btn-success btn-xs send" data-toggle="modal" id="'.$result['user_email'].'" data-target="#myModal" title="Send Mail">Send Mail</button>';
           $changePassword='<button type="button" class="btn btn-success btn-xs changepassword" data-toggle="modal" id="'.$id.'" data-target="#myModalchange" title="Change Password">Password</button>';*/
		   $url_param=$vars;
		   $email='<a type="button" class="btn btn-success btn-xs send_emailsss" data-toggle="modal" id="'.$result['user_email'].','.$result['first_name'].'|'.$result['last_name'].','.$url_param.'" onclick="sendMail(this.id);" data-target="#myModal" title="Send Mail"><i class="fa fa-envelope"></i></a>';
           $changePassword='<a type="button" class="btn btn-success btn-xs changepassword" data-toggle="modal" id="'.$result['user_ID'].'" data-target="#myModalchange" title="Change Password" onclick="changePass(this.id);"><i class="fa fa-key"></i></a>';
		   
		   $delete="<a class='btn btn-danger btn-xs' href=".HTTPADMIN."/delete_user/".$result['user_ID'].'/'.$_REQUEST['vars']." onclick=\"return confirm('Are you sure, you want to delete?')\" title='Delete Account'> <i class='fa fa-trash'></i></a>";
      if(isset($result['close_status']) && ($result['close_status'] == 'deactivated' || $result['close_status'] == 'deleted'))
          {
            $delete="<a class='btn btn-danger btn-xs' href='".HTTPADMIN."/activate_user/".$result['user_ID']."' onclick=
      \"return confirm('Are you sure, you want to Activate?')\" title='Activate Account'><i class='fa fa-check-circle'></i></a>";
          }else
          {
             $delete="<a class='btn btn-danger btn-xs' href='".HTTPADMIN."/delete_user/".$result['user_ID'].'/'.$_REQUEST['vars']."' onclick=\"return confirm('Are you sure, you want to delete?')\" title='Delete Account'><i class='fa fa-trash'></i></a>";
          }
		  
		  if($result['user_status'] == 0)
          {
           $emailverified='<a class="btn btn-default btn-xs performAction" program = "1" rate="'.$id.'" href="'.HTTPADMIN.'/change_status_ajax/emailverified/1/'.$id.'" title="Email Not verified"> <i class="fa fa-times"></i>
           </a>';                 
           }
           else{
           $emailverified='<a class="btn btn-success btn-xs performAction" program = "0" rate="'.$id.'" href="'.HTTPADMIN.'/change_status_ajax/emailverified/0/'.$id.'" title="Email verified"><i class="fa fa-check"></i>
           </a>';  
            }
		  
		  /*if($result['verified_status'] == 0)
                    {
                      $verified='<a class="btn btn-success btn-xs performAction" program = "1"  rate="'.$id.'" href="'.HTTPADMIN.'/change_status_ajax/verified/1/'.$id.'" title="Not verified"> <i class="fa fa-close"></i>
                                    </a>';                 
                    }
                    else
                    {
                      $verified='<a class="btn btn-success btn-xs performAction" program = "0" rate="'.$id.'" href="'.HTTPADMIN.'/change_status_ajax/verified/0/'.$id.'" title="verified"><i class="fa fa-check"></i>
                                    </a>';  
                    }*/
                    if($result['status'] =='approved')
                    {
                     $approved='<a class="btn btn-success btn-xs performAction" program = "1" rate="'.$id.'" href="'.HTTPADMIN.'/change_status_ajax/display/unapproved/'.$id.'/'.$chng_status.'" title="Approved"><i class="fa fa-shield" aria-hidden="true"></i></a>';                        
                    }
                    else
                    {
                       $approved='<a class="btn btn-default btn-xs performAction" program = "0" rate="'.$id.'" href="'.HTTPADMIN.'/change_status_ajax/display/approved/'.$id.'/'.$chng_status.'" title="Not Approved"><i class="fa fa-shield" aria-hidden="true"></i></a>';          
                    }
					
		if($result['program_status'] == 0)
                    {
                      $program_status='<a class="btn btn-xs btn-default performAction" program = "1" rate="'.$id.'" href="'.HTTPADMIN.'/change_status_ajax/program/1/'.$id.'" title="Triad Employee Assistant Program not verified">T</i>
                                    </a>';                 
                    }
                    else
                    {
                      $program_status='<a class="btn btn-success btn-xs performAction" program = "0" rate="'.$id.'" href="'.HTTPADMIN.'/change_status_ajax/program/0/'.$id.'" title="Triad Employee Assistant Program  verified">T</i>
                                    </a>';  
                    }
                    if($result['health_fund_status'] == 0)
                    {
                      $health_status='<a class="btn btn-default btn-xs performAction" program = "1" rate="'.$id.'" href="'.HTTPADMIN.'/change_status_ajax/health/1/'.$id.'" title="Accepts Mental Health Fund not verified">M</i>
                                    </a>';                 
                    }
                    else
                    {
                      $health_status='<a class="btn btn-success btn-xs performAction" program = "0" rate="'.$id.'" href="'.HTTPADMIN.'/change_status_ajax/health/0/'.$id.'" title="Accepts Mental Health Fund verified">M</a>';  
                    }
			if( isset($_REQUEST['deletedusers']) && $_REQUEST['deletedusers']==1){
			$allLinks1=$view.' '.$email;
			$allLinks2="";	
			}else{		
			$allLinks1=$action.' '.$view.' '.$email.' '.$changePassword.' '.$delete;
			$allLinks2=$emailverified.' '.$approved.' '.$program_status.' '.$health_status;	
			}
				
					
					
	       }else{
		            $id=$result['user_ID'];
	
               		$changePassword='<a type="button" class="btn btn-success btn-xs changepassword" data-toggle="modal" id="'.$id.'" data-target="#myModalchange" title="Change Password"><i class="fa fa-key"></i></a>';
                     if(!empty($noprofile) && $noprofile!='1'){
                    $action='<a class="btn btn-primary btn-xs" href="'.HTTPADMIN.'/edit_profile/'.$id.'" title="Create Profile"><i class="fa fa-edit"></i>
                            </a>';
					 }
                   // $email='<button type="button" class="btn btn-success btn-xs send" data-toggle="modal" id="'.$result['user_email'].'" data-target="#myModal" title="Send Mail"><i class="fa fa-envelope" onclick="sendMail(this.id);" ></i></button>';
				   $email='<a type="button" class="btn btn-success btn-xs send" data-toggle="modal" id="'.$result['user_email'].','.(isset($result['first_name'])?$result['first_name']:'').'|'.(isset($result['last_name'])?$result['last_name']:'').','.$noprofile.'" onclick="sendMail(this.id);" data-target="#myModal" title="Send Mail"><i class="fa fa-envelope"></i></a>';
                   
                    if($result['user_status'] == 0)
                    {
                      $emailverified='<a class="btn btn-default btn-xs performAction" program = "1" rate="'.$id.'" href="'.HTTPADMIN.'/change_status_ajax/emailverified/1/'.$id.'" title="Email Not verified"> <i class="fa fa-envelope"></i>
                                    </a>';                 
                    }
                    else
                    {
                      $emailverified='<a class="btn btn-success btn-xs performAction" program = "0" rate="'.$id.'"  href="'.HTTPADMIN.'/change_status_ajax/emailverified/0/'.$id.'" title="Email verified"><i class="fa fa-envelope"></i>
                                    </a>';  
                    }	
					if(isset($result['close_status']) && ($result['close_status'] == 'deactivated' || $result['close_status'] == 'deleted'))
          {
            $delete="<a class='btn btn-danger btn-xs' href='".HTTPADMIN."/activate_user/".$id."' onclick=
      \"return confirm('Are you sure, you want to Activate?')\" title='Activate Account'><i class='fa fa-check-circle'></i></a>";
          }else
          {
             $delete="<a class='btn btn-danger btn-xs' href='".HTTPADMIN."/delete_user/".$id.'/'.$_REQUEST['vars']."' onclick=\"return confirm('Are you sure, you want to delete?')\" title='Delete Account'><i class='fa fa-trash'></i></a>";
          }
					
	  
	                if( isset($_REQUEST['deletedusers']) && $_REQUEST['deletedusers']==1){ 
					$allLinks1=$email;
					$allLinks2="";
					}else{
					$allLinks1=$changePassword.' '.$action.' '.$delete.' '.$email;
					$allLinks2=$emailverified;
					}
		           
		
		}
		
		//$changeEmail='<a class="btn btn-success btn-xs" href="'.HTTPADMIN.'/change_email/'.$id.'" title="Change Email"><i class="fa fa-address-card"></i>
					 //</a>'; 
		$Generate_PDF='<a target="_blank" class="btn btn-success btn-xs" href="'.HTTPADMIN.'/view_pdf/'.$id.'" title="Generate PDF"><i class="fa fa-download"></i></a>'; 
		
		
		?>
        <?php 
      if(!in_array($result['user_ID'], $ban_id))
      {
        if(!empty($result['user_email']))
        {
      ?>
        <tr>
            <td></td>
            <td><?php echo $i;?></td>
            <td><?php if(isset($result['organization'])){echo $result['organization'];}?></td>
            <td><?php if(isset($result['first_name']) && isset($result['last_name'])){echo $result['first_name'].' '.$result['last_name'];}?></td>
            <td><?php echo $result['user_email'];?></td>
            <td><!--<a href="<?php //echo HTTPADMIN;?>/edituser/<?php //echo $result['id'];?>" class="btn btn-success btn-xs">Edit Profile</a>-->
             <?php echo $allLinks1;?>
             </td>
             <td><!--<a href="<?php //echo HTTPADMIN;?>/edituser/<?php //echo $result['id'];?>" class="btn btn-success btn-xs">Edit Profile</a>-->
             <?php echo $allLinks2.' '.$Generate_PDF;?>
             </td>
            
        </tr>
        <?php $i++;} } ?>
        
    <?php }?>   
    </tbody>
</table>
									
								</div>
								
									 
									  
								
									
						</div>
							<!-- //tables -->
					
				    </div>
					<!-- //inner_content_w3_agile_info-->
				</div>
		<!-- //inner_content-->
		
<!-- tables -->

            <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Send Email</h4>
      </div>
      <div class="modal-body">
      <form method="post" id="address" action="<?php echo HTTPADMIN;?>/sendmailbyadmin">
      </br>
      <div id="names_show"></div>
      </br>
      <input type="hidden" id="emails" name="data[emails]" />
      <input type="hidden" id="names" name="data[names]" />
	  <input type="hidden" id="url" name="data[url]" />
        <label>Message</label>
									<textarea class="form-control" id="msg" name="data[message]" placeholder="Type Message"> </textarea>
									<input type="submit" class="btn btn-ornge btn-block" value="Send Message">
							</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<div id="myModalchange" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Change Password</h4>
      </div>
      <div class="modal-body">
      <form method="post" id="changePassword" action="<?php echo HTTPADMIN;?>/changePassword">
      		<input type="hidden" id="user_id_pass" name="data[user][id]" />
       		 <label>Enter New Password</label>
       		 				
									<input type="password" name="data[user][password]" id="user_password" class="form-control required">
									<br/>
									<input type="submit" class="btn btn-ornge btn-block" value="Save">
							</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

<script type="text/javascript">
function updateDataTableSelectAllCtrl(table){
   var $table             = table.table().node();
   var $chkbox_all        = $('tbody input[type="checkbox"]', $table);
   var $chkbox_checked    = $('tbody input[type="checkbox"]:checked', $table);
   var chkbox_select_all  = $('thead input[name="select_all"]', $table).get(0);

   // If none of the checkboxes are checked
   if($chkbox_checked.length === 0){
      chkbox_select_all.checked = false;
      if('indeterminate' in chkbox_select_all){
         chkbox_select_all.indeterminate = false;
      }

   // If all of the checkboxes are checked
   } else if ($chkbox_checked.length === $chkbox_all.length){
      chkbox_select_all.checked = true;
      if('indeterminate' in chkbox_select_all){
         chkbox_select_all.indeterminate = false;
      }

   // If some of the checkboxes are checked
   } else {
      chkbox_select_all.checked = true;
      if('indeterminate' in chkbox_select_all){
         chkbox_select_all.indeterminate = true;
      }
   }
}
function sendMail(id){
	var email=id.split(',');
	$('#emails').val(email[0]);
	$('#names').val(email[1]);
	$('#url').val(email[2]);
	//var KK=email[1].replace(",", ' , ');
	//KK.replace("|", ' ');
	$('#names_show').text(email[1].replace("|", ' '));
	}
function changePass(id){
	var user_id=id;
	
	$('#user_id_pass').val(user_id);
	//$('#names').val(email[1]);
	//var KK=email[1].replace(",", ' , ');
	//KK.replace("|", ' ');
	$('#names_show').text(email[1].replace("|", ' '));
	}

/*function getBtnhtml(value = null, program = null, connectionId = null) {*/
function getBtnhtml(value , program , connectionId ) {
	var ajax_url='<?php echo HTTPADMIN;?>';
	 if (value === undefined) {
		 value=null;
		 }
		if (program === undefined) {
		 program=null;
		}
		if (connectionId === undefined) {
		 connectionId=null;
		 }
    var phtml = '';
    switch (value) {
        case "program":
            if (program == 1) {
                phtml = '<a class="btn btn-success btn-xs performAction" program = "0" rate="' + connectionId + '" href="' + ajax_url + '/change_status_ajax/program/0/' + connectionId + '" title="Triad Employee Assistant Program  verified">T</a>';
            } else {
                phtml = '<a class="btn btn-default btn-xs performAction" program = "1" rate="' + connectionId + '" href="' + ajax_url + '/change_status_ajax/program/1/' + connectionId + '" title="Triad Employee Assistant Program not verified">T</a>';
            }
            break;
        case "health":
            if (program == 1) {
                phtml = '<a class="btn btn-success btn-xs performAction" program = "0" rate="' + connectionId + '"href="' + ajax_url + '/change_status_ajax/health/0/' + connectionId + '" title="Accepts Mental Health Fund verified">M</a>';
            } else {
                phtml = '<a class="btn btn-default btn-xs performAction" program = "1" rate="' + connectionId + '" href="' + ajax_url + '/change_status_ajax/health/1/' + connectionId + '" title="Accepts Mental Health Fund not verified">M</a>';
            }
            break;
        case "emailverified":
            if (program == 1) {
                phtml = '<a class="btn btn-success btn-xs performAction" program = "0" rate="' + connectionId + '" href="' + ajax_url + '/change_status_ajax/emailverified/0/' + connectionId + '" title="Email verified"><i class="fa fa-check"></i></a>';
            } else {
                phtml = '<a class="btn btn-default btn-xs performAction" program = "1" rate="' + connectionId + '" href="' + ajax_url + '/change_status_ajax/emailverified/1/' + connectionId + '" title="Email Not verified"><i class="fa fa-times"></i></a>';
            }
            break;
        case "display":
            if (program == 1) {
                phtml = '<a class="btn btn-default btn-xs performAction" program = "0" rate="' + connectionId + '" href="' + ajax_url + '/change_status_ajax/display/approved/' + connectionId + '/' + program + '" title="Not Approved"><i class="fa fa-shield"></i></a>';
            } else {
                phtml = '<a class="btn btn-success btn-xs performAction" program = "1" rate="' + connectionId + '" href="' + ajax_url + '/change_status_ajax/display/unapproved/' + connectionId + '/' + program + '" title="Approved"><i class="fa fa-shield"></i></a>';
            }
            break;
        default:
            phtml = 'default case';
            break;
    }
    return phtml;
}

$(document).ready( function () {
	var HTTPADMIN='<?php echo HTTPADMIN;?>';
	var getvals='<?php if(isset($_REQUEST['vars'])){ echo $_REQUEST['vars']; } ?>';
	//alert(getvals);
	//if(getvals){
	//$('#status').val(getvals);
	//window.location.reload();
	//$("#status_form").form.submit();
	//}
	
	$('#status').change(function() {
        //this.form.submit();
		var slug=this.value;
		//var redurl="<?php echo $_SERVER['SERVER_NAME'].'/admin/userslist/?vars='?>"+slug;
		window.location.href = '<?php echo SITE_URL;?>/admin/userslist?vars='+slug;
		// window.location.replace(redurl);
    });
	
	
	
    // Setup - add a text input to each header cell
    $('#example thead tr:eq(1) th').each( function () {
        var title = $('#example thead tr:eq(1) th').eq( $(this).index() ).text();
		if(title !=""){
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
		}
    } ); 
    var rows_selected = [];
    var table = $('#example').DataTable({
		 columnDefs: [ {
            orderable: false,
            className: 'dt-body-center',
            targets:   0,
			width: '1%',
            render: function (data, type, full, meta){
             return '<input type="checkbox">';
         },
		  rowCallback: function(row, data, dataIndex){
         // Get row ID
         var rowId = data[0];

         // If row ID is in the list of selected row IDs
         if($.inArray(rowId, rows_selected) !== -1){
            $(row).find('input[type="checkbox"]').prop('checked', true);
            $(row).addClass('selected');
         }
      }
        } ],
        
        orderCellsTop: true
    });
	
	$('#btntoall').click(function (){
    var dataArr = [];
	var dataArr2 = [];
    $.each($("#example tr.selected"),function(){ //get each tr which has selected class
        dataArr.push($(this).find('td:nth-child(5)').text()); //find its first td and push the value
		dataArr2.push($(this).find('td:nth-child(4)').text());
        //dataArr.push($(this).find('td:first').text()); You can use this too
    });
	$("#emails").val(dataArr);
	$("#names").val(dataArr2);
	$("#url").val('<?php echo $vars;?>');
	allNames="";
	for (i = 0; i <= dataArr2.length-1; i++) {
	if(dataArr2.length-1==i){
    allNames += dataArr2[i];
	}else{
	allNames += dataArr2[i]+' , ';
	}
    }
	$('#names_show').text(allNames);
	//alert(dataArr); 
	//$.post( "sendmailbyadmin", { 'choices[]': [ dataArr, dataArr2 ] } );
});


  
    // Apply the search
    table.columns().every(function (index) {
        $('#example thead tr:eq(1) th:eq(' + index + ') input').on('keyup change', function () {
            table.column($(this).parent().index() + ':visible')
                .search(this.value)
                .draw();
        });
    });
	
	
   // Handle click on checkbox
   $('#example tbody').on('click', 'input[type="checkbox"]', function(e){
      var $row = $(this).closest('tr');

      // Get row data
      var data = table.row($row).data();

      // Get row ID
      var rowId = data[0];

      // Determine whether row ID is in the list of selected row IDs
      var index = $.inArray(rowId, rows_selected);

      // If checkbox is checked and row ID is not in list of selected row IDs
      if(this.checked && index === -1){
         rows_selected.push(rowId);

      // Otherwise, if checkbox is not checked and row ID is in list of selected row IDs
      } else if (!this.checked && index !== -1){
         rows_selected.splice(index, 1);
      }

      if(this.checked){
         $row.addClass('selected');
      } else {
         $row.removeClass('selected');
      }

      // Update state of "Select all" control
      updateDataTableSelectAllCtrl(table);

      // Prevent click event from propagating to parent
      e.stopPropagation();
   });

   // Handle click on table cells with checkboxes
   $('#example').on('click', 'tbody td, thead th:first-child', function(e){
      $(this).parent().find('input[type="checkbox"]').trigger('click');
   });

   // Handle click on "Select all" control
   $('thead input[name="select_all"]', table.table().container()).on('click', function(e){
      if(this.checked){
         $('#example tbody input[type="checkbox"]:not(:checked)').trigger('click');
      } else {
         $('#example tbody input[type="checkbox"]:checked').trigger('click');
      }

      // Prevent click event from propagating to parent
      e.stopPropagation();
   });

   // Handle table draw event
   table.on('draw', function(){
      // Update state of "Select all" control
      updateDataTableSelectAllCtrl(table);
   });
	
	
	
	$('body').on('click', '.performAction', function() {

    var requrl = $(this).attr('href');
	
    var reqperfmValue = $(this).attr('program');
    var connectionId = $(this).attr('rate');
    var elem = $(this);
    var actionPerf = '';
    if (requrl.indexOf("/verified") >= 0) {
        actionPerf = 'verified';

    } else if (requrl.indexOf("/program") >= 0) {
        actionPerf = 'program';

    } else if (requrl.indexOf("/health") >= 0) {
        actionPerf = 'health';
    } else if (requrl.indexOf("/emailverified") >= 0) {
        actionPerf = 'emailverified';
    } else if (requrl.indexOf("/display") >= 0) {
        actionPerf = 'display';
    }

    if (requrl != "") {
		//alert(requrl);
        $.ajax({

            type: 'post',
            url: requrl,
            success: function(resp) {
                resp = $.trim(resp);
                if (resp == 1) {
                    var output = getBtnhtml(actionPerf, reqperfmValue, connectionId);
                    $(elem).replaceWith(output);
                } else {
                    alert("Error in Update. Please try again");
                }
                return false;
            }

        });
    }
    return false;
});

$(document).on('click','.changepassword',function(){
            	
            		$('#user_id_email').val($(this).attr('id'));
            		$("#user_password").val("");
});

$("#changePassword").validate({
      			
      			rules: {            
                          "data[user][password]"  :
                          {
                            	required:true,
                            	minlength:6,

                          },
                     },
               success: function() {
               	
       					/*$.ajax({
								url:HTTPADMIN+"/savepassword",
								data:$("#changePassword").serialize(),
								type:"POST",
								success:function(msg) {
									//alert(msg);	
									console.log(msg);
									if($.trim(msg)==1){
										alert("Password has been changed.");
										$("#myModalchange").modal('hide');	
									}else{
										alert("Error in change password");	
									}
									return false;
									
								}
							});*/
							
       					return false;
   				 }
      		});


});
</script>
