<section id="main-content">
        <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        <h3>Profile
                        
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <!--<a href="javascript:;" class="fa fa-times"></a>-->
                         </span></h3>
                       
                    </header>
                    <div class="panel-body" style="display: block;">
					 <?php if($this->session->flashdata('success_msg')!="") { ?>
                                             <div class="clearfix"></div>
                    <div class="alert alert-success">
                      <strong>Success!</strong> <?=$this->session->flashdata('success_msg');?>
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
                                <div class="btn-group">
                                </div>
                            </div>
						  <div class="space15"></div>
                            <div class="col-md-7">
                            	<form role="form" method="POST" action="" enctype="multipart/form-data" autocomplete="off">
                                	<div class="form-group">
	                                    <label for="inputslidercaption">Name*</label>
	                                    <?php //$user_data = get_user_data($this->session->userdata('user_code'));?>
	                                    <input name="full_name" type="text" value="<?php echo $profile->full_name; ?>" class="form-control" placeholder="Enter Name*">
	                                    <?php echo form_error('full_name','<div class="error">','</div>'); ?>
	                                </div>
	                                <div class="form-group">
	                                    <label for="inputslidercaption">Mobile *</label>
	                                    <input name="mobile" type="number" value="<?php echo $profile->mobile; ?>" class="form-control" placeholder="Enter Mobile">
	                                    <?php echo form_error('mobile','<div class="error">','</div>'); ?>
	                                </div>

    									<div class="form-group">
    	                                    <label for="inputslidercaption">Email *</label>
    	                                    <input name="email" type="text" value="<?php echo $profile->email; ?>" class="form-control" placeholder="Enter Email" readonly="readonly">
    	                                    <?php echo form_error('email','<div class="error">','</div>'); ?>
    	                                </div>
	                                    <div class="form-group">
		                                    <img src="<?php echo base_url()?>uploads/users/profile_photo/<?=$profile->profile_photo?>" height=100px; width=100px;>
		                                    <label for="inputslidercaption">Profile Image</label>
		                                     <input type="file" name="profile_photo" accept="image/*" />
		                                     <input name="prev_link" type="hidden" value="<?php echo $profile->profile_photo?>" class="form-control" id="hid_class" placeholder="Enter Link Button Slug Link">
		                                    <p class="help-block" style="color: :red;">Please Select Only Image.</p>
		                                </div>
		                                
		                                <!--<div class="form-group">
		                                    <label for="package_id">Package Details</label>
		                                    <select name="package_id" class="form-control">
		                                    	<option value="">Select Package</option>
		                                    	<?php foreach($all_package as $res_pack) { ?>
		                                    	<option value="<?php echo $res_pack->package_code; ?>" <?php if($res_pack->package_code == $profile->package_id) {echo "selected"; }?> ><?php echo $res_pack->package_name;?> &nbsp;<?php echo $res_pack->package_hours; ?> Hours &nbsp; $<?php echo $res_pack->package_price ?></option>
		                                    	
		                                    	<?php } ?>
		                                    </select>
		                                    <?php echo form_error('package_id', '<div class="error">', '</div>'); ?>
		                                </div>
		                                
		                                <div class="form-group">
		                                    <?php foreach($all_package as $res_package) { ?>
			                                <input type="hidden" name="time_wallet" value="<?php echo $res_package->package_hours; ?>">
			                                <?php } ?>
		                                </div>-->
		                                <div class="form-group">
		                                    <label for="inputslidercaption">Date Of Birth</label>
		                                    <input name="dob" type="text" value="<?php echo $profile->dob; ?>" class="form-control" placeholder="Enter Birthday" id="datepick">
                                		</div>
                                        <div class="form-group">
                                            <label for="inputslidercaption">Address</label>
                                            <input name="address_line1" type="text" value="<?php echo $profile->address_line1; ?>" class="form-control" placeholder="Enter Address">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputslidercaption">Address 2</label>
                                            <input name="address_line2" type="text" value="<?php echo $profile->address_line2; ?>" class="form-control" placeholder="Enter Address 2">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputslidercaption">City</label>
                                            <input name="city" type="text" value="<?php echo $profile->city; ?>" class="form-control" placeholder="Enter City">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputslidercaption">State</label>
                                            <input name="state" type="text" value="<?php echo $profile->state; ?>" class="form-control" placeholder="Enter State">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputslidercaption">Country</label>
                                            <input name="country" type="text" value="<?php echo $profile->country; ?>" class="form-control" placeholder="Enter Country">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputslidercaption">Post Code</label>
                                            <input name="post_code" type="text" value="<?php echo $profile->post_code; ?>" class="form-control" placeholder="Enter Post Code">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputslidercaption">Information From</label>
                                            <select name="information" class="form-control">
                                                <option value="">Select Option</option>
                                                <option value="FB" <?php if($profile->information == 'FB') {echo "selected"; } ?>>FB</option>
                                                <option value="Twitter" <?php if($profile->information == 'Twitter') {echo "selected"; } ?>>Twitter</option>                                       
                                                <option value="Linkedin" <?php if($profile->information == 'Linkedin') {echo "selected"; } ?>>Linkedin</option> 
                                                <option value="Youtube" <?php if($profile->information == 'Youtube') {echo "selected"; } ?>>Youtube</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
		                                    <label for="inputslidercaption">Preference *</label>
		                                    <select name="preference" class="form-control">
		                                    	<option value="">Select Option</option>
		                                    	<option value="email" <?php if($profile->preference == 'email') {echo "selected"; } ?>>Email</option>
		                                    	<option value="phone" <?php if($profile->preference == 'phone') {echo "selected"; } ?>>Phone</option>
                                                <option value="message" <?php if($profile->preference == 'message') {echo "selected"; } ?>>Message</option>
		                                    </select>
		                                    <?php echo form_error('preference', '<div class="error">', '</div>'); ?>
		                                </div>                               
                                	<button type="submit" class="btn btn-info">Submit</button>
                            	</form>                            	
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
        </section>
    </section>
    
    
<script type="text/javascript">
  function myJsFunc_comdel(dataid,dataimg)
  {
    if (confirm("Are you sure that you want to delete the data?"))
    {
    window.location.href = "<?php echo base_url()?>admin/coupon/delete_coupon/"+dataid+'/'+dataimg;
    }
  }
</script>      