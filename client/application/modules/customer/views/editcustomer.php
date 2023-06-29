<section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        <div class="row">
           <div class="col-lg-12">
           <?php if($this->session->flashdata('success_msg')!="") { ?>
        		<div class="clearfix"></div>
                    <div class="alert alert-success">
                      <strong>Success!</strong> <?php $this->session->flashdata('success_msg');?>
                    </div>
            <?php } ?>
		    <?php if($this->session->flashdata('err_msg')!="") { ?>
				<div class="clearfix"></div>
					<div class="alert alert-danger">
					  <strong>Danger!</strong> <?=$this->session->flashdata('err_msg');?>
					</div>
  			<?php } ?>
                    <section class="panel">
                        <header class="panel-heading">
                           <h3> Edit customer <a href="<?php echo base_url();?>admin/customer" class="btn btn-danger flotright">Back</a></h3>
                        </header>
                        <?php foreach($allcustomer_row as $singledata) { ?>
                             <form role="form" method="POST" action="" autocomplete="off" enctype="multipart/form-data">
                        			<div class="panel-body">
                                    <div class="tab-content">
                                    <div id="home" class="tab-pane fade in active">                              
                                		<div class="form-group">
		                                    <label for="full_name">Name *</label>
		                                    <input name="full_name" type="text" class="form-control" placeholder="Enter Name*" value="<?php echo $singledata->full_name;?>">
		                                    <?php echo form_error('full_name', '<div class="error">', '</div>'); ?>
		                                </div>
                                		<div class="form-group">
		                                    <label for="email">Email *</label>
		                                    <input name="email" type="text" class="form-control" placeholder="Enter Email*" value="<?php echo $singledata->email;?>">
		                                    <?php echo form_error('email', '<div class="error">', '</div>'); ?>
		                                </div>
                                		<div class="form-group">
		                                    <label for="mobile">Mobile *</label>
		                                    <input name="mobile" maxlength="10" type="number" class="form-control" placeholder="Enter Mobile*" value="<?php echo $singledata->mobile;?>">
		                                    <?php echo form_error('mobile', '<div class="error">', '</div>'); ?>
		                                </div>
                                		<div class="form-group">
		                                    <img src="<?php echo base_url()?>uploads/users/profile_photo/<?=$singledata->profile_photo?>" height=100px; width=100px;>
		                                    <label for="inputslidercaption">Profile Image</label>
		                                     <input type="file" name="profile_photo" accept="image/*" />
		                                     <input name="prev_link" type="hidden" value="<?=$singledata->profile_photo?>" class="form-control" id="hid_class" placeholder="Enter Link Button Slug Link">
		                                    <p class="help-block" style="color: :red;">Please Select Only Image.</p>
		                                </div>
		                                
		                                <div class="form-group">
		                                    <label for="mobile">Time Wallet *</label>
		                                    <input name="time_wallet" type="number" class="form-control" placeholder="Enter Time Wallet*" value="<?php echo $singledata->time_wallet; ?>">
		                                    <?php echo form_error('time_wallet', '<div class="error">', '</div>'); ?>
		                                </div>
		                                
		                                <div class="form-group">
		                                    <label for="mobile">Remaining Time *</label>
		                                    <input name="remain_time" type="number" class="form-control" placeholder="Enter Remaining Time*" value="<?php echo $singledata->remain_time; ?>">
		                                    <?php echo form_error('remain_time', '<div class="error">', '</div>'); ?>
		                                </div>
		                                
		                                <div class="form-group">
		                                    <label for="inputslidercaption">Date Of Birth</label>
		                                    <input name="dob" type="text" value="<?php echo $singledata->dob; ?>" class="form-control" placeholder="Enter Birthday" id="datepick">
                                		</div>
                                		<div class="form-group">
		                                    <label for="inputslidercaption">Preference *</label>
		                                    <select name="preference" class="form-control">
		                                    	<option value="">Select Option</option>
		                                    	<option value="email" <?php if($singledata->preference == 'email' ) { echo "selected"; }; ?>>Email</option>
		                                    	<option value="phone" <?php if($singledata->preference == 'phone') { echo "selected"; } ; ?>>Phone</option>                                    	
		                                    	<option value="message" <?php if($singledata->preference == 'message') { echo "selected"; }; ?>>Message</option>                                    	
		                                    </select>
		                                    <?php echo form_error('preference', '<div class="error">', '</div>'); ?>
		                                </div>
                                
                               
                                	</div>
                                    </div>
                            
                            

                        </div>
                         		<div class="panel-footer"> <button type="submit" class="btn btn-info">Submit</button></div>
                        		</form>
                        <?php } ?>
                    </section>

            </div>
        </div>
        <!-- page end-->
        </section>