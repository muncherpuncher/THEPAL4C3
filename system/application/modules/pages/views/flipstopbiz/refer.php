<?php 

if($_POST) 
{ 
    $response = Modules::run('business_referral/refer');
    if($response == TRUE)
    {
?>

<div class="alert alert-success alert-block fade in">
      <button data-dismiss="alert" class="close close-sm" type="button">
          <i class="icon-remove"></i>
      </button>
      <h4>
          <i class="icon-ok-sign"></i>
          Success!
      </h4>
      <p> Thank you for your referral. </p>
</div>


<?php 
    }
}
?>

<?php $list_business_categories_parent = $this->db->get_where('tpl_business_categories',array('parent'=>''));?>

<div class="full-page-container" style="padding-top:70px">
    <div class="full-page" style="height:auto">
        <div class="col-xs-10 col-xs-offset-1 page-margin-left">
            <h1 class="subpage-header"> REFER A BUSINESS </h4>
            <h5 class="subpage-header-text"> Know a business  owner who could benefit from advertising on FlipStop? </h4>
            <h5 class="subpage-header-text"> Complete the short form below and we'll make sure they get the info 
                they need about the number one marketing platform for Filipino businesses accross the globe!
            </h5>
        </div>
        <div class="col-xs-12"> 
            <hr class="subpage-divider">
        </div>

        <p class="col-xs-3 pull-right"> * Required Information </p>
        <div class="col-xs-6 col-xs-offset-1 page-margin-left">
            
            <form method="POST"  id="form-refer-business">
                    <div class="form-group">
                        <label for="business_name"> * Name of Business </label>
                        <input  class="form-control" name="business_name" placeholder="" autofocus="" type="text">
                        <span class="field-status-error"></span>
                    </div>
                    <div class="form-group">
                        <label for="business_name"> * Name of Business Owner </label>
                        <input class="form-control" name="business_owner" placeholder="" autofocus="" type="text">
                        <span class="field-status-error"></span>
                    </div>
                    <div class="form-group">
                        <label for="business_email"> * Businesses's Email </label>
                        <input  class="form-control" name="business_email" placeholder="" type="text">
                        <span class="field-status-error"></span>
                    </div> 
                    <div class="form-group">
                        <label for="business_type"> * Business Type </label>
                        <br>
                       <select class="form-control" name="business_type" placeholder="" autofocus="" type="text" value="">
                        <option value="" selected> Select </option>
                        <?php foreach ($list_business_categories_parent->result() as $key):?>
                        <option value="<?php echo $key->name;?>"> <?php echo $key->name;?> </option>  
                        <?php endforeach;?>
                        </select>
                        <span class="field-status-error"></span>
                    </div>
                    <div class="form-group">
                        <label for="referer_email"> * Your Name </label>
                        <input  class="form-control" name="referrer_name" placeholder="" autofocus="" type="text">
                        <span class="field-status-error"></span>
                    </div>
                    <div class="form-group">
                        <label for="referer_email"> * Your Email </label>
                        <input class="form-control" name="referrer_email" placeholder="" autofocus="" type="text">
                        <span class="field-status-error"></span>
                    </div>
                    <div id="marker"></div>
                    <input type="button" id="btn-refer-business" class="btn btn-primary" value="Refer Business"> 
                    <div class="" style="height:100px"></div>
            </form>

        </div>
    </div>
    <?php echo Modules::run('pages/get_footer');?>
</div>

<script type="text/javascript" src="<?php echo base_url();?>_assets/_js/custom/global.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>_assets/_js/custom/submenu-scroll.js"></script>

<script>


$(document).ready(function(){

    $("#btn-refer-business").click(function(){

        var error = 0;

        if(business_name.val() == '') {
            business_name.next().show().html('* Required');
            error = 1;
        } else {
            business_name.next().hide().html('');
        }

        if(business_type.val() == '') {
            business_type.next().show().html('* Required');
            error = 1;
        } else {
            business_type.next().hide().html('');
        }


        if(business_owner.val() == '') {
            business_owner.next().show().html('* Required');
            error = 1;
        } else {
            business_owner.next().hide().html('');
        }

        if(referrer_email.val() == '') {
            referrer_email.next().show().html('* Required');
            error = 1;
        } else {
            referrer_email.next().hide().html('');
        }

        if(referrer_name.val() == '') {
            referrer_name.next().show().html('* Required');
            error = 1;
        } else {
            referrer_name.next().hide().html('');
        }

        if(referrer_email.val() == '') {
            referrer_email.next().show().html('* Required');
            error = 1;
        } else {
            if(!isValidEmail(referrer_email.val())) {
                referrer_email.next().show().html('* Invalid Email');
                error = 1;
            }
            else
            {
                referrer_email.next().show().html('');
               
            }
        }

        if(business_email.val() == '') {
            business_email.next().show().html('* Required');
            error = 1;
        }
        else {
            business_email.next().hide().html('');
        }

        // if(business_email.val() == '') {
        //     business_email.next().show().html('* Required');
        //     error = 1;
        // } else {
        //     if(!isValidEmail(business_email.val())) {
        //         business_email.next().show().html('* Invalid Email');
        //         error = 1;
        //     }
        //     else
        //     {
        //         business_email.next().show().html('');
             
        //     }
        // }

        if(error == 0) 
        {
            showLoader_biz();
            $("#form-refer-business").submit();
        } 

    });


});


</script>
      
     