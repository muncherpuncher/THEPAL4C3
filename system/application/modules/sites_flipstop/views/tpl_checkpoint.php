<?php include('js.php');?>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<script type="text/javascript" src="http://j.maxmind.com/app/geoip.js"></script>

<script>
 
$(function(){


    $("#btn-agree-geo").click(function(){
        setLatLng();
    });

    // Check the active Geolocation from time to time
    checkLatLng();

    setInterval(function(){
    checkLatLng();
    },1000);

    function checkLatLng()
    {
        fs_lat_check = readCookie("fs_lat");
        fs_lng_check = readCookie("fs_lng");

        if(typeof fs_lat_check == 'undefined')
        {
            return false;
        }
        else
        {
            window.location.href = base_url;
            
        }
    }

    function readCookie(name) {
    name += '=';
    for (var ca = document.cookie.split(/;\s*/), i = ca.length - 1; i >= 0; i--)
        if (!ca[i].indexOf(name))
            return ca[i].replace(name, '');
    }


    function setLatLng()
    {
        // Get Lat and Lng from Max Mind
        var lat = geoip_latitude();
        var lon = geoip_longitude();
        
        // Store Lat and Lng to cookie
        document.cookie="fs_lat=" + lat;
        document.cookie="fs_lng=" + lon;

        setTimeout(function(){

           window.location.href = base_url;

        });

    }

});

</script>

<div id="map-canvas" style="display:none"></div>

<div class="full-page top-buffer">
      <div style="width:600px" class="col-lg-6 text-center center-block">
        <form role="form" id="form-signin" method="POST">
                <img src="http://localhost/flipstop/_assets/sites_flipstop/default/img/fs_logo_dark.jpg">
                <br><br>
               
                <div class="border-dotted"></div>
              
                <div class="col-lg-12">

                    <h5>
                      Our site need will get your current location for purpose of browsing businesses near you. <br> Do you agree?
                    </h5>
                    <div class="border-dotted"></div>
                    <br><br>
                    <div class="col-lg-12">
                        
                       <div class="col-lg-4 text-center center-block">
                            <input type="button" id="btn-agree-geo" class="form-control btn-primary" value="Sure, It's fine">
                       </div>

                    </div>

                </div>



          </form>
      </div>

</div>




