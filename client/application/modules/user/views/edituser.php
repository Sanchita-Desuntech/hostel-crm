<section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        <div class="row">
           <div class="col-lg-12">
		    <?php if($this->session->flashdata('err_msg')!="") { ?>
						 <div class="clearfix"></div>
<div class="alert alert-danger">
  <strong>Danger!</strong> <?=$this->session->flashdata('err_msg');?>
</div>
  <?php } ?>
                    <section class="panel">
                        <header class="panel-heading">
                           <h3> Edit User <a href="<?php echo base_url();?>admin/user" class="btn btn-danger flotright">Back</a></h3>
                        </header>
                        <?php foreach($single_data as $singledata) { ?>
                             <form role="form" method="POST" action="" enctype="multipart/form-data">
                        <div class="panel-body">
                          <div class="tab-content">
                                    <div id="home" class="tab-pane fade in active">
								  <div class="form-group">
                                    <label for="name">Name</label>
                                    <input name="full_name" value="<?php echo $singledata->full_name;?>" type="text" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input name="email" value="<?php echo $singledata->email;?>" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputslidercaption">Mobile</label>
                                    <input name="mobile" value="<?php echo $singledata->mobile;?>" type="text" class="form-control">
                                </div>
                                 <div class="form-group">
                                    <label for="inputslidercaption">Profile Bio</label>
                                   <textarea name="profile_bio" class="form-control editor_big"><?php echo $singledata->profile_bio;?></textarea>
                                </div>
                                 <div class="form-group">
                                    <img src="<?php echo base_url()?>uploads/users/profile_photo/<?=$singledata->profile_photo?>" height=100px; width=100px;>
                                    <label for="inputslidercaption">Profile Image</label>
                                     <input type="file" name="profile_photo" accept="image/*" />
                                     <input name="prev_link" type="hidden" value="<?=$singledata->profile_photo?>" class="form-control" id="hid_class" placeholder="Enter Link Button Slug Link">
                                    <p class="help-block" style="color: :red;">Please Select Only Image.</p>
                                </div>
                                <div class="form-group">
                                    <img src="<?php echo base_url()?>uploads/users/timeline_photo/<?=$singledata->timeline_photo?>" height=100px; width=100px;>
                                    <label for="inputslidercaption">Timeline Image</label>
                                     <input type="file" name="timeline_photo" accept="image/*" />
                                     <input name="prev_link" type="hidden" value="<?=$singledata->timeline_photo?>" class="form-control" id="hid_class" placeholder="Enter Link Button Slug Link">
                                    <p class="help-block" style="color: :red;">Please Select Only Image.</p>
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