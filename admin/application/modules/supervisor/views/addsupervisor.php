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

				<?php if ($this->session->flashdata('error_msg') != "") { ?>

					<div class="clearfix"></div>

					<div class="alert alert-danger">

						<strong>Danger!</strong> <?php echo $this->session->flashdata('error_msg'); ?>

					</div>

				<?php } ?>

				<section class="panel">

					<header class="panel-heading">

						<div class="row">
							<div class="col-md-6">
								<h3>Add Supervisor</h3>
							</div>
							<div class="col-md-6">
								<a href="<?php echo base_url(); ?>admin/supervisor" class="btn btn-danger flotright">Back</a
							</div>
						</div>
					</header>

					<div class="panel-body">

						<div>

							<form role="form" method="POST" id="s_form" action="" autocomplete="off" enctype="multipart/form-data">

								<div class="panel-body">

									<div class="tab-content">

										<div id="home" class="tab-pane fade in active">

											<div class="form-group">

												<label for="full_name">Name*</label>

												<input name="full_name" required onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))" type="text" class="form-control" placeholder="Enter Name*" value="<?php echo set_value('full_name'); ?>">

												<?php echo form_error('full_name', '<div class="error">', '</div>'); ?>

											</div>

											<div class="form-group">

												<label for="email">Email*</label>

												<input name="email" type="email" required class="form-control" placeholder="Enter Email*" value="<?php echo set_value('email'); ?>">

												<?php echo form_error('email', '<div class="error">', '</div>'); ?>

											</div>

											<div class="form-group">

												<label for="email">Password*</label>

												<input name="password" required autocomplete="new-password" type="password" class="form-control" placeholder="Enter Password*" value="<?php echo set_value('password'); ?>">

												<?php echo form_error('password', '<div class="error">', '</div>'); ?>

											</div>

											<div class="form-group">

												<label for="mobile">Mobile*</label>

												<input name="mobile" id="mobile" maxlength="10" type="text" class="form-control" placeholder="Enter Mobile*" value="<?php echo set_value('mobile'); ?>">

												<?php echo form_error('mobile', '<div class="error">', '</div>'); ?>

											</div>

											<div class="form-group">

												<label for="inputslidercaption">Profile Photo</label>

												<input type="file" name="profile_photo" accept="image/*" />

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

								<div class="panel-footer"><button type="submit" class="btn btn-info">Add</button></div>

							</form>

						</div>

					</div>

				</section>

			</div>

		</div>
	</section>
</section>

<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>

<script>
	$(document).ready(function() {
		$("#s_form").validate({
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