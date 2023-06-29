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
                           <h3> Edit Tax <a href="<?php echo base_url();?>admin/settings/viewtax" class="btn btn-danger flotright">Back</a></h3>
                        </header>
                        <div class="panel-body">
                            <div>
							<?php foreach($sms as $s) { ?>
                                <form role="form" method="POST" action="" enctype="multipart/form-data" autocomplete="off">
                               
                                <div class="form-group">
                                    <label for="inputslidercaption">Sender Name</label>
                                    <input name="sender_name" type="text" class="form-control" value="<?php echo $s->sender_name; ?>">
                                    <?php echo form_error('sender_name','<div class="error">','</div>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="inputslidercaption">SMS Provider</label>
                                    <input name="smsprovider" type="text" class="form-control" value="<?php echo $s->smsprovider; ?>" >
                                    <?php echo form_error('smsprovider','<div class="error">','</div>'); ?>
                                </div>

								<div class="form-group">
                                    <label for="inputslidercaption">Sender Id</label>
                                    <input name="sender_id" type="text" class="form-control" value="<?php echo $s->sender_id; ?>">
                                    <?php echo form_error('sender_id','<div class="error">','</div>'); ?>
                                </div>

								<div class="form-group">
                                    <label for="inputslidercaption">SMS Type</label>
                                    <input name="smstype" type="text" class="form-control" value="<?php echo $s->smstype; ?>" >
                                    <?php echo form_error('smstype','<div class="error">','</div>'); ?>
                                </div>
                                
                                <div class="form-group">
                                    <label for="inputslidercaption">API</label>
                                    <input name="api" type="text" class="form-control" value="<?php echo $s->api; ?>">
                                    <?php echo form_error('api','<div class="error">','</div>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="inputslidercaption"> User Name</label>
                                    <input name="username" type="email" class="form-control" value="<?php echo $s->username; ?>">
                                    <?php echo form_error('username','<div class="error">','</div>'); ?>
                                </div>

								<div class="form-group">
                                    <label for="inputslidercaption">Password</label>
                                    <input name="password" type="text" class="form-control" value="<?php echo $s->password; ?>">
                                    <?php echo form_error('password','<div class="error">','</div>'); ?>
                                </div>
                                 <div class="form-group">
                                    <label for="inputslidercaption2">Status</label>
                                    <select name="is_active" class="form-control">
                                    	<option value="1" <?php if($s->is_active==1){echo "selected";}?>>Yes</option>
                                    	<option value="0" <?php if($s->is_active==0){echo "selected";}?>>No</option>                                    	
                                    </select>
                                 </div>	
                                 
                            	<div class="form-group">
                                    <label for="inputslidercaption">URL</label>
                                    <input name="url" type="text" class="form-control" value="<?php echo $s->url; ?>">
                                    <?php echo form_error('url','<div class="error">','</div>'); ?>
                                </div>	
                                
                                <button type="submit" class="btn btn-info">Submit</button>
                            </form>
							<?php } ?>
                            </div>

                        </div>
                    </section>

            </div>
        </div>
        <!-- page end-->
        </section>
    </section>