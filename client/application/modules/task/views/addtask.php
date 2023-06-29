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

                           <h3> Add Task <a href="<?php echo base_url();?>client/task" class="btn btn-danger flotright">Back</a></h3>

                        </header>

                        <div class="panel-body">

                            <div>

                                <form role="form" method="POST" action="" autocomplete="off" enctype="multipart/form-data">

                        			<div class="panel-body">

                                     <div class="tab-content">

                                    <div id="home" class="tab-pane fade in active"> 

                                     	<div class="form-group">

		                                     <label for="inputslidercaption">Customer Name *</label>

		                                     <input name="customer_code" type="text" class="form-control" placeholder="Enter Customer Name*" readonly="readonly" value="<?php echo $customer->full_name; ?>" >

		                                     

		                                     <!--<input type="hidden" name="customer_code" value="<?php echo $_SESSION['user_code'];?>">-->

		                                </div>
		                                
		                                <div class="form-group">

		                                     <label for="inputslidercaption">Task Name *</label>

		                                     <input name="task_name" type="text" class="form-control" placeholder="Enter Task Name *" value="<?php echo set_value('task_name');  ?>" >

		                                </div>

		                                

                                    	<div class="form-group">

		                                    <label for="email">Service Name *</label>

		                                    <select name="service_code" class="form-control">

		                                    	<option value="">Select Service</option>

		                                    	<?php //print_r($res_service);die("lp");

		                                    	 foreach($res_service as $res_ser) { ?>

		                                    	<option value=<?php echo $res_ser->service_id; ?>><?php echo $res_ser->service_name; ?></option>

		                                    	<?php } ?>

		                                    </select>

		                                    <!--<input name="task_name" type="text" class="form-control" placeholder="Write Task Name*" value="<?php echo set_value('task_name'); ?>" >-->

		                                </div>

		                                

		                                <div class="form-group">

		                                    <label for="inputslidercaption3">Task Description</label>

		                                    <textarea name="task_desp" class="form-control editor_big"  placeholder="Write Task Description"><?php echo set_value('task_desp'); ?></textarea>

		                                </div>

		                                

		                                <div class="form-group">

		                                    <label for="inputslidercaption">Attach File</label>

		                                     <input type="file" name="attach_file" accept="image/*,.doc,.docx,application/msword*" />
		                                </div>

		                                

		                                <div class="form-group">

		                                     <label for="inputslidercaption">Task Priority</label>

		                                     <select name="task_priority" class="form-control">

		                                         <option value="Normal">Normal</option>

		                                         <option value="Low Priority">Low Priority</option>

		                                         <option value="High Priority">High Priority</option>

		                                     </select>

		                                     <?php echo form_error('task_priority', '<div class="error">', '</div>'); ?>

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