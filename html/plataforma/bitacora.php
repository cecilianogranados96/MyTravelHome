<?php 
##################################################################
# 
# OBJETIVO:
# =========
#
# Catálogo de bitácoras
#
# Desarrollo:
# 
# - SILVIA CALDERÓN NAVARRO
#
#
##################################################################

?>

<div class="db-cent-table db-com-table">
    <div class="db-title">
        <br>
        <br>
        <center>
            <h3><img src="images/icon/dbc4.png" />Bitácora de cambios</h3>
        </center>
    </div>

    <?php if (!isset($_GET['edit'])){ ?>
    
    <table class="bordered responsive-table">
        <thead>
            <tr>
                <th>
                    <center>Tipo de cambio </center>
                </th>
                <th>
                    <center>Objeto</center>
                </th>
                <th>
                    <center>Usuario</center>
                </th>
                <th>
                    <center>Descripción </center>
                </th>
                <th>
                    <center>Fecha</center>
                </th>
            </tr>
        </thead>
        <tbody>
            
            <?php 
                $query = 'SELECT fecha, tipo_cambio, objeto, descripcion, usuario FROM bitacora order by id_bitacora DESC';
                $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
                while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {  
                    echo "    <tr>
                                <td>
                                    <center>".$line['tipo_cambio']."</center>
                                </td>
                                <td>
                                    <center>".$line['objeto']."</center>
                                </td>
                                <td>
                                    <center>".$line['usuario']."</center>
                                </td>
                                <td>
                                    <center>".$line['descripcion']."</center>
                                </td>
                                <td>
                                    <center>".$line['fecha']."</center>
                                </td>                                
                            </tr>
                ";
                }                   
            ?>
 
        </tbody>
    </table>
    <?php } ?>
</div>