<style>
	.upload-btn-wrapper {
	  position: relative;
	  overflow: hidden;
	  display: inline-block;
	}
.btn-upload-text {
  border: 2px dotted gray;
  color: gray;
  background-color: white;
  padding: 62px 168px;
  border-radius: 8px;
  font-size: 20px;
  font-weight: bold;
}

.upload-btn-wrapper input[type=file] {
  font-size: 100px;
  position: absolute;
  left: 0;
  top: 0;
  opacity: 0;
}	
</style>
<section id="main-content">

        <section class="wrapper">

        <!-- page start-->



        <div class="row">

           <div class="col-lg-12">

           <?php if($this->session->flashdata('success_msg')!="") { ?>

        	<div class="clearfix"></div>

                    <div class="alert alert-success">

                      <strong>Success!</strong> <?php echo $this->session->flashdata('success_msg');?>

                    </div>

                      <?php } ?>

		    <?php if($this->session->flashdata('err_msg')!="") { ?>

			<div class="clearfix"></div>

				<div class="alert alert-danger">

				  <strong>Danger!</strong> <?php echo $this->session->flashdata('err_msg');?>

				</div>

				  <?php } ?>

                    <section class="panel">

                        <header class="panel-heading">

                           <h3> Task Details <a href="<?php echo base_url();?>admin/task/task" class="btn btn-danger flotright">Back</a></h3>

                        </header>

                        <div class="panel-body">

                            <div>

                            

                            <?php foreach($alltask_row as $singledata) {
                          /*  echo "<pre>";
                            print_r($singledata);
                            print_r($service);
                            ;die("kol"); */
                            ?>

                            <div class="col-md-8">

                    

                        			<div class="panel-body">

                                     <div class="tab-content">

                                    <div id="home" class="tab-pane fade in active">

                                    

                                    	<div class="form-group">

		                                    <label for="email">Task Name</label>

		                                    <input name="task_name" disabled="" type="text" class="form-control" value="<?php echo $singledata->task_name; ?>" placeholder="Enter Task Name">

		                                    <?php echo form_error('task_name', '<div class="error">', '</div>'); ?>

		                                </div>
		                                 <div class="form-group">

		                                    <label for="inputslidercaption3">Task Description</label>

		                                    <textarea name="task_desp" disabled="" class="form-control "  placeholder="Write Task Description"><?php echo $singledata->task_desp; ?></textarea>

		                                </div>    
										
		                               

		                                

		                                <div class="form-group">

		                                     <label for="inputslidercaption">Task Priority</label>

		                                     <select name="task_priority" disabled="" class="form-control">

		                                         <option value="Normal" <?php if($singledata->task_priority == 'Normal') { echo ("selected"); } ?>>Normal</option>

		                                         <option value="Low Priority" <?php if($singledata->task_priority == 'Low Priority') { echo ("selected"); } ?>>Low Priority</option>

		                                         <option value="High Priority" <?php if($singledata->task_priority == 'High Priority') { echo ("selected"); } ?>>High Priority</option>

		                                     </select>

		                                     <?php echo form_error('task_priority', '<div class="error">', '</div>'); ?>

		                                </div>
                                    	     <input name="customer_code" type="hidden"  value="<?php echo $singledata->customer_code; ?>">                     
                                    	     <input name="service_name" type="hidden"  value="<?php echo $singledata->service_name; ?>">                     

                                		<div class="form-group">

		                                    <label for="service_code">Service Name</label>

		                                    <select name="service_code" disabled="" class="form-control">

		                                         <option value="" >Select Service</option>

		                                         <?php foreach($service as $res_service) { ?>

													<option value=<?php echo $res_service['service_id'];?> <?php if($singledata->service_id == $res_service['service_id']){echo "selected";}?>><?php echo $res_service['service_name'];?></option>

												<?php }?>  

		                                    </select>

		                                    <?php echo form_error('service_name', '<div class="error">', '</div>'); ?>

		                                </div>
<!--
                                		<div class="form-group">

		                                    <label for="email">Expected Time *</label>

		                                    <input name="task_hours" type="number" class="form-control" placeholder="Enter Task Hour" value="<?php echo $singledata->task_hours ?>">

		                                    <?php echo form_error('task_hours', '<div class="error">', '</div>'); ?>

		                                </div>-->

		                                

		                                <div class="form-group">

		                                    <label for="email">Consume Time(Hour) </label>

		                                    <input disabled="" name="consume_time" type="text" class="form-control" placeholder="Enter Time" value="<?php echo $singledata->consume_time ?>">

		                                    <?php echo form_error('consume_time', '<div class="error">', '</div>'); ?>

		                                </div>

		                                

		                                <div class="form-group">

		                                     <label for="inputslidercaption">Supervisor Name</label>

		                                     <select name="sup_name" disabled="" class="form-control">

		                                      

		                                         <?php foreach($supervisor as $res_supervisor){?>

													<option value=<?php echo $res_supervisor['sup_code'];?> <?php if($singledata->sup_name==$res_supervisor['sup_code']){echo "selected";}?>><?php echo $res_supervisor['full_name'];?></option>

												<?php }?>  

		                                     </select>

		                                </div>

		                                

		                                <div class="form-group">



											<label for="inputslidercaption3"><h4>Employee</h4></label>

											<div class="clearfix"></div>



											<?php foreach($employee as $ac){

												$checked_employee=json_decode($singledata->emp_details);

												//print_r($singledata);die();

												if (in_array($ac['emp_code'], $checked_employee))

												{

												$checked="checked";

													  }

												else

												  {

												  $checked="";

													  }?>

											<div class="col-md-3">



		                                    <div class="checker">



		                                    	<input type="checkbox" disabled name="emp_details[]" value="<?php echo $ac['emp_code'];?>" <?php echo $checked;?>>

		                                    	<label for="uniq-label"><?php echo $ac['full_name'];?></label>

											</div>

											</div>



											<?php } ?>



		                                </div>
		                                
		                                

                                		<div class="clearfix"></div>

                                 		<div class="form-group">

		                                     <label for="inputslidercaption"><br>Status</label>

		                                     <select name="task_status" disabled="" class="form-control">
												<option value="">Select Status</option>
												<option value="Not Assigned" <?php if($singledata->task_status=='Not Assigned'){echo "selected";}?>Not Assigned</option>
														
		                                         <option value="Inprogress" <?php if($singledata->task_status==Inprogress){echo "selected";}?>>Inprogress</option>

		                                         <option value="Hold" <?php if($singledata->task_status==Hold){echo "selected";}?>>Hold</option>

		                                         <option value="Completed" <?php if($singledata->task_status==Completed){echo "selected";}?>>Completed</option>

		                                     </select>

		                                </div>

                                

                               

                                	</div>

                                    </div>

                            

                            



                        </div>

                         		

                        		

							</div>

							

							<div class="col-md-4">

								<div class="form-group">

		                           <label for="inputslidercaption">Customer Name</label>

		                           <input type="text" name="customer_code" class="form-control" value="<?php echo $singledata->full_name; ?>" readonly="readonly"/>

		                        </div>

		                        

		                        <div class="form-group">

		                           <label for="email">Email</label>

		                        	<input name="email" type="text" class="form-control" placeholder="Enter Email*" value="<?php echo $singledata->email;?>" readonly="readonly">

		                        </div>

		                        

                                <div class="form-group">

		                           <label for="mobile">Mobile</label>

		                            <input name="mobile" maxlength="10" type="number" class="form-control" placeholder="Enter Mobile*" value="<?php echo $singledata->mobile;?>" readonly="readonly">

		                        </div>

		                        

		                        <div class="form-group">

		                           <label for="mobile">Time Wallet</label>

		                           <input name="time_wallet" disabled="" type="number" class="form-control" placeholder="Enter Time Wallet*" value="<?php echo $singledata->time_wallet; ?>">

		                        </div>
		                        <div class="form-group">
									<?php if($singledata->attach_file != '' || $singledata->attach_file != null){?>
		                     <p><strong>Click on show files to view the attach files</strong>
		                    
		                     <?php 
		                     $attach_file = json_decode($singledata->attach_file);
		                      foreach($attach_file as $file ){ ?>
		                      	<a href="<?php echo base_url()?>uploads/task/<?php echo $file; ?>"style="font-size: 16px; color: #84e25c; font-weight: 700" target="_blank"><?php echo $file; ?></a><br>
		                   <?php  } ?> 
		                      
		                      </p>              
									<?php }else{?>
									<p>No attachment available</p>
									<?php } ?>
		                                    <div class="clearfix"></div>
		                                   <!-- <label for="fileUpload">Attach File</label>-->
		                                </div>

							</div>

							<?php } ?>

							

                            </div>



                        </div>

                    </section>



            </div>

        </div>

        <!-- page end-->

        </section>

    </section>
    
    <script>
    var filesUpload = document.getElementById('fileUpload');
    	filesUpload.addEventListener("change", function () {
		//HIDING UPLOAD FILES DIV
		/*var uploadWrapper = document.getElementById('uploadWrapper') ;
		uploadWrapper.style.display = 'none';*/
		//SHOWING NAME OF FILES DIV
		var nameOfFilesDiv = document.getElementById('nameOfFiles');
		nameOfFilesDiv.style.display = 'Block';
		
		//LOOPING THROUGH FILES 
		for(i = 0;i < filesUpload.files.length; i++){
		    var fileName  =	filesUpload.files[i].name;
		    var sl = Number(i)+Number(1);
		    //GETTING THE FILES NAME DIV
		    var nameOfFilesDiv = document.getElementById('nameOfFiles');
		    //CREATING A P TAG TO ATTACH NAMES
		    var span = document.createElement('p');
		    span.innerHTML = '<strong>' + fileName +'</strong>';
		    span.insertBefore = '</br>';
		    nameOfFilesDiv.appendChild(span);
		    //SHOWING REMOVE FILES BUTTON
			var removeFile = document.getElementById('removeFile');
			removeFile.style.display = 'Block';
			removeFile.style.width = '20%';
		   /* nameOfFilesDiv.innerHTML = '<span>'+fileName+'</span>';
			console.log("File Name", fileName);*/
		}
	});
	function removeFile(){
		//HIDING UPLOAD FILES DIV
		var uploadWrapper = document.getElementById('uploadWrapper') ;
		uploadWrapper.style.display = 'block';
		//HIDING FILES NAME DIV
		var nameOfFilesDiv = document.getElementById('nameOfFiles');
		nameOfFilesDiv.style.display = 'none';
		nameOfFilesDiv.innerHTML = '';
		//HIDING REMOVE FILE BUTTON
		var removeFile = document.getElementById('removeFile');
		removeFile.style.display = 'none';
		var filesUpload = document.getElementById('fileUpload');
		filesUpload.value = '';
	}
    </script>