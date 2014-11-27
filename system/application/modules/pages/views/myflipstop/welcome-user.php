<?php
 
$message = "";

if($_POST)
{   
    $response = Modules::run('users/resend_activation');
  

    if($response==TRUE)
    {
        $message = "We have sent you an email with your verification link";
    }
}
?>
<div class="row text-center col-lg-6 center-block top-buffer">

	<div class="col-lg-12 text-center">
		<div class="section">
			<img class="fs-logo" src="<?php echo base_url('_assets/'.$theme.'/img/fs_logo_dark.jpg');?>">
			<br><br>
			<br><br>
			<h1 style="color:#ff4747"> Thank you for signing up! </h1>
			
				<p> We have sent you an email with your activation link.   Verify your account to get started.  </p>
			
			<p> Resend activation link by entering your email below: <br> </p>

			<form style="width:300px" class="text-center col-lg-3 center-block" method="POST"  id="form-resend-activation">
	        	<div class="form-group">
	        		<input class="form-control" name="email" placeholder="yourname@email.com" autofocus="" type="text">
	        	    <span class="field-status-error"></span>

	            </div>
	            <div class="form-group">
	            	<a href="<?php echo base_url('sign-in');?>" class="btn btn-gray btn-primary"> Sign in </a>
	            	<input type="button" id="btn-submit" class="btn btn-primary" value="Resend activation link">
	            </div>
	         </form>
	         	<?php if($message!=""):?>
	         	<div class="alert alert-success fade in">
	             <?php echo $message != "" ? $message : '';?>
	          	</div>
	      		<?php endif;?>
		</div>
	</div>
	
</div>

<?php $this->session->set_userdata(array('new_user'=>FALSE));?>
<script type="text/javascript" src="<?php echo base_url();?>_assets/_js/custom/global.js"></script>

<script>
	$("#btn-submit").click(function(){
			
		var error = 0;
        var isEmailEx = '';

        if(email.val() == '') {
            email.next().html('* Required');
            error = 1;
        } else {
            if(!isValidEmail(email.val())) {
                email.next().html('Invalid email address');
                error = 1;
            }
            else
            {
                email.next().html('');
            }
        }

        if(error==0)
        {
        	 showLoader_webapp();
        	 $("#form-resend-activation").submit();
        }


	});
</script>