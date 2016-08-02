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
         zoom: 17
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
