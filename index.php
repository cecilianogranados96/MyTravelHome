<?php 
 session_start();
    $link = mysql_connect('34.201.50.177', 'admin_admin', 'admin123')or die('No se pudo conectar: ' . mysql_error());
    mysql_select_db('admin_ceciliano') or die('No se pudo seleccionar la base de datos');

    if (isset($_SESSION['usuario'])){
        $query = "SELECT `tipo` FROM `usuario` WHERE id_usuario = '".$_SESSION['usuario']."' ";
        $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
        $datos = mysql_fetch_array($result, MYSQL_ASSOC);
        $tipo =$datos['tipo']; 
    }else{
        $tipo = 0; 
    }
/*
    if (isset($_SESSION['usuario'])){
        $query = "SELECT `tipo` FROM `usuario` WHERE id_usuario = '".$_SESSION['usuario']."' ";
        $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

<<<<<<< HEAD
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
=======
    include "Controller/header.php";


    include "View/header.php";

>>>>>>> origin/master
    if(isset($_GET['pag'])){
        if (file_exists("Controller/".$_GET['pag'].".php")) {
           include "Controller/".$_GET['pag'].".php";
        }
        if (file_exists("View/".$_GET['pag'].".php")) {
           include "View/".$_GET['pag'].".php";
        }else{
            include "View/inicio.php";
        }  
    }else{
        include "View/inicio.php";    
    }
<<<<<<< HEAD
    include "html/fotter.php";

=======
    include "View/fotter.php";
>>>>>>> origin/master
?>
