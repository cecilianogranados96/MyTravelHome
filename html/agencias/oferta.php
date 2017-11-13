<br><br><br><br><br><br><br>
<?php 
##################################################################
# 
# OBJETIVO:
# =========
#
# Página de ofertas
#
# Desarrollo:
# 
# - SILVIA CALDERÓN NAVARRO
#
#
###################################################################


    $query = "SELECT usuario, contrasena FROM `usuario` WHERE id_usuario = '".$_SESSION['usuario']."' ";
    $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
    $datos2 = mysql_fetch_array($result, MYSQL_ASSOC);
    $query = "SELECT id_agencia, nombre, foto FROM `agencia` WHERE id_usuario = '".$_SESSION['usuario']."' ";
    $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
    $datos = mysql_fetch_array($result, MYSQL_ASSOC);
    $datos = array_merge($datos2,$datos);

    if (isset($_GET['act'])){
            $query = " UPDATE `descuento` SET `id_habitacion`= '".$_POST['habitacion']."', porcentaje = '".$_POST['porcentaje']."' WHERE id_descuento = '".$_GET['act']."' ";
            $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
            echo '<script>alert("¡Actualizado con éxito!");window.location.href = "?pag='.$_GET['pag'].'&pagina='.$_GET['pagina'].'";</script>';
    }

    if (isset($_GET['borr'])){
        $query = "DELETE FROM descuento WHERE id_descuento = '".$_GET['borr']."'";
        $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
        echo '<script>alert("¡Borrado con éxito!"); window.location.href = "?pag='.$_GET['pag'].'&pagina=oferta";</script>';
    }

    if (isset($_GET['edit'])){

            $query = "SELECT id_habitacion, porcentaje FROM `descuento` WHERE id_descuento= '".$_GET['edit']."' ";
            $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
            $datos3 = mysql_fetch_array($result, MYSQL_ASSOC);    
    }    

?>

<div class="db-cent-table db-com-table">
    <div class="db-title">
        <br>
        <br>
        <center>
            <h3><img src="images/icon/dbc4.png" />Ofertas</h3>
        </center>
    </div>
    <!--*************************EDITAR*************************-->
    <?php if (isset($_GET['edit'])){ ?>        
    <center>
        <div class="db-profile-edit">
            <form class="s12" method="post" action="?pag=<?php echo $_GET['pag']?>&pagina=<?php echo $_GET['pagina']?>&act=<?php echo $_GET['edit']; ?>">
            <div>
                <label>Hotel</label>
                    <div class="input-field s12">
                        <select name="hotel" class="validate" >
                            <?php
                                $query = 'SELECT * FROM hotel';
                                $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
                                while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
                                    echo "<option value='".$line['id_hotel']."'>".$line['nombre']."</option>";
                                }
                            ?>                                                                      
                        </select>

                    </div>
            </div>
            <div>
                <label>Habitacion</label>
                    <div class="input-field s12">
                        <select name="habitacion" class="validate" value="<?php echo $datos3['id_habitacion']; ?>">
                            <?php
                                //$query = 'SELECT * FROM habitacion where id_hotel =  '.$_POST['hotel'].'';
                                $query = 'SELECT * FROM habitacion';
                                $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
                                while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
                                    if ($line['id_habitacion'] == $datos['habitacion']){
                                        echo "<option value='".$line['id_habitacion']."' select>".$line['nombre']."</option>";
                                    }else{
                                        echo "<option value='".$line['id_habitacion']."'>".$line['nombre']."</option>";
                                    }
                                }
                            ?>                                                                      
                        </select>

                    </div>
            </div>
             <div>
                 <label>Porcentaje</label>
                <div class="input-field s12">
                    <input type="text" class="validate" value="<?php echo $datos3['porcentaje']; ?>" name="porcentaje">                            
                </div>
            </div>                       
            <div>
                <div class="input-field s4"><center>
                    <input type="submit" value="Actualizar" class="waves-effect waves-light log-in-btn"></center> </div>
            </div>
        </form>
        </div>
    </center>

    <?php } ?>
    <!--*************************FIN EDITAR*************************-->

    <?php if (!isset($_GET['edit'])){ ?>
    <table class="bordered responsive-table">
        <thead>
            <tr>
                <th>
                    <center>Hotel</center>
                </th>
                <th>
                    <center>Habitación</center>
                </th>
                <th>
                    <center>Porcentaje</center>
                </th>
                <th>
                    <center>Editar</center>
                </th>
                <th>
                    <center>Borrar</center>
                </th>
            </tr>
        </thead>
        <tbody>
            
            <?php 
                $query = 'SELECT descuento.id_descuento, hotel.nombre as nombre_hotel, habitacion.nombre as nombre_habitacion, descuento.porcentaje FROM habitacion INNER JOIN hotel ON hotel.id_hotel = habitacion.id_hotel INNER JOIN descuento ON habitacion.id_habitacion = descuento.id_habitacion AND descuento.id_agencia = '.$datos['id_agencia'].' ';
                $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
                while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {  
                    echo "    <tr>
                                <td>
                                    <center>".$line['nombre_hotel']."</center>
                                </td>
                                <td>
                                    <center>".$line['nombre_habitacion']."</center>
                                </td>
                                <td>
                                    <center>".$line['porcentaje']."</center>
                                </td>
                                <td>
                                    <center><a href='?pag=".$_GET['pag']."&pagina=".$_GET['pagina']."&edit=".$line['id_descuento']."' class='btn btn-success'>Editar</a></center>
                                </td>
                                <td>
                                    <center><a href='?pag=".$_GET['pag']."&pagina=".$_GET['pagina']."&borr=".$line['id_descuento']."' class='btn btn-danger'>Borrar</a></center>
                                </td>
                            </tr>
                ";
                }                   
            ?>
 
        </tbody>
    </table>
    <?php } ?>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>