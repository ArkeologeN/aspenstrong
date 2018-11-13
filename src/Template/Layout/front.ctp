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
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<?php 
if(isset($results) && !empty($results)){
$titleResults=$results->toArray();
if(isset($titleResults[0])){
$name=$titleResults[0]['first_name'].' '.$titleResults[0]['last_name'];
}
}
if(isset($asConnection) && !empty($asConnection)){
$titleResults=$asConnection->toArray();
$name=$titleResults['first_name'].' '.$titleResults['last_name'];
}
?>
<title>

<?php if($this->request->here=='/' || $this->request->here=='/'){echo 'Aspen Strong - Directory';}?>
<?php if (strpos($this->request->here, 'home') !== false && strpos($this->request->here, 'searchResults')===false && strpos($this->request->here, 'profileView')===false){echo 'Aspen Strong Directory';}?>
<?php if (strpos($this->request->here, 'profile') !== false){echo "Aspen Strong Directory - Profile";}?>
<?php if (strpos($this->request->here, 'searchResults') !== false){echo "Aspen Strong Directory - Search";}?>
<?php if (strpos($this->request->here, 'dashboard') !== false){echo "Aspen Strong Directory - Dashboard";}?>
<?php if (strpos($this->request->here, 'delete') !== false){echo "Aspen Strong Directory - Delete Account";}?>
<?php if (strpos($this->request->here, 'deactivate') !== false){echo "Aspen Strong Directory - Deactivate Account";}?>
</title>
<link href="<?php echo HTTP;?>css/front/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo HTTP;?>css/front/responsive.css" rel="stylesheet" type="text/css" />
<link href="<?php echo HTTP;?>css/front/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="<?php echo HTTP;?>css/front/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo HTTP;?>css/front/bootstrap-theme.css" rel="stylesheet" type="text/css" />
<link href="<?php echo HTTP;?>css/front/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo HTTP;?>css/front/chosen.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">-->
<link href='https://fonts.googleapis.com/css?family=Lato:400,300,100,700' rel='stylesheet' type='text/css'>
<link href="<?php echo HTTP;?>css/front/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo HTTP;?>js/front/bootstrap.min.js"></script>
<script> (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){ (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o), m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m) })(window,document,'script','https://www.google-analytics.com/analytics.js','ga'); ga('create', 'UA-101488979-2', 'auto'); ga('send', 'pageview'); </script>    
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-85715417-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-85715417-2');
</script>

