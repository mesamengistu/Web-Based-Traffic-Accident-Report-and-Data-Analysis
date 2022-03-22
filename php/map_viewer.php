<!DOCTYPE html>
<?php

/**
 * Displays location of place in a map with the given longitude and latitude.
 * 
 * $div_id is id of the div element you want to display the map.
 */
function DisplayMap($longitude, $latitude, $div_id) {
   echo '<div id="googleMap" class="map_container">
         </div>';

   echo '<script>
    function myMap() {
   var mapProp = {
      center: new google.maps.LatLng(' . $latitude . ', ' . $longitude . '),
      zoom: 15,
   };
   var map = new google.maps.Map(document.getElementById("' . $div_id . '"), mapProp);
} </script>';

   echo '<script src="https://maps.googleapis.com/maps/api/js?callback=myMap"></script>';
}
?>

<!--Example of how to use this function to display map
<html>
   <head>
      <meta charset="UTF-8">
      <title>Google map viewer</title>  
      <style>
         .map_container{
            width:100%;
            height:480px;
            background-color: #e8e8e8;
         }
      </style>
   </head>
   <body>
      <div id="MapViewer" class="map_container">
         map will be displayed here
      </div>
      <?php //DisplayMap('37.369488', '11.607429', 'MapViewer') ?>
   </body>
</html>

-->

