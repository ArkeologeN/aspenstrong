<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Aspen Strong Directory Admin</title>
<!-- custom-theme -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>-->

<link href="<?php echo HTTP;?>css/admin/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo HTTP;?>css/front/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo HTTP;?>css/front/bootstrap-theme.css" rel="stylesheet" type="text/css" />
<link href="<?php echo HTTP;?>css/front/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo HTTP;?>css/admin/component.css" rel="stylesheet" type="text/css" media="all" />

<link href="<?php echo HTTP;?>css/admin/style_grid.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo HTTP;?>css/admin/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo HTTP;?>css/admin/validationEngine.jquery.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome-icons -->
<!--<link href="<?php //echo HTTP;?>css/admin/font-awesome.css" rel="stylesheet"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="<?php echo HTTP;?>css/front/jquery-ui.css" rel="stylesheet" type="text/css"/>
<!-- //font-awesome-icons -->
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
 <script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.js"></script>
 <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
 <script type="text/javascript" src="<?php echo HTTP;?>js/admin/multiselect.js"></script>
 
   
 
</head>
<body>
    <?= $this->Flash->render() ?>
   <div class="wthree_agile_admin_info">
		  <!-- /w3_agileits_top_nav-->
		  <!-- /nav-->
		  <div class="w3_agileits_top_nav">
			<ul id="gn-menu" class="gn-menu-main">
			  		 <!-- /nav_agile_w3l -->
				<li class="gn-trigger">
					<a class="gn-icon gn-icon-menu"><i class="fa fa-bars" aria-hidden="true"></i><span>Menu</span></a>
					<nav class="gn-menu-wrapper">
						<div class="gn-scroller scrollbar1 dropdown">
							<ul class="gn-menu agile_menu_drop">
								<li><a href="<?php echo HTTPADMIN;?>/dashboard"> <i class="fa fa-tachometer"></i> Dashboard</a></li>
								
								<li><a href="<?php echo HTTPADMIN;?>/userslist"> <i class="fa fa-table" aria-hidden="true"></i> User's List</a></li>
                                
                                <li><a href="<?php echo HTTPADMIN;?>/edituserslist"> <i class="fa fa-tachometer"></i> Edits for approval</a></li>
                                
                                <li><a href="<?php echo HTTPADMIN;?>/userslist/?deletedusers=1"> <i class="fa fa-tachometer"></i> Deleted User's List</a></li>
								<!--<ul class="gn-submenu">
								<li class="mini_list_agile"><a href="<?php //echo HTTPADMIN;?>/userslist"><i class="fa fa-caret-right" aria-hidden="true"></i> All Users</a></li>
								</ul>-->
                                
                                 <li class="expandable1 mar_bottom"><i class="fa fa-pencil"></i>
                                            <div class="section_left_nav_section_heading" style="cursor: pointer;">
                                            Edit Fields <i class="fa fa-angle-down" aria-hidden="true"></i>
</div>
                                 <ul class="section_left_nav_sub_section" id="show_me">
                                                   
                                               
                                <li><a href="<?php echo HTTPADMIN;?>/treatment">Treatments </a></li>
                               
                                <li><a href="<?php echo HTTPADMIN;?>/ages">Age Groups </a></li>
                                
                                
                                <li><a href="<?php echo HTTPADMIN;?>/issues">Issues </a></li>
                                
                                
                                <li><a href="<?php echo HTTPADMIN;?>/modalities">Modalities </a></li>
                                
                                <li><a href="<?php echo HTTPADMIN;?>/insurance_providers">Insurance Providers </a></li>
                                
                                <li><a href="<?php echo HTTPADMIN;?>/financial_support">Financial Support </a></li>
                                
                                <li><a href="<?php echo HTTPADMIN;?>/language_options">Language Options </a></li>
							<li><a href="<?php echo HTTPADMIN;?>/payment_method">Payment method
							</a></li>
							<li><a href="<?php echo HTTPADMIN;?>/specialities">Specialities
							</a></li>
							<li><a href="<?php echo HTTPADMIN;?>/provider_category">Provider Category
							</a></li>
							<li><a href="<?php echo HTTPADMIN;?>/provider">Provider Type
							</a></li>
							<li><a href="<?php echo HTTPADMIN;?>/organizer_type">Organizer Type
							</a></li>
								 
                                 </ul>
                                </li> 
                                
                                <li class="expandable2 mar_bottom"><i class="fa fa-info-circle"></i>
                                            <div class="section_left_nav_section_heading" style="cursor: pointer;">
                                            Reports<i class="fa fa-angle-down" aria-hidden="true"></i>