<script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<body> 
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!--main container-->  
<div>

 <header>
   <div class="top-bar">
      <div class="container test3">
         <div class="top-head-left">
         <ul>
            <li><i class="fa fa-home"></i>135 W. Main Street Suite I Aspen, CO 81611</li>
            <li><i class="fa fa-envelope"></i><a href="http://135%20W.%20Main%20Street%20Suite%20I%20Aspen,%20CO%2081611" title="">info@aspenstrong.org</a></li>
         </ul>
      </div>
      <div class="top-head-right">
       <!--   <div class="lang_switcher">
            <li data-wg-notranslate="" class="wgcurrent wg-li flag-1 en"><a href="#">English</a></li>
         </div> -->
           <span class="find-therpy"><a href="https://directory.aspenstrong.org/">Find A Therapist</a></span>
         <div class="header-social">
            <ul>
               <li><a target="_blank" href="https://www.facebook.com/aspenstrong" title=""><i class="fa fa-facebook"></i></a></li>
               <li><a target="_blank" href="https://twitter.com/AspenStrong" title=""><i class="fa fa-twitter"></i></a></li>
               <li><a target="_blank" href="https://www.linkedin.com/company/the-aspen-strong-foundation" title=""><i class="fa fa-linkedin"></i></a></li>
               <li><a target="_blank" href="https://www.instagram.com/aspenstrongfoundation/" title=""><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
            </ul>
         </div>
         <!--<span class="eng-lang"><a href="/es/about-us/">English</a></span> -->
       
      </div>
         
      </div>
   </div>
   <nav class="navbar navbar-default  cstm-nav" style="z-index:250;">
      <div class="container">
         <!-- Brand and toggle get grouped for better mobile display -->
         <div class="navbar-header top-header-class">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand logo-main" href="https://www.aspenstrong.org/">
            <img class="img-responsive" src="https://directory.aspenstrong.org/webroot/img/front/logo1.png">
            </a>
         </div>
         <!-- Collect the nav links, forms, and other content for toggling -->
         <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                 <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <!-- <span class="sr-only"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span> -->
             <span><i class="fa fa-times-circle" aria-hidden="true"></i></span>
            </button>
          <div class="menu-center" style="float:none; width: 80%; margin: 0 auto;">
               <ul class="nav navbar-nav cstm-navmenu navbar-right ">
               <li class="active">
                  <a class="text-uppercase" href="https://aspenstrong.org/connect/">Get Connected                     <i class="fa fa-caret-down"></i>
                  </a>
                  <ul class="sub-menu trns3">
                     <li>
                        <a href="https://aspenstrong.org/connect/people/">Connect to People                        
                        </a>
                     </li>
                     <li>
                        <a href="https://aspenstrong.org/connect/resources/">Connect to Resources                         
                        </a>
                     </li>
                     <li class="text-capitalize">
                        <a href="https://aspenstrong.org/youth-toolkit/">Youth Toolkit</a>
                     </li>
                     <li class="text-capitalize">
                        <a href="https://aspenstrong.org/workplace-toolkit/">Workplace Toolkit</a>
                     </li>
                     <li>
                        <a href="https://aspenstrong.org/training/">Trainings & Education</a>
                     </li>
                     <li>
                        <a href="https://aspenstrong.org/resources/crisis-support/">Crisis Support</a>
                     </li>
                      <li>
                        <a href="https://aspenstrong.org/resources/mental-health-fund/">Financial Support</a>
                     </li>
                     <li>
                        <a href="http://screening.mentalhealthscreening.org/aspenstrong">Take a Screening</a>
                     </li>
                     
                     <!-- <li>
                        <a href="https://www.aspenstrong.org/aboutus/ourteam/">Our Team</a>
                        </li>
                                                                                      <li>
                        <a href="https://www.aspenstrong.org/aboutus/screening-initiative/">2016 Mental Health Screening Initiative</a>
                        </li> -->
                  </ul>
               </li>
               
               <li>
                  <a class="text-uppercase" href="https://aspenstrong.org/communitycalendar/month/"> CALENDAR                     <i class="fa fa-caret-down"></i>
                  </a>
                  <ul class="sub-menu trns3">
                     <li>
                        <a href="https://aspenstrong.org/communitycalendar/month/">Upcoming Events</a>
                     </li>
                     <li>
                        <a href="https://aspenstrong.org/communitycalendar/community/add">POST YOUR EVENTS</a>
                     </li>
                  </ul>
               </li>
               <li>
                  <a class="text-uppercase" href="https://aspenstrong.org/philanthropy/">Get involved                    <i class="fa fa-caret-down"></i>
                  </a>
                  <ul class="sub-menu trns3">
                     <li>
                        <a href="https://aspenstrong.org/philanthropy/partnership/">Partnerships</a>
                     </li>
                     <li>
                        <a href="https://aspenstrong.org/philanthropy/volunteers/">Volunteers</a>
                     </li>
                     <li>
                        <a href="https://aspenstrong.org/philanthropy/donate/">Donate</a>
                     </li>
                  </ul>
               </li>
               <li>
                  <a href="javascript:void(0)">PROVIDER DIRECTORY                     <i class="fa fa-caret-down"></i>
                  </a>
                  <ul class="sub-menu trns3">
                     <li>
                      <?php
					  $session = $this->request->session();  
					  $userSession=$session->read('userDetails');
					  if(isset($userSession) && $userSession['ID']!=""){?> 
                      <a href="<?php echo HOME_WEB.'profile/createProfile';?>">Dashboard</a>
                      <a href="<?php echo HOME_WEB;?>users/logout">Logout</a> 
                      <?php }else{ ?>
                        <a  href="#myModal" data-toggle="modal" data-target="#myModal">Register or Login</a>
                      <?php }?>
                     </li>
                      <li>
                        <a href="https://aspenstrong.org/licensing-and-qualifications/">Licensing AND Qualifications</a>
                     </li>
                  </ul>
               </li>
               <li>
                  <a class="text-uppercase" href="https://aspenstrong.org/about-us/">About us                   <i class="fa fa-caret-down"></i>
                  </a>
                  <ul class="sub-menu trns3">
                   <li>
                        <a href="https://aspenstrong.org/our-team/">Aspen Strong Team</a>
                     </li>
                     <li>
                        <a href="https://aspenstrong.org/about-us/financials/">FINANCIALS</a>
                     </li>
                     <li>
                        <a href="https://aspenstrong.org/gallery/">MEDIA</a>
                     </li>
                     <li>
                        <a href="https://aspenstrong.org/about-us/mental-health-screening-initiative/">Mental Health Screening Initiative</a>
                     </li>
                     <li>
                        <a href="https://aspenstrong.org/blog/">Blog</a>
                     </li>
                     <li>
                        <a href="https://aspenstrong.org/philanthropy/ryansvoice/">In Ryan's Voice</a>
                     </li>
                     <li>
                        <a href="https://aspenstrong.org/hike/">Hike Hope Heal</a>
                     </li>
                     <li>
                        <a href="https://aspenstrong.org/symposium/">Annual Changing Brains, Changing Lives, Symposium</a>
                     </li>
                  </ul>
               </li>
               <!--<li>
                  <a href="https://aspenstrong.org/philanthropy/">PHILANTHROPY                     <i class="fa fa-caret-down"></i>
                  </a>
                  <ul class="sub-menu trns3">
                     <li>
                        <a href="https://aspenstrong.org/philanthropy/donate/">DONATE</a>
                     </li>
                     <li>
                        <a href="https://aspenstrong.org/philanthropy/volunteers/">VOLUNTEERS</a>
                     </li>
                     <li>
                        <a href="https://aspenstrong.org/philanthropy/sponsorship/">SPONSORSHIP</a>
                     </li>
                     <li>
                        <a href="https://aspenstrong.org/philanthropy/partner-ship/">PARTNERSHIPS</a>
                     </li>
                     <!-- <li>
                        <a href="https://www.aspenstrong.org/faq/">FAQ</a>
                        </li> -->
                     <!-- <li>
                        <a href="https://www.aspenstrong.org/supporters/">Giving Back</a>
                        <ul class="sub-menu trns3">
                        
                        <li>
                           <a href="https://www.aspenstrong.org/supporters/donate/">Donate</a>
                        </li>
                        <li>
                           <a href="https://www.aspenstrong.org/supporters/volunteers/">Volunteers</a>
                        </li>
                        <li>
                           <a href="https://www.aspenstrong.org/supporters/sponsors/">Sponsorship</a>
                        </li>
                        </ul>
                                                </li>
                  </ul>
               </li> 
               <!-- <li>
                  <a href="http://screening.mentalhealthscreening.org/aspenstrong">Find A Therapist</a>
               </li>
               <li>
                  <a href="javascript:void(0)">PROVIDER DIRECTORY                     <i class="fa fa-caret-down"></i>
                  </a>
                  <ul class="sub-menu trns3">
                     <li>
                        <a href="https://directory.aspenstrong.org/home/searchResults">PROVIDER DIRECTORY</a>
                     </li>
                     <li>
                      <?php
					  $session = $this->request->session();  
					  $userSession=$session->read('userDetails');
					  if(isset($userSession) && $userSession['ID']!=""){?> 
                      <a href="<?php echo HOME_WEB.'profile/createProfile';?>">Dashboard</a>
                      <a href="<?php echo HOME_WEB;?>users/logout">Logout</a> 
                      <?php }else{ ?>
                        <a  href="#myModal" data-toggle="modal" data-target="#myModal">PROVIDER LOGIN AND REGISTRATION</a>
                      <?php }?>
                     </li>
                      <li>
                        <a href="https://www.aspenstrong.org/licensing-and-qualifications/">LICENSING AND QUALIFICATIONS</a>
                     </li>
                  </ul>
               </li>-->
               <!-- <li>
                  <a href="javascript:void(0)">Giving Back</a>
                  <ul class="sub-menu trns3">
                  
                  <li>
                     <a href="https://www.aspenstrong.org/supporters/donate/">Donate</a>
                  </li>
                  <li>
                     <a href="https://www.aspenstrong.org/supporters/volunteers/">Volunteers</a>
                  </li>
                  <li>
                     <a href="https://www.aspenstrong.org/supporters/sponsors/">Sponsorship</a>
                  </li>
                  </ul>
                  </li> -->
               <!-- <li>
                  <a href="javascript:void(0)">Language</a>
                  <ul class="sub-menu trns3">
                  
                  <li>
                     <a href="https://directory.aspenstrong.org/homes/language/eng">English</a>
                  </li>
                  <li>
                     <a href="https://directory.aspenstrong.org/homes/language/spa">Spanish</a>
                  </li>
                  </ul>
                  </li> -->
                  <?php // if(isset($_SESSION['userDetails']) && $_SESSION['userDetails']['ID']!=""){?> 
                  <!--<a href="users/logout" class="btn btn-primary sub_btn">Logout</a> -->
                  <?php //}else{ ?>
                 <!-- <li><button class="btn btn-primary sub_btn" data-toggle="modal" data-target="#myModal">Login/Sign Up  </button></li>-->
                  <?php // } ?>
            </ul>
         </div>
                  </div>
      </div>
   </nav>
