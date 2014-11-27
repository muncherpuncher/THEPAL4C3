<?php

    
    if($_POST)
    {
        $response = Modules::run('sites_business/update_branch');

    }
    ?>

<div class="panel-heading col-xs-11" style="margin-left:-15px;position:fixed;z-index:2;background:#444445;margin-top:-15px;border:none;height:60px">
       <span class="glyphicon glyphicon-briefcase"></span> &nbsp; Business Detail / Edit </header>
      <input type="button" id="btn-save-branch-info" class="btn btn-primary col-xs-2 pull-right" value="UPDATE" style="margin-right:100px">
</div>
<section class="wrapper">
    <section class="col-lg-12">

         <div class="col-md-10">
                <p class="pull-right"> * Required fields </p>
                <?php 

                $category = Modules::run('tmpl_business_categories/get_info_by_id',$business_info['category']);
               

                ?>
                 <form method="POST" action="" class="inline-form" id="form-branch-info">
                    <strong> STORE / BRANCH INFORMATION </strong>
                    <div class="col-md-12">
                        
                        <div class="form-group col-xs-12">
                        <label for="fd_name"> * Name of Business as you would like it to appear </label>
                        <input style="" class="form-control" name="branch_name" placeholder="" autofocus="" type="text" value="<?php echo isset($business_info['name']) == 1 ? $business_info['name'] : '';?>">
                        <span class="field-status-error"></span>
                        </div>
                        <div class="form-group col-xs-12">
                        <label for="fd_address_1"> * Address </label>
                        <input class="form-control" name="address" placeholder="" autofocus="" type="text" value="<?php echo isset($business_info['address']) == 1 ? $business_info['address'] : '';?>">
                        <span class="field-status-error"></span>
                        </div>
                        <div class="form-group col-xs-7">
                        <label for="fd_city"> * City </label>
                        <input  class="form-control" name="city" placeholder="" autofocus="" type="text" value="<?php echo isset($business_info['city']) == 1 ? $business_info['city'] : '';?>">
                        <span class="field-status-error"></span>
                        </div>
                        <div class="form-group col-xs-3">
                        <label for="fd_state"> * State </label>
                        <input  class="form-control" name="state" placeholder="" autofocus="" type="text" value="<?php echo isset($business_info['state']) == 1 ? $business_info['state'] : '';?>">
                        <span class="field-status-error"></span>
                        </div>
                        <div class="form-group col-xs-2">
                        <label for="fd_postal_code"> * Zip code </label>
                        <input class="form-control" name="postal_code" placeholder="" autofocus="" type="text" value="<?php echo isset($business_info['postal_code']) == 1 ? $business_info['postal_code'] : '';?>">
                        <span class="field-status-error"></span>
                        </div>
                        <div class="form-group col-xs-4">
                        <label for="fd_country"> * Country </label>
                        <select class="form-control" name="country">
                            <option value=""> Select Country </option>
                            <option value="Philippines"> Philippines </option>
                            <option value="USA"> USA </option>
                            <option value="Canada"> Canada </option>
                        </select>
                        <span class="field-status-error"></span>
                        </div>
                        <div class="clearfix col-xs-12">
                        </div>
                        <div class="form-group col-xs-4">
                        <label for="fd_category"> * Main Business Category </label>

                        <select class="form-control" name="business_category">

                            <?php foreach ($list_business_categories_parent->result() as $key):?>
                            <option value="<?php echo $key->id;?>"> <?php echo $key->name;?> </option>
                            <?php endforeach;?>

                        </select>
                        <span class="field-status-error"></span>
                        </div>
                        <div class="form-group col-xs-4">
                        <label for="fd_sub_category"> * Sub-Category </label>
                        <select class="form-control" name="business_sub_category">
                            <option value=""> Select </option>
                        </select>
                        <span class="field-status-error"></span>
                        </div>
                        <div class="clearfix col-xs-12">
                        </div>
                        <div class="form-group col-xs-4">
                        <label for="fd_postal_code"> Phone Number </label>
                        <input class="form-control" name="phone_number" placeholder="" autofocus="" type="text" value="<?php echo isset($business_info['phone_number']) == 1 ? $business_info['phone_number'] : '';?>">
                        <span class="field-status-error"></span>
                        </div>
                        <div class="form-group col-xs-4">
                        <label for="fd_postal_code"> Fax Number </label>
                        <input class="form-control" name="fax_number" placeholder="" autofocus="" type="text" value="<?php echo isset($business_info['fax_number']) == 1 ? $business_info['fax_number'] : '';?>">
                        <span class="field-status-error"></span>
                        </div>
                        <div class="clearfix col-xs-12">
                        </div>
                        <div class="form-group col-xs-4">
                        <label for="fd_postal_code"> Mobile Number </label>
                        <input class="form-control" name="mobile_number" placeholder="" autofocus="" type="text" value="<?php echo isset($business_info['mobile_number']) == 1 ? $business_info['mobile_number'] : '';?>">
                        <span class="field-status-error"></span>
                        </div>
                        <div class="form-group col-xs-4">
                        <label for="fd_postal_code"> Web Address or URL </label>
                        <input class="form-control" name="web_url" placeholder="" autofocus="" type="text" value="<?php echo isset($business_info['web_url']) == 1 ? $business_info['web_url'] : '';?>">
                        <span class="field-status-error"></span>
                        </div>
                        <div class="form-group col-xs-4">
                        </div>
                    </div>

            </div>
            <div class="col-xs-11" id="map-container">
                    <strong>GEO LOCATION</strong>  
                    <small class="col-xs-12"> 
                        Kindly confirm geo location prompt message to initially go to your location.
                        Drag the marker to locate your exact location.
                        <br><br>
                    </small>


                    <a href="javascript:void(0)" class="btn btn-primary pull-right" style="color:#ffffff;margin:3px;" id="btn-geo-biz-address"> Locate Address </a>
                    <a href="javascript:void(0)" class="btn btn-primary pull-right" style="color:#ffffff;margin:3px;" id="btn-geo-user-location"> Current Location </a>
                    <input type="hidden" name="geo_lat" id="latitude" placeholder="latitude" value="<?php echo isset($business_info['gmap_lat']) == 1 ? $business_info['gmap_lat'] : '';?>">
                    <input type="hidden" name="geo_lng"  id="longitude" placeholder="longitude" value="<?php echo isset($business_info['gmap_lng']) == 1 ? $business_info['gmap_lng'] : '';?>">
                    <div id="map" class="col-xs-12" style="height:350px;border:1px solid #ccc"></div>


            </div>
            <div class="clearfix"></div>
            <div class="col-xs-12">
                    <br><br>
                    <strong>SELECT YOUR FLIPTOP TILE SIZE</strong>
                    <div class="form-group">

                            <div class="col-md-1">
                                Single <input type="radio" value="single" name="adimage-size" checked>
                            </div>
                            <div class="col-md-2">
                                <h5>$<?php echo $adprice_single->row()->price;?></h5>
                                <div id="ad-tile-single"></div>
                            </div>
  
                    </div>   
                    <div class="form-group"> 

                            <div class="col-md-1">
                                Double <input type="radio" value="double" name="adimage-size">
                            </div>
                            <div class="col-md-2">
                                <h5>$<?php echo $adprice_double->row()->price;?></h5>
                                <div id="ad-tile-double"></div>
                            </div>

                    </div>       
                    <div>    
                            <div class="col-md-offset-1 col-md-1">
                                Quadruple <input type="radio" value="quad" name="adimage-size"> 
                            </div>
                            <div class="col-md-2">
                                <h5>$<?php echo $adprice_quad->row()->price;?></h5>
                                <div id="ad-tile-quad"></div>  
                            </div>
                           
                    </div>
            </div>


            <div class="col-xs-8" style="margin-top:400px;z-index:1">
                    <br><br><br><br>
                    <div class="col-xs-12">
                        <strong> BUSINESS DESCRIPTION </strong>
                    </div>
                    <div class="form-group col-xs-12">
                           <label for="biz-description"> ( max. 600 Characters )  </label>
                           <textarea class="form-control" name="biz-description" style="margin-left:-2px;height:130px"><?php echo $business_info['description'];?></textarea>
                           <span class="field-status-error"></span>
                           <span style="color:#E59B3F" class="countdown"></span>  
                    </div>   
                    
            </div>

            <input name="upload-image-name" type="hidden"> 

            <div class="col-xs-12" style="margin-top:0px;z-index:1;margin-bottom:40px">
                <h1 class="subpage-header-white"> BUSINESS HOURS </h1>
                <div class="container">            
                    <div class="row">
                      <label class="col-md-1" style="text-align:right"> Monday </label>
                      <div class="col-xs-4">
                        <select class="" name="monday_from_time"> 
                          <?php for ($i=1; $i < 13; $i++):?>
                          <?php $num = 0;
                          if($i < 10) { $i = '0'.$i; }
                          ?>
                          <option <?php echo $business_hours_monday_from == ($i. ' am') ? 'selected' : '';?> > <?php echo $i;?> AM </option>
                          <?php endfor;?>

                          <?php for ($i=1; $i < 13; $i++):?>
                          <?php $num = 0;
                          if($i < 10) { $i = '0'.$i; }
                          ?>
                          <option <?php echo $business_hours_monday_from == ($i. ' pm') ? 'selected' : '';?>> <?php echo $i;?> PM </option>
                          <?php endfor;?>
                        </select>
                        -
                        <select class="" name="monday_to_time"> 
                          <?php for ($i=1; $i < 13; $i++):?>
                          <?php $num = 0;
                          if($i < 10) { $i = '0'.$i; }
                          ?>
                          <option <?php echo $business_hours_monday_to == ($i. ' am') ? 'selected' : '';?>> <?php echo $i;?> AM </option>
                          <?php endfor;?>
                          <?php for ($i=1; $i < 13; $i++):?>
                          <?php $num = 0;
                          if($i < 10) { $i = '0'.$i; }
                          ?>
                          <option <?php echo $business_hours_monday_to == ($i. ' pm') ? 'selected' : '';?>> <?php echo $i;?> PM </option>
                          <?php endfor;?> 
                        </select>
                        - 
                        <select class="" name="monday_availability"> 
                              <option value="open" <?php echo $business_info['business_hours_monday_availability'] == "open" ? 'selected' : '';?>> Open </open>
                              <option value="close" <?php echo $business_info['business_hours_monday_availability'] == "close" ? 'selected' : '';?>> Close </open>
                        </select>
                      </div>
                    </div>
                    <div class="row">
                      <label class="col-md-1" style="text-align:right"> Tuesday </label>
                      <div class="col-xs-4">
                        <select class="" name="tuesday_from_time"> 
                          <?php for ($i=1; $i < 13; $i++):?>
                          <?php $num = 0;
                          if($i < 10) { $i = '0'.$i; }
                          ?>
                          <option <?php echo $business_hours_tuesday_from == ($i. ' am') ? 'selected' : '';?> > <?php echo $i;?> AM </option>
                          <?php endfor;?>

                          <?php for ($i=1; $i < 13; $i++):?>
                          <?php $num = 0;
                          if($i < 10) { $i = '0'.$i; }
                          ?>
                          <option <?php echo $business_hours_tuesday_from == ($i. ' pm') ? 'selected' : '';?>> <?php echo $i;?> PM </option>
                          <?php endfor;?>
                        </select>
                        -
                        <select class="" name="tuesday_to_time"> 
                          <?php for ($i=1; $i < 13; $i++):?>
                          <?php $num = 0;
                          if($i < 10) { $i = '0'.$i; }
                          ?>
                          <option <?php echo $business_hours_tuesday_to == ($i. ' am') ? 'selected' : '';?> > <?php echo $i;?> AM </option>
                          <?php endfor;?>

                          <?php for ($i=1; $i < 13; $i++):?>
                          <?php $num = 0;
                          if($i < 10) { $i = '0'.$i; }
                          ?>
                          <option <?php echo $business_hours_tuesday_to == ($i. ' pm') ? 'selected' : '';?>> <?php echo $i;?> PM </option>
                          <?php endfor;?>
                        </select>
                        - 
                        <select class="" name="tuesday_availability"> 
                            <option value="open" <?php echo $business_info['business_hours_tuesday_availability'] == "open" ? 'selected' : '';?>> Open </open>
                            <option value="close" <?php echo $business_info['business_hours_tuesday_availability'] == "close" ? 'selected' : '';?>> Close </open>
                        </select>
                       
                      </div>
                    </div>
                    <div class="row">
                      <label class="col-md-1" style="text-align:right"> Wednesday </label>
                      <div class="col-xs-4">
                        <select class="" name="wednesday_from_time"> 
                          <?php for ($i=1; $i < 13; $i++):?>
                          <?php $num = 0;
                          if($i < 10) { $i = '0'.$i; }
                          ?>
                          <option <?php echo $business_hours_wednesday_from == ($i. ' am') ? 'selected' : '';?> > <?php echo $i;?> AM </option>
                          <?php endfor;?>

                          <?php for ($i=1; $i < 13; $i++):?>
                          <?php $num = 0;
                          if($i < 10) { $i = '0'.$i; }
                          ?>
                          <option <?php echo $business_hours_wednesday_from == ($i. ' pm') ? 'selected' : '';?>> <?php echo $i;?> PM </option>
                          <?php endfor;?>
                        </select>
                        
                        -
                        <select class="" name="wednesday_to_time"> 
                          <?php for ($i=1; $i < 13; $i++):?>
                          <?php $num = 0;
                          if($i < 10) { $i = '0'.$i; }
                          ?>
                          <option <?php echo $business_hours_wednesday_to == ($i. ' am') ? 'selected' : '';?> > <?php echo $i;?> AM </option>
                          <?php endfor;?>

                          <?php for ($i=1; $i < 13; $i++):?>
                          <?php $num = 0;
                          if($i < 10) { $i = '0'.$i; }
                          ?>
                          <option <?php echo $business_hours_wednesday_to == ($i. ' pm') ? 'selected' : '';?>> <?php echo $i;?> PM </option>
                          <?php endfor;?>
                        </select>
                        -
                        <select class="" name="wednesday_availability"> 
                            <option value="open" <?php echo $business_info['business_hours_wednesday_availability'] == "open" ? 'selected' : '';?>> Open </open>
                            <option value="close" <?php echo $business_info['business_hours_wednesday_availability'] == "close" ? 'selected' : '';?>> Close </open>
                        </select>
                        
                      </div>
                    </div>
                    <div class="row">
                      <label class="col-md-1" style="text-align:right"> Thursday </label>
                      <div class="col-xs-4">
                        <select class="" name="thursday_from_time"> 
                          <?php for ($i=1; $i < 13; $i++):?>
                          <?php $num = 0;
                          if($i < 10) { $i = '0'.$i; }
                          ?>
                          <option <?php echo $business_hours_thursday_from == ($i. ' am') ? 'selected' : '';?> > <?php echo $i;?> AM </option>
                          <?php endfor;?>

                          <?php for ($i=1; $i < 13; $i++):?>
                          <?php $num = 0;
                          if($i < 10) { $i = '0'.$i; }
                          ?>
                          <option <?php echo $business_hours_thursday_from == ($i. ' pm') ? 'selected' : '';?>> <?php echo $i;?> PM </option>
                          <?php endfor;?>                  
                        </select>
                        -
                        <select class="" name="thursday_to_time"> 
                          <?php for ($i=1; $i < 13; $i++):?>
                          <?php $num = 0;
                          if($i < 10) { $i = '0'.$i; }
                          ?>
                          <option <?php echo $business_hours_thursday_to == ($i. ' am') ? 'selected' : '';?> > <?php echo $i;?> AM </option>
                          <?php endfor;?>

                          <?php for ($i=1; $i < 13; $i++):?>
                          <?php $num = 0;
                          if($i < 10) { $i = '0'.$i; }
                          ?>
                          <option <?php echo $business_hours_thursday_to == ($i. ' pm') ? 'selected' : '';?>> <?php echo $i;?> PM </option>
                          <?php endfor;?>                   
                        </select>
                        -
                        <select class="" name="thursday_availability"> 
                            <option value="open" <?php echo $business_info['business_hours_thursday_availability'] == "open" ? 'selected' : '';?>> Open </open>
                            <option value="close" <?php echo $business_info['business_hours_thursday_availability'] == "close" ? 'selected' : '';?>> Close </open>
                        </select>
                      </div>
                    </div>
                    <div class="row">
                      <label class="col-md-1" style="text-align:right"> Friday </label>
                      <div class="col-xs-4">
                        <select class="" name="friday_from_time"> 
                          <?php for ($i=1; $i < 13; $i++):?>
                          <?php $num = 0;
                          if($i < 10) { $i = '0'.$i; }
                          ?>
                          <option <?php echo $business_hours_friday_from == ($i. ' am') ? 'selected' : '';?> > <?php echo $i;?> AM </option>
                          <?php endfor;?>

                          <?php for ($i=1; $i < 13; $i++):?>
                          <?php $num = 0;
                          if($i < 10) { $i = '0'.$i; }
                          ?>
                          <option <?php echo $business_hours_friday_from == ($i. ' pm') ? 'selected' : '';?>> <?php echo $i;?> PM </option>
                          <?php endfor;?> 
                        </select>
                        -
                        <select class="" name="friday_to_time"> 
                          <?php for ($i=1; $i < 13; $i++):?>
                          <?php $num = 0;
                          if($i < 10) { $i = '0'.$i; }
                          ?>
                          <option <?php echo $business_hours_friday_to == ($i. ' am') ? 'selected' : '';?> > <?php echo $i;?> AM </option>
                          <?php endfor;?>

                          <?php for ($i=1; $i < 13; $i++):?>
                          <?php $num = 0;
                          if($i < 10) { $i = '0'.$i; }
                          ?>
                          <option <?php echo $business_hours_friday_to == ($i. ' pm') ? 'selected' : '';?>> <?php echo $i;?> PM </option>
                          <?php endfor;?>
                        </select>
                        -
                        <select class="" name="friday_availability"> 
                            <option value="open" <?php echo $business_info['business_hours_friday_availability'] == "open" ? 'selected' : '';?>> Open </open>
                            <option value="close" <?php echo $business_info['business_hours_friday_availability'] == "close" ? 'selected' : '';?>> Close </open>
                        </select>
                        
                        
                      </div>
                    </div>
                    <div class="row">
                      <label class="col-md-1" style="text-align:right"> Saturday </label>
                      <div class="col-xs-4">
                        <select class="" name="saturday_from_time"> 
                          <?php for ($i=1; $i < 13; $i++):?>
                          <?php $num = 0;
                          if($i < 10) { $i = '0'.$i; }
                          ?>
                          <option <?php echo $business_hours_saturday_from == ($i. ' am') ? 'selected' : '';?> > <?php echo $i;?> AM </option>
                          <?php endfor;?>

                          <?php for ($i=1; $i < 13; $i++):?>
                          <?php $num = 0;
                          if($i < 10) { $i = '0'.$i; }
                          ?>
                          <option <?php echo $business_hours_saturday_from == ($i. ' pm') ? 'selected' : '';?>> <?php echo $i;?> PM </option>
                          <?php endfor;?>
                        </select>
                        -
                        <select class="" name="saturday_to_time"> 
                          <?php for ($i=1; $i < 13; $i++):?>
                          <?php $num = 0;
                          if($i < 10) { $i = '0'.$i; }
                          ?>
                          <option <?php echo $business_hours_saturday_to == ($i. ' am') ? 'selected' : '';?> > <?php echo $i;?> AM </option>
                          <?php endfor;?>

                          <?php for ($i=1; $i < 13; $i++):?>
                          <?php $num = 0;
                          if($i < 10) { $i = '0'.$i; }
                          ?>
                          <option <?php echo $business_hours_saturday_to == ($i. ' pm') ? 'selected' : '';?>> <?php echo $i;?> PM </option>
                          <?php endfor;?>
                        </select>
                        -
                        <select class="" name="saturday_availability"> 
                            <option value="open" <?php echo $business_info['business_hours_saturday_availability'] == "open" ? 'selected' : '';?>> Open </open>
                            <option value="close" <?php echo $business_info['business_hours_saturday_availability'] == "close" ? 'selected' : '';?>> Close </open>
                        </select>
                      </div>
                    </div>
                    <div class="row">
                      <label class="col-md-1" style="text-align:right"> Sunday </label>
                      <div class="col-xs-4">
                        <select class="" name="sunday_from_time"> 
                          <?php for ($i=1; $i < 13; $i++):?>
                          <?php $num = 0;
                          if($i < 10) { $i = '0'.$i; }
                          ?>
                          <option <?php echo $business_hours_sunday_from == ($i. ' am') ? 'selected' : '';?> > <?php echo $i;?> AM </option>
                          <?php endfor;?>

                          <?php for ($i=1; $i < 13; $i++):?>
                          <?php $num = 0;
                          if($i < 10) { $i = '0'.$i; }
                          ?>
                          <option <?php echo $business_hours_sunday_from == ($i. ' pm') ? 'selected' : '';?>> <?php echo $i;?> PM </option>
                          <?php endfor;?>
                        </select>
                        -
                        <select class="" name="sunday_to_time"> 
                          <?php for ($i=1; $i < 13; $i++):?>
                          <?php $num = 0;
                          if($i < 10) { $i = '0'.$i; }
                          ?>
                          <option <?php echo $business_hours_sunday_to == ($i. ' am') ? 'selected' : '';?> > <?php echo $i;?> AM </option>
                          <?php endfor;?>

                          <?php for ($i=1; $i < 13; $i++):?>
                          <?php $num = 0;
                          if($i < 10) { $i = '0'.$i; }
                          ?>
                          <option <?php echo $business_hours_sunday_to == ($i. ' pm') ? 'selected' : '';?>> <?php echo $i;?> PM </option>
                          <?php endfor;?>
                        </select>
                        -
                        <select class="" name="sunday_availability"> 
                            <option value="open" <?php echo $business_info['business_hours_sunday_availability'] == "open" ? 'selected' : '';?>> Open </open>
                            <option value="close" <?php echo $business_info['business_hours_sunday_availability'] == "close" ? 'selected' : '';?>> Close </open>
                        </select>
                      </div>
                    </div>                 
                </div>                   
            </div>
            <input type="hidden" value="<?php echo $business_info['business_id'];?>" name="business_id">

            </form>
                <div class="col-xs-offset-2 col-md-6" style="position:absolute;margin-top:500px;margin-left:5px">
                    <strong> UPLOAD IMAGE </strong>
                    <div id="image-box"></div>
                    <div id="image-box-holder">
                        <img id="imgbox" src="<?php echo isset($business_info['image_filename']) == TRUE ? $business_info['image_filename'] : '';?>">
                    </div>
                    <!-- <div class="btn btn-primary" id="ZoomIn"> + </div>
                    <div class="btn btn-primary" id="ZoomOut"> - </div> -->
                    <form id="upload" method="post" action="<?php echo base_url();?>media/jsuploader_temp" enctype="multipart/form-data">
                        <div id="drop">
                            <a id="browse-link">Drop/Browse</a>
                            <input type="file" name="upl"/>
                        </div>
                        <span class="field-status-error"></span>

                    </form>
                    
                    <a  class="btn btn-primary btn-sm" id="remove-link"> Remove image </a>
                     <div class="page-margin-top"></div>
                     <div class="page-margin-top"></div>
                </div>
        
             
                 
                </div>
    </section>         
