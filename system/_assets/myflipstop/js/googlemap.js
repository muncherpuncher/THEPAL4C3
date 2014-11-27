
var marker;
var mapOptions;

function loadMap(map_lat,map_lng) 
{
      
    mapOptions = {
      zoom: 16,
      center: new google.maps.LatLng(map_lat,map_lng)
    };

    map = new google.maps.Map(document.getElementById('map-canvas'),
        mapOptions);

    marker = new google.maps.Marker({
      position: new google.maps.LatLng(map_lat,map_lng)
    });

    marker.setMap(map);

}