</header> 
		<div class="clearfix"></div>
        <?php  
		if (strpos($this->request->here, 'profile') !== false) {
        //echo 'true';
        }else{?>
		<?=$this->Flash->render();?>	
		<?php }?> 
        
		<!-- //w3_agileits_top_nav--> 
        <?= $this->fetch('content') ?>
       </div>
    <!--copy rights start here-->
<footer style="font-family:Roboto;background-image:url(https://www.aspenstrong.org/wp-content/uploads/2016/08/footer-bg.png);">
		<div class="container">
			<div class="row">
				<div class="col-md-3"><div class="footer-widget-title"><h4><span>Instagram</span></h4></div>			<div class="textwidget"><!-- InstaWidget -->
<a href="https://instawidget.net/v/user/aspenstrongfoundation" id="link-c233309990fed54bed232819d7145a8a260ac193af2ebcd644d6c652738fe105">@aspenstrongfoundation</a>
<script src="https://instawidget.net/js/instawidget.js?u=c233309990fed54bed232819d7145a8a260ac193af2ebcd644d6c652738fe105&width=250px"></script></div>
		</div><div class="col-md-3"><div class="footer-widget-title"><h4> <span> Facebook </span> </h4></div>			
        <div class="fb-page" data-href="https://www.facebook.com/aspenstrong" data-tabs="timeline" data-height="350" data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="true"></div>
        
		</div>
        <div class="col-md-3"><div class="footer-widget-title"><h4><span>Contact Us</span> </h4></div>
		<ul class="contact-details">

			<li>

				<span><i class="icon-home"></i>ADDRESS</span>

				<p>135 W. Main Street Suite I Aspen, CO 81611</p>

			</li>

			
			<li>

				<span><i class="icon-envelope-alt"></i>EMAIL ID</span>

				<p><a href="mailto:info@aspenstrong.org">info@aspenstrong.org</a></p>

			</li>

			<li>

				<span><i class="icon-link"></i>WEB ADDRESS</span>

				<p><a href="https://www.aspenstrong.org/">https://www.aspenstrong.org/</a></p>

			</li>
            </ul>
            <div class="footer-widget-title" style="margin-bottom:10px;"><h4><strong><span>P</span>rivacy policy</strong> </h4></div>
            <ul class="contact-details">
            
             <li><p style="margin-bottom: 0px;"><a style="color:#e2e2e2;" target="_blank" href="https://aspenstrong.org/terms-of-service/">Terms of Service</a></p>
             <p style="margin-bottom: 0px;"><a style="color:#e2e2e2;" target="_blank" href="https://aspenstrong.org/disclaimer-2/">Disclaimer</a></p>
              <p><a style="color:#e2e2e2;" target="_blank" href="https://aspenstrong.org/privacypolicy/">Privacy Policy</a></p>
             </li>
             
              

		</ul>

		</div>


		<div class="col-md-3">


	        <div class="row">
				  <div class="col-lg-12">
					<div class="footer-widget-title"><h4><span>Newsletter</span></h4></div>				  </div>
				</div>
