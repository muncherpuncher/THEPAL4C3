<?php 
if($_POST)
{ 

    $response = Modules::run('clients_business/register_initial','2');
  
    if($response == TRUE)
    {
        redirect($page_menu['register-business']['url'] . '?step=3');
    }

}
?>
<div class="full-page-container">
    <div class="row setup-content" id="step-3">
        <div class="col-xs-10 col-xs-offset-1">
            <div class="col-md-12">
                
                 <a id="activate-step-2" class="btn btn-step-validate btn-lg pull-right"> <span class="glyphicon glyphicon-play"></span> Proceed </a>
                 <div class="col-xs-12" style="height:400px;">
                    We have sent the details in your email. Kindly enter your verification code below to complete
                    listing your business. <br>
                    <form method="POST" action="" id="form-register-business-step-2" style="margin-left:auto;margin-right:auto">
                        <div class="form-group">
                        <br><br>
                        <h4>  Enter "Verification Code" and then proceed. </h4>
                        <input class="form-control" name="business_verification_code" placeholder="" autofocus="" type="text">
                        <span class="field-status-error"></span>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</div>
<?php echo Modules::run('pages/get_footer');?>

<script type="text/javascript" src="<?php echo base_url();?>_assets/_js/custom/global.js"></script>
<script src="<?php echo base_url();?>/_assets/<?php echo $theme;?>/js/business_registration_steps.js"> </script>
