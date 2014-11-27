<?php if($this->session->userdata('is_logged_in') == 1) { redirect(base_url());}?>
<?php if($_POST) { echo Modules::run('users/auth');}?>
<div class="full-page top-buffer">
  <div style="width:300px" class="col-lg-6 text-center center-block">
    <form role="form" id="form-signin" method="POST" action="">
      <img class="fs-logo" src="<?php echo base_url('_assets/'.$theme.'/img/fs_logo_dark.jpg');?>"> <br>
      <?php include('tpl_message.php');?>
      <br>
      <div class="form-group">
        <input class="form-control" name="username" placeholder="Email Address" type="text">
        <span class="field-status-error"></span>
      </div>
      <div class="form-group">
        <input class="form-control" name="password" placeholder="Password" type="password">
        <span class="field-status-error"></span>
      </div>
      <div class="form-group">
        <div class="border-dotted">
        </div>
      </div>
      <div class="form-group">
        <label class="checkbox">
        <h6 class="pull-right fs-text-gray pull-left"> Not a member yet? <a href="<?php echo base_url('register');?>" class="fs-link-pink"> Click Here </a></h6>
        </label>
        <label class="checkbox">
        <h6 class="pull-right fs-text-gray pull-left"> Are you a business? <a href="<?php echo base_url('business');?>" class="fs-link-pink"> Get Started Here </a></h6>
        </label>
        <div class="clearfix">
        </div>
        <label class="checkbox">
        <h6 class="pull-right pull-left"><a href="<?php echo base_url('forgotpassword');?>" class="fs-link-pink"> Forgot Password? </a></h6>
        </label>
      </div>
      <div class="form-group pull-right" style="margin-top:-34px">
        <input type="button" id="btn-sign-in" class="btn btn-primary" value="Sign in" style="width:100px">
      </div>
      <div class="border-dotted">
      </div>
    </form>
  </div>
</div>


<script type="text/javascript" src="<?php echo base_url();?>_assets/_js/custom/global.js"></script>
<script>
    /* 
     * Users Login form
     */
    
    $("#btn-sign-in").click(function(){

       var error = 0;
        if(username.val() == '') {
            username.next().html('* Required');
            error = 1;
        } else {
            if(!isValidEmail(username.val())) {
                username.next().html('* Invalid Email');
                error = 1;
            }
            else
            {
               username.next().html('');
            }
        }
        if(password.val() == '') {
            password.next().html('* Enter Password');
            error = 1;
        }else
        {
            password.next().html('');
        }      
        if(error == 0) {
            $("#form-signin").submit();
        } else {
            return false;
        }

    });

   
</script>