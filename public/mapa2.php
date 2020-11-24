<!DOCTYPE html>

<html>
<head>
    <meta name="viewport" content="width=device-width" />
    <title>Find Latitude and Longitude of Draggable Marker Google Maps API</title>
    <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
   <!-- <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBM_X4-4iiGr56sg-V7nlu0LcV6gv6kqoI"></script>-->

   <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&key=AIzaSyBM_X4-4iiGr56sg-V7nlu0LcV6gv6kqoI"></script>


<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo API_KEY; ?>&callback=initMap" async defer></script>

        <script type="text/javascript">
        var map;
        var geocoder;           

        function initMap() {
                var mapLayer = document.getElementById("map-layer");
                var centerCoordinates = new google.maps.LatLng(37.6, -95.665);
                var defaultOptions = { center: centerCoordinates, zoom: 4 }

                map = new google.maps.Map(mapLayer, defaultOptions);
                geocoder = new google.maps.Geocoder();
                
                <?php
                if (! empty($countryResult)) {
                    foreach ($countryResult as $k => $v) {
                        ?>  
                                geocoder.geocode( { 'address': '<?php echo $countryResult[$k]["country"]; ?>' }, function(LocationResult, status) {
                                                if (status == google.maps.GeocoderStatus.OK) {
                                                        var latitude = LocationResult[0].geometry.location.lat();
                                                        var longitude = LocationResult[0].geometry.location.lng();
                                                } 
                                                new google.maps.Marker({
                                        position: new google.maps.LatLng(latitude, longitude),
                                        map: map,
                                        title: '<?php echo $countryResult[$k]["country"]; ?>'
                                    });
                                        });
                            <?php
                    }
                }
                ?>              
        }
        </script>

    <script type="text/javascript">
        function initialize() {
            // Creating map object
            var map = new google.maps.Map(document.getElementById('map_canvas'), {
                zoom: 12,
                center: new google.maps.LatLng(-11.986844, -77.103421),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            // creates a draggable marker to the given coords
            var vMarker = new google.maps.Marker({
                position: new google.maps.LatLng(-11.986844, -77.103421),
                draggable: true
            });

            // adds a listener to the marker
            // gets the coords when drag event ends
            // then updates the input with the new coords
            google.maps.event.addListener(vMarker, 'dragend', function (evt) {
                $("#txtLat").val(evt.latLng.lat().toFixed(6));
                $("#txtLng").val(evt.latLng.lng().toFixed(6));

                map.panTo(evt.latLng);
            });

            // centers the map on markers coords
            map.setCenter(vMarker.position);

            // adds the marker on the map
            vMarker.setMap(map);
        }
    </script>
</head>
<body onload="initialize();">
    <h2>
        Google Maps Draggable Marker Get Coordinates
    </h2>

    <label for="latitude">
        Latitude:
    </label>
    <input id="txtLat" type="text" style="color:red" value="19.4326077" />
    <label for="longitude">
        Longitude:
    </label>
    <input id="txtLng" type="text" style="color:red" value="-99.13320799999997" /><br />
    <br />
    <br />
    <div id="map_canvas" style="width: auto; height: 500px;">
    </div>

</body>
</html>