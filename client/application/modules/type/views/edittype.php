<section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        <div class="row">
           <div class="col-lg-12">
           <?php echo validation_errors(); ?>
		    <?php if($this->session->flashdata('err_msg')!="") { ?>
						 <div class="clearfix"></div>
				<div class="alert alert-danger">
				  <strong>Danger!</strong> <?=$this->session->flashdata('err_msg');?>
				</div>
				  <?php } ?>
                    <section class="panel">
                        <header class="panel-heading">
                           <h3> Edit Type <a href="<?php echo base_url();?>admin/type/type" class="btn btn-danger flotright">Back</a></h3>
                        </header>
                        <div class="panel-body">
                            <div>
                            	<?php foreach($type as $res_type) { ?>
                            	
                                <form role="form" method="POST" action="" enctype="multipart/form-data" autocomplete="off">
                                

								<div class="form-group" id="type_name">
                                    <label for="inputslidercaption">User Type *</label>
                                    <input type="text" value="<?php echo $res_type->type_name; ?>" class="form-control" placeholder="Enter Movies Type" name="type_name">
                                     <?php echo form_error('type_name','<div class="error">','</div>'); ?>
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
    