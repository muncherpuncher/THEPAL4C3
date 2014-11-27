<script type="text/javascript" src="http://j.maxmind.com/app/geoip.js"></script>
<script>
 
$(function(){

    var base_url = "<?php echo base_url();?>";
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
           setLatLng();
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

        },1000);

    }

});

</script>


