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

                           <h3> Add User <a href="<?php echo base_url();?>admin/user" class="btn btn-danger flotright">Back</a></h3>
                        </header>
                             <form role="form" method="POST" action="" enctype="multipart/form-data">
                        <div class="panel-body">
                                     <div class="tab-content">
                                    <div id="home" class="tab-pane fade in active">                              
                                <div class="form-group">
                                    <label for="full_name">Name</label>
                                    <input name="full_name" type="text" class="form-control" placeholder="Enter Name">
                                    <?php echo form_error('full_name', '<div class="error">', '</div>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input name="email" type="text" class="form-control" placeholder="Enter Email">
                                    <?php echo form_error('email', '<div class="error">', '</div>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="email">Password</label>
                                    <input name="password" type="text" class="form-control" placeholder="Enter Password">
                                    <?php echo form_error('password', '<div class="error">', '</div>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="mobile">Mobile</label>
                                    <input name="mobile" maxlength="10" type="text" class="form-control" placeholder="Enter Mobile">
                                    <?php echo form_error('mobile', '<div class="error">', '</div>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="inputslidercaption">Profile_Bio</label>
                                   <textarea name="profile_bio" class="form-control editor_big"></textarea>
                                   
                                </div>
                                <div class="form-group">
                                    <label for="inputslidercaption">Profile Photo</label>
                                     <input type="file" name="profile_photo" accept="image/*" />
                                    <p class="help-block" style="color: :red;">Please Select Only Image.</p>
                                </div>
                                <div class="form-group">
                                    <label for="inputslidercaption">Timeline Photo</label>
                                     <input type="file" name="timeline_photo" accept="image/*" />
                                    <p class="help-block" style="color: :red;">Please Select Only Image.</p>
                                </div>
                                 <div class="form-group">
                                     <label for="inputslidercaption">Status</label>
                                     <select name="status" class="form-control">
                                         <option value="1">Active</option>
                                         <option value="0">Inactive</option>
                                     </select>
                                </div>
                                <div class="form-group">
                                     <label for="inputslidercaption">Registration Type</label>
                                     <select name="registration_type" class="form-control">
                                         <option value="B">Blog</option>
                                         <option value="S">Shop</option>
                                         <option value="R">Recipe</option>
                                     </select>
                                     
                                </div>
                                
                                <div class="form-group">
                                    <label for="inputslidercaption">User Type</label>
                                    <select name="user_type" class="form-control">
                                    	<option value="">Select Option</option>
                                    	    <?php foreach($user_type as $res_type){?>
											<option value=<?php echo $res_type->id;?>><?php echo $res_type->type_name;?></option>
										<?php }?>                          	
                                    </select>
                                    <?php echo form_error('user_type','<div class="error">','</div>'); ?>
                                </div>
                                
                               
                                </div>
                                    </div>
                            
                            

                        </div>
                         <div class="panel-footer"> <button type="submit" class="btn btn-info">Submit</button></div>
                        </form>

                    </section>

            </div>
        </div>
        <!-- page end-->
        </section>
    </section>
    