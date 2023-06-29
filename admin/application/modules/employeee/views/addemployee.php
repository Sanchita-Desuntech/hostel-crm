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

                           <h3> Add Employee <a href="<?php echo base_url();?>admin/employee" class="btn btn-danger flotright">Back</a></h3>

                        </header>

                        <div class="panel-body">

                            <div>

                                <form role="form" method="POST" action="" autocomplete="off" enctype="multipart/form-data">

                        			<div class="panel-body">

                                     <div class="tab-content">

                                    <div id="home" class="tab-pane fade in active">                              

                                		<div class="form-group">

		                                    <label for="full_name">Name *</label>

		                                    <input name="full_name" value="<?php echo set_value('full_name'); ?>" type="text" class="form-control" placeholder="Enter Name*">

		                                    <?php echo form_error('full_name', '<div class="error">', '</div>'); ?>

		                                </div>

                                		<div class="form-group">

		                                    <label for="email">Email *</label>

		                                    <input name="email" value="<?php echo set_value('email'); ?>" type="text" class="form-control" placeholder="Enter Email*">

		                                    <?php echo form_error('email', '<div class="error">', '</div>'); ?>

		                                </div>

                                		<div class="form-group">

		                                    <label for="email">Password *</label>

		                                    <input name="password" value="<?php echo set_value('password'); ?>" type="password" class="form-control" placeholder="Enter Password*">

		                                    <?php echo form_error('password', '<div class="error">', '</div>'); ?>

		                                </div>

                                		<div class="form-group">

		                                    <label for="mobile">Mobile *</label>

		                                    <input name="mobile" maxlength="10" type="text" class="form-control" placeholder="Enter Mobile*" value="<?php echo set_value('mobile'); ?>">

		                                    <?php echo form_error('mobile', '<div class="error">', '</div>'); ?>

		                                </div>

                                		<div class="form-group">

		                                    <label for="inputslidercaption">Profile Photo</label>

		                                     <input type="file" name="profile_photo" accept="image/*" />

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

		                                    <label for="inputslidercaption">Supervisor Name *</label>

		                                    <select name="supervisor_name" class="form-control">

		                                    	<option value="">Select Option</option>

		                                    	    <?php foreach($supervisor as $res_supervisor){?>

													<option value=<?php echo $res_supervisor->sup_code;?> <?php echo set_select('supervisor_name','$res_supervisor->sup_code', ( !empty($data) && $data == "input" ? TRUE : FALSE )); ?>><?php echo $res_supervisor->full_name;?></option>

												<?php }?>

												

		                                    </select>

		                                    <?php echo form_error('supervisor_name', '<div class="error">', '</div>'); ?>

		                                </div>

                                

                               

                                	</div>

                                    </div>

                            

                            



                        </div>

                         		<div class="panel-footer"> <button type="submit" class="btn btn-info">Submit</button></div>

                        		</form>

                            </div>



                        </div>

                    </section>



            </div>

        </div>

        <!-- page end-->

        </section>

    </section>