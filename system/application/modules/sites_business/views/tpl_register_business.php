
<?php include('js.php');?>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="http://j.maxmind.com/app/geoip.js"></script>


<div class="full-page-container">
    <div id="map-canvas"></div>
    <div style="height:auto"> 
            <div class="page-margin-top"></div>
            <br>
            <?php include('tpl_registration_steps.php');?> 
            <!-- Start of Registration Form-->
            <form method="POST"  id="form-register">

            <div class="row setup-content" id="step-1">
                <div class="col-xs-12">
                        <div class="col-xs-12">
                            <div class="col-xs-10">
                                <h1 class="subpage-header"> CONTACT INFORMATION </h1>
                                <h6 class="subpage-header-text"> 
                                  New at Flipstop? Fill out the form below.
                                </h6>
                            </div>
                            <div class="col-xs-12"> 
                                <hr class="subpage-divider">
                            </div>

                            
                            <div class="col-xs-10 page-margin-left">
                                        
                                        <div class="form-group col-xs-12">
                                        <p class="pull-right"> * Required fields </p>
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
                                        ( <small> This will serve as your username when you log in </small> )
                                        <input class="form-control" name="email" placeholder="" autofocus="" type="text" value="<?php echo $user_email;?>">
                                        <span class="field-status-error"></span>
                                        </div>
                                        <div class="form-group col-xs-6">
                                        <label for="fd_email"> * Password </label> 
                                        ( <small> 8 Alphanumeric characters </small> )
                                        <input class="form-control" name="password" placeholder="" autofocus="" type="password" value="">
                                        <span class="field-status-error"></span>
                                        </div>
                                        <div class="form-group col-xs-12">
                                        <label for="fd_title"> * Role/Title </label>
                                        <input class="form-control" name="title_role" placeholder="" autofocus="" type="text" value="">
                                        <span class="field-status-error"></span>
                                        </div><div class="form-group col-xs-12">
                                        <label for="fd_address_1"> * Address</label>
                                        <input class="form-control" name="address" placeholder="" autofocus="" type="text" value="">
                                        <span class="field-status-error"></span>
                                        </div>
                                        <div class="form-group col-xs-4">
                                        <label for="fd_city"> * City</label>
                                        <input type="text" class="form-control" name="city" placeholder="" autofocus="" type="text" value="">
                                        <span class="field-status-error"></span>
                                        </div><div class="form-group col-xs-4">
                                        <label for="fd_state">* State</label>
                                        <input type="text" class="form-control" name="state" placeholder="" autofocus="" type="text" value="">
                                        <span class="field-status-error"></span>
                                        </div><div class="form-group col-xs-4">
                                        <label for="fd_postal_code"> * Postal Code </label>
                                        <input type="text" class="form-control" name="postal_code" placeholder="" autofocus="" type="text" value="">
                                        <span class="field-status-error"></span>
                                        </div><div class="form-group col-xs-4">
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
                                            </h5>
                                                <span class="field-status-error"></span>
                                        </div>

                            </div>
                            <div class="col-xs-12 page-margin-bottom"></div>

                        </div>
                        <a id="activate-step-2" class="btn btn-primary btn-lg pull-right"> Next </a>
                    </div>
                </div>
            </div>
            <div class="row setup-content" id="step-2">
                <div class="col-xs-12">
                    <div class="col-md-12">
                        <div class="col-xs-10">
                            <h1 class="subpage-header"> PAYMENT INFORMATION </h1>
                            <h6 class="subpage-header-text"> 
                              New at Flipstop? Fill out the form below.
                            </h6>
                        </div>
                        <div class="col-xs-12"> 
                            <hr class="subpage-divider">
                        </div>
                       
                        <div class="col-xs-8 page-margin-left">
                  
                                    <div class="form-group">
                                    <label for="fd_name"> Name </label>
                                    <input style="width:300px" class="form-control" name="name" placeholder="" autofocus="" type="text" value="name">
                                    </div><div class="form-group">
                                    <label for="fd_number"> Card Number </label>
                                    <input style="width:300px" class="form-control" name="number" placeholder="" autofocus="" type="text" value="number">
                                    </div><div class="form-group">
                                    <label for="fd_holder_name"> Card Holder's Name </label>
                                    <input style="width:300px" class="form-control" name="holder_name" placeholder="" autofocus="" type="text" value="holder_name">
                                    </div><div class="form-group">
                                    <label for="fd_expire_date"> Expiry Date</label>
                                    <input style="width:300px" class="form-control" name="expire_date" placeholder="" autofocus="" type="text" value="expire_date">
                                    </div><div class="form-group">
                                    <label for="fd_csv_code"> CSV Code </label>
                                    <input style="width:300px" class="form-control" name="csv_code" placeholder="" autofocus="" type="text" value="csv_code">
                                    </div>
                                    <input type="submit" class="btn btn-fsbiz-getlink" value="Submit">  
                                    <br><br><br><br><br>
  
                        </div>
                        <input type="submit" id="activate-step-3" class="btn btn-primary btn-lg pull-right" value="Next">  
                    </div>
                </div>
            </div>
            <div class="row setup-content" id="step-3">
                <div class="col-xs-10 col-xs-offset-1">
                    <div class="col-md-12">
                        <div class="col-xs-12" style="margin-bottom:180px;">
                            We have sent the details in your email. Kindly enter your verification code below to complete
                            listing your business. <br>
                            <div class="form-group">
                            <br><br>
                            <label for="fd_expire_date"> Verification Code </label>
                            <input style="width:300px" class="form-control" name="business_verification_code" placeholder="" autofocus="" type="text">
                            <span class="field-status-error"></span>
                            <a id="activate-step-4" class="btn btn-primary btn-lg pull-right"> Next </a>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="row setup-content" id="step-4">
                <div class="col-xs-11" style="margin-left:30px;margin-bottom:200px;">
                    <div class="col-md-12">
                        
                         <div class="container">

                                <div class="row">
                                    <div class="col-sm-6">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th> Description </th>
                                                    <th class="text-center">Sub Total</th>
                                                    <th> </th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbl-branches">
                                                
                                            </tbody>
                                        </table>
                                        <a href="" class="btn btn-warning pull-right" style="color:#ffffff;" data-toggle="modal" data-target="#modal-addbranch ">Add Store/Branch</a>
                                    </div>
                                </div>

                         </div>

                        <a id="activate-step-5" class="btn btn-primary btn-lg pull-right"> Next </a>
                    </div>
                </div>
            </div>

            </form>
            <!-- End of Registration Form-->
            <div class="row setup-content" id="step-5">
                <div class="col-xs-12" style="margin-bottom:230px;">
                    <div class="col-md-12 text-center">
                        <h1 class="text-center"> Your business is listed. Congrats! </h1>
                        <a href="<?php echo base_url();?>" class="btn btn-primary"> Manage Listings </a>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
    
