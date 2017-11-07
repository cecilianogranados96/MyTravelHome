/*'SELECT `hotel`.`nombre`, `tipo_hotel`.`nombre`, `distrito`.`nombre`, `hotel`.`estado`, `rango_precio`.`precio_inicial`, `rango_precio`.`precio_final` FROM `tipo_hotel` INNER JOIN `hotel` ON `hotel`.`tipo_hotel` = `tipo_hotel`.`id_tipo_hotel` INNER JOIN `calificacion` ON `calificacion`.`id_hotel` = `hotel`.`id_hotel` INNER JOIN `categoria_hotel` ON `hotel`.`categoria` = `categoria_hotel`.`id_categoria_hotel` INNER JOIN `distrito` ON `hotel`.`distrito` = `distrito`.`id_distrito` INNER JOIN `rango_precio` ON `hotel`.`rango_precio` = `rango_precio`.`id_rango` '*/

<?php 
if (isset($_GET['buscar'])){    
        foreach ($_POST['servicios'] as $option_value)
        {            
            $seleccionados [] = $option_value;
        }
}
?>

<div class="db-cent-table db-com-table">
    <div class="db-title">
        <center>
            <br><br><br>
            <h3><img src="images/icon/dbc4.png" alt="" />Hoteles por servicios</h3>
            <p>Muestra los hoteles que dan los servicios escogidos</p>
        </center>
    </div>
    <script src="http://fabianlindfors.se/multijs/multi.min.js"></script>
    <link rel="stylesheet" type="text/css" href="http://fabianlindfors.se/multijs/multi.min.css">
    <form class="s12" method="post" action="?pag=<?php echo $_GET['pag']?>&pagina=<?php echo $_GET['pagina']?>&buscar=1">
        <select multiple="multiple" name="servicios[]" id="servicios">
            <?php
                $select = "";
                $query = 'SELECT id_servicio_hotel, nombre FROM servicios_hotel';
                $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());  
                $servicios = "";
                while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
                   echo "<option value='".$line['id_servicio_hotel']."' $select >".$line['nombre']." </option>";
                   $servicios = "<option value='".$line['id_servicio_hotel']."' $select >".$line['nombre']." </option>";
                }
                echo servicios;
            ?>
        </select>
        <div>
            <div class="input-field s4">
                <center>
                    <input type="submit" value="Buscar" class="waves-effect waves-light log-in-btn">
                </center>
            </div>
        </div>
    </form>
    <div>
    <table class="bordered responsive-table">
        <thead>
            <tr>
                <th>
                    <center>Nombre </center>
                </th>
                <th>
                    <center>Distrito</center>
                </th>
                <th>
                    <center>Provincia</center>
                </th>
                <th>
                    <center>Tipo </center>
                </th>
                <th>
                    <center>Estado</center>
                </th>
                <th>
                    <center>Categoría </center>
                </th>
                <th>
                    <center>Puntaje</center>
                </th>
                <th>
                    <center>Provincia</center>
                </th>
                <th>
                    <center>Rango precio</center>
                </th>
            </tr>
        </thead>
        <tbody>
            
            <?php 
                $query = 'SELECT id_hotel, nombre, tipo_hotel from hotel';
                $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
                while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {  
                    echo "    <tr>
                                <td>
                                    <center>".$line['nombre']."</center>
                                </td>
                                <td>
                                    <center>".$line['tipo_hotel']."</center>
                                </td>
                                <td>
                                    <center>".$line['nombre']."</center>
                                </td>
                            </tr>
                ";
                }                   
            ?>
 
        </tbody>
    </table>
    </div>
</div>

