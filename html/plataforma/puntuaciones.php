<?php 
##################################################################
# 
# OBJETIVO:
# =========
#
# Catálogo de puntuaciones
#
# Desarrollo:
#
# - Silvia Calderón Navarro 
#
###################################################################


    if (isset($_GET['borr'])){
        $query = "DELETE FROM calificacion WHERE id_calificacion = '".$_GET['borr']."'";
        $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
        echo '<script>alert("¡Borrado con éxito!");window.location.href = "?pag='.$_GET['pag'].'&pagina='.$_GET['pagina'].'";</script>';
    }
?>

<div class="db-cent-table db-com-table">
    <div class="db-title">
        <br>
        <br>
        <center>
            <h3><img src="images/icon/dbc4.png" />Calificaciones a hoteles</h3>
        </center>
    </div>

    <?php if (!isset($_GET['edit'])){ ?>    
    
    <table class="bordered responsive-table">
        <thead>
            <tr>
                <th>
                    <center>Hotel</center>
                </th>
                <th>
                    <center>Usuario </center>
                </th>
                <th>
                    <center>Puntaje</center>
                </th>
                <th>
                    <center>Comentario</center>
                </th>
                <th>
                    <center>Borrar</center>
                </th>
            </tr>
        </thead>
        <tbody>
            
            <?php 
                $query = 'SELECT calificacion.id_calificacion, hotel.nombre, usuario.usuario, calificacion.puntaje, calificacion.comentario FROM calificacion INNER JOIN  hotel ON hotel.id_hotel = calificacion.id_hotel INNER JOIN usuario ON usuario.id_usuario = calificacion.id_usuario';
                $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
                while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {  
                    echo "    <tr>
                                <td>
                                    <center>".$line['nombre']."</center>
                                </td>
                                <td>
                                    <center>".$line['usuario']."</center>
                                </td>
                                <td>
                                    <center>".$line['puntaje']."</center>
                                </td>
                                <td>
                                    <center>".$line['comentario']."</center>
                                </td>
                                <td>
                                    <center><a href='?pag=".$_GET['pag']."&pagina=".$_GET['pagina']."&borr=".$line['id_calificacion']."' class='btn btn-danger'>Borrar</a></center>
                                </td>
                            </tr>
                ";
                }                   
            ?>
 
        </tbody>
    </table>
    <?php } ?>
</div>