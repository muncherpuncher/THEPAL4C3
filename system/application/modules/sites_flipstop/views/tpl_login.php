
<div class="full-page top-buffer">

      <div style="width:300px"  class="col-lg-6 text-center center-block">
        <form role="form" id="form-signin" method="POST">
                <img class="fs-logo" src="<?php echo base_url('_assets/'.$template_name.'img/fs_logo_dark.jpg');?>">
                <br>
                <?php include('tpl_message.php');?>
                <br>
                <div class="form-group">
                     <input class="form-control" name="username" placeholder="Email Address"  type="text">
                     <span class="field-status-error"></span>
                </div>
                <div class="form-group">
                     <input class="form-control" name="password" placeholder="Password" type="password">
                     <span class="field-status-error"></span>
                </div>
                <div class="form-group">
                     <div class="border-dotted"></div>
                </div>
                <div class="form-group">
                    <label class="checkbox">
                         <h6 class="pull-right fs-text-gray pull-left"> Not a member yet?  <a href="<?php echo base_url('register');?>" class="fs-link-pink"> Click Here </a> </h6> 
                    </label>
                    <label class="checkbox">
                         <h6 class="pull-right fs-text-gray pull-left"> Are you a business? <a href="<?php echo base_url('business');?>" class="fs-link-pink">  Get Started Here </a> </h6> 
                    </label>
                    <div class="clearfix"></div>
                    <label class="checkbox">
                         <h6 class="pull-right pull-left"> <a href="<?php echo base_url('forgotpassword');?>" class="fs-link-pink"> Forgot Password? </a> </h6> 
                    </label>
                </div>
                <div class="form-group pull-right" style="margin-top:-34px">
                     <input type="submit" class="form-control btn-primary" value="Sign in" style="width:100px">
                </div>   

                <div class="border-dotted"></div>
            

          </form>
      </div>

</div>
<?php include('js.php');?>
<script>

    /* 
     * Users Login form
     */

    $("#form-signin").submit(function(e){
         e.preventDefault();   
            

         
            $('*').removeClass('error');
            
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

                    userLogin(username,password);
           
                } else {
                    return false;
                }

    });



</script>