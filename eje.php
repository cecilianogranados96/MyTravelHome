<?php
// Conectando, seleccionando la base de datos

    $link = mysql_connect('localhost', 'root', '')or die('No se pudo conectar: ' . mysql_error());

mysql_select_db('MyTravelHome') or die('No se pudo seleccionar la base de datos');

// Realizar una consulta MySQL
$query = 'SHOW FULL TABLES FROM MyTravelHome';
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());


while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
    $nombre = $line['Tables_in_MyTravelHome'];
    
    echo "
                    # ----------------------------------DISPARADORES DE: ".$nombre."<br>
CREATE TRIGGER `Actualizar_".$nombre."` BEFORE UPDATE ON `".$nombre."`
 FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) 
VALUES ('UPDATE','".$nombre."','Actualizar ".$nombre."',CURRENT_USER); <br><br>

CREATE TRIGGER `Insertar_".$nombre."` BEFORE INSERT ON `".$nombre."`
 FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) 
VALUES ('INSERT','".$nombre."','Nuevo ".$nombre."',CURRENT_USER);<br><br>


CREATE TRIGGER `Borrar_".$nombre."` BEFORE DELETE ON `adm_plataforma`
 FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) 
VALUES ('DELETE','".$nombre."','Borrado de un ".$nombre."',CURRENT_USER);


<br><br><br><br>"; 
}


?>