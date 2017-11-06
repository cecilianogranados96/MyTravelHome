
<?php 
 
if (isset($_GET['act'])){

        if ($_POST['pass'] == ""){
            $query = " UPDATE `usuario` SET `usuario`= '".$_POST['user']."' WHERE id_usuario = '".$_SESSION['usuario']."' ";
            $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
        }else{
            $query = " UPDATE `usuario` SET `usuario`= '".$_POST['user']."',`contrasena`='".md5($_POST['pass'])."' WHERE id_usuario = '".$_SESSION['usuario']."' ";
            $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error()); 
        }
    
    
        $query = "UPDATE `adm_hotel` SET `nombre`='".$_POST['nombre_p']."',
        `apellido`='".$_POST['apellido_p']."',
        `nacionalidad`='".$_POST['nacionalidad']."',
        `genero`='".$_POST['genero']."',
        `cedula`='".$_POST['cedula']."' WHERE id_usuario = '".$_SESSION['usuario']."'
        ";
        $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
   
    
    echo '<script>window.location.href = "?pag='.$_GET['pag'].'&pagina='.$_GET['pagina'].'";</script>';
}



?>
<div class="db-cent-table db-com-table">
    <div class="db-title">
        <center>
            <h3><img src="images/icon/dbc6.png" />Cuenta</h3>
            <p>Datos de acceso</p>
        </center>
    </div>
    <div class="db-profile-edit">
        <form class="s12" method="post" action="?pag=<?php echo $_GET['pag']; ?>&pagina=<?php echo $_GET['pagina']; ?>&act=1">
            <div>
                <label>Usuario</label>
                <div class="input-field s12">
                    <input type="text" value="<?php echo $datos['usuario']; ?>" class="validate" name="user">

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
                    <input type="text" class="validate" value="<?php echo $datos['nombre']; ?>" name="nombre_p">

                </div>
            </div>
            <div>
                <label>Apellido de la persona</label>
                <div class="input-field s12">
                    <input type="text" class="validate" value="<?php echo $datos['apellido']; ?>" name="apellido_p">

                </div>
            </div>
            <div>
                <label>Cedula</label>
                <div class="input-field s12">
                    <input type="number" class="validate" value="<?php echo $datos['cedula']; ?>" name="cedula">

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
                                    if ($line['id_tipo_habitacion'] == $datos['genero']){
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
                                    if ($line['id_tipo_habitacion'] == $datos['nacionalidad']){
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
