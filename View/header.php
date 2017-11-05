<html lang="es">

<head>
    <title>Travel Home</title>
    <!-- META TAGS -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="images/fav.ico" type="image/x-icon">
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
                        <li><a href="index.php">Home - Default</a></li>
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
<<<<<<< HEAD:html/header.php
                            <li><a href="?pag=registro_hotel">Registro Hotel</a></li>
                            <li><a href="?pag=registro_agencia">Registro Agencias</a></li>
                            <li><a href="?pag=ingresar">Ingreso</a></li>
=======
                            <li><a href="" data-toggle="modal" data-target="#modal2">Admin Hotel</a></li>
                            <li><a href="#!" data-toggle="modal" data-target="#modal2">Admin Agencias</a></li>
                            <li><a href="#!" data-toggle="modal" data-target="#modal2">Admin General</a></li>
>>>>>>> origin/master:View/header.php
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="logo"><a href="index.php"><img src="images/logo.png" style="width: 28%;margin-top: -22px;"/></a></div>
                    <div class="menu-bar">
                        <ul>
                            <li><a href="index.php">Inicio</a></li>
                            <li><a href="?pag=hoteles">Hoteles</a></li>
                            <li><a href="?pag=descuentos">Descuentos</a></li>
                            <?php 
                            if (!isset($_SESSION['usuario'])){
                                echo ' <li><a href="?pag=ingresar">Iniciar</a></li>
                            
                            <li><a href="?pag=registro">Registrarse</a></li>';
                                
                            }else{
                                echo ' <li><a href="#!" data-toggle="modal" data-target="#modal2">Mi cuenta </a></li>
                            
                            <li><a href="?pag=salir">Salir</a></li>';
                            }

                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>