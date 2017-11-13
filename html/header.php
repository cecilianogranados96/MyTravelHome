<?php 
##################################################################
# 
# OBJETIVO:
# =========
#
# Header de la aplicación
#
# Desarrollo:
# 
# - JOSE ANDRÉS CECILIANO GRANADOS
#
# Mejoras:
# 
# - SILVIA CALDERÓN NAVARRO
#
###################################################################
?> 

<html lang="es">

<head>
    <title>MyTravelHome</title>
    <!-- META TAGS -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Poppins%7CQuicksand:500,700" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link href="css/materialize.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body data-ng-app="">
    <!--MOBILE MENU-->
    <section>
        <div class="mm">
            <div class="mm-inn">
                <div class="mm-logo"><a href="index.php"><img src="images/logo.png" alt=""></a></div>
                <div class="mm-icon"><span><i class="fa fa-bars show-menu" aria-hidden="true"></i></span></div>
                <div class="mm-menu">
                    <div class="mm-close"><span><i class="fa fa-times hide-menu" aria-hidden="true"></i></span></div>
                    <ul>
                        <li><a href="index.php">My TravelHome</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--HEADER SECTION-->
    <section>
        <?php if ($tipo == 0){ ?>
        <div class="menu-section">
            <div class="container">
                <div class="row">
                    <div class="top-bar">
                        <ul>
                            <li><a href="Docs/" target="_blank">Documentación</a></li>
                            <li><a href="Manual/" target="_blank">Manual de usuario</a></li>
                            <li><a href="?pag=registro_hotel">Registro Hoteles</a></li>
                            <li><a href="?pag=registro_agencia">Registro Agencias</a></li>
                            <li><a href="?pag=ingresar">Ingreso</a></li>
                            
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="logo"><a href="index.php"><img src="images/logo.png" style="width: 28%;margin-top: -22px;"/></a></div>
                    <div class="menu-bar">
                        <ul>
                            <li><a href="index.php">Inicio</a></li>
                            <li><a href="?pag=hoteles">Hoteles</a></li>
                            <li><a href="?pag=habitaciones">Habitaciones</a></li>
                            <?php 
                                if (!isset($_SESSION['usuario'])){
                                    echo '<li><a href="?pag=registro">Registrarse</a></li>';
                                }else{
                                    echo '<li><a href="?pag=micuenta" >Mi cuenta </a></li>';
                                }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>