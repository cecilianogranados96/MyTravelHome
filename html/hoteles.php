	<br><br><br><br>	<div class="inn-body-section pad-bot-55">
			<div class="container">
				<div class="row">
					<div class="page-head">
						<h2>Hoteles </h2>
						<div class="head-title">
							<div class="hl-1"></div>
							<div class="hl-2"></div>
							<div class="hl-3"></div>
						</div>
						<p>Listado de hoteles disponibles</p>
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
                    
                    $id_hotel = $line['id_hotel'];
                    $nombre = $line['nombre'];
                    $localizacion = $line['localizacion'];
                    
                    echo " 
                    ['<center> $nombre <br> <a href=".'"'."?pag=habitaciones&hotel=$id_hotel ".'"'.">Ver habitaciones</a> </center>',
                    
                    $localizacion,
                    
                    $id_hotel],";
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