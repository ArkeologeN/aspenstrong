<!-- /inner_content-->
<?php //print_r($result);?>
<div class="inner_content">
    <!-- /inner_content_w3_agile_info-->

    

    <div class="inner_content_w3_agile_info two_in">
        

        <!--/forms-->
        <div class="forms-main_agileits">
            <!--/set-2-->

            <div class="wthree_general graph-form agile_info_shadow ">
                <h3 class="w3_inner_tittle two">Edit <?php echo $module;?> </h3>

                <div class="grid-1 ">
                    <div class="form-body">
                    <?= $this->Flash->render(); ?>
                        <form class="form-horizontal" action="" method="post">
						
						<div class="form-group">
                                <label for="radio" class="col-sm-2 control-label">Status</label>
                                <div class="col-sm-8">
                                    <div class="radio-inline">
                                        <label><input name="data[status]"  required class="entry_type" value="a" type="radio" <?php if($result['status']=='a'){echo "checked";}?>> Approved</label>
                                    </div>
                                    <div class="radio-inline">
                                        <label>
                                            <input name="data[status]" required class="entry_type" value="i" type="radio" <?php if($result['status']=='i'){echo "checked";}?>> Unapproved</label>
                                    </div>
                                    
                                </div>
                            </div>
							
							
						    <div class="individual">
                            <div class="form-group">
                                <label for="focusedinput" class="col-sm-2 control-label">Provided Category</label>
                                <div class="col-sm-8">
                                    <select type="text" class="form-control1" required id="focusedinput" name="data[parent_id]">
                                        <option value="">select</option>
                                        <?php
                                            foreach($parent_ct as $parent_ctd)
                                            {
                                            echo $result['parent_id'];
                                            echo $parent_ctd->id;
                                                echo '<option value="'.$parent_ctd->id.'" '.($result['parent_id']==$parent_ctd->id?'selected':'').'>'.$parent_ctd->name.'</option>';
                                            } 
                                         ?>
                                    </select>
                                </div>
                            </div>
                             <div class="form-group">
                                <label for="focusedinput" class="col-sm-2 control-label">Name (English)</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control1" required id="focusedinput" name="data[name]" value="<?php echo $result['name'];?>" placeholder="Name">
                                </div>
                            </div>
                           <div class="form-group">
                                <label for="focusedinput" class="col-sm-2 control-label">Name (Spanish)</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control1" id="focusedinput" required name="data[name_spanish]" value="<?php echo $result['name_spanish'];?>" placeholder="Last Name">
                                </div>
                            </div>
                            
                           
                        <div class="form-group">
                                <label for="focusedinput" class="col-sm-2 control-label">&nbsp;</label>
                                <div class="col-sm-8">
                                 <button type="submit" class="btn btn-primary submit-btn">Submit</button>
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
