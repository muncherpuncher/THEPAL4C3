
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="http://j.maxmind.com/app/geoip.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>_assets/_js/custom/googlemap.js"></script>

<!-- jQuery Uploader -->
<script src="<?php echo base_url();?>_assets/_jsuploader/js/jquery.knob.js"></script>
<script src="<?php echo base_url();?>_assets/_jsuploader/js/jquery.ui.widget.js"></script>
<script src="<?php echo base_url();?>_assets/_jsuploader/js/jquery.iframe-transport.js"></script>
<script src="<?php echo base_url();?>_assets/_jsuploader/js/jquery.fileupload.js"></script>
<script src="<?php echo base_url();?>_assets/_jsuploader/js/script.js"></script>
<!-- jQuery Uploader -->

<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>


<?php

$list_business_categories_parent= $this->db->get_where('tpl_business_categories',array('parent'=>''));
$list_business_categories_child = $this->db->get_where('tpl_business_categories',array('parent !='=>''));
$adprice_single = $this->db->get_where('tpl_ad_rates',array('name'=>'single'));
$adprice_double = $this->db->get_where('tpl_ad_rates',array('name'=>'double'));
$adprice_quad = $this->db->get_where('tpl_ad_rates',array('name'=>'quad'));

?>

<!-- Modal Add Store -->
<div style="display: none;" id="modal-claimbranch" class="modal fade in" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
            <h4 class="subpage-header-white"> Claim Advertisement </h4>
          </div>
          <div class="modal-body">
              <form method="POST" action="" class="inline-form" id="form-register-branches">
                <div class="col-xs-12">
                    <div class="form-group col-xs-12">
                      <label for="fd_name"> * Enter Ad ID </label>
                      <input type="text" class="form-control" name="branch_name" placeholder="" autofocus="" type="text" value="">
                      <span class="field-status-error"></span>
                    </div>
                    <div class="form-group col-xs-12">
                       <input type="button" class="btn btn-primary" value="Claim Ad">
                    </div>
                </div>   
              </form>
          </div>
          
      </div>
  </div>

</div>
