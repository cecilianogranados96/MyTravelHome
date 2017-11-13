<?php 
##################################################################
# 
# OBJETIVO:
# =========
#
# Catálogo de tipos de hotel
#
# Desarrollo:
# 
# - SILVIA CALDERÓN NAVARRO
#
#
###################################################################

if (isset($_GET['act'])){
        $query = " UPDATE `tipo_hotel` SET `nombre`= '".$_POST['nombre_p']."', `descripcion`= '".$_POST['descripcion_p']."' WHERE id_tipo_hotel = '".$_GET['act']."' ";
        $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
        echo '<script>alert("¡Actualizado con éxito!");window.location.href = "?pag='.$_GET['pag'].'&pagina='.$_GET['pagina'].'";</script>';
}

if (isset($_GET['borr'])){
    $query = "DELETE FROM tipo_hotel WHERE id_tipo_hotel = '".$_GET['borr']."'";
    $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
    echo '<script>alert("¡Borrado con éxito!");window.location.href = "?pag='.$_GET['pag'].'&pagina='.$_GET['pagina'].'";</script>';
}


if (isset($_GET['edit'])){

        $query = "SELECT nombre, descripcion FROM `tipo_hotel` WHERE id_tipo_hotel= '".$_GET['edit']."' ";
        $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
        $datos = mysql_fetch_array($result, MYSQL_ASSOC);    
}    

if (isset($_GET['insert'])){        
    $query = "INSERT INTO `tipo_hotel`(`id_tipo_hotel`, `nombre`, `descripcion`) VALUES ('".mysql_insert_id()."','".$_POST['nombre_n']."','".$_POST['descripcion_n']."')";
    $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
    echo '<script>alert("¡Registrado con éxito!");window.location.href = "?pag='.$_GET['pag'].'&pagina='.$_GET['pagina'].'";</script>';
}


?>

<div class="db-cent-table db-com-table">
    <div class="db-title">
        <br>
        <br>
        <center>
            <h3><img src="images/icon/dbc4.png" />Catálogo de los tipos de hotel</h3>
        </center>
    </div>
    <!--*************************EDITAR*************************-->
    <?php if (isset($_GET['edit'])){ ?>        
    <center>
        <div class="db-profile-edit">
            <form class="s12" method="post" action="?pag=<?php echo $_GET['pag']; ?>&pagina=<?php echo $_GET['pagina']; ?>&act=<?php echo $_GET['edit']; ?>">
            <div>
                <label>Nombre de la categoría</label>
                <div class="input-field s12">
                    <input type="text" class="validate" value="<?php echo $datos['nombre']; ?>" name="nombre_p">
                </div>
            </div>
            <div>
                <label>Descripción</label>
                <div class="input-field s12">
                    <input type="text" class="validate" value="<?php echo $datos['descripcion']; ?>" name="descripcion_p">
                </div>
            </div>
            <div>
                <div class="input-field s4">
                    <center>
                        <input type="submit" value="Actualizar" class="waves-effect waves-light log-in-btn"></center>
                </div>
            </div>
        </form>
        </div>
    </center>

    <?php } ?>
    <!--*************************FIN EDITAR*************************-->

    <?php if (!isset($_GET['edit'])){ ?>
    <center>
        <div class="db-profile-edit">
            <form class="col s12" method="post" action="?pag=<?php echo $_GET['pag']; ?>&pagina=<?php echo $_GET['pagina']; ?>&insert=<?php echo $_GET['nombre_n']; ?>">
                <div>
                    <label class="col s4">Nombre</label>
                    <div class="input-field col s8">
                        <input type="text" name="nombre_n" class="validate"> </div>
                    </div>
                <div>
                    <label class="col s4">Descripción</label>
                    <div class="input-field col s8">
                        <input type="text" name="descripcion_n" class="validate"> </div>
                </div>
                 <div>
                    <div class="input-field col s8">
                        <input type="submit" value="Nueva categoría" class="waves-effect waves-light pro-sub-btn" id="pro-sub-btn">
                    </div>
                </div>
            </form>

        </div>
    </center>
    
    <table class="bordered responsive-table">
        <thead>
            <tr>
                <th>
                    <center>Nombre </center>
                </th>
                <th>
                    <center>Descripción </center>
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
                $query = 'SELECT id_tipo_hotel, nombre, descripcion FROM tipo_hotel';
                $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
                while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {  
                    echo "    <tr>
                                <td>
                                    <center>".$line['nombre']."</center>
                                </td>
                                <td>
                                    <center>".$line['descripcion']."</center>
                                </td>
                                <td>
                                    <center><a href='?pag=".$_GET['pag']."&pagina=".$_GET['pagina']."&edit=".$line['id_tipo_hotel']."' class='btn btn-success'>Editar</a></center>
                                </td>
                                <td>
                                    <center><a href='?pag=".$_GET['pag']."&pagina=".$_GET['pagina']."&borr=".$line['id_tipo_hotel']."' class='btn btn-danger'>Borrar</a></center>
                                </td>
                            </tr>
                ";
                }                   
            ?>
 
        </tbody>
    </table>
    <?php } ?>
</div>