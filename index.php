<?php 


    include "Controller/header.php";


    include "View/header.php";

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
    include "View/fotter.php";
?>
