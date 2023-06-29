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
				<?php echo validation_errors(); ?>

				<section class="panel">
					<header class="panel-heading">
						<div class="row">
							<div class="col-md-6">
								<h3>View Task</h3>
							</div>
							<div class="col-md-6">
								<a href="<?php echo base_url(); ?>admin/task" class="btn btn-danger flotright">Back</a>
							</div>
						</div>
					</header>

					<div class="panel-body">

						<div>

							<?php foreach ($alldata_row as $singledata) { ?>


								<div class="panel-body">

									<div class="tab-content">
										<div class="col-md-6">
											<h2><strong>Task Details</strong></h2>
											<div id="home" class="tab-pane fade in active">



												<div class="form-group">

													<label for="email">Task Name</label><br>

													<?php echo $singledata->task_name; ?>

												</div>



												<div class="form-group">

													<label for="inputslidercaption3">Task Description</label><br>

													<?php echo $singledata->task_desp; ?>

												</div>


												<div class="form-group">

													<label for="inputslidercaption">Task Priority</label><br>
													<?php echo $singledata->task_priority; ?>

												</div>
												<?php if ($singledata->attach_file != '' || $singledata->attach_file != null) { ?>
													<div class="form-group">
														<label for="inputslidercaption">Files</label><br>
														Attached File: <a target="_blank" href="<?php echo base_url(); ?>uploads/task/<?php echo $singledata->attach_file; ?>">View</a>

													</div>
												<?php } ?>
											</div>
										</div>
										<div class="col-md-6">
											<h2><strong>Customer Details</strong></h2>
											<div id="home" class="tab-pane fade in active" style="padding-left: 2%">
												<div class="form-group">
													<label for="inputslidercaption3">Customer Name</label><br>
													<?php echo $singledata->full_name; ?>
												</div>
												<div class="form-group">
													<label for="inputslidercaption3">Customer Time Balance</label><br>
													<?php echo $singledata->time_balance; ?>
												</div>
												<div class="form-group" id="charge">
													<label for="inputslidercaption3">Customer Customer?</label><br>
													<a href="javascript:void(0)" id="charge_customer" class="btn btn-sm btn-primary">Click Here</a>
												</div>
												<div class="form-group" id="charge_sec" style="display: none">
													<div class="row">

														<form id="charge_form" action="" method="post">
															<div class="col-lg-8">
																<label for="inputslidercaption3">Customer Customer</label><br>
																<input type="text" class="form-control" value="" />
															</div>
															<div class="col-lg-4">
																<a href="javascript:void(0)" id="customer_charge" class="btn btn-sm btn-primary" style="margin-top: 23px">Charge</a>
															</div>
														</form>

													</div>
												</div>



											</div>
										</div>
									</div>
								</div>

								<div class="col-md-12" id="chatSection">
									<h2><strong>Conversation</strong></h2>
									<!-- DIRECT CHAT -->
									<div class="box box-warning direct-chat direct-chat-primary">
										<!-- <div class="box-header with-border">
						                  <h3 class="box-title" id="ReciverName_txt"><?= $chatTitle; ?></h3>

						                  <div class="box-tools pull-right">
						                    
						                  </div>
						                </div> -->
										<!-- /.box-header -->
										<div class="box-body">
											<?php foreach ($allmsg_row as $res_msg) {

											?>
												<!-- Conversations are loaded here -->
												<div class="direct-chat-messages" id="content">
													<?php $receiver_id =  $res_msg['receiver_user_id']; ?>
													<?php $sender_id =  $res_msg['send_user_id']; ?>
													<?php $current_my_code = $this->session->userdata('user_code'); ?>
													<?php if ($sender_id == $current_my_code) { ?>
														<div class="direct-chat-msg pull-right col-lg-10" style="background:#c6fac0; margin-bottom: 15px; padding: 2%">
															<div class="col-lg-10">


																<div class="direct-chat-info pull-right clearfix">

																	<span class="direct-chat-text"> <?php echo $res_msg['message']; ?></br>

																	</span>
																	<?php if (!empty($res_msg['attach_file'])) { ?>
																		<p>
																			Attached File: <a href="<?php echo base_url(); ?>uploads/message_attach/<?php echo $res_msg['attach_file']; ?>">View</a></p>
																	<?php } else { ?>
																		<p></p>
																	<?php } ?>
																	<span class="direct-chat-timestamp pull-right"><?php echo $res_msg['currently_date']; ?> <?php echo $res_msg['currently_time']; ?></span>
																</div>

															</div>
															<div class="col-lg-2">
																<img class="direct-chat-img" src="<?php echo base_url(); ?>uploads/users/profile_photo/<?php echo $res_msg['user_photo']; ?>" alt="Client 1 xyz" width="50;" style="border-radius: 50%;height: 50%;"></br>
																<span class="direct-chat-name"><?php echo $res_msg['user_name']; ?></span>
															</div>

														</div>
													<?php } else { ?>
														<div class="direct-chat-msg pull-left col-lg-10" style="background: #ffdfdf; margin-bottom: 15px; padding: 2%">
															<div class="col-lg-2">
																<img class="direct-chat-img" src="<?php echo base_url(); ?>uploads/users/profile_photo/<?php echo $res_msg['user_photo']; ?>" alt="Client 1 xyz" width="50" style="border-radius: 50%;height: 50%;"></br>
																<span class="direct-chat-name pull-left"><?php echo $res_msg['user_name']; ?></span>
															</div>
															<div class="col-lg-10">
																<div class="direct-chat-info clearfix">
																	<span class="direct-chat-text"> <?php echo $res_msg['message']; ?></span></br>
																	<?php if (!empty($res_msg['attach_file'])) { ?>
																		<p>
																			Attached File: <a href="<?php echo base_url(); ?>uploads/message_attach/<?php echo $res_msg['attach_file']; ?>">View</a></p>
																	<?php } else { ?>
																		<p></p>
																	<?php } ?>
																	<span class="direct-chat-timestamp pull-left"><?php echo $res_msg['currently_date']; ?> <?php echo $res_msg['currently_time']; ?></span>

																</div>
															</div>

														</div>
													<?php } ?>


												<?php  } ?>
												<!--/.direct-chat-messages-->

												</div>
												<div class="clearfix"></div>
												<!-- /.box-body -->
												<div class="box-footer">
													<form role="form" id="contactForm" method="POST" action="<?php echo base_url(); ?>admin/task/msgsend" enctype="multipart/form-data">
														<div class="input-group">
															<input type="hidden" name="send_user_id" id="send_user_id" value="AD001">
															<input type="hidden" id="task_code" name="task_code" value="<?php echo $singledata->task_id; ?>">
															<input type="hidden" name="receiver_user_id" id="receiver_user_id" value="<?php echo $singledata->customer_code; ?>">
															<input type="hidden" name="user_email" value="<?php echo $singledata->user_email; ?>">
															<textarea name="message" class="form-control editor_small" placeholder="Write Message"><?php echo set_value('message'); ?></textarea>
															<input type="file" name="attach_file" accept="image/*,.doc,.zip,.docx,application/msword*" class="upload_attachmentfile" />
														</div><br>

														<button type="submit" class="btn btn-success btn-flat btnSend" id="nav_down">Send</button>
													</form>
												</div>

										</div>
										<!-- /.box-footer-->
									</div>
									<!--/.direct-chat -->
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
	var charge_customer = document.getElementById("charge_customer");
	charge_customer.addEventListener('click', charge_section);

	function charge_section() {
		document.getElementById('charge').style.display = 'none';
		document.getElementById('charge_sec').style.display = 'block';
	}
</script>