</div>


<!-- Modal Add Store -->
<div style="display: none;" id="modal-addbranch" class="modal fade in" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
             
              <button type="button" class="close pull-right" data-dismiss="modal" aria-hidden="true">x</button>
              <input type="button" id="btn-addbranches" class="btn btn-fsbiz-sigin pull-right col-xs-2" value="    ADD TO LIST    " style="margin-right:1%">
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
                    <div class="col-md-12">
                        
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
                                <?php include('tpl_biz_hours.php');?>
                        </select>
                        <select class="" name="monday_from_period"> 
                                <?php include('tpl_biz_period_am.php');?>
                        </select>
                        -
                        <select class="" name="monday_to_time"> 
                                <?php include('tpl_biz_hours.php');?>
                        </select>
                        <select class="" name="monday_to_period"> 
                                <?php include('tpl_biz_period_pm.php');?>
                        </select>
                      </div>
                    </div>
                        
                    <div class="row">
                      <label class="col-md-1" style="text-align:right"> Tuesday </label>
                      <div class="col-xs-4">
                        <select class="" name="tuesday_from_time"> 
                                <?php include('tpl_biz_hours.php');?>
                        </select>
                        <select class="" name="tuesday_from_period"> 
                                <?php include('tpl_biz_period_am.php');?>
                        </select>
                        -
                        <select class="" name="tuesday_to_time"> 
                                <?php include('tpl_biz_hours.php');?>
                        </select>
                        <select class="" name="tuesday_to_period"> 
                                <?php include('tpl_biz_period_pm.php');?>
                        </select>
                      </div>
                    </div>

                    <div class="row">
                      <label class="col-md-1" style="text-align:right"> Wednesday </label>
                      <div class="col-xs-4">
                        <select class="" name="wednesday_from_time"> 
                                <?php include('tpl_biz_hours.php');?>
                        </select>
                        <select class="" name="wednesday_from_period"> 
                                <?php include('tpl_biz_period_am.php');?>
                        </select>
                        -
                        <select class="" name="wednesday_to_time"> 
                               <?php include('tpl_biz_hours.php');?>
                        </select>
                        <select class="" name="wednesday_to_period"> 
                                <?php include('tpl_biz_period_pm.php');?>
                        </select>
                      </div>
                    </div>

                    <div class="row">
                      <label class="col-md-1" style="text-align:right"> Thursday </label>
                      <div class="col-xs-4">
                        <select class="" name="thursday_from_time"> 
                                <?php include('tpl_biz_hours.php');?>
                        </select>
                        <select class="" name="thursday_from_period"> 
                                <?php include('tpl_biz_period_am.php');?>
                        </select>
                        -
                        <select class="" name="thursday_to_time"> 
                                <?php include('tpl_biz_hours.php');?>
                        </select>
                        <select class="" name="thursday_to_period"> 
                                <?php include('tpl_biz_period_pm.php');?>
                        </select>
                      </div>
                    </div>

                    <div class="row">
                      <label class="col-md-1" style="text-align:right"> Friday </label>
                      <div class="col-xs-4">
                        <select class="" name="friday_from_time"> 
                                <?php include('tpl_biz_hours.php');?>
                        </select>
                        <select class="" name="friday_from_period"> 
                                <?php include('tpl_biz_period_am.php');?>
                        </select>
                        -
                        <select class="" name="friday_to_time"> 
                                <?php include('tpl_biz_hours.php');?>
                        </select>
                        <select class="" name="friday_to_period"> 
                                <?php include('tpl_biz_period_pm.php');?>
                        </select>
                      </div>
                    </div>

                    <div class="row">
                      <label class="col-md-1" style="text-align:right"> Saturday </label>
                      <div class="col-xs-4">
                        <select class="" name="saturday_from_time"> 
                                <?php include('tpl_biz_hours.php');?>
                        </select>
                        <select class="" name="saturday_from_period"> 
                                <?php include('tpl_biz_period_am.php');?>
                        </select>
                        -
                        <select class="" name="saturday_to_time"> 
                                <?php include('tpl_biz_hours.php');?>
                        </select>
                        <select class="" name="saturday_to_period"> 
                                <?php include('tpl_biz_period_pm.php');?>
                        </select>
                      </div>
                    </div>

                    <div class="row">
                      <label class="col-md-1" style="text-align:right"> Sunday </label>
                      <div class="col-xs-4">
                        <select class="" name="sunday_from_time"> 
                                <?php include('tpl_biz_hours.php');?>
                        </select>
                        <select class="" name="sunday_from_period"> 
                                <?php include('tpl_biz_period_am.php');?>
                        </select>
                        -
                        <select class="" name="sunday_to_time"> 
                                <?php include('tpl_biz_hours.php');?>
                        </select>
                        <select class="" name="sunday_to_period"> 
                                <?php include('tpl_biz_period_pm.php');?>
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
  <?php include('tpl_page_footer.php');?>
