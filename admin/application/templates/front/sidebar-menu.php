<?php

// echo '<pre>';
// print_r($_SESSION);
// die;

?>


<aside>
    <div id="sidebar" class="nav-collapse"> <!-- sidebar menu start-->
        <div class="leftside-navigation" tabindex="5000" style="overflow: hidden; outline: none;">
            <ul class="sidebar-menu" id="nav-accordion">
                <li> <a href="<?= base_url() ?>admin/home"> <i class="fa fa-dashboard"></i> <span>Dashboard</span> </a> </li>

                <?php if(has_user_permission('view.customers')) : ?>
                <li class="sub-menu dcjq-parent-li"> <a href="javascript:;" class="dcjq-parent"> <i class="fa fa-user" aria-hidden="true"></i> <span>Customers</span> <i class="fa fa-angle-down iconright" aria-hidden="true"></i> <span class="dcjq-icon"></span></a>
                    <ul class="sub" style="display: none;">
                        <li><a href="<?= base_url() ?>admin/customer"><i class="fa fa-circle-o" aria-hidden="true"></i>View Customer</a></li>
                        <?php if( has_user_permission('add.customers') ) : ?>
                        <li><a href="<?= base_url() ?>admin/customer/addcustomer"><i class="fa fa-circle-o" aria-hidden="true"></i>Add Customer</a></li>
                        <?php endif ?>
                    </ul>
                </li>
                <?php endif ?>

                <?php if(has_user_permission('view.task management')) : ?>
                <li class="sub-menu dcjq-parent-li"> <a href="javascript:;" class="dcjq-parent"> <i class="fa fa-tasks" aria-hidden="true"></i> <span>Task Management</span> <i class="fa fa-angle-down iconright" aria-hidden="true"></i> <span class="dcjq-icon"></span></a>
                    <ul class="sub" style="display: none;">
                        <?php if( in_array($_SESSION['user_type'], [ USER_EMPLOYEES, USER_SUPERVISOR ]) ) : ?>
                        <li><a href="<?= base_url() ?>admin/task/mytask"><i class="fa fa-circle-o" aria-hidden="true"></i>My Task</a></li>
                        <?php endif ?>
                        <li><a href="<?= base_url() ?>admin/task"><i class="fa fa-circle-o" aria-hidden="true"></i>View Task</a></li>
                        <?php if( has_user_permission('add.task management') ) : ?>
                        <li><a href="<?= base_url() ?>admin/task/addtask"><i class="fa fa-circle-o" aria-hidden="true"></i>Add Task</a></li>
                        <?php endif ?>
                    </ul>
                </li>
                <?php endif ?>

                <?php if( in_array($_SESSION['user_type'], [ USER_ADMIN, USER_SUPERVISOR ]) ) : ?>
                    <li class="sub-menu dcjq-parent-li"> <a href="javascript:;" class="dcjq-parent"> <i class="fa fa-tasks" aria-hidden="true"></i> <span>Supervisor</span> <i class="fa fa-angle-down iconright" aria-hidden="true"></i> <span class="dcjq-icon"></span></a>
                        <ul class="sub" style="display: none;">
                            <li><a href="<?= base_url() ?>admin/supervisor/myqc"><i class="fa fa-circle-o" aria-hidden="true"></i>My Quality Check</a></li>
                            <?php
                            /*
                            <li><a href="<?= base_url() ?>admin/supervisor/allqc"><i class="fa fa-circle-o" aria-hidden="true"></i>All Quality Check</a></li>
                            */
                            ?>
                        </ul>
                    </li>
                <?php endif ?>

                <?php if(has_user_permission('view.employee management')) : ?>
                <li class="sub-menu dcjq-parent-li"> <a href="javascript:;" class="dcjq-parent"> <i class="fa fa-users" aria-hidden="true"></i> <span>Employee Management</span> <i class="fa fa-angle-down iconright" aria-hidden="true"></i> <span class="dcjq-icon"></span></a>
                    <ul class="sub" style="display: none;">
                        <li><a href="<?= base_url() ?>admin/supervisor"><i class="fa fa-circle-o" aria-hidden="true"></i> Supervisor </a></li>
                        <li><a href="<?= base_url() ?>admin/employee"><i class="fa fa-circle-o" aria-hidden="true"></i> Employee </a></li>
                    </ul>
                </li>
                <?php endif ?>

                <?php if(has_user_permission('view.service management')) : ?>
                <li class="sub-menu dcjq-parent-li"> <a href="javascript:;" class="dcjq-parent"> <i class="fa fa-folder" aria-hidden="true"></i> <span>Service Management</span> <i class="fa fa-angle-down iconright" aria-hidden="true"></i> <span class="dcjq-icon"></span></a>
                    <ul class="sub" style="display: none;">
                        <li><a href="<?= base_url() ?>admin/service"><i class="fa fa-circle-o" aria-hidden="true"></i>View Service</a></li>
                        <?php if( has_user_permission('add.service management') ) : ?>
                        <li><a href="<?= base_url() ?>admin/service/addservice"><i class="fa fa-circle-o" aria-hidden="true"></i>Add Service</a></li>
                        <?php endif ?>
                    </ul>
                </li>
                <?php endif ?>

                <?php if(has_user_permission('view.coupon management')) : ?>
                <li class="sub-menu dcjq-parent-li"> <a href="javascript:;" class="dcjq-parent"> <i class="fa fa-gift" aria-hidden="true"></i> <span>Coupon Management</span> <i class="fa fa-angle-down iconright" aria-hidden="true"></i> <span class="dcjq-icon"></span></a>
                    <ul class="sub" style="display: none;">
                        <li><a href="<?= base_url() ?>admin/coupon/viewcoupon"><i class="fa fa-circle-o" aria-hidden="true"></i>View Coupon</a></li>
                        <?php if(has_user_permission('add.coupon management')) : ?>
                        <li><a href="<?= base_url() ?>admin/coupon/addcoupon"><i class="fa fa-circle-o" aria-hidden="true"></i>Add Coupon</a></li>
                        <?php endif ?>
                    </ul>
                </li>
                <?php endif ?>

                <?php if(has_user_permission('view.package management')) : ?>
                <li class="sub-menu dcjq-parent-li"> <a href="javascript:;" class="dcjq-parent"> <i class="fa fa-files-o" aria-hidden="true"></i> <span>Package Management</span><i class="fa fa-angle-down iconright" aria-hidden="true"></i> <span class="dcjq-icon"></span></a>
                    <ul class="sub" style="display: none;">
                        <li><a href="<?= base_url() ?>admin/package"><i class="fa fa-circle-o" aria-hidden="true"></i>View Package</a></li>
                        <?php if(has_user_permission('add.package management')) : ?>
                        <li><a href="<?= base_url() ?>admin/package/addpackage"><i class="fa fa-circle-o" aria-hidden="true"></i>Add Package</a></li>
                        <?php endif ?>
                    </ul>
                </li>
                <?php endif ?>

                <?php
                /*
                <li class="sub-menu dcjq-parent-li"> <a href="javascript:;" class="dcjq-parent"> <i class="fa fa-money" aria-hidden="true"></i> <span>Payment Management </span> <i class="fa fa-angle-down iconright" aria-hidden="true"></i> <span class="dcjq-icon"></span></a>
                    <ul class="sub" style="display: none;">
                        <li><a href="<?= base_url() ?>admin/orderpackage"><i class="fa fa-circle-o" aria-hidden="true"></i> Order Package </a></li>
                    </ul>
                </li>
                */ ?>

                <?php if(has_user_permission('manage.invoice management')) : ?>
                <li class="sub-menu dcjq-parent-li"> <a href="javascript:;" class="dcjq-parent"> <i class="fa fa-money" aria-hidden="true"></i> <span>Invoice Management</span> <i class="fa fa-angle-down iconright" aria-hidden="true"></i> <span class="dcjq-icon"></span></a>
                    <ul class="sub" style="display: none;">
                        <li><a href="<?= base_url() ?>admin/invoice"><i class="fa fa-circle-o" aria-hidden="true"></i> Customer Invoice </a></li>
                        <li><a href="<?= base_url() ?>admin/payment"><i class="fa fa-circle-o" aria-hidden="true"></i> Complete Payment </a></li>
                        <li><a href="<?= base_url() ?>admin/custominvoice"><i class="fa fa-circle-o" aria-hidden="true"></i> Custom Invoice </a></li>
                    </ul>
                </li>
                <?php endif ?>

                <?php if(has_user_permission('manage.settings')) : ?>
                <li class="sub-menu dcjq-parent-li"> <a href="javascript:;" class="dcjq-parent"> <i class="fa fa-cog" aria-hidden="true"></i> <span>Settings</span> <i class="fa fa-angle-down iconright" aria-hidden="true"></i> <span class="dcjq-icon"></span></a>
                    <ul class="sub" style="display: none;">
                        <li><a href="<?= base_url() ?>admin/settings"><i class="fa fa-circle-o" aria-hidden="true"></i>Settings</a></li>
                    </ul>
                </li>
                <?php endif ?>
                
                <li class="sub-menu dcjq-parent-li"><a href="javascript:;" class="dcjq-parent"> <i class="fa fa-cog" aria-hidden="true"></i> <span>Masters</span> <i class="fa fa-angle-down iconright" aria-hidden="true"></i><span class="dcjq-icon"></span></a>
                    <ul class="sub" style="display: none;">
                        <li><a href="<?= base_url() ?>admin/currency"><i class="fa fa-circle-o" aria-hidden="true"></i>Currency Master</a></li>
                    </ul>
                </li>

            </ul>
        </div>
        <div id="ascrail2000" class="nicescroll-rails" style="width: 3px; z-index: auto; cursor: default; position: absolute; top: 0px; left: 257px; height: 352px; opacity: 0; display: block;">
            <div style="position: relative; top: 0px; float: right; width: 3px; height: 204px; background-color: rgb(31, 181, 173); border: 0px solid rgb(255, 255, 255); background-clip: padding-box; border-radius: 0px;"></div>
        </div>
        <div id="ascrail2000-hr" class="nicescroll-rails" style="height: 3px; z-index: auto; top: 349px; left: 0px; position: absolute; cursor: default; display: none; width: 257px; opacity: 0;">
            <div style="position: relative; top: 0px; height: 3px; width: 260px; background-color: rgb(31, 181, 173); border: 0px solid rgb(255, 255, 255); background-clip: padding-box; border-radius: 0px;"></div>
        </div>
    </div>
</aside>