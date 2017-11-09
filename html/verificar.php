<br><br><br><br><br><br><br><br><br><?php 

if (isset($_GET['rhotel'])){
        $query = "INSERT INTO `hotel`(`nombre`, `tipo_hotel`, `caracteristica`, `distrito`, `localizacion`, `rango_precio`, `categoria`) VALUES (
        '".$_POST['nombre_hotel']."',
        '".$_POST['tipo_hotel']."',
        '".$_POST['caract']."',
        '".$_POST['distrito']."',
        '".$_POST['localicacion']."',
        '".$_POST['precio']."',
        '".$_POST['categoria']."')";
        $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
    
        $hotel = mysql_insert_id();
    
        $query = "INSERT INTO `usuario`(`usuario`, `contrasena`, `tipo`) VALUES ('".$_POST['user']."','".md5($_POST['pass'])."',1)";
        $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

        $query = "INSERT INTO `adm_hotel`(`id_usuario`, `nombre`, `apellido`, `nacionalidad`, `genero`, `cedula`, `admin`,`id_hotel`) 
        VALUES ('".mysql_insert_id()."','".$_POST['apellido_p']."','".$_POST['apellido_p']."','".$_POST['nacionalidad']."','".$_POST['genero']."','".$_POST['cedula']."','".$_POST['admin']."','".$hotel."')";
        $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

        echo '<script>alert("Registrado con exito!"); window.location.href = "index.php";</script>';
}

//---------------------------------------------------------
if (isset($_GET['ragencia'])){
    $query = "INSERT INTO `usuario` (`usuario`, `contrasena`, `tipo`) VALUES ('".$_POST['user']."','".md5($_POST['pass'])."',2)";
    $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
    
    $uploaddir = 'images/agencias/';
    $foto_url = rand().$_FILES['foto']['name'];
    $uploadfile = $uploaddir.basename($foto_url);
    move_uploaded_file($_FILES['foto']['tmp_name'], $uploadfile);
    
    $query = "INSERT INTO `agencia`(`id_usuario`, `nombre`, `foto`) VALUES ('".mysql_insert_id()."','".$_POST['nombre_agencia']."','".$foto_url."')";
    $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
    
    echo '<script>alert("Registrado con exito!"); window.location.href = "index.php";</script>';
}

//---------------------------------------------------------
if (isset($_GET['rcliente'])){

    $query = "INSERT INTO `usuario` (`usuario`, `contrasena`, `tipo`) VALUES ('".$_POST['user']."','".md5($_POST['pass'])."',0)";
    $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
    
    $uploaddir = 'images/clientes/';
    $foto_url = rand().$_FILES['foto']['name'];
    $uploadfile = $uploaddir.basename($foto_url);
    move_uploaded_file($_FILES['foto']['tmp_name'], $uploadfile);
    
    $query = "INSERT INTO `cliente`(`id_usuario`, `nombre`, `apellido`, `genero`, `cedula`, `fecha_nacimiento`, `cuenta_bancaria`, `nacionalidad`, `fotografia`) VALUES ('".mysql_insert_id()."','".$_POST['nombre']."','".$_POST['apellido']."','".$_POST['genero']."','".$_POST['cedula']."','".$_POST['fecha']."','".$_POST['cuenta']."','".$_POST['nacionalidad']."','".$foto_url."')";
    
    $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
    echo '<script>alert("Registrado con exito!"); window.location.href = "index.php";</script>';

}

//---------------------------------------------------------

if (isset($_GET['verificar'])){
    $query = "SELECT `id_usuario`,`usuario`, `contrasena`, `tipo` FROM `usuario` WHERE usuario = '".$_POST['user']."' and contrasena = '".md5($_POST['pass'])."' ";
    $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
    if (mysql_num_rows($result) != 0){
        $datos = mysql_fetch_array($result, MYSQL_ASSOC);
        $_SESSION['usuario'] = $datos['id_usuario'];
         echo  $datos['tipo']; 
         
        if ( $datos['tipo'] == 1 ){
            echo '<script> window.location.href = "index.php?pag=hoteles/inicio";</script>';
        }
        if ( $datos['tipo'] == 2 ){
            echo '<script> window.location.href = "index.php?pag=agencias/inicio";</script>';
        }
        if ( $datos['tipo'] == 3 ){
            echo '<script> window.location.href = "index.php?pag=plataforma/inicio";</script>';
        }
        if ( $datos['tipo'] == 0 ){
            echo '<script> window.location.href = "index.php?pag=micuenta";</script>';
        }
        
        
        
    }else{
        echo '<script>alert("Error al accesar intente nuevamente"); window.location.href = "index.php";</script>';
    }
}




?>