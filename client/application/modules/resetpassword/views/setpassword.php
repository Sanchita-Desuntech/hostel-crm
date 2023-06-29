<div class="container loginbx">



      <?php

  $attributes = array('class' => 'form-horizontal frmgrpmain form-signin', 'id' => 'client/resetpassword/setpassword'); 

  echo form_open('client/resetpassword/setpassword',$attributes);

 

 ?>

        

        <h2 class="form-signin-heading">Client Reset Password</h2>

		

        <div class="login-wrap">

            <div class="user-login-info">

            <div class="imgbx text-center">

           <img src="<?php echo base_url();?>/themes/front/images/logo2.png"/>

           </div>

                <input type="password" class="form-control login_form_input" name="new_password"  placeholder="Enter New Password (required)" autofocus="" autocomplete="off">

				<?php echo form_error('new_password'); ?>

				<input type="password" class="form-control login_form_input" name="confirm_password"  placeholder="Enter Confirm Password (required)" autofocus="" autocomplete="off">

				<?php echo form_error('confirm_password'); ?>

            </div>

            <input type="hidden" name="user_code" value="<?php echo $_SESSION['user_code'];?>">

            <!--<label class="checkbox">

                <input type="checkbox" value="remember-me"> Remember me

                <span class="pull-right">

                    <a data-toggle="modal" href="<?php echo base_url();?>client/resetpassword"> Forgot Password?</a>



                </span>

            </label>-->

            <button class="btn btn-lg btn-login btn-block" type="submit">SUBMIT</button>
             <?php echo $this->session->flashdata('error_login');?>

		<?php echo $this->session->flashdata('success_msg');?>


            <div class="registration">

                Don't have an account yet?

                <a class="" href="<?php echo base_url();?>client/userregistration">

                    Create an account

                </a>

            </div>



        </div>



          <!-- Modal -->

          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">

              <div class="modal-dialog">

                  <div class="modal-content">

                      <div class="modal-header">

                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                          <h4 class="modal-title">Forgot Password ?</h4>

                      </div>

                      <div class="modal-body">

                          <p>Enter your e-mail address below to reset your password.</p>

                          <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">



                      </div>

                      <div class="modal-footer">

                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>

                          <button class="btn btn-success" type="button">Submit</button>

                      </div>

                  </div>

              </div>

          </div>

          <!-- modal -->

  <script>

///////////////////////////////////////////////////////////////

$('.login_form_input').on('blur', function(){

	if (this.value == '') {

        $(this).parent().removeClass('login_form_row_hvr').addClass('login_form_row_wto_hvr');

	}

}).on('focus', function(){

  $(this).parent().removeClass('login_form_row_wto_hvr').addClass('login_form_row_hvr');

});



///////////////////////////////////////////////////////////////

var abc = document.getElementsByClassName('login_form_input');

///////////////////////////////////////////////////////////////

for(var i=0;i<=abc.length;i++){

			if($("#log_count-"+i).val()!== '') {

        	$("#log_count-"+i).parent().removeClass('login_form_row_wto_hvr').addClass('login_form_row_hvr');

	}

}

////////////

var ab = document.getElementsByClassName('login_form_input');

	for(var k=0; k<=ab.length; k++){

	ab[k].setAttribute("id","log_count-"+k);

}

//////////////

</script>   

      <?php echo form_close();?>

<style>

  .error_text

  {

	  color:red;

	  

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