<script type="text/javascript">(function() {
	if (!window.mc4wp) {
		window.mc4wp = {
			listeners: [],
			forms    : {
				on: function (event, callback) {
					window.mc4wp.listeners.push({
						event   : event,
						callback: callback
					});
				}
			}
		}
	}
})();
</script>
<!-- MailChimp for WordPress v4.1.3 - https://wordpress.org/plugins/mailchimp-for-wp/ --><form id="mc4wp-form-1" class="mc4wp-form mc4wp-form-815" method="post" data-id="815" data-name="Newsletter"><div class="mc4wp-form-fields"><div class="newletterA">
<p class="txtbox">
	
	<input name="EMAIL" placeholder="Your email address" required="" type="email">
</p>
<p class="chkbx">
    <label>
Selection List</label>
    <label>
        <input name="_mc4wp_lists[]" value="2e2bdbb181" type="checkbox"> <span>
Informational page</span>
    </label>
    <label>
        <input name="_mc4wp_lists[]" value="fb031b28a7" type="checkbox"> <span>Screening</span>
    </label>
    <label>
        <input name="_mc4wp_lists[]" value="9404b6f35e" type="checkbox"> <span>Education</span>
    </label>
    <label>
        <input name="_mc4wp_lists[]" value="cb7714ef82" type="checkbox"> <span>Event</span>
    </label>
   <label>
        <input name="all" checked="" type="checkbox"> <span>All</span>
    </label>
</p>

  <p>
    <input name="_has_captcha" value="1" type="hidden"><input name="cntctfrm_contact_action" value="true" type="hidden"><span class="cptch_wrap cptch_math_actions">
				<label class="cptch_label" for="cptch_input_14"><span class="cptch_span">9</span>
					<span class="cptch_span">&nbsp;−&nbsp;</span>
					<span class="cptch_span">3</span>
					<span class="cptch_span">&nbsp;=&nbsp;</span>
					<span class="cptch_span"><input id="cptch_input_14" class="cptch_input " autocomplete="off" name="cptch_number" value="" maxlength="2" size="2" aria-required="true" required="required" style="margin-bottom:0;display:inline;font-size: 12px;width: 40px;" type="text"></span>
					<input name="cptch_result" value="OKA=" type="hidden"><input name="cptch_time" value="1497848089" type="hidden">
					<input name="cptch_form" value="general" type="hidden">
				</label><span class="cptch_reload_button_wrap hide-if-no-js">
					<noscript>
						&amp;lt;style type="text/css"&amp;gt;
							.hide-if-no-js {
								display: none !important;
							}
						&amp;lt;/style&amp;gt;
					</noscript>
					<span class="cptch_reload_button dashicons dashicons-update"></span>
				</span></span>
  </p>
