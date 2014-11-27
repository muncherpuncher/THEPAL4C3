<?php 
if($_POST)
{ 

    $response = Modules::run('clients_business/register_initial','1');

    if($response == TRUE)
    {
        redirect($page_menu['register-business']['url'] . '?step=2');
    }

}
?>

<div class="full-page-container">
    <div class="row setup-content" id="step-1">
        <div class="col-xs-12">
            <div class="col-xs-12" style="margin-left:50px">
                
                <a id="activate-step-1" class="btn btn-step-validate btn-lg pull-right"> <span class="glyphicon glyphicon-play"></span> Proceed </a>
        
                <form method="POST" action="" id="form-register-business-step-1">
                    <div class="col-xs-10 page-margin-left">
                        <div class="form-group col-xs-12">
                            <p class="pull-right">
                                 * Required fields
                            </p>
                        </div>
                        <div class="form-group col-xs-6">
                            <label for="fd_last_name"> * Last Name </label>
                            <input class="form-control" name="last_name" placeholder="" autofocus="" type="text" value="">
                            <span class="field-status-error"></span>
                        </div>
                        <div class="form-group col-xs-6">
                            <label for="fd_first_name"> * First Name</label>
                            <input class="form-control" name="first_name" placeholder="" autofocus="" type="text" value="">
                            <span class="field-status-error"></span>
                        </div>
                        <div class="form-group col-xs-12">
                            <label for="fd_first_name"> * Business Name </label>
                            <input class="form-control" name="business_name" placeholder="" autofocus="" type="text" value="">
                            <span class="field-status-error"></span>
                        </div>
                        <div class="form-group">
                            <div class="form-group col-xs-6">
                                <label for="fd_email"> * Email </label>
                                ( <small> This will serve as your username when you log in </small> ) <input class="form-control" name="email" placeholder="" autofocus="" type="text" value="">
                                <span class="field-status-error"></span>
                            </div>
                            <div class="form-group col-xs-6">
                                <label for="fd_passoword"> * Password </label> ( <small> 8 Alphanumeric characters </small> ) 
                                <input class="form-control" name="password" placeholder="" autofocus="" type="password" value="">
                                <span class="field-status-error"></span>
                            </div>
                            <div class="form-group col-xs-12">
                                <label for="fd_title"> * Role/Title </label>
                                <input class="form-control" name="title_role" placeholder="" autofocus="" type="text" value="">
                                <span class="field-status-error"></span>
                            </div>
                            <div class="form-group col-xs-12">
                                <label for="fd_address_1"> * Address</label>
                                <input class="form-control" name="address" placeholder="" autofocus="" type="text" value="">
                                <span class="field-status-error"></span>
                            </div>
                            <div class="form-group col-xs-4">
                                <label for="fd_city"> * City</label>
                                <input type="text" class="form-control" name="city" placeholder="" autofocus="" type="text" value="">
                                <span class="field-status-error"></span>
                            </div>
                            <div class="form-group col-xs-4">
                                <label for="fd_state">* State</label>
                                <input type="text" class="form-control" name="state" placeholder="" autofocus="" type="text" value="">
                                <span class="field-status-error"></span>
                            </div>
                            <div class="form-group col-xs-4">
                                <label for="fd_postal_code"> * Postal Code </label>
                                <input type="text" class="form-control" name="postal_code" placeholder="" autofocus="" type="text" value="">
                                <span class="field-status-error"></span>
                            </div>
                            <div class="form-group col-xs-4">
                                <label for="fd_country"> * Country </label>
                                <select class="form-control" name="country" placeholder="" autofocus="" type="text" value="">
                                    <option value="" selected> Select </option>
                                    <option value="Philippines"> Philippines </option>
                                    <option value="USA" selected> USA </option>
                                    <option value="Canada" selected> Canada </option>
                                </select>
                                <span class="field-status-error"></span>
                            </div>
                            <div class="form-group col-xs-4">
                                <label for="fd_phone_number">* Phone Number </label>
                                <input class="form-control" name="phone_number" placeholder="" autofocus="" type="text" value="">
                                <span class="field-status-error"></span>
                            </div>
                            <div class="form-group col-xs-12">
                                <h5>
                                <span> I agree to Flipstop <a target="_blank" class="ad-aggreement-link" href="<?php echo base_url('aggreement');?>"> Advertiser Agreement </a></span>
                                <input type="checkbox" name="chk_bizagree">
                                 <span class="field-status-error"></span>
                                </h5>
                               
                            </div>
                        </div>
                        <div class="col-xs-12 page-margin-bottom">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php echo Modules::run('pages/get_footer');?>

<script type="text/javascript" src="<?php echo base_url();?>_assets/_js/custom/global.js"></script>
<script src="<?php echo base_url();?>/_assets/<?php echo $theme;?>/js/business_registration_steps.js"> </script>