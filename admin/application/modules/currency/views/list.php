<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        <h3>Currency Master
                            <span class="tools pull-right">
                                <a href="javascript:;" class="fa fa-chevron-down"></a>
                                <a href="javascript:;" class="fa fa-times"></a>
                            </span>
                        </h3>
                    </header>
                    <div class="panel-body" style="display: block;">
                        <?php if (!empty($this->session->flashdata('success_msg'))) { ?>
                            <div class="clearfix"></div>
                            <div class="alert alert-success">
                                <strong>Success!</strong> <?php echo $this->session->flashdata('success_msg');
                                                            $this->session->unset_userdata('success_msg');
                                                            ?>
                            </div>
                        <?php } ?>

                        <?php if ($this->session->flashdata('err_msg') != "") { ?>
                            <div class="clearfix"></div>
                            <div class="alert alert-danger">
                                <strong>Success!</strong> <?php echo $this->session->flashdata('err_msg');
                                                            $this->session->unset_userdata('err_msg'); ?>
                            </div>
                        <?php } ?>
                        <div class="adv-table editable-table ">
                            <div class="clearfix">
                                <div class="btn-group">
                                    <a id="editable-sample_new" class="btn btn-primary" href="<?php echo base_url() ?>admin/currency/create">
                                        Add New <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                                <div class="btn-group pull-right">

                                </div>
                                <div class="space15"></div>
                                <table class="table table-striped table-bordered nowrap" id="tabledata" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>Currency Name</th>
                                            <th>Currency Code</th>
                                            <th>Currency Value</th>
                                            <th>Respect To</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($currency_list as $currency) : ?>
                                            <tr>
                                                <td><?= $currency->currency_name ?></td>
                                                <td><?= $currency->currency_code ?></td>
                                                <td><?= $currency->currency_value ?></td>
                                                <td><?= $currency->respect_to ?></td>
                                                <td>
                                                    <a class="btn btn-success" href="<?= base_url('admin/currency/edit/'.$currency->id) ?>">Edit</a>
                                                    <a class="btn btn-danger delete-btn" href="<?= base_url('admin/currency/delete/'.$currency->id) ?>">Delete</a>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                                <br />
                            </div>
                        </div>
                </section>
            </div>
        </div>
    </section>
</section>

<script type="text/javascript">

window.addEventListener("load", () => {
    $('.delete-btn').click( function(e) {
        if (confirm("Are you sure that you want to delete the data?")) {
            return;
        } else {
            e.preventDefault();
        }
    });
});
</script>