<?php

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Simple Map</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      .m{
        height: 400px;
        width: 400px;
        margin : 10px 10px 30px 30px;
        border : 5px solid green;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 10px;
        padding: 0;
      }
    </style>
  </head>
  <body>
    <h3>Simple Map</h3>
    <div class = "m" id="map"></div>

    <h3> Rendering Directions</h3>
    <div class = "m" id="map1"></div>

    <script>
      //SIMPLE MAP
      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 8
        });
        //arg 1: element under which map should be rendered
        //arg2 : center
        //arg 3 :Zoom : lesser number -- zooms out


      //RENDERING DIRECTION
      var directionsService = new google.maps.DirectionsService;
      var directionsDisplay = new google.maps.DirectionsRenderer;
      var map1 = new google.maps.Map(document.getElementById('map1'), {
        zoom: 7,
        center: {lat: 41.85, lng: -87.65}
      });
      directionsDisplay.setMap(map1);

      //For origin and destination, it is better to use lat and lon eg: var chicago = {lat:41.85,lon:-87.43}
      var request = {
        origin: "chicago",
        destination: "indianapolis",
        travelMode: 'DRIVING'
      };

      directionsService.route(request, function(response, status) {
        if (status === 'OK') {
          directionsDisplay.setDirections(response);
        } else {
          window.alert('Directions request failed due to ' + status);
        }
      });
    }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCdVVuyHLspLLxPafEM84cOwzaEL1Ahu0I&callback=initMap"
    async defer></script>
  </body>
</html>