</div>
                                                <ul class="section_left_nav_sub_section" id="show_help">
                                <li><a href="<?php echo HTTPADMIN;?>/session_reports">Traffic Report </a></li>
                                
                                <li><a href="<?php echo HTTPADMIN;?>/dashboard_analytics">User Report </a></li>
                                </ul>
                                </li>
                             </ul>
						</div><!-- /gn-scroller -->
					</nav>
				</li>
				<!-- //nav_agile_w3l -->
				<li class="second logo"><h1><a href="<?php echo HTTPADMIN;?>/dashboard"><i class="fa fa-graduation-cap" aria-hidden="true"></i>Directory Admin </a></h1></li>
					<li class="second admin-pic">
				       <ul class="top_dp_agile">
									<li class="dropdown profile_details_drop">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
											<div class="profile_img">	
												<span class="prfil-img"><img src="<?php echo HTTP;?>images/admin.jpg" alt=""> </span> 
											</div>	
										</a>
										<ul class="dropdown-menu drp-mnu">
											<!--<li> <a href="#"><i class="fa fa-cog"></i> Settings</a> </li> 
											<li> <a href="#"><i class="fa fa-user"></i> Profile</a> </li> -->
											<li> <a href="<?php echo HTTPADMIN;?>/logout"><i class="fa fa-sign-out"></i> Logout</a> </li>
										</ul>
									</li>
									
						</ul>
				</li>
				

			</ul>
			<!-- //nav -->
			
		</div>
		<div class="clearfix"></div>
		<!-- //w3_agileits_top_nav--> 
        <?= $this->fetch('content') ?>
       </div>
    <!--copy rights start here-->
<div class="copyrights">
	 <p>© 2017 Aspenstrong Directory. All Rights Reserved | Design by  <a href="http://www.frogiez.com/" target="_blank">Frogiez Inc</a> </p>
</div>	
<!--copy rights end here-->
<!-- js -->

	
         
		  <script src="<?php echo HTTP;?>js/admin/modernizr.custom.js"></script>
		
		   <script src="<?php echo HTTP;?>js/admin/classie.js"></script>
		  <script src="<?php echo HTTP;?>js/admin/gnmenu.js"></script>
		  <script>
			new gnMenu( document.getElementById( 'gn-menu' ) );
		 </script>
	

<!-- //js -->
<script src="<?php echo HTTP;?>js/admin/screenfull.js"></script>
		<script>
		$(function () {
			  /*$('.dropdown a').click(function(e){
              $(this+'.dropdown-menu').toggle();
              e.stopPropagation();
              e.preventDefault();
              });*/
			
			$('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

			if (!screenfull.enabled) {
				return false;
			}

			

			$('#toggle').click(function () {
				screenfull.toggle($('#container')[0]);
			});	
			$("#show_help").hide();
			$("#show_me").hide();
			<!--side-menu js-->
			$(".expandable1 div").click(function(){
			$("#show_me").toggle();	
			$("#show_help").hide();
			$("#show_setting").hide();
			$("#show_me").css('min-height','115px');
			});
			
			$(".expandable2 div").click(function(){
			$("#show_help").toggle();
			$("#show_me").hide();
			$("#show_setting").hide();		
			$("#show_help").css('min-height','115px');
			});
			
			/*$(".expandable3 div").click(function(){
			$("#show_setting").toggle();
			$("#show_help").hide();
			$("#show_me").hide();
			$("#show_setting").css('min-height','75px');
			});*/
		});
		</script>
        
<!--<script src="<?php //echo HTTP;?>js/admin/jquery.nicescroll.js"></script>    -->  

<script src="<?php echo HTTP;?>js/admin/scripts.js"></script>

<script type="text/javascript" src="<?php echo HTTP;?>js/admin/bootstrap-3.1.1.min.js"></script>


</body>
</html>