</section>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="http://j.maxmind.com/app/geoip.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>_assets/_js/custom/googlemap.js"></script>  
<script type="text/javascript" src="<?php echo base_url();?>_assets/_js/custom/global.js"></script>  

<script>

var max_biz_desc_text = 600;

$("#btn-geo-user-location").click(function(){

    latitude = geoip_latitude();
    longitude = geoip_longitude();
    $("#latitude").val(latitude);
    $("#longitude").val(longitude);
    loadMap();
});

$("#btn-geo-biz-address").click(function(){
  viewMapAddress();        
});

$("select[name='business_category']").change(function(){
  getBizSubCategories($(this).val());
});

$("#btn-save-branch-info").click(function(){

      var error = 0;
                                 
      if(branch_name.val() == '') {
          branch_name.next().show().html('* Required');
          error = 1;
      } else {
          branch_name.next().html('');
      }

      if(address.val() == '') {
          address.next().show().html('* Required');
          error = 1;
      } else {
          address.next().html('');
      }

      if(state.val() == '') {
          state.next().show().html('* Required');
          error = 1;
      } else {
          state.next().html('');
      }

      if(city.val() == '') {
          city.next().show().html('* Required');
          error = 1;
      } else {
          city.next().html('');
      }

      if(postal_code.val() == '') {
          postal_code.next().show().html('* Required');
          error = 1;
      } else {
          postal_code.next().html('');
      }

      if(business_category.val() == '') {
          business_category.next().show().html('* Required');
          error = 1;
      } else {
          business_category.next().hide().html('');
      }

      if(business_sub_category.val() == '') {
          business_sub_category.next().show().html('* Required');
          error = 1;
      } else {
          business_sub_category.next().hide().html('');
      }

      if(city_dropdown.val() == '') {
          city_dropdown.next().show().html('* Required');
          error = 1;
      } else {
          city_dropdown.next().html('');
      }


      if(max_biz_desc_text > 600) {
          biz_description.next().show().html('* Max characters reached, Please limit description to 600 characters');
          error = 1;
      } else {
          biz_description.next().html('');
      }

      if(branch_image_active == 0) {
          $("#drop").next().show().html('* Please select ad image');
          error = 1;
      } else {
          $("#drop").next().html('');
      }
      

      $("#form-branch-info").submit();
});


