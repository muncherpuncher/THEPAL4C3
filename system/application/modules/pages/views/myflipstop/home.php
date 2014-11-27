
<div class="fs-header-home" style="z-index:1">
<?php include('partials/general/header_page_nav.php');?>
</div>
<div class="col-lg-12"style="z-index:0;padding-top:180px">
      <div id="columns">
        <?php $count = 0;?>
        <?php foreach ($businesses as $key):?> 
        <?php $container_height = $key['image_height'] + 100;?>
          <div  class="pin"  adstatus="<?php echo $key['business_ownership'];?>" id="<?php echo $key['id'];?>" alt="<?php echo  $key['business_name'];?>" distance="<?php echo $key['distance'];?>">
            <div class="pin-image" style="background:url('<?php echo $key['image_filename'];?>') no-repeat;background-size: cover;background-position: center;width:<?php echo ($key['image_width']).'px';?>;height:<?php echo ($key['image_height'] + 60).'px';?>"></div>
            <div class="company-detail-ini" style="width:<?php echo $key['image_width'];?>px"></div>
            <div class="company-detail-content">
              <div class="name" alt="<?php echo $key['business_name'];?>">
               <?php echo $key['business_name'];?>
              </div>
              <div class="industry-type">
                <?php echo  $key['business_category'];?>
              </div> 
              <div class="location pull-right">
               <?php echo $key['distance'];?> mi
              </div>   
            </div>
          </div>
        <?php endforeach;?> 
      </div>
</div>
 
<?php include('partials/modals/modal_business_info.php');?>
<?php include('partials/modals/modal_unclaimed_business_ad.php');?>
<?php include('partials/general/loader_listings.php');?>

<script type="text/javascript" src="http://j.maxmind.com/app/geoip.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="<?php echo base_url();?>_assets/<?php echo $theme;?>/js/googlemap.js"></script>
<script src="<?php echo base_url();?>_assets/myflipstop/js/interactions.js"></script>
<script src="<?php echo base_url();?>_assets/myflipstop/js/listings.js"></script>
<script src="<?php echo base_url();?>_assets/_js/masonry/masonry.pkgd.js"></script>
<script src="<?php echo base_url();?>_assets/_js/masonry/masonry.pkgd.min.js"></script>



