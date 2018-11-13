
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gutter">
         <div class="profile_bg">
             
              <div class="container"> 
              
              		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gutter">
              	     
              
                         
						  
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 user_dash" id="click2">
                               
                                
                             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                             <form id="myform" method="post" action="">
                                <div class="user_signup">
                                    <div class="login_head">
                                    	<i class="fa fa-file-text-o"></i>
                                    	<h2>Change Password</h2>
                                	</div> 
                             </div> 
                             
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="indiv1"> 
                                  
                                       <div class="user_display_form">
                                       		<label class="required">Password</label>
                                       		<input type="password" class="required valid" name="user_pass" value="" id="user_pass" required="required">
                                           
                                      </div>
                                      <div class="user_display_form">
                                       		<label class="required">Repeat-Password</label>
                                       		<input type="password" class="required valid" name="user_pass2" value="" required="required">
                                           
                                      </div>
                                     
                               
                               <div class="green_save">
                                       <ul>
                                           <li>
                                           <input type="hidden" value="<?php if(isset($id)){echo $id;} ?>" name="data[id]" />
                                             <button type="submit" value="Submit" class="save_btn">Save</button>
                                             <!--<a href="#" class="save_btn">Save</a>-->
                                           </li>
                                        </ul>			       
                                </div>    
                                
                                
                             </div>  
                             
                                
                             
                         </form>
                         </div>
                   
                        </div>
            
        </div> 
              </div>
          </div>    
  </div>
  

  
  <!--end main container-->
<script type="text/javascript">

$(document).ready(function(){		

$("#myform").validate({errorElement: 'span',
rules : {
                user_pass2 : {
                   equalTo : "#user_pass"
                }
			}

});
           
		
});
 
</script>
