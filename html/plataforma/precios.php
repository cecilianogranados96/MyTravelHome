<?php 
##################################################################
# 
# OBJETIVO:
# =========
#
# Catálogo de rangos de precios
#
# Desarrollo:
# 
# - SILVIA CALDERÓN NAVARRO
#
#
###################################################################


if (isset($_GET['act'])){
        $query = " UPDATE `rango_precio` SET `precio_inicial`= '".$_POST['precio_i_p']."', `precio_final`= '".$_POST['precio_f_p']."'  WHERE id_rango = '".$_GET['act']."' ";
        $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
        echo '<script>alert("¡Actualizado con éxito!");window.location.href = "?pag='.$_GET['pag'].'&pagina='.$_GET['pagina'].'";</script>';
}

if (isset($_GET['borr'])){
    $query = "DELETE FROM rango_precio WHERE id_rango = '".$_GET['borr']."'";
    $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
    echo '<script>alert("¡Borrado con éxito!");window.location.href = "?pag='.$_GET['pag'].'&pagina='.$_GET['pagina'].'";</script>';
}

if (isset($_GET['edit'])){

        $query = "SELECT precio_inicial, precio_final FROM `rango_precio` WHERE id_rango= '".$_GET['edit']."' ";
        $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
        $datos = mysql_fetch_array($result, MYSQL_ASSOC);    
}    

if (isset($_GET['insert'])){        
    $query = "INSERT INTO `rango_precio`(`id_rango`, `precio_inicial`, `precio_final`) VALUES ('".mysql_insert_id()."','".$_POST['precio_i_n']."', '".$_POST['precio_f_n']."')";
    $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
    echo '<script>alert("¡Registrado con éxito!");window.location.href = "?pag='.$_GET['pag'].'&pagina='.$_GET['pagina'].'";</script>';
}

?>

<div class="db-cent-table db-com-table">
    <div class="db-title">
        <br>
        <br>
        <center>
            <h3><img src="images/icon/dbc4.png" />Catálogo de los rangos de precios</h3>
        </center>
    </div>
    <!--*************************EDITAR*************************-->
    <?php if (isset($_GET['edit'])){ ?>        
    <center>
        <div class="db-profile-edit">
            <form class="s12" method="post" action="?pag=<?php echo $_GET['pag']; ?>&pagina=<?php echo $_GET['pagina']; ?>&act=<?php echo $_GET['edit']; ?>">
            <div>
                <label>Precio inicial</label>
                <div class="input-field s12">
                    <input type="text" class="validate" value="<?php echo $datos['precio_inicial']; ?>" name="precio_i_p">
                </div>
            </div>
            <div>
                <label>Precio final</label>
                <div class="input-field s12">
                    <input type="text" class="validate" value="<?php echo $datos['precio_final']; ?>" name="precio_f_p">
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
            <form class="col s12" method="post" action="?pag=<?php echo $_GET['pag']; ?>&pagina=<?php echo $_GET['pagina']; ?>&insert=<?php echo $_GET['precio_i_n']; ?>">
                <div>
                    <label class="col s4">Precio inicial</label>
                    <div class="input-field col s8">
                        <input type="text" name="precio_i_n" class="validate"> </div>
                </div>
                <div>
                    <label class="col s4">Precio final</label>
                    <div class="input-field col s8">
                        <input type="text" name="precio_f_n" class="validate"> </div>
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
                    <center>Precio inicial </center>
                </th>
                <th>
                    <center>Precio final </center>
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
                $query = 'SELECT id_rango, precio_inicial, precio_final FROM rango_precio';
                $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
                while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {  
                    echo "    <tr>
                                <td>
                                    <center>".$line['precio_inicial']."</center>
                                </td>
                                <td>
                                    <center>".$line['precio_final']."</center>
                                </td>
                                <td>
                                    <center><a href='?pag=".$_GET['pag']."&pagina=".$_GET['pagina']."&edit=".$line['id_rango']."' class='btn btn-success'>Editar</a></center>
                                </td>
                                <td>
                                    <center><a href='?pag=".$_GET['pag']."&pagina=".$_GET['pagina']."&borr=".$line['id_rango']."' class='btn btn-danger'>Borrar</a></center>
                                </td>
                            </tr>
                ";
                }                   
            ?>
 
        </tbody>
    </table>
    <?php } ?>
</div>