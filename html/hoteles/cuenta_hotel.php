<?php
if (isset($_GET['act'])){
        $query = "UPDATE `hotel` SET 
        `nombre`='".$_POST['nombre_hotel']."',
        `tipo_hotel`= '".$_POST['tipo_hotel']."',
        `caracteristica`='".$_POST['caract']."',
        `distrito`='".$_POST['distrito']."',
        `localizacion`= '".$_POST['localicacion']."',
        `rango_precio`='".$_POST['precio']."',
        `categoria`='".$_POST['categoria']."'
        WHERE `id_hotel`= ".$hotel['id_hotel']."  ";
        $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error()); 
        echo '<script>window.location.href = "?pag='.$_GET['pag'].'&pagina='.$_GET['pagina'].'";</script>';
}
$loc = explode(",", $hotel['localizacion']);
?>
<div class="db-cent-table db-com-table">
    <div class="db-title">
        <center>
            <h3><img src="images/icon/dbc6.png" />Cuenta Hotel</h3>
            <p>Datos de acceso</p>
        </center>
    </div>

    <div class="db-profile-edit">
        <form class="s12" method="post" action="?pag=<?php echo $_GET['pag']?>&pagina=<?php echo $_GET['pagina']?>&act=1">

            <div class="db-cent-table db-com-table">
                <div>
                    <label>Nombre del hotel</label>
                    <div class="input-field s12">
                        <input type="text" value="<?php echo $hotel['nombre']; ?>" class="validate" name="nombre_hotel">
                    </div>
                </div>

                <label>Tipo de hotel</label>
                <div class="input-field s12">
                    <select name="tipo_hotel" class="validate">
                            <?php
                                $query2 = 'SELECT * FROM tipo_hotel';
                                $result2 = mysql_query($query2) or die('Consulta fallida: ' . mysql_error());
                                while ($line2 = mysql_fetch_array($result2, MYSQL_ASSOC)) {
                                    if ($line2['id_tipo_hotel'] == $hotel['tipo_hotel']){
                                        echo "<option value='".$line2['id_tipo_hotel']."' select>".$line2['nombre']."</option>";
                                    }else{
                                        echo "<option value='".$line2['id_tipo_hotel']."'>".$line2['nombre']."</option>";
                                    }
                                }
                            ?>
                </select>
                </div>


                <label>Características</label>
                <div class="input-field s12">
                    <input type="text" value="<?php echo $hotel['caracteristica']; ?>" class="validate" name="caract">
               
                </div>

                <label>Distrito</label>
                <div class="input-field s12">
                    <select name="distrito" class="validate">
                       <?php
                                $query = 'SELECT * FROM distrito';
                                $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
                                while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
                                    if ($line['id_distrito'] == $hotel['distrito']){
                                        echo "<option value='".$line['id_distrito']."' select>".$line['nombre']."</option>";
                                    }else{
                                        echo "<option value='".$line['id_distrito']."'>".$line['nombre']."</option>";
                                    }
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
                                    if ($line['id_rango'] == $hotel['rango_precio']){
                                          echo "<option value='".$line['id_rango']."' select>".$line['precio_inicial']."-".$line['precio_final']."</option>";
                                    }else{
                                        echo "<option value='".$line['id_rango']."'>".$line['precio_inicial']."-".$line['precio_final']."</option>";
                                    }
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
                                    if ($line['id_categoria_hotel'] == $hotel['categoria']){
                                        echo "<option value='".$line['id_categoria_hotel']."' select>".$line['nombre']."</option>";
                                    }else{
                                        echo "<option value='".$line['id_categoria_hotel']."'>".$line['nombre']."</option>";
                                    }
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
                            <input type="submit" value="Actualizar" class="waves-effect waves-light log-in-btn"></center> </div>
                </div>
            </div>
        </form>


        <script>
            var marker;
            var coords = {};

            //Funcion principal
            initMap = function() {

                coords = {
                    lat: <?php echo $loc[0]; ?>,
                    lng: <?php echo $loc[1]; ?>
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
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAWqHd142DIknn374Y48LxrttUsgde0g0Q&callback=initMap"></script>
