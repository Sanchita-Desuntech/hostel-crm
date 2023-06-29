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
                
			   <h1 class="color-white">Update My Profile</h1>
               <div class="signup" style="background: #ffeae5;">
               	<?php foreach($get_user_data as $res_user) { ?>
               		<form method="post" action="" autocomplete="off" enctype="multipart/form-data">
					    <div class="styled-input">
					      <input name="full_name" type="text" class="form-control" value="<?php echo $res_user->full_name; ?>">
				          <label>Name *</label>
					      <span></span><?php echo form_error('full_name', '<div class="error">', '</div>'); ?>
					    </div>
					    <div class="styled-input">
					      <input maxlength="10" name="mobile" maxlength="10" type="number" class="form-control" value="<?php echo $res_user->mobile; ?>">
						  <label>Mobile *</label>
					      <span></span><?php echo form_error('mobile', '<div class="error">', '</div>'); ?>
					    </div>
					    <div class="styled-input text-left">
					    <img src="<?php echo base_url()?>uploads/users/profile_photo/<?=$res_user->profile_photo;?>" height=100px; width=100px;>
					    <input type="file" name="profile_photo" accept="image/*" />
                        <input name="prev_link" type="hidden" value="<?=$res_user->profile_photo;?>" class="form-control" id="hid_class" placeholder="Enter Link Button Slug Link">
					      <p class="help-block" style="color: :red;">Please Select Only Image.</p>
						  <label>Profile Photo</label>
					      <span></span>
					    </div>
					    <?php if($this->session->userdata('is_front_logged_in')==1) { ?>
					    <div class="styled-input">
					      <input name="email" type="text" class="form-control" readonly="readonly" value="<?php echo $this->session->userdata('email');  ?>" style="background:#38284d96;">
						 
					      <span></span>
					    </div>
					    <?php } ?>
					    
					    <input type="submit" class="join-btn" value="SUBMIT"/>
				  </form>
               	<?php } ?>
               	
               </div>
               </center>
			</div>
		</div>
	</div>
</section>