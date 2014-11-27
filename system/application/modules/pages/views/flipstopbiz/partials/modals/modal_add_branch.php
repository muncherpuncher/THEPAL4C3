


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
<div style="display: none;" id="modal-addbranch" class="modal fade in" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
             
              <button type="button" class="close pull-right" data-dismiss="modal" aria-hidden="true">x</button>
              <input type="button" id="btn-addbranches" class="btn btn-primary pull-right col-xs-2" value="    ADD TO LIST    " style="margin-right:1%">
              <h4 class="subpage-header"> ADD YOUR STORE OR BRANCH </h4>

          </div>
          <div class="modal-body">

            <div class="col-md-10">
                <p class="pull-right"> * Required fields </p>
               <!--  <form class="form-inline" role="form">
                                  <div class="form-group">
                                      <label class="sr-only" for="exampleInputEmail2">Email address</label>
                                      <input class="form-control" id="exampleInputEmail2" placeholder="Enter email" type="email">
                                  </div>
                                  <div class="form-group">
                                      <label class="sr-only" for="exampleInputPassword2">Password</label>
                                      <input class="form-control" id="exampleInputPassword2" placeholder="Password" type="password">
                                  </div>
                                  <div class="checkbox">
                                      <label>
                                          <input type="checkbox"> Remember me
                                      </label>
                                  </div>
                                  <button type="submit" class="btn btn-success">Sign in</button>
                              </form> -->
                 <form method="POST" action="" class="inline-form" id="form-register-branches">
                    <h4 class="subpage-header-white"> STORE / BRANCH INFORMATION </h4>
                    <div class="col-xs-12">
                        
                        <div class="form-group col-xs-12">
                        <label for="fd_name"> * Name of Business as you would like it to appear </label>
                        <input style="" class="form-control" name="branch_name" placeholder="" autofocus="" type="text" value="">
                        <span class="field-status-error"></span>
                        </div>
                        <div class="form-group col-xs-12">
                        <label for="fd_address_1"> * Address </label>
                        <input class="form-control" name="address" placeholder="" autofocus="" type="text" value="">
                        <span class="field-status-error"></span>
                        </div>
                        <div class="form-group col-xs-7">
                        <label for="fd_city"> * City </label>
                        <input  class="form-control" name="city" placeholder="" autofocus="" type="text" value="">
                        <span class="field-status-error"></span>
                        </div>
                        <div class="form-group col-xs-3">
                        <label for="fd_state"> * State </label>
                        <input  class="form-control" name="state" placeholder="" autofocus="" type="text" value="">
                        <span class="field-status-error"></span>
                        </div>
                        <div class="form-group col-xs-2">
                        <label for="fd_postal_code"> * Zip code </label>
                        <input class="form-control" name="postal_code" placeholder="" autofocus="" type="text" value="">
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
                            <option value=""> Select </option>
                            <?php foreach ($list_business_categories_parent->result() as $key):?>
                            <option value="<?php echo $key->name;?>"> <?php echo $key->name;?> </option>  
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
                        <input class="form-control" name="phone_number" placeholder="" autofocus="" type="text" value="">
                        <span class="field-status-error"></span>
                        </div>
                        <div class="form-group col-xs-4">
                        <label for="fd_postal_code"> Fax Number </label>
                        <input class="form-control" name="fax_number" placeholder="" autofocus="" type="text" value="">
                        <span class="field-status-error"></span>
                        </div>
                        <div class="clearfix col-xs-12">
                        </div>
                        <div class="form-group col-xs-4">
                        <label for="fd_postal_code"> Mobile Number </label>
                        <input class="form-control" name="mobile_number" placeholder="" autofocus="" type="text" value="">
                        <span class="field-status-error"></span>
                        </div>
                        <div class="form-group col-xs-4">
                        <label for="fd_postal_code"> Web Address or URL </label>
                        <input class="form-control" name="web_url" placeholder="" autofocus="" type="text" value="">
                        <span class="field-status-error"></span>
                        </div>
                        <div class="form-group col-xs-4">
                        </div>
                    </div>

            </div>
            <div class="col-xs-11" id="map-container">
                    <h4 class="subpage-header-white"> GEO LOCATION </h4>  
                    <small class="col-xs-12"> 
                        Kindly confirm geo location prompt message to initially go to your location.
                        Drag the marker to locate your exact location.
                        <br><br>
                    </small>


                    <a href="javascript:void(0)" class="btn btn-primary pull-right" style="color:#ffffff;margin:3px;" id="btn-geo-biz-address"> Locate Address </a>
                    <a href="javascript:void(0)" class="btn btn-primary pull-right" style="color:#ffffff;margin:3px;" id="btn-geo-user-location"> Current Location </a>
                    <input type="text" name="geo_lat" id="latitude" placeholder="latitude">
                    <input type="text" name="geo_lng"  id="longitude" placeholder="longitude">
                    <div id="map" class="col-xs-12" style="height:350px;border:1px solid #ccc"></div>
            </div>
            <div class="clearfix"></div>
            <div class="col-xs-12">
                    <br><br>
                    <h4 class="subpage-header-white"> SELECT YOUR FLIPTOP TILE SIZE </h4>
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
                        <h4 class="subpage-header-white"> BUSINESS DESCRIPTION </h4>  
                    </div>
                    <div class="form-group col-xs-12">
                           <label for="biz-description"> ( max. 600 Characters )  </label>
                           <textarea class="form-control" name="biz-description" style="margin-left:-2px;height:130px"></textarea>
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
                          <option value="<?php echo $i;?> am"> <?php echo $i;?> AM </option>
                          <?php endfor;?>

                          <?php for ($i=1; $i < 13; $i++):?>
                          <?php $num = 0;
                          if($i < 10) { $i = '0'.$i; }
                          ?>
                          <option value="<?php echo $i;?> pm"> <?php echo $i;?> PM </option>
                          <?php endfor;?>
                        </select>
                        -
                        <select class="" name="monday_to_time"> 
                          <?php for ($i=1; $i < 13; $i++):?>
                          <?php $num = 0;
                          if($i < 10) { $i = '0'.$i; }
                          ?>
                          <option value="<?php echo $i;?> am"> <?php echo $i;?> AM </option>
                          <?php endfor;?>

                          <?php for ($i=1; $i < 13; $i++):?>
                          <?php $num = 0;
                          if($i < 10) { $i = '0'.$i; }
                          ?>
                          <option value="<?php echo $i;?> pm"> <?php echo $i;?> PM </option>
                          <?php endfor;?>
                        </select>
                       
                        &nbsp;&nbsp;&nbsp;
                        <label> Availability </label> 
                        <select class="" name="monday_availability"> 
                               <?php include('../general/biz_availability.php');?>
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
                          <option value="<?php echo $i;?> am"> <?php echo $i;?> AM </option>
                          <?php endfor;?>

                          <?php for ($i=1; $i < 13; $i++):?>
                          <?php $num = 0;
                          if($i < 10) { $i = '0'.$i; }
                          ?>
                          <option value="<?php echo $i;?> pm"> <?php echo $i;?> PM </option>
                          <?php endfor;?>
                        </select>
                        
                        -
                        <select class="" name="tuesday_to_time"> 
                          <?php for ($i=1; $i < 13; $i++):?>
                          <?php $num = 0;
                          if($i < 10) { $i = '0'.$i; }
                          ?>
                          <option value="<?php echo $i;?> am"> <?php echo $i;?> AM </option>
                          <?php endfor;?>

                          <?php for ($i=1; $i < 13; $i++):?>
                          <?php $num = 0;
                          if($i < 10) { $i = '0'.$i; }
                          ?>
                          <option value="<?php echo $i;?> pm"> <?php echo $i;?> PM </option>
                          <?php endfor;?>
                        </select>
                        
                        &nbsp;&nbsp;&nbsp;
                        <label> Availability </label> 
                        <select class="" name="tuesday_availability"> 
                               <?php include('../general/biz_availability.php');?>
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
                          <option value="<?php echo $i;?> am"> <?php echo $i;?> AM </option>
                          <?php endfor;?>

                          <?php for ($i=1; $i < 13; $i++):?>
                          <?php $num = 0;
                          if($i < 10) { $i = '0'.$i; }
                          ?>
                          <option value="<?php echo $i;?> pm"> <?php echo $i;?> PM </option>
                          <?php endfor;?>
                        </select>
                        -
                        <select class="" name="wednesday_to_time"> 
                          <?php for ($i=1; $i < 13; $i++):?>
                          <?php $num = 0;
                          if($i < 10) { $i = '0'.$i; }
                          ?>
                          <option value="<?php echo $i;?> am"> <?php echo $i;?> AM </option>
                          <?php endfor;?>

                          <?php for ($i=1; $i < 13; $i++):?>
                          <?php $num = 0;
                          if($i < 10) { $i = '0'.$i; }
                          ?>
                          <option value="<?php echo $i;?> pm"> <?php echo $i;?> PM </option>
                          <?php endfor;?>
                        </select>
                        &nbsp;&nbsp;&nbsp;
                        <label> Availability </label> 
                        <select class="" name="wednesday_availability"> 
                               <?php include('../general/biz_availability.php');?>
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
                          <option value="<?php echo $i;?> am"> <?php echo $i;?> AM </option>
                          <?php endfor;?>

                          <?php for ($i=1; $i < 13; $i++):?>
                          <?php $num = 0;
                          if($i < 10) { $i = '0'.$i; }
                          ?>
                          <option value="<?php echo $i;?> pm"> <?php echo $i;?> PM </option>
                          <?php endfor;?>
                        </select>
                        -
                        <select class="" name="thursday_to_time"> 
                          <?php for ($i=1; $i < 13; $i++):?>
                          <?php $num = 0;
                          if($i < 10) { $i = '0'.$i; }
                          ?>
                          <option value="<?php echo $i;?> am"> <?php echo $i;?> AM </option>
                          <?php endfor;?>

                          <?php for ($i=1; $i < 13; $i++):?>
                          <?php $num = 0;
                          if($i < 10) { $i = '0'.$i; }
                          ?>
                          <option value="<?php echo $i;?> pm"> <?php echo $i;?> PM </option>
                          <?php endfor;?>
                        </select>
                        &nbsp;&nbsp;&nbsp;
                        <label> Availability </label> 
                        <select class="" name="thursday_availability"> 
                               <?php include('../general/biz_availability.php');?>
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
                          <option value="<?php echo $i;?> am"> <?php echo $i;?> AM </option>
                          <?php endfor;?>

                          <?php for ($i=1; $i < 13; $i++):?>
                          <?php $num = 0;
                          if($i < 10) { $i = '0'.$i; }
                          ?>
                          <option value="<?php echo $i;?> pm"> <?php echo $i;?> PM </option>
                          <?php endfor;?>
                        </select>
                        -
                        <select class="" name="friday_to_time"> 
                          <?php for ($i=1; $i < 13; $i++):?>
                          <?php $num = 0;
                          if($i < 10) { $i = '0'.$i; }
                          ?>
                          <option value="<?php echo $i;?> am"> <?php echo $i;?> AM </option>
                          <?php endfor;?>

                          <?php for ($i=1; $i < 13; $i++):?>
                          <?php $num = 0;
                          if($i < 10) { $i = '0'.$i; }
                          ?>
                          <option value="<?php echo $i;?> pm"> <?php echo $i;?> PM </option>
                          <?php endfor;?>
                        </select>
                        &nbsp;&nbsp;&nbsp;
                        <label> Availability </label> 
                        <select class="" name="friday_availability"> 
                               <?php include('../general/biz_availability.php');?>
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
                          <option value="<?php echo $i;?> am"> <?php echo $i;?> AM </option>
                          <?php endfor;?>

                          <?php for ($i=1; $i < 13; $i++):?>
                          <?php $num = 0;
                          if($i < 10) { $i = '0'.$i; }
                          ?>
                          <option value="<?php echo $i;?> pm"> <?php echo $i;?> PM </option>
                          <?php endfor;?>
                        </select>
                        -
                        <select class="" name="saturday_to_time"> 
                            <?php for ($i=1; $i < 13; $i++):?>
                          <?php $num = 0;
                          if($i < 10) { $i = '0'.$i; }
                          ?>
                          <option value="<?php echo $i;?> am"> <?php echo $i;?> AM </option>
                          <?php endfor;?>

                          <?php for ($i=1; $i < 13; $i++):?>
                          <?php $num = 0;
                          if($i < 10) { $i = '0'.$i; }
                          ?>
                          <option value="<?php echo $i;?> pm"> <?php echo $i;?> PM </option>
                          <?php endfor;?>
                        </select>
                        
                        &nbsp;&nbsp;&nbsp;
                        <label> Availability </label> 
                        <select class="" name="saturday_availability"> 
                               <?php include('../general/biz_availability.php');?>
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
                          <option value="<?php echo $i;?> am"> <?php echo $i;?> AM </option>
                          <?php endfor;?>

                          <?php for ($i=1; $i < 13; $i++):?>
                          <?php $num = 0;
                          if($i < 10) { $i = '0'.$i; }
                          ?>
                          <option value="<?php echo $i;?> pm"> <?php echo $i;?> PM </option>
                          <?php endfor;?>
                        </select>
                        -
                        <select class="" name="sunday_to_time"> 
                          <?php for ($i=1; $i < 13; $i++):?>
                          <?php $num = 0;
                          if($i < 10) { $i = '0'.$i; }
                          ?>
                          <option value="<?php echo $i;?> am"> <?php echo $i;?> AM </option>
                          <?php endfor;?>

                          <?php for ($i=1; $i < 13; $i++):?>
                          <?php $num = 0;
                          if($i < 10) { $i = '0'.$i; }
                          ?>
                          <option value="<?php echo $i;?> pm"> <?php echo $i;?> PM </option>
                          <?php endfor;?>
                        </select>
                        &nbsp;&nbsp;&nbsp;
                        <label> Availability </label>
                        <select class="" name="sunday_availability"> 
                               <?php include('../general/biz_availability.php');?>
                        </select>
                      </div>
                    </div>
                 
                </div>
            </div>
            </form>
                <div class="col-xs-offset-2 col-md-6" style="position:absolute;margin-top:500px;margin-left:5px">
                    <h4 class="subpage-header-white"> UPLOAD IMAGE </h4>
                    <div id="image-box"></div>
                    <div id="image-box-holder">
                        <img id="imgbox" src="">
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
            
        

          </div>
          
      </div>
  </div>
  
</div>


