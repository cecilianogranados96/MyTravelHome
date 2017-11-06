<?php 

if (isset($_GET['borr'])){
    $query = "DELETE FROM `habitacion` WHERE id_habitacion = '".$_GET['borr']."'";
    $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
    echo '<script>alert("Borrado con exito!"); window.location.href = "?pag='.$_GET['pag'].'&pagina=habitaciones";</script>';
}



?>
<div class="db-cent-table db-com-table">
    <div class="db-title">
        <center>
            <h3><img src="images/icon/dbc6.png" />Habitaciones activo</h3>
            <p>Se insertan las categorias de un hotel</p>
        </center>
    </div>

    <!--*************************EDITAR*************************-->



    <table class="bordered responsive-table">
        <thead>
            <tr>
                <th>
                    <center>Nombre </center>
                </th>
                <th>
                    <center>Numero</center>
                </th>
                  <th>
                    <center>Estado</center>
                </th>
                <th>
                    <center>Eliminar</center>
                </th>
            </tr>
        </thead>
        <tbody>
            
            <?php 
                $query = 'SELECT nombre,numero_habitacion,estado,id_habitacion FROM habitacion where id_hotel = '.$datos['id_hotel'].' ';
                $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
                while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {  
                    if ($line['estado'] == 1){
                        $estado = "Disponible";
                    }else{
                        $estado = "Ocupada";
                    }
                    echo "    <tr>
                                <td>
                                    <center>".$line['nombre']."</center>
                                </td>
                                <td>
                                    <center>".$line['numero_habitacion']."</center>
                                </td>
                                    <td>
                                    <center>".$estado."</center>
                                </td>
                           
                                <td>
                                    <center><a href='?pag=".$_GET['pag']."&pagina=".$_GET['pagina']."&borr=".$line['id_habitacion']."' class='btn btn-danger'>Eliminar</a></center>
                                </td>
                            </tr>
                ";
                }                   
            ?>
 
        </tbody>
    </table>

</div>