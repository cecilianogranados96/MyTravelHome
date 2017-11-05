
         
<div class="db-cent-table db-com-table">
    <div class="db-title">
        <center>
            <h3><img src="images/icon/dbc6.png" />Cuenta Hotel</h3>
            <p>Datos de acceso</p>
        </center>
    </div>

	<div class="db-profile-edit">
       <form class="s12" method="post" action="?pag=<?php echo $_GET['pag']?>&pagina=<?php echo $_GET['pagina']?>&rhotel=1">

<div class="db-cent-table db-com-table">




	
    
    
    
    <div>
                <div class="input-field s12">
                    <input type="text" data-ng-model="name1" class="validate" name="nombre_hotel">
                    <label>Nombre del hotel</label>
                </div>
            </div>

            <label>Tipo de hotel</label>
            <div class="input-field s12">
                <select name="tipo_hotel" class="validate">
                    <option value=""></option>
                    <option value="1">Costariccense</option>
                </select>
            </div>


            <label>Caracteristicas</label>
            <div class="input-field s12">
                <select name="caract" class="validate">
                    <option value=""></option>
                    <option value="1">Costariccense</option>
                </select>
            </div>

            <label>Distrito</label>
            <div class="input-field s12">
                <select name="distrito" class="validate">
                    <option value=""></option>
                    <option value="1">Costariccense</option>
                </select>
            </div>

            <label>Rango de precio</label>
            <div class="input-field s12">
                <select name="precio" class="validate">
                    <option value=""></option>
                    <option value="1">Costariccense</option>
                </select>
            </div>
            
            <label>Categoria</label>
            <div class="input-field s12">
                <select name="categoria" class="validate">
                    <option value=""></option>
                    <option value="1">Costariccense</option>
                </select>
            </div>
            
            <label>Localizacion</label>
                        <div id="map" style="height: 80%;"></div>
                        <input type="text" id="LAT" name="localicacion" hidden/>
            <div>
                <div class="input-field s4">
                    <center>
                        <input type="submit" value="Actualizar" class="waves-effect waves-light log-in-btn"> </div>
            </div>
        </form>

            
    <script>
        var marker;
        var coords = {};

        //Funcion principal
        initMap = function() {

            coords = {
                lat: 9.6620154,
                lng: -83.891521
            };
            setMapa(coords);
            document.getElementById("LAT").value = coords.lat+","+coords.lng;;
        }

        function setMapa(coords) {

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 10,
                center: new google.maps.LatLng(coords.lat, coords.lng),

            });
            marker = new google.maps.Marker({
                map: map,
                draggable: true,
                animation: google.maps.Animation.DROP,
                position: new google.maps.LatLng(coords.lat, coords.lng),

            });
            marker.addListener('click', toggleBounce);

            marker.addListener('dragend', function(event) {
                document.getElementById("LAT").value = this.getPosition().lat()+','+this.getPosition().lng();
            });
        }

        function toggleBounce() {
            if (marker.getAnimation() !== null) {
                marker.setAnimation(null);
            } else {
                marker.setAnimation(google.maps.Animation.BOUNCE);
            }
        }

    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAWqHd142DIknn374Y48LxrttUsgde0g0Q&callback=initMap">
    </script>