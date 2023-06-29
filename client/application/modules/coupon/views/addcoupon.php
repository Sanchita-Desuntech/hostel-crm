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

                           <h3> Add Coupon <a href="<?php echo base_url();?>admin/coupon/addcoupon" class="btn btn-danger flotright">Back</a></h3>

                        </header>

                        <div class="panel-body">

                            <div>

                                <form role="form" method="POST" action="" enctype="multipart/form-data" autocomplete="off">

                                <div class="form-group">

                                    <label for="inputslidercaption">Coupon Code *</label>

                                    <input name="coupon_code" type="text" value="<?php echo set_value('coupon_code'); ?>" class="form-control" placeholder="Enter Coupon Code*">

                                    <?php echo form_error('coupon_code','<div class="error">','</div>'); ?>

                                </div>

                                <div class="form-group">

                                    <label for="inputslidercaption">Start Date *</label>

                                    <input name="start_date" type="text" value="<?php echo set_value('start_date'); ?>" class="form-control" placeholder="Enter Start Date*" id="datepick">

                                    <?php echo form_error('start_date','<div class="error">','</div>'); ?>

                                </div>



								<div class="form-group">

                                    <label for="inputslidercaption">End Date *</label>

                                    <input name="end_date" type="text" value="<?php echo set_value('end_date'); ?>" class="form-control" placeholder="Enter End Date*" id="datepick2">

                                    <?php echo form_error('end_date','<div class="error">','</div>'); ?>

                                </div>

                                

                                <div class="form-group">

                                    <label for="inputslidercaption">Redemption *</label>

                                    <select name="redemption" class="form-control">

                                    	<option value="">Select Option</option>

                                    	<option value="one_time" <?php echo set_select('redemption','one_time', ( !empty($data) && $data == "input" ? TRUE : FALSE )); ?>>One Time</option>

                                    	<option value="multiple" <?php echo set_select('redemption','multiple', ( !empty($data) && $data == "input" ? TRUE : FALSE )); ?>>Multiple</option>                                    	

                                    </select>

                                    <?php echo form_error('redemption','<div class="error">','</div>'); ?>

                                </div>

                                

                                <div class="form-group">

                                    <label for="inputslidercaption">New User Coupon *</label>

                                    <select name="new_user_coupon" class="form-control">

                                    	<option value="">Select Option</option>

                                    	<option value="1" <?php echo set_select('new_user_coupon','1', ( !empty($data) && $data == "input" ? TRUE : FALSE )); ?>>Yes</option>

                                    	<option value="0" <?php echo set_select('new_user_coupon','0', ( !empty($data) && $data == "input" ? TRUE : FALSE )); ?>>No </option>                                    	

                                    </select>

                                    <?php echo form_error('new_user_coupon','<div class="error">','</div>'); ?>

                                </div>

                                

                                <div class="form-group">

                                    <label for="inputslidercaption">Min Cart Value *</label>

                                    <input name="min_cart_value" value="<?php echo set_value('min_cart_value'); ?>" type="text" class="form-control" placeholder="Enter Min Cart Value*">

                                    <?php echo form_error('min_cart_value','<div class="error">','</div>'); ?>

                                </div>

                                

                                <div class="form-group">

                                    <label for="inputslidercaption">Max Cart Value *</label>

                                    <input name="max_cart_value" value="<?php echo set_value('max_cart_value'); ?>" type="text" class="form-control" placeholder="Enter Max Cart Value*">

                                    <?php echo form_error('max_cart_value','<div class="error">','</div>'); ?>

                                </div>

                                

                                <div class="form-group">

                                    <label for="inputslidercaption2">Status</label>

                                    <select name="is_active" class="form-control">

                                    	<option value="1">Active</option>

                                    	<option value="0">Inactive</option>                                    	

                                    </select>

                                </div>



								<div class="form-group">

                                    <label for="inputslidercaption">Discount Type *</label>

                                    <select name="dis_type" class="form-control" id="dstype">

                                    	<option value="">Select Option</option>

                                    	<option value="Time" <?php echo set_select('dis_type','Time', ( !empty($data) && $data == "input" ? TRUE : FALSE )); ?>>Time Coupon</option>

                                    	<option value="Discount" <?php echo set_select('dis_type','Discount', ( !empty($data) && $data == "input" ? TRUE : FALSE )); ?>>Discount Coupon</option>

                                    </select>

                                    <?php echo form_error('dis_type','<div class="error">','</div>'); ?>

                                    

                                </div>

                                

                                <div id="time1" style="display: none;">



								<div class="form-group">

                                    <label for="inputslidercaption">Time Addition *</label>

                                    <input name="time_add" value="<?php echo set_value('time_add'); ?>" type="text" class="form-control" placeholder="Enter Time Addition*">

                                    <?php echo form_error('time_add','<div class="error">','</div>'); ?>

                                </div>

                                </div>

                                

                                <div id="discount1" style="display: none;">

                                	

                                <div class="form-group">

                                    <label for="inputslidercaption">Type</label>

                                    <select name="type" class="form-control">

                                    	<option value="">Select Option</option>

                                    	<option value="per" <?php echo set_select('type','per', ( !empty($data) && $data == "input" ? TRUE : FALSE )); ?>>Percentage</option>

                                    	<option value="flat" <?php echo set_select('type','flat', ( !empty($data) && $data == "input" ? TRUE : FALSE )); ?>>Flat</option>                                    	

                                    </select>

                                    

                                </div>



								<div class="form-group">

                                    <label for="inputslidercaption">Discount Amount *</label>

                                    <input name="discount_amount" value="<?php echo set_value('discount_amount'); ?>" type="text" class="form-control" placeholder="Enter Discount Amount*">

                                    <?php echo form_error('discount_amount','<div class="error">','</div>'); ?>

                                </div>

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

    

<script type="text/javascript">



    $("#dstype").on('change', function() {  

        if(this.value == 'time'){

        	

        	$("#time1").show();

            $("#discount1").hide();

        }else{

            $("#discount1").show();

            $("#time1").hide();

        }

    })

        







</script>