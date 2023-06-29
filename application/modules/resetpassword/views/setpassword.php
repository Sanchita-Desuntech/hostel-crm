<section class="container-fluid inner-banner pd">
	<div class="row">
		<div class="container">
			<div class="row">
			 <center>
			 <?php if($this->session->flashdata('success_msg')!="") { ?>
                                             <div class="clearfix"></div>
                    <div class="alert alert-success">
                      <strong>Success!</strong> <?php echo $this->session->flashdata('success_msg');?>
                    </div>
                      <?php } ?>
                      
                       <?php if($this->session->flashdata('error_msg')!="") { ?>
                                             <div class="clearfix"></div>
                    <div class="alert alert-danger">
                      <strong>Sorry!</strong> <?php echo $this->session->flashdata('error_msg');?>
                    </div>
                      <?php } ?>
			   <h1 class="color-white">Reset Password</h1>
               
               <div class="signup">
               	<form method="post" action="<?php echo base_url();?>resetpassword/setpassword">
				    <div class="styled-input">
				      <input type="password" name="new_password" value="" placeholder="Enter New Password (required)" />
				      <label>New Password *</label>
				      <span></span><?php echo form_error('new_password', '<div class="error">', '</div>'); ?>
				    </div>
				    <div class="styled-input">
				      <input type="password" name="confirm_password" value="" placeholder="Confirm Password(required)" />
							<label>Confirm Password *</label>
				      		<span></span>
							<?php echo form_error('confirm_password', '<div class="error">', '</div>'); ?>
				    </div>
				    <input type="hidden" name="user_code" value="<?php echo $_SESSION['user_code'];?>">
				    <input type="submit" class="join-btn" value="SUBMIT"/>
				  </form>
               </div>
               
               </center>
			</div>
		</div>
	</div>
</section>
            
					