<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        <h3>My Quality Check</h3>
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
                                <div class="space15"></div>
                                <table class="table table-striped table-bordered nowrap" id="tabledata" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>SL No.</th>
                                            <th>Task Id</th>
                                            <th>Task Name</th>
                                            <th>Customer Name</th>
                                            <th>Status</th>
                                            <th>TPC</th>
                                            <th>Start Date</th>
                                            <th>Last Modified</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $sl_no = 1; foreach($qclist as $qc) : ?>
                                            <tr>
                                                <td><?= $sl_no++; ?></td>
                                                <td>
                                                    <a href="<?= base_url('admin/task/details/'.$qc->task_id.'?is_qc_required='.$qc->is_qc_required.'&conversation_id='.$qc->conversation_id) ?>"><?= $qc->task_id ?></a>
                                                </td>
                                                <td><?= $qc->task_name ?></td>
                                                <td><?= $qc->customer_name ?></td>
                                                <td><?= $qc->task_status ?></td>
                                                <td><?= $qc->tpc ?></td>
                                                <td><?= $qc->start_date ?></td>
                                                <td><?= $qc->last_modified ?></td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </section>
            </div>
        </div>
        <!-- page end-->
    </section>
</section>