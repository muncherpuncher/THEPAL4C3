
var checkgeo;
var latitude;
var longitude;
var infoWindow;
var marker;
var zoom = 12;

// Initialize Map View
latitude = geoip_latitude();
longitude = geoip_longitude();

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


function loadMap() 
{

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

