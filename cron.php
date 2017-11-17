<?php

##################################################################
# 
# OBJETIVO:
# =========
#
#  Activacion o desactivar un hotel dependiendo de la disponibilidad de habitaciones.
#
# Desarrollo:
# 
# - JOSE ANDRÉS CECILIANO GRANADOS
#
#
###################################################################
  



$link = mysql_connect('localhost', 'root', '')or die('No se pudo conectar: ' . mysql_error());
mysql_select_db('MyTravelHome') or die('No se pudo seleccionar la base de datos');
$result = mysql_query("Select id_hotel from hotel");
while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {    
    $estado = 0; 
    $result1 = mysql_query("select estado from habitacion WHERE id_hotel = ".$line['id_hotel']."");
    while ($line1 = mysql_fetch_array($result1, MYSQL_ASSOC)) {
        if ($line1['estado'] == 1){
            $estado = $estado +1; 
        }
    }
    if ($estado == 0){
        echo "Hotel: ".$line['id_hotel']." Desactivado<br>";
        mysql_query("UPDATE `hotel` SET `estado`=0 WHERE `id_hotel` = ".$line['id_hotel']."");
    }else{
        echo "Hotel: ".$line['id_hotel']." Activado<br>";
        mysql_query("UPDATE `hotel` SET `estado`=1 WHERE `id_hotel` = ".$line['id_hotel']."");
    }                                                                       
}
?>