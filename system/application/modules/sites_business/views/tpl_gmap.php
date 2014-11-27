<html>
  <head>
    <title>Google Maps Geocoding</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
        #map-canvas{
            height: 400px;
            width: 800px;
        }
        input[type="text"]{
            width: 740px;
        }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script>
        var marker = null;
        var map = null;
         
        function initialize() {
         
          var positioninit = new google.maps.LatLng(48.860818, 2.330260);
           
          var mapOptions = {
            zoom: 4,
            center: positioninit,
            mapTypeId: google.maps.MapTypeId.ROADMAP
          };
 
          map = new google.maps.Map(document.getElementById('map-canvas'),
              mapOptions);
         
        }
 
        google.maps.event.addDomListener(window, 'load', initialize);
 
    </script>
  </head>
  <body>
     
     <br><br><br><br><br><br><br><br><br><br>
    <div>
        <input class="form-control" id="addr" type="text" /><input type="button" value="Search" onclick="searchAddr()" />
    </div>
    <div id="map-canvas"></div>
  </body>
  <script>
    function showLocation(){
        alert('Latitude: ' + marker.position.lat() + '\nLongitude: ' + marker.position.lng());
    }
    function searchAddr(){
        var addrInput = document.getElementById('addr');
        new google.maps.Geocoder().geocode( { 'address': addrInput.value}, function(results, status) {
          if (status == google.maps.GeocoderStatus.OK) {
            if(!marker){
                marker = new map.maps.Marker({
                map: map,
                draggable: true
              });
             google.maps.event.addListener(marker, 'click', showLocation);
            }
            marker.setPosition(results[0].geometry.location);
            map.setCenter(results[0].geometry.location);
            map.setZoom(15)
            addrInput.value = results[0].formatted_address;
          } else {
            alert("Geocode was not successful for the following reason: " + status);
          }
        });
    }
  </script>
</html>