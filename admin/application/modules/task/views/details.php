<style>
    @import url("http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css");

    .chat {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .chat li {
        margin-bottom: 10px;
        padding-bottom: 5px;
        border-bottom: 1px dotted #B3A9A9;
    }

    .chat li.left .chat-body {
        margin-left: 60px;
    }

    .chat li.right .chat-body {
        margin-right: 60px;
    }


    .chat li .chat-body p {
        margin: 0;
        color: #777777;
    }

    .panel .slidedown .glyphicon,
    .chat .glyphicon {
        margin-right: 5px;
    }

    ::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        background-color: #F5F5F5;
    }

    ::-webkit-scrollbar {
        width: 12px;
        background-color: #F5F5F5;
    }

    ::-webkit-scrollbar-thumb {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, .3);
        background-color: #555;
    }
</style>

<section id="main-content">
    <section class="wrapper">

        <?php if ($this->session->flashdata('success_msg') != "") { ?>
            <div class="clearfix"></div>
            <div class="alert alert-success">
                <strong>Success!</strong> <?php echo $this->session->flashdata('success_msg'); ?>
            </div>

        <?php } ?>

        <?php if ($this->session->flashdata('err_msg') != "") { ?>

            <div class="clearfix"></div>

            <div class="alert alert-danger">

                <strong>Error!</strong> <?php echo $this->session->flashdata('err_msg'); ?>

            </div>

        <?php } ?>

        <section class="panel">
            <header class="panel-heading">
                <div class="row">
                    <div class="col-md-6">
                        <h3><?= $task['customer_details']['full_name'] ?> - #<?= $task['task_id'] ?></h3>
                    </div>
                </div>
            </header>

            <div class="panel-body">
                <div class="row">

                    <div class="col-md-8">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Task Info</h3>
                            </div>
                            <div class="panel-body">
                                <p>Task Name : <?= $task['task_name'] ?></p>
                                <p>Task Description : <?= $task['task_desp'] ?></p>
                                <p>Task Priority : <?= $task['task_priority'] ?></p>
                                <p>Task By : <?= $task['task_by'] ?></p>
                                <p>Task Status : <?= $task['task_status'] ?></p>
                                <p>Task Created On : <?= $task['created_on'] ?></p>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row form-group">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <span class="glyphicon glyphicon-comment"></span>&nbsp;Comments
                                        </div>
                                        <div class="panel-body body-panel">
                                            <?php if(empty($comments)) : ?>
                                                <p>No chat found</p>
                                            <?php endif ?>
                                            <ul class="chat">
                                                <?php foreach($comments as $comment) : ?>
                                                    <li class="<?= $comment->send_by == 'client' ? 'left' : 'right' ?> clearfix"><span class="chat-img pull-<?= $comment->send_by == 'client' ? 'left' : 'right'  ?>">
                                                            <img src="https://via.placeholder.com/35/55C1E7/fff&text=<?= $comment->sender_name_start_with ?>" alt="User Avatar" class="img-circle" />
                                                        </span>
                                                        <div class="chat-body clearfix">
                                                            <div class="header">
                                                                <?php if($comment->send_by == 'client') : ?>
                                                                    <strong class="primary-font"><?= $comment->sender_name ?></strong> <small class="pull-right text-muted">
                                                                    <span class="glyphicon glyphicon-time"></span><?= $comment->sent_on ?></small>
                                                                <?php else : ?>
                                                                    <small class=" text-muted"><span class="glyphicon glyphicon-time"></span><?= $comment->sent_on ?></small>
                                                                    <strong class="pull-right primary-font"><?= $comment->sender_name ?></strong>
                                                                <?php endif ?>
                                                            </div>
                                                            <div><?= $comment->message ?></div>
                                                            <div style="margin-top: 20px;">
                                                                <?php 
                                                                    $attachments = json_decode($comment->attachments);
                                                                ?>

                                                                <?php if(!empty($attachments)) : ?>
                                                                    <?php foreach($attachments as $a) : ?>
                                                                        <a href="<?= base_url('uploads/chat/'.$a) ?>" target="_blank"><?= $a ?></a> &nbsp;&nbsp;&nbsp;
                                                                    <?php endforeach ?>
                                                                <?php endif ?>
                                                            </div>
                                                        </div>
                                                    </li>
                                                <?php endforeach ?>
                                            </ul>
                                        </div>
                                        <div class="panel-footer clearfix">

                                            <?php if($_SESSION['user_type'] == USER_EMPLOYEES) : ?>
                                                <form method="post" action="<?= base_url('admin/task/conversationEmployee') ?>" enctype="multipart/form-data">

                                                    <input type="hidden" name="task_id" value="<?= $task['id'] ?>"  />
                                                    <input type="hidden" name="task_code" value="<?= $task['task_id'] ?>"  />


                                                    <?php 
                                                        $is_last_qc_complete = true;
                                                        $qc_checker_id = '';
                                                    ?>

                                                    <?php if(!empty($last_message)) : ?>
                                                        <?php if(!$last_message['is_qc_complete']) : ?>
                                                            <?php 
                                                                $is_last_qc_complete = false;
                                                                $qc_checker_id = $last_message['qc_checker_id'];
                                                            ?>
                                                        <?php endif ?>
                                                    <?php endif ?>

                                                    <?php if(!$is_last_qc_complete) : ?>
                                                        <input type="hidden" name="conversation_id" value="<?= $last_message['id'] ?>"/>
                                                    <?php endif ?>

                                                    <textarea class="form-control editor_big" rows="4" name="message">
                                                        <?php if(!$is_last_qc_complete) : ?>
                                                            <?= $last_message['message'] ?>
                                                        <?php endif ?>
                                                    </textarea>

                                                    <!-- for attachmetns -->
                                                    <div style="margin-top: 30px;">
                                                    
                                                        <?php if(!$is_last_qc_complete) : ?>
                                                            <?php $attachments = json_decode($last_message['attachments'], true) ?>

                                                            <?php if(!empty($attachments)) : ?>

                                                                <ul class="list-group">
                                                                <?php foreach($attachments as $a) : ?>
                                                                    <li class="list-group-item">
                                                                        <a href="<?= base_url('uploads/chat/'.$a) ?>" target="_blank"><?= $a ?></a>
                                                                    </li>
                                                                <?php endforeach ?>
                                                                </ul>

                                                            <?php endif ?>
                                                        <?php endif ?>
                                                      
                                                    </div>

                                                    <div style="margin-top: 30px;">
                                                        
                                                        <div class="row">
                                                            <div class="col-md-4" style="padding-left: 30px;">
                                                                <select class="form-control" name="qc_checker_id">
                                                                    <option value="">Quality Check By</option>
                                                                    <?php foreach($qcCheckers as $qcChecker) : ?>
                                                                        <option value="<?= $qcChecker->user_id ?>"  <?= $qcChecker->user_id == $qc_checker_id ? 'selected' : '' ?>><?= $qcChecker->full_name ?></option>
                                                                    <?php endforeach ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <button class="btn btn-success btn-block" type="submit"><span class="glyphicon glyphicon-send"></span> Request Quality Check</button>
                                                            </div>
                                                            <div class="col-md-4" style="padding-right: 30px;">
                                                                <input type="file" name="chat_attachments" class="form-control"/>
                                                                <small>Max 25MB allowed</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>

                                            <?php else : ?>
                                                <form method="post" action="<?= base_url('admin/task/conversationSupervisor') ?>" enctype="multipart/form-data">

                                                    <input type="hidden" name="task_id" value="<?= $task['id'] ?>" />
                                                    <input type="hidden" name="task_code" value="<?= $task['task_id'] ?>" />

                                                    

                                                    <?php if( isset($_GET['is_qc_required']) && isset($_GET['conversation_id']) ) : ?>

                                                        <div>
                                                            <small>Reply To <a href="#"><?= $task['customer_details']['full_name'] ?></a></small>
                                                            <p><input type="checkbox" name="send_to_customer" checked /> Send to Customer</p>
                                                        </div>
                                                        
                                                        <input type="hidden" name="conversation_id" value="<?= $last_message['id'] ?>" />
                                                    <?php endif ?>

                                                    <textarea class="form-control editor_big" rows="4" name="message">
                                                        <?php if( isset($_GET['is_qc_required']) && isset($_GET['conversation_id']) ) : ?>
                                                            <?= $last_message['message'] ?>
                                                        <?php endif ?>
                                                    </textarea>


                                                    <div style="margin-top: 30px;">
                                                        <?php if( isset($_GET['is_qc_required']) && isset($_GET['conversation_id']) ) : ?>
                                                           
                                                            <?php $attachments = json_decode($last_message['attachments'], true) ?>

                                                            <?php if(!empty($attachments)) : ?>

                                                                <ul class="list-group">
                                                                    <?php foreach($attachments as $a) : ?>
                                                                        <li class="list-group-item">
                                                                            <a href="<?= base_url('uploads/chat/'.$a) ?>" target="_blank"><?= $a ?></a>
                                                                        </li>
                                                                    <?php endforeach ?>
                                                                </ul>

                                                            <?php endif ?>

                                                        <?php endif ?>
                                                    </div>

                                                    <div style="margin-top: 30px;">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <?php if ($_SESSION['user_type'] == USER_ADMIN || $_SESSION['user_type'] == USER_SUPERVISOR) : ?>
                                                                    <button class="btn btn-success btn-block" type="submit"><span class="glyphicon glyphicon-send"></span> Send Reply</button>
                                                                <?php else : ?>
                                                                    <button class="btn btn-success btn-block" type="submit"><span class="glyphicon glyphicon-send"></span> Request Quality Check</button>
                                                                <?php endif ?>
                                                            </div>
                                                            <div class="col-md-4" style="padding-right: 30px;">
                                                                <input type="file" name="chat_attachments" class="form-control" multiple />
                                                                <small>Max 25MB allowed</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>

                                            <?php endif ?>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Customer Info</h3>
                            </div>
                            <div class="panel-body">
                                <p>Customer Name: <?= $task['customer_details']['full_name'] ?></p>
                                <p>Customer Email: <?= $task['customer_details']['email'] ?></p>
                                <p>Customer Mobile: <?= $task['customer_details']['mobile'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

    </section>

</section>