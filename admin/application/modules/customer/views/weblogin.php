<section id="main-content">
    <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        <h3>Weblogin</h3>

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
                                <div class="btn-group">
                                    <a id="editable-sample_new" class="btn btn-primary" href="<?php echo base_url() ?>admin/customer/addweblogin/<?php echo $customer_id; ?>">
                                        Add Weblogin <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                                <div class="btn-group pull-right">

                                </div>
                                <div class="space15"></div>
                                <?php if (!empty($customer_weblogin_row)) { ?>
                                    <table class="table table-striped table-bordered nowrap" id="tabledata" style="width:100%;">
                                        <thead>
                                            <tr>
                                                <th>SL No.</th>
                                                <th>Email</th>
                                                <th>Website</th>
                                                <th>Password</th>
                                                <th>Created By</th>
                                                <th>Created On</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $i = 1; foreach ($customer_weblogin_row as $alldata) { ?>
                                                <tr class="">
                                                    <td><?php echo $i++ ?></td>
                                                    <td><?php echo $alldata->email; ?></td>
                                                    <td><?php echo $alldata->website; ?></td>
                                                    <td><?php echo $alldata->password; ?></td>
                                                    <td><?php
                                                        if ($alldata->customer_id == $alldata->created_by) {
                                                            echo "Self";
                                                        } else {
                                                            echo $alldata->full_name;
                                                        } ?>
                                                    </td>
                                                    <td><?php echo $alldata->created_on; ?></td>
                                                    <td>
                                                        <a class="edit_data" href="<?php echo base_url(); ?>admin/customer/editweblogin/<?php echo $alldata->id; ?>"><i class="fa fa-edit"></i></a> &nbsp;
                                                    </td>

                                                </tr>
                                            <?php  } ?>

                                        </tbody>
                                    </table>
                                <?php } else { ?>
                                    <center> <strong>
                                            <h3>There is no web login present </h3>
                                        </strong> </center>
                                <?php } ?>
                                <br />
                            </div>
                        </div>
                </section>
            </div>
        </div>
        <!-- page end-->
    </section>
</section>

<script type="text/javascript">
    function myJsFunc_comdel(dataid, dataimg) {
        if (confirm("Are you sure that you want to delete the data?")) {
            window.location.href = "<?php echo base_url() ?>admin/customer/delete_data/" + dataid + '/' + dataimg;
        }
    }
</script>