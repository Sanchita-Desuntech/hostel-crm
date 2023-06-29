<section class="container-fluid inner-banner pd">
	<div class="row">
		<div class="container">
			<div class="row">
			 <center>
			 <?php if($this->session->flashdata('error_login')!="") { ?>
                                             <div class="clearfix"></div>
                    <div class="alert alert-danger">
                      <strong>Sorry!</strong> <?php echo $this->session->flashdata('error_login');?>
                    </div>
                      <?php } ?>
			   <h1 class="color-white">Sign In</h1>
               <h4>Join Redbox Perks to earn points for doing what you’re doing.<br> Then, use your points to score free rentals – woohoo!</h4>
               <div class="signup">
               	<form method="post" action="" autocomplete="off">
				    <div class="styled-input">
				      <input type="email" name="username" required />
				      <label>Email *</label>
				      <span></span><?php echo form_error('username', '<div class="error">', '</div>'); ?>
				    </div>
				    <div class="styled-input">
				      <input type="password" name="password" required />
				      <label>Password *</label>
				      <span></span><?php echo form_error('password', '<div class="error">', '</div>'); ?>
				    </div>
				    <div class="styled-input">
				      <a href="<?php echo base_url()?>resetpassword">FORGOT PASSWORD</a>
				    </div>
				    <input type="submit" class="join-btn" value="SUBMIT"/>
				  </form>
               </div>
               <p class="ptext">Don't have an account? <a href="<?php echo base_url()?>userregistration">SIGN UP</a></p>
               </center>
			</div>
		</div>
	</div>
</section>
            