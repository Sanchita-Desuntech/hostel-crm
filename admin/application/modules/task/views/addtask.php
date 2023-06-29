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
		<div class="row">
			<div class="col-lg-12">
				<?php if ($this->session->flashdata('success_msg') != "") { ?>
					<div class="clearfix"></div>
					<div class="alert alert-success">
						<strong>Success!</strong> <?php echo $this->session->flashdata('success_msg'); ?>
					</div>

				<?php } ?>

				<?php if ($this->session->flashdata('err_msg') != "") { ?>

					<div class="clearfix"></div>

					<div class="alert alert-danger">

						<strong>Danger!</strong> <?php echo $this->session->flashdata('err_msg'); ?>

					</div>

				<?php } ?>

				<section class="panel">
					<header class="panel-heading">
						<div class="row">
							<div class="col-md-6">
								<h3>Add Task</h3>
							</div>
							<div class="col-md-6">
								<a href="<?php echo base_url(); ?>admin/task" class="btn btn-danger flotright">Back</a>
							</div>
						</div>
					</header>

					<div class="panel-body">
						<div>
							<form role="form" method="POST" action="" autocomplete="off" enctype="multipart/form-data">
								<div class="panel-body">
									<div class="tab-content">
										<div id="home" class="tab-pane fade in active">
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label for="task name">Task Name*</label>
														<input name="task_name" type="text" class="form-control" placeholder="Enter Task Name*" value="<?php echo set_value('task_name'); ?>">
														<?php echo form_error('task_name', '<div class="error">', '</div>'); ?>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="inputslidercaption">Task Priority</label>
														<select name="task_priority" class="form-control">
															<option value="">Select...</option>
															<option value="Normal">Normal</option>
															<option value="Urgent">Urgent</option>
														</select>
														<?php echo form_error('task_priority', '<div class="error">', '</div>'); ?>
													</div>
												</div>
											</div>

											<div class="form-group">
												<label for="inputslidercaption3">Task Description</label>
												<textarea name="task_desp" class="form-control editor_big" placeholder="Write Task Description"><?php echo set_value('task_desp'); ?></textarea>
											</div>

											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label for="service_code">Service Name</label>
														<select name="service_code" class="form-control">
															<option value="">Select Service</option>
															<?php foreach ($service as $res_service) { ?>
																<option value=<?php echo $res_service->service_id; ?>><?php echo $res_service->service_name; ?></option>
															<?php } ?>
														</select>
													</div>

												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="consume_time">Consume Time(In Hours)*</label>
														<input name="consume_time" type="text" class="form-control" placeholder="Enter Time*" value="<?php echo set_value('consume_time'); ?>">
														<?php echo form_error('consume_time', '<div class="error">', '</div>'); ?>
													</div>
												</div>
											</div>

											
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label for="inputslidercaption">Supervisor Name *</label>
														<select name="sup_name" class="form-control">
															<option value="">Select Supervisor</option>
															<?php foreach ($supervisor as $res_supervisor) { ?>
																<option value=<?php echo $res_supervisor->sup_code; ?>><?php echo $res_supervisor->full_name; ?></option>
															<?php } ?>
														</select>
														<?php echo form_error('sup_name', '<div class="error">', '</div>'); ?>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="inputslidercaption">Customer Name *</label>
														<select name="customer_code" class="form-control">
															<option value="">Select Customer</option>
															<?php
															foreach ($customer as $res_customer) { ?>
																<option value=<?php echo $res_customer->cust_code; ?>><?php echo $res_customer->full_name; ?></option>
															<?php } ?>
														</select>
														<?php echo form_error('customer_code', '<div class="error">', '</div>'); ?>
													</div>
												</div>
											</div>

											
											<div class="row">
												<div class="col-md-6">
													<div class="form-group" style="margin-top: 21px;">
														<label for="inputslidercaption3">Employees</label>
														<div class="clearfix"></div>
														<select class="form-control" name="emp_details[]" id="task_emp" multiple="multiple">
															<?php foreach ($employee as $ac) : ?>
																<option value="<?php echo $ac->emp_code; ?>"><?php echo $ac->full_name; ?></option>
															<?php endforeach ?>
														</select>
														
														</div>
													</div>
												<div class="col-md-6">
													<div class="form-group">
														<label><br>Status</label>
														<select name="task_status" class="form-control">
															<option value="">Select Status</option>
															<option value="Open">Open</option>
															<option value="Follow Up">Follow Up</option>
															<option value="Response Needed">Response Needed</option>
															<option value="In Progress">In Progress</option>
															<option value="Pipeline">Pipeline</option>
															<option value="Recurring">Recurring</option>
														</select>
														<?php echo form_error('task_status', '<div class="error">', '</div>'); ?>
													</div>
												</div>
											</div>

											
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label>Attachments</label>
														<br/>
														<div class="upload-btn-wrapper" id="uploadWrapper">
															<p class="btn-upload-text">drag & drop files here</p>
															<input type="file" id="fileUpload" name="attach_file[]" multiple="" accept="image/*,.doc,.docx,application/msword*,zip,application/octet-stream,application/zip,application/x-zip,application/x-zip-compressed" />
														</div>
														<div id="nameOfFiles" style="display: none">
															<!-- <small><strong> Name Of Files</strong></small> -->
														</div>
														<a href="javascript:void(0)" class="btn btn-danger" style="display: none" id="removeFile" onclick="removeFile()">Remove All</a>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label><br>Task By</label>
														<select name="task_by" class="form-control">
															<option value="Portal">Portal</option>
															<option value="Email">Email</option>
															<option value="Phone">Phone</option>
															<option value="Chat">Chat</option>
														</select>
													</div>
												</div>
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
	</section>

</section>

<script>

	window.addEventListener("load", () => {
		$('#task_emp').select2({
			placeholder: 'Select employees'
		});
	})

	var filesUpload = document.getElementById('fileUpload');
	filesUpload.addEventListener("change", function() {
		var nameOfFilesDiv = document.getElementById('nameOfFiles');
		nameOfFilesDiv.style.display = 'Block';

		//LOOPING THROUGH FILES 
		for (i = 0; i < filesUpload.files.length; i++) {
			var fileName = filesUpload.files[i].name;
			var sl = Number(i) + Number(1);
			//GETTING THE FILES NAME DIV
			var nameOfFilesDiv = document.getElementById('nameOfFiles');
			//CREATING A P TAG TO ATTACH NAMES
			var span = document.createElement('p');
			span.innerHTML = '<strong>' + fileName + '</strong>';
			span.insertBefore = '</br>';
			nameOfFilesDiv.appendChild(span);
			//SHOWING REMOVE FILES BUTTON
			var removeFile = document.getElementById('removeFile');
			removeFile.style.display = 'Block';
			removeFile.style.width = '20%';
		}
	});

	function removeFile() {
		//HIDING UPLOAD FILES DIV
		var uploadWrapper = document.getElementById('uploadWrapper');
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