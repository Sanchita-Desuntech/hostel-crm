<section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        <h3>Password Change
                        
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <!--<a href="javascript:;" class="fa fa-times"></a>-->
                         </span></h3>
                       
                    </header>
                    <div class="panel-body" style="display: block;">
					 <?php if($this->session->flashdata('success_msg')!="") { ?>
                                             <div class="clearfix"></div>
                    <div class="alert alert-success">
                      <strong>Success!</strong> <?php echo $this->session->flashdata('success_msg');?>
                    </div>
                      <?php } ?>
                      
                       <?php if($this->session->flashdata('err_msg')!="") { ?>
                                             <div class="clearfix"></div>
                    <div class="alert alert-danger">
                      <strong>Sorry!</strong> <?=$this->session->flashdata('err_msg');?>
                    </div>
                      <?php } ?>
                        <div class="adv-table editable-table ">
                            <div class="clearfix">
                                <div class="btn-group pull-right">
                                   <!-- <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="#">Print</a></li>
                                        <li><a href="#">Save as PDF</a></li>
                                        <li><a href="#">Export to Excel</a></li>
                                    </ul>-->
                                </div>						
                            <div class="space15"></div>
                            <form method="post" id="changepassword">
                            	<input type="hidden" name="name" class="form-control" value="<?php echo $this->session->userdata('user_code');?>" placeholder="*Name">

				                 <div class="form-group">
					                   <label for="old_password">Old Password *</label>

					                   	<input name="old_password" type="password" class="form-control" value="<?php echo set_value('old_password'); ?>" placeholder="Old Password*" required="">

					                   	<?php echo form_error('old_password', '<div class="error">', '</div>'); ?>

					             </div>

	                   			<div class="form-group">
	                   				<label for="new_password">New Password *(min 8 characters)</label>

				                   	<input name="new_password" type="password" class="form-control" value="<?php echo set_value('new_password'); ?>" placeholder="New Password*" required="">

				                   	<?php echo form_error('new_password', '<div class="error">', '</div>'); ?>

				                </div>

			                   <div class="form-group">
			                   		<label for="confirm_password">Confirm New Password *</label>

				                   	<input name="confirm_password" type="password" class="form-control" value="<?php echo set_value('confirm_password'); ?>" placeholder="Confirm New Password*" required="">

				                   	<?php echo form_error('confirm_password', '<div class="error">', '</div>'); ?>

				              </div>

			                   

			                    <div class="col-lg-12">

				                   <div class="form-group">

				                   	<input name="password_submit" type="submit" class="btn btn-success" value="Update">

				                   </div>

			                   </div>

	               			</form>
                            
                            
                            <br />
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
        </section>
    </section>
    
   