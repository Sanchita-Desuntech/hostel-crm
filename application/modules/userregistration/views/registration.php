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
                
			   <h1 class="color-white">Signup</h1>
               <h4>Join Redbox Perks to earn points for doing what you’re doing.<br> Then, use your points to score free rentals – woohoo!</h4>
               <div class="signup">
               	<form method="post" action="" autocomplete="off">
				    <div class="styled-input">
				      <input type="email" name="email" value="<?php echo set_value('email'); ?>"/>
					  <label>Email *</label>
				      <span></span><?php echo form_error('email', '<div class="error">', '</div>'); ?>
				    </div>
				    <div class="styled-input">
				      <input type="password" name="password" value="<?php echo set_value('password'); ?>" />
					  <label>Password *</label>
				      <span></span><?php echo form_error('password', '<div class="error">', '</div>'); ?>
				    </div>
				    <div class="styled-input">
				      <input type="password" name="confirm_password" value="<?php echo set_value('confirm_password'); ?>"/>
					  <label>Re-enter Password *</label>
				      <span></span><?php echo form_error('confirm_password', '<div class="error">', '</div>'); ?>
				    </div>
				    <!--<div class="styled-input wide">
				      <textarea required></textarea>
				      <label>Message</label>
				      <span></span>
				    </div>-->
				    <input type="submit" class="join-btn" value="SUBMIT"/>
				  </form>
               </div>
               <p class="ptext">ALREADY HAVE AN ACCOUNT <a href="<?php echo base_url()?>login">SIGN IN</a></p>
               </center>
			</div>
		</div>
	</div>
</section>