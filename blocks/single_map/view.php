<?php defined('C5_EXECUTE') or die("Access Denied.");
?>

<div class="single-map" data-map-lat="<?=$lat?>" data-map-lng="<?=$lng?>" data-map-url="<?=$customLink ?>">
    <div class="map"></div>
</div>
<script>
 function initMap() {
     console.log("Map initiated");
     var mapLat = $('.single-map').data('map-lat');
     var mapLng = $('.single-map').data('map-lng');
     var mapURL = $('.single-map').data('map-url');
     var latLng = {lat: mapLat, lng: mapLng};
     console.log("lat is " + mapLat);
     console.log("lng is " + mapLat);
     var map = new GMaps({
         div: '.map',
         lat: mapLat,
         lng: mapLng,
         scrollwheel: false,
         draggable: false,
         zoom: 17,
         styles: [{"featureType":"landscape","stylers":[{"hue":"#FFBB00"},{"saturation":43.400000000000006},{"lightness":37.599999999999994},{"gamma":1}]},{"featureType":"road.highway","stylers":[{"hue":"#FFC200"},{"saturation":-61.8},{"lightness":45.599999999999994},{"gamma":1}]},{"featureType":"road.arterial","stylers":[{"hue":"#FF0300"},{"saturation":-100},{"lightness":51.19999999999999},{"gamma":1}]},{"featureType":"road.local","stylers":[{"hue":"#FF0300"},{"saturation":-100},{"lightness":52},{"gamma":1}]},{"featureType":"water","stylers":[{"hue":"#0078FF"},{"saturation":-13.200000000000003},{"lightness":2.4000000000000057},{"gamma":1}]},{"featureType":"poi","stylers":[{"hue":"#00FF6A"},{"saturation":-1.0989010989011234},{"lightness":11.200000000000017},{"gamma":1}]}]
     });
     map.addMarker({
         lat: mapLat,
         lng: mapLng,
         url: mapURL
     });
     google.maps.event.addListener(map.markers[0], 'click', function() {
         window.open(
             this.url,
             '_blank'
         );
     });
 }
</script>
