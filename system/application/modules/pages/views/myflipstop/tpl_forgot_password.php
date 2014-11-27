
<div class="row text-center col-lg-6 center-block top-buffer">

  <div class="col-lg-12 text-center">
    <div class="section">
      <img src="<?php echo base_url();?>_assets/sites_flipstop/default/img/fs_logo_dark.jpg">
      <br><br>
      <br><br>
      <h1 style="color:#ff4747"> Password Reset </h1>
      <hr>
      <p>
         <form role="form" class="col-lg-6 center-block" id="form-resetpassword" method="POST">
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
                     <input class="form-control" name="cpassword" placeholder="Confirm Password" type="password">
                     <span class="field-status-error"></span>
                </div>
                <div class="form-group">
                     <div class="border-dotted"></div>
                </div>
                <div class="form-group">
                    <label class="checkbox">
                          <h6> We will send your new password to your email </h6>
                    </label>
                    <br><br>
                </div>

                <div class="form-group col-lg-6 pull-right">  
                  <input type="submit" class="form-control btn-primary" value="Reset">
                </div>  
                <div class="form-group col-lg-6 pull-right">
                  <a href="<?php echo base_url('signin');?>" class="form-control btn-primary">Cancel</a>
                </div>  
               

                <div class="border-dotted"></div>
            
          </form>

      </p>
    </div>

    
  </div>
  
</div>

<?php include('js.php');?>

<script>

$(document).ready(function(){

    /* 
     * Users Reset Password form
     */

    $("#form-resetpassword").submit(function(e){
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

                if(password.val() != cpassword.val()) {
                    cpassword.next().html('* Confirm Password');
                    error = 1;
                }else
                {
                    cpassword.next().html('');
                }  

                if(error == 0) {

                  
                    userEmailExists_basic(username.val());

                    if(isexists==false)
                    {
                       resetPassword(username.val(),password.val());
                       $(this).trigger('reset');
                    }
                    else
                    {
                      alert('Email inactive');
                    }

           
                } else {
                    return false;
                }




    });



});


</script>