<p class="btn">
	<input class="wpcf7-submit header-btn find_ther" value="Sign up" type="submit">
</p>
</div>
<div style="display: none;"><input name="_mc4wp_honeypot" value="" tabindex="-1" autocomplete="off" type="text"></div><input name="_mc4wp_timestamp" value="1497848089" type="hidden"><input name="_mc4wp_form_id" value="815" type="hidden"><input name="_mc4wp_form_element_id" value="mc4wp-form-1" type="hidden"></div><div class="mc4wp-response"></div></form><!-- / MailChimp for WordPress Plugin -->
				<ul class="social-bar">

					<li><a href="http://www.facebook.com/aspenstrong" title="" target="_blank"><img src="https://aspenstrong.org/wp-content/themes/lifeline/images/facebook.jpg" alt=""></a></li><li><a href="https://twitter.com/AspenStrong" title="" target="_blank"><img src="https://aspenstrong.org/wp-content/themes/lifeline/images/twitter-icon.jpg" alt=""></a></li><li><a href="https://www.instagram.com/aspenstrongfoundation/" title="" target="_blank"><img src="https://aspenstrong.org/wp-content/themes/lifeline/images/instagram-logo-3.png" alt=""></a></li><li><a href="https://www.linkedin.com/company/the-aspen-strong-foundation" title="" target="_blank"><img src="https://aspenstrong.org/wp-content/themes/lifeline/images/linked.png" alt=""></a></li>
				</ul>

				
		</div>
					</div>
		</div>
	</footer>
    <div class="footer-bottom">

    <div class="container">

        <p>&copy;2017 Aspenstrong.org | Website powered by <a href="http://www.frogiez.com" style="text-transform:none;">Frogiez Inc.</a>    | All rights reserved | <a href="https://aspenstrong.org/sitemap_index.xml" style="text-transform:none;">Sitemap </a>
  </p>

		<div class="menu-footer-menu-container"><ul id="menu-footer-menu" class="menu"><li id="menu-item-183" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-95 current_page_item menu-item-183"><a href="https://aspenstrong.org/">Home</a></li>
<li id="menu-item-185" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-185"><a href="https://aspenstrong.org/blog/">Blog</a></li>
<li id="menu-item-184" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-184"><a href="https://aspenstrong.org/about-us/">About Us</a></li>
<li id="menu-item-164" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-164"><a href="https://aspenstrong.org/contact-us/">Contact Us</a></li>
</ul></div>
    </div>

</div>
    
    

</div>

