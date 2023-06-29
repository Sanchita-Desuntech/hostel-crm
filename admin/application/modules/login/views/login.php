<div class="container loginbx">
    <?php
    $attributes = array('class' => 'form-horizontal frmgrpmain form-signin', 'id' => 'login');
    echo form_open('admin/login', $attributes);
    ?>

    <h2 class="form-signin-heading">Admin Panel</h2>

    <div class="login-wrap">
        <div class="user-login-info">
            <div class="imgbx text-center">
                <img src="<?php echo base_url(); ?>/themes/front/images/logo2.png" />
            </div>

            <input type="text" class="form-control login_form_input" name="username" placeholder="Email or Username" autofocus="">
            <?php echo form_error('username'); ?>

            <input type="password" class="form-control login_form_input" name="password" placeholder="Password">
            <?php echo form_error('password'); ?>

        </div>


        <button class="btn btn-lg btn-login btn-block" type="submit">Sign in</button>

        <?php echo $this->session->flashdata('error_login'); ?>
    </div>

    <script>
        ///////////////////////////////////////////////////////////////
        $('.login_form_input').on('blur', function() {
            if (this.value == '') {
                $(this).parent().removeClass('login_form_row_hvr').addClass('login_form_row_wto_hvr');
            }
        }).on('focus', function() {
            $(this).parent().removeClass('login_form_row_wto_hvr').addClass('login_form_row_hvr');
        });



        ///////////////////////////////////////////////////////////////

        var abc = document.getElementsByClassName('login_form_input');

        ///////////////////////////////////////////////////////////////

        for (var i = 0; i <= abc.length; i++) {

            if ($("#log_count-" + i).val() !== '') {

                $("#log_count-" + i).parent().removeClass('login_form_row_wto_hvr').addClass('login_form_row_hvr');

            }

        }

        ////////////

        var ab = document.getElementsByClassName('login_form_input');

        for (var k = 0; k <= ab.length; k++) {

            ab[k].setAttribute("id", "log_count-" + k);

        }

        //////////////
    </script>

    <?php echo form_close(); ?>

    <style>
        .error_text {
            color: red;
        }
        .login_error_text_final {
            color: red;
            background-color: #fff;
            display: table;
            padding: 10px;
            text-align: center;
        }
    </style>

</div>