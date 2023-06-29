<section id="main-content">

	<section class="wrapper">

		<!-- page start-->
		<div class="row">

			<div class="col-lg-12">

				<?php if ($this->session->flashdata('success_msg') != "") { ?>

					<div class="clearfix"></div>

					<div class="alert alert-success">

						<strong>Success!</strong> <?php $this->session->flashdata('success_msg'); ?>

					</div>

				<?php } ?>

				<?php if ($this->session->flashdata('err_msg') != "") { ?>

					<div class="clearfix"></div>

					<div class="alert alert-danger">

						<strong>Danger!</strong> <?= $this->session->flashdata('err_msg'); ?>

					</div>

				<?php } ?>

				<section class="panel">

					<header class="panel-heading">

						<div class="row">
							<div class="col-md-6">
								<h3 class="float-left">Add Employee</h3>
							</div>
							<div class="col-md-6">
								<a href="<?php echo base_url(); ?>admin/employee" class="btn btn-danger flotright">Back</a>
							</div>
						</div>

					</header>

					<div class="panel-body">

						<div>

							<form role="form" method="POST" action="" autocomplete="off" enctype="multipart/form-data" id="c_form">

								<div class="panel-body">

									<div class="tab-content">

										<div id="home" class="tab-pane fade in active">

											<div class="form-group">

												<label for="full_name">Name*</label>

												<input name="full_name" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))" required value="<?php echo set_value('full_name'); ?>" type="text" class="form-control" placeholder="Enter Name*">

												<?php echo form_error('full_name', '<div class="error">', '</div>'); ?>

											</div>
											
											<div class="form-group">

												<label for="email">Password*</label>

												<input name="password" autocomplete="new-password" required value="<?php echo set_value('password'); ?>" type="password" class="form-control" placeholder="Enter Password*">

												<?php echo form_error('password', '<div class="error">', '</div>'); ?>

											</div>

											<div class="form-group">

												<label for="mobile">Mobile*</label>

												<input name="mobile" required maxlength="10" type="text" class="form-control" placeholder="Enter Mobile*" value="<?php echo set_value('mobile'); ?>">

												<?php echo form_error('mobile', '<div class="error">', '</div>'); ?>

											</div>


											<div class="form-group">
												<label for="mobile">Address*</label>
												<textarea name="address" required id="address" class="form-control" placeholder="Enter Address*" cols="30" rows="10"><?php echo set_value('address'); ?></textarea>
												<?php echo form_error('address', '<div class="error">', '</div>'); ?>

											</div>

											<div class="form-group">
												<label for="inputslidercaption">Profile Photo</label>
												<input type="file" name="profile_photo" accept="image/*" />
												<p class="help-block" style="color:red;">Please Select Only Image.</p>
											</div>

											<div class="form-group">

												<label for="inputslidercaption3">
													<h4>Permissions</h4>
												</label>

												<div class="clearfix"></div>

													<?php foreach($system_module_permissions as $module) : ?>
														<div class="col-md-3" style="border-bottom: 1px solid; height: 160px;">
															
															<p style="margin-top: 13px;"><?= $module->name ?></p>

															<?php foreach($module->actions as $action) : ?>
																<div class="checker">
																	<input type="checkbox" name="module_actions[]" value="<?= $action['action_id'] ?>">
																	<label for="uniq-label"><?= $action['action_name'] ?></label>
																</div>
															<?php endforeach ?>
														</div>
													<?php endforeach ?>

												<div class="clearfix"></div>
											</div>

											<div class="form-group">
												<label for="inputslidercaption">Status</label>
												<select name="status" class="form-control">
													<option value="1">Active</option>
													<option value="0">Inactive</option>
												</select>
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



<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
<script>
	$(document).ready(function() {
		$("#c_form").validate({
			rules: {
				mobile: {
					required: true,
					number: true,
					// matches: "[0-9]+", // <-- no such method called "matches"!
					minlength: 10,
					maxlength: 10
				}
			},
			messages: {
				mobile: {
					required: "Mobile no can not be blank",
				},
			}

		});

	});
</script>