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
                           <h3> Add SMS<a href="<?php echo base_url();?>admin/settings/addsms" class="btn btn-danger flotright">Back</a></h3>
                        </header>
                        <div class="panel-body">
                            <div>
                                <form role="form" method="POST" action="" enctype="multipart/form-data" autocomplete="off">
                                <div class="form-group">
                                    <label for="inputslidercaption">Sender Name</label>
                                    <input name="sender_name" value="<?php echo set_value('sender_name'); ?>" type="text" class="form-control" placeholder="Enter Sender Name">
                                    <?php echo form_error('sender_name','<div class="error">','</div>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="inputslidercaption">SMS Provider</label>
                                    <input name="smsprovider" value="<?php echo set_value('smsprovider'); ?>" type="text" class="form-control" placeholder="Enter SMS Provider">
                                    <?php echo form_error('smsprovider','<div class="error">','</div>'); ?>
                                </div>

								<div class="form-group">
                                    <label for="inputslidercaption">Sender Id</label>
                                    <input name="sender_id" value="<?php echo set_value('sender_id'); ?>" type="text" class="form-control" placeholder="Enter Sender Id">
                                    <?php echo form_error('sender_id','<div class="error">','</div>'); ?>
                                </div>

								<div class="form-group">
                                    <label for="inputslidercaption">SMS Type</label>
                                    <input name="smstype" value="<?php echo set_value('smstype'); ?>" type="text" class="form-control" placeholder="Enter SMS Type">
                                    <?php echo form_error('smstype','<div class="error">','</div>'); ?>
                                </div>
                                
                                <div class="form-group">
                                    <label for="inputslidercaption">API</label>
                                    <input name="api" value="<?php echo set_value('api'); ?>" type="text" class="form-control" placeholder="Enter API">
                                    <?php echo form_error('api','<div class="error">','</div>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="inputslidercaption"> User Name</label>
                                    <input name="username" value="<?php echo set_value('username'); ?>" type="email" class="form-control" placeholder="Enter User Name">
                                    <?php echo form_error('username','<div class="error">','</div>'); ?>
                                </div>

								<div class="form-group">
                                    <label for="inputslidercaption">Password</label>
                                    <input name="password" value="<?php echo set_value('password'); ?>" type="text" class="form-control" placeholder="Enter Password">
                                    <?php echo form_error('password','<div class="error">','</div>'); ?>
                                </div>
                                
                                <div class="form-group">
                                    <label for="inputslidercaption2">Status</label>
                                    <select name="is_active" class="form-control">
                                    	<option value="1">Yes</option>
                                    	<option value="0">No</option>                                    	
                                    </select>
                                 </div>
                                 
                            	<div class="form-group">
                                    <label for="inputslidercaption">URL</label>
                                    <input name="url" value="<?php echo set_value('url'); ?>" type="text" class="form-control" placeholder="Enter URL">
                                    <?php echo form_error('url','<div class="error">','</div>'); ?>
                                </div>
                                
                                <button type="submit" class="btn btn-info">Submit</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
        </div>
        <!-- page end-->
        </section>
    </section>