<div class="inn-body-section pad-bot-55">
    <div class="db-cent-table db-com-table">
        <div class="db-title">
            <center>
                <h3><img src="images/icon/dbc6.png" alt="" />Mapa de hoteles</h3>
                <p>Se insertan las categorias de un hotel</p>
            </center>
        </div>
        <style>
        #map {
            height: 100%;
        }
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        </style>
        <div id="map"></div>
        <script>
            function initMap() {
                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 8,
                    center: {
                        lat: 9.5151055,
                        lng: -84.0388369
                    }
                });

                setMarkers(map);
            }
            var beaches = [

                        <?php 
                $query = 'SELECT * FROM hotel';
                $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
                while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {  
                    echo "['".$line['nombre']."',".$line['localizacion'].",".$line['id_hotel']."],";
                }                   
            ?>
                
                
                ['Maroubra Beach <a href="d">asas</a>', -33.950198, 151.259302, 1]
            ];
            function setMarkers(map) {
                var image = {
                    url: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
                    size: new google.maps.Size(20, 32),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(0, 32)
                };
                var shape = {
                    coords: [1, 1, 1, 20, 18, 20, 18, 1],
                    type: 'poly'
                };
                var infowindow = new google.maps.InfoWindow();
                for (var i = 0; i < beaches.length; i++) {
                    var beach = beaches[i];
                    var marker = new google.maps.Marker({
                        position: {
                            lat: beach[1],
                            lng: beach[2]
                        },
                        map: map,
                        icon: image,
                        shape: shape,
                        title: beach[0],
                        zIndex: beach[3]
                    });
                    google.maps.event.addListener(marker, 'click', (function(marker, i) {
                        return function() {
                            infowindow.setContent(beaches[i][0]);
                            infowindow.open(map, marker);
                        }
                    })(marker, i));

                }
            }
        </script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBszbpOmGvEtvJX4LSj1739ma6tLS5PJRA&callback=initMap"></script>