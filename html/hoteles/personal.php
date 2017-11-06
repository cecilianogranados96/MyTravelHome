<?php 
 
if (isset($_GET['act'])){

        if ($_POST['pass'] == ""){
            $query = " UPDATE `usuario` SET `usuario`= '".$_POST['user']."' WHERE id_usuario = '".$_GET['act']."' ";
            $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
        }else{
            $query = " UPDATE `usuario` SET `usuario`= '".$_POST['user']."',`contrasena`='".md5($_POST['pass'])."' WHERE id_usuario = '".$_GET['act']."' ";
            $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error()); 
        }
        $query = "UPDATE `adm_hotel` SET `nombre`='".$_POST['nombre_p']."',
        `apellido`='".$_POST['apellido_p']."',
        `nacionalidad`='".$_POST['nacionalidad']."',
        `genero`='".$_POST['genero']."',
        `cedula`='".$_POST['cedula']."' WHERE id_usuario = '".$_GET['act']."'
        ";
        $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
        echo '<script>window.location.href = "?pag='.$_GET['pag'].'&pagina='.$_GET['pagina'].'";</script>';
}

if (isset($_GET['edit'])){

        $query = "SELECT * FROM `adm_hotel` WHERE id_usuario = '".$_GET['edit']."' ";
        $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
        $datos = mysql_fetch_array($result, MYSQL_ASSOC);
        $query = "SELECT usuario FROM `usuario` WHERE id_usuario = '".$_GET['edit']."' ";
        $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
        $datos2 = mysql_fetch_array($result, MYSQL_ASSOC); 

        $datos_p = array_merge($datos,$datos2);

  }      



?>


<div class="db-cent-table db-com-table">
    <div class="db-title">
        <center>
            <h3><img src="images/icon/dbc6.png" />Personal activo</h3>
            <p>Se insertan las categorias de un hotel</p>
        </center>
    </div>

    <!--*************************EDITAR*************************-->
    <?php if (isset($_GET['edit'])){ ?>
    
    
    <center>
        <div class="db-profile-edit">
<form class="s12" method="post" action="?pag=<?php echo $_GET['pag']; ?>&pagina=<?php echo $_GET['pagina']; ?>&act=<?php echo $_GET['edit']; ?>">
            <div>
                <label>Usuario</label>
                <div class="input-field s12">
                    <input type="text" value="<?php echo $datos_p['usuario']; ?>" class="validate" name="user">

                </div>
            </div>
            <div>
                <label>Nueva Contraseña</label>
                <div class="input-field s12">
                    <input type="password" class="validate" name="pass">

                </div>
            </div>
            <div>
                <label>Nombre de la persona</label>
                <div class="input-field s12">
                    <input type="text" class="validate" value="<?php echo $datos_p['nombre']; ?>" name="nombre_p">

                </div>
            </div>
            <div>
                <label>Apellido de la persona</label>
                <div class="input-field s12">
                    <input type="text" class="validate" value="<?php echo $datos_p['apellido']; ?>" name="apellido_p">

                </div>
            </div>
            <div>
                <label>Cedula</label>
                <div class="input-field s12">
                    <input type="number" class="validate" value="<?php echo $datos_p['cedula']; ?>" name="cedula">

                </div>
            </div>
            <div>
                <label>Genero</label>
                <div class="input-field s12">
                    <select name="genero" class="validate">
                            <?php
                                $query = 'SELECT * FROM genero';
                                $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
                                while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
                                    if ($line['id_tipo_habitacion'] == $datos_p['genero']){
                                        echo "<option value='".$line['id_genero']."' select>".$line['nombre']."</option>";
                                    }else{
                                        echo "<option value='".$line['id_genero']."'>".$line['nombre']."</option>";
                                    }
                                }
                            ?>
                            </select>

                </div>
            </div>

            <div>
                <label>Nacionalidad</label>
                <div class="input-field s12">

                    <select name="nacionalidad" class="validate">
                                <?php
                                $query = 'SELECT * FROM nacionalidad';
                                $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
                                while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
                                    if ($line['id_tipo_habitacion'] == $datos_p['nacionalidad']){
                                        echo "<option value='".$line['id_nacionalidad']."' select>".$line['nombre']."</option>";
                                    }else{
                                        echo "<option value='".$line['id_nacionalidad']."'>".$line['nombre']."</option>";
                                    }
                                }
                            ?>
                            </select>

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


    <table class="bordered responsive-table">
        <thead>
            <tr>
                <th>
                    <center>Nombre </center>
                </th>
                <th>
                    <center>Apellido</center>
                </th>
                <th>
                    <center>Cedula</center>
                </th>
                <th>
                    <center>Editar</center>
                </th>
            </tr>
        </thead>
        <tbody>
            
            <?php 
                $query = 'SELECT * FROM adm_hotel where admin = '.$datos['id_adm_hotel'].'';
                $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
                while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {  
                    echo "    <tr>
                                <td>
                                    <center>".$line['nombre']."</center>
                                </td>
                                <td>
                                    <center>".$line['apellido']."</center>
                                </td>
                                <td>
                                    <center>".$line['cedula']."</center>
                                </td>
                                <td>
                                    <center><a href='?pag=".$_GET['pag']."&pagina=".$_GET['pagina']."&edit=".$line['id_usuario']."' class='btn btn-success'>Editar</a></center>
                                </td>
                            </tr>
                ";
                }                   
            ?>
 
        </tbody>
    </table>
    <?php } ?>
</div>