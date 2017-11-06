<?php 
if (isset($_GET['enviar'])){
    $query = "DELETE FROM `servicios_por_hotel` WHERE `id_hotel` = '".$datos['id_hotel']."'";
    $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
    foreach ($_POST['ubicaciones'] as $option_value)
    { 
        $query = "INSERT INTO `servicios_por_hotel`(`id_hotel`, `id_servicio`) VALUES ('".$datos['id_hotel']."','".$option_value."')";
        $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
    }
}
?>
<div class="db-cent-table db-com-table">
    <div class="db-title">
        <center>
            <h3><img src="images/icon/dbc6.png" />Facilidades</h3>
            <p>My Travel Home</p>
        </center>
    </div>
    <script src="http://fabianlindfors.se/multijs/multi.min.js"></script>
    <link rel="stylesheet" type="text/css" href="http://fabianlindfors.se/multijs/multi.min.css">
    <form class="s12" method="post" action="?pag=<?php echo $_GET['pag']?>&pagina=<?php echo $_GET['pagina']?>&enviar=1">
        <select multiple="multiple" name="ubicaciones[]" id="ubicaciones">
            <?php
                $select = "";
                $query = 'SELECT * FROM servicios_hotel';
                $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
                while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
                     $result1 = mysql_query("select id_servicios_por_hotel from servicios_por_hotel where id_servicio = ".$line['id_servicio_hotel']." and id_hotel = ".$datos['id_hotel']." ");
                    if (mysql_num_rows($result1) != 0){
                        $select = "selected";
                    }

                    echo "<option value='".$line['id_servicio_hotel']."' $select >".$line['nombre']." </option>";
                    $select = "";
                }
            ?>
        </select>
        <div>
            <div class="input-field s4">
                <center>
                    <input type="submit" value="Enviar" class="waves-effect waves-light log-in-btn">
                </center>
            </div>
        </div>
    </form>
</div>
<script>
    var select = document.getElementById('ubicaciones');
    multi(select, {
        search_placeholder: 'Buscar Facilidades...',
    });
</script>