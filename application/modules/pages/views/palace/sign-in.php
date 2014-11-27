
<?php //if($this->session->userdata('is_logged_in') == 1) { redirect(base_url());}?>
<?php

if($_POST) 
{ 

$response = Modules::run('users/auth');
if($response == false)
{
?>

<script>

showMessage('error','Incorrect username or password');

</script>

<?php
}
}
?>

<div class="row text-center">

  <div class="span5 center">

    <div class="center-block top-buffer">
       <?php include('logo.php');?>
    </div>
    
    <form role="form" id="form-signin" method="POST" action="">
        <div class="form-group span4">
          <input name="username" placeholder="Email Address" type="text">
          <span class="field-status-error"></span>
        </div>
        <div class="form-group span4">
          <input name="password" placeholder="Password" type="password">
          <span class="field-status-error"></span>
        </div>
        
        <div class="form-group span4 top-buffer">
            <input type="button" id="btn-sign-in" class="btn btn-primary" value="Sign in" style="width:100px">
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
        if(getInput("username").val() == '') {
            getInput("username").next().html('* Required');
            error = 1;
        } else {
            if(!isValidEmail(getInput("username").val())) {
                getInput("username").next().html('* Invalid Email');
                error = 1;
            }
            else
            {
               getInput("username").next().html('');
            }
        }
        if(getInput("password").val() == '') {
            getInput("password").next().html('* Enter Password');
            error = 1;
        }else
        {
            getInput("password").next().html('');
        }      
        if(error == 0) {
            $("#form-signin").submit();
        } else {
            return false;
        }

    });

   
</script>