<!--end main container-->


     <!-- Large modal -->
	
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    	aria-hidden="true">
  	  <div class="modal-dialog modal-lg">
        <div class="modal-content">
               <div class="small-dialog-header">
					<h3>Sign In  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="fa fa-times" aria-hidden="true"></i> </button> </h3>
                    
				</div>
                
               <div class="modal-header">    
                  <ul class="nav nav-tabs modal-title">
                              <li class="active"><a href="#Login" data-toggle="tab">Login</h2></a></li>
                              <li><a href="#Registration" data-toggle="tab"> Register  </h2></a></li>
                  </ul>   
          </div> 
          
               <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                      <div class="tab-content">
                            <div class="tab-pane"  id="Registration">
                                <div class="tab-content" id="Registration">

							<form method="post" action="<?php echo HOME_WEB;?>users/register" class="register" >
							
                            <p class="form-row form-row-wide">
								<label for="username2" class="user_display_form_vals">Name:
									<i class="fa fa-user-circle" aria-hidden="true"></i>
									<input type="text" class="input-text" name="nicename" id="username2" value="" required="required">
								</label>
							</p>
                            	
							<!--<p class="form-row form-row-wide">
								<label for="username2">Username:
									<i class="fa fa-users" aria-hidden="true"></i>
									<input type="text" class="input-text" name="username" id="username2" value="">
								</label>
							</p>-->
								
							<p class="form-row form-row-wide">
								<label for="email2" class="user_display_form_vals">Email Address:
									<i class="fa fa-envelope-o" aria-hidden="true"></i>
									<input type="email" class="input-text" name="email" id="email2" value="" required="required">
								</label>
							</p>

							<p class="form-row form-row-wide">
								<label for="password1" class="user_display_form_vals">Password:
									<i class="fa fa-lock" aria-hidden="true"></i>
									<input class="input-text" type="password" name="password1" id="password1" required="required">
								</label>
							</p>

							<p class="form-row form-row-wide">
								<label for="password2" class="user_display_form_vals">Repeat Password:
									<i class="fa fa-lock" aria-hidden="true"></i>
									<input class="input-text" type="password" name="password2" id="password2">
								</label>
							</p>
							<p>
                            <div class="g-recaptcha" data-sitekey="6Le7UlwUAAAAADj3lav65sRo1I8iNtPr5r-nfHHK"></div>
                            </p>
                           <p class="form-row form-row-wide">
							<div class="checkboxes margin-top-10 user_display_form_vals">
                            			
										<input id="remember-me" type="checkbox" required="required" name="check" class="required" value="https://aspenstrong.org/terms-of-service" onclick="if(this.checked){OpenTermsWindow(this.value)}">
										<label for="remember-me" class=""><a href="https://aspenstrong.org/terms-of-service" target="_blank">I agree to the Terms and Conditions</a></label>
							</div>
							
                            </p>  
                             <input type="submit" class="button border fw margin-top-10" name="register" value="Register">
							</form>
						</div>   
                            </div> 
                            
                            <div class="tab-pane active" id="Login">
                              
                        <div class="tab-content" id="Login" style="display: inline-block;">
                        <div id="loginError">Invalid Username or Password</div>
							<form method="post" id="login_form" action="<?php echo HOME_WEB;?>users/login" class="login">

								<p class="form-row form-row-wide">
									<label for="email" class="user_display_form_vals">Email:
										<i class="fa fa-envelope-o" aria-hidden="true"></i>
										<input type="email" class="input-text required" name="email" id="email2" value="" required="required">
									</label>
								</p>

								<p class="form-row form-row-wide">
									<label for="password" class="user_display_form_vals">Password:
										<i class="fa fa-lock" aria-hidden="true"></i>
										<input class="input-text required" type="password" name="password" id="password" required="required">
									</label>
									<span class="lost_password">

										<a href="#Forotpass" data-toggle="tab">Lost Your Password?</a>
									</span>
								</p>  

								<div class="form-row">
									<input type="submit" class="button border margin-top-5" name="login" value="Login">
							  </div>
								
							</form>
						</div>
                            </div>
                            
                            <div class="tab-pane" id="Forotpass">
                              
                        <div class="tab-content" id="Forotpass" style="display: inline-block;">
							<form method="post" action="<?php echo HOME_WEB;?>users/forgotPassword" class="forotpass">

								<p class="form-row form-row-wide">
									<label for="email" class="user_display_form_vals">Email:
										<i class="fa fa-envelope-o" aria-hidden="true"></i>
										<input type="email" class="input-text" name="email" id="email2" value="" required="required">
									</label>
								</p>

								<div class="form-row">
									<input type="submit" class="button border margin-top-5" name="send" value="Send">
							  </div>
								
							</form>
						</div>
                            </div>
                           
                                                       
                      </div>
                        
                    </div>
                   
                </div>
            </div> 
           </div>
    </div>
</div> 

<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    	aria-hidden="true">
  	  <div class="modal-dialog modal-lg">
        <div class="modal-content">
               <div class="small-dialog-header">
					<h3>Help Form  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="fa fa-times" aria-hidden="true"></i> </button> </h3>
                    
				</div>
                
               <!--<div class="modal-header">    
                  <ul class="nav nav-tabs modal-title">
                              <li class="active"><a href="#Supportform" data-toggle="tab">Help</h2></a></li>
                  </ul>   
          </div> -->
          
               <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                      <div class="tab-content">
                                                       
                            <!--Help Forms-->
                            
                            <div class="tab-pane active" id="Supportform">
                              
                        <div class="tab-content" id="Helpform" style="display: inline-block;">
                        <!--<div id="loginError2" style="display:none;">Mail not sent</div>
                        <div id="loginSuccess" style="display:none;">Mail sent</div>-->
							<form method="post" id="helpForm" action="<?php echo HOME_WEB;?>home/helpform" >
                                <p class="form-row form-row-wide">
									<label for="email" class="user_display_form_vals">Name:
                                        
										<input type="text" class="input-text" name="name" value="" required="required" id="namehelp">
									</label>
								</p>
								<p class="form-row form-row-wide">
									<label for="email" class="user_display_form_vals">Email:
                                        
										<input type="email" class="input-text" name="email" value="" required="required" id="emailhelp">
									</label>
								</p>
                                <p class="form-row form-row-wide">
									<label for="email" class="user_display_form_vals">Message:
                                        
										<textarea required="required" name="message" id="messagehelp"></textarea>
									</label>
								</p>

								<div class="form-row">
									<input type="submit" class="button border margin-top-5" name="send" value="Send">
							  </div>
								
							</form>
						</div>
                            </div>
                            
                           <!--Help Forms--> 
                            
                      </div>
                        
                    </div>
                   
                </div>
            </div> 
           </div>
    </div>
