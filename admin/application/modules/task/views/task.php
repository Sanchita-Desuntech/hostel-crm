<style>
	.advanced-dialog {
		width: 50%;
		min-height: 350px;
		border: 1px solid #eee0e0;
		margin: 0 auto;
		top: 23%;
		border: 1px solid #eee0e0;
		position: absolute;
	}
</style>

<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        <h4>Task Management</h4>
                    </header>
                    <div class="panel-body" style="display: block;">
                        <?php if ($this->session->flashdata('success_msg') != "") { ?>
                            <div class="clearfix"></div>
                            <div class="alert alert-success">
                                <strong>Success!</strong> <?php echo $this->session->flashdata('success_msg'); ?>
                            </div>
                        <?php } ?>

                        <?php if ($this->session->flashdata('err_msg') != "") { ?>
                            <div class="clearfix"></div>
                            <div class="alert alert-danger">
                                <strong>Sorry!</strong> <?= $this->session->flashdata('err_msg'); ?>
                            </div>
                        <?php } ?>
                        <div class="adv-table editable-table ">
                            <div class="clearfix">

                                <?php if( has_user_permission('add.task management') ) : ?>
                                    <div class="btn-group">
                                        <a id="editable-sample_new" class="btn btn-primary" href="<?php echo base_url() ?>admin/task/addtask">
                                            Add New <i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                <?php endif ?>

                                <div class="btn-group pull-right">
									<button class="btn btn-success btn-sm" id="advancedSearch">Advanced Search</button>
								</div>
                                <div class="space15"></div>
                                <table class="table table-striped table-bordered nowrap" id="taskTable" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>Task ID</th>
                                            <th>Task Name</th>
                                            <th>Service Name</th>
                                            <th>Supervisor Name</th>
                                            <th>Consume Time</th>
                                            <th>Customer Name</th>
                                            <th>Task Status</th>
                                            <th>Task Priority</th>
                                            <th>Created On</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                </section>
            </div>
        </div>
    </section>
</section>


<dialog class="advanced-dialog" id="advancedSearchModal">

	<div class="">
		<div class="col-md-6">
			<h4 style="margin-bottom: 30px;">Advanced Search</h4>
		</div>
		<div class="col-md-6">
			<button class="btn btn-primary btn-sm pull-right" id="clearSearch">Clear Search</button>
		</div>
	</div>
	<div class="clearfix"></div>

	<hr />
	<div>
		<div class="col-md-6">
			<label>Task ID</label>
			<input type="text" id="task_id" class="form-control" />
		</div>
		<div class="col-md-6">
			<label>Task Name</label>
			<input type="text" id="task_name" class="form-control" />
		</div>
	</div>
	<div class="clearfix"></div>
	<div style="margin-top: 30px;">
		<div class="col-md-6">
			<label>From</label>
			<input type="date" id="task_from" class="form-control" />
		</div>
		<div class="col-md-6">
			<label>To</label>
			<input type="date" id="task_to" class="form-control" />
		</div>
	</div>
	<div class="clearfix"></div>

	<div style="margin-top: 30px;">
		<div class="col-md-6">
			<label>Taks Status</label>
            <select class="form-control" id="task_status">
                <option value="">Select...</option>
                <option value="Open">Open</option>
                <option value="Follow Up">Follow Up</option>
                <option value="Response Needed">Response Needed</option>
                <option value="In Progress">In Progress</option>
                <option value="Pipeline">Pipeline</option>
                <option value="Recurring">Recurring</option>
            </select>
		</div>
		<div class="col-md-6">
            <label>Taks Priority</label>
            <select class="form-control" id="task_priority">
                <option value="">Select...</option>
                <option value="Normal">Normal</option>
                <option value="Urgent">Urgent</option>
            </select>
		</div>
	</div>

	<div class="clearfix"></div>

	<hr />

	<div style="margin-top: 30px;">
		<div class="col-md-6">
			<button class="btn btn-danger btn-sm" id="closeModalBtn">Cancel</button>
		</div>
		<div class="col-md-6">
			<button class="btn btn-info btn-sm pull-right" id="applyFilter">Apply Filter</button>
		</div>
	</div>
	<div class="clearfix"></div>
</dialog>


<script type="text/javascript">
    window.addEventListener("load", (e) => {
        let table = $("#taskTable").DataTable({
            dom: 'rt<"bottom"p>',
            processing: true,
            serverSide: true,
            ajax: "<?= base_url('admin/task/datatable') ?>",
            lengthChange: true,
            columns: [{
                    "data": "task_id"
                },
                {
                    "data": "task_name"
                },
                {
                    "data": "ser_name"
                },
                {
                    "data": "sup_name"
                },
                {
                    "data": "consume_time"
                },
                {
                    "data": "cus_name"
                },
                {
                    "data": "task_status"
                },
                {
                    "data": "task_priority"
                },
                {
                    "data": "created_on"
                },
                {
                    "data": "action",
                    "orderable": false,
                    "searchable": false
                }
            ]
        });

        const modal = document.getElementById("advancedSearchModal");

        $("#applyFilter").click(function(e) {

            var taskId = $('#task_id').val().trim();
            var taskName = $('#task_name').val().trim();
            var taskFrom = $('#task_from').val().trim();
            var taksTo = $('#task_to').val().trim();
            var taskStatus = $('#task_status').val().trim();
            var taskPriority = $('#task_priority').val().trim();


            const searchParms = new URLSearchParams({
                taskId: taskId,
                taskName: taskName,
                taskFrom: taskFrom,
                taksTo: taksTo,
                taskStatus: taskStatus,
                taskPriority: taskPriority
            })

            table.search(searchParms.toString()).draw();
            modal.close();
        });

        $('#advancedSearch').click(function(e) {
            modal.showModal();
        });

        $("#closeModalBtn").click(function() {
            modal.close();
        });

        $("#clearSearch").click(function() {
            $('#task_id').val('');
            $('#task_name').val('');
            $('#task_from').val('')
            $('#task_to').val('')
            $('#task_status').val('')
            $('#task_priority').val('')
        });
    });
</script>