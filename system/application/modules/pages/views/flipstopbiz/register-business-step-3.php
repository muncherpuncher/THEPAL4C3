<?php 
if($_POST)
{ 
    $response = Modules::run('clients_business/register_initial','3');
    
    if($response == TRUE)
    {
        redirect($page_menu['register-business']['url'] . '?step=4');
    }
}
?>

<div class="full-page-container">

    <div class="row setup-content" id="step-3">
        <div class="col-xs-10 col-xs-offset-1">
            <div class="col-md-12">
                <div class="col-xs-10" style="padding-bottom:100px">
                   
                </div>
                <a id="activate-step-3" class="btn btn-step-validate btn-lg pull-right"><span class="glyphicon glyphicon-play"></span> Proceed </a>
                <div class="col-xs-12" style="height:auto;padding-bottom:200px">
                    <div class="row">
                        <div class="col-xs-12">
                            <table class="table">
                            <thead>
                            <tr>
                                <th>
                                     Description
                                </th>
                                <th class="text-center">
                                    Sub Total
                                </th>
                                <th>
                                </th>
                            </tr>
                            </thead>
                            <tbody id="tbl-branches">
                            </tbody>
                            </table>
                            <a href="" class="btn btn-warning pull-right" style="color:#ffffff;margin-left:10px" data-toggle="modal" data-target="#modal-addbranch ">Add Store/Branch</a>
                            <a href="" class="btn btn-warning pull-right" style="color:#ffffff;" data-toggle="modal" data-target="#modal-claimbranch "> Claim Ad </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo Modules::run('pages/get_footer');?>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="http://j.maxmind.com/app/geoip.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>_assets/<?php echo $theme;?>/js/googlemap.js"></script>

<!-- jQuery Uploader -->
<script src="<?php echo base_url();?>_assets/_jsuploader/js/jquery.knob.js"></script>
<script src="<?php echo base_url();?>_assets/_jsuploader/js/jquery.ui.widget.js"></script>
<script src="<?php echo base_url();?>_assets/_jsuploader/js/jquery.iframe-transport.js"></script>
<script src="<?php echo base_url();?>_assets/_jsuploader/js/jquery.fileupload.js"></script>
<script src="<?php echo base_url();?>_assets/_jsuploader/js/script.js"></script>
<!-- jQuery Uploader -->
<script type="text/javascript" src="<?php echo base_url();?>_assets/_js/custom/global.js"></script>
<script src="<?php echo base_url();?>_assets/<?php echo $theme;?>/js/business_registration.js"></script>
<script src="<?php echo base_url();?>_assets/<?php echo $theme;?>/js/business_registration_steps.js"></script>



<?php include('partials/modals/modal_add_branch.php');?>
<?php include('partials/modals/modal_claim_branch.php');?>