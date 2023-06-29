<div class="container loginbx">

      <?php
  $attributes = array('class' => 'form-horizontal frmgrpmain form-signup', 'id' => 'userregistration'); 
  echo form_open('client/userregistration',$attributes);
 
 ?>
        
        <h2 class="form-signin-heading">Client Panel</h2>
		<?php 
  echo $this->session->flashdata('error_login');?>
        <div class="login-wrap">
            <div class="user-login-info">
            <div class="imgbx text-center">
           <img src="<?php echo base_url();?>/themes/front/images/logo2.png"/>
           </div>
           <div class="col-sm-6">
           		<input type="text" class="form-control login_form_input" name="full_name" value="<?php echo set_value('full_name'); ?>"  placeholder="Full Name *" autofocus="" autocomplete="off">
				<?php echo form_error('full_name'); ?>
				<input type="text" class="form-control login_form_input" name="mobile" value="<?php echo set_value('mobile'); ?>"  placeholder="Mobile *" autofocus="" autocomplete="off" maxlength="10">
				<?php echo form_error('mobile'); ?> 
                <input type="text"  name="email_id" value="<?php echo set_value('email_id'); ?>"  class="form-control login_form_input"  placeholder="Email ID *" autofocus="" autocomplete="off">
				<?php echo form_error('email_id'); ?> 
                <input type="password" class="form-control login_form_input" name="password" value="<?php echo set_value('password'); ?>" placeholder="Password*(min 8 characters)" autocomplete="off">
				<?php echo form_error('password'); ?>
				
				<input type="password" class="form-control login_form_input"  name="confirm_password" placeholder="Confirm Password *" value="<?php echo set_value('confirm_password'); ?>" autocomplete="off">
				<?php echo form_error('confirm_password'); ?>
				
				<input type="text" class="form-control login_form_input"  name="address_line1" placeholder="Address Line 1 *" value="<?php echo set_value('address_line1'); ?>" autocomplete="off">
				<?php echo form_error('address_line1'); ?>
				</div>
				<div class="col-sm-6">
				<input type="text" class="form-control login_form_input" value="<?php echo set_value('address_line2'); ?>" name="address_line2" placeholder="Address Line 2" autocomplete="off">
				
				<input type="text" class="form-control login_form_input" value="<?php echo set_value('city'); ?>" name="city" placeholder="City *" autocomplete="off">
				<?php echo form_error('city'); ?>
				<input type="text" class="form-control login_form_input" value="<?php echo set_value('country'); ?>" name="country" placeholder="Country *" autocomplete="off">
				<?php echo form_error('country'); ?>
				<input type="text" class="form-control login_form_input" value="<?php echo set_value('state'); ?>" name="state" placeholder="State *" autocomplete="off">
				<?php echo form_error('state'); ?>
				<input type="text" class="form-control login_form_input" value="<?php echo set_value('post_code'); ?>" name="post_code" placeholder="Post Code *" autocomplete="off">
				<?php echo form_error('post_code'); ?>
				
				<select name="information" class="form-control login_form_input">
					<option value="">select information from</option>
					<option value="Google">Google</option>
					<option value="FB">FB</option>
					<option value="Twitter">Twitter</option>
					<option value="Linkedin">Linkedin</option>
					<option value="Youtube">Youtube</option>
				</select>
				</div>
            </div>
            <!--<label class="checkbox">
               <input type="checkbox" value="remember-me"> Remember me
                <span class="pull-right">
                    <a data-toggle="modal" href="#myModal"> Forgot Password?</a>

                </span>
            </label>-->
            <div class="clearfix"></div>
            <div class="col-sm-12">
            <button class="btn btn-lg btn-login btn-block" type="submit">Sign Up</button>
            </div>
            <div class="clearfix"></div>
        </div>
        
          <!-- Modal -->
          <!--<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
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
          </div>-->
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
      <center>
        	<div class="registration-link">
                ALREADY HAVE AN ACCOUNT <a class="" href="<?php echo base_url();?>client/login">SIGN IN</a>
            </div>
        </center>
<style>
  .error_text
  {
	  color:red;
	  
  }
  .user-login-info p {
    color: red;
    font-size: 12px;
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