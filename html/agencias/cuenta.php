
<?php 
    
    $query = "SELECT usuario, contrasena FROM `usuario` WHERE id_usuario = '".$_SESSION['usuario']."' ";
    $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
    $datos2 = mysql_fetch_array($result, MYSQL_ASSOC);
    $query = "SELECT nombre, foto FROM `agencia` WHERE id_usuario = '".$_SESSION['usuario']."' ";
    $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
    $datos = mysql_fetch_array($result, MYSQL_ASSOC);
    $datos = array_merge($datos2,$datos);
 

    if (isset($_GET['act'])){

         if ($_POST['contrasena'] == ""){
            $query = " UPDATE `usuario` SET `usuario`= '".$_POST['user']."' WHERE id_usuario = '".$_SESSION['usuario']."' ";
            $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
        }else{
            $query = " UPDATE `usuario` SET `usuario`= '".$_POST['user']."',`contrasena`='".md5($_POST['pass'])."' WHERE id_usuario = '".$_SESSION['usuario']."' ";
            $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error()); 
        }
       $foto_url = $datos['foto'];
        if ($_FILES['foto_p']['name'] != ''){
            $uploaddir = 'images/agencias/';
            $foto_url = $usuario.rand().$_FILES['foto_p']['name'];
            $uploadfile = $uploaddir.basename($foto_url);
            move_uploaded_file($_FILES['foto_p']['tmp_name'], $uploadfile);
        }

        $query = "UPDATE `agencia` SET `nombre`='".$_POST['nombre_p']."',
        `foto`='".$foto_url."' WHERE id_usuario = '".$_SESSION['usuario']."'
        ";
        $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

        echo '<script>alert("¡Actualizado con éxito!"); window.location.href = "?pag='.$_GET['pag'].'&pagina=cuenta";</script>';
        
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
                    <input type="password" class="validate" name="contrasena">

                </div>
            </div>
            <div>
                <label>Nombre</label>
                <div class="input-field s12">
                    <input type="text" class="validate" value="<?php echo $datos['nombre']; ?>" name="nombre_p">
                </div>
            </div>
            <div>
                <center>
                    <h2>Fotografía</h2>
                </center>
                <img src="images/agencias/<?php echo $datos['foto']; ?>" class="img-rounded" width="300" height="300">
                <div class="file-field input-field">
                    <div class="btn" id="pro-file-upload"> <span>Nueva fotografía</span>
                        <input type="file" name="foto_p"> </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" > </div>
                </div>

            </div>

            <div class="input-field s4">
                <center>
                    <input type="submit" value="Actualizar" class="waves-effect waves-light log-in-btn"></center>
            </div>
            </form>
        </div>        
    </div>
