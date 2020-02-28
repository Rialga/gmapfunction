<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Directions Service (Complex)</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #floating-panel {
        position: absolute;
        top: 10%;
        left: 10px;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
      #keterangan{
        position: absolute;
        top: 20%;
        left: 10px;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: left;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
      #klp{
        position: absolute; 
        top: 2%;
        right: 10px;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: left;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }

    </style>
  </head>
  <body>
    <div id="floating-panel">
    <b>Start: </b>
    <select id="start">
      <option value=""> - </option>
      <option value="Sekretariat Himpunan Mahasiswa Sistem Informasi Universitas Andalas, Gedung E Lantai 2, Jl. Universitas Andalas, Limau Manis, Kec. Pauh, Kota Padang, Sumatera Barat 25175">FTI</option>
    </select>
    <b>End: </b>
    <select id="end">
      <option value=""> - </option>
      <option value="3FQ6+M3 Padang, Padang City, West Sumatra" id="Cafe Biro"> Cafe Biro</option>
      <option value="3FP6+VJ Pauh, Padang City, West Sumatra" id="Ampera Jembatan Rizky">Ampera Jembatan Rizky</option>
      <option value="3FP5+P4 Padang, Padang City, West Sumatra" id="RM Uniang Anak">RM Uniang Anak</option>
      <option value="3FP6+82 Padang, Padang City, West Sumatra" id="Cafe Uncu FMIPA">Cafe Uncu FMIPA</option>
      <option value="3FM3+58 Pauh, Padang City, West Sumatra" id="BC Unand">BC Unand</option>
      <option value="3FJ3+89 Padang, Padang City, West Sumatra" id="Pondokan Fadilla">Pondokan Fadilla</option>
      <option value="3FH3+XV Padang, Padang City, West Sumatra" id="Ampera Pak Ded">Ampera Pak Ded</option>
    </select>
    <b id="jarak"></b>
    </div>
    <div id="keterangan">
      <b>Keterangan</b><br>
      <span>A : FTI</span><br>
      <span id="tujuan">B : </span>
    </div>

    <div id="klp">
      <b>Kelompok 1 (A*)</b><br>
      <table>
        <tr>
          <td>Thasya Lara Suci</td>
          <td>1611521011</td>
        </tr>
        <tr>
          <td>Isra Sagita Amelia</td>
          <td>1611521012</td>
        </tr>
        <tr>
          <td>Mutia Octaviany</td>
          <td>1611521017</td>
        </tr>
        <tr>
          <td>Gilang Priyatna Ferdana</td>
          <td>1611521018</td>
        </tr>
        <tr>
          <td>Meysa Putri</td>
          <td>1611522013</td>
        </tr>
        <tr>
          <td>Muhamad Febri Algani</td>
          <td>1611523005</td>
        </tr>
        <tr>
          <td>Murdayani</td>
          <td>1611529002</td>
        </tr>
      </table>
  
    </div>
    <div id="map"></div>
    <!-- &nbsp; -->
    <!-- <div id="warnings-panel"></div> -->

    <script>
      var map;
      var markers = [];
      function initMap() {
        var markerArray = [];
          var noPoi = [
            {
              featureType: 'poi',
              stylers: [ { visibility: 'off' } ]   
            }
        ];

        // Instantiate a directions service.
        var directionsService = new google.maps.DirectionsService;

        // Create a map and center it on Manhattan.
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 15,
          center: {lat: -0.9151259, lng: 100.4604039},
          fullscreenControl: false
        });




        map.setOptions({ styles: noPoi });

        var fti = new google.maps.Marker({
          position : {lat : -0.9153639, lng : 100.4606524},
          label : 'FTI',
          map : map
        });

        var cafebiro = new google.maps.Marker({
          position : {lat : -0.9107801, lng : 100.4602151},
          label : 'Cafe Biro',
          map : map
        });   

        var ajr = new google.maps.Marker({
          position : {lat : -0.9127721, lng : 100.4615474},
          label : 'Ampera Jembatan Rizky',
          map : map
        });    

              
        var unian = new google.maps.Marker({
          position : {lat : -0.9132053, lng : 100.4578707},
          label : 'RM Uniang Anak',
          map : map
        });
 
  
        var unco = new google.maps.Marker({
          position : {lat : -0.9141822, lng : 100.4601091},
          label : 'Cafe Uncu FMIPA',
          map : map
        });


      
        var BC = new google.maps.Marker({
          position : {lat : -0.9170577, lng : 100.4534880},
          label : 'Business Center',
          map : map
        });
   

     
        var PF = new google.maps.Marker({
          position : {lat : -0.9195219, lng : 100.4532128},
          label : 'Pondokan Fadilla',
          map : map
        });
 

  
        var APD = new google.maps.Marker({
          position : {lat : -0.9200535, lng : 100.4546208},
          label : 'Ampera Pak Ded',
          map : map
        });
        

        // Create a renderer for directions and bind it to the map.
        var directionsRenderer = new google.maps.DirectionsRenderer({map: map});

        // Instantiate an info window to hold step text.
        var stepDisplay = new google.maps.InfoWindow;

        // Display the route between the initial start and end selections.
        calculateAndDisplayRoute(
            directionsRenderer, directionsService, markerArray, stepDisplay, map);
        // Listen to change events from the start and end lists.
        var onChangeHandler = function() {
          calculateAndDisplayRoute(
              directionsRenderer, directionsService, markerArray, stepDisplay, map);
              document.getElementById('jarak').innerHTML = "Jarak :";
              document.getElementById('tujuan').innerHTML = "B : ";
        };


        document.getElementById('start').addEventListener('change', onChangeHandler);
        console.log(document.getElementById('start').value);
        document.getElementById('end').addEventListener('change', onChangeHandler);
      }


      function calculateAndDisplayRoute(directionsRenderer, directionsService, markerArray, stepDisplay, map) {
        // First, remove any existing markers from the map.
        for (var i = 0; i < markerArray.length; i++) {
          markerArray[i].setMap(null);
        }

        // Retrieve the start and end locations and create a DirectionsRequest using
        // WALKING directions.
        directionsService.route({
          origin: document.getElementById('start').value,
          destination: document.getElementById('end').value,
          travelMode: 'WALKING'
        }, function(response, status) {
          // Route the directions and pass the response to a function to create
          // markers for each step.
          if (status === 'OK') {
            document.getElementById('jarak').innerHTML += 
            response.routes[0].legs[0].distance.value + " meters";
            document.getElementById('tujuan').innerHTML += document.getElementById('end').options[end.selectedIndex].id;
            // document.getElementById('warnings-panel').innerHTML =
                // '<b>' + response.routes[0].warnings + '</b>';
            directionsRenderer.setDirections(response);
            // showSteps(response, markerArray, stepDisplay, map);
          // } else {
          //   window.alert('Directions request failed due to ' + status);
          }
        });
      }

      function showSteps(directionResult, markerArray, stepDisplay, map) {
        // For each step, place a marker, and add the text to the marker's infowindow.
        // Also attach the marker to an array so we can keep track of it and remove it
        // when calculating new routes.
        var myRoute = directionResult.routes[0].legs[0];
        for (var i = 0; i < myRoute.steps.length; i++) {
          var marker = markerArray[i] = markerArray[i] || new google.maps.Marker;
          marker.setMap(map);
          marker.setPosition(myRoute.steps[i].start_location);
          attachInstructionText(
              stepDisplay, marker, myRoute.steps[i].instructions, map);
        }
      }

      function attachInstructionText(stepDisplay, marker, text, map) {
        google.maps.event.addListener(marker, 'click', function() {
          // Open an info window when the marker is clicked on, containing the text
          // of the step.
          stepDisplay.setContent(text);
          stepDisplay.open(map, marker);
        });
      }



    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNnzxae2AewMUN0Tt_fC3gN38goeLVdVE&libraries=places&callback=initMap" async defer></script>
  </body>
</html>