</div>



<!-- jQuery Uploader -->
<script src="<?php echo base_url();?>_assets/_jsuploader/js/jquery.knob.js"></script>
<script src="<?php echo base_url();?>_assets/_jsuploader/js/jquery.ui.widget.js"></script>
<script src="<?php echo base_url();?>_assets/_jsuploader/js/jquery.iframe-transport.js"></script>
<script src="<?php echo base_url();?>_assets/_jsuploader/js/jquery.fileupload.js"></script>
<script src="<?php echo base_url();?>_assets/_jsuploader/js/script.js"></script>
<!-- jQuery Uploader -->

<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>_assets/_js/custom/global.js"></script>


<script>
   

$(document).ready(function(){
        
    // Description text
    var max_biz_desc_text = 600;

    // Google Map
    var checkgeo;
    var latitude;
    var longitude;
    var infoWindow;
    var marker;
    var zoom = 12;

    // Check for Active session
    check_session();


      // Initialize business description countdown
    updateCountdown();


    $("textarea[name='biz-description']").on('keyup',function(){
        updateCountdown();
    }); 
    $("textarea[name='biz-description']").bind('cut paste change', function(e) { 
        updateCountdown();
    });


  $('#modal-addbranch').modal('hide');
    // $("#image-box").resizable();
    // $("#image-box").draggable();
    $("#imgbox").draggable();
    
    $("#form-register").submit(function(e){
        e.preventDefault();

            showLoader_biz();
            var form_data = $("#form-register").serialize();

            $.ajax({
                url: base_url + "<?php echo Modules::run('tmpl_http_routes/get_list_by_request_code','BA13',HTTP_ROUTE_TYPE);?>",
                type: "POST",
                data: form_data,
                dataType: "json",
                async: false,
                success: function(data, textStatus, jqXHR)
                {

                }, 
                error: function (jqXHR, textStatus, errorThrown)
                {
                  
                }

            });
            hideLoader_biz();
            $('ul.setup-panel li:eq(2)').removeClass('disabled');
            $('ul.setup-panel li a[href="#step-3"]').trigger('click');
    });


    $("#form-register-branches").submit(function(e){
     e.preventDefault();

        var form_data = $("#form-register-branches").serialize();
        var error = 0;

        branch_name = $("#form-register-branches input[name='branch_name']");
        business_description = $("#form-register-branches textarea[name='biz-description']");
        business_category = $("#form-register-branches select[name='business_category']");
        business_sub_category = $("#form-register-branches select[name='business_sub_category']");
        address = $("#form-register-branches input[name='address']");
        city = $("#form-register-branches input[name='city']");
        state = $("#form-register-branches input[name='state']");
        postal_code = $("#form-register-branches input[name='postal_code']");
        city_dropdown = $("#form-register-branches select[name='city_dropdown']");
        web_url = $("#form-register-branches select[name='web_url']");

        error = 0;

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
            business_description.next().show().html('* Max characters reached, Please limit description to 600 characters');
            error = 1;
        } else {
            business_description.next().html('');
        }


        

        if(branch_image_active == 0) {
            $("#drop").next().show().html('* Please select ad image');
            error = 1;
        } else {
            $("#drop").next().html('');
        }

        if(error==0)
        {   

              $.ajax({
                url: base_url + "<?php echo Modules::run('tmpl_http_routes/get_list_by_request_code','BA15',HTTP_ROUTE_TYPE);?>",
                type: "POST",
                data: form_data,
                dataType: "json",
                async: false,
                success: function(data, textStatus, jqXHR)
                {
                        adImageSize = $("input[name='adimage-size']").val();
                        adImageSizeClass ="";

                        switch(adImageSize)
                        {
                            case 'single':
                                adImageSizeClass = "ad-tile-single";
                            break; 
                            case 'double':
                                adImageSizeClass = "ad-tile-double";
                            break;
                            case 'quad':
                                adImageSizeClass = "ad-tile-quad";
                            break;

                        }


                        $("input[name='upload-image-name']").val(branch_image_cover);

                        $("#tbl-branches").append('<tr id="'+data.branch_id+'">' +
                                    '<td class="col-md-6">' +
                                    '<div class="media" id="'+ branch_image_cover +'">'+
                                        '<span class="pull-left" href="#"> <img class="'+adImageSizeClass+'" src="'+base_url + '_assets/_media_uploads/images/business/temp/tiles/' + branch_image_cover +'" style="width: 72px; height: 72px;"> </span>' +
                                        '<div class="media-body">'+
                                            '<h4 class="media-heading">'+ data.branch_name +'</h4>'+
                                        '</div>'+
                                    '</div></td>'+

                                    '<td class="col-md-1" style="text-align: center">'+ data.ad_price +
                                    
                                    '</td>'+

                                    '<td class="col-md-1">'+
                                    '<a href="" class="btn btn-primary pull-right btn-remove-cart-item" style="color:#ffffff" data-toggle="modal" data-target="#modal-removebranch "> Remove </a></td>'+
                                '</tr>');

                        $('#modal-addbranch').modal('hide');
                        $("#remove-link").hide();
                        $("#image-box-holder").hide();
                        $("#browse-link").show();
                        $("#upload").show();
                        branch_image_cover = "";
                        branch_image_active = 0;
                        $("#form-register-branches").trigger('reset');
                  
                }, 
                error: function (jqXHR, textStatus, errorThrown)
                {
                  
                }

            });   

    
        }


           

    });

    $("#btn-addbranches").click(function(){
        $("#form-register-branches").submit();
    });

    

    $(document).on('click','.btn-remove-cart-item',function() {
       
        id = $(this).closest('tr').attr('id');
        $(this).closest('tr').remove();

        $.ajax({
            url: base_url + "<?php echo Modules::run('tmpl_http_routes/get_list_by_request_code','BA18',HTTP_ROUTE_TYPE);?>",
            type: "POST",
            data: { branch_id : id },
            dataType: "json",
            success: function(data, textStatus, jqXHR)
            {
                branch_image_cover = data.image_filename;
            }, 
            error: function (jqXHR, textStatus, errorThrown)
            {
              
            }

        });

        removeCoverImage();

    });


    /*
     Steppy Form
    */

    var navListItems = $('ul.setup-panel li a'),
        allWells = $('.setup-content');

    allWells.hide();

    navListItems.click(function(e)
    {
        e.preventDefault();
        var $target = $($(this).attr('href')),
            $item = $(this).closest('li');
        
        if (!$item.hasClass('disabled')) {
            navListItems.closest('li').removeClass('active');
            $item.addClass('active');
            allWells.hide();
            $target.show();
        }
    });
    
    $('ul.setup-panel li.active a').trigger('click');
    
    $('#activate-step-1').on('click', function(e) {
        //$('ul.setup-panel li:eq(2)').removeClass('disabled');
        $('ul.setup-panel li a[href="#step-1"]').trigger('click');
        
    });

    $('#activate-step-2').on('click', function(e) {


        error = 0;
        var  term_agree = $("input[name='chk_bizagree']").is(":checked");
        var exp = new RegExp('(([a-z])+([0-9]))|(([0-9])+([a-z]))','i');

        lastname = $("#form-register input[name='last_name']");
        firstname = $("#form-register input[name='first_name']");
        business_name = $("#form-register input[name='business_name']");
        email = $("#form-register input[name='email']");
        password = $("#form-register input[name='password']");
        title_role = $("#form-register input[name='title_role']");
        country = $("#form-register select[name='country']");
        address = $("#form-register input[name='address']");
        city = $("#form-register input[name='city']");
        state = $("#form-register input[name='state']");
        postal_code = $("#form-register input[name='postal_code']");
        phone_number = $("#form-register input[name='phone_number']");

        
            if(lastname.val() == '') {
                lastname.next().show().html('* Required');
                error = 1;
            } else {
                lastname.next().hide().html('');
            }

            if(firstname.val() == '') {
                firstname.next().show().html('* Required');
                error = 1;
            } else {
                firstname.next().hide().html('');
            }

            if(business_name.val() == '') {
                business_name.next().show().html('* Required');
                error = 1;
            } else {
                business_name.next().hide().html('');
            }

            if(email.val() == '') {
                email.next().show().html('* Required');
                error = 1;
            } else {
                email.next().hide().html('');
            }

            if(isValidEmail(email.val()) == false) {
                email.next().show().html('* Invalid Email Address');
                error = 1;
            } else {
                email.next().hide().html('');
            }

            checkUserEmail(email.val());
           
            if(isexists == 1)
            {
                email.next().show().html('* Email Address taken. Specify another email');
                error = 1;
            }
            else
            {
                email.next().hide().html('');
            }

            if(password.val() == '') {
                password.next().show().html('* Required');
                error = 1;
            } else {
                password.next().hide().html('');
            }

            if(password.val().length  >= 8 && exp.test(password.val()) == true ) {
                password.next().hide().html('');
            } else {
                password.next().show().html('* Password should be atleast 8 alphanumeric characters');
                error = 1;
            }


            if(title_role.val() == '') {
                title_role.next().show().html('* Required');
                error = 1;
            } else {
                title_role.next().hide().html('');
            }

            if(country.val() == '') {
                country.next().show().html('* Required');
                error = 1;
            } else {
                country.next().hide().html('');
            }

            if(address.val() == '') {
                address.next().show().html('* Required');
                error = 1;
            } else {
                address.next().hide().html('');
            }

            if(city.val() == '') {
                city.next().show().html('* Required');
                error = 1;
            } else {
                city.next().hide().html('');
            }

            if(state.val() == '') {
                state.next().show().html('* Required');
                error = 1;
            } else {
                state.next().hide().html('');
            }

            if(postal_code.val() == '') {
                postal_code.next().show().html('* Required');
                error = 1;
            } else {
                postal_code.next().hide().html('');
            }

            if(phone_number.val() == '') {
                phone_number.next().show().html('* Required');
                error = 1;
            } else {
                phone_number.next().hide().html('');
            }

            if(term_agree == false ) {
                $("input[name='chk_bizagree']").next().show().html('* Required');
                error = 1;
            } else {
                $("input[name='chk_bizagree']").next().hide().html('');
            }
        
            if(error==0)
            {
                $('ul.setup-panel li:eq(1)').removeClass('disabled');
                $('ul.setup-panel li a[href="#step-2"]').trigger('click');
            }

           

    });

    $('#activate-step-3').on('click', function(e) {
        
    });  


    $('#activate-step-4').on('click', function(e) {

        error = 0;
    
        if(business_v_code.val() == '') {
            business_v_code.next().show().html('* Required');
            error = 1;
        } else {
            business_v_code.next().hide().html('');
        }

        if(error==0)
        {
            verifyUserVCode();
            latitude = geoip_latitude();
            longitude = geoip_longitude();
            loadMap();

        }

    });  

    $('#activate-step-5').on('click', function(e) {


        CartTotalItems();

        if(cart_items == 0)
        {
            alert("Please add store/branch items");
        }

        else
        {
            $('ul.setup-panel li').removeClass('active');
            $('ul.setup-panel li:eq(4)').addClass('active');
            $('ul.setup-panel li').addClass('disabled');
            $('#step-4').css('display','none');
            $('#step-5').css('display','block');
            cart_items = 0;
            RegisterBusinessListing();
            
        }

    });      


    
    /*
     Steppy Form
    */


    function verifyUserVCode()
    {
        showLoader_biz();
        // Form data 
        var form_data = $("#form-register").serialize();

        $.ajax({
            url: base_url + "<?php echo Modules::run('tmpl_http_routes/get_list_by_request_code','BA14',HTTP_ROUTE_TYPE);?>",
            type: "POST",
            data: { 'verification_code' : business_v_code.val(), 
                    'email' : $("#form-register input[name='email']").val()
                  },
            dataType: "json",
            success: function(data, textStatus, jqXHR)
            {

                if(data.success == true)
                {
                    business_v_code.next().hide().html('');
                   $('ul.setup-panel li:eq(3)').removeClass('disabled');
                   $('ul.setup-panel li a[href="#step-4"]').trigger('click');

                    $.ajax({
                        url: base_url + "<?php echo Modules::run('tmpl_http_routes/get_list_by_request_code','BA12',HTTP_ROUTE_TYPE);?>", 
                        type: "POST",
                        data: form_data,
                        dataType: "json",
                        success: function(data, textStatus, jqXHR)
                        {

                        }, 
                        error: function (jqXHR, textStatus, errorThrown)
                        {
                          
                        }

                    });
                }
                else
                {
                  
                    business_v_code.next().show().html('* Invalid Verification Code');
                }
            }, 
            error: function (jqXHR, textStatus, errorThrown)
            {
              
            }

        });

        hideLoader_biz();


    }


  
    function hideTileSets()
    {
        $("#ad-tile-single").hide();
        $("#ad-tile-double").hide();
        $("#ad-tile-quad").hide();
    }

    function CartTotalItems()
    {
        $.ajax({
            url: base_url + "<?php echo Modules::run('tmpl_http_routes/get_list_by_request_code','BA19',HTTP_ROUTE_TYPE);?>",
            type: "POST",
            data: '',
            dataType: "json",
            async: false,
            success: function(data, textStatus, jqXHR)
            {

               cart_items = data;


            }, 
            error: function (jqXHR, textStatus, errorThrown)
            {
              
            }

        });
    }


    // function CartClearItems()
    // {
    //     $.ajax({
    //         url: base_url + "cart/clear",
    //         type: "POST",
    //         data: '',
    //         dataType: "json",
    //         async: false,
    //         success: function(data, textStatus, jqXHR)
    //         {

    //         }, 
    //         error: function (jqXHR, textStatus, errorThrown)
    //         {
              
    //         }

    //     });
    // }


    function removeCoverImage()
    {
        $.ajax({
            url: base_url + "<?php echo Modules::run('tmpl_http_routes/get_list_by_request_code','BA17',HTTP_ROUTE_TYPE);?>",
            type: "POST",
            data: { img_filename: branch_image_cover},
            dataType: "json",
            async: false,
            success: function(data, textStatus, jqXHR)
            {

            }, 
            error: function (jqXHR, textStatus, errorThrown)
            {
              
            }

        });
    }

    $("#remove-link").click(function(){

        removeCoverImage();
        $("#remove-link").hide();
        $("#image-box-holder").hide();
        $("#browse-link").show();
        $("#upload").show();
        branch_image_cover = "";
        branch_image_active = 0;
        
    });



    $("input[name='adimage-size']").click(function(){

        switch($(this).val())
        {
            case 'single':
                $("#image-box-holder").css('height','200');
                $("#image-box-holder").css('width','125');
                $("#imgbox").css('height','200');
            break;
            case 'double':
                $("#image-box-holder").css('height','200');
                $("#image-box-holder").css('width','250');
                $("#imgbox").css('height','400');
            break;
            case 'quad':
                $("#image-box-holder").css('height','400');
                $("#image-box-holder").css('width','257');
                $("#imgbox").css('height','400');
            break;
        }
 
    });


    // Check user existance
    function checkUserEmail(email)
    {
        $.ajax({
            url: base_url + "<?php echo Modules::run('tmpl_http_routes/get_list_by_request_code','BA25',HTTP_ROUTE_TYPE);?>",
            type: "POST",
            data: { email : email },
            dataType: "json",
            async: false,
            success: function(data, textStatus, jqXHR)
            {
              if(data.success == false)
              {
                 isexists = 1;
              }
              else
              {
                 isexists = 0;  
              }
            }, 
            error: function (jqXHR, textStatus, errorThrown)
            {
              
            }

        });
    }



    $("#modal-addbranch").on("shown.bs.modal", function () {
        loadMap();
     });


    // Register Business listings

    function RegisterBusinessListing()
    {

         $.ajax({
            url: base_url + "<?php echo Modules::run('tmpl_http_routes/get_list_by_request_code','BA20',HTTP_ROUTE_TYPE);?>",
            type: "POST",
            data: { isajax: 1},
            dataType: "json",
            async: false,
            success: function(data, textStatus, jqXHR)
            {
                console.log(data); 
            }, 
            error: function (jqXHR, textStatus, errorThrown)
            {
              
            }

        });

    }



    function check_session()
    {

        setInterval(function(){

            $.ajax({
                url: base_url + "<?php echo Modules::run('tmpl_http_routes/get_list_by_request_code','BA21',HTTP_ROUTE_TYPE);?>",
                type: "POST",
                data: { isajax: 1},
                dataType: "json",
                async: false,
                success: function(data, textStatus, jqXHR)
                {
     
                    if(data.session_time=="expired")
                    {
                        $("#modal-session-expired").modal('show');
                    }
                    else
                    {
                        $("#modal-session-expired").modal('hide');
                    }


                }, 
                error: function (jqXHR, textStatus, errorThrown)
                {
                  
                }

            });

        },5000);

    }


    // Countdown to business description
    function updateCountdown() {
        
        // 600 is the max message length
        var remaining = 600 - $('textarea[name="biz-description"]').val().length;
   
        

        if(remaining < 0)
        {
            max_biz_desc_text = 0;
            $('.countdown').text('Max characters reached, Please limit description to 600 characters');
        }
        else
        {
            $('.countdown').text(remaining + ' characters remaining.');
        }
    
    }

    // Sessions
    $("#btn-renew-session").click(function(){
        renew_session();
    });
     $("#btn-clear-session").click(function(){
        clear_session();
    });
    


    function renew_session()
    {

         $.ajax({
                url: base_url + "<?php echo Modules::run('tmpl_http_routes/get_list_by_request_code','BA22',HTTP_ROUTE_TYPE);?>",
                type: "POST",
                data: { isajax: 1},
                dataType: "json",
                async: false,
                success: function(data, textStatus, jqXHR)
                {
    

                }, 
                error: function (jqXHR, textStatus, errorThrown)
                {
                  
                }

            });


         $("#modal-session-expired").modal('hide');


    }


    function clear_session()
    {

          $.ajax({
                url: base_url + "<?php echo Modules::run('tmpl_http_routes/get_list_by_request_code','BA23',HTTP_ROUTE_TYPE);?>",
                type: "POST",
                data: { isajax: 1},
                dataType: "json",
                async: false,
                success: function(data, textStatus, jqXHR)
                {
    

                }, 
                error: function (jqXHR, textStatus, errorThrown)
                {
                  
                }

            });


         window.location.href = base_url + 'business';

    }

    $("select[name='business_category']").change(function(){
        getBizSubCategories($(this).val());
    });

    function getBizSubCategories(parent_name)
    {
            $.ajax({
                url: base_url + "<?php echo Modules::run('tmpl_http_routes/get_list_by_request_code','BA16',HTTP_ROUTE_TYPE);?>",
                type: "POST",
                data: { parent : parent_name},
                dataType: "json",
                async: false,
                success: function(data, textStatus, jqXHR)
                {   
                    $("select[name='business_sub_category']").html('<option value=""> Select </option>');
                    $.each(data, function(i,k) {
                        $("select[name='business_sub_category']").append('<option value="'+ data[i].category +'">'+ data[i].category +'</option>');
                     });
                }, 
                error: function (jqXHR, textStatus, errorThrown)
                {
                  
                }
            });

    }


    // Map Point Options Triggers

    $("#btn-geo-biz-address").click(function(){

            var address = $("#form-register-branches input[name='address']");
            var city = $("#form-register-branches input[name='city']");
            var state = $("#form-register-branches input[name='state']");
            var postal_code = $("#form-register-branches input[name='postal_code']");
            
            if(address.val() == "" &&  city.val() == "" && state.val() == "" && postal_code.val() == "")
            {
                alert("Please speficy complete address");
            }
            else
            {   
                var strGeo = address.val() + ',' + city.val() + ',' + state.val() + ',' + postal_code.val();
                geoCodeAddress(encodeURIComponent(strGeo));
            }

            
    });
    $("#btn-geo-user-location").click(function(){

        latitude = geoip_latitude();
        longitude = geoip_longitude();
        loadMap();

    });



    // Location Map
    function loadMap() {

      var myLatlng = new google.maps.LatLng(latitude,longitude);
      
      var myOptions = {
        zoom: zoom,
        center: myLatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      }
      
      map = new google.maps.Map(document.getElementById("map"), myOptions);
      
      marker = new google.maps.Marker({
            position: myLatlng, 
            map: map,
            title: 'Drag me to your location',
            draggable: true,
            draggableCursor: 'url('+ base_url + '_assets/_images/fs_marker.png'+'), auto;',
            icon: base_url + '_assets/_images/fs_marker.png'
      });
        
      google.maps.event.addListener(map, 'center_changed', function() {
        
        var location = map.getCenter();

        latitude = location.lat();
        longitude = location.lng();

        $("#latitude").val(latitude);
        $("#longitude").val(longitude);
        
        placeMarker(location);
     
      });
      
      google.maps.event.addListener(map, 'zoom_changed', function(e) {

            
            zoomLevel = map.getZoom();
      
      });
      google.maps.event.addListener(marker, 'dblclick', function() {

        zoomLevel = map.getZoom()+1;
        if (zoomLevel == 20) {
         zoomLevel = 10;
        }    

        map.setZoom(zoomLevel);
         
      });

      var contentString = '<div id="info-window-content" style="color:#000;width:70%;height:auto;">'+
      '<div id="siteNotice">'+
      '</div>'+
      '<h4 id="firstHeading" class="firstHeading"> Your location </h4>'+
      '<div id="bodyContent">'+
      '<p>'+
      'Drag and drop the marker to point your exact location on the map' +
      '</p>'+
      '</div>'+
      '</div>';

      var infoWindow = new google.maps.InfoWindow({content:contentString});
      infoWindow.open(map, marker);

      google.maps.event.addListener(marker,'dragend',function(e){

        latitude = e.latLng.lat();
        longitude = e.latLng.lng();

        $("#latitude").val(latitude);
        $("#longitude").val(longitude);

      });


    }
    
    function placeMarker(location) {
      var clickedLocation = new google.maps.LatLng(location);
      marker.setPosition(location);
    }


    // window.onload = function(){loadMap();};

    // End of Location Map


    // Locate Business Address
    function geoCodeAddress(strGeo)
    {   

            // Request google geo coding
            var geocodingAPI = "https://maps.googleapis.com/maps/api/geocode/json?address=" + strGeo;
            
            $.getJSON(geocodingAPI, function (json,success,error) {

                // Check if there is a result
                if($.isEmptyObject(error.responseJSON.results))
                {   
                    alert("We didn't find your location based on your address. We will put your current location on the map instead");

                    latitude = geoip_latitude();
                    longitude = geoip_longitude();
                    zoom = 12;
                    loadMap();

                    $("#latitude").val(latitude);
                    $("#longitude").val(longitude);

                }
                else
                {   

                    latitude = json.results[0].geometry.location.lat;
                    longitude = json.results[0].geometry.location.lng;
                    zoom = 16;
                    loadMap();

                    $("#latitude").val(latitude);
                    $("#longitude").val(longitude);
                }

      
            });
    }


    // Check for user leaving the page
    window.onbeforeunload = function(e) {
        e.preventDefault();
         $.ajax({
            url: base_url + "<?php echo Modules::run('tmpl_http_routes/get_list_by_request_code','BA25',HTTP_ROUTE_TYPE);?>",
            type: "POST",
            data: { email : email },
            dataType: "json",
            async: false,
            success: function(data, textStatus, jqXHR)
            {
              if(data > 0)
              {
                isexists = 1;
              }
              else
              {
                isexists = 0;  
              }
            }, 
            error: function (jqXHR, textStatus, errorThrown)
            {
              
            }

        });
    };
    $(window).bind('beforeunload', function(){
      var confLeavePage = confirm('Are you sure you want to leave?');
      
    });
    



}); 

</script>
