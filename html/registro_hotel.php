<br><br><br><br><br><br><br><br>
<?php
##################################################################
# 
# OBJETIVO:
# =========
#
# Registro de un nuevo hotel
#
# Desarrollo:
# 
# - JOSE ANDRÉS CECILIANO GRANADOS
#
# Mejoras:
# 
# - SILVIA CALDERÓN NAVARRO
#
###################################################################
?>
<div class="db-cent-table db-com-table">
    <div class="db-title">
        <center>
            <h3><img src="images/icon/dbc6.png" />Registro de hoteles</h3>
            <p>My Travel Home</p>
        </center>
    </div>

    <div class="db-profile-edit">
        <center>
            <form class="s12" method="post" action="?pag=verificar&rhotel=1" style="width: 311px;">
                <h2>Persona</h2>
                <hr>
                <div>
                    <label>Usuario</label>
                    <div class="input-field s12">
                        <input type="text" data-ng-model="name1" class="validate" name="user">
                    </div>
                </div>
                <div>
                    <label>Contraseña</label>
                    <div class="input-field s12">
                        <input type="password" class="validate" name="pass">
                    </div>
                </div>
                <div>
                    <label>Nombre de la persona</label>
                    <div class="input-field s12">
                        <input type="text" class="validate" name="nombre_p">
                    </div>
                </div>
                <div>
                    <label>Apellido de la persona</label>
                    <div class="input-field s12">
                        <input type="text" class="validate" name="apellido_p">
                    </div>
                </div>
                <div>
                    <label>Cédula</label>
                    <div class="input-field s12">
                        <input type="text" class="validate" name="cedula">

                    </div>
                </div>
                <div>
                    <label>Género</label>
                    <div class="input-field s12">
                        <select name="genero" class="validate">
                            <?php
                                $query = 'SELECT * FROM genero';
                                $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
                                while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
                                    echo "<option value='".$line['id_genero']."'>".$line['nombre']."</option>";
                                }
                            ?>
                            </select>

                    </div>
                </div>
                <div>
                    <label>Fecha nacimiento</label>
                    <div class="input-field s12">
                        <input type="date" class="validate" name="nacimiento">

                    </div>
                </div>
                <div>
                    <label>Nacionalidad</label>
                    <div class="input-field s12">

                        <select name="nacionalidad" class="validate">
                            <?php
                                $query = 'SELECT * FROM nacionalidad';
                                $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
                                while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
                                    echo "<option value='".$line['id_nacionalidad']."'>".$line['nombre']."</option>";
                                }
                            ?>
                            </select>

                    </div>
                </div>
                <input type="text" value="0" name="admin" hidden="1">
                <h2>Hotel</h2>
                <hr>


                <div>
                    <label>Nombre del hotel</label>
                    <div class="input-field s12">
                        <input type="text" data-ng-model="name1" class="validate" name="nombre_hotel">

                    </div>
                </div>

                <label>Tipo de hotel</label>
                <div class="input-field s12">
                    <select name="tipo_hotel" class="validate">
                            <?php
                                $query = 'SELECT * FROM tipo_hotel';
                                $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
                                while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
                                    echo "<option value='".$line['id_tipo_hotel']."'>".$line['nombre']."</option>";
                                }
                            ?>
                </select>
                </div>


                <label>Características</label>
                <div class="input-field s12">
                      <input type="text" class="validate" name="caract">
                    
              
                </div>

                <label>Distrito</label>
                <div class="input-field s12">
                    <select name="distrito" class="validate">
                            <?php
                                $query = 'SELECT * FROM distrito';
                                $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
                                while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
                                    echo "<option value='".$line['id_distrito']."'>".$line['nombre']."</option>";
                                }
                            ?>
                </select>
                </div>

                <label>Rango de precio</label>
                <div class="input-field s12">
                    <select name="precio" class="validate">
                            <?php
                                $query = 'SELECT * FROM rango_precio';
                                $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
                                while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
                                    echo "<option value='".$line['id_rango']."'>".$line['precio_inicial']." - ".$line['precio_final']."</option>";
                                }
                            ?>
                </select>
                </div>

                <label>Categoría</label>
                <div class="input-field s12">
                    <select name="categoria" class="validate">
                            <?php
                                $query = 'SELECT * FROM categoria_hotel';
                                $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
                                while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
                                    echo "<option value='".$line['id_categoria_hotel']."'>".$line['nombre']."</option>";
                                }
                            ?>
                </select>
                </div>

                <label>Localización</label>
                <div id="map" style="height: 80%;"></div>
                <input type="text" id="LAT" name="localicacion" hidden/>
                <div>
                    <div class="input-field s4">
                        <center>
                            <input type="submit" value="Registro" class="waves-effect waves-light log-in-btn"></center></div>
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
                    document.getElementById("LAT").value = coords.lat + "," + coords.lng;;
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
                        document.getElementById("LAT").value = this.getPosition().lat() + ',' + this.getPosition().lng();
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
            <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAWqHd142DIknn374Y48LxrttUsgde0g0Q&callback=initMap">
            </script>
