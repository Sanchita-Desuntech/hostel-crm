<section id="main-content">
    <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        <h3>Custom Invoice Management</h3>

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
                                    <a id="editable-sample_new" class="btn btn-primary" href="<?php echo base_url() ?>admin/custominvoice/addcustominvoice">
                                        Add New <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                                <div class="btn-group pull-right">
                                    <!-- <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="#">Print</a></li>
                                        <li><a href="#">Save as PDF</a></li>
                                        <li><a href="#">Export to Excel</a></li>
                                    </ul>-->
                                </div>
                                <div class="space15"></div>
                                <table class="table table-striped table-bordered nowrap" id="tabledata" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>SL No.</th>
                                            <th>Customer Name</th>
                                            <th>Service Name</th>
                                            <th>Invoice No.</th>
                                            <th>Invoice Date</th>
                                            <th>Description</th>
                                            <th>Amount</th>
                                            <th>Payment Method</th>
                                            <th>Payment Status</th>
                                            <th>Create Date</th>
                                            <th>Created By</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        /*echo "<pre>";
								print_r($allinvoice_row);*/
                                        $i = 1;
                                        foreach ($allinvoice_row as $alldata) { ?>
                                            <tr class="">
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $alldata->customer_name; ?></td>
                                                <td><?php echo $alldata->ser_name; ?></td>
                                                <td><?php echo $alldata->invoice_code; ?></td>
                                                <td><?php echo $alldata->inv_date; ?></td>
                                                <td><?php echo $alldata->inv_descrp; ?></td>
                                                <td><?php echo $alldata->amount; ?></td>
                                                <td><?php if ($alldata->status == '0') {
                                                        echo 'Paid';
                                                    } else {
                                                        echo "Not Paid";
                                                    } ?></td>
                                                <td><?php if ($alldata->payment_method == '0') {
                                                        echo 'Cash';
                                                    } else {
                                                        echo "Net Banking";
                                                    } ?></td>
                                                <td><?php echo $alldata->create_date; ?></td>
                                                <td><?php echo $alldata->created_by_name; ?></td>
                                                <td> <a href="<?php echo base_url() ?>admin/custominvoice/customprint/<?php echo $alldata->id; ?>" target="_blank" class="btn btn-xs btn-primary">Print</a> </td>

                                            </tr>
                                        <?php $i++;
                                        } ?>

                                    </tbody>
                                </table>


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
    function myJsFunc_comdel(dataid) {

        if (confirm("Are you sure that you want to delete the data?")) {
            window.location.href = "<?php echo base_url() ?>admin/invoice/delete_data/" + dataid;
        }
    }
</script>