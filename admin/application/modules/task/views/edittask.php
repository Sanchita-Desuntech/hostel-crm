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

<?php

// echo '<pre>';
// print_r($alltaskdata_row);
// die;

?>

<section id="main-content">

	<section class="wrapper">

		<!-- page start-->
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
						<h3>Edit Task</h3>
					</header>

					<div class="panel-body">
						<div>
							<?php foreach ($alltaskdata_row as $singledata) {

							?>

								<div class="col-md-8">

									<form role="form" method="POST" action="" autocomplete="off" enctype="multipart/form-data">

										<div class="panel-body">

											<div class="tab-content">

												<div id="home" class="tab-pane fade in active">



													<div class="form-group">

														<label for="email">Task Name</label>

														<input name="task_name" type="text" class="form-control" value="<?php echo $singledata->task_name; ?>" placeholder="Enter Task Name">

														<?php echo form_error('task_name', '<div class="error">', '</div>'); ?>

													</div>
													<div class="form-group">

														<label for="inputslidercaption3">Task Description</label>

														<textarea name="task_desp" class="form-control editor_big" placeholder="Write Task Description"><?php echo $singledata->task_desp; ?></textarea>

													</div>

													<div class="form-group">

														<?php if ($singledata->attach_file != '' || $singledata->attach_file != null) :  ?>
															
															<?php $task_attchments = json_decode($singledata->attach_file, true); ?>
															
															<?php if( !empty($task_attchments) ) : ?>
																<p><strong>Click on show files to view the attach files</strong></p>
															<?php endif ?>
															
															<ul class="list-group">
																<?php foreach($task_attchments as $attachment) : ?>
																	<li class="list-group-item">
																		<a  href="<?php echo base_url() ?>uploads/task/<?php echo $attachment; ?>" target="_blank"><?php echo $attachment; ?></a>
																	</li>
																<?php endforeach ?>
															</ul>
														<?php else : ?>
															<p>No attachment available</p>
														<?php endif ?>

														<div class="clearfix"></div>

														<div class="upload-btn-wrapper" id="uploadWrapper">
															<p class="btn-upload-text">drag & drop files here</p>
															<input type="file" id="fileUpload" name="attach_file[]" multiple="" accept="image/*,.doc,.docx,application/msword*,zip,application/octet-stream,application/zip,application/x-zip,application/x-zip-compressed" />
														</div>
														<div id="nameOfFiles" style="display: none">
															<!-- <h3> <strong> Name Of Files</strong></h3> -->
														</div>
														<input name="prev_link" type="hidden" value='<?php echo $singledata->attach_file ?>' class="form-control" id="hid_class" placeholder="Enter Link Button Slug Link">
														<a href="javascript:void(0)" class="btn btn-danger" style="display: none" id="removeFile" onclick="removeFile()">Remove All</a>
													</div>

													<div class="form-group">

														<label for="inputslidercaption">Task Priority</label>

														<select name="task_priority" class="form-control">
															<option value="">Select...</option>
															<option value="Normal" <?= $singledata->task_priority == 'Normal' ? 'selected' : '' ?>>Normal</option>
															<option value="Urgent" <?= $singledata->task_priority == 'Urgent' ? 'selected' : '' ?>>Urgent</option>
														</select>

														<?php echo form_error('task_priority', '<div class="error">', '</div>'); ?>

													</div>

													<div class="form-group">

														<label for="inputslidercaption">Task By</label>

														<select name="task_by" class="form-control">
															<option value="Portal" <?= $singledata->task_by == 'Portal' ? 'selected' : '' ?>>Portal</option>
															<option value="Email" <?= $singledata->task_by == 'Email' ? 'selected' : '' ?>>Email</option>
															<option value="Phone" <?= $singledata->task_by == 'Phone' ? 'selected' : '' ?>>Phone</option>
															<option value="Chat" <?= $singledata->task_by == 'Chat' ? 'selected' : '' ?>>Chat</option>
														</select>

														<?php echo form_error('task_by', '<div class="error">', '</div>'); ?>

													</div>


													<input name="customer_code" type="hidden" value="<?php echo $singledata->customer_code; ?>">
													<input name="service_name" type="hidden" value="<?php echo $singledata->service_name; ?>">

													<div class="form-group">

														<label for="service_code">Service Name</label>

														<select name="service_code" class="form-control">

															<option value="">Select Service</option>

															<?php foreach ($service as $res_service) { ?>

																<option value=<?php echo $res_service->service_id; ?> <?php if ($singledata->service_code == $res_service->service_id) {
																															echo "selected";
																														} ?>><?php echo $res_service->service_name; ?></option>

															<?php } ?>



														</select>

														<?php echo form_error('service_name', '<div class="error">', '</div>'); ?>

													</div>


													<div class="form-group">

														<label for="email">Consume Time(In Hours) </label>

														<input name="consume_time" type="text" class="form-control" placeholder="Enter Time" value="<?php echo $singledata->consume_time ?>">

														<?php echo form_error('consume_time', '<div class="error">', '</div>'); ?>

													</div>



													<div class="form-group">

														<label for="inputslidercaption">Supervisor Name</label>

														<select name="sup_name" class="form-control">

															<option value="">Select Supervisor</option>

															<?php foreach ($supervisor as $res_supervisor) { ?>

																<option value=<?php echo $res_supervisor->sup_code; ?> <?php if ($singledata->sup_name == $res_supervisor->sup_code) {
																															echo "selected";
																														} ?>><?php echo $res_supervisor->full_name; ?></option>

															<?php } ?>

														</select>

													</div>

													<div class="form-group" style="margin-top: 21px;">
														<label for="inputslidercaption3">Employees</label>
														<div class="clearfix"></div>
														<select class="form-control" name="emp_details[]" id="task_emp" multiple="multiple">
															<?php
																$assigned_employee = json_decode($singledata->emp_details, true) ?? [];
															?>
															<?php foreach ($employee as $ac) : ?>
																<option value="<?php echo $ac->emp_code; ?>" <?= in_array($ac->emp_code, $assigned_employee) ? 'selected' : '' ?>><?php echo $ac->full_name; ?></option>
															<?php endforeach ?>
														</select>

													</div>
												</div>

												<div class="clearfix"></div>

												<div class="form-group">

													<label for="inputslidercaption"><br>Status</label>

													<select name="task_status" class="form-control">
														<option value="">Select Status</option>
														<option value="Open" <?= $singledata->task_status == 'Open' ? 'selected' : '' ?>>Open</option>
														<option value="Follow Up" <?= $singledata->task_status == 'Follow Up' ? 'selected' : '' ?>>Follow Up</option>
														<option value="Response Needed" <?= $singledata->task_status == 'Response Needed' ? 'selected' : '' ?>>Response Needed</option>
														<option value="In Progress" <?= $singledata->task_status == 'In Progress' ? 'selected' : '' ?>>In Progress</option>
														<option value="Pipeline" <?= $singledata->task_status == 'Pipeline' ? 'selected' : '' ?>>Pipeline</option>
														<option value="Recurring" <?= $singledata->task_status == 'Recurring' ? 'selected' : '' ?>>Recurring</option>
													</select>

												</div>
											</div>

										</div>
										<button type="submit" class="btn btn-info">Update Task</button>

								</div>

								
								</form>

						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label for="inputslidercaption">Customer Name</label>
								<input type="text" name="customer_code" class="form-control" value="<?php echo $singledata->full_name; ?>" readonly="readonly" />
							</div>

							<div class="form-group">
								<label for="email">Email</label>
								<input name="email" type="text" class="form-control" placeholder="Enter Email*" value="<?php echo $singledata->email; ?>" readonly="readonly">
							</div>

							<div class="form-group">
								<label for="mobile">Mobile</label>
								<input name="mobile" maxlength="10" type="number" class="form-control" placeholder="Enter Mobile*" value="<?php echo $singledata->mobile; ?>" readonly="readonly">
							</div>

							<div class="form-group">
								<label for="mobile">Time Wallet</label>
								<input name="time_wallet" type="number" class="form-control" placeholder="Enter Time Wallet*" value="<?php echo $singledata->time_wallet; ?>">
							</div>

						</div>

					<?php } ?>

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
	});

	var filesUpload = document.getElementById('fileUpload');
	filesUpload.addEventListener("change", function() {
		//HIDING UPLOAD FILES DIV
		/*var uploadWrapper = document.getElementById('uploadWrapper') ;
		uploadWrapper.style.display = 'none';*/
		//SHOWING NAME OF FILES DIV
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
			/* nameOfFilesDiv.innerHTML = '<span>'+fileName+'</span>';
			console.log("File Name", fileName);*/
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