viewMapAddress();

function viewMapAddress()
{
        var address = $("#form-branch-info input[name='address']");
        var city = $("#form-branch-info input[name='city']");
        var state = $("#form-branch-info input[name='state']");
        var postal_code = $("#form-branch-info input[name='postal_code']");
        
        if(address.val() == "" &&  city.val() == "" && state.val() == "" && postal_code.val() == "")
        {
            alert("Please specify complete address");
        }
        else
        {   
            var strGeo = address.val() + ',' + city.val() + ',' + state.val() + ',' + postal_code.val();
            geoCodeAddress(encodeURIComponent(strGeo));
        }
}


function getBizSubCategories(parent_id)
{
  
        $.ajax({
            url: base_url + "tmpl_business_categories/get_list_child_by_parent_id",
            type: "POST",
            data: { parent_id : parent_id},
            dataType: "json",
            async: false,
            success: function(data, textStatus, jqXHR)
            {   
                $("select[name='business_sub_category']").html('<option value=""> Select </option>');
                $.each(data, function(i,k) {
                    $("select[name='business_sub_category']").append('<option value="'+ data[i].category_id +'">'+ data[i].category +'</option>');
                 });
            }, 
            error: function (jqXHR, textStatus, errorThrown)
            {
              
            }
        });

}

setCategoryInfo(<?php echo $category->row()->parent;?>,<?php echo $category->row()->id;?>);

function setCategoryInfo(category_id,sub_category_id)
{
    business_category.val(category_id);
    getBizSubCategories(category_id);
    business_sub_category.val(sub_category_id);
   
}


</script>


