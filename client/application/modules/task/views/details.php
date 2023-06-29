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
                        <h3>Task - #<?= $task['task_id'] ?></h3>
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
                                                    <li class="<?= $comment->send_by != 'client' ? 'left' : 'right' ?> clearfix"><span class="chat-img pull-<?= $comment->send_by != 'client' ? 'left' : 'right'  ?>">
                                                            <img src="https://via.placeholder.com/35/55C1E7/fff&text=<?= $comment->sender_name_start_with ?>" alt="User Avatar" class="img-circle" />
                                                        </span>
                                                        <div class="chat-body clearfix">
                                                            <div class="header">
                                                                <?php if($comment->send_by != 'client') : ?>
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
                                            <form method="post" action="<?= base_url('client/task/conversation') ?>" enctype="multipart/form-data">

                                                <input type="hidden" name="task_id" value="<?= $task['id'] ?>"  />
                                                <input type="hidden" name="task_code" value="<?= $task['task_id'] ?>"  />

                                                <div>
                                                    <small>Reply To <?= $site_name ?></small>
                                                </div>

                                                <textarea class="form-control editor_big" rows="4" name="message"></textarea>

                                                <div class="row" style="margin-top: 30px;">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <button class="btn btn-success btn-block" type="submit"><span class="glyphicon glyphicon-send"></span> Send Reply</button>
                                                        </div>
                                                        <div class="col-md-4" style="padding-right: 30px;">
                                                            <input type="file" name="chat_attachments" class="form-control"/>
                                                            <small>Max 25MB allowed</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

    </section>

</section>