</div>

<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    	aria-hidden="true">
  	  <div class="modal-dialog modal-lg">
        <div class="modal-content">
               <div class="small-dialog-header">
					<h3>Report an Issue <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="fa fa-times" aria-hidden="true"></i> </button> </h3>
                    
				</div>
                
              <!-- <div class="modal-header">    
                  <ul class="nav nav-tabs modal-title">
                              <li class="active"><a href="#Reportissue" data-toggle="tab"> Report an Issue  </h2></a></li>
                  </ul>   
          </div> -->
          
               <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                      <div class="tab-content">
                                                       
                            <!--Help Forms-->
                            
                            <div class="tab-pane active" id="Reportissue">
                              
                        <div class="tab-content" id="Helpformreport" style="display: inline-block;">
							<form method="post" id="reportForm" action="<?php echo HOME_WEB;?>users/helpform" enctype="multipart/form-data" >
                                <p class="form-row form-row-wide">
									<label for="email" class="user_display_form_vals">Name:
                                        
										<input type="text" class="input-text" name="name" value="" required="required" id="namereport">
									</label>
								</p>
								<p class="form-row form-row-wide">
									<label for="email" class="user_display_form_vals">Email:
                                       
										<input type="email" class="input-text" name="email" value="" required="required" id="emailreport">
									</label>
								</p>
                                <p class="form-row form-row-wide">
									<label for="email" class="user_display_form_vals">Message:
                                       
										<textarea required="required" name="message" id="messagereport"></textarea>
									</label>
								</p>
                                
                                <p class="form-row form-row-wide">
									<label for="email" class="user_display_form_vals">Attachment:
										<input type="file" class="input-text" name="file">
									</label>
								</p>

								<div class="form-row">
									<input type="submit" class="button border margin-top-5" name="send" value="Send">
							  </div>
								
							</form>
						</div>
                            </div>
                            
                           <!--Help Forms--> 
                            
                      </div>
                        
                    </div>
                   
                </div>
            </div> 
           </div>
    </div>
</div>


<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    	aria-hidden="true">
  	  <div class="modal-dialog modal-lg">
        <div class="modal-content">
               <div class="small-dialog-header">
					<h3>Accept Terms and Conditions <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="fa fa-times" aria-hidden="true"></i> </button> </h3>
                    
				</div>
                
              <!-- <div class="modal-header">    
                  <ul class="nav nav-tabs modal-title">
                              <li class="active"><a href="#Reportissue" data-toggle="tab"> Report an Issue  </h2></a></li>
                  </ul>   
          </div> -->
          
               <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                      <div class="tab-content">
                                                       
                            <!--Help Forms-->
                            
                            <div class="tab-pane active" id="Reportissue">
                              
                        <div class="tab-content" id="Helpformreport" style="display: inline-block;">
							<form method="post" id="termsForm" >
                            <p
                                <p class="form-row form-row-wide">
							<div class="checkboxes margin-top-10 user_display_form_vals">
										<input id="remember-me" type="checkbox" required="required" name="check" class="required">
										<label for="remember-me" class="">I have read the terms and conditions</label>
							</div>
                            </p> 
							<p class="form-row form-row-wide">
							<div class="checkboxes margin-top-10 user_display_form_vals">
										<input id="remember-me" type="checkbox" required="required" name="check" class="required">
										<label for="remember-me" class="">I agree to participate in reviewing monthly 'Aspen Strong Directory Updates' and a yearly survey request.</label>
							</div>
                            </p> 
                            <p class="form-row form-row-wide">
							<div class="checkboxes margin-top-10 user_display_form_vals">
										<input id="remember-me" type="checkbox" required="required" name="check" class="required">
										<label for="remember-me" class="">I agree to update my directory profile at least yearly.</label>
							</div>
                            </p> 
                           <p class="form-row form-row-wide">
							<div class="checkboxes margin-top-10 user_display_form_vals">
										<input id="remember-me" type="checkbox" required="required" name="check" class="required">
										<label for="remember-me" class="">I agree to represent myself and operate according to my professional ethics and Colorado regulations (DORA) within my specific title or license. If I am not a registered professional with DORA, I agree to operate ethically within the scope of my practice and the certification(s) I have earned and promote. </label>
							</div>
                            </p> 

								<div class="form-row">
									<input type="submit" class="button border margin-top-5" name="send" value="Send">
							  </div>
								
							</form>
						</div>
                            </div>
                            
                           <!--Help Forms--> 
                            
                      </div>
                        
                    </div>
                   
                </div>
            </div> 
           </div>
    </div>
