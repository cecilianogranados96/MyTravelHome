<?php 
 session_start();
    $link = mysql_connect('34.201.50.177', 'admin_admin', 'admin123')or die('No se pudo conectar: ' . mysql_error());
    mysql_select_db('admin_ceciliano') or die('No se pudo seleccionar la base de datos');

    if (isset($_SESSION['usuario'])){
        $query = "SELECT `tipo` FROM `usuario` WHERE id_usuario = '".$_SESSION['usuario']."' ";
        $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
        $datos = mysql_fetch_array($result, MYSQL_ASSOC);
        $tipo =$datos['tipo']; 
        
        
        $query = "SELECT * FROM `usuario` WHERE id_usuario = '".$_SESSION['usuario']."' ";
        $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
        $datos = mysql_fetch_array($result, MYSQL_ASSOC);
        $query = "SELECT * FROM `cliente` WHERE id_usuario = '".$_SESSION['usuario']."' ";
        $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
        $datos2 = mysql_fetch_array($result, MYSQL_ASSOC);
        
        $datos = array_merge($datos,$datos2);
        
        
        
        
    }else{
        $tipo = 0; 
    }
/*
    if (isset($_SESSION['usuario'])){
        $query = "SELECT `tipo` FROM `usuario` WHERE id_usuario = '".$_SESSION['usuario']."' ";
        $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

        $datos = mysql_fetch_array($result, MYSQL_ASSOC);
        $_SESSION['usuario'] = $datos['id_usuario'];

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
            echo '<script> window.location.href = "index.php?pag=inicio";</script>';
        }         
    
    }*/


    include "php/header.php";
    include "html/header.php";
    if(isset($_GET['pag'])){
        if (file_exists("php/".$_GET['pag'].".php")) {
           include "php/".$_GET['pag'].".php";
        }
        if (file_exists("html/".$_GET['pag'].".php")) {
           include "html/".$_GET['pag'].".php";
        }else{
            include "html/inicio.php";
        }  
    }else{
        include "html/inicio.php";    
    }
    include "html/fotter.php";

?>