</div>
            
           
<script type="text/javascript">
$(document).ready(function(e) {

   $('#i_accepts').change(function() {
        /*if($(this).is(":checked")) {
           $('#myModal4').modal('show');
        }*/
      
    });
  
  if($("#loginSuccess").length){$("#loginSuccess").remove();}
  $("#loginError").hide();
  $("#loginError2").hide();
   
  $('#login_form').submit(function(e) {
    e.preventDefault();
	//$("#loginImg").show();
	var dataVals = $("#login_form").serialize();
	//alert(dataVals);
    $.ajax({
       type: "POST",
       url: '<?php echo HOME_WEB.'users/login';?>',
       data:dataVals,
       success: function(data)
       { 
	     //$("#loginError").hide();
		  //alert(data);
          if(data=="success"){
		  //$("#loginError").show();
		  window.location.href = '<?php echo HOME_WEB.'users/dashboard';?>';  
		  }
		  if(data=="successnew"){
		  //$("#loginError").show();
		  window.location.href = '<?php echo HOME_WEB.'profile/createProfile';?>';  
		  }
		  
		  if(data=="unverified"){
		  $("#loginError").text('Please verify your account to get login.');
		  $("#loginError").show();  
		  }
		  if(data=="error"){
		  $("#loginError").show();  
		  }
      if(data=='deleted')
      {
        $("#loginError").text('Your Account is deleted.');
      $("#loginError").show(); 
      }

       }
   });
 });

	
$('.forotpass').validate({
rules : {
                email : {
				   required:true,
                },
					 
},
errorElement: 'div',
		 errorPlacement: function (error, element) {
			error.insertAfter($(element).parents('.user_display_form_vals'));
        },	
	});
	
$('.login').validate({
rules : {
                email : {
				   required:true,
                },
				password : {
				   required:true,
                },	 
},
errorElement: 'div',
		 errorPlacement: function (error, element) {
			error.insertAfter($(element).parents('.user_display_form_vals'));
        },	
	});
$('.register').validate({
            rules : {
                password2 : {
				   required:true,
                   equalTo : "#password1"
                },
				check :
               {
               required:true,
               },
			},
			ignore: ':hidden:not("#remember-me")',
		 messages: {
                                  
             check :
				{
                  required:"Please accept terms and conditions.",
                },
		 },
		 errorElement: 'div',
		 errorPlacement: function (error, element) {
			error.insertAfter($(element).parents('.user_display_form_vals'));
        },
			
            });
			
$('#helpForm').validate({

errorElement: 'div',
		 errorPlacement: function (error, element) {
			error.insertAfter($(element).parents('.user_display_form_vals'));
        },	
	});

$('#helpForm').submit(function(e) {
    e.preventDefault();
	
	var dataVals = $("#helpForm").serialize();
	//alert(dataVals);
    $.ajax({
       type: "POST",
       url: '<?php echo HOME_WEB.'home/helpform';?>',
       data:dataVals,
       success: function(data)
       { 
	     if($("#loginSuccess").length){$("#loginSuccess").remove();}
		  //alert(data);
          if(data=="success"){
		   $("#namehelp").val("");
		   $("#emailhelp").val("");
		   $("#messagehelp").val("");
		  $("#helpForm").before('<div id="loginSuccess">Mail sent</div> '); 
		  
		  }else{
		  //$("#loginSuccess").hide();
		  //$("#loginError2").show();  
			  }
		  
       }
   });
 });


	
$('#reportForm').validate({

errorElement: 'div',
		 errorPlacement: function (error, element) {
			error.insertAfter($(element).parents('.user_display_form_vals'));
        },	
	});
    
});

$('#reportForm').submit(function(e) {
    e.preventDefault();
	
	var dataVals = $("#reportForm").serialize();
	//alert(dataVals);
    $.ajax({
       type: "POST",
       url: '<?php echo HOME_WEB.'home/helpform';?>',
       data:dataVals,
       success: function(data)
       { 
	     if($("#loginSuccess").length){$("#loginSuccess").remove();}
		  //alert(data);
          if(data=="success"){
		  $("#namereport").val("");
		   $("#emailreport").val("");
		   $("#messagereport").val("");
		  $("#reportForm").before('<div id="loginSuccess">Mail sent</div> '); 
		  
		  }else{
		  //$("#loginSuccess").hide();
		  //$("#loginError2").show();  
			  }
		  
       }
   });
 });



 $(window).scroll(function(){
  if($(this).scrollTop()>1){
  $('.cstm-nav').addClass("fixed-head");
  $('.top-bar').addClass("hide-div");
}
   else{
       $('.cstm-nav').removeClass("fixed-head");
  $('.top-bar').removeClass("hide-div");
   }
});
/**
	 * Notification
	**/
	$('.notification_new .close_x').click(function(){
		$(this).parent().fadeOut();
	});	
function OpenTermsWindow(info) {
  window.open(info,'WinName','height=400,width=600,resizable=yes,scrollbars=yes,top=80,left=200');
}
</script>

